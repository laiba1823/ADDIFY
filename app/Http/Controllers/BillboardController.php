<?php

namespace App\Http\Controllers;
use App\Models\Billboard;
use App\Http\Requests\StoreBillboardRequest;
use App\Http\Requests\UpdateBillboardRequest;
use App\Models\Category;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use function Laravel\Prompts\error;

class BillboardController extends Controller
{
    public function billboardsDashboard(Request $request){
        $vendor = Vendor::find($request->vendor->id);
        $billboards = Billboard::where("vendor_id", "=", $request->vendor->id)->get()->sortByDesc('created_at');

        return view("vendor.billboards.dashboard", [
            "vendor" => $vendor,
            "billboards" => $billboards
        ]);
    }

    public function create(Request $request){
        // dd($request->vendor);
        $vendor = Vendor::find($request->vendor->id);
        $categories = Category::all();
        return view("vendor.billboards.create", [
            "vendor" => $vendor,
            "categories" => $categories
        ]);
    }

    public function store(StoreBillboardRequest $request){
        
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'string',
            'category' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:10',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120', 
        ]);

        $billboardUuid = Str::uuid();

        $billboard = Billboard::create([
            'vendor_id' => $request->input('vendor_id'), 
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'category_id' => $request->input('category'),
            'price' => $request->input('price'),
            'images' => [], // Initialize an empty array for now
            'uuid' => $billboardUuid,
            'status' => "active"
        ]);

        // Handle image upload if files are present
        if ($request->hasFile('images')) {
            
            $uploadedImages = [];

            $i = 0;
            foreach ($request->file('images') as $image) {
                $imageName = $billboardUuid . '_'. $i . '_' . $image->getClientOriginalName();
                $path = $image->storeAs("billboard-images/{$billboardUuid}", $imageName, 'public');
                $uploadedImages[] = $path;
                $i++;
            }

            $billboard->update([
                'images' => $uploadedImages,
            ]);
        }

        return redirect()->route('vendors.billboards.index')->with('success', 'Billboard created successfully.');
    }

    public function edit($id, Request $request){
        $billboard = Billboard::findOrFail($id);
        $categories = Category::all();
        $vendor = Vendor::find($request->vendor->id);
        return view('vendor.billboards.edit', compact('billboard', 'categories', 'vendor'));
    }

    public function update(UpdateBillboardRequest $request, $id){
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'string',
            'category' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:10',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
        ]);

        $billboard = Billboard::findOrFail($id);

        // Handle image upload if files are present
        if ($request->hasFile('images')) {
            $uploadedImages = $billboard->images ?? []; // Existing images or initialize as empty array
            $billboardUuid = $billboard->uuid ?? Str::uuid(); // Existing UUID or generate a new one
            $images = $request->file('images');

            foreach ($images as $index => $image) {
                
                if (!empty($uploadedImages[$index])) {
                    error_log(Storage::delete($uploadedImages[$index]));
                }

                $imageName = $billboardUuid . '_' . $index . '_' . $image->getClientOriginalName();
                $path = $image->storeAs("billboard-images/{$billboardUuid}", $imageName, 'public');
                $uploadedImages[$index] = $path;
            }

            // Update images field
            $billboard->update(['images' => $uploadedImages, 'uuid' => $billboardUuid]);
        }

        // Update other fields
        $billboard->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'category_id' => $request->input('category'),
            'price' => $request->input('price'),
            'status' => $billboard->status,
        ]);

        return redirect()->route('vendors.billboards.index')->with('success', 'Billboard updated successfully.');
    }

    public function show(Billboard $billboard, $id){
        $billboard = Billboard::findOrFail($id);
        $categories = Category::all();

        return view('public.billboard', [
            "billboard" => $billboard,
            "categories" => $categories,
        ]);
    }

    public function destroy(Billboard $billboard){
        // Delete the folder for images
        $isDeleted = Storage::disk('billboard-images')->deleteDirectory($billboard->uuid);
        // Delete the Billboard record
        $billboard->delete();

        return response()->json(['message' => 'Billboard deleted successfully']);
    }

    public function updateStatus(Billboard $billboard, Request $request) {
        $request->validate([
            'status' => 'required|in:active,disabled',
        ]);
        
        $billboard->update(['status' => $request->input('status')]);
        
        return response()->json(['message' => 'Billboard status updated successfully']);
        return response()->json(['message' => $billboard]);
    }

}
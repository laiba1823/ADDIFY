<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Vendor;
use App\Models\Billboard;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    function home() {
        $categories = Category::all();

        return view('public.home',[
            "categories" => $categories,
        ]);
    }
    
    function search(Request $request) {
        $categories = Category::all();
        $dbQuery = Billboard::query();
    
        if ($request->filled('query')) {
            $query = $request->input('query');
            $dbQuery->where('title', 'like', '%' . $query . '%');
        }
    
        if ($request->filled('category')) {
            $category_id = $request->input('category');
            $dbQuery->where('category_id', $category_id);
        }
    
        $gigs = $dbQuery->get();
    
        return view('public.search', [
            'gigs' => $gigs,
            'categories' => $categories,
            'request' => $request,
        ]);
    }

    function team(){
        $categories = Category::all();
        $vendorCount = Vendor::count();

        return view("public.team", [
            "categories" => $categories,
            "vendorCount" => $vendorCount,
        ]);
    }

    function searchSuggestions(Request $request) {
        $query = $request->input('query');
        $suggestions = Billboard::where('title', 'like', "%$query%")->latest()->take(10)->get(['id', 'title']);
        return response()->json($suggestions);
    }
}

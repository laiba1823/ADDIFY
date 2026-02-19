<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\BankAccounts;
use App\Models\Buyer;
use App\Models\Vendor;
use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

    public function dashboard(Request $request){
        $admin = Admin::find($request->admin->id);

        // Fetch total counts
        $vendorCount = Vendor::count();
        $buyerCount = Buyer::count();
        $transactionCount = Transactions::count();

        // Fetch bank account current amount (assuming there's only one bank account for the admin)
        $bankAccount = BankAccounts::where('user_type', 'admin')->where('user_id', $admin->id)->first();
        $currentAmount = $bankAccount ? $bankAccount->current_balance : 0;

        // Fetch data of the last 5 transactions
        $lastTransactions = Transactions::orderBy('created_at', 'desc')->take(5)->get();
        // dd($lastTransactions);
        return view("admin.dashboard", [
            "admin" => $admin,
            "request" => $request,
            "vendorCount" => $vendorCount,
            "buyerCount" => $buyerCount,
            "transactionCount" => $transactionCount,
            "currentAmount" => $currentAmount,
            "lastTransactions" => $lastTransactions,
        ]);
    }

    function profilePage(Request $request) {
        $admin = Admin::find($request->admin->id);
        $bankAccount = BankAccounts::where("user_type", "admin")->where("user_id", $request->admin->id)->first();
        return view("admin.profile", [
            "admin" => $admin,
            "bankAccount" => $bankAccount
        ]);
    }

    public function loginForm(){
        return view('admin.login');
    }

    public function login(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        
        // Retrieve the user data from the database
        $admin = Admin::where('email', $email)->first();
    
        if ($admin) {
            // Verify the password
            if (password_verify($password, $admin->password)) {
                // Password is correct, create a session and return the user ID
                session()->put(["LoggedAdmin" => $admin->id]);
                return redirect()->route("admin.dashboard");
            } else {
                // Password is incorrect
                return redirect()->back()->with("fail", "Password is not correct");
            }
        } else {
            // User not found
            return redirect()->back()->with("fail", "Email is not there");
        }
    }

    public function logout(){
        if (session()->has('LoggedAdmin')) {
            session()->pull("LoggedAdmin");
            return redirect()->route("admin.loginForm")->with('success', 'you logged out');
        }else{
            return "m";
        }
    }

    function financesDashboard(Request $request) {
        $admin = Admin::find($request->admin->id);

        // Retrieve bank account current balance (assuming there's only one bank account for the admin)
        $bankAccount = BankAccounts::where('user_type', 'admin')->where('user_id', $admin->id)->first();
        $currentBalance = $bankAccount ? $bankAccount->current_balance : 0;

        // Retrieve recent 10 transactions
        $lastTransactions = Transactions
            ::orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        return view("admin.finances.dashboard", [
            "admin" => $admin,
            "currentBalance" => $currentBalance,
            "lastTransactions" => $lastTransactions,
        ]);
    }

    function depositPage(Request $request) {
        $admin = Admin::find($request->admin->id);
        $bankAccount = BankAccounts::where("user_type", "admin")->where("user_id", $request->admin->id)->first();


        return view("admin.finances.deposit", [
            "admin" => $admin,
            "bankAccount" => $bankAccount
        ]);
    }
    
    public function depositCash(Request $request){
        $admin = Admin::find($request->admin->id); // Assuming the admin is authenticated
        $amount = $request->input('amount');

        // Validate the amount (add more validation as needed)
        $request->validate([
            'amount' => 'required|numeric|min:0',
        ]);

        // Retrieve the bank account associated with the admin
        $bankAccount = BankAccounts::where('user_type', 'admin')->where('user_id', $admin->id)->first();

        if (!$bankAccount) {
            return response()->json(['error' => 'Bank account not found'], 404);
        }

        // Update the current_balance
        $bankAccount->current_balance += $amount;
        $bankAccount->save();

        // You can also create a new transaction record in the transactions table if needed

        // Return the updated bank account information
        return response()->json(['current_balance' => $bankAccount->current_balance]);
    }
    
    function withdrawPage(Request $request) {
        $admin = Admin::find($request->admin->id);
        $bankAccount = BankAccounts::where('user_type', 'admin')->where('user_id', $admin->id)->first();
        $currentAmount = $bankAccount ? $bankAccount->current_balance : 0;

        return view("admin.finances.withdraw", [
            "admin" => $admin,
            "currentAmount" => $currentAmount,
            "bankAccount" => $bankAccount
        ]);
    }
    
    public function withdrawCash(Request $request){
        $admin = Admin::find($request->admin->id); // Assuming the admin is authenticated
        $amount = $request->input('amount');

        // Validate the amount (add more validation as needed)
        $request->validate([
            'amount' => 'required|numeric|min:0',
        ]);

        // Retrieve the bank account associated with the admin
        $bankAccount = BankAccounts::where('user_type', 'admin')->where('user_id', $admin->id)->first();

        if (!$bankAccount) {
            return response()->json(['error' => 'Bank account not found'], 404);
        }

        // Check if the withdrawal amount is greater than the current balance
        if ($amount > $bankAccount->current_balance) {
            return response()->json(['error' => 'Insufficient funds'], 422);
        }

        // Update the current_balance
        $bankAccount->current_balance -= $amount;
        $bankAccount->save();

        // You can also create a new transaction record in the transactions table if needed

        // Return the updated bank account information
        return response()->json(['current_balance' => $bankAccount->current_balance]);
    }

    public function vendorsDashboard(Request $request){
        $admin = Admin::find($request->admin->id);
        $vendors = Vendor::all();

        return view("admin.vendor.index", [
            "admin" => $admin,
            "vendors" => $vendors,
        ]);
    }
    
    public function buyersDashboard(Request $request){
        $admin = Admin::find($request->admin->id);
        $buyers = Buyer::all();

        return view("admin.buyer.index", [
            "admin" => $admin,
            "buyers" => $buyers,
        ]);
    }

    public function update(Request $request, $id){
        $admin = Admin::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:freelancers,email,' . $admin->id,
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120', // 5MB limit
            'password' => 'nullable',
        ]);

        // Delete old profile image if it exists and not named "default.svg"
        if ($admin->image && $admin->image !== '/img/profile-pictures/default.svg') {
            Storage::disk('profile-pictures')->delete($admin->image);
        }

        // Update name and email
        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Update profile image
        if ($request->hasFile('img')) {
            $imageName = time() . '_' . $request->file('img')->getClientOriginalName();
            $path = $request->file('img')->storeAs('img/profile-pictures/', $imageName, 'public');

            $admin->update([
                'img' => 'storage/img/profile-pictures/' . $imageName,
            ]);
        }

        // Update password if provided
        if ($request->filled('password')) {
            $admin->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully.');
    }
}

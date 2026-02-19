<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Http\Requests\StoreBuyerRequest;
use App\Http\Requests\UpdateBuyerRequest;
use App\Models\BankAccounts;
use App\Models\Category;
use App\Models\Order;
use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class BuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buyer.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:buyers',
            'password' => 'required|string|min:8',
        ]);

        $buyer=Buyer::create([
            'name' => $request->name,
            'email' => $request->email,
            'img' => '/img/profile-pictures/default.svg',
            'password' => Hash::make($request->password),
        ]);
        BankAccounts::create([
            'user_type' => 'buyer',
            'user_id' => $buyer->id,
            'current_balance' => 0,
            'card_holder' => null,
            'card_expiry' => null,
            'card_number' => null,
            'account_number' => null,
        ]);

        return redirect()->route("buyers.loginForm")->with('success', 'registeration done Login'); 
    }

    /**
     * Show the login form
     */
    public function loginForm()
    {
        return view('buyer.login');
    }
    
    /**
     * Log the company in
     */
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        
        // Retrieve the user data from the database
        $buyer = Buyer::where('email', $email)->first();
    
        if ($buyer) {
            // Verify the password
            if (password_verify($password, $buyer->password)) {
                // Password is correct, create a session and return the user ID
                session()->put(["LoggedBuyer" => $buyer->id]);
                
                if ($request->filled('next')) {
                    return redirect($request->input("next")) ;
                }

                return redirect()->back() ;
                // route("buyers.dashboard");
            } else {
                // Password is incorrect
                return redirect()->back()->with("fail", "Password is not correct");
            }
        } else {
            // User not found
            return redirect()->back()->with("fail", "Email is not there");
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function dashboard(Request $request){
        $buyer = Buyer::find($request->buyer->id);
        $bankAccount = BankAccounts::where('user_type', 'buyer')->where('user_id', $buyer->id)->first();
        $currentAmount = $bankAccount ? $bankAccount->current_balance : 0;

        $orderCount = $buyer->orders->count(); 
        $cancelledOrderCount = Order::where("buyer_id", $buyer->id)->where("status", "cancelled")->get()->count();
        $pendingOrderCount = Order::where("buyer_id", $buyer->id)->where("status", "pending")->get()->count();
        
        return view("buyer.dashboard", [
            "buyer" => $buyer,
            "orderCount" => $orderCount,
            "currentAmount" => $currentAmount,
            "cancelledOrderCount" => $cancelledOrderCount,
            "pendingOrderCount" => $pendingOrderCount,
        ]);
    }

    /**
     * Log the user out.
     */
    public function logout(){
        if (session()->has('LoggedBuyer')) {
            session()->pull("LoggedBuyer");
            return redirect()->route("buyers.loginForm")->with('success', 'you logged out');
        }else{
            return "m";
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Buyer $buyer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buyer $buyer)
    {
        //
    }

    function profilePage(Request $request) {
        $buyer = Buyer::find($request->buyer->id);
        $bankAccount = BankAccounts::where("user_type", "buyer")->where("user_id", $request->buyer->id)->first();
        return view("buyer.profile", [
            "buyer" => $buyer,
            "bankAccount" => $bankAccount
        ]);
    }

    public function update(Request $request, $id){
        $buyer = Buyer::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:freelancers,email,' . $buyer->id,
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120', // 5MB limit
            'password' => 'nullable',
        ]);

        // Delete old profile image if it exists and not named "default.svg"
        if ($buyer->image && $buyer->image !== '/img/profile-pictures/default.svg') {
            Storage::disk('profile-pictures')->delete($buyer->image);
        }

        // Update name and email
        $buyer->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Update profile image
        if ($request->hasFile('img')) {
            $imageName = time() . '_' . $request->file('img')->getClientOriginalName();
            $path = $request->file('img')->storeAs('img/profile-pictures/', $imageName, 'public');

            $buyer->update([
                'img' => 'img/profile-pictures/' . $imageName,
            ]);
        }

        // Update password if provided
        if ($request->filled('password')) {
            $buyer->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->route('buyers.profile')->with('success', 'Profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buyer $buyer){
        //
    }

    function financesDashboard(Request $request) {
        $buyer = Buyer::find($request->buyer->id);
        // Retrieve bank account current balance (assuming there's only one bank account for the admin)
        $bankAccount = BankAccounts::where('user_type', 'buyer')->where('user_id', $buyer->id)->first();
        $currentBalance = $bankAccount ? $bankAccount->current_balance : 0;

        // Retrieve recent 10 transactions
        $lastTransactions = Transactions
            ::where("from", $buyer->id)
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        return view("buyer.finances.dashboard", [
            "buyer" => $buyer,
            "currentBalance" => $currentBalance,
            "bankAccount" => $bankAccount,
            "lastTransactions" => $lastTransactions,
        ]);
    }

    function depositPage(Request $request) {
        $buyer = Buyer::find($request->buyer->id);

        $buyer = Buyer::find($request->buyer->id);
        $bankAccount = BankAccounts::where('user_type', 'buyer')->where('user_id', $buyer->id)->first();

        return view("buyer.finances.deposit", [
            "buyer" => $buyer,
            "bankAccount" => $bankAccount,
        ]);
    }
    
    public function depositCash(Request $request){
        $buyer = Buyer::find($request->buyer->id); // Assuming the admin is authenticated
        $amount = $request->input('amount');

        // Validate the amount (add more validation as needed)
        $request->validate([
            'amount' => 'required|numeric|min:0',
        ]);

        // Retrieve the bank account associated with the admin
        $bankAccount = BankAccounts::where('user_type', 'buyer')->where('user_id', $buyer->id)->first();

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
        $buyer = Buyer::find($request->buyer->id);
        $bankAccount = BankAccounts::where('user_type', 'buyer')->where('user_id', $buyer->id)->first();
        $currentAmount = $bankAccount ? $bankAccount->current_balance : 0;

        return view("buyer.finances.withdraw", [
            "buyer" => $buyer,
            "currentAmount" => $currentAmount,
            "bankAccount" => $bankAccount
        ]);
    }
    
    public function withdrawCash(Request $request){
        $buyer = Buyer::find($request->buyer->id); // Assuming the admin is authenticated
        $amount = $request->input('amount');

        // Validate the amount (add more validation as needed)
        $request->validate([
            'amount' => 'required|numeric|min:0',
        ]);

        // Retrieve the bank account associated with the admin
        $bankAccount = BankAccounts::where('user_type', 'buyer')->where('user_id', $buyer->id)->first();

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
}

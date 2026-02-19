<?php

namespace App\Http\Controllers;

use App\Models\BankAccounts;
use App\Http\Requests\StoreBankAccountsRequest;
use App\Http\Requests\UpdateBankAccountsRequest;

class BankAccountsController extends Controller
{

    public function index(){
        //
    }

    public function create(){
        //
    }

    public function store(StoreBankAccountsRequest $request){
        //
    }

    public function show(BankAccounts $bankAccounts){
        //
    }

    public function edit(BankAccounts $bankAccounts){
        //
    }

    public function updateVendor(UpdateBankAccountsRequest $request, BankAccounts $bankAccounts, $id){
        
        $userType = $request->input('user_type');
        
        $bankAccount = BankAccounts::where('user_type', $userType)
        ->where('user_id', $id)
        ->first();
        
        if (!$bankAccount) {
            return response()->json(['error' => 'Bank account not found'], 404);
        }

        $bankAccount->update([
            'card_holder' => $request->input('card_holder'),
            'card_expiry' => $request->input('card_expiry'),
            'card_number' => $request->input('card_number'),
            'account_number' => $request->input('account_number'),
        ]);

        return redirect()->route('vendors.profile')->with('success', 'Information updated successfully.');

    }

    public function updateBuyer(UpdateBankAccountsRequest $request, BankAccounts $bankAccounts, $id){
        
        $userType = $request->input('user_type');
        
        $bankAccount = BankAccounts::where('user_type', $userType)
        ->where('user_id', $id)
        ->first();
        
        if (!$bankAccount) {
            return response()->json(['error' => 'Bank account not found'], 404);
        }

        $bankAccount->update([
            'card_holder' => $request->input('card_holder'),
            'card_expiry' => $request->input('card_expiry'),
            'card_number' => $request->input('card_number'),
            'account_number' => $request->input('account_number'),
        ]);

        return redirect()->route('buyers.profile')->with('success', 'Information updated successfully.');

    }

    public function updateAdmin(UpdateBankAccountsRequest $request, BankAccounts $bankAccounts, $id){
        
        $userType = $request->input('user_type');
        
        $bankAccount = BankAccounts::where('user_type', $userType)
        ->where('user_id', $id)
        ->first();
        
        if (!$bankAccount) {
            return response()->json(['error' => 'Bank account not found'], 404);
        }

        $bankAccount->update([
            'card_holder' => $request->input('card_holder'),
            'card_expiry' => $request->input('card_expiry'),
            'card_number' => $request->input('card_number'),
            'account_number' => $request->input('account_number'),
        ]);

        return redirect()->route('admin.profile')->with('success', 'Information updated successfully.');

    }

    public function destroy(BankAccounts $bankAccounts){
        //
    }
}

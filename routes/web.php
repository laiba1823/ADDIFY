<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BankAccountsController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\BillboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PublicController;
use App\Models\Category;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/test', function (Request $request ) {
    dd($request->getRequestUri());
    return view('test');
})->name("testy");

Route::middleware(["PassBuyerData"])->group(function() {
    Route::get('/', [PublicController::class, "home"])->name("public.home");
    Route::get('/billboards', [PublicController::class, "search"])->name("public.search");
    Route::get('/{id}/billboard', [BillboardController::class, "show"])->name("public.billboard.show");
    Route::get('/{id}/vendor', [VendorController::class, "show"])->name("public.vendor.show");
    Route::get('/{id}/buyer', [VendorController::class, "show"])->name("public.buyer.show");
    Route::get('/team', [PublicController::class, "team"])->name("public.team");
});

Route::post('/search-suggestions', [PublicController::class, "searchSuggestions"])->name("public.search.suggestions");


Route::prefix("orders")->group(function(){
    Route::middleware(["AuthCheckBuyer"])->group(function(){

        Route::get('create/{billboardId}', [OrderController::class, 'create'])->name('orders.create');
        Route::post('create', [OrderController::class, 'store'])->name('orders.store');

    });
});



// Routes for vendors    
Route::prefix("vendors")->group(function(){
    Route::middleware(["AlreadyLoggedVendor"])->group(function(){
        Route::get('/login', [VendorController::class, 'loginForm'])->name('vendors.loginForm');
        Route::post('login', [VendorController::class, 'login'])->name('vendors.login');
    });
    // Register page and then actual registeration
    Route::get('register', [VendorController::class, 'create'])->name('vendors.create');
    Route::post('vendors', [VendorController::class, 'store'])->name('vendors.store');
    
    Route::middleware(["AuthCheckVendor"])->group(function(){
        Route::get('dashboard', [VendorController::class, 'dashboard'])->name('vendors.dashboard');
        Route::get('logout', [VendorController::class, 'logout'])->name('vendors.logout');
        Route::get('profile', [VendorController::class, 'profilePage'])->name('vendors.profile');
        Route::put('{id}', [VendorController::class, 'update'])->name('vendors.update');

        Route::prefix("billboards")->group(function(){
            Route::get('billboards', [BillboardController::class, 'billboardsDashboard'])->name('vendors.billboards.index');
            Route::get('create', [BillboardController::class, 'create'])->name('vendors.billboards.create');
            Route::post('create', [BillboardController::class, 'store'])->name('vendors.billboards.store');
            Route::get('{billboard}/edit', [BillboardController::class, 'edit'])->name('vendors.billboards.edit');
            Route::put('{billboard}', [BillboardController::class, 'update'])->name('vendors.billboards.update');            
            Route::delete('{billboard}', [BillboardController::class, 'destroy'])->name('vendors.billboards.destroy');
            Route::put('{billboard}/update-status', [BillboardController::class, 'updateStatus'])->name("vendors.billboards.updateStatus");
        });

        Route::prefix("orders")->group(function(){
            Route::get('/', [OrderController::class, 'indexVendor'])->name('vendors.orders.index');
            Route::get('/{id}', [OrderController::class, "showVendor"])->name("vendors.orders.show");
            Route::delete('/{id}', [OrderController::class, "destroyVendor"])->name("vendors.orders.destroy");
            Route::put('/{order}/update-status/{newStatus}', [OrderController::class, 'updateStatus'])->name("vendors.orders.updateStatus");
        });

        Route::prefix("finances")->group(function(){
            Route::get("finances", [VendorController::class, 'financesDashboard'])->name("vendors.finances.index");         
            Route::get("withdraw", [VendorController::class, 'withdrawPage'])->name("vendors.finances.withdraw");
            Route::post("withdraw", [VendorController::class, 'withdrawCash'])->name("vendors.finances.withdrawCash");
        });
        
        
        Route::prefix("bank-account")->group(function(){
            Route::put("{id}/update", [BankAccountsController::class, 'updateVendor'])->name("vendors.bank_account.update");
        });
        
    });

});

// Routes for buyers
Route::prefix("buyers")->group(function(){

    Route::get('register', [BuyerController::class, 'create'])->name('buyers.create');
    Route::post('buyers', [BuyerController::class, 'store'])->name('buyers.store');
    
    Route::middleware(["AlreadyLoggedBuyer"])->group(function(){
        Route::get('login', [BuyerController::class, 'loginForm'])->name('buyers.loginForm');
        Route::post('login', [BuyerController::class, 'login'])->name('buyers.login');
    });

    Route::middleware(["AuthCheckBuyer"])->group(function(){
        Route::get('dashboard', [BuyerController::class, 'dashboard'])->name('buyers.dashboard');
        Route::get('logout', [BuyerController::class, 'logout'])->name('buyers.logout'); 
        Route::get('profile', [BuyerController::class, 'profilePage'])->name('buyers.profile');
        Route::put('{id}', [BuyerController::class, 'update'])->name('buyers.update');

        Route::prefix("orders")->group(function(){
            Route::get('/', [OrderController::class, 'index'])->name('buyers.orders.index');
            Route::get('/{id}', [OrderController::class, "show"])->name("buyers.orders.show");
            Route::delete('/{id}', [OrderController::class, "destroy"])->name("buyers.orders.destroy");
            // Route::put('/{order}/update-status/{newStatus}', [OrderController::class, 'updateStatus'])->name("buyers.orders.updateStatus");
        });

        Route::prefix("finances")->group(function(){
            Route::get("finances", [BuyerController::class, 'financesDashboard'])->name("buyers.finances.index");
            Route::get("deposit", [BuyerController::class, 'depositPage'])->name("buyers.finances.deposit");
            Route::post("deposit", [BuyerController::class, 'depositCash'])->name("buyers.finances.depositCash");
            Route::get("withdraw", [BuyerController::class, 'withdrawPage'])->name("buyers.finances.withdraw");
            Route::post("withdraw", [BuyerController::class, 'withdrawCash'])->name("buyers.finances.withdrawCash");  
        });

        Route::prefix("bank-account")->group(function(){
            Route::put("{id}/update", [BankAccountsController::class, 'updateBuyer'])->name("buyers.bank_account.update");
        });

    });

});

// Routes for Admin
Route::prefix("admin")->group(function(){

    Route::middleware(["AlreadyLoggedAdmin"])->group(function(){
        Route::get('login', [AdminController::class, 'loginForm'])->name('admin.loginForm');
        Route::post('login', [AdminController::class, 'login'])->name('admin.login');    
    });
    
    Route::middleware(["AuthCheckAdmin"])->group(function(){
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
        Route::get('profile', [AdminController::class, 'profilePage'])->name('admin.profile');
        Route::put('{id}', [AdminController::class, 'update'])->name('admin.update');

        Route::prefix("vendors")->group(function(){
            Route::get("/", [AdminController::class, 'vendorsDashboard'])->name("admin.vendors.index");
        });
        
        Route::prefix("buyers")->group(function(){
            Route::get("/", [AdminController::class, 'buyersDashboard'])->name("admin.buyers.index");
        });

        // Finances Routes
        Route::prefix("finances")->group(function(){
            Route::get("finances", [AdminController::class, 'financesDashboard'])->name("admin.finances.index");
            Route::get("deposit", [AdminController::class, 'depositPage'])->name("admin.finances.deposit");
            Route::post("deposit", [AdminController::class, 'depositCash'])->name("admin.finances.depositCash");
            Route::get("withdraw", [AdminController::class, 'withdrawPage'])->name("admin.finances.withdraw");
            Route::post("withdraw", [AdminController::class, 'withdrawCash'])->name("admin.finances.withdrawCash");    
        });

        Route::prefix("bank-account")->group(function(){
            Route::put("{id}/update", [BankAccountsController::class, 'updateAdmin'])->name("admin.bank_account.update");
        });

    });
    
    Route::get("/admin/finances/transactions", function(){
        return view("");
    })->name("admin.finances.transactions");
    
});






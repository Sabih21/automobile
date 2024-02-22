<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModificationController;
use App\Http\Controllers\SaleOrderController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\ExpenseTypeController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\InstalmentHistoryController;



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


Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', [IndexController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {

    //Roles and Permissions work
    Route::get('/admin', [IndexController::class, 'index'])->name('index');
    Route::resource('/admin/roles', RoleController::class);
    Route::resource('/admin/permissions', PermissionController::class);

    //->profile Route
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //->Employees Route::
    Route::prefix('/employe')->group(function () {
        Route::get('', [EmployeController::class, 'index'])->name('employe.index');
        Route::get('/create', [EmployeController::class , 'create'])->name('employe.create');
        Route::post('', [EmployeController::class, 'store'])->name('employe.store');
        Route::get('/edit/{id}', [EmployeController::class, 'edit'])->name('employe.edit'); 
        Route::put('/{id}', [EmployeController::class, 'update'])->name('employe.update');
        Route::delete('/delete/{id}', [EmployeController::class, 'destroy'])->name('employe.destroy');
    });
    //purchase route
    Route::prefix('/purchase')->group(function () {
        Route::get('', [PurchaseOrderController::class, 'show'])->name('purchase.show');
        Route::get('/show', [PurchaseOrderController::class, 'index'])->name('purchase.index');
        Route::get('/{id}/detail', [PurchaseOrderController::class, 'detail'])->name('purchase.detail');
        Route::get('/create', [PurchaseOrderController::class, 'create'])->name('purchase.create');
        Route::post('', [PurchaseOrderController::class, 'store'])->name('purchase.store');
        Route::get('/{id}/edit', [PurchaseOrderController::class, 'edit'])->name('purchase.edit');
        Route::put('/{id}', [PurchaseOrderController::class, 'update'])->name('purchase.update');
        Route::delete('/{id}', [PurchaseOrderController::class, 'destroy'])->name('purchase.destroy');
    });

    Route::prefix('accounts')->controller(AccountController::class)->group(function () {
        Route::get('index', 'index')->name('accounts.index');
    });

    //->Vehicles Route::
    Route::prefix('/vehicles')->group(function () {
        Route::get('/', [VehicleController::class, 'show'])->name('vehicles.show');
        Route::get('/create', [VehicleController::class, 'create'])->name('vehicles.create');
        Route::post('/', [VehicleController::class, 'store'])->name('vehicles.store');
        Route::get('/show', [VehicleController::class, 'index'])->name('vehicles.index');
        Route::get('/{id}/edit', [VehicleController::class, 'edit'])->name('vehicles.edit');
        Route::put('/{id}', [VehicleController::class, 'update'])->name('vehicles.update');
        Route::delete('/{id}', [VehicleController::class, 'destroy'])->name('vehicles.destroy');
        Route::get('/{id}/detail', [VehicleController::class, 'detail'])->name('vehicles.detail');
    });
    //purchase order controller 
    //Sale Route
    Route::prefix('sales')->group(function () {
        Route::get('/' , [SaleOrderController::class , 'show'])->name('sales.show');
        Route::get('/create', [SaleOrderController::class, 'create'])->name('sales.create');
        Route::post('', [SaleOrderController::class, 'store'])->name('sales.store');
        Route::get('/show', [SaleOrderController::class, 'index'])->name('sales.index');
        Route::get('/{id}/edit', [SaleOrderController::class, 'edit'])->name('sales.edit');
        Route::put('/{id}', [SaleOrderController::class, 'update'])->name('sales.update');
        Route::delete('/{id}', [SaleOrderController::class, 'destroy'])->name('sales.destroy');
        Route::get('/{id}/detail', [saleOrderController::class, 'detail'])->name('sales.detail');
        // Route::get('/details/{id}',[SaleOrderController::class,'detail'])->name('sales.detail');
    });
    //Resource Routes 
    Route::resource('tax', TaxController::class);
    Route::resource('expences', ExpenseController::class);
    Route::resource('expence_types', ExpenseTypeController::class);
    Route::resource('salaries', SalaryController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('incomes', IncomeController::class);
    Route::resource('modifications', ModificationController::class);
        
    Route::get('/modifications/total-amount/{vehicleId}', [ModificationController::class, 'showTotalAmountByVehicleId'])->name('modifications.total_amount_by_vehicle');
    // Route::get('/final-prices', [ModificationController::class, 'calculateFinalPrice'])->name('modifications.final_prices');
    
// web.php


Route::resource('instalment-history', InstalmentHistoryController::class);

});

require __DIR__ . '/auth.php';

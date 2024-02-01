<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\ExpenseTypeController;
use App\Http\Controllers\SalaryController;




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

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //->Employees Route::
    Route::prefix('/employe')->group(function () {
        Route::get('', [EmployeController::class, 'index'])->name('employe.index');
        Route::get('/create', [EmployeController::class, 'create'])->name('employe.create');
        Route::post('', [EmployeController::class, 'store'])->name('employe.store');
        Route::get('/edit/{id}', [EmployeController::class, 'edit'])->name('employe.edit');
        Route::put('/{id}', [EmployeController::class, 'update'])->name('employe.update');
        Route::delete('/delete/{id}', [EmployeController::class, 'destroy'])->name('employe.destroy');
    });
    // Display a listing of the vehicles
    // Route::get('/vehicles', [VehicleController::class, 'show'])->name('vehicles.show');

    // // Show the form for creating a new vehicle
    // Route::get('/vehicles/create', [VehicleController::class, 'create'])->name('vehicles.create');

    // // Store a newly created vehicle in the database
    // Route::post('/vehicles', [VehicleController::class, 'store'])->name('vehicles.store');

    // // Display the specified vehicle
    // Route::get('/vehicles/show', [VehicleController::class, 'index'])->name('vehicles.index');

    // // Show the form for editing the specified vehicle
    // Route::get('/vehicles/{id}/edit', [VehicleController::class, 'edit'])->name('vehicles.edit');

    // // Update the specified vehicle in the database
    // Route::put('/vehicles/{id}', [VehicleController::class, 'update'])->name('vehicles.update');

    // // Remove the specified vehicle from the database
    // Route::delete('/vehicles/{id}', [VehicleController::class, 'destroy'])->name('vehicles.destroy');

    // Route::get('/vehicles/{id}', [VehicleController::class, 'detail'])->name('vehicles.detail');

    Route::prefix('accounts')->controller(AccountController::class)->group(function () {
        Route::get('index', 'index')->name('accounts.index');
    });
    
    Route::resource('incomes', IncomeController::class);
    
    //->Vehicles Route::
    Route::prefix('/vehicles')->group(function () {
        Route::get('/', [VehicleController::class, 'show'])->name('vehicles.show');
        Route::get('/create', [VehicleController::class, 'create'])->name('vehicles.create');
        Route::post('/', [VehicleController::class, 'store'])->name('vehicles.store');
        Route::get('/show', [VehicleController::class, 'index'])->name('vehicles.index');
        Route::get('/{id}/edit', [VehicleController::class, 'edit'])->name('vehicles.edit');
        Route::put('/{id}', [VehicleController::class, 'update'])->name('vehicles.update');
        Route::delete('/{id}', [VehicleController::class, 'destroy'])->name('vehicles.destroy');
        Route::get('/{id}', [VehicleController::class, 'detail'])->name('vehicles.detail');
    });
    
    Route::resource('expences', ExpenseController::class);
    Route::resource('expence_types', ExpenseTypeController::class);
    Route::resource('purchase', PurchaseOrderController::class);
    Route::resource('salaries', SalaryController::class);


});

require __DIR__ . '/auth.php';

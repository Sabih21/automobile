<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\VehicleController;
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
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    
    //Employee 
    Route::prefix('/employe')->group(function () {
    Route::get('',[EmployeController::Class,'index'])->name('employe.index');
    Route::get('/create',[EmployeController::Class,'create'])->name('employe.create');
    Route::post('', [EmployeController::class, 'store'])->name('employe.store');
    Route::get('/edit/{id}', [EmployeController::class,'edit'])->name('employe.edit');
    Route::put('/{id}', [EmployeController::class, 'update'])->name('employe.update');
    Route::delete('/delete/{id}', [EmployeController::class, 'destroy'])->name('employe.destroy');
    
});

Route::get('/vehicles/{id}', [VehicleController::class, 'detail'])->name('vehicles.detail');
Route::resource('vehicles', VehicleController::class);

// Route::resource('vehicles', 'VehicleController')->parameters(['vehicles' => 'vehicle']);

});

require __DIR__.'/auth.php';

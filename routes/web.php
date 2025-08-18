<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\appController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/', [AuthController::class, 'log'])->name('login');

Route::post('/',[AuthController::class,'HandleLogin'])->name('HandleLogin');


// ROUTE DASHBOARD SECURITE


Route::middleware('auth')->group(function(){

    

});

Route::get('/dashboard', [appController::class, 'index'])->name('dashboard');

//DEPARTEMENT 

route::prefix('departements')->group(function(){

Route::get('/', [DepartementController::class, 'index'])->name('departement.index');
Route::get('/create', [DepartementController::class, 'create'])->name('departement.create');
Route::post('/create', [DepartementController::class, 'store'])->name('departement.store');
Route::get('/edit/{departement}', [DepartementController::class, 'edit'])->name('departement.edit');
Route::put('/update/{departement}', [DepartementController::class, 'update'])->name('departement.update');
Route::get('/{departement}', [DepartementController::class, 'delete'])->name('departement.delete');
});



// EMPLOYEROUTE
Route::prefix('employers')->group(function(){

    Route::get('/', [EmployeController::class, 'index'])->name('employer.index');
Route::get('/create', [EmployeController::class, 'create'])->name('employer.create');
Route::get('/edit/{employer}', [EmployeController::class, 'edit'])->name('employer.edit');

Route::post('/store', [EmployeController::class, 'store'])->name('employe.store');

});





















// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';



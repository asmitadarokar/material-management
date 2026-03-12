<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MaterialTransactionController;

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('login');
    // register
});
// For USer route
Route::middleware('auth',IsUser::class)->group(function () {
    Route::get('/dashboard', function () {
    return view('dashboard');})->name('dashboard');
});

// For Admin Route
Route::middleware('auth',IsAdmin::class)->group(function () {
    //  For Category route
    Route::get('/admin/dashboard', [AdminController::class, 'Admindashboard'])->name('admin.dashboard');
    Route::get('/category/list', [CategoryController::class, 'CategoryList'])->name('category.list');
    Route::get('/category/add', [CategoryController::class, 'AddCategory'])->name('category.add');
    Route::post('/category/store', [CategoryController::class, 'StoreCategory'])->name('category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'EditCategory'])->name('category.edit');
    Route::post('/category/update/{id}', [CategoryController::class, 'UpdateCategory'])->name('category.update');
    Route::get('/category/delete/{id}', [CategoryController::class, 'DeleteCategory'])->name('category.delete');
    
    //  For material route
    Route::get('/material/list', [MaterialController::class, 'MaterialList'])->name('material.list');
    Route::get('/material/add', [MaterialController::class, 'AddMaterial'])->name('material.add');
    Route::post('/material/store', [MaterialController::class, 'StoreMaterial'])->name('material.store');
    Route::get('/material/edit/{id}', [MaterialController::class, 'EditMaterial'])->name('material.edit');
    Route::post('/material/update/{id}', [MaterialController::class, 'UpdateMaterial'])->name('material.update');
    Route::get('/material/delete/{id}', [MaterialController::class, 'DeleteMaterial'])->name('material.delete');

    // For Material Inward - Outward
    Route::get('/inward/create',[MaterialTransactionController::class,'CreateMaterialInOut'])->name('inward.create');
    Route::post('/inward/store',[MaterialTransactionController::class,'StoreMaterialInOut'])->name('inward.store');
    });


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

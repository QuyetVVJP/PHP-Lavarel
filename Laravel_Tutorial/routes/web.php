<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Client Routes
Route::prefix('categories')->group(function (){
    // Danh sach chuyen muc
    Route::get('/',[CategoriesController::class, 'index'])->name('categories.list');

    // Lay chi tiet 1 chuyen muc
    Route::get('/edit/{id}', [CategoriesController::class, 'getCategory'])->name('categories.edit');

    // Xu ly update chuyen muc
    Route::post('/edit/{id}',[CategoriesController::class,'updateCategoy']);

    // Them chuyen muc
    Route::get('/add',[CategoriesController::class,'addCategory'])->name('categories.add');

    // Xu ly them chuyen muc
    Route::post('/add',[CategoriesController::class, 'handleAddCategory']);

    // Xoa chuyen muc
    Route::delete('/delete/{id}',[CategoriesController::class, 'deleteCategory'])->name('categories.delete');

});

Route::get('san-pham/{id}',[HomeController::class, 'getProductDetail']);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth.admin')->prefix('admin')->group(function (){
        Route::get('/',[DashboardController::class,'index']);
        Route::resource('products', ProductsController::class)->middleware('auth.admin.product');
});

<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Home2Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
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

//Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/san-pham', [HomeController::class,'products'])->name('product');
//Route::get('/them-san-pham', [HomeController::class,'getAdd']);
//Route::post('/them-san-pham', [HomeController::class,'postAdd'])->name('post-add');
//Route::put("/them-san-pham",[HomeController::class,'putAdd']);
//
//Route::get('demo-response', function (){
////    $response = new Response('Hoc lap trinh tai unicode', 200);
////    dd($response);
//    $content = '<h2>Hoc lap trinh tai Unicode</h2>';
////    $content_json = json_encode([
////        'item 1', 'item 2', 'item 3'
////    ]);
////    $response = response($content_json, 200)->header('Content-type','application/json');
////    $response = (new Response())->cookie('unicode','Test ',30);
////    return $response;
//
////      return view('clients.demo-test');
////    $response = response()->view('clients.demo-test',[
////        'title' => 'Hoc PHP'
////    ], 201)->header('Content-type','application/json');
////    return $response;
////    echo old('username');
//    return view('clients.demo-test');
//})->name('demo-response');
//
//Route::post('demo-response', function (Request $request){
//    if(!empty($request->username)){
//
//        return back()->withInput()->with('msg','validate  thanh cong');
//    };
//
//    return redirect()->route('demo-response')->with('msg','validate khong thanh cong');
//
//});
//
//
////Route::get('demo-response-2', function (Request $request){
////    return $request->cookie('unicode');
////});
////
////Route::get('lay-thong-tin',[HomeController::class,'getArr']);
//
//
//Route::get('download-image',[HomeController::class,'downloadImage'])->name('download-image');

// Users
//Route::prefix('users')->name('users.')->group(function (){
    Route::get('/', [UserController::class, 'index'])->name('home');
    Route::get('/add', [UserController::class,'add'])->name('add');
    Route::post('/add', [UserController::class,'postAdd'])->name('post-add');
    Route::get('/edit/{id}',[UserController::class,'getEdit'])->name('edit');
    Route::post('/update',[UserController::class,'postEdit'])->name('postEdit');
    Route::get('/delete/{id}', [UserController::class,'delete'])->name('delete');
//});

Route::prefix('post')->group(function (){
    Route::get('/',[PostController::class, 'index'])->name('posts');
    Route::get('/add', [PostController::class,'add'])->name('add');
    Route::post('/add', [PostController::class,'postAdd'])->name('postAdd');
});




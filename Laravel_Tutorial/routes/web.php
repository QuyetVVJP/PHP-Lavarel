<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Http\Request;
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

//Route::get('/', function () {
//    return view('welcome');
//});
//
//
//Route::post('/unicode', function (){
//    return 'Phuong thuc POST';
//});
//
//Route::put('/unicode', function (){
//    return 'Phuong thuc PUT';
//});
//
//Route::delete('/unicode', function (){
//    return 'Phuong thuc DELETE';
//});
//
//Route::patch('/unicode', function (){
//    return 'Phuong thuc PATCH';
//});
//
//Route::match(['get', 'post','put', 'delete'], 'unicode2', function (){
//   return $_SERVER['REQUEST_METHOD'];
//});
//
//Route::any('unicode3', function (Request $request){
//    $request = new Request();
//    return $request->method(); // lay ra method hien tai cua request
////    return 'route any';
//});
//
//Route::get('/unicode',function (){
//    return view('form');
//    //return 'Phuong thuc GET';
//});

Route::redirect('unicode4','https://google.com');

Route::view('unicode','form');

Route::get('/home', function (){
//    $user = new User();
//    $allUser =  $user::all();
//    dd($allUser);
    return view('home');
})->name('home');

Route::get('homecontroller','App\Http\Controllers\HomeController@index')->name('home');

// tu version 8.x thi se su dung cach nay
Route::get('/chuyen-muc/{id}',[HomeController::class,'getCategories']);

Route::prefix('admin')->group(function (){
     Route::prefix('product')->middleware('checkpermission')->group(function (){
         // id? -> tham so id khong bat buoc
         // id=null -> gan gia tri mac dinh cho tham so id
         Route::get('/{slug?}-{id?}', function ($slug, $id=null){
             $content = 'Phuong thuc GET voi tham so ';
             $content.='id = '.$id.'<br/>';
             $content.='slug = '.$slug;
             return $content;
         })
//             ->where(
//             [
//                 'slug'=> '[a-z-]+',
//                 'id'=> '[0-9]+'
//             ])
         ->where('id','[0-9]+')
             ->where('slug','[a-z-]+')
         ;

         Route::get('/list-ds', function (){
             return 'danh sach san pham';
         });

         Route::get('show-form', function (){
            return view('form');
         })->name('admin.show-form');


         Route::get('/adds', function (){
             return 'them san pham';
         })->name('admin.product.add');


         Route::put('/edit', function (){
             return 'sua san pham';
         });
         Route::delete('/', function (){
             return 'xoa san pham';
         });
     });
});

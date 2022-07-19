<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function __construct()
    {
    }

    // Hien thi danh sach chuyen muc - GET
    public function index(Request $request){  // Lay thong tin cua Request hien tai
//        if(isset($_GET['id'])){
//            echo $_GET['id'];
//        }
        $allData = $request->all();
        echo $allData['id'];
        dd($allData);
        return view('/clients/categories/list');
    }

    // lay ra chuyen muc theo id - GET
    public function getCategory($id){
        return view('clients/categories/edit');
    }

    // Cap nhat 1 chuyen muc - POST
    public function updateCategoy($id){
        return 'Submit sua chuyen muc '.$id;
    }

    // show form them du lieu - GET
    public function addCategory(Request $request){

        $cateName = $request->old('category_name');
                return view('/clients/categories/add', compact('cateName'));
    }


    // Them du lieu vao chuyen muc POST
    public function handleAddCategory(Request $request){
//        $allData = $request->all();
//        dd($allData);

        if($request->has('category_name')){
            $cateName = $request->category_name;
            $request->flash();  // set session flash
            return  redirect(route('categories.add'));
//            dd($cateName);
        }else{
            return 'Khong co category_name';
        }
//        return redirect(route('categories.add'));
//        return 'Submit them chuyen muc';
    }

    // Xoa chuyen muc - DELETE
    public function deleteCategory($id){
        return 'Submit xoa chuyen muc'.$id;
    }


    public function getFile(){
        return view('clients/categories/file');
    }

    // xy ly lay thong tin file
    public function handleFile(Request $request){
       if($request->hasFile('photo')){
          if($request->photo->isValid()){
              $file = $request->file('photo');
//              dd($file);
              $path = $file->store('images'); // luu o local storage/app/images
              dd($path);

          }else{
              return 'Upload ko thanh cong';
          }
       }else{
           return ' vui long chon file';
       }
    }
}

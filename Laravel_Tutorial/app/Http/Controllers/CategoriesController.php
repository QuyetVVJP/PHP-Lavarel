<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function __construct()
    {
    }

    // Hien thi danh sach chuyen muc - GET
    public function index(){
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
    public function addCategory(){
        return view('/clients/categories/add');
    }

    // Them du lieu vao chuyen muc POST
    public function handleAddCategory(){
        return redirect(route('categories.add'));
//        return 'Submit them chuyen muc';
    }

    // Xoa chuyen muc - DELETE
    public function deleteCategory($id){
        return 'Submit xoa chuyen muc'.$id;
    }
}

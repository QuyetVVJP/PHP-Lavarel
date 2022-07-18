<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    //Action index()
    public function index(){
        $title = "Hoc lap trinh web";
        $content = 'Hoc laravel';

        // nen su dung compact de truyen du lieu
        return view('home', compact('title', 'content')); // load view home.blade.php

        //return View::make('home', compact('title', 'content'));
//        $contentView =  view('home')->render();
//        $contentView = $contentView->render(); // chuyen ve dang HTML tho
//        dd($contentView);
//        return $contentView;
    }

    public function getCategories($id){
        return 'chuyen muc'.$id;
    }

    public function getProductDetail($id){
        return view('products.detail', compact('id'));
    }
}

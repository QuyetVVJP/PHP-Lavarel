<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public $data = [];
    public function index(){
        $this->data['title'] = 'Trang chu';
        $this->data['msg'] = 'Dang ky tai khoan thanh cong';
        return view('clients.home', $this->data);
    }

    public function products(){
        $this->data['title'] = 'san pham';
        $this->data['content'] = 'san pham';
        return view('clients.product', $this->data);
    }

    public function getAdd(){
        $this->data['title'] = 'san pham';
        return view('clients.add', $this->data);
    }

    public function postAdd(Request $request){
        dd($request);
    }

    public function putAdd(Request $request){
//        dd($request);
        return 'PUT';
    }

    public function getArr(){
        $content = [
            'name' => 'Quyet',
            'age' => '27'
        ];

        return $content;
    }
}

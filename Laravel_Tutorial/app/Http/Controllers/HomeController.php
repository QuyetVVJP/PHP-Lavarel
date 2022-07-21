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
        $this->data['errorMsg'] = 'Vui long kiem tra lai du lieu';
        return view('clients.add', $this->data);
    }

    public function postAdd(Request $request){

        $rules = [
            'product_name' =>'required|min:6',
            'product_price' => 'required|integer'
        ];
//        $message = [
//            'product_name.required' => 'Tên sản phẩm bắt buộc phải nhập',
//            'product_name.min' => 'Tên sản phẩm không được nhỏ hơn :min kí tụ',
//            'product_price.required' => 'Giá sản phẩm bắt buộc phải nhập',
//            'product_name.integer' => 'Giá sản phẩm phải là số tự nhiên',
//        ];

        $message = [
            'required' => 'Trường :attribute bắt buộc phải nhập nhé',
            'min' => 'Trường :attribute không được nhỏ hơn :min kí tự'
        ];

        $request->validate(
            $rules, @$message
        );

        // Xu ly viec them du lieu vao database
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


    public function downloadImage(Request $request){
        if(!empty($request->image)){
            $image =  trim($request->image);
//            $fileName = 'image_'.uniqid().'.jpg';
            $fileName = basename($image);
//            return response()->streamDownload(function () use ($image){
//                $imageContent = file_get_contents($image);
//            }, $fileName);
            $header = [
                'Content-Type' => 'image/jpeg'
            ];
            return response()->download($image, $fileName, $header);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Home2Controller extends Controller
{
    public $data = [];
    public function index(){
        $this->data['welcome'] = 'Hoc lap trinh Laravel <b> Unicode </b>';
        $this->data['content'] = '<h3> Nhap mon Laraval </h3> <p> Test</p>';
        $this->data['dataArr'] = [
            'Item 1',
            'Item 2',
            'Item 3'
        ];
        $this->data['message'] = 'Dat hang thanh cong';
        return view('home', $this->data);
    }
}

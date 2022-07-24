<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class UserController extends Controller
{
    public function index(){
        $title = 'Danh sách người dùng';

        $users = DB::select('SELECT * FROM users ORDER BY create_at DESC;');

        return view('clients.users.list', compact('title', 'users'));
    }
}

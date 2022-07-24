<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;


class Users extends Model
{
    use HasFactory;
    protected $table = 'users';
    public function getAllUser(){
        $users = DB::select('SELECT * FROM users ORDER BY create_at DESC;');

        return $users;
    }

    public function addUser($data){
        DB::insert('INSERT INTO users (username, email, create_at) values (?,?,?)', $data);
    }
}

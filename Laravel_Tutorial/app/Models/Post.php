<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;
    protected $table = 'post';

    public function getAllPost(){
        $posts = DB::table($this->table)
            ->select('post.*')
            ->get();
        return $posts;
    }
}

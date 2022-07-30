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
            ->select('post.*', 'groups.name as group_name')
            ->join('groups', 'post.group_id', '=','groups.id')
            ->orderBy('create_at','desc')
            ->get();
        return $posts;
    }

    public function addPost($data)
    {
        return DB::table($this->table)->insert($data);
    }

    public function getDetail($id)
    {
        return DB::select('SELECT * FROM ' . $this->table . ' WHERE id = ?', [$id]);
    }

    public function updatePost($data, $id)
    {
        return DB::table($this->table)->where('id',$id)->update($data);
    }
}

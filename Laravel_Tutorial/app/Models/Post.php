<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;
    protected $table = 'post';

    public function getAllPost($filters = [], $keywords, $sortByArr = null, $perPage){
        $posts = DB::table($this->table)
            ->select('post.*', 'groups.name as group_name', 'comment.content as cmt')
            ->join('groups', 'post.group_id', '=','groups.id')
            ->join('comment', 'post.id', '=','comment.post_id');


        $orderBy = 'post.create_at';
        $orderType = 'DESC';

        if(!empty($sortByArr) && is_array($sortByArr)){
            if(!empty($sortByArr['sortBy'] && $sortByArr['sortType'])){
                $orderBy = trim($sortByArr['sortBy']);
                $orderType = trim($sortByArr['sortType']);
            }
        }

        if(!empty($filters)){
            $posts = $posts->where($filters);
        }

        $posts = $posts->orderBy($orderBy, $orderType);

        if (!empty($keywords)){
            $posts = $posts->where(function ($query) use ($keywords){
                $query->orWhere('title','like','%'.$keywords.'%');
                $query->orWhere('author','like','%'.$keywords.'%');
            });
        }
        if(!empty($perPage)){
            $posts =$posts->paginate($perPage)->withQueryString(); // $perPage ban ghi tren 1 trang
        }else{
            $posts = $posts->get();
        }

        return $posts;
    }

    public function addPost($data)
    {
        return DB::table($this->table)->insert($data);
    }

    public function getDetail($id)
    {

        return  DB::table($this->table)
            ->select('post.*', 'groups.name as group_name', 'comment.content as cmt')
            ->join('groups', 'post.group_id', '=','groups.id')
            ->join('comment', 'post.id', '=','comment.post_id')
            ->where('post.id',$id)
            ->get();


    }

    public function updatePost($data, $id)
    {
        return DB::table($this->table)->where('id',$id)->update($data);
    }

    public function deletePost($id)
    {
        return DB::table($this->table)->where('id',$id)->delete();
    }
}

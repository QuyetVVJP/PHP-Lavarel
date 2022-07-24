<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;


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

    public function getDetail($id){
        return DB::select('SELECT * FROM '.$this->table.' WHERE id = ?', [$id]);
    }

    public function updateUser($data, $id){
        $data[] = $id;
        return DB::update('UPDATE '.$this->table.' SET username=?, email=?, update_at=? WHERE id = ?',$data);
    }

    public function deleteUser($id){
       return DB::delete('DELETE FROM '.$this->table.' WHERE id=?',[$id]);
    }

    public function statemenUser($sql){
        return DB::statement($sql);
    }

    public function learnQueryBuilder(){
        // Lay tat ca ban ghi cua table
        $list = DB::table($this->table)->get();

        // Lay 1 ban ghi dau tien cua table
        $detail = DB::table($this->table)->first();

        DB::enableQueryLog();
        // Lay thong tin theo cot
        $listColumn = DB::table($this->table)
            ->select('email','username as hoten')
            ->where('id','>',2)
//            ->orWhere('id',3)
            ->get();

        $listColumn2 = DB::table($this->table)
            ->select('email','username as hoten')
            ->where([
                'id' => [6],
                'username'=> 'さくらあきらかあ'
            ])
//            ->toSql();
            ->get();

//        dd($listColumn2);

        DB::enableQueryLog();
        $id = 6;
        // cau lenh "select `username` as `hoten`, `email`, `id` from `users` where `id` = 18 and (`id` < 20 or `id` > 20)"
        $listColumn3 = DB::table($this->table)
            ->select('username as hoten','email','id')
//            ->where('id','>',0)
//                ->whereBetween('id',[1,2]) // truy van theo khoang
//                ->whereNotBetween('id',[1,3])
                ->whereIn('id',[1,3])
            ->where('email','like','%hoang%')   // truy van theo keyword
            ->where(function ($query) use ($id){
                $query->where('id','<',$id)->orWhere('id','>',$id);
            })
            ->get();
        dd($listColumn3);
        dd(DB::getQueryLog());
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;


class Users extends Model
{
    use HasFactory;

    protected $table = 'users';

    public function getAllUser()
    {
        $users = DB::select('SELECT * FROM users ORDER BY create_at DESC;');

        return $users;
    }

    public function addUser($data)
    {
        DB::insert('INSERT INTO users (username, email, create_at) values (?,?,?)', $data);
    }

    public function getDetail($id)
    {
        return DB::select('SELECT * FROM ' . $this->table . ' WHERE id = ?', [$id]);
    }

    public function updateUser($data, $id)
    {
        $data[] = $id;
        return DB::update('UPDATE ' . $this->table . ' SET username=?, email=?, update_at=? WHERE id = ?', $data);
    }

    public function deleteUser($id)
    {
        return DB::delete('DELETE FROM ' . $this->table . ' WHERE id=?', [$id]);
    }

    public function statemenUser($sql)
    {
        return DB::statement($sql);
    }

    public function learnQueryBuilder()
    {
        // Lay tat ca ban ghi cua table
        $list = DB::table($this->table)->get();

        // Lay 1 ban ghi dau tien cua table
        $detail = DB::table($this->table)->first();

        DB::enableQueryLog();
        // Lay thong tin theo cot
        $listColumn = DB::table($this->table)
            ->select('email', 'username as hoten')
            ->where('id', '>', 2)
//            ->orWhere('id',3)
            ->get();

        $listColumn2 = DB::table($this->table)
            ->select('email', 'username as hoten')
            ->where([
                'id' => [6],
                'username' => 'さくらあきらかあ'
            ])
//            ->toSql();
            ->get();

//        dd($listColumn2);

        DB::enableQueryLog();
        $id = 6;

//        $listColumn3 = DB::table($this->table)
//            ->select('username as hoten', 'email', 'id')
//            ->where('id','>',0)
//                ->whereBetween('id',[1,2]) // truy van theo khoang
//                ->whereNotBetween('id',[1,3])
//                ->whereIn('id',[1,3])
//            ->where('email','like','%hoang%')   // truy van theo keyword
//            ->where(function ($query) use ($id){
//            // cau lenh "select `username` as `hoten`, `email`, `id` from `users` where `id` = 18 and (`id` < 20 or `id` > 20)"
//                $query->where('id','<',$id)->orWhere('id','>',$id);
//            })
//                ->whereDate('update_at','2022-07-24')
//                ->whereMonth('create_at','07')
//                ->whereColumn('create_at','=','update_at')

//            ->get();


        // Join bang
//        $list =DB::table('users')
//            -> select('users.*','groups.name as group_name')
//            ->join('groups', 'users.group_id','=','groups.id')
//                ->orderBy('id','DESC')
//            ->orderBy('create_at','desc')
//                ->select(DB::raw('count(id) as email_count'), 'email','username')
//            ->groupBy('email')
//            ->groupBy('username')
//            ->having('email_count','>=','2')
//                ->limit(2)
//            ->offset(2)
//            ->get();

//        dd($list);


        // Them du lieu vao bang
//         $status = DB::table('users')->insert([
//           'username' => 'Nguyen van b',
//           'email' => 'nguyenvanb@gmail.com',
//           'group_id' => 1,
//           'create_at' => date('Y-m-d H:i:s')
//        ]);

//         $lastId = DB::getPdo()->lastInsertId();

//            $lastId = DB::table('users')->insertGetId([
//                           'username' => 'Nguyen van b',
//           'email' => 'nguyenvanb@gmail.com',
//           'group_id' => 1,
//           'create_at' => date('Y-m-d H:i:s')
//            ]);
//
//            $status = DB::table('users')
//                ->where('id',10)
//                ->update([
//                    'username' => 'Ten da thay doi',
//                    'email' => 'tenthaydoi@gmail.com',
//                    'update_at'=>date('Y-m-d H:i:s')
//                ]);

//            $deleteStatus = DB::table('users')
//                ->where('id',11)
//            ->delete();

        // Dem so ban ghi
//        $count = DB::table('users')->where('id', '>',2)->count();

        // DB Raw
        $list = DB::table('users')
            ->select(
                DB::raw('`username` as hoten, `email`')
            )
//            ->groupBy('email')
                ->where(DB::raw('id>20'))
            ->get();


        // select Raw
        $list2 = DB::table('users')
            ->selectRaw('username, email')
            ->groupBy('email')
            ->get();

//        dd($count);
        dd(DB::getQueryLog());
    }
}

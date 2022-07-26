<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Minh extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = [
        'id', 'name', 'email', 'password',
    ];

    public function loadList($param = [])
    {
        $query = DB::table($this->table)
            ->select($this->fillable);
        $lists = $query->get();
        return $lists;
    }

    public function loadListWithPage($params = [])
    {
        $query = DB::table($this->table)
            ->select($this->fillable);
        $lists = $query->paginate(10);
        return $lists;
    }
    public function saveNew($params)
    {
        $data = array_merge($params, [
            'password' => Hash::make($params['password'])
        ]);
        // dd($data);
        $res = DB::table('users')->insertGetId($data);
        return $res;
    }

    public function loadOne($id, $param = null)
    {
        $query = DB::table($this->table)->where('id', $id);
        $obj = $query->first();
        return $obj;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SinhVien extends Model
{
    use HasFactory;
    protected $table = 'sinh-viens';

    protected $fillable = ['id', 'khoa', 'tensv', 'tuoi'];

    public function loadList($param = [])
    {
        $query = DB::table($this->table)
            ->where('tuoi', '>',  22)
            ->select($this->fillable);
        $lists = $query->get();
        return $lists;
    }

    public function loadListWithPage($param = [])
    {
        $list = DB::table($this->table)
            ->select($this->fillable)
            ->paginate(10);
        return $list;
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
}

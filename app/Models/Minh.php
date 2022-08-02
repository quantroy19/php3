<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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

    public function saveUpdate($params)
    {
        if (empty($params['cols']['id'])) {
            Session::flash('error', 'Ko xac dinh ban ghi cap nhat');
        }

        $dataUpdate = [];
        foreach ($params['cols'] as $colName => $val) {
            if ($colName == 'id') continue;
            if (in_array($colName, $this->fillable)) {
                $dataUpdate[$colName] = (strlen($val) == 0) ? null : $val;
            }
        }

        $res = DB::table($this->table)
            ->where('id', $params['cols']['id'])
            ->update($dataUpdate);

        return $res;
    }
}

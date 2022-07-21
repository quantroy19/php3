<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Minh extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = [
        'id', 'name', 'email',
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
        $lists = $query->paginate(1);
        return $lists;
    }
}

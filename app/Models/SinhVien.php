<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
}

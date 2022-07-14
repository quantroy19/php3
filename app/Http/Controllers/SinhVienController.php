<?php

namespace App\Http\Controllers;

use App\Models\SinhVien;
use Illuminate\Http\Request;

class SinhVienController extends Controller
{
    protected $v;
    public function __construct()
    {
        $this->v = [];
    }
    public function loadListSV()
    {
        $obsSinhVien = new SinhVien();
        $this->v['listSv'] = $obsSinhVien->loadList();
        return view('sinhVien.index', $this->v);
    }
}

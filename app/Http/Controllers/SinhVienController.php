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
        $this->v['list'] = $obsSinhVien->loadList();
        return view('user.index', $this->v);
    }

    public function listSv()
    {
        $obsSinhVien = new SinhVien();
        $this->v['title'] = __('sinh vien');
        $this->v['listSv'] = $obsSinhVien->loadListWithPage();
        return view('sinhVien.index', $this->v);
    }
}

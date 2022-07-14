<?php

namespace App\Http\Controllers;

use App\Models\Minh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MinhController extends Controller
{
    private  $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function showName()
    {
        // $this->v['name'] = "MINH Quan";
        // return view('minh.index', $this->v);
        // $this->v['users'] = DB::table('users')->get();
        $obsMinh = new Minh();
        $this->v['users'] = $obsMinh->loadList();
        return view('minh.index', $this->v);
    }
}

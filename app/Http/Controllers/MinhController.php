<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MinhController extends Controller
{
    private  $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function showName(){
        $this->v['name'] = "MINH Quan";
        return view('minh.index', $this->v);
    }
}

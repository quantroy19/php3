<?php

namespace App\Http\Controllers;

use App\Models\Quan;
use Illuminate\Http\Request;

class QuanController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }
    public function index()
    {
         dd(Quan::all());
    }

    public function quan()
    {
        echo "Hello Quan Do Minh";
    }

    public function showViewQuan()
    { $hi='hi';
        $this->v['tieude'] = 'quan';
        $this->v['tieude2'] = 'quan2';
        $this->v['tieude3'] = 'quan3';
        return view('quan.index', $this->v);
    }
}

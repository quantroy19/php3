<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Minh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
        $this->v['list'] = $obsMinh->loadList();
        $this->v['title'] = __('Nguoi dung');
        return view('user.index', $this->v);
    }

    public function listUser()
    {
        $obsMinh = new Minh();
        $this->v['list'] = $obsMinh->loadListWithPage();
        $this->v['title'] = __('Nguoi dung');
        return view('user.index', $this->v);
    }
    public function add(UserRequest $request)
    {
        $this->v['_title'] = __('sinh vien');
        $method_route = 'route_backend_user_add';
        if ($request->isMethod('post')) {
            // dd($request->post());
            $params = $request->post();
            unset($params['_token']);
            $obsSinhVien = new Minh();
            $res = $obsSinhVien->saveNew($params);

            if ($res) {
                Session::flash('success', 'them moi thanh cong nguoi dung');
            } else {
                // return view('user.index')
            }
        }
        return view('user.add', $this->v);
    }

    public function detail($id)
    {
        $this->v['_title'] = __('chi tiet nguoi dung');
        $obj = new Minh();
        $this->v['user'] = $obj->loadOne($id);
        // dd($this->v);
        return view('user.detail', $this->v);
    }
}

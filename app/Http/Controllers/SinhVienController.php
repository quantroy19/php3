<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\SinhVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        $this->v['title'] = __('sinh vien');
        $this->v['list'] = $obsSinhVien->loadList();
        dd($this->v['list']);
        return view('user.index', $this->v);
    }

    public function listSv()
    {
        $obsSinhVien = new SinhVien();
        $this->v['title'] = __('sinh vien');
        $this->v['listSv'] = $obsSinhVien->loadListWithPage();
        return view('sinhVien.index', $this->v);
    }

    public function add(UserRequest $request)
    {
        $this->v['_title'] = __('sinh vien');
        $method_route = 'route_backend_user_add';
        if ($request->isMethod('post')) {
            // dd($request->post());
            $params = $request->post();
            unset($params['_token']);
            $obsSinhVien = new SinhVien();
            $res = $obsSinhVien->saveNew($params);

            if ($res) {
                Session::flash('success', 'them moi thanh cong nguoi dung');
            } else {
                // return view('user.index')
            }
        }
        return view('user.add', $this->v);
    }
}

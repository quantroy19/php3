<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Minh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        $params = [];
        $method_route = 'route_backend_user_add';
        if ($request->isMethod('post')) {
            // dd($request->post());
            $params = $request->post();
            unset($params['_token']);
            if ($request->hasFile('cmt_mat_truoc') && $request->file('cmt_mat_truoc')->isValid()) {
                $params['image'] = $this->uploadFile($request->file('cmt_mat_truoc'));
            }

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

    public function update($id, Request $request)
    {
        $method_route = 'user.updates';
        $params = [];
        $params['cols'] = $request->post();
        unset($params['cols']['_token']);
        $obj = new Minh();
        $objItem = $obj->loadOne($id);
        $params['cols']['id'] = $id;
        if (!is_null($params['cols']['password'])) {
            $params['cols']['password'] = Hash::make($params['cols']['password']);
        }
        $res = $obj->saveUpdate($params);
        if ($res == null) {
            return redirect()->route($method_route, ['id' => $id]);
        } elseif ($res == 1) {
            Session::flash('success', 'Cap nhat thanh cong ban ghi ' . $objItem->id);
            return redirect()->route($method_route, ['id' => $id]);
        } else {
            Session::flash('error', 'Loi cap nhat ' . $objItem->id);
            return redirect()->route($method_route, ['id' => $id]);
        }
    }

    public function uploadFile($file)
    {
        $fileName = time() . '.' . $file->getClientOriginalName();
        return $file->storeAs('cmnd', $fileName, 'public');
    }
}

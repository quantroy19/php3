<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function getViewLogin()
    {
        return view('auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        // $rules =  [
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ];
        // $validator = Validator::make($request->all(), $rules);
        // if ($validator->failed()) {
        //     return 
        // }

        $email = $request->email;
        $password = $request->password;
        // dd($email, $password);

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect('sinhVien');
        } else {
            return redirect('login')->with('error', 'Loi roi nhe');
        }
        // return dd($request->all());
    }
}

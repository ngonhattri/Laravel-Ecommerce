<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;
class AuthController extends Controller
{
    public function login(Request $request)
    {
        $rule = [
            'username'=>'required',
            'password'=>'required'
        ];
        $message = [
            'username.required' => 'Bạn chưa nhập username',
            'password.required'=> 'Bạn chưa nhập mật khẩu'
        ];
        $validator = Validator::make($request->all(),$rule,$message);
        if ($validator->fails()) {
            return response()->json([
                'success'=>false,
                'message'=>$validator->errors()->first()
            ],422);
        }
        else {
            $username = $request->input('username');
            $password = $request->input('password');
            if( Auth::guard('admin')->attempt(['username' => $username, 'password' =>$password],$request->has('remember'))) {
    			return response()->json([
                    'success'=>true,
                    'message'=>'Đăng nhập thành công'
                ],200);
            }
            else {
    			return response()->json([
                    'success' => false,
                    'message'=>'Sai thông tin đăng nhập'
                ], 422);
            }
        }
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/qanivia/login');
    }
    public function viewLogin()
    {
        if (Auth::guard('admin')->check()) {
            return redirect('/qanivia');
        }
        return view('server.login');
    }
    public function check()
    {
        return Auth::guard('admin')->user();
    }
}

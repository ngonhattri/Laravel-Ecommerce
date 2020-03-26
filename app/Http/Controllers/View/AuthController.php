<?php

namespace App\Http\Controllers\View;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\School;
use App\Http\Requests\UserRequest;
use Hash;
use Validator;
use Auth;
use App\Models\User;
use App\Notifications\UserRegisteredSuccessfully;
class AuthController extends Controller
{
    public function getRegister()
    {
        $schools = School::all();
        return view('client.pages.register',compact('schools'));
    }
    public function getLogin()
    {
        if (Auth::guard('web')->check()) {
            return redirect()->route('home'); 
        }
        return view('client.pages.login');
    }
    public function postRegister(UserRequest $request)
    {
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'id_school'=>$request['id_school'],
            'phone'=>$request['phone'],
            'password' => bcrypt($request['password']),
            'activation_code' => str_random(30).time()
        ]);
        $user->notify(new UserRegisteredSuccessfully($user));
        return redirect()->route('login')->with('status','Bạn đã đăng ký thành công, vui lòng xác nhận tài khoản'); 
    }
    public function activateUser(string $activationCode)
    {
        $user = User::where('activation_code', $activationCode)->first();
        if (!$user) {
            return "Mã xác thực không tồn tại trong hệ thống";
        }
        $user->activation_code = null;
        $user->save();
        return redirect()->route('login')->with('status','Xác thực tài khoản thành công'); 
    }
    public function postLogin(Request $request)
    {
        $rule = [
            'email'=>'required',
            'password'=>'required'
        ];
        $message = [
            'email.required' => 'Bạn chưa nhập email',
            'password.required'=> 'Bạn chưa nhập mật khẩu'
        ];
        $validator = Validator::make($request->all(),$rule,$message);
        if ($validator->fails()) {
            return redirect()->route('login')->with('error',$validator->errors()->first()); 
        }
        else {
            $email = $request->input('email');
            $password = $request->input('password');
            if( Auth::guard('web')->attempt(['email' => $email, 'password' =>$password],$request->has('remember'))) {
                if(Auth::guard('web')->user()['activation_code'] != null) {
                    Auth::guard('web')->logout();
                    return redirect()->route('login')->with('error','Tài khoản chưa kích hoạt'); 
                } else {
                    return redirect()->route('home'); 
                }
            }
            else {
    			return redirect()->route('login')->with('error','Sai thông tin đăng nhập'); 
            }
        }
    }
    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('home');
    }
}

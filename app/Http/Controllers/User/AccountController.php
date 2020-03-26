<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\User;
use App\Models\School;
use Validator;
use Hash;
class AccountController extends Controller
{
    public function get()
    {
        $user = Auth::guard('web')->user();
        $school = School::where('id',$user->id_school)->first();
        return response()->json([
            'success'=>true,
            'user'=>$user,
            'school'=>$school
        ],200);
    }
    public function put(Request $req)
    {
    	$user = Auth::guard('web')->user();
    	$user->name = $req->name;
    	$user->id_school = $req->id_school;
    	$user->phone = $req->phone;
    	$user->facebook = $req->facebook;
    	$user->instagram = $req->instagram;
    	$user->about = $req->about;
    	$user->save();
    	return $user;
    }
    public function getSchool()
    {
    	return School::all();
    }
    public function putPassword(Request $request)
    {
    	$rule = [
            'password'=>'required|same:password',
            'password_confirmation' => 'required|same:password', 
            'current_password'=>'required'
        ];
        $message = [
            'password.required'=> 'Bạn chưa nhập mật khẩu',
            'current_password.required'=> 'Bạn chưa nhập mật khẩu hiện tại',
            'password_confirmation.same'=> 'Mật khẩu nhập lại không chính xác'
        ];
        $validator = Validator::make($request->all(),$rule,$message);
        if ($validator->fails()) {
            return response()->json([
                'success'=>false,
                'message'=>$validator->errors()->first()
            ],422);
        }
        else {
        	$current_password = Auth::guard('web')->user()->password;           
	      	if(Hash::check($request->current_password, $current_password))
	      	{           
	        	$user = Auth::guard('web')->user();
	        	$user->password = Hash::make($request->password);
	        	$user->save(); 
	        	return response()->json([
                    'success'=>true,
                    'message'=>'Đổi mật khẩu thành công'
                ],200);
	      	}
	      	else
	      	{           
	        	return response()->json([
	                'success' => false,
	                'message'=>'Sai thông tin đăng nhập'
	            ], 422);
	      	}
        }	
    }
    public function postAvatar(Request $request)
    {
        if($request->hasFile('file'))
        {
            $user = Auth::guard('web')->user();
            $file = $request->file;
            $filename = time().'.'.request()->file->getClientOriginalExtension();
            $request->file->move('images/avatars/'.$user->email,$filename);
            $user->avatar = 'images/avatars/'.$user->email.'/'.$filename;
            $user->save();
        }
        else
        {
            return response()->json([
                'success' => false,
                'message'=>'Bạn hãy chọn hình'
            ], 422);
        }
    } 
}

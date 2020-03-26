<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|max:150',
            'phone'=>'required|max:20',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed|max:16|min:6',
            'id_school'=>'required',
            'rule'=>'accepted',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên',
            'id_school.required' => 'Bạn chưa chọn trường',
            'email.unique' => 'Tài khoản đã tồn tài',
            'name.max'=>'Bạn không được nhập nhiều hơn 150 chữ',
            'phone.max'=>'Bạn không được nhập nhiều hơn 20 số',
            'email.required'  => 'Bạn chưa nhập email',
            'email.email'  => 'Email không đúng định dạng',
            'password.required'  => 'Bạn chưa nhập mật khẩu',
            'password.max'  => 'Bạn không được nhập nhiều hơn 16 chữ',
            'password.min'  => 'Bạn không được nhập ít hơn 6 chữ',
            'rule.accepted'  => 'Bạn nên đọc điều khoản trước khi đăng ký',
        ];
    }
}

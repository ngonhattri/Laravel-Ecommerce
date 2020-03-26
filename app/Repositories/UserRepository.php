<?php
namespace App\Repositories;
use App\Infrastructure\RepositoryBase;
use Illuminate\Support\Facades\Input;
use Validator;
use Hash;
interface IUserRepository
{
    public function getAll();

    public function requestAll($data);

    public function destroyMultiple($data);
}
class UserRepository extends RepositoryBase implements IUserRepository
{
    public function getModel()
    {
        return \App\Models\Admin::class;
    }
    public function getAll()
    {
        $keyword = Input::get('keyword', '');
        $result = $this->model->where('name', 'LIKE', '%' .$keyword. '%')->where('id','<>',1)->with('role')->paginate(10);
        return $result;
    }
    public function requestAll($request)
    {
        $data = $this->model;
        $data = $request;
        $data['password'] =  Hash::make($request['password']);
        return $data;
    }
    public function destroyMultiple($request)
    {
        $ids = $request->json();
        foreach($ids as $id)
        {
            $this->model->destroy($id);
        }
    }
    public function validator($data)
    {
        return Validator::make($data, [
            'name' => 'required',
            'username' => 'required|unique:admins',
            'password' => 'required|confirmed',
            'role_id' => 'required',
            'avatar'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'facebook'=>'required',
        ],[
            'name.required'=>'Chưa nhập tên',
            'username.required'=>'Chưa nhập tên đăng nhập',
            'username.unique'=>'Username đã tồn tại',
            'password.required'=>'Chưa nhập mật khẩu',
            'password.confirmed'=>'Mật khẩu nhập lại chưa chính xác',
            'role_id.required'=>'Chưa chọn role',
            'avatar.required'=>'Chưa thêm hình',
            'phone.required'=>'Chưa thêm số điện thoại',
            'address.required'=>'Chưa thêm địa chỉ',
            'facebook.required'=>'Chưa thêm facebook',
        ]);
    }
}

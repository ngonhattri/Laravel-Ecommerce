<?php
namespace App\Repositories;
use App\Infrastructure\RepositoryBase;
use Illuminate\Support\Facades\Input;
use Validator;
use App\Models\Permission;
use App\Models\RolePermission;
use App\Models\PermissionCategory;
interface IRoleRepository
{
    public function getAllRole();

    public function getAll();

    public function rolePermission($data,$id);

    public function destroyMultiple($data);

    public function getPermission();

    public function createRole($data);
    
    public function validator($data);
}
class RoleRepository extends RepositoryBase implements IRoleRepository
{
    public function getModel()
    {
        return \App\Models\Role::class;
    }
    public function getAll()
    {
        $keyword = Input::get('keyword', '');
        $result = $this->model->where('name', 'LIKE', '%' .$keyword. '%')->where('id','<>',1)->paginate(10);
        return $result;
    }
    public function getPermission()
    {
        return PermissionCategory::with('permission')->get();
    }
    public function destroyMultiple($request)
    {
        $ids = $request->json();
        foreach($ids as $id)
        {
            RolePermission::where('role_id',$id)->delete();
            $this->model->destroy($id);
        }
    }
    public function rolePermission($request,$id)
    {
        foreach($request as $value) {
            $role = new RolePermission();
            $role->role_id = $id;
            $role->permission_id = $value;
            $role->save();
        }
    }
    public function createRole($request)
    {
        $data = $this->model->create($request['data']);
        if(!empty($request['permissions'])) {
            $this->rolePermission($request['permissions'],$data->id);
        }
    }

    public function validator($data)
    {
        return Validator::make($data['data'], [
            'name' => 'required'
        ],[
            'name.required'=>'Chưa nhập tên danh mục'
        ]);
    }
    public function getAllRole()
    {
        $result = $this->model->where('id','<>',1)->get();
        return $result;
    }
}

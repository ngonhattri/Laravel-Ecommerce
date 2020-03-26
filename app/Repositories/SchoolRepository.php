<?php
namespace App\Repositories;
use App\Infrastructure\RepositoryBase;
use Illuminate\Support\Facades\Input;
use Validator;
interface ISchoolRepository
{
    public function getAll();

    public function requestAll($data);

    public function validator($data);
}
class SchoolRepository extends RepositoryBase implements ISchoolRepository
{
    public function getModel()
    {
        return \App\Models\School::class;
    }
    public function getAll()
    {
        $keyword = Input::get('keyword', '');
        $result = $this->model->select('id','name','image','address')
        ->where('name', 'LIKE', '%' . $keyword . '%')
        ->paginate(10);
        return $result;
    }
    public function requestAll($request)
    {
        $data = $this->model;
        $data = $request;
        $data['alias'] = str_slug($request['name'],'-');
        return $data;
    }
    public function validator($data)
    {
        return Validator::make($data, [
            'name' => 'required',
            'address'=>'required',
            'image'=>'required'
        ],[
            'name.required'=>'Chưa nhập danh mục',
            'address.required'=>'Chưa nhập địa chỉ',
            'image.required'=>'Chưa thêm ảnh'
        ]);
    }
}
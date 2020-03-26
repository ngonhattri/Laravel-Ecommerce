<?php
namespace App\Repositories;
use App\Infrastructure\RepositoryBase;
use Illuminate\Support\Facades\Input;
use Validator;
interface ICategoryRepository
{
    public function getAll();

    public function requestAll($data);

    public function validator($data);
}
class CategoryRepository extends RepositoryBase implements ICategoryRepository
{
    public function getModel()
    {
        return \App\Models\Category::class;
    }
    public function getAll()
    {
        $result = $this->model
        ->orderBy('display_order','ASC')->get();
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
            'display_order'=>'required|numeric'
        ],[
            'name.required'=>'Chưa nhập danh mục',
            'display_order.required'=>'Chưa nhập thứ tự hiển thị',
            'display_order.numeric'=>'Thứ tự hiển thị phải là số'
        ]);
    }
}

<?php
namespace App\Repositories;
use App\Infrastructure\RepositoryBase;
use Illuminate\Support\Facades\Input;
use Validator;
interface IRulesCategoryRepository
{
    public function getAll();

    public function requestAll($data);

    public function validator($data);
}
class RulesCategoryRepository extends RepositoryBase implements IRulesCategoryRepository
{
    public function getModel()
    {
        return \App\Models\RulesCategory::class;
    }
    public function getAll()
    {
        $result = $this->model->all();
        return $result;
    }
    public function requestAll($request)
    {
        $data = $this->model;
        $data = $request;
        $data['alias'] = str_slug($request['title'],'-');
        return $data;
    }
    public function validator($data)
    {
        return Validator::make($data, [
            'title' => 'required'
        ],[
            'title.required'=>'Chưa nhập danh mục'
        ]);
    }
}

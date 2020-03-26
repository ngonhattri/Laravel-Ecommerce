<?php
namespace App\Repositories;
use App\Infrastructure\RepositoryBase;
use Illuminate\Support\Facades\Input;
use Validator;
interface IRulesRepository
{
    public function getAll();

    public function requestAll($data);

    public function validator($data);

    public function destroyMultiple($data);
}
class RulesRepository extends RepositoryBase implements IRulesRepository
{
    public function getModel()
    {
        return \App\Models\Rules::class;
    }
    public function getAll()
    {
        $keyword = Input::get('keyword', '');
        $result = $this->model->select('id','title','id_category')
        ->where('title', 'LIKE', '%' . $keyword . '%')
        ->with('rules_categories')
        ->paginate(10);
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
            'title' => 'required',
            'content'=>'required'
        ],[
            'title.required'=>'Chưa nhập tên mục',
            'content.required'=>'Chưa nhập nội dung'
        ]);
    }
    public function destroyMultiple($request)
    {
        $ids = $request->json();
        foreach($ids as $id)
        {
            $this->model->destroy($id);
        }
    }
}

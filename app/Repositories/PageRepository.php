<?php
namespace App\Repositories;
use App\Infrastructure\RepositoryBase;
use Illuminate\Support\Facades\Input;
use Validator;
interface IPageRepository
{
    public function getAll();

    public function requestAll($data);

    public function validator($data);

    public function destroyMultiple($data);
}
class PageRepository extends RepositoryBase implements IPageRepository
{
    public function getModel()
    {
        return \App\Models\Page::class;
    }
    public function getAll()
    {
        $keyword = Input::get('keyword', '');
        $result = $this->model->select('id','name','alias','created_at','status')
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
            'content'=>'required'
        ],[
            'name.required'=>'Chưa nhập danh mục',
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

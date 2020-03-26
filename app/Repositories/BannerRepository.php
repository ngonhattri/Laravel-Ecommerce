<?php
namespace App\Repositories;
use App\Infrastructure\RepositoryBase;
use Illuminate\Support\Facades\Input;
use Validator;
interface IBannerRepository
{
    public function getAll();

    public function requestAll($data);

    public function validator($data);
}
class BannerRepository extends RepositoryBase implements IBannerRepository
{
    public function getModel()
    {
        return \App\Models\Banner::class;
    }
    public function getAll()
    {
        $keyword = Input::get('keyword', '');
        $result = $this->model->select('id','image','description','status')
        ->where('description', 'LIKE', '%' . $keyword . '%')
        ->paginate(10);
        return $result;
    }
    public function requestAll($request)
    {
        $data = $this->model;
        $data = $request;
        return $data;
    }
    public function validator($data)
    {
        return Validator::make($data, [
            'image' => 'required',
        ],[
            'image.required'=>'Chưa chọn hình ảnh',
        ]);
    }
}

<?php
namespace App\Repositories;
use App\Infrastructure\RepositoryBase;
use Illuminate\Support\Facades\Input;
use Validator;
interface IProductRepository
{
    public function getAll();

    public function showAll($id);
}
class ProductRepository extends RepositoryBase implements IProductRepository
{
    public function getModel()
    {
        return \App\Models\Product::class;
    }
    public function getAll()
    {
        $keyword = Input::get('keyword', '');
        $result = $this->model->where('name', 'LIKE', '%' .$keyword. '%')->where('status',0)->paginate(10);
        return $result;
    }

    public function showAll($id)
    {
        $result = $this->model->where('id',$id)->with('categories')->with('users')->first();
        $result->gallery = json_decode($result->gallery);
        return $result;
    }
}

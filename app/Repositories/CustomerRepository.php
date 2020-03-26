<?php
namespace App\Repositories;
use App\Infrastructure\RepositoryBase;
use Illuminate\Support\Facades\Input;
use Validator;
interface ICustomerRepository
{
    public function getAll();

    public function showAll($id);
}
class CustomerRepository extends RepositoryBase implements ICustomerRepository
{
    public function getModel()
    {
        return \App\Models\User::class;
    }
    public function getAll()
    {
        $keyword = Input::get('keyword', '');
        $result = $this->model->where('name', 'LIKE', '%' .$keyword. '%')->paginate(10);
        return $result;
    }

    public function showAll($id)
    {
        $result = $this->model->where('id',$id)->with('school')->with('products')->first();
        return $result;
    }
}

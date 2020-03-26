<?php
namespace App\Repositories;
use App\Infrastructure\RepositoryBase;
use Illuminate\Support\Facades\Input;
use Validator;
interface IContactRepository
{
    public function getAll();

    public function requestAll($data);

    public function validator($data);

    public function destroyMultiple($data);
}
class ContactRepository extends RepositoryBase implements IContactRepository
{
    public function getModel()
    {
        return \App\Models\Contact::class;
    }
    public function getAll()
    {
        $keyword = Input::get('keyword', '');
        $result = $this->model->select('id','email','phone','address')
        ->where('phone', 'LIKE', '%' . $keyword . '%')
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
            'email'=>'required',
            'phone'=>'required'
        ],[
            'email.required'=>'Chưa nhập địa chỉ email',
            'phone.required'=>'Chưa nhập số điện thoại',
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

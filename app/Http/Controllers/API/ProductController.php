<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
class ProductController extends Controller
{
    protected $model;
    public function __construct(ProductRepository $repository)
    {
        $this->model = $repository;
    }
    public function index()
    {
        $data = $this->model->getAll();
        return response()->json([
            'success'=>true,
            'data'=>$data,
        ],200);
    }
    public function show($id)
    {
        $data = $this->model->showAll($id);
        return response()->json([
            'success'=>true,
            'data'=>$data,
            'message'=>'Sửa danh mục thành công'
        ],200);
    }
    public function destroy($id)
    {
        $this->authorize('delete_product');
        $this->model->delete($id);
        return response()->json([
            'success'=>true,
            'message'=>'Xóa thành công'
        ],200);
    }
    public function checked($id)
    {
        $this->authorize('change_product');
        $data = $this->model->show($id);
        $data['status'] = !$data['status'];
        $data->save();
        return response()->json([
            'message'=>'Đổi thành công'
        ],200);
    }
}
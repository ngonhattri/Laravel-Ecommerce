<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
class AdminController extends Controller
{
    protected $model;
    public function __construct(UserRepository $repository)
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
    public function store(Request $request)
    {
        $this->authorize('account');
        $validator = $this->model->validator($request->all());
        if ($validator->fails()) {
            return response()->json([
                'success'=>false,
                'message'=>$validator->errors()->first()
            ],422);
        }
        $data = $this->model->create($this->model->requestAll($request->all()));
        return response()->json([
            'success'=>true,
            'message'=>'Thêm thành công'
        ],200);
    }
    public function destroy($id)
    {
        $this->authorize('account');
        $this->model->delete($id);
        return response()->json([
            'success'=>true,
            'message'=>'Xóa thành công'
        ],200);
    }
    public function deleteMultiple(Request $request)
    {
        $this->authorize('account');
        $this->model->destroyMultiple($request);
        return response()->json([
            'success'=>true,
            'message'=>'Xóa toàn bộ thành công'
        ],200);
    }
}
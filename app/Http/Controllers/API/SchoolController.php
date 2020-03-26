<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\SchoolRepository;
class SchoolController extends Controller
{
    protected $model;
    public function __construct(SchoolRepository $repository)
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
        $this->authorize('school');
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
    public function show($id)
    {
        $data = $this->model->show($id);
        return response()->json([
            'success'=>true,
            'data'=>$data,
            'message'=>'Sửa danh mục thành công'
        ],200);
    }
    public function update(Request $request, $id)
    {
        $this->authorize('school');
        $validator = $this->model->validator($request->all());
        if ($validator->fails()) {
            return response()->json([
                'success'=>false,
                'message'=>$validator->errors()->first()
            ],422);
        }
        $data = $this->model->update($this->model->requestAll($request->all()), $id);
        return response()->json([
            'success'=>true,
            'data'=>$data,
            'message'=>'Sửa thành công'
        ],200);
    }
    public function destroy($id)
    {
        $this->authorize('school');
        $this->model->delete($id);
        return response()->json([
            'success'=>true,
            'message'=>'Xóa thành công'
        ],200);
    }
}
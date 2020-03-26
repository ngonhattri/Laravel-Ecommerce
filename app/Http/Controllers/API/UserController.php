<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CustomerRepository;
class UserController extends Controller
{
    protected $model;
    public function __construct(CustomerRepository $repository)
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
            'data'=>$data
        ],200);
    }
}

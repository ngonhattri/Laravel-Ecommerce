<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Product;
use App\Models\Category;
use Validator;
class ProductController extends Controller
{
    public function get()
    {
        $user = Auth::guard('web')->user();
        $product = Product::where('id_user',$user->id)->paginate(10);
        return response()->json([
            'success'=>true,
            'data'=>$product
        ],200);
    }
    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return response()->json([
            'success'=>true,
            'message'=>'Xóa thành công'
        ],200);
    }
    public function category()
    {
        return Category::all();
    }
    public function post(Request $request)
    {
        $user = Auth::guard('web')->user();
        $image = array();
        if($request->hasFile('files'))
        {
            foreach($request->files as $files) {
                foreach($files as $key => $file) {
                    $filename = time().$key.'.'.$file->getClientOriginalExtension();
                    $file->move('images/products/'.$user->email,$filename);
                    array_push($image,'images/products/'.$user->email.'/'.$filename);
                }
            }
            $product = new Product;
            $product->name = $request->data['name'];
            $product->alias = str_slug($request->data['name'],'-');
            $product->content = $request->data['content'];
            $product->price = $request->data['price'];
            $product->facebook = $request->data['facebook'];
            $product->phone = $request->data['phone'];
            if($request->data['quantity'] == 0 || $request->data['quantity'] == null) {
                $product->out_of_stock = 0;
            } else {
                $product->out_of_stock = 1;
            }
            $product->quantity = $request->data['quantity'];
            $product->status = 0;
            $product->gallery = json_encode($image);
            $product->meta_keyword = $request->data['name'];
            $product->meta_description = $request->data['name'];
            $product->id_category = $request->data['id_category'];
            $product->out_of_stock = 1;
            $product->id_user = $user->id;
            $product->save(); 
            return response()->json([
                'success'=>true,
                'message'=>'Thêm thành công'
            ],200);
        }
        else
        {
            return response()->json([
                'success' => false,
                'message'=>'Bạn hãy chọn hình'
            ], 422);
        }
    }
    public function postImage(Request $request,$id)
    {
        $user = Auth::guard('web')->user();
        $image = array();
        if($request->hasFile('files'))
        {
            foreach($request->files as$files) {
                foreach($files as $key => $file) {
                    $filename = time().$key.'.'.$file->getClientOriginalExtension();
                    $file->move('images/products/'.$user->email,$filename);
                    array_push($image,'images/products/'.$user->email.'/'.$filename);
                }
            }
            $product = Product::find($id);
            if($product->id_user == $user->id) {
                $product->gallery = json_encode($image);
                $product->status = 0;
                $product->save(); 
                return response()->json([
                    'success'=>true,
                    'message'=>'Sửa thành công'
                ],200);
            }
            else {
                return response()->json([
                    'message'=>'Lỗi truy cập'
                ],401);
            }
            
        }
        else
        {
            return response()->json([
                'success' => false,
                'message'=>'Bạn hãy chọn hình'
            ], 422);
        }
    }
    public function update(Request $request, $id)
    {
        $user = Auth::guard('web')->user();
        $product = Product::find($id);
        if($product->id_user == $user->id) {
            $product->name = $request->name;
            $product->alias = str_slug($request->name,'-');
            $product->content = $request->content;
            $product->price = $request->price;
            $product->facebook = $request->facebook;
            $product->phone = $request->phone;
            $product->quantity = $request->quantity;
            if($request->quantity == 0 || $request->quantity == null) {
                $product->out_of_stock = 0;
            } else {
                $product->out_of_stock = 1;
            }
            $product->status = 0;
            $product->meta_keyword = $request->name;
            $product->meta_description = $request->name;
            $product->id_category = $request->id_category;
            $product->save(); 
            return response()->json([
                'success'=>true,
                'message'=>'Thêm thành công'
            ],200);
        }
        else {
            return response()->json([
                'message'=>'Lỗi truy cập'
            ],401);
        }
    }
    public function getDetail($id)
    {
        $user = Auth::guard('web')->user();
        $product = Product::find($id);
        if($product->id_user == $user->id) {
            return Product::find($id);
        }
        else {
            return response()->json([
                'message'=>'Không tìm thấy sản phẩm'
            ],404);
        }
    }
}

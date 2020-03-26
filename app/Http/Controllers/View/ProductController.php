<?php

namespace App\Http\Controllers\View;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
class ProductController extends Controller
{
    public function get($id,$alias)
    {
        $product = Product::where('id',$id)->with('users')->first();
        if($product->status == 0){
            abort(404);
        }
        foreach (json_decode($product->gallery) as $key=> $value) {
        	if($key == 0) {
        		$image = $value;
        	}
        }
        return view('client.pages.detail',compact('product','image'));
    }
}

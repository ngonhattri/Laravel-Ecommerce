<?php

namespace App\Http\Controllers\View;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
class CategoryController extends Controller
{
    public function get($alias)
    {
        $categories = Category::all();
        $school = School::where('alias',$alias)->first();
        $users = User::where('id_school',$school->id)->get();
        foreach($users as $user) {
            $products = Product::where('id_user',$user->id)->where('status',1)->with('users')->paginate(8);
        }
    	return view('client.pages.category',compact('products','categories','school'));
    }
    public function getDetail($alias,$id)
    {
    	$products_array = array();
        $categories = Category::all();
        $school = School::where('alias',$alias)->first();
        $users = User::where('id_school',$school->id)->get();
        foreach($users as $user) {
            $products = Product::where('id_user',$user->id)->where('id_category',$id)->where('status',1)->with('users')->get();
            foreach($products as $product) {
                array_push($products_array,$product);
            }
        }
    	return view('client.pages.category_detail',compact('products_array','categories','school'));
    }
}

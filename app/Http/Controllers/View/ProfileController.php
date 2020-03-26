<?php

namespace App\Http\Controllers\View;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
class ProfileController extends Controller
{
    public function get($id,$alias)
    {
        $user = User::where('id',$id)->with('school')->with('products')->first();
        return view('client.pages.profile',compact('user'));
    }
}

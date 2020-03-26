<?php

namespace App\Http\Controllers\View;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;
class PageController extends Controller
{
    public function get($alias)
    {
        $data = Page::where('alias',$alias)->first();
        if($data->status == 0) {
            abort(404);
        }
        return view('client.pages.page',compact('data'));
    }
}

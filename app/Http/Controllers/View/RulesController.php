<?php

namespace App\Http\Controllers\View;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RulesCategory;
class RulesController extends Controller
{
    public function get()
    {
        $rules = RulesCategory::with('rules')->get();
    	return view('client.pages.rules',compact('rules'));
    }
}

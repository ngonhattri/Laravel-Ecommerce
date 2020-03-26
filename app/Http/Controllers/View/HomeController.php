<?php

namespace App\Http\Controllers\View;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\School;
class HomeController extends Controller
{
    public function get()
    {
        $schools = School::all();
        return view('client.pages.index',compact('schools'));
    }
}

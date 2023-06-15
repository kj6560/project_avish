<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(Request $request){
        return view('site.admin.index');
    }
    public function createCategory(Request $request){
        return view('site.admin.createCategory');
    }
}

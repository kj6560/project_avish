<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Sports;
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

    public function storeCategory(Request $request){
        $data = $request->all();
        if(!empty($data)){
            unset($data['_token']);
            $data['image'] = $data['file']->store('image', 'public/uploads/category/images');
            $category = Sports::create($data);
            if($category){
                return redirect()->back()->with('success','Category created successfully');
            }else{
                return redirect()->back()->with('error','Category creation Failed');
            }
        }
    }
}

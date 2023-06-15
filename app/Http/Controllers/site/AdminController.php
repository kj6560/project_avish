<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Sports;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('site.admin.index');
    }
    public function createCategory(Request $request)
    {
        return view('site.admin.createCategory');
    }

    public function storeCategory(Request $request)
    {
        $data = $request->all();
        if (!empty($data)) {
            unset($data['_token']);
            $imageName = time().'.'.$request->image->extension();
            $request->file->move(public_path('/uploads/category/images'), $imageName);
            $data['icon'] = $imageName;
            $category = Sports::create($data);
            if ($category) {
                return redirect()->back()->with('success', 'Category created successfully');
            } else {
                return redirect()->back()->with('error', 'Category creation Failed');
            }
        }
    }
}

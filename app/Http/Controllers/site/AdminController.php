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
            $validatedData = $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        
               ]);
        
               $name = $request->file('image')->getClientOriginalName();
        
               $path = $request->file('image')->store('public/images');
        
        
               echo "path";die;
            return back()
                ->with('success', 'You have successfully upload image.')
                ->with('image', $imageName);
        }
    }
}

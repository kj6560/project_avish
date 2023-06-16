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
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('uploads/category/images'), $imageName);

            return back()
                ->with('success', 'You have successfully upload image.')
                ->with('image', $imageName);
        }
    }
}

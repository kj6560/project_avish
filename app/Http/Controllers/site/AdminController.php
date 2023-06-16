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
            $validatedData = $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        
               ]);
               if($validatedData){
                $name = $request->file('image')->getClientOriginalName();
                $path = $request->file('image')->store('uploaded_files');
                $Sports = Sports::create([
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'icon'=>$path
                ]);
                if($Sports){
                    return back()
                    ->with('success', 'You have successfully upload image.');
                }else{
                    return back()
                ->with('error', 'You have some error.');
                }
               }else{
                return back()
                ->with('error', $validatedData->getErros());
               }
        
            
        }else{
            echo "no data ";
        }
    }
    public function categoryList(Request $request){
        $Sports = Sports::all();
        return view('site.admin.categoryList',['categories'=>$Sports]);
    }
}

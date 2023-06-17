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
            if ($validatedData) {
                if (!empty($_FILES['image'])) {
                    $errors = array();
                    $file_name = $_FILES['image']['name'];
                    $file_size = $_FILES['image']['size'];
                    $file_tmp = $_FILES['image']['tmp_name'];
                    $file_ext = strtolower(explode('.', $_FILES['image']['name'])[1]);

                    $extensions = array("jpeg", "jpg", "png");

                    if (in_array($file_ext, $extensions) === false) {
                        $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
                    }

                    if ($file_size > 2097152) {
                        $errors[] = 'File size must be excately 2 MB';
                    }

                    if (empty($errors) == true) {
                        if(move_uploaded_file($file_tmp, "uploads/category/images/" . $file_name)){
                            $category = new Sports();
                            $category->name = $data['name'];
                            $category->icon = $file_name;
                            $category->description = $data['description'];
                            if($category->save()){
                                return redirect()->back()->with('success', 'category created successfully');
                            }else{
                                return redirect()->back()->with('error', 'category creation failed');
                            }
                        }else{
                            return redirect()->back()->with('error', 'failed to upload icon');
                        }
                        
                    } else {
                        print_r($errors);
                    }
                }else{
                    return redirect()->back()->with('error', 'please select icon');
                }
            }
        } else {
            return redirect()->back()->with('error', 'please fill all fields');
        }
    }
    public function categoryList(Request $request)
    {
        $Sports = Sports::all();
        return view('site.admin.categoryList', ['categories' => $Sports]);
    }
}

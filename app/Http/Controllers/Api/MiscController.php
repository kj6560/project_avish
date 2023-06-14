<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EventGallery;
use Illuminate\Http\Request;

class MiscController extends Controller
{
    
    public function getSliders(Request $request){
        $data = EventGallery::select('image')->orderby('id','desc')->get();
        return response()->json($data);
    }
}

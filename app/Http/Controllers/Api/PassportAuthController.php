<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PassportAuthController extends Controller
{
    public function register(Request $request)
    {
        $is_exist = User::where('email', $request->email)->first();
        if(empty($is_exist)){
            $user = new User([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'number' => $request->phone,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
            $user->save();
            if(!empty($user)){
                $user->createToken('LaravelAuthApp')->accessToken;
                return response()->json(['success' => true,'user'=>$user], 200);
            }else{
                return response()->json(['error' => true,'msg'=>'user not created'], 401);
            }
        }else{
            return response()->json(['error' => true,'msg'=>'user already exist by this email'], 402);
        }
        
    }
    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        $user = User::where('email', $data['email'])->first();
        if(!empty($user)){
            if (Hash::check($request->password, $user['password'])) {
                $token = $user->createToken('LaravelAuthApp')->accessToken;
                return response()->json(['token' => $token,'user'=>$user], 200);
            } else {
                return response()->json(['error' => 'Unauthorised'], 401);
            }
        }else{
            return response()->json(['error' => 'user email not registered'], 403);
        }
    }
}

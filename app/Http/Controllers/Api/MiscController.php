<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EventGallery;
use App\Models\User;
use App\Models\UserAddressDetails;
use App\Models\UserPersonalDetails;
use Illuminate\Http\Request;

class MiscController extends Controller
{

    public function getSliders(Request $request)
    {
        $data = EventGallery::select('image')->orderby('id', 'desc')->get();
        return response()->json($data);
    }

    public function setProfile(Request $request)
    {
        $data = $request->all();
        $user = auth()->user();
        if ($data) {
            if ($data['personal_details']) {
                $personal_details = $data['personal_details'];
                $first_name = $personal_details['first_name'];
                $last_name = $personal_details['last_name'];
                $number = $personal_details['number'];
                $email = $personal_details['email'];
                $user = User::where('email', $email)->first();
                $user->first_name = $first_name;
                $user->last_name = $last_name;
                $user->number = $number;
                $user->save();

                $birthday = $personal_details['birthday'];
                $gender = $personal_details['gender'];
                $married = $personal_details['married'];
                $height = $personal_details['height'];
                $weight = $personal_details['weight'];

                if (UserPersonalDetails::where('user_id', $user->id)->count() == 0) {
                    UserPersonalDetails::create([
                        'user_id' => $user->id,
                        'birthday' => $birthday,
                        'gender' => $gender,
                        'married' => $married,
                        'height' => $height,
                        'weight' => $weight
                    ]);
                } else {
                    UserPersonalDetails::where('user_id', $user->id)->update([
                        'birthday' => $birthday,
                        'gender' => $gender,
                        'married' => $married,
                        'height' => $height,
                        'weight' => $weight,
                    ]);
                }
                $user_personal_details = UserPersonalDetails::where('user_id', $user->id)->first();
            }

            if ($data['address_details']) {
                $address_details = $data['address_details'];
                if (UserAddressDetails::where('user_id', $user->id)->count() == 0) {
                    UserAddressDetails::create([
                        'address_line1' => $address_details['address_line1'],
                        'city' => $address_details['city'],
                        'state' => $address_details['state'],
                        'pincode' => $address_details['pincode']
                    ]);
                } else {
                    UserAddressDetails::where('user_id', $user->id)->update([
                        'address_line1' => $address_details['address_line1'],
                        'city' => $address_details['city'],
                        'state' => $address_details['state'],
                        'pincode' => $address_details['pincode']
                    ]);
                }
                $address_details = UserAddressDetails::where('user_id', $user->id)->first();
            }
        }
        return response()->json(['user'=>$user,'user_personal_details' => $user_personal_details, 'address_details' => $address_details]);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit_profile(Request $request)
    {
        $userdata = User::with(['people_info', 'user_access_settings', 'user_notification_settings', 'user_permission_settings', 'user_other_settings'])->where('id', auth('sanctum')->user()->id)->first();
        return response()->json(['status' => 1, 'message' => 'Successful', 'userdata' => $userdata], 200);
    }

    public function update_profile(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'phone' => 'required|unique:users,phone,' . auth('sanctum')->user()->id,
            'email' => 'required|unique:users,email,' . auth('sanctum')->user()->id,
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'zipcode' => 'required',
            'timezone' => 'required',
            'language' => 'required',
        ], [
            'fname.required' => 'First name is required',
            'lname.required' => 'Last name is required',
            'phone.required' => 'Phone number is required',
            'phone.unique' => 'Phone is already exist in use, Please try another!',
            'email.unique' => 'Email is already exist in use, Please try another!',
            'country.required' => 'Country is required',
            'state.required' => 'State is required',
            'city.required' => 'City is required',
            'zipcode.required' => 'Zipcode is required',
            'timezone.required' => 'Timezone is required',
            'language.required' => 'Language is required',
        ]);
        try {
            $user = User::find(auth('sanctum')->user()->id);
            if ($request->hasFile("image")) {
                $request->validate([
                    'image' => 'image|mimes:png,jpg,jpeg|max:10240',
                ], [
                    'image.image' => 'Please select an Image type of file',
                    'image.mimes' => 'Select only png, jpg OR jpeg type of Image file',
                    'image.max' => 'Maximum image file size: 10MB allowed!',
                ]);

                if (auth('sanctum')->user()->image != 'default.jpg' && file_exists('storage/app/public/assets/admin/images/users/' . auth('sanctum')->user()->image)) {
                    unlink('storage/app/public/assets/admin/images/users/' . auth('sanctum')->user()->image);
                }
                $image = 'user-' . uniqid() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(storage_path('app\public\assets\admin\images\users'), $image);
                $user->image = $image;
                $user->save();
            }
            $user->fname = $request->fname;
            $user->lname = $request->lname;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->country = $request->country;
            $user->state = $request->state;
            $user->city = $request->city;
            $user->zipcode = $request->zipcode;
            $user->timezone = $request->timezone;
            $user->language = $request->language;
            $user->save();
            return response()->json(['status' => 1, 'message' => 'Profile updated successfully'], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'message' => 'Something went wrong!'], 200);
        }
    }
}

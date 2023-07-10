<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.profile.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        abort_if($id != auth()->user()->id, 404);
        return view('admin.profile.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // "access" => array:9 [▼
        //     "dashboard" => "on"
        //     "facilities" => "on"
        //     "whoson" => "on"
        //     "schedule" => "on"
        //     "messaging" => "on"
        //     "total_billing" => "on"
        //     "people" => "on"
        //     "timecards" => "on"
        //     "support" => "on"
        // ]
        // "permissions" => array:9 [▼
        //     "create_reminders" => "on"
        //     "process_timecard" => "on"
        //     "messaging" => "on"
        //     "create_schedule" => "on"
        //     "report_timecard" => "on"
        //     "create_timecard" => "on"
        //     "delete_schedule" => "on"
        //     "add_points" => "on"
        //     "write_review" => "on"
        // ]
        // "notifications" => array:3 [▼
        //     "text_message" => "on"
        //     "email" => "on"
        //     "in_app_notifications" => "on"
        // ]
        abort_if($id != auth()->user()->id, 404);
        $validator = Validator::make($request->all(), [
            'fname' => 'required',
            'lname' => 'required',
            'phone' => 'required|unique:users,phone,' . auth()->user()->id,
            'email' => 'required|unique:users,email,' . auth()->user()->id,
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'zipcode' => 'required',
            'timezone' => 'required',
            'language' => 'required',
        ], [
            'new_password.different' => 'New password must be different to old password',
            'phone.unique' => 'Phone is already exist in use, Please try another!',
            'email.unique' => 'Email is already exist in use, Please try another!',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 0, 'message' => 'Something went wrong!', 'errors' => $validator->getMessageBag()], 200);
        }
        try {
            $cu = User::find(auth()->user()->id);
            if ($request->hasFile("image")) {
                $validator = Validator::make($request->all(), [
                    'image' => 'image|mimes:png,jpg,jpeg|max:10240',
                ], [
                    'image.image' => 'Please select an Image type of file',
                    'image.mimes' => 'Select only png, jpg OR jpeg type of Image file',
                    'image.max' => 'Maximum image file size: 10MB allowed!',
                ]);
                if ($validator->fails()) {
                    return response()->json(['status' => 0, 'message' => 'Something went wrong!', 'errors' => $validator->getMessageBag()], 200);
                }
                if (auth()->user()->image != 'default.jpg' && file_exists('storage/app/public/assets/admin/images/profile/' . auth()->user()->image)) {
                    unlink('storage/app/public/assets/admin/images/profile/' . auth()->user()->image);
                }
                $image = 'profile-' . uniqid() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(storage_path('app\public\assets\admin\images\profile'), $image);
                $cu->image = $image;
                $cu->save();
            }
            $cu->fname = $request->fname;
            $cu->lname = $request->lname;
            $cu->phone = $request->phone;
            $cu->email = $request->email;
            $cu->country = $request->country;
            $cu->state = $request->state;
            $cu->city = $request->city;
            $cu->zipcode = $request->zipcode;
            $cu->timezone = $request->timezone;
            $cu->language = $request->language;
            $cu->save();
            return response()->json(['status' => 1, 'message' => 'Profile updated successfully'], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'message' => 'Something went wrong!'], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function updatepassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|different:current_password',
            'confirm_password' => 'required|same:new_password',
        ], [
            'new_password.different' => 'New password must be different to old password',
            'confirm_password.same' => 'Confirm password must be same as New password',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 0, 'message' => 'Something went wrong!', 'errors' => $validator->getMessageBag()], 200);
        }
        if (Hash::check($request->current_password, auth()->user()->password)) {
            User::where('id', auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
            return response()->json(['status' => 1, 'message' => 'Password changed Successfully'], 200);
        } else {
            return response()->json(['status' => 0, 'message' => 'Old password is invalid!'], 200);
        }
    }
}

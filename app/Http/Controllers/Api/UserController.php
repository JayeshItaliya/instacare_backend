<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function changestatus(Request $request)
    {
        $request->validate([
            'status' => 'required',
        ]);
        try {
            User::where('id', auth('sanctum')->user()->id)->update(['status' => $request->status]);
            return response()->json(['status' => 1, 'message' => 'Successfull'], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'message' => 'Something went wrong!'], 200);
        }
    }

    public function changepassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|different:current_password',
            'confirm_password' => 'required|same:new_password',
        ], [
            'current_password.required' => 'Current password is required',
            'new_password.required' => 'New password is required',
            'new_password.min' => 'Password must be at least 8 characters in length',
            'new_password.different' => 'New password must be different to old password',
            'confirm_password.required' => 'Confirm password is required',
            'confirm_password.same' => 'Confirm password must be same as New password',
        ]);
        if (Hash::check($request->current_password, auth('sanctum')->user()->password)) {
            User::where('id', auth('sanctum')->user()->id)->update(['password' => Hash::make($request->new_password)]);
            return response()->json(['status' => 1, 'message' => 'Password changed successfully'], 200);
        } else {
            return response()->json(['status' => 0, 'message' => 'Old password is invalid!'], 200);
        }
    }
}

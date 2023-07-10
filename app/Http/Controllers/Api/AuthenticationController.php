<?php

namespace App\Http\Controllers\Api;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;

class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ], [
            'email.required' => 'Email is required',
            'email.email' => 'Invalid Email Address',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 8 characters in length',
        ]);
        $user = User::where('email', $request->email)->first();
        if (!empty($user) & Hash::check($request->password, $user->password)) {
            $token = $user->createToken('api_token')->plainTextToken;
            return response()->json(['status' => 1, 'message' => 'Successfull', 'token' => $token, 'userdata' => $user], 200);
        } else {
            return response()->json(['status' => 0, 'message' => 'Invalid Email/Password'], 200);
        }
    }

    public function logout(Request $request)
    {
        $token = explode('|',$request->bearerToken());
        auth('sanctum')->user()->tokens()->find($token[0])->delete();

        return response()->json(['status' => 1, 'message' => 'Logged out successfully']);
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ], [
            'email.required' => 'Email is required',
            'email.email' => 'Invalid Email Address',
        ]);
        if (!empty(User::where('email', $request->email)->first())) {
            if (empty(DB::table('password_reset_tokens')->where('email', $request->email)->first())) {
                DB::table('password_reset_tokens')->insert([
                    'email' => $request->email,
                    'token' => encrypt($request->email),
                ]);
            }
            $token = DB::table('password_reset_tokens')->where('email', $request->email)->first()->token;
            $url = URL::to('password/reset') . '/' . $token;
            $mail = Helper::resetpassword($request->email, $url);
            if ($mail == 1) {
                return response()->json(['status' => 1, 'message' => 'Email sent successfull'], 200);
            } else {
                return response()->json(['status' => 0, 'message' => 'Email Error'], 200);
            }
        } else {
            return response()->json(['status' => 0, 'message' => 'Invalid Email Address'], 200);
        }
    }
}

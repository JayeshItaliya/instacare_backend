<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\URL;

class AuthenticationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.auth.login');
    }

    /**
     * user login.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            if (Auth::user()->deleted_at == 0) {
                User::where('id', auth()->user()->id)->update(['is_web_login' => 1]);
                return redirect('/')->with('success', 'Login Successfully');
            } else {
                Auth::logout();
                return redirect()->back()->with('error', 'User has been deleted');
            }
        } else {
            return redirect()->back()->with('error', 'Email/Password are Invalid');
        }
    }

    /**
     * user logout.
     */
    public function logout()
    {
        User::where('id', auth()->user()->id)->update(['is_web_login' => 0]);
        Auth::logout();
        return redirect('login')->with('success', 'Logout Successfully');
    }

    /**
     * user forgot password.
     */
    public function forgot_password()
    {
        return view('admin.auth.forgot_password');
    }

    /**
     * user send link for reset password.
     */
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'email',
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
                return redirect('reset-password')->with('success', 'Success');
            } else {
                return redirect()->back()->with('error', 'Something went wrong');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid Email Address');
        }
    }

    /**
     * user send link for reset password.
     */
    public function showResetForm(Request $request)
    {
        return view('admin.auth.update_password');
    }

    /**
     * user send link for reset password.
     */
    public function reset(Request $request, $token)
    {
        $request->validate([
            'new_password' => 'min:8',
            'confirm_password' => 'same:new_password',
        ], [
            'new_password.min' => 'Password must be at least 8 characters in length',
            'confirm_password.same' => 'New Password and Confirm Password must be same'
        ]);
        $checktoken = DB::table('password_reset_tokens')->where('token', $token)->first();
        abort_if(empty($checktoken), 404);
        $user = User::where('email', $checktoken->email)->first();
        $user->password = Hash::make($request->new_password);
        if ($user->save()) {
            $checktoken->delete();
        }
        return redirect('login')->with('success', 'Success');
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
    public function show(AuthenticationController $authenticationController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AuthenticationController $authenticationController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AuthenticationController $authenticationController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AuthenticationController $authenticationController)
    {
        //
    }
}

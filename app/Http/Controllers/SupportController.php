<?php

namespace App\Http\Controllers;

use App\Models\ReasonSetting;
use App\Models\Support;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reasons = ReasonSetting::latest()->where('is_active', 1)->get();
        return view('admin.support.index', compact('reasons'));
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
        $validator = Validator::make($request->all(), [
            'reason' => 'required',
            'message' => 'required',
        ], [
            '*.required' => 'The :attribute field is required!',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 0, 'message' => 'Something went wrong!', 'errors' => $validator->getMessageBag()], 200);
        }
        try {
            $s = new Support();
            $s->reason = $request->reason;
            $s->message = $request->message;
            $s->save();
            $ae = User::select('email')->where('type', 1)->first()->email;
            $data = ['title' => 'Support', 'email' => $ae, 'reason' => $request->reason, 'msg' => $request->message];
            Mail::send('email.support', $data, function ($message) use ($data) {
                $message->from(env('MAIL_USERNAME'))->subject($data['title']);
                $message->to($data['email']);
            });
            return response()->json(['status' => 1, 'message' => 'Successfull'], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'message' => 'Something went wrong!'], 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Support $support)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Support $support)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Support $support)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Support $support)
    {
        //
    }
}

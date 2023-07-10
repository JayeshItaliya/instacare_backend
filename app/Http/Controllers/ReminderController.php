<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Reminder;
use App\Models\Facilities;
use Illuminate\Support\Facades\Validator;

class ReminderController extends Controller
{
    public function fetchdata(Request $request)
    {
        // 1 - Instacare staff ---->  2-Facility ---->  3-Employee ---->  4-Facility Member
        try {
            if (!in_array($request->type,[1,2,3,4])) {
                return response()->json(['status' => 0, 'message' => 'Invalid Request!'], 200);
            }
            if (in_array($request->type,[1,3,4])) {
                $data = User::select('id', 'fname', 'lname', 'image','role');
                if ($request->type == 4) {
                    if ($request->ids == "" || count(explode(',',$request->ids)) == 0) {
                        return response()->json(['status' => 0, 'message' => 'Invalid Request!'], 200);
                    }
                    $data = $data->where('type', 3)->whereIn('facility_id',explode(',',$request->ids));
                }else{
                    $data = $data->where('type', $request->type+1);
                }
                $data = $data->latest()->get()->map(function ($item) {
                    $item->fullname = $item->fullname;
                    $item->image_url = $item->image_url;
                    return $item;
                });
            }else{
                $data = Facilities::select('id', 'name', 'image')->latest()->get()->map(function ($item) {
                    $item->fullname = $item->name;
                    $item->image_url = $item->image_url;
                    return $item;
                });
            }
            return response()->json(['status' => 1, 'message' => 'Successfull', 'data' => $data], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'message' => 'Something went wrong!'], 200);
        }
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'time' => 'required',
            'staff_type' => 'required',
            'notes' => 'required',
            'reminder_for' => 'required',
            'user_id' => 'required_if:staff_type,2',
        ], [
            '*.required' => 'The :attribute field is required!',
            '*.date' => 'Please enter date in valid format',
            'reminder_for.required' => 'The :attribute field is required!',
            '*.required_if' => 'Facility members selection is required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 0, 'message' => 'Something went wrong!', 'errors' => $validator->getMessageBag()], 200);
        }
        try {
            // array:6 [
            //     "date" => "2023-07-06"
            //     "time" => null
            //     "staff_type" => "2"
            //     "notes" => null
            //     "reminder_for" => "2,1"
            //     "user_id" => "7"
            // ]
            if ($request->staff_type == 2) {
                foreach (explode(',',$request->user_id) as $key => $user) {
                    $data = new Reminder();
                    $data->date = $request->date;
                    $data->time = date('H:i',strtotime($request->time));
                    $data->staff_type = $request->staff_type;
                    $data->notes = $request->notes;
                    // $data->reminder_for = $request->reminder_for;
                    $data->user_id = $user;
                    $data->save();
                }
            }else {
                foreach (explode(',',$request->reminder_for) as $key => $user) {
                    $data = new Reminder();
                    $data->date = $request->date;
                    $data->time = date('H:i',strtotime($request->time));
                    $data->staff_type = $request->staff_type;
                    $data->notes = $request->notes;
                    // $data->reminder_for = $request->reminder_for;
                    $data->user_id = $user;
                    $data->save();
                }
            }
            return response()->json(['status' => 1, 'message' => 'Successfull'], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'message' => 'Something went wrong!'], 200);
        }
    }
}

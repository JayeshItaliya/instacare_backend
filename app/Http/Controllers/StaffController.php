<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserAccessSetting;
use App\Models\UserNotificationSetting;
use App\Models\UserPermissionSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.staff.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'phone' => 'required|unique:users,phone',
            'email_address' => 'required|email|unique:users,email',
            'role' => 'required',
            'country' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'timezone' => 'required',
            'language' => 'required',
        ], ['*.required' => 'This field is required.']);

        $user = new User;
        $user->type = 2;
        $user->fname = $request->fname;
        $user->lname     = $request->lname;
        $user->phone  = $request->phone;
        $user->email  = $request->email_address;
        $user->password  = Hash::make('12345678');
        $user->role = $request->role;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->country = $request->country;
        $user->zipcode = $request->zipcode;
        $user->timezone = $request->timezone;
        $user->language = $request->language;
        $user->status = 1;
        if ($request->has('image')) {
            $request->validate(
                [
                    'image' => 'mimes:png,jpg,jpeg|max:10240'
                ],
                [
                    'image.mimes' => 'The Images must be a file of type: PNG, JPG, JPEG',
                    'image.max' => 'The image must not be greater than 10MB.',
                ]
            );
            $new_name = 'user-' . uniqid() . '.' . $request->image->getClientOriginalExtension();
            $path = storage_path('app/public/assets/admin/images/users');
            $request->image->move($path, $new_name);
            $user->image = $new_name;
        }
        $user->save();

        $user_access_settings = new UserAccessSetting;
        $user_access_settings->user_id = $user->id;
        $user_access_settings->user_type = $user->type;
        $user_access_settings->dashboard = $request->has('dashboard') ? 1 : 0;
        $user_access_settings->whos_on = $request->has('whos_on') ? 1 : 0;
        $user_access_settings->people = $request->has('people') ? 1 : 0;
        $user_access_settings->schedule = $request->has('schedule') ? 1 : 0;
        $user_access_settings->timecards = $request->has('timecards') ? 1 : 0;
        $user_access_settings->messaging = $request->has('access_messaging') ? 1 : 0;
        $user_access_settings->facilities = $request->has('facilities') ? 1 : 0;
        $user_access_settings->total_billing = $request->has('total_billing') ? 1 : 0;
        $user_access_settings->support = $request->has('support') ? 1 : 0;
        $user_access_settings->save();

        $user_permission_settings = new UserPermissionSetting;
        $user_permission_settings->user_id = $user->id;
        $user_permission_settings->user_type = $user->type;
        $user_permission_settings->create_reminders = $request->has('permission_create_reminders') ? 1 : 0;
        $user_permission_settings->messaging = $request->has('permission_messaging') ? 1 : 0;
        $user_permission_settings->report_timecard = $request->has('permission_report_timecard') ? 1 : 0;
        $user_permission_settings->delete_schedule = $request->has('permission_delete_schedule') ? 1 : 0;
        $user_permission_settings->write_review = $request->has('permission_write_review') ? 1 : 0;
        $user_permission_settings->process_timecard = $request->has('permission_process_timecard') ? 1 : 0;
        $user_permission_settings->create_schedule = $request->has('permission_create_schedule') ? 1 : 0;
        $user_permission_settings->create_timecard = $request->has('permission_create_timecard') ? 1 : 0;
        $user_permission_settings->add_points = $request->has('permission_add_points') ? 1 : 0;
        $user_permission_settings->save();

        $user_notification_settings = new UserNotificationSetting;
        $user_notification_settings->user_id = $user->id;
        $user_notification_settings->user_type = $user->type;
        $user_notification_settings->in_app = $request->has('in_app') ? 1 : 0;
        $user_notification_settings->email = $request->has('email') ? 1 : 0;
        $user_notification_settings->text = $request->has('text') ? 1 : 0;
        $user_notification_settings->save();

        return redirect(route('settings.index'))->with('success', 'Success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $staffdata = User::with('user_access_settings', 'user_notification_settings', 'user_permission_settings')->where('id',$id)->first();
        return view('admin.staff.edit', compact('staffdata'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'phone' => 'required|unique:users,phone,' . $id,
            'email_address' => 'required|email|unique:users,email,' . $id,
            'role' => 'required',
            'country' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'timezone' => 'required',
            'language' => 'required',
        ], ['*.required' => 'This field is required.']);

        $user = User::find($id);
        $user->fname = $request->fname;
        $user->lname     = $request->lname;
        $user->phone  = $request->phone;
        $user->email  = $request->email_address;
        $user->role = $request->role;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->country = $request->country;
        $user->zipcode = $request->zipcode;
        $user->timezone = $request->timezone;
        $user->language = $request->language;
        $user->status = 1;
        if ($request->has('image')) {
            $request->validate(
                [
                    'image' => 'mimes:png,jpg,jpeg|max:10240'
                ],
                [
                    'image.mimes' => 'The Images must be a file of type: PNG, JPG, JPEG',
                    'image.max' => 'The image must not be greater than 10MB.',
                ]
            );
            $new_name = 'user-' . uniqid() . '.' . $request->image->getClientOriginalExtension();
            $path = storage_path('app/public/assets/admin/images/users');
            $request->image->move($path, $new_name);
            $user->image = $new_name;
        }
        $user->save();

        $user_access_settings = UserAccessSetting::where('user_id',$id)->first();
        $user_access_settings->user_id = $user->id;
        $user_access_settings->user_type = $user->type;
        $user_access_settings->dashboard = $request->has('dashboard') ? 1 : 0;
        $user_access_settings->whos_on = $request->has('whos_on') ? 1 : 0;
        $user_access_settings->people = $request->has('people') ? 1 : 0;
        $user_access_settings->schedule = $request->has('schedule') ? 1 : 0;
        $user_access_settings->timecards = $request->has('timecards') ? 1 : 0;
        $user_access_settings->messaging = $request->has('access_messaging') ? 1 : 0;
        $user_access_settings->facilities = $request->has('facilities') ? 1 : 0;
        $user_access_settings->total_billing = $request->has('total_billing') ? 1 : 0;
        $user_access_settings->support = $request->has('support') ? 1 : 0;
        $user_access_settings->save();

        $user_permission_settings = UserPermissionSetting::where('user_id',$id)->first();
        $user_permission_settings->user_id = $user->id;
        $user_permission_settings->user_type = $user->type;
        $user_permission_settings->create_reminders = $request->has('permission_create_reminders') ? 1 : 0;
        $user_permission_settings->messaging = $request->has('permission_messaging') ? 1 : 0;
        $user_permission_settings->report_timecard = $request->has('permission_report_timecard') ? 1 : 0;
        $user_permission_settings->delete_schedule = $request->has('permission_delete_schedule') ? 1 : 0;
        $user_permission_settings->write_review = $request->has('permission_write_review') ? 1 : 0;
        $user_permission_settings->process_timecard = $request->has('permission_process_timecard') ? 1 : 0;
        $user_permission_settings->create_schedule = $request->has('permission_create_schedule') ? 1 : 0;
        $user_permission_settings->create_timecard = $request->has('permission_create_timecard') ? 1 : 0;
        $user_permission_settings->add_points = $request->has('permission_add_points') ? 1 : 0;
        $user_permission_settings->save();

        $user_notification_settings = UserNotificationSetting::where('user_id',$id)->first();
        $user_notification_settings->user_id = $user->id;
        $user_notification_settings->user_type = $user->type;
        $user_notification_settings->in_app = $request->has('in_app') ? 1 : 0;
        $user_notification_settings->email = $request->has('email') ? 1 : 0;
        $user_notification_settings->text = $request->has('text') ? 1 : 0;
        $user_notification_settings->save();

        return redirect(route('settings.index'))->with('success', 'Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $staff = User::find($id);
            if (!empty($staff)) {
                $staff->delete();
                return response()->json(['status' => 1, 'message' => 'Successfull'], 200);
            }
            return response()->json(['status' => 0, 'message' => 'Invalid Request!'], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'message' => 'Something went wrong!'], 200);
        }
    }
}

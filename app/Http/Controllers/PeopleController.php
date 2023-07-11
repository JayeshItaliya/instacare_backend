<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserAccessSetting;
use App\Models\UserNotificationSetting;
use App\Models\UserOtherInfo;
use App\Models\UserOtherSetting;
use App\Models\UserPermissionSetting;
use App\Models\UserDoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peoples = User::with('people_info')->where('type', 4)->get();
        // dd($peoples);
        return view('admin.people.index', compact('peoples'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.people.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validator::extend('is_png',function($attribute, $value, $params, $validator) {
        //     $image = base64_decode($value);
        //     $f = finfo_open();
        //     $result = finfo_buffer($f, $image, FILEINFO_MIME_TYPE);
        //     return $result == 'image/png';
        // });
        // $request->validate([
        //     'snap_image' => 'is_png'
        // ]);

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
            'driver_license_number' => 'required',
            'driver_license_status' => 'required',
            'ssn_tax_id' => 'required',
            'uniform_size' => 'required',
            'emr_contact_name' => 'required',
            'emr_contact_phone' => 'required',
            'emr_contact_relationship' => 'required',
            'emr_contact_miles' => 'required',
            'emr_contact_license_number' => 'required',
            'start_tb_test_date' => 'required',
            'end_tb_test_date' => 'required',
            'imm_covid19_date' => 'required',
        ], ['*.required' => 'This field is required.']);

        $user = new User;
        $user->type = 4;
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

        $employee = new UserOtherInfo;
        $employee->user_id = $user->id;
        $employee->driver_license_number = $request->driver_license_number;
        $employee->driver_license_status = $request->driver_license_status;
        $employee->ssn_tax_id = $request->ssn_tax_id;
        $employee->uniform_size = $request->uniform_size;
        $employee->emr_contact_name = $request->emr_contact_name;
        $employee->emr_contact_phone  = $request->emr_contact_phone;
        $employee->emr_contact_relationship = $request->emr_contact_relationship;
        $employee->emr_contact_license_number = $request->emr_contact_license_number;
        $employee->emr_contact_miles = $request->emr_contact_miles;
        $employee->emr_contact_license_number = $request->emr_contact_license_number;
        $employee->emp_w4 = $request->has('emp_w4') ? 1 : 0;
        $employee->emp_verification = $request->has('emp_verification') ? 1 : 0;
        $employee->emp_background = $request->has('emp_background') ? 1 : 0;
        $employee->emp_direct = $request->has('emp_direct') ? 1 : 0;
        $employee->emp_health_ins = $request->has('emp_health_ins') ? 1 : 0;
        $employee->emp_8850 = $request->has('emp_8850') ? 1 : 0;
        $employee->emp_8850 = $request->has('emp_8850') ? 1 : 0;
        $employee->emp_crp = $request->has('emp_crp') ? 1 : 0;
        $employee->emp_handbook = $request->has('emp_handbook') ? 1 : 0;
        $employee->imm_tb_test = $request->has('imm_tb_test') ? 1 : 0;
        $employee->start_tb_test_date = $request->start_tb_test_date;
        $employee->end_tb_test_date = $request->end_tb_test_date;
        $employee->imm_covid19_date = $request->imm_covid19_date;
        $employee->imm_employee = $request->has('imm_employee') ? 1 : 0;
        $employee->imm_religious = $request->has('imm_religious') ? 1 : 0;
        $employee->imm_medical = $request->has('imm_medical') ? 1 : 0;
        $employee->save();

        $user_access_settings = new UserAccessSetting;
        $user_access_settings->user_id = $user->id;
        $user_access_settings->user_type = $user->type;
        $user_access_settings->dashboard = $request->has('dashboard') ? 1 : 0;
        $user_access_settings->my_availability = $request->has('my_availability') ? 1 : 0;
        $user_access_settings->schedule = $request->has('schedule') ? 1 : 0;
        $user_access_settings->timecards = $request->has('timecards') ? 1 : 0;
        $user_access_settings->messaging = $request->has('access_messaging') ? 1 : 0;
        $user_access_settings->facilities = $request->has('facilities') ? 1 : 0;
        $user_access_settings->payroll = $request->has('payroll') ? 1 : 0;
        $user_access_settings->support = $request->has('support') ? 1 : 0;
        $user_access_settings->save();

        $user_permission_settings = new UserPermissionSetting;
        $user_permission_settings->user_id = $user->id;
        $user_permission_settings->user_type = $user->type;
        $user_permission_settings->clock_in_shifts = $request->has('clock_in_shifts') ? 1 : 0;
        $user_permission_settings->clock_out_shifts = $request->has('clock_out_shifts') ? 1 : 0;
        $user_permission_settings->cancel_shifts = $request->has('cancel_shifts') ? 1 : 0;
        $user_permission_settings->signature = $request->has('signature') ? 1 : 0;
        $user_permission_settings->accepting_shifts = $request->has('accepting_shifts') ? 1 : 0;
        $user_permission_settings->messaging = $request->has('per_messaging') ? 1 : 0;
        $user_permission_settings->download_timecard = $request->has('download_timecard') ? 1 : 0;
        $user_permission_settings->report_an_issue = $request->has('report_an_issue') ? 1 : 0;
        $user_permission_settings->save();

        $user_notification_settings = new UserNotificationSetting;
        $user_notification_settings->user_id = $user->id;
        $user_notification_settings->user_type = $user->type;
        $user_notification_settings->in_app = $request->has('in_app') ? 1 : 0;
        $user_notification_settings->email = $request->has('email') ? 1 : 0;
        $user_notification_settings->text = $request->has('text') ? 1 : 0;
        $user_notification_settings->save();

        $user_other_settings = new UserOtherSetting;
        $user_other_settings->user_id = $user->id;
        $user_other_settings->user_type = $user->type;
        $user_other_settings->automatic_clock_out = $request->has('automatic_clock_out') ? 1 : 0;
        $user_other_settings->restrict_clock_in_before_shift = $request->has('restrict_clock_in_before_shift') ? 1 : 0;
        $user_other_settings->restrict_clock_in_before_shift_time_period = $request->restrict_clock_in_before_shift_time_period;
        $user_other_settings->restrict_clock_in_during_the_shift = $request->has('restrict_clock_in_during_the_shift') ? 1 : 0;
        $user_other_settings->restrict_clock_in_during_the_shift_time_period = $request->restrict_clock_in_during_the_shift_time_period;
        $user_other_settings->point_expiry_date = $request->has('point_expiry_date') ? 1 : 0;
        $user_other_settings->point_expiry_date_time_period = $request->restrict_clock_in_during_the_shift_time_period;
        $user_other_settings->incentives_who_havent_clock_in = $request->has('incentives_who_havent_clock_in') ? 1 : 0;
        $user_other_settings->incentives_who_havent_clock_in_time_period = $request->restrict_clock_in_during_the_shift_time_period;
        $user_other_settings->save();

        return redirect('people')->with('success', 'Success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $peopledata = User::with(['people_info', 'user_access_settings', 'user_notification_settings', 'user_permission_settings', 'user_other_settings','user_docs'])->where('id', $id)->first();
        return view('admin.people.details', compact('peopledata'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $peopledata = User::with(['people_info', 'user_access_settings', 'user_notification_settings', 'user_permission_settings', 'user_other_settings'])->where('id', $id)->first();
        return view('admin.people.edit', compact('peopledata'));
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
            'driver_license_number' => 'required',
            'driver_license_status' => 'required',
            'ssn_tax_id' => 'required',
            'uniform_size' => 'required',
            'emr_contact_name' => 'required',
            'emr_contact_phone' => 'required',
            'emr_contact_relationship' => 'required',
            'emr_contact_miles' => 'required',
            'emr_contact_license_number' => 'required',
            'start_tb_test_date' => 'required',
            'end_tb_test_date' => 'required',
            'imm_covid19_date' => 'required',
        ], ['*.required' => 'This field is required.']);

        $user = User::where('id', $id)->first();
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
            if ($user->image != 'default.png' && file_exists('storage/app/public/assets/admin/images/users/' . $user->image)) {
                unlink('storage/app/public/assets/admin/images/users/' . $user->image);
            }
            $new_name = 'user-' . uniqid() . '.' . $request->image->getClientOriginalExtension();
            $path = storage_path('app/public/assets/admin/images/users');
            $request->image->move($path, $new_name);
            $user->image = $new_name;
        }
        $user->save();



        $employee = UserOtherInfo::where('user_id', $id)->first();
        $employee->driver_license_number = $request->driver_license_number;
        $employee->driver_license_status = $request->driver_license_status;
        $employee->ssn_tax_id = $request->ssn_tax_id;
        $employee->uniform_size = $request->uniform_size;
        $employee->emr_contact_name = $request->emr_contact_name;
        $employee->emr_contact_phone  = $request->emr_contact_phone;
        $employee->emr_contact_relationship = $request->emr_contact_relationship;
        $employee->emr_contact_license_number = $request->emr_contact_license_number;
        $employee->emr_contact_miles = $request->emr_contact_miles;
        $employee->emr_contact_license_number = $request->emr_contact_license_number;
        $employee->emp_w4 = $request->has('emp_w4') ? 1 : 0;
        $employee->emp_verification = $request->has('emp_verification') ? 1 : 0;
        $employee->emp_background = $request->has('emp_background') ? 1 : 0;
        $employee->emp_direct = $request->has('emp_direct') ? 1 : 0;
        $employee->emp_health_ins = $request->has('emp_health_ins') ? 1 : 0;
        $employee->emp_8850 = $request->has('emp_8850') ? 1 : 0;
        $employee->emp_8850 = $request->has('emp_8850') ? 1 : 0;
        $employee->emp_crp = $request->has('emp_crp') ? 1 : 0;
        $employee->emp_handbook = $request->has('emp_handbook') ? 1 : 0;
        $employee->imm_tb_test = $request->has('imm_tb_test') ? 1 : 0;
        $employee->start_tb_test_date = $request->start_tb_test_date;
        $employee->end_tb_test_date = $request->end_tb_test_date;
        $employee->imm_covid19_date = $request->imm_covid19_date;
        $employee->imm_employee = $request->has('imm_employee') ? 1 : 0;
        $employee->imm_religious = $request->has('imm_religious') ? 1 : 0;
        $employee->imm_medical = $request->has('imm_medical') ? 1 : 0;
        $employee->save();

        $user_access_settings = UserAccessSetting::where('user_id', $id)->first();
        $user_access_settings->dashboard = $request->has('dashboard') ? 1 : 0;
        $user_access_settings->my_availability = $request->has('my_availability') ? 1 : 0;
        $user_access_settings->schedule = $request->has('schedule') ? 1 : 0;
        $user_access_settings->timecards = $request->has('timecards') ? 1 : 0;
        $user_access_settings->messaging = $request->has('access_messaging') ? 1 : 0;
        $user_access_settings->facilities = $request->has('facilities') ? 1 : 0;
        $user_access_settings->payroll = $request->has('payroll') ? 1 : 0;
        $user_access_settings->support = $request->has('support') ? 1 : 0;
        $user_access_settings->save();

        $user_permission_settings = UserPermissionSetting::where('user_id', $id)->first();
        $user_permission_settings->clock_in_shifts = $request->has('clock_in_shifts') ? 1 : 0;
        $user_permission_settings->clock_out_shifts = $request->has('clock_out_shifts') ? 1 : 0;
        $user_permission_settings->cancel_shifts = $request->has('cancel_shifts') ? 1 : 0;
        $user_permission_settings->signature = $request->has('signature') ? 1 : 0;
        $user_permission_settings->accepting_shifts = $request->has('accepting_shifts') ? 1 : 0;
        $user_permission_settings->messaging = $request->has('per_messaging') ? 1 : 0;
        $user_permission_settings->download_timecard = $request->has('download_timecard') ? 1 : 0;
        $user_permission_settings->report_an_issue = $request->has('report_an_issue') ? 1 : 0;
        $user_permission_settings->save();

        $user_notification_settings = UserNotificationSetting::where('user_id', $id)->first();
        $user_notification_settings->in_app = $request->has('in_app') ? 1 : 0;
        $user_notification_settings->email = $request->has('email') ? 1 : 0;
        $user_notification_settings->text = $request->has('text') ? 1 : 0;
        $user_notification_settings->save();

        $user_other_settings = UserOtherSetting::where('user_id', $id)->first();
        $user_other_settings->automatic_clock_out = $request->has('automatic_clock_out') ? 1 : 0;
        $user_other_settings->restrict_clock_in_before_shift = $request->has('restrict_clock_in_before_shift') ? 1 : 0;
        $user_other_settings->restrict_clock_in_before_shift_time_period = $request->restrict_clock_in_before_shift_time_period;
        $user_other_settings->restrict_clock_in_during_the_shift = $request->has('restrict_clock_in_during_the_shift') ? 1 : 0;
        $user_other_settings->restrict_clock_in_during_the_shift_time_period = $request->restrict_clock_in_during_the_shift_time_period;
        $user_other_settings->point_expiry_date = $request->has('point_expiry_date') ? 1 : 0;
        $user_other_settings->point_expiry_date_time_period = $request->point_expiry_date_time_period;
        $user_other_settings->incentives_who_havent_clock_in = $request->has('incentives_who_havent_clock_in') ? 1 : 0;
        $user_other_settings->incentives_who_havent_clock_in_time_period = $request->incentives_who_havent_clock_in_time_period;
        $user_other_settings->save();

        return redirect('people')->with('success', 'Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $people = User::where('id', $id)->delete();
            return response()->json(['status' => 1, 'message' => 'Success'], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'message' => 'Something went wrong!'], 200);
        }
    }

    /**
     * Change Password of the specified people.
     */
    public function changepassword(Request $request)
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
            return redirect()->back()->with('error', $validator->getMessageBag()->first());
        }
        if (Hash::check($request->current_password, User::where('id', $request->id)->first()->password)) {
            User::where('id', $request->id)->update(['password' => Hash::make($request->new_password)]);
            return redirect()->back()->with('success', 'Password changed Successfully');
        } else {
            return redirect()->back()->with('error', 'Old password is invalid!');
        }
    }

    /**
     * Change Password of the specified people.
     */
    public function submitdoc(Request $request, $id)
    {
        try {
            $doc = UserDoc::where('user_id',$id)->first();
            if(!empty($doc)){
                // DB::enableQueryLog();
                // dd(DB::getQueryLog());
                if ($request->has('inputName') && ($request->inputName == 'il_w4' && $doc->il_w4 != '') || ($request->inputName == 'emp_verification' && $doc->emp_verification != '') || ($request->inputName == 'bg_auth_form' && $doc->bg_auth_form != '') || ($request->inputName == 'direct_deposit' && $doc->direct_deposit != '') || ($request->inputName == 'health_ins' && $doc->health_ins != '') || ($request->inputName == 'doc_8850' && $doc->doc_8850 != '') || ($request->inputName == 'crp_certification' && $doc->crp_certification != '') || ($request->inputName == 'emp_handbook' && $doc->emp_handbook != '')) {
                    return response()->json(['status' => 0, 'message' => 'Document already exist!!'], 200);
                }
            }else{
                $doc = new UserDoc();
                $doc->user_id = $id;
            }

            $new_name = 'document-'.uniqid() . '.' . $request->fileContent->getClientOriginalExtension();
            $request->fileContent->move(storage_path('app/public/assets/admin/images/documents'), $new_name);

            if ($request->has('inputName') && $request->inputName == 'il_w4') {
                $doc->il_w4 = $new_name;
            }
            if ($request->has('inputName') && $request->inputName == 'emp_verification') {
                $doc->emp_verification = $new_name;
            }
            if ($request->has('inputName') && $request->inputName == 'bg_auth_form') {
                $doc->bg_auth_form = $new_name;
            }
            if ($request->has('inputName') && $request->inputName == 'direct_deposit') {
                $doc->direct_deposit = $new_name;
            }
            if ($request->has('inputName') && $request->inputName == 'health_ins') {
                $doc->health_ins = $new_name;
            }
            if ($request->has('inputName') && $request->inputName == 'doc_8850') {
                $doc->doc_8850 = $new_name;
            }
            if ($request->has('inputName') && $request->inputName == 'crp_certification') {
                $doc->crp_certification = $new_name;
            }
            if ($request->has('inputName') && $request->inputName == 'emp_handbook') {
                $doc->emp_handbook = $new_name;
            }
            $doc->save();
            return response()->json(['status' => 1, 'message' => 'Success'], 200);
        } catch (\Throwable $th) {
            dd($th);
            return response()->json(['status' => 0, 'message' => 'Something went wrong!'], 200);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BillingSetting;
use App\Models\NewsSetting;
use App\Models\PointSetting;
use App\Models\Facilities;
use App\Models\ReasonSetting;
use App\Models\TemplateSetting;
use App\Models\User;
use App\Models\UserAccessSetting;
use App\Models\UserNotificationSetting;
use App\Models\UserOtherSetting;
use App\Models\UserPermissionSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    public function index()
    {
        $staffs = User::where('type', auth()->user()->type == 1 ? 2 : 3)->get();
        $templatesettings = TemplateSetting::latest()->get();
        $newssettings = NewsSetting::latest()->get();
        $pointssettings = PointSetting::latest()->get();
        $reasonsettings = ReasonSetting::latest()->get();
        $facilities = Facilities::latest()->get();
        return view('admin.settings.index', compact('staffs', 'templatesettings', 'newssettings', 'pointssettings', 'reasonsettings', 'facilities'));
    }
    public function managetemplates(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subject' => 'required',
            'status' => 'required',
            'message' => 'required|max:50',
        ], [
            '*.required' => 'This field is required!',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 0, 'message' => 'Something went wrong!', 'errors' => $validator->getMessageBag()], 200);
        }
        try {
            if ($request->filled('ttid')) {
                $ts = TemplateSetting::where('id', $request->ttid)->where('type', 2)->first();
                if (empty($ts)) {
                    return response()->json(['status' => 0, 'message' => 'Invalid Request!'], 200);
                }
            } else {
                $ts = new TemplateSetting();
                $ts->type = 2;
            }
            $ts->subject = $request->subject;
            $ts->quick_message = $request->message;
            $ts->is_active = $request->status;
            $ts->save();
            return response()->json(['status' => 1, 'message' => 'Successfull'], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'message' => 'Something went wrong!'], 200);
        }
    }
    public function manageemailtemplates(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subject' => 'required',
            'status' => 'required',
            'message' => 'required',
        ], [
            '*.required' => 'This field is required!',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 0, 'message' => 'Something went wrong!', 'errors' => $validator->getMessageBag()], 200);
        }
        try {
            if ($request->filled('etid')) {
                $ts = TemplateSetting::where('id', $request->etid)->where('type', 1)->first();
                if (empty($ts)) {
                    return response()->json(['status' => 0, 'message' => 'Invalid Request!'], 200);
                }
            } else {
                $ts = new TemplateSetting();
                $ts->type = 1;
            }
            $ts->subject = $request->subject;
            $ts->quick_message = $request->message;
            $ts->is_active = $request->status;
            $ts->save();
            return response()->json(['status' => 1, 'message' => 'Successfull'], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'message' => $th->getMessage()], 200);
        }
    }
    public function destroytemplate(string $id)
    {
        try {
            $cf = TemplateSetting::find($id);
            if (!empty($cf)) {
                $cf->delete();
                return response()->json(['status' => 1, 'message' => 'Successfull'], 200);
            }
            return response()->json(['status' => 0, 'message' => 'Invalid Request!'], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'message' => 'Something went wrong!'], 200);
        }
    }
    public function managenews(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'type' => 'required',
            'description' => 'required',
        ], [
            '*.required' => 'This field is required!',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 0, 'message' => 'Something went wrong!', 'errors' => $validator->getMessageBag()], 200);
        }
        try {
            if ($request->filled('nid')) {
                $ns = NewsSetting::where('id', $request->nid)->first();
                if (empty($ns)) {
                    return response()->json(['status' => 0, 'message' => 'Invalid Request!'], 200);
                }
            } else {
                $ns = new NewsSetting();
                $ns->type = $request->type;
            }
            $ns->added_by = auth()->user()->id;
            $ns->title = $request->title;
            $ns->description = $request->description;
            $ns->is_active = $request->status;
            $ns->created_at = Carbon::now();
            $ns->save();
            return response()->json(['status' => 1, 'message' => 'Successfull'], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'message' => $th->getMessage()], 200);
        }
    }
    public function destroynews(string $id)
    {
        try {
            $cns = NewsSetting::find($id);
            if (!empty($cns)) {
                $cns->delete();
                return response()->json(['status' => 1, 'message' => 'Successfull'], 200);
            }
            return response()->json(['status' => 0, 'message' => 'Invalid Request!'], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'message' => 'Something went wrong!'], 200);
        }
    }
    public function managepoints(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'reason' => 'required',
            'points' => 'required|gt:0',
        ], [
            '*.required' => 'This field is required!',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 0, 'message' => 'Something went wrong!', 'errors' => $validator->getMessageBag()], 200);
        }
        try {
            if ($request->filled('pid')) {
                $ps = PointSetting::where('id', $request->pid)->first();
                if (empty($ps)) {
                    return response()->json(['status' => 0, 'message' => 'Invalid Request!'], 200);
                }
            } else {
                $ps = new PointSetting();
            }
            $ps->reason = $request->reason;
            $ps->points = $request->points;
            $ps->save();
            return response()->json(['status' => 1, 'message' => 'Successfull'], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'message' => $th->getMessage()], 200);
        }
    }
    public function destroypoints(string $id)
    {
        try {
            $cns = PointSetting::find($id);
            if (!empty($cns)) {
                $cns->delete();
                return response()->json(['status' => 1, 'message' => 'Successfull'], 200);
            }
            return response()->json(['status' => 0, 'message' => 'Invalid Request!'], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'message' => 'Something went wrong!'], 200);
        }
    }
    public function managebilling(Request $request)
    {
        if (!$request->facilities || count($request->facilities) == 0) {
            return response()->json(['status' => 0, 'message' => 'Facilities selection is required!'], 200);
        }
        $validator = Validator::make($request->all(), [
            'max_billing_monthly' => 'required',
            'hourly_rate' => 'required',
            'weekend_hourly_rates' => 'required',
            'holiday_hourly_rates' => 'required',
            'max_monthly_incentive' => 'required',
            'max_monthly_incentive_per_hour' => 'required',
            'max_monthly_incentive_fixed' => 'required',
            'allow_overtime' => 'required',
            'overtime_hourly_rate' => 'required',
            'overtime_percentage' => 'required',
            'invoice_delivery' => 'required',
            'invoice_statement' => 'required',
            'invoice_statement_start_date' => [
                'bail',
                'sometimes',
                'required_if:invoice_statement,custom',
                'date',
                'after_or_equal:' . Carbon::now()->subDay()->format('Y-m-d')
            ],
            'invoice_statement_end_date' => 'bail|sometimes|required_if:invoice_statement,custom|date|after:invoice_statement_start_date',
            'invoice_frequency_delivery' => 'bail|required',
            'invoice_frequency_start_date' => [
                'bail',
                'sometimes',
                'required_if:invoice_frequency_delivery,custom',
                'date',
                'after_or_equal:' . Carbon::now()->subDay()->format('Y-m-d')
            ],
            'invoice_frequency_end_date' => 'bail|sometimes|required_if:invoice_frequency_delivery,custom|date|after:invoice_frequency_start_date',
        ], [
            '*.required' => 'This field is required!',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 0, 'message' => 'Something went wrong!', 'errors' => $validator->getMessageBag()], 200);
        }
        try {
            BillingSetting::whereIn('facilities_id', $request->facilities)->forceDelete();
            foreach ($request->facilities as $key => $fid) {
                $bs = new BillingSetting();
                $bs->facilities_id = $fid;
                $bs->max_billing_monthly = $request->max_billing_monthly;
                $bs->hourly_rate = $request->hourly_rate;
                $bs->weekend_hourly_rates = $request->weekend_hourly_rates;
                $bs->holiday_hourly_rates = $request->holiday_hourly_rates;
                $bs->max_monthly_incentive = $request->max_monthly_incentive;
                $bs->max_monthly_incentive_per_hour = $request->max_monthly_incentive_per_hour;
                $bs->max_monthly_incentive_fixed = $request->max_monthly_incentive_fixed;
                $bs->allow_overtime = $request->allow_overtime ? 1 : 0;
                $bs->overtime_hourly_rate = $request->overtime_hourly_rate;
                $bs->overtime_percentage = $request->overtime_percentage;
                $bs->invoice_delivery = $request->invoice_delivery;
                $bs->invoice_statement = $request->invoice_statement;
                $bs->invoice_statement_start_date = $request->invoice_statement == 'custom' ? $request->invoice_statement_start_date : null;
                $bs->invoice_statement_end_date = $request->invoice_statement == 'custom' ? $request->invoice_statement_end_date : null;
                $bs->invoice_frequency_delivery = $request->invoice_frequency_delivery;
                $bs->invoice_frequency_start_date = $request->invoice_frequency_delivery == 'custom' ? $request->invoice_frequency_start_date : null;
                $bs->invoice_frequency_end_date = $request->invoice_frequency_delivery == 'custom' ? $request->invoice_frequency_end_date : null;
                $bs->save();
            }
            return response()->json(['status' => 1, 'message' => 'Successfull'], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'message' => $th->getMessage()], 200);
        }
    }
    public function manageuser(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     '' => 'required',
        // ], [
        //     '*.required' => 'This field is required!',
        // ]);
        // if ($validator->fails()) {
        //     return response()->json(['status' => 0, 'message' => 'Something went wrong!', 'errors' => $validator->getMessageBag()], 200);
        // }
        try {
            $getusers = User::select('id')->where('type', $request->user_type)
                ->when($request->has('user_group') && $request->user_group == 1, function ($query) {
                    return $query->whereDate('created_at', date('Y-m-d'));
                })
                ->pluck('id')
                ->toArray();

            $columns1 = ['dashboard', 'schedule', 'people', 'facilities', 'messaging', 'timecards', 'whos_on', 'total_billing', 'support', 'my_availability', 'payroll'];
            $v1['user_type'] = $request->user_type;
            foreach ($columns1 as $c1) {
                $v1[$c1] = isset($request->all()['access'][$c1]) ? 1 : 0;
            }
            foreach ($getusers as $user_id) {
                UserAccessSetting::where('user_id', $user_id)->forceDelete();
                $v1['user_id'] = $user_id;
                UserAccessSetting::create($v1);
            }

            $columns2 = ['create_reminders', 'create_schedule', 'delete_schedule', 'process_timecard', 'report_timecard', 'write_review', 'messaging', 'create_timecard', 'add_points', 'clock_in_shifts', 'clock_out_shifts', 'cancel_shifts', 'signature', 'accepting_shifts', 'download_timecard', 'report_an_issue'];
            $v2['user_type'] = $request->user_type;
            foreach ($columns2 as $c2) {
                $v2[$c2] = isset($request->all()['permission'][$c2]) ? 1 : 0;
            }
            foreach ($getusers as $user_id) {
                UserPermissionSetting::where('user_id', $user_id)->forceDelete();
                $v2['user_id'] = $user_id;
                UserPermissionSetting::create($v2);
            }

            $columns3 = ['text', 'email', 'in_app', 'text_confirm_shifts', 'text_schedule_shifts', 'text_cancelled_shifts', 'text_deleted_shifts', 'text_timecard_processed', 'text_late_clock_in', 'text_late_clock_out', 'text_shift_posted_by_instacare', 'text_shift_posted_by_facilitites', 'text_arriving_late', 'text_arriving_late_reported_by_employee', 'text_requested_to_work_at_a_certain_facility', 'text_message_sent', 'text_message_receive', 'text_person_added', 'text_facility_added', 'text_member_added', 'text_documents_uploaded', 'text_setting_changed', 'text_report_generated', 'text_support_request', 'text_change_in_billing_parameters', 'text_email_template_added', 'text_email_template_edited', 'text_email_and_text_template_added', 'text_email_and_text_template_edited', 'text_points_added', 'text_points_reason_added', 'text_shift_completed', 'text_call_of_shift', 'text_unassigned_shift'];
            $v3['user_type'] = $request->user_type;
            foreach ($columns3 as $c3) {
                $v3[$c3] = isset($request->all()['notifications'][$c3]) ? 1 : 0;
            }
            foreach ($getusers as $user_id) {
                UserNotificationSetting::where('user_id', $user_id)->forceDelete();
                $v3['user_id'] = $user_id;
                UserNotificationSetting::create($v3);
            }

            if ($request->user_type == 4) {

                foreach ($getusers as $user_id) {
                    UserOtherSetting::where('user_id', $user_id)->forceDelete();
                    $d = new UserOtherSetting();
                    $d->user_id = $user_id;
                    $d->user_type = $request->user_type;
                    $d->automatic_clock_out = isset($request['other']['automatic_clock_out']) ? 1 : 0;
                    $d->restrict_clock_in_before_shift = isset($request['other']['restrict_clock_in_before_shift']) ? 1 : 0;
                    $d->restrict_clock_in_before_shift_time_period = $request['other']['restrict_clock_in_before_shift_time_period'];
                    $d->restrict_clock_in_during_the_shift = isset($request['other']['restrict_clock_in_during_the_shift']) ? 1 : 0;
                    $d->restrict_clock_in_during_the_shift_time_period = $request['other']['restrict_clock_in_during_the_shift_time_period'];
                    $d->point_expiry_date = isset($request['other']['point_expiry_date']) ? 1 : 0;
                    $d->point_expiry_date_time_period = $request['other']['point_expiry_date_time_period'];
                    $d->incentives_who_havent_clock_in = isset($request['other']['incentives_who_havent_clock_in']) ? 1 : 0;
                    $d->incentives_who_havent_clock_in_time_period = $request['other']['incentives_who_havent_clock_in_time_period'];
                    $d->save();
                }
            }

            return response()->json(['status' => 1, 'message' => 'Successfull'], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'message' => $th->getMessage()], 200);
        }
    }
    public function managereason(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'area' => 'required',
            'status' => 'required',
            'reason' => 'required|regex:/^(\s*\S+\s*){1,10}$/',
        ], [
            '*.required' => 'This field is required!',
            'reason.regex' => 'Maximum 10 words are allowed',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 0, 'message' => 'Something went wrong!', 'errors' => $validator->getMessageBag()], 200);
        }
        try {
            $ns = $request->filled('rid') ? (ReasonSetting::find($request->rid) ?: response()->json(['status' => 0, 'message' => 'Invalid Request!'], 200)) : new ReasonSetting();
            // $ns->area = $request->area;
            $ns->reason = $request->reason;
            $ns->is_active = $request->status;
            $ns->save();
            return response()->json(['status' => 1, 'message' => 'Successfull'], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'message' => $th->getMessage()], 200);
        }
    }
    public function destroyreason(string $id)
    {
        try {
            $cns = ReasonSetting::find($id);
            if (!empty($cns)) {
                $cns->delete();
                return response()->json(['status' => 1, 'message' => 'Successfull'], 200);
            }
            return response()->json(['status' => 0, 'message' => 'Invalid Request!'], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'message' => 'Something went wrong!'], 200);
        }
    }
}

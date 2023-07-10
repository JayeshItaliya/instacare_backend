<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shifts;
use App\Models\Facilities;
use App\Models\ShiftsAssigned;
use App\Models\FacilityContactInfo;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use DateTime;

class ShiftsController extends Controller
{
    public $rules = [], $messages = [], $shift_time_arr = [];
    public function __construct() {
        $this->shift_time_arr = ['7:00AM - 3:00PM', '3:00PM - 11:00PM', '11:00PM - 7:00AM'];
        $this->rules = ['type' => 'required|in:1,2,3,4','facility' => 'required','role' => 'required|in:rn,lpn,cna','number_of_positions' => 'required','date' => 'required|date|date_format:Y-m-d','rate' => 'required','floor_number' => 'required','incentive_by' => 'required|in:Instacare,Facility','incentive_amount' => 'required','supervisor' => 'required','employee' => 'required_if:assign_shift,1','notes' => 'required',];
        $this->messages = ['*.required' => 'The :attribute is required','*.required_if' => 'The :attribute is required','*.date_format' => 'The :attribute is in invalid format','*.numeric' => 'The :attribute must be in number format','*.in' => 'The :attribute is in invalid format','*.array' => 'The :attribute is in invalid format',];
    }
    public function index()
    {
        return view('admin.shifts.index');
    }
    public function create()
    {
        $facilities = Facilities::latest()->get();
        return view('admin.shifts.add', compact('facilities'));
    }
    public function store(Request $request)
    {
        $this->rules['shift_time'] = 'required|in:1,2,3,4';
        $this->rules['start_time'] = 'required_if:shift_time,4|date_format:h:i A';
        $this->rules['end_time'] = 'required_if:shift_time,4|date_format:h:i A|after:start_time';
        $validator = Validator::make($request->all(),$this->rules, $this->messages);
        if ($validator->fails()) {
            return response()->json(['status' => 0, 'message' => 'Something went wrong!', 'errors' => $validator->getMessageBag()], 200);
        }
        try {
            array_push($this->shift_time_arr,date('h:iA', strtotime($request->start_time)) . ' - ' . date('h:iA', strtotime($request->end_time)) );
            $assign_shift = $request->filled('assign_shift') && $request->assign_shift == 1 && $request->filled('employee') ? true : false ;
            $shift = new Shifts();
            $shift->type = 1;
            $shift->facilities_id = $request->facility;
            $shift->supervisior_id = $request->supervisor;
            $shift->role = $request->role;
            $shift->positions = $request->number_of_positions;
            $shift->date = $request->date;
            $shift->shift_time = $request->shift_time;
            $shift->start_time = $request->shift_time == 4 ? date('H:i', strtotime($request->start_time)) : null;
            $shift->end_time = $request->shift_time == 4 ? date('H:i', strtotime($request->end_time)) : null;
            $shift->rate = $request->rate;
            $shift->floor_number = $request->floor_number;
            $shift->incentives = $request->filled('incentives') ? 1 : 0;
            $shift->incentive_by = $request->incentive_by;
            $shift->incentive_type = $request->filled('incentive_type') ? 1 : 0;
            $shift->incentive_amount = $request->incentive_amount;
            $shift->cancellation_guarantee = $request->filled('cancellation_guarantee') ? 1 : 0;
            $shift->notes = $request->notes;
            $shift->status = $assign_shift ? 2 : 1;
            $shift->save();

            if ($assign_shift) {
                $sa = new ShiftsAssigned();
                $sa->shift_id = $shift->id;
                $sa->emp_id = $request->employee;
                $sa->save();
            }

            $t = Shifts::where('facilities_id', $request->facility)->whereDate('date', $request->date)->where('role', $request->role)->where('status', 1)->count();
            $fname = Facilities::find($request->facility);
            $openshifts = $t . ' Open shifts for ' . strtoupper($request->role);
            $sata = [
                'facility' => $fname->name,
                'open_shifts' => $openshifts,
                'list' => [
                    'date' => date('l, M d, Y', strtotime($request->date)),
                    'timing' => $this->shift_time_arr[$request->shift_time - 1],
                ]
            ];
            return response()->json(['status' => 1, 'message' => 'Successfull', 'data' => $sata], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'message' => 'Something went wrong!'], 200);
        }
    }
    public function storerecurring(Request $request)
    {
        $this->rules['rec_shift_time'] = 'required|in:1,2,3,4';
        $this->rules['start_time'] = 'required_if:rec_shift_time,4|date_format:h:i A';
        $this->rules['end_time'] = 'required_if:rec_shift_time,4|date_format:h:i A|after:start_time';
        $this->rules['duration'] = 'required|numeric|gt:0';
        $this->rules['recurring_days'] = 'required';
        // $this->rules['recurring_days'] = 'required|array|in:sun,mon,tue,wed,thu,fri,sat';
        $validator = Validator::make($request->all(),$this->rules, $this->messages);
        if ($validator->fails()) {
            return response()->json(['status' => 0, 'message' => 'Something went wrong!', 'errors' => $validator->getMessageBag()], 200);
        }
        try {
            $recurring_days = is_array($request->recurring_days) ? $request->recurring_days : explode(',',$request->recurring_days);
            $assign_shift = $request->filled('assign_shift') && $request->assign_shift == 1 && $request->filled('employee') ? true : false ;
            array_push($this->shift_time_arr,date('h:iA', strtotime($request->start_time)) . ' - ' . date('h:iA', strtotime($request->end_time)) );
            $dates = $list = $sids = [];
            $sdate = $request->date;
            $currentDate = new DateTime($sdate);
            for ($i = 0; $i < $request->duration; $i++) {
                $lastdate = $currentDate->modify('+7 days');
            }
            $lastdate = $lastdate->modify('-7 days');
            $currentDate = Carbon::parse($sdate);
            $endDateTime = Carbon::parse($lastdate->format('Y-m-d'));
            while ($currentDate->lte($endDateTime)) {
                $sd = $currentDate->format('Y-m-d');
                $dayName = $currentDate->format('D');
                if (in_array(strtolower($dayName), array_map('strtolower', $recurring_days))){
                    $dates[] = $sd;
                    $shift = new Shifts();
                    $shift->type = 2;
                    $shift->facilities_id = $request->facility;
                    $shift->supervisior_id = $request->supervisor;
                    $shift->role = $request->role;
                    $shift->positions = $request->number_of_positions;
                    $shift->date = $sd;
                    $shift->shift_time = $request->rec_shift_time;
                    $shift->start_time = $request->rec_shift_time == 4 ? date('H:i', strtotime($request->start_time)) : null;
                    $shift->end_time = $request->rec_shift_time == 4 ? date('H:i', strtotime($request->end_time)) : null;
                    $shift->rate = $request->rate;
                    $shift->floor_number = $request->floor_number;
                    $shift->incentives = $request->filled('incentives') ? 1 : 0;
                    $shift->incentive_by = $request->incentive_by;
                    $shift->incentive_type = $request->filled('incentive_type') ? 1 : 0;
                    $shift->incentive_amount = $request->incentive_amount;
                    $shift->cancellation_guarantee = $request->filled('cancellation_guarantee') ? 1 : 0;
                    $shift->notes = $request->notes;
                    $shift->status = $assign_shift ? 2 : 1;
                    $shift->duration = $request->duration;  // no need
                    $shift->recurring_days = $dayName;  // no need
                    $shift->save();
                    $sids[] = $shift->id;
                    $list[] = [
                        'date' => date('l, M d, Y', strtotime($sd)),
                        'timing' => $this->shift_time_arr[$request->rec_shift_time - 1],
                    ];
                }
                $currentDate->addDay();
            }
            if ($assign_shift) {
                foreach ($sids as $key => $sid) {
                    $sa = new ShiftsAssigned();
                    $sa->shift_id = $sid;
                    $sa->emp_id = $request->employee;
                    $sa->save();
                }
            }
            $t = Shifts::where('facilities_id', $request->facility)->whereIn(DB::raw('DATE(date)'), $dates)->where('role', $request->role)->where('status', 1)->count();
            $fname = Facilities::find($request->facility);
            $openshifts = $t . ' Open shifts for ' . strtoupper($request->role);
            $sata = [
                'facility' => $fname->name,
                'open_shifts' => $openshifts,
                'list' => $list,
            ];
            return response()->json(['status' => 1, 'message' => 'Successfull', 'data' => $sata], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'message' => 'Something went wrong!'], 200);
        }
    }
    public function storesheet(Request $request)
    {
        try {
            // 0 => array:35 [
            //     0 => "Date"                      => "11/12/2021"
            //     1 => "Facility"                  => 88989898998.0
            //     2 => "Role"                      => "LPN"
            //     3 => "Number of positions"       => 1.0
            //     4 => "Shift Time"                => "Custom"
            //     5 => "Shift Start Time"          => "07:00 AM"
            //     6 => "Shift End Time"            => "05:00 PM"
            //     7 => "Incentives"                => "Yes"
            //     8 => "Incentive By"              => "Instacare"
            //     9 => "Incentive Type"            => "$hr"
            //     10 => "Incentive Amount"         => 120.0
            //     11 => ""                         => ""
            //     12 => "Floor"                    => 1.0
            //     13 => "Cancellation Grantee"     => "No"
            //     14 => "Employee Mobile"          => "emp mob"
            //     15 => "Supervisor"               => "supevir"
            //     16 => "Notes"                    => "1121212121112121"
            //   ]
            $file = $request->file('excel_file');
            $validator = Validator::make($request->all(),[
                'excel_file' => 'required|mimes:xlsx,xls',
            ], $this->messages);
            if ($validator->fails()) {
                return response()->json(['status' => 0, 'message' => 'Something went wrong!', 'errors' => $validator->getMessageBag()], 200);
            }
            $data = Excel::toArray([], $file);
            foreach ($data[0] as $key => $row) {
                if ($key > 0 && $row[0] != null) {
                    $check_facility = Facilities::where('id',(int)$row[1])->first();
                    if( !$check_facility ) {
                        return response()->json(['status' => 0, 'message' => 'Facility not found for data : '.(int)$row[1]], 200);
                    }
                    $cs = FacilityContactInfo::where('facilities_id', @$check_facility->id)->where('phone',(int)$row[15])->first();
                    $ce = User::where('type', 4)->where('phone',$row[14])->first();
                    if(!$this->validateTime($row[0])){
                        return response()->json(['status' => 0, 'message' => 'Please enter date in valid format for data : '.$row[0]], 200);
                    }
                    if(strtolower($row[4]) == 'custom' && !$this->validateTime($row[5])){
                        return response()->json(['status' => 0, 'message' => 'Please enter date in valid format for data : '.$row[5]], 200);
                    }
                    if(strtolower($row[4]) == 'custom' && !$this->validateTime($row[6])){
                        return response()->json(['status' => 0, 'message' => 'Please enter date in valid format for data : '.$row[6]], 200);
                    }
                    if(empty($ce)){
                        return response()->json(['status' => 0, 'message' => 'Employee not found for data : '.$row[14]], 200);
                    }
                    if(empty($cs)){
                        return response()->json(['status' => 0, 'message' => 'Supervisor not found for data : '.(int)$row[15]], 200);
                    }
                }
            }
            foreach ($data[0] as $key => $row) {
                if ($key > 0 && $row[0] != null) {

                    $check_facility = Facilities::where('id',$row[1])->first();
                    $sid = FacilityContactInfo::where('facilities_id', @$check_facility->id)->where('phone',$row[15])->first();
                    $ce = User::where('type', 4)->where('phone',$row[14])->first();

                    $assign_shift = !empty($ce) ? true : false ;
                    $shift = new Shifts();
                    $shift->type = 3;
                    $shift->facilities_id = $check_facility->id;
                    $shift->role = strtolower($row[2]);
                    $shift->positions = $row[3];
                    $shift->date = date('Y-m-d',strtotime($row[0]));
                    $shift->shift_time = ($row[4] == 'Morning Shift: 7:00AM - 3:00PM') ? 1 : (($row[4] == 'Noon Shift: 3:00PM - 11:00PM') ? 2 : (($row[4] == 'Morning Shift: 7:00AM - 3:00PM') ? 3 : 4));
                    $shift->start_time = $row[4] == 'Custom' ? date('H:i', strtotime($row[5])) : null;
                    $shift->end_time = $row[4] == 'Custom' ? date('H:i', strtotime($row[6])) : null;
                    $shift->incentives = $row[7] == 'Yes' ? 1 : 0;
                    $shift->incentive_by = $row[8];
                    $shift->incentive_type = $row[9] == '$hr' ? 1 : 0;
                    $shift->incentive_amount = $row[10];
                    $shift->rate = @$row[11];
                    $shift->floor_number = $row[12];
                    $shift->cancellation_guarantee = $row[13] == 'Yes' ? 1 : 0;
                    $shift->notes = $row[16];
                    $shift->supervisior_id = $sid->id;
                    $shift->status = $assign_shift ? 2 : 1;
                    $shift->save();
                    if ($assign_shift) {
                        $sa = new ShiftsAssigned();
                        $sa->shift_id = $shift->id;
                        $sa->emp_id = $ce->id;
                        $sa->save();
                    }
                }
            }
            return response()->json(['status' => 1, 'message' => 'Successfull'], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'message' => 'Something went wrong!'], 200);
        }
    }
    public function validateTime($value)
    {
        try {
            Carbon::parse($value);
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    public function show(Request $request)
    {
        dd(111, 'From show Function');
    }
    public function edit(Request $request)
    {
        dd(111, 'From edit Function');
    }
    public function update(Request $request)
    {
        dd(111, 'From update Function');
    }
    public function destroy(Request $request)
    {
        dd(111, 'From destroy Function');
    }
    public function supervisors(Request $request)
    {
        try {
            if(empty($request->id)){
                return response()->json(['status' => 0, 'message' => 'Facility selection is required'], 200);
            }
            if(!Facilities::find($request->id)){
                return response()->json(['status' => 0, 'message' => 'Invalid Facility!'], 200);
            }
            $data = FacilityContactInfo::select('id','name')->where('facilities_id', $request->id)->latest()->get()->toArray();
            return response()->json(['status' => 1, 'message' => 'Successfull', 'data' => $data], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'message' => 'Something went wrong!'], 200);
        }
    }
    public function employees(Request $request)
    {
        $data = User::select('id', 'fname', 'lname', 'image','role')->where('type', 4)->latest()->get()->map(function ($item) {
            $item->fullname = $item->fullname;
            $item->image_url = $item->image_url;
            return $item;
        });
        return response()->json(['status' => 1, 'message' => 'Successfull', 'data' => $data], 200);
    }
}

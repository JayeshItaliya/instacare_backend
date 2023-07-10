<?php

namespace App\Http\Controllers;

use App\Models\Availability;
use App\Models\Facilities;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AvailabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facilities = Facilities::latest()->get();
        return view('admin.availability.index', compact('facilities'));
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
            'week' => 'required|string',
            'shift_time' => 'required|array',
            'shift_time.*' => 'required|string|in:sunday,monday,tuesday,wednesday,thursday,friday,saturday',
            'from' => 'required|array',
            'from.*' => 'required|date_format:h:i A',
            'to' => 'required|array',
            'to.*' => 'required|date_format:h:i A|after:from.*',
            'facility' => 'required|numeric',
        ], [
            '*.required' => 'This field is required!',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 0, 'message' => 'Something went wrong!', 'errors' => $validator->getMessageBag()], 200);
        }
        try {
            $startDateTime = new DateTime(explode(' - ', $request->week)[0]);
            $endDateTime = new DateTime(explode(' - ', $request->week)[1]);
            // $endDateTime->modify('+1 day');
            for ($date = $startDateTime; $date <= $endDateTime; $date->modify('+1 day')) {
                $d = $date->format('Y-m-d');
                $a = Availability::whereDate('date', $d)->where('emp_id', auth()->user()->id)->first();
                if (empty($a)) {
                    $a = new Availability();
                    $a->emp_id = auth()->user()->id;
                    $a->date = $d;
                }
                $a->facilities_id = $request->facility;
                $a->start_time = $request->from[strtolower(date('l', strtotime($d)))];
                $a->end_time = $request->to[strtolower(date('l', strtotime($d)))];
                $a->save();
            }
            return response()->json(['status' => 1, 'message' => 'Successfull'], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'message' => 'Something went wrong!'], 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Availability $availability)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Availability $availability)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Availability $availability)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Availability $availability)
    {
        //
    }
}

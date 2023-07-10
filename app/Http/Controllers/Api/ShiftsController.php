<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Facilities;
use App\Http\Controllers\ShiftsController as WebShiftsController;

class ShiftsController extends Controller
{
    public function facilities()
    {
        $facilities = Facilities::with('supervisors')->latest()->get()->makeHidden(['updated_at','updated_at','updated_at']);
        return response()->json(['status' => 1, 'message' => 'Successfull','data' => $facilities], 200);
    }
    public function employees(Request $request)
    {
        $data = (new WebShiftsController)->employees($request);
        return json_decode(json_encode($data))->original;
    }
    public function store(Request $request)
    {
        $data = (new WebShiftsController)->store($request);
        return json_decode(json_encode($data))->original;
    }
    public function storerecurring(Request $request)
    {
        $data = (new WebShiftsController)->storerecurring($request);
        return json_decode(json_encode($data))->original;
    }
    public function storesheet(Request $request)
    {
        $data = (new WebShiftsController)->storesheet($request);
        return json_decode(json_encode($data))->original;
    }
}

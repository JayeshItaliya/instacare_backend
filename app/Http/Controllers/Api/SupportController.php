<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReasonSetting;
use App\Http\Controllers\SupportController as WebSupportController;

class SupportController extends Controller
{
    public function index()
    {
        $reasons = ReasonSetting::select('id','reason')->latest()->where('is_active', 1)->get();
        return response()->json(['status' => 1, 'message' => 'Successfull','data' => $reasons], 200);
    }
    public function store(Request $request)
    {
        $data = (new WebSupportController)->store($request);
        return json_decode(json_encode($data))->original;
    }
}

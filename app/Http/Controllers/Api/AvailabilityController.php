<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AvailabilityController as WebAvailabilityController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AvailabilityController extends Controller
{
    public function store(Request $request){
        $data = (new WebAvailabilityController)->store($request);
        return json_decode(json_encode($data))->original;
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ReminderController as WebReminderController;

class ReminderController extends Controller
{
    function index(Request $request) {
        $data = (new WebReminderController)->fetchdata($request);
        return json_decode(json_encode($data))->original;
    }
    function store(Request $request) {
        $data = (new WebReminderController)->store($request);
        return json_decode(json_encode($data))->original;
    }
}

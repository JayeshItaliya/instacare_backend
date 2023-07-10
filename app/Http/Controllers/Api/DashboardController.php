<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsSetting;

class DashboardController extends Controller
{
    function newslist() {
        $data = NewsSetting::with('added_by')->select('id','added_by','type','title','description','is_active','updated_at')->latest()->get();
        return response()->json(['status' => 1, 'message' => 'Successful', 'data' => $data], 200);
    }
}

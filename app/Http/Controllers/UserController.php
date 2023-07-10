<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function set_signature(Request $request)
    {
        try {
            $image = str_replace('data:image/png;base64,', '', $request->base64String);
            $image = str_replace(' ', '+', $image);
            $imageName = 'sig-' . uniqid() . '.png';
            Storage::put('public/assets/admin/images/signatures/' . $imageName, base64_decode($image));
            return response()->json(['status' => 1, 'message' => 'Shift clock out successfully.', 'fileName' => $imageName]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'message' => $th->getMessage()]);
        }
    }

    public function changestatus(Request $request)
    {
        try {
            User::where('id', $request->id)->update(['status' => $request->status]);
            return response()->json(['status' => 1, 'message' => 'Success'], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'message' => 'Something went wrong!'], 200);
        }
    }
}

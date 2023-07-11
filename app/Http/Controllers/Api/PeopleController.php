<?php

namespace App\Http\Controllers\Api;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $peoples = User::with('people_info')->where('type', 4)->get();
            $people_list = [];
            foreach ($peoples as $people) {
                $people_list[] = [
                    'id' => $people->id,
                    'fullname' => $people->fullname,
                    'role' => $people->rolename,
                    'email' => $people->email,
                    'status' => $people->status,
                    'review' => $people->review,
                    'points' => $people->points,
                    'image' => $people->image_url,
                ];
            }
            return response()->json(['status' => 1, 'message' => 'Successfull', 'people_list' => $people_list], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'message' => 'Something went wrong!',], 200);
        }
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        try {
            $people = User::with(['people_info', 'user_access_settings', 'user_notification_settings', 'user_permission_settings', 'user_other_settings'])->where('id', $id)->first();
            $peopledata = [
                'id' => $people->id,
                'fullname' => $people->fullname,
                'role' => $people->rolename,
                'fname' => $people->fname,
                'lname' => $people->lname,
                'email' => $people->email,
                'phone' => $people->phone,
                'city' => $people->city,
                'state' => $people->state,
                'country' => $people->country,
                'zipcode' => $people->zipcode,
                'timezone' => $people->timezone,
                'language' => $people->language,
                'image' => $people->image_url,
                'status' => $people->status,
                'people_info' => [
                    'driver_license_number' => !empty($people->people_info) ? $people->people_info->driver_license_number : '',
                    'driver_license_status' => !empty($people->people_info) ? $people->people_info->driver_license_status : '',
                    'ssn_tax_id' => !empty($people->people_info) ? $people->people_info->ssn_tax_id : '',
                    'uniform_size' => !empty($people->people_info) ? $people->people_info->uniform_size : '',
                    'emr_contact_name' => !empty($people->people_info) ? $people->people_info->emr_contact_name : '',
                    'emr_contact_phone' => !empty($people->people_info) ? $people->people_info->emr_contact_phone : '',
                    'emr_contact_relationship' => !empty($people->people_info) ? $people->people_info->emr_contact_relationship : '',
                    'emr_contact_miles' => !empty($people->people_info) ? $people->people_info->emr_contact_miles : '',
                    'emr_contact_license_number' => !empty($people->people_info) ? $people->people_info->emr_contact_license_number : '',
                    'emp_w4' => !empty($people->people_info) ? $people->people_info->emp_w4 : '',
                    'emp_verification' => !empty($people->people_info) ? $people->people_info->emp_verification : '',
                    'emp_background' => !empty($people->people_info) ? $people->people_info->emp_background : '',
                    'emp_direct' => !empty($people->people_info) ? $people->people_info->emp_direct : '',
                    'emp_health_ins' => !empty($people->people_info) ? $people->people_info->emp_health_ins : '',
                    'emp_8850' => !empty($people->people_info) ? $people->people_info->emp_8850 : '',
                    'emp_crp' => !empty($people->people_info) ? $people->people_info->emp_crp : '',
                    'emp_handbook' => !empty($people->people_info) ? $people->people_info->emp_handbook : '',
                    'imm_tb_test' => !empty($people->people_info) ? $people->people_info->imm_tb_test : '',
                    'start_tb_test_date' => !empty($people->people_info) ? Helper::date_format($people->people_info->start_tb_test_date) : '',
                    'end_tb_test_date' => !empty($people->people_info) ? Helper::date_format($people->people_info->end_tb_test_date) : '',
                    'imm_covid19_date' => !empty($people->people_info) ? Helper::date_format($people->people_info->imm_covid19_date) : '',
                    'imm_employee' => !empty($people->people_info) ? $people->people_info->imm_employee : '',
                    'imm_religious' => !empty($people->people_info) ? $people->people_info->imm_religious : '',
                    'imm_medical' => !empty($people->people_info) ? $people->people_info->imm_medical : '',
                ],
                'user_notification_settings' => [
                    'email' => !empty($people->user_notification_settings) ? $people->user_notification_settings->email : '',
                    'text' => !empty($people->user_notification_settings) ? $people->user_notification_settings->text : '',
                ],
                'documents' => [
                    'emp_w4' => '',
                    'emp_verification' => '',
                    'emp_background' => '',
                    'emp_direct' => '',
                    'emp_health_ins' => '',
                    'emp_8850' => '',
                    'emp_crp' => '',
                    'emp_handbook' => '',
                ],
            ];
            return response()->json(['status' => 1, 'message' => 'Successfull', 'peopledata' => $peopledata], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'message' => $th->getMessage()], 200);
        }
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
}

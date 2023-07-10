@extends('admin.theme.default')
@section('title')
    Settings
@endsection
@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection
@section('content')
    <div class="container-fluid content d-flex flex-column ">
        <!-- Begin::Content -->
        <h3 class="fw-bold mb-3">Settings</h3>
        <div class="card bg-white border-0 mb-3">
            <div class="card-body pb-0">
                <div class="nav nav-underline" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link fw-bold text-muted me-5 active" id="v-pills-staff-tab" data-bs-toggle="pill"
                        href="#v-pills-staff" role="tab" aria-controls="v-pills-staff" aria-selected="true">Staff</a>
                    <a class="nav-link fw-bold text-muted me-5" id="v-pills-user-settings-tab" data-bs-toggle="pill"
                        href="#v-pills-user-settings" role="tab" aria-controls="v-pills-user-settings"
                        aria-selected="true">User Settings</a>
                    <a class="nav-link fw-bold text-muted me-5" id="v-pills-billing-tab" data-bs-toggle="pill"
                        href="#v-pills-billing" role="tab" aria-controls="v-pills-billing"
                        aria-selected="true">Billing</a>
                    <a class="nav-link fw-bold text-muted me-5" id="v-pills-templates-tab" data-bs-toggle="pill"
                        href="#v-pills-templates" role="tab" aria-controls="v-pills-templates"
                        aria-selected="true">Templates</a>
                    <a class="nav-link fw-bold text-muted me-5" id="v-pills-news-tab" data-bs-toggle="pill"
                        href="#v-pills-news" role="tab" aria-controls="v-pills-news" aria-selected="true">News</a>
                    <a class="nav-link fw-bold text-muted me-5" id="v-pills-points-tab" data-bs-toggle="pill"
                        href="#v-pills-points" role="tab" aria-controls="v-pills-points" aria-selected="true">Points</a>
                    <a class="nav-link fw-bold text-muted me-5" id="v-pills-reasons-tab" data-bs-toggle="pill"
                        href="#v-pills-reasons" role="tab" aria-controls="v-pills-reasons"
                        aria-selected="true">Reasons</a>
                </div>
            </div>
        </div>
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-staff" role="tabpanel" aria-labelledby="v-pills-staff-tab">
                <div class="card bg-white border-0 mb-3">
                    <div class="card-body">
                        <div class="row row-cols-md-5 mb-3">
                            @foreach ($staffs as $staff)
                                <div class="col mb-5">
                                    <div class="card bg-white border-0 card-shadow">
                                        <div class="card-body dropdown ">
                                            <div class="d-grid justify-items-center">
                                                <img src="{{ $staff->image_url }}" alt=""
                                                    class="object-fit-cover rounded-circle outline-3 outline-secondary outline-solid mb-2"
                                                    width="100" height="100">
                                                <p class="fs-5 fw-bold text-dark">{{ $staff->fullname }}</p>
                                                <p class="text-secondary mb-2">{{ $staff->rolename() }}</p>
                                            </div>
                                            <span class="text-muted position-absolute p-2 cursor-pointer"
                                                data-bs-toggle="dropdown" aria-expanded="false" style="top:5%;right:5%">
                                                <i class="fa-regular fa-ellipsis-vertical fs-5"></i>
                                            </span>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item fw-500"
                                                        href="{{ URL::to('staff/' . $staff->id . '/edit') }}"><i
                                                            class="fa-solid fa-pen-to-square text-primary me-3"></i>Edit
                                                        Staff</a></li>
                                                <li><a class="dropdown-item fw-500" href="javascript:void(0)"
                                                        onclick="deletedata('{{ route('staff.destroy',[$staff->id ]) }}')"><i
                                                            class="fa-solid fa-trash-can text-primary me-3"></i>Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('staff.create') }}" class="btn btn-secondary text-center">add member</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="v-pills-user-settings" role="tabpanel"
                aria-labelledby="v-pills-user-settings-tab">
                <div class="card bg-white border-0 mb-3">
                    <div class="card-body">
                        <form action="{{ route('manage.user.settings') }}" method="post" id="userform">
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select name="user_type" id="user_type" class="form-select rounded-pill">
                                            <option value="2" data-type="staff_notification" selected="">Instacare Staff</option>
                                            <option value="3" data-type="facility_notification">Facilities</option>
                                            <option value="4" data-type="employees_notification">Employees</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="my-custom-switch">
                                        <input type="checkbox" class="d-none" name="user_group" id="user_group"
                                            value="1">
                                        <div class="slider round">
                                            <span class="slider_text">
                                                <span class="text-dark fs-8 off">All Users</span>
                                                <span class="text-dark fs-8 on">New Users</span>
                                            </span>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div id="staff_notification">
                                <div class="row mb-4">
                                    <p class="text-dark fw-semibold mb-2">Access</p>
                                    <div class="col-md-4">
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="access_dashboard">Dashboard</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="access[dashboard]" role="switch" id="access_dashboard"
                                                    checked>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="access_schedule">Schedule</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="access[schedule]" role="switch" id="access_schedule" checked>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="access_people">People</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="access[people]" role="switch" id="access_people" checked>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="access_facilities">Facilities</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="access[facilities]" role="switch" id="access_facilities"
                                                    checked>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="access_messaging">Messaging</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="access[messaging]" role="switch" id="access_messaging"
                                                    checked>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="access_timecards">Timecards</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="access[timecards]" role="switch" id="access_timecards"
                                                    checked>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="access_whos_on">Who’s ON</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="access[whos_on]" role="switch" id="access_whos_on" checked>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="access_total_billing">Total
                                                    Billing</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="access[total_billing]" role="switch" id="access_total_billing"
                                                    checked>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="access_support">Support</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="access[support]" role="switch" id="access_support" checked>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <p class="text-dark fw-semibold mb-2">Permissions</p>
                                    <div class="col-md-4">
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="permission_create_reminders">Create
                                                    reminders</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="permission[create_reminders]" role="switch"
                                                    id="permission_create_reminders" checked>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="permission_create_schedule">Create
                                                    Schedule</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="permission[create_schedule]" role="switch"
                                                    id="permission_create_schedule" checked>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="permission_delete_schedule">Delete
                                                    Schedule</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="permission[delete_schedule]" role="switch"
                                                    id="permission_delete_schedule" checked>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="permission_process_timecard">Process
                                                    Timecard</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="permission[process_timecard]" role="switch"
                                                    id="permission_process_timecard" checked>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="permission_report_timecard">Report
                                                    Timecard</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="permission[report_timecard]" role="switch"
                                                    id="permission_report_timecard" checked>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="permission_write_review">Write
                                                    Review</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="permission[write_review]" role="switch"
                                                    id="permission_write_review" checked>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label"
                                                    for="permission_messaging">Messaging</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="permission[messaging]" role="switch" id="permission_messaging"
                                                    checked>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="permission_create_timecard">Create
                                                    Timecard</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="permission[create_timecard]" role="switch"
                                                    id="permission_create_timecard" checked>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="permission_add_points">Add
                                                    Points</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="permission[add_points]" role="switch"
                                                    id="permission_add_points" checked>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <p class="text-dark fw-semibold mb-2">Notifications</p>
                                    <div class="col-md-4">
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label cursor-pointer" for=""
                                                    data-bs-toggle="modal" data-bs-target="#text_notifications_modal">Text
                                                    Message</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="notifications[text_message]" role="switch"
                                                    id="notifications_text_message" checked>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="notifications_email">Email</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="notifications[email]" role="switch" id="notifications_email"
                                                    checked>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label"
                                                    for="notifications_in_app_notifications">In App Notifications</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="notifications[in_app_notifications]" role="switch"
                                                    id="notifications_in_app_notifications" checked>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="facility_notification" style="display: none">
                                <div class="row mb-4">
                                    <p class="text-dark fw-semibold mb-2">Access</p>
                                    <div class="col-md-4">
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="access_dashboard">Dashboard</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="access[dashboard]" role="switch" id="access_dashboard"
                                                    checked>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="access_schedule">Schedule</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="access[schedule]" role="switch" id="access_schedule" checked>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="access_people">People</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="access[people]" role="switch" id="access_people" checked>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="access_messaging">Messaging</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="access[messaging]" role="switch" id="access_messaging"
                                                    checked>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="access_timecards">Timecards</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="access[timecards]" role="switch" id="access_timecards"
                                                    checked>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="access_whos_on">Who’s ON</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="access[whos_on]" role="switch" id="access_whos_on" checked>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="access_total_billing">Total
                                                    Billing</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="access[total_billing]" role="switch" id="access_total_billing"
                                                    checked>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="access_support">Support</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="access[support]" role="switch" id="access_support" checked>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <p class="text-dark fw-semibold mb-2">Permissions</p>
                                    <div class="col-md-4">
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="permissions_create_reminders">Create
                                                    reminders</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox" role="switch"
                                                    name="permissions[create_reminders]" id="permissions_create_reminders"
                                                    checked>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="permissions_create_schedule">Create
                                                    Schedule</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox" role="switch"
                                                    name="permissions[create_schedule]" id="permissions_create_schedule"
                                                    checked>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="permissions_create_timecard">Create
                                                    Timecard</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox" role="switch"
                                                    name="permissions[create_timecard]" id="permissions_create_timecard"
                                                    checked>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="permissions_process_timecard">Process
                                                    Timecard</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox" role="switch"
                                                    name="permissions[process_timecard]" id="permissions_process_timecard"
                                                    checked>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="permissions_report_timecard">Report
                                                    Timecard</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox" role="switch"
                                                    name="permissions[report_timecard]" id="permissions_report_timecard"
                                                    checked>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="permissions_write_review">Write
                                                    Review</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox" role="switch"
                                                    name="permissions[write_review]" id="permissions_write_review"
                                                    checked>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label"
                                                    for="permissions_messaging">Messaging</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="permissions[messaging]" role="switch"
                                                    id="permissions_messaging" checked>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="permissions_add_points">Add
                                                    Points</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="permissions[add_points]" role="switch"
                                                    id="permissions_add_points" checked>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <p class="text-dark fw-semibold mb-2">Notifications</p>
                                    <div class="col-md-4">
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="notifications_text_message">Text
                                                    Message</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="notifications[text_message]" role="switch"
                                                    id="notifications_text_message" checked>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="notifications_email">Email</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="notifications[email]" role="switch" id="notifications_email"
                                                    checked>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label"
                                                    for="notifications_in_app_notifications">In App Notifications</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="notifications[in_app_notifications]" role="switch"
                                                    id="notifications_in_app_notifications" checked>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="employees_notification" style="display: none">
                                <div class="row mb-4">
                                    <p class="text-dark fw-semibold mb-2">Access</p>
                                    <div class="col-md-4">
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="access_dashboard">Dashboard</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="access[dashboard]" role="switch" id="access_dashboard"
                                                    checked>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="access_my_availability">My
                                                    Availability</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="access[my_availability]" role="switch"
                                                    id="access_my_availability" checked>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="access_schedule">Schedule</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="access[schedule]" role="switch" id="access_schedule" checked>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="access_timecards">Timecards</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="access[timecards]" role="switch" id="access_timecards"
                                                    checked>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="access_messaging">Messaging</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="access[messaging]" role="switch" id="access_messaging"
                                                    checked>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="access_facilities">Facilities</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="access[facilities]" role="switch" id="access_facilities"
                                                    checked>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="access_payroll">Payroll</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="access[payroll]" role="switch" id="access_payroll" checked>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="access_support">Support</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="access[support]" role="switch" id="access_support" checked>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <p class="text-dark fw-semibold mb-2">Permissions</p>
                                    <div class="col-md-4">
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="permissions_clock_in_shifts">Clock In
                                                    Shifts</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="permissions[clock_in_shifts]" role="switch"
                                                    id="permissions_clock_in_shifts" checked>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="permissions_clock_out_shifts">Clock
                                                    Out Shifts</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="permissions[clock_out_shifts]" role="switch"
                                                    id="permissions_clock_out_shifts" checked>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="permissions_cancel_shifts">Cancel
                                                    Shifts</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="permissions[cancel_shifts]" role="switch"
                                                    id="permissions_cancel_shifts" checked>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label"
                                                    for="permissions_signature">Signature</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="permissions[signature]" role="switch"
                                                    id="permissions_signature" checked>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label"
                                                    for="permissions_accepting_shifts">Accepting Shifts</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="permissions[accepting_shifts]" role="switch"
                                                    id="permissions_accepting_shifts" checked>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label"
                                                    for="permissions_messaging">Messaging</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="permissions[messaging]" role="switch"
                                                    id="permissions_messaging" checked>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label"
                                                    for="permissions_download_timecard">Download Timecard</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="permissions[download_timecard]" role="switch"
                                                    id="permissions_download_timecard" checked>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="permissions_report_issue">Report an
                                                    Issue</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox"
                                                    name="permissions[report_issue]" role="switch"
                                                    id="permissions_report_issue" checked>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <p class="text-dark fw-semibold mb-2">Notifications</p>
                                    <div class="col-md-4">
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="notifications_text_message">Text
                                                    Message</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox" role="switch"
                                                    name="notifications[text_message]" id="notifications_text_message"
                                                    checked>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="notifications_email">Email</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox" role="switch"
                                                    name="notifications[email]" id="notifications_email" checked>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label class="form-check-label"
                                                    for="notifications_in_app_notifications">In App Notifications</label>
                                            </div>
                                            <div class="col-md-4 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox" role="switch"
                                                    name="notifications[in_app_notifications]"
                                                    id="notifications_in_app_notifications" checked>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <p class="text-dark fw-semibold mb-2">Other</p>
                                    <div class="col-md-5">
                                        <div class="row mb-2 align-items-center">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="automatic_clock_out">Automatic
                                                    Clock-Out</label>
                                            </div>
                                            <div class="col-md-5 form-check form-switch mb-0">
                                                <input class="form-check-input mx-0" type="checkbox" role="switch"
                                                    name="other[automatic_clock_out]" id="automatic_clock_out" checked>
                                            </div>
                                        </div>
                                        <div class="row mb-2 align-items-center">
                                            <div class="col-md-7">
                                                <label class="form-check-label"
                                                    for="restrict_clock_in_before_shift">Restrict Clock-In Before
                                                    Shift</label>
                                            </div>
                                            <div class="col-md-5 form-check form-switch mb-0">
                                                <div class="d-flex w-100 gap-3 align-items-center">
                                                    <input class="form-check-input mx-0" type="checkbox" role="switch"
                                                        name="other[restrict_clock_in_before_shift]"
                                                        id="restrict_clock_in_before_shift" checked>
                                                    <select class="form-select rounded-pill w-auto"
                                                        name="other[restrict_clock_in_before_shift_time_period]"
                                                        id="restrict_clock_in_before_shift_time_period">
                                                        <option value="5">5 Min</option>
                                                        <option value="10">10 Min</option>
                                                        <option value="20">20 Min</option>
                                                        <option value="30" selected>30 Min</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2 align-items-center">
                                            <div class="col-md-7">
                                                <label class="form-check-label"
                                                    for="restrict_clock_in_during_the_shift">Restrict Clock-In During the Shift</label>
                                            </div>
                                            <div class="col-md-5 form-check form-switch mb-0">
                                                <div class="d-flex w-100 gap-3 align-items-center">
                                                    <input class="form-check-input mx-0" type="checkbox" role="switch"
                                                        name="other[restrict_clock_in_during_the_shift]"
                                                        id="restrict_clock_in_during_the_shift" checked>
                                                    <select class="form-select rounded-pill w-auto"
                                                        name="other[restrict_clock_in_during_the_shift_time_period]"
                                                        id="restrict_clock_in_during_the_shift_time_period">
                                                        <option value="5">5 Min</option>
                                                        <option value="10">10 Min</option>
                                                        <option value="20">20 Min</option>
                                                        <option value="30" selected>30 Min</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="row mb-2 align-items-center">
                                            <div class="col-md-7">
                                                <label class="form-check-label" for="point_expiry_date">Point Expiry
                                                    Date</label>
                                            </div>
                                            <div class="col-md-5 form-check form-switch mb-0">
                                                <div class="d-flex w-100 gap-3 align-items-center">
                                                    <input class="form-check-input mx-0" type="checkbox" role="switch"
                                                        name="other[point_expiry_date]" id="point_expiry_date" checked>
                                                    <select class="form-select rounded-pill w-auto"
                                                        name="other[point_expiry_date_time_period]"
                                                        id="point_expiry_date_time_period">
                                                        <option value="15">15 Days</option>
                                                        <option value="30">30 Days</option>
                                                        <option value="45">45 Days</option>
                                                        <option value="90" selected>90 Days</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2 align-items-center">
                                            <div class="col-md-7">
                                                <label class="form-check-label"
                                                    for="incentives_who_havent_clock_in">Incentives Who Havent Clock
                                                    In</label>
                                            </div>
                                            <div class="col-md-5 form-check form-switch mb-0">
                                                <div class="d-flex w-100 gap-3 align-items-center">
                                                    <input class="form-check-input mx-0" type="checkbox" role="switch"
                                                        name="other[incentives_who_havent_clock_in]"
                                                        id="incentives_who_havent_clock_in" checked>
                                                    <select class="form-select rounded-pill w-auto"
                                                        name="other[incentives_who_havent_clock_in_time_period]"
                                                        id="incentives_who_havent_clock_in_time_period">
                                                        <option value="15">15 Days</option>
                                                        <option value="30">30 Days</option>
                                                        <option value="45">45 Days</option>
                                                        <option value="90" selected>90 Days</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-secondary rounded-pill text-uppercase"> Save
                                </button>
                                <button type="reset" class="btn btn-muted rounded-pill text-uppercase"> Cancel </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="v-pills-billing" role="tabpanel" aria-labelledby="v-pills-billing-tab">
                <div class="card bg-white border-0">
                    <div class="card-body">
                        <form action="{{ route('manage.billing.settings') }}" method="post" id="billingform">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 mb-2 bg-secondary-light rounded-pill mx-3">
                                    <div class="d-flex justify-content-between align-items-center p-3"
                                        data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                                        <span> Facilities </span>
                                        <i class="fa fa-chevron-down text-secondary"></i>
                                    </div>
                                    <div class="dropdown-menu p-3" style="width:450px;max-height:600px;overflow-y:auto">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input hw-1-5-em cursor-pointer" type="checkbox"
                                                name="all_facilities" id="all_facilities">
                                            <label class="form-check-label ps-3 cursor-pointer" for="all_facilities">
                                                Select All </label>
                                        </div>
                                        @foreach ($facilities as $key => $facility)
                                            <div class="form-check d-flex align-items-center">
                                                <input class="form-check-input hw-1-5-em checks2 cursor-pointer"
                                                    type="checkbox" name="facilities[]" id="faci{{ $key }}"
                                                    value="{{ $facility->id }}">
                                                <label
                                                    class="form-check-label ps-3 d-flex align-items-center w-100 cursor-pointer"
                                                    for="faci{{ $key }}"> <img
                                                        src="{{ Helper::image_path($facility->image) }}" alt="user"
                                                        class="" data-border-radius="10px" width="40"
                                                        height="40">
                                                    <span class="ms-2"> {{ $facility->name }} </span>
                                                </label>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            <div class="row row-cols-md-5 mb-5">
                                <div class="col form-group">
                                    <label for="max_billing_monthly" class="form-label text-dark fw-500 px-4">Max Billing
                                        Monthly</label>
                                    <input type="number" name="max_billing_monthly" id="max_billing_monthly"
                                        class="form-control form-control-lg rounded-pill"
                                        value="{{ old('max_billing_monthly') }}" placeholder="Max Billing Monthly($)">
                                </div>
                                <div class="col form-group">
                                    <label for="hourly_rate" class="form-label text-dark fw-500 px-4">Hourly Rate</label>
                                    <input type="number" name="hourly_rate" id="hourly_rate"
                                        class="form-control form-control-lg rounded-pill"
                                        value="{{ old('hourly_rate') }}" placeholder="Hourly Rate($)">
                                </div>
                                <div class="col form-group">
                                    <label for="weekend_hourly_rates" class="form-label text-dark fw-500 px-4">Weekend
                                        Hourly Rates</label>
                                    <input type="number" name="weekend_hourly_rates" id="weekend_hourly_rates"
                                        class="form-control form-control-lg rounded-pill"
                                        value="{{ old('weekend_hourly_rates') }}" placeholder="Weekend Hourly Rates($)">
                                </div>
                                <div class="col form-group">
                                    <label for="holiday_hourly_rates" class="form-label text-dark fw-500 px-4">Holiday
                                        Hourly Rates</label>
                                    <input type="number" name="holiday_hourly_rates" id="holiday_hourly_rates"
                                        class="form-control form-control-lg rounded-pill"
                                        value="{{ old('holiday_hourly_rates') }}" placeholder="Holiday Hourly Rates($)">
                                </div>
                            </div>
                            <div class="row row-cols-md-4 mb-2">
                                <div class="col">
                                    <label for="max_monthly_incentive" class="form-label text-dark fw-500">Max monthly
                                        incentive</label>
                                    <input type="text" name="max_monthly_incentive" id="max_monthly_incentive"
                                        class="form-control form-control-lg rounded-pill"
                                        value="{{ old('max_monthly_incentive') }}" placeholder="Max monthly incentive">
                                </div>
                                <div class="col">
                                    <label for="max_monthly_incentive_per_hour" class="form-label text-dark fw-500">Max
                                        monthly incentive (per hour)</label>
                                    <input type="text" name="max_monthly_incentive_per_hour"
                                        id="max_monthly_incentive_per_hour"
                                        class="form-control form-control-lg rounded-pill"
                                        value="{{ old('max_monthly_incentive_per_hour') }}"
                                        placeholder="Max monthly incentive (per hour)">
                                </div>
                                <div class="col">
                                    <label for="max_monthly_incentive_fixed" class="form-label text-dark fw-500">Max
                                        monthly incentive (Fixed)</label>
                                    <input type="text" name="max_monthly_incentive_fixed"
                                        id="max_monthly_incentive_fixed" class="form-control form-control-lg rounded-pill"
                                        value="{{ old('max_monthly_incentive_fixed') }}"
                                        placeholder="Max monthly incentive (Fixed)">
                                </div>
                            </div>
                            <div class="row mb-8">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="max_monthly_incentive" class="form-label text-dark fw-500">Allow
                                                Overtime?</label>
                                            <div class="d-flex gap-10">
                                                <div class="form-check mb-0"> <input class="form-check-input"
                                                        type="radio" name="allow_overtime" id="allow_overtime1"
                                                        value="yes" checked>
                                                    <label class="form-check-label" for="allow_overtime1">Yes</label>
                                                </div>
                                                <div class="form-check mb-0"> <input class="form-check-input"
                                                        type="radio" name="allow_overtime" id="allow_overtime2"
                                                        value="no">
                                                    <label class="form-check-label" for="allow_overtime2">No</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="overtime_hourly_rate" class="form-label text-dark fw-500">Hourly
                                                Rate</label>
                                            <input type="text" name="overtime_hourly_rate" id="overtime_hourly_rate"
                                                class="form-control form-control-lg rounded-pill"
                                                placeholder="Hourly Rate($)">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="overtime_percentage"
                                                class="form-label text-dark fw-500">Percentage</label>
                                            <input type="text" name="overtime_percentage" id="overtime_percentage"
                                                class="form-control form-control-lg rounded-pill"
                                                placeholder="Percentage(%)">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-8">
                                <div class="col-md-4">
                                    <label for="max_monthly_incentive" class="form-label text-dark fw-500">Invoice
                                        Delivery</label>
                                    <div class="d-flex gap-20">
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" type="radio" name="invoice_delivery"
                                                id="invoice_delivery1" value="email" checked>
                                            <label class="form-check-label" for="invoice_delivery1">Email</label>
                                        </div>
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" type="radio" name="invoice_delivery"
                                                id="invoice_delivery2" value="physical">
                                            <label class="form-check-label" for="invoice_delivery2">Physical</label>
                                        </div>
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" type="radio" name="invoice_delivery"
                                                id="invoice_delivery3" value="both">
                                            <label class="form-check-label" for="invoice_delivery3">Both</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-8">
                                <div class="col-md-5">
                                    <label for="max_monthly_incentive" class="form-label text-dark fw-500">Invoice
                                        Statement</label>
                                    <div class="d-flex gap-15">
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" type="radio" name="invoice_statement"
                                                id="invoice_statement1" value="daily" checked>
                                            <label class="form-check-label" for="invoice_statement1">Daily</label>
                                        </div>
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" type="radio" name="invoice_statement"
                                                id="invoice_statement2" value="weekly">
                                            <label class="form-check-label" for="invoice_statement2">Weekly</label>
                                        </div>
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" type="radio" name="invoice_statement"
                                                id="invoice_statement3" value="monthly">
                                            <label class="form-check-label" for="invoice_statement3">Monthly</label>
                                        </div>
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" type="radio" name="invoice_statement"
                                                id="invoice_statement4" value="custom">
                                            <label class="form-check-label" for="invoice_statement4">Custom</label>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-3 mt-3 statement-dates">
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <input type="text"
                                                    class="form-control rounded-pill-start datepicker1"
                                                    name="invoice_statement_start_date"
                                                    id="invoice_statement_start_date" placeholder="Select Start Date">
                                                <span
                                                    class="input-group-text border-0 text-secondary bg-secondary-light rounded-pill-end">
                                                    <i class="far fa-calendar"></i> </span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <input type="text"
                                                    class="form-control rounded-pill-start datepicker1"
                                                    name="invoice_statement_end_date" id="invoice_statement_end_date"
                                                    placeholder="Select End Date">
                                                <span
                                                    class="input-group-text border-0 text-secondary bg-secondary-light rounded-pill-end">
                                                    <i class="far fa-calendar"></i> </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <label for="max_monthly_incentive" class="form-label text-dark fw-500">Invoice
                                        Frequency Delivery</label>
                                    <div class="d-flex gap-15">
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" type="radio"
                                                name="invoice_frequency_delivery" id="invoice_frequency_delivery1"
                                                value="daily" checked>
                                            <label class="form-check-label"
                                                for="invoice_frequency_delivery1">Daily</label>
                                        </div>
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" type="radio"
                                                name="invoice_frequency_delivery" id="invoice_frequency_delivery2"
                                                value="weekly">
                                            <label class="form-check-label"
                                                for="invoice_frequency_delivery2">Weekly</label>
                                        </div>
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" type="radio"
                                                name="invoice_frequency_delivery" id="invoice_frequency_delivery3"
                                                value="monthly">
                                            <label class="form-check-label"
                                                for="invoice_frequency_delivery3">Monthly</label>
                                        </div>
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" type="radio"
                                                name="invoice_frequency_delivery" id="invoice_frequency_delivery4"
                                                value="custom">
                                            <label class="form-check-label"
                                                for="invoice_frequency_delivery4">Custom</label>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-3 mt-3 delivery-dates">
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <input type="text"
                                                    class="form-control rounded-pill-start datepicker1"
                                                    name="invoice_frequency_start_date"
                                                    id="invoice_frequency_start_date" placeholder="Select Start Date">
                                                <span
                                                    class="input-group-text border-0 text-secondary bg-secondary-light rounded-pill-end">
                                                    <i class="far fa-calendar"></i> </span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <input type="text"
                                                    class="form-control rounded-pill-start datepicker1"
                                                    name="invoice_frequency_end_date" id="invoice_frequency_end_date"
                                                    placeholder="Select End Date">
                                                <span
                                                    class="input-group-text border-0 text-secondary bg-secondary-light rounded-pill-end">
                                                    <i class="far fa-calendar"></i> </span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-secondary rounded-pill text-uppercase"> Save
                                </button>
                                <button type="reset" class="btn btn-muted rounded-pill text-uppercase"> Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="v-pills-templates" role="tabpanel"
                aria-labelledby="v-pills-templates-tab">
                <div class="card bg-white border-0 mb-3">
                    <div class="card-body pb-15">
                        <div class="row">
                            <div class="col-md-3 form-group mb-5">
                                <select name="templates_settings" id="templates_settings_select"
                                    class="form-select rounded-pill">
                                    <option value="email_templates" selected>Email Templates</option>
                                    <option value="text_templates">Text Templates</option>
                                    <option value="both">Email/Text Templates</option>
                                </select>
                            </div>
                        </div>
                        <div class="text_templates mb-5">
                            <table id="dataTable" data-toggle="table" class="table-striped mb-8 text-template">
                                <thead>
                                    <tr class="bg-primary text-white">
                                        <th class="fw-normal border-0" data-field="text_subject">Text Subject</th>
                                        <th class="fw-normal border-0" data-field="text_quick_message">Text Quick
                                            Message </th>
                                        <th class="fw-normal border-0" data-field="text_status">Status</th>
                                        <th class="fw-normal border-0" data-field="text_action"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($templatesettings as $template)
                                        @if ($template->type == 2)
                                            <tr>
                                                <td>{{ $template->subject }}</td>
                                                <td>{{ Str::limit(strip_tags($template->quick_message), 50) }}</td>
                                                <td>
                                                    @if ($template->is_active == 1)
                                                        Available <i
                                                            class="fa-solid fa-circle-small fs-9 text-success"></i>
                                                    @else
                                                        Unavailable <i
                                                            class="fa-solid fa-circle-small fs-9 text-danger"></i>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0)" class="manage-text-template"
                                                        data-ttid="{{ $template->id }}"
                                                        data-status="{{ $template->is_active }}"
                                                        data-subject="{{ $template->subject }}"
                                                        data-message="{{ $template->quick_message }}"><i
                                                            class="fa-regular fa-pen-to-square"></i></a>
                                                    <a href="javascript:void(0)" class="ms-2"
                                                        onclick="deletedata('{{ route('template.settings.delete', [$template->id]) }}')"><i
                                                            class="fa-regular fa-trash-can"></i></a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                            <a class="text-template text-uppercase fw-bold cursor-pointer fs-8 add-text-template"
                                data-bs-toggle="modal" data-bs-target="#text_templatemodal">+ add new text template</a>
                        </div>
                        <div class="email_templates">
                            <table id="dataTable" data-toggle="table" class="table-striped mb-8 email-template">
                                <thead>
                                    <tr class="bg-primary text-white">
                                        <th class="fw-normal border-0" data-field="email_subject">Email Subject</th>
                                        <th class="fw-normal border-0" data-field="email_quick_message">Email Quick
                                            Message </th>
                                        <th class="fw-normal border-0" data-field="email_status">Status</th>
                                        <th class="fw-normal border-0" data-field="email_action"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($templatesettings as $template)
                                        @if ($template->type == 1)
                                            <tr>
                                                <td>{{ $template->subject }}</td>
                                                <td>{{ Str::limit(strip_tags($template->quick_message), 50) }}</td>
                                                <td>
                                                    @if ($template->is_active == 1)
                                                        Available <i
                                                            class="fa-solid fa-circle-small fs-9 text-success"></i>
                                                    @else
                                                        Unavailable <i
                                                            class="fa-solid fa-circle-small fs-9 text-danger"></i>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0)" class="manage-email-template"
                                                        data-etid="{{ $template->id }}"
                                                        data-status="{{ $template->is_active }}"
                                                        data-subject="{{ $template->subject }}"
                                                        data-message="{{ $template->quick_message }}"><i
                                                            class="fa-regular fa-pen-to-square"></i></a>
                                                    <a href="javascript:void(0)" class="ms-2"
                                                        onclick="deletedata('{{ route('template.settings.delete', [$template->id]) }}')"><i
                                                            class="fa-regular fa-trash-can"></i></a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                            <a class="email-template text-uppercase fw-bold cursor-pointer fs-8" data-bs-toggle="modal"
                                data-bs-target="#email_templatemodal">+ add new email template</a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="v-pills-news" role="tabpanel" aria-labelledby="v-pills-news-tab">
                <div class="card bg-white border-0 mb-3">
                    <div class="card-body">
                        <table id="dataTable" data-toggle="table" class="table-striped">
                            <thead>
                                <tr class="bg-primary text-white">
                                    <th class="fw-normal border-0" data-field="date">Date</th>
                                    <th class="fw-normal border-0" data-field="news_title">News Title</th>
                                    <th class="fw-normal border-0" data-field="description">Description</th>
                                    <th class="fw-normal border-0" data-field="status">Status</th>
                                    <th class="fw-normal border-0" data-field="action"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($newssettings as $news)
                                    <tr>
                                        <td>{{ Helper::date_time_format($news->created_at) }}</td>
                                        <td><span class="text-primary fw-500">{{ $news->title }}</span></td>
                                        <td>{{ Str::limit(strip_tags($news->description), 100) }}</td>
                                        <td>
                                            @if ($news->is_active == 1)
                                                Active <i class="fa-solid fa-circle-small fs-9 text-success"></i>
                                            @else
                                                Not Active <i class="fa-solid fa-circle-small fs-9 text-danger"></i>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" class="manage-news-data"
                                                data-nid="{{ $news->id }}" data-title="{{ $news->title }}"
                                                data-type="{{ $news->type }}" data-ntitle="News"
                                                data-description="{{ $news->description }}"
                                                data-status="{{ $news->is_active }}"
                                                data-created-at="{{ Helper::date_time_format($news->created_at) }}"
                                                data-updated-at="{{ Helper::date_time_format($news->updated_at) }}">
                                                <i class="fa-regular fa-pen-to-square"></i></a>
                                            <a href="javascript:void(0)" class="ms-2"
                                                onclick="deletedata('{{ route('news.settings.delete', [$news->id]) }}')"><i
                                                    class="fa-regular fa-trash-can"></i></a>
                                        </td>
                                @endforeach
                            </tbody>
                        </table>
                        <a class="text-uppercase fw-bold cursor-pointer fs-8 add-news_" data-ntitle="Add News"
                            data-created-at="{{ date('F j, Y h:iA') }}" data-bs-toggle="modal"
                            data-bs-target="#news_settings_modal">+Add News</a>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="v-pills-points" role="tabpanel" aria-labelledby="v-pills-points-tab">
                <div class="card bg-white border-0 mb-3">
                    <div class="card-body">
                        <table id="dataTable" data-toggle="table" class="table-striped">
                            <thead>
                                <tr class="bg-primary text-white">
                                    <th class="fw-normal border-0" data-field="reason">Reason</th>
                                    <th class="fw-normal border-0" data-field="points">Points</th>
                                    <th class="fw-normal border-0" data-field="action"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pointssettings as $points)
                                    <tr>
                                        <td>{{ $points->reason }}</td>
                                        <td> <span class="text-primary fw-500">{{ $points->points }}</span> </td>
                                        <td>
                                            <a href="javascript:void(0)" class="manage-points"
                                                data-pid="{{ $points->id }}" data-reason="{{ $points->reason }}"
                                                data-points="{{ $points->points }}"> <i
                                                    class="fa-regular fa-pen-to-square"></i> </a>
                                            <a href="javascript:void(0)" class="ms-2"
                                                onclick="deletedata('{{ route('points.settings.delete', [$points->id]) }}')"><i
                                                    class="fa-regular fa-trash-can"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a class="text-uppercase fw-bold cursor-pointer fs-8" data-bs-toggle="modal"
                            data-bs-target="#points_modal"> +Add New Point </a>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="v-pills-reasons" role="tabpanel" aria-labelledby="v-pills-reasons-tab">
                <div class="card bg-white border-0 mb-3">
                    <div class="card-body">
                        <table id="dataTable" data-toggle="table" class="table-striped">
                            <thead>
                                <tr class="bg-primary text-white">
                                    <th class="fw-normal border-0" data-field="reason">Reason</th>
                                    {{-- <th class="fw-normal border-0" data-field="area">Area</th> --}}
                                    <th class="fw-normal border-0" data-field="status">Status</th>
                                    <th class="fw-normal border-0" data-field="action"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reasonsettings as $reason)
                                    <tr>
                                        <td>{{ $reason->reason }}</td>
                                        {{-- <td>{{ $reason->area }}</td> --}}
                                        <td>
                                            @if ($reason->is_active == 1)
                                                Active <i class="fa-solid fa-circle-small fs-9 text-success"></i>
                                            @else
                                                Not Active <i class="fa-solid fa-circle-small fs-9 text-danger"></i>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" class="manage-reason"
                                                data-rid="{{ $reason->id }}" data-reason="{{ $reason->reason }}"
                                                {{-- data-area="{{ $reason->area }}" --}} data-status="{{ $reason->is_active }}"> <i
                                                    class="fa-regular fa-pen-to-square"></i></a>
                                            <a href="javascript:void(0)" class="ms-2"
                                                onclick="deletedata('{{ route('reason.settings.delete', [$reason->id]) }}')"><i
                                                    class="fa-regular fa-trash-can"></i></a>
                                        </td>
                                @endforeach
                            </tbody>
                        </table>
                        <a class="text-uppercase fw-bold cursor-pointer fs-8" data-bs-toggle="modal"
                            data-bs-target="#reason_modal"> +Add reasons </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End::Content -->

        <!-- Text template modal -->
        <div class="modal fade" id="text_templatemodal" tabindex="-1" aria-labelledby="text_templatemodalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 fw-semibold" id="text_templatemodalLabel">Add Quick Message</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form action="{{ route('manage.template.settings') }}" method="post" id="texttemplateform">
                        <input type="hidden" name="ttid" id="ttid">
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="text" name="subject" id="subject"
                                        class="form-control form-controlo-lg rounded-pill" placeholder="Subject">
                                </div>
                                <div class="form-group col-md-6">
                                    <select name="status" id="status" class="form-select rounded-pill">
                                        <option value="" selected>Status</option>
                                        <option value="1">Active</option>
                                        <option value="2">Inactive</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <textarea name="message" id="message" rows="10" class="form-control" placeholder="Your Quick Message"></textarea>
                                    <div class="form-text px-5">Maximum 50 words</div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-start border-0 pb-8">
                            <button type="submit" class="btn btn-secondary"> Save </button>
                            <button type="button" class="btn btn-muted" data-bs-dismiss="modal"> Cancel </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Email template modal -->
        <div class="modal fade" id="email_templatemodal" tabindex="-1" aria-labelledby="email_templatemodalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 fw-semibold" id="email_templatemodalLabel"> Email Template Add </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form action="{{ route('manage.email.template.settings') }}" method="post"
                        id="emailtemplateform">
                        <input type="hidden" name="etid" id="etid">
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="text" name="subject" id="subject"
                                        class="form-control form-controlo-lg rounded-pill" placeholder="Subject">
                                </div>
                                <div class="form-group col-md-6">
                                    <select name="status" id="status" class="form-select rounded-pill">
                                        <option value="" selected>Status</option>
                                        <option value="1">Active</option>
                                        <option value="2">Inactive</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <textarea name="message" id="email_ckeditor" rows="10" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-start border-0 pb-8">
                            <button type="submit" class="btn btn-secondary">Save</button>
                            <button type="button" class="btn btn-muted" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Manage news modal -->
        <div class="modal fade" id="news_settings_modal" tabindex="-1" aria-labelledby="news_settings_modalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 fw-bold" id="news_settings_modalLabel">Add News</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form action="{{ route('manage.news.settings') }}" method="post" id="newssettingsform">
                        <input type="hidden" name="nid" id="nid">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-6 mb-3 fw-semibold fs-9 created-at"><span></span></div>
                                <div class="col-lg-6 mb-3 fw-semibold fs-9 updated-at text-end">Last Updated at :
                                    <span></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="title" id="title"
                                            class="form-control form-controlo-lg rounded-pill" placeholder="News Title">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <select name="status" id="status" class="form-select rounded-pill">
                                            <option value="" selected>Status</option>
                                            <option value="1">Active</option>
                                            <option value="2">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <select name="type" id="type" class="form-select rounded-pill">
                                            <option value="" selected>Send to</option>
                                            <option value="1">For Instacare Staff</option>
                                            <option value="2">For Facilities</option>
                                            <option value="3">For Employees</option>
                                            <option value="4">For All</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <textarea name="description" id="news_ckeditor" rows="10" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-start border-0 pb-8">
                            <button type="submit" class="btn btn-secondary">Save</button>
                            <button type="button" class="btn btn-muted" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Points modal -->
        <div class="modal fade" id="points_modal" tabindex="-1" aria-labelledby="points_modalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 fw-semibold" id="points_modalLabel"> Add Custom Points </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form action="{{ route('manage.points.settings') }}" method="post" id="pointsform">
                        <input type="hidden" name="pid" id="pid">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" name="reason" id="reason"
                                    class="form-control form-control-lg rounded-pill" placeholder="Reason">
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <span class="badge bg-secondary rounded-circle p-3 cursor-pointer minus"><i
                                        class="fa-regular fa-minus"></i></span>
                                <input type="number" name="points" id="points"
                                    class="form-control form-control-lg rounded-pill text-center" value="0"
                                    readonly />
                                <span class="badge bg-secondary rounded-circle p-3 cursor-pointer plus"><i
                                        class="fa-regular fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-start border-0 pb-8">
                            <button type="submit" class="btn btn-secondary">Save</button>
                            <button type="button" class="btn btn-muted" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Reasons modal -->
        <div class="modal fade" id="reason_modal" tabindex="-1" aria-labelledby="reason_modalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 fw-semibold" id="reason_modalLabel"> Add Reason </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form action="{{ route('manage.reason.settings') }}" method="post" id="reasonform">
                        <input type="hidden" name="rid" id="rid">
                        <div class="modal-body">
                            <div class="row">
                                {{-- <div class="form-group col-md-6">
                                    <select name="area" id="area" class="form-select rounded-pill">
                                        <option value="area" selected> Area </option>
                                    </select>
                                </div> --}}
                                <div class="form-group col-md-12">
                                    <select name="status" id="status" class="form-select rounded-pill">
                                        <option value="" selected> Status </option>
                                        <option value="1"> Active </option>
                                        <option value="2"> Inactive </option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <textarea name="reason" id="reason" rows="10" class="form-control" placeholder="Your Quick Message"></textarea>
                                    <div class="form-text px-5">Maximum 10 words</div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-start border-0 pb-8">
                            <button type="submit" class="btn btn-secondary"> Save </button>
                            <button type="button" class="btn btn-muted" data-bs-dismiss="modal"> Cancel </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="text_notifications_modal" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content" style="width:370px;" data-border-radius="20px">
                    <div class="modal-header border-0">
                        <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Text Message</h1>
                        <button type="button" class="btn-close fs-7" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body pt-0 hide-scrollbar">
                        @php
                            $arr = ['text_confirm_shifts', 'text_schedule_shifts', 'text_cancelled_shifts', 'text_deleted_shifts', 'text_timecard_processed', 'text_late_clock_in', 'text_late_clock_out', 'text_shift_posted_by_instacare', 'text_shift_posted_by_facilitites', 'text_arriving_late', 'text_arriving_late_reported_by_employee', 'text_requested_to_work_at_a_certain_facility', 'text_message_sent', 'text_message_receive', 'text_person_added', 'text_facility_added', 'text_member_added', 'text_documents_uploaded', 'text_setting_changed', 'text_report_generated', 'text_support_request', 'text_change_in_billing_parameters', 'text_email_template_added', 'text_email_template_edited', 'text_email_and_text_template_added', 'text_email_and_text_template_edited', 'text_points_added', 'text_points_reason_added', 'text_shift_completed', 'text_call_of_shift', 'text_unassigned_shift'];
                        @endphp
                        @foreach ($arr as $key => $value)
                            <div class="d-flex justify-content-between mb-3">
                                <label class="form-check-label"
                                    for="check_{{ $key }}">{{ ucfirst(str_replace('_', ' ', str_replace('text_', '', $value))) }}</label>
                                <div class="form-check form-switch mb-0 ps-2">
                                    <input class="form-check-input mx-0" type="checkbox"
                                        name="notifications[{{ $value }}]" role="switch"
                                        id="check_{{ $key }}" checked>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.12.1/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="{{ url('resources/views/admin/settings/settings.js') }}"></script>
    <script>
        var editorsarray = [];
        editorsarray.push({
            id: 'email_ckeditor',
            instance: CKEDITOR.replace('email_ckeditor', {
                height: '250',
            })
        });
        editorsarray.push({
            id: 'news_ckeditor',
            instance: CKEDITOR.replace('news_ckeditor', {
                height: '250',
            })
        });
    </script>
    <script>
        // ---------------------------------------------- //
        // ------------ Manage User Settings ------------ //
        // ---------------------------------------------- //
        $('#user_type').on('change', function() {
            "use strict";
            $('#staff_notification').toggle($(this).find(':selected').attr('data-type') === 'staff_notification');
            $('#facility_notification').toggle($(this).find(':selected').attr('data-type') ===
                'facility_notification');
            $('#employees_notification').toggle($(this).find(':selected').attr('data-type') ===
                'employees_notification');
            if ($(this).find(':selected').attr('data-type') == 'staff_notification') {
                $('#staff_notification input, #staff_notification select').attr('disabled', false);
                $('#facility_notification input, #facility_notification select').attr('disabled', true);
                $('#employees_notification input, #employees_notification select').attr('disabled', true);
            } else if ($(this).find(':selected').attr('data-type') == 'facility_notification') {
                $('#staff_notification input, #staff_notification select').attr('disabled', true);
                $('#facility_notification input, #facility_notification select').attr('disabled', false);
                $('#employees_notification input, #employees_notification select').attr('disabled', true);
            } else if ($(this).find(':selected').attr('data-type') == 'employees_notification') {
                $('#staff_notification input, #staff_notification select').attr('disabled', true);
                $('#facility_notification input, #facility_notification select').attr('disabled', true);
                $('#employees_notification input, #employees_notification select').attr('disabled', false);
            }
        }).change();
        $('#userform').on('submit', function(event) {
            "use strict";
            event.preventDefault();
            $('.err').remove();
            var formData = new FormData(this);
            if ($('#user_type').val() == '2') {
                $('#text_notifications_modal input[type="checkbox"]').each(function() {
                    if ($(this).is(':checked')) {
                        formData.append($(this).attr('name'), $(this).val());
                    }
                });
            }
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                beforeSend: function(response) {
                    // showpreloader();
                },
                success: function(response) {
                    // hidepreloader();
                    if (response.status == 0) {
                        if (response.errors && Object.keys(response.errors).length > 0) {
                            $.each(response.errors, function(key, value) {
                                $('#userform #' + key).parent().append(
                                    '<small class="err text-danger">' + value + '</small>')
                            });
                        } else {
                            showtoast(2, response.message)
                        }
                        return false;
                    } else {
                        $('.err').remove();
                        $('#userform').removeClass('was-validated');
                        $('#userform')[0].reset();
                        showtoast(1, response.message)
                    }
                },
                error: function(xhr, status, error) {
                    // hidepreloader();
                    showtoast(2, wrong)
                    return false;
                }
            });
        });
    </script>
@endsection

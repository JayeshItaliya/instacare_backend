@extends('admin.theme.default')
@section('title')
    Edit Profile
@endsection
@section('style')
@endsection
@section('content')
    <div class="container-fluid content d-flex flex-column ">
        <!-- Begin::Content -->
        <div class="d-flex align-items-center mb-3">
            <h3 class="fw-bold">Edit Profile</h3>
        </div>
        <div class="card bg-white border-0">
            <div class="card-body">
                <form class="needs-validation" novalidate action="{{ route('profile.update', [auth()->user()->id]) }}"
                    method="POST" enctype="multipart/form-data" id="editprofileform">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-6 mb-5">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <img src="{{ auth()->user()->image_url }}" alt="" class=""
                                                height="100" width="100"  data-border-radius="20px"
                                                id="uploadedImage">
                                        </div>
                                        <div class="col-auto">
                                            <label for="open_gallery"
                                                class="custom-input-file py-4 cursor-pointer px-12 d-grid "> <i
                                                    class="fa-light fa-image text-secondary fs-5 pb-2"></i> Open Gallery
                                            </label>
                                            <input type="file" class="d-none" name="image" id="open_gallery"
                                                id="image" accept=".jpg,.png.,.jpeg">
                                        </div>
                                        <div class="col-auto">
                                            <label for="camera"
                                                class="custom-input-file py-4 cursor-pointer px-17 d-grid ">
                                                <i class="fa-light fa-camera text-secondary fs-5 pb-2"></i> Camera </label>
                                            <input type="file" class="d-none" id="camera" accept="image/*"
                                                capture="user">
                                        </div>
                                        <div class="col-auto">
                                            <small class="text-muted">Maximum size: 10MB</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <h6 class="text-primary fw-bold mb-3 mt-4"> Account Information </h6>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control rounded-pill"
                                                            name="fname" id="fname" placeholder="First name"
                                                            value="{{ auth()->user()->fname }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control rounded-pill"
                                                            name="lname" id="lname" placeholder="Last Name"
                                                            value="{{ auth()->user()->lname }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control rounded-pill" name="phone"
                                                    id="phone" placeholder="Phone" value="{{ auth()->user()->phone }}"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="email" class="form-control rounded-pill" name="email"
                                                    id="email" placeholder="email" value="{{ auth()->user()->email }}"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <select class="form-select rounded-pill" name="" id="" required>
                                                <option value="lpn" selected>LPN</option>
                                                <option value="rn">RN</option>
                                                <option value="cna">CNA</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h6 class="text-primary fw-bold mb-3 mt-4">
                                        Address
                                    </h6>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <select class="form-select rounded-pill" name="country" id="country" required>
                                                @foreach (Helper::countries_list() as $country)
                                                    <option value="{{ $country }}"
                                                        {{ $country == auth()->user()->country ? 'selected' : '' }}>
                                                        {{ $country }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control rounded-pill" name="state"
                                                    id="state" placeholder="State"
                                                    value="{{ auth()->user()->state }}" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control rounded-pill"
                                                            name="city" id="city" placeholder="City"
                                                            value="{{ auth()->user()->city }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control rounded-pill"
                                                            name="zipcode" id="zipcode" placeholder="Zip"
                                                            value="{{ auth()->user()->zipcode }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h6 class="text-primary fw-bold mb-3 mt-4">
                                        General
                                    </h6>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <select class="form-select rounded-pill" name="timezone" id="timezone"
                                                required>
                                                @foreach (Helper::timezones_list() as $timezone)
                                                    <option value="{{ $timezone }}" {{ auth()->user()->timezone == $timezone ? 'selected' : '' }}>{{ $timezone }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-6">
                                            <select class="form-select rounded-pill" name="language" id="language"
                                                required>
                                                <option value="English" selected> English </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-md-6">
                            <div class="row mb-4">
                                <div class="col-md-12 mb-2">
                                    <strong class="fs-5">Access</strong>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                        <label class="form-check-label default" for="dashboard"> Dashboard </label>
                                        <input class="form-check-input" type="checkbox" name="access[dashboard]"
                                            role="switch" id="dashboard" checked>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                        <label class="form-check-label default" for="facilities"> Facilities </label>
                                        <input class="form-check-input" type="checkbox" name="access[facilities]"
                                            role="switch" id="facilities" checked>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                        <label class="form-check-label default" for="whoson"> Who’s ON </label>
                                        <input class="form-check-input" type="checkbox" name="access[whoson]"
                                            role="switch" id="whoson" checked>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                        <label class="form-check-label default" for="schedule"> Schedule </label>
                                        <input class="form-check-input" type="checkbox" name="access[schedule]"
                                            role="switch" id="schedule" checked>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                        <label class="form-check-label default" for="messaging"> Messaging </label>
                                        <input class="form-check-input" type="checkbox" name="access[messaging]"
                                            role="switch" id="messaging" checked>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                        <label class="form-check-label default" for="total_billing"> Total Billing
                                        </label>
                                        <input class="form-check-input" type="checkbox" name="access[total_billing]"
                                            role="switch" id="total_billing" checked>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                        <label class="form-check-label default" for="people"> People </label>
                                        <input class="form-check-input" type="checkbox" name="access[people]"
                                            role="switch" id="people" checked>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                        <label class="form-check-label default" for="timecards"> Timecards </label>
                                        <input class="form-check-input" type="checkbox" name="access[timecards]"
                                            role="switch" id="timecards" checked>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                        <label class="form-check-label default" for="support"> Support </label>
                                        <input class="form-check-input" type="checkbox" name="access[support]"
                                            role="switch" id="support" checked>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-12 mb-2">
                                    <strong class="fs-5">Permissions</strong>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                        <label class="form-check-label default" for="create_reminders"> Create reminders
                                        </label>
                                        <input class="form-check-input" type="checkbox"
                                            name="permissions[create_reminders]" role="switch" id="create_reminders"
                                            checked>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                        <label class="form-check-label default" for="process_timecard"> Process Timecard
                                        </label>
                                        <input class="form-check-input" type="checkbox"
                                            name="permissions[process_timecard]" role="switch" id="process_timecard"
                                            checked>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                        <label class="form-check-label default" for="messaging"> Messaging </label>
                                        <input class="form-check-input" type="checkbox" name="permissions[messaging]"
                                            role="switch" id="messaging" checked>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                        <label class="form-check-label default" for="create_schedule"> Create Schedule
                                        </label>
                                        <input class="form-check-input" type="checkbox"
                                            name="permissions[create_schedule]" role="switch" id="create_schedule"
                                            checked>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                        <label class="form-check-label default" for="report_timecard"> Report Timecard
                                        </label>
                                        <input class="form-check-input" type="checkbox"
                                            name="permissions[report_timecard]" role="switch" id="report_timecard"
                                            checked>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                        <label class="form-check-label default" for="create_timecard"> Create Timecard
                                        </label>
                                        <input class="form-check-input" type="checkbox"
                                            name="permissions[create_timecard]" role="switch" id="create_timecard"
                                            checked>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                        <label class="form-check-label default" for="delete_schedule"> Delete Schedule
                                        </label>
                                        <input class="form-check-input" type="checkbox"
                                            name="permissions[delete_schedule]" role="switch" id="delete_schedule"
                                            checked>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                        <label class="form-check-label default" for="add_points"> Add Points </label>
                                        <input class="form-check-input" type="checkbox" name="permissions[add_points]"
                                            role="switch" id="add_points" checked>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                        <label class="form-check-label default" for="write_review"> Write Review </label>
                                        <input class="form-check-input" type="checkbox" name="permissions[write_review]"
                                            role="switch" id="write_review" checked>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4 mb-4">
                                <strong class="fs-5">Notifications</strong>
                                <div class="col-md-6">
                                    <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                        <label class="form-check-label default" for="text_message">Text Message</label>
                                        <input class="form-check-input" type="checkbox"
                                            name="notifications[text_message]" role="switch" id="text_message" checked>
                                    </div>
                                    <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                        <label class="form-check-label default" for="email">Email</label>
                                        <input class="form-check-input" type="checkbox" name="notifications[email]"
                                            role="switch" id="email" checked>
                                    </div>
                                    <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                        <label class="form-check-label default" for="in_app_notifications">In App
                                            Notifications</label>
                                        <input class="form-check-input" type="checkbox"
                                            name="notifications[in_app_notifications]" role="switch"
                                            id="in_app_notifications" checked>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-12">
                            <button type="submit" class="btn btn-secondary rounded-pill py-2 text-white text-uppercase">
                                Save </button>
                            <a class="btn btn-muted rounded-pill py-2 text-white text-uppercase"
                                href="{{ URL::to('profile') }}"> Cancel </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End::Content -->
    </div>
@endsection
@section('script')
    <script src="{{ url('resources/views/admin/profile/profile.js') }}"></script>
@endsection

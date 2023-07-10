@extends('admin.theme.default')
@section('title')
    Edit Staff
@endsection
@section('content')
    <div class="container-fluid content d-flex flex-column ">
        <!-- Begin::Content -->
        <div class="row align-items-center justify-content-between mb-3">
            <div class="col-auto">
                <div class="d-flex align-items-center">
                    <a href="{{ route('settings.index') }}" class="btn bg-white text-secondary rounded-circle me-3"><i
                            class="fa-regular fa-chevron-left"></i></a>
                    <h3 class="fw-bold">Edit Staff</h3>
                </div>
            </div>
        </div>
        <div class="card bg-white border-0">
            <form method="POST" action="{{ route('staff.update', [$staffdata->id]) }}" enctype="multipart/form-data"
                class="card-body">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="row align-items-center mb-5">
                            <div class="col-auto">
                                <div class="people-image">
                                    <img id="uploadedImage" src="{{ $staffdata->image_url }}" alt="" srcset="">
                                </div>
                            </div>
                            <div class="col-auto">
                                <label for="open_gallery" class="custom-input-file py-4 cursor-pointer px-12 d-grid ">
                                    <i class="fa-light fa-image text-secondary fs-5 pb-2"></i>Open Gallery
                                </label>
                                <input type="file" class="d-none" value="{{ old('image') }}" name="image"
                                    id="open_gallery" accept=".jpg, .png, .jpeg">
                            </div>
                            <div class="col-auto">
                                <label for="camera" class="custom-input-file py-4 cursor-pointer px-17 d-grid ">
                                    <i class="fa-light fa-camera text-secondary fs-5 pb-2"></i>Camera
                                </label>
                                <input type="file" class="d-none" id="camera" accept=".jpg, .png, .jpeg"
                                    capture="user">
                            </div>
                            <div class="col-auto">
                                <small class="text-muted">Maximum size: 10MB</small>
                            </div>
                        </div>
                        @error('image')
                            <span class="text-danger fs-9">{{ $message }}</span>
                        @enderror
                        <div class="row mb-4">
                            <strong class="text-primary fs-5 mb-4">Account Information</strong>
                            <div class="form-group col-md-3">
                                <input type="text" value="{{ empty(old('fname')) ? $staffdata->fname : old('fname') }}"
                                    name="fname" id="fname" class="form-control form-control-lg rounded-pill"
                                    placeholder="First Name">
                                @error('fname')
                                    <span class="text-danger fs-9">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" value="{{ empty(old('lname')) ? $staffdata->lname : old('lname') }}"
                                    name="lname" id="lname" class="form-control form-control-lg rounded-pill"
                                    placeholder="Last Name">
                                @error('lname')
                                    <span class="text-danger fs-9">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <input type="number" value="{{ empty(old('phone')) ? $staffdata->phone : old('phone') }}"
                                    name="phone" id="phone" class="form-control form-control-lg rounded-pill"
                                    placeholder="Phone Number">
                                @error('phone')
                                    <span class="text-danger fs-9">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email_address"
                                    value="{{ empty(old('email_address')) ? $staffdata->email : old('email_address') }}"
                                    name="email_address" id="email_address"
                                    class="form-control form-control-lg rounded-pill" placeholder="Email Address">
                                @error('email_address')
                                    <span class="text-danger fs-9">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <select name="role" id="role" class="form-select rounded-pill">
                                    <option value="administrator"
                                        {{ empty(old('role')) && $staffdata->role == 'administrator' ? 'selected' : (old('role') == 'administrator' ? 'selected' : '') }}>
                                        Administrator</option>
                                    <option value="instacare_staff"
                                        {{ empty(old('role')) && $staffdata->role == 'instacare_staff' ? 'selected' : (old('role') == 'instacare_staff' ? 'selected' : '') }}>
                                        Instacare Staff</option>
                                    <option value="facility_manager"
                                        {{ empty(old('role')) && $staffdata->role == 'facility_manager' ? 'selected' : (old('role') == 'facility_manager' ? 'selected' : '') }}>
                                        Facility Manager</option>
                                    <option value="facility_staff"
                                        {{ empty(old('role')) && $staffdata->role == 'facility_staff' ? 'selected' : (old('role') == 'facility_staff' ? 'selected' : '') }}>
                                        Facility Staff</option>
                                    <option value="front_desk"
                                        {{ empty(old('role')) && $staffdata->role == 'front_desk' ? 'selected' : (old('role') == 'front_desk' ? 'selected' : '') }}>
                                        Front Desk</option>
                                </select>
                                @error('role')
                                    <span class="text-danger fs-9">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <strong class="text-primary fs-5 mb-4">Address</strong>
                            <div class="form-group col-md-6">
                                <select name="country" id="country" class="form-select rounded-pill">
                                    @foreach (Helper::countries_list() as $country)
                                        <option value="{{ $country }}"
                                            {{ empty(old('country')) && $staffdata->country == $country ? 'selected' : old('country') == $country ?? 'selected' }}>
                                            {{ $country }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('country')
                                    <span class="text-danger fs-9">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" value="{{ empty(old('city')) ? $staffdata->city : old('city') }}"
                                    name="city" id="city" class="form-control form-control-lg rounded-pill"
                                    placeholder="City">
                                @error('city')
                                    <span class="text-danger fs-9">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text"
                                    value="{{ empty(old('state')) ? $staffdata->state : old('state') }}" name="state"
                                    id="state" class="form-control form-control-lg rounded-pill" placeholder="State">
                                @error('state')
                                    <span class="text-danger fs-9">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text"
                                    value="{{ empty(old('state')) ? $staffdata->state : old('state') }}" name="zipcode"
                                    id="zipcode" class="form-control form-control-lg rounded-pill" placeholder="ZIP">
                                @error('zipcode')
                                    <span class="text-danger fs-9">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <strong class="text-primary fs-5 mb-4">General</strong>
                            <div class="form-group col-md-6">
                                <select name="timezone" id="timezone" class="form-select rounded-pill">
                                    @foreach (Helper::timezones_list() as $timezone)
                                        <option value="{{ $timezone }}"
                                            {{ empty(old('timezone')) && $staffdata->timezone == $timezone ? 'selected' : old('timezone') == $timezone ?? 'selected' }}>
                                            {{ $timezone }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('timezone')
                                    <span class="text-danger fs-9">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <select name="language" id="language" class="form-select rounded-pill">
                                    <option value="English"
                                        {{ empty(old('language')) && $staffdata->language == 'English' ? 'selected' : old('language') == 'English' ?? 'selected' }}>
                                        English
                                    </option>
                                </select>
                                @error('language')
                                    <span class="text-danger fs-9">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row mb-4">
                            <strong class="fs-5 mb-4">Access</strong>
                            <div class="col-md-6 me-5">
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="dashboard">Dashboard</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="dashboard"
                                        name="dashboard" {{ $staffdata->user_access_settings->dashboard == 1 ? 'checked' : '' }}>
                                </div>

                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="whos_on">Who’s ON</label>
                                    <input class="form-check-input mx-0" type="checkbox" name="whos_on" role="switch"
                                        id="whos_on" {{ $staffdata->user_access_settings->whos_on == 1 ? 'checked' : '' }}>
                                </div>

                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="people">People</label>
                                    <input class="form-check-input mx-0" type="checkbox" name="people" role="switch"
                                        id="people" {{ $staffdata->user_access_settings->people == 1 ? 'checked' : '' }}>
                                </div>

                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="schedule">Schedule</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="schedule"
                                        name="schedule" {{ $staffdata->user_access_settings->schedule == 1 ? 'checked' : '' }}>
                                </div>

                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="timecards">Timecards</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="timecards"
                                        name="timecards" {{ $staffdata->user_access_settings->timecards == 1 ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="access_messaging">Messaging</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="access_messaging"
                                        name="access_messaging" {{ $staffdata->user_access_settings->messaging == 1 ? 'checked' : '' }}>
                                </div>
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="facilities">Facilities</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="facilities"
                                        name="facilities" {{ $staffdata->user_access_settings->facilities == 1 ? 'checked' : '' }}>
                                </div>
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="total_billing">Total Billing</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="total_billing"
                                        name="total_billing" {{ $staffdata->user_access_settings->total_billing == 1 ? 'checked' : '' }}>
                                </div>
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="support">Support</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="support"
                                        name="support" {{ $staffdata->user_access_settings->support == 1 ? 'checked' : '' }}>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <strong class="fs-5 mb-4">Permissions</strong>
                            <div class="col-md-6 me-5">
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="permission_create_reminders">Create
                                        reminders</label>
                                    <input class="form-check-input mx-0" type="checkbox"
                                        name="permission_create_reminders" role="switch"
                                        id="permission_create_reminders" {{ $staffdata->user_permission_settings->create_reminders == 1 ? 'checked' : '' }}>
                                </div>
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="permission_messaging">Messaging</label>
                                    <input class="form-check-input mx-0" type="checkbox" name="permission_messaging"
                                        role="switch" id="permission_messaging" {{ $staffdata->user_permission_settings->messaging == 1 ? 'checked' : '' }}>
                                </div>
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="permission_report_timecard">Report Timecard</label>
                                    <input class="form-check-input mx-0" type="checkbox"
                                        name="permission_report_timecard" role="switch" id="permission_report_timecard"
                                        {{ $staffdata->user_permission_settings->report_timecard == 1 ? 'checked' : '' }}>
                                </div>
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="permission_delete_schedule">Delete
                                        Schedule</label>
                                    <input class="form-check-input mx-0" type="checkbox"
                                        name="permission_delete_schedule" role="switch" id="permission_delete_schedule"
                                        {{ $staffdata->user_permission_settings->delete_schedule == 1 ? 'checked' : '' }}>
                                </div>
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="permission_write_review">Write
                                        Review</label>
                                    <input class="form-check-input mx-0" type="checkbox" name="permission_write_review"
                                        role="switch" id="permission_write_review" {{ $staffdata->user_permission_settings->write_review == 1 ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="permission_process_timecard">Process
                                        Timecard</label>
                                    <input class="form-check-input mx-0" type="checkbox"
                                        name="permission_process_timecard" role="switch"
                                        id="permission_process_timecard" {{ $staffdata->user_permission_settings->process_timecard == 1 ? 'checked' : '' }}>
                                </div>
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="permission_create_schedule">Create
                                        Schedule</label>
                                    <input class="form-check-input mx-0" type="checkbox"
                                        name="permission_create_schedule" role="switch" id="permission_create_schedule"
                                        {{ $staffdata->user_permission_settings->create_schedule == 1 ? 'checked' : '' }}>
                                </div>
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="permission_create_timecard">Create
                                        Timecard</label>
                                    <input class="form-check-input mx-0" type="checkbox"
                                        name="permission_create_timecard" role="switch" id="permission_create_timecard"
                                        {{ $staffdata->user_permission_settings->create_timecard == 1 ? 'checked' : '' }}>
                                </div>
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="permission_add_points">Add
                                        Points</label>
                                    <input class="form-check-input mx-0" type="checkbox" name="permission_add_points"
                                        role="switch" id="permission_add_points" {{ $staffdata->user_permission_settings->add_points == 1 ? 'checked' : '' }}>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <strong class="fs-5 mb-4">Notifications</strong>
                            <div class="col-md-6 me-5">
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="text">Text Message</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="text"
                                        name="text" {{ $staffdata->user_notification_settings->text == 1 ? 'checked' : '' }}>
                                </div>
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="email">Email</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="email"
                                        name="email" {{ $staffdata->user_notification_settings->email == 1 ? 'checked' : '' }}>
                                </div>
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="in_app">In App
                                        Notifications</label>
                                    <input class="form-check-input" type="checkbox" role="switch" name="in_app"
                                        id="in_app" {{ $staffdata->user_notification_settings->in_app == 1 ? 'checked' : '' }}>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit"
                            class="btn btn-secondary rounded-pill py-2 me-3 text-white text-uppercase">Save</button>
                        <a class="btn btn-muted rounded-pill py-2 text-white text-uppercase"
                            href="{{ route('settings.index') }}">Cancel</a>
                    </div>
                </div>
            </form>
            <!-- End::Content -->
        </div>
    @endsection
    @section('script')
        <script>
            $(document).ready(function() {
                // Open Gallery: Handle file input change event
                $('#open_gallery').change(function() {
                    var file = $(this)[0].files[0];
                    if (file) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            // Replace the image source with the uploaded image
                            $('#uploadedImage').show();
                            $('.people-image i').remove();
                            $('#uploadedImage').attr('src', e.target.result);
                        };
                        reader.readAsDataURL(file);
                    }
                });

                // Camera: Handle file input change event
                $('#camera').change(function() {
                    var file = $(this)[0].files[0];
                    if (file) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            // Replace the image source with the captured image
                            $('#uploadedImage').attr('src', e.target.result);
                        };
                        reader.readAsDataURL(file);
                    }
                });

                // Camera: Handle click event to open the device's camera
                $('#camera').click(function() {
                    // Check if the browser supports getUserMedia
                    if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                        navigator.mediaDevices.getUserMedia({
                                video: true
                            })
                            .then(function(stream) {
                                // Stop any previous video stream
                                var videoElement = document.querySelector('#uploadedImage');
                                if (videoElement.srcObject) {
                                    var prevStream = videoElement.srcObject;
                                    var tracks = prevStream.getTracks();
                                    tracks.forEach(function(track) {
                                        track.stop();
                                    });
                                }

                                // Replace the image source with the camera stream
                                videoElement.srcObject = stream;
                            })
                            .catch(function(error) {
                                console.log('Error accessing the camera: ', error);
                            });
                    }
                });
            });
        </script>
    @endsection

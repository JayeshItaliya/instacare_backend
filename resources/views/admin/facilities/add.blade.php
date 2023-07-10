@extends('admin.theme.default')
@section('title') Add Facility @endsection
@section('content')
    <div class="container-fluid content d-flex flex-column ">
        <!-- Begin::Content -->
        <div class="row align-items-center justify-content-between mb-3">
            <div class="col-auto">
                <div class="d-flex align-items-center">
                    <a href="javascript:void(0)" class="btn bg-white text-secondary rounded-circle me-3"><i
                            class="fa-regular fa-chevron-left"></i></a>
                    <h3 class="fw-bold">Add Facility</h3>
                </div>
            </div>
        </div>
        <div class="card bg-white border-0">
            <div class="card-body mb-5">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card bg-white border-dashed border-secondary mb-4">
                            <div class="card-body bg-body rounded p-20">
                                <p class="text-muted text-center fs-8 mb-3">Drop here or Upload cover image</p>
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-auto">
                                        <label for="open_gallery"
                                            class="custom-input-file py-4 cursor-pointer px-12 d-grid ">
                                            <i class="fa-light fa-image text-secondary fs-5 pb-2"></i>Open Gallery
                                        </label>
                                        <input type="file" class="d-none" id="open_gallery" accept="image/*">
                                    </div>
                                    <div class="col-auto">
                                        <label for="camera" class="custom-input-file py-4 cursor-pointer px-17 d-grid ">
                                            <i class="fa-light fa-camera text-secondary fs-5 pb-2"></i>Camera
                                        </label>
                                        <input type="file" class="d-none" id="camera" accept="image/*" capture="user">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <strong class="text-primary fs-5 mb-4">Basic Information</strong>
                            <div class="form-group">
                                <input type="text" name="facility_name" class="form-control form-control-lg rounded-pill"
                                    placeholder="Facility Name">
                            </div>
                            <div class="form-group">
                                <textarea name="about_facility" class="form-control" rows="6" placeholder="About Facility"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="text" name="taxid" class="form-control form-control-lg rounded-pill"
                                    placeholder="SSN/TaxID">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <strong class="text-primary fs-5 mb-4">Address</strong>
                            <div class="form-group col-md-6">
                                <input type="text" name="address" class="form-control form-control-lg rounded-pill"
                                    placeholder="Street Address">
                            </div>
                            <div class="form-group col-md-6">
                                <select name="country" id="country" class="form-select rounded-pill">
                                    <option value="" selected="" disabled="">Country</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name="city" class="form-control form-control-lg rounded-pill"
                                    placeholder="City">
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" name="state" class="form-control form-control-lg rounded-pill"
                                    placeholder="State">
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" name="zipcode" class="form-control form-control-lg rounded-pill"
                                    placeholder="ZIP">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <strong class="text-primary fs-5 mb-4">Contact Info</strong>
                            <div class="form-group col-md-6">
                                <input type="text" name="address" class="form-control form-control-lg rounded-pill"
                                    placeholder="Contact Person Name">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="number" name="address" class="form-control form-control-lg rounded-pill"
                                    placeholder="Contact Person Number">
                            </div>
                            <div class="form-group col-md-6 mb-0">
                                <select name="country" id="country" class="form-select rounded-pill">
                                    <option value="" selected="" disabled="">Position</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 mb-0">
                                <input type="email" name="city" class="form-control form-control-lg rounded-pill"
                                    placeholder="Contact Person Email">
                            </div>
                            <a id="add_more_contact_info" class="form-text text-secondary cursor-pointer">+ Add More
                                Contact Info</a>
                        </div>
                        <button type="button" class="btn btn-secondary me-3">SAVE</button>
                        <button type="button" class="btn btn-muted">CANCEL</button>
                    </div>
                    <div class="col-md-6">
                        <div class="row mb-4">
                            <strong class="fs-5 mb-4">Access</strong>
                            <div class="col-md-6 me-5">
                                <div class="form-group">
                                    <div class="form-check form-switch d-flex justify-content-between px-0">
                                        <label class="form-check-label" for="dashboard">Dashboard</label>
                                        <input class="form-check-input" type="checkbox" role="switch" id="dashboard"
                                            checked>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check form-switch d-flex justify-content-between px-0">
                                        <label class="form-check-label" for="schedule">Schedule</label>
                                        <input class="form-check-input" type="checkbox" role="switch" id="schedule"
                                            checked>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check form-switch d-flex justify-content-between px-0">
                                        <label class="form-check-label" for="people">People</label>
                                        <input class="form-check-input" type="checkbox" role="switch" id="people"
                                            checked>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check form-switch d-flex justify-content-between px-0">
                                        <label class="form-check-label" for="total_billing">Total Billing</label>
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="total_billing" checked>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <div class="form-check form-switch d-flex justify-content-between px-0">
                                        <label class="form-check-label" for="who_on">Who’s ON</label>
                                        <input class="form-check-input" type="checkbox" role="switch" id="who_on"
                                            checked>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check form-switch d-flex justify-content-between px-0">
                                        <label class="form-check-label" for="messaging">Messaging</label>
                                        <input class="form-check-input" type="checkbox" role="switch" id="messaging"
                                            checked>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check form-switch d-flex justify-content-between px-0">
                                        <label class="form-check-label" for="timecards">Timecards</label>
                                        <input class="form-check-input" type="checkbox" role="switch" id="timecards"
                                            checked>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check form-switch d-flex justify-content-between px-0">
                                        <label class="form-check-label" for="support">Support</label>
                                        <input class="form-check-input" type="checkbox" role="switch" id="support"
                                            checked>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <strong class="fs-5 mb-4">Permissions</strong>
                            <div class="col-md-6 me-5">
                                <div class="form-group">
                                    <div class="form-check form-switch d-flex justify-content-between px-0">
                                        <label class="form-check-label" for="create_reminders">Create reminders</label>
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="create_reminders" checked>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check form-switch d-flex justify-content-between px-0">
                                        <label class="form-check-label" for="create_schedule">Create Schedule</label>
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="create_schedule" checked>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check form-switch d-flex justify-content-between px-0">
                                        <label class="form-check-label" for="delete_schedule">Delete Schedule</label>
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="delete_schedule" checked>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check form-switch d-flex justify-content-between px-0">
                                        <label class="form-check-label" for="per_messaging">Messaging</label>
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="per_messaging" checked>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <div class="form-check form-switch d-flex justify-content-between px-0">
                                        <label class="form-check-label" for="process_timecard">Process Timecard</label>
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="process_timecard" checked>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check form-switch d-flex justify-content-between px-0">
                                        <label class="form-check-label" for="report_timecard">Report Timecard</label>
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="report_timecard" checked>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check form-switch d-flex justify-content-between px-0">
                                        <label class="form-check-label" for="write_review">Write Review</label>
                                        <input class="form-check-input" type="checkbox" role="switch" id="write_review"
                                            checked>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check form-switch d-flex justify-content-between px-0">
                                        <label class="form-check-label" for="add_points">Add Points</label>
                                        <input class="form-check-input" type="checkbox" role="switch" id="add_points"
                                            checked>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <strong class="fs-5 mb-4">Notifications</strong>
                            <div class="col-md-6 me-5">
                                <div class="form-group">
                                    <div class="form-check form-switch d-flex justify-content-between px-0">
                                        <label class="form-check-label" for="text_message">Text Message</label>
                                        <input class="form-check-input" type="checkbox" role="switch" id="text_message"
                                            checked>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check form-switch d-flex justify-content-between px-0">
                                        <label class="form-check-label" for="email">Email</label>
                                        <input class="form-check-input" type="checkbox" role="switch" id="email"
                                            checked>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check form-switch d-flex justify-content-between px-0">
                                        <label class="form-check-label" for="in_app_notifications">In App
                                            Notifications</label>
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="in_app_notifications" checked>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="fw-semibold cursor-pointer" onclick="add_member()">+ Add Members</a>
                    </div>
                </div>
            </div>
            <!-- End::Content -->
        </div>
    @endsection
    @section('script')
        <script>
            $(document).ready(function() {
                // Open Gallery: Handle file input change event
                $('#uploadedImage').hide();
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

                // Add Extra Contact Info
                $('#add_more_contact_info').click(function() {
                    let contact_info_form =
                        '<div class="form-group col-md-6 mt-4"><input type="text" name="address" class="form-control form-control-lg rounded-pill" placeholder="Contact Person Name"></div><div class="form-group col-md-6 mt-4"><input type="number" name="address" class="form-control form-control-lg rounded-pill" placeholder="Contact Person Number"></div><div class="form-group col-md-6 mb-0"><select name="country" id="country" class="form-select rounded-pill"><option value="" selected="" disabled="">Position</option></select></div><div class="form-group col-md-6 mb-0"><input type="email" name="city" class="form-control form-control-lg rounded-pill" placeholder="Contact Person Email"></div>'
                    $(this).before(contact_info_form)

                });


            });


            // Add Members Sweetalert
            function add_member() {
                "use strict";

                swalWithBootstrapButtons.fire({
                    title: 'Add Members',
                    text: 'Please select the person to whom you want to add for this facility.',
                    showClass: {
                        popup: 'animate__animated animate__bounceInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__bounceOutUp'
                    },
                    showCancelButton: true,
                    confirmButtonText: add,
                    cancelButtonText: cancel,
                    showLoaderOnConfirm: true,
                    didOpen: function() {
                        $('.swal2-title').addClass('text-primary text-start fw-semibold fs-2')
                        $('.swal2-html-container').addClass('text-start').append(
                            '<label for="selectall" class="d-flex align-items-center my-3"><div class="col-1 me-4"><div class="form-check mb-0"><input class="form-check-input form-check-input-lg border-secondary" type="checkbox" value="" id="selectall" wtx-context="F850C848-E42D-47FB-BB6F-21B716164BEE"></div></div><div class="col-7"><p>Select All</p></div></label><label for="shift1" class="d-flex align-items-center my-3"><div class="col-1 me-4"><div class="form-check mb-0"><input class="form-check-input form-check-input-lg border-secondary" type="checkbox" value="" id="shift1"></div></div><div class="col-7"><div class="d-flex align-items-center"><img src="https://media.istockphoto.com/id/1308571236/photo/medical-concept-of-beautiful-female-doctor-with-stethoscope-waist-up-medical-student-woman.jpg?s=612x612&amp;w=0&amp;k=20&amp;c=bHGISU0YBMsNPG1sSbJ7Q9eVC6I3tK4lmCzfOAY_dRM=" alt="profile" class="object-fit-cover rounded-circle border-light" width="40" height="40" style="outline: 1px solid #ccc"><p class="text-dark fw-500 ms-3">Maureen Biologist</p></div></div><div class="col-3 ms-3"><span class="badge custom-badge-cna w-fit-content h-fit-content py-3">Staff</span></div></label>'
                        );
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        successfully_posted_shift();
                    } else {
                        Swal.close();
                    }
                });
            }

            $('body').on('click', '#selectall', () => $('#swal2-html-container input[type=checkbox]').prop('checked', true));

        </script>
    @endsection

@extends('admin.theme.default')
@section('title') Timecards @endsection
@section('content')
    <div class="container-fluid content d-flex flex-column ">
        <!-- Begin::Content -->
        <div class="row align-items-center justify-content-between mb-3">
            <div class="col-auto">
                <div class="d-flex align-items-center">
                    <h3 class="fw-bold">Timecards</h3>
                    <div class="d-flex align-items-center mx-3 text-muted fw-semibold fs-8 cursor-pointer ">
                        <p class="datepicker">18 March 2023</p>
                        <i class="fa-solid fa-chevron-down ms-2"></i>
                    </div>
                </div>
            </div>
            <div class="col-auto">
                <a href="{{ URL::to('timecards/add') }}" class="btn btn-highlight text-uppercase rounded-pill fs-8"> <i class="fa-regular fa-plus me-2 fs-9"></i> Add Card </a>
            </div>
        </div>
        <div class="card bg-white border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-6">
                    <p>Showing <strong>13</strong> out of <strong>18</strong> Timecards</p>
                    <span>
                        <span class="fw-bold text-primary px-3 me-2"> <i class="far fa-cloud-arrow-down mx-2"></i> Download All </span>
                        <button type="button" class="btn btn-secondary fs-6 px-5 py-2" data-bs-toggle="offcanvas" data-bs-target="#shifts_filter_aside" aria-controls="shifts_filter_aside"> <i class="fa-regular fa-sliders-up me-2"></i>Filter</button>
                    </span>
                </div>
                <table id="dataTable" data-toggle="table" class="table-striped">
                    <thead>
                        <tr class="bg-primary text-white">
                            <th class="fw-normal border-0 text-center" data-field=""></th>
                            <th class="fw-normal border-0 cursor-pointer" data-field="name">Name</th>
                            <th class="fw-normal border-0" data-field="time">Time</th>
                            <th class="fw-normal border-0" data-field="duration">Duration</th>
                            <th class="fw-normal border-0" data-field="facility">Facility</th>
                            <th class="fw-normal border-0" data-field="profile">Profile</th>
                            <th class="fw-normal border-0" data-field="status">Status</th>
                            <th class="fw-normal border-0" data-field="download"></th>
                            <th class="fw-normal border-0 fs-5" data-field="action"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input class="form-check-input form-check-input-lg border-secondary" type="checkbox"
                                    value="" id="who-on-1">
                            </td>
                            <td>
                                <div data-bs-toggle="offcanvas" data-bs-target="#processed_timecard_aside"
                                    aria-controls="processed_timecard_aside">
                                    <img src="https://media.istockphoto.com/id/1308571236/photo/medical-concept-of-beautiful-female-doctor-with-stethoscope-waist-up-medical-student-woman.jpg?s=612x612&amp;w=0&amp;k=20&amp;c=bHGISU0YBMsNPG1sSbJ7Q9eVC6I3tK4lmCzfOAY_dRM="
                                        alt="profile" class="object-fit-cover rounded-circle border-light me-3"
                                        width="40" height="40">Maureen Biologist
                                </div>
                            </td>
                            <td><span class="fw-semibold text-primary">7:00AM - 3:00PM</span></td>
                            <td>8 Hours</td>
                            <td>Care Center</td>
                            <td>CNA</td>
                            <td>
                                <span class="position-relative">Processed
                                    <span class="position-absolute top-50 end-100 translate-middle"><i
                                            class="fa-solid fa-circle-check fa-xs text-success"></i></span>
                                </span>
                            </td>
                            <td>
                                <a href="javascript:void(0)" class="text-primary">
                                    <i class="fa-regular fa-cloud-arrow-down fs-4 me-2"></i>
                                    <span class="fw-semibold">Download</span>
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0)"><i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="javascript:void(0)" class="ms-2"><i class="fa-regular fa-trash-can"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="form-check-input form-check-input-lg border-secondary" type="checkbox"
                                    value="" id="who-on-1">
                            </td>
                            <td><img src="https://media.istockphoto.com/id/1308571236/photo/medical-concept-of-beautiful-female-doctor-with-stethoscope-waist-up-medical-student-woman.jpg?s=612x612&amp;w=0&amp;k=20&amp;c=bHGISU0YBMsNPG1sSbJ7Q9eVC6I3tK4lmCzfOAY_dRM="
                                    alt="profile" class="object-fit-cover rounded-circle border-light me-3" width="40"
                                    height="40">Maureen Biologist</td>
                            <td><span class="fw-semibold text-primary">7:00AM - 3:00PM</span></td>
                            <td>8 Hours</td>
                            <td>Care Center</td>
                            <td>CNA</td>
                            <td>
                                <span class="position-relative">Processed
                                    <span class="position-absolute top-50 end-100 translate-middle"><i
                                            class="fa-solid fa-circle-check fa-xs text-success"></i></span>
                                </span>
                            </td>
                            <td>
                                <a href="javascript:void(0)" class="text-primary">
                                    <i class="fa-regular fa-cloud-arrow-down fs-4 me-2"></i>
                                    <span class="fw-semibold">Download</span>
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0)"><i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="javascript:void(0)" class="ms-2"><i class="fa-regular fa-trash-can"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="form-check-input form-check-input-lg border-secondary" type="checkbox"
                                    value="" id="who-on-1">
                            </td>
                            <td>
                                <div data-bs-toggle="offcanvas" data-bs-target="#process_timecard_aside"
                                    aria-controls="process_timecard_aside">
                                    <img src="https://media.istockphoto.com/id/1308571236/photo/medical-concept-of-beautiful-female-doctor-with-stethoscope-waist-up-medical-student-woman.jpg?s=612x612&amp;w=0&amp;k=20&amp;c=bHGISU0YBMsNPG1sSbJ7Q9eVC6I3tK4lmCzfOAY_dRM="
                                        alt="profile" class="object-fit-cover rounded-circle border-light me-3"
                                        width="40" height="40">Maureen Biologist
                                </div>
                            </td>
                            <td><span class="fw-semibold text-primary">7:00AM - 3:00PM</span></td>
                            <td>8 Hours</td>
                            <td>Care Center</td>
                            <td>CNA</td>
                            <td>
                                <span class="position-relative">Process
                                    <span class="position-absolute top-50 end-100 translate-middle"><i
                                            class="fa-solid fa-loader fa-xs text-highlight"></i></span>
                                </span>
                            </td>
                            <td>
                                <a href="javascript:void(0)" class="text-primary">
                                    <i class="fa-regular fa-cloud-arrow-down fs-4 me-2"></i>
                                    <span class="fw-semibold">Download</span>
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0)"><i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="javascript:void(0)" class="ms-2"><i class="fa-regular fa-trash-can"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="form-check-input form-check-input-lg border-secondary" type="checkbox"
                                    value="" id="who-on-1">
                            </td>
                            <td><img src="https://media.istockphoto.com/id/1308571236/photo/medical-concept-of-beautiful-female-doctor-with-stethoscope-waist-up-medical-student-woman.jpg?s=612x612&amp;w=0&amp;k=20&amp;c=bHGISU0YBMsNPG1sSbJ7Q9eVC6I3tK4lmCzfOAY_dRM="
                                    alt="profile" class="object-fit-cover rounded-circle border-light me-3"
                                    width="40" height="40">Maureen Biologist</td>
                            <td><span class="fw-semibold text-primary">7:00AM - 3:00PM</span></td>
                            <td>8 Hours</td>
                            <td>Care Center</td>
                            <td>CNA</td>
                            <td>
                                <span class="position-relative">Processed
                                    <span class="position-absolute top-50 end-100 translate-middle"><i
                                            class="fa-solid fa-circle-check fa-xs text-success"></i></span>
                                </span>
                            </td>
                            <td>
                                <a href="javascript:void(0)" class="text-primary">
                                    <i class="fa-regular fa-cloud-arrow-down fs-4 me-2"></i>
                                    <span class="fw-semibold">Download</span>
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0)"><i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="javascript:void(0)" class="ms-2"><i class="fa-regular fa-trash-can"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="form-check-input form-check-input-lg border-secondary" type="checkbox"
                                    value="" id="who-on-1">
                            </td>
                            <td><img src="https://media.istockphoto.com/id/1308571236/photo/medical-concept-of-beautiful-female-doctor-with-stethoscope-waist-up-medical-student-woman.jpg?s=612x612&amp;w=0&amp;k=20&amp;c=bHGISU0YBMsNPG1sSbJ7Q9eVC6I3tK4lmCzfOAY_dRM="
                                    alt="profile" class="object-fit-cover rounded-circle border-light me-3"
                                    width="40" height="40">Maureen Biologist</td>
                            <td><span class="fw-semibold text-primary">7:00AM - 3:00PM</span></td>
                            <td>8 Hours</td>
                            <td>Care Center</td>
                            <td>CNA</td>
                            <td>
                                <span class="position-relative">Processed
                                    <span class="position-absolute top-50 end-100 translate-middle"><i
                                            class="fa-solid fa-circle-check fa-xs text-success"></i></span>
                                </span>
                            </td>
                            <td>
                                <a href="javascript:void(0)" class="text-primary">
                                    <i class="fa-regular fa-cloud-arrow-down fs-4 me-2"></i>
                                    <span class="fw-semibold">Download</span>
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0)"><i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="javascript:void(0)" class="ms-2"><i class="fa-regular fa-trash-can"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="d-flex align-items-center pt-3">
                    <nav>
                        <ul class="pagination gap-2">
                            <li class="page-item">
                                <span class="page-link rounded-circle" aria-hidden="true"><i
                                        class="fa-regular fa-chevron-left"></i></span>
                            </li>
                            <li class="page-item active" aria-current="page"><span
                                    class="page-link rounded-circle">1</span>
                            </li>
                            <li class="page-item">
                                <a class="page-link rounded-circle" href="javascript:void(0)">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link rounded-circle" href="javascript:void(0)" rel="next"
                                    aria-label="Next »"><i class="fa-regular fa-chevron-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Begin::Filter Aside -->
        <div class="offcanvas offcanvas-end border-start-0" tabindex="-1" id="shifts_filter_aside"
            aria-labelledby="shifts_filter_asideLabel"
            style="border-top: 5px solid var(--bs-secondary); top:80px; width:370px;">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title fw-bold" id="shifts_filter_asideLabel">Apply Filter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <form class="offcanvas-body">
                <div class="form-group">
                    <select name="facilities" id="facilities" class="form-select rounded-pill text-dark fw-500">
                        <option value="" selected="" disabled="">Facilities</option>
                    </select>
                </div>
                <div class="form-group">
                    <select name="employee" id="employee" class="form-select rounded-pill text-dark fw-500">
                        <option value="" selected="" disabled="">Employee</option>
                    </select>
                </div>
                <div class="form-group">
                    <select name="role" id="role" class="form-select rounded-pill text-dark fw-500">
                        <option value="" selected="" disabled="">Role</option>
                    </select>
                </div>
                <div class="form-group">
                    <select name="status" id="status" class="form-select rounded-pill text-dark fw-500">
                        <option value="" selected="" disabled="">Status</option>
                    </select>
                </div>
                <div class="form-group">
                    <select name="date" id="date" class="form-select rounded-pill text-dark fw-500">
                        <option value="" selected="" disabled="">Date</option>
                    </select>
                </div>
                <div class="text-center mt-5">
                    <button type="button" class="btn btn-secondary  me-3">APPLY</button>
                    <button type="button" class="btn btn-muted ">RESET</button>
                </div>
            </form>
        </div>
        <!-- End::Filter Aside -->

        <!-- Begin::Processed Timecard Aside -->
        <div class="offcanvas offcanvas-end border-start-0 bg-body" tabindex="-1" id="processed_timecard_aside"
            aria-labelledby="processed_timecard_asideLabel"
            style="border-top: 5px solid var(--bs-secondary); top:80px; width:370px;">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title fw-bold" id="processed_timecard_asideLabel">Timecard</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <form class="offcanvas-body">
                <div class="card bg-white border-0 mb-3">
                    <div class="card-body">
                        <div class="row justify-content-between align-items-center">
                            <p class="col-auto text-primary fw-semibold">Status</p>
                            <div class="col-auto">
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-circle-check text-success h2 me-2"></i>
                                    <div>
                                        <p class="text-success text-uppercase fs-8">Processed</p>
                                        <p class="text-muted fs-8">on 16-Feb-2023</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card bg-white border-0 mb-3">
                    <div class="card-body">
                        <div class="row justify-content-between align-items-center">
                            <p class="col-auto text-primary fw-semibold mb-3">Details</p>
                            <div class="form-group">
                                <p class="text-dark fs-8">Worker</p>
                                <strong class="text-dark">Granny Weatherwax</strong>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-7">
                                    <p class="text-dark fs-8">Start Date</p>
                                    <strong class="text-dark">Wed, Feb 01 2023</strong>
                                </div>
                                <div class="form-group col-md-5">
                                    <p class="text-dark fs-8">Start Time</p>
                                    <strong class="text-dark">07:00AM</strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-7">
                                    <p class="text-dark fs-8">End Date</p>
                                    <strong class="text-dark">Wed, Feb 01 2023</strong>
                                </div>
                                <div class="form-group col-md-5">
                                    <p class="text-dark fs-8">End Time</p>
                                    <strong class="text-dark">03:00 PM</strong>
                                </div>
                            </div>
                            <div class="form-group">
                                <p class="text-dark fs-8">Duration</p>
                                <strong class="text-dark">8 Hours 00 Minutes</strong>
                            </div>
                            <div class="form-group">
                                <p class="text-dark fs-8">Manager Notes</p>
                                <strong class="text-dark">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Phasellus finibus nibh in sem volutpat sagittis.</strong>
                            </div>
                            <a href="javascript:void(0)" class="text-primary mt-5">
                                <i class="fa-regular fa-cloud-arrow-down fs-4 me-2"></i>
                                <span class="fw-semibold">Download</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-10">
                    <button type="button" class="btn btn-secondary me-3 px-7"
                        onclick="unprocess_timecard()">Unprocess</button>
                    <button type="button" class="btn btn-muted" onclick="report_timecard()">Report</button>
                </div>
            </form>
        </div>
        <!-- End::Processed Timecard Aside -->

        <!-- Begin::Process Timecard Aside -->
        <div class="offcanvas offcanvas-end border-start-0 bg-body" tabindex="-1" id="process_timecard_aside"
            aria-labelledby="process_timecard_asidelabel"
            style="border-top: 5px solid var(--bs-secondary); top:80px; width:370px;">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title fw-bold" id="process_timecard_asidelabel">Timecard</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <form class="offcanvas-body">
                <div class="card bg-white border-0 mb-3">
                    <div class="card-body">
                        <div class="row justify-content-between align-items-center">
                            <p class="col-auto text-primary fw-semibold">Status</p>
                            <div class="col-auto">
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-circle-check text-highlight h2 me-2"></i>
                                    <div>
                                        <p class="text-highlight text-uppercase fs-8">Process</p>
                                        <p class="text-muted fs-8">on 16-Feb-2023</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card bg-white border-0 mb-3">
                    <div class="card-body">
                        <div class="row justify-content-between align-items-center">
                            <p class="col-auto text-primary fw-semibold mb-3">Details</p>
                            <div class="d-flex">
                                <div class="form-group me-4">
                                    <p class="text-dark fs-8">Worker</p>
                                    <strong class="text-dark">Granny Weatherwax</strong>
                                </div>
                                <div class="form-group">
                                    <p class="text-dark fs-8">Documents</p>
                                    <strong class="text-dark">
                                        <a href="javascript:void(0)" class="text-primary mt-5">
                                            <i class="fa-regular fa-cloud-arrow-down fs-5 me-2"></i>
                                            <span class="fw-semibold fs-7">Download</span>
                                        </a>
                                    </strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-7">
                                    <p class="text-dark fs-8">Start Date</p>
                                    <strong class="text-dark">Wed, Feb 01 2023</strong>
                                </div>
                                <div class="form-group col-md-5">
                                    <p class="text-dark fs-8">Start Time</p>
                                    <strong class="text-dark">07:00AM</strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-7">
                                    <p class="text-dark fs-8">End Date</p>
                                    <strong class="text-dark">Wed, Feb 01 2023</strong>
                                </div>
                                <div class="form-group col-md-5">
                                    <p class="text-dark fs-8">End Time</p>
                                    <strong class="text-dark">03:00 PM</strong>
                                </div>
                            </div>
                            <div class="form-group">
                                <p class="text-dark fs-8">Duration</p>
                                <strong class="text-dark">8 Hours 00 Minutes</strong>
                            </div>
                            <div class="form-group">
                                <p class="text-dark fs-8">Manager Notes</p>
                                <strong class="text-dark">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Phasellus finibus nibh in sem volutpat sagittis.</strong>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-10">
                    <button type="button" class="btn btn-secondary me-3 px-7"
                        onclick="unprocess_timecard()">Unprocess</button>
                    <button type="button" class="btn btn-muted" onclick="report_timecard()">Report</button>
                </div>
            </form>
        </div>
        <!-- End::Process Timecard Aside -->


        <!-- End::Content -->
    </div>
@endsection
@section('script')
    <script>
        function unprocess_timecard() {
            "use strict";

            swalWithBootstrapButtons.fire({
                title: 'Confirmation',
                showClass: {
                    popup: 'animate__animated animate__fadeInUp'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutDown'
                },
                position: 'bottom-end',
                showCancelButton: true,
                confirmButtonText: 'UNPROCESS',
                cancelButtonText: cancel,
                showLoaderOnConfirm: true,
                didOpen: function() {
                    $('.swal2-container.swal2-bottom-end').addClass('p-0');
                    $('.swal2-container .swal2-popup').attr('style',
                        'width:23em;border-radius:0;border-top-left-radius:20px;border-top-right-radius:20px;'
                    );
                    $('.swal2-container .swal2-popup').append(
                        '<span class="custom-sweetalert-border-top"></span>');
                    $('.swal2-title').addClass('text-dark fw-semibold').after(
                        '<p class="text-center text-muted fs-8 mt-5 mb-10">Do you want to “<strong class="text-dark">Unprocess</strong>” all the selected shifts timecards?</p>'
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

        function report_timecard() {
            "use strict";

            swalWithBootstrapButtons.fire({
                title: 'Confirmation',
                showClass: {
                    popup: 'animate__animated animate__fadeInUp'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutDown'
                },
                position: 'bottom-end',
                showCancelButton: true,
                confirmButtonText: submit,
                cancelButtonText: cancel,
                showLoaderOnConfirm: true,
                didOpen: function() {
                    $('.swal2-container.swal2-bottom-end').addClass('p-0');
                    $('.swal2-container .swal2-popup').attr('style',
                        'width:23em;border-radius:0;border-top-left-radius:20px;border-top-right-radius:20px;'
                    );
                    $('.swal2-container .swal2-popup').append(
                        '<span class="custom-sweetalert-border-top"></span>');
                    $('.swal2-title').addClass('text-dark fw-semibold').after(
                        '<p class="text-center text-muted fs-8 mt-5 mb-10">Do you want to “<strong class="text-dark">Report</strong>” all the selected shifts timecards?</p>'
                    );
                    var html =
                        '<div class="form-group mx-5"><select name="reason" id="reason" class="form-select rounded-pill"><option value="" selected="" disabled="">Select the reason</option></select></div><div class="form-group mx-5"><textarea class="form-control" rows="4" placeholder="Add Notes"></textarea></div>'
                    $('#swal2-html-container').after(html);
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    successfully_posted_shift();
                } else {
                    Swal.close();
                }
            });
        }
    </script>
@endsection

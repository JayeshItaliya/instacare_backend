@extends('admin.theme.default')
@section('title')
    Dashboard
@endsection
@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
    </style>
@endsection
@section('content')
    <div class="container-fluid content d-flex flex-column ">
        <!-- Begin::Content -->
        <div class="row align-items-center justify-content-between mb-3">
            <div class="col-auto">
                <div class="d-flex align-items-center">
                    <h3 class="fw-bold">Dashboard</h3>
                    <div class="d-flex align-items-center mx-3 text-muted fw-semibold fs-8 cursor-pointer ">
                        <p class="datepicker">18 March 2023</p>
                        <i class="fa-solid fa-chevron-down ms-2"></i>
                    </div>
                </div>
            </div>
            <div class="col-auto">
                <a href="{{ route('shifts.create') }}" class="btn btn-highlight text-uppercase rounded-pill fs-8"><i
                        class="fa-regular fa-plus me-2 fs-9"></i>add shift</a>
            </div>
        </div>
        <div class="row row-cols-lg-5 mb-3">
            <div class="col mb-5">
                <div class="overview-stats bg-primary">
                    <h1 class="text-highlight fw-semibold pt-3 mb-3 ps-3">54</h1>
                    <h6 class="text-white text-capitalize pb-3 ps-3">Total Daily Shifts</h6>
                </div>
            </div>
            <div class="col mb-5">
                <div class="overview-stats d-flex justify-content-between">
                    <div class="col-auto">
                        <h1 class="text-highlight fw-semibold pt-3 mb-3 ps-3">20</h1>
                        <h6 class="text-white text-capitalize pb-3 ps-3">open shifts</h6>
                    </div>
                    <div class="col-auto text-end">
                        <div><i class="fa-regular fa-calendar-days icon"></i></div>
                        <span><i class="fa-regular fa-arrow-right pe-4 text-white"></i></span>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <div class="overview-stats d-flex justify-content-between">
                    <div class="col-auto">
                        <h1 class="text-highlight fw-semibold pt-3 mb-3 ps-3">30</h1>
                        <h6 class="text-white text-capitalize pb-3 ps-3">Confirmed Shifts</h6>
                    </div>
                    <div class="col-auto text-end">
                        <div><i class="fa-regular fa-calendar-circle-user icon"></i></div>
                        <span><i class="fa-regular fa-arrow-right pe-4 text-white"></i></span>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <div class="overview-stats d-flex justify-content-between">
                    <div class="col-auto">
                        <h1 class="text-highlight fw-semibold pt-3 mb-3 ps-3">20</h1>
                        <h6 class="text-white text-capitalize pb-3 ps-3">Shifts in Progress</h6>
                    </div>
                    <div class="col-auto text-end">
                        <div><i class="fa-regular fa-calendar-circle-user icon"></i></div>
                        <span><i class="fa-regular fa-arrow-right pe-4 text-white"></i></span>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <div class="overview-stats d-flex justify-content-between">
                    <div class="col-auto">
                        <h1 class="text-highlight fw-semibold pt-3 mb-3 ps-3">8</h1>
                        <h6 class="text-white text-capitalize pb-3 ps-3">Completed Shifts</h6>
                    </div>
                    <div class="col-auto text-end">
                        <div><i class="fa-regular fa-calendar-day icon"></i></div>
                        <span><i class="fa-regular fa-arrow-right pe-4 text-white"></i></span>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <div class="overview-stats d-flex justify-content-between">
                    <div class="col-auto">
                        <h1 class="text-highlight fw-semibold pt-3 mb-3 ps-3">2</h1>
                        <h6 class="text-white text-capitalize pb-3 ps-3">Call Offs Shifts</h6>
                    </div>
                    <div class="col-auto text-end">
                        <div><i class="fa-regular fa-calendar-clock icon"></i></div>
                        <span><i class="fa-regular fa-arrow-right pe-4 text-white"></i></span>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <div class="overview-stats d-flex justify-content-between">
                    <div class="col-auto">
                        <h1 class="text-highlight fw-semibold pt-3 mb-3 ps-3">0</h1>
                        <h6 class="text-white text-capitalize pb-3 ps-3">Facility Cancellation</h6>
                    </div>
                    <div class="col-auto text-end">
                        <div><i class="fa-regular fa-calendar-xmark icon"></i></div>
                        <span><i class="fa-regular fa-arrow-right pe-4 text-white"></i></span>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <div class="overview-stats d-flex justify-content-between">
                    <div class="col-auto">
                        <h1 class="text-highlight fw-semibold pt-3 mb-3 ps-3">0</h1>
                        <h6 class="text-white text-capitalize pb-3 ps-3">Late</h6>
                    </div>
                    <div class="col-auto text-end">
                        <div><i class="fa-regular fa-calendar-xmark icon"></i></div>
                        <span><i class="fa-regular fa-arrow-right pe-4 text-white"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card bg-white border-0 mb-3">
                    <div class="card-body pb-0">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="fw-semibold">Who’s ON</h5>
                            <div class="nav nav-underline" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link fw-bold text-muted active" id="v-pills-scheduled-tab"
                                    data-bs-toggle="pill" href="#v-pills-scheduled" role="tab"
                                    aria-controls="v-pills-scheduled" aria-selected="true">Scheduled</a>
                                <a class="nav-link fw-bold text-muted" id="v-pills-clocked-in-tab" data-bs-toggle="pill"
                                    href="#v-pills-clocked-in" role="tab" aria-controls="v-pills-clocked-in"
                                    aria-selected="false">Clocked In</a>
                            </div>
                            <a href="{{ URL::to('/who-on') }}" class="text-primary fw-semibold"> View All </a>
                        </div>
                    </div>
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-scheduled" role="tabpanel"
                            aria-labelledby="v-pills-scheduled-tab">
                            <div class="d-flex align-items-center bg-body px-4 py-3">
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center">
                                        <div class="col-auto me-4">
                                            <img src="https://media.istockphoto.com/id/1308571236/photo/medical-concept-of-beautiful-female-doctor-with-stethoscope-waist-up-medical-student-woman.jpg?s=612x612&w=0&k=20&c=bHGISU0YBMsNPG1sSbJ7Q9eVC6I3tK4lmCzfOAY_dRM="
                                                alt="profile" class="object-fit-cover rounded-circle border-light"
                                                width="40" height="40" style="outline: 3px solid #ccc">
                                        </div>
                                        <div class="col-auto me-3">
                                            <p class="fw-bold">Jasnah Kholin</p>
                                            <p class="fs-8">Care Center - CNA</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="text-primary"><i class="fa-regular fa-clock me-2"></i>7:00AM - 3:00PM
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center justify-content-end">
                                        <span class="badge custom-badge-primary fs-6 me-2"> <i
                                                class="fa-regular fa-user-xmark"></i> </span>
                                        <span class="badge custom-badge-primary fs-6 me-2"> <i
                                                class="fa-regular fa-watch"></i> </span>
                                        <span class="badge custom-badge-danger fs-6"> <i
                                                class="fa-regular fa-clock-nine me-2"></i>Clock Out </span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center bg-white px-4 py-3">
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center">
                                        <div class="col-auto me-4">
                                            <img src="https://media.istockphoto.com/id/1308571236/photo/medical-concept-of-beautiful-female-doctor-with-stethoscope-waist-up-medical-student-woman.jpg?s=612x612&w=0&k=20&c=bHGISU0YBMsNPG1sSbJ7Q9eVC6I3tK4lmCzfOAY_dRM="
                                                alt="profile" class="object-fit-cover rounded-circle border-light"
                                                width="40" height="40" style="outline: 3px solid #ccc">
                                        </div>
                                        <div class="col-auto me-3">
                                            <p class="fw-bold">Jasnah Kholin</p>
                                            <p class="fs-8">Care Center - CNA</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="text-primary"><i class="fa-regular fa-clock me-2"></i>7:00AM - 3:00PM
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center justify-content-end">
                                        <span class="badge custom-badge-primary fs-6 me-2"> <i
                                                class="fa-regular fa-user-xmark"></i> </span>
                                        <span class="badge custom-badge-primary fs-6 me-2"> <i
                                                class="fa-regular fa-watch"></i> </span>
                                        <span class="badge custom-badge-success fs-6"> <i
                                                class="fa-regular fa-clock-nine me-2"></i>Clock In
                                            &nbsp&nbsp; </span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center bg-body px-4 py-3">
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center">
                                        <div class="col-auto me-4">
                                            <img src="https://media.istockphoto.com/id/1308571236/photo/medical-concept-of-beautiful-female-doctor-with-stethoscope-waist-up-medical-student-woman.jpg?s=612x612&w=0&k=20&c=bHGISU0YBMsNPG1sSbJ7Q9eVC6I3tK4lmCzfOAY_dRM="
                                                alt="profile" class="object-fit-cover rounded-circle border-light"
                                                width="40" height="40" style="outline: 3px solid #ccc">
                                        </div>
                                        <div class="col-auto me-3">
                                            <p class="fw-bold">Jasnah Kholin</p>
                                            <p class="fs-8">Care Center - CNA</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="text-primary"><i class="fa-regular fa-clock me-2"></i>7:00AM - 3:00PM
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center justify-content-end">
                                        <span class="badge custom-badge-primary fs-6 me-2"> <i
                                                class="fa-regular fa-user-xmark"></i> </span>
                                        <span class="badge custom-badge-primary fs-6 me-2"> <i
                                                class="fa-regular fa-watch"></i> </span>
                                        <span class="badge custom-badge-danger fs-6"> <i
                                                class="fa-regular fa-clock-nine me-2"></i>Clock Out </span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center bg-white px-4 py-3">
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center">
                                        <div class="col-auto me-4">
                                            <img src="https://media.istockphoto.com/id/1308571236/photo/medical-concept-of-beautiful-female-doctor-with-stethoscope-waist-up-medical-student-woman.jpg?s=612x612&w=0&k=20&c=bHGISU0YBMsNPG1sSbJ7Q9eVC6I3tK4lmCzfOAY_dRM="
                                                alt="profile" class="object-fit-cover rounded-circle border-light"
                                                width="40" height="40" style="outline: 3px solid #ccc">
                                        </div>
                                        <div class="col-auto me-3">
                                            <p class="fw-bold">Jasnah Kholin</p>
                                            <p class="fs-8">Care Center - CNA</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="text-primary"><i class="fa-regular fa-clock me-2"></i>7:00AM - 3:00PM
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center justify-content-end">
                                        <span class="badge custom-badge-primary fs-6 me-2"> <i
                                                class="fa-regular fa-user-xmark"></i> </span>
                                        <span class="badge custom-badge-primary fs-6 me-2"> <i
                                                class="fa-regular fa-watch"></i> </span>
                                        <span class="badge custom-badge-success fs-6"> <i
                                                class="fa-regular fa-clock-nine me-2"></i>Clock In
                                            &nbsp&nbsp; </span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center bg-body px-4 py-3">
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center">
                                        <div class="col-auto me-4">
                                            <img src="https://media.istockphoto.com/id/1308571236/photo/medical-concept-of-beautiful-female-doctor-with-stethoscope-waist-up-medical-student-woman.jpg?s=612x612&w=0&k=20&c=bHGISU0YBMsNPG1sSbJ7Q9eVC6I3tK4lmCzfOAY_dRM="
                                                alt="profile" class="object-fit-cover rounded-circle border-light"
                                                width="40" height="40" style="outline: 3px solid #ccc">
                                        </div>
                                        <div class="col-auto me-3">
                                            <p class="fw-bold">Jasnah Kholin</p>
                                            <p class="fs-8">Care Center - CNA</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="text-primary"><i class="fa-regular fa-clock me-2"></i>7:00AM - 3:00PM
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center justify-content-end">
                                        <span class="badge custom-badge-primary fs-6 me-2"> <i
                                                class="fa-regular fa-user-xmark"></i> </span>
                                        <span class="badge custom-badge-primary fs-6 me-2"> <i
                                                class="fa-regular fa-watch"></i> </span>
                                        <span class="badge custom-badge-danger fs-6"> <i
                                                class="fa-regular fa-clock-nine me-2"></i>Clock Out </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-clocked-in" role="tabpanel"
                            aria-labelledby="v-pills-clocked-in-tab">
                            <div class="d-flex align-items-center bg-body px-4 py-3">
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center">
                                        <div class="col-auto me-4">
                                            <img src="https://media.istockphoto.com/id/1308571236/photo/medical-concept-of-beautiful-female-doctor-with-stethoscope-waist-up-medical-student-woman.jpg?s=612x612&w=0&k=20&c=bHGISU0YBMsNPG1sSbJ7Q9eVC6I3tK4lmCzfOAY_dRM="
                                                alt="profile" class="object-fit-cover rounded-circle border-light"
                                                width="40" height="40" style="outline: 3px solid #ccc">
                                        </div>
                                        <div class="col-auto me-3">
                                            <p class="fw-bold">Jasnah Kholin</p>
                                            <p class="fs-8">Care Center - CNA</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="text-primary"><i class="fa-regular fa-clock me-2"></i>7:00AM - 3:00PM
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center justify-content-end">
                                        <span class="badge custom-badge-primary fs-6 me-2"> <i
                                                class="fa-regular fa-user-xmark"></i> </span>
                                        <span class="badge custom-badge-primary fs-6 me-2"> <i
                                                class="fa-regular fa-watch"></i> </span>
                                        <span class="badge custom-badge-success fs-6"> <i
                                                class="fa-regular fa-clock-nine me-2"></i>Clock In
                                            &nbsp&nbsp; </span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center bg-white px-4 py-3">
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center">
                                        <div class="col-auto me-4">
                                            <img src="https://media.istockphoto.com/id/1308571236/photo/medical-concept-of-beautiful-female-doctor-with-stethoscope-waist-up-medical-student-woman.jpg?s=612x612&w=0&k=20&c=bHGISU0YBMsNPG1sSbJ7Q9eVC6I3tK4lmCzfOAY_dRM="
                                                alt="profile" class="object-fit-cover rounded-circle border-light"
                                                width="40" height="40" style="outline: 3px solid #ccc">
                                        </div>
                                        <div class="col-auto me-3">
                                            <p class="fw-bold">Jasnah Kholin</p>
                                            <p class="fs-8">Care Center - CNA</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="text-primary"><i class="fa-regular fa-clock me-2"></i>7:00AM - 3:00PM
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center justify-content-end">
                                        <span class="badge custom-badge-primary fs-6 me-2"> <i
                                                class="fa-regular fa-user-xmark"></i> </span>
                                        <span class="badge custom-badge-primary fs-6 me-2"> <i
                                                class="fa-regular fa-watch"></i> </span>
                                        <span class="badge custom-badge-success fs-6"> <i
                                                class="fa-regular fa-clock-nine me-2"></i>Clock In
                                            &nbsp&nbsp; </span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center bg-body px-4 py-3">
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center">
                                        <div class="col-auto me-4">
                                            <img src="https://media.istockphoto.com/id/1308571236/photo/medical-concept-of-beautiful-female-doctor-with-stethoscope-waist-up-medical-student-woman.jpg?s=612x612&w=0&k=20&c=bHGISU0YBMsNPG1sSbJ7Q9eVC6I3tK4lmCzfOAY_dRM="
                                                alt="profile" class="object-fit-cover rounded-circle border-light"
                                                width="40" height="40" style="outline: 3px solid #ccc">
                                        </div>
                                        <div class="col-auto me-3">
                                            <p class="fw-bold">Jasnah Kholin</p>
                                            <p class="fs-8">Care Center - CNA</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="text-primary"><i class="fa-regular fa-clock me-2"></i>7:00AM - 3:00PM
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center justify-content-end">
                                        <span class="badge custom-badge-primary fs-6 me-2"> <i
                                                class="fa-regular fa-user-xmark"></i> </span>
                                        <span class="badge custom-badge-primary fs-6 me-2"> <i
                                                class="fa-regular fa-watch"></i> </span>
                                        <span class="badge custom-badge-success fs-6"> <i
                                                class="fa-regular fa-clock-nine me-2"></i>Clock In
                                            &nbsp&nbsp; </span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center bg-white px-4 py-3">
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center">
                                        <div class="col-auto me-4">
                                            <img src="https://media.istockphoto.com/id/1308571236/photo/medical-concept-of-beautiful-female-doctor-with-stethoscope-waist-up-medical-student-woman.jpg?s=612x612&w=0&k=20&c=bHGISU0YBMsNPG1sSbJ7Q9eVC6I3tK4lmCzfOAY_dRM="
                                                alt="profile" class="object-fit-cover rounded-circle border-light"
                                                width="40" height="40" style="outline: 3px solid #ccc">
                                        </div>
                                        <div class="col-auto me-3">
                                            <p class="fw-bold">Jasnah Kholin</p>
                                            <p class="fs-8">Care Center - CNA</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="text-primary"><i class="fa-regular fa-clock me-2"></i>7:00AM - 3:00PM
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center justify-content-end">
                                        <span class="badge custom-badge-primary fs-6 me-2"> <i
                                                class="fa-regular fa-user-xmark"></i> </span>
                                        <span class="badge custom-badge-primary fs-6 me-2"> <i
                                                class="fa-regular fa-watch"></i> </span>
                                        <span class="badge custom-badge-success fs-6"> <i
                                                class="fa-regular fa-clock-nine me-2"></i>Clock In
                                            &nbsp&nbsp; </span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center bg-body px-4 py-3">
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center">
                                        <div class="col-auto me-4">
                                            <img src="https://media.istockphoto.com/id/1308571236/photo/medical-concept-of-beautiful-female-doctor-with-stethoscope-waist-up-medical-student-woman.jpg?s=612x612&w=0&k=20&c=bHGISU0YBMsNPG1sSbJ7Q9eVC6I3tK4lmCzfOAY_dRM="
                                                alt="profile" class="object-fit-cover rounded-circle border-light"
                                                width="40" height="40" style="outline: 3px solid #ccc">
                                        </div>
                                        <div class="col-auto me-3">
                                            <p class="fw-bold">Jasnah Kholin</p>
                                            <p class="fs-8">Care Center - CNA</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="text-primary"><i class="fa-regular fa-clock me-2"></i>7:00AM - 3:00PM
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center justify-content-end">
                                        <span class="badge custom-badge-primary fs-6 me-2"> <i
                                                class="fa-regular fa-user-xmark"></i> </span>
                                        <span class="badge custom-badge-primary fs-6 me-2"> <i
                                                class="fa-regular fa-watch"></i> </span>
                                        <span class="badge custom-badge-success fs-6"> <i
                                                class="fa-regular fa-clock-nine me-2"></i>Clock In
                                            &nbsp&nbsp; </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card bg-white border-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h5 class="fw-semibold">News</h5>
                            <a href="javascript:void(0)" class="text-primary fw-semibold">View All</a>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item bg-white px-0">
                                <div class="d-flex align-items-start justify-content-between mb-3">
                                    <h6 class="text-primary fw-bold">Print office #1 out of action</h6>
                                    <small>March 8, 2023 11:45AM</small>
                                </div>
                                <p class="text-muted fs-7 mb-3">Hi all, <br>Just a quick note that print
                                    office number one is currently out of action. Please use the print
                                    office at location #2.</p>
                                <p>Rossy Clantoriya</p>
                            </li>
                            <li class="list-group-item bg-white px-0">
                                <div class="d-flex align-items-start justify-content-between mb-3">
                                    <h6 class="text-primary fw-bold">Print office #1 out of action</h6>
                                    <small>March 8, 2023 11:45AM</small>
                                </div>
                                <p class="text-muted fs-7 mb-3">Hi all, <br>Just a quick note that print
                                    office number one is currently out of action. Please use the print
                                    office at location #2.</p>
                                <p>Rossy Clantoriya</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card bg-white border-0 mb-3">
                    <div class="card-body pb-0">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item bg-white px-0">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h5 class="fw-semibold">Reminder</h5>
                                    <div>
                                        <a href="javascript:void(0)" class="text-primary me-3" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop">Create Remider</a>
                                        <a href="javascript:void(0)" class="text-primary fw-semibold">View All</a>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item bg-white px-0 py-3">
                                <div class="d-flex align-items-start justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <i class="fa-solid fa-bell-on text-highlight"></i>
                                        <p class="px-2">Team meeting, brainstorming for the new
                                            application scheduling process.</p>
                                    </div>
                                    <a href="javascript:void(0)" class="text-primary fw-semibold">Today
                                        11:45AM</a>
                                </div>
                            </li>
                            <li class="list-group-item bg-white px-0 py-3">
                                <div class="d-flex align-items-start justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <i class="fa-solid fa-bell-on text-highlight"></i>
                                        <p class="px-2">Have to post message to the group.</p>
                                    </div>
                                    <a href="javascript:void(0)" class="text-primary fw-semibold">19 March
                                        2023 12:00PM</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card bg-white border-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h5 class="fw-semibold">Available Employees</h5>
                            <a href="javascript:void(0)" class="text-primary fw-semibold">View All</a>
                        </div>
                        <div class="border p-4 mb-3" data-border-radius="10px">
                            <div class="d-flex align-items-center">
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center">
                                        <div class="col-auto me-4">
                                            <img src="https://media.istockphoto.com/id/1308571236/photo/medical-concept-of-beautiful-female-doctor-with-stethoscope-waist-up-medical-student-woman.jpg?s=612x612&w=0&k=20&c=bHGISU0YBMsNPG1sSbJ7Q9eVC6I3tK4lmCzfOAY_dRM="
                                                alt="profile" class="object-fit-cover rounded-circle border-light"
                                                width="40" height="40" style="outline: 3px solid #ccc">
                                        </div>
                                        <div class="col-auto me-3">
                                            <p class="fw-bold">Jasnah Kholin</p>
                                            <p class="fs-8">Care Center - CNA</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <span class="badge custom-badge-cna">CNA</span>
                                    </div>
                                </div>
                                <div class="col-lg-4 text-end">
                                    <p>7:00AM - 3:00PM</p>
                                </div>
                            </div>
                        </div>
                        <div class="border p-4 mb-3" data-border-radius="10px">
                            <div class="d-flex align-items-center">
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center">
                                        <div class="col-auto me-4">
                                            <img src="https://media.istockphoto.com/id/1308571236/photo/medical-concept-of-beautiful-female-doctor-with-stethoscope-waist-up-medical-student-woman.jpg?s=612x612&w=0&k=20&c=bHGISU0YBMsNPG1sSbJ7Q9eVC6I3tK4lmCzfOAY_dRM="
                                                alt="profile" class="object-fit-cover rounded-circle border-light"
                                                width="40" height="40" style="outline: 3px solid #ccc">
                                        </div>
                                        <div class="col-auto me-3">
                                            <p class="fw-bold">Jasnah Kholin</p>
                                            <p class="fs-8">Care Center - LPN</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <span class="badge custom-badge-lpn">LPN</span>
                                    </div>
                                </div>
                                <div class="col-lg-4 text-end">
                                    <p>7:00AM - 3:00PM</p>
                                </div>
                            </div>
                        </div>
                        <div class="border p-4 mb-3" data-border-radius="10px">
                            <div class="d-flex align-items-center">
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center">
                                        <div class="col-auto me-4">
                                            <img src="https://media.istockphoto.com/id/1308571236/photo/medical-concept-of-beautiful-female-doctor-with-stethoscope-waist-up-medical-student-woman.jpg?s=612x612&w=0&k=20&c=bHGISU0YBMsNPG1sSbJ7Q9eVC6I3tK4lmCzfOAY_dRM="
                                                alt="profile" class="object-fit-cover rounded-circle border-light"
                                                width="40" height="40" style="outline: 3px solid #ccc">
                                        </div>
                                        <div class="col-auto me-3">
                                            <p class="fw-bold">Jasnah Kholin</p>
                                            <p class="fs-8">Care Center - LPN</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <span class="badge custom-badge-lpn">LPN</span>
                                    </div>
                                </div>
                                <div class="col-lg-4 text-end">
                                    <p>7:00AM - 3:00PM</p>
                                </div>
                            </div>
                        </div>
                        <div class="border p-4 mb-3" data-border-radius="10px">
                            <div class="d-flex align-items-center">
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center">
                                        <div class="col-auto me-4">
                                            <img src="https://media.istockphoto.com/id/1308571236/photo/medical-concept-of-beautiful-female-doctor-with-stethoscope-waist-up-medical-student-woman.jpg?s=612x612&w=0&k=20&c=bHGISU0YBMsNPG1sSbJ7Q9eVC6I3tK4lmCzfOAY_dRM="
                                                alt="profile" class="object-fit-cover rounded-circle border-light"
                                                width="40" height="40" style="outline: 3px solid #ccc">
                                        </div>
                                        <div class="col-auto me-3">
                                            <p class="fw-bold">Jasnah Kholin</p>
                                            <p class="fs-8">Care Center - RN</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <span class="badge custom-badge-rn">RN</span>
                                    </div>
                                </div>
                                <div class="col-lg-4 text-end">
                                    <p>7:00AM - 3:00PM</p>
                                </div>
                            </div>
                        </div>
                        <div class="border p-4 mb-3" data-border-radius="10px">
                            <div class="d-flex align-items-center">
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center">
                                        <div class="col-auto me-4">
                                            <img src="https://media.istockphoto.com/id/1308571236/photo/medical-concept-of-beautiful-female-doctor-with-stethoscope-waist-up-medical-student-woman.jpg?s=612x612&w=0&k=20&c=bHGISU0YBMsNPG1sSbJ7Q9eVC6I3tK4lmCzfOAY_dRM="
                                                alt="profile" class="object-fit-cover rounded-circle border-light"
                                                width="40" height="40" style="outline: 3px solid #ccc">
                                        </div>
                                        <div class="col-auto me-3">
                                            <p class="fw-bold">Jasnah Kholin</p>
                                            <p class="fs-8">Care Center - CNA</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <span class="badge custom-badge-cna">CNA</span>
                                    </div>
                                </div>
                                <div class="col-lg-4 text-end">
                                    <p>7:00AM - 3:00PM</p>
                                </div>
                            </div>
                        </div>
                        <div class="border p-4 mb-3" data-border-radius="10px">
                            <div class="d-flex align-items-center">
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center">
                                        <div class="col-auto me-4">
                                            <img src="https://media.istockphoto.com/id/1308571236/photo/medical-concept-of-beautiful-female-doctor-with-stethoscope-waist-up-medical-student-woman.jpg?s=612x612&w=0&k=20&c=bHGISU0YBMsNPG1sSbJ7Q9eVC6I3tK4lmCzfOAY_dRM="
                                                alt="profile" class="object-fit-cover rounded-circle border-light"
                                                width="40" height="40" style="outline: 3px solid #ccc">
                                        </div>
                                        <div class="col-auto me-3">
                                            <p class="fw-bold">Jasnah Kholin</p>
                                            <p class="fs-8">Care Center - LPN</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <span class="badge custom-badge-lpn">LPN</span>
                                    </div>
                                </div>
                                <div class="col-lg-4 text-end">
                                    <p>7:00AM - 3:00PM</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="min-height:550px;" data-border-radius="20px">
                    <div class="modal-header">
                        <span class="custom-sweetalert-border-top"></span>
                        <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Create Reminder</h1>
                        <button type="button" class="btn-close fs-7" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="needs-validation" novalidate action="{{ route('reminder.store') }}" method="post" autocomplete="off" id="createreminderform">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control rounded-pill-start" name="date" id="select_date" placeholder="Select Date" required="required">
                                            <span class="input-group-text border-0 text-secondary bg-secondary-light rounded-pill-end"> <i class="far fa-calendar"></i> </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control rounded-pill-start" name="time" id="select_time" placeholder="Select Time" required="required">
                                            <span class="input-group-text border-0 text-secondary bg-secondary-light rounded-pill-end"> <i class="far fa-clock"></i> </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <select class="form-select rounded-pill staff-type" name="staff_type" id="staff_type" required="required">
                                            <option value="1" data-next="{{ URL::to('reminder/1') }}"> Instacare staff </option>
                                            <option value="2" data-next="{{ URL::to('reminder/2') }}"> Facility </option>
                                            <option value="3" data-next="{{ URL::to('reminder/3') }}"> Employee </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-secondary-light cursor-pointer rounded-pill-start reminder-for" data-md-target="" data-next="" placeholder="Reminder for" readonly>
                                            <span class="input-group-text border-0 text-secondary bg-secondary-light rounded-pill-end"> <i class="far fa-chevron-down"></i> </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 select-employee">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-secondary-light cursor-pointer rounded-pill-start select-member-click" data-next="{{ URL::to('reminder/4') }}" placeholder="Select Employee" readonly>
                                            <span class="input-group-text border-0 text-secondary bg-secondary-light rounded-pill-end"> <i class="far fa-chevron-down"></i> </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="notes" placeholder="Notes" rows="4" required="required"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="submit" class="btn btn-secondary text-uppercase w-100">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="reminderfor1modal" tabindex="-1" aria-labelledby="staticBackdropLabel"
            aria-hidden="true" style="backdrop-filter: contrast(0.5);">
            <div class="modal-dialog modal-dialog-centered" style="width:351px;">
                <div class="modal-content" style="min-height:550px;" data-border-radius="30px">
                    <div class="modal-body">
                        <span class="custom-sweetalert-border-top"></span>
                        <h1 class="modal-title fs-5 fw-bold text-primary" id="staticBackdropLabel">Reminder For Instacare
                            Staff</h1>
                        <p class="fs-7">Please select the whom you want to send reminder.</p>
                        <div class="mdl-content"></div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary text-uppercase" data-bs-dismiss="modal"> Assign
                        </button>
                        <button type="button" class="btn btn-muted text-uppercase" data-bs-dismiss="modal"> Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="reminderfor2modal" tabindex="-1" aria-labelledby="staticBackdropLabel"
            aria-hidden="true" style="backdrop-filter: contrast(0.5);">
            <div class="modal-dialog modal-dialog-centered" style="width:351px;">
                <div class="modal-content" style="min-height:550px;" data-border-radius="30px">
                    <div class="modal-body">
                        <span class="custom-sweetalert-border-top"></span>
                        <h1 class="modal-title fs-5 fw-bold text-primary" id="staticBackdropLabel">Reminder For Faciltity
                        </h1>
                        <p class="fs-7">Please select the whom you want to send reminder.</p>
                        <div class="mdl-content"></div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button"
                            class="btn btn-secondary text-uppercase facility-assign-btn">Assign</button>
                        <button type="button" class="btn btn-muted text-uppercase"
                            data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="facilitymembermodal" tabindex="-1" aria-labelledby="staticBackdropLabel"
            aria-hidden="true" style="backdrop-filter: contrast(0.5);">
            <div class="modal-dialog modal-dialog-centered" style="width:351px;">
                <div class="modal-content" style="min-height:550px;" data-border-radius="30px">
                    <div class="modal-body">
                        <span class="custom-sweetalert-border-top"></span>
                        <h1 class="modal-title fs-5 fw-bold text-primary" id="staticBackdropLabel">Reminder For Facility
                            Member</h1>
                        <p class="fs-7">Please select the whom you want to send reminder.</p>
                        <div class="mdl-content"></div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary text-uppercase"
                            data-bs-dismiss="modal">Assign</button>
                        <button type="button" class="btn btn-muted text-uppercase"
                            data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="reminderfor3modal" tabindex="-1" aria-labelledby="staticBackdropLabel"
            aria-hidden="true" style="backdrop-filter: contrast(0.5);">
            <div class="modal-dialog modal-dialog-centered" style="width:351px;">
                <div class="modal-content" style="min-height:550px;" data-border-radius="30px">
                    <div class="modal-body">
                        <span class="custom-sweetalert-border-top"></span>
                        <h1 class="modal-title fs-5 fw-bold text-primary" id="staticBackdropLabel">Reminder For Employee
                        </h1>
                        <p class="fs-7">Please select the whom you want to send reminder.</p>
                        <div class="mdl-content"></div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary text-uppercase"
                            data-bs-dismiss="modal">Assign</button>
                        <button type="button" class="btn btn-muted text-uppercase"
                            data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End::Content -->
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        var facilities_ids = '';
        $(function(params) {
            "use strict";
            $('#select_date').flatpickr({ });
            $('#select_time').flatpickr({ enableTime: true, noCalendar: true, dateFormat: "H:i", });
        })
        $('.staff-type').on('change', function(params) {
            "use strict";
            $('.reminder-for').attr('data-md-target', $(this).val());
            $('.reminder-for').attr('data-next', $(this).find(':selected').attr('data-next'));
            $('.select-employee').hide(); //Show onclick(assign btn) from - Reminder form facility modal (2nd)
            facilities_ids = '';
        }).change();
        $(document).on('click', '.reminder-for', function(params) {
            "use strict";
            var target = $(this).attr('data-md-target');
            var aurl = $(this).attr('data-next');
            $('#reminderfor' + target + 'modal').modal('show');
            if (target == 1) {
                fetchInstacareStaff(target, aurl)
            }
            if (target == 2) {
                fetchFacilities(target, aurl)
            }
            if (target == 3) {
                fetchEmployees(target, aurl)
            }
        });
        $(document).on('click', '.facility-assign-btn', function(params) {
            "use strict";
            var selectedValues = $('input[type="checkbox"][name="reminder_for[]"]:checked').map(function() {
                return this.value;
            }).get().join(',');
            if ($.trim(selectedValues) != '') {
                facilities_ids = selectedValues;
                $('#reminderfor2modal').modal('hide');
                $('.select-employee').show();
            } else {
                showtoast(2, 'Facility selection is required');
                return false;
            }
        });
        $(document).on('keyup', '.form-control', function() {
            const searchTerm = $(this).val().toLowerCase();
            $('.m2content .form-check-label').each(function(index, element) {
                const name = $(this).find('.ms-2').text().toLowerCase();
                if (name.includes(searchTerm)) {
                    $(this).parent().removeClass('d-none');
                } else {
                    $(this).parent().addClass('d-none');
                }
            });
        });
        $(document).on('change', '.form-select', function() {
            const selectedValue = $(this).val();
            $('.m2content .form-check').each(function(index, element) {
                const badge = $(this).find('.badge').text().toLowerCase();
                if (selectedValue === 'all' || badge === selectedValue) {
                    $(this).removeClass('d-none');
                } else {
                    $(this).addClass('d-none');
                }
            });
        });
        $(document).on('change', '.select_all', function(params) {
            if ($(this).is(':checked') == true) {
                $('.' + $(this).attr('data-check-section') + ' input[name="reminder_for[]"]').prop('checked', true);
            } else {
                $('.' + $(this).attr('data-check-section') + ' input[name="reminder_for[]"]').prop('checked',
                    false);
            }
        });
        $(document).on('change', '.select_all_emp', function(params) {
            if ($(this).is(':checked') == true) {
                $('.' + $(this).attr('data-check-section') + ' input[name="reminder_for[]"]').prop('checked', true);
            } else {
                $('.' + $(this).attr('data-check-section') + ' input[name="reminder_for[]"]').prop('checked', false);
            }
        });
        $(document).on('change', '.select_all_facility', function(params) {
            if ($(this).is(':checked') == true) {
                $('.' + $(this).attr('data-check-section') + ' input[name="reminder_for[]"]').prop('checked', true);
            } else {
                $('.' + $(this).attr('data-check-section') + ' input[name="reminder_for[]"]').prop('checked', false);
            }
        });
        $(document).on('change', '.select_all_faci_member', function(params) {
            if ($(this).is(':checked') == true) {
                $('.' + $(this).attr('data-check-section') + ' input[name="facilities_member[]"]').prop('checked',
                    true);
            } else {
                $('.' + $(this).attr('data-check-section') + ' input[name="facilities_member[]"]').prop('checked',
                    false);
            }
        });
        $('.select-member-click').on('click', function(params) {
            "use strict";
            $('#facilitymembermodal').modal('show');
            var ele = $('#facilitymembermodal').find('.mdl-content');
            $.ajax({
                url: $(this).attr('data-next'),
                type: 'POST',
                data: {
                    ids: facilities_ids
                },
                beforeSend: function() {
                    ele.html('');
                },
                success: function(response) {
                    if (response.status == 1) {

                        var html = '';
                        if (response.data.length > 0) {
                            html += '<div class="form-check d-flex align-items-center"> <input class="form-check-input hw-1-5-em select_all_faci_member" data-check-section="m4content" type="checkbox" name="select_all_faci_member" id="select_all_faci_member" data-type="1"> <label class="form-check-label ps-3" for="select_all_faci_member"> Select All </label></div>   <div class="m4content">';
                            $.each(response.data, function(i, v) {
                                html +=
                                    '<div class="form-check d-flex align-items-center"> <input class="form-check-input hw-1-5-em cursor-pointer" type="checkbox" name="facilities_member[]" value="' +
                                    v.id + '" id="fm' + i +
                                    '"> <label class="form-check-label ps-3 d-flex align-items-center w-100 cursor-pointer" for="fm' +
                                    i + '"> <img src="' + v.image_url +
                                    '" alt="user" class="rounded-circle img-3" width="35" height="35"> <div class="d-flex justify-content-between w-100"><span class="ms-2"> ' +
                                    v.fullname +
                                    ' </span> <span class="badge custom-badge-cna text-normal">' +
                                    v.role + '</span> </div> </label> </div>';
                            });
                            html += '</div>';
                        } else {
                            html += no_data;
                        }
                        ele.html(html);
                    } else {
                        showtoast(2, response.message);
                    }
                },
                error: function(xhr, status, error) {
                    showtoast(2, wrong);
                    return false;
                }
            });
        })

        function fetchInstacareStaff(mtype, u) {
            "use strict";
            var ele = $('#reminderfor' + mtype + 'modal').find('.mdl-content');
            $.ajax({
                url: u,
                type: 'POST',
                data: {
                    id: mtype
                },
                beforeSend: function() {
                    ele.html('');
                },
                success: function(response) {
                    if (response.status == 1) {
                        var html = '';
                        if (response.data.length > 0) {
                            html +=
                                '<div class="form-check d-flex align-items-center"><input class="form-check-input hw-1-5-em cursor-pointer select_all" data-check-section="m1content" type="checkbox" name="select_all" id="select_all1" data-type="1"><label class="form-check-label ps-3" for="select_all1"> Select All</label></div><div class="m1content">';
                            $.each(response.data, function(i, v) {
                                html +=
                                    '<div class="form-check d-flex align-items-center"><input class="form-check-input hw-1-5-em cursor-pointer" type="checkbox" name="reminder_for[]" value="' +
                                    v.id + '" id="user' + mtype + i +
                                    '"> <label class="form-check-label ps-3 d-flex align-items-center w-100 cursor-pointer" for="user' +
                                    mtype + i + '"> <img src="' + v.image_url +
                                    '" alt="user" class="rounded-circle img-3" width="35" height="35"> <div class="d-flex justify-content-between w-100"><span class="ms-2"> ' +
                                    v.fullname +
                                    ' </span> <span class="badge custom-badge-cna">Admin</span> </div> </label> </div> ';
                            });
                            html += '</div>';
                        } else {
                            html += no_data;
                        }
                        ele.html(html);
                    } else {
                        showtoast(2, response.message);
                    }
                },
                error: function(xhr, status, error) {
                    showtoast(2, wrong);
                    return false;
                }
            });
        }

        function fetchEmployees(mtype, u) {
            "use strict";
            var ele = $('#reminderfor' + mtype + 'modal').find('.mdl-content');
            $.ajax({
                url: u,
                type: 'POST',
                data: {
                    id: mtype
                },
                beforeSend: function() {
                    ele.html('');
                },
                success: function(response) {
                    if (response.status == 1) {
                        var html = '';
                        if (response.data.length > 0) {
                            html +=
                                '<div class="form-group"><div class="input-group gap-3"><input class="form-control rounded-pill" type="text" placeholder="Search name"><select class="form-select rounded-pill" name="" id=""><option value="all">All</option><option value="rn">RN</option><option value="cna">CNA</option><option value="lpn">LPN</option></select></div></div><div class="form-check d-flex align-items-center"><input class="form-check-input hw-1-5-em cursor-pointer select_all_emp" data-check-section="m2content" type="checkbox" name="select_all_emp" id="select_all_emp" data-type="2"><label class="form-check-label ps-3 cursor-pointer" for="select_all_emp"> Select All </label></div> <div class="m2content">';
                            $.each(response.data, function(i, v) {
                                html +=
                                    '<div class="form-check d-flex align-items-center"> <input class="form-check-input hw-1-5-em cursor-pointer" type="checkbox" name="reminder_for[]" value="' + v.id +'" id="employee__' +
                                    i +
                                    '"><label class="form-check-label ps-3 d-flex align-items-center w-100 cursor-pointer" for="employee__' +
                                    i + '"> <img src="' + v.image_url +
                                    '" alt="user" class="rounded-circle img-' + i +
                                    '" width="35" height="35"> <div class="d-flex justify-content-between w-100"> <span class="ms-2"> ' +
                                    v.fullname + ' </span> <span class="badge custom-badge-' + v.role +
                                    '">' + v.role + '</span> </div> </label> </div>';
                            });
                            html += '</div>';
                        } else {
                            html += no_data;
                        }
                        ele.html(html);
                    } else {
                        showtoast(2, response.message);
                    }
                },
                error: function(xhr, status, error) {
                    showtoast(2, wrong);
                    return false;
                }
            });
        }

        function fetchFacilities(mtype, u) {
            "use strict";
            var ele = $('#reminderfor' + mtype + 'modal').find('.mdl-content');
            $.ajax({
                url: u,
                type: 'POST',
                data: {
                    id: mtype
                },
                beforeSend: function() {
                    ele.html('');
                },
                success: function(response) {
                    if (response.status == 1) {
                        var html = '';
                        if (response.data.length > 0) {
                            html +=
                                '<div class="form-check d-flex align-items-center"> <input class="form-check-input hw-1-5-em select_all_facility cursor-pointer" data-check-section="m3content" type="checkbox" name="select_all_faci" id="select_all_faci" data-type="2"> <label class="form-check-label ps-3 cursor-pointer" for="select_all_faci"> Select All </label> </div> <div class="m3content">';
                            $.each(response.data, function(i, v) {
                                html +=
                                    '<div class="form-check d-flex align-items-center"> <input class="form-check-input hw-1-5-em cursor-pointer" type="checkbox" name="reminder_for[]" id="faci' +
                                    i + '" value="' + v.id +
                                    '"> <label class="form-check-label ps-3 d-flex align-items-center w-100 cursor-pointer" for="faci' +
                                    i + '"> <img src="' + v.image_url +
                                    '" alt="user" width="40" height="40" data-border-radius="10px"> <span class="ms-2"> ' +
                                    v.fullname + ' </span></label></div>';
                            });
                            html += '</div>';
                        } else {
                            html += no_data;
                        }
                        ele.html(html);
                    } else {
                        showtoast(2, response.message);
                    }
                },
                error: function(xhr, status, error) {
                    showtoast(2, wrong);
                    return false;
                }
            });
        }
        $('#createreminderform').on('submit', function(event) {
            "use strict";
            event.preventDefault();
            $('.err').remove();
            var formData = new FormData(this);
            var selectedValues = $('input[type="checkbox"][name="reminder_for[]"]:checked').map(function() {
                return this.value;
            }).get().join(',');
            var uids = $('input[type="checkbox"][name="facilities_member[]"]:checked').map(function() {
                return this.value;
            }).get().join(',');
            formData.append('reminder_for', selectedValues);
            formData.append('user_id', uids);
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == 0) {
                        if (response.errors && Object.keys(response.errors).length > 0) {
                            $.each(response.errors, function(key, value) {
                                showtoast(2, response.message);
                                return false;
                            });
                        } else {
                            swal_cancelled(response.message);
                        }
                        return false;
                    } else {
                        $('#createreminderform')[0].reset();
                        $('#staticBackdrop').modal('hide');
                        showtoast(1, response.message);
                    }
                },
                error: function(xhr, status, error) {
                    showtoast(2, wrong);
                    return false;
                }
            });
        });
        </script>
@endsection

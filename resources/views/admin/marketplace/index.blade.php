@extends('admin.theme.default')
@section('title')
    Marketplace
@endsection
@section('style')
    <style>
        .card-disabled {
            opacity: 0.5;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid content d-flex flex-column ">
        <!-- Begin::Content -->
        <h3 class="fw-bold mb-3"> Marketplace </h3>
        <div class="card bg-white border-0 mb-3">
            <div class="card-body pb-0 d-flex justify-content-between">
                <div class="nav nav-underline" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link fw-bold text-muted me-5 active" id="all-shifts-tab" data-bs-toggle="pill"
                        href="#all-shifts" role="tab" aria-controls="all-shifts" aria-selected="true"> All Shifts </a>
                    <a class="nav-link fw-bold text-muted me-5" id="prefered-shifts-tab" data-bs-toggle="pill"
                        href="#prefered-shifts" role="tab" aria-controls="prefered-shifts" aria-selected="true">
                        Prefered Shifts </a>
                </div>
                <button type="button" class="btn btn-secondary fs-6 px-5 py-2" data-bs-toggle="offcanvas"
                    data-bs-target="#marketplace_filter_aside" aria-controls="marketplace_filter_aside"> <i
                        class="fa-regular fa-sliders-up me-2"></i>Filter</button>
            </div>
        </div>
        <div class="card bg-white border-0 marketplace-shifts">
            <div class="card-body">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="all-shifts" role="tabpanel" aria-labelledby="all-shifts-tab">
                        <div class="row">

                            @for ($i = 11; $i <= 22; $i++)
                                <div class="col-md-4 mb-3">
                                    <div class="card bg-white cursor-pointer border {{ in_array($i, [13, 18]) ? 'card-disabled' : '' }}"
                                        onclick="shift_details()">
                                        <div class="card-body">
                                            <div class="hstack gap-3 align-items-start" style="height:100px">
                                                <div class="text-center" style="width: 100px;">
                                                    <h1 class="text-primary fw-bold">{{ $i }}</h1>
                                                    <p class="text-muted text-uppercase fs-9 mb-1">March</p>
                                                    @if (!in_array($i, [12, 13, 15, 18, 19, 21]))
                                                        <button
                                                            class="btn btn-sm btn-warning fw-500 btnincentive">+$5/hr</button>
                                                    @endif
                                                </div>
                                                <div class="vr" style="height:50px"></div>
                                                <div class="me-auto h-100 d-flex align-content-between flex-wrap">
                                                    <div>
                                                        <h6 class="mb-2">Blue Door Nursing & Rehab</h6>
                                                        <p class="text-muted text-uppercase fs-9"> <i
                                                                class="fa-solid fa-shield-check text-success"></i>
                                                            Cancellation Guarantee </p>
                                                    </div>
                                                    <div>
                                                        <span class="badge custom-badge-lpn border-0 rounded p-2"> <i
                                                                class="fa-light fa-brightness"></i> 7:00AM - 3:00PM </span>
                                                        <span class="badge custom-badge-cna border-0 rounded p-2 badge2"> <i
                                                                class="fa-solid fa-location-arrow"></i> 5.2 mi</span>
                                                    </div>
                                                </div>
                                                <div class="text-warning">
                                                    @if (!in_array($i, [19, 21]))
                                                        <i class="fa-solid fa-flag-pennant"></i>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor

                        </div>
                    </div>
                    <div class="tab-pane fade" id="prefered-shifts" role="tabpanel" aria-labelledby="prefered-shifts-tab">
                        <div class="row">
                            @for ($i = 11; $i <= 16; $i++)
                                <div class="col-md-4 mb-3">
                                    <div class="card bg-white cursor-pointer border {{ in_array($i, [13]) ? 'card-disabled' : '' }}"
                                        onclick="shift_details(this)">
                                        <div class="card-body">
                                            <div class="hstack gap-3 align-items-start" style="height:100px">
                                                <div class="text-center" style="width: 100px;">
                                                    <h1 class="text-primary fw-bold">{{ $i }}</h1>
                                                    <p class="text-muted text-uppercase fs-9 mb-1">March</p>
                                                    @if (!in_array($i, [12, 13, 15]))
                                                        <button
                                                            class="btn btn-sm btn-warning fw-500 btnincentive">+$5/hr</button>
                                                    @endif
                                                </div>
                                                <div class="vr" style="height:50px"></div>
                                                <div class="me-auto h-100 d-flex align-content-between flex-wrap">
                                                    <div>
                                                        <h6 class="mb-2">Blue Door Nursing & Rehab</h6>
                                                        <p class="text-muted text-uppercase fs-9"> <i
                                                                class="fa-solid fa-shield-check text-success"></i>
                                                            Cancellation Guarantee </p>
                                                    </div>
                                                    <div>
                                                        <span class="badge custom-badge-lpn border-0 rounded p-2"> <i
                                                                class="fa-light fa-brightness"></i> 7:00AM - 3:00PM </span>
                                                        <span class="badge custom-badge-cna border-0 rounded p-2 badge2"> <i
                                                                class="fa-solid fa-location-arrow"></i> 5.2 mi</span>
                                                    </div>
                                                </div>
                                                <div class="text-warning">
                                                    @if (!in_array($i, [12, 15]))
                                                        <i class="fa-solid fa-flag-pennant"></i>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Begin::Filter Aside -->
        <div class="offcanvas offcanvas-end border-start-0" tabindex="-1" id="marketplace_filter_aside"
            aria-labelledby="marketplace_filter_asideLabel"
            style="border-top: 5px solid var(--bs-secondary); top:80px; width:370px;">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title fw-bold" id="marketplace_filter_asideLabel">Apply Filter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <form class="offcanvas-body">
                <div class="form-group">
                    <select name="facilities" id="facilities" class="form-select rounded-pill text-dark fw-500">
                        <option value="" selected="" disabled="">Facilities</option>
                    </select>
                </div>
                <div class="form-group">
                    <select name="date" id="date" class="form-select rounded-pill text-dark fw-500">
                        <option value="" selected="" disabled="">Date</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="distance_range" class="form-label text-nowrap text-dark fw-bold fs-6">Distance</label>
                    <p class="fs-8 text-muted">Show shifts within a certain distance</p>
                    <input class="range w-100" type="range" min="0" max="100" value="10"
                        step="1" onmousemove="rangevalue1.value=value" />
                    <p class="text-end"> <output id="rangevalue1">10</output> miles</p>
                </div>
                <label for="shift time" class="form-label fw-bold text-dark fs-5">Shift Time</label>
                <div class="form-group shift-time">
                    <div>
                        <input class="d-none" type="checkbox" id="morning_shift" name="shift_time" checked>
                        <label for="morning_shift" class="p-4 rounded-pill border-secondary border text-secondary mb-3"
                            style="width:-webkit-fill-available">
                            <div class="d-flex align-items-center">
                                <i class="fa-regular fa-sun-bright me-3"></i>
                                <p class="me-3">Morning Shifts</p>
                                <p>7:00AM - 3:00PM</p>
                            </div>
                        </label>
                    </div>
                    <div>
                        <input class="d-none" type="checkbox" id="noon_shift" name="shift_time">
                        <label for="noon_shift" class="p-4 rounded-pill border-secondary border text-secondary mb-3"
                            style="width:-webkit-fill-available">
                            <div class="d-flex align-items-center">
                                <i class="fa-regular fa-sun-bright me-3"></i>
                                <p class="me-3">Afternoon Shifts</p>
                                <p>3:00PM - 11:00PM</p>
                            </div>
                        </label>
                    </div>
                    <div>
                        <input class="d-none" type="checkbox" id="night_shift" name="shift_time">
                        <label for="night_shift" class="p-4 rounded-pill border-secondary border text-secondary mb-3"
                            style="width:-webkit-fill-available">
                            <div class="d-flex align-items-center">
                                <i class="fa-regular fa-moon me-3"></i>
                                <p class="me-3">Night Shifts</p>
                                <p>11:00PM - 7:00AM</p>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="text-center mt-3 w-100">
                    <button type="button" class="btn btn-secondary me-3">APPLY</button>
                    <button type="button" class="btn btn-muted ">RESET</button>
                </div>
            </form>
        </div>
        <!-- End::Filter Aside -->
        <!-- End::Content -->
    @endsection
    @section('script')
        <script>
            function shift_details() {
                "use strict";
                swalWithBootstrapButtons.fire({
                    title: 'Confirmation',
                    // text: 'Great, would you like to post this shift?',
                    showClass: {
                        popup: 'animate__animated animate__bounceInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__bounceOutUp'
                    },
                    showCancelButton: true,
                    confirmButtonText: 'Accept',
                    cancelButtonText: 'Close',
                    showLoaderOnConfirm: true,
                    didOpen: function() {
                        $('.swal2-container .swal2-popup').append(
                            '<span class="custom-sweetalert-border-top"></span>');
                        $('.swal2-title').addClass('text-primary fw-semibold').html('7:00AM - 3:00PM');
                        $('.swal2-title').parent().prepend(
                            '<small class="text-primary text-uppercase text-center mt-5">Shift Details</small>');
                        $('.swal2-html-container').show().append(
                            '<p class="text-center fw-bold fs-5 text-primary my-3">Saturday, March 11 2023</p>' +
                            '<p class="text-center fs-8 fw-light my-3">Elevate Care North Branch</p>' +
                            '<p class="text-center fs-8 fw-light my-3"> <i class="fa fa-location-dot text-warning"></i> Seattle Grace - 135 Ridgewood Ave.</p>' +
                            '<div class="d-flex gap-2 mb-3 justify-content-center"><span class="badge custom-badge-cna border-0 rounded p-2 badge2"> <i class="fa-solid fa-location-arrow"></i> 5.2 mi</span><button class="btn btn-sm btn-warning fw-500 btnincentive"> Incentive +$5/hr</button></div>' +
                            '<p class="text-muted text-uppercase fs-9"> <i class="fa-solid fa-shield-check text-success"></i> Cancellation Guarantee </p>'
                        );
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        accept_shift();
                    } else {
                        Swal.close();
                    }
                });
            }

            function accept_shift() {
                swalWithBootstrapButtons.fire({
                    title: 'Awesome!',
                    text: ' ',
                    showClass: {
                        popup: 'animate__animated animate__bounceInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__bounceOutUp'
                    },
                    showConfirmButton: true,
                    showCancelButton: true,
                    confirmButtonText: '<i class="fa-regular fa-clock"></i> CLOCK IN',
                    cancelButtonText: close,
                    showLoaderOnConfirm: true,
                    didOpen: function() {
                        $('.swal2-container .swal2-popup').append(
                            '<span class="custom-sweetalert-border-top"></span>');
                        $('.swal2-title').addClass('text-primary fw-light').parent().prepend(
                            '<i class="fa-regular fa-calendar-check text-center h1 text-highlight mt-5"></i>');
                        $('.swal2-html-container').append(
                            '<p class="text-center my-3 fw-light">You successfully booked the shift.</p>' +
                            '<p class="text-center my-3 fw-light">Your shift details are:</p>' +
                            '<p class="text-center my-3 fw-bold fs-5 text-primary">Saturday 18, 2023</p>' +
                            '<p class="text-center my-3 fw-bold fs-5 text-dark"><i class="fa-regular fa-sun-bright text-highlight me-2"></i> 7:00 AM - 3:00 PM</p>'
                        );
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        shift_confirmation();
                    } else {
                        Swal.close();
                    }
                });
            }
        </script>
    @endsection

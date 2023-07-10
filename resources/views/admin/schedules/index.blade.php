@extends('admin.theme.default')
@section('title')
    Schedules
@endsection
@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        .sweetalert-dropdown-position {
            left: -155px !important;
            top: -23px !important;
        }

        /* Custom calendar styles */
        #customCalendar {
            font-family: Arial, sans-serif;
        }

        #customCalendar .calendar-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        #customCalendar .calendar-table {
            width: 100%;
            border-collapse: collapse;
        }

        #customCalendar .calendar-table th,
        #customCalendar .calendar-table .bg-secondary-light {
            background-color: rgba(var(--bs-secondary-rgb), 0.1);
        }

        #customCalendar .bg-success-light {
            background-color: rgba(var(--bs-success-rgb), 0.2);
        }

        #customCalendar .calendar-table th,
        #customCalendar .calendar-table td .from-to-time {
            height: 40px;
        }

        #customCalendar .calendar-table td .from-to-time {
            background-color: var(--bs-secondary);
            padding-top: 10px;
        }

        #customCalendar .calendar-table th,
        #customCalendar .calendar-table td {
            text-align: center;
            border: none;
            padding: 0;
        }

        #customCalendar .calendar-table th {
            font-weight: bold;
        }

        .calendar-table td.selected {
            background-color: #f0f0f0;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid content d-flex flex-column ">
        <!-- Begin::Content -->
        <div class="row align-items-center justify-content-between mb-3">
            <div class="col-auto">
                <h3 class="fw-bold">Schedules</h3>
            </div>
            <div class="col-auto">
                <a href="{{ URL::to('shifts/add') }}" class="btn btn-highlight text-uppercase rounded-pill fs-8">
                    <i class="fa-regular fa-plus me-2 fs-9"></i>add shift
                </a>
            </div>
        </div>

        <div class="card bg-white border-0 mb-3">
            <div class="card-body pb-0">

                <form class="row justify-content-between">
                    <div class="col-md-10 pb-3">

                        <div class="d-flex align-items-center gap-3" style="width: 55%">

                            <label for="date_range" class="form-label text-nowrap text-dark fw-semibold fs-7">Date
                                Range</label>

                            <div class="input-group">
                                <input type="text" class="form-control bg-white border border-end-0" id="date_range"
                                    placeholder="06/02/2023   -   12/02/2023">
                                <span class="input-group-text bg-white text-secondary fw-bold border-start-0"><i
                                        class="fa-light fa-calendar"></i></span>
                            </div>
                            <div class="d-flex">
                                <button type="button" class="btn input-group-text my-btns active">Week</button>
                                <button type="button" class="btn input-group-text my-btns">Month</button>
                                <button type="button"
                                    class="btn input-group-text my-btns group-last-btn-radius">Year</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 text-end">
                        <span class="badge custom-badge-danger fs-6 px-3 me-2 cursor-pointer" onclick="delete_shifts()"> <i
                                class="fa-regular fa-trash-can"></i></span>
                        <button type="button" class="btn btn-secondary fs-6 px-5 py-2" data-bs-toggle="offcanvas"
                            data-bs-target="#schedules_filter_aside" aria-controls="schedules_filter_aside"> <i
                                class="fa-regular fa-sliders-up me-2"></i>Filter</button>
                    </div>
                </form>

            </div>
        </div>

        <div class="card bg-white border-0 mb-3">
            <div class="card-body">
                <form class="needs-validation" novalidate action="{{ URL::to('form') }}" method="post" autocomplete="off">
                    @csrf


                    <div id="customCalendar">
                        <div class="calendar-header">
                            <span class="prev-week cursor-pointer p-2 fs-4"><i class="fa-regular fa-circle-left"></i></span>
                            <h2 class="current-week"></h2>
                            <span class="next-week cursor-pointer p-2 fs-4"><i
                                    class="fa-regular fa-circle-right"></i></span>
                        </div>
                        <table class="calendar-table">
                            <thead>
                                <tr>
                                    <th>Sun</th>
                                    <th>Mon</th>
                                    <th>Tue</th>
                                    <th>Wed</th>
                                    <th>Thu</th>
                                    <th>Fri</th>
                                    <th>Sat</th>
                                </tr>
                            </thead>
                            <tbody class="calendar-body"></tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>

        <!-- Begin::Filter Aside -->
        <div class="offcanvas offcanvas-end border-start-0" tabindex="-1" id="schedules_filter_aside"
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
                    <select name="employee_name" id="employee_name" class="form-select rounded-pill text-dark fw-500">
                        <option value="" selected="" disabled="">Employee Name</option>
                    </select>
                </div>
                <div class="form-group">
                    <select name="role" id="role" class="form-select rounded-pill text-dark fw-500">
                        <option value="" selected="" disabled="">Role</option>
                    </select>
                </div>
                <div class="form-group">
                    <select name="shift_status" id="shift_status" class="form-select rounded-pill text-dark fw-500">
                        <option value="" selected="" disabled="">Shift Status</option>
                    </select>
                </div>
                <div class="form-group">
                    <select name="date" id="date" class="form-select rounded-pill text-dark fw-500">
                        <option value="" selected="" disabled="">Date</option>
                    </select>
                </div>
                <div class="form-group shift-time mb-auto">
                    <label for="shift time" class="form-label fw-bold text-dark fs-5">Shift Time</label>
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
                        <input class="d-none" type="checkbox" id="night_shift" name="shift_time" checked>
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
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        $('#date_range').flatpickr({
            mode: "range",
            dateFormat: "Y-m-d",
            onClose: function(selectedDates, dateStr, instance) {
                // console.log(dateStr);
            }
        });
        $('.my-btns').on('click', function(params) {
            $('.my-btns').removeClass('active');
            $(this).addClass('active');
        });
    </script>
    <script>
        $(document).ready(function() {
            "use strict";
            var startDate = new Date('2023-06-11'); // Replace with your start date
            var endDate = new Date('2023-06-17'); // Replace with your end date
            $('.current-week').text(getFormattedDate(startDate) + ' - ' + getFormattedDate(endDate));
            renderCalendar(startDate, endDate);
            $('.prev-week').click(function() {
                "use strict";
                var newStartDate = new Date(startDate);
                newStartDate.setDate(newStartDate.getDate() - 7);
                var newEndDate = new Date(newStartDate);
                newEndDate.setDate(newEndDate.getDate() + 6);
                $('.current-week').text(getFormattedDate(newStartDate) + ' - ' + getFormattedDate(
                    newEndDate));
                renderCalendar(newStartDate, newEndDate);
            });
            $('.next-week').click(function() {
                "use strict";
                var newStartDate = new Date(startDate);
                newStartDate.setDate(newStartDate.getDate() + 7);
                var newEndDate = new Date(newStartDate);
                newEndDate.setDate(newEndDate.getDate() + 6);
                $('.current-week').text(getFormattedDate(newStartDate) + ' - ' + getFormattedDate(
                    newEndDate));
                renderCalendar(newStartDate, newEndDate);
            });

            function renderCalendar(start, end) {
                "use strict";
                $('.calendar-body').empty();
                var main_title = [
                    '2 positions'
                ]; // ['2 positions', '2 positions','Granny weatherwax','2 positions', 'Tyra Lea', 'Johnae Thomas','2 positions', 'Johnae Thomas','2 positions']
                var sub_title = [
                    'Care Center'
                ]; // ['Care Center', 'Elevate Care', 'Maureen Biologist', 'Elevate Care - CNA']
                var currentDate = new Date(start);
                var endDate = new Date(end);
                while (currentDate <= endDate) {
                    var day = currentDate.getDay(); // Sunday: 0, Monday: 1, etc.
                    var other_html = '';
                    for (let index = 1; index <= 6; index++) {
                        var main_title_val = main_title[Math.floor(Math.random() * main_title.length)];
                        var sub_title_val = sub_title[Math.floor(Math.random() * sub_title.length)];
                        var bgcolor = '';
                        if (index % 2 === 0) {
                            bgcolor = 'bg-secondary-light';
                        }
                        var title_subtitle = '';
                        if (day == 3 && (index == 4 || index == 5)) {
                            bgcolor = 'bg-success-light';
                            title_subtitle = '<p class="show_popup fw-bold"><strike> ' + main_title_val +
                                ' </strike></p><strike> ' + sub_title_val + ' </strike>';
                        } else {
                            title_subtitle = '<p class="show_popup fw-bold"> ' + main_title_val + ' </p><span> ' +
                                sub_title_val + ' </span>';
                        }
                        other_html +=
                            '<div class="d-flex justify-content-between border m-1 mb-3 p-2 schedule-shifts-card cursor-pointer position-relative ' +
                            bgcolor + '"><div class="text-start">' + title_subtitle +
                            '<p> <span class="text-danger me-1"><i class="fa-regular fa-square"></i></span> <span class="text-warning me-1"><i class="fa-solid fa-flag-pennant"></i></span> </p></div><div class="text-end"><div class="form-check d-flex justify-content-end"><span class="position-absolute right-0" style="z-index:999;"><input class="form-check-input cursor-pointer" type="checkbox" name="shift_time" style="width: 1em !important;height:1em !important;"></span></div><span class="badge custom-badge-cna">CNA</span></div></div>';
                    }
                    var time = '<p class="from-to-time">' + currentDate.getDate() + '</p>';
                    var cell = $('<td></td>').html(time + '' + other_html);

                    // Add a click event handler for the day cell
                    // cell.click(function() {
                    //     $(this).toggleClass('selected');
                    //     // Add your logic here to handle the selection of the day cell
                    // });
                    $('.calendar-body').append(cell);
                    currentDate.setDate(currentDate.getDate() + 1);
                }
            }

            function getFormattedDate(date) {
                var options = {
                    year: 'numeric',
                    month: 'short',
                    day: 'numeric'
                };
                return date.toLocaleDateString(undefined, options);
            }
        });
        $('body').on('click', '.schedule-shifts-card .show_popup', function(params) {
            var ele = $(this);
            "use strict";
            swalWithBootstrapButtons.fire({
                showClass: {
                    popup: 'animate__animated animate__bounceInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__bounceOutUp'
                },
                showCancelButton: true,
                showConfirmButton: $(ele).find('strike').length == 0 ? true : false,
                confirmButtonText: 'ASSIGN',
                cancelButtonText: 'CLOSE',
                showLoaderOnConfirm: true,
                didOpen: function() {
                    $('.swal2-container .swal2-popup').append(
                        '<span class="swal2-bgpopup" style="height: 220px;"></span><span class="custom-sweetalert-border-top"></span>'
                    );
                    $('.swal2-title').addClass('text-danger fw-semibold').parent().prepend(
                        '<div class="text-muted text-center text-uppercase mt-5"> Shift Details <div class="float-end px-4 cursor-pointer" data-bs-toggle="dropdown"><i class="fa-solid fa-ellipsis-vertical text-white"></i></div><ul class="dropdown-menu sweetalert-dropdown-position"><li><a class="dropdown-item fw-bold delete_shifts" href="javascript:;"><i class="text-primary me-2 fa-regular fa-trash-can"></i> Delete </a></li> <li><a class="dropdown-item fw-bold" href="javascript:;"><i class="text-primary me-2 fa-regular fa-edit"></i> Edit Shift </a></li></ul></div>'
                    );

                    $('.swal2-html-container').show().addClass('my-3').append(
                        '<h3 class="my-4 text-white">7:00AM - 3:00PM</h3>' +
                        '<h6 class="my-4 text-white">Friday, Feb 17 2023</h6>' +
                        '<p class="my-4 text-secondary fs-8">Care Center - CNA</p>' +
                        '<p class="my-4 text-secondary fs-8"> <i class="fa fa-location-dot text-warning"></i> Meadow Drive,Brentwood</p>'
                    );
                    if ($(ele).find('strike').length > 0) {
                        $('.swal2-html-container').append(
                            '<div class="d-flex justify-content-center align-items-center mt-5 mb-3"> <span><i class="fa-solid fa-square text-success me-1"></i> Assigned </span></div>' +
                            '<div class="d-flex gap-5 py-4 border-1 border-top align-items-start"><div class="col-auto"><img src="https://randomuser.me/api/portraits/thumb/women/74.jpg" class="object-fit-cover rounded-circle" width="40" height="40" /></div><div class="col-auto"><p class="mb-2 text-start fw-bold">Granny Weatherwax</p><p class="mb-3 text-start fw-semibold text-primary">888-888-8888</p></div><div class="col-auto"><span class="badge bg-warning text-primary rounded-pill text-capitalize"> <i class="far fa-star"></i> Review </span></div></div>'
                        );
                        $('.swal2-cancel, .swal2-html-container .swal2-confirm').addClass('d-none');
                        $('.swal2-actions').append(
                            '<div class="d-flex justify-content-center align-items-center gap-3"><button type="button" class="btn btn-secondary text-uppercase btn-un-assign">UN-ASSIGN</button><button type="button" class="btn btn-secondary text-uppercase">ARRIVE LATE</button></div> <button type="button" class="btn btn-secondary text-uppercase mt-3" style="padding: 10px 105px;"> NO CALL NO SHOW </button></div>'
                        );
                    } else {
                        $('.swal2-html-container').append(
                            '<div class="d-flex justify-content-between align-items-center my-5"> <span class="fw-bold">2 Positions</span> <small> <span><i class="fa-regular fa-square text-danger me-1"></i> Open </span> <span class="ms-2"><i class="fa-solid fa-flag-pennant text-warning me-1"></i> Incentive </span> </small> </div>'
                        );
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    assign_shift()
                } else {
                    Swal.close();
                }
            });
        });
        $('body').on('click', '.btn-un-assign', function(params) {
            swalWithBootstrapButtons.fire({
                title: '',
                showClass: {
                    popup: 'animate__animated animate__bounceInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__bounceOutUp'
                },
                showCancelButton: true,
                cancelButtonText: 'UN-ASSIGN',
                showConfirmButton: false,
                showLoaderOnConfirm: true,
                didOpen: function() {
                    $('.swal2-actions').addClass('m-0');
                    $('.swal2-cancel').removeClass('btn-muted').addClass('btn-secondary');
                    $('.swal2-html-container').show().addClass('mb-0').append(
                        '<div class="form-check d-flex align-items-center me-7"><input class="form-check-input hw-1-5-em" type="radio" name="cancellation_guarantee" id="cancellation_facility" checked><label class="form-check-label ps-3 text-muted" for="cancellation_facility"> Facility Cancellation </label> </div><div class="form-check d-flex align-items-center me-7"><input class="form-check-input hw-1-5-em" type="radio" name="cancellation_guarantee" id="employee_call_off" checked><label class="form-check-label ps-3 text-muted" for="employee_call_off"> Employee Call-Off </label> </div><div class="form-check d-flex align-items-center me-7"><input class="form-check-input hw-1-5-em" type="radio" name="cancellation_guarantee" id="instacare_cancellation" checked><label class="form-check-label ps-3 text-muted" for="instacare_cancellation"> Instacare Cancellation </label> </div>'
                    );
                }
            }).then((result) => {
                if (result.isConfirmed) {} else {
                    Swal.close();
                }
            });
        });

        function assign_shift() {
            "use strict";
            swalWithBootstrapButtons.fire({
                title: 'Assign Shift(s)',
                text: ' ',
                showClass: {
                    popup: 'animate__animated animate__bounceInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__bounceOutUp'
                },
                showCancelButton: true,
                confirmButtonText: 'ASSIGN',
                cancelButtonText: 'CANCEL',
                showLoaderOnConfirm: true,
                didOpen: function() {
                    $('.swal2-popup').addClass('justify-items-start');
                    $('.swal2-title').addClass('text-primary fw-bold h4');
                    var names = ['Maureen Biologist', 'Jessica Atréides', 'Jasnah Kholin', 'Tattersail',
                        'Granny Weatherwax', 'Kimberley', 'Gemma', 'Demi', 'Dorothy', 'Iqra', 'Elsie',
                        'Demi', 'Dorothy'
                    ];
                    var badges = ['cna', 'lpn', 'rn'];
                    var images = ['men/95.jpg', 'women/38.jpg', 'men/36.jpg', 'men/87.jpg', 'men/98.jpg',
                        'men/83.jpg', 'men/92.jpg', 'men/40.jpg', 'men/75.jpg', 'women/91.jpg',
                        'women/80.jpg', 'men/66.jpg', 'women/74.jpg'
                    ];
                    var persons =
                        '<p class="">Please select the person to whom you want to assign shift(s).</p>';
                    for (let index = 1; index <= 8; index++) {
                        var img_url = 'https://randomuser.me/api/portraits/thumb/' + images[Math.floor(Math
                            .random() * images.length)];
                        var bdg = badges[Math.floor(Math.random() * badges.length)];
                        persons += '<label for="shift' + index +
                            '" class="d-flex align-items-center my-3"><div class="col-1 me-4"><div class="form-check mb-0"><input class="form-check-input form-check-input-lg border-secondary" type="checkbox" value="" id="shift' +
                            index +
                            '" wtx-context="D37F0D90-DC2A-4AFB-8601-822288695B9F"></div></div><div class="col-7"><div class="d-flex align-items-center"><img src="' +
                            img_url +
                            '" alt="profile" class="object-fit-cover rounded-circle border-light" width="40" height="40" style="outline: 1px solid #ccc"><p class="text-dark fw-500 ms-3">' +
                            names[Math.floor(Math.random() * names.length)] +
                            '</p></div></div><div class="col-3 ms-3"><span class="badge custom-badge-' + bdg +
                            ' w-fit-content h-fit-content py-2 text-uppercase">' + bdg +
                            '</span></div></label>';
                    }
                    $('.swal2-html-container').addClass('text-start').append(persons);
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    successfully_posted_shift();
                } else {
                    Swal.close();
                }
            });
        }
        $('body').on('click', '.delete_shifts', function(params) {
            delete_shifts();
        });

        function delete_shifts() {
            swalWithBootstrapButtons.fire({
                title: 'Confirmation',
                showClass: {
                    popup: 'animate__animated animate__bounceInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__bounceOutUp'
                },
                showCancelButton: true,
                confirmButtonText: yes,
                cancelButtonText: no,
                showLoaderOnConfirm: true,
                didOpen: function() {
                    $('.swal2-container .swal2-popup').append(
                        '<span class="custom-sweetalert-border-top"></span>');
                    $('.swal2-title').addClass('text-danger fw-semibold').parent().prepend(
                        '<small class="text-primary text-uppercase text-center mt-5">Schedule</small>'
                    );
                    $('.swal2-html-container').show().addClass('mb-5').append(
                        '<span> Do you really want to <strong>Delete</strong> shift(s)? </span>'
                    );
                    $('.swal2-confirm.btn-secondary').removeClass('btn-secondary').addClass(
                        'btn-danger');
                    $('.swal2-cancel.btn-muted').removeClass('btn-muted').addClass(
                        'btn-secondary');
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    shift_deleted();
                } else {
                    Swal.close();
                }
            });
        }

        function shift_deleted() {
            swalWithBootstrapButtons.fire({
                title: 'Shift Deleted',
                showClass: {
                    popup: 'animate__animated animate__bounceInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__bounceOutUp'
                },
                showCancelButton: true,
                cancelButtonText: 'Close',
                showConfirmButton: false,
                confirmButtonText: '',
                showLoaderOnConfirm: false,
                didOpen: function() {
                    $('.swal2-container .swal2-popup').append(
                        '<span class="custom-sweetalert-border-top"></span>');
                    $('.swal2-title').addClass('text-danger fw-semibold').parent().prepend(
                        '<small class="text-primary text-uppercase text-center mt-5">Schedule</small>'
                    );
                    $('.swal2-html-container').show().addClass('mb-5').append(
                        '<span class="fs-7"> by <strong>Joel Newman</strong> (Instacare) </span>'
                    );
                    $('.swal2-cancel.btn-muted').removeClass('btn-muted').addClass('btn-secondary');
                }
            }).then((result) => {
                if (result.isConfirmed) {} else {
                    Swal.close();
                }
            });
        }
    </script>
@endsection

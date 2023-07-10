@extends('admin.theme.default')
@section('title')
    Dashboard
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
        </div>
        <div class="row row-cols-md-5">
            <div class="col mb-5">
                <div class="overview-stats bg-white position-relative">
                    <div class="overview-stats-inner">
                        <h2 class="text-highlight ps-5 pt-5 fw-bold">42</h2>
                    </div>
                    <div class="pt-20 pb-5 px-5">
                        <div class="d-flex align-items-center justify-content-between mt-5">
                            <p class="fw-semibold fs-5">Marketplace</p>
                            <i class="fa-regular fa-arrow-right fa-xl text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <div class="overview-stats bg-white position-relative">
                    <div class="overview-stats-inner">
                        <h2 class="text-highlight ps-5 pt-5 fw-bold"><i class="fa-regular fa-calendar-circle-user"></i></h2>
                    </div>
                    <div class="pt-20 pb-5 px-5">
                        <div class="d-flex align-items-center justify-content-between mt-5">
                            <p class="fw-semibold fs-5">My Account</p>
                            <i class="fa-regular fa-arrow-right fa-xl text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <div class="overview-stats bg-white position-relative">
                    <div class="overview-stats-inner">
                        <h2 class="text-highlight ps-5 pt-5 fw-bold"><i class="fa-regular fa-gear"></i></h2>
                    </div>
                    <div class="pt-20 pb-5 px-5">
                        <div class="d-flex align-items-center justify-content-between mt-5">
                            <p class="fw-semibold fs-5">My Availability</p>
                            <i class="fa-regular fa-arrow-right fa-xl text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <div class="overview-stats bg-white position-relative">
                    <div class="overview-stats-inner">
                        <h2 class="text-highlight ps-5 pt-5 fw-bold"><i class="fa-regular fa-file-invoice-dollar"></i></h2>
                    </div>
                    <div class="pt-20 pb-5 px-5">
                        <div class="d-flex align-items-center justify-content-between mt-5">
                            <p class="fw-semibold fs-5">Payroll</p>
                            <i class="fa-regular fa-arrow-right fa-xl text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card bg-white border-0 mb-3 h-100">
                    <div class="card-body px-0">
                        <h5 class="fw-semibold mb-4 px-4">Upcoming Shifts</h5>
                        <div class="d-flex align-items-center bg-body px-4 py-3">
                            <div class="col-lg-5">
                                <div class="d-flex align-items-center cursor-pointer" onclick="shift_details()">
                                    <div class="col-auto me-4">
                                        <img src="https://media.istockphoto.com/id/1308571236/photo/medical-concept-of-beautiful-female-doctor-with-stethoscope-waist-up-medical-student-woman.jpg?s=612x612&amp;w=0&amp;k=20&amp;c=bHGISU0YBMsNPG1sSbJ7Q9eVC6I3tK4lmCzfOAY_dRM="
                                            alt="profile" class="object-fit-cover rounded-circle border-light"
                                            width="40" height="40" style="outline: 3px solid #ccc">
                                    </div>
                                    <div class="col-auto me-3">
                                        <p class="fw-bold">Elevate Care North Branch</p>
                                        <p class="fs-8">Tuesday, 21 March 2023</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="d-flex align-items-center">
                                    <p class="text-secondary"><i class="fa-solid fa-clock me-2"></i>Clock In 10 Minutes</p>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="d-flex align-items-center">
                                    <span class="badge text-bg-success fs-7 cursor-pointer" onclick="start_shift()">
                                        <i class="fa-regular fa-clock-nine me-2"></i>Clock In
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center bg-white px-4 py-3">
                            <div class="col-lg-5">
                                <div class="d-flex align-items-center cursor-pointer" onclick="shift_details()">
                                    <div class="col-auto me-4">
                                        <img src="https://media.istockphoto.com/id/1308571236/photo/medical-concept-of-beautiful-female-doctor-with-stethoscope-waist-up-medical-student-woman.jpg?s=612x612&amp;w=0&amp;k=20&amp;c=bHGISU0YBMsNPG1sSbJ7Q9eVC6I3tK4lmCzfOAY_dRM="
                                            alt="profile" class="object-fit-cover rounded-circle border-light"
                                            width="40" height="40" style="outline: 3px solid #ccc">
                                    </div>
                                    <div class="col-auto me-3">
                                        <p class="fw-bold">Elevate Care North Branch</p>
                                        <p class="fs-8">Tuesday, 21 March 2023</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="d-flex align-items-center">
                                    <p class="text-success"><i class="fa-solid fa-clock me-2"></i>Shifts in Process</p>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="d-flex align-items-center">
                                    <span class="badge text-bg-danger fs-7 cursor-pointer" onclick="end_shift()">
                                        <i class="fa-regular fa-clock-nine me-2"></i>Clock Out
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center bg-body px-4 py-3">
                            <div class="col-lg-5">
                                <div class="d-flex align-items-center cursor-pointer" onclick="shift_details()">
                                    <div class="col-auto me-4">
                                        <img src="https://media.istockphoto.com/id/1308571236/photo/medical-concept-of-beautiful-female-doctor-with-stethoscope-waist-up-medical-student-woman.jpg?s=612x612&amp;w=0&amp;k=20&amp;c=bHGISU0YBMsNPG1sSbJ7Q9eVC6I3tK4lmCzfOAY_dRM="
                                            alt="profile" class="object-fit-cover rounded-circle border-light"
                                            width="40" height="40" style="outline: 3px solid #ccc">
                                    </div>
                                    <div class="col-auto me-3">
                                        <p class="fw-bold">Elevate Care North Branch</p>
                                        <p class="fs-8">Tuesday, 21 March 2023</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="d-flex align-items-center">
                                    <p class="text-secondary"><i class="fa-solid fa-clock me-2"></i>Clock In 10 Minutes
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="d-flex align-items-center">
                                    <span class="badge text-bg-success fs-7 cursor-pointer" onclick="start_shift()">
                                        <i class="fa-regular fa-clock-nine me-2"></i>Clock In
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center bg-white px-4 py-3">
                            <div class="col-lg-5">
                                <div class="d-flex align-items-center cursor-pointer" onclick="shift_details()">
                                    <div class="col-auto me-4">
                                        <img src="https://media.istockphoto.com/id/1308571236/photo/medical-concept-of-beautiful-female-doctor-with-stethoscope-waist-up-medical-student-woman.jpg?s=612x612&amp;w=0&amp;k=20&amp;c=bHGISU0YBMsNPG1sSbJ7Q9eVC6I3tK4lmCzfOAY_dRM="
                                            alt="profile" class="object-fit-cover rounded-circle border-light"
                                            width="40" height="40" style="outline: 3px solid #ccc">
                                    </div>
                                    <div class="col-auto me-3">
                                        <p class="fw-bold">Elevate Care North Branch</p>
                                        <p class="fs-8">Tuesday, 21 March 2023</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="d-flex align-items-center">
                                    <p class="text-success"><i class="fa-solid fa-clock me-2"></i>Shifts in Process</p>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="d-flex align-items-center">
                                    <span class="badge text-bg-danger fs-7 cursor-pointer" onclick="end_shift()">
                                        <i class="fa-regular fa-clock-nine me-2"></i>Clock Out
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card bg-white border-0 h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h5 class="fw-semibold">Instacare Bulletin</h5>
                            <a href="{{ URL::to('bulletin') }}" class="text-primary fw-semibold">View All</a>
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
        </div>
        <!-- End::Content -->
    </div>
@endsection

@section('script')
    <script>
        function start_shift() {
            "use strict";
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
                    $('.swal2-title').addClass('text-dark fw-semibold').parent().prepend(
                        '<small class="text-primary text-uppercase text-center mt-5">shift information</small>'
                    );
                    $('.swal2-html-container').show().addClass('mb-5').append(
                        '<span>Do you really want to <strong>Clock In</strong> shift?</span>');
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    successfully_posted_shift();
                } else {
                    Swal.close();
                }
            });
        }

        function shift_details() {
            "use strict";
            swalWithBootstrapButtons.fire({
                showClass: {
                    popup: 'animate__animated animate__bounceInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__bounceOutUp'
                },
                showCancelButton: true,
                confirmButtonText: 'CLOCK OUT',
                cancelButtonText: 'CANCEL SHIFT',
                showLoaderOnConfirm: true,
                didOpen: function() {
                    $('.swal2-container .swal2-popup').append(
                        '<span class="swal2-bgpopup"></span><span class="custom-sweetalert-border-top"></span>'
                    );
                    $('.swal2-title').addClass('text-danger fw-semibold').parent().prepend(
                        '<p class="text-success text-center mt-5"><i class="fa-solid fa-clock me-2"></i>Shift in Progess</p>'
                    );
                    $('.swal2-html-container').show().addClass('mb-3').append(
                        '<div class="d-flex gap-5 mb-13"><div class="col-auto"><img src="https://cdn.britannica.com/12/130512-004-AD0A7CA4/campus-Riverside-Ottawa-The-Hospital-Ont.jpg" class="object-fit-cover rounded" width="80" height="80" /></div><div class="col-auto"><p class="text-white mb-2">Elevate Care North Branch</p><p class="text-white mb-3 opacity-25 text-start">Tuesday, 21 March 2023</p><div class="d-flex align-items-center px-1 gap-3"><p><i class="fa-solid fa-flag-pennant text-highlight"></i> <small class="text-white">Incentive</small></p><p><i class="fa-solid fa-shield-check text-success"></i> <small class="text-white">Guarantee</small></p></div></div></div><div class="card bg-body rounded-20 mb-3"><div class="card-body"><div class="d-flex align-items-center justify-content-between text-dark fw-semibold mb-4"><p>Clock-In</p><p>7:00 AM</p></div><div class="d-flex align-items-center justify-content-between text-dark fw-semibold"><p>Clock-Out</p><p class="text-muted">--:-- PM</p></div></div></div><div class="card bg-body rounded-20"><div class="card-body"><div class="d-flex align-items-center justify-content-between text-dark fw-semibold mb-4"><p>Rate (per hour)</p><p>$45.00</p></div><div class="d-flex align-items-center justify-content-between text-dark fw-semibold"><p>Incentive Amount (per hour)</p><p>$5.00</p></div></div></div>'
                    );
                    $('.swal2-confirm').removeClass('btn-secondary').addClass('btn-danger');
                    $('.swal2-cancel').removeClass('btn-muted').addClass('btn-outline-danger');
                    $('.swal2-footer').show().addClass('border-0').append(
                        '<div class="d-flex align-items-center justify-content-evenly text-primary fw-semibold"><p class="cursor-pointer">Message</p><p class="cursor-pointer" onclick="arrive_late()">Arrive Late</p><p class="cursor-pointer">Report an Issue</p></div>'
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

        function arrive_late() {
            "use strict";
            swalWithBootstrapButtons.fire({
                title: 'Why Late?',
                text: 'Why you late for your shift?',
                showClass: {
                    popup: 'animate__animated animate__bounceInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__bounceOutUp'
                },
                showCancelButton: true,
                confirmButtonText: submit,
                cancelButtonText: 'GO BACK',
                showLoaderOnConfirm: true,
                didOpen: function() {
                    $('.swal2-container .swal2-popup').append(
                        '<span class="custom-sweetalert-border-top"></span>');
                    $('.swal2-title').addClass('text-danger fw-semibold').parent().prepend(
                        '<small class="text-primary text-uppercase text-center mt-5">shift information</small>'
                    );
                    $('.swal2-html-container').append(
                        '<div class="form-group mt-5"><select name="" id="" class="form-select rounded-pill border border-secondary"><option value="" selected>An estimited time of how long</option></select></div><div class="form-group mb-0"><textarea name="" id="" rows="4" class="form-control" placeholder="Please provide the reason"></textarea></div>'
                    );
                    $('.swal2-confirm').removeClass('btn-secondary').addClass('btn-danger');
                    $('.swal2-cancel').removeClass('btn-muted').addClass('btn-secondary');
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
    <script>
        var hasDrawn = false;

        function end_shift() {
            "use strict";
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
                cancelButtonText: 'NO, GO BACK',
                didOpen: function() {
                    $('.swal2-container .swal2-popup').append(
                        '<span class="custom-sweetalert-border-top"></span>');
                    $('.swal2-title').addClass('text-danger fw-semibold').parent().prepend(
                        '<small class="text-primary text-uppercase text-center mt-5">shift information</small>'
                    );
                    $('.swal2-html-container').show().addClass('mb-3').append(
                        '<span> Do you really want to <strong>Clock Out</strong> shift?</span>');
                    $('.swal2-html-container').append(
                        '<canvas id="signaturecanvas" class="border border-secondary my-3 w-100" height="100" style="border-radius: 30px;cursor: crosshair;"></canvas>' +
                        '<p class="text-muted fs-8">Signature before Clock Out</p>'
                    );
                    $('.swal2-confirm').removeClass('btn-secondary').addClass('btn-danger');
                    $('.swal2-cancel').removeClass('btn-muted').addClass('btn-secondary sig-clearBtn');
                    $('.swal2-actions').addClass('mt-0');
                    hasDrawn = false;
                    signaturecanvas()
                },
                showLoaderOnConfirm: !0,
                preConfirm: function() {
                    return new Promise(function(o, n) {
                        var canvas = document.getElementById('signaturecanvas');
                        if (!hasDrawn) {
                            Swal.disableLoading();
                            $('#signaturecanvas').removeClass('border-secondary').addClass(
                                'border-danger');
                            return false;
                            console.log("The canvas is empty.");
                        } else {
                            console.log("The canvas is not empty.");
                            $('#signaturecanvas').removeClass('border-danger').addClass(
                                'border-secondary');
                        }
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: "{{ URL::to('/set-signature') }}",
                            data: {
                                base64String: canvas.toDataURL('image/png')
                            },
                            type: "POST",
                            success: function(t) {
                                Swal.disableLoading();
                                if (t.status == 1) {
                                    Swal.close();
                                    showtoast(1, t.message);
                                } else {
                                    showtoast(1, t.message);
                                }
                            },
                            error: function(t) {
                                showtoast(2, 'Something went wrong!!');
                                Swal.disableLoading();
                                return false;
                            }
                        })
                    })
                }
            }).then((result) => {
                if (result.isConfirmed) {

                } else {
                    Swal.close();
                }
            });
        }

        function signaturecanvas() {
            window.requestAnimFrame = window.requestAnimationFrame || window
                .webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window
                .oRequestAnimationFrame || window.msRequestAnimationFrame || function(callback) {
                    window.setTimeout(callback, 1000 / 60);
                };

            function getMousePos(canvasDom, mouseEvent) {
                var rect = canvasDom.getBoundingClientRect();
                return {
                    x: mouseEvent.clientX - rect.left,
                    y: mouseEvent.clientY - rect.top
                }
            }

            function getTouchPos(canvasDom, touchEvent) {
                var rect = canvasDom.getBoundingClientRect();
                return {
                    x: touchEvent.touches[0].clientX - rect.left,
                    y: touchEvent.touches[0].clientY - rect.top
                }
            }

            function renderCanvas() {
                if (drawing) {
                    ctx.moveTo(lastPos.x, lastPos.y);
                    ctx.lineTo(mousePos.x, mousePos.y);
                    ctx.stroke();
                    lastPos = mousePos;
                    hasDrawn = true;
                }
            }
            // function clearCanvas() {
            //     canvas.width = canvas.width;
            //     ctx.strokeStyle = "#C4C4C4";
            //     ctx.lineWidth = 2;
            // }
            var canvas = document.getElementById('signaturecanvas');
            var ctx = canvas.getContext("2d");
            ctx.strokeStyle = "#C4C4C4";
            ctx.lineWidth = 2;
            var drawing = false;
            var mousePos = {
                x: 0,
                y: 0
            };
            var lastPos = mousePos;
            canvas.addEventListener("mousedown", function(e) {
                drawing = true;
                lastPos = getMousePos(canvas, e);
            }, false);
            canvas.addEventListener("mouseup", function(e) {
                drawing = false;
            }, false);
            canvas.addEventListener("mousemove", function(e) {
                mousePos = getMousePos(canvas, e);
            }, false);
            canvas.addEventListener("touchstart", function(e) {
                // Touch event support for mobile
            }, false);
            canvas.addEventListener("touchmove", function(e) {
                var touch = e.touches[0];
                var me = new MouseEvent("mousemove", {
                    clientX: touch.clientX,
                    clientY: touch.clientY
                });
                canvas.dispatchEvent(me);
            }, false);
            canvas.addEventListener("touchstart", function(e) {
                mousePos = getTouchPos(canvas, e);
                var touch = e.touches[0];
                var me = new MouseEvent("mousedown", {
                    clientX: touch.clientX,
                    clientY: touch.clientY
                });
                canvas.dispatchEvent(me);
            }, false);
            canvas.addEventListener("touchend", function(e) {
                var me = new MouseEvent("mouseup", {});
                canvas.dispatchEvent(me);
            }, false);
            $(document.body).on('touchstart touchend touchmove', function(e) {
                if (e.target == canvas) {
                    e.preventDefault();
                }
            });
            (function drawLoop() {
                requestAnimFrame(drawLoop);
                renderCanvas();
            })();

            function clearCanvas() {
                ctx.clearRect(0, 0, canvas.width, canvas.height); // Clear the canvas
                ctx.strokeStyle = "#222222";
                ctx.lineWidth = 2;
                drawing = false;
                mousePos = {
                    x: 0,
                    y: 0
                };
                lastPos = mousePos;
            }

            clearCanvas();
            // $('.sig-clearBtn').click(function() {
            //     clearCanvas();
            // });
            // $('.sig-submitBtn').click(function() {
            //     console.log(canvas.toDataURL());
            // });
        }
    </script>
@endsection

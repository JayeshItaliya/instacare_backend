<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title') | Instacare</title>
    <link rel="icon" type="image/png" href="{{ Helper::image_path('') }}">
    <link rel="stylesheet" href="{{ asset('storage/app/public/assets/admin/css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/app/public/assets/admin/css/fontawesome/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/app/public/assets/admin/css/datepicker/datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/app/public/assets/admin/css/sweetalert/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/app/public/assets/admin/css/animate/animate.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('storage/app/public/assets/admin/css/bootstrap-table/bootstrap-table.min.css') }}">
    @yield('style')
    <link rel="stylesheet" href="{{ asset('storage/app/public/assets/admin/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/app/public/assets/admin/css/responsive.css') }}">
</head>

<body>
    <div id="preloader"
        class="position-absolute top-50 start-50 translate-middle h-100 w-100 d-flex justify-content-center align-items-center bg-white"
        style="z-index:9999">
        {{-- <div class="spinner-border text-primary"> <span class="sr-only">Loading...</span> </div> --}}
        <svg role="img"
            aria-label="Mouth and eyes come from 9:00 and rotate clockwise into position, right eye blinks, then all parts rotate and merge into 3:00"
            class="smiley" viewBox="0 0 128 128" width="128px" height="128px">
            <defs>
                <clipPath id="smiley-eyes">
                    <circle class="smiley__eye1" cx="64" cy="64" r="8"
                        transform="rotate(-40,64,64) translate(0,-56)" />
                    <circle class="smiley__eye2" cx="64" cy="64" r="8"
                        transform="rotate(40,64,64) translate(0,-56)" />
                </clipPath>
                <linearGradient id="smiley-grad" x1="0" y1="0" x2="0" y2="1">
                    <stop offset="0%" stop-color="#000" />
                    <stop offset="100%" stop-color="#fff" />
                </linearGradient>
                <mask id="smiley-mask">
                    <rect x="0" y="0" width="128" height="128" fill="url(#smiley-grad)" />
                </mask>
            </defs>
            <g stroke-linecap="round" stroke-width="12" stroke-dasharray="175.93 351.86">
                <g>
                    <rect fill="hsl(193,90%,50%)" width="128" height="64" clip-path="url(#smiley-eyes)" />
                    <g fill="none" stroke="hsl(193,90%,50%)">
                        <circle class="smiley__mouth1" cx="64" cy="64" r="56"
                            transform="rotate(180,64,64)" />
                        <circle class="smiley__mouth2" cx="64" cy="64" r="56"
                            transform="rotate(0,64,64)" />
                    </g>
                </g>
                <g mask="url(#smiley-mask)">
                    <rect fill="hsl(223,90%,50%)" width="128" height="64" clip-path="url(#smiley-eyes)" />
                    <g fill="none" stroke="hsl(223,90%,50%)">
                        <circle class="smiley__mouth1" cx="64" cy="64" r="56"
                            transform="rotate(180,64,64)" />
                        <circle class="smiley__mouth2" cx="64" cy="64" r="56"
                            transform="rotate(0,64,64)" />
                    </g>
                </g>
            </g>
        </svg>
    </div>




    <!-- Begin::Main -->
    <!-- Begin::Root -->
    <section class="d-flex flex column flex-root">
        <!-- Begin::Page -->
        <div class="page d-flex flex-row flex-column-fluid">
            <!-- Begin::Aside -->
            @include('admin.theme.sidebar')
            <!-- End::Aside -->
            <!-- Begin::Wrapper -->
            <div class="wrapper d-flex flex-column flex-row-fluid">
                <!-- Begin::Header -->
                @include('admin.theme.header')
                <!-- End::Header -->
                <!-- Begin::Content -->
                @yield('content')
                <!-- End::Content -->
            </div>
            <!-- Begin:Toastr -->
            <div class="toast align-items-center bg-white position-fixed rounded border-0 mytoastr" role="alert"
                aria-live="assertive" aria-atomic="true" style="z-index: 99999999 !important">
                <div class="toast-body"></div>
                <button type="button" class="btn-close me-2 m-auto d-none" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
            <!-- End:Toastr -->
            <!-- End::Wrapper -->
        </div>
        <!-- End::Page -->
    </section>
    <!-- End::Root -->
    <!-- End::Main -->

    <script src="{{ asset('storage/app/public/assets/admin/js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('storage/app/public/assets/admin/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('storage/app/public/assets/admin/js/datepicker/datepicker.js') }}"></script>
    <script src="{{ asset('storage/app/public/assets/admin/js/sweetalert/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('storage/app/public/assets/admin/js/fullcalendar/index.global.min.js') }}"></script>
    <script src="{{ asset('storage/app/public/assets/admin/js/bootstrap-table/bootstrap-table.min.js') }}"></script>
    <script>
        let are_you_sure = 'Are you sure?';
        let yes = 'YES';
        let no = 'NO';
        let close = 'CLOSE';
        let add = 'ADD';
        let cancel = 'CANCEL';
        let submit = 'SUBMIT';
        let wrong = 'Something went wrong!';
        let oops = 'Oops!!';
        let no_data = '<p class="text-muted text-center my-5">No Data Found</p>';
        let my_spinner = '<div class="d-flex justify-content-center"><div class="spinner-border spinner-border-sm" role="status"></div></div>';

        // Sweetalert Bootstrap Button
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-secondary  me-5',
                cancelButton: 'btn btn-muted '
            },
            buttonsStyling: false
        })
    </script>
    <script src="{{ asset('storage/app/public/assets/admin/js/custom.js') }}"></script>
    <script>
        @if (Session::has('success'))
            showtoast(1, "{{ session('success') }}");
        @endif
        @if (Session::has('error'))
            showtoast(2, "{{ session('error') }}");
        @endif
    </script>
    @yield('script')
</body>

</html>

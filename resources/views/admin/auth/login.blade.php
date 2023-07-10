<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Instacare</title>
    <link rel="stylesheet" href="{{ asset('storage/app/public/assets/admin/css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/app/public/assets/admin/css/fontawesome/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/app/public/assets/admin/css/datepicker/datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/app/public/assets/admin/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/app/public/assets/admin/css/responsive.css') }}">
</head>

<body>
    <!-- Begin::Main -->
    <!-- Begin::Root -->
    <div class="auth_form_container bg-white">
        <div class="row w-100">
            <div class="col-md-6 my-auto">
                <div class="d-grid justify-content-center align-content-center">
                    <a href="javascript:void(0)" class="mb-10">
                        <img src="{{ Helper::image_path('logo.svg') }}" alt="Logo">
                    </a>
                    <form method="POST" action="{{ URL::to('login') }}" class="needs-validation" novalidate
                        autocomplete="off">
                        @csrf
                        <h4 class="fw-semibold mb-5">Welcome Back!</h4>
                        <div class="form-group">
                            <label for="email" class="form-label text-muted">Email Address</label>
                            <input type="text" name="email" id="email" class="form-control rounded-pill"
                                placeholder="Enter emaill address" value="{{ old('email') }}" autocomplete="off"
                                required>
                            @error('email')
                                <span class="text-danger fs-9">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label text-muted">Password</label>
                            <div class="position-relative">
                                <input type="password" name="password" id="password" class="form-control rounded-pill"
                                    placeholder="Enter Password" autocomplete="off" required>
                                <span class="cursor-pointer"><i class="fa-regular fa-eye"></i></span>
                            </div>
                            @error('password')
                                <span class="text-danger fs-9">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="remember_me" checked>
                            <label class="form-check-label" for="remember_me">Remember Me</label>
                        </div>
                        <button type="submit" class="btn btn-secondary w-100 mb-5">Login Now</button>
                        <div class="d-grid align-items-center justify-content-center">
                            <a href="{{ URL::to('password/reset') }}" class="text-center fs-8 mb-20">Forgot
                                Password?</a>
                            <a href="javascript:void(0)" class="btn btn-light border px-4 fw-500">
                                <i class="fa-light fa-user-group me-3 position-relative">
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle p-1 bg-success rounded-circle ms-1"></span>
                                </i>
                                <small>Today 20 members online</small>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 h-100vh" style="background: #F3FAFD">
                <div class="d-flex justify-content-center align-items-center h-100">
                    <img src="{{ asset('storage/app/public/assets/admin/images/auth/auth_img.png') }}" alt="auth_image"
                        height="800">
                </div>
            </div>
        </div>
    </div>
    <!-- End::Root -->
    <!-- Begin:Toastr -->
    <div class="toast align-items-center bg-white position-fixed rounded border-0 mytoastr" role="alert" aria-live="assertive" aria-atomic="true" style="z-index: 99999999 !important">
        <div class="toast-body"></div>
        <button type="button" class="btn-close me-2 m-auto d-none" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <!-- End:Toastr -->
    <!-- End::Main -->

    <script src="{{ asset('storage/app/public/assets/admin/js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('storage/app/public/assets/admin/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('storage/app/public/assets/admin/js/datepicker/datepicker.js') }}"></script>
    <script src="{{ asset('storage/app/public/assets/admin/js/custom.js') }}"></script>
    <script>
        // Input type password hide/show
        $('.fa-eye').click(function() {
            if ($(this).hasClass('fa-eye')) {
                $(this).removeClass('fa-eye').addClass('fa-eye-slash');
                $('#password').attr('type', 'text');
            } else {
                $(this).removeClass('fa-eye-slash').addClass('fa-eye');
                $('#password').attr('type', 'password');
            }
        });

        @if (Session::has('success'))
            showtoast(1, "{{ session('success') }}");
        @endif
        @if (Session::has('error'))
            showtoast(2, "{{ session('error') }}");
        @endif
    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password | Instacare</title>
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
                    <form method="POST" action="{{ URL::to('password/email') }}" class="needs-validation" novalidate
                        autocomplete="off">
                        @csrf
                        <h4 class="fw-semibold mb-5">Reset Password</h4>
                        <div class="form-group">
                            <label for="email" class="form-label text-muted">Enter your registered email address to
                                get password reset link.</label>
                            <input type="email" name="email" id="email" class="form-control rounded-pill"
                                placeholder="Enter your registered email address" value="{{ old('email') }}"
                                autocomplete="off" required>
                            @error('email')
                                <span class="text-danger fs-9">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-secondary w-100 mb-5">Continue</button>
                        <div class="d-grid align-items-center justify-content-center">
                            <a href="{{ URL::to('login') }}" class="text-center fs-8">Back to Login</a>
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

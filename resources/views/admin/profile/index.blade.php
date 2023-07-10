@extends('admin.theme.default')
@section('title')
    My Profile
@endsection
@section('style')
@endsection
@section('content')
    <div class="container-fluid content d-flex flex-column">
        <!-- Begin::Content -->
        <div class="d-flex align-items-center mb-3">
            <h3 class="fw-bold">My Profile</h3>
        </div>
        <div class="card bg-primary border-0 mb-3"  data-border-radius="30px">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-1 position-relative">
                        <img src="{{ auth()->user()->image_url }}" alt=""
                            class="rounded-circle border border-4 border-highlight" height="100" width="100">
                        <div class="position-absolute" style="bottom: 5px;right: 15px;">
                            <span
                                class="badge bg-highlight text-white rounded-circel d-flex justify-content-center align-items-center p-2"><i
                                    class="far fa-pen"></i></span>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <h5 class="text-white fw-bold">{{ auth()->user()->full_name }}</h5>
                        <p class="mb-3 text-secondary fw-semibold text-capitalize">{{ auth()->user()->role }}</p>
                        <div class="row">
                            <div class="col-auto">
                                <p class="text-secondary fw-semibold"><small class="fw-normal fs-9">Emp.ID</small>
                                    {{ auth()->user()->id }} </p>
                            </div>
                            <div class="col-auto">
                                <p class="text-secondary fw-regular">
                                    <span class="fw-normal">Status:</span>
                                    <i class="fa-solid fa-circle-small fs-9 text-success"></i>
                                    <span class="text-white"> Available <i class="fa-solid fa-chevron-down"></i> </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <a class="btn btn-secondary rounded-pill text-white text-uppercase py-3 px-5"
                            href="{{ URL::to('profile/' . auth()->user()->id.'/edit') }}"> Edit </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card bg-white border-0 mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 mb-5">
                        <h6 class="text-primary fw-bold">Account Information</h6>
                        <div class="row">
                            <div class="col-md-6 my-2">
                                <p>First Name</p>
                                <p class="fw-bold fs-6">{{ auth()->user()->fname }}</p>
                            </div>
                            <div class="col-md-6 my-2">
                                <p>Last name</p>
                                <p class="fw-bold fs-6">{{ auth()->user()->lname }}</p>
                            </div>
                            <div class="col-md-12 my-2">
                                <p>Email</p>
                                <p class="fw-bold fs-6">{{ auth()->user()->email }}</p>
                            </div>
                            <div class="col-md-12 my-2">
                                <p>Phone</p>
                                <p class="fw-bold fs-6">{{ auth()->user()->phone }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-5">
                        <h6 class="text-primary fw-bold">Address</h6>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-md-12 my-2">
                                        <p>Country</p>
                                        <p class="fw-bold fs-6">{{ auth()->user()->country }}</p>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <p>State</p>
                                        <p class="fw-bold fs-6">{{ auth()->user()->state }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-md-12 my-2">
                                        <p>City</p>
                                        <p class="fw-bold fs-6">{{ auth()->user()->city }}</p>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <p>Zip</p>
                                        <p class="fw-bold fs-6">{{ auth()->user()->zipcode }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-5">
                        <h6 class="text-primary fw-bold">General</h6>
                        <div class="row">
                            <div class="col-md-12 my-2">
                                <p>Timezone</p>
                                <p class="fw-bold fs-6">{{ auth()->user()->timezone }}</p>
                            </div>
                            <div class="col-md-12 my-2">
                                <p>Language</p>
                                <p class="fw-bold fs-6">{{ auth()->user()->language }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-5">
                        <h6 class="text-primary fw-bold">Security</h6>
                        <div class="row align-items-center">
                            <div class="col-lg-6 my-2">
                                <p>Account Password</p>
                                <p class="fw-bold fs-6">*****************</p>
                            </div>
                            <div class="col-lg-6 my-2">
                                <button type="button" class="btn btn-secondary rounded-pill py-2 text-uppercase fs-8 px-5"
                                    data-bs-toggle="modal" data-bs-target="#changepassmodal">Change password</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="changepassmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="width:430px;" data-border-radius="20px">
                    <div class="modal-header">
                        <span class="custom-sweetalert-border-top"></span>
                        <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Change Password</h1>
                        <button type="button" class="btn-close fw-bold fs-8" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form class="needs-validation" novalidate action="{{ route('password.update') }}" method="post"
                        id="changepasswordform">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="password" class="form-control rounded-pill" name="current_password" id="current_password" placeholder="Old Password" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="password" class="form-control rounded-pill" name="new_password" id="new_password" placeholder="New Password" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="password" class="form-control rounded-pill" name="confirm_password" id="confirm_password" placeholder="Confirm New Password" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="submit" class="btn btn-secondary text-uppercase w-100">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End::Content -->
    </div>
@endsection
@section('script')
    <script>
        $('#changepassmodal').on('hidden.bs.modal', function() {
            "use strict";
            $('.err').remove();
            $('#changepasswordform')[0].reset();
            $('#changepasswordform').removeClass('was-validated');
        });
        $('#changepasswordform').submit(function(event) {
            "use strict";
            event.preventDefault();
            $('.err').remove();
            var formData = $(this).serialize();
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                beforeSend: function(response) {
                    showpreloader();
                },
                success: function(response) {
                    hidepreloader();
                    if (response.status == 0) {
                        if (response.errors && Object.keys(response.errors).length > 0) {
                            $.each(response.errors, function(key, value) {
                                $('#' + key).parent().append('<small class="err text-danger">' +
                                    value + '</small>')
                            });
                        } else {
                            showtoast(2, response.message)
                        }
                        return false;
                    } else {
                        $('#changepassmodal').modal('hide');
                        $('.err').remove();
                        $('#changepasswordform')[0].reset();
                        $('#changepasswordform').removeClass('was-validated');
                        showtoast(1, response.message)
                    }
                },
                error: function(xhr, status, error) {
                    hidepreloader();
                    showtoast(2, wrong)
                    return false;
                }
            });
        });
    </script>
@endsection

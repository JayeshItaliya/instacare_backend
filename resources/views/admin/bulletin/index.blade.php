@extends('admin.theme.default')
@section('title')
Bulletin
@endsection
@section('content')
    <div class="container-fluid content d-flex flex-column ">
        <!-- Begin::Content -->
        <div class="row align-items-center justify-content-between mb-3">
            <div class="col-auto">
                <h3 class="fw-bold">Instacare Bulletin</h3>
            </div>
        </div>
        <div class="row">
            @for ($i = 0; $i < 8; $i++)
            <div class="col-md-6">
                <div class="card bg-white mb-5" data-border-radius="20px">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between mb-3">
                            <h6 class="text-primary fw-bold">Print office #1 out of action</h6>
                            <small>March 8, 2023 11:45AM</small>
                        </div>
                        <p class="text-muted fs-7 mb-3">Hi all, <br>Just a quick note that print
                            office number one is currently out of action. Please use the print
                            office at location #2.</p>
                        <p>Rossy Clantoriya</p>
                    </div>
                </div>
            </div>
            @endfor
        </div>
        <!-- End::Content -->
    </div>
@endsection

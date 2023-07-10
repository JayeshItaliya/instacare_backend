@extends('admin.theme.default')
@section('title')
    Payroll
@endsection
@section('content')
    <div class="container-fluid content d-flex flex-column ">
        <!-- Begin::Content -->

        <div class="row align-items-center justify-content-between mb-3">
            <div class="col-auto">
                <h3 class="fw-bold">Payroll</h3>
            </div>
            <div class="col-auto"></div>
        </div>

        <div class="card bg-white border-0 mb-3">
            <div class="card-body">
                <div class="alert alert-warning">
                    To access to your payroll please click on the below link <a href="javascript:;" class="ms-4 fw-bold text-primary">Login to ADP</a>
                </div>
                <form action="#" method="post">
                    <label for="" class="form-label fw-semibold text-dark fs-6 ps-3"> Payroll Cycle </label>
                    <div class="d-flex align-items-center ps-3">
                        <div class="form-check d-flex align-items-center me-7">
                            <input class="form-check-input hw-1-5-em cursor-pointer" type="radio" name="cancellation_guarantee" id="weekly" checked="">
                            <label class="form-check-label ps-3 text-muted" for="weekly"> Weekly </label>
                        </div>
                        <div class="form-check d-flex align-items-center">
                            <input class="form-check-input hw-1-5-em cursor-pointer" type="radio" name="cancellation_guarantee" id="daily">
                            <label class="form-check-label ps-3 text-muted" for="daily"> Daily </label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End::Content -->
    </div>
@endsection

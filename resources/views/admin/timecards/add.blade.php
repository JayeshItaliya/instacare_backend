@extends('admin.theme.default')
@section('title') Add Timecard @endsection
@section('content')
    <div class="container-fluid content d-flex flex-column ">
        <!-- Begin::Content -->
        <h3 class="fw-bold mb-3">Add Timecard</h3>
        <div class="card bg-white border-0">
            <div class="card-body">
                <div class="row row-cols-md-4">
                    <div class="form-group col">
                        <label for="facility" class="form-label text-dark fw-bold ps-3">Facility</label>
                        <select name="facility" id="facility" class="form-select rounded-pill">
                            <option value="" selected="" disabled="">Select Facility</option>
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="role" class="form-label text-dark fw-bold ps-3">Role</label>
                        <select name="role" id="role" class="form-select rounded-pill">
                            <option value="" selected="" disabled="">Select Role</option>
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="employee" class="form-label text-dark fw-bold ps-3">Employee</label>
                        <select name="employee" id="employee" class="form-select rounded-pill">
                            <option value="" selected="" disabled=""></option>
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="accepted_shifts" class="form-label text-dark fw-bold ps-3">Accepted Shifts</label>
                        <select name="accepted_shifts" id="accepted_shifts" class="form-select rounded-pill">
                            <option value="" selected="">12 March, 2023  7:00AM - 3:00PM</option>
                            <option value="">13 March, 2023  7:00AM - 3:00PM</option>
                            <option value="">14 March, 2023  7:00AM - 3:00PM</option>
                            <option value="">15 March, 2023  7:00AM - 3:00PM</option>
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="address" class="form-label text-dark fw-bold ps-3">Address</label>
                        <select name="address" id="address" class="form-select rounded-pill">
                            <option value="" selected="" disabled=""></option>
                        </select>
                    </div>
                </div>
                <div class="row row-cols-md-6">
                    <div class="form-group col">
                        <label for="start_time" class="form-label text-dark fw-bold ps-3">Start time</label>
                        <select name="start_time" id="start_time" class="form-select rounded-pill">
                            <option value="" selected="" disabled=""></option>
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="end_time" class="form-label text-dark fw-bold ps-3">End time</label>
                        <select name="end_time" id="end_time" class="form-select rounded-pill">
                            <option value="" selected="" disabled=""></option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="notes" class="form-label text-dark fw-bold ps-3">Notes</label>
                    <textarea name="notes" id="notes" class="form-control" rows="5"></textarea>
                </div>
                <button class="btn btn-secondary me-3">save</button>
                <button class="btn btn-muted">cancel</button>
            </div>
            <!-- End::Content -->
        </div>
    @endsection

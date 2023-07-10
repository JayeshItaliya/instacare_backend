@extends('admin.theme.default')
@section('title')
    Add Shifts
@endsection
@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection
@section('content')
    <div class="container-fluid content d-flex flex-column ">
        <!-- Begin::Content -->
        <div class="d-flex align-items-center mb-3">
            <a href="{{ route('shifts.index') }}" class="btn bg-white text-secondary rounded-circle me-3"><i
                    class="fa-regular fa-chevron-left"></i></a>
            <h3 class="fw-bold">Add Shifts</h3>
        </div>
        <div class="card bg-white border-0 mb-3">
            <div class="card-body pb-0">
                <div class="nav nav-underline" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link fw-bold text-muted me-5 active" id="v-pills-single-shift-tab" data-bs-toggle="pill"
                        href="#v-pills-single-shift" role="tab" aria-controls="v-pills-single-shift"
                        aria-selected="true">Single Shift</a>
                    <a class="nav-link fw-bold text-muted me-5" id="v-pills-recurring-shifts-tab" data-bs-toggle="pill"
                        href="#v-pills-recurring-shifts" role="tab" aria-controls="v-pills-recurring-shifts"
                        aria-selected="true">Recurring Shifts</a>
                    <a class="nav-link fw-bold text-muted me-5" id="v-pills-bulk-upload-tab" data-bs-toggle="pill"
                        href="#v-pills-bulk-upload" role="tab" aria-controls="v-pills-bulk-upload"
                        aria-selected="true">Bulk Upload</a>
                    <a class="nav-link fw-bold text-muted me-5" id="v-pills-bulk-shifts-tab" data-bs-toggle="pill"
                        href="#v-pills-bulk-shifts" role="tab" aria-controls="v-pills-bulk-shifts"
                        aria-selected="true">Bulk Shifts</a>
                </div>
            </div>
        </div>
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-single-shift" role="tabpanel"
                aria-labelledby="v-pills-single-shift-tab">
                <div class="card bg-white border-0 mb-3">
                    <div class="card-body">
                        <form class="needs-validation" novalidate action="{{ route('shifts.store') }}" method="post"
                            autocomplete="off" id="singleshiftform">
                            @csrf
                            <div class="row row-cols-lg-4 row-cols-md-3 mb-3">
                                <div class="col form-group">
                                    <label for="facility"
                                        class="form-label fw-semibold text-dark fs-6 ps-3">Facility</label>
                                    <select name="facility" id="facility" class="form-select rounded-pill"
                                        data-supervisors="{{ URL::to('supervisors') }}" data-fid="singleshiftform">
                                        <option value="" selected disabled>Select Facility</option>
                                        @foreach ($facilities as $facility)
                                            <option value="{{ $facility->id }}" data-floor="{{ $facility->address }}">
                                                {{ $facility->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col form-group">
                                    <label for="role" class="form-label fw-semibold text-dark fs-6 ps-3">Role</label>
                                    <select name="role" id="role" class="form-select rounded-pill">
                                        <option value="" selected disabled>Select Role</option>
                                        <option value="cna">CNA</option>
                                        <option value="lpn">LPN</option>
                                        <option value="rn">RN</option>
                                    </select>
                                </div>
                                <div class="col form-group">
                                    <label for="number_of_positions"
                                        class="form-label fw-semibold text-dark fs-6 ps-3">Number of Positions</label>
                                    <input type="number" name="number_of_positions" id="number_of_positions"
                                        class="form-control rounded-pill" placeholder="Number of Positions">
                                </div>
                                <div class="col form-group">
                                    <label for="date" class="form-label fw-semibold text-dark fs-6 ps-3">Date</label>
                                    <input type="date" name="date" id="date" class="form-control rounded-pill">
                                </div>
                            </div>
                            <div class="row justify-content-between mb-3">
                                <div class="col-md-6">
                                    <label for="shift_time" class="form-label fw-semibold text-dark fs-6">Shift
                                        Time</label>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-check d-flex align-items-center">
                                                <input class="form-check-input single_shift_time" type="radio" name="shift_time" value="1" id="morning_shift" checked>
                                                <label class="form-check-label ps-3" for="morning_shift">Morning Shift: 7:00AM - 3:00PM</label>
                                            </div>
                                            <div class="form-check d-flex align-items-center">
                                                <input class="form-check-input single_shift_time" type="radio" name="shift_time" value="2" id="noon_shift">
                                                <label class="form-check-label ps-3" for="noon_shift">Noon Shift: 3:00PM - 11:00PM</label>
                                            </div>
                                            <div class="form-check d-flex align-items-center">
                                                <input class="form-check-input single_shift_time" type="radio" name="shift_time" value="3" id="night_shift">
                                                <label class="form-check-label ps-3" for="night_shift">Night Shift: 11:00PM - 7:00AM</label>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-check d-flex align-items-center">
                                                <input class="form-check-input single_shift_time" type="radio" name="shift_time" value="4" id="custom_shift">
                                                <label class="form-check-label ps-3" for="custom_shift">Custom</label>
                                            </div>
                                            <div class="row mb-5 shift-timing-section" style="display: none">
                                                <div class="col-md-6">
                                                    <label for="start_time" class="form-label fw-semibold text-dark fs-6 ps-3">Start Time</label>
                                                    <select name="start_time" id="start_time" class="form-select start-time" data-border-radius="15px">
                                                        <option value="" selected="" disabled=""> Select time </option>
                                                        @for ($i = 0; $i <= 24 * 2; $i++)
                                                            @php
                                                                $time = date('h:i A', strtotime(sprintf('%02d:%02d', (int) ($i / 2), ($i % 2) * 30)));
                                                            @endphp
                                                            @if ($i != 48)
                                                                <option value="{{ $time }}">{{ $time }} </option>
                                                            @endif
                                                        @endfor
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="end_time" class="form-label fw-semibold text-dark fs-6 ps-3">End Time</label>
                                                    <select name="end_time" id="start_time" class="form-select end-time" data-border-radius="15px">
                                                        <option value="" selected="" disabled=""> Select time </option>
                                                        @for ($i = 0; $i <= 24 * 2; $i++)
                                                            @php
                                                                $time = date('h:i A', strtotime(sprintf('%02d:%02d', (int) ($i / 2), ($i % 2) * 30)));
                                                            @endphp
                                                            @if ($i != 48)
                                                                <option value="{{ $time }}">{{ $time }} </option>
                                                            @endif
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3 mt-5">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="rate" class="form-label fw-semibold text-dark fs-6 ps-3">Rate (per hour)</label>
                                                    <input type="number" name="rate" id="rate" class="form-control rounded-pill text-dark fw-semibold" placeholder="00">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="floor_number" class="form-label fw-semibold text-dark fs-6 ps-3">Floor Number</label>
                                                    <input class="form-control rounded-pill floor_number" name="floor_number" id="floor_number" placeholder="Floor number" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="cancellation_guarantee" class="form-label fw-semibold text-dark fs-6 ps-3">Cancellation Guarantee</label>
                                                    <div class="d-flex align-items-center ps-3">
                                                        <div class="form-check d-flex align-items-center me-7">
                                                            <input class="form-check-input hw-1-5-em" type="radio" name="cancellation_guarantee" id="cancellation_guarantee1" checked="">
                                                            <label class="form-check-label ps-3 text-muted" for="cancellation_guarantee1"> Yes </label>
                                                        </div>
                                                        <div class="form-check d-flex align-items-center">
                                                            <input class="form-check-input hw-1-5-em" type="radio" name="cancellation_guarantee" id="cancellation_guarantee2">
                                                            <label class="form-check-label ps-3 text-muted" for="cancellation_guarantee2"> No </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="supervisor" class="form-label fw-semibold text-dark fs-6 ps-3">Supervisor</label>
                                                    <select name="supervisor" id="supervisor" class="form-select rounded-pill text-dark fw-semibold">
                                                        <option value="" selected> Select </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-5">
                                                <label for="incentives" class="form-label fw-semibold text-dark fs-6">Incentives</label>
                                                <div class="d-flex align-items-center">
                                                    <div class="form-check d-flex align-items-center me-7">
                                                        <input class="form-check-input hw-1-5-em" type="radio" name="incentives" id="incentives1" checked>
                                                        <label class="form-check-label ps-3 text-muted" for="incentives1"> Yes </label>
                                                    </div>
                                                    <div class="form-check d-flex align-items-center">
                                                        <input class="form-check-input hw-1-5-em" type="radio" name="incentives" id="incentives2">
                                                        <label class="form-check-label ps-3 text-muted" for="incentives2"> No </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-5">
                                                <label for="incentive_type" class="form-label fw-semibold text-dark fs-6">Incentive Type</label>
                                                <div class="d-flex align-items-center">
                                                    <div class="form-check d-flex align-items-center me-7">
                                                        <input class="form-check-input hw-1-5-em" type="radio" name="incentive_type" id="incentive_type1" checked>
                                                        <label class="form-check-label ps-3 text-muted" for="incentive_type1"> $/hr </label>
                                                    </div>
                                                    <div class="form-check d-flex align-items-center">
                                                        <input class="form-check-input hw-1-5-em" type="radio" name="incentive_type" id="incentive_type2">
                                                        <label class="form-check-label ps-3 text-muted" for="incentive_type2"> Fixed </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-5">
                                                <div class="form-group">
                                                    <label for="incentive_by" class="form-label fw-semibold text-dark fs-6 ps-3">Incentive By</label>
                                                    <select name="incentive_by" id="incentive_by" class="form-select rounded-pill text-dark fw-semibold">
                                                        <option value="Instacare" selected>Instacare</option>
                                                        <option value="Facility">Facility</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-5">
                                                <div class="form-group">
                                                    <label for="incentive_amount" class="form-label fw-semibold text-dark fs-6 ps-3"> Incentive Amount </label>
                                                    <input type="number" name="incentive_amount" id="incentive_amount" class="form-control rounded-pill text-dark fw-semibold" placeholder="00">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-5">
                                            <div class="form-group">
                                                <label for="notes" class="form-label fw-semibold text-dark fs-6 ps-5">Notes</label>
                                                <textarea class="form-control text-dark fw-semibold" name="notes" id="notes" rows="8" data-border-radius="30px"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button"
                                class="btn btn-secondary btn-lg rounded-pill text-uppercase px-10 fs-6 me-3"
                                onclick="publish_shift_confirmation('singleshiftform')"> Publish </button>
                            <button type="button" class="btn btn-secondary btn-lg rounded-pill text-uppercase px-10 fs-6"
                                onclick="shift_assign('{{ route('shift.employees') }}','singleshiftform')">
                                Assign </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="v-pills-recurring-shifts" role="tabpanel"
                aria-labelledby="v-pills-recurring-shifts-tab">
                <div class="card bg-white border-0 mb-3">
                    <div class="card-body">
                        <form class="needs-validation" novalidate action="{{ route('recurring.shifts.store') }}"
                            method="post" autocomplete="off" id="recurringshiftform">
                            @csrf
                            <div class="row row-cols-lg-5 row-cols-md-3 mb-3">
                                <div class="col form-group">
                                    <label for="facility"
                                        class="form-label fw-semibold text-dark fs-6 ps-3">Facility</label>
                                    <select name="facility" id="facility" class="form-select rounded-pill"
                                        data-supervisors="{{ URL::to('supervisors') }}" data-fid="recurringshiftform">
                                        <option value="" selected disabled>Select Facility</option>
                                        @foreach ($facilities as $facility)
                                            <option value="{{ $facility->id }}" data-floor="{{ $facility->address }}">
                                                {{ $facility->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col form-group">
                                    <label for="role" class="form-label fw-semibold text-dark fs-6 ps-3">Role</label>
                                    <select name="role" id="role" class="form-select rounded-pill">
                                        <option value="" selected disabled>Select Role</option>
                                        <option value="cna">CNA</option>
                                        <option value="lpn">LPN</option>
                                        <option value="rn">RN</option>
                                    </select>
                                </div>
                                <div class="col form-group">
                                    <label for="number_of_positions"
                                        class="form-label fw-semibold text-dark fs-6 ps-3">Number of Positions</label>
                                    <input type="number" name="number_of_positions" id="number_of_positions"
                                        class="form-control rounded-pill" placeholder="Number of Positions">
                                </div>
                                <div class="col form-group">
                                    <label for="date"
                                        class="form-label fw-semibold text-dark fs-6 ps-3">Date</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control rounded-pill-start rangepicker" name="date" id="date" placeholder="Select Date Range">
                                        <span class="input-group-text border-0 text-secondary bg-secondary-light rounded-pill-end"> <i class="far fa-calendar"></i> </span>
                                    </div>
                                </div>
                                <div class="col form-group">
                                    <label for="duration"
                                        class="form-label fw-semibold text-dark fs-6 ps-3">Duration</label>
                                    <input type="number" name="duration" id="duration"
                                        class="form-control rounded-pill" placeholder="Duration">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="form-label fw-semibold text-dark fs-6">Select Recurring Days</label>
                                <div class="col-auto form-check d-grid justify-items-center pe-0">
                                    <input class="form-check-input mx-0 mb-1" type="checkbox" name="recurring_days[]" id="monday" value="mon" checked>
                                    <label class="form-check-label text-muted" for="monday">Mon</label>
                                </div>
                                <div class="col-auto form-check d-grid justify-items-center pe-0">
                                    <input class="form-check-input mx-0 mb-1" type="checkbox" name="recurring_days[]" id="tuesday" value="tue">
                                    <label class="form-check-label text-muted" for="tuesday">Tue</label>
                                </div>
                                <div class="col-auto form-check d-grid justify-items-center pe-0">
                                    <input class="form-check-input mx-0 mb-1" type="checkbox" name="recurring_days[]" id="wednesday" value="wed">
                                    <label class="form-check-label text-muted" for="wednesday">Wed</label>
                                </div>
                                <div class="col-auto form-check d-grid justify-items-center pe-0">
                                    <input class="form-check-input mx-0 mb-1" type="checkbox" name="recurring_days[]" id="thursday" value="thu">
                                    <label class="form-check-label text-muted" for="thursday">Thu</label>
                                </div>
                                <div class="col-auto form-check d-grid justify-items-center pe-0">
                                    <input class="form-check-input mx-0 mb-1" type="checkbox" name="recurring_days[]" id="friday" value="fri">
                                    <label class="form-check-label text-muted" for="friday">Fri</label>
                                </div>
                                <div class="col-auto form-check d-grid justify-items-center pe-0">
                                    <input class="form-check-input mx-0 mb-1" type="checkbox" name="recurring_days[]" id="saturday" value="sat">
                                    <label class="form-check-label text-muted" for="saturday">Sat</label>
                                </div>
                                <div class="col-auto form-check d-grid justify-items-center pe-0">
                                    <input class="form-check-input mx-0 mb-1" type="checkbox" name="recurring_days[]" id="sunday" value="sun">
                                    <label class="form-check-label text-muted" for="sunday">Sun</label>
                                </div>
                            </div>
                            <div class="row justify-content-between mb-3">
                                <div class="col-md-6">
                                    <label for="shift_time" class="form-label fw-semibold text-dark fs-6">Shift Time</label>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-check d-flex align-items-center">
                                                <input class="form-check-input rec_shift_time_radio" type="radio" name="rec_shift_time" value="1" id="rec_morning_shift" checked>
                                                <label class="form-check-label ps-3" for="rec_morning_shift">Morning Shift: 7:00AM - 3:00PM</label>
                                            </div>
                                            <div class="form-check d-flex align-items-center">
                                                <input class="form-check-input rec_shift_time_radio" type="radio" name="rec_shift_time" value="2" id="rec_noon_shift">
                                                <label class="form-check-label ps-3" for="rec_noon_shift">Noon Shift: 3:00PM - 11:00PM</label>
                                            </div>
                                            <div class="form-check d-flex align-items-center">
                                                <input class="form-check-input rec_shift_time_radio" type="radio" name="rec_shift_time" value="3" id="rec_night_shift">
                                                <label class="form-check-label ps-3" for="rec_night_shift">Night Shift: 11:00PM - 7:00AM</label>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-check d-flex align-items-center">
                                                <input class="form-check-input rec_shift_time_radio" type="radio" name="rec_shift_time" value="4" id="rec_custom_shift">
                                                <label class="form-check-label ps-3" for="rec_custom_shift">Custom</label>
                                            </div>
                                            <div class="row mb-5 rec-shift-timing-section" style="display: none">
                                                <div class="col-md-6">
                                                    <label for="rec_start_time" class="form-label fw-semibold text-dark fs-6 ps-3">Start Time</label>
                                                    <select name="start_time" id="rec_start_time" class="form-select start-time" data-border-radius="15px">
                                                        <option value="" selected="" disabled=""> Select time </option>
                                                        @for ($i = 0; $i <= 24 * 2; $i++)
                                                            @php
                                                                $time = date('h:i A', strtotime(sprintf('%02d:%02d', (int) ($i / 2), ($i % 2) * 30)));
                                                            @endphp
                                                            @if ($i != 48)
                                                                <option value="{{ $time }}">{{ $time }} </option>
                                                            @endif
                                                        @endfor
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="rec_end_time" class="form-label fw-semibold text-dark fs-6 ps-3">End Time</label>
                                                    <select name="end_time" id="rec_start_time" class="form-select end-time" data-border-radius="15px">
                                                        <option value="" selected="" disabled=""> Select time </option>
                                                        @for ($i = 0; $i <= 24 * 2; $i++)
                                                            @php
                                                                $time = date('h:i A', strtotime(sprintf('%02d:%02d', (int) ($i / 2), ($i % 2) * 30)));
                                                            @endphp
                                                            @if ($i != 48)
                                                                <option value="{{ $time }}">{{ $time }} </option>
                                                            @endif
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3 mt-5">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="rate" class="form-label fw-semibold text-dark fs-6 ps-3">Rate (per hour)</label>
                                                    <input type="number" name="rate" id="rate" class="form-control rounded-pill text-dark fw-semibold" placeholder="00">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="rec_floor_number" class="form-label fw-semibold text-dark fs-6 ps-3">Floor Number</label>
                                                    <input class="form-control rounded-pill floor_number" name="floor_number" id="rec_floor_number" placeholder="Floor number" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="cancellation_guarantee" class="form-label fw-semibold text-dark fs-6 ps-3">Cancellation Guarantee</label>
                                                    <div class="d-flex align-items-center ps-3">
                                                        <div class="form-check d-flex align-items-center me-7">
                                                            <input class="form-check-input hw-1-5-em" type="radio" name="cancellation_guarantee" id="rec_cancellation_guarantee1" checked="">
                                                            <label class="form-check-label ps-3 text-muted" for="rec_cancellation_guarantee1"> Yes </label>
                                                        </div>
                                                        <div class="form-check d-flex align-items-center">
                                                            <input class="form-check-input hw-1-5-em" type="radio" name="cancellation_guarantee" id="rec_cancellation_guarantee2">
                                                            <label class="form-check-label ps-3 text-muted" for="rec_cancellation_guarantee2"> No </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="rec_supervisor" class="form-label fw-semibold text-dark fs-6 ps-3">Supervisor</label>
                                                    <select name="supervisor" id="rec_supervisor" class="form-select rounded-pill text-dark fw-semibold">
                                                        <option value="" selected> Select </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-5">
                                                <label for="incentives" class="form-label fw-semibold text-dark fs-6">Incentives</label>
                                                <div class="d-flex align-items-center">
                                                    <div class="form-check d-flex align-items-center me-7">
                                                        <input class="form-check-input hw-1-5-em" type="radio" name="incentives" id="rec_incentives1" checked>
                                                        <label class="form-check-label ps-3 text-muted" for="rec_incentives1"> Yes </label>
                                                    </div>
                                                    <div class="form-check d-flex align-items-center">
                                                        <input class="form-check-input hw-1-5-em" type="radio" name="incentives" id="rec_incentives2">
                                                        <label class="form-check-label ps-3 text-muted" for="rec_incentives2"> No </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-5">
                                                <label for="incentive_type" class="form-label fw-semibold text-dark fs-6">Incentive Type</label>
                                                <div class="d-flex align-items-center">
                                                    <div class="form-check d-flex align-items-center me-7">
                                                        <input class="form-check-input hw-1-5-em" type="radio" name="incentive_type" id="rec_incentive_type1" checked>
                                                        <label class="form-check-label ps-3 text-muted" for="rec_incentive_type1"> $/hr </label>
                                                    </div>
                                                    <div class="form-check d-flex align-items-center">
                                                        <input class="form-check-input hw-1-5-em" type="radio" name="incentive_type" id="rec_incentive_type2">
                                                        <label class="form-check-label ps-3 text-muted" for="rec_incentive_type2"> Fixed </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-5">
                                                <div class="form-group">
                                                    <label for="rec_incentive_by" class="form-label fw-semibold text-dark fs-6 ps-3">Incentive By</label>
                                                    <select name="incentive_by" id="rec_incentive_by" class="form-select rounded-pill text-dark fw-semibold">
                                                        <option value="instacare" selected>Instacare</option>
                                                        <option value="facility">Facility</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-5">
                                                <div class="form-group">
                                                    <label for="rec_incentive_amount" class="form-label fw-semibold text-dark fs-6 ps-3">Incentive Amount</label>
                                                    <input type="number" name="incentive_amount" id="rec_incentive_amount" class="form-control rounded-pill text-dark fw-semibold" placeholder="00">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-5">
                                            <div class="form-group">
                                                <label for="rec_notes" class="form-label fw-semibold text-dark fs-6 ps-5">Notes</label>
                                                <textarea class="form-control text-dark fw-semibold" name="notes" id="rec_notes" rows="8" data-border-radius="30px"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button"
                                class="btn btn-secondary btn-lg rounded-pill text-uppercase px-10 fs-6 me-3"
                                onclick="publish_shift_confirmation('recurringshiftform')">publish</button>
                            <button type="button" class="btn btn-secondary btn-lg rounded-pill text-uppercase px-10 fs-6"
                                onclick="shift_assign('{{ route('shift.employees') }}','recurringshiftform')">assign</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="v-pills-bulk-upload" role="tabpanel"
                aria-labelledby="v-pills-bulk-upload-tab">
                <div class="card bg-white border-0 mb-3">
                    <div class="card-body">
                        <form class="needs-validation" novalidate action="{{ route('sheet.shifts.store') }}" method="post" autocomplete="off" id="uploadsheetform" enctype="multipart/form-data">
                            @csrf
                            <div class="d-grid">
                                <label class="form-label fw-semibold text-dark fs-6 ps-3 cursor-pointer">Please upload the excel sheet</label>
                                <div class="form-group">
                                    <label for="excel_file" class="custom-input-file"> <i class="fa-light fa-file-lines text-secondary fs-5 me-3"></i> Upload Excel File </label>
                                    <input type="file" name="excel_file" id="excel_file" class="d-none" required>
                                </div>
                                <button type="submit" class="btn btn-secondary btn-lg rounded-pill text-uppercase fs-7 w-fit-content px-5 py-3">upload file</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="v-pills-bulk-shifts" role="tabpanel"
                aria-labelledby="v-pills-bulk-shifts-tab">
                <div class="card bg-white border-0 mb-3">
                    <div class="card-body">
                        <form class="needs-validation" novalidate action="{{ URL::to('form') }}" method="post"
                            autocomplete="off">
                            @csrf

                            {{-- <div id="calendar" data-date-id=""></div> --}}

                            <div id="custom-calendar">
                                <div class="calendar-header row align-items-center justify-content-between mb-2">
                                    <div class="col-md-4 text-start text-md-center">
                                        <select name="facility" id="facility" class="form-select rounded-pill"
                                            style="width:200px">
                                            <option value="" selected="">Select Facility</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <div class="d-flex align-items-center justify-content-center gap-4">
                                            <span class="prev-month cursor-pointer p-2 fs-4"><i class="fa-regular fa-circle-left"></i></span>
                                            <h2 class="current-month-year"></h2>
                                            <span class="next-month cursor-pointer p-2 fs-4"><i class="fa-regular fa-circle-right"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 text-end">
                                        <button type="submit"
                                            class="btn btn-secondary btn-lg rounded-pill text-uppercase fs-7 w-fit-content px-10 py-3">publish</button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="calendar-table">
                                        <thead>
                                            <tr>
                                                <td>Sun</td>
                                                <td>Mon</td>
                                                <td>Tue</td>
                                                <td>Wed</td>
                                                <td>Thu</td>
                                                <td>Fri</td>
                                                <td>Sat</td>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End::Content -->
    </div>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        var assign_shift = 0;
        var employee = '';
        $(function(params) {
            resetdata();
            "use strict";
            $('select[name="facility"]').on('change', function() {
                if ($.trim($(this).val()) != '')
                $('#' + $(this).attr('data-fid') + ' .floor_number').val($(this).find(':selected').attr(
                        'data-floor'));
                getsupervisors($(this).val(), $(this).attr('data-supervisors'), $(this).attr('data-fid'));
            });
            $('.single_shift_time').on('change', function() {
                handleShiftTime(this, $(this).val(), 'shift-timing-section')
            });
            $('.single_shift_time:checked').on('change', function() {
                handleShiftTime(this, $(this).val(), 'shift-timing-section')
            }).change();
            $('.rec_shift_time_radio').on('change', function() {
                handleShiftTime(this, $(this).val(), 'rec-shift-timing-section')
            });
            $('.rec_shift_time_radio:checked').on('change', function() {
                handleShiftTime(this, $(this).val(), 'rec-shift-timing-section')
            }).change();

            $('.rangepicker#date').flatpickr({});
        });

        function handleShiftTime(el, v, section) {
            if (v == 4) {
                $('.' + section).show();
                $('.' + section).find('select').attr('disabled', false);
            } else {
                $('.' + section).hide();
                $('.' + section).find('select').attr('disabled', true);
            }
        }

        function resetdata(id) {
            assign_shift = 0;
            employee = '';
            $('.err, .border, .border-danger').remove();
            if ($.trim(id) != '') {
                $('#' + id).removeClass('was-validated');
                $('#' + id)[0].reset();
                $('#' + id + ' .shift-timing-section').hide();
            }
        };
        $('#recurringshiftform').on('submit', function(event) {
            "use strict";
            event.preventDefault();
            $('.err').remove();
            var formData = new FormData(this);
            formData.append('type', 2);
            formData.append('assign_shift', assign_shift);
            formData.append('employee', employee);
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == 0) {
                        if (response.errors && Object.keys(response.errors).length > 0) {
                            $.each(response.errors, function(key, value) {
                                Swal.showValidationMessage(value);
                                $('.swal2-validation-message').addClass('w-100');
                                Swal.disableLoading();
                                return false;
                            });
                        } else {
                            swal_cancelled(response.message);
                        }
                        return false;
                    } else {
                        resetdata('recurringshiftform');
                        successfully_posted_shift(response.data);
                    }
                },
                error: function(xhr, status, error) {
                    swal_cancelled(wrong);
                    return false;
                }
            });
        });
        $('#singleshiftform').on('submit', function(event) {
            "use strict";
            event.preventDefault();
            $('.err').remove();
            var formData = new FormData(this);
            formData.append('type', 1);
            formData.append('assign_shift', assign_shift);
            formData.append('employee', employee);
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == 0) {
                        if (response.errors && Object.keys(response.errors).length > 0) {
                            $.each(response.errors, function(key, value) {
                                Swal.showValidationMessage(value);
                                $('.swal2-validation-message').addClass('w-100');
                                Swal.disableLoading();
                                return false;
                            });
                        } else {
                            swal_cancelled(response.message);
                        }
                        return false;
                    } else {
                        resetdata('singleshiftform');
                        successfully_posted_shift(response.data);
                    }
                },
                error: function(xhr, status, error) {
                    swal_cancelled(wrong);
                    return false;
                }
            });
        });
        $('#uploadsheetform').on('submit', function(event) {
            "use strict";
            event.preventDefault();
            $('.err').remove();
            var formData = new FormData(this);
            formData.append('type', 3);
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == 0) {
                        if (response.errors && Object.keys(response.errors).length > 0) {
                            $.each(response.errors, function(key, value) {
                                swal_cancelled(value);
                                return false;
                            });
                        } else {
                            swal_cancelled(response.message);
                        }
                        return false;
                    } else {
                        resetdata('singleshiftform');
                        successfully_posted_shift(response.data);
                    }
                },
                error: function(xhr, status, error) {
                    swal_cancelled(wrong);
                    return false;
                }
            });
        });

        function getsupervisors(i, u, fid) {
            $.ajax({
                url: u,
                type: 'POST',
                data: {
                    id: i
                },
                success: function(response) {
                    if (response.status == 1) {
                        $('#' + fid + ' select[name="supervisor"] option:not(:first)').remove();
                        if (response.data.length > 0) {
                            $.each(response.data, function(i, v) {
                                $('#' + fid + ' select[name="supervisor"]').append('<option value="' + v
                                    .id + '" >' + v.name +
                                    '</option>');
                            });
                        } else {
                            $('#' + fid + ' select[name="supervisor"]').append(
                                '<option value="" selected disabled>' + no_data +
                                '</option>');
                        }
                    } else {
                        showtoast(2, response.message);
                    }
                },
                error: function(xhr, status, error) {
                    showtoast(2, wrong);
                    return false;
                }
            });
        }

        function publish_shift_confirmation(fid) {
            "use strict";
            swalWithBootstrapButtons.fire({
                title: 'Confirmation',
                text: 'Great, would you like to post this shift?',
                showClass: {
                    popup: 'animate__animated animate__bounceInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__bounceOutUp'
                },
                showCancelButton: true,
                confirmButtonText: yes,
                cancelButtonText: cancel,
                didOpen: function() {
                    $('.swal2-container .swal2-popup').append(
                        '<span class="custom-sweetalert-border-top"></span>');
                    $('.swal2-title').addClass('text-success fw-semibold').parent().prepend(
                        '<small class="text-primary text-uppercase text-center mt-5">add shift</small>');
                },
                showLoaderOnConfirm: true,
                preConfirm: function() {
                    return new Promise(function(o, n) {
                        $('#' + fid).submit()
                    })
                }
            }).then(t => {
                t.isConfirmed || (t.dismiss, Swal.DismissReason.cancel)
            })
        }

        function successfully_posted_shift(data) {
            var facility = data.facility;
            var open_shifts = data.open_shifts;
            var date = data.date;
            var timing = data.timing;
            swalWithBootstrapButtons.fire({
                title: 'Awesome!',
                text: 'You successfully booked the shift. Your shift details is:',
                showClass: {
                    popup: 'animate__animated animate__bounceInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__bounceOutUp'
                },
                showConfirmButton: false,
                showCancelButton: true,
                cancelButtonText: close,
                showLoaderOnConfirm: true,
                didOpen: function() {
                    $('.swal2-container .swal2-popup').append(
                        '<span class="custom-sweetalert-border-top"></span>');
                    $('.swal2-title').addClass('text-primary fw-light').parent().prepend(
                        '<i class="fa-regular fa-calendar-check text-center h1 text-highlight mt-5"></i>');
                    var html = '';
                    $.each(data.list, function (indexInArray, valueOfElement) { 
                        html += '<p class="text-center fw-bold fs-5 text-primary mt-2">' + valueOfElement.date + '</p>' +
                        '<p class="text-center fw-bold fs-5 text-dark mt-2"><i class="fa-regular fa-sun-bright text-highlight me-3"></i> ' + valueOfElement.timing + ' </p>';
                    });
                    $('.swal2-html-container').append( '<p class="text-center fw-bold fs-5 text-primary mt-5">' + facility + '</p>' + '<p class="text-center fw-light mt-2">' + open_shifts + '</p>' +html);
                }
            }).then(() => {
                Swal.close();
            });
        }

        function shift_assign(aurl, fid) {
            "use strict";
            swalWithBootstrapButtons.fire({
                title: 'Assign Shift(s)',
                text: 'Please select the person to whom you want to assign shift(s).',
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
                    $('.swal2-html-container').addClass('text-start');
                    $.ajax({
                        url: aurl,
                        type: 'GET',
                        beforeSend: function() {
                            // $('.swal2-html-container').append(my_spinner);
                        },
                        success: function(response) {
                            $('.swal2-html-container').find('.spinner').remove();
                            var html = '';
                            if (response.data.length > 0) {
                                $.each(response.data, function(i, v) {
                                    html += '<label for="sshift' + i +
                                        '" class="d-flex align-items-center my-3"><div class="col-1 me-4"><div class="form-check mb-0"><input class="form-check-input form-check-input-lg border-secondary" type="radio" name="employee" value="' +
                                        v.id + '" id="sshift' + i +
                                        '"></div></div><div class="col-7"><div class="d-flex align-items-center"><img src="' +
                                        v.image_url +
                                        '" alt="profile" class="object-fit-cover rounded-circle border-light" width="40" height="40" style="outline: 1px solid #ccc"><p class="text-dark fw-500 ms-3">' +
                                        v.fullname +
                                        '</p></div></div><div class="col-3 ms-3"><span class="badge custom-badge-cna w-fit-content h-fit-content py-3">' +
                                        v.role + '</span></div></label>';
                                });
                            } else {
                                html += '<p class="text-center mt-5 text-muted"> ' + no_data +
                                    ' </p>';
                            }
                            $('.swal2-html-container').append(html);
                        },
                        error: function(xhr, status, error) {
                            showtoast(2, wrong);
                            return false;
                        }
                    });
                },
                showLoaderOnConfirm: true,
                preConfirm: function() {
                    return new Promise(function(o, n) {
                        if ($('input[type="radio"][name="employee"]:checked').length <= 0) {
                            Swal.showValidationMessage('Please select a person!');
                            $('.swal2-validation-message').addClass('w-100');
                            Swal.disableLoading();
                            return false;
                        } else {
                            assign_shift = 1;
                            employee = $('input[type="radio"][name="employee"]:checked').val();
                            $('#' + fid).submit()
                        }

                    })
                }
            }).then(t => {
                t.isConfirmed || (t.dismiss, Swal.DismissReason.cancel)
            })
        }
    </script>
    <script>
        $(document).ready(function() {
            var today = new Date();
            var currentDate = new Date();
            $('.prev-month').click(function() {
                if (currentDate.getFullYear() == today.getFullYear() && currentDate.getMonth() - 1 < today
                    .getMonth()) {
                    return false;
                }
                currentDate.setMonth(currentDate.getMonth() - 1);
                renderCalendar();
            });
            $('.next-month').click(function() {
                currentDate.setMonth(currentDate.getMonth() + 1);
                renderCalendar();
            });

            function renderCalendar() {
                var currentYear = currentDate.getFullYear();
                var currentMonth = currentDate.getMonth();
                $('.prev-month').toggleClass('text-muted', currentYear === today.getFullYear() && currentMonth - 1 <
                    today.getMonth()).toggleClass('cursor-pointer', !(currentYear === today.getFullYear() &&
                    currentMonth - 1 < today.getMonth()));
                $('.current-month-year').text(new Date(currentYear, currentMonth).toLocaleString('en-us', {
                    month: 'long',
                    year: 'numeric'
                }).replace(/(\s\d+)/, ', $1'));
                $('.calendar-table tbody').empty();
                var firstDay = new Date(currentYear, currentMonth, 1).getDay();
                var totalDays = new Date(currentYear, currentMonth + 1, 0).getDate();
                var tableBody = $('.calendar-table tbody');
                var row = $('<tr>');
                for (var i = 0; i < firstDay; i++) {
                    row.append($('<td></td>'));
                }
                for (var day = 1; day <= totalDays; day++) {
                    var cd = new Date(currentYear, currentMonth, day);
                    var currentMonthName = cd.toLocaleString('default', {
                        month: 'long'
                    });
                    var monthNameShort = currentMonthName.substring(0, 3);
                    var arr_name = monthNameShort + '_' + day;
                    var cell = $('<td>').html(currentYear == today.getFullYear() && currentMonth - 1 < today
                        .getMonth() && day < today.getDate() ? '' :
                        '<div class="d-flex align-items-center justify-content-center">' +
                        '<h1 class="fw-bold"><span class="fs-5">' + monthNameShort + ' </span>' + day +
                        '</h1>' + '</div>   <div class="input-group px-1 mb-1">' +
                        '<input type="number" name="avl_shifts[' + arr_name +
                        '][]" class="form-control form-control-sm border fw-semibold text-dark bg-transparent" placeholder="01">' +
                        '<select name="shift_type[' + arr_name +
                        '][]" class="form-select form-select-sm  border bg-transparent">' +
                        '<option value="" selected >Role</option>' + '</select>' + '<select name="shift_time[' +
                        arr_name + '][]" class="form-select form-select-sm  border bg-transparent">' +
                        '<option value="" selected >Shift Time</option>' + '</select>' + '</div>' +
                        '<p class="add_more fs-8 fw-semibold text-primary text-center mt-1 cursor-pointer" data-arr-name="' +
                        arr_name + '">+ Add More</p>');
                    row.append(cell);
                    if (new Date(currentYear, currentMonth, day).getDay() === 6) {
                        tableBody.append(row);
                        row = $('<tr>');
                    }
                }
                tableBody.append(row);
                $('.calendar-table tbody tr').each(function() {
                    if ($(this).find('td').length === $(this).find('td:empty').length) {
                        $(this).remove();
                    }
                });
            }
            $('body').on('click', '.add_more', function(e) {
                var customHTML = '<div class="input-group px-1 mb-1">' +
                    '<input type="number" name="avl_shifts[' + $(this).attr('data-arr-name') +
                    '][]" class="form-control form-control-sm border fw-semibold text-dark bg-transparent" placeholder="01">' +
                    '<select name="shift_type[' + $(this).attr('data-arr-name') +
                    '][]" class="form-select form-select-sm border bg-transparent">' +
                    '<option value="" selected >Role</option>' + '</select>' + '<select name="shift_time[' +
                    $(this).attr('data-arr-name') +
                    '][]" class="form-select form-select-sm border bg-transparent">' +
                    '<option value="" selected >Shift Time</option>' + '</select>' + '</div>';
                $(this).before(customHTML);
            });
            renderCalendar();
        });
    </script>
    <script>
        // $('body').on('click', 'input[name="avl_shifts"]', function(params) {
        //     alert($('input[name="avl_shifts"]:first').attr('type'))
        // });
        // $('#v-pills-bulk-shifts-tab').on('click', function(params) {
        //     var today = new Date();
        //     var calendar = new FullCalendar.Calendar($('#calendar')[0], {
        //         timeZone: "UTC",
        //         themeSystem: "bootstrap5",
        //         headerToolbar: {
        //             left: "prev",
        //             center: "prev,title,next",
        //             right: ""
        //         },
        //         validRange: {
        //             start: today.toISOString().split('T')[0],
        //             end: '2049-12-31'
        //         },
        //         initialDate: today,
        //         dayCellContent: function(info) {
        //             var date = info.date;
        //             var formattedDate = date.toLocaleString('default', {
        //                 month: 'short',
        //                 day: 'numeric'
        //             });
        //             return formattedDate;
        //         },
        //     });
        //     calendar.render();
        //     rendermonth();
        // });
        // function rendermonth() {
        //     var facility_list =
        //         '<select name="facility" id="facility" class="form-select rounded-pill"><option value="" selected="">Select Facility</option></select>';
        //     var btn_publish =
        //         '<button type="submit" class="btn btn-secondary btn-lg rounded-pill text-uppercase fs-7 w-fit-content px-10 py-3">publish</button>';
        //     $('.fc-toolbar-chunk:first').css('width', '200px').html(facility_list);
        //     $('.fc-toolbar-chunk:last').html(btn_publish);
        //     $('.fc-prev-button.fc-button.fc-button-primary').html('<i class="fa-regular fa-circle-arrow-left fs-4"></i>');
        //     $('.fc-next-button.fc-button.fc-button-primary').html('<i class="fa-regular fa-circle-arrow-right fs-4"></i>');
        //     $.each($('.fc-daygrid-day-top .fc-daygrid-day-number'), function(indexInArray, valueOfElement) {
        //         var x = $(valueOfElement).html();
        //         let html = '<small class="fs-5">' + x.split(' ')[0] + ' </small>' + x.split(' ')[1];
        //         $(valueOfElement).html(html);
        //     });
        //     var customHTML = '<div class="d-flex align-items-center px-1 mb-1">' +
        //         '<input type="number" name="avl_shifts" class="form-control form-control-sm border fw-semibold text-dark bg-transparent" placeholder="01">' +
        //         '<select name="shift_type[]" class="form-select form-select-sm border bg-transparent">' +
        //         '<option value="" selected >Role</option>' + '</select>' +
        //         '<select name="shift_time" class="form-select form-select-sm border bg-transparent">' +
        //         '<option value="" selected >Shift Time</option>' + '</select>' + '</div>' +
        //         '<p class="add_more_shift fs-8 fw-semibold text-primary text-center mt-1 cursor-pointer">+ Add More</p>';
        //     $('.fc-day-today .fc-daygrid-day-top , .fc-day-future .fc-daygrid-day-top').after(customHTML);
        //     var startdate = $('.fc-daygrid-day-number').html();
        //     $('.add_more_shift').onClick(function(e) {
        //         var customHTML = '<div class="d-flex align-items-center px-1 mb-1">' +
        //             '<input type="number" name="avl_shifts" class="form-control form-control-sm border fw-semibold text-dark bg-transparent" placeholder="01">' +
        //             '<select name="shift_type[]" class="form-select form-select-sm border bg-transparent">' +
        //             '<option value="" selected >Role</option>' +
        //             '</select>' +
        //             '<select name="shift_time" class="form-select form-select-sm border bg-transparent">' +
        //             '<option value="" selected >Shift Time</option>' +
        //             '</select>' +
        //             '</div>';
        //         $(this).before(customHTML);
        //     });
        // }
    </script>
@endsection

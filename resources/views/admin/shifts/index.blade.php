@extends('admin.theme.default')
@section('title') Shifts @endsection
@section('content')
    <div class="container-fluid content d-flex flex-column ">
        <!-- Begin::Content -->
        <div class="row align-items-center justify-content-between mb-3">
            <div class="col-auto">
                <div class="d-flex align-items-center">
                    <h3 class="fw-bold">Shifts</h3>
                    <div class="d-flex align-items-center mx-3 text-muted fw-semibold fs-8 cursor-pointer ">
                        <p class="datepicker">18 March 2023</p>
                        <i class="fa-solid fa-chevron-down ms-2"></i>
                    </div>
                </div>
            </div>
            <div class="col-auto">
                <a href="{{ route('shifts.create') }}" class="btn btn-highlight text-uppercase rounded-pill fs-8"> <i class="fa-regular fa-plus me-2 fs-9"></i> add shift </a>
            </div>
        </div>
        <div class="card bg-white border-0 mb-3">
            <div class="card-body pb-0">
                <div class="nav nav-underline justify-content-evenly" id="v-pills-tab" role="tablist"
                    aria-orientation="vertical">
                    <a class="nav-link fw-bold text-muted active" role="tab" data-bs-toggle="pill" id="v-pills-open-shifts-tab" href="#v-pills-open-shifts" aria-controls="v-pills-open-shifts" aria-selected="true">Open Shifts<span class="badge text-bg-highlight rounded-pill ms-2">24</span> </a>
                    <a class="nav-link fw-bold text-muted" role="tab" data-bs-toggle="pill" id="v-pills-confirmed-shifts-in-tab" href="#v-pills-confirmed-shifts" aria-controls="v-pills-confirmed-shifts-in" aria-selected="false">Confirmed Shifts<span class="badge text-bg-highlight rounded-pill ms-2">30</span> </a>
                    <a class="nav-link fw-bold text-muted" role="tab" data-bs-toggle="pill" id="v-pills-shift-progress-in-tab" href="#v-pills-shift-progress" aria-controls="v-pills-shift-progress-in" aria-selected="false">Shift in Progress<span class="badge text-bg-highlight rounded-pill ms-2">20</span> </a>
                    <a class="nav-link fw-bold text-muted" role="tab" data-bs-toggle="pill" id="v-pills-completed-shifts-in-tab" href="#v-pills-completed-shifts" aria-controls="v-pills-completed-shifts-in" aria-selected="false">Completed Shifts<span class="badge text-bg-highlight rounded-pill ms-2">08</span> </a>
                    <a class="nav-link fw-bold text-muted" role="tab" data-bs-toggle="pill" id="v-pills-call-offs-shifts-in-tab" href="#v-pills-call-offs-shifts" aria-controls="v-pills-call-offs-shifts-in" aria-selected="false">Call Offs Shifts<span class="badge text-bg-highlight rounded-pill ms-2">02</span> </a>
                    <a class="nav-link fw-bold text-muted" role="tab" data-bs-toggle="pill" id="v-pills-facility-cancellation-in-tab" href="#v-pills-facility-cancellation" aria-controls="v-pills-facility-cancellation-in" aria-selected="false">Facility Cancellation<span class="badge text-bg-highlight rounded-pill ms-2">0</span> </a>
                    <a class="nav-link fw-bold text-muted" role="tab" data-bs-toggle="pill" id="v-pills-late-in-tab" href="#v-pills-late" aria-controls="v-pills-late-in" aria-selected="false">Late<span class="badge text-bg-highlight rounded-pill ms-2">0</span> </a>
                </div>
            </div>
        </div>
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-open-shifts" role="tabpanel"
                aria-labelledby="v-pills-open-shifts-tab">
                <div class="card bg-white border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-6">
                            <p><strong>24</strong> Open shifts found out of <strong>54</strong> shifts</p>
                            <span>
                                <span class="badge custom-badge-danger fs-6 px-3 me-2">
                                    <i class="fa-regular fa-trash-can"></i></span>
                                <button type="button" class="btn btn-secondary fs-6 px-5 py-2"
                                    data-bs-toggle="offcanvas" data-bs-target="#shifts_filter_aside"
                                    aria-controls="shifts_filter_aside">
                                    <i class="fa-regular fa-sliders-up me-2"></i>Filter</button>
                            </span>
                        </div>
                        <div class="row row-cols-lg-3 row-cols-md-2 mb-5">
                            <div class="col mb-5">
                                <label for="open-shifts-1" class="card shifts-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <input class="form-check-input form-check-input-lg border-secondary"
                                                    type="checkbox" value="" id="open-shifts-1">
                                            </div>
                                            <div class="col-md-6 d-grid">
                                                <strong class="mb-2">1 Position</strong>
                                                <p class="text-primary fw-500 mb-3">Elevate Care North Branch</p>
                                                <span>
                                                    <i class="fa-regular fa-regular fa-square text-danger"></i>
                                                    <i class="fa-solid fa-flag-pennant text-highlight mx-2"></i>
                                                    <i class="fa-solid fa-shield-check" style="color: #21D0B3"></i>
                                                </span>
                                            </div>
                                            <div class="col-md-4 d-grid justify-items-end">
                                                <span
                                                    class="badge custom-badge-rn w-fit-content h-fit-content fs-5 mb-3">RN</span>
                                                <small class="text-muted fw-semibold">7:00AM - 3:00PM</small>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="col mb-5">
                                <label for="open-shifts-2" class="card shifts-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <input class="form-check-input form-check-input-lg border-secondary"
                                                    type="checkbox" value="" id="open-shifts-2">
                                            </div>
                                            <div class="col-md-6 d-grid">
                                                <strong class="mb-2">1 Position</strong>
                                                <p class="text-primary fw-500 mb-3">Elevate Care North Branch</p>
                                                <span>
                                                    <i class="fa-regular fa-regular fa-square text-danger"></i>
                                                    <i class="fa-solid fa-flag-pennant text-highlight mx-2"></i>
                                                    <i class="fa-solid fa-shield-check" style="color: #21D0B3"></i>
                                                </span>
                                            </div>
                                            <div class="col-md-4 d-grid justify-items-end">
                                                <span
                                                    class="badge custom-badge-rn w-fit-content h-fit-content fs-5 mb-3">RN</span>
                                                <small class="text-muted fw-semibold">7:00AM - 3:00PM</small>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="col mb-5">
                                <label for="open-shifts-3" class="card shifts-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <input class="form-check-input form-check-input-lg border-secondary"
                                                    type="checkbox" value="" id="open-shifts-3">
                                            </div>
                                            <div class="col-md-6 d-grid">
                                                <strong class="mb-2">1 Position</strong>
                                                <p class="text-primary fw-500 mb-3">Elevate Care North Branch</p>
                                                <span>
                                                    <i class="fa-regular fa-regular fa-square text-danger"></i>
                                                    <i class="fa-solid fa-flag-pennant text-highlight mx-2"></i>
                                                    <i class="fa-solid fa-shield-check" style="color: #21D0B3"></i>
                                                </span>
                                            </div>
                                            <div class="col-md-4 d-grid justify-items-end">
                                                <span
                                                    class="badge custom-badge-rn w-fit-content h-fit-content fs-5 mb-3">RN</span>
                                                <small class="text-muted fw-semibold">7:00AM - 3:00PM</small>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="col mb-5">
                                <label for="open-shifts-4" class="card shifts-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <input class="form-check-input form-check-input-lg border-secondary"
                                                    type="checkbox" value="" id="open-shifts-4">
                                            </div>
                                            <div class="col-md-6 d-grid">
                                                <strong class="mb-2">1 Position</strong>
                                                <p class="text-primary fw-500 mb-3">Elevate Care North Branch</p>
                                                <span>
                                                    <i class="fa-regular fa-regular fa-square text-danger"></i>
                                                    <i class="fa-solid fa-flag-pennant text-highlight mx-2"></i>
                                                    <i class="fa-solid fa-shield-check" style="color: #21D0B3"></i>
                                                </span>
                                            </div>
                                            <div class="col-md-4 d-grid justify-items-end">
                                                <span
                                                    class="badge custom-badge-rn w-fit-content h-fit-content fs-5 mb-3">RN</span>
                                                <small class="text-muted fw-semibold">7:00AM - 3:00PM</small>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="col mb-5">
                                <label for="open-shifts-5" class="card shifts-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <input class="form-check-input form-check-input-lg border-secondary"
                                                    type="checkbox" value="" id="open-shifts-5">
                                            </div>
                                            <div class="col-md-6 d-grid">
                                                <strong class="mb-2">1 Position</strong>
                                                <p class="text-primary fw-500 mb-3">Elevate Care North Branch</p>
                                                <span>
                                                    <i class="fa-regular fa-regular fa-square text-danger"></i>
                                                    <i class="fa-solid fa-flag-pennant text-highlight mx-2"></i>
                                                    <i class="fa-solid fa-shield-check" style="color: #21D0B3"></i>
                                                </span>
                                            </div>
                                            <div class="col-md-4 d-grid justify-items-end">
                                                <span
                                                    class="badge custom-badge-lpn w-fit-content h-fit-content fs-5 mb-3">LPN</span>
                                                <small class="text-muted fw-semibold">7:00AM - 3:00PM</small>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="col mb-5">
                                <label for="open-shifts-6" class="card shifts-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <input class="form-check-input form-check-input-lg border-secondary"
                                                    type="checkbox" value="" id="open-shifts-6">
                                            </div>
                                            <div class="col-md-6 d-grid">
                                                <strong class="mb-2">1 Position</strong>
                                                <p class="text-primary fw-500 mb-3">Elevate Care North Branch</p>
                                                <span>
                                                    <i class="fa-regular fa-regular fa-square text-danger"></i>
                                                    <i class="fa-solid fa-flag-pennant text-highlight mx-2"></i>
                                                    <i class="fa-solid fa-shield-check" style="color: #21D0B3"></i>
                                                </span>
                                            </div>
                                            <div class="col-md-4 d-grid justify-items-end">
                                                <span
                                                    class="badge custom-badge-rn w-fit-content h-fit-content fs-5 mb-3">RN</span>
                                                <small class="text-muted fw-semibold">7:00AM - 3:00PM</small>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="col mb-5">
                                <label for="open-shifts-7" class="card shifts-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <input class="form-check-input form-check-input-lg border-secondary"
                                                    type="checkbox" value="" id="open-shifts-7">
                                            </div>
                                            <div class="col-md-6 d-grid">
                                                <strong class="mb-2">1 Position</strong>
                                                <p class="text-primary fw-500 mb-3">Elevate Care North Branch</p>
                                                <span>
                                                    <i class="fa-regular fa-regular fa-square text-danger"></i>
                                                    <i class="fa-solid fa-flag-pennant text-highlight mx-2"></i>
                                                    <i class="fa-solid fa-shield-check" style="color: #21D0B3"></i>
                                                </span>
                                            </div>
                                            <div class="col-md-4 d-grid justify-items-end">
                                                <span
                                                    class="badge custom-badge-rn w-fit-content h-fit-content fs-5 mb-3">RN</span>
                                                <small class="text-muted fw-semibold">7:00AM - 3:00PM</small>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="col mb-5">
                                <label for="open-shifts-8" class="card shifts-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <input class="form-check-input form-check-input-lg border-secondary"
                                                    type="checkbox" value="" id="open-shifts-8">
                                            </div>
                                            <div class="col-md-6 d-grid">
                                                <strong class="mb-2">1 Position</strong>
                                                <p class="text-primary fw-500 mb-3">Elevate Care North Branch</p>
                                                <span>
                                                    <i class="fa-regular fa-regular fa-square text-danger"></i>
                                                    <i class="fa-solid fa-flag-pennant text-highlight mx-2"></i>
                                                    <i class="fa-solid fa-shield-check" style="color: #21D0B3"></i>
                                                </span>
                                            </div>
                                            <div class="col-md-4 d-grid justify-items-end">
                                                <span
                                                    class="badge custom-badge-rn w-fit-content h-fit-content fs-5 mb-3">RN</span>
                                                <small class="text-muted fw-semibold">7:00AM - 3:00PM</small>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="col mb-5">
                                <label for="open-shifts-9" class="card shifts-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <input class="form-check-input form-check-input-lg border-secondary"
                                                    type="checkbox" value="" id="open-shifts-9">
                                            </div>
                                            <div class="col-md-6 d-grid">
                                                <strong class="mb-2">1 Position</strong>
                                                <p class="text-primary fw-500 mb-3">Elevate Care North Branch</p>
                                                <span>
                                                    <i class="fa-regular fa-regular fa-square text-danger"></i>
                                                    <i class="fa-solid fa-flag-pennant text-highlight mx-2"></i>
                                                    <i class="fa-solid fa-shield-check" style="color: #21D0B3"></i>
                                                </span>
                                            </div>
                                            <div class="col-md-4 d-grid justify-items-end">
                                                <span
                                                    class="badge custom-badge-lpn w-fit-content h-fit-content fs-5 mb-3">LPN</span>
                                                <small class="text-muted fw-semibold">7:00AM - 3:00PM</small>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="col mb-5">
                                <label for="open-shifts-10" class="card shifts-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <input class="form-check-input form-check-input-lg border-secondary"
                                                    type="checkbox" value="" id="open-shifts-10">
                                            </div>
                                            <div class="col-md-6 d-grid">
                                                <strong class="mb-2">1 Position</strong>
                                                <p class="text-primary fw-500 mb-3">Elevate Care North Branch</p>
                                                <span>
                                                    <i class="fa-regular fa-regular fa-square text-danger"></i>
                                                    <i class="fa-solid fa-flag-pennant text-highlight mx-2"></i>
                                                    <i class="fa-solid fa-shield-check" style="color: #21D0B3"></i>
                                                </span>
                                            </div>
                                            <div class="col-md-4 d-grid justify-items-end">
                                                <span
                                                    class="badge custom-badge-rn w-fit-content h-fit-content fs-5 mb-3">RN</span>
                                                <small class="text-muted fw-semibold">7:00AM - 3:00PM</small>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="col mb-5">
                                <label for="open-shifts-11" class="card shifts-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <input class="form-check-input form-check-input-lg border-secondary"
                                                    type="checkbox" value="" id="open-shifts-11">
                                            </div>
                                            <div class="col-md-6 d-grid">
                                                <strong class="mb-2">1 Position</strong>
                                                <p class="text-primary fw-500 mb-3">Elevate Care North Branch</p>
                                                <span>
                                                    <i class="fa-regular fa-regular fa-square text-danger"></i>
                                                    <i class="fa-solid fa-flag-pennant text-highlight mx-2"></i>
                                                    <i class="fa-solid fa-shield-check" style="color: #21D0B3"></i>
                                                </span>
                                            </div>
                                            <div class="col-md-4 d-grid justify-items-end">
                                                <span
                                                    class="badge custom-badge-rn w-fit-content h-fit-content fs-5 mb-3">RN</span>
                                                <small class="text-muted fw-semibold">7:00AM - 3:00PM</small>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="col mb-5">
                                <label for="open-shifts-12" class="card shifts-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <input class="form-check-input form-check-input-lg border-secondary"
                                                    type="checkbox" value="" id="open-shifts-12">
                                            </div>
                                            <div class="col-md-6 d-grid">
                                                <strong class="mb-2">1 Position</strong>
                                                <p class="text-primary fw-500 mb-3">Elevate Care North Branch</p>
                                                <span>
                                                    <i class="fa-regular fa-regular fa-square text-danger"></i>
                                                    <i class="fa-solid fa-flag-pennant text-highlight mx-2"></i>
                                                    <i class="fa-solid fa-shield-check" style="color: #21D0B3"></i>
                                                </span>
                                            </div>
                                            <div class="col-md-4 d-grid justify-items-end">
                                                <span
                                                    class="badge custom-badge-lpn w-fit-content h-fit-content fs-5 mb-3">LPN</span>
                                                <small class="text-muted fw-semibold">7:00AM - 3:00PM</small>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="col mb-5">
                                <label for="open-shifts-13" class="card shifts-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <input class="form-check-input form-check-input-lg border-secondary"
                                                    type="checkbox" value="" id="open-shifts-13">
                                            </div>
                                            <div class="col-md-6 d-grid">
                                                <strong class="mb-2">1 Position</strong>
                                                <p class="text-primary fw-500 mb-3">Elevate Care North Branch</p>
                                                <span>
                                                    <i class="fa-regular fa-regular fa-square text-danger"></i>
                                                    <i class="fa-solid fa-flag-pennant text-highlight mx-2"></i>
                                                    <i class="fa-solid fa-shield-check" style="color: #21D0B3"></i>
                                                </span>
                                            </div>
                                            <div class="col-md-4 d-grid justify-items-end">
                                                <span
                                                    class="badge custom-badge-rn w-fit-content h-fit-content fs-5 mb-3">RN</span>
                                                <small class="text-muted fw-semibold">7:00AM - 3:00PM</small>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="col mb-5">
                                <label for="open-shifts-14" class="card shifts-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <input class="form-check-input form-check-input-lg border-secondary"
                                                    type="checkbox" value="" id="open-shifts-14">
                                            </div>
                                            <div class="col-md-6 d-grid">
                                                <strong class="mb-2">1 Position</strong>
                                                <p class="text-primary fw-500 mb-3">Elevate Care North Branch</p>
                                                <span>
                                                    <i class="fa-regular fa-regular fa-square text-danger"></i>
                                                    <i class="fa-solid fa-flag-pennant text-highlight mx-2"></i>
                                                    <i class="fa-solid fa-shield-check" style="color: #21D0B3"></i>
                                                </span>
                                            </div>
                                            <div class="col-md-4 d-grid justify-items-end">
                                                <span
                                                    class="badge custom-badge-rn w-fit-content h-fit-content fs-5 mb-3">RN</span>
                                                <small class="text-muted fw-semibold">7:00AM - 3:00PM</small>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="col mb-5">
                                <label for="open-shifts-15" class="card shifts-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <input class="form-check-input form-check-input-lg border-secondary"
                                                    type="checkbox" value="" id="open-shifts-15">
                                            </div>
                                            <div class="col-md-6 d-grid">
                                                <strong class="mb-2">1 Position</strong>
                                                <p class="text-primary fw-500 mb-3">Elevate Care North Branch</p>
                                                <span>
                                                    <i class="fa-regular fa-regular fa-square text-danger"></i>
                                                    <i class="fa-solid fa-flag-pennant text-highlight mx-2"></i>
                                                    <i class="fa-solid fa-shield-check" style="color: #21D0B3"></i>
                                                </span>
                                            </div>
                                            <div class="col-md-4 d-grid justify-items-end">
                                                <span
                                                    class="badge custom-badge-rn w-fit-content h-fit-content fs-5 mb-3">RN</span>
                                                <small class="text-muted fw-semibold">7:00AM - 3:00PM</small>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <nav>
                                <ul class="pagination gap-2">
                                    <li class="page-item">
                                        <span class="page-link rounded-circle" aria-hidden="true"><i
                                                class="fa-regular fa-chevron-left"></i></span>
                                    </li>
                                    <li class="page-item active" aria-current="page"><span
                                            class="page-link rounded-circle">1</span></li>
                                    <li class="page-item">
                                        <a class="page-link rounded-circle" href="javascript:void(0)">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link rounded-circle" href="javascript:void(0)" rel="next"
                                            aria-label="Next »"><i class="fa-regular fa-chevron-right"></i></a>
                                    </li>
                                </ul>
                            </nav>
                            <div>
                                <span class="me-5"><i
                                        class="fa-regular fa-regular fa-square text-danger me-2"></i>Open</span>
                                <span class="me-5"><i
                                        class="fa-solid fa-regular fa-square text-success me-2"></i>Assigned</span>
                                <span class="me-5"><i
                                        class="fa-solid fa-flag-pennant text-highlight me-2"></i>Incentive</span>
                                <span class="me-5"><i class="fa-solid fa-shield-check me-2"
                                        style="color: #21D0B3"></i><strong>Guarantee</strong></span>
                                <span class="me-5"><i class="fa-regular fa-watch text-primary me-2"></i>Late</span>
                                <span class="me-5"><i class="fa-regular fa-user-xmark text-primary me-2"></i>Call
                                    Off</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="v-pills-confirmed-shifts" role="tabpanel"
                aria-labelledby="v-pills-confirmed-shifts-tab">
                <div class="card bg-white border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-6">
                            <p><strong>30</strong> Assigned shifts found out of <strong>54</strong> shifts</p>
                            <span>
                                <span class="badge custom-badge-danger fs-6 px-3 me-2"><i
                                        class="fa-regular fa-trash-can"></i></span>
                                <button type="button" class="btn btn-secondary fs-6 px-5 py-2"><i
                                        class="fa-regular fa-sliders-up me-2"></i>Filter</button>
                            </span>
                        </div>
                        <div class="row row-cols-lg-3 row-cols-md-2 mb-5">
                            <div class="col mb-5">
                                <label for="open-shifts-1" class="card shifts-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <input class="form-check-input form-check-input-lg border-secondary"
                                                    type="checkbox" value="" id="open-shifts-1">
                                            </div>
                                            <div class="col-md-6 d-grid">
                                                <strong class="mb-2">1 Position</strong>
                                                <p class="text-primary fw-500 mb-3">Elevate Care North Branch</p>
                                                <span>
                                                    <i class="fa-regular fa-regular fa-square text-danger"></i>
                                                    <i class="fa-solid fa-flag-pennant text-highlight mx-2"></i>
                                                    <i class="fa-solid fa-shield-check" style="color: #21D0B3"></i>
                                                </span>
                                            </div>
                                            <div class="col-md-4 d-grid justify-items-end">
                                                <span
                                                    class="badge custom-badge-rn w-fit-content h-fit-content fs-5 mb-3">RN</span>
                                                <small class="text-muted fw-semibold">7:00AM - 3:00PM</small>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="col mb-5">
                                <label for="open-shifts-2" class="card shifts-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <input class="form-check-input form-check-input-lg border-secondary"
                                                    type="checkbox" value="" id="open-shifts-2">
                                            </div>
                                            <div class="col-md-6 d-grid">
                                                <strong class="mb-2">1 Position</strong>
                                                <p class="text-primary fw-500 mb-3">Elevate Care North Branch</p>
                                                <span>
                                                    <i class="fa-regular fa-regular fa-square text-danger"></i>
                                                    <i class="fa-solid fa-flag-pennant text-highlight mx-2"></i>
                                                    <i class="fa-solid fa-shield-check" style="color: #21D0B3"></i>
                                                </span>
                                            </div>
                                            <div class="col-md-4 d-grid justify-items-end">
                                                <span
                                                    class="badge custom-badge-rn w-fit-content h-fit-content fs-5 mb-3">RN</span>
                                                <small class="text-muted fw-semibold">7:00AM - 3:00PM</small>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="col mb-5">
                                <label for="open-shifts-3" class="card shifts-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <input class="form-check-input form-check-input-lg border-secondary"
                                                    type="checkbox" value="" id="open-shifts-3">
                                            </div>
                                            <div class="col-md-6 d-grid">
                                                <strong class="mb-2">1 Position</strong>
                                                <p class="text-primary fw-500 mb-3">Elevate Care North Branch</p>
                                                <span>
                                                    <i class="fa-regular fa-regular fa-square text-danger"></i>
                                                    <i class="fa-solid fa-flag-pennant text-highlight mx-2"></i>
                                                    <i class="fa-solid fa-shield-check" style="color: #21D0B3"></i>
                                                </span>
                                            </div>
                                            <div class="col-md-4 d-grid justify-items-end">
                                                <span
                                                    class="badge custom-badge-rn w-fit-content h-fit-content fs-5 mb-3">RN</span>
                                                <small class="text-muted fw-semibold">7:00AM - 3:00PM</small>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="col mb-5">
                                <label for="open-shifts-4" class="card shifts-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <input class="form-check-input form-check-input-lg border-secondary"
                                                    type="checkbox" value="" id="open-shifts-4">
                                            </div>
                                            <div class="col-md-6 d-grid">
                                                <strong class="mb-2">1 Position</strong>
                                                <p class="text-primary fw-500 mb-3">Elevate Care North Branch</p>
                                                <span>
                                                    <i class="fa-regular fa-regular fa-square text-danger"></i>
                                                    <i class="fa-solid fa-flag-pennant text-highlight mx-2"></i>
                                                    <i class="fa-solid fa-shield-check" style="color: #21D0B3"></i>
                                                </span>
                                            </div>
                                            <div class="col-md-4 d-grid justify-items-end">
                                                <span
                                                    class="badge custom-badge-rn w-fit-content h-fit-content fs-5 mb-3">RN</span>
                                                <small class="text-muted fw-semibold">7:00AM - 3:00PM</small>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="col mb-5">
                                <label for="open-shifts-5" class="card shifts-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <input class="form-check-input form-check-input-lg border-secondary"
                                                    type="checkbox" value="" id="open-shifts-5">
                                            </div>
                                            <div class="col-md-6 d-grid">
                                                <strong class="mb-2">1 Position</strong>
                                                <p class="text-primary fw-500 mb-3">Elevate Care North Branch</p>
                                                <span>
                                                    <i class="fa-regular fa-regular fa-square text-danger"></i>
                                                    <i class="fa-solid fa-flag-pennant text-highlight mx-2"></i>
                                                    <i class="fa-solid fa-shield-check" style="color: #21D0B3"></i>
                                                </span>
                                            </div>
                                            <div class="col-md-4 d-grid justify-items-end">
                                                <span
                                                    class="badge custom-badge-lpn w-fit-content h-fit-content fs-5 mb-3">LPN</span>
                                                <small class="text-muted fw-semibold">7:00AM - 3:00PM</small>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="col mb-5">
                                <label for="open-shifts-6" class="card shifts-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <input class="form-check-input form-check-input-lg border-secondary"
                                                    type="checkbox" value="" id="open-shifts-6">
                                            </div>
                                            <div class="col-md-6 d-grid">
                                                <strong class="mb-2">1 Position</strong>
                                                <p class="text-primary fw-500 mb-3">Elevate Care North Branch</p>
                                                <span>
                                                    <i class="fa-regular fa-regular fa-square text-danger"></i>
                                                    <i class="fa-solid fa-flag-pennant text-highlight mx-2"></i>
                                                    <i class="fa-solid fa-shield-check" style="color: #21D0B3"></i>
                                                </span>
                                            </div>
                                            <div class="col-md-4 d-grid justify-items-end">
                                                <span
                                                    class="badge custom-badge-rn w-fit-content h-fit-content fs-5 mb-3">RN</span>
                                                <small class="text-muted fw-semibold">7:00AM - 3:00PM</small>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="col mb-5">
                                <label for="open-shifts-7" class="card shifts-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <input class="form-check-input form-check-input-lg border-secondary"
                                                    type="checkbox" value="" id="open-shifts-7">
                                            </div>
                                            <div class="col-md-6 d-grid">
                                                <strong class="mb-2">1 Position</strong>
                                                <p class="text-primary fw-500 mb-3">Elevate Care North Branch</p>
                                                <span>
                                                    <i class="fa-regular fa-regular fa-square text-danger"></i>
                                                    <i class="fa-solid fa-flag-pennant text-highlight mx-2"></i>
                                                    <i class="fa-solid fa-shield-check" style="color: #21D0B3"></i>
                                                </span>
                                            </div>
                                            <div class="col-md-4 d-grid justify-items-end">
                                                <span
                                                    class="badge custom-badge-rn w-fit-content h-fit-content fs-5 mb-3">RN</span>
                                                <small class="text-muted fw-semibold">7:00AM - 3:00PM</small>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="col mb-5">
                                <label for="open-shifts-8" class="card shifts-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <input class="form-check-input form-check-input-lg border-secondary"
                                                    type="checkbox" value="" id="open-shifts-8">
                                            </div>
                                            <div class="col-md-6 d-grid">
                                                <strong class="mb-2">1 Position</strong>
                                                <p class="text-primary fw-500 mb-3">Elevate Care North Branch</p>
                                                <span>
                                                    <i class="fa-regular fa-regular fa-square text-danger"></i>
                                                    <i class="fa-solid fa-flag-pennant text-highlight mx-2"></i>
                                                    <i class="fa-solid fa-shield-check" style="color: #21D0B3"></i>
                                                </span>
                                            </div>
                                            <div class="col-md-4 d-grid justify-items-end">
                                                <span
                                                    class="badge custom-badge-rn w-fit-content h-fit-content fs-5 mb-3">RN</span>
                                                <small class="text-muted fw-semibold">7:00AM - 3:00PM</small>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="col mb-5">
                                <label for="open-shifts-9" class="card shifts-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <input class="form-check-input form-check-input-lg border-secondary"
                                                    type="checkbox" value="" id="open-shifts-9">
                                            </div>
                                            <div class="col-md-6 d-grid">
                                                <strong class="mb-2">1 Position</strong>
                                                <p class="text-primary fw-500 mb-3">Elevate Care North Branch</p>
                                                <span>
                                                    <i class="fa-regular fa-regular fa-square text-danger"></i>
                                                    <i class="fa-solid fa-flag-pennant text-highlight mx-2"></i>
                                                    <i class="fa-solid fa-shield-check" style="color: #21D0B3"></i>
                                                </span>
                                            </div>
                                            <div class="col-md-4 d-grid justify-items-end">
                                                <span
                                                    class="badge custom-badge-lpn w-fit-content h-fit-content fs-5 mb-3">LPN</span>
                                                <small class="text-muted fw-semibold">7:00AM - 3:00PM</small>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="col mb-5">
                                <label for="open-shifts-10" class="card shifts-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <input class="form-check-input form-check-input-lg border-secondary"
                                                    type="checkbox" value="" id="open-shifts-10">
                                            </div>
                                            <div class="col-md-6 d-grid">
                                                <strong class="mb-2">1 Position</strong>
                                                <p class="text-primary fw-500 mb-3">Elevate Care North Branch</p>
                                                <span>
                                                    <i class="fa-regular fa-regular fa-square text-danger"></i>
                                                    <i class="fa-solid fa-flag-pennant text-highlight mx-2"></i>
                                                    <i class="fa-solid fa-shield-check" style="color: #21D0B3"></i>
                                                </span>
                                            </div>
                                            <div class="col-md-4 d-grid justify-items-end">
                                                <span
                                                    class="badge custom-badge-rn w-fit-content h-fit-content fs-5 mb-3">RN</span>
                                                <small class="text-muted fw-semibold">7:00AM - 3:00PM</small>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="col mb-5">
                                <label for="open-shifts-11" class="card shifts-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <input class="form-check-input form-check-input-lg border-secondary"
                                                    type="checkbox" value="" id="open-shifts-11">
                                            </div>
                                            <div class="col-md-6 d-grid">
                                                <strong class="mb-2">1 Position</strong>
                                                <p class="text-primary fw-500 mb-3">Elevate Care North Branch</p>
                                                <span>
                                                    <i class="fa-regular fa-regular fa-square text-danger"></i>
                                                    <i class="fa-solid fa-flag-pennant text-highlight mx-2"></i>
                                                    <i class="fa-solid fa-shield-check" style="color: #21D0B3"></i>
                                                </span>
                                            </div>
                                            <div class="col-md-4 d-grid justify-items-end">
                                                <span
                                                    class="badge custom-badge-rn w-fit-content h-fit-content fs-5 mb-3">RN</span>
                                                <small class="text-muted fw-semibold">7:00AM - 3:00PM</small>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="col mb-5">
                                <label for="open-shifts-12" class="card shifts-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <input class="form-check-input form-check-input-lg border-secondary"
                                                    type="checkbox" value="" id="open-shifts-12">
                                            </div>
                                            <div class="col-md-6 d-grid">
                                                <strong class="mb-2">1 Position</strong>
                                                <p class="text-primary fw-500 mb-3">Elevate Care North Branch</p>
                                                <span>
                                                    <i class="fa-regular fa-regular fa-square text-danger"></i>
                                                    <i class="fa-solid fa-flag-pennant text-highlight mx-2"></i>
                                                    <i class="fa-solid fa-shield-check" style="color: #21D0B3"></i>
                                                </span>
                                            </div>
                                            <div class="col-md-4 d-grid justify-items-end">
                                                <span
                                                    class="badge custom-badge-lpn w-fit-content h-fit-content fs-5 mb-3">LPN</span>
                                                <small class="text-muted fw-semibold">7:00AM - 3:00PM</small>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="col mb-5">
                                <label for="open-shifts-13" class="card shifts-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <input class="form-check-input form-check-input-lg border-secondary"
                                                    type="checkbox" value="" id="open-shifts-13">
                                            </div>
                                            <div class="col-md-6 d-grid">
                                                <strong class="mb-2">1 Position</strong>
                                                <p class="text-primary fw-500 mb-3">Elevate Care North Branch</p>
                                                <span>
                                                    <i class="fa-regular fa-regular fa-square text-danger"></i>
                                                    <i class="fa-solid fa-flag-pennant text-highlight mx-2"></i>
                                                    <i class="fa-solid fa-shield-check" style="color: #21D0B3"></i>
                                                </span>
                                            </div>
                                            <div class="col-md-4 d-grid justify-items-end">
                                                <span
                                                    class="badge custom-badge-rn w-fit-content h-fit-content fs-5 mb-3">RN</span>
                                                <small class="text-muted fw-semibold">7:00AM - 3:00PM</small>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="col mb-5">
                                <label for="open-shifts-14" class="card shifts-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <input class="form-check-input form-check-input-lg border-secondary"
                                                    type="checkbox" value="" id="open-shifts-14">
                                            </div>
                                            <div class="col-md-6 d-grid">
                                                <strong class="mb-2">1 Position</strong>
                                                <p class="text-primary fw-500 mb-3">Elevate Care North Branch</p>
                                                <span>
                                                    <i class="fa-regular fa-regular fa-square text-danger"></i>
                                                    <i class="fa-solid fa-flag-pennant text-highlight mx-2"></i>
                                                    <i class="fa-solid fa-shield-check" style="color: #21D0B3"></i>
                                                </span>
                                            </div>
                                            <div class="col-md-4 d-grid justify-items-end">
                                                <span
                                                    class="badge custom-badge-rn w-fit-content h-fit-content fs-5 mb-3">RN</span>
                                                <small class="text-muted fw-semibold">7:00AM - 3:00PM</small>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="col mb-5">
                                <label for="open-shifts-15" class="card shifts-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <input class="form-check-input form-check-input-lg border-secondary"
                                                    type="checkbox" value="" id="open-shifts-15">
                                            </div>
                                            <div class="col-md-6 d-grid">
                                                <strong class="mb-2">1 Position</strong>
                                                <p class="text-primary fw-500 mb-3">Elevate Care North Branch</p>
                                                <span>
                                                    <i class="fa-regular fa-regular fa-square text-danger"></i>
                                                    <i class="fa-solid fa-flag-pennant text-highlight mx-2"></i>
                                                    <i class="fa-solid fa-shield-check" style="color: #21D0B3"></i>
                                                </span>
                                            </div>
                                            <div class="col-md-4 d-grid justify-items-end">
                                                <span
                                                    class="badge custom-badge-rn w-fit-content h-fit-content fs-5 mb-3">RN</span>
                                                <small class="text-muted fw-semibold">7:00AM - 3:00PM</small>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <nav>
                                <ul class="pagination gap-2">
                                    <li class="page-item">
                                        <span class="page-link rounded-circle" aria-hidden="true"><i
                                                class="fa-regular fa-chevron-left"></i></span>
                                    </li>
                                    <li class="page-item active" aria-current="page"><span
                                            class="page-link rounded-circle">1</span></li>
                                    <li class="page-item">
                                        <a class="page-link rounded-circle" href="javascript:void(0)">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link rounded-circle" href="javascript:void(0)" rel="next"
                                            aria-label="Next »"><i class="fa-regular fa-chevron-right"></i></a>
                                    </li>
                                </ul>
                            </nav>
                            <div>
                                <span class="me-5"><i
                                        class="fa-regular fa-regular fa-square text-danger me-2"></i>Open</span>
                                <span class="me-5"><i
                                        class="fa-solid fa-regular fa-square text-success me-2"></i>Assigned</span>
                                <span class="me-5"><i
                                        class="fa-solid fa-flag-pennant text-highlight me-2"></i>Incentive</span>
                                <span class="me-5"><i class="fa-solid fa-shield-check me-2"
                                        style="color: #21D0B3"></i><strong>Guarantee</strong></span>
                                <span class="me-5"><i class="fa-regular fa-watch text-primary me-2"></i>Late</span>
                                <span class="me-5"><i class="fa-regular fa-user-xmark text-primary me-2"></i>Call
                                    Off</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="v-pills-shift-progress" role="tabpanel"
                aria-labelledby="v-pills-shift-progress-tab">
                <div class="card bg-white border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-6">
                            <p><strong>20</strong> Clocked-In shifts found out of <strong>54</strong> shifts</p>
                            <span>
                                <span class="badge custom-badge-danger fs-6 px-3 me-2"><i
                                        class="fa-regular fa-trash-can"></i></span>
                                <button type="button" class="btn btn-secondary fs-6 px-5 py-2"><i
                                        class="fa-regular fa-sliders-up me-2"></i>Filter</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="v-pills-completed-shifts" role="tabpanel"
                aria-labelledby="v-pills-completed-shifts-tab">
                <div class="card bg-white border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-6">
                            <p><strong>8</strong> Completed shifts found out of <strong>54</strong> shifts</p>
                            <span>
                                <span class="badge custom-badge-danger fs-6 px-3 me-2"><i
                                        class="fa-regular fa-trash-can"></i></span>
                                <button type="button" class="btn btn-secondary fs-6 px-5 py-2"><i
                                        class="fa-regular fa-sliders-up me-2"></i>Filter</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="v-pills-call-offs-shifts" role="tabpanel"
                aria-labelledby="v-pills-call-offs-shifts-tab">
                <div class="card bg-white border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-6">
                            <p><strong>2</strong> Call Offs shifts found out of <strong>54</strong> shifts</p>
                            <span>
                                <span class="badge custom-badge-danger fs-6 px-3 me-2"><i
                                        class="fa-regular fa-trash-can"></i></span>
                                <button type="button" class="btn btn-secondary fs-6 px-5 py-2"><i
                                        class="fa-regular fa-sliders-up me-2"></i>Filter</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="v-pills-facility-cancellation" role="tabpanel"
                aria-labelledby="v-pills-facility-cancellation-tab">
                <div class="card bg-white border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-6">
                            <p><strong>0</strong> Facility Cancellation shifts found out of <strong>54</strong> shifts</p>
                            <span>
                                <span class="badge custom-badge-danger fs-6 px-3 me-2"><i
                                        class="fa-regular fa-trash-can"></i></span>
                                <button type="button" class="btn btn-secondary fs-6 px-5 py-2"><i
                                        class="fa-regular fa-sliders-up me-2"></i>Filter</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="v-pills-late" role="tabpanel" aria-labelledby="v-pills-late-tab">
                <div class="card bg-white border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-6">
                            <p><strong>0</strong> Late shifts found out of <strong>54</strong> shifts</p>
                            <span>
                                <span class="badge custom-badge-danger fs-6 px-3 me-2"><i
                                        class="fa-regular fa-trash-can"></i></span>
                                <button type="button" class="btn btn-secondary fs-6 px-5 py-2"><i
                                        class="fa-regular fa-sliders-up me-2"></i>Filter</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Begin::Filter Aside -->
        <div class="offcanvas offcanvas-end border-start-0" tabindex="-1" id="shifts_filter_aside"
            aria-labelledby="shifts_filter_asideLabel"
            style="border-top: 5px solid var(--bs-secondary); top:80px; width:370px;">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title fw-bold" id="shifts_filter_asideLabel">Apply Filter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <form class="offcanvas-body">
                <div class="form-group">
                    <select name="emp_name" id="emp_name" class="form-select rounded-pill text-dark fw-500">
                        <option value="" >Employee Name</option>
                        <option value="" >Employee Name</option>
                        <option value="" >Employee Name</option>
                        <option value="" >Employee Name</option>
                    </select>
                </div>
                <div class="form-group">
                    <select name="role" id="role" class="form-select rounded-pill text-dark fw-500">
                        <option value="" selected="" disabled="">Role</option>
                    </select>
                </div>
                <div class="form-group">
                    <select name="date" id="date" class="form-select rounded-pill text-dark fw-500">
                        <option value="" selected="" disabled="">Date</option>
                    </select>
                </div>
                <label for="shift time" class="form-label fw-bold text-dark fs-5">Shift Time</label>
                <div class="form-group shift-time">
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
                        <input class="d-none" type="checkbox" id="night_shift" name="shift_time">
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
                <div class="text-center">
                    <button type="button" class="btn btn-secondary btn-lg rounded-pill px-10 me-3">APPLY</button>
                    <button type="button" class="btn btn-muted btn-lg rounded-pill px-10">RESET</button>
                </div>
            </form>
        </div>
        <!-- End::Filter Aside -->

        <!-- End::Content -->
    </div>
@endsection

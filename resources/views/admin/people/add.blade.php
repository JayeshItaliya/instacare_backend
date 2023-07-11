@extends('admin.theme.default')
@section('title')
    Add People
@endsection
@section('content')
    <div class="container-fluid content d-flex flex-column ">
        <!-- Begin::Content -->
        <div class="row align-items-center justify-content-between mb-3">
            <div class="col-auto">
                <div class="d-flex align-items-center">
                    <a href="{{ route('people.index') }}" class="btn bg-white text-secondary rounded-circle me-3"><i
                            class="fa-regular fa-chevron-left"></i></a>
                    <h3 class="fw-bold">Add People</h3>
                </div>
            </div>
        </div>
        <div class="card bg-white border-0">
            <form method="POST" action="{{ route('people.store') }}" enctype="multipart/form-data" class="card-body">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="row align-items-center mb-5">
                            <div class="col-auto">
                                <div class="people-image">
                                    <i class="fa-light fa-user"></i>
                                    <img id="uploadedImage" src="" alt="" srcset="">
                                </div>
                            </div>
                            <div class="col-auto">
                                <label for="open_gallery" class="custom-input-file py-4 cursor-pointer px-12 d-grid ">
                                    <i class="fa-light fa-image text-secondary fs-5 pb-2"></i>Open Gallery
                                </label>
                                <input type="file" class="d-none" value="{{ old('image') }}" name="image" id="open_gallery" accept=".jpg, .png, .jpeg">
                            </div>
                            <div class="col-auto">
                                <label for="camera" class="custom-input-file py-4 cursor-pointer px-17 d-grid ">
                                    <i class="fa-light fa-camera text-secondary fs-5 pb-2"></i>Camera
                                </label>
                                {{-- <input type="file" class="d-none" id="camera" accept=".jpg, .png, .jpeg" capture="user"> --}}
                            </div>

                            {{-- <div class="row">
                                <div class="col-md-6">
                                    <!-- <div id="my_camera"></div> <br/> -->
                                    <input type=button value="Take Snapshot" onClick="take_snapshot()">
                                    <input type="hidden" name="snap_image" class="image-tag">
                                </div>
                            </div> --}}

                            <div class="col-auto">
                                <small class="text-muted">Maximum size: 10MB</small>
                            </div>
                        </div>
                        @error('image')
                            <span class="text-danger fs-9">{{ $message }}</span>
                        @enderror
                        <div class="row mb-4">
                            <strong class="text-primary fs-5 mb-4">Account Information</strong>
                            <div class="form-group col-md-3">
                                <input type="text" value="{{ old('fname') }}" name="fname" id="fname" class="form-control form-control-lg rounded-pill" placeholder="First Name">
                                @error('fname') <span class="text-danger fs-9">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" value="{{ old('lname') }}" name="lname" id="lname" class="form-control form-control-lg rounded-pill" placeholder="Last Name">
                                @error('lname') <span class="text-danger fs-9">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <input type="number" value="{{ old('phone') }}" name="phone" id="phone" class="form-control form-control-lg rounded-pill" placeholder="Phone Number">
                                @error('phone') <span class="text-danger fs-9">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email_address" value="{{ old('email_address') }}" name="email_address" id="email_address" class="form-control form-control-lg rounded-pill" placeholder="Email Address">
                                @error('email_address') <span class="text-danger fs-9">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <select name="role" id="role" class="form-select rounded-pill">
                                    <option value="rn" {{ old('role') == 'rn' ? 'selected' : '' }}>RN</option>
                                    <option value="lpn" {{ old('role') == 'lpn' ? 'selected' : '' }}>LPN</option>
                                    <option value="cna" {{ old('role') == 'cna' ? 'selected' : '' }}>CNA</option>
                                </select>
                                @error('role') <span class="text-danger fs-9">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <strong class="text-primary fs-5 mb-4">Address</strong>
                            <div class="form-group col-md-6">
                                <select name="country" id="country" class="form-select rounded-pill">
                                    @foreach (Helper::countries_list() as $country)
                                        <option value="{{ $country }}"
                                            {{ old('country') == $country ? 'selected' : '' }}>{{ $country }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('country') <span class="text-danger fs-9">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" value="{{ old('city') }}" name="city" id="city" class="form-control form-control-lg rounded-pill" placeholder="City">
                                @error('city') <span class="text-danger fs-9">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" value="{{ old('state') }}" name="state" id="state" class="form-control form-control-lg rounded-pill" placeholder="State">
                                @error('state') <span class="text-danger fs-9">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" value="{{ old('zipcode') }}" name="zipcode" id="zipcode" class="form-control form-control-lg rounded-pill" placeholder="ZIP">
                                @error('zipcode') <span class="text-danger fs-9">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <strong class="text-primary fs-5 mb-4">General</strong>
                            <div class="form-group col-md-6">
                                <select name="timezone" id="timezone" class="form-select rounded-pill">
                                    @foreach (Helper::timezones_list() as $timezone)
                                        <option value="{{ $timezone }}"
                                            {{ old('timezone') == $timezone ? 'selected' : '' }}>{{ $timezone }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('timezone') <span class="text-danger fs-9">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <select name="language" id="language" class="form-select rounded-pill">
                                    <option value="English" {{ old('language') == 'English' ? 'selected' : '' }}>English
                                    </option>
                                </select>
                                @error('language') <span class="text-danger fs-9">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <strong class="text-primary fs-5 mb-4">Basic Information</strong>
                            <div class="form-group col-md-6">
                                <input type="text" value="{{ old('driver_license_number') }}"
                                    name="driver_license_number" id="driver_license_number" class="form-control form-control-lg rounded-pill" placeholder="Driver License Number">
                                @error('driver_license_number') <span class="text-danger fs-9">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" value="{{ old('driver_license_status') }}"
                                    name="driver_license_status" id="driver_license_status" class="form-control form-control-lg rounded-pill" placeholder="Driver License Status">
                                @error('driver_license_status') <span class="text-danger fs-9">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" value="{{ old('ssn_tax_id') }}" name="ssn_tax_id" id="ssn_tax_id" class="form-control form-control-lg rounded-pill" placeholder="SSN/TaxID">
                                @error('ssn_tax_id') <span class="text-danger fs-9">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <select name="uniform_size" id="uniform_size" class="form-select rounded-pill">
                                    <option value="S" {{ old('uniform_size') == 'S' ? 'selected' : '' }}>S</option>
                                    <option value="M" {{ old('uniform_size') == 'M' ? 'selected' : '' }}>M</option>
                                    <option value="L" {{ old('uniform_size') == 'L' ? 'selected' : '' }}>L</option>
                                    <option value="XL" {{ old('uniform_size') == 'XL' ? 'selected' : '' }}>XL</option>
                                    <option value="2XL" {{ old('uniform_size') == '2XL' ? 'selected' : '' }}>2XL
                                    </option>
                                    <option value="3XL" {{ old('uniform_size') == '3XL' ? 'selected' : '' }}>3XL
                                    </option>
                                </select>
                                @error('uniform_size') <span class="text-danger fs-9">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <strong class="text-primary fs-5 mb-4">Emergency Contact</strong>
                            <div class="form-group col-md-6">
                                <input type="text" value="{{ old('emr_contact_name') }}" name="emr_contact_name" class="form-control form-control-lg rounded-pill" placeholder="Contact Person Name">
                                @error('emr_contact_name') <span class="text-danger fs-9">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" value="{{ old('emr_contact_phone') }}" name="emr_contact_phone" class="form-control form-control-lg rounded-pill" placeholder="Contact Person Phone">
                                @error('emr_contact_phone') <span class="text-danger fs-9">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <select name="emr_contact_relationship" id="emr_contact_relationship" class="form-select rounded-pill">
                                    <option value="Mother"
                                        {{ old('emr_contact_relationship') == 'Mother' ? 'selected' : '' }}>Mother
                                    </option>
                                    <option value="Father"
                                        {{ old('emr_contact_relationship') == 'Father' ? 'selected' : '' }}>Father</option>
                                    <option value="Spouse"
                                        {{ old('emr_contact_relationship') == 'Spouse' ? 'selected' : '' }}>Spouse</option>
                                    <option value="Child"
                                        {{ old('emr_contact_relationship') == 'Child' ? 'selected' : '' }}>
                                        Child</option>
                                    <option value="Sibling"
                                        {{ old('emr_contact_relationship') == 'Sibling' ? 'selected' : '' }}>Sibling
                                    </option>
                                    <option value="Grandparent"
                                        {{ old('emr_contact_relationship') == 'Grandparent' ? 'selected' : '' }}>
                                        Grandparent
                                    </option>
                                    <option value="Grandchild"
                                        {{ old('emr_contact_relationship') == 'Grandchild' ? 'selected' : '' }}>Grandchild
                                    </option>
                                    <option value="Aunt"
                                        {{ old('emr_contact_relationship') == 'Aunt' ? 'selected' : '' }}>
                                        Aunt</option>
                                    <option value="Uncle"
                                        {{ old('emr_contact_relationship') == 'Uncle' ? 'selected' : '' }}>
                                        Uncle</option>
                                    <option value="Cousin"
                                        {{ old('emr_contact_relationship') == 'Cousin' ? 'selected' : '' }}>Cousin</option>
                                    <option value="Friend"
                                        {{ old('emr_contact_relationship') == 'Friend' ? 'selected' : '' }}>Friend</option>
                                    <option value="Roommate"
                                        {{ old('emr_contact_relationship') == 'Roommate' ? 'selected' : '' }}>Roommate
                                    </option>
                                    <option value="Neighbor"
                                        {{ old('emr_contact_relationship') == 'Neighbor' ? 'selected' : '' }}>Neighbor
                                    </option>
                                </select>
                                @error('emr_contact_relationship') <span class="text-danger fs-9">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" value="{{ old('emr_contact_miles') }}" name="emr_contact_miles" id="emr_contact_miles" class="form-control form-control-lg rounded-pill" placeholder="How many miles you willing to...">
                                @error('emr_contact_miles') <span class="text-danger fs-9">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" value="{{ old('emr_contact_license_number') }}"
                                    name="emr_contact_license_number" id="emr_contact_license_number" class="form-control form-control-lg rounded-pill" placeholder="RN/LPN/CNA License Number">
                                @error('emr_contact_license_number') <span class="text-danger fs-9">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <strong class="text-primary fs-5 mb-4">Employee Checklist</strong>
                            <div class="form-group">
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="emp_w4">IL W-4 (Withholding /
                                        Exemptions)</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="emp_w4"
                                        name="emp_w4" checked>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="emp_verification">Employment
                                        Verification</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="emp_verification"
                                        name="emp_verification" checked>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="emp_background">Background Check
                                        Authentication Form</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="emp_background"
                                        name="emp_background" checked>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="emp_direct">Direct Deposit
                                        Form</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="emp_direct"
                                        name="emp_direct" checked>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="emp_health_ins">Health Insurance
                                        Achknowledgement Form</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="emp_health_ins"
                                        name="emp_health_ins" checked>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="emp_8850">8850</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="emp_8850"
                                        checked name="emp_8850">

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="emp_crp">CPR
                                        Certification</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="emp_crp"
                                        name="emp_crp" checked>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="emp_handbook">Employee
                                        Handbook</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="emp_handbook"
                                        name="emp_handbook" checked>

                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <strong class="text-primary fs-5 mb-4">Immunization</strong>
                            <div class="form-group">
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="imm_tb_test">Verify TB Test Results
                                        (Annual)</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="imm_tb_test"
                                        name="imm_tb_test" checked>

                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="form-group col-md-6">
                                    <label for="start_tb_test_date" class="form-label">Start TB Test Date</label>
                                    <input type="date"name="start_tb_test_date"
                                        value="{{ old('start_tb_test_date') }}" class="form-control form-control-lg rounded-pill">
                                    @error('start_tb_test_date')
                                        <span class="text-danger fs-9">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="end_tb_test_date" class="form-label">Last TB Test Date</label>
                                    <input type="date"name="end_tb_test_date" value="{{ old('end_tb_test_date') }}" class="form-control form-control-lg rounded-pill">
                                    @error('end_tb_test_date')
                                        <span class="text-danger fs-9">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="imm_covid19_date" class="form-label">COVID-19 Immunization Date</label>
                                    <input type="date"name="imm_covid19_date" value="{{ old('imm_covid19_date') }}" class="form-control form-control-lg rounded-pill">
                                    @error('imm_covid19_date')
                                        <span class="text-danger fs-9">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="imm_employee">Employee Infuenza
                                        Vaccine Consent - Declination Form</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="imm_employee"
                                        name="imm_employee" checked>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="imm_religious">Religious Exemption
                                        Form - Employee Influeza</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="imm_religious"
                                        name="imm_religious" checked>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="imm_medical">Medical Exemption Form
                                        - Employee Influeza</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="imm_medical"
                                        name="imm_medical" checked>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row mb-4">
                            <strong class="fs-5 mb-4">Access</strong>
                            <div class="col-md-6 me-5">
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="dashboard">Dashboard</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="dashboard"
                                        name="dashboard" checked>
                                </div>

                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="my_availability">My Availability</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="my_availability"
                                        name="my_availability" checked>
                                </div>

                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="schedule">Schedule</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="schedule"
                                        name="schedule" checked>
                                </div>

                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="timecards">Timecards</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="timecards"
                                        name="timecards" checked>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="access_messaging">Messaging</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="access_messaging"
                                        name="access_messaging" checked>
                                </div>
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="facilities">Facilities</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="facilities"
                                        name="facilities" checked>
                                </div>
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="payroll">Payroll</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="payroll"
                                        name="payroll" checked>
                                </div>
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="support">Support</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="support"
                                        name="support" checked>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <strong class="fs-5 mb-4">Permissions</strong>
                            <div class="col-md-6 me-5">
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="clock_in_shifts">Clock In Shifts</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="clock_in_shifts"
                                        name="clock_in_shifts" checked>
                                </div>
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="clock_out_shifts">Clock Out
                                        Shifts</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="clock_out_shifts"
                                        name="clock_out_shifts" checked>
                                </div>
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="cancel_shifts">Cancel Shifts</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="cancel_shifts"
                                        name="cancel_shifts" checked>
                                </div>
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="signature">Signature</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="signature"
                                        name="signature" checked>
                                </div>
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="accepting_shifts">Accepting
                                        Shifts</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="accepting_shifts"
                                        name="accepting_shifts" checked>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="per_messaging">Messaging</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="per_messaging"
                                        name="per_messaging" checked>
                                </div>
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="download_timecard">Download
                                        Timecard</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="download_timecard" name="download_timecard" checked>
                                </div>
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="report_an_issue">Report an Issue</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="report_an_issue"
                                        name="report_an_issue" checked>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <strong class="fs-5 mb-4">Notifications</strong>
                            <div class="col-md-6 me-5">
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="text">Text Message</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="text"
                                        name="text" checked>
                                </div>
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="email">Email</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="email"
                                        name="email" checked>
                                </div>
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="in_app">In App
                                        Notifications</label>
                                    <input class="form-check-input" type="checkbox" role="switch" name="in_app" id="in_app" checked>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <strong class="fs-5 mb-4">Other</strong>
                            <div class="col-md-9 me-5">
                                <div class="row">
                                    <div class="form-group col-md-8 mb-0">
                                        <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                            <label class="form-check-label default" for="automatic_clock_out">Automatic
                                                Clock-Out</label>
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                name="automatic_clock_out" id="text_message" checked>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="form-group col-md-8 mb-0">
                                        <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                            <label class="form-check-label default"
                                                for="restrict_clock_in_before_shift">Restrict Clock-In Before Shift</label>
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                name="restrict_clock_in_before_shift" id="email" checked>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 mb-2">
                                        <select name="restrict_clock_in_before_shift_time_period" id="restrict_clock_in_before_shift_time_period" class="form-select rounded-pill">
                                            <option value="5">5 Min</option>
                                            <option value="10">10 Min</option>
                                            <option value="20">20 Min</option>
                                            <option value="30" selected>30 Min</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-8 mb-0">
                                        <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                            <label class="form-check-label default"
                                                for="restrict_clock_in_during_the_shift">Restrict Clock-In During the
                                                shift</label>
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                name="restrict_clock_in_during_the_shift" id="in_app_notifications"
                                                checked>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 mb-2">
                                        <select name="restrict_clock_in_during_the_shift_time_period" id="restrict_clock_in_during_the_shift_time_period" class="form-select rounded-pill">
                                            <option value="5">5 Min</option>
                                            <option value="10">10 Min</option>
                                            <option value="20">20 Min</option>
                                            <option value="30" selected>30 Min</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-8 mb-0">
                                        <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                            <label class="form-check-label default" for="point_expiry_date">Point Expiry
                                                Date</label>
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                name="point_expiry_date" id="point_expiry_date" checked>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 mb-2">
                                        <select name="point_expiry_date_time_period" id="point_expiry_date_time_period" class="form-select rounded-pill">
                                            <option value="15">15 Days</option>
                                            <option value="30">30 Days</option>
                                            <option value="45">45 Days</option>
                                            <option value="90" selected>90 Days</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-8 mb-0">
                                        <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                            <label class="form-check-label default"
                                                for="incentives_who_havent_clock_in">Incentives who haven’t
                                                clock-in</label>
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                name="incentives_who_havent_clock_in" id="in_app_notifications" checked>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 mb-2">
                                        <select name="incentives_who_havent_clock_in_time_period" id="incentives_who_havent_clock_in_time_period" class="form-select rounded-pill">
                                            <option value="15">15 Days</option>
                                            <option value="30">30 Days</option>
                                            <option value="45">45 Days</option>
                                            <option value="90" selected>90 Days</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit"
                            class="btn btn-secondary rounded-pill py-2 me-3 text-white text-uppercase">Save</button>
                        <a class="btn btn-muted rounded-pill py-2 text-white text-uppercase"
                            href="http://192.168.0.112/instacare/profile">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
        <!-- End::Content -->
    </div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <script language="JavaScript">
        // Webcam.set({
        //     width: 490,
        //     height: 350,
        //     image_format: 'jpeg',
        //     jpeg_quality: 90
        // });
        // Webcam.attach('#my_camera');
        // function take_snapshot() {
        //     Webcam.snap(function(data_uri) {
        //         $(".image-tag").val(data_uri);
        //         $("#uploadedImage").attr('src',data_uri);
        //     });
        // }
    </script>
    <script>
        $(document).ready(function() {
            // Open Gallery: Handle file input change event
            $('#uploadedImage').hide();
            $('#open_gallery').change(function() {
                var file = $(this)[0].files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        // Replace the image source with the uploaded image
                        $('#uploadedImage').show();
                        $('.people-image i').remove();
                        $('#uploadedImage').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Camera: Handle file input change event
            // $('#camera').change(function() {
            //     var file = $(this)[0].files[0];
            //     if (file) {
            //         var reader = new FileReader();
            //         reader.onload = function(e) {
            //             // Replace the image source with the captured image
            //             $('#uploadedImage').attr('src', e.target.result);
            //         };
            //         reader.readAsDataURL(file);
            //     }
            // });

            // // Camera: Handle click event to open the device's camera
            // $('#camera').click(function() {
            //     // Check if the browser supports getUserMedia
            //     if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
            //         navigator.mediaDevices.getUserMedia({
            //                 video: true
            //             })
            //             .then(function(stream) {
            //                 // Stop any previous video stream
            //                 var videoElement = document.querySelector('#uploadedImage');
            //                 if (videoElement.srcObject) {
            //                     var prevStream = videoElement.srcObject;
            //                     var tracks = prevStream.getTracks();
            //                     tracks.forEach(function(track) {
            //                         track.stop();
            //                     });
            //                 }

            //                 // Replace the image source with the camera stream
            //                 videoElement.srcObject = stream;
            //             })
            //             .catch(function(error) {
            //                 console.log('Error accessing the camera: ', error);
            //             });
            //     }
            // });
        });
    </script>
@endsection

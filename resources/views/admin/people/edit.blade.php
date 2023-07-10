@extends('admin.theme.default')
@section('title')
    Edit People
@endsection
@section('content')
    <div class="container-fluid content d-flex flex-column ">
        <!-- Begin::Content -->
        <div class="row align-items-center justify-content-between mb-3">
            <div class="col-auto">
                <div class="d-flex align-items-center">
                    <a href="{{ route('people.index') }}" class="btn bg-white text-secondary rounded-circle me-3"><i
                            class="fa-regular fa-chevron-left"></i></a>
                    <h3 class="fw-bold">Edit People</h3>
                </div>
            </div>
        </div>
        <div class="card bg-white border-0">
            <form method="POST" action="{{ route('people.update', [$peopledata->id]) }}" enctype="multipart/form-data"
                class="card-body">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="row align-items-center mb-5">
                            <div class="col-auto">
                                <div class="people-image">
                                    <img id="uploadedImage" src="{{ Helper::image_path($peopledata->image) }}"
                                        alt="" srcset="">
                                </div>
                            </div>
                            <div class="col-auto">
                                <label for="open_gallery" class="custom-input-file py-4 cursor-pointer px-12 d-grid ">
                                    <i class="fa-light fa-image text-secondary fs-5 pb-2"></i>Open Gallery
                                </label>
                                <input type="file" class="d-none" value="{{ old('image') }}" name="image"
                                    id="open_gallery" accept=".jpg, .png, .jpeg">
                            </div>
                            <div class="col-auto">
                                <label for="camera" class="custom-input-file py-4 cursor-pointer px-17 d-grid ">
                                    <i class="fa-light fa-camera text-secondary fs-5 pb-2"></i>Camera
                                </label>
                                <input type="file" class="d-none" id="camera" accept=".jpg, .png, .jpeg"
                                    capture="user">
                            </div>
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
                                <input type="text" value="{{ empty(old('fname')) ? $peopledata->fname : old('fname') }}"
                                    name="fname" id="fname" class="form-control form-control-lg rounded-pill"
                                    placeholder="First Name">
                                @error('fname')
                                    <span class="text-danger fs-9">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" value="{{ empty(old('lname')) ? $peopledata->lname : old('lname') }}"
                                    name="lname" id="lname" class="form-control form-control-lg rounded-pill"
                                    placeholder="Last Name">
                                @error('lname')
                                    <span class="text-danger fs-9">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <input type="number" value="{{ empty(old('phone')) ? $peopledata->phone : old('phone') }}"
                                    name="phone" id="phone" class="form-control form-control-lg rounded-pill"
                                    placeholder="Phone Number">
                                @error('phone')
                                    <span class="text-danger fs-9">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email_address"
                                    value="{{ empty(old('email_address')) ? $peopledata->email : old('email_address') }}"
                                    name="email_address" id="email_address"
                                    class="form-control form-control-lg rounded-pill" placeholder="Email Address">
                                @error('email_address')
                                    <span class="text-danger fs-9">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <select name="role" id="role" class="form-select rounded-pill">
                                    <option value="rn"
                                        {{ empty(old('role')) && $peopledata->role == 'rn' ? 'selected' : (old('role') == 'rn' ? 'selected' : '') }}>
                                        RN</option>
                                    <option value="lpn"
                                        {{ empty(old('role')) && $peopledata->role == 'lpn' ? 'selected' : (old('role') == 'lpn' ? 'selected' : '') }}>
                                        LPN</option>
                                    <option value="cna"
                                        {{ empty(old('role')) && $peopledata->role == 'cna' ? 'selected' : (old('role') == 'cna' ? 'selected' : '') }}>
                                        CNA</option>
                                </select>
                                @error('role')
                                    <span class="text-danger fs-9">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <strong class="text-primary fs-5 mb-4">Address</strong>
                            <div class="form-group col-md-6">
                                <select name="country" id="country" class="form-select rounded-pill">
                                    @foreach (Helper::countries_list() as $country)
                                        <option value="{{ $country }}"
                                            {{ empty(old('country')) && $peopledata->country == $country ? 'selected' : old('country') == $country ?? 'selected' }}>
                                            {{ $country }}</option>
                                    @endforeach
                                </select>
                                @error('country')
                                    <span class="text-danger fs-9">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" value="{{ empty(old('city')) ? $peopledata->city : old('city') }}"
                                    name="city" id="city" class="form-control form-control-lg rounded-pill"
                                    placeholder="City">
                                @error('city')
                                    <span class="text-danger fs-9">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text"
                                    value="{{ empty(old('state')) ? $peopledata->state : old('state') }}" name="state"
                                    id="state" class="form-control form-control-lg rounded-pill" placeholder="State">
                                @error('state')
                                    <span class="text-danger fs-9">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text"
                                    value="{{ empty(old('zipcode')) ? $peopledata->zipcode : old('zipcode') }}"
                                    name="zipcode" id="zipcode" class="form-control form-control-lg rounded-pill"
                                    placeholder="ZIP">
                                @error('zipcode')
                                    <span class="text-danger fs-9">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <strong class="text-primary fs-5 mb-4">General</strong>
                            <div class="form-group col-md-6">
                                <select name="timezone" id="timezone" class="form-select rounded-pill">
                                    @foreach (Helper::timezones_list() as $timezone)
                                        <option value="{{ $timezone }}"
                                            {{ empty(old('timezone')) && $peopledata->timezone == $timezone ? 'selected' : old('timezone') == $timezone ?? 'selected' }}>
                                            {{ $timezone }}</option>
                                    @endforeach
                                </select>
                                @error('timezone')
                                    <span class="text-danger fs-9">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <select name="language" id="language" class="form-select rounded-pill">
                                    <option value="English"
                                        {{ empty(old('language')) && $peopledata->language == 'English' ? 'selected' : old('language') == 'English' ?? 'selected' }}>
                                        English
                                    </option>
                                </select>
                                @error('language')
                                    <span class="text-danger fs-9">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <strong class="text-primary fs-5 mb-4">Basic Information</strong>
                            <div class="form-group col-md-6">
                                <input type="text"
                                    value="{{ empty(old('driver_license_number')) ? $peopledata->people_info->driver_license_number : old('driver_license_number') }}"
                                    name="driver_license_number" id="driver_license_number"
                                    class="form-control form-control-lg rounded-pill" placeholder="Driver License Number">
                                @error('license_number')
                                    <span class="text-danger fs-9">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text"
                                    value="{{ empty(old('driver_license_status')) ? $peopledata->people_info->driver_license_status : old('driver_license_status') }}"
                                    name="driver_license_status" id="driver_license_status"
                                    class="form-control form-control-lg rounded-pill" placeholder="Driver License Status">
                                @error('license_status')
                                    <span class="text-danger fs-9">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text"
                                    value="{{ empty(old('ssn_tax_id')) ? $peopledata->people_info->ssn_tax_id : old('ssn_tax_id') }}"
                                    name="ssn_tax_id" id="ssn_tax_id" class="form-control form-control-lg rounded-pill"
                                    placeholder="SSN/TaxID">
                                @error('taxid')
                                    <span class="text-danger fs-9">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <select name="uniform_size" id="uniform_size" class="form-select rounded-pill">
                                    <option value="S"
                                        {{ empty(old('uniform_size')) && $peopledata->people_info->uniform_size == 'S' ? 'selected' : old('uniform_size') == 'S' ?? 'selected' }}>
                                        S</option>
                                    <option value="M"
                                        {{ empty(old('uniform_size')) && $peopledata->people_info->uniform_size == 'M' ? 'selected' : old('uniform_size') == 'M' ?? 'selected' }}>
                                        M</option>
                                    <option value="L"
                                        {{ empty(old('uniform_size')) && $peopledata->people_info->uniform_size == 'L' ? 'selected' : old('uniform_size') == 'L' ?? 'selected' }}>
                                        L</option>
                                    <option value="XL"
                                        {{ empty(old('uniform_size')) && $peopledata->people_info->uniform_size == 'XL' ? 'selected' : old('uniform_size') == 'XL' ?? 'selected' }}>
                                        XL</option>
                                    <option value="2XL"
                                        {{ empty(old('uniform_size')) && $peopledata->people_info->uniform_size == '2XL' ? 'selected' : old('uniform_size') == '2XL' ?? 'selected' }}>
                                        2XL</option>
                                    <option value="3XL"
                                        {{ empty(old('uniform_size')) && $peopledata->people_info->uniform_size == '3XL' ? 'selected' : old('uniform_size') == '3XL' ?? 'selected' }}>
                                        3XL</option>
                                </select>
                                @error('uniform_size')
                                    <span class="text-danger fs-9">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <strong class="text-primary fs-5 mb-4">Emergency Contact</strong>
                            <div class="form-group col-md-6">
                                <input type="text"
                                    value="{{ empty(old('emr_contact_name')) ? $peopledata->people_info->emr_contact_name : old('emr_contact_name') }}"
                                    name="emr_contact_name" class="form-control form-control-lg rounded-pill"
                                    placeholder="Contact Person Name">
                                @error('emr_contact_name')
                                    <span class="text-danger fs-9">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text"
                                    value="{{ empty(old('emr_contact_phone')) ? $peopledata->people_info->emr_contact_phone : old('emr_contact_phone') }}"
                                    name="emr_contact_phone" class="form-control form-control-lg rounded-pill"
                                    placeholder="Contact Person Phone">
                                @error('emr_contact_phone')
                                    <span class="text-danger fs-9">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <select name="emr_contact_relationship" id="emr_contact_relationship"
                                    class="form-select rounded-pill">
                                    <option value="Mother"
                                        {{ empty(old('emr_contact_relationship')) && $peopledata->people_info->emr_contact_relationship == 'Mother' ? 'selected' : old('emr_contact_relationship') == 'Mother' ?? 'selected' }}>
                                        Mother</option>
                                    <option value="Father"
                                        {{ empty(old('emr_contact_relationship')) && $peopledata->people_info->emr_contact_relationship == 'Father' ? 'selected' : old('emr_contact_relationship') == 'Father' ?? 'selected' }}>
                                        Father</option>
                                    <option value="Spouse"
                                        {{ empty(old('emr_contact_relationship')) && $peopledata->people_info->emr_contact_relationship == 'Spouse' ? 'selected' : old('emr_contact_relationship') == 'Spouse' ?? 'selected' }}>
                                        Spouse</option>
                                    <option value="Child"
                                        {{ empty(old('emr_contact_relationship')) && $peopledata->people_info->emr_contact_relationship == 'Child' ? 'selected' : old('emr_contact_relationship') == 'Child' ?? 'selected' }}>
                                        Child</option>
                                    <option value="Sibling"
                                        {{ empty(old('emr_contact_relationship')) && $peopledata->people_info->emr_contact_relationship == 'Sibling' ? 'selected' : old('emr_contact_relationship') == 'Sibling' ?? 'selected' }}>
                                        Sibling</option>
                                    <option value="Grandparent"
                                        {{ empty(old('emr_contact_relationship')) && $peopledata->people_info->emr_contact_relationship == 'Grandparent' ? 'selected' : old('emr_contact_relationship') == 'Grandparent' ?? 'selected' }}>
                                        Grandparent
                                    </option>
                                    <option value="Grandchild"
                                        {{ empty(old('emr_contact_relationship')) && $peopledata->people_info->emr_contact_relationship == 'Grandchild' ? 'selected' : old('emr_contact_relationship') == 'Grandchild' ?? 'selected' }}>
                                        Grandchild
                                    </option>
                                    <option value="Aunt"
                                        {{ empty(old('emr_contact_relationship')) && $peopledata->people_info->emr_contact_relationship == 'Aunt' ? 'selected' : old('emr_contact_relationship') == 'Aunt' ?? 'selected' }}>
                                        Aunt</option>
                                    <option value="Uncle"
                                        {{ empty(old('emr_contact_relationship')) && $peopledata->people_info->emr_contact_relationship == 'Uncle' ? 'selected' : old('emr_contact_relationship') == 'Uncle' ?? 'selected' }}>
                                        Uncle</option>
                                    <option value="Cousin"
                                        {{ empty(old('emr_contact_relationship')) && $peopledata->people_info->emr_contact_relationship == 'Cousin' ? 'selected' : old('emr_contact_relationship') == 'Cousin' ?? 'selected' }}>
                                        Cousin</option>
                                    <option value="Friend"
                                        {{ empty(old('emr_contact_relationship')) && $peopledata->people_info->emr_contact_relationship == 'Friend' ? 'selected' : old('emr_contact_relationship') == 'Friend' ?? 'selected' }}>
                                        Friend</option>
                                    <option value="Roommate"
                                        {{ empty(old('emr_contact_relationship')) && $peopledata->people_info->emr_contact_relationship == 'Roommate' ? 'selected' : old('emr_contact_relationship') == 'Roommate' ?? 'selected' }}>
                                        Roommate</option>
                                    <option value="Neighbor"
                                        {{ empty(old('emr_contact_relationship')) && $peopledata->people_info->emr_contact_relationship == 'Neighbor' ? 'selected' : old('emr_contact_relationship') == 'Neighbor' ?? 'selected' }}>
                                        Neighbor</option>
                                </select>
                                @error('emr_contact_relationship')
                                    <span class="text-danger fs-9">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text"
                                    value="{{ empty(old('emr_contact_miles')) ? $peopledata->people_info->emr_contact_miles : old('emr_contact_miles') }}"
                                    name="emr_contact_miles" id="emr_contact_miles"
                                    class="form-control form-control-lg rounded-pill"
                                    placeholder="How many miles you willing to...">
                                @error('emr_contact_miles')
                                    <span class="text-danger fs-9">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text"
                                    value="{{ empty(old('emr_contact_license_number')) ? $peopledata->people_info->emr_contact_license_number : old('emr_contact_license_number') }}"
                                    name="emr_contact_license_number" id="emr_contact_license_number"
                                    class="form-control form-control-lg rounded-pill"
                                    placeholder="RN/LPN/CNA License Number">
                                @error('emr_contact_license_number')
                                    <span class="text-danger fs-9">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <strong class="text-primary fs-5 mb-4">Employee Checklist</strong>
                            <div class="form-group">
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="emp_w4">IL W-4 (Withholding /
                                        Exemptions)</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="emp_w4"
                                        name="emp_w4" {{ $peopledata->people_info->emp_w4 == 1 ? 'checked' : '' }}>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="emp_verification">Employment
                                        Verification</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="emp_verification"
                                        name="emp_verification"
                                        {{ $peopledata->people_info->emp_verification == 1 ? 'checked' : '' }}>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="emp_background">Background Check
                                        Authentication Form</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="emp_background"
                                        name="emp_background"
                                        {{ $peopledata->people_info->emp_background == 1 ? 'checked' : '' }}>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="emp_direct">Direct Deposit
                                        Form</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="emp_direct"
                                        name="emp_direct"
                                        {{ $peopledata->people_info->emp_direct == 1 ? 'checked' : '' }}>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="emp_health_ins">Health Insurance
                                        Achknowledgement Form</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="emp_health_ins"
                                        name="emp_health_ins"
                                        {{ $peopledata->people_info->emp_health_ins == 1 ? 'checked' : '' }}>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="emp_8850">8850</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="emp_8850"
                                        name="emp_8850" {{ $peopledata->people_info->emp_8850 == 1 ? 'checked' : '' }}>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="emp_crp">CPR
                                        Certification</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="emp_crp"
                                        name="emp_crp" {{ $peopledata->people_info->emp_crp == 1 ? 'checked' : '' }}>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="emp_handbook">Employee
                                        Handbook</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="emp_handbook"
                                        name="emp_handbook"
                                        {{ $peopledata->people_info->emp_handbook == 1 ? 'checked' : '' }}>

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
                                        name="imm_tb_test"
                                        {{ $peopledata->people_info->imm_tb_test == 1 ? 'checked' : '' }}>

                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="form-group col-md-6">
                                    <label for="start_tb_test_date" class="form-label">Start TB Test Date</label>
                                    <input type="date"name="start_tb_test_date"
                                        value="{{ empty(old('start_tb_test_date')) ? $peopledata->people_info->start_tb_test_date : old('start_tb_test_date') }}"
                                        class="form-control form-control-lg rounded-pill">
                                    @error('start_tb_test_date')
                                        <span class="text-danger fs-9">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="end_tb_test_date" class="form-label">Last TB Test Date</label>
                                    <input type="date"name="end_tb_test_date"
                                        value="{{ empty(old('end_tb_test_date')) ? $peopledata->people_info->end_tb_test_date : old('end_tb_test_date') }}"
                                        class="form-control form-control-lg rounded-pill">
                                    @error('end_tb_test_date')
                                        <span class="text-danger fs-9">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="imm_covid19_date" class="form-label">COVID-19 Immunization Date</label>
                                    <input type="date"name="imm_covid19_date"
                                        value="{{ empty(old('imm_covid19_date')) ? $peopledata->people_info->imm_covid19_date : old('imm_covid19_date') }}"
                                        class="form-control form-control-lg rounded-pill">
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
                                        name="imm_employee"
                                        {{ $peopledata->people_info->imm_employee == 1 ? 'checked' : '' }}>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="imm_religious">Religious Exemption
                                        Form - Employee Influeza</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="imm_religious"
                                        name="imm_religious"
                                        {{ $peopledata->people_info->imm_religious == 1 ? 'checked' : '' }}>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="imm_medical">Medical Exemption Form
                                        - Employee Influeza</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="imm_medical"
                                        name="imm_medical"
                                        {{ $peopledata->people_info->imm_medical == 1 ? 'checked' : '' }}>

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
                                        name="dashboard"
                                        {{ $peopledata->user_access_settings->dashboard == 1 ? 'checked' : '' }}>
                                </div>

                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="my_availability">My Availability</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="my_availability"
                                        name="my_availability"
                                        {{ $peopledata->user_access_settings->my_availability == 1 ? 'checked' : '' }}>
                                </div>

                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="schedule">Schedule</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="schedule"
                                        name="schedule"
                                        {{ $peopledata->user_access_settings->schedule == 1 ? 'checked' : '' }}>
                                </div>

                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="timecards">Timecards</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="timecards"
                                        name="timecards"
                                        {{ $peopledata->user_access_settings->timecards == 1 ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="access_messaging">Messaging</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="access_messaging"
                                        name="access_messaging"
                                        {{ $peopledata->user_access_settings->messaging == 1 ? 'checked' : '' }}>
                                </div>
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="facilities">Facilities</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="facilities"
                                        name="facilities"
                                        {{ $peopledata->user_access_settings->facilities == 1 ? 'checked' : '' }}>
                                </div>
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="payroll">Payroll</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="payroll"
                                        name="payroll"
                                        {{ $peopledata->user_access_settings->payroll == 1 ? 'checked' : '' }}>
                                </div>
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="support">Support</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="support"
                                        name="support"
                                        {{ $peopledata->user_access_settings->support == 1 ? 'checked' : '' }}>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <strong class="fs-5 mb-4">Permissions</strong>
                            <div class="col-md-6 me-5">
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="clock_in_shifts">Clock In Shifts</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="clock_in_shifts"
                                        name="clock_in_shifts"
                                        {{ $peopledata->user_permission_settings->clock_in_shifts == 1 ? 'checked' : '' }}>
                                </div>
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="clock_out_shifts">Clock Out
                                        Shifts</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="clock_out_shifts"
                                        name="clock_out_shifts"
                                        {{ $peopledata->user_permission_settings->clock_out_shifts == 1 ? 'checked' : '' }}>
                                </div>
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="cancel_shifts">Cancel Shifts</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="cancel_shifts"
                                        name="cancel_shifts"
                                        {{ $peopledata->user_permission_settings->cancel_shifts == 1 ? 'checked' : '' }}>
                                </div>
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="signature">Signature</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="signature"
                                        name="signature"
                                        {{ $peopledata->user_permission_settings->signature == 1 ? 'checked' : '' }}>
                                </div>
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="accepting_shifts">Accepting
                                        Shifts</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="accepting_shifts"
                                        name="accepting_shifts"
                                        {{ $peopledata->user_permission_settings->accepting_shifts == 1 ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="per_messaging">Messaging</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="per_messaging"
                                        name="per_messaging"
                                        {{ $peopledata->user_permission_settings->messaging == 1 ? 'checked' : '' }}>
                                </div>
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="download_timecard">Download
                                        Timecard</label>
                                    <input class="form-check-input" type="checkbox" role="switch"
                                        id="download_timecard" name="download_timecard"
                                        {{ $peopledata->user_permission_settings->download_timecard == 1 ? 'checked' : '' }}>
                                </div>
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="report_an_issue">Report an Issue</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="report_an_issue"
                                        name="report_an_issue"
                                        {{ $peopledata->user_permission_settings->report_an_issue == 1 ? 'checked' : '' }}>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <strong class="fs-5 mb-4">Notifications</strong>
                            <div class="col-md-6 me-5">
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="text">Text Message</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="text"
                                        name="text"
                                        {{ $peopledata->user_notification_settings->text == 1 ? 'checked' : '' }}>
                                </div>
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="email">Email</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="email"
                                        name="email"
                                        {{ $peopledata->user_notification_settings->email == 1 ? 'checked' : '' }}>
                                </div>
                                <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                    <label class="form-check-label default" for="in_app">In App
                                        Notifications</label>
                                    <input class="form-check-input" type="checkbox" role="switch" name="in_app" id="in_app"
                                        name="in_app"
                                        {{ $peopledata->user_notification_settings->in_app == 1 ? 'checked' : '' }}>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <strong class="fs-5 mb-4">Other</strong>
                            <div class="col-md-9 me-5">
                                <div class="row">
                                    <div class="form-group col-md-8 mb-0">
                                        <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                            <label class="form-check-label default"
                                                for="automatic_clock_out">Automatic
                                                Clock-Out</label>
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                name="automatic_clock_out" id="automatic_clock_out"
                                                {{ $peopledata->user_other_settings->automatic_clock_out == 1 ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="form-group col-md-8 mb-0">
                                        <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                            <label class="form-check-label default"
                                                for="restrict_clock_in_before_shift">Restrict Clock-In Before Shift</label>
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                name="restrict_clock_in_before_shift" id="restrict_clock_in_before_shift"
                                                {{ $peopledata->user_other_settings->restrict_clock_in_before_shift == 1 ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 mb-2">
                                        <select name="restrict_clock_in_before_shift_time_period"
                                            id="restrict_clock_in_before_shift_time_period"
                                            class="form-select rounded-pill">
                                            <option value="5"
                                                {{ $peopledata->user_other_settings->restrict_clock_in_before_shift_time_period == '5' ? 'selected' : '' }}>
                                                5 Min</option>
                                            <option value="10"
                                                {{ $peopledata->user_other_settings->restrict_clock_in_before_shift_time_period == '10' ? 'selected' : '' }}>
                                                10 Min</option>
                                            <option value="20"
                                                {{ $peopledata->user_other_settings->restrict_clock_in_before_shift_time_period == '20' ? 'selected' : '' }}>
                                                20 Min</option>
                                            <option value="30"
                                                {{ $peopledata->user_other_settings->restrict_clock_in_before_shift_time_period == '30' ? 'selected' : '' }}>
                                                30 Min</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-8 mb-0">
                                        <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                            <label class="form-check-label default"
                                                for="restrict_clock_in_during_the_shift">Restrict Clock-In During the
                                                shift</label>
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                name="restrict_clock_in_during_the_shift"
                                                id="restrict_clock_in_during_the_shift"
                                                {{ $peopledata->user_other_settings->restrict_clock_in_during_the_shift == 1 ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 mb-2">
                                        <select name="restrict_clock_in_during_the_shift_time_period"
                                            id="restrict_clock_in_during_the_shift_time_period"
                                            class="form-select rounded-pill">
                                            <option value="5"
                                                {{ $peopledata->user_other_settings->restrict_clock_in_during_the_shift_time_period == '5' ? 'selected' : '' }}>
                                                5 Min</option>
                                            <option value="10"
                                                {{ $peopledata->user_other_settings->restrict_clock_in_during_the_shift_time_period == '10' ? 'selected' : '' }}>
                                                10 Min</option>
                                            <option value="20"
                                                {{ $peopledata->user_other_settings->restrict_clock_in_during_the_shift_time_period == '20' ? 'selected' : '' }}>
                                                20 Min</option>
                                            <option value="30"
                                                {{ $peopledata->user_other_settings->restrict_clock_in_during_the_shift_time_period == '30' ? 'selected' : '' }}>
                                                30 Min</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-8 mb-0">
                                        <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                            <label class="form-check-label default" for="point_expiry_date">Point Expiry
                                                Date</label>
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                name="point_expiry_date" id="point_expiry_date"
                                                {{ $peopledata->user_other_settings->point_expiry_date == 1 ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 mb-2">
                                        <select name="point_expiry_date_time_period" id="point_expiry_date_time_period"
                                            class="form-select rounded-pill">
                                            <option value="15"
                                                {{ $peopledata->user_other_settings->point_expiry_date_time_period == '15' ? 'selected' : '' }}>
                                                15 Days</option>
                                            <option value="30"
                                                {{ $peopledata->user_other_settings->point_expiry_date_time_period == '30' ? 'selected' : '' }}>
                                                30 Days</option>
                                            <option value="45"
                                                {{ $peopledata->user_other_settings->point_expiry_date_time_period == '45' ? 'selected' : '' }}>
                                                45 Days</option>
                                            <option value="90"
                                                {{ $peopledata->user_other_settings->point_expiry_date_time_period == '90' ? 'selected' : '' }}>
                                                90 Days</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-8 mb-0">
                                        <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                            <label class="form-check-label default"
                                                for="incentives_who_havent_clock_in">Incentives who haven’t
                                                clock-in</label>
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                name="incentives_who_havent_clock_in" id="incentives_who_havent_clock_in"
                                                {{ $peopledata->user_other_settings->incentives_who_havent_clock_in == 1 ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 mb-2">
                                        <select name="incentives_who_havent_clock_in_time_period"
                                            id="incentives_who_havent_clock_in_time_period"
                                            class="form-select rounded-pill">
                                            <option value="15"
                                                {{ $peopledata->user_other_settings->incentives_who_havent_clock_in_time_period == '15' ? 'selected' : '' }}>
                                                15 Days</option>
                                            <option value="30"
                                                {{ $peopledata->user_other_settings->incentives_who_havent_clock_in_time_period == '30' ? 'selected' : '' }}>
                                                30 Days</option>
                                            <option value="45"
                                                {{ $peopledata->user_other_settings->incentives_who_havent_clock_in_time_period == '45' ? 'selected' : '' }}>
                                                45 Days</option>
                                            <option value="90"
                                                {{ $peopledata->user_other_settings->incentives_who_havent_clock_in_time_period == '90' ? 'selected' : '' }}>
                                                90 Days</option>
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
                            href="{{route('people.index')}}">Cancel</a>
                    </div>
                </div>
            </form>
            <!-- End::Content -->
        </div>
    @endsection
    @section('script')
        <script>
            $(document).ready(function() {
                // Open Gallery: Handle file input change event
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
                $('#camera').change(function() {
                    var file = $(this)[0].files[0];
                    if (file) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            // Replace the image source with the captured image
                            $('#uploadedImage').attr('src', e.target.result);
                        };
                        reader.readAsDataURL(file);
                    }
                });

                // Camera: Handle click event to open the device's camera
                $('#camera').click(function() {
                    // Check if the browser supports getUserMedia
                    if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                        navigator.mediaDevices.getUserMedia({
                                video: true
                            })
                            .then(function(stream) {
                                // Stop any previous video stream
                                var videoElement = document.querySelector('#uploadedImage');
                                if (videoElement.srcObject) {
                                    var prevStream = videoElement.srcObject;
                                    var tracks = prevStream.getTracks();
                                    tracks.forEach(function(track) {
                                        track.stop();
                                    });
                                }

                                // Replace the image source with the camera stream
                                videoElement.srcObject = stream;
                            })
                            .catch(function(error) {
                                console.log('Error accessing the camera: ', error);
                            });
                    }
                });
            });
        </script>
    @endsection

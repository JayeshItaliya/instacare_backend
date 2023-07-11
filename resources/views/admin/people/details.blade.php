@extends('admin.theme.default')
@section('title')
    People
@endsection
@section('style')
@endsection
@section('content')
    <div class="container-fluid content d-flex flex-column ">
        <!-- Begin::Content -->
        <div class="d-flex align-items-center mb-3">
            <a href="{{ URL::to('people') }}" class="btn bg-white text-secondary rounded-circle me-3"><i
                    class="fa-regular fa-chevron-left"></i></a>
            <h3 class="fw-bold">People</h3>
        </div>
        <div class="card bg-primary border-0 mb-3" data-border-radius="30px">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-1 position-relative">
                        <img src="{{ $peopledata->image_url }}" alt=""
                            class="rounded-circle border border-4 border-highlight object-fit-cover" height="100"
                            width="100">
                        <div class="position-absolute" style="bottom: 5px;right: 15px;">
                            <span
                                class="badge bg-highlight text-white rounded-circel d-flex justify-content-center align-items-center p-2"><i
                                    class="far fa-pen"></i></span>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <h3 class="text-white fw-bold">{{ $peopledata->fullname }}</h3>
                        <p class="mb-3 text-secondary fw-semibold">{{ $peopledata->rolename() }}</p>
                        <div class="row">
                            <div class="col-auto">
                                <p class="text-secondary fw-semibold"><small class="fw-normal fs-9">Emp.ID</small>
                                    {{ $peopledata->id }} </p>
                            </div>
                            <div class="col-auto dropdown">
                                <p class="text-secondary fw-regular cursor-pointer" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <span class="fw-normal">Status:</span>
                                    <i
                                        class="fa-solid fa-circle-small fs-9 text-{{ $peopledata->status == 1 ? 'success' : ($peopledata->status == 2 ? 'warning' : ($peopledata->status == 5 ? 'muted' : 'danger')) }}"></i>
                                    <span class="text-white">{{ $peopledata->status() }}<i
                                            class="fa-regular fa-chevron-down fa-sm ms-2"></i></span>
                                </p>
                                <ul class="dropdown-menu">
                                    <li> <a class="dropdown-item" href="javascript:void()"
                                            onclick="changestatus('{{ URL::to('users/changestatus') }}','{{ $peopledata->id }}',1)">
                                            <i
                                                class="fa-solid fa-circle-small fs-9 me-2 text-success"></i><span>Available</span>
                                        </a> </li>
                                    <li> <a class="dropdown-item"href="javascript:void()"
                                            onclick="changestatus('{{ URL::to('users/changestatus') }}','{{ $peopledata->id }}',2)">
                                            <i class="fa-solid fa-circle-small fs-9 me-2 text-warning"></i><span>Away</span>
                                        </a> </li>
                                    <li> <a class="dropdown-item"href="javascript:void()"
                                            onclick="changestatus('{{ URL::to('users/changestatus') }}','{{ $peopledata->id }}',3)">
                                            <i class="fa-solid fa-circle-small fs-9 me-2 text-danger"></i><span>Busy</span>
                                        </a> </li>
                                    <li> <a class="dropdown-item"href="javascript:void()"
                                            onclick="changestatus('{{ URL::to('users/changestatus') }}','{{ $peopledata->id }}',4)">
                                            <i class="fa-solid fa-circle-small fs-9 me-2 text-danger"></i><span>DND</span>
                                        </a> </li>
                                    <li> <a class="dropdown-item"href="javascript:void()"
                                            onclick="changestatus('{{ URL::to('users/changestatus') }}','{{ $peopledata->id }}',5)">
                                            <i
                                                class="fa-solid fa-circle-small fs-9 me-2 text-muted"></i><span>Offline</span>
                                        </a> </li>
                                </ul>
                            </div>
                            <div class="col-auto">
                                <span class="badge bg-highlight cursor-pointer text-primary fw-bolder py-2 text-lowercase"
                                    data-bs-toggle="offcanvas" data-bs-target="#points_aside" aria-controls="points_aside">
                                    <i class="far fa-clock me-2"></i> 0 pts </span>
                                <span class="badge bg-highlight cursor-pointer text-primary fw-bolder py-2 text-lowercase">
                                    <i class="far fa-star me-2"></i> 5/5 </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a href="javascript:void(0)" class="btn btn-highlight rounded-circle text-white py-3 px-4 me-3"> <i
                                class="far fa-envelope fs-3"></i> </a>
                        <a href="{{ URL::to('people/' . $peopledata->id . '/edit') }}" class="btn btn-secondary">Edit</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card bg-white border-0 mb-3">
            <div class="card-body pb-0">
                <div class="nav nav-underline" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link fw-bold text-muted me-5 active" id="tab-account-info-tab" data-bs-toggle="pill"
                        href="#tab-account-info" role="tab" aria-controls="tab-account-info" aria-selected="true">
                        Account Info </a>
                    <a class="nav-link fw-bold text-muted me-5" id="tab-checklist-tab" data-bs-toggle="pill"
                        href="#tab-checklist" role="tab" aria-controls="tab-checklist" aria-selected="true"> Checklist
                    </a>
                    <a class="nav-link fw-bold text-muted me-5" id="tab-reviews-tab" data-bs-toggle="pill"
                        href="#tab-reviews" role="tab" aria-controls="tab-reviews" aria-selected="true"> Reviews <span
                            class="badge rounded-pill text-bg-highlight py-2">04</span></a>
                    <a class="nav-link fw-bold text-muted me-5" id="tab-documents-tab" data-bs-toggle="pill"
                        href="#tab-documents" role="tab" aria-controls="tab-documents" aria-selected="true">
                        Documents </a>
                </div>
            </div>
        </div>
        <div class="card bg-white border-0 mb-3">
            <div class="card-body">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="tab-account-info" role="tabpanel"
                        aria-labelledby="tab-account-info-tab">
                        <div class="row mb-12">
                            <div class="col-md-4">
                                <h6 class="text-primary fw-bold">Account Information</h6>
                                <div class="row">
                                    <div class="col-md-6 my-2">
                                        <p>First Name</p>
                                        <p class="fw-bold fs-6">{{ $peopledata->fname }}</p>
                                    </div>
                                    <div class="col-md-6 my-2">
                                        <p>Last name</p>
                                        <p class="fw-bold fs-6">{{ $peopledata->lname }}</p>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <p>Email</p>
                                        <p class="fw-bold fs-6">{{ $peopledata->email }}</p>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <p>Phone</p>
                                        <p class="fw-bold fs-6">{{ $peopledata->phone }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h6 class="text-primary fw-bold">Address</h6>
                                <div class="row">
                                    <div class="col-md-6 my-2">
                                        <p>Country</p>
                                        <p class="fw-bold fs-6">{{ $peopledata->country }}</p>
                                    </div>
                                    <div class="col-md-6 my-2">
                                        <p>City</p>
                                        <p class="fw-bold fs-6">{{ $peopledata->city }}</p>
                                    </div>
                                    <div class="col-md-6 my-2">
                                        <p>State</p>
                                        <p class="fw-bold fs-6">{{ $peopledata->state }}</p>
                                    </div>
                                    <div class="col-md-6 my-2">
                                        <p>Zip</p>
                                        <p class="fw-bold fs-6">{{ $peopledata->zipcode }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h6 class="text-primary fw-bold">General</h6>
                                <div class="row">
                                    <div class="col-md-12 my-2">
                                        <p>Timezone</p>
                                        <p class="fw-bold fs-6">{{ $peopledata->timezone }}</p>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <p>Language</p>
                                        <p class="fw-bold fs-6">{{ $peopledata->language }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h6 class="text-primary fw-bold">Notifications</h6>
                                <div class="row mb-5">
                                    <div class="col-8 my-2">
                                        <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                            <label class="form-check-label default" for="send_email">Send Email
                                                Notifications</label>
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                name="send_email" id="send_email">
                                        </div>
                                    </div>
                                    <div class="col-8 mb-2">
                                        <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                            <label class="form-check-label default" for="send_text">Send Text
                                                Notifications</label>
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                name="send_text" id="send_text">
                                        </div>
                                    </div>
                                </div>
                                <h6 class="text-primary fw-bold">Security</h6>
                                <div class="row align-items-center">
                                    <div class="col-lg-6 my-2">
                                        <p>Account Password</p>
                                        <p class="fw-bold fs-6">*****************</p>
                                    </div>
                                    <div class="col-lg-6 my-2"> <button type="button"
                                            class="btn btn-secondary rounded-pill py-2 text-uppercase fs-8 px-5"
                                            data-bs-toggle="modal" data-bs-target="#changepassmodal">Change
                                            password</button> </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h6 class="text-primary fw-bold">Basic Information</h6>
                                <div class="row">
                                    <div class="col-12 my-2">
                                        <p>Effective Start Date</p>
                                        <p class="fw-bold fs-6">{{ Helper::date_format($peopledata->created_at) }}</p>
                                    </div>
                                    <div class="col-12 my-2">
                                        <p>Driver License Number</p>
                                        <p class="fw-bold fs-6">{{ $peopledata->people_info->driver_license_number }}</p>
                                    </div>
                                    <div class="col-12 my-2">
                                        <p>Driver License Status</p>
                                        <p class="fw-bold fs-6">{{ $peopledata->people_info->driver_license_status }}</p>
                                    </div>
                                    <div class="col-12 my-2">
                                        <p>SSN/TaxID</p>
                                        <p class="fw-bold fs-6">••••••••••••••••</p>
                                    </div>
                                    <div class="col-12 my-2">
                                        <p>Uniform Size</p>
                                        <p class="fw-bold fs-6">{{ $peopledata->people_info->uniform_size }}</p>
                                    </div>
                                    <div class="col-8 my-2">
                                        <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                            <label class="form-check-label default" for="drug_screening">Completed Drug
                                                Screening</label>
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                name="drug_screening" id="drug_screening" checked>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h6 class="text-primary fw-bold">Emergency Contact Information</h6>
                                <div class="row">
                                    <div class="col-md-12 my-2">
                                        <p>Emergency Contact Name</p>
                                        <p class="fw-bold fs-6">{{ $peopledata->people_info->emr_contact_name }}</p>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <p>Emergency Contact Number</p>
                                        <p class="fw-bold fs-6">{{ $peopledata->people_info->emr_contact_phone }}</p>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <p>Emergency Contact Relationship</p>
                                        <p class="fw-bold fs-6">{{ $peopledata->people_info->emr_contact_relationship }}
                                        </p>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <p>How many miles you willing to travel to work?</p>
                                        <p class="fw-bold fs-6">{{ $peopledata->people_info->emr_contact_miles }}</p>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <p>RN/LPN/CNA License Number</p>
                                        <p class="fw-bold fs-6">{{ $peopledata->people_info->emr_contact_license_number }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-checklist" role="tabpanel" aria-labelledby="tab-checklist-tab">
                        <div class="row">
                            <div class="col-md-4">
                                <h6 class="text-primary fw-bold mb-3">Documents</h6>
                                <div class="row">
                                    <div class="col-lg-10 col-12 mb-2">
                                        <div
                                            class="form-check form-switch d-flex justify-content-between px-0 mb-2 align-items-center">
                                            <label class="form-check-label default" for="">IL W-4 (Withholding /
                                                Exemptions)</label>
                                            @if (@$peopledata->user_docs->il_w4 == '')
                                                <label for="il_w4" class="badge text-bg-secondary ps-8 pe-8">+
                                                    Add</label>
                                                <input type="file" class="d-none submit_doc" name="il_w4"
                                                    id="il_w4" accept=".jpg,.jpeg" data-fname="il_w4">
                                            @else
                                                <span class="badge text-bg-success">Uploaded</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-10 col-12 mb-2">
                                        <div
                                            class="form-check form-switch d-flex justify-content-between px-0 mb-2 align-items-center">
                                            <label class="form-check-label default" for="">Employment
                                                Verification</label>
                                            @if (@$peopledata->user_docs->emp_verification == '')
                                                <label for="emp_verification" class="badge text-bg-secondary ps-8 pe-8">+
                                                    Add</label>
                                                <input type="file" class="d-none submit_doc" name="emp_verification"
                                                    id="emp_verification" accept=".jpg,.jpeg"
                                                    data-fname="emp_verification">
                                            @else
                                                <span class="badge text-bg-success">Uploaded</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-10 col-12 mb-2">
                                        <div
                                            class="form-check form-switch d-flex justify-content-between px-0 mb-2 align-items-center">
                                            <label class="form-check-label default" for="">Background Check
                                                Authentication Form</label>
                                            @if (@$peopledata->user_docs->bg_auth_form == '')
                                                <label for="bg_auth_form" class="badge text-bg-secondary ps-8 pe-8">+
                                                    Add</label>
                                                <input type="file" class="d-none submit_doc" name="bg_auth_form"
                                                    id="bg_auth_form" accept=".jpg,.jpeg" data-fname="bg_auth_form">
                                            @else
                                                <span class="badge text-bg-success">Uploaded</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-10 col-12 mb-2">
                                        <div
                                            class="form-check form-switch d-flex justify-content-between px-0 mb-2 align-items-center">
                                            <label class="form-check-label default" for="">Direct Deposit
                                                Form</label>
                                            @if (@$peopledata->user_docs->direct_deposit == '')
                                                <label for="direct_deposit" class="badge text-bg-secondary ps-8 pe-8">+
                                                    Add</label>
                                                <input type="file" class="d-none submit_doc" name="direct_deposit"
                                                    id="direct_deposit" accept=".jpg,.jpeg" data-fname="direct_deposit">
                                            @else
                                                <span class="badge text-bg-success">Uploaded</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-10 col-12 mb-2">
                                        <div
                                            class="form-check form-switch d-flex justify-content-between px-0 mb-2 align-items-center">
                                            <label class="form-check-label default" for="">Health Insurance
                                                Acknowledgement Form</label>
                                            @if (@$peopledata->user_docs->health_ins == '')
                                                <label for="health_ins" class="badge text-bg-secondary ps-8 pe-8">+
                                                    Add</label>
                                                <input type="file" class="d-none submit_doc" name="health_ins"
                                                    id="health_ins" accept=".jpg,.jpeg" data-fname="health_ins">
                                            @else
                                                <span class="badge text-bg-success">Uploaded</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-10 col-12 mb-2">
                                        <div
                                            class="form-check form-switch d-flex justify-content-between px-0 mb-2 align-items-center">
                                            <label class="form-check-label default" for="">8850</label>
                                            @if (@$peopledata->user_docs->doc_8850 == '')
                                                <label for="doc_8850" class="badge text-bg-secondary ps-8 pe-8">+
                                                    Add</label>
                                                <input type="file" class="d-none submit_doc" name="doc_8850"
                                                    id="doc_8850" accept=".jpg,.jpeg" data-fname="doc_8850">
                                            @else
                                                <span class="badge text-bg-success">Uploaded</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-10 col-12 mb-2">
                                        <div
                                            class="form-check form-switch d-flex justify-content-between px-0 mb-2 align-items-center">
                                            <label class="form-check-label default" for="">CPR
                                                Certification</label>
                                            @if (@$peopledata->user_docs->crp_certification == '')
                                                <label for="crp_certification" class="badge text-bg-secondary ps-8 pe-8">+
                                                    Add</label>
                                                <input type="file" class="d-none submit_doc" name="crp_certification"
                                                    id="crp_certification" accept=".jpg,.jpeg"
                                                    data-fname="crp_certification">
                                            @else
                                                <span class="badge text-bg-success">Uploaded</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-10 col-12 mb-2">
                                        <div
                                            class="form-check form-switch d-flex justify-content-between px-0 mb-2 align-items-center">
                                            <label class="form-check-label default" for="">Employee
                                                Handbook</label>
                                            @if (@$peopledata->user_docs->emp_handbook == '')
                                                <label for="emp_handbook" class="badge text-bg-secondary ps-8 pe-8">+
                                                    Add</label>
                                                <input type="file" class="d-none submit_doc" name="emp_handbook"
                                                    id="emp_handbook" accept=".jpg,.jpeg" data-fname="emp_handbook">
                                            @else
                                                <span class="badge text-bg-success">Uploaded</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h6 class="text-primary fw-bold mb-3">Immunization</h6>
                                <div class="row">
                                    <div class="col-12 my-2">
                                        <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                            <label class="form-check-label default" for="imm_tb_test">Verify TB Test
                                                Results (Annual)</label>
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                name="imm_tb_test" id="imm_tb_test" checked>
                                        </div>
                                    </div>
                                    <div class="col-12 my-2">
                                        <p class="fs-9"> Start TB Test Date </p>
                                        <p class="fw-semibold fs-6"> February 01, 2023 </p>
                                        {{-- start_tb_test_date --}}
                                    </div>
                                    <div class="col-12 my-2">
                                        <p class="fs-9"> Last TB Test Date </p>
                                        <p class="fw-semibold fs-6"> February 01, 2023 </p>
                                        {{-- end_tb_test_date --}}
                                    </div>
                                    <div class="col-12 my-2">
                                        <p class="fs-9"> COVID-19 Immunization Date </p>
                                        <p class="fw-semibold fs-6"> June 18, 2022 </p>
                                        {{-- imm_covid19_date --}}
                                    </div>
                                    <div class="col-12 my-2">
                                        <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                            <label class="form-check-label default" for="imm_employee">Employee Influenza
                                                Vaccine Consent - Declination Form</label>
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                name="imm_employee" id="imm_employee">
                                        </div>
                                    </div>
                                    <div class="col-12 my-2">
                                        <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                            <label class="form-check-label default" for="imm_religious">Religious
                                                Exemption Form - Employee Influenza</label>
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                name="imm_religious" id="imm_religious">
                                        </div>
                                    </div>
                                    <div class="col-12 my-2">
                                        <div class="form-check form-switch d-flex justify-content-between px-0 mb-2">
                                            <label class="form-check-label default" for="imm_medical">Medical Exemption
                                                Form - Employee Influenza</label>
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                name="imm_medical" id="imm_medical">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-reviews" role="tabpanel" aria-labelledby="tab-reviews-tab">

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item border-0 bg-transparent mb-2">
                                <p class="text-muted"> "Neque porro quisquam est qui dolorem ipsum quia dolor sit amet,
                                    consectetur, adipisci velit..." </p>
                                <p class="fw-bold mb-2"> ~ Center Care </p>
                                <div class="d-flex gap-1 align-items-center">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="fa fa-star text-warning"></i>
                                    @endfor
                                    5/5
                                </div>
                            </li>
                            <li class="list-group-item border-0 bg-transparent mb-2">
                                <p class="text-muted"> “Donec porta tempor sapien nec sagittis. Integer fermentum interdum
                                    interdum. Suspendisse dapibus sem vulputate, convallis leo at, consectetur purus. Cras
                                    lectus tortor, iaculis quis mollis vel, commodo at odio.” </p>
                                <p class="fw-bold mb-2"> ~ Center Care </p>
                                <div class="d-flex gap-1 align-items-center">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="fa fa-star text-warning"></i>
                                    @endfor
                                    5/5
                                </div>
                            </li>
                            <li class="list-group-item border-0 bg-transparent mb-2">
                                <p class="text-muted"> “Fusce eget mattis nulla. Nunc ligula sem, ornare sed feugiat sit
                                    amet, consectetur eget urna. Praesent non fermentum quam, sed tincidunt orci. Ut enim
                                    arcu, pellentesque eu quam in, sollicitudin ultrices tellus. Integer at efficitur arcu.
                                    Duis eleifend, leo sit amet dictum tincidunt, felis ipsum suscipit nisl, in laoreet nibh
                                    elit eu tortor. In pretium felis dolor...” </p>
                                <p class="fw-bold mb-2"> ~ Elevate Care North Branch</p>
                                <div class="d-flex gap-1 align-items-center">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="fa fa-star text-warning"></i>
                                    @endfor
                                    5/5
                                </div>
                            </li>
                            <li class="list-group-item border-0 bg-transparent mb-2">
                                <p class="text-muted"> “Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id
                                    lorem massa. Nam ac ullamcorper quam, vitae elementum risus. In tempus fermentum
                                    accumsan. Suspendisse venenatis dignissim mi, quis pharetra magna tincidunt ut. In
                                    volutpat aliquet leo, nec ornare quam accumsan non. Vestibulum at orci eu ante volutpat
                                    egestas. Morbi at mattis nulla.” </p>
                                <p class="fw-bold mb-2"> ~ Elevate Care North Branch</p>
                                <div class="d-flex gap-1 align-items-center">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="fa fa-star text-warning"></i>
                                    @endfor
                                    5/5
                                </div>
                            </li>
                        </ul>

                        <button type="button" class="btn btn-secondary rounded-pill text-uppercase"
                            data-bs-toggle="offcanvas" data-bs-target="#write_review_aside"
                            aria-controls="write_review_aside">Write review</button>

                    </div>
                    <div class="tab-pane fade" id="tab-documents" role="tabpanel" aria-labelledby="tab-documents-tab">

                        <div class="row">
                            <div class="col-lg-2 col-md-4 col-6">

                                <div class="position-relative text-center" data-border-radius="50px">
                                    <img src="{{ Helper::image_path('') }}" class="card-img" alt="...">
                                    <h5
                                        class="position-absolute bottom-0 text-center w-100 bg-dark text-white fw-normal py-2">
                                        Card title</h5>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Begin::Filter Aside -->
        <div class="offcanvas offcanvas-end border-start-0" tabindex="-1" id="points_aside"
            aria-labelledby="points_asideLabel" style="border-top: 5px solid var(--bs-secondary); top:80px; width:350px;">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title fw-bold" id="points_asideLabel">Granny Points</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-transparent">
                        <p>March 22, 2023</p>
                        <p class="text-primary fw-bold">Care Center</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="fs-7">Late</p>
                            <span class="badge bg-warning text-primary fw-bold">1 pts</span>
                        </div>
                    </li>
                    <li class="list-group-item bg-transparent">
                        <p>March 20, 2023</p>
                        <p class="text-primary fw-bold">Elevate care norths Branch</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="fs-7">No Call No Show</p>
                            <span class="badge bg-warning text-primary fw-bold">2 pts</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- End::Filter Aside -->
        <!-- Begin::Filter Aside -->
        <div class="offcanvas offcanvas-end border-start-0" tabindex="-1" id="write_review_aside"
            aria-labelledby="write_review_asideLabel"
            style="border-top: 5px solid var(--bs-secondary); top:80px; width:350px;">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title fw-bold" id="points_asideLabel">Write Review <p class="fw-normal">Granny
                        Weatherwax</p>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <form action="" method="post">

                    <div class="star-rating d-flex justify-content-around">
                        <input type="radio" class="d-none" name="rating" id="rating-5">
                        <label for="rating-5" class="text-muted"> <i class="fa fa-star fs-2"></i> </label>
                        <input type="radio" class="d-none" name="rating" id="rating-4">
                        <label for="rating-4" class="text-muted"> <i class="fa fa-star fs-2"></i> </label>
                        <input type="radio" class="d-none" name="rating" id="rating-3">
                        <label for="rating-3" class="text-muted"> <i class="fa fa-star fs-2"></i> </label>
                        <input type="radio" class="d-none" name="rating" id="rating-2">
                        <label for="rating-2" class="text-muted"> <i class="fa fa-star fs-2"></i> </label>
                        <input type="radio" class="d-none" name="rating" id="rating-1" checked>
                        <label for="rating-1" class="text-muted"> <i class="fa fa-star fs-2"></i> </label>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="" id="" rows="10" placeholder="Write Your Review"></textarea>
                    </div>
                    <div class="d-block">
                        <button class="btn btn-secondary rounded-pill text-uppercase"> Submit </button>
                        <button class="btn btn-muted rounded-pill text-uppercase"> Cancel </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- End::Filter Aside -->
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
                    <form class="needs-validation" novalidate
                        action="{{ URL::to('people/changepassword/' . $peopledata->id) }}" method="post"
                        id="changepasswordform">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="password" class="form-control rounded-pill" name="current_password"
                                            id="current_password" placeholder="Old Password" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="password" class="form-control rounded-pill" name="new_password"
                                            id="new_password" placeholder="New Password" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="password" class="form-control rounded-pill" name="confirm_password"
                                            id="confirm_password" placeholder="Confirm New Password" required>
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
    </div>
    <!-- End::Content -->
    </div>
@endsection
@section('script')
    <script>
        $('.submit_doc').on('change', function(event) {
            var inputName = $(this).attr('data-fname');
            var element = $('[for="' + inputName + '"]');
            var html = element.html();
            var fileInput = event.target;
            var file = fileInput.files[0];
            var formData = new FormData();
            formData.append('fileContent', file);
            formData.append('inputName', fileInput.name);
            $.ajax({
                url: '{{ URL::to('people/submitdoc/' . $peopledata->id) }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    element.html(my_spinner)
                },
                success: function(r) {
                    element.html(html)
                    if (r.status == 1) {
                        showtoast(1, r.message);
                        location.reload();
                    } else {
                        showtoast(2, r.message);
                    }
                },
                error: function(xhr, status, error) {
                    element.html(html)
                    showtoast(2, wrong);
                }
            });
        });
    </script>
@endsection

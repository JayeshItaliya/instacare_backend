@extends('admin.theme.default')
@section('title') Who’s ON @endsection
@section('content')
    <div class="container-fluid content d-flex flex-column ">
        <!-- Begin::Content -->
        <div class="row align-items-center justify-content-between mb-3">
            <div class="col-auto">
                <div class="d-flex align-items-center">
                    <h3 class="fw-bold">Who’s ON</h3>
                    <div class="d-flex align-items-center mx-3 text-muted fw-semibold fs-8 cursor-pointer ">
                        <p class="datepicker">18 March 2023</p>
                        <i class="fa-solid fa-chevron-down ms-2"></i>
                    </div>
                </div>
            </div>
            <div class="col-auto">
                <a href="{{ URL::to('shifts/create') }}" class="btn btn-highlight text-uppercase rounded-pill fs-8">
                    <i class="fa-regular fa-plus me-2 fs-9"></i>add shift
                </a>
            </div>
        </div>
        <div class="card bg-white border-0 mb-3">
            <div class="card-body pb-0">
                <div class="nav nav-underline" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link fw-bold text-muted me-5 px-10 active" id="v-pills-scheduled-tab"
                        data-bs-toggle="pill" href="#v-pills-scheduled" role="tab" aria-controls="v-pills-scheduled"
                        aria-selected="true">Scheduled</a>
                    <a class="nav-link fw-bold text-muted me-5 px-10" id="v-pills-clocked-in-tab" data-bs-toggle="pill"
                        href="#v-pills-clocked-in" role="tab" aria-controls="v-pills-clocked-in"
                        aria-selected="true">Clocked In</a>
                </div>
            </div>
        </div>
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-scheduled" role="tabpanel"
                aria-labelledby="v-pills-scheduled-tab">
                <div class="card bg-white border-0 mb-3">
                    <div class="card-body">
                        <table id="dataTable" data-toggle="table" class="table-striped">
                            <thead>
                                <tr class="bg-primary text-white">
                                    <th class="fw-normal border-0 text-center" data-field=""></th>
                                    <th class="fw-normal border-0" data-field="name">Name</th>
                                    <th class="fw-normal border-0" data-field="id">ID</th>
                                    <th class="fw-normal border-0" data-field="status">Status</th>
                                    <th class="fw-normal border-0" data-field="profile">Profile</th>
                                    <th class="fw-normal border-0" data-field="points">Points</th>
                                    <th class="fw-normal border-0" data-field="activity">Activity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input class="form-check-input form-check-input-lg border-secondary" type="checkbox"
                                            value="" id="who-on-1"></td>
                                    <td><img src="https://media.istockphoto.com/id/1308571236/photo/medical-concept-of-beautiful-female-doctor-with-stethoscope-waist-up-medical-student-woman.jpg?s=612x612&amp;w=0&amp;k=20&amp;c=bHGISU0YBMsNPG1sSbJ7Q9eVC6I3tK4lmCzfOAY_dRM="
                                            alt="profile" class="object-fit-cover rounded-circle border-light me-3"
                                            width="40" height="40">Maureen Biologist</td>
                                    <td><span class="fw-semibold">001</span></td>
                                    <td>
                                        <span class="position-relative">Available <span
                                                class="ms-2 position-absolute top-50 translate-middle p-1 bg-success rounded-circle"></span></span>
                                    </td>
                                    <td>CNA</td>
                                    <td>01</td>
                                    <td><span class="text-primary fs-8">Starting in 10 min</span></td>
                                </tr>
                                <tr>
                                    <td><input class="form-check-input form-check-input-lg border-secondary" type="checkbox"
                                            value="" id="who-on-1"></td>
                                    <td><img src="https://media.istockphoto.com/id/1308571236/photo/medical-concept-of-beautiful-female-doctor-with-stethoscope-waist-up-medical-student-woman.jpg?s=612x612&amp;w=0&amp;k=20&amp;c=bHGISU0YBMsNPG1sSbJ7Q9eVC6I3tK4lmCzfOAY_dRM="
                                            alt="profile" class="object-fit-cover rounded-circle border-light me-3"
                                            width="40" height="40">Maureen Biologist</td>
                                    <td><span class="fw-semibold">001</span></td>
                                    <td>
                                        <span class="position-relative">Available <span
                                                class="ms-2 position-absolute top-50 translate-middle p-1 bg-success rounded-circle"></span></span>
                                    </td>
                                    <td>CNA</td>
                                    <td>01</td>
                                    <td><span class="text-primary fs-8">Starting in 10 min</span></td>
                                </tr>
                                <tr>
                                    <td><input class="form-check-input form-check-input-lg border-secondary" type="checkbox"
                                            value="" id="who-on-1"></td>
                                    <td><img src="https://media.istockphoto.com/id/1308571236/photo/medical-concept-of-beautiful-female-doctor-with-stethoscope-waist-up-medical-student-woman.jpg?s=612x612&amp;w=0&amp;k=20&amp;c=bHGISU0YBMsNPG1sSbJ7Q9eVC6I3tK4lmCzfOAY_dRM="
                                            alt="profile" class="object-fit-cover rounded-circle border-light me-3"
                                            width="40" height="40">Maureen Biologist</td>
                                    <td><span class="fw-semibold">001</span></td>
                                    <td>
                                        <span class="position-relative">Available <span
                                                class="ms-2 position-absolute top-50 translate-middle p-1 bg-success rounded-circle"></span></span>
                                    </td>
                                    <td>CNA</td>
                                    <td>01</td>
                                    <td><span class="text-danger fs-8">Shift late by 30 min</span></td>
                                </tr>
                                <tr>
                                    <td><input class="form-check-input form-check-input-lg border-secondary" type="checkbox"
                                            value="" id="who-on-1"></td>
                                    <td><img src="https://media.istockphoto.com/id/1308571236/photo/medical-concept-of-beautiful-female-doctor-with-stethoscope-waist-up-medical-student-woman.jpg?s=612x612&amp;w=0&amp;k=20&amp;c=bHGISU0YBMsNPG1sSbJ7Q9eVC6I3tK4lmCzfOAY_dRM="
                                            alt="profile" class="object-fit-cover rounded-circle border-light me-3"
                                            width="40" height="40">Maureen Biologist</td>
                                    <td><span class="fw-semibold">001</span></td>
                                    <td>
                                        <span class="position-relative">Available <span
                                                class="ms-2 position-absolute top-50 translate-middle p-1 bg-success rounded-circle"></span></span>
                                    </td>
                                    <td>CNA</td>
                                    <td>01</td>
                                    <td><span class="text-primary fs-8">Starting in 10 min</span></td>
                                </tr>
                                <tr>
                                    <td><input class="form-check-input form-check-input-lg border-secondary"
                                            type="checkbox" value="" id="who-on-1"></td>
                                    <td><img src="https://media.istockphoto.com/id/1308571236/photo/medical-concept-of-beautiful-female-doctor-with-stethoscope-waist-up-medical-student-woman.jpg?s=612x612&amp;w=0&amp;k=20&amp;c=bHGISU0YBMsNPG1sSbJ7Q9eVC6I3tK4lmCzfOAY_dRM="
                                            alt="profile" class="object-fit-cover rounded-circle border-light me-3"
                                            width="40" height="40">Maureen Biologist</td>
                                    <td><span class="fw-semibold">001</span></td>
                                    <td>
                                        <span class="position-relative">Available <span
                                                class="ms-2 position-absolute top-50 translate-middle p-1 bg-success rounded-circle"></span></span>
                                    </td>
                                    <td>CNA</td>
                                    <td>01</td>
                                    <td><span class="text-primary fs-8">Starting in 10 min</span></td>
                                </tr>
                                <tr>
                                    <td><input class="form-check-input form-check-input-lg border-secondary"
                                            type="checkbox" value="" id="who-on-1"></td>
                                    <td><img src="https://media.istockphoto.com/id/1308571236/photo/medical-concept-of-beautiful-female-doctor-with-stethoscope-waist-up-medical-student-woman.jpg?s=612x612&amp;w=0&amp;k=20&amp;c=bHGISU0YBMsNPG1sSbJ7Q9eVC6I3tK4lmCzfOAY_dRM="
                                            alt="profile" class="object-fit-cover rounded-circle border-light me-3"
                                            width="40" height="40">Maureen Biologist</td>
                                    <td><span class="fw-semibold">001</span></td>
                                    <td>
                                        <span class="position-relative">Available <span
                                                class="ms-2 position-absolute top-50 translate-middle p-1 bg-success rounded-circle"></span></span>
                                    </td>
                                    <td>CNA</td>
                                    <td>01</td>
                                    <td><span class="text-primary fs-8">Starting in 10 min</span></td>
                                </tr>
                                <tr>
                                    <td><input class="form-check-input form-check-input-lg border-secondary"
                                            type="checkbox" value="" id="who-on-1"></td>
                                    <td><img src="https://media.istockphoto.com/id/1308571236/photo/medical-concept-of-beautiful-female-doctor-with-stethoscope-waist-up-medical-student-woman.jpg?s=612x612&amp;w=0&amp;k=20&amp;c=bHGISU0YBMsNPG1sSbJ7Q9eVC6I3tK4lmCzfOAY_dRM="
                                            alt="profile" class="object-fit-cover rounded-circle border-light me-3"
                                            width="40" height="40">Maureen Biologist</td>
                                    <td><span class="fw-semibold">001</span></td>
                                    <td>
                                        <span class="position-relative">Available <span
                                                class="ms-2 position-absolute top-50 translate-middle p-1 bg-success rounded-circle"></span></span>
                                    </td>
                                    <td>CNA</td>
                                    <td>01</td>
                                    <td><span class="text-primary fs-8">Starting in 10 min</span></td>
                                </tr>
                                <tr>
                                    <td><input class="form-check-input form-check-input-lg border-secondary"
                                            type="checkbox" value="" id="who-on-1"></td>
                                    <td><img src="https://media.istockphoto.com/id/1308571236/photo/medical-concept-of-beautiful-female-doctor-with-stethoscope-waist-up-medical-student-woman.jpg?s=612x612&amp;w=0&amp;k=20&amp;c=bHGISU0YBMsNPG1sSbJ7Q9eVC6I3tK4lmCzfOAY_dRM="
                                            alt="profile" class="object-fit-cover rounded-circle border-light me-3"
                                            width="40" height="40">Maureen Biologist</td>
                                    <td><span class="fw-semibold">001</span></td>
                                    <td>
                                        <span class="position-relative">Available <span
                                                class="ms-2 position-absolute top-50 translate-middle p-1 bg-success rounded-circle"></span></span>
                                    </td>
                                    <td>CNA</td>
                                    <td>01</td>
                                    <td><span class="text-primary fs-8">Starting in 10 min</span></td>
                                </tr>
                                <tr>
                                    <td><input class="form-check-input form-check-input-lg border-secondary"
                                            type="checkbox" value="" id="who-on-1"></td>
                                    <td><img src="https://media.istockphoto.com/id/1308571236/photo/medical-concept-of-beautiful-female-doctor-with-stethoscope-waist-up-medical-student-woman.jpg?s=612x612&amp;w=0&amp;k=20&amp;c=bHGISU0YBMsNPG1sSbJ7Q9eVC6I3tK4lmCzfOAY_dRM="
                                            alt="profile" class="object-fit-cover rounded-circle border-light me-3"
                                            width="40" height="40">Maureen Biologist</td>
                                    <td><span class="fw-semibold">001</span></td>
                                    <td>
                                        <span class="position-relative">Available <span
                                                class="ms-2 position-absolute top-50 translate-middle p-1 bg-success rounded-circle"></span></span>
                                    </td>
                                    <td>CNA</td>
                                    <td>01</td>
                                    <td><span class="text-primary fs-8">Starting in 10 min</span></td>
                                </tr>
                                <tr>
                                    <td><input class="form-check-input form-check-input-lg border-secondary"
                                            type="checkbox" value="" id="who-on-1"></td>
                                    <td><img src="https://media.istockphoto.com/id/1308571236/photo/medical-concept-of-beautiful-female-doctor-with-stethoscope-waist-up-medical-student-woman.jpg?s=612x612&amp;w=0&amp;k=20&amp;c=bHGISU0YBMsNPG1sSbJ7Q9eVC6I3tK4lmCzfOAY_dRM="
                                            alt="profile" class="object-fit-cover rounded-circle border-light me-3"
                                            width="40" height="40">Maureen Biologist</td>
                                    <td><span class="fw-semibold">001</span></td>
                                    <td>
                                        <span class="position-relative">Available <span
                                                class="ms-2 position-absolute top-50 translate-middle p-1 bg-success rounded-circle"></span></span>
                                    </td>
                                    <td>CNA</td>
                                    <td>01</td>
                                    <td><span class="text-primary fs-8">Starting in 10 min</span></td>
                                </tr>
                                <tr>
                                    <td><input class="form-check-input form-check-input-lg border-secondary"
                                            type="checkbox" value="" id="who-on-1"></td>
                                    <td><img src="https://media.istockphoto.com/id/1308571236/photo/medical-concept-of-beautiful-female-doctor-with-stethoscope-waist-up-medical-student-woman.jpg?s=612x612&amp;w=0&amp;k=20&amp;c=bHGISU0YBMsNPG1sSbJ7Q9eVC6I3tK4lmCzfOAY_dRM="
                                            alt="profile" class="object-fit-cover rounded-circle border-light me-3"
                                            width="40" height="40">Maureen Biologist</td>
                                    <td><span class="fw-semibold">001</span></td>
                                    <td>
                                        <span class="position-relative">Available <span
                                                class="ms-2 position-absolute top-50 translate-middle p-1 bg-success rounded-circle"></span></span>
                                    </td>
                                    <td>CNA</td>
                                    <td>01</td>
                                    <td><span class="text-primary fs-8">Starting in 10 min</span></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="d-flex align-items-center pt-3">
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="v-pills-clocked-in" role="tabpanel"
                aria-labelledby="v-pills-clocked-in-tab">
                <div class="card bg-white border-0 mb-3">
                    <div class="card-body">
                        <table id="dataTable" data-toggle="table" class="table-striped">
                            <thead>
                                <tr class="bg-primary text-white">
                                    <th class="fw-normal border-0 text-center" data-field=""></th>
                                    <th class="fw-normal border-0" data-field="name">Name</th>
                                    <th class="fw-normal border-0" data-field="id">ID</th>
                                    <th class="fw-normal border-0" data-field="status">Status</th>
                                    <th class="fw-normal border-0" data-field="profile">Profile</th>
                                    <th class="fw-normal border-0" data-field="points">Points</th>
                                    <th class="fw-normal border-0" data-field="activity">Activity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input class="form-check-input form-check-input-lg border-secondary"
                                            type="checkbox" value="" id="who-on-1"></td>
                                    <td><img src="https://media.istockphoto.com/id/1308571236/photo/medical-concept-of-beautiful-female-doctor-with-stethoscope-waist-up-medical-student-woman.jpg?s=612x612&amp;w=0&amp;k=20&amp;c=bHGISU0YBMsNPG1sSbJ7Q9eVC6I3tK4lmCzfOAY_dRM="
                                            alt="profile" class="object-fit-cover rounded-circle border-light me-3"
                                            width="40" height="40">Maureen Biologist</td>
                                    <td><span class="fw-semibold">001</span></td>
                                    <td>
                                        <span class="position-relative">Available <span
                                                class="ms-2 position-absolute top-50 translate-middle p-1 bg-success rounded-circle"></span></span>
                                    </td>
                                    <td>CNA</td>
                                    <td>01</td>
                                    <td><span class="text-primary fs-8">Shift In Process</span></td>
                                </tr>
                                <tr>
                                    <td><input class="form-check-input form-check-input-lg border-secondary"
                                            type="checkbox" value="" id="who-on-1"></td>
                                    <td><img src="https://media.istockphoto.com/id/1308571236/photo/medical-concept-of-beautiful-female-doctor-with-stethoscope-waist-up-medical-student-woman.jpg?s=612x612&amp;w=0&amp;k=20&amp;c=bHGISU0YBMsNPG1sSbJ7Q9eVC6I3tK4lmCzfOAY_dRM="
                                            alt="profile" class="object-fit-cover rounded-circle border-light me-3"
                                            width="40" height="40">Maureen Biologist</td>
                                    <td><span class="fw-semibold">001</span></td>
                                    <td>
                                        <span class="position-relative">Available <span
                                                class="ms-2 position-absolute top-50 translate-middle p-1 bg-success rounded-circle"></span></span>
                                    </td>
                                    <td>CNA</td>
                                    <td>01</td>
                                    <td><span class="text-primary fs-8">Shift In Process</span></td>
                                </tr>
                                <tr>
                                    <td><input class="form-check-input form-check-input-lg border-secondary"
                                            type="checkbox" value="" id="who-on-1"></td>
                                    <td><img src="https://media.istockphoto.com/id/1308571236/photo/medical-concept-of-beautiful-female-doctor-with-stethoscope-waist-up-medical-student-woman.jpg?s=612x612&amp;w=0&amp;k=20&amp;c=bHGISU0YBMsNPG1sSbJ7Q9eVC6I3tK4lmCzfOAY_dRM="
                                            alt="profile" class="object-fit-cover rounded-circle border-light me-3"
                                            width="40" height="40">Maureen Biologist</td>
                                    <td><span class="fw-semibold">001</span></td>
                                    <td>
                                        <span class="position-relative">Available <span
                                                class="ms-2 position-absolute top-50 translate-middle p-1 bg-success rounded-circle"></span></span>
                                    </td>
                                    <td>CNA</td>
                                    <td>01</td>
                                    <td><span class="text-primary fs-8">Shift In Process</span></td>
                                </tr>
                                <tr>
                                    <td><input class="form-check-input form-check-input-lg border-secondary"
                                            type="checkbox" value="" id="who-on-1"></td>
                                    <td><img src="https://media.istockphoto.com/id/1308571236/photo/medical-concept-of-beautiful-female-doctor-with-stethoscope-waist-up-medical-student-woman.jpg?s=612x612&amp;w=0&amp;k=20&amp;c=bHGISU0YBMsNPG1sSbJ7Q9eVC6I3tK4lmCzfOAY_dRM="
                                            alt="profile" class="object-fit-cover rounded-circle border-light me-3"
                                            width="40" height="40">Maureen Biologist</td>
                                    <td><span class="fw-semibold">001</span></td>
                                    <td>
                                        <span class="position-relative">Available <span
                                                class="ms-2 position-absolute top-50 translate-middle p-1 bg-success rounded-circle"></span></span>
                                    </td>
                                    <td>CNA</td>
                                    <td>01</td>
                                    <td><span class="text-primary fs-8">Shift In Process</span></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="d-flex align-items-center pt-3">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End::Content -->
    </div>
@endsection

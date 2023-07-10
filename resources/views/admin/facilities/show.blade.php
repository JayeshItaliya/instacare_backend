@extends('admin.theme.default')
@section('title') Facility Details @endsection
@section('content')
    <div class="container-fluid content d-flex flex-column ">
        <!-- Begin::Content -->
        <div class="d-flex align-items-center mb-3">
            <a href="javascript:void(0)" class="btn bg-white text-secondary rounded-circle me-3"><i
                    class="fa-regular fa-chevron-left"></i></a>
            <h3 class="fw-bold">Beacon Health Center</h3>
        </div>
        <div class="card bg-white border-0 mb-3">
            <div class="card-body pb-0">
                <div class="nav nav-underline" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link fw-bold text-muted me-5 active" id="v-pills-about-tab" data-bs-toggle="pill"
                        href="#v-pills-about" role="tab" aria-controls="v-pills-about" aria-selected="true">About</a>
                    <a class="nav-link fw-bold text-muted me-5" id="v-pills-members-tab" data-bs-toggle="pill"
                        href="#v-pills-members" role="tab" aria-controls="v-pills-members" aria-selected="true">Members
                        <span class="badge rounded-pill text-bg-highlight">104</span></a>
                </div>
            </div>
        </div>
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-about" role="tabpanel" aria-labelledby="v-pills-about-tab">
                <div class="card bg-white border-0 mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <img src="https://cdn.britannica.com/12/130512-004-AD0A7CA4/campus-Riverside-Ottawa-The-Hospital-Ont.jpg"
                                    alt="" height="400" class="object-fit-cover object-position-center"
                                    style="width: -webkit-fill-Active;border-radius: 1rem">
                            </div>
                            <div class="col-md-7">
                                <div class="row align-items-center justify-content-between mb-3">
                                    <p class="fw-semibold h2 col-auto">Beacon Health Center</p>
                                    <a href="javascript:void(0)" class="text-primary col-auto">
                                        <i class="fa-regular fa-cloud-arrow-down fs-4 me-2"></i>
                                        <span class="fw-semibold">Download</span>
                                    </a>
                                </div>
                                <p class="mb-3">Fusce eget mattis nulla. Nunc ligula sem, ornare sed feugiat sit amet, consectetur eget urna. Praesent non fermentum quam, sed tincidunt orci. Ut enim arcu, pellentesque eu quam in, sollicitudin ultrices tellus. Integer at efficitur arcu. Duis eleifend, leo sit amet dictum tincidunt, felis ipsum suscipit nisl, in laoreet nibh elit eu tortor. In pretium felis dolor.</p>
                                <strong class="text-primary">Address</strong>
                                <div class="row row-cols-md-5 mb-5">
                                    <div class="col">
                                        <small>Address</small>
                                        <h5 class="fw-semibold">5454 Fargo Ave</h5>
                                    </div>
                                    <div class="col">
                                        <small>Country</small>
                                        <h5 class="fw-semibold">United States</h5>
                                    </div>
                                    <div class="col">
                                        <small>State</small>
                                        <h5 class="fw-semibold">Illinois</h5>
                                    </div>
                                    <div class="col">
                                        <small>City</small>
                                        <h5 class="fw-semibold">Skokie</h5>
                                    </div>
                                    <div class="col">
                                        <small>Zip</small>
                                        <h5 class="fw-semibold">60077</h5>
                                    </div>
                                </div>
                                <strong class="text-primary">Contact Info</strong>
                                <div class="row row-cols-md-4 mb-5">
                                    <div class="col">
                                        <small>Contact Person</small>
                                        <h5 class="fw-semibold">Stacy Douglas</h5>
                                    </div>
                                    <div class="col">
                                        <small>Position</small>
                                        <h5 class="fw-semibold">Manager</h5>
                                    </div>
                                    <div class="col">
                                        <small>Phone</small>
                                        <h5 class="fw-semibold">8888888888</h5>
                                    </div>
                                    <div class="col">
                                        <small>Email</small>
                                        <a href="mailto:stacy.d@gmail.com" class="fw-semibold h5">stacy.d@gmail.com</a>
                                    </div>
                                </div>
                                <hr class="border-dashed border-secondary opacity-100">
                                <strong class="text-primary">Contact Info</strong>
                                <div class="row row-cols-md-4 mb-5">
                                    <div class="col">
                                        <small>Contact Person</small>
                                        <h5 class="fw-semibold">Amanda Smith</h5>
                                    </div>
                                    <div class="col">
                                        <small>Position</small>
                                        <h5 class="fw-semibold">Front Desk</h5>
                                    </div>
                                    <div class="col">
                                        <small>Phone</small>
                                        <h5 class="fw-semibold">8888888888</h5>
                                    </div>
                                    <div class="col">
                                        <small>Email</small>
                                        <a href="mailto:amanda@gmail.com" class="fw-semibold h5">amanda@gmail.com</a>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-secondary me-3">edit</button>
                                <button type="button" class="btn btn-secondary me-3">message</button>
                                <button type="button" class="btn btn-muted me-3">back</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="v-pills-members" role="tabpanel" aria-labelledby="v-pills-members-tab">
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
                                    <th class="fw-normal border-0" data-field="email">Email</th>
                                    <th class="fw-normal border-0 fs-5" data-field="action"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input class="form-check-input form-check-input-lg border-secondary" type="checkbox"
                                            value="" id="who-on-1">
                                    </td>
                                    <td><img src="https://media.istockphoto.com/id/1308571236/photo/medical-concept-of-beautiful-female-doctor-with-stethoscope-waist-up-medical-student-woman.jpg?s=612x612&amp;w=0&amp;k=20&amp;c=bHGISU0YBMsNPG1sSbJ7Q9eVC6I3tK4lmCzfOAY_dRM="
                                            alt="profile" class="object-fit-cover rounded-circle border-light me-3"
                                            width="40" height="40">Maureen Biologist</td>
                                    <td><span class="fw-semibold">001</span></td>
                                    <td>
                                        <span class="position-relative">Active <span
                                                class="ms-2 position-absolute top-50 translate-middle p-1 bg-success rounded-circle"></span></span>
                                    </td>
                                    <td>CNA</td>
                                    <td>01</td>
                                    <td><span class="text-primary fs-8">maureen.b@outlook.com</span></td>
                                    <td>
                                        <a href="javascript:void(0)"><i class="fa-regular fa-pen-to-square"></i></a>
                                        <a href="javascript:void(0)" class="ms-2"><i
                                                class="fa-regular fa-trash-can"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="form-check-input form-check-input-lg border-secondary" type="checkbox"
                                            value="" id="who-on-1">
                                    </td>
                                    <td><img src="https://media.istockphoto.com/id/1308571236/photo/medical-concept-of-beautiful-female-doctor-with-stethoscope-waist-up-medical-student-woman.jpg?s=612x612&amp;w=0&amp;k=20&amp;c=bHGISU0YBMsNPG1sSbJ7Q9eVC6I3tK4lmCzfOAY_dRM="
                                            alt="profile" class="object-fit-cover rounded-circle border-light me-3"
                                            width="40" height="40">Maureen Biologist</td>
                                    <td><span class="fw-semibold">001</span></td>
                                    <td>
                                        <span class="position-relative">Active <span
                                                class="ms-2 position-absolute top-50 translate-middle p-1 bg-success rounded-circle"></span></span>
                                    </td>
                                    <td>CNA</td>
                                    <td>01</td>
                                    <td><span class="text-primary fs-8">maureen.b@outlook.com</span></td>
                                    <td>
                                        <a href="javascript:void(0)"><i class="fa-regular fa-pen-to-square"></i></a>
                                        <a href="javascript:void(0)" class="ms-2"><i
                                                class="fa-regular fa-trash-can"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="form-check-input form-check-input-lg border-secondary"
                                            type="checkbox" value="" id="who-on-1">
                                    </td>
                                    <td><img src="https://media.istockphoto.com/id/1308571236/photo/medical-concept-of-beautiful-female-doctor-with-stethoscope-waist-up-medical-student-woman.jpg?s=612x612&amp;w=0&amp;k=20&amp;c=bHGISU0YBMsNPG1sSbJ7Q9eVC6I3tK4lmCzfOAY_dRM="
                                            alt="profile" class="object-fit-cover rounded-circle border-light me-3"
                                            width="40" height="40">Maureen Biologist</td>
                                    <td><span class="fw-semibold">001</span></td>
                                    <td>
                                        <span class="position-relative">Active <span
                                                class="ms-2 position-absolute top-50 translate-middle p-1 bg-success rounded-circle"></span></span>
                                    </td>
                                    <td>CNA</td>
                                    <td>01</td>
                                    <td><span class="text-primary fs-8">maureen.b@outlook.com</span></td>
                                    <td>
                                        <a href="javascript:void(0)"><i class="fa-regular fa-pen-to-square"></i></a>
                                        <a href="javascript:void(0)" class="ms-2"><i
                                                class="fa-regular fa-trash-can"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="form-check-input form-check-input-lg border-secondary"
                                            type="checkbox" value="" id="who-on-1">
                                    </td>
                                    <td><img src="https://media.istockphoto.com/id/1308571236/photo/medical-concept-of-beautiful-female-doctor-with-stethoscope-waist-up-medical-student-woman.jpg?s=612x612&amp;w=0&amp;k=20&amp;c=bHGISU0YBMsNPG1sSbJ7Q9eVC6I3tK4lmCzfOAY_dRM="
                                            alt="profile" class="object-fit-cover rounded-circle border-light me-3"
                                            width="40" height="40">Maureen Biologist</td>
                                    <td><span class="fw-semibold">001</span></td>
                                    <td>
                                        <span class="position-relative">Active <span
                                                class="ms-2 position-absolute top-50 translate-middle p-1 bg-success rounded-circle"></span></span>
                                    </td>
                                    <td>CNA</td>
                                    <td>01</td>
                                    <td><span class="text-primary fs-8">maureen.b@outlook.com</span></td>
                                    <td>
                                        <a href="javascript:void(0)"><i class="fa-regular fa-pen-to-square"></i></a>
                                        <a href="javascript:void(0)" class="ms-2"><i
                                                class="fa-regular fa-trash-can"></i></a>
                                    </td>
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
    </div>
@endsection

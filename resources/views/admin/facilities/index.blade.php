@extends('admin.theme.default')
@section('title') Facilities @endsection
@section('content')
    <div class="container-fluid content d-flex flex-column ">
        <!-- Begin::Content -->
        <div class="row align-items-center justify-content-between mb-3">
            <div class="col-auto">
                <div class="d-flex align-items-center">
                    <h3 class="fw-bold">Facilities</h3>
                    <div class="d-flex align-items-center mx-3 text-muted fw-semibold fs-8 cursor-pointer ">
                        <p class="datepicker">18 March 2023</p>
                        <i class="fa-solid fa-chevron-down ms-2"></i>
                    </div>
                </div>
            </div>
            <div class="col-auto">
                <a href="{{ URL::to('facilities/add') }}" class="btn btn-highlight text-uppercase rounded-pill fs-8">
                    <i class="fa-regular fa-plus me-2 fs-9"></i>add facilities
                </a>
            </div>
        </div>
        <div class="card bg-white border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-6">
                    <p>Showing <strong>13</strong> out of <strong>152</strong> Facilities</p>
                    <span>
                        <span class="badge custom-badge-danger fs-6 px-3 me-2">
                            <i class="fa-regular fa-trash-can"></i></span>
                        <button type="button" class="btn btn-secondary fs-6 px-5 py-2" data-bs-toggle="offcanvas"
                            data-bs-target="#shifts_filter_aside" aria-controls="shifts_filter_aside">
                            <i class="fa-regular fa-sliders-up me-2"></i>Filter</button>
                    </span>
                </div>
                <table id="dataTable" data-toggle="table" class="table-striped">
                    <thead>
                        <tr class="bg-primary text-white">
                            <th class="fw-normal border-0 text-center" data-field=""></th>
                            <th class="fw-normal border-0" data-field="name">Name</th>
                            <th class="fw-normal border-0" data-field="contact_person">Contact Person</th>
                            <th class="fw-normal border-0" data-field="phonenumber">Phone Number</th>
                            <th class="fw-normal border-0" data-field="email">Email</th>
                            <th class="fw-normal border-0" data-field="document">Document</th>
                            <th class="fw-normal border-0 fs-5" data-field="action"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input class="form-check-input form-check-input-lg border-secondary" type="checkbox"
                                    value="" id="who-on-1">
                            </td>
                            <td><img src="https://cdn.britannica.com/12/130512-004-AD0A7CA4/campus-Riverside-Ottawa-The-Hospital-Ont.jpg"
                                    alt="profile" class="object-fit-cover rounded border-light me-3" width="40"
                                    height="40"><a href="{{ URL::to('facilities/details') }}" class="text-dark fw-semibold">Care Center</a></td>
                            <td>Gloria Aniamalu</td>
                            <td>888-888-8888</td>
                            <td>info@carecenter.net</td>
                            <td>
                                <a href="javascript:void(0)" class="text-primary"><i class="fa-regular fa-cloud-arrow-down fs-4 me-2"></i><span
                                        class="fw-semibold">Download</span></a>
                            </td>
                            <td>
                                <a href="javascript:void(0)"><i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="javascript:void(0)" class="ms-2"><i class="fa-regular fa-trash-can"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="form-check-input form-check-input-lg border-secondary" type="checkbox"
                                    value="" id="who-on-1">
                            </td>
                            <td><img src="https://cdn.britannica.com/12/130512-004-AD0A7CA4/campus-Riverside-Ottawa-The-Hospital-Ont.jpg"
                                    alt="profile" class="object-fit-cover rounded border-light me-3" width="40"
                                    height="40"><a href="{{ URL::to('facilities/details') }}" class="text-dark fw-semibold">Care Center</a></td>
                            <td>Gloria Aniamalu</td>
                            <td>888-888-8888</td>
                            <td>info@carecenter.net</td>
                            <td>
                                <a href="javascript:void(0)" class="text-primary"><i class="fa-regular fa-cloud-arrow-down fs-4 me-2"></i><span
                                        class="fw-semibold">Download</span></a>
                            </td>
                            <td>
                                <a href="javascript:void(0)"><i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="javascript:void(0)" class="ms-2"><i class="fa-regular fa-trash-can"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="form-check-input form-check-input-lg border-secondary" type="checkbox"
                                    value="" id="who-on-1">
                            </td>
                            <td><img src="https://cdn.britannica.com/12/130512-004-AD0A7CA4/campus-Riverside-Ottawa-The-Hospital-Ont.jpg"
                                    alt="profile" class="object-fit-cover rounded border-light me-3" width="40"
                                    height="40"><a href="{{ URL::to('facilities/details') }}" class="text-dark fw-semibold">Care Center</a></td>
                            <td>Gloria Aniamalu</td>
                            <td>888-888-8888</td>
                            <td>info@carecenter.net</td>
                            <td>
                                <a href="javascript:void(0)" class="text-primary"><i class="fa-regular fa-cloud-arrow-down fs-4 me-2"></i><span
                                        class="fw-semibold">Download</span></a>
                            </td>
                            <td>
                                <a href="javascript:void(0)"><i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="javascript:void(0)" class="ms-2"><i class="fa-regular fa-trash-can"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="form-check-input form-check-input-lg border-secondary" type="checkbox"
                                    value="" id="who-on-1">
                            </td>
                            <td><img src="https://cdn.britannica.com/12/130512-004-AD0A7CA4/campus-Riverside-Ottawa-The-Hospital-Ont.jpg"
                                    alt="profile" class="object-fit-cover rounded border-light me-3" width="40"
                                    height="40"><a href="{{ URL::to('facilities/details') }}" class="text-dark fw-semibold">Care Center</a></td>
                            <td>Gloria Aniamalu</td>
                            <td>888-888-8888</td>
                            <td>info@carecenter.net</td>
                            <td>
                                <a href="javascript:void(0)" class="text-primary"><i class="fa-regular fa-cloud-arrow-down fs-4 me-2"></i><span
                                        class="fw-semibold">Download</span></a>
                            </td>
                            <td>
                                <a href="javascript:void(0)"><i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="javascript:void(0)" class="ms-2"><i class="fa-regular fa-trash-can"></i></a>
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
                    <select name="role" id="role" class="form-select rounded-pill text-dark fw-500">
                        <option value="" selected="" disabled="">Role</option>
                    </select>
                </div>
                <div class="form-group">
                    <select name="status" id="status" class="form-select rounded-pill text-dark fw-500">
                        <option value="" selected="" disabled="">Status</option>
                    </select>
                </div>
                <div class="form-group">
                    <select name="rating" id="rating" class="form-select rounded-pill text-dark fw-500">
                        <option value="" selected="" disabled="">Rating</option>
                    </select>
                </div>
                <div class="form-group">
                    <select name="points" id="points" class="form-select rounded-pill text-dark fw-500">
                        <option value="" selected="" disabled="">Points</option>
                    </select>
                </div>
                <div class="form-group">
                    <select name="latest_activity" id="latest_activity"
                        class="form-select rounded-pill text-dark fw-500">
                        <option value="" selected="" disabled="">Latest Activity</option>
                    </select>
                </div>
                <div class="text-center mt-5">
                    <button type="button" class="btn btn-secondary  me-3">APPLY</button>
                    <button type="button" class="btn btn-muted ">RESET</button>
                </div>
            </form>
        </div>
        <!-- End::Filter Aside -->
        <!-- End::Content -->
    </div>
@endsection

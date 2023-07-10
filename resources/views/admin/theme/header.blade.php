<div class="header">
    <!-- Begin::Container -->
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <!--Begin::Logo bar-->
        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
            <!--Begin::Aside Toggle-->
            <div class="d-flex align-items-center d-lg-none">
                <div class="btn btn-icon btn-active-color-primary ms-n2 me-1">
                    <!--Begin::Svg Icon-->
                    <i class="fa-regular fa-bars text-muted"></i>
                    <!--End::Svg Icon-->
                </div>
            </div>
            <!--End::Aside Toggle-->
            <!--Begin::Logo-->
            <a href="{{ URL::to('/') }}" class="d-lg-none">
                <img alt="Logo" src="{{ Helper::image_path('logo.svg') }}" class="mh-40px">
            </a>
            <!--End::Logo-->
            <!--Begin::Aside Toggler-->
            <div class="btn btn-icon w-auto ps-0 btn-active-color-primary d-none d-lg-inline-flex me-2 me-lg-5">
            </div>
            <!--End::Aside Toggler-->
        </div>
        <!--Begin::Logo bar-->
        <!--Begin::Topbar-->
        <div class="d-flex align-items-stretch justify-content-end flex-lg-grow-1">
            <!--Begin::Toolbar wrapper-->
            <div class="d-flex align-items-stretch flex-shrink-0">
                <!--Begin::Notofications-->
                <div class="d-flex align-items-center ms-1 ms-lg-2">
                    <!--Begin::Menu wrapper-->
                    <div class="btn btn-icon">
                        <!--Begin::Svg Icon -->
                        <div class="svg-icon svg-icon-1 cursor-pointer shift_confirmed" onclick="shift_confirmation()">
                            <svg width="27" height="26" viewBox="0 0 27 26" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M23.7166 13.0603C23.8569 10.7589 23.294 8.46923 22.1028 6.49512C20.9116 4.52102 19.1483 2.95577 17.0468 2.00705C14.9454 1.05833 12.6052 0.77097 10.3367 1.18311C8.06813 1.59525 5.97853 2.6874 4.34509 4.31466C2.71166 5.94193 1.6116 8.02738 1.19088 10.2943C0.770159 12.5613 1.04865 14.9026 1.98942 17.0076C2.93018 19.1126 4.48874 20.8818 6.45832 22.0805C8.4279 23.2792 10.7154 23.8507 13.0173 23.7192"
                                    stroke="#7EE69B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M12.3711 6.05176V12.3678L16.1607 16.1574M21.2135 24.9998V17.4206M21.2135 17.4206L25.0031 21.2102M21.2135 17.4206L17.4239 21.2102"
                                    stroke="#7EE69B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <!--End::Svg Icon -->
                    </div>
                    <!--End::Menu wrapper-->
                </div>
                <!--End::Notofications-->
            </div>
            <!--End::Toolbar wrapper-->

            <!--Begin::Toolbar wrapper-->
            <div class="d-flex align-items-stretch flex-shrink-0">
                <!--Begin::Notofications-->
                <div class="d-flex align-items-center ms-1 ms-lg-2">
                    <!--Begin::Menu wrapper-->
                    <div class="btn btn-icon">
                        <!--Begin::Svg Icon -->
                        <div class="svg-icon svg-icon-1 cursor-pointer position-relative" data-bs-toggle="dropdown"
                            aria-expanded="false" data-bs-auto-close="outside">
                            <i class="fa-light fa-bell text-muted fs-4"></i>
                            <div class="position-absolute" style="top: -7px;left: 12px;">
                                <i class="fa-solid fa-circle-small fs-8 text-warning"></i>
                            </div>
                        </div>
                        <!--End::Svg Icon -->
                        <div class="dropdown-menu" style="width:450px;right:0;height:850px">
                            <div class="nav nav-underline" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link fw-bold text-muted active" id="crucial-tab11" data-bs-toggle="pill"
                                    href="#crucial11" role="tab" aria-controls="crucial11"
                                    aria-selected="true">Crucial</a>
                                <a class="nav-link fw-bold text-muted" id="non-crucial-tab11" data-bs-toggle="pill"
                                    href="#non-crucial11" role="tab" aria-controls="non-crucial11"
                                    aria-selected="true">Non-Crucial</a>
                            </div>
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="crucial11" role="tabpanel"
                                    aria-labelledby="crucial-tab11">
                                    <div class="card bg-white border-0 mb-3">
                                        <div class="p-2">
                                            <div
                                                class="alert alert-danger border-0 d-flex align-items-start gap-2" data-border-radius="20px">
                                                <div class="py-2 px-3 bg-danger text-white rounded-circle h-auto">
                                                    <i class="fa fa-comment"></i>
                                                </div>
                                                <div>
                                                    <small> <b>Albert Mariao</b> has called off for the shift 15 min
                                                        before. </small>
                                                    <p class="d-flex justify-content-between">
                                                        <small class="text-primary fw-bold"> Care Health Center </small>
                                                        <small class="text-danger fw-bold">Just now</small>
                                                        </span>
                                                </div>
                                            </div>
                                            <div
                                                class="alert alert-danger border-0 d-flex align-items-start gap-2" data-border-radius="20px">
                                                <div class="py-2 px-3 bg-danger text-white rounded-circle h-auto">
                                                    <i class="fa fa-comment"></i>
                                                </div>
                                                <div>
                                                    <small> <b>Garry Simon</b> cancelled the today’s shift. Reason: Due
                                                        to health issues. </small>
                                                    <p class="d-flex justify-content-between">
                                                        <small class="text-primary fw-bold"> Care Health Center </small>
                                                        <small class="text-danger fw-bold">Just now</small>
                                                        </span>
                                                </div>
                                            </div>
                                            <div
                                                class="alert alert-danger border-0 d-flex align-items-start gap-2" data-border-radius="20px">
                                                <div class="py-2 px-3 bg-danger text-white rounded-circle h-auto">
                                                    <i class="fa-regular fa-envelope"></i>
                                                </div>
                                                <div>
                                                    <small> Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                    </small>
                                                    <p class="d-flex justify-content-between">
                                                        <small class="text-primary fw-bold"> Care Health Center </small>
                                                        <small class="text-danger fw-bold">1 h ago</small>
                                                        </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center my-5 w-100" style="position: absolute;bottom: 0px;">
                                        <a href="javascript:;" class="fw-bold"> View All Notifications</a>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="non-crucial11" role="tabpanel"
                                    aria-labelledby="non-crucial-tab11">
                                    @php
                                        $notes = ['Anastasia has mentioned you in comment', 'In maximus massa a purus dapibus, euismod iaculis turpis suscipit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Your password has been successfully changed.', 'Anastasia has mentioned you in comment', 'In maximus massa a purus dapibus, euismod iaculis turpis suscipit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Anastasia has mentioned you in comment', 'In maximus massa a purus dapibus, euismod iaculis turpis suscipit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'];
                                        $timing = ['Just now', 'Just now', '1h ago', '4d ago', '5d ago', '5d ago', '5d ago', '5d ago', '5d ago', '5d ago'];
                                    @endphp
                                    @for ($i = 1; $i < 7; $i++)
                                        <div class="alert border-0 d-flex align-items-start gap-2 mb-0"
                                             data-border-radius="20px">
                                            <div class="py-2 px-3 bg-secondary text-white rounded-circle h-auto">
                                                @if (in_array($i, [1, 2, 5, 6, 8, 9]))
                                                    <i class="fa fa-comment"></i>
                                                @else
                                                    <i class="fa-regular fa-envelope"></i>
                                                @endif
                                            </div>
                                            <div class="w-100">
                                                <small> {{ $notes[$i] }} </small>
                                                <p class="d-flex justify-content-between">
                                                    <small class="text-primary fw-bold"> Care Health Center </small>
                                                    <small class="text-primary fw-bold"> {{ $timing[$i] }} </small>
                                                    </span>
                                            </div>
                                        </div>
                                    @endfor
                                    <div class="text-center my-5 w-100" style="position: absolute;bottom: 0px;">
                                        <a href="javascript:;" class="fw-bold"> View All Notifications</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End::Menu wrapper-->
                </div>
                <!--End::Notofications-->
            </div>
            <!--End::Toolbar wrapper-->
            <!--Begin::Toolbar wrapper-->
            <div class="d-flex align-items-stretch flex-shrink-0">
                <!--Begin::Notofications-->
                <div class="d-flex align-items-center ms-1 ms-lg-2 dropdown">
                    <!--Begin::Menu wrapper-->
                    <div class="cursor-pointer" data-bs-toggle="dropdown">
                        <span class="header-custom-pill">
                            <span
                                class="bg-primary rounded-circle fs-5 text-white d-flex align-items-center justify-content-center"
                                style="width: 40px; height:40px;">{{ strtoupper(substr(auth()->user()->full_name, 0, 1)) . strtoupper(substr(auth()->user()->full_name, strpos(auth()->user()->full_name, ' ') + 1, 1)) }}</span>
                            <!--Begin::Svg Icon -->
                            <div class="px-4">
                                <i class="fa-light fa-bars text-muted fs-2"></i>
                            </div>
                            <!--End::Svg Icon -->
                        </span>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="javascript:;"
                                    onclick="location.href='{{ URL::to('profile') }}'"><i
                                        class="fa-regular fa-user text-primary me-3"></i>My Profile</a></li>
                            <li><a class="dropdown-item" href="javascript:;"
                                    onclick="logout('{{ URL::to('logout') }}')"><i
                                        class="fa-regular fa-power-off text-primary me-3"></i>Logout</a></li>
                        </ul>
                    </div>
                    <!--End::Menu wrapper-->
                </div>
                <!--End::Notofications-->
            </div>
            <!--End::Toolbar wrapper-->
        </div>
        <!--End::Topbar-->
    </div>
    <!-- End::Container -->
</div>

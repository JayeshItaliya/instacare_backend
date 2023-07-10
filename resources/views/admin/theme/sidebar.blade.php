<div class="aside aside-default aside-hoverable">
    <!-- Begin::Brand -->
    <div class="aside-logo flex-column-auto px-10 py-6">
        <!-- Begin::Logo -->
        <a href="{{ URL::to('/') }}">
            <img src="{{ Helper::image_path('logo.svg') }}" alt="Logo" class="max-h-50px logo-default" height="30">
            <img src="{{ Helper::image_path('logo.svg') }}" alt="Logo" class="max-h-50px logo-minimize">
        </a>
        <!-- End::Logo -->
    </div>

    <!-- End::Brand -->
    <!-- Begin::Aside Menu -->
    <div class="aside-menu flex-column-fluid">
        <!-- Begin::Menu -->
        <div
            class="menu menu-sub-indention menu-column menu-rounded menu-title-gray-600 menu-icon-gray-400 menu-active-bg menu-state-primary menu-arrow-gray-500">
            <div class="hover-scroll-y me-lg-n5 pe-lg-5">
                <!-- Begin::Menu Item -->
                <div class="menu-item">
                    <!-- begin:Menu link -->
                    <a class="menu-link {{ request()->is('/') ? 'active' : '' }}" href="{{ URL::to('/') }}">
                        <span class="menu-icon">
                            <!-- begin::Svg Icon -->
                            <span class="svg-icon svg-icon-2"><i class="fa-light fa-grid-2"></i></span>
                            <!-- end::Svg Icon -->
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                    <!-- end:Menu link -->
                </div>
                <!-- End::Menu Item -->
                <!-- Begin::Menu Item -->
                <div class="menu-item">
                    <!-- begin:Menu link -->
                    <a class="menu-link {{ request()->is('my-availability*') ? 'active' : '' }}" href="{{ URL::to('my-availability') }}">
                        <span class="menu-icon">
                            <!-- begin::Svg Icon -->
                            <span class="svg-icon svg-icon-2"><i class="fa-light fa-user-check"></i></span>
                            <!-- end::Svg Icon -->
                        </span>
                        <span class="menu-title">My Availability</span>
                    </a>
                    <!-- end:Menu link -->
                </div>
                <!-- End::Menu Item -->
                <!-- Begin::Menu Item -->
                <div class="menu-item">
                    <!-- begin:Menu link -->
                    <a class="menu-link {{ request()->is('marketplace*') ? 'active' : '' }}" href="{{ URL::to('marketplace') }}">
                        <span class="menu-icon">
                            <!-- begin::Svg Icon -->
                            <span class="svg-icon svg-icon-2"><i class="fa-light fa-calendar"></i></span>
                            <!-- end::Svg Icon -->
                        </span>
                        <span class="menu-title">Marketplace</span>
                    </a>
                    <!-- end:Menu link -->
                </div>
                <!-- End::Menu Item -->
                <!-- Begin::Menu Item -->
                <div class="menu-item">
                    <!-- begin:Menu link -->
                    <a class="menu-link {{ request()->is('schedules*') ? 'active' : '' }}" href="{{ URL::to('/schedules') }}">
                        <span class="menu-icon">
                            <!-- begin::Svg Icon -->
                            <span class="svg-icon svg-icon-2"><i class="fa-light fa-calendar"></i></span>
                            <!-- end::Svg Icon -->
                        </span>
                        <span class="menu-title">Schedules</span>
                    </a>
                    <!-- end:Menu link -->
                </div>
                <!-- End::Menu Item -->
                <!-- Begin::Menu Item -->
                <div class="menu-item">
                    <!-- begin:Menu link -->
                    <a class="menu-link {{ request()->is('who-on*') ? 'active' : '' }}" href="{{ URL::to('who-on') }}">
                        <span class="menu-icon">
                            <!-- begin::Svg Icon -->
                            <span class="svg-icon svg-icon-2"><i class="fa-light fa-user-check"></i></span>
                            <!-- end::Svg Icon -->
                        </span>
                        <span class="menu-title">Who’s ON</span>
                    </a>
                    <!-- end:Menu link -->
                </div>
                <!-- End::Menu Item -->
                <!-- Begin::Menu Item -->
                <div class="menu-item">
                    <!-- begin:Menu link -->
                    <a class="menu-link {{ request()->is('people*') ? 'active' : '' }}" href="{{ URL::to('people') }}">
                        <span class="menu-icon">
                            <!-- begin::Svg Icon -->
                            <span class="svg-icon svg-icon-2"><i class="fa-light fa-user"></i></span>
                            <!-- end::Svg Icon -->
                        </span>
                        <span class="menu-title">People</span>
                    </a>
                    <!-- end:Menu link -->
                </div>
                <!-- End::Menu Item -->
                <!-- Begin::Menu Item -->
                <div class="menu-item">
                    <!-- begin:Menu link -->
                    <a class="menu-link {{ request()->is('facilities*') ? 'active' : '' }}"
                        href="{{ URL::to('facilities') }}">
                        <span class="menu-icon">
                            <!-- begin::Svg Icon -->
                            <span class="svg-icon svg-icon-2"><i class="fa-light fa-user-group"></i></span>
                            <!-- end::Svg Icon -->
                        </span>
                        <span class="menu-title">Facilities</span>
                    </a>
                    <!-- end:Menu link -->
                </div>
                <!-- End::Menu Item -->
                <!-- Begin::Menu Item -->
                <div class="menu-item">
                    <!-- begin:Menu link -->
                    <a class="menu-link {{ request()->is('messaging*') ? 'active' : '' }}" href="{{ URL::to('/messaging') }}">
                        <span class="menu-icon">
                            <!-- begin::Svg Icon -->
                            <span class="svg-icon svg-icon-2"><i class="fa-light fa-signal-stream"></i></span>
                            <!-- end::Svg Icon -->
                        </span>
                        <span class="menu-title">Messaging</span>
                    </a>
                    <!-- end:Menu link -->
                </div>
                <!-- End::Menu Item -->
                <!-- Begin::Menu Item -->
                <div class="menu-item">
                    <!-- begin:Menu link -->
                    <a class="menu-link {{ request()->is('timecards*') ? 'active' : '' }}"
                        href="{{ URL::to('timecards') }}">
                        <span class="menu-icon">
                            <!-- begin::Svg Icon -->
                            <span class="svg-icon svg-icon-2"><i class="fa-light fa-clock"></i></i></span>
                            <!-- end::Svg Icon -->
                        </span>
                        <span class="menu-title">Timecard</span>
                    </a>
                    <!-- end:Menu link -->
                </div>
                <!-- End::Menu Item -->
                <!-- Begin::Menu Item -->
                <div class="menu-item">
                    <!-- begin:Menu link -->
                    <a class="menu-link {{ request()->is('payroll*') ? 'active' : '' }}"
                        href="{{ URL::to('payroll') }}">
                        <span class="menu-icon">
                            <!-- begin::Svg Icon -->
                            <span class="svg-icon svg-icon-2"><i class="fa-light fa-user"></i></span>
                            <!-- end::Svg Icon -->
                        </span>
                        <span class="menu-title">Payroll</span>
                    </a>
                    <!-- end:Menu link -->
                </div>
                <!-- End::Menu Item -->
                <!-- Begin::Menu Item -->
                <div class="menu-item">
                    <!-- begin:Menu link -->
                    <a class="menu-link {{ request()->is('support*') ? 'active' : '' }}"
                        href="{{ URL::to('support') }}">
                        <span class="menu-icon">
                            <!-- begin::Svg Icon -->
                            <span class="svg-icon svg-icon-2"><i class="fa-light fa-circle-question"></i></span>
                            <!-- end::Svg Icon -->
                        </span>
                        <span class="menu-title">Support</span>
                    </a>
                    <!-- end:Menu link -->
                </div>
                <!-- End::Menu Item -->
                <!-- Begin::Menu Item -->
                <div class="menu-item">
                    <!-- begin:Menu link -->
                    <a class="menu-link {{ request()->is('settings*') ? 'active' : '' }}"
                        href="{{ URL::to('settings') }}">
                        <span class="menu-icon">
                            <!-- begin::Svg Icon -->
                            <span class="svg-icon svg-icon-2"><i class="fa-light fa-gear"></i></span>
                            <!-- end::Svg Icon -->
                        </span>
                        <span class="menu-title">Settings</span>
                    </a>
                    <!-- end:Menu link -->
                </div>
                <!-- End::Menu Item -->
                <!-- Begin::Menu Item -->
                <div class="menu-item">
                    <!-- begin:Menu link -->
                    <a class="menu-link {{ request()->is('total-billing*') ? 'active' : '' }}" href="{{ URL::to('total-billing') }}">
                        <span class="menu-icon">
                            <!-- begin::Svg Icon -->
                            <span class="svg-icon svg-icon-2"><i class="fa-light fa-file-lines"></i></span>
                            <!-- end::Svg Icon -->
                        </span>
                        <span class="menu-title">Total Billing</span>
                    </a>
                    <!-- end:Menu link -->
                </div>
                <!-- End::Menu Item -->
                <!-- Begin::Menu Item -->
                <div class="menu-item">
                    <!-- begin:Menu link -->
                    <a class="menu-link {{ request()->is('reports*') ? 'active' : '' }}" href="{{ URL::to('reports') }}">
                        <span class="menu-icon">
                            <!-- begin::Svg Icon -->
                            <span class="svg-icon svg-icon-2"><i class="fa-light fa-file-lines"></i></span>
                            <!-- end::Svg Icon -->
                        </span>
                        <span class="menu-title">Reports</span>
                    </a>
                    <!-- end:Menu link -->
                </div>
                <!-- End::Menu Item -->
            </div>
        </div>
        <!-- End::Menu -->

    </div>
    <!-- End::Aside Menu -->
</div>

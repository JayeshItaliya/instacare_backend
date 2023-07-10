@extends('admin.theme.default')
@section('title')
    Notifications
@endsection
@section('style')
    <style>
    </style>
@endsection
@section('content')
    <div class="container-fluid content d-flex flex-column ">
        <!-- Begin::Content -->
        <h3 class="fw-bold mb-3">Notifications</h3>

        <div class="card bg-white border-0 mb-3">
            <div class="card-body pb-0">
                <div class="nav nav-underline" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link fw-bold text-muted me-5 active" id="crucial-tab" data-bs-toggle="pill" href="#crucial"
                        role="tab" aria-controls="crucial" aria-selected="true">Crucial</a>
                    <a class="nav-link fw-bold text-muted me-5" id="non-crucial-tab" data-bs-toggle="pill"
                        href="#non-crucial" role="tab" aria-controls="non-crucial" aria-selected="true">Non-Crucial</a>
                </div>
            </div>
        </div>
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="crucial" role="tabpanel" aria-labelledby="crucial-tab">
                <div class="card bg-white border-0 mb-3">
                    <div class="card-body">
                        <div
                            class="alert alert-danger border-0 d-flex align-items-center gap-2" data-border-radius="20px">
                            <div class="py-3 px-4 bg-danger text-white rounded-circle">
                                <i class="fa fa-comment"></i>
                            </div>
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <span>
                                    <p> <b>Albert Mariao</b> has called off for the shift 15 min before. </p>
                                    <small class="text-primary fw-bold"> Care Health Center </small>
                                </span>
                                <span class="text-danger">Just now</span>
                            </div>
                        </div>
                        <div
                            class="alert alert-danger border-0 d-flex align-items-center gap-2" data-border-radius="20px">
                            <div class="py-3 px-4 bg-danger text-white rounded-circle">
                                <i class="fa fa-comment"></i>
                            </div>
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <span>
                                    <p> <b>Garry Simon</b> cancelled the today’s shift. Reason: Due to health issues. </p>
                                    <small class="text-primary fw-bold"> Care Health Center </small>
                                </span>
                                <span class="text-danger">Just now</span>
                            </div>
                        </div>
                        <div
                            class="alert alert-danger border-0 d-flex align-items-center gap-2" data-border-radius="20px">
                            <div class="py-3 px-4 bg-danger text-white rounded-circle">
                                <i class="fa-regular fa-envelope"></i>
                            </div>
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <span>
                                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                                    <small class="text-primary fw-bold"> Care Health Center </small>
                                </span>
                                <span class="text-danger">1 h ago</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="non-crucial" role="tabpanel" aria-labelledby="non-crucial-tab">
                @php
                    $notes = ['Anastasia has mentioned you in comment', 'In maximus massa a purus dapibus, euismod iaculis turpis suscipit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Your password has been successfully changed.', 'Anastasia has mentioned you in comment', 'In maximus massa a purus dapibus, euismod iaculis turpis suscipit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Anastasia has mentioned you in comment', 'In maximus massa a purus dapibus, euismod iaculis turpis suscipit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'];
                    $timing = ['Just now', 'Just now', '1h ago', '4d ago', '5d ago', '5d ago', '5d ago', '5d ago', '5d ago', '5d ago'];
                @endphp
                @for ($i = 1; $i < 10; $i++)
                    <div class="card bg-white border-0 mb-3"  data-border-radius="20px">
                        <div class="card-body d-flex align-items-center gap-2">
                            <div class="py-3 px-4 bg-secondary text-white rounded-circle">
                                @if (in_array($i,[1,2,5,6,8,9]))
                                <i class="fa fa-comment"></i>
                                @else
                                <i class="fa-regular fa-envelope"></i>
                                @endif
                            </div>
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <span>
                                    <p> {{ $notes[$i] }} </p> <small class="text-primary fw-bold"> Care Health Center
                                    </small>
                                </span>
                                <span class="text-primary">{{ $timing[$i] }}</span>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>

        </div>
        <!-- End::Content -->
    </div>
@endsection
@section('script')
    <script></script>
@endsection

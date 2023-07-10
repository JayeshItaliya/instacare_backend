@extends('admin.theme.default')
@section('title')
    Messaging
@endsection
@section('content')
    <div class="container-fluid content d-flex flex-column">
        <!-- Begin::Content -->
        <div class="row align-items-center justify-content-between mb-3">
            <div class="col-auto">
                <h3 class="fw-bold">Messaging</h3>
            </div>
            <div class="col-auto">
                <a href="javascript: void(0);" class="btn btn-highlight text-uppercase rounded-pill fs-8" id="compose">
                    Compose
                </a>
            </div>
        </div>
        <div class="row">
            
            <div class="col-md-4 contact-list" id="contact-list">
                <div class="card bg-white">
                    <div class="card-body">
                        <div class="chat-list overflow-y-auto" style="height: 700px;" id="contact-list-wrapper">
                            <h6 class="text-center mt-4">Loading contacts...</h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card bg-white">
                    <div class="card-body" id="chat-screen-wapper" style="height: 732px;">
                        @include('admin.messaging.particals.sub-particals.chat-splash-screen')
                    </div>
                </div>
            </div>
            <!-- End::Content -->
        </div>
        <div class="offcanvas offcanvas-end border-start-0" tabindex="-1" id="add_user_offcanvas"
            aria-labelledby="add_user_offcanvasLabel"
            style="border-top: 5px solid var(--bs-secondary); top:80px; width:370px;">
            <form>
                <div class="offcanvas-body">
                    <div class="form-group">
                        <select class="form-select rounded-pill text-dark fw-500">
                            <option value="1" selected=""> Instacare Staff </option>
                            <option value="2"> Employee </option>
                        </select>
                    </div>
                    @php
                        $names = ['Maureen Biologist', 'Jessica Atréides', 'Jasnah Kholin', 'Tattersail', 'Granny Weatherwax', 'Kimberley', 'Gemma', 'Demi', 'Dorothy', 'Iqra', 'Elsie', 'Demi', 'Dorothy'];
                        $badge = ['CNA', 'LPN', 'CNA', 'LPN', 'LPN', 'LPN', 'RN', 'RN', 'RN', 'CNA', 'CNA', 'RN', 'RN'];
                        $badge2 = ['CNA', 'LPN', 'CNA', 'LPN', 'LPN', 'LPN', 'RN', 'RN', 'RN', 'CNA', 'CNA', 'RN', 'RN'];
                        $images = ['https://randomuser.me/api/portraits/thumb/men/95.jpg', 'https://randomuser.me/api/portraits/thumb/women/38.jpg', 'https://randomuser.me/api/portraits/thumb/men/36.jpg', 'https://randomuser.me/api/portraits/thumb/men/87.jpg', 'https://randomuser.me/api/portraits/thumb/men/98.jpg', 'https://randomuser.me/api/portraits/thumb/men/83.jpg', 'https://randomuser.me/api/portraits/thumb/men/92.jpg', 'https://randomuser.me/api/portraits/thumb/men/40.jpg', 'https://randomuser.me/api/portraits/thumb/men/75.jpg', 'https://randomuser.me/api/portraits/thumb/women/91.jpg', 'https://randomuser.me/api/portraits/thumb/women/80.jpg', 'https://randomuser.me/api/portraits/thumb/men/66.jpg', 'https://randomuser.me/api/portraits/thumb/women/74.jpg'];
                    @endphp
                    <div class="section 1">

                        <div class="form-check d-flex align-items-center">
                            <input class="form-check-input select_all" type="checkbox" name="select_all" id="select_all"
                                data-type="1">
                            <label class="form-check-label ps-3" for="select_all"> Select All </label>
                        </div>

                        <div class="form-check d-flex align-items-center">
                            <input class="form-check-input hw-1-5-em checks1 cursor-pointer" type="checkbox" name="staff" id="staff1">
                            <label class="form-check-label ps-3 d-flex align-items-center w-100 cursor-pointer"
                                for="staff1">
                                <img src="https://randomuser.me/api/portraits/thumb/women/80.jpg" alt="user"
                                    class="rounded-circle img-3" width="35" height="35">
                                <div class="d-flex justify-content-between w-100"><span class="ms-2"> Maureen Biologist
                                    </span> <span class="badge custom-badge-cna">Admin</span> </div>
                            </label>
                        </div>
                        <div class="form-check d-flex align-items-center">
                            <input class="form-check-input hw-1-5-em checks1 cursor-pointer" type="checkbox" name="staff" id="staff2">
                            <label class="form-check-label ps-3 d-flex align-items-center w-100 cursor-pointer"
                                for="staff2">
                                <img src="https://randomuser.me/api/portraits/thumb/women/74.jpg" alt="user"
                                    class="rounded-circle img-4" width="35" height="35">
                                <div class="d-flex justify-content-between w-100"><span class="ms-2"> Jessica Atréides
                                    </span> <span class="badge custom-badge-lpn">Staff</span> </div>
                            </label>
                        </div>
                        <div class="form-check d-flex align-items-center">
                            <input class="form-check-input hw-1-5-em checks1 cursor-pointer" type="checkbox" name="staff" id="staff3">
                            <label class="form-check-label ps-3 d-flex align-items-center w-100 cursor-pointer"
                                for="staff3">
                                <img src="https://randomuser.me/api/portraits/thumb/women/80.jpg" alt="user"
                                    class="rounded-circle img-3" width="35" height="35">
                                <div class="d-flex justify-content-between w-100"><span class="ms-2"> Jasnah Kholin
                                    </span> <span class="badge custom-badge-cna">Staff</span> </div>
                            </label>
                        </div>
                        <div class="form-check d-flex align-items-center">
                            <input class="form-check-input hw-1-5-em checks1 cursor-pointer" type="checkbox" name="staff" id="staff4">
                            <label class="form-check-label ps-3 d-flex align-items-center w-100 cursor-pointer"
                                for="staff4">
                                <img src="https://randomuser.me/api/portraits/thumb/women/74.jpg" alt="user"
                                    class="rounded-circle img-4" width="35" height="35">
                                <div class="d-flex justify-content-between w-100"><span class="ms-2"> Tattersail </span>
                                    <span class="badge custom-badge-lpn">Staff</span>
                                </div>
                            </label>
                        </div>

                    </div>
                    <div class="section 2">
                        <div class="form-check d-flex align-items-center">
                            <input class="form-check-input select_all" type="checkbox" name="select_all" id="select_all11" data-type="2">
                            <label class="form-check-label ps-3" for="select_all11"> Select All </label>
                        </div>
                        @for ($i = 1; $i <= 13; $i++)
                            <div class="form-check d-flex align-items-center">
                                <input class="form-check-input checks2" type="checkbox" name="empoyeee" id="emp{{ $i }}">
                                <label class="form-check-label ps-3 d-flex align-items-center w-100"
                                    for="emp{{ $i }}">
                                    <img src="{{ $images[array_rand($images)] }}" alt="user"
                                        class="rounded-circle img-{{ $i }}" width="35" height="35">
                                    <div class="d-flex justify-content-between w-100">
                                        <span class="ms-2"> {{ $names[array_rand($names)] }} </span>
                                        @php
                                            $bdg = $badge[array_rand($badge)];
                                        @endphp
                                        <span
                                            class="badge custom-badge-{{ strtolower($bdg) }}">{{ $bdg }}</span>
                                    </div>
                                </label>
                            </div>
                        @endfor

                    </div>
                    <div class="text-center my-5 w-100" style="position: absolute;bottom: 0px;">
                        <button type="button" class="btn btn-secondary  me-3">ADD</button>
                        <button type="button" class="btn btn-muted ">CANCLE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function(val) {
            $('#add_user_offcanvas select').on('change', function(params) {
                managesection($(this).val());
            }).change();

            function managesection(val) {
                $('.section').hide();
                $('.section.' + val).show();
            }
            $('.select_all').on('change', function(params) {
                if ($(this).is(':checked')) {
                    $('.checks' + $(this).attr('data-type')).removeAttr('checked');
                    $('.checks' + $(this).attr('data-type')).attr('checked', true);
                } else {
                    $('.checks' + $(this).attr('data-type')).attr("checked", false);
                }
            });
            $('input[name="staff"]').on('change', function(params) {
                if ($(this).is(':checked')) {
                    if ($('input[name="staff"]').length == $('input[name="staff"]:checked').length) {
                        $('input[type="radio"][data-id="1"]').attr('checked', true);
                    } else {
                        $('input[type="radio"][data-id="1"]').attr("checked", false);
                    }
                } else {
                    $('input[type="radio"][data-id="1"]').attr("checked", false);
                }
            });
            // $('input[name="empoyeee"]').on('change', function(params) {
            //     if($('input[name="empoyeee"]').length == $('input[name="empoyeee"]:checked').length){
            //         $('input[type="radio"][data-id="2"]').attr('checked', true);
            //     }else{
            //         $('input[type="radio"][data-id="2"]').attr("checked", false);
            //     }
            // });
        })
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.1.3/socket.io.js"></script>

    <script>
        const SENDER_ID = '{{ auth()->id() }}';
        const TYPE_TEXT = '{{ \App\Models\Message::TYPE_TEXT }}'

        const URL_MESSAGING = '{{ route('messaging.index') }}';
        const URL_MESSAGING_COMPOSE = '{{ route('messaging.show-compose') }}';
        const URL_MESSAGING_SHOW_USER_CHAT = '{{ route('messaging.show-user-chat') }}';

        const URL_MESSAGES_STORE = '{{ route('messaging.store') }}';
        const URL_RECEIVER_MESSAGE = '{{ route('messaging.get-receiver-message') }}';
        const URL_FACILITY_USERS = '{{ route('messaging.get-facility-users') }}';
        const URL_MESSAGING_COMPOSE_STORE = '{{ route('messaging.compose.store') }}';

        const URL_MESSAGING_MARK_AS_READ = '{{ route('messaging.mark-as-read') }}';

        const socket = io.connect('ws://localhost:5014', { 'sync disconnect on unload': true, secure: true });
    </script>
    <script src="{{ asset('storage/app/public/assets/admin/js/custom/messaging.min.js') }}"></script>
@endsection

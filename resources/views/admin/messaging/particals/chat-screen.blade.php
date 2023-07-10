<div class="border-bottom">
    <input type="hidden" id="receiver_id" name="receiver_id" value="{{ $user->id }}" />
    <div class="row align-items-center">
        <div class="col-8">
            <h5>{{ $user->fullName }}</h5>
        </div>
        <div class="col-4 d-flex justify-content-end">
            <a href="javascript:;" data-bs-toggle="offcanvas" data-bs-target="#add_user_offcanvas"
                aria-controls="add_user_offcanvas"><i class="fa-regular fa-user-plus"></i></a>
            <ul class="moreoption">
                <li class="navbar nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"
                            aria-hidden="true"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="javascript:;"> Delete </a></li>
                        <li><a class="dropdown-item" href="javascript:;"> Clear Chat </a></li>
                        <li><a class="dropdown-item" href="javascript:;"> Block </a></li>
                        <li><a class="dropdown-item" href="javascript:;"> Report </a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="msg-body overflow-y-auto" style="height: 600px; overflow-y: hidden; display: flex; flex-direction: column-reverse;">
    <ul class="overflow-y-auto message-body-wrapper" id="message-body-wrapper">
        <li>
            <div class="divider">
                <h6>Today</h6>
            </div>
        </li>

        @foreach( $messages as $message )
            @include('admin.messaging.particals.sub-particals.message', [ 'message' => $message, 'receiverUser' => $user ])
        @endforeach

    </ul>
</div>
<div class="card-footer bg-transparent">
    <div class="d-flex gap-3">
        <div class="input-group">
            <input type="text" id="message" class="form-control form-control-lg" placeholder="Message" autocomplete="off" style="border-top-left-radius: 2rem; border-bottom-left-radius: 2rem;" />
            <span class="input-group-text border-0 bg-secondary-light">
                <i class="fa-regular fa-paperclip-vertical"></i>
            </span>
            <span class="input-group-text border-0 bg-secondary-light rounded-pill-end">
                <i class="fa-regular fa-face-smile"></i>
            </span>
        </div>
        <button type="button" class="btn btn-highlight rounded-circle" id="btn-send-message">
            <i class="fa fa-paper-plane" aria-hidden="true"></i>
        </button>
    </div>
</div>

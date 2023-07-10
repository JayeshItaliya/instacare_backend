<div class="px-5 mb-3 mt-5">
    <h3 class="fw-bold text-primary">{{ $type_name }}</h3>
    <span>Please select the person to whom you want to send message.</span>

    <ul class="list-group border border-0 mt-4 user-list" id="user-list">
        @foreach( $users as $user )
            <li class="list-group-item border-0 bg-transparent d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <input class="form-check-input form-check-input-lg border-secondary radio-select-user" type="radio" value="{{ $user->id }}" id="{{ $user->id }}" {{ $user->id == $sending_to ? 'checked' : '' }} name="{{ $type_name }}" />
                    
                    <div class="d-flex justify-content-between align-items-center ms-4">
                        <img src="{{ $user->image_url }}" class="object-fit-cover rounded border-light me-3" width="40" height="40" />
                        <label for="{{ $user->id }}">{{ $user->fullname }}</label>
                    </div>
                </div>
                <span class="badge custom-badge-cna">CNA</span>
            </li>
        @endforeach
    </ul>

    <div class="text-center my-5 w-100" style="position: absolute;bottom: 0px;">
        <button type="button" class="btn btn-secondary me-3" id="select-user">Select</button>
        <button type="button" class="btn btn-muted" data-bs-dismiss="offcanvas">CANCLE</button>
    </div>
</div>

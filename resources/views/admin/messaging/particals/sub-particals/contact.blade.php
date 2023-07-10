<a href="javascript: void(0);" class="d-flex align-items-center p-4 open-chat {{ $receiver_id == $contact->receiverContact->id ? 'is-active' : '' }}" data-user-id="{{ $contact->receiverContact->id }}" data-border-radius="20px">
    <div class="flex-shrink-0">
        <img class="img-fluid rounded-circle" src="{{ $contact->receiverContact->image_url }}" alt="{{ $contact->receiverContact->fullName }}" width="40" />
        <span class="active"></span>
    </div>
    <div class="flex-grow-1 ms-3">
        <div class="d-flex justify-content-between">
            <h6 class="fw-bolder text-dark">{{ $contact->receiverContact->fullName }}</h6>
            <small class="fw-bold text-primary">{{ Helper::date_time_format( $contact->message->created_at ) }}</small>
        </div>
        <p class="text-muted message-placeholder-text">{{ $contact->message->message }}</p>
    </div>
</a>

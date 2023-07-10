@if ( $receiverUser->id == $message->sender_id )
    <li class="sender">
        <div class="content mt-0 message-max-w" {{ $message->read_at ?'': 'data-read-message=readMessage' }} id="{{ $message->id }}">
            <span class="text-muted">{!! $message->message !!}</span>
            <p class="d-flex justify-content-between mt-2">
                <span class="badge text-bg-muted rounded-pill py-1">{{ $message->type }}</span>
                <small class="fw-bold text-primary">{{ Helper::time_format( $message->created_at ) }}</small>
            </p>
        </div>
    </li>
@else
    <li class="repaly">
        <div class="content mt-0 message-max-w" id="{{ $message->id }}">
            <div class="d-flex d-flex justify-content-between align-items-center message-text-wrapper">
                <span class="text-muted d-flex message-text message-width">{!! $message->message !!}</span>
                @includeWhen($message->read_at, 'admin.messaging.particals.sub-particals.double-tick')
            </div>
            <p class="d-flex justify-content-end mt-2">
                <small class="fw-bold text-primary">{{ Helper::time_format( $message->created_at ) }}</small>
            </p>
        </div>
    </li>
@endif

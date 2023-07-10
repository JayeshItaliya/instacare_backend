@forelse( $contacts as $contact )
    @include('admin.messaging.particals.sub-particals.contact', [ 'contact' => $contact, 'receiver_id' => $receiver_id ])
@empty
    <div class="p-4 text-center">
        <h4>No contacts</h4>
        <hr>
        <span>Click on the <i><strong class="text-uppercase">Compose</strong></i> to start new conversation.</span>
    </div>
@endforelse
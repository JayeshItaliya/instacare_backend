<h1 class="fw-bold px-4 mb-3">Send Message</h1>

<form id="form-message-compose" method="post" class="p-3">
    @csrf
    <div class="form-group">
        <select class="form-select rounded-pill text-dark fw-500 type" name="type" id="type" required>
            <option value="" selected>Choose Type</option>
            @foreach( $types as $k => $type )
                <option value="{{ $k }}">{{ $type }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <button type="button" class="btn btn-select text-capitalize me-3 w-100" id="btn_sending_to">Sent to</button>
        <input type="hidden" name="receiver_id" id="sending_to" value="" />
    </div>

    <div class="form-group">
        <div class="d-flex justify-content-around align-items-center">
            <label class="c-input c-radio">
                <input class="form-check-input form-check-input-lg border-secondary" type="radio" name="compose_method" id="by_email" value="email" />
                <label for="by_email" class="c-indicator">Email</label>
            </label>

            <label class="c-input c-radio">
                <input checked class="form-check-input form-check-input-lg border-secondary" type="radio" name="compose_method" id="by_text" value="text" />
                <label for="by_text" class="c-indicator">Text</label>
            </label>

            <label class="c-input c-radio">
                <input class="form-check-input form-check-input-lg border-secondary" type="radio" name="compose_method" id="by_both" value="both" />
                <label for="by_both" class="c-indicator">Both</label>
            </label>
        </div>
    </div>

    <div class="form-group">
        <textarea class="form-control" name="message" id="message" rows="5" style="resize: none;" placeholder="Message"></textarea>
    </div>

    <div class="text-center my-5 w-100" style="position: absolute; bottom: 0px;">
        <input type="submit" id="compose-send" class="btn btn-secondary me-3" value="Send" />
        <button type="button" class="btn btn-muted" data-bs-dismiss="offcanvas">CANCLE</button>
    </div>
</form>

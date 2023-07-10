@extends('admin.theme.default')
@section('title')
    Support
@endsection
@section('content')
    <div class="container-fluid content d-flex flex-column ">
        <!-- Begin::Content -->
        <h3 class="fw-bold mb-3">Support</h3>
        <div class="card bg-white border-0">
            <div class="card-body">
                <form action="{{ route('support.store') }}" method="post" id="supportform">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <select name="reason" id="reason" class="form-select rounded-pill">
                                    <option value="" selected="" disabled="">Select Reason</option>
                                    @foreach ($reasons as $reason)
                                        <option value="{{ $reason->reason }}">{{ $reason->reason }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <textarea name="message" id="message" class="form-control" rows="10" placeholder="Your Message"></textarea>
                            </div>
                            <button type="submit" class="btn btn-secondary mt-5">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- End::Content -->
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#supportform').on('submit', function(event) {
            "use strict";
            event.preventDefault();
            $('.err').remove();
            var formData = new FormData(this);
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                beforeSend: function(response) {
                    showpreloader();
                },
                success: function(response) {
                    hidepreloader();
                    if (response.status == 0) {
                        if (response.errors && Object.keys(response.errors).length > 0) {
                            $.each(response.errors, function(key, value) {
                                $('#supportform #' + key).parent().append(
                                    '<small class="err text-danger">' + value + '</small>')
                            });
                        } else {
                            showtoast(2, response.message)
                        }
                        return false;
                    } else {
                        $('.err').remove();
                        $('#supportform').removeClass('was-validated');
                        $('#supportform')[0].reset();
                        showtoast(1, response.message)
                    }
                },
                error: function(xhr, status, error) {
                    hidepreloader();
                    showtoast(2, wrong)
                    return false;
                }
            });
        });
    </script>
@endsection

@extends('admin.theme.default')
@section('title')
    My Availability
@endsection
@section('content')
    <div class="container-fluid content d-flex flex-column ">
        <div class="row align-items-center justify-content-between mb-3">
            <div class="col-auto">
                <h3 class="fw-bold">My Availability</h3>
            </div>
            <div class="col-auto"></div>
        </div>
        <div class="card bg-white border-0 mb-3" data-border-radius="10px">
            <div class="card-body">
                <form action="{{ route('my-availability.store') }}" method="post" id="availabilityform" class="needs-validation" novalidate>
                    <div class="row">
                        @php
                            $currentDate = date('Y-m-d');
                            if (date('N', strtotime($currentDate)) == 6) {
                                // If the current day is Saturday, add 1 day to start from Sunday of the next week
                                $currentDate = date('Y-m-d', strtotime($currentDate . '+1 day'));
                            }
                            $weeks = [];
                            for ($i = 0; $i < 4; $i++) {
                                $startDate = date('Y-m-d', strtotime($currentDate . " +{$i} week"));
                                $endDate = date('Y-m-d', strtotime($startDate . ' +6 days'));
                                $weeks[] = $startDate . ' - ' . $endDate;
                            }
                        @endphp
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="week" class="form-label fw-semibold text-dark fs-6 ps-3"> Week </label>
                                <select name="week" id="week" class="form-select rounded-pill" required="required">
                                    <option value="" selected="" disabled=""> Select week </option>
                                    @foreach ($weeks as $week)
                                        <option value="{{ $week }}"> {{ $week }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row d-lg-flex d-md-none d-sm-none">
                                <div class="col-md-5">
                                    <label for="" class="form-label fw-semibold text-dark fs-6 ps-3"> Select Days
                                    </label>
                                </div>
                                <div class="col-md-7">
                                    <label for="" class="form-label fw-semibold text-dark fs-6 ps-3"> Select Time
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                @php
                                    $dayNames = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
                                @endphp
                                @foreach ($dayNames as $key => $day)
                                    <div class="col-lg-5 mb-3">
                                        <label for=""
                                            class="form-label fw-semibold text-dark fs-6 ps-3 d-lg-none d-md-block"> Select
                                            Days </label>
                                        <div class="form-check p-3 bg-body mb-2 d-flex align-items-center"
                                            data-border-radius="15px">
                                            <input class="form-check-input ms-0 cursor-pointer hw-1-5-em" type="checkbox"
                                                name="shift_time[]" value="{{ $day }}"
                                                id="check{{ $day }}{{ $key }}" checked>
                                            <label class="form-check-label ps-3 cursor-pointer"
                                                for="check{{ $day }}{{ $key }}"> {{ ucfirst($day) }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 mb-3 timing">
                                        <label for=""
                                            class="form-label fw-semibold text-dark fs-6 ps-3 d-lg-none d-md-block"> Select
                                            Time </label>
                                        <div class="input-group gap-2">
                                            <select name="from[{{ $day }}]" class="form-select start-time"
                                                data-border-radius="15px" required="required">
                                                <option value="" selected="" disabled=""> Select time </option>
                                                @for ($i = 0; $i <= 24 * 2; $i++)
                                                    @php
                                                        $time = date('h:i A', strtotime(sprintf('%02d:%02d', (int) ($i / 2), ($i % 2) * 30)));
                                                    @endphp
                                                    @if ($i != 48)
                                                        <option value="{{ $time }}">{{ $time }}</option>
                                                    @endif
                                                @endfor

                                            </select>
                                            <select name="to[{{ $day }}]" class="form-select end-time"
                                                data-border-radius="15px" required="required">
                                                <option value="" selected="" disabled=""> Select time </option>
                                                @for ($i = 0; $i <= 24 * 2; $i++)
                                                    @php
                                                        $time = date('h:i A', strtotime(sprintf('%02d:%02d', (int) ($i / 2), ($i % 2) * 30)));
                                                    @endphp
                                                    @if ($i != 48)
                                                        <option value="{{ $time }}">{{ $time }}</option>
                                                    @endif
                                                @endfor

                                            </select>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label for="facility" class="form-label fw-semibold text-dark fs-6 ps-3"> My Prefered
                                    Facility </label>
                                <select name="facility" id="facility" class="form-select rounded-pill" required="required">
                                    <option value="" selected="" disabled=""> Select Facility </option>
                                    @foreach ($facilities as $facility)
                                        <option value="{{ $facility->id }}"> {{ $facility->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 pt-5">
                            <button type="submit"
                                class="btn btn-secondary btn-lg rounded-pill text-uppercase px-10 fs-6 me-3"> Save </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End::Content -->
    </div>
@endsection

@section('script')
    <script>
        $('#availabilityform').on('submit', function(event) {
            "use strict";
            event.preventDefault();
            $('.err').remove();

            var isValid = true;

            // Iterate through each timing input field
            $('body').find('.timing').each(function() {
                $(this).find('.border').removeClass('border');
                $(this).find('.border-danger').removeClass('border-danger');
                var startTime = $(this).find('.start-time').val();
                var endTime = $(this).find('.end-time').val();

                if ($.trim(startTime) == '') {
                    isValid = false;
                    $(this).find('.start-time').addClass('border border-danger');
                    if (!isValid) {
                        event.preventDefault();
                        return false
                    }
                } else {
                    if ($.trim(endTime) == '') {
                        isValid = false;
                        $(this).find('.end-time').addClass('border border-danger');
                        if (!isValid) {
                            event.preventDefault();
                            return false
                        }
                    } else {
                        var start24 = convertTo24HourFormat(startTime);
                        var end24 = convertTo24HourFormat(endTime);
                        if (start24 >= end24) {
                            isValid = false;
                            $(this).addClass('is-invalid');
                            return false
                        } else {
                            $(this).removeClass('is-invalid');
                        }
                    }
                }
            });
            if (!isValid) {
                event.preventDefault();
                // showtoast(2, 'Please select all start and end timings')
                return false
            }

            function convertTo24HourFormat(time12) {
                var [time, period] = time12.split(' ');
                var [hours, minutes] = time.split(':');
                if (period === 'PM' && hours !== '12') {
                    hours = parseInt(hours) + 12;
                } else if (period === 'AM' && hours === '12') {
                    hours = '00';
                }
                return hours + ':' + minutes;
            }



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
                                if (key == 'from' || key == 'to') {
                                    showtoast(2, value)
                                } else {
                                    $('#availabilityform #' + key).parent().append(
                                        '<small class="err text-danger">' + value +
                                        '</small>')
                                }
                            });
                        } else {
                            showtoast(2, response.message)
                        }
                        return false;
                    } else {
                        $('.err').remove();
                        $('#availabilityform').removeClass('was-validated');
                        $('#availabilityform')[0].reset();
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

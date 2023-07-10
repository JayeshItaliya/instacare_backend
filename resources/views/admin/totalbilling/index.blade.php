@extends('admin.theme.default')
@section('title')
    Total Billing
@endsection
@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection
@section('content')
    <div class="container-fluid content d-flex flex-column ">
        <!-- Begin::Content -->
        <div class="row align-items-center justify-content-between mb-3">
            <div class="col-auto">
                <div class="d-flex align-items-center">
                    <h3 class="fw-bold">Total Billing</h3>
                </div>
            </div>
            <div class="col-auto"></div>
        </div>
        <div class="card bg-white border-0 mb-3">
            <div class="card-body pb-0">
                <form class="row justify-content-between">
                    <div class="col-lg-8 pb-3">
                        <div class="d-flex align-items-center gap-3">
                            <input type="text" class="form-control border bg-white" id="date_range" placeholder="Search by Invoice Number">
                            <label for="date_range" class="form-label text-nowrap text-dark fw-semibold fs-7">Date Range</label>
                            <div class="input-group">
                                <input type="text" class="form-control bg-white border border-end-0" id="date_range" placeholder="06/02/2023   -   12/02/2023">
                                <span class="input-group-text bg-white text-secondary fw-bold border-start-0"><i class="fa-light fa-calendar"></i></span>
                            </div>
                            <label for="amount_range" class="form-label text-nowrap text-dark fw-semibold fs-7">Amount Range</label>
                            <select class="form-select border" name="amount_range" id="amount_range"></select>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card bg-white border-0">
            <div class="card-body">

                <table id="" data-toggle="table" class="table-striped">
                    <thead>
                        <tr class="bg-primary text-white">
                            <th class="fw-normal border-0 text-center" data-field="" data-width="50" data-width-unit="px"></th>
                            <th class="fw-normal border-0" data-field="name">Name</th>
                            <th class="fw-normal border-0" data-field="contact_person">Date</th>
                            <th class="fw-normal border-0" data-field="amount">Amount</th>
                            <th class="fw-normal border-0" data-field="dd"></th>
                            <th class="fw-normal border-0 fs-5" data-field="action"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-2 border-start-0 border-end-0"> <input class="form-check-input form-check-input-lg border-secondary" type="checkbox" value=""> </td>
                            <td class="py-2 border-start-0 border-end-0"><a href="javascript:;" data-bs-toggle="offcanvas" data-bs-target="#billing_reports_aside" aria-controls="billing_reports_aside" class="text-dark fw-semibold">Invoice 733</a> </td>
                            <td class="py-2 border-start-0 border-end-0 fw-bold">March 10, 2023</td>
                            <td class="py-2 border-start-0 border-end-0">$2,950</td>
                            <td class="py-2 border-start-0 border-end-0"> <a href="javascript:;" class="text-primary"><i class="fa-regular fa-cloud-arrow-down fs-4 me-2"></i><span class="fw-semibold">Download</span></a> </td>
                            <td class="py-2 border-start-0 border-end-0"> <a href="javascript:;" class="ms-2" data-bs-toggle="offcanvas" data-bs-target="#billing_reports_aside" aria-controls="billing_reports_aside"><i class="fa-regular fa-eye"></i></a> </td>
                        </tr>
                        <tr>
                            <td class="py-2 border-start-0 border-end-0"> <input class="form-check-input form-check-input-lg border-secondary" type="checkbox" value=""> </td>
                            <td class="py-2 border-start-0 border-end-0"><a href="javascript:;" data-bs-toggle="offcanvas" data-bs-target="#billing_reports_aside" aria-controls="billing_reports_aside" class="text-dark fw-semibold">invoice 689</a> </td>
                            <td class="py-2 border-start-0 border-end-0 fw-bold">Feb 4, 2023</td>
                            <td class="py-2 border-start-0 border-end-0">$2,355</td>
                            <td class="py-2 border-start-0 border-end-0"> <a href="javascript:;" class="text-primary"><i class="fa-regular fa-cloud-arrow-down fs-4 me-2"></i><span class="fw-semibold">Download</span></a> </td>
                            <td class="py-2 border-start-0 border-end-0"> <a href="javascript:;" class="ms-2" data-bs-toggle="offcanvas" data-bs-target="#billing_reports_aside" aria-controls="billing_reports_aside"><i class="fa-regular fa-eye"></i></a> </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
        <div class="offcanvas offcanvas-end border-start-0" tabindex="-1" id="billing_reports_aside"
            aria-labelledby="billing_reports_asideLabel" style="border-top: 5px solid var(--bs-secondary); top:80px; width:430px;">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title fw-bold" id="billing_reports_asideLabel">Invoice 733</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <p class="text-uppercase mb-3">10 March 2023</p>
                <div class="card bg-body">
                    <div class="card-body">
                        <p class="fw-bold text-primary"> Invoice : 733 </p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td class="text-muted border-0">Description</td>
                                        <td class="text-muted border-0">Qty</td>
                                        <td class="text-muted border-0">Amount</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th class="border-white border-bottom bg-secondary-light">CNA Staffing Hours</th>
                                        <th class="border-white border-bottom bg-secondary-light">120</th>
                                        <th class="border-white border-bottom bg-secondary-light">$1200</th>
                                    </tr>
                                    <tr>
                                        <th class="border-white border-bottom bg-secondary-light">LPN Staffing Hours</th>
                                        <th class="border-white border-bottom bg-secondary-light">115</th>
                                        <th class="border-white border-bottom bg-secondary-light">$1150</th>
                                    </tr>
                                    <tr>
                                        <th class="border-white border-bottom bg-secondary-light">RN Staffing Hours</th>
                                        <th class="border-white border-bottom bg-secondary-light">60</th>
                                        <th class="border-white border-bottom bg-secondary-light">$600</th>
                                    </tr>
                                    <tr class="mt-2 mb-4">
                                        <td class="border-0 fw-bold text-primary py-3" colspan="2">Balance Due</td>
                                        <td class="border-0 fs-5 fw-bold py-3">$2,950</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-5">
                    <span class="fw-bold text-primary"> <i class="far fa-cloud-arrow-down mx-2"></i> Download Invoice </span>
                </div>
            </div>
        </div>
        <!-- End::Content -->
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        $('#date_range').flatpickr({
            mode: "range",
            dateFormat: "Y-m-d",
            onClose: function(selectedDates, dateStr, instance) {
                // console.log(dateStr);
            }
        });
    </script>
@endsection

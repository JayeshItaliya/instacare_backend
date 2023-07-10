@extends('admin.theme.default')
@section('title')
    Reports
@endsection
@section('style')
    <style>
        .cutsom-card {
            width: 428px;
            height: auto;
            background: #FFFFFF;
            box-shadow: -10px 0px 30px rgba(0, 0, 0, 0.16);
            border-radius: 30px;
        }

        .custom-select-tag {
            background-color: rgba(var(--bs-secondary-rgb), 0.1);
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid content d-flex flex-column ">
        <!-- Begin::Content -->
        <h3 class="fw-bold mb-3">Reports</h3>
        <div class="card bg-white border-0 mb-3">
            <div class="card-body pb-0">
                <form class="row align-items-center">
                    <div class="col-lg-8 pb-3">
                        <div class="d-flex align-items-center gap-3" style="width: 55%">
                            <label for="date_range" class="form-label text-nowrap text-dark fw-semibold fs-7">Date
                                Range</label>
                            <div class="input-group">
                                <input type="text" class="form-control bg-white border border-end-0" id="date_range"
                                    placeholder="06/02/2023   -   12/02/2023">
                                <span class="input-group-text bg-white text-secondary fw-bold border-start-0"> <i
                                        class="fa-light fa-calendar"></i> </span>
                            </div>
                            <div class="d-flex">
                                <button type="button" class="btn input-group-text my-btns active">Week</button>
                                <button type="button" class="btn input-group-text my-btns">Month</button>
                                <button type="button"
                                    class="btn input-group-text my-btns group-last-btn-radius">Year</button>
                            </div>

                        </div>
                    </div>
                </form>

            </div>
        </div>
        <div class="card bg-white border-0 mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="d-flex">
                            <button type="button" class="btn btn-sm fs-9 p-3 my-btns active"> Total Bill to Facility
                            </button>
                            <button type="button" class="btn btn-sm fs-9 p-3 my-btns"> Total Bill to Instacare </button>
                            <button type="button" class="btn btn-sm fs-9 p-3 my-btns"> Timecards </button>
                            <button type="button" class="btn btn-sm fs-9 p-3 my-btns"> PBJ Reports </button>
                            <button type="button" class="btn btn-sm fs-9 p-3 my-btns"> Attendance report </button>
                            <button type="button" class="btn btn-sm fs-9 p-3 my-btns"> Total Call Offs </button>
                            <button type="button" class="btn btn-sm fs-9 p-3 my-btns"> Total Cancellations <i
                                    class="fa fa-chevron-down text-secondary"></i> </button>
                            <button type="button" class="btn btn-sm fs-9 p-3 my-btns"> Total Confirmed Shifts </button>
                            <button type="button" class="btn btn-sm fs-9 p-3 my-btns group-last-btn-radius"> Total
                                Unassigned Shifts </button>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <div
                                class="rounded-pill p-3 w-25 d-flex justify-content-between align-items-center custom-select-tag facilities">
                                Facility <i class="fa fa-chevron-down text-secondary"></i> </div>

                            <div class="cutsom-card p-4" style="display: none;">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input hw-1-5-em select_all cursor-pointer" type="checkbox" name="select_all" id="select_all11" data-type="2">
                                    <label class="form-check-label ps-3 cursor-pointer" for="select_all11"> Select All
                                    </label>
                                </div>
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input hw-1-5-em checks2 cursor-pointer" type="checkbox" name="empoyeee" id="emp1">
                                    <label class="form-check-label ps-3 d-flex align-items-center w-100 cursor-pointer"
                                        for="emp1">
                                        <img src="https://randomuser.me/api/portraits/thumb/women/80.jpg" alt="user"
                                            width="40" height="40" data-border-radius="10px">
                                        <span class="ms-2"> Care Center </span>
                                    </label>
                                </div>
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input hw-1-5-em checks2 cursor-pointer" type="checkbox" name="empoyeee" id="emp2">
                                    <label class="form-check-label ps-3 d-flex align-items-center w-100 cursor-pointer"
                                        for="emp2">
                                        <img src="https://randomuser.me/api/portraits/thumb/men/87.jpg" alt="user"
                                            width="40" height="40" data-border-radius="10px">
                                        <span class="ms-2"> Elevate care north branch </span>
                                    </label>
                                </div>
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input hw-1-5-em checks2 cursor-pointer" type="checkbox" name="empoyeee" id="emp3">
                                    <label class="form-check-label ps-3 d-flex align-items-center w-100 cursor-pointer"
                                        for="emp3">
                                        <img src="https://randomuser.me/api/portraits/thumb/women/74.jpg" alt="user"
                                            width="40" height="40" data-border-radius="10px">
                                        <span class="ms-2"> Community Health Center </span>
                                    </label>
                                </div>
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input hw-1-5-em checks2 cursor-pointer" type="checkbox" name="empoyeee" id="emp4">
                                    <label class="form-check-label ps-3 d-flex align-items-center w-100 cursor-pointer"
                                        for="emp4">
                                        <img src="https://randomuser.me/api/portraits/thumb/men/66.jpg" alt="user"
                                            width="40" height="40" data-border-radius="10px">
                                        <span class="ms-2"> Care Center </span>
                                    </label>
                                </div>
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input hw-1-5-em checks2 cursor-pointer" type="checkbox" name="empoyeee" id="emp5">
                                    <label class="form-check-label ps-3 d-flex align-items-center w-100 cursor-pointer"
                                        for="emp5">
                                        <img src="https://randomuser.me/api/portraits/thumb/women/74.jpg" alt="user"
                                            width="40" height="40" data-border-radius="10px">
                                        <span class="ms-2"> Elevate care north branch </span>
                                    </label>
                                </div>
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input hw-1-5-em checks2 cursor-pointer" type="checkbox" name="empoyeee" id="emp6">
                                    <label class="form-check-label ps-3 d-flex align-items-center w-100 cursor-pointer"
                                        for="emp6">
                                        <img src="https://randomuser.me/api/portraits/thumb/men/87.jpg" alt="user"
                                            width="40" height="40" data-border-radius="10px">
                                        <span class="ms-2"> Community Health Center </span>
                                    </label>
                                </div>
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input hw-1-5-em checks2 cursor-pointer" type="checkbox" name="empoyeee" id="emp6">
                                    <label class="form-check-label ps-3 d-flex align-items-center w-100 cursor-pointer"
                                        for="emp6">
                                        <img src="https://randomuser.me/api/portraits/thumb/men/99.jpg" alt="user"
                                            width="40" height="40" data-border-radius="10px">
                                        <span class="ms-2"> Care Center </span>
                                    </label>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="col-12">
                        <button type="button" class="btn btn-secondary rounded-pill py-2 text-white text-uppercase"
                            data-bs-toggle="offcanvas" data-bs-target="#reports_aside" aria-controls="reports_aside"> Run
                            Report </button>
                    </div>
                </div>

            </div>
        </div>
        <!-- Begin::Filter Aside -->
        <div class="offcanvas offcanvas-end border-start-0" tabindex="-1" id="reports_aside"
            aria-labelledby="reports_asideLabel"
            style="border-top: 5px solid var(--bs-secondary); top:80px; width:430px;">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title fw-bold" id="reports_asideLabel">Invoice 733</h5>
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
                                        <td class="text-muted border-0" >Description</td>
                                        <td class="text-muted border-0" >Qty</td>
                                        <td class="text-muted border-0" >Amount</td>
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
                                        <td class="border-0 fw-bold text-primary py-3" colspan="2" >Balance Due</td>
                                        <td class="border-0 fs-5 fw-bold py-3">$2,950</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-around mt-5">
                    <span class="fw-bold text-primary"> <i class="far fa-cloud-arrow-down"></i> CSV Report </span>
                    <span class="fw-bold text-primary"> <i class="far fa-cloud-arrow-down"></i> PDF Report </span>
                </div>
            </div>
        </div>
        <!-- End::Filter Aside -->
        <!-- End::Content -->
    </div>
@endsection
@section('script')
    <script>
        $('.facilities').on('click', function() {
            if ($('.cutsom-card').is(':visible')) {
                $('.cutsom-card').hide();
            } else {
                $('.cutsom-card').show();
            }
        });
        $(document).on('click', function(event) {
            var clickedElement = $(event.target);
            if (!clickedElement.is('.facilities') && !clickedElement.is('.cutsom-card') && !clickedElement.is(
                    '.cutsom-card')) {
                $('.cutsom-card').hide();
            }
        });
    </script>
@endsection

window.addEventListener("load", function () {
    "use strict";
    $("#preloader").addClass("d-none");
});
var now = Date();

$(".datepicker").datepicker({
    isDisabled: now.valueOf() < now ? true : false,
});

$(document).ready(function () {
    $("form, input, textarea").attr("autocomplete", "off");
    $("form").addClass("needs-validation").attr("novalidate", "true");

    // Bootstrap Form Validation
    (function () {
        "use strict";

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = $(".needs-validation");

        // Loop over them and prevent submission
        forms.each(function () {
            $(this).on("submit", function (event) {
                if (!this.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                $(this).addClass("was-validated");
            });
        });
    })();

    // Bootstrap Table
    $(".bootstrap-table.bootstrap5 .fixed-table-body").attr(
        "style",
        "border-top-left-radius:10px;border-top-right-radius:10px"
    );
    $(".bootstrap-table.bootstrap5 .fixed-table-pagination").addClass(
        "pt-3 d-flex flex-row-reverse align-items-center justify-content-between"
    );
    $(".bootstrap-table.bootstrap5 .pagination ul").addClass("gap-2");
    $(".bootstrap-table.bootstrap5 .pagination ul .page-link").addClass(
        "rounded-circle"
    );
    $(".bootstrap-table.bootstrap5 .pagination ul .page-pre a").html(
        '<i class="fa-regular fa-chevron-left"></i>'
    );
    $(".bootstrap-table.bootstrap5 .pagination ul .page-next a").html(
        '<i class="fa-regular fa-chevron-right"></i>'
    );
    $(
        'input[type="radio"]:not([role="switch"]), input[type="checkbox"]:not([role="switch"])'
    )
        .each((i, el) =>
            $('label[for="' + el.id + '"]')
                .add(el)
                .addClass("cursor-pointer")
        )
        .attr("style", "width: 1.5em;height:1.5em;");
    $(".form-check label:not(.default)").addClass("ps-3");
    $(".form-check").addClass("d-flex align-items-center");
    // Ajax set headers for all ajax requests
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $("[data-border-radius]").each(function () {
        var borderRadius = $(this).data("border-radius");
        $(this).css("border-radius", borderRadius);
    });
    // $("body").find("[class*='br-']").each(function () {
    //     var radius = parseInt($(this).attr('class').replace('br-', ''));
    //     alert(radius)
    //     $(this).css('border-radius', radius);
    // });
});

// Toastr
function showtoast(type, message) {
    const icons = [
        "",
        "fa-check text-success",
        "fa-close text-danger",
        "fa-bell text-warning",
    ];
    const iconClass = icons[type]
        ? `<i class="fa-regular ${icons[type]} me-3 fw-bold fs-6"></i>`
        : "";
    var html =
        '<div class="d-flex align-items-center gap-2">' +
        iconClass +
        message +
        "</div>";
    $(".mytoastr .toast-body").html(html);
    new bootstrap.Toast($(".mytoastr")).show();
}

function logout(url) {
    "use strict";
    swalWithBootstrapButtons
        .fire({
            title: are_you_sure,
            icon: "warning",
            showClass: {
                popup: "animate__animated animate__bounceInDown",
            },
            hideClass: {
                popup: "animate__animated animate__bounceOutUp",
            },
            showCancelButton: true,
            confirmButtonText: yes,
            cancelButtonText: no,
            showLoaderOnConfirm: true,
        })
        .then((result) => {
            result.isConfirmed && (window.location = url);
        });
}

function shift_confirmation() {
    swalWithBootstrapButtons
        .fire({
            title: "Confirmation",
            showClass: {
                popup: "animate__animated animate__bounceInDown",
            },
            hideClass: {
                popup: "animate__animated animate__bounceOutUp",
            },
            showCancelButton: true,
            confirmButtonText: yes,
            cancelButtonText: no,
            showLoaderOnConfirm: true,
            didOpen: function () {
                $(".swal2-container .swal2-popup").append(
                    '<span class="custom-sweetalert-border-top"></span>'
                );
                $(".swal2-title")
                    .addClass("text-dark fw-semibold")
                    .parent()
                    .prepend(
                        '<small class="text-primary text-uppercase text-center mt-5">shift information</small>'
                    );
                $(".swal2-html-container")
                    .show()
                    .addClass("mb-5")
                    .append(
                        "<span>Do you really want to <strong>Clock In</strong> shift?</span>"
                    );
            },
        })
        .then((result) => {
            if (result.isConfirmed) {
                showtoast(3, "Your shift started at 7:01 AM ");
                $(".shift_confirmed").html(
                    '<svg width="27" height="26" viewBox="0 0 27 26" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M24.1214 13.2752C24.2642 10.9328 23.6913 8.60232 22.4788 6.59305C21.2664 4.58377 19.4717 2.99063 17.3328 2.025C15.1939 1.05937 12.812 0.766889 10.503 1.18637C8.19408 1.60586 6.06724 2.71747 4.4047 4.37373C2.74216 6.02999 1.6225 8.1526 1.19428 10.46C0.766063 12.7673 1.04952 15.1503 2.00705 17.2928C2.96458 19.4354 4.55091 21.2361 6.55559 22.4561C8.56026 23.6762 10.8885 24.2579 13.2314 24.124" stroke="#F33047" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M12.5703 6.14258V12.5711L16.4275 16.4283" stroke="#F33047" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M21.572 17.2857V25M21.572 25L25.4291 21.1429M21.572 25L17.7148 21.1429" stroke="#F33047" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>'
                );
            } else {
                Swal.close();
            }
        });
}

function showpreloader() {
    "use strict";
    $("#preloader").removeClass("d-none");
}

function hidepreloader() {
    "use strict";
    $("#preloader").addClass("d-none");
}

function swal_cancelled(t) {
    "use strict";
    var e = wrong;
    t && (e = "" + t), swalWithBootstrapButtons.fire(oops, e, "error");
}

function deletedata(e) {
    "use strict";
    swalWithBootstrapButtons
        .fire({
            icon: "warning",
            title: are_you_sure,
            showCancelButton: !0,
            allowOutsideClick: !1,
            allowEscapeKey: !1,
            confirmButtonText: yes,
            cancelButtonText: no,
            reverseButtons: !1,
            showLoaderOnConfirm: !0,
            showClass: {
                popup: "animate__animated animate__bounceInDown",
            },
            hideClass: {
                popup: "animate__animated animate__bounceOutUp",
            },
            preConfirm: function () {
                return new Promise(function (o, n) {
                    $.ajax({
                        type: "DELETE",
                        url: e,
                        success: function (t) {
                            if (t.status == 1) {
                                // Swal.close();
                                location.reload();
                                showtoast(1, t.message);
                            } else {
                                swal_cancelled(t.message);
                            }
                        },
                        error: function (t) {
                            return swal_cancelled(wrong), !1;
                        },
                    });
                });
            },
        })
        .then((t) => {
            t.isConfirmed || (t.dismiss, Swal.DismissReason.cancel);
        });
}

function changestatus(u, i, s) {
    "use strict";
    swalWithBootstrapButtons
        .fire({
            icon: "warning",
            title: are_you_sure,
            showCancelButton: !0,
            allowOutsideClick: !1,
            allowEscapeKey: !1,
            confirmButtonText: yes,
            cancelButtonText: no,
            reverseButtons: !1,
            showLoaderOnConfirm: !0,
            showClass: {
                popup: "animate__animated animate__bounceInDown",
            },
            hideClass: {
                popup: "animate__animated animate__bounceOutUp",
            },
            preConfirm: function () {
                return new Promise(function (o, n) {
                    $.ajax({
                        type: "POST",
                        url: u,
                        data: { id: i, status: s },
                        dataType: "json",
                        success: function (r) {
                            if (r.status == 1) {
                                location.reload();
                                // showtoast(1, r.message);
                            } else {
                                swal_cancelled(r.message);
                            }
                        },
                        error: function (r) {
                            return swal_cancelled(wrong), !1;
                        },
                    });
                });
            },
        })
        .then((t) => {
            t.isConfirmed || (t.dismiss, Swal.DismissReason.cancel);
        });
}

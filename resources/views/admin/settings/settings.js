// -------------------------------------------------- //
// ------------ Manage Template Settings ------------ //
// -------------------------------------------------- // 
$('#templates_settings_select').on('change', function () {
    $('.email_templates, .text_templates').hide();
    if ($(this).val() == 'both') {
        $('.email_templates, .text_templates').show();
    } else {
        $('.' + $(this).val()).show();
    }
}).change();
// Manage email templates
$('#email_templatemodal').on('hidden.bs.modal', function () {
    "use strict";
    $('.err').remove();
    $('#emailtemplateform')[0].reset();
    $('#emailtemplateform').removeClass('was-validated');
    $('#etid').val('');
});
$('body').on('click', '.manage-email-template', function () {
    "use strict";
    $('#email_templatemodal').modal('show');
    $('#email_templatemodal #etid').val($(this).attr('data-etid'));
    $('#email_templatemodal #status').val($(this).attr('data-status'));
    $('#email_templatemodal #subject').val($(this).attr('data-subject'));
    $('#email_templatemodal #message').val($(this).attr('data-message'));
    var emailEditor = editorsarray.find(instance => instance.id === 'email_ckeditor');
    emailEditor.instance.setData($(this).attr('data-message'));
});
$('#emailtemplateform').on('submit', function (event) {
    "use strict";
    event.preventDefault();
    $('.err').remove();
    var formData = new FormData(this);
    var editorInstance = editorsarray.find(function (instance) {
        return instance.id === 'email_ckeditor';
    });
    var editorContent = editorInstance ? editorInstance.instance.getData() : '';
    formData.set('message', editorContent);
    $.ajax({
        url: $(this).attr('action'),
        type: 'POST',
        data: formData,
        dataType: 'json',
        contentType: false,
        processData: false,
        beforeSend: function (response) {
            showpreloader();
        },
        success: function (response) {
            hidepreloader();
            if (response.status == 0) {
                if (response.errors && Object.keys(response.errors).length > 0) {
                    $.each(response.errors, function (key, value) {
                        var keyElement = (key === 'message') ? $('#emailtemplateform #email_ckeditor') : $('#emailtemplateform #' + key);
                        keyElement.parent().append('<small class="err text-danger">' + value + '</small>');
                    });
                } else {
                    showtoast(2, response.message)
                }
                return false;
            } else {
                $('.err').remove();
                $('#emailtemplateform').removeClass('was-validated');
                $('#emailtemplateform')[0].reset();
                $('#email_templatemodal').modal('hide');
                showtoast(1, response.message);
                location.reload();
            }
        },
        error: function (xhr, status, error) {
            hidepreloader();
            showtoast(2, wrong)
            return false;
        }
    });
});
// Manage text templates
$('#text_templatemodal').on('hidden.bs.modal', function () {
    "use strict";
    $('.err').remove();
    $('#texttemplateform')[0].reset();
    $('#texttemplateform').removeClass('was-validated');
    $('#ttid').val('');
});
$('body').on('click', '.manage-text-template', function () {
    "use strict";
    $('#text_templatemodal').modal('show');
    $('#text_templatemodal #ttid').val($(this).attr('data-ttid'));
    $('#text_templatemodal #status').val($(this).attr('data-status'));
    $('#text_templatemodal #subject').val($(this).attr('data-subject'));
    $('#text_templatemodal #message').val($(this).attr('data-message'));
});
$('#texttemplateform').on('submit', function (event) {
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
        beforeSend: function (response) {
            showpreloader();
        },
        success: function (response) {
            hidepreloader();
            if (response.status == 0) {
                if (response.errors && Object.keys(response.errors).length > 0) {
                    $.each(response.errors, function (key, value) {
                        $('#texttemplateform #' + key).parent().append(
                            '<small class="err text-danger">' + value + '</small>')
                    });
                } else {
                    showtoast(2, response.message)
                }
                return false;
            } else {
                $('.err').remove();
                $('#texttemplateform').removeClass('was-validated');
                $('#texttemplateform')[0].reset();
                $('#text_templatemodal').modal('hide');
                showtoast(1, response.message)
                location.reload()
            }
        },
        error: function (xhr, status, error) {
            hidepreloader();
            showtoast(2, wrong)
            return false;
        }
    });
});
// ---------------------------------------------- //
// ------------ Manage News Settings ------------ //
// ---------------------------------------------- //
$('#news_settings_modal').on('hidden.bs.modal', function () {
    "use strict";
    $('.err').remove();
    $('#newssettingsform')[0].reset();
    $('#newssettingsform').removeClass('was-validated');
    $('#nid').val('');
    $('#news_settings_modal').find('.modal-title').html('Add News');
    $('#news_settings_modal #type').show().val('');
    $('#news_settings_modal .created-at span').text('');
    $('#news_settings_modal .updated-at').hide();
});
$('body').on('click', '.add-news_', function () {
    "use strict";
    $('#news_settings_modal .created-at span').text($(this).attr('data-created-at'));
    $('#news_settings_modal .updated-at').hide();
});
$('body').on('click', '.manage-news-data', function () {
    "use strict";
    $('#news_settings_modal').modal('show').find('.modal-title').html($(this).attr('data-ntitle'));
    $('#news_settings_modal #nid').val($(this).attr('data-nid'));
    $('#news_settings_modal #title').val($(this).attr('data-title'));
    $('#news_settings_modal #type').hide().val($(this).attr('data-type'));

    $('#news_settings_modal #status').val($(this).attr('data-status'));
    $('#news_settings_modal .created-at span').text($(this).attr('data-created-at'));
    $('#news_settings_modal .updated-at').show().find('span').text($(this).attr('data-updated-at'));

    var newseditor = editorsarray.find(instance => instance.id === 'news_ckeditor');
    newseditor.instance.setData($(this).attr('data-description'));
});
$('#newssettingsform').on('submit', function (event) {
    "use strict";
    event.preventDefault();
    $('.err').remove();
    var formData = new FormData(this);
    var editorInstance = editorsarray.find(function (instance) {
        return instance.id === 'news_ckeditor';
    });
    var editorContent = editorInstance ? editorInstance.instance.getData() : '';
    formData.set('description', editorContent);
    $.ajax({
        url: $(this).attr('action'),
        type: 'POST',
        data: formData,
        dataType: 'json',
        contentType: false,
        processData: false,
        beforeSend: function (response) {
            showpreloader();
        },
        success: function (response) {
            hidepreloader();
            if (response.status == 0) {
                if (response.errors && Object.keys(response.errors).length > 0) {
                    $.each(response.errors, function (key, value) {
                        var keyElement = (key === 'description') ? $(
                            '#newssettingsform #news_ckeditor') : $(
                            '#newssettingsform #' + key);
                        keyElement.parent().append('<small class="err text-danger">' +
                            value + '</small>');
                    });
                } else {
                    showtoast(2, response.message)
                }
                return false;
            } else {
                $('.err').remove();
                $('#newssettingsform').removeClass('was-validated');
                $('#newssettingsform')[0].reset();
                $('#news_settings_modal').modal('hide');
                showtoast(1, response.message)
                location.reload()
            }
        },
        error: function (xhr, status, error) {
            hidepreloader();
            showtoast(2, wrong)
            return false;
        }
    });
});
// ----------------------------------------------- //
// ------------ Manage Coins Settings ------------ //
// ----------------------------------------------- //
$('.minus, .plus').on('click', function () {
    "use strict";
    var $input = $(this).parent().find('input');
    var value = parseInt($input.val());
    if ($(this).hasClass('minus')) {
        value = value <= 1 ? 1 : value - 1;
    } else {
        value = value + 1;
    }
    $input.val(value).change();
    return false;
});
$('#points_modal').on('hidden.bs.modal', function () {
    "use strict";
    $('.err').remove();
    $('#pointsform')[0].reset();
    $('#pointsform').removeClass('was-validated');
    $('#pid').val('');
});
$('body').on('click', '.manage-points', function () {
    "use strict";
    $('#points_modal').modal('show');
    $('#points_modal #pid').val($(this).attr('data-pid'));
    $('#points_modal #reason').val($(this).attr('data-reason'));
    $('#points_modal #points').val($(this).attr('data-points'));
});
$('#pointsform').on('submit', function (event) {
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
        beforeSend: function (response) {
            showpreloader();
        },
        success: function (response) {
            hidepreloader();
            if (response.status == 0) {
                if (response.errors && Object.keys(response.errors).length > 0) {
                    $.each(response.errors, function (key, value) {
                        var keyElement = (key === 'points') ? $('#pointsform #' + key)
                            .parent() : $('#pointsform #' + key);
                        keyElement.parent().append('<small class="err text-danger">' +
                            value + '</small>');
                    });
                } else {
                    showtoast(2, response.message)
                }
                return false;
            } else {
                $('.err').remove();
                $('#pointsform').removeClass('was-validated');
                $('#pointsform')[0].reset();
                $('#points_modal').modal('hide');
                showtoast(1, response.message)
                location.reload()
            }
        },
        error: function (xhr, status, error) {
            hidepreloader();
            showtoast(2, wrong)
            return false;
        }
    });
});
// ------------------------------------------------- //
// ------------ Manage Billing Settings ------------ //
// ------------------------------------------------- //
$(function (params) {
    "use strict";
    $('#invoice_statement_start_date').flatpickr({});
    $('#invoice_statement_end_date').flatpickr({});
    $('#invoice_frequency_start_date').flatpickr({});
    $('#invoice_frequency_end_date').flatpickr({});
    $('input[type="radio"][name="invoice_statement"]').on('change', function () {
        if ($(this).val() == 'custom') {
            $('.statement-dates').removeClass('d-none')
            $('.statement-dates').find('input').attr('disabled', false);
        } else {
            $('.statement-dates').addClass('d-none')
            $('.statement-dates').find('input').attr('disabled', true);
        }
    });
    $('input[type="radio"][name="invoice_statement"]:checked').on('change', function () {
        if ($(this).val() == 'custom') {
            $('.statement-dates').removeClass('d-none')
            $('.statement-dates').find('input').attr('disabled', false);
        } else {
            $('.statement-dates').addClass('d-none')
            $('.statement-dates').find('input').attr('disabled', true);
        }
    }).change();
    $('input[type="radio"][name="invoice_frequency_delivery"]').on('change', function () {
        if ($(this).val() == 'custom') {
            $('.delivery-dates').removeClass('d-none')
            $('.delivery-dates').find('input').attr('disabled', false);
        } else {
            $('.delivery-dates').addClass('d-none')
            $('.delivery-dates').find('input').attr('disabled', true);
        }
    });
    $('input[type="radio"][name="invoice_frequency_delivery"]:checked').on('change', function () {
        if ($(this).val() == 'custom') {
            $('.delivery-dates').removeClass('d-none')
            $('.delivery-dates').find('input').attr('disabled', false);
        } else {
            $('.delivery-dates').addClass('d-none')
            $('.delivery-dates').find('input').attr('disabled', true);
        }
    }).change();
});
$('input[type="checkbox"][name="all_facilities"]').on('change', function () {
    if ($(this).is(':checked') == true) {
        $('input[name="facilities[]"]').prop('checked', true);
    } else {
        $('input[name="facilities[]"]').prop('checked', false);
    }
});
$('#billingform').on('submit', function (event) {
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
        beforeSend: function (response) {
            showpreloader();
        },
        success: function (response) {
            hidepreloader();
            if (response.status == 0) {
                if (response.errors && Object.keys(response.errors).length > 0) {
                    $.each(response.errors, function (key, value) {
                        if ($('#billingform #' + key).hasClass('datepicker1')) {
                            $('#billingform #' + key).parent().parent().append(
                                '<small class="err text-danger">' + value +
                                '</small>')
                        } else {
                            $('#billingform #' + key).parent().append(
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
                $('#billingform').removeClass('was-validated');
                $('#billingform')[0].reset();
                showtoast(1, response.message)
                location.reload()
            }
        },
        error: function (xhr, status, error) {
            hidepreloader();
            showtoast(2, wrong)
            return false;
        }
    });
});
// ------------------------------------------------ //
// ------------ Manage Reason Settings ------------ //
// ------------------------------------------------ //
$('#reason_modal').on('hidden.bs.modal', function () {
    "use strict";
    $('.err').remove();
    $('#reasonform')[0].reset();
    $('#reasonform').removeClass('was-validated');
    $('#rid').val('');
});
$('body').on('click', '.manage-reason', function () {
    "use strict";
    $('#reason_modal').modal('show');
    $('#reason_modal #rid').val($(this).attr('data-rid'));
    // $('#reason_modal #area').val($(this).attr('data-area'));
    $('#reason_modal #reason').val($(this).attr('data-reason'));
    $('#reason_modal #status').val($(this).attr('data-status'));
});
$('#reasonform').on('submit', function (event) {
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
        beforeSend: function (response) {
            showpreloader();
        },
        success: function (response) {
            hidepreloader();
            if (response.status == 0) {
                if (response.errors && Object.keys(response.errors).length > 0) {
                    $.each(response.errors, function (key, value) {
                        $('#reasonform #' + key).parent().append('<small class="err text-danger">' + value + '</small>')
                    });
                } else {
                    showtoast(2, response.message)
                }
                return false;
            } else {
                $('.err').remove();
                $('#reasonform').removeClass('was-validated');
                $('#reasonform')[0].reset();
                showtoast(1, response.message)
                location.reload()
            }
        },
        error: function (xhr, status, error) {
            hidepreloader();
            showtoast(2, wrong)
            return false;
        }
    });
});

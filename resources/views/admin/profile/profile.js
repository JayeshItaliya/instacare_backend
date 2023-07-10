$('#open_gallery').on('change', function() {
    "use strict";
    var file = $(this)[0].files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#uploadedImage').attr('src', e.target.result);
        };
        reader.readAsDataURL(file);
    }
});
$('#editprofileform').submit(function(event) {
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
                        if (key == 'image') {
                            showtoast(2, value)
                        } else {
                            $('#' + key).parent().append('<small class="err text-danger">' + value + '</small>')
                        }
                    });
                } else {
                    showtoast(2, response.message)
                }
                return false;
            } else {
                $('.err').remove();
                $('#editprofileform').removeClass('was-validated');
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

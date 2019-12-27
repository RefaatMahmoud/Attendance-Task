$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    /********************  [ Add Ajax Request ] *******************/
    $(document).on('submit', '.form-ajax-request', function (event) {
        event.preventDefault();
        var formAction = $(this).attr('action');
        var formMethod = $(this).attr('method');
        // var formData = $(this).serialize();
        var formData = new FormData(this); //for upload files
        $.ajax({
            url: formAction,
            type: formMethod,
            data: formData,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function (response) {
                $('.ajaxErrorMsg').remove();
                $('.form-ajax-request :input[name]').css('border', '1px solid #080');
                window.location = response.redirectURL;
            },
            error: function (data) {
                $('.ajaxErrorMsg').remove();
                $('.form-ajax-request :input[name]').css('border', '1px solid #080');
                msgObj = data.responseJSON;
                $.each(msgObj['errors'], function (indexInArray, valueOfElement) {
                    $('.form-ajax-request :input[name=' + indexInArray + ']').css('border', '1px solid #dc3545');
                    let finder = $('.form-ajax-request :input[name=' + indexInArray + ']').parent().find(".ajaxErrorMsg");
                    if (!(finder && finder.length)) {
                        $('.form-ajax-request :input[name=' + indexInArray + ']').parent()
                            .append(`<span class='ajaxErrorMsg text-danger'>
                        <i class='fa fa-times mr-2'></i>${valueOfElement}</span>`);
                    }
                });
            }
        });
    });
});

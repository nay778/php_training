$(document).ready(function () {
    $('#datepicker').datepicker({
        dateFormat: 'mm/dd/yy',
        changeMonth: true,
        changeYear: true,
        yearRange: '1988:',
        maxDate: 0,
    });
});

$(document).ready(function () {
    $('#datepick').datepicker({
        dateFormat: 'mm/dd/yy',
        changeMonth: true,
        changeYear: true,
    });
});

$(document).ready(function () {
    $('#imgPreview').hide();
    $('#photo').change(function () {
        const file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (event) {
                $('#imgPreview').show();
                $('#imgPreview').attr('src', event.target.result);
                $('.fa-cloud-upload-alt').hide();
                $('#exitImg').hide();
            }
            reader.readAsDataURL(file);
        }
    });
});
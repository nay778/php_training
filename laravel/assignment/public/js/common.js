$(document).ready(function () {
  $('#datepicker').datepicker({
    dateFormat: 'yy/mm/dd',
    changeMonth: true,
    changeYear: true,
    yearRange: '1988:',
    maxDate: 0,
  });
});

$(document).ready(function () {
  $('#datepick').datepicker({
    dateFormat: 'yy/mm/dd',
    changeMonth: true,
    changeYear: true,
    maxDate: 0,
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

$(document).ready(function () {
  $('.t-blk').hide();
  $('.sign-up').on('click', function () {
    $('.f-blk').hide();
    $('.t-blk').show();
  });
});
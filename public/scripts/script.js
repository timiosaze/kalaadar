$('#select').on('change', function () {
    if ($(this).val() == 'Set custom time') {
        $('#custom_time').show();
    } else {
        $('#custom_time').hide();
    }
});
  
$("#selector").flatpickr({
    minDate: "today",
    mode: "range",
    altInput: true,
    altFormat: "F j, Y",
    dateFormat: "Y-m-d",
});

$("#selector2").flatpickr({
    minDate: "today",
    altInput: true,
    altFormat: "F j, Y",
    dateFormat: "Y-m-d",
});


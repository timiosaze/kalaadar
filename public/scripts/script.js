$('#select').on('change', function () {
    if ($(this).val() == 'Set custom time') {
        $('#custom_time').show();
    } else {
        $('#custom_time').hide();
    }
});
  
$("#selector").flatpickr({
    minDate: "today",
    mode: "multiple",
    altInput: true,
    altFormat: "F j, Y",
    dateFormat: "Y-m-d",
    "disable": [
        function(date) {
            // return true to disable
            return (date.getDay() === 0 || date.getDay() === 6);

        }
    ],
});

 

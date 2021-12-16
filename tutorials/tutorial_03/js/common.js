$(document).ready(function() {
    $("#datepicker").datepicker({
        dateFormat: 'mm/dd/yy',
        changeMonth: true,  
        changeYear:true,
        yearRange: "1988:2021",
        maxDate: 0
    });
});
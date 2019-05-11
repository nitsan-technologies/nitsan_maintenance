define(
    [
        'jquery',
        'twbs/bootstrap-datetimepicker'
    ],
    function($, NProgress, Modal, SplitButtons, Tooltip, Notification, Severity) {
 
    $(document).ready(function() {
        $('#enddate').datetimepicker({
            defaultDate: +1,
            format:'YYYY-MM-DD HH:mm'
        });

        $('#maintenance_Submit').on("click",function() {
            var imgaeexist = $('#imageUpload').val()
            var fileUpload = document.getElementById("imageUpload");
            if(imgaeexist) {
                var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.png|.jpeg)$");
                if (regex.test(fileUpload.value.toLowerCase())) {
                    $('.invalidImage').hide();
                    return true;
                } else {
                    $('.invalidImage').show();
                    return false;
                }
            }
        });
    });
});
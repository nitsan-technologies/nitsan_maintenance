$(document).ready(function() {
    chkSub($("#countboxstyle").val());
    chkUserSection($("#whitelistfrontend").val());
    chkCountdownStyle($('input[name="newMaintenance[countdown]"]:checked').val());

    if ($("#themelayout").val() == 2) {
        $('.colorsection').show();
        $('.imagesection').hide();
    }
    if ($("#themelayout").val() == 1){
        $('.colorsection').hide();
        $('.imagesection').show();
    }

    $("#themelayout").on('change',function(){
        layoutSection = $(this).val();
        if (layoutSection == 2) {
            $('.colorsection').show();
            $('.imagesection').hide();
        }
        if (layoutSection == 1){
            $('.colorsection').hide();
            $('.imagesection').show();
        }
    });
    $("#countboxstyle").on('change',function(){
        layoutSection = $(this).val();
        chkSub(layoutSection);
    });

    $("#whitelistfrontend").on('change',function(){
        userSection = $(this).val();
        chkUserSection(userSection);
    });


    $('input[name="newMaintenance[countdown]"]').on('click',function(){
        chkVal = $(this).val();
        chkCountdownStyle(chkVal);
    });

    $('.custom-reset').on('click', function(){
        var that = $(this);
        that.find('i').addClass('fa-spin');
        var id = that.attr('data-id');
        var defaultValue = $("#" + id).attr('data-value');
        $("#" + id).val(defaultValue);
        $("#" + id).addClass('form__field');
        if (id === 'bg-image' && $('#bg-image')) {
            $('#bg-image').css('display', 'none');
            $('.remove-image').css('display', 'none');
            $('#bg-delete').val(1);
        }
        if (id === 'logo-image' && $('#logo-image')) {
            $('#logo-image').css('display', 'none');
            $('.remove-logo').css('display', 'none');
            $('#logo-delete').val(1);
        }
        setTimeout(function(){
            $("#" + id).removeClass('form__field');
            that.find('i').removeClass('fa-spin');
        }, 2000);
    });
});

function chkSub(layoutSection){
    if (layoutSection === 'subscription') {
        $('.subscription-block').slideDown();
    }
    else {
        $('.subscription-block').slideUp();
    }
}

function chkUserSection(userSection) {
    $('.user-container .usergroups #whitelistfrontend_usergrous').removeAttr('required');
    $('.user-container .users #whitelistfrontend_users').removeAttr('required');
    if (userSection == '2') {
        $('.user-container .usergroups').slideDown();
        $('.user-container .usergroups #whitelistfrontend_usergrous').attr('required', true);
        $('.user-container .users').slideUp();
    }
    else if (userSection == '3') {
        $('.user-container .users').slideDown();
        $('.user-container .users #whitelistfrontend_users').attr('required', true);
        $('.user-container .usergroups').slideUp();
    }
    else{
        $('.user-container .users').slideUp();
        $('.user-container .usergroups').slideUp();
    }
}


function chkCountdownStyle(chkVal){
    if(chkVal==1){
        $('.style-countdown').slideDown();
    }
    else{
        $('.style-countdown').slideUp();
    }
}

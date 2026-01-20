new WOW().init();
$(document).ready(function () {
    var bodyClass = $.trim($('#bodyClass').html());
    if(bodyClass){
        $("body").addClass(bodyClass);
    }
    if($('#bodyColor').length > 0){
        $("body").css('background-color',$.trim($('#bodyColor').html()))   
        var bodyColor = $('body').css("background-color");
        var textColor = $('.errormail').css("color");
        setColor(bodyColor,textColor);
    }
    else{
        $("body").css('background','url('+$.trim($('#bodyImage').html()+')'));
    } 
    $('.alert-success').append("<a href='javascript:;' class='close-alert'>&times</a>");
    $('.alert-danger').append("<a href='javascript:;' class='close-alert'>&times</a>");
    $('.close-alert').click(function () { $('.typo3-messages').fadeOut(); window.location.replace(window.location.href.split("?")[0]); });

    $('form[name="newSubscriber"]').on('submit',function(){
    	var mail = $('input[name="tx_nitsanmaintenance_mode[newSubscriber][subscriberEmail]"]').val();
    	if(!validateEmail(mail)){
    		$('.errormail').slideDown();
    		return false;
    	}    	
    });
});
function validateEmail(email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test(email);
}
function setColor(backColor,textColor) { 
	var bgcolor = /rgb\((\d+).*?(\d+).*?(\d+)\)/.exec(backColor);
	var txtcolor = /rgb\((\d+).*?(\d+).*?(\d+)\)/.exec(textColor);
   	if(parseFloat(bgcolor[1]) + parseFloat(bgcolor[2]) + parseFloat(bgcolor[3]) < 3 * 256 / 2){
   		$('.errormail').css('color', 'white' ); 
   	}
} 
//# sourceMappingURL=script.js.map

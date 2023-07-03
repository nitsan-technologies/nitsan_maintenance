
/* Background Images
-------------------------------------------------------------------*/
var  pageTopImage = jQuery('#page-top').data('background-image');
if (pageTopImage) {  jQuery('#page-top').css({ 'background-image':'url(' + pageTopImage + ')' }); };

/* Background Images End
-------------------------------------------------------------------*/
// Date Picker


/* Document Ready function
-------------------------------------------------------------------*/
jQuery(document).ready(function($) {
	"use strict";
     
    window.onresize = autoResizeDiv;
    autoResizeDiv();
    
    
    

    /* Window Height Resize
    -------------------------------------------------------------------*/
    var windowheight = jQuery(window).height();
    if(windowheight > 650)
    {
         $('.pattern').removeClass('height-resize');
    }
    /* Window Height Resize End
    -------------------------------------------------------------------*/






	/* Time Countdown 
	-------------------------------------------------------------------*/
	$('#time_countdown').countDown({
           targetDate: {
              'day':      parseInt($("#day").val()),
              'month':    parseInt($("#month").val()),
              'year':     parseInt($("#year").val()),
              'hour':     parseInt($("#hour").val()),
              'min':      parseInt($("#min").val()),
              'sec':      parseInt($("#sec").val())
      },
      omitWeeks: true
    });
  });



/* Preloder 
-------------------------------------------------------------------*/
$(window).load(function () {    
    "use strict";
    $("#loader").fadeOut();
    $("#preloader").delay(350).fadeOut("slow");
});
 /* Preloder End
-------------------------------------------------------------------*/
   
function autoResizeDiv() {
  if ($(window).width() <= 768) {
      $('#page-top').height($(window.outerHeight));
  }else{
    $('#page-top').height(window.innerHeight + 'px');
  }

}

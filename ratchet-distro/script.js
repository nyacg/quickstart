



$(document).ready(function(){

	$('.options').hide();

	$.fn.rotate = function($angle) {
		return this.transition({ rotate: $angle}, 300 );
	};

	$('.optionsToggle').click(function() {

			// State of the Toggle
			var $state = $(this).attr('state');

			// shortcut to options ul and to image
			var $options = $(this).parent().parent().find('.options');
			var $img = $(this).parent().parent().find('img');

			var $slide = $(this).parent().parent();
			$slide.attr('state','active');

			var $SuperParent = $slide.parent().parent();
			$SuperParent.attr('state','active');

			// Toggle Arrow direction change 
		    if( $state == 'inactive' ){
		    	$(this).rotate('90deg');
		    	$(this).attr("state", 'active');
		    }
		    else{
		    	$(this).rotate('0deg');
		    	$(this).attr("state", "inactive");
		    }

		    // Toggle slide up or down
		    if( $state == 'inactive' ){
		    	$options.fadeIn(200);
		    	$img.animate({ marginTop: "-150px"}, 500);
		    	$('.slide[state!=active]').css('visibility','hidden');
		    }
		    else{
		    	$options.fadeOut(100);
		    	$img.animate({ marginTop: "0px"}, 500);
		    	$('.slide[state!=active]').css('visibility','visible');
				$slide.attr('state','inactive');	
				$SuperParent.attr('state','inactive');
		    }



	});



  	/* $(".optionsToggle").click(function(){
  		$(".options").animate({
  				opacity: 1
  			}, 500);
  			$("#image1").animate({
  				marginTop: "-150px"
  			}, 500);
  			state = 1;
  			});
		

		
		$(".optionsToggle").click(function(){
			console.log("banana");
  			$(".options1").animate({
  				opacity: 0
  			}, 500);
  			$("#image1").animate({
  				marginTop: "150px"
  			}, 500);
  			});
		jQuery.fn.rotateanti = function(degrees) {
		    $(this).css({'-webkit-transform' : 'rotate('+ degrees +'deg)',
		                 '-moz-transform' : 'rotate('+ degrees +'deg)',
		                 '-ms-transform' : 'rotate('+ degrees +'deg)',
		                 'transform' : 'rotate('+ degrees +'deg)'});
		    return $(this);
		};
	*/

		
  	});
















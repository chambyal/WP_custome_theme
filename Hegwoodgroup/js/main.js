jQuery(document).ready(function ($) {
 jQuery("[data-fancybox]").fancybox({ selector: '[data-fancybox="images"]', helpers: { overlay: null }, loop: true });
jQuery("input[type='tel'").attr("maxlength", "10");
// Used to format phone number
function phoneFormatter() {
   jQuery("input[type='tel'").on('input', function () {
       var number = jQuery(this).val().replace(/[^\d]/g, '')
       if (number.length == 7) {
           number = number.replace(/(\d{3})(\d{4})/, "$1 $2");
       } else if (number.length == 10) {
        number = number.replace(/(\d{3})(\d{3})(\d{4})/, "($1) $2 $3");
       }
       jQuery(this).val(number)
   });
};
jQuery(phoneFormatter);

var validateEmail = function(elementValue) {
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    return emailPattern.test(elementValue);
}
jQuery("input[type='email'").keyup(function() {
    var value = jQuery(this).val();
    var valid = validateEmail(value);
    if (!valid) {
        jQuery(this).css('border-bottom', '1px solid #dc3232');
    } else {
        jQuery(this).css('border-bottom', '1px solid #008000');
    }
});
var validateEmail = function(elementValue) {
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    return emailPattern.test(elementValue);
}
	

 /**** Img to SVG ****/
        activate('img[src*=".svg"]');
        function activate(string) {
            jQuery(string).each(function () {
                var $img = jQuery(this);
                var imgID = $img.attr('id');
                var imgClass = $img.attr('class');
                var imgURL = $img.attr('src');
                jQuery.get(imgURL, function (data) {
                    // Get the SVG tag, ignore the rest
                    var $svg = jQuery(data).find('svg');
                    // Add replaced image's ID to the new SVG
                    if (typeof imgID !== 'undefined') {
                        $svg = $svg.attr('id', imgID);
                    }
                    // Add replaced image's classes to the new SVG
                    if (typeof imgClass !== 'undefined') {
                        $svg = $svg.attr('class', imgClass + ' replaced-svg');
                    }
                    // Remove any invalid XML tags as per http://validator.w3.org
                    $svg = $svg.removeAttr('xmlns:a');
                    // Replace image with new SVG
                    $img.replaceWith($svg);
                }, 'xml');   
            });
         }   

   
  /** Small Header **/  
    jQuery(window).scroll(function () {
        if(jQuery(this).scrollTop() > 0) {
            jQuery('#header').addClass('small-header');
        }else{
            jQuery('#header').removeClass('small-header');
        }
    });
	
    if(jQuery(this).scrollTop() > 0) {
        jQuery('#header').addClass('small-header');
    } else {
        jQuery('#header').removeClass('small-header');
    }
  
jQuery( "input" ).focus(function() {
  jQuery(this).next( ".wpcf7-not-valid-tip" ).fadeOut( 1000 ); 
});

jQuery( "textarea" ).focus(function() {
  jQuery(this).next( ".wpcf7-not-valid-tip" ).fadeOut( 1000 ); 
});
  
   
//***** Banner Form ****//

/* Header Search  */
    jQuery('.search-icon').click(function () {
        jQuery('body').addClass('no-scroll');
        jQuery('.header-search-box').toggleClass('open-search');
        jQuery('.header-search').toggleClass('open-search');
    });

jQuery('.closebtn').click(function () {
	 jQuery('body').removeClass('no-scroll'); 
        jQuery('.header-search-box').removeClass('open-search');
        jQuery('.search-input-wrap .msg-side-form').addClass('d-none');
    });   


jQuery('.html5lightbox').click(function () { 
         jQuery('body').addClass('noscroll');
   }); 

jQuery(document).click(function(e){
var targetbox = jQuery('#html5-lightbox-box');
   if(!targetbox.is(e.target) && targetbox.has(e.target).length === 0){
     jQuery('body').removeClass('noscroll');
   }
});

 


/*  Header Search Error  */
    $('<p class="msg-side-form d-none">Required</p>').insertAfter('.search-input-wrap input.search');
    $("#site-searchs").click(function () {
        var searchinput_val = jQuery('.search-input-wrap input.search').val();
        if (searchinput_val == '') {
            $(".search-input-wrap .msg-side-form").removeClass('d-none');
        } else {
            $(".search-input-wrap .msg-side-form").addClass('d-none');
        }
    });

    $('.search-input-wrap input.search').bind('invalid', function () {
        return false;
    });

 /*  Sidebar Search Error  */
    $('<p class="msg-side-form d-none">Required</p>').insertAfter('.blogsearch .input-group input#blogsearch');
    $("input.search-btn").click(function () {
        var searchinput_val = $('.blogsearch .input-group input#blogsearch').val();
        if (searchinput_val == '') {
            $(".blogsearch .input-group .msg-side-form").removeClass('d-none');
        } else {
            $(".blogsearch .input-group .msg-side-form").addClass('d-none');
        }
    });

    $('.blogsearch .input-group input#blogsearch').bind('invalid', function () {
        return false;
    });

jQuery(document).ajaxComplete(function(){
        activate('img[src*=".svg"]');
        function activate(string) {
            jQuery(string).each(function () {
                var $img = jQuery(this);
                var imgID = $img.attr('id');
                var imgClass = $img.attr('class');
                var imgURL = $img.attr('src');
                jQuery.get(imgURL, function (data) {
                    // Get the SVG tag, ignore the rest
                    var $svg = jQuery(data).find('svg');
                    // Add replaced image's ID to the new SVG
                    if (typeof imgID !== 'undefined') {
                        $svg = $svg.attr('id', imgID);
                    }
                    // Add replaced image's classes to the new SVG
                    if (typeof imgClass !== 'undefined') {
                        $svg = $svg.attr('class', imgClass + ' replaced-svg');
                    }
                    // Remove any invalid XML tags as per http://validator.w3.org
                    $svg = $svg.removeAttr('xmlns:a');
                    // Replace image with new SVG
                    $img.replaceWith($svg);
                }, 'xml');   
            });
        } 

  });	



// Practice Areas images change on hover    
$('.page-link-item').hover(function () {  
        var oldid = this.id;
        var image_new_id = oldid.split('-');
        $('.page-link-item').removeClass('active');
        $('.practice-image').removeClass('active');
        $(this).addClass('active');
        $('#imagecount-' + image_new_id[1]).addClass('active');
    });
  

 
$('#in_thenews').owlCarousel({
	stagePadding:180,
	loop:true,
    margin:25,
    nav:true,
	dots:false,
    autoplay:true,
    autoplayTimeout:5000,
    responsive:{ 
        320:{ 
           items:2,
		   stagePadding:0,
		     margin:10
        },
		
        768:{   
            items:2,
		stagePadding:0
        },
		
        1024:{
            items:2 
        },
		
		1366:{
            items:3
        }
    }
});


if ($('.menu-bar-wrapper li').hasClass('menu-item-has-children')) {
       $(".menu-item-has-children > a").after("<span class='sidebar-menu-arrow'></span>");
   }
   var $toggleButton = $('.menu-button'),
           $menuWrap = $('.menu-wrap'),
           $sidebarArrow = $('.sidebar-menu-arrow');
   // Hamburger Button
   $toggleButton.on('click', function () {
       $(this).toggleClass('button-open');
       $menuWrap.toggleClass('menu-show');
   });
   jQuery('.sidebar-menu-arrow').click(function () {
       if (jQuery(this).next().is(':visible')) {
           jQuery(this).next().slideUp(300);
       } else {
           jQuery(this).next().slideDown(300);
       }
       if (jQuery(this).hasClass('responsive-up-arrow')) {
           jQuery(this).removeClass('responsive-up-arrow');
       } else {
        jQuery(this).addClass('responsive-up-arrow');
       }
   });  
   jQuery('.menu-button').on('click', function () {
       jQuery('body').toggleClass('nav-open-menu');
   });

});  



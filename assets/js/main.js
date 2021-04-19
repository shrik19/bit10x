/*=========================================

Template Name: Bitway - Crypto Currency HTML5 Template
Author: Theme_Choices
Version: 1.0
Design and Developed by: Theme_Choices

=========================================*/
var iframeUrl='<!-- TradingView Widget BEGIN -->'+
                                        '<div class="tradingview-widget-container">'+
                                         ' <div id="technical-analysis"></div> <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/[SYMBOL]/?exchange=BINANCE" rel="noopener" target="_blank"><span class="blue-text">[SYMBOL] Chart</span></a> by TradingView</div><script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>'+
                                          '<script type="text/javascript"> new TradingView.widget(  {"container_id": "technical-analysis",     "width": 980,  "height": 610,"symbol": "BINANCE:[SYMBOL]","interval": "D", "timezone": "exchange", "theme": "light","style": "1", "toolbar_bg": "#f1f3f6","withdateranges": true, "hide_side_toolbar": false,"allow_symbol_change": true, "save_image": false,"show_popup_button": true,"popup_width": "1000", "popup_height": "650","locale": "en" });</script> </div> <!-- TradingView Widget END -->';
   	
(function($) {
    "use strict";



    var $window = $(window),
        $body = $('body');
		
	 /*=============================
         Sticky Header Background
    ==============================*/	
				
		$(window).on("scroll", function() {
			if($(window).scrollTop() > 50) {
				$(".home-header").addClass("home-header-new");
			} else {
				//remove the background property so it comes transparent again (defined in your css)
			   $(".home-header").removeClass("home-header-new");
			}
		});

    /*=============================
                Smoothscroll js
    ==============================*/
    $('.banner-btn, .about-btn').on('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top - 70
        }, 1000);
        event.preventDefault();
    });
    

    /*=============================
                PRELOADER JS
    ==============================*/

    $(window).on('load', function() {
        $('.preloader').fadeOut(1000);
    });

    /*==========================
            Back To Top
    ============================*/
    $(".scrollup").hide();
    $(window).scroll(function() {
        if ($(this).scrollTop() > 400) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });
    $('.scrollup').on('click', function() {
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    });

    /*=============================
            WOW js
    ==============================*/
    new WOW({
        mobile: false
    }).init();

    /*=============================
            COUNTER JS
    ==============================*/
    $('.counter').counterUp({
        delay: 3,
        time: 600
    });

    /*=============================
            MOBILE MENU
    ==============================*/

    $('nav#mobile-nav').meanmenu({
        siteLogo: "<a href='index.html'><img src='images/header-banner/header-logo.png' /></a>"
    });

	/*=============================
            JQUERY FORM VALIDATION
    ==============================*/
		$(".new-contact-form").validate();

    /*===================================
           Owl Carousel Reviews
    ====================================*/
    $(".reviews-list").owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayHoverPause: true,
		navText: ["<i class='fa fa-arrow-left'></i>", "<i class='fa fa-arrow-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });
	
        // Add minus icon for collapse element which is open by default
        $(".collapse.in").each(function(){
        	$(this).siblings(".panel-heading").find(".fa").addClass("fa-minus").removeClass("fa-plus");
        });
        
        // Toggle plus minus icon on show hide of collapse element
        $(".collapse").on('show.bs.collapse', function(){
        	$(this).parent().find(".fa").removeClass("fa-plus").addClass("fa-minus");
        }).on('hide.bs.collapse', function(){
        	$(this).parent().find(".fa").removeClass("fa-minus").addClass("fa-plus");
        });
		 $('.panel-title').on('click', function(e) {
         $('.collapse').collapse('hide');
       });
       
       
        $("#trading-link").change(function(){
			loadTradingGraph();
		});
		
		 $('#basicModal').modal(options);

})(jQuery);


function loadTradingGraph()
{
		var v 		= $("#trading-link").val();
    	var str		= iframeUrl;
    	str			= str.replace(/\[SYMBOL\]/g,v);
    	$(".live-coin-div2").html(str);
    	console.log(str);
}
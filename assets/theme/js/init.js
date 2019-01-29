jQuery(function($){
	"use strict";

var IMI = window.IMI || {};

/* ==================================================
	Contact Form Validations
================================================== */
	IMI.ContactForm = function(){
		$('.contact-form').each(function(){
			var formInstance = $(this);
			formInstance.submit(function(){
		
			var action = $(this).attr('action');
		
			$("#message").slideUp(750,function() {
			$('#message').hide();
		
			$('#submit')
				.after('<img src="images/assets/ajax-loader.gif" class="loader" />')
				.attr('disabled','disabled');
		
			$.post(action, {
				name: $('#name').val(),
				email: $('#email').val(),
				phone: $('#phone').val(),
				comment: $('#comment').val()
			},
				function(data){
					document.getElementById('message').innerHTML = data;
					$('#message').slideDown('slow');
					$('.contact-form img.loader').fadeOut('slow',function(){$(this).remove();});
					$('#submit').removeAttr('disabled');
					if(data.match('success') !== null){ $('.contact-form').slideUp('slow'); }
		
				}
			);
			});
			return false;
		});
		});
	};
/* ==================================================
	Scroll Functions
================================================== */
	IMI.scrollToTop = function(){
			var windowWidth = $(window).width(),
			didScroll = false;
	
		var $arrow = $('#back-to-top');
	
		$arrow.on('click',function(e) {
			$('body,html').animate({ scrollTop: "0" }, 750, 'easeOutExpo' );
			e.preventDefault();
		});
	
		$(window).scroll(function() {
			didScroll = true;
		});
	
		setInterval(function() {
			if( didScroll ) {
				didScroll = false;
	
				if( $(window).scrollTop() > 200 ) {
					$arrow.css("right",10);
				} else {
					$arrow.css("right","-60px");
				}
				
			}
		}, 250);
	};
/* ==================================================
   Twitter Widget
================================================== */
	IMI.TwitterWidget = function() {
		$('.twitter-widget').each(function(){
			var twitterInstance = $(this); 
			var twitterTweets = twitterInstance.attr("data-tweets-count") ? twitterInstance.attr("data-tweets-count") : "1";
			twitterInstance.twittie({
            	dateFormat: '%b. %d, %Y',
            	template: '<li><i class="fa fa-twitter"></i> {{tweet}} <span class="tweet-date">{{date}}</span></li>',
            	count: twitterTweets,
            	hideReplies: true
        	});
		});
	};
/* ==================================================
   Hero Flex Slider
================================================== */
	IMI.heroflex = function() {
		$('.heroflex').each(function(){
				var carouselInstance = $(this); 
				var carouselAutoplay = carouselInstance.attr("data-autoplay") == 'yes' ? true : false
				var carouselPagination = carouselInstance.attr("data-pagination") == 'yes' ? true : false
				var carouselArrows = carouselInstance.attr("data-arrows") == 'yes' ? true : false
				var carouselDirection = carouselInstance.attr("data-direction") ? carouselInstance.attr("data-direction") : "horizontal"
				var carouselStyle = carouselInstance.attr("data-style") ? carouselInstance.attr("data-style") : "fade"
				var carouselSpeed = carouselInstance.attr("data-speed") ? carouselInstance.attr("data-speed") : "5000"
				var carouselPause = carouselInstance.attr("data-pause") == 'yes' ? true : false
				
				carouselInstance.flexslider({
					animation: carouselStyle,
					easing: "swing",               
					direction: carouselDirection,       
					slideshow: carouselAutoplay,              
					slideshowSpeed: carouselSpeed,         
					animationSpeed: 600,         
					initDelay: 0,              
					randomize: false,            
					pauseOnHover: carouselPause,       
					controlNav: carouselPagination,           
					directionNav: carouselArrows,            
					prevText: "",         
					nextText: ""
				});
		});
	}	
/* ==================================================
   Owl Carousel
================================================== */
	IMI.OwlCarousel = function() {
		$('.owl-carousel').each(function(){
				var carouselInstance = $(this); 
				var carouselColumns = carouselInstance.attr("data-columns") ? carouselInstance.attr("data-columns") : "1";
				var carouselAutoplay = carouselInstance.attr("data-autoplay") === 'yes' ? true : false;
				var carouselAutoplayTime = carouselInstance.attr("data-autoplay-timeout") ? carouselInstance.attr("data-autoplay-timeout") : '5000';
				var carouselPagination = carouselInstance.attr("data-pagination") === 'yes' ? true : false;
				var carouselArrows = carouselInstance.attr("data-arrows") === 'yes' ? true : false;
				var carouselAutoHeight = carouselInstance.attr("data-auto-height") === 'yes' ? true : false;
				var carouselRTL = carouselInstance.attr("data-rtl") === 'yes' ? true : false;
				var carouselLoop = carouselInstance.attr("data-loop") === 'yes' ? true : false;
				var carouselMargin = carouselInstance.attr("data-margin") ? carouselInstance.attr("data-margin") : 25;
				var carouselPadding = carouselInstance.attr("data-padding") ? carouselInstance.attr("data-padding") : 0;
				
				carouselInstance.owlCarousel({
					loop: carouselLoop,
					items: carouselColumns,
					autoWidth: false,
					margin: parseInt(carouselMargin),
					stagePadding: parseInt(carouselPadding),
					autoplay : carouselAutoplay,
					autoplayTimeout: parseInt(carouselAutoplayTime),
					nav : carouselArrows,
					dots : carouselPagination,
					mergeFit: false,
					navText: ["<i class='mi mi-arrow-back'></i>","<i class='mi mi-arrow-forward'></i>"],
					autoplayHoverPause: true,
					lazyLoad: true,
					rtl: carouselRTL,
					autoHeight: carouselAutoHeight,
					responsive:{
						0:{
							items:1,
							dots:false,
							nav:false,
							stagePadding:0
						},
						768:{
							items:2,
							nav:false
						},
						1000:{
							items:carouselColumns
						},
						1200:{
							items:carouselColumns
						}
					}
				});
		});
	};
/* ==================================================
   Magnific Popup
================================================== */
	IMI.Magnific = function() {
		jQuery('.format-gallery').each(function(){
			$(this).magnificPopup({
				delegate: 'a.popup-image', // child items selector, by clicking on it popup will open
				type: 'image',
				gallery:{enabled:true}
				// other options
			});
		});
		jQuery('.magnific-image').magnificPopup({ 
			type: 'image',
			gallery:{enabled:false}
			// other options
		});
		jQuery('.magnific-video').magnificPopup({ 
			type: 'iframe',
			gallery:{enabled:false}
			// other options
		});
	};
/* ==================================================
   Animated Counters
================================================== */
	IMI.Counters = function() {
		$('.number-counter').each(function () {
			$(".timer .count").appear(function() {
			var counter = $(this).html();
			$(this).countTo({
				from: 0,
				to: counter,
				speed: 2000,
				refreshInterval: 60
				});
			});
		});
	};	
/* ==================================================
   SuperFish menu
================================================== */
	IMI.SuperFish = function() {
		$('.sf-menu').superfish({
			  delay: 200,
			  animation: {opacity:'show', height:'show'},
			  speed: 'fast',
			  cssArrows: false,
			  disableHI: true
		});
		$(window).resize(function(){
			if($(window).width() >= 992){
				$('.sf-menu').show();
			}
		});
	};
/* ==================================================
   Header Functions
================================================== */
	IMI.StickyHeader = function() {
		if($('body').width() > 992 ){
			$(".site-header").sticky();
		}
	};
/* ==================================================
	Responsive Nav Menu
================================================== */
	IMI.MobileMenu = function() {
		// Responsive Toggle Events
		$('#menu-toggle').on("click", function(){
			$(this).toggleClass("opened");
			$(".main-navigation").slideToggle();
			return false;
		});
	};
/* ==================================================
   IsoTope Portfolio
================================================== */
		IMI.IsoTope = function() {	
		// init Isotope
        var $grid = $('.sort-destination').isotope({
              itemSelector: '.grid-item',
            originLeft: true,
            layoutMode: 'fitRows',
        });
        // filter items on button click
        $('.sort-source').on( 'click', 'li', function() {
          var filterValue = $(this).attr('data-option-value');
          $grid.isotope({ filter: filterValue });
        });
        
        $('.isotope-grid').isotope({
              itemSelector: '.grid-item',
            originLeft: true,
            layoutMode: 'fitRows',
        });
	};
/* ==================================================
   Pricing Tables
================================================== */
	var $tallestCol;
	IMI.pricingTable = function(){
		$('.pricing-table').each(function(){
			$tallestCol = 0;
			$(this).find('> div .features').each(function(){
				($(this).height() > $tallestCol) ? $tallestCol = $(this).height() : $tallestCol = $tallestCol;
			});	
			if($tallestCol === 0){ $tallestCol = 'auto'; }
			$(this).find('> div .features').css('height',$tallestCol);
		});
	};

/* ==================================================
   Window Height
================================================== */
	IMI.WWHGetter = function(){
		var wheighter = $(window).height();
		var wwidth = $(window).width();
		$(".wheighter").css("height",wheighter);
		$(".wwidth").css("width",wwidth);
	};
/* ==================================================
   Init Functions
================================================== */
$(document).ready(function(){
	IMI.ContactForm();
	IMI.scrollToTop();
	IMI.TwitterWidget();
	IMI.OwlCarousel();
	IMI.Magnific();
	IMI.SuperFish();
	IMI.Counters();
	IMI.IsoTope();
	IMI.StickyHeader();
	IMI.heroflex();
	IMI.pricingTable();
	IMI.MobileMenu();
	IMI.WWHGetter();
});
	
// WINDOW RESIZE FUNCTIONS //
$(window).resize(function(){
	IMI.WWHGetter();
});

// Any Button Scroll to section
$('.scrollto').on("click", function(){
	$.scrollTo( this.hash, 800, { easing:'easeOutQuint' });
	return false;
});

// FITVIDS
$(".fw-video, .post-media").fitVids();

// Animation Appear
var AppDel;
function AppDelFunction($appd) {
	$appd.addClass("appear-animation");
	if(!$("html").hasClass("no-csstransitions") && $(window).width() > 767) {
		$appd.appear(function() {
			var delay = ($appd.attr("data-appear-animation-delay") ? $appd.attr("data-appear-animation-delay") : 1);
			if(delay > 1){ $appd.css("animation-delay", delay + "ms"); }
			$appd.addClass($appd.attr("data-appear-animation"));
			setTimeout(function() {
				$appd.addClass("appear-animation-visible");
			}, delay);
			clearTimeout();
		}, {accX: 0, accY: -150});
	} else {
		$appd.addClass("appear-animation-visible");
	}
}
function AppDelStopFunction() {
	clearTimeout(AppDel);
}
$("[data-appear-animation]").each(function() {
	var $this = $(this);
	AppDelFunction($this);
	AppDelStopFunction();
});
// Animation Progress Bars

var AppAni;
function AppAniFunction($anim) {
	$anim.appear(function() {
		var delay = ($anim.attr("data-appear-animation-delay") ? $anim.attr("data-appear-animation-delay") : 1);
		if(delay > 1){ $anim.css("animation-delay", delay + "ms"); }
		$anim.addClass($anim.attr("data-appear-animation"));
		setTimeout(function() {
			$anim.animate({
				width: $anim.attr("data-appear-progress-animation")
			}, 1500, "easeOutQuad", function() {
				$anim.find(".progress-bar-tooltip").animate({
					opacity: 1
				}, 500, "easeOutQuad");
			});
		}, delay);
		clearTimeout();
	}, {accX: 0, accY: -50});
}
function AppAniStopFunction() {
	clearTimeout(AppAni);
}
$("[data-appear-progress-animation]").each(function() {
	var $this = $(this);
	AppAniFunction($this);
	AppAniStopFunction();
});

// Parallax Jquery Callings
if(!Modernizr.touch) {
	parallaxInit();
}
function parallaxInit() {
	$('.parallax1').parallax("50%", 0.1);
	$('.parallax2').parallax("50%", 0.1);
	$('.parallax3').parallax("50%", 0.1);
	$('.parallax4').parallax("50%", 0.1);
	$('.parallax5').parallax("50%", 0.1);
	$('.parallax6').parallax("50%", 0.1);
	$('.parallax7').parallax("50%", 0.1);
	$('.parallax8').parallax("50%", 0.1);
	/*add as necessary*/
}
});

 $('.thumb-carousel').flexslider({
	animation: "slide",
	controlNav: false,
	directionNav: false,
	animationLoop: false,
	slideshow: false,
	itemWidth: 168,
	itemMargin: 0,
	asNavFor: '.thumb-slider'
});
 
$('.thumb-slider').flexslider({
	animation: "slide",
	controlNav: false,
	directionNav: true,
	animationLoop: false,
	slideshow: false,
	sync: ".thumb-carousel"
});
$('.thumb-carousel2').flexslider({
	animation: "slide",
	controlNav: false,
	directionNav: false,
	animationLoop: false,
	slideshow: false,
	itemWidth: 160,
	itemMargin: 5,
	asNavFor: '.thumb-slider2'
});
 
$('.thumb-slider2').flexslider({
	animation: "slide",
	controlNav: false,
	directionNav: false,
	animationLoop: false,
	slideshow: false,
	sync: ".thumb-carousel2"
});

/* ----------- Tab Jquery ----------- */		
//$(".tab-content").hide(); //Hide all content
$(".tab-nav li:first").addClass("active").show(); //Activate first tab
$(".tab-content:first").show(); //Show first tab content
//On Click Event
$(".tab-nav li").click(function() {
	$(".tab-nav li").removeClass("active"); //Remove any "active" class
	$(this).addClass("active"); //Add "active" class to selected tab
	$(".tab-content").hide(); //Hide all tab content
	var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
	$(activeTab).fadeIn(); //Fade in the active ID content
	return false;
});
/* ----------- Tab Jquery ----------- */

/* ----------- Tab Jquery ----------- */		
$(".tab-content2").hide(); //Hide all content
$(".tab-nav2 li:first").addClass("active").show(); //Activate first tab
$(".tab-content2:first").show(); //Show first tab content
//On Click Event
$(".tab-nav2 li").click(function() {
	$(".tab-nav2 li").removeClass("active"); //Remove any "active" class
	$(this).addClass("active"); //Add "active" class to selected tab
	$(".tab-content2").hide(); //Hide all tab content
	var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
	$(activeTab).fadeIn(); //Fade in the active ID content
	return false;
});
/* ----------- Tab Jquery ----------- */

$('select.select').each(function(){
	var title = $(this).attr('title');
	if( $('option:selected', this).val() != ''  ) title = $('option:selected',this).text();
	$(this)
	.css({'z-index':10,'opacity':0,'-khtml-appearance':'none'})
	.after('<span class="select">' + title + '</span>')
	.change(function(){
		val = $('option:selected',this).text();
		$(this).next().text(val);
	})
});


$('.auction-countdown-timer').each(function(){
		var expiryDate = $(this).data('date');
		var countdown_id = $(this).attr('id');
		$('#'+countdown_id).countdown(expiryDate).on('update.countdown', function(event) {
	  	$(this).html(event.strftime(''
		+ '<div class="auction-timer-col"><span>%D</span> <strong>day%!d</strong></div>'
		+ '<div class="auction-timer-col"><span>%H</span> <strong>Hours</strong></div>'
		+ '<div class="auction-timer-col"><span>%M</span> <strong>Mins</strong></div>'
		+ '<div class="auction-timer-col"><span>%S</span> <strong>Secs</strong></div>'));
		});
});
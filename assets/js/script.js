var themejs = document.getElementById('themejs'), ajaxURL = themejs.dataset.ajax;

if( typeof Splide !== 'undefined' && document.querySelector('.splide') ){
	document.addEventListener( 'DOMContentLoaded', function() {
		const splides = document.querySelectorAll(' .splide ');
		for ( var i = 0; i < splides.length; i++ ) {
			if( splides[i].classList.contains('no-mount') ) continue;
			new Splide( splides[i] ).mount();
		}
	} );
}

if( typeof jQuery !== 'undefined' ){
	jQuery(document).ready(function($) {
		$('.collapse-menu li').click(function (e) {
			if(this != e.target) return;
			e.preventDefault();
			$(this).toggleClass('item-opened').find('> ul').slideToggle();
		});
	
		//Jquery comes here...
		
		//Woocomemrce JS
		function wcMessagesHandler(){
			if( document.querySelector('.wc-alert') ){
				var wcAlerts = document.querySelectorAll('.wc-alert'), timehide = 6000;
				for (let i = 0; i < wcAlerts.length; i++) {
					const selected = wcAlerts[ i ], bsAlert = new bootstrap.Alert( selected );
					$(selected).find('.progress').animate({width: '0%'}, timehide);
					setTimeout(function(){
						bsAlert.close();
					}, timehide);
					timehide += 1500;
				}
			}
		}
		wcMessagesHandler();
		$(document).bind('DOMNodeInserted', function(e) {
			wcMessagesHandler();
		});
	});
}
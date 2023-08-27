var themejs = document.getElementById('themejs'), ajaxURL = themejs.dataset.ajax;

if( typeof Splide !== 'undefined' && document.getElementsByClassName('splide') ){
	const splides = document.getElementsByClassName('splide');
	for ( var i = 0; i < splides.length; i++ ) {
		new Splide( splides[i] ).mount();
	}
}

if( typeof jQuery !== 'undefined' ){
	jQuery(document).ready(function($) {
		$('.collapse-menu li').click(function (e) {
			if(this != e.target) return;
			e.preventDefault();
			$(this).toggleClass('item-opened').find('> ul').slideToggle();
		});
		//Jquery comes here...
	});
}
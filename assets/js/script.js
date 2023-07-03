var themejs = document.getElementById('themejs'), ajaxURL = themejs.dataset.ajax;

if( typeof Splide !== 'undefined' && document.getElementsByClassName('splide') ){
	const splides = document.getElementsByClassName('splide');
	for ( var i = 0; i < splides.length; i++ ) {
		new Splide( splides[i] ).mount();
	}
}

if( document.getElementById('mmenu') ){
	const mmenu_target = document.getElementById('mmenu'); menu = new MmenuLight(mmenu_target), drawer = menu.offcanvas({position: ((document.dir == 'rtl') ? 'right' : 'left')});
	menu.navigation({title: mmenu_target.dataset.mmSpnTitle});
	document.querySelector(`[href="#${mmenu_target}"]`).addEventListener('click', function(e){
		e.preventDefault();
		drawer.open();
	});
}

if( typeof jQuery !== 'undefined' ){
	jQuery(document).ready(function($) {
		//Jquery comes here...
	});
}
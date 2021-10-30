var rqjs = document.getElementById('requirejs');
requirejs.config({
	baseUrl: rqjs.getAttribute('src').replace('require.js',''),
	paths: {
		mmenu: 'mmenu-light',
	}
});
if (typeof jQuery === 'function') define('jQuery', function () {
	return jQuery;
});
const imageObserver = new IntersectionObserver((entries, imgObserver) => {
	entries.forEach(function(entry){
		if (entry.isIntersecting){
			const lazyImage = entry.target;
			lazyImage.src = lazyImage.dataset.src;
			imgObserver.unobserve(lazyImage);
		}
	});
});

jQuery(document).ready(function($){
	"use strict";

	function init_scripts(){
		const lazyImages = document.querySelectorAll('[data-src]');
		for (var i = 0; i < lazyImages.length; i++) {
			imageObserver.observe(lazyImages[i]);
		}

		requirejs(['bootstrap'], function(bootstrap){
			const tooltipList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
			for ( var i = 0; i < tooltipList.length; i++ ) {
				new bootstrap.Tooltip(tooltipList[i]);
			}
		});

		if(document.getElementsByClassName('splide')){
			requirejs(['splide'], function( Splide ){
				const splides = document.getElementsByClassName('splide');
				for ( var i = 0; i < splides.length; i++ ) {
					new Splide(splides[i]).mount();
				}
			});
		}
	}
	init_scripts();

	if(document.getElementById('mmenu')){
		requirejs(['mmenu'], function(){
			const menu = new MmenuLight(document.getElementById('mmenu')), drawer = menu.offcanvas({position: ((document.dir == 'rtl') ? 'right' : 'left')});
			menu.navigation({title: $('#mmenu').data('mm-spn-title')});
			$('[href="#mmenu"]').click(function (e) { 
				e.preventDefault();
				drawer.open();
			});
		});
	}
});
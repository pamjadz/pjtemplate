var rqjs = document.getElementById('requirejs');
requirejs.config({
	baseUrl: rqjs.getAttribute('src').replace('require.js',''),
	paths: {
		mmenu: 'mmenu-light',
		bootstrap: 'bootstrap.bundle.min',
	},
	shim : {
		'bootstrap' : { 'deps' :['jquery'] }
	},
});

if (typeof jQuery === 'function') define('jquery', function () {
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

requirejs(['bootstrap'], function($){
	jQuery(document).ready(function($){
		"use strict";

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
		
		function initjsFuncs(){
			const lazyImages = document.querySelectorAll('[data-src]');
			for (var i = 0; i < lazyImages.length; i++) {
				imageObserver.observe(lazyImages[i]);
			}
			if(document.getElementsByClassName('splide')){
				requirejs(['splide'], function(){
					const splides = document.getElementsByClassName('splide');
					for ( var i = 0; i < splides.length; i++ ) {
						new Splide(splides[i]).mount();
					}
				});
			}
			$('[data-bs-toggle="tooltip"]').tooltip();
		}
		
		initjsFuncs();

		/*
		Ajax Template
		$.ajax({
			type : 'POST',
			url : rqjs.getAttribute('data-ajax'),
			data : {
				action : 'actionname',
				inputs : $(this).serialize()
			},
			beforeSend: function() {
				...
			},
			success : function(resp) {
				...
			},
			complete: function(){
				initAjax();
			}
		});
		*/

	});
});

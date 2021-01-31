//Config Requirejs
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

//Functions
function numberWithCommas(x){
	x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
}

//LazyLoad Observer
const imageObserver = new IntersectionObserver((entries, imgObserver) => {
	entries.forEach(function(entry){
		if (entry.isIntersecting){
			const lazyImage = entry.target;
			lazyImage.src = lazyImage.dataset.lazy;
			imgObserver.unobserve(lazyImage);
		}
	});
});

//Main JS
require(['mmenu', 'bootstrap', 'slick'], function($){
	jQuery(document).ready(function($){
		"use strict";

		//MmenuJS
		if(document.querySelector('#mmenu')){
			const menu = new MmenuLight(document.querySelector('#mmenu')), drawer = menu.offcanvas({position: ((document.dir == 'rtl') ? 'right' : 'left')});
			menu.navigation({
				selectedClass: 'Selected',
				title: $('#mmenu').data('mm-spn-title')
			});
			$('[href="#mmenu"]').click(function (e) { 
				e.preventDefault();
				drawer.open();
			});
		}
		
		function initjsFuncs(){
			$('[data-lazy]').each(function(){
				imageObserver.observe(this);
			});
			$('.slick-carousel').each(function(){
				let defaults = {"infinite":true,"margin":0,"items":1,"rtl": ((document.dir == 'rtl') ? true : false)},
					options = '{' + $(this).data('slick').replace(/'/g, '"') + '}',
					argumans = $.extend(defaults ,JSON.parse(options));
				$(this).slick(argumans);
			});
			$('[data-toggle="tooltip"]').tooltip();
		}
		initjsFuncs();

		/*
		Ajax Template
		$.ajax({
			type : 'POST',
			url : rqjs.getAttribute('data-ajax'),
			data : {
				action : 'sendresumejob',
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
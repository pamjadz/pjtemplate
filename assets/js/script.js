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

(function($){
	$.fn.pjperspective = function(){
		let container = this, inner = $(this).find('.pj-item');
		var mouse = {
		_x: 0,
		_y: 0,
		x: 0,
		y: 0,
		updatePosition: function(event) {
		var e = event || window.event;
		this.x = e.clientX - this._x;
		this.y = (e.clientY - this._y) * -1;
		},
		setOrigin: function(e) {
		this._x = e.offsetLeft + Math.floor(e.offsetWidth / 2);
		this._y = e.offsetTop + Math.floor(e.offsetHeight / 2);
		},
		show: function() {
		return "(" + this.x + ", " + this.y + ")";
		}
		};
		mouse.setOrigin(container);
		let counter = 0, updateRate = 10;
		var isTimeToUpdate = function() {
			return counter++ % updateRate === 0;
		};
		var onMouseEnterHandler = function(event) {
			update(event);
		};
		var onMouseLeaveHandler = function() {
			inner.style = "";
		};
		var onMouseMoveHandler = function(event) {
			if (isTimeToUpdate()) {
				update(event);
			}
		};
		var update = function(event) {
			mouse.updatePosition(event);
			updateTransformStyle(
				(mouse.y / inner.offsetHeight / 2).toFixed(2),
				(mouse.x / inner.offsetWidth / 2).toFixed(2)
			);
		};
		var updateTransformStyle = function(x, y) {
			var style = "rotateX(" + x + "deg) rotateY(" + y + "deg)";
			inner.style.transform = style;
			inner.style.webkitTransform = style;
			inner.style.mozTransform = style;
			inner.style.msTransform = style;
			inner.style.oTransform = style;
		};
		container.onmouseenter = onMouseEnterHandler;
		container.onmouseleave = onMouseLeaveHandler;
		container.onmousemove = onMouseMoveHandler;
	};
}( jQuery ));

//Main JS
require(['mmenu', 'bootstrap', 'slick'], function($){
	jQuery(document).ready(function($){
		"use strict";

		//MmenuJS
		const menu = new MmenuLight(document.querySelector('#mmenu')), drawer = menu.offcanvas({position: ((document.dir == 'rtl') ? 'right' : 'left')});
		menu.navigation({
			selectedClass: 'Selected',
			title: $('#mmenu').data('title')
		});
		$('[href="#mmenu"]').click(function (e) { 
			e.preventDefault();
			drawer.open();
		});

		function initjsFuncs(){
			$('[data-lazy]').each(function(){
				imageObserver.observe(this);
			});
			$('.custom-file .custom-file-input').change(function(){
				var file = $(this)[0].files[0].name;
				$(this).parent().find('.custom-file-label').text(file);
			});
			$('.slick-carousel').each(function(){
				let defaults = {"infinite":true,"margin":0,"items":1,"rtl": ((document.dir == 'rtl') ? true : false)},
					options = '{' + $(this).data('slick').replace(/'/g, '"') + '}',
					argumans = $.extend(defaults ,JSON.parse(options));
				$(this).slick(argumans);
			});
			$('[data-toggle="tooltip"]').tooltip();
			$('[data-toggle="perspective"]').pjperspective();
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
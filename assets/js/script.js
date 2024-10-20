const themejs = document.getElementById('themejs'), ajaxURL = themejs.dataset.ajax;

//Form JS Validation
// const validationForms = document.querySelectorAll('.form-validation');
// Array.from(validationForms).forEach(function(form) {
// 	form.addEventListener('submit', function(e){
// 		if( !form.checkValidity() ) {
// 			e.preventDefault();
// 			e.stopPropagation();
// 		}
// 		form.classList.add('was-validated')
// 	}, false);
// 	const inputs = form.querySelectorAll('input, textarea, select');
// 	Array.from(inputs).forEach(function(input) {
// 		input.oninvalid = function(e) {
// 			e.target.setCustomValidity('');
// 			if( !e.target.validity.valid && e.target.title.length > 0 ) {
// 				e.target.setCustomValidity( e.target.title );
// 			}
// 		}
// 		input.oninput = function(e) {
// 			e.target.setCustomValidity('');
// 		}
// 	});
// });


//Splidejs
if( typeof Splide !== 'undefined' && document.querySelector('.splide') ){
	document.addEventListener('DOMContentLoaded', function(){
		const splides = document.querySelectorAll( '.splide' );
		for ( var i = 0; i < splides.length; i++ ) {
			if( typeof( splides[i].dataset.splide ) === "undefined" || splides[i].dataset.splide === null ) return false;
			new Splide( splides[i] ).mount();
		}
	});
}

//Woocommerce Notices
// document.addEventListener('DOMContentLoaded', function() {
// 	var observer = new MutationObserver(function(mutationsList, observer) {
// 		mutationsList.forEach(function(mutation){
// 			if (mutation.type === 'childList' && document.querySelector('.woocommerce-message') ) {
// 				let wcAlerts = document.querySelectorAll('.woocommerce-message'), timehide = 3000;
// 				wcAlerts.forEach(function(alert, index) {
// 					setTimeout(function() {
// 						alert.style.opacity = '0';
// 						setTimeout(function(){
// 							alert.remove();
// 						}, 750);
// 					}, timehide);
// 					timehide += 1500;
// 				});
// 			}
// 		});
// 	});
// 	observer.observe(document.body, {childList: true, subtree: true});
// });

if( typeof jQuery !== 'undefined' ){
	jQuery(document).ready(function($) {

		//Offcanvas mmenu
		// $('.collapse-menu li').click(function (e) {
		// 	if(this != e.target) return;
		// 	e.preventDefault();
		// 	$(this).toggleClass('item-opened').find('> ul').slideToggle();
		// });
		
	});
}
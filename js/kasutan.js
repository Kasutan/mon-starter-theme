(function($) {
	/*Exemple de script javascript*/
	/*$("#home-contact").on('click', function(e) { 
		e.preventDefault();   
		$('#home-contact-form').slideToggle('slow');
	});*/

	/*--------------------------------------------------------------
	# Animations
	--------------------------------------------------------------*/
	/*https://alligator.io/js/intersection-observer*/

	//Only Use the IntersectionObserver if it is supported
	if ('IntersectionObserver' in window) {
		const config = {
			rootMargin: '50px 20px 75px 30px',
			//threshold: [0, 0.25, 0.75, 1]
			};

			
		observer = new IntersectionObserver((entries) => {
			entries.forEach(entry => {
				if (entry.intersectionRatio > 0) {
				entry.target.classList.add('fancy');
				observer.unobserve(entry.target);
				} else {
				entry.target.classList.remove('fancy');
				}
			}, config);
		});

		const fancyElements=document.querySelectorAll('.js-animate-on-visible');
		fancyElements.forEach(elem => {
			observer.observe(elem);
		});


		observer2 = new IntersectionObserver((entries) => {
			entries.forEach(entry => {
				if (entry.intersectionRatio > 0) {
				$(entry.target).children().addClass('fancy-cascade');
				observer.unobserve(entry.target);
				} else {
				$(entry.target).children().removeClass('fancy-cascade');
				}
			}, config);
		});

		const fancyElementsCascade=document.querySelectorAll('.js-animate-on-visible-cascade');
		fancyElementsCascade.forEach(item => {
			observer2.observe(item);
		});

	} else {
		//if Intersection Observer is not supported, add classes right away
		$('.js-animate-on-visible-cascade').addClass('fancy-cascade');
		$('.js-animate-on-visible').addClass('fancy');
	}


})( jQuery );


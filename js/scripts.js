(function($){

	window.abc = function(){
		loadScripts();
	}

	$( document ).on('DOMContentLoaded', function() {

			/*	
			** NOTICE **
			*/

			// Here you can put scripts that do not affect the block layout, or their behaviour. Or it does not need
			// to work in the block editor, such as animation or random interactions not needed for laying out blocks.

			$('.navigation__menu--mobile').on('click', function(e) {
				e.preventDefault;
		
				$(this).toggleClass('active');
		
				$('.navigation__menu--links').toggleClass('active');
				$('.navigation__menu--background').toggleClass('active');
		
			});

		window.loadScripts = function(){

			/*	
			** NOTICE **
			*/
			
			// Here is the code that will be loaded in the block editor in the back-end. Anything not related
			// to the display of the irems does not need to go here.

			document.querySelectorAll('a[href^="#"]').forEach(anchor => {
				anchor.addEventListener('click', function (e) {
					e.preventDefault();
			
					document.querySelector(this.getAttribute('href')).scrollIntoView({
						behavior: 'smooth'
					});
				});
			});

		};

		window.parent.loadScripts();
	});
})(jQuery);
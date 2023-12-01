(function($){

	$(window).ready(function(){
		setTimeout(function(){
			$('.interface-interface-skeleton__sidebar').width(localStorage.getItem('toast_rs_personal_sidebar_width'))
			$('.interface-interface-skeleton__sidebar').resizable({
				handles: 'w',
				resize: function(event, ui) {
					$(this).css({'left': 0});
					localStorage.setItem('toast_rs_personal_sidebar_width', $(this).width());
			   }
			});
		}, 500)
	
	})

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
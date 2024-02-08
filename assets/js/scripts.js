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

	$( document ).on('DOMContentLoaded', function() {

		$('.navigation__menu--mobile').on('click', function(e) {
			e.preventDefault;
	
			$(this).toggleClass('active');
	
			$('.navigation__menu--links').toggleClass('active');
			$('.navigation__menu--background').toggleClass('active');
	
		});

		document.querySelectorAll('a[href^="#"]').forEach(anchor => {
			anchor.addEventListener('click', function (e) {
				e.preventDefault();
		
				document.querySelector(this.getAttribute('href')).scrollIntoView({
					behavior: 'smooth'
				});
			});
		});

	});

})(jQuery);
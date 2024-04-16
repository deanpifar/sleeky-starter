(function($){

    var initializeBlock = function( $block ) {

        $('.hero__notifications__list').not('.slick-initialized').slick({
            dots: false,
            infinite: false,
            arrows: true,
            speed: 300,
            slidesToShow: 1,
            adaptiveHeight: true,
            prevArrow: '<button class="slick-prev slick-arrow" type="button" aria-label="Prev"></button>',
            nextArrow: '<button class="slick-next slick-arrow" type="button" aria-label="Next"></button>',
        });
    }

    $( document ).on('DOMContentLoaded', function() {
        initializeBlock();
    });

    if( window.acf ) {
        window.acf.addAction( 'render_block_preview/type=hero', initializeBlock );
    }

})(jQuery);
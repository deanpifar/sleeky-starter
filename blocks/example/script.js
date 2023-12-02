(function($){

    // Again this file is not needed if the block is not using any JavaScript

    var initializeBlock = function( $block ) {
        //Add Scripts here
    }

    $( document ).on('DOMContentLoaded', function() {

        initializeBlock();

    });

    if( window.acf ) {
        window.acf.addAction( 'render_block_preview/type=example', initializeBlock ); // type = name of block
    }

})(jQuery);
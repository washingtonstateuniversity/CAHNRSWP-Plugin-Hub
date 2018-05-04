jQuery('body').on(
    'click',
    'button.add-media',
    function ( event ){
        event.preventDefault();

        jQuery('.hidden-media').first().removeClass('hidden-media');

        if ( jQuery('.hidden-media').length < 1 ) {

            jQuery('button.add-media').hide();

        } // End if
    }
);
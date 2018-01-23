jQuery(document).ready(function($) {
    $(document).on( 'click', '.cactus-welcome-notice .notice-dismiss', function() {

    $.ajax({
        url: ajaxurl,
        data: {
            action: 'cactus_dismiss_notice'
        }
    })

})
});
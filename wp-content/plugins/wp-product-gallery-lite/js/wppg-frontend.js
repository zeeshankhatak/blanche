jQuery(document).ready(function($) {
  

    //Carousel layout
    var wppg_carousel = [];
    $(".wppg-layout-carousel-section").each(function() {
        var id = $('.wppg-main-product-wrapper').data('id');
        var column = $(this).data('column');
        var controls = $(this).data('controls');
        var auto = $(this).data('auto');
        var speed = $(this).data('speed');
        var pager = $(this).data('pager');
        var width = $(this).data('width');
        var next_text = '<i class="fa fa-angle-right" aria-hidden="true"></i>';
        var pre_text = '<i class="fa fa-angle-left" aria-hidden="true"></i>';
        wppg_carousel[id] = $(this).bxSlider({
            minSlides: 1,
            maxSlides: column,
            moveSlides: 1,
            pager: pager,
            slideWidth: width,
            slideMargin: 15,
            auto: auto,
            controls: controls,
            speed: speed,
            nextText: next_text,
            prevText: pre_text

        });
    });
 
    /*
     * Add span to View Cart woocommerce
     */
    $('body').on('click', '.add_to_cart_button', function() {
        $(document).ajaxComplete(function() {
            $('.added_to_cart').each(function() {
                $('.added_to_cart').html('<span class="wppg-span">View Cart</span>');
            });
        });
    });
    /*
     * Add span to add to cart woocommerce
     */
    $('.add_to_cart_button').each(function() {
        $('.add_to_cart_button').html('<span class="wppg-span">Add to Cart</span>');
    });
    /*
     * Get Variable price option for EDD
     */

    $('body').on('change', '.wppg-variable-price', function() {

        var price_id = $(this).val();
        var id = $(this).closest('.wppg-price').find('.wppg_price_options').data('id');
        var link = $(this).closest('.wppg-price').find('.wppg_price_options').data('link');
        $(this).closest('.wppg-inner-wrap').find('.wppg-edd-price').attr("href", '' + link + '?edd_action=add_to_cart&download_id=' + id + '&edd_options[price_id]=' + price_id + '');
        //  alert(a);

    });

});
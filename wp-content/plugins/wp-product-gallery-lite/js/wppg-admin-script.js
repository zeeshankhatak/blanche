(function($) {

    /**
     * Add blog functionality
     */
    $(function() {

        /*
         * Fetch list of taxonomy from post type
         */
        $('.wppg-product-type').on('change', function() {
            var value = $(this).val();
            var cart = $("<option value='product_add_cart'>Add to Cart</option>");
            if (value === 'product')

            {
               
                $('.wppg-woocommerce-wrap').show();
                $('.wppg-price-wrapper').show();
                $(".wppg-button-one-link-type option[value='product_add_cart']").remove();
                $(".wppg-button-two-link-type option[value='product_add_cart']").remove();
                $(".wppg-button-one-link-type").append("<option value='product_add_cart'>Add to Cart</option>");
                $(".wppg-button-two-link-type").append("<option value='product_add_cart'>Add to Cart</option>");
            } 
            else {
              
                $('.wppg-woocommerce-wrap').hide();
                $(".wppg-button-one-link-type option[value='product_add_cart']").remove();
                $(".wppg-button-two-link-type option[value='product_add_cart']").remove();
                $(".wppg-button-one-link-type").append("<option value='product_add_cart'>Add to Cart</option>");
                $(".wppg-button-two-link-type").append("<option value='product_add_cart'>Add to Cart</option>");
                $('.wppg-price-wrapper').hide();
            }
            var select_post = $(this).val();
            $.ajax({
                url: wppg_backend_js_params.ajax_url,
                data: {
                    select_post: select_post,
                    _wpnonce: wppg_backend_js_params.ajax_nonce,
                    action: 'wppg_selected_post_taxonomy',
                    beforeSend: function() {
                        $(".wppg-loader-preview").show();
                    }
                },
                type: "POST",
                success: function(response) {
                    $(".wppg-select-taxonomy").html(response);
                    $(".wppg-filter-taxonomy").html(response);
                    $(".wppg-loader-preview").hide();
                }
            });
        });
        var selected_product = $(".wppg-product-type option:selected").val();
        if (selected_product === 'product')
        {
            
            $('.wppg-woocommerce-wrap').show();
        }
      
        else {
           
            $('.wppg-woocommerce-wrap').hide();
        }
        /*
         * Fetch list of terms from taxonomy
         */
        $('.wppg-select-taxonomy').on('change', function() {
            var select_tax = $(this).val();
            var tax_type = $('.wppg-taxonomy-queries-type').val();
            $.ajax({
                url: wppg_backend_js_params.ajax_url,
                data: {
                    select_tax: select_tax,
                    tax_type: tax_type,
                    _wpnonce: wppg_backend_js_params.ajax_nonce,
                    action: 'wppg_selected_taxonomy_terms',
                    beforeSend: function() {
                        $(".wppg-taxonomy-preview").show();
                    }
                },
                type: "POST",
                success: function(response) {
                    $(".wppg-taxonomy-preview").hide();
                    if (tax_type == 'multiple-taxonomy') {
                        $(".wppg-multiple-taxonomy-term").html(response);
                    } else if (tax_type == 'simple-taxonomy') {
                        $(".wppg-simple-taxonomy-term").html(response);
                    }
                }
            });
        });
        /*
         * Fetch list of terms for multiple taxonomy condition
         */
        $('body').on('change', '.wppg-multiple-taxonomy', function() {
            var select_tax = $(this).val();
            var nam = $(this);
            $.ajax({
                url: wppg_backend_js_params.ajax_url,
                data: {
                    select_tax: select_tax,
                    _wpnonce: wppg_backend_js_params.ajax_nonce,
                    action: 'wppg_hierarchy_terms',
                    beforeSend: function() {
                     $(".wppg-loader-preview").show();
                    }
                },
                type: "POST",
                success: function(response) {

                    $(nam).closest('.wppg-each-taxonomy-wrap').find(".wppg-hierarchy-taxonomy-term").html(response);
                }
            });
        });
    
        /*
         * Insert multiple taxonomy condition
         */
        $('.wppg-add-tax-condition').click(function() {
            var post_type = $('.wppg-product-type').val();
            $.ajax({
                url: wppg_backend_js_params.ajax_url,
                data: {
                    _wpnonce: wppg_backend_js_params.ajax_nonce,
                    action: 'wppg_add_tax_condition',
                    post_type: post_type

                },
                type: "POST",
                success: function(response) {
                    $(".wppg-tax-inner-wrap").append(response);
                }
            });
        });
//radio button show and hide for post type's post
        $('.wppg-select-post-type').click(function() {
            var value = $(this).val();
            if (value == 'single_post_type') {
                $('.wppg-single-post-type-wrap').show();
                $('.wppg-multiple-post-type-wrap').hide();
            } else {
                $('.wppg-single-post-type-wrap').hide();
                $('.wppg-multiple-post-type-wrap').show();
            }
        });
 
        /*
         * Uplaod slider image
         */
        $('body').on('click', '.wppg-upload-slider-button', function(e) {
            e.preventDefault();
            var btnClicked = $(this);
            var image = wp.media({
                title: 'Insert Gallery Images',
                button: {text: 'Insert Gallery Images'},
                library: {type: 'image'},
                multiple: "toggle"
            }).open()
                    .on('select', function() {
                        var uploaded_image = image.state().get('selection');
                        uploaded_image.map(function(attachment) {
                            attachment = attachment.toJSON();
                            var image_url = attachment.url;
                            //var post_key = $(btnClicked).closest('.wppg-each-post-wrap').data('post-key');
                            var data = {
                                'action': 'wppg_slider_images',
                                '_wpnonce': wppg_backend_js_params.ajax_nonce,
                                'image_url': image_url

                            };
                            $.ajax({
                                url: wppg_backend_js_params.ajax_url,
                                data: data,
                                type: "POST",
                                success: function(response) {
                                    $('.wppg-slider-image-collection').append(response);
                                    $('.wppg-slider-image-collection').sortable({
                                        handle: ".wppg-sort-slider-image",
                                        containment: "parent"
                                    });
                                }
                            });
                        });
                    });
        });
        $('.wppg-slider-image-collection').sortable({
            handle: ".wppg-sort-slider-image",
            containment: "parent"
        });
        /*
         * Show && hide custom field query
         */
        $('.wppg-custom-field-type').change(function() {

            if ($(this).val() === "single_field") {
                $(".wppg-single-custom-wrapper").show();
                $(".wppg-multiple-custom-field-wrap").hide();
            } else {
                $(".wppg-multiple-custom-field-wrap").show();
                $(".wppg-single-custom-wrapper").hide();
            }
        }
        );
        var selected_field = $(".wppg-custom-field-type option:selected").val();
        if (selected_field === "single_field") {
            $(".wppg-multiple-custom-field-wrap").hide();
            $(".wppg-single-custom-wrapper").show();
        } else {
            $(".wppg-multiple-custom-field-wrap").show();
            $(".wppg-single-custom-wrapper").hide();
        }

        /*
         * Show && hide meta value type
         */
        $('.wppg-meta-value-type').change(function() {
            if ($(this).val() === "string")
            {
                $('.wppg-meta-value-wrap').show();
                $(".wppg-meta-number-wrap").hide();
            } else {
                $(".wppg-meta-number-wrap").show();
                $('.wppg-meta-value-wrap').hide();
            }
        }
        );
        var selected_meta = $(".wppg-meta-value-type option:selected").val();
        if (selected_meta === "string")
        {
            $('.wppg-meta-value-wrap').show();
            $(".wppg-meta-number-wrap").hide();
        } else {
            $(".wppg-meta-number-wrap").show();
            $('.wppg-meta-value-wrap').hide();
        }
        /*
         * Menu Tab
         */
        $('.wppg-tab-tigger').click(function() {
            $('.wppg-tab-tigger').removeClass('wppg-active');
            $(this).addClass('wppg-active');
            var active_tab_key = $('.wppg-tab-tigger.wppg-active').data('menu');
            $('.wppg-settings-wrap').removeClass('wppg-active-container');
            $('.wppg-settings-wrap[data-menu-ref="' + active_tab_key + '"]').addClass('wppg-active-container');
        });
        /*
         * Post Menu Tab
         */
        $('.wppg-query-tigger').click(function() {
            $('.wppg-query-tigger').removeClass('wppg-query-active');
            $(this).addClass('wppg-query-active');
            var active_post_key = $('.wppg-query-tigger.wppg-query-active').data('menu');
            $('.wppg-query-setting-wrap').removeClass('wppg-active-field');
            $('.wppg-query-setting-wrap[data-menu-ref="' + active_post_key + '"]').addClass('wppg-active-field');
        });
        /*
         * Usage Tab
         */
        $('.wppg-usage-trigger').click(function() {
            $('.wppg-usage-trigger').removeClass('wppg-usage-active');
            $(this).addClass('wppg-usage-active');
            var active_tab_key = $('.wppg-usage-trigger.wppg-usage-active').data('usage');
            $('.wppg-usage-post').hide();
            $('.wppg-usage-post[data-usage-ref="' + active_tab_key + '"]').show();
        });
        /*
         * Checked button for metadata
         */

        $('.wppg-show-category').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
            } else
            {
                $(this).val('0');
            }
        });
       
        $('body').on('click', '.wppg-show-type-filter', function() {
            if ($(this).is(':checked'))
            {
                $(this).closest('.wppg-post-field-wrap').find('.wppg-show-type-filter').val('1');
                $(this).closest('.wppg-post-field-wrap').find('.wppg-type-filter-wrap').show();
            } else

            {
                $(this).closest('.wppg-post-field-wrap').find('.wppg-show-type-filter').val('0');
                $(this).closest('.wppg-post-field-wrap').find('.wppg-type-filter-wrap').hide();
            }

        });
        $('body').on('click', '.wppg-show-operator', function() {
            if ($(this).is(':checked'))
            {
                $(this).closest('.wppg-post-field-wrap').find('.wppg-show-operator').val('1');
                $(this).closest('.wppg-post-field-wrap').find('.wppg-operator-inner-wrap').show();
            } else

            {
                $(this).closest('.wppg-post-field-wrap').find('.wppg-show-operator').val('0');
                $(this).closest('.wppg-post-field-wrap').find('.wppg-operator-inner-wrap').hide();
            }

        });
        /*
         *  Social media share checked value
         */

        $('.wppg-show-facebook-share').click(function() {
            if ($(this).is(':checked'))
            {
                $('.wppg-show-facebook-value').val('1');
            } else
            {
                $('.wppg-show-facebook-value').val('0');
            }
        });
        $('.wppg-show-twitter-share').click(function() {
            if ($(this).is(':checked'))
            {
                $('.wppg-show-twitter-value').val('1');
            } else
            {
                $('.wppg-show-twitter-value').val('0');
            }
        });
        $('.wppg-show-google-share').click(function() {
            if ($(this).is(':checked'))
            {
                $('.wppg-show-google-value').val('1');
            } else
            {
                $('.wppg-show-google-value').val('0');
            }
        });
        $('.wppg-show-linkedin-share').click(function() {
            if ($(this).is(':checked'))
            {
                $('.wppg-show-linkedin-value').val('1');
            } else
            {
                $('.wppg-show-linkedin-value').val('0');
            }
        });
        $('.wppg-show-mail-share').click(function() {
            if ($(this).is(':checked'))
            {
                $('.wppg-show-mail-value').val('1');
            } else
            {
                $('.wppg-show-mail-value').val('0');
            }
        });
        /*
         * Show && hide layout settings
         */
        $('.wppg-select-layout').change(function() {
            if ($(this).val() === "grid")
            {
                $('.wppg-grid-setting-wrap').show();
                $('.wppg-list-setting-wrap').hide();
                $('.wppg-slider-option-block').hide();
                $('.wppg-carousel-setting-wrap').hide();
                $('.wppg-column-settings-wrap').show();
            } else if ($(this).val() === "list") {
                $('.wppg-list-setting-wrap').show();
                $('.wppg-grid-setting-wrap').hide();
                $('.wppg-carousel-setting-wrap').hide();
                $('.wppg-slider-option-block').hide();
                $('.wppg-column-settings-wrap').hide();
            } else {
                $('.wppg-list-setting-wrap').hide();
                $('.wppg-carousel-setting-wrap').show();
                $('.wppg-grid-setting-wrap').hide();
                $('.wppg-slider-option-block').show();
                $('.wppg-column-settings-wrap').hide();
            } 
        });
        var layout_type = $(".wppg-select-layout option:selected").val();
        if (layout_type === "grid")
        {
            $('.wppg-grid-setting-wrap').show();
            $('.wppg-list-setting-wrap').hide();
            $('.wppg-carousel-setting-wrap').hide();
            $('.wppg-slider-option-block').hide();
            $('.wppg-column-settings-wrap').show();
        } else if (layout_type === "list") {
            $('.wppg-list-setting-wrap').show();
            $('.wppg-grid-setting-wrap').hide();
            $('.wppg-carousel-setting-wrap').hide();
            $('.wppg-slider-option-block').hide();
            $('.wppg-column-settings-wrap').hide();
        } else  {
            $('.wppg-list-setting-wrap').hide();
            $('.wppg-grid-setting-wrap').hide();
            $('.wppg-carousel-setting-wrap').show();
            $('.wppg-slider-option-block').show();
            $('.wppg-column-settings-wrap').hide();
        }  
        /*
         * Show && hide orderby meta keys
         */
        $('.wppg-select-orderby').change(function() {
            if ($(this).val() === "meta_value" || $(this).val() === "meta_value_num")
            {
                $('.wppg-orderby-meta-warp').show();
            } else {
                $('.wppg-orderby-meta-warp').hide();
            }
        });
        var orderby_type = $(".wppg-select-orderby option:selected").val();
        if (orderby_type === "meta_value" || orderby_type === "meta_value_num") {
            $('.wppg-orderby-meta-warp').show();
        } else {
            $('.wppg-orderby-meta-warp').hide();
        }

        /*
         * Show && hide taxonomy query  value type
         */
        $('.wppg-taxonomy-queries-type').change(function() {
            if ($(this).val() === "simple-taxonomy") {
                $('.wppg-select-taxonomy').val('select');
                $('.wppg-terms-wrap').show();
                $('.wppg-multiple-terms-wrap').hide();
                $('.wppg-simple-terms-wrap').show();
            } else {
                $('.wppg-select-taxonomy').val('select');
                $('.wppg-terms-wrap').show();
                $('.wppg-multiple-terms-wrap').show();
                $('.wppg-simple-terms-wrap').hide();
            }

        });
        var query_type = $(".wppg-taxonomy-queries-type option:selected").val();
        if (query_type === "simple-taxonomy") {
            $('.wppg-terms-wrap').show();
            $('.wppg-multiple-terms-wrap').hide();
            $('.wppg-simple-terms-wrap').show();
        } else {
            $('.wppg-terms-wrap').show();
            $('.wppg-multiple-terms-wrap').show();
            $('.wppg-simple-terms-wrap').hide();
        }

        /**
         * blog query remove
         *
         */

        $('body').on('click', '.wppg-delete-query', function() {
            var delete_term = confirm('Are you sure you want to delete this taxonomy condition?');
            if (delete_term) {
                $(this).closest('.wppg-each-taxonomy-wrap').fadeOut(500, function() {
                    $(this).remove();
                });
            }
        });
       
        //radio button show and hide for filter terms
        $('.wppg-filter-terms-type').click(function() {
            var value = $(this).val();
            if (value === 'all') {
                $('.wppg-specific-wrap').hide();
            } else {
                $('.wppg-specific-wrap').show();
            }
        });
        //ajax call in post type thickbox
        $('.wppg-filter-taxonomy').change(function() {
            var select_type = $(this).val();
            // var term_type = $('.wppg-filter-terms-type:checked').val();
            $.ajax({
                url: wppg_backend_js_params.ajax_url,
                data: {
                    select_type: select_type,
                    //  term_type: term_type,
                    _wpnonce: wppg_backend_js_params.ajax_nonce,
                    action: 'wppg_filter_tax_terms'
//                    beforeSend: function() {
//                        $(".wp1s-post-loader-preview").show();
//                    },
                },
                type: "POST",
                success: function(response) {
                    //alert(response);
                    // if (term_type === 'specific') {
                    $(".wppg-specific-wrap").html(response);
                    //}

                }
            });
        });
        /**
         * Jquery UI Slider initialization
         *
         * @since 1.0.0
         */

        $('.wppg-grid-column').each(function() {
            var $selector = $(this);
            var min = $(this).data('min');
            var max = $(this).data('max');
            var value = $(this).data('value');
            $(this).slider({
                range: 'min',
                min: min,
                max: max,
                value: value,
                slide: function(event, ui) {
                    $selector.parent().find('input[type="number"]').val(ui.value);
                    console.log(event);
                    console.log(ui);
                }
            });
        });
//radio button show and hide for post type's post
        $('.wppg-post-link').click(function() {
            var value = $(this).val();
            if (value === 'post_link') {
                $('.wppg-custom-link-wrap').hide();
            } else {
                $('.wppg-custom-link-wrap').show();
            }
        });
     
        

        $('.wppg-show-social-share').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
                $('.wppg-social-container').show();
            } else
            {
                $(this).val('0');
                $('.wppg-social-container').hide();
            }
        });
        $('.wppg-show-facebook-share').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
            } else
            {
                $(this).val('0');
            }
        });
        $('.wppg-show-twitter-share').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
            } else
            {
                $(this).val('0');
            }
        });
        $('.wppg-show-google-share').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
            } else
            {
                $(this).val('0');
            }
        });
        $('.wppg-show-linkedin-share').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
            } else
            {
                $(this).val('0');
            }
        });
        $('.wppg-show-mail-share').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
            } else
            {
                $(this).val('0');
            }
        });
        $('.wppg-show-pinterest-share').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
            } else
            {
                $(this).val('0');
            }
        });
        $('.wppg-show-vk-share').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
            } else
            {
                $(this).val('0');
            }
        });
    

        /**
         * logo Item Remove
         *
         */

        $('body').on('click', '.wppg-delete-slider-image', function() {
            var delete_image = confirm('Are you sure you want to delete this image?');
            if (delete_image) {
                $(this).closest('.wppg-slider-wrap').fadeOut(500, function() {
                    $(this).remove();
                });
            }
        });
        /*
         * Slide Content show & hide
         */
        $('.wppg-content-template').change(function() {
            if ($(this).val() === "template-5" || $(this).val() === "template-9")
            {
                $('.wppg-content-slides-container').hide();
            } else {
                $('.wppg-content-slides-container').show();
            }
        });
        var template_type = $(".wppg-content-template option:selected").val();
        if (template_type === "template-5" || template_type === "template-9") {
            $('.wppg-content-slides-container').hide();
        } else {
            $('.wppg-content-slides-container').show();
        }
        /*
         * Template preview
         */
//grid template preview
        $(".wppg-grid-common").first().addClass("grid-active");
        $('.wppg-grid-template').on('change', function() {
            var template_value = $(this).val();
            var array_break = template_value.split('-');
            var current_id = array_break[1];
            $('.wppg-grid-common').hide();
            $('#wppg-grid-demo-' + current_id).show();
        });
        if ($(".wppg-grid-template option:selected").length > 0) {
            var grid_view = $(".wppg-grid-template option:selected").val();
            var array_break = grid_view.split('-');
            var current_id1 = array_break[1];
            $('.wppg-grid-common').hide();
            $('#wppg-grid-demo-' + current_id1).show();
        }





//list preview
        $(".wppg-list-common").first().addClass("list-active");
        $('.wppg-list-template').on('change', function() {
            var template_value = $(this).val();
            var array_break = template_value.split('-');
            var current_id = array_break[1];
            $('.wppg-list-common').hide();
            $('#wppg-list-demo-' + current_id).show();
        });
        if ($(".wppg-list-template option:selected").length > 0) {
            var grid_view = $(".wppg-list-template option:selected").val();
            var array_break = grid_view.split('-');
            var current_id1 = array_break[1];
            $('.wppg-list-common').hide();
            $('#wppg-list-demo-' + current_id1).show();
        }
//Carousel preview
        $(".wppg-carousel-common").first().addClass("carousel-active");
        $('.wppg-carousel-template').on('change', function() {
            var template_value = $(this).val();
            var array_break = template_value.split('-');
            var current_id = array_break[1];
            $('.wppg-carousel-common').hide();
            $('#wppg-carousel-demo-' + current_id).show();
        });
        if ($(".wppg-carousel-template option:selected").length > 0) {
            var carousel_view = $(".wppg-carousel-template option:selected").val();
            var array_break = carousel_view.split('-');
            var current_id1 = array_break[1];
            $('.wppg-carousel-common').hide();
            $('#wppg-carousel-demo-' + current_id1).show();
        }


        
        $('.wppg-show-price').click(function() {
            var product = $('.wppg-product-type').val();
            if ($(this).is(':checked'))

            {
                if (product === 'download') {
                    $(this).val('1');
                    $('.wppg-price-wrapper').hide();
                } else {

                    $(this).val('1');
                    $('.wppg-price-wrapper').show();
                }
            } else
            {
                $(this).val('0');
                $('.wppg-price-wrapper').hide();
            }
        });
        $('.wppg-show-cart').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
                $('.wppg-cart-wrapper').show();
            } else
            {
                $(this).val('0');
                $('.wppg-cart-wrapper').hide();
            }
        });
        $('.wppg-show-button-two').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
                $('.wppg-detail-link-wrapper').show();
            } else
            {
                $(this).val('0');
                $('.wppg-detail-link-wrapper').hide();
            }
        });
   
     
        //Show Title
        $('.wppg-show-title').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
            } else
            {
                $(this).val('0');
            }
        });
        //Show content
        $('.wppg-show-content').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
                $('.wppg-product-desc-wrapper').show();
            } else
            {
                $(this).val('0');
                $('.wppg-product-desc-wrapper').hide();
            }
        });
        //Dispaly product link
        $('.wppg-show-link-title').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
            } else
            {
                $(this).val('0');
            }
        });
        //Dispaly product link
        $('.wppg-show-link-image').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
            } else
            {
                $(this).val('0');
            }
        });
     
      
        $('.wppg-show-button-one').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
                $('.wppg-buy-wrapper-one').show();
            } else
            {
                $(this).val('0');
                $('.wppg-buy-wrapper-one').hide();
            }
        });

        $('.wppg-show-button-two').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
                $('.wppg-buy-wrapper-two').show();
            } else
            {
                $(this).val('0');
                $('.wppg-buy-wrapper-two').hide();
            }
        });
        /*
         * Common Custom link Button show & hide
         */
        $('.wppg-button-one-link-type').change(function() {
            if ($(this).val() === 'common_custom_link')
            {
                $('.wppg-common-link-wrapper').show();
                $('.wppg-button-one-text-wrap').show();
            } else if ($(this).val() === 'product_add_cart') {
                $('.wppg-common-link-wrapper').hide();
                $('.wppg-button-one-text-wrap').hide();
            } else {
                $('.wppg-common-link-wrapper').hide();
                $('.wppg-button-one-text-wrap').show();
            }
        });
        var button_type = $(".wppg-button-one-link-type option:selected").val();
        if (button_type === 'common_custom_link')
        {
            $('.wppg-common-link-wrapper').show();
            $('.wppg-button-one-text-wrap').show();
        } else if (button_type === 'product_add_cart') {
            $('.wppg-common-link-wrapper').hide();
            $('.wppg-button-one-text-wrap').hide();
        } else {
            $('.wppg-common-link-wrapper').hide();
            $('.wppg-button-one-text-wrap').show();
        }
        /*
         * Common Custom link Button show & hide
         */
        $('.wppg-button-two-link-type').change(function() {
            if ($(this).val() === 'common_custom_link')
            {
                $('.wppg-common-two-link-wrapper').show();
                $('.wppg-button-two-text-wrap').show();
            } else if ($(this).val() === 'product_add_cart') {
                $('.wppg-common-two-link-wrapper').hide();
                $('.wppg-button-two-text-wrap').hide();
            } else {
                $('.wppg-common-two-link-wrapper').hide();
                $('.wppg-button-two-text-wrap').show();
            }

        });
        var button_type_two = $(".wppg-button-two-link-type option:selected").val();
        if (button_type_two === 'common_custom_link')
        {
            $('.wppg-common-two-link-wrapper').show();
            $('.wppg-button-two-text-wrap').show();
        } else if (button_type_two === 'product_add_cart') {
            $('.wppg-common-two-link-wrapper').hide();
            $('.wppg-button-two-text-wrap').hide();
        } else {
            $('.wppg-common-two-link-wrapper').hide();
            $('.wppg-button-two-text-wrap').show();
        }

    });
}(jQuery));

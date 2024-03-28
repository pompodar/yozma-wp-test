<?php

    /**
     * Declare WooCommerce Support
     */
    function declare_woocommerce_support()
    {
        add_theme_support('woocommerce', array(
            'thumbnail_image_width' => 425,
            'gallery_thumbnail_image_width' => 100,
            'single_image_width' => 800,
        ));
    }

    add_action('after_setup_theme', 'declare_woocommerce_support');


    /**
     * Turn off Woocommerce CSS
     */
    add_filter('woocommerce_enqueue_styles', '__return_false');


    /**
     * Remove Select2 & Bundle CSS
     */
    function wc_disable_assets()
    {
        if (class_exists('woocommerce')) {
            wp_dequeue_style('select2');
            wp_deregister_style('select2');

            // WooCommerce 3.2.1+
            wp_dequeue_script('selectWoo');
            wp_deregister_script('selectWoo');
        }
    }

    add_action('wp_enqueue_scripts', 'wc_disable_assets', 9999);

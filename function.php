<?php
require_once ( get_stylesheet_directory() . '/theme-options.php' );

add_theme_support('post-thumbnails');
//add_image_size('slide', 1920, 600, true);

if ( function_exists( 'fly_add_image_size' ) ) {
    fly_add_image_size( 'slider', 1920, 600, true );
    fly_add_image_size( 'home_page_square_2x', 1000, 1000, true );
    fly_add_image_size( 'cropped_top_left', 1000, 1000, array( 'left', 'top' ) );
}
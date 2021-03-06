<?php
// add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles');
// function my_theme_enqueue_styles() {
//     $parenthandle = 'twentytwentyone-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
//     $theme = wp_get_theme();
//     wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css',
//         array(),  // if the parent theme code has a dependency, copy it to here
//         $theme->parent()->get('Version')
//     );
//     wp_enqueue_style( 'cop26theme-style', get_stylesheet_uri(),
//         array( $parenthandle ),
//         $theme->get('Version') // this only works if you have Version in the style header
//     );
// }
// Queue parent style followed by child/customized style
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles', PHP_INT_MAX);

function theme_enqueue_styles() {
    wp_enqueue_style( 'twentytwentyone-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'cop26theme-style', get_stylesheet_directory_uri() . '/style.css', array( 'twentytwentyone-style' ) );
}
// Custom Function to add icon
function my_favicon_link() {
    echo '<link rel="icon" type="image/x-icon" href="/wp-content/themes/cop26-child-theme/images/favicon.ico" />' . "\n";
}
add_action( 'wp_head', 'my_favicon_link' );

// I was tring to make the default icons our custom ones, gave up

// function mytheme_includes() {
// 	require_once get_theme_file_path( 'classes/svg_icons.php' );
// }
// add_action( 'after_setup_theme', 'mytheme_includes' );
//
//
// function child_init() {
//   $child_svg_icons = new child_svg_icons();
//   $child_svg_icons->change_icons();
// }
// add_action( 'init', 'child_init' );

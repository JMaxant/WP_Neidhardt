<?php
define('NS_VERSION','1.0.0');
define('THEME_PREFIX', 'NS_');

function NS_scripts() {
    wp_enqueue_style('NS_swiperJs', get_template_directory_uri().'/assets/css/swiper.min.css', array(), NS_VERSION,'all');
    wp_enqueue_style('NS_fontawesome', 'https://use.fontawesome.com/releases/v5.2.0/css/all.css', array(), NS_VERSION, 'all');
    wp_enqueue_style('NS_custom_fonts', get_template_directory_uri().'/assets/css/fonts.css', array(), NS_VERSION,'all');
    wp_enqueue_style('NS_custom', get_template_directory_uri().'/style.css', array(), NS_VERSION,'all');
    wp_enqueue_style('NS_custom_mediaqueries', get_template_directory_uri().'/assets/css/mediaqueries.css', array(), NS_VERSION,'all');

    wp_enqueue_script('NS_swiperJs', get_template_directory_uri().'/assets/js/swiper.min.js', array('jquery'), NS_VERSION, true);
    wp_enqueue_script('NS_TweenMax', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js', array('jquery'), NS_VERSION, true);
    wp_enqueue_script('NS_snapSvg', 'https://cdnjs.cloudflare.com/ajax/libs/snap.svg/0.5.1/snap.svg-min.js', array('jquery'), NS_VERSION, true);
    wp_enqueue_script('NS_custom', get_template_directory_uri().'/assets/js/app.js', array('jquery'), NS_VERSION, true);
}

add_action('wp_enqueue_scripts', 'NS_scripts');

// Image sizes

if(function_exists(add_image_size)){
    add_image_size('home-slider', 1920, 0, false); // setting height to zero allows for the image to use all the available width
}

// Login page logo customization

function NS_login_logo() {
    $custom_logo_id = get_theme_mod('custom_logo');
    $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
    ?>
    <style type="text/css">

        #login h1 a, .login h1 a {
            background-image: url(<?php echo $logo[0]; ?>);
            width:320px;
            background-repeat: no-repeat;
            padding-bottom: 30px;
        }
    </style>
<?php }

add_action( 'login_enqueue_scripts', 'NS_login_logo' );

// Theme setup

function NS_setup() {
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-logo', array(
        'height' => 150,
        'width' => 150,
        'flex-height' => true,
        'flex-width' => true
        )
    );

    remove_action('wp_head', 'wp_generator');
    remove_filter('the_content', 'wptexturize');
    register_nav_menus(array('primary' =>'primary', 'secondary' => 'secondary', 'footer' => 'footer'));
}
add_action('after_setup_theme', 'NS_setup');

// Custom functions go there
    // Allows the creation and use of custom classes for templates
function autoloadCustomClasses($class) {
    if(strstr($class, THEME_PREFIX)) {
        require_once 'classes/'.$class.'.php';
    }
}
spl_autoload_register('autoloadCustomClasses');
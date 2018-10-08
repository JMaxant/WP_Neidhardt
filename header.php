<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
    <header id="navbar">
        <nav class="header">
            <div class="burger-container">
                <div id="burger">
                    <div class="bar topBar"></div>
                    <div class="bar btmBar"></div>
                </div>
            </div>
            <div class="icon"></div>
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'menu_class' => 'menu',
                    'container' => 'ul',
                    'link_before' => '',
                    'link_after' => ''
                )
            ); ?>
            </nav>
            <?php if(function_exists('the_custom_logo')) :
                $custom_logo_id = get_theme_mod('custom_logo');
                $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                ?>
            <figure class="logo">
                <a href="<?= get_page_link(get_page_by_title('Home')->ID) ?>">
                    <img class="custom-logo" src="<?= $logo[0]; ?>" alt="Neidhardt Studios" />
                </a>
            </figure>
            <?php endif; ?>
        <a href="https://www.instagram.com/fredoticpro" target="_blank">
            <i class="fab fa-instagram"></i>
        </a>
    </header>

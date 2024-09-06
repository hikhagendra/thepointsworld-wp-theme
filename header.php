<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Points World</title>
    <?php wp_head(); ?>
</head <?php body_class(); ?>>
<body>
    <header class="tpw-bg-primary-dark tpw-text-white tpw-font-primary">
        <div class="tpw-container tpw-mx-auto tpw-px-4 tpw-py-4 tpw-flex tpw-justify-between tpw-items-center">
            <!-- Logo -->
            <div class="tpw-flex tpw-items-center">
                <!-- <img src="logo.png" alt="Logo" class="tpw-h-8 tpw-w-8 tpw-mr-2"> -->
                <span class="tpw-text-xl tpw-font-bold">Your Logo</span>
            </div>
            <!-- Navigation Menu -->
            <nav class="tpw-flex tpw-items-center tpw-space-x-4">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'header-menu',
                    'container' => false,
                    'menu_class' => 'tpw-flex tpw-space-x-10',
                    'walker' => new Tailwind_Nav_Walker(),
                    'link_class' => 'tpw-text-white'
                ));
                ?>
                <!-- WooCommerce My Account/Login/Signup Buttons -->
                <?php if (is_user_logged_in()) : ?>
                    <?php 
                    $current_user = wp_get_current_user(); 
                    ?>
                    <div class="tpw-flex tpw-items-center tpw-space-x-4">
                        <a href="<?php echo wc_get_account_endpoint_url('dashboard'); ?>" class="tpw-flex tpw-items-center tpw-space-x-2 tpw-ml-8">
                            <?php echo get_avatar($current_user->ID, 40, '', '', ['class'   =>  'tpw-rounded-full']); // Display profile picture ?>
                            <span class="tpw-text-white"><?php echo esc_html($current_user->display_name); // Display user name ?></span>
                        </a>
                    </div>
                <?php else : ?>
                    <a href="<?php echo wc_get_page_permalink('myaccount'); ?>" class="tpw-bg-primary tpw-hover:tpw-bg-primary-dark tpw-text-white tpw-font-bold tpw-py-2 tpw-px-4 tpw-rounded">Login</a>
                    <a href="<?php echo wc_get_page_permalink('myaccount'); ?>" class="tpw-bg-secondary tpw-hover:tpw-bg-secondary-dark tpw-text-white tpw-font-bold tpw-py-2 tpw-px-4 tpw-rounded">Signup</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>
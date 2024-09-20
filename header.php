<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Points World</title>
    <?php wp_head(); ?>
</head>
<body <?php body_class('tpw-font-primary'); ?>>
    <header class="tpw-bg-white tpw-border-b tpw-border-gray-300">
        <div class="tpw-container tpw-mx-auto tpw-py-6 tpw-flex tpw-justify-between tpw-items-center">
            <!-- Logo -->
            <div class="tpw-flex tpw-items-center">
                <?php echo get_custom_logo(); ?>
            </div>
            <!-- Navigation Menu -->
            <nav class="tpw-flex tpw-items-center tpw-space-x-4">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'header-menu',
                    'container' => false,
                    'menu_class' => 'tpw-flex tpw-space-x-10 tpw-mr-6',
                    'walker' => new Tailwind_Nav_Walker(),
                    'link_class' => 'tpw-text-black tpw-text-lg',
                    'item_class' => '',
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
                    <a href="<?php echo wc_get_page_permalink('myaccount'); ?>" class="tpw-bg-primary hover:tpw-bg-secondary tpw-text-white hover:tpw-text-white tpw-py-3 tpw-px-8 tpw-rounded">Login</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>
    <footer class="tpw-pt-20">
        <div class="tpw-container tpw-mx-auto tpw-flex tpw-justify-between">
            <!-- Company Information Start -->
            <div class="tpw-max-w-xl">
                <?php echo get_custom_logo(); ?>
                <p class="tpw-font-light tpw-mt-8">
                Unlock the Secrets to Traveling Anywhere for Minimal Cost! Unlock the Secrets to Traveling Anywhere for Minimal Cost! Unlock the Secrets to Traveling Anywhere for Minimal Cost! Unlock the Secrets to Traveling Anywhere for Minimal Cost! Unlock the Secrets to Traveling Anywhere for Minimal Cost!
                </p>
            </div>
            <!-- Company Information End -->

            <!-- Quick Links Start -->
            <div class="tpw-w-1/6">
                <h2 class="tpw-text-xl tpw-font-medium tpw-mb-6">Quick Links</h2>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer-menu',
                    'container' => true,
                    'menu_class' => '',
                    'walker' => new Tailwind_Nav_Walker(),
                    'link_class' => 'tpw-text-black tpw-font-light tpw-text-lg',
                    'item_class' => 'tpw-my-4',
                ));
                ?>
            </div>
            <!-- Quick Links End -->
        </div>
        
        <div class="tpw-text-center tpw-py-8 tpw-mt-12 tpw-font-light tpw-text-gray-600">
            &copy; <?php echo date('Y'); ?> The Points World. All rights reserved. Web Design By <a href="https://khagendralama.com.np/" target="_blank">Khagendra Lama</a>
        </div>
    </footer>
    
<?php wp_footer(); ?>
</body>
</html>
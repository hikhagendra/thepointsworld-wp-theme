<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit; ?>
<div class="tpw-flex tpw-flex-wrap tpw-bg-white tpw-mx-auto tpw-max-w-7xl tpw-mt-8">
	<aside class="tpw-w-full md:tpw-w-1/4 tpw-p-4 tpw-border-r-2">
		<?php
		/**
		 * My Account navigation.
		 *
		 * @since 2.6.0
		 */
		do_action( 'woocommerce_account_navigation' ); ?>
	</aside>
	<main class="tpw-w-full md:tpw-w-3/4 tpw-bg-white tpw-p-4">
		<div class="woocommerce-MyAccount-content">
			<?php
				/**
				 * My Account content.
				 *
				 * @since 2.6.0
				 */
				do_action( 'woocommerce_account_content' );
			?>
		</div>
	</main>
</div>
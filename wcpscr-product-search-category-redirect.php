<?php

/**
 * Plugin Name: Product Search Category Redirect
 * Plugin URI: https://99w.co.uk
 * Description: Redirects WooCommerce product searches matching a product category to the product category page.
 * Version: 1.1.1
 * Requires at least: 5.0
 * Requires PHP: 7.0
 * Author: 99w
 * Author URI: https://profiles.wordpress.org/ninetyninew/
 * Text Domain: wcpscr-product-search-category-redirect
 * Domain Path: /languages
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */

if ( !defined( 'ABSPATH' ) ) {

	exit;

}

function wcpscr_product_search_category_translation() {

	load_plugin_textdomain( 'wcpscr-product-search-category-redirect', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );

}
add_action( 'init', 'wcpscr_product_search_category_translation' );

require_once( ABSPATH . 'wp-admin/includes/plugin.php' );

if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {

	function wcpscr_product_search_category_redirect() {

		// If a search query (post type included as WooCommerce uses this to define a product search)

		if ( isset( $_GET['s'] ) && isset( $_GET['post_type'] ) ) {

			// If a WooCommerce product search

			if ( 'product' == sanitize_text_field( $_GET['post_type'] ) ) {

				// Get product categories

				$product_categories = get_terms(
					array(
						'taxonomy'		=> 'product_cat',
						'hide_empty'	=> false, // Ensures redirect still occurs even if no products in category (without this you would get an empty search results page)
					),
				);

				// If there are product categories

				if ( !empty( $product_categories ) ) {

					$search_query = strtolower( sanitize_text_field( $_GET['s'] ) ); // Get search query
					$search_query_exploded = explode( ' ', $search_query ); // Explode search query so we can count how many words
					$search_query_words = count( $search_query_exploded ); // Get the amount of words in the search query

					// Loop through the product categories

					foreach ( $product_categories as $product_category ) {

						$product_category_name = strtolower( $product_category->name ); // Get product category name
						$product_category_name_exploded = explode( ' ', $product_category_name ); // Explode product category so we can count how many words
						$product_category_name_words = count( $product_category_name_exploded ); // Get the amount of words in the product category name

						// Check if the search query has the same amount of words as the product category name, this condition ensures that queries containing less/more words than would match the category still search as normal, e.g. searching "crane scale" would redirect to a "crane scales" category, but "abc crane scale" would search as normal

						if ( $search_query_words == $product_category_name_words ) {

							// Conditions below ensure the redirect occurs if it's the same words as the product category in any order

							$words_found = 0; // Start count of words found from search query in product category name

							foreach ( $search_query_exploded as $search_query_word ) {

								if ( false !== strpos( $product_category_name, $search_query_word ) ) { // If search query word is in the product category name

									$words_found = $words_found + 1; // Increase words found total

								}

							}

							// If all the words are within the product category name

							if ( $words_found == $product_category_name_words ) {

								// Redirect to product category

								wp_redirect( get_term_link( $product_category ), 301 );

								// Exit after redirect

								exit;

							}

						}

					}

				}

			}

		}

	}
	add_action( 'template_redirect', 'wcpscr_product_search_category_redirect' );

} else {

	add_action( 'admin_notices', function() {

		if ( current_user_can( 'edit_plugins' ) ) {

			?>

			<div class="notice notice-error">
				<p><strong><?php esc_html_e( 'Product Search Category Redirect requires WooCommerce to be installed and activated.', 'wcpscr-product-search-category-redirect' ); ?></strong></p>
			</div>

			<?php

		}

	});

}

=== WCPSCR Product Search Category Redirect ===
Contributors: ninetyninew
Tags: product search, search by category, product categories, category search
Requires at least: 5.0
Tested up to: 5.7.2
Requires PHP: 7.0
Stable tag: 1.0.0
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Redirects product searches matching a product category to the product category page.

== Description ==

When a customer on your WooCommerce store searches for products using the standard product search this plugin will redirect any search query which matches a product category name to the product category page.

This is useful if your product data (title and description, etc) does not contain any reference to the product category it is assigned to.

= Example =

You have a product called "ABC Hanging Scale" in a "Crane Scales" product category, the product title, description, etc does not contain any reference to it being a crane scale.

When someone searches for "crane scales" or "crane scale" or "scale crane", etc this product and others like it would not be returned in the results.

Therefore with this plugin it will automatically redirect any search query which matches a product category to the product category itself - showing all the products related to that query instead of just the products which contain a reference to the category name in the title and description.

= Settings =

There are no settings to configure for this plugin, just install and activate it, once done when you search for a term matching a product category name you will be redirected to the category page.

You just need to ensure WooCommerce is also installed and activated and you are using the standard WooCommerce product search. This will be the case unless you have installed another search plugin and/or your theme has replaced the standard product search. You can test this by searching for a product on your store. If the URL ends with something like `?s=your-search-term&post_type=product` then this is the standard product search.

= Help/Feedback/Contributions =

For help using the plugin use our [support forum](https://wordpress.org/support/plugin/wcpscr-product-search-category-redirect/).

For feature requests and bug reports use our [feedback board](https://feedback.99w.co.uk/b/Product-Search-Category-Redirect-WooCommerce).

You can contribute to the plugin via our [GitHub repository](https://github.com/ninetyninew/wcpscr-product-search-category-redirect).

== Installation ==

= Minimum requirements =

* WordPress 5.0 or greater
* PHP 7.0 or greater
* WooCommerce must be installed and activated, we recommend using the latest version

= Automatic installation =

To do an automatic install of this plugin log in to your WordPress dashboard, navigate to the Plugins menu, and click "Add New".
 
Search for "Product Search Category Redirect", find this plugin in the list and click the install button, once done simply activate the plugin.

= Manual installation =

Manual installation method requires downloading the plugin and uploading it to your web server via an FTP application. See these [instructions on how to do this](https://wordpress.org/support/article/managing-plugins/#manual-plugin-installation).

== Changelog ==

= 1.0.0 - 2021-05-25 =

* Initial release
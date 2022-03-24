=== Product Search Category Redirect ===
Contributors: ninetyninew
Tags: product search, search by category, category search, product category, product categories
Requires at least: 5.0
Tested up to: 5.9.2
Requires PHP: 7.0
Stable tag: 1.1.0
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Redirects WooCommerce product searches matching a product category to the product category page.

== Description ==

When a customer on your WooCommerce store searches for products using the standard product search this plugin will redirect any search query which matches a product category name to the product category page. The search query words can be in a different order to the product category name, aslong as the words within the query match the words within the product category name it will do the redirect.

This is useful if your product data (title and description, etc) does not contain any reference to the product category it is assigned to.

WooCommerce appears to include some very basic functionality for this but it appears to only work well for single word product categories, not taking into account multiple word product categories and multiple word categories where the words are typed in a different order to the product category name.

= Example =

You have a product called "ABC Hanging Scale" in a "Crane Scales" product category and the product's title, description, etc does not contain any reference to it being a crane scale then when a customer searches for "crane scales", "crane scale", "scale crane", etc this product would not be returned in the results.

This plugin will automatically redirect any search query which matches a product category to the product category itself - showing all the products related to that query instead of just the products which contain a reference to the category name in the title and description.

= Settings =

There are no settings to configure for this plugin, just install and activate it, once done when you search for a term matching a product category name you will be redirected to the category page.

You just need to ensure WooCommerce is also installed and activated and you are using the standard WooCommerce product search. This will be the case unless you have installed another search plugin and/or your theme has replaced the standard product search. You can test this by searching for a product on your store. If the URL ends with something like `?s=your-search-term&post_type=product` then this is the standard product search.

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

= 1.1.0 - 2022-03-23 =

* Added: wcpscr_product_search_category_translation function
* Added: WooCommerce not installed/activated notice
* Changed: WordPress tested up to 5.9.2
* Fixed: Translations (if included in future) may not load due to load_plugin_textdomain not hooked on init

= 1.0.1 - 2021-05-27 =

* Added: Check for empty product categories before attempting redirect
* Changed: Plugin headers and readme

= 1.0.0 - 2021-05-25 =

* Initial release
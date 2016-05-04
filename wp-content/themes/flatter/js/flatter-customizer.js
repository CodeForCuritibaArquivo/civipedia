/**
 * Customizer custom js
 */

jQuery(document).ready(function() {
   jQuery('.wp-full-overlay-sidebar-content').prepend('<div class="flatter-ads"> <a href="http://oceanwebthemes.com/webthemes/flatter-plus-premium-wordpress-theme/" class="button" target="_blank">{pro}</a></div>'.replace('{pro}',flatter_customizer_js_obj.pro));
});
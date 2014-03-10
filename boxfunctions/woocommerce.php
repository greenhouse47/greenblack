<?php
/**
 * Name: Woocommerce Functions
 * GitHub URI: https://github.com/greenhouse47
 * Description: Compatible for Woocommerce Plugin
 * Author: Albert Sukmono
 * Twitter: @greenbox_id
 * Author website: http://www.greenboxindonesia.com
 */

add_action('woocommerce_after_order_notes', 'my_custom_checkout_field');

function my_custom_checkout_field( $checkout ) {

    echo '<div id="my_custom_checkout_field"><h2>'.__('Nama Domain').'</h2>';

    woocommerce_form_field( 'my_field_name', array(
        'type'          => 'text',
	'required'    => true,
        'class'         => array('my-field-class form-row-wide'),
        'label'         => __('Isi nama domain yang sudah Anda check ketersediaanya sebelumnya.'),
        'placeholder'       => __('Example: www.malang.hmi.or.id'),
        ), $checkout->get_value( 'my_field_name' ));

    echo '</div>';

}
/**
 * Process the checkout
 **/
add_action('woocommerce_checkout_process', 'my_custom_checkout_field_process');

function my_custom_checkout_field_process() {
    global $woocommerce;

    // Check if set, if its not set add an error.
    if (!$_POST['my_field_name'])
         $woocommerce->add_error( __('Silahkan isi Nama Domain yang Anda inginkan.') );
}
/**
 * Update the order meta with field value
 **/
add_action('woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta');

function my_custom_checkout_field_update_order_meta( $order_id ) {
    if ($_POST['my_field_name']) update_post_meta( $order_id, 'Nama Domain', esc_attr($_POST['my_field_name']));
}
/**
 * Display field value on the order edition page
 **/
add_action( 'woocommerce_admin_order_data_after_billing_address', 'my_custom_checkout_field_display_admin_order_meta', 10, 1 );
 
function my_custom_checkout_field_display_admin_order_meta($order){
    echo '<p><strong>'.__('Nama Domain').':</strong> ' . $order->order_custom_fields['Nama Domain'][0] . '</p>';
}
// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
 
function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	
	ob_start();
	
	?>
	<a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
	<?php
	
	$fragments['a.cart-contents'] = ob_get_clean();
	
	return $fragments;
	
}
?>

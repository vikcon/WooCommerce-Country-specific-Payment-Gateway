<?php   
function vikcon_payment_gateway_disable_country( $available_gateways ) {
    if ( is_admin() ) return $available_gateways;
    
    /* Disable Paypal in India */
    if ( isset( $available_gateways['paypal'] ) && WC()->customer->get_billing_country() == 'IN' ) {
            unset( $available_gateways['paypal'] );
    }

    /* Disable Indian gateway outside India */
    if ( isset( $available_gateways['instamojo'] ) && WC()->customer->get_billing_country() <> 'IN' ) {
            unset( $available_gateways['instamojo'] );
    }
    
    return $available_gateways;
}

add_filter( 'woocommerce_available_payment_gateways', 'vikcon_payment_gateway_disable_country' );
?>

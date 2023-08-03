<?php

$pagePath = explode('/wp-content/', dirname(__FILE__));
include_once(str_replace('wp-content/' , '', $pagePath[0] . '/wp-load.php'));


global $theme_option;

	// Response from Paypal

	// read the post from PayPal system and add 'cmd'
	$body_fields = 'cmd=_notify-validate';
	foreach ($_REQUEST as $key => $value) {
		$value = urlencode(stripslashes($value));
		$value = preg_replace('/(.*[^%^0^D])(%0A)(.*)/i','${1}%0D%0A${3}',$value);// IPN fix
		$body_fields .= "&$key=$value";
	}
	
	$req = array(
		'method' => 'POST',
		'timeout' => 45,
		'redirection' => 5,
		'httpversion' => '1.0',
		'blocking' => true,
		'headers' => array(),
		'cookies' => array(),
		'body' =>  $body_fields );
	
	if($theme_option['register_environment'] == '1'){
		$paypal_url= "https://www.paypal.com/cgi-bin/webscr";
	}else{
		$paypal_url= "https://www.sandbox.paypal.com/cgi-bin/webscr";
	}
	$res = wp_remote_post( $paypal_url, $req );
	
	if ( $res['body'] == 'VERIFIED' ) {
		global $wpdb;

		$wpdb->update(
			'imevent_payments', 
			array(
				'price' 		=> $_REQUEST['mc_gross'],
				'currency' 		=> $_REQUEST['mc_currency'],
				'status'		=> $_REQUEST['payment_status'],
				'payment_type'	=> '',
				'transaction_id' => $_REQUEST['txn_id'],
				'sumary'	=> ''
			), 
			array( 'order_id' => $_REQUEST['custom']), 
			array(
				'%s',
				'%s',
				'%s',
				'%s',
				'%s',
				'%s'
			)			
		);

		$results = $wpdb->get_results( "SELECT * FROM `imevent_payments` where status = 'Completed' and order_id = '".$_REQUEST['custom']."' ORDER BY `ID` DESC");	

	   	$body_email = str_replace('[orderid]',$results['0']->order_id, $theme_option['register_patter_template_paypal']);
    	$body_email = str_replace('[transaction_id]', $results['0']->transaction_id, $body_email);
    	$body_email = str_replace('[price]', $results['0']->price, $body_email);
    	$body_email = str_replace('[currency]', $results['0']->currency, $body_email);
    	$body_email = str_replace('[status]', $results['0']->status, $body_email);
    	$body_email = str_replace('[date]', date(get_option('date_format'), $results['0']->created), $body_email);
    	$body_email = str_replace('[userinfo]', html_entity_decode(str_replace('|||','',$results['0']->buyer_info)), $body_email);

		
		$multiple_to_recipients = array($theme_option['register_email_paypal'], $results['0']->buyer_email);	  	

		$subject = $theme_option['register_patter_template_free_subject'];
        $body 	 = $body_email;
        $headers = __('From website', 'imevent') . $theme_option['register_email_paypal']. "\r\n";
        $headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=".get_bloginfo( 'charset' )."\r\n";
                              
        add_filter( 'wp_mail_from', 'register_wp_mail_from' );
        add_filter( 'wp_mail_from_name', 'register_wp_mail_from_name' );
                          
        wp_mail($multiple_to_recipients, $subject, $body, $headers);

        remove_filter( 'wp_mail_from', 'register_wp_mail_from' );
        remove_filter( 'wp_mail_from_name', 'register_wp_mail_from_name' );
		
		if(DEBUG == true) {
			error_log(date('[Y-m-d H:i e] '). "Verified IPN:  ".$res['body']. PHP_EOL, 3, LOG_FILE);
		}		
	} else {
		// log for manual investigation
		// Add business logic here which deals with invalid IPN messages
		$emailTo = $_REQUEST['payer_email'];
        $subject = _e('Error Pay', 'imevent'); 
        $body 	 = _e('Error Order', 'imevent');

		wp_mail($emailTo, $subject, $body);

		if(DEBUG == true) {
			error_log(date('[Y-m-d H:i e] '). "Invalid IPN: " .$body_fields. PHP_EOL, 3, LOG_FILE);
		}
		return false;
	}

?>
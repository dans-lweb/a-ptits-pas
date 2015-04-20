<?php
/**
 *  PHP-PayPal-IPN Example
 *
 *  This shows a basic example of how to use the IpnListener() PHP class to
 *  implement a PayPal Instant Payment Notification (IPN) listener script.
 *
 *  For a more in depth tutorial, see my blog post:
 *  http://www.micahcarrick.com/paypal-ipn-with-php.html
 *
 *  This code is available at github:
 *  https://github.com/Quixotix/PHP-PayPal-IPN
 *
 *  @package    PHP-PayPal-IPN
 *  @author     Micah Carrick
 *  @copyright  (c) 2011 - Micah Carrick
 *  @license    http://opensource.org/licenses/gpl-3.0.html
 *  @modified    Muhammad Saqib Sarwar - saqib@inspirythemes.com
 */


/*
Since this script is executed on the back end between the PayPal server and this
script, you will want to log errors to a file or email. Do not try to use echo
or print--it will not work! 

Here I am turning on PHP error logging to a file called "ipn_errors.log". Make
sure your web server has permissions to write to that file. In a production 
environment it is better to have that log file outside of the web root.
*/

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

ini_set('log_errors', true);
ini_set('error_log', dirname(__FILE__).'/ipn_errors.log');

/* Get Payments Related Theme Options */
$paypal_merchant_id = ale_get_option('merchant_email');
$enable_sandbox = ale_get_option('enable_sandbox');
$disable_ssl = ale_get_option('ssl_disable');
$valid_ipn_email = ale_get_option('merchant_verified_email');
$invalid_ipn_email = ale_get_option('merchant_invalid_email');
$publish_on_payment = ale_get_option('paypal_auto_publish');


// instantiate the IpnListener class
include('ipnlistener.php');
$listener = new IpnListener();


/*
When you are testing your IPN script you should be using a PayPal "Sandbox"
account: https://developer.paypal.com
When you are ready to go live change use_sandbox to false.
*/
if( $enable_sandbox == "1" ){
	$listener->use_sandbox = true;
}


/*
By default the IpnListener object is going  going to post the data back to PayPal
using cURL over a secure SSL connection. This is the recommended way to post
the data back, however, some people may have connections problems using this
method. 

To post over standard HTTP connection, use:*/

if( $disable_ssl == "1" ){
	$listener->use_ssl = false;
} else {
/*
To post using the fsockopen() function rather than cURL, use:
$listener->use_curl = false;
*/

	$listener->use_curl = false;
}




/*
The processIpn() method will encode the POST variables sent by PayPal and then
POST them back to the PayPal server. An exception will be thrown if there is 
a fatal error (cannot connect, your server is not configured properly, etc.).
Use a try/catch block to catch these fatal errors and log to the ipn_errors.log
file we setup at the top of this file.

The processIpn() method will send the raw data on 'php://input' to PayPal. You
can optionally pass the data to processIpn() yourself:
$verified = $listener->processIpn($my_post_data);
*/
try {
	$listener->requirePostMethod();
	$verified = $listener->processIpn();
} catch (Exception $e) {
	error_log($e->getMessage());
	exit(0);
}


/*
The processIpn() method returned true if the IPN was "VERIFIED" and false if it
was "INVALID".
*/


//define the headers we want passed. Note that they are separated with \r\n
// $headers = "From: webmaster@example.com\r\nReply-To: webmaster@example.com";

/*
* $from = "webmaster@example.com";
* $headers = "From: " . $from . "\r\nReply-To: " . $from . "\r\n";
*/

$headers = "Content-type: text/html\r\n";


if ($verified) {

	/*
	Once you have a verified IPN you need to do a few more checks on the POST
	fields--typically against data you stored in your database during when the
	end user made a purchase (such as in the "success" page on a web payments
	standard button). The fields PayPal recommends checking are:
	
		1. Check the $_POST['payment_status'] is "Completed"
		2. Check that $_POST['txn_id'] has not been previously processed 
		3. Check that $_POST['receiver_email'] is your Primary PayPal email 
		4. Check that $_POST['payment_amount'] and $_POST['payment_currency'] 
		   are correct
	
	Since implementations on this varies, I will leave these checks out of this
	example and just send an email using the getTextReport() method to get all
	of the details about the IPN.  
	*/

	if( $_POST['payment_status'] == "Completed" ){

		if( $_POST['business'] == $paypal_merchant_id ){

			if( isset($_POST['item_number']) && (!empty($_POST['item_number'])) ){

				$causes_id = intval($_POST['item_number']);
				$causes = get_post($causes_id, 'ARRAY_A');
				$payment_amount   = intval($_POST['mc_gross']);

				if( $causes ){
					$current_donated = 0;
					$current_donors = 0;

					if(ale_get_meta('causesdonated', true, $causes_id)){
						$current_donated = intval(ale_get_meta('causesdonated', true, $causes_id));
					}
					if(ale_get_meta('causesdonors', true, $causes_id)){
						$current_donors = intval(ale_get_meta('causesdonors', true, $causes_id));
					}

                    //Add the amount to total
					if(isset($payment_amount)&&(!empty($payment_amount))){
						$current_donated = $current_donated + $payment_amount;
						$current_donors++;
						update_post_meta($causes_id, 'ale_causesdonated', $current_donated);
						update_post_meta($causes_id, 'ale_causesdonors', $current_donors);
					}

					//Save Stats in Meta
					$old = get_post_meta($causes_id, 'ale_paypal_details', true);
					$new = array();

					if( isset($_POST['txn_id']) && (!empty($_POST['txn_id'])) ){
						$txn_id = $_POST['txn_id'];
					} else {$txn_id = '';}

					if( isset($_POST['payment_date']) && (!empty($_POST['payment_date'])) ){
						$payment_date = $_POST['payment_date'];
					} else {$payment_date ='';}

					if( isset($_POST['payer_email']) && (!empty($_POST['payer_email'])) ){
						$payer_email = $_POST['payer_email'];
					}else { $payer_email = ''; }

					if( isset($_POST['first_name']) && (!empty($_POST['first_name'])) ){
						$first_name = $_POST['first_name'];
					} else {$first_name = '';}

					if( isset($_POST['last_name']) && (!empty($_POST['last_name'])) ){
						$last_name = $_POST['last_name'];
					} else {$last_name = '';}

					if( isset($_POST['payment_status']) && (!empty($_POST['payment_status'])) ){
						$payment_status = $_POST['payment_status'];
					}else {$payment_status = '';}

					if( isset($_POST['payment_gross']) && (!empty($_POST['payment_gross'])) ){
						$payment_gross = $_POST['payment_gross'];
					}else {$payment_gross = '';}

					if( isset($_POST['mc_currency']) && (!empty($_POST['mc_currency'])) ){
						$mc_currency = $_POST['mc_currency'];
					}else {$mc_currency = '';}

					$i = count($old);
					$new[$i]['ale_txn_id'] = stripslashes( strip_tags( $txn_id ) );
					$new[$i]['ale_payment_date'] = stripslashes( $payment_date );
					$new[$i]['ale_payer_email'] = stripslashes( $payer_email );
					$new[$i]['ale_first_name'] = stripslashes( $first_name );
					$new[$i]['ale_last_name'] = stripslashes( $last_name );
					$new[$i]['ale_payment_status'] = stripslashes( $payment_status );
					$new[$i]['ale_payment_gross'] = stripslashes( $payment_gross );
					$new[$i]['ale_mc_currency'] = stripslashes( $mc_currency );

					$ale_result = array_merge($old, $new);
					update_post_meta( $causes_id, 'ale_paypal_details', $ale_result );

					error_log( "SUCCESS: ".$_POST['txn_id'] );

				}else{
					error_log( "Target causes id do not reside in database." );
				}

			}

		}else{
			error_log( "Mismatched business address => Expected: $paypal_merchant_id - Recieved: ".$_POST['business'] );
		}
	}else{

		error_log( "Mismatched Payment Status => Expected: Completed - Recieved: ".$_POST['payment_status'] );
	}

	wp_mail( $valid_ipn_email, 'Verified IPN', $listener->getTextReport(), $headers );

} else {
	/*
	An Invalid IPN *may* be caused by a fraudulent transaction attempt. It's
	a good idea to have a developer or sys admin manually investigate any 
	invalid IPN.
	*/
	wp_mail( $invalid_ipn_email, 'Invalid IPN', $listener->getTextReport(), $headers );
}

?>

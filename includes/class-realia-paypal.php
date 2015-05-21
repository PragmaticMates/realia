<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require REALIA_DIR . 'libraries/PayPal-PHP-SDK/vendor/autoload.php';

use PayPal\Api\Amount;
use PayPal\Api\CreditCard;
use PayPal\Api\Details;
use PayPal\Api\FundingInstrument;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;


/**
 * Class Realia_PayPal
 *
 * @class Realia_PayPal
 * @package Realia/Classes
 * @author Pragmatic Mates
 */
class Realia_PayPal {
    /**
     * Initialize PayPal functionality
     *
     * @access public
     * @return void
     */
    public static function init() {
        add_action( 'init', array( __CLASS__, 'process_payment' ), 9999 );
        add_action( 'init', array( __CLASS__, 'process_result' ), 9999 );
    }

    /**
     * Process payment form
     *
     * @access public
     * @return void
     */
    public static function process_payment() {
        if ( ! isset( $_POST['process-payment'] ) ) {
            return;
        }

        $payment = ! empty( $_POST['payment'] ) ? $_POST['payment'] : null;

        $settings = array(
            'payment_type'  => ! empty( $_POST['payment_type'] ) ? $_POST['payment_type'] : '',
            'object_id'  	=> ! empty( $_POST['object_id'] ) ? $_POST['object_id'] : '',
            'first_name'    => ! empty( $_POST['first_name'] ) ? $_POST['first_name'] : '',
            'last_name'     => ! empty( $_POST['last_name'] ) ? $_POST['last_name'] : '',
            'card_number'   => ! empty( $_POST['card_number'] ) ? $_POST['card_number'] : '',
            'cvv'           => ! empty( $_POST['cvv'] ) ? $_POST['cvv'] : '',
            'expires_month' => ! empty( $_POST['expires_month'] ) ? $_POST['expires_month'] : '',
            'expires_year'  => ! empty( $_POST['expires_year'] ) ? $_POST['expires_year'] : '',
        );

        switch ( $payment ) {
            case 'paypal-credit-card':
                if ( empty( $_POST['first_name']) ) {
                    $_SESSION['messages'][] = array( 'danger', __( 'First name is required.', 'realia' ) );
                    break;
                }

                if ( empty( $_POST['last_name']) ) {
                    $_SESSION['messages'][] = array( 'danger', __( 'Last name is required.', 'realia' ) );
                    break;
                }

                if ( empty( $_POST['card_number']) ) {
                    $_SESSION['messages'][] = array( 'danger', __( 'Card number is required.', 'realia' ) );
                    break;
                }

                if ( empty( $_POST['cvv']) ) {
                    $_SESSION['messages'][] = array( 'danger', __( 'CVV is required.', 'realia' ) );
                    break;
                }

                if ( empty( $_POST['expires_month']) ) {
                    $_SESSION['messages'][] = array( 'danger', __( 'Expires month is required.', 'realia' ) );
                    break;
                }

                if ( empty( $_POST['expires_year']) ) {
                    $_SESSION['messages'][] = array( 'danger', __( 'Expires year is required.', 'realia' ) );
                    break;
                }

                if ( ! self::validate_card_number( $_POST['card_number'] ) ){
                    $_SESSION['messages'][] = array( 'danger', __( 'Credit card number is not valid.', 'realia' ) );
                    break;
                }

                if ( ! self::validate_cvv( $_POST['cvv'] ) ){
                    $_SESSION['messages'][] = array( 'danger', __( 'CVV number is not valid.', 'realia' ) );
                    break;
                }

                $result = self::process_credit_card( $settings );

                if ( ! empty( $result->state ) && $result->state == 'approved' ) {
                    $url = self::get_paypal_process_url( get_current_user_id(), $settings['payment_type'], $settings['object_id'] );
                    wp_redirect( $url );
                }

                break;
            case 'paypal-account':
                echo self::get_link( $settings ); die;
                break;
        }
    }

    /**
     * Process payment result
     *
     * @access public
     * @return void
     */
    public static function process_result() {
        if ( ! empty( $_GET['success'] ) && ! empty( $_GET['user_id'] ) && ! empty( $_GET['payment_type'] ) && ! empty( $_GET['object_id'] ) ) {
            if ( $_GET['success'] == 'true' ) {
                $post = get_post( $_GET['object_id'] );

                switch ( $_GET['payment_type'] ) {
                    case 'pay_for_featured':
                        update_post_meta( $post->ID, REALIA_PROPERTY_PREFIX . 'featured', 'on' );
                        $_SESSION['messages'][] = array( 'success', __( 'Property has been featured.', 'realia' ) );
                        break;
                    case 'pay_for_sticky':
                        update_post_meta( $post->ID, REALIA_PROPERTY_PREFIX . 'sticky', 'on' );
                        $_SESSION['messages'][] = array( 'success', __( 'Property has been sticked.', 'realia' ) );
                        break;
                    case 'pay_per_post':
                        $review_before = get_theme_mod( 'realia_submission_review_before', false );

                        if ( ! $review_before ) {
                            wp_publish_post( $post->ID );
                            $_SESSION['messages'][] = array( 'success', __( 'Property has been published.', 'realia' ) );
                        } else {
                            $_SESSION['messages'][] = array( 'success', __( 'Property will be published after review.', 'realia' ) );
                        }

                        break;
                    case 'package':
                        Realia_Packages::set_package_for_user( get_current_user_id(), $post->ID);
                        $_SESSION['messages'][] = array( 'success', __( 'Package has been upgraded.', 'realia' ) );
                        break;
                    default:
                        $_SESSION['messages'][] = array( 'danger', __( 'Undefined payment type.', 'realia' ) );
                        wp_redirect( site_url() );
                        exit();
                }

                $transaction_id = wp_insert_post( array(
                    'post_type'     => 'transaction',
                    'post_title'    => date( get_option( 'date_format' ), strtotime( 'today' ) ),
                    'post_status'   => 'publish',
                    'post_author'   => $_GET['user_id'],
                ) );

                $object = array(
                    'success'           => $_GET['success'],
                    'price'             => $_GET['price'],
                    'price_formatted'   => $_GET['price_formatted'],
                    'currency_code'     => $_GET['code'],
                    'currency_sign'     => $_GET['sign'],
                );

                if ( ! empty( $_GET['paymentId'] ) ) {
                    $object['paymentId'] = $_GET['paymentId'];
                    $object['token'] = $_GET['token'];
                    $object['PayerID'] = $_GET['PayerID'];
                    $object['gateway'] = 'PayPal Account';
                } else {
                    $object['gateway'] = 'PayPal Credit Card';
                }

                update_post_meta( $transaction_id, REALIA_TRANSACTION_PREFIX . 'object', serialize( $object ) );
                update_post_meta( $transaction_id, REALIA_TRANSACTION_PREFIX . 'object_id', $_GET['object_id'] );
                update_post_meta( $transaction_id, REALIA_TRANSACTION_PREFIX . 'payment_type', $_GET['payment_type'] );

                $_SESSION['messages'][] = array(
                    'success', __( 'Payment has been successfull.', 'realia' )
                );
            } else {
                $_SESSION['messages'][] = array(
                    'danger', __( 'Error processing payment.', 'realia' )
                );
            }
            wp_redirect( site_url() );
            exit();
        }
    }

    /**
     * Gets PayPal results
     *
     * @access public
     * @return Object|bool
     */
    public static function get_paypal_context() {
        $client_id = get_theme_mod( 'realia_paypal_client_id', null );
        $client_secret = get_theme_mod( 'realia_paypal_client_secret', null );

        if ( empty( $client_id ) || empty( $client_secret ) ) {
            return false;
        }

        $apiContext = new ApiContext( new OAuthTokenCredential( $client_id, $client_secret ) );

	    $live = get_theme_mod( 'realia_paypal_live', false );
	    if ( $live == "1" ) {
		    $apiContext->setConfig( array( 'mode' => 'live' ) );
	    } else {
		    $apiContext->setConfig( array( 'mode' => 'sandbox' ) );
	    }

        return $apiContext;
    }

    /**
     * Gets redirect URL
     *
     * @access public
     * @param int $user_id
     * @param string $payment_type
     * @param int $object_id
     * @return string
     */
    public static function get_paypal_process_url( $user_id, $payment_type, $object_id ) {
        $data = self::get_data( $payment_type, $object_id );
        $url = sprintf( '%s?success=true&payment_type=%s&object_id=%s&user_id=%s&price=%s&code=%s&sign=%s&price_formatted=%s',
            site_url(), $payment_type, $object_id, $user_id, urlencode( $data['price'] ), urlencode( $data['currency_code']) , urlencode( $data['currency_sign'] ), urlencode( $data['price_formatted'] )
        );

        return $url;
    }

    /**
     * Process credit card payment
     *
     * @access public
     * @param array $settings
     * @return Exception|Payment
     */
    public static function process_credit_card( array $settings ) {
        $data = self::get_data( $settings['payment_type'], $settings['object_id'] );

        $card = new CreditCard();
        $card->setType( self::get_credit_card_type( $settings['card_number'] ) )
            ->setNumber( $settings['card_number'] )
            ->setExpireMonth( $settings['expires_month'] )
            ->setExpireYear( $settings['expires_year'] )
            ->setCvv2( $settings['cvv'] )
            ->setFirstName( $settings['first_name'] )
            ->setLastName( $settings['last_name'] );

        $fi = new FundingInstrument();
        $fi->setCreditCard( $card );

        $payer = new Payer();
        $payer->setPaymentMethod( 'credit_card' )
            ->setFundingInstruments( array( $fi ) );

        $item = new Item();
        $item->setName( $data['title'] )
            ->setDescription( $data['description'] )
            ->setCurrency( $data['currency_code'] )
            ->setQuantity( 1 )
            ->setPrice( $data['price'] );

        $item_list = new ItemList();
        $item_list->setItems( array( $item, ) );

        $details = new Details();
        $details->setSubtotal( $data['price'] );

        $amount = new Amount();
        $amount->setCurrency( $data['currency_code'] )
            ->setTotal( $data['price'] )
            ->setDetails( $details );

        $transaction = new Transaction();
        $transaction->setAmount( $amount )
            ->setItemList($item_list)
            ->setDescription( $data['description'] )
            ->setInvoiceNumber( uniqid() );

        $payment = new Payment();
        $payment->setIntent( 'sale' )
            ->setPayer( $payer )
            ->setTransactions( array( $transaction ) );

        try {
            $api_context = self::get_paypal_context();
            $payment->create( $api_context );
            $_SESSION['alerts'][] = array( 'success', __( 'Payment has been successful.', 'realia' ) );

            return $payment;
        } catch (Exception $ex) {
            $_SESSION['alerts'][] = array( 'danger', __( 'There was an error processing payment.', 'realia' ) );
            return $ex;
        }
    }

    /**
     * Gets link for account payment
     *
     * @access public
     * @param array $settings
     * @return null
     */
    public static function get_link( array $settings ) {
        $payer = new Payer();
        $payer->setPaymentMethod( 'paypal' );

        $data = self::get_data( $settings['payment_type'], $settings['object_id'] );

        $item = new Item();
        $item->setName( $data['title'] )
            ->setDescription( $data['description'] )
            ->setCurrency( $data['currency_code'] )
            ->setQuantity( 1 )
            ->setPrice( $data['price'] );

        $item_list = new ItemList();
        $item_list->setItems( array($item, ) );

        $details = new Details();
        $details->setSubtotal( $data['price'] );

        $amount = new Amount();
        $amount->setCurrency( $data['currency_code'] )
            ->setTotal( $data['price'] )
            ->setDetails( $details );

        $transaction = new Transaction();
        $transaction->setAmount( $amount )
            ->setItemList( $item_list )
            ->setDescription( $data['description'])
            ->setInvoiceNumber( uniqid() );

        $redirectUrls = new RedirectUrls();
        $url = self::get_paypal_process_url( get_current_user_id(), $settings['payment_type'], $settings['object_id'] );
        $redirectUrls->setReturnUrl( $url )
            // TODO: complete cancellation
            ->setCancelUrl( plugins_url() . '/realestate/includes/paypal-payment.php?success=false&payment_type=' . $settings['payment_type'] . '&object_id=' . $settings['object_id'] . '&user_id=' . get_current_user_id() );

        $payment = new Payment();
        $payment->setIntent( 'sale' )
            ->setPayer( $payer )
            ->setRedirectUrls( $redirectUrls )
            ->setTransactions( array( $transaction ) );

        try {
            $api_context = self::get_paypal_context();
            $payment->create( $api_context );
        } catch (Exception $ex) {
            var_dump($ex); die;
            return null;
        }

        foreach ( $payment->getLinks() as $link ) {
            if ( $link->getRel() == 'approval_url' ) {
                wp_redirect( $link->getHref() );
                exit();
            }
        }

        return null;
    }

    /**
     * Prepares payment data
     *
     * @access public
     * @param $payment_type
     * @param $object_id
     * @return array|bool
     */
    public static function get_data( $payment_type, $object_id ) {
        $data = array();
        $post = get_post( $object_id );
        $currencies = get_theme_mod( 'realia_currencies', array() );

        if ( ! empty( $currencies ) && is_array( $currencies ) ) {
            $currency = array_shift( $currencies );
            $currency_code = $currency['code'];
            $currency_sign = $currency['symbol'];
        } else {
            $currency_code = 'USD';
            $currency_sign = '$';
        }

        switch ( $payment_type ) {
            case 'pay_for_featured':
                $price = get_theme_mod( 'realia_submission_featured_price' );
                $data = array(
                    'title'             => __( 'Feature property', 'realia' ),
                    'description'       => sprintf( __( 'Feature property %s', 'realia' ), $post->post_title ),
                    'price'             => $price,
                    'price_formatted'   => Realia_Price::format_price( $price ),
                    'currency_code'     => $currency_code,
                    'currency_sign'     => $currency_sign,
                );
                break;
            case 'pay_for_sticky':
                $price = get_theme_mod( 'realia_submission_sticky_price' );

                $data = array(
                    'title'             => __( 'Sticky property', 'realia' ),
                    'description'       => sprintf( __( 'Sticky property %s', 'realia' ), $post->post_title ),
                    'price'             => $price,
                    'price_formatted'   => Realia_Price::format_price( $price ),
                    'currency_code'     => $currency_code,
                    'currency_sign'     => $currency_sign,
                );
                break;
            case 'pay_per_post':
                $price = get_theme_mod( 'realia_submission_pay_per_post_price' );
                $data = array(
                    'title'             => __( 'Publish property', 'realia' ),
                    'description'       => sprintf( __( 'Publish property %s', 'realia' ), $post->post_title ),
                    'price'             => $price,
                    'price_formatted'   => Realia_Price::format_price( $price ),
                    'currency_code'     => $currency_code,
                    'currency_sign'     => $currency_sign,
                );
                break;
            case 'package':
                $price = get_post_meta( $object_id, REALIA_PACKAGE_PREFIX . 'price', true );

                $data = array(
                    'title'             => __( 'Purchase package', 'realia' ),
                    'description'       => sprintf( __( 'Upgrade package to %s', 'realia' ), $post->post_title ),
                    'price'             => $price,
                    'price_formatted'   => Realia_Price::format_price( $price ),
                    'currency_code'     => $currency_code,
                    'currency_sign'     => $currency_sign,
                );
                break;
            default:
                return false;
        }

        return $data;
    }

    /**
     * Checks if PayPal is active
     *
     * @access public
     * @return bool
     */
    public static function is_active() {
        $paypal_client_id = get_theme_mod( 'realia_paypal_client_id', null );
        $paypal_client_secret = get_theme_mod( 'realia_paypal_client_secret', null );

        if ( ! empty( $paypal_client_id) && ! empty( $paypal_client_secret ) ) {
            return true;
        }

        return false;
    }

    /**
     * Validates card number
     *
     * @access public
     * @param $number
     * @return bool
     */
    public static function validate_card_number( $number ) {
        // Strip any non-digits (useful for credit card numbers with spaces and hyphens)
        $number = preg_replace( '/\D/', '', $number );

        // Set the string length and parity
        $number_length = strlen( $number );
        $parity = $number_length % 2;

        // Loop through each digit and do the maths
        $total = 0;
        for ( $i = 0; $i < $number_length; $i++ ) {
            $digit = $number[$i];

            // Multiply alternate digits by two
            if ( $i % 2 == $parity ) {
                $digit *= 2;

                // If the sum is two digits, add them together (in effect)
                if ($digit > 9) {
                    $digit -= 9;
                }
            }

            // Total up the digits
            $total += $digit;
        }

        return ( $total % 10 == 0 ) ? true : false;
    }

    /**
     * Validates CVV
     *
     * @access public
     * @param $cvv
     * @return bool
     */
    public static function validate_cvv( $cvv ) {
        if ( strlen( $cvv ) == 3 || strlen( $cvv ) == 4) {
            return true;
        }

        return false;
    }

    /**
     * Gets credit card type
     *
     * @access public
     * @param $number
     * @return bool|int|string
     */
    public static function get_credit_card_type( $number ) {
        if ( empty( $number ) ) {
            return false;
        }

        $matchingPatterns = array(
            'visa'          => '/^4[0-9]{12}(?:[0-9]{3})?$/',
            'mastercard'    => '/^5[1-5][0-9]{14}$/',
            'amex'          => '/^3[47][0-9]{13}$/',
            'diners'        => '/^3(?:0[0-5]|[68][0-9])[0-9]{11}$/',
            'discover'      => '/^6(?:011|5[0-9]{2})[0-9]{12}$/',
            'jcb'           => '/^(?:2131|1800|35\d{3})\d{11}$/',
        );

        foreach ( $matchingPatterns as $key => $pattern ) {
            if ( preg_match( $pattern, $number ) ) {
                return $key;
            }
        }

        return false;
    }

    /**
     * Returns supported currencies by PayPal listed here:
     *
     * @access public
     * @param string $payment
     * @see https://developer.paypal.com/docs/integration/direct/rest_api_payment_country_currency_support/
     * @return array
     */
    public static function get_supported_currencies( $payment ) {
        if ( $payment == 'account' ) {
            return array("AUD", "BRL", "CAD", "CZK", "DKK", "EUR", "HKD", "HUF", "ILS", "JPY", "MYR", "MXN", "TWD", "NZD", "NOK", "PHP", "PLN", "GBP", "SGD", "SEK", "CHF", "THB", "TRY", "USD");
        }

        if ( $payment == 'card' ) {
            return array("USD", "GBP", "CAD", "EUR", "JPY");
        }

        return array();
    }
}

Realia_PayPal::init();
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PayPalPaymentGuest extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->library('session');
        $this->load->model('User_model');
        $session_user = $this->session->userdata('logged_in');
        if ($session_user) {
            $this->user_id = $session_user['login_id'];
        } else {
            $this->user_id = 0;
        }

        $this->checklogin = $this->session->userdata('logged_in');
        $this->user_id = $this->checklogin ? $this->checklogin['login_id'] : 0;
        $query = $this->db->get('configuration_site');
        $siteconfiguration = $query->row();
    }

    public function process() {
        $paymentmathod = "PayPal";
        $PayPalMode = ''; // sandbox or live
        $PayPalApiUsername = paypal_api_username; //PayPal API Username
        $PayPalApiPassword = paypal_api_password; //Paypal API password
        $PayPalApiSignature = paypal_api_signature; //Paypal API Signature
        $PayPalCurrencyCode = paypal_api_currency_code; //Paypal Currency Code
        $data = [];
        if ($this->checklogin) {
            $session_cart = $this->Product_model->cartData($this->user_id);
        } else {
            $session_cart = $this->Product_model->cartData();
        }
        $PayPalReturnURL = site_url("PayPalPaymentGuest/success");
        $PayPalCancelURL = site_url("PayPalPaymentGuest/cancel");

        $paypaldata = "";
        $products = $session_cart['products'];
        $total_amt = $session_cart['total_price'];
        $total_amt = $session_cart['total_price'];
        $sub_total_price = $session_cart['sub_total_price'];
        $countitem = 0;
        foreach ($products as $keyp => $valuep) {
            $ItemNumber = $valuep['sku'];
            $ItemName = $valuep['item_name'];
            $ItemDesc = $valuep['title'];
            $ItemPrice = $valuep['price'];
            $ItemQty = $valuep['quantity'];
            $paypaldata .= '&L_PAYMENTREQUEST_0_NAME' . $countitem . '=' . urlencode($ItemName) .
                    '&L_PAYMENTREQUEST_0_NUMBER' . $countitem . '=' . urlencode($ItemNumber) .
                    '&L_PAYMENTREQUEST_0_AMT' . $countitem . '=' . urlencode($ItemPrice) .
                    '&L_PAYMENTREQUEST_0_QTY' . $countitem . '=' . urlencode($ItemQty);
            $countitem++;
        }

//        $discountcalculate = $total_amt - 0.01;
//
//        $total_amt = $total_amt - $discountcalculate;
//        $total_amt = number_format($total_amt, 2, '.', '');
//
        $session_coupon = $this->session->userdata('session_coupon');
        if (isset($session_coupon["has_coupon"]) && $session_coupon["has_coupon"]) {
            
            $sub_total_price = $sub_total_price - $session_cart["discount"];
            $sub_total_price = round($sub_total_price, 2);
            $paypaldata .= '&L_PAYMENTREQUEST_0_NAME' . $countitem . '=' . urlencode($session_cart["coupon"]) .
                    '&L_PAYMENTREQUEST_0_NUMBER' . $countitem . '=' . urlencode($session_cart["coupon_code"]) .
                    '&L_PAYMENTREQUEST_0_AMT' . $countitem . '=-' . urlencode($session_cart["discount"]) .
                    '&L_PAYMENTREQUEST_0_QTY' . $countitem . '=' . urlencode(1);
        }

        $setexpresscheckout = '&METHOD=SetExpressCheckout' .
                '&PAYMENTREQUEST_0_PAYMENTACTION=' . urlencode("SALE") .
                '&RETURNURL=' . urlencode($PayPalReturnURL) .
                '&CANCELURL=' . urlencode($PayPalCancelURL);
        $isShipping = $session_cart["shipping_price"] ? 1 : 0;
        $paypaldata .= '&NOSHIPPING=' . $isShipping . '&PAYMENTREQUEST_0_ITEMAMT=' . urlencode($sub_total_price) .
                '&PAYMENTREQUEST_0_TAXAMT=' . urlencode('0') .
                '&PAYMENTREQUEST_0_SHIPPINGAMT=' . urlencode($session_cart["shipping_price"]) .
                '&PAYMENTREQUEST_0_HANDLINGAMT=' . urlencode('0') .
                '&PAYMENTREQUEST_0_SHIPDISCAMT=' . urlencode('0') .
                '&PAYMENTREQUEST_0_INSURANCEAMT=' . urlencode('0') .
                '&PAYMENTREQUEST_0_AMT=' . urlencode($total_amt) .
                '&PAYMENTREQUEST_0_CURRENCYCODE=' . urlencode('USD') .
                '&LOCALECODE=GB' . //PayPal pages to match the language on your website.
                '&LOGOIMG=' . site_mail_logo . //site logo
                '&CARTBORDERCOLOR=000000' . //border color of cart
                '&ALLOWNOTE=1';
//        $this->load->view('home', $data);
        $this->load->library('paypalclass');

//        set payment on session
        $this->session->set_userdata('session_paypal', $paypaldata);
        $session_paypal = $this->session->userdata('session_paypal');

        $httpParsedResponseAr = $this->paypalclass->PPHttpPost('SetExpressCheckout', $setexpresscheckout . $paypaldata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);

        if ("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {
//Redirect user to PayPal store with Token received.
            $paypalurl = 'https://www' . $PayPalMode . '.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=' . $httpParsedResponseAr["TOKEN"] . '';
            header('Location: ' . $paypalurl);
        } else {
//Show error message
//            print_r($httpParsedResponseAr);

            $data["error"] = '<div style="color:red"><b>Error : </b>' . urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]) . '</div>';
            $this->load->view('paypal/error', $data);
        }
        // $this->load->view('paypal/process', $data);
    }

    public function success() {
        $paymentmathod = "PayPal";
        if ($this->checklogin) {
            $session_cart = $this->Product_model->cartData($this->user_id);
        } else {
            $session_cart = $this->Product_model->cartData();
        }
        $PayPalMode = ''; // sandbox or live
        $PayPalApiUsername = paypal_api_username; //PayPal API Username
        $PayPalApiPassword = paypal_api_password; //Paypal API password
        $PayPalApiSignature = paypal_api_signature; //Paypal API Signature
        $PayPalCurrencyCode = paypal_api_currency_code; //Paypal Currency Code
        $data = [];
        //Paypal redirects back to this page using ReturnURL, We should receive TOKEN and Payer ID
        if ($this->input->get("token") && $this->input->get("PayerID")) {
//we will be using these two variables to execute the "DoExpressCheckoutPayment"
//Note: we haven't received any payment yet.
            $token = $this->input->get("token");
            $payer_id = $this->input->get("PayerID");
            $paypaldata = $this->session->userdata('session_paypal');

            $doexpresscheckout = '&TOKEN=' . urlencode($token) .
                    '&PAYERID=' . urlencode($payer_id) .
                    '&PAYMENTREQUEST_0_PAYMENTACTION=' . urlencode("SALE");
//We need to execute the "DoExpressCheckoutPayment" at this point to Receive payment from user.
            $this->load->library('paypalclass');
            $httpParsedResponseAr = $this->paypalclass->PPHttpPost('DoExpressCheckoutPayment', $doexpresscheckout . $paypaldata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);
//Check if everything went ok..
            if ("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {
                if (isset($httpParsedResponseAr["L_LONGMESSAGE0"])) {
                    $long_message = urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]);
                    $message = urldecode($httpParsedResponseAr["L_SHORTMESSAGE0"]);
                    $error_code = urldecode($httpParsedResponseAr["L_ERRORCODE0"]);
                } else {
                    $long_message = 'Your Transaction ID : ' . urldecode($httpParsedResponseAr["PAYMENTINFO_0_TRANSACTIONID"]);
                    $message = "Payment Success";
                    $error_code = "0";
                }
                $payment_error_code = urldecode($httpParsedResponseAr["PAYMENTINFO_0_ERRORCODE"]);
                $payment_status = urldecode($httpParsedResponseAr["PAYMENTINFO_0_PAYMENTSTATUS"]);
                if ('Completed' == $httpParsedResponseAr["PAYMENTINFO_0_PAYMENTSTATUS"]) {
                    // echo '<div style="color:green">Payment Received! Your product will be sent to you very soon!</div>';
                } elseif ('Pending' == $httpParsedResponseAr["PAYMENTINFO_0_PAYMENTSTATUS"]) {
                    echo '<div style="color:red">Transaction Complete, but payment is still pending! ' .
                    'You need to manually authorize this payment in your <a target="_new" href="http://www.paypal.com">Paypal Account</a></div>';
                }

// we can retrive transection details using either GetTransactionDetails or GetExpressCheckoutDetails
// GetTransactionDetails requires a Transaction ID, and GetExpressCheckoutDetails requires Token returned by SetExpressCheckOut
                $padata = '&TOKEN=' . urlencode($token);

                $httpParsedResponseAr = $this->paypalclass->PPHttpPost('GetExpressCheckoutDetails', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);

                if ("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {


                    $measurement_style = $this->session->userdata('measurement_style');
                    $data['measurement_style_type'] = $measurement_style ? $measurement_style['measurement_style'] : "Please Select Size";

                    if ($this->checklogin) {
                        $session_cart = $this->Product_model->cartData($this->user_id);
                    } else {
                        $session_cart = $this->Product_model->cartData();
                    }

                    $measurement_style = $this->session->userdata('measurement_style');
                    $data['measurement_style_type'] = $measurement_style ? $measurement_style['measurement_style'] : "Please Select Size";

                    $user_address_details = $this->session->userdata('shipping_address');
                    $data['user_address_details'] = $user_address_details ? [$this->session->userdata('shipping_address')] : [];

                    $user_details = $this->session->userdata('customer_inforamtion');
                    $data['user_details'] = $user_details ? $this->session->userdata('customer_inforamtion') : array();

                    //place order

                    $address = $user_address_details;
                    $sub_total_price = $session_cart['total_price'];
                    $total_quantity = $session_cart['total_quantity'];

                    $order_array = array(
                        'name' => $user_details['name'],
                        'email' => $user_details['email'],
                        'user_id' => 'guest',
                        'contact_no' => $user_details['contact_no'],
                        'zipcode' => $address['zipcode'],
                        'address1' => $address['address1'],
                        'address2' => $address['address2'],
                        'city' => $address['city'],
                        'state' => $address['state'],
                        'country' => $address['country'],
                        'order_date' => date('Y-m-d'),
                        'order_time' => date('H:i:s'),
                        'amount_in_word' => $this->Product_model->convert_num_word($sub_total_price),
                        'sub_total_price' => $session_cart['sub_total_price'],
                        'total_price' => $session_cart['total_price'],
                        'coupon_code' => $session_cart['coupon_code'],
                        'discount' => $session_cart['discount'],
                        'shipping' => $session_cart['shipping_price'],
                        'total_quantity' => $total_quantity,
                        'status' => 'Order Confirmed',
                        'payment_mode' => "PayPal",
                        'measurement_style' => $measurement_style['measurement_style'],
                        'credit_price' => $this->input->post('credit_price') || 0,
                    );

                    $this->db->insert('user_order', $order_array);
                    $last_id = $this->db->insert_id();
                    $orderno = "RF" . date('Y/m/d') . "/" . $last_id;
                    $orderkey = md5($orderno);
                    $this->db->set('order_no', $orderno);
                    $this->db->set('order_key', $orderkey);
                    $this->db->where('id', $last_id);
                    $this->db->update('user_order');

                    $this->Product_model->cartOperationCustomCopyOrder($last_id);

                    $custome_items = $session_cart['custome_items'];
                    $custome_items_ids = implode(", ", $custome_items);
                    $custome_items_ids_profile = implode("", $custome_items);
                    $custome_items_nameslist = $session_cart['custome_items_name'];
                    $custome_items_names = implode(", ", $custome_items_nameslist);

                    if (isset($measurement_style["measurement_id"])) {
                        $this->db->set('measurement_id', $measurement_style["measurement_id"]);
                        $this->db->where('id', $last_id);
                        $this->db->update('user_order');
                    }


                    $order_status_data = array(
                        'c_date' => date('Y-m-d'),
                        'c_time' => date('H:i:s'),
                        'order_id' => $last_id,
                        'status' => "Order Confirmed",
                        'user_id' => 'guest',
                        'remark' => "Order Confirmed By Using " . $paymentmathod . ",  Waiting For Payment",
                    );
                    $this->db->insert('user_order_status', $order_status_data);

                    $newdata = array(
                        'username' => '',
                        'password' => '',
                        'logged_in' => FALSE,
                    );

                    $array_payment = array(
                        'c_date' => date('Y-m-d'),
                        'c_time' => date('H:i:s'),
                        'order_id' => $last_id,
                        'status' => $payment_status . " Using PayPal",
                        'user_id' => $this->user_id,
                        'remark' => "Order Confirmed, Payment Made Using PayPay.",
                        "txn_no" => urldecode($httpParsedResponseAr["TRANSACTIONID"]),
                        "message" => $message,
                        "long_message" => $long_message,
                        "total_amount" => urldecode($httpParsedResponseAr["AMT"]),
                        "currency_code" => urldecode($httpParsedResponseAr["COUNTRYCODE"]),
                        "payment_status" => $payment_status,
                        "payment_error_code" => $payment_error_code,
                        "token" => urldecode($httpParsedResponseAr["TOKEN"]),
                        "payer_id" => urldecode($httpParsedResponseAr["PAYERID"]),
                        "payer_email" => urldecode($httpParsedResponseAr["EMAIL"]),
                        "payer_info" => urldecode($httpParsedResponseAr["FIRSTNAME"]) . " " . urldecode($httpParsedResponseAr["LASTNAME"]),
                        "currection_id" => urldecode($httpParsedResponseAr["CORRELATIONID"]),
                        "ack" => urldecode($httpParsedResponseAr["ACK"]),
                        "timestemp" => urldecode($httpParsedResponseAr["TIMESTAMP"]),
                        "error_code" => $error_code,
                        "checkoutstatus" => urldecode($httpParsedResponseAr["CHECKOUTSTATUS"]),
                    );
                    $this->db->insert('paypal_status', $array_payment);
                    $this->session->unset_userdata($newdata);
                    $this->session->unset_userdata("session_coupon");
                    $this->session->sess_destroy();
                    redirect('Order/orderdetailsguest/' . $orderkey);

                    $this->load->view('Cart/checkoutPayment', $data);

                    //  echo '<pre>';
                    //    print_r($httpParsedResponseAr);
                    //   echo '</pre>';
                } else {
                    //  echo '<div style="color:red"><b>GetTransactionDetails failed:</b>' . urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]) . '</div>';
                    //  echo '<pre>';
                    //    print_r($httpParsedResponseAr);
                    //    echo '</pre>';
                }
            } else {
                //  echo '<div style="color:red"><b>Error : </b>' . urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]) . '</div>';
                echo '<pre>';
                //   print_r($httpParsedResponseAr);
                //   echo '</pre>';
            }
        }
        $this->load->view('paypal/cancel', $data);
    }

    public function cancel() {
        $data['token'] = $this->input->get('token');
        $this->load->view('paypal/cancel', $data);
    }

}

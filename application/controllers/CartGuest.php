<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CartGuest extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->model('User_model');
        $this->load->library('session');
        $session_user = $this->session->userdata('logged_in');
        if ($session_user) {
            $this->user_id = $session_user['login_id'];
        } else {
            $this->user_id = 0;
        }

        $this->checklogin = $this->session->userdata('logged_in');
        $this->user_id = $this->checklogin ? $this->checklogin['login_id'] : 0;
    }

    function redirectCart() {
        if ($this->checklogin) {
            $session_cart = $this->Product_model->cartDataCustome($this->user_id);
        } else {
            $session_cart = $this->Product_model->cartDataCustome();
        }
        if (count($session_cart['custome_items'])) {
            
        } else {
            redirect('Cart/details');
        }
    }

    public function index() {
        $this->redirectCart();
        redirect('Cart/details');
    }

    function details() {
        $this->load->view('CartGuest/details');
    }

    function checkoutInit() {
        $this->redirectCart();
        $measurement_style = $this->session->userdata('measurement_style');
        $data['measurement_style_type'] = $measurement_style ? $measurement_style['measurement_style'] : "Please Select Size";

        $address = $this->session->userdata('shipping_address');
        $data['user_address_details'] = $address ? [$this->session->userdata('shipping_address')] : [];

        $address = $this->session->userdata('customer_inforamtion');
        $data['user_details'] = $address ? $this->session->userdata('customer_inforamtion') : array();

        $this->load->view('CartGuest/checkoutInit', $data);
    }

    function checkoutSize() {
        $this->redirectCart();
        $address = $this->session->userdata('shipping_address');
        $data['user_address_details'] = $address ? [$this->session->userdata('shipping_address')] : [];

        $measurement_style = $this->session->userdata('measurement_style');
        $data['measurement_style_type'] = $measurement_style ? $measurement_style['measurement_style'] : "Please Select Size";

        if ($this->checklogin) {
            $session_cart = $this->Product_model->cartDataCustome($this->user_id);
        } else {
            $session_cart = $this->Product_model->cartDataCustome();
        }

        $custome_items = $session_cart['custome_items'];

        $data['custome_items'] = $custome_items;

        $this->db->select("group_concat(measurements) as measurement");
        $this->db->where_in('id', $custome_items);
        $query = $this->db->get('custome_items');
        $custome_measurements = $query->row();
        $data['customitems'] = $custome_measurements;

        $measurementarray = explode(",", $custome_measurements->measurement);

        $this->db->select("*");
        $this->db->order_by('display_index', 'asc');
        $this->db->where_in('id', $measurementarray);
        $query = $this->db->get('measurement');
        $custome_measurements = $query->result_array();
        $data['measurements_list'] = $custome_measurements;

        if ($this->input->post('submit_measurement')) {
            $measurement_style = array(
                'measurement_style' => $this->input->post('measurement_type'),
                'measurement_dict' => array()
            );
            $measurement_title = $this->input->post('measurement_title');
            $measurement_value = $this->input->post('measurement_value');
            if ($measurement_title) {
                foreach ($measurement_title as $key => $value) {
                    $mvalue = $measurement_value[$key];
                    $mtitle = $value;
                    $measurement_style['measurement_dict'][$mtitle] = $mvalue;
                }
            }

            $this->session->set_userdata('measurement_style', $measurement_style);
            redirect('CartGuest/checkoutShipping');
        }
        $this->load->view('Cart/checkoutSize', $data);
    }

    function checkoutShipping() {
        $this->redirectCart();
        $measurement_style = $this->session->userdata('measurement_style');
        $data['measurement_style_type'] = $measurement_style ? $measurement_style['measurement_style'] : "Please Select Size";

        $data['checkoutmode'] = 'Guest';

        $address = $this->session->userdata('shipping_address');
        $data['user_address_details'] = $address ? [$this->session->userdata('shipping_address')] : [];

        $user_info = $this->session->userdata('customer_inforamtion');
        $data['user_details'] = $user_info ? $this->session->userdata('customer_inforamtion') : array();

//Get Address
        if (isset($_GET['removeAddress'])) {
            $addressdata = $this->session->userdata('shipping_address');
            $this->session->unset_userdata('shipping_address');
            $this->session->unset_userdata('customer_inforamtion');
            redirect('CartGuest/checkoutShipping');
        }

//add New address
        if (isset($_POST['add_address'])) {
            $address1 = $this->input->post('address1');
            $category_array = array(
                'address1' => $this->input->post('address1'),
                'address2' => $this->input->post('address2'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'zipcode' => $this->input->post('zipcode'),
                'country' => $this->input->post('country'),
                'user_id' => $this->user_id,
                'status' => 'default',
            );
            $this->session->set_userdata('shipping_address', $category_array);
            $customer = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'contact_no' => $this->input->post('contact_no'),
            );
            $this->session->set_userdata('customer_inforamtion', $customer);
            if ($address1 == "Pick From Store") {
                redirect('CartGuest/checkoutPayment');
            }
            redirect('CartGuest/checkoutShipping');
        }
        $this->load->view('CartGuest/checkoutShipping', $data);
    }

    function checkoutPayment() {
        $this->redirectCart();
        $measurement_style = $this->session->userdata('measurement_style');
        $data['measurement_style_type'] = $measurement_style ? $measurement_style['measurement_style'] : "Please Select Size";

        $user_address_details = $this->session->userdata('shipping_address');
        $data['user_address_details'] = $user_address_details ? [$this->session->userdata('shipping_address')] : [];

        $user_details = $this->session->userdata('customer_inforamtion');
        $data['user_details'] = $user_details ? $this->session->userdata('customer_inforamtion') : array();

        $data['checkoutmode'] = 'Guest';

        if (isset($_POST['place_order'])) {

            //place order

            $address = $user_address_details;

            if ($this->checklogin) {
                $session_cart = $this->Product_model->cartData($this->user_id);
            } else {
                $session_cart = $this->Product_model->cartData();
            }


            $sub_total_price = $session_cart['total_price'];
            $total_quantity = $session_cart['total_quantity'];

            //place order

            $address = $user_address_details;
            $paymentmathod = $this->input->post('place_order');
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
                'payment_mode' => $paymentmathod,
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

            $this->session->unset_userdata($newdata);
            $this->session->unset_userdata("session_coupon");
            $this->session->sess_destroy();

            redirect('Order/orderdetailsguest/' . $orderkey);
        }
        $this->load->view('Cart/checkoutPayment', $data);
    }

    function checkoutPayment2() {
        $this->redirectCart();
        $measurement_style = $this->session->userdata('measurement_style');
        $data['measurement_style_type'] = $measurement_style ? $measurement_style['measurement_style'] : "Please Select Size";

        $user_address_details = $this->session->userdata('shipping_address');
        $data['user_address_details'] = $user_address_details ? [$this->session->userdata('shipping_address')] : [];

        $user_details = $this->session->userdata('customer_inforamtion');
        $data['user_details'] = $user_details ? $this->session->userdata('customer_inforamtion') : array();

        $data['checkoutmode'] = 'Guest';

        if (isset($_POST['place_order'])) {

            //place order

            $address = $user_address_details;

            if ($this->checklogin) {
                $session_cart = $this->Product_model->cartDataCustome($this->user_id);
            } else {
                $session_cart = $this->Product_model->cartDataCustome();
            }

            $sub_total_price = $session_cart['total_price'];
            $total_quantity = $session_cart['total_quantity'];

            //place order

            $address = $user_address_details;
            $paymentmathod = $this->input->post('place_order');
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
                'payment_mode' => $paymentmathod,
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
//
            $this->Product_model->cartOperationCustomCopyOrder($last_id);
//
//            $custome_items = $session_cart['custome_items'];
//            $custome_items_ids = implode(", ", $custome_items);
//            $custome_items_ids_profile = implode("", $custome_items);
//            $custome_items_nameslist = $session_cart['custome_items_name'];
//            $custome_items_names = implode(", ", $custome_items_nameslist);
//
//            if (isset($measurement_style["measurement_id"])) {
//                $this->db->set('measurement_id', $measurement_style["measurement_id"]);
//                $this->db->where('id', $last_id);
//                $this->db->update('user_order');
//            }
//
//
//            $order_status_data = array(
//                'c_date' => date('Y-m-d'),
//                'c_time' => date('H:i:s'),
//                'order_id' => $last_id,
//                'status' => "Order Confirmed",
//                'user_id' => 'guest',
//                'remark' => "Order Confirmed By Using " . $paymentmathod . ",  Waiting For Payment",
//            );
//            $this->db->insert('user_order_status', $order_status_data);
////                    $this->Product_model->order_to_vendor($last_id);
//
//            $newdata = array(
//                'username' => '',
//                'password' => '',
//                'logged_in' => FALSE,
//            );
//
//            $this->session->unset_userdata($newdata);
//            $this->session->unset_userdata("session_coupon");
//            $this->session->sess_destroy();
//
//            redirect('Order/orderdetailsguest/' . $orderkey);
        }
        $this->load->view('Cart/checkoutPayment', $data);
    }

}

?>

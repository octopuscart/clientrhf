<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

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

    function applyCoupon() {
        $nexturl = $this->input->post("next_url");
        $couponcode = $this->input->post("couponcode");
        $couponarray = array("has_coupon" => 0, "coupon_code" => "", "coupon_discount" => "");
        if ($couponcode) {
            $this->db->where("code", $couponcode);
            $this->db->where("valid_till>", date("Y-m-d"));
            $querycoupon = $this->db->get("coupon_conf");
            if ($querycoupon) {
                $couopndata = $querycoupon->row_array();
                if ($couopndata) {
                    if ($couopndata["coupon_type"] == "All User") {
                        $couponarray["has_coupon"] = 1;
                        $couponarray["coupon_code"] = $couponcode;
                        $couponarray["coupon_discount"] = $couopndata["value"];
                        $couponarray["coupon_discount_type"] = $couopndata["value_type"];
                        $couponarray["coupon_message"] = $couopndata["promotion_message"];
                    } else {
                        $exitcoupon = $this->db->where("coupon_code", $couponcode)->get("user_order");
                        if ($exitcoupon && $exitcoupon->result_array()) {
                            
                        } else {
                            $couponarray["has_coupon"] = 1;
                            $couponarray["coupon_code"] = $couponcode;
                            $couponarray["coupon_discount"] = $couopndata["value"];
                            $couponarray["coupon_discount_type"] = $couopndata["value_type"];
                            $couponarray["coupon_message"] = $couopndata["promotion_message"];
                        }
                    }
                }
            }
        }
        $this->session->set_userdata('session_coupon', $couponarray);
        redirect($nexturl);
    }

    public function index() {
        $this->redirectCart();
        redirect('Cart/details');
    }

    function details() {

        $this->load->view('Cart/details2');
    }

    function detailsc() {
        redirect('Cart/details');
        $this->load->view('Cart/details');
    }

    function detailsmulti() {

        $this->load->view('Cart/details_multiple');
    }

    function checkoutInit() {
        $this->redirectCart();
        $measurement_style = $this->session->userdata('measurement_style');
        $data['measurement_style_type'] = $measurement_style ? $measurement_style['measurement_style'] : "Please Select Size";

        $session_data = $this->session->userdata('logged_in');
        if ($session_data) {
            $user_address_details = $this->User_model->user_address_details($this->user_id);
            $data['user_address_details'] = $user_address_details;
            $this->load->view('Cart/checkoutInit', $data);
        } else {
            redirect('Account/login?page=checkoutInit');
        }
    }

    function setPreviouseMeausrement($measurement_id) {
        $meaurementsobj = $this->db->where("id", $measurement_id)->get("custom_measurement_profile")->row_array();

        $measurement_style = array(
            'measurement_style' => "Mes. Profile: " . $meaurementsobj["profile"],
            'measurement_dict' => array(),
            'measurement_id' => $measurement_id
        );
        $measurement_title = $this->input->post('measurement_title');
        $measurement_value = $this->input->post('measurement_value');

        foreach ($measurement_title as $key => $value) {
            $mvalue = $measurement_value[$key];
            $mtitle = $value;
            $measurement_style['measurement_dict'][$mtitle] = $mvalue;
        }

        $this->session->set_userdata('measurement_style', $measurement_style);
    }

    function measurements() {

        if ($this->checklogin) {
            $session_cart = $this->Product_model->cartDataCustome($this->user_id);
        } else {
            $session_cart = $this->Product_model->cartDataCustome();
        }

        $custome_items = $session_cart['custome_items'];

        $this->db->select("group_concat(measurements) as measurement");
        $this->db->where_in('id', $custome_items);
        $query = $this->db->get('custome_items');
        $custome_measurements = $query->row();

        $measurementarray = explode(",", "32,33," . $custome_measurements->measurement);

        $this->db->select("*");
        $this->db->order_by('display_index', 'asc');
        $this->db->where_in('id', $measurementarray);
        $query = $this->db->get('measurement');
        $custome_measurements = $query->result_array();
        $data['measurements_list'] = $custome_measurements;

        $this->db->select("*");
        $this->db->order_by('display_index', 'asc');
        $query = $this->db->get('measurement_posture');
        $measurement_posture = $query->result_array();

        $measurement_posture_array = array();
        foreach ($measurement_posture as $pkey => $pvalue) {

            $this->db->select("title, image");
            $this->db->where_in('measurement_posture_id', $pvalue["id"]);
            $query = $this->db->get('measurement_posture_value');
            $measurement_posture_array[$pvalue["title"]] = $query ? $query->result_array() : array();
        }
        $data['measurement_posture'] = $measurement_posture_array;
        $custome_items = $session_cart['custome_items'];
        $custome_items_ids = implode(",", $custome_items);
        $custome_items_ids_profile = implode("", $custome_items);
        $custome_items_nameslist = $session_cart['custome_items_name'];
        $custome_items_names = implode(",", $custome_items_nameslist);

        if (isset($_POST['submit_measurement'])) {
            $measurement_style = array(
                'measurement_style' => "Custom Measurement",
                'measurement_dict' => array()
            );
            $measurement_title = $this->input->post('measurement_key');
            $measurement_value = $this->input->post('measurement_value');
            $measurement_units = $this->input->post('measurement_unit');

            $order_measurement_profile = array(
                'datetime' => date('Y-m-d H:i:s'),
                'order_id' => 0,
                'measurement_items' => $custome_items_names,
                'measurement_items_id' => $custome_items_ids,
                'user_id' => $this->checklogin ? $this->user_id : 0,
                'display_index' => '1',
                "profile" => "MES/" . date('Y-m-d-H-i-s'),
            );
            $this->db->insert('custom_measurement_profile', $order_measurement_profile);
            $mprofile_id = $this->db->insert_id();
            $display_index = 1;
            foreach ($measurement_title as $key => $value) {
                $mvalue = $measurement_value[$key];
                $mtitle = $value;
                $mtunit = isset($measurement_units[$key]) ? $measurement_units[$key]:""; 
                $custom_array = array(
                    'measurement_key' => $mtitle,
                    'measurement_value' => $mvalue,
                    'display_index' => $display_index,
                    'order_id' => 0,
                    'unit'=>$mtunit,
                    'custom_measurement_profile' => $mprofile_id
                );
                $this->db->insert('custom_measurement', $custom_array);
                $display_index++;
            }
            $measurement_style['measurement_style'] = "Mes. Profile: " . $order_measurement_profile["profile"];
            $measurement_style["measurement_id"] = $mprofile_id;

            foreach ($measurement_title as $key => $value) {
                $mvalue = $measurement_value[$key];
                $mtitle = $value;
                $measurement_style['measurement_dict'][$mtitle] = $mvalue;
            }

            $this->session->set_userdata('measurement_style', $measurement_style);

            if ($this->checklogin) {
                redirect('Cart/checkoutShipping');
            } else {
                redirect('CartGuest/checkoutShipping');
            }
        }

        $this->load->view('Cart/user_measurements', $data);
    }

    function checkMeasurement() {
        $measurement_style = $this->session->userdata('measurement_style');
        print_r($measurement_style);
    }

    function checkoutSize() {
        $this->redirectCart();

        $measurement_style = $this->session->userdata('measurement_style');
        $data['measurement_style_type'] = $measurement_style ? $measurement_style['measurement_style'] : "Please Select Size";
        $data["has_user"] = 0;
        if ($this->checklogin) {
            $session_cart = $this->Product_model->cartDataCustome($this->user_id);
            $user_details = $this->User_model->user_details($this->user_id);
            $data['user_details'] = $user_details;
            $data["has_user"] = $this->user_id;
            $user_address_details = $this->User_model->user_address_details($this->user_id);
            $data['user_address_details'] = $user_address_details;
        } else {
            $session_cart = $this->Product_model->cartDataCustome();
            $address = $this->session->userdata('shipping_address');
            $data['user_address_details'] = $address ? [$this->session->userdata('shipping_address')] : [];
        }

        $custome_items = $session_cart['custome_items'];
        $data["items_array"] = $custome_items;

        $this->db->select("group_concat(measurements) as measurement");
        $this->db->where_in('id', $custome_items);
        $query = $this->db->get('custome_items');
        $custome_measurements = $query->row();
        $data['customitems'] = $custome_measurements;
        $data['custome_items'] = $custome_items;

        $this->db->where('user_id', $this->user_id);
        $query = $this->db->get('custom_measurement_profile');
        $previous_measurements = $query ? $query->result_array() : array();
        $data['previous_measurements'] = $previous_measurements;

        $measurementarray = explode(", ", $custome_measurements->measurement);

        $this->db->select("*");
        $this->db->order_by('display_index', 'asc');
//        $this->db->where_in('id', $measurementarray);
        $query = $this->db->get('measurement');
        $custome_measurements = $query->result_array();

        $data['measurements_list'] = $custome_measurements;
        if (isset($_POST['submit_measurement'])) {
            $measurement_style = array(
                'measurement_style' => $this->input->post('measurement_type'),
                'measurement_dict' => array()
            );
            $measurement_title = $this->input->post('measurement_title');
            $measurement_value = $this->input->post('measurement_value');

            foreach ($measurement_title as $key => $value) {
                $mvalue = $measurement_value[$key];
                $mtitle = $value;
                $measurement_style['measurement_dict'][$mtitle] = $mvalue;
            }

            $this->session->set_userdata('measurement_style', $measurement_style);

            if ($this->checklogin) {
                redirect('Cart/checkoutShipping');
            } else {
                redirect('CartGuest/checkoutShipping');
            }
        }
        $this->load->view('Cart/checkoutSize', $data);
    }

    function checkoutShipping() {
        $this->redirectCart();
        $measurement_style = $this->session->userdata('measurement_style');
        $data['measurement_style_type'] = $measurement_style ? $measurement_style['measurement_style'] : "Please Select Size";

        $session_data = $this->session->userdata('logged_in');
        if ($session_data) {
            $user_details = $this->User_model->user_details($this->user_id);
            $data['user_details'] = $user_details;

            $user_address_details = $this->User_model->user_address_details($this->user_id);
            $data['user_address_details'] = $user_address_details;

            $user_credits = $this->User_model->user_credits($this->user_id);
            $data['user_credits'] = $user_credits;

            //Get Address
            if (isset($_GET['setAddress'])) {
                $this->db->set('status', "");
                $this->db->where('user_id', $this->user_id);
                $this->db->update('shipping_address');

                $adid = $_GET['setAddress'];
                $this->db->set('status', "default");
                $this->db->where('id', $adid);
                $this->db->update('shipping_address');
                redirect('Cart/checkoutShipping');
            }

            //add New address
            if (isset($_POST['add_address'])) {
                $this->db->set('status', "");
                $this->db->where('user_id', $this->user_id);
                $this->db->update('shipping_address');
                $address1 = $this->input->post('address1');

                $category_array = array(
                    'address1' => $address1,
                    'address2' => $this->input->post('address2'),
                    'city' => $this->input->post('city'),
                    'state' => $this->input->post('state'),
                    'zipcode' => $this->input->post('zipcode'),
                    'country' => $this->input->post('country'),
                    'user_id' => $this->user_id,
                    'status' => 'default',
                );
                $this->db->insert('shipping_address', $category_array);
                if($address1=="Pick From Store"){
                    redirect('Cart/checkoutPayment');
                }
                redirect('Cart/checkoutShipping');
            }
            $this->load->view('Cart/checkoutShipping', $data);
        } else {
            redirect('Account/login?page=checkoutInit');
        }
    }

    function checkoutPayment() {
        $this->redirectCart();
        $measurement_style = $this->session->userdata('measurement_style');
        $data['measurement_style_type'] = $measurement_style ? $measurement_style['measurement_style'] : "Please Select Size";

        $data['checkoutmode'] = '';

        $session_data = $this->session->userdata('logged_in');
        if ($session_data) {
            $user_details = $this->User_model->user_details($this->user_id);
            $data['user_details'] = $user_details;

            $user_address_details = $this->User_model->user_address_details($this->user_id);
            $data['user_address_details'] = $user_address_details;

            $user_credits = $this->User_model->user_credits($this->user_id);
            $data['user_credits'] = $user_credits;

            //place order
            if (isset($_POST['place_order'])) {
                $address = $user_address_details[0];

                if ($this->checklogin) {
                    $session_cart = $this->Product_model->cartData($this->user_id);
                } else {
                    $session_cart = $this->Product_model->cartData();
                }

                $sub_total_price = $session_cart['total_price'];

                $total_quantity = $session_cart['total_quantity'];

                $user_details = $this->User_model->user_details($this->user_id);
                $data['user_details'] = $user_details;

                $user_address_details = $this->User_model->user_address_details($this->user_id);
                $data['user_address_details'] = $user_address_details;

                $user_credits = $this->User_model->user_credits($this->user_id);
                $data['user_credits'] = $user_credits;

                //place order

                $address = $user_address_details[0];
                $paymentmathod = $this->input->post('place_order');
                $order_array = array(
                    'name' => $user_details->first_name . " " . $user_details->last_name,
                    'email' => $user_details->email,
                    'user_id' => $user_details->id,
                    'contact_no' => $user_details->contact_no ? $user_details->contact_no : '---',
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
                    'measurement_id' => "",
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

                //measurwement data

                $this->db->set('order_id', $last_id);
                $this->db->where('order_id', '0');
                $this->db->where('user_id', $this->user_id);
                $this->db->update('cart');

                $custome_items = $session_cart['custome_items'];
                $custome_items_ids = implode(", ", $custome_items);
                $custome_items_ids_profile = implode("", $custome_items);
                $custome_items_nameslist = $session_cart['custome_items_name'];
                $custome_items_names = implode(", ", $custome_items_nameslist);

                $measurement_style_array = $measurement_style['measurement_dict'];

//                if (count($measurement_style_array)) {
//                    $order_measurement_profile = array(
//                        'datetime' => date('Y-m-d H:i:s'),
//                        'order_id' => $last_id,
//                        'measurement_items' => $custome_items_names,
//                        'measurement_items_id' => $custome_items_ids,
//                        'user_id' => $this->user_id,
//                        'display_index' => '1',
//                        "profile" => "MES/" . $this->user_id . "/" . $last_id,
//                    );
//                    $this->db->insert('custom_measurement_profile', $order_measurement_profile);
//                    $mprofile_id = $this->db->insert_id();
//                    $display_index = 1;
//                    foreach ($measurement_style_array as $key => $value) {
//                        $custom_array = array(
//                            'measurement_key' => $key,
//                            'measurement_value' => $value,
//                            'display_index' => $display_index,
//                            'order_id' => $last_id,
//                            'custom_measurement_profile' => $mprofile_id
//                        );
//                        $this->db->insert('custom_measurement', $custom_array);
//                        $display_index++;
//                    }
//                }


                if (isset($measurement_style["measurement_id"])) {
                    $this->db->set('measurement_id', $measurement_style["measurement_id"]);
                    $this->db->where('id', $last_id);
                    $this->db->update('user_order');
                }


                $this->session->unset_userdata("session_coupon");

                $order_status_data = array(
                    'c_date' => date('Y-m-d'),
                    'c_time' => date('H:i:s'),
                    'order_id' => $last_id,
                    'status' => "Order Confirmed",
                    'user_id' => $this->user_id,
                    'remark' => "Order Confirmed By Using " . $paymentmathod . ", Waiting For Payment",
                );
                $this->db->insert('user_order_status', $order_status_data);
//                    $this->Product_model->order_to_vendor($last_id);
                redirect('Order/orderdetails/' . $orderkey);
            }
            $this->load->view('Cart/checkoutPayment', $data
            );
        } else {
            redirect('Account/login?page=checkoutInit');
        }
    }

}

?>

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    function edit_table_information($tableName, $id) {
        $this->User_model->tracking_data_insert($tableName, $id, 'update');
        $this->db->update($tableName, $id);
    }

    public function query_exe($query) {
        $query = $this->db->query($query);
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data; //format the array into json data
        } else {
            return array();
        }
    }

    function delete_table_information($tableName, $columnName, $id) {
        $this->db->where($columnName, $id);
        $this->db->delete($tableName);
    }

    function convert_num_word($number) {
        $no = round($number);
        $point = round($number - $no, 2) * 100;
        $hundred = null;
        $digits_1 = strlen($no);
        $i = 0;
        $str = array();
        $wordsz = array('0' => 'zero', '1' => 'one', '2' => 'two',
            '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
            '7' => 'seven', '8' => 'eight', '9' => 'nine',);
        $words = array('0' => '', '1' => 'one', '2' => 'two',
            '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
            '7' => 'seven', '8' => 'eight', '9' => 'nine',
            '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
            '13' => 'thirteen', '14' => 'fourteen',
            '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
            '18' => 'eighteen', '19' => 'nineteen', '20' => 'twenty',
            '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
            '60' => 'sixty', '70' => 'seventy',
            '80' => 'eighty', '90' => 'ninety');
        $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
        while ($i < $digits_1) {
            $divider = ($i == 2) ? 10 : 100;
            $number = floor($no % $divider);
            $no = floor($no / $divider);
            $i += ($divider == 10) ? 1 : 2;
            if ($number) {
                $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                $str [] = ($number < 21) ? $words[$number] .
                        " " . $digits[$counter] . $plural . " " . $hundred :
                        $words[floor($number / 10) * 10]
                        . " " . $words[$number % 10] . " "
                        . $digits[$counter] . $plural . " " . $hundred;
            } else
                $str[] = null;
        }
        $str = array_reverse($str);
        $result = implode('', $str);
        $result = $result ? $result : $wordsz[$result / 10];
        $points = ($point) ?
                " and " . $wordsz[$point / 10] . " " .
                $wordsz[$point = $point % 10] : '';
        return "Only " . globle_currency . $result . " " . ($points ? "" . $points . " Cents" : "") . "";
    }

    ///*******  Get data for deepth of the array  ********///
    //Categories string
    function stringCategories($category_id) {
        $this->db->where('parent_id', $category_id);
        $query = $this->db->get('category');
        $category = $query->result_array();
        $container = "";
        foreach ($category as $ckey => $cvalue) {
            $container .= $this->stringCategories($cvalue['id']);
            $container .=", " . $cvalue['id'];
        }
        return $container;
    }

    function singleProductAttrs($product_id) {
        $query = "SELECT pa.attribute, pa.product_id, cav.additional_value, pa.attribute_value_id, cav.attribute_value FROM product_attribute as pa 
join category_attribute_value as cav on cav.id = pa.attribute_value_id
where pa.product_id = $product_id group by attribute_value_id";
        $product_attr_value = $this->query_exe($query);
        $arrayattr = [];
        if (count($product_attr_value))
            foreach ($product_attr_value as $key => $value) {
                $attrk = $value['attribute'];
                $attrv = $value['additional_value'];
                if ($attrk == 'Colors') {
                    array_push($arrayattr, array($attrk => $attrv));
                }
            }
        return $arrayattr;
    }

    //product prices
    function category_items_prices_id($category_items_id, $item_id) {

        $queryr = "SELECT cip.price, ci.item_name, cip.item_id, cip.id FROM custome_items_price as cip
                       join custome_items as ci on ci.id = cip.item_id
                       where cip.category_items_id = $category_items_id and cip.item_id = $item_id";
        $query = $this->db->query($queryr);
        $category_items_price_array = $query->row();
        return $category_items_price_array;
    }

    //product Details
    function productDetails($product_id, $custom_id = 0) {
        $this->db->where('id', $product_id);
        $query = $this->db->get('products');
        $product = $query->result_array();

        if (count($product)) {
            $productobj = $product[0];

            $item_price = $this->category_items_prices_id($productobj['category_items_id'], $custom_id);

            $productobj['price'] = $item_price->price;
            $productobj['regular_price'] = $item_price->price;

            $productobj['item_id'] = $custom_id;

            if ($custom_id != 0) {
                $this->db->where('id', $custom_id);
                $query = $this->db->get('custome_items');
                $customeitem = $query->row();
            }
            $productobj['item_name'] = $customeitem->item_name;
            $productattr = $this->singleProductAttrs($productobj['id']);
            $productobj['attrs'] = $productattr;


            $productobj['vendor'] = '';
            return $productobj;
        } else {
            return FALSE;
        }
    }

    function getProductVeriants($product_id) {
        $this->db->select("id as product_id");
        $this->db->where('variant_product_of', $product_id);
        $query = $this->db->get('products');
        $product_veriant = $query->result_array();
        return $product_veriant;
    }

    //product veriants
    function productDetailsVariants($product_id) {
        $product_veriant = $this->getProductVeriants($product_id);
        $mproduct_id = $product_id;
        if (count($product_veriant)) {
            
        } else {
            $this->db->select("variant_product_of as product_id");
            $this->db->where('id', $product_id);
            $query = $this->db->get('products');
            $productvcs = $query->row();
            $mproduct_id = $productvcs->product_id;
            if ($mproduct_id) {
                $product_veriant = $this->getProductVeriants($mproduct_id);
            } else {
                $mproduct_id = $product_id;
                $product_veriant = [];
            }
        }

        $mproduct_id;
        $productvstr = [$mproduct_id];
        foreach ($product_veriant as $key => $value) {
            array_push($productvstr, $value['product_id']);
        }

        $productatrvalue = implode(", ", $productvstr);
        $query = "SELECT pa.attribute, pa.product_id, pa.attribute_value_id, cav.attribute_value FROM product_attribute as pa 
join category_attribute_value as cav on cav.id = pa.attribute_value_id
where pa.product_id in ($productatrvalue) group by attribute_value_id";
        $product_attr_value = $this->query_exe($query);


        $product_attrs = array();
        foreach ($product_attr_value as $key => $value) {
            $attrv = $value['attribute'];
            if (isset($product_attrs[$attrv])) {
                array_push($product_attrs[$attrv], $value);
            } else {
                $product_attrs[$attrv] = [$value];
            }
        }
        if (count($product_attrs)) {
            return $product_attrs;
        } else {
            return FALSE;
        }
    }

    /////Cart management 
    //get cart data
    function cartDataCustome($user_id = 0) {
        if ($user_id != 0) {
            $this->db->where('user_id', $user_id);
            $this->db->where('order_id', '0');
            $this->db->order_by("item_id", "asc");
            $query = $this->db->get('cart');
            $product = $query->result_array();
            $productlist = array();
            $total_price = 0;
            $total_quantity = 0;
            $total_credit_limit = 0;
            $custome_items = [];
            $custome_items_name = [];


            foreach ($product as $key => $value) {
                $productlist[$value['product_id']] = $value;
                if (isset($value['item_id'])) {
                    array_push($custome_items, $value['item_id']);
                    array_push($custome_items_name, $value['item_name']);
                }
                $total_price += $value['total_price'];
                $total_quantity += $value['quantity'];
                $total_credit_limit += ($value['credit_limit'] * $value['quantity']);
                $cart_id = $value['id'];
                $this->db->where('cart_id', $cart_id);
                $query = $this->db->get('cart_customization');
                $cartcustom = $query->result_array();
                $customdata = array();
                foreach ($cartcustom as $key1 => $value1) {
                    $customdata[$value1['style_key']] = $value1['style_value'];
                }
                $productlist[$value['product_id']]['custom_dict'] = $customdata;
            }

            $cartdata = array(
                'products' => $productlist,
                'custome_items_name' => $custome_items_name,
                'custome_items' => $custome_items,
                'total_quantity' => $total_quantity,
                'total_price' => $total_price,
                'total_credit_limit' => $total_credit_limit,
                'used_credit' => 0
            );
            return $cartdata;
        } else {
            $session_cart = $this->session->userdata('session_cart');
            if ($session_cart) {
                
            } else {
                $cartdata = array('products' => array(),
                    'total_quantity' => 0,
                    'custome_items' => [],
                    'custome_items_name' => [],
                    'total_credit_limit' => $total_credit_limit,
                    'total_price' => 0, 'used_credit' => 0);
                $this->session->set_userdata('session_cart', $cartdata);
                $session_cart = $this->session->userdata('session_cart');
            }
            $session_cart['total_quantity'] = 0;
            $session_cart['total_price'] = 0;
            $custome_items = [];
            foreach ($session_cart['products'] as $key => $value) {
                if (isset($value['product_id'])) {
                    if (isset($value['item_id'])) {
                        array_push($session_cart['custome_items'], $value['item_id']);
                        array_push($session_cart['custome_items_name'], $value['item_name']);
                    }

                    $session_cart['total_quantity'] += $value['quantity'];
                    $session_cart['total_price'] += $value['total_price'];
                } else {

                    unset($session_cart['products'][$key]);
                    $this->session->set_userdata('session_cart', $session_cart);
                }
            }
            return $session_cart;
        }
    }

    function cartData($user_id = 0) {
        if ($user_id != 0) {
            $this->db->where('user_id', $user_id);
            $this->db->where('order_id', '0');
            $this->db->order_by("item_id", "asc");
            $query = $this->db->get('cart');
            $product = $query->result_array();
            $productlist = array();
            $total_price = 0;
            $total_quantity = 0;
            $total_credit_limit = 0;
            $custome_items = [];
            $custome_items_name = [];
            $returndata = array();
            $returndata['products'] = array();
            foreach ($product as $key => $value) {


                $cart_id = $value['id'];
                $this->db->where('cart_id', $cart_id);
                $query = $this->db->get('cart_customization');
                $cartcustom = $query->result_array();
                $customdata = array();
                foreach ($cartcustom as $key1 => $value1) {
                    $customdata[$value1['style_key']] = $value1['style_value'];
                }
                if (count($customdata)) {
                    $productlist[$value['product_id']] = $value;
                    if (isset($value['item_id'])) {
                        array_push($custome_items, $value['item_id']);
                        array_push($custome_items_name, $value['item_name']);
                    }
                    $productlist[$value['product_id']]['custom_dict'] = $customdata;

                    $total_price += $value['total_price'];
                    $total_quantity += $value['quantity'];
                    $total_credit_limit += ($value['credit_limit'] * $value['quantity']);
                }
            }

            $cartdata = array(
                'products' => $productlist,
                'custome_items_name' => $custome_items_name,
                'custome_items' => $custome_items,
                'total_quantity' => $total_quantity,
                'total_price' => $total_price,
                'total_credit_limit' => $total_credit_limit,
                'used_credit' => 0
            );
            return $cartdata;
        } else {
            $session_cart = $this->session->userdata('session_cart');
            if ($session_cart) {
                
            } else {
                $cartdata = array('products' => array(),
                    'total_quantity' => 0,
                    'custome_items' => [],
                    'custome_items_name' => [],
                    'total_credit_limit' => $total_credit_limit,
                    'total_price' => 0, 'used_credit' => 0);
                $this->session->set_userdata('session_cart', $cartdata);
                $session_cart = $this->session->userdata('session_cart');
            }
            $session_cart['total_quantity'] = 0;
            $session_cart['total_price'] = 0;
            $custome_items = [];
            $returndata = $session_cart;
            $returndata['products'] = array();
            foreach ($session_cart['products'] as $key => $value) {
                if (isset($value['item_id'])) {
                    array_push($session_cart['custome_items'], $value['item_id']);
                    array_push($session_cart['custome_items_name'], $value['item_name']);
                }

                $returndata['products'][$key] = $value;
                $returndata['total_quantity'] += $value['quantity'];
                $returndata['total_price'] += $value['total_price'];
            }
            return $returndata;
        }
    }

    function cartDataNoCustome($user_id = 0) {
        if ($user_id != 0) {
            $this->db->where('user_id', $user_id);
            $this->db->where('order_id', '0');
            $this->db->order_by("item_id", "asc");
            $query = $this->db->get('cart');
            $product = $query->result_array();
            $productlist = array();
            $total_price = 0;
            $total_quantity = 0;
            $total_credit_limit = 0;
            $custome_items = [];
            $custome_items_name = [];
            foreach ($product as $key => $value) {
                $productlist[$value['product_id']] = $value;
                if (isset($value['item_id'])) {
                    array_push($custome_items, $value['item_id']);
                    array_push($custome_items_name, $value['item_name']);
                }
                $total_price += $value['total_price'];
                $total_quantity += $value['quantity'];
                $total_credit_limit += ($value['credit_limit'] * $value['quantity']);
                $cart_id = $value['id'];
                $this->db->where('cart_id', $cart_id);
                $query = $this->db->get('cart_customization');
                $cartcustom = $query->result_array();
                $customdata = array();
                foreach ($cartcustom as $key1 => $value1) {
                    $customdata[$value1['style_key']] = $value1['style_value'];
                }

                $productlist[$value['product_id']]['custom_dict'] = $customdata;
            }
            $returndata = array();
            $returndata['products'] = array();
            $returndata['total_quantity'] = 0;
            $returndata['total_price'] = 0;
            foreach ($productlist as $key => $value) {

                if (!count($value['custom_dict'])) {

                    $returndata['products'][$key] = $value;
                    $returndata['total_quantity'] += $value['quantity'];
                    $returndata['total_price'] += $value['total_price'];
                }
            }

            $cartdata = array(
                'products' => $returndata['products'],
                'custome_items_name' => $custome_items_name,
                'custome_items' => $custome_items,
                'total_quantity' => $returndata['total_quantity'],
                'total_price' => $returndata['total_price'],
                'total_credit_limit' => 0,
                'used_credit' => 0
            );
            return $cartdata;
        } else {
            $session_cart = $this->session->userdata('session_cart');
            if ($session_cart) {
                
            } else {
                $cartdata = array('products' => array(),
                    'total_quantity' => 0,
                    'custome_items' => [],
                    'custome_items_name' => [],
                    'total_credit_limit' => $total_credit_limit,
                    'total_price' => 0, 'used_credit' => 0);
                $this->session->set_userdata('session_cart', $cartdata);
                $session_cart = $this->session->userdata('session_cart');
            }
            $session_cart['total_quantity'] = 0;
            $session_cart['total_price'] = 0;
            $custome_items = [];
            $returndata = $session_cart;
            $returndata['products'] = array();
            foreach ($session_cart['products'] as $key => $value) {
                if (isset($value['item_id'])) {
                    array_push($session_cart['custome_items'], $value['item_id']);
                    array_push($session_cart['custome_items_name'], $value['item_name']);
                }
                if (!isset($value['custom_dict'])) {
                    $returndata['products'][$key] = $value;
                    $returndata['total_quantity'] += $value['quantity'];
                    $returndata['total_price'] += $value['total_price'];
                }
            }
            return $returndata;
        }
    }

    //get order details  
    public function getOrderDetails($key_id, $is_key = 0) {
        $order_data = array();
        if ($is_key === 'key') {
            $this->db->where('order_key', $key_id);
        } else {
            $this->db->where('id', $key_id);
        }
        $query = $this->db->get('user_order');
        $order_details = $query->row();
        $payment_details = array("payment_mode" => "", "txn_id" => "", "payment_date" => "");

        if ($order_details) {

            $this->db->order_by('id', 'desc');
            $this->db->where('order_id', $order_details->id);
            $query = $this->db->get('user_order_status');
            $userorderstatus = $query->result();
            $order_data['order_status'] = $userorderstatus;

            if ($order_details->payment_mode == 'PayPal') {
                $this->db->where('order_id', $order_details->id);
                $query = $this->db->get('paypal_status');
                $paypal_details = $query->result();

                if ($paypal_details) {
                    $paypal_details = end($paypal_details);
                    $payment_details['payment_mode'] = "PayPal";
                    $payment_details['txn_id'] = $paypal_details->txn_no;
                    $payment_details['payment_date'] = $paypal_details->timestemp;
                }
            }

            $order_id = $order_details->id;
            $order_data['order_data'] = $order_details;
            $this->db->where('order_id', $order_details->id);
            $query = $this->db->get('cart');
            $cart_items = $query->result();

            $this->db->order_by('display_index', 'asc');
            $this->db->where('order_id', $order_details->id);
            $query = $this->db->get('custom_measurement');
            $custom_measurement = $query->result_array();

            $order_data['measurements_items'] = $custom_measurement;

            foreach ($cart_items as $key => $value) {
                $cart_id = $value->id;

                $this->db->where('cart_id', $cart_id);
                $query = $this->db->get('cart_customization');
                $cartcustom = $query->result_array();

                $customdata = array();
                foreach ($cartcustom as $key1 => $value1) {
                    $customdata[$value1['style_key']] = $value1['style_value'];
                }
                $value->custom_dict = $customdata;

//                $this->db->where('order_id', $order_id);
//                $this->db->where('vendor_id', $vendor_id);
//                $query = $this->db->get('vendor_order_status');
//                $orderstatus = $query->result();
                $value->product_status = array();
            }
            $order_data['payment_details'] = $payment_details;
            $order_data['cart_data'] = $cart_items;
            $order_data['amount_in_word'] = $this->convert_num_word($order_data['order_data']->total_price);
        }
        return $order_data;
    }

    //usr cart
    public function userCartOperationGet($user_id) {
        
    }

    //cart operation session 
    public function cartOperation($product_id, $quantity, $item_id, $user_id = 0, $setSession = 0) {

        if ($user_id != 0) {
            $cartdata = $this->cartData($user_id);
            $product_details = $this->productDetails($product_id, $item_id);
            $product_dict = array(
                'title' => $product_details['title'],
                'price' => $product_details['price'],
                'sku' => $product_details['sku'], 'folder' => $product_details['folder'],
                'attrs' => "",
                'vendor_id' => $product_details['user_id'],
                'total_price' => $product_details['price'],
                'item_id' => $product_details['item_id'],
                'item_name' => $product_details['item_name'],
                'file_name' => custome_image_server . PRODUCT_PATH_PRE . $product_details['folder'] . PRODUCT_PATH_POST,
                'quantity' => $quantity,
                'user_id' => $user_id,
                'credit_limit' => $product_details['credit_limit'] ? $product_details['credit_limit'] : 0,
                'product_id' => $product_id,
                'op_date_time' => date('Y-m-d H:i:s'),
            );
            if (isset($cartdata['products'][$product_id])) {
                if ($setSession) {
                    $total_price = $product_details['price'] * $quantity;
                    $total_quantity = $quantity;
                } else {
                    $total_price = $cartdata['products'][$product_id]['total_price'] + $product_details['price'];
                    $total_quantity = $cartdata['products'][$product_id]['quantity'] + $quantity;
                }
                $cid = $cartdata['products'][$product_id]['id'];
                $this->db->set('quantity', $total_quantity);
                $this->db->set('total_price', $total_price);
                $this->db->where('id', $cid); //set column_name and value in which row need to update
                $this->db->update('cart'); //
            } else {
                $this->db->insert('cart', $product_dict);
            }
        } else {
            $session_cart = $this->session->userdata('session_cart');
            if ($session_cart) {
                
            } else {
                $cartdata = array('products' => array(), 'total_quantity' => 0, 'custome_items' => [],
                    'custome_items_name' => [], 'total_price' => 0);
                $this->session->set_userdata('session_cart', $cartdata);
                $session_cart = $this->session->userdata('session_cart');
            }

            if (isset($session_cart['products'][$product_id])) {
                $product_dict = $session_cart['products'][$product_id];
                $qauntity = $product_dict['quantity'] + $quantity;
                $price = $product_dict['price'] * $qauntity;
                $session_cart['products'][$product_id]['quantity'] = $qauntity;
                $session_cart['products'][$product_id]['total_price'] = $price;
                $this->session->set_userdata('session_cart', $session_cart);
            } else {
                $product_details = $this->productDetails($product_id, $item_id);
                $product_dict = array(
                    'title' => $product_details['title'],
                    'price' => $product_details['price'],
                    'sku' => $product_details['sku'], 'folder' => $product_details['folder'],
                    'attrs' => "",
                    'item_id' => $product_details['item_id'],
                    'item_name' => $product_details['item_name'],
                    'vendor_id' => $product_details['user_id'],
                    'total_price' => $product_details['price'],
                    'file_name' => custome_image_server . PRODUCT_PATH_PRE . $product_details['folder'] . PRODUCT_PATH_POST,
                    'quantity' => 1,
                    'product_id' => $product_id,
                    'date' => date('Y-m-d'),
                    'time' => date('H:i:s'),
                );
                $session_cart['products'][$product_id] = $product_dict;
                $this->session->set_userdata('session_cart', $session_cart);
            }
            $session_cart = $this->session->userdata('session_cart');
        }
    }

    //category list array
    function productListCategories($category_id) {
        $this->db->where('parent_id', $category_id);
         $this->db->order_by('display_index desc');
        $query = $this->db->get('category');
        $category = $query->result_array();
        $container = [];
        foreach ($category as $ckey => $cvalue) {
            $cvalue['sub_category'] = $this->productListCategories($cvalue['id']);
            array_push($container, $cvalue);
        }
        return $container;
    }

    function get_children($id, $container) {
        $this->db->where('id', $id);
        $query = $this->db->get('category');
        $category = $query->result_array()[0];
        $this->db->where('parent_id', $id);
        $query = $this->db->get('category');
        if ($query->num_rows() > 0) {
            $childrens = $query->result_array();

            $category['children'] = $query->result_array();

            foreach ($query->result_array() as $row) {
                $pid = $row['id'];
                $this->get_children($pid, $container);
            }


            return $category;
        } else {
            
        }
    }

    function getparent($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('category');
        $texts = array();
        foreach ($query->result_array() as $row) {
            $texts = $this->getparent($row['parent_id']);
            array_push($texts, $row);
        }
        return $texts;
    }

    function parent_get($id) {
        $catarray = $this->getparent($id, []);
        array_reverse($catarray);
        $catarray = array_reverse($catarray, $preserve_keys = FALSE);
        $catcontain = array();
        foreach ($catarray as $key => $value) {
            array_push($catcontain, $value['category_name']);
        }
        $catstring = implode("->", $catcontain);
        return array('category_string' => $catstring, "category_array" => $catarray);
    }

    function child($id) {
        $this->db->where('parent_id', $id);
        $query = $this->db->get('category');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {

                $cat[] = $row;
                $cat[$row['id']] = $this->child($row['id']);
                $cat[] = $row;
            }

            return $cat; //format the array into json data
        }
    }

    function product_home_slider_bottom() {
        $pquery = "SELECT pa.* FROM products as pa where home_slider = 'on' and variant_product_of<1";
        $product_home_slider = $this->query_exe($pquery);


        $pquery = "SELECT pa.* FROM products as pa where home_bottom = 'on'  and variant_product_of<1";
        $product_home_bottom = $this->query_exe($pquery);

        return array('home_bottom' => $product_home_bottom, 'home_slider' => $product_home_slider);
    }

    function product_attribute_list($product_id) {
        $this->db->where('product_id', $product_id);
        $this->db->group_by('attribute_value_id');
        $query = $this->db->get('product_attribute');
        $atterarray = array();
        if ($query->num_rows() > 0) {
            $attrs = $query->result_array();
            foreach ($attrs as $key => $value) {
                $atterarray[$value['attribute_id']] = $value;
            }
            return $atterarray;
        } else {
            return array();
        }
    }

    function category_attribute_list($id) {
        $this->db->where('attribute_id', $id);
        $this->db->group_by('attribute_value');
        $query = $this->db->get('category_attribute_value');
        if ($query->num_rows() > 0) {
            $attrs = $query->result_array();
            return $attrs;
        } else {
            return array();
        }
    }

    //menu controller
    function menuController() {
        return "";
    }

    function order_mail($order_id, $subject = "") {
        setlocale(LC_MONETARY, 'en_US');
        $checkcode = REPORT_MODE;
        $order_details = $this->getOrderDetails($order_id, 0);

        $emailsender = email_sender;
        $sendername = email_sender_name;
        $email_bcc = email_bcc;

        if ($order_details) {
            $order_no = $order_details['order_data']->order_no;
            $this->email->set_newline("\r\n");
            $this->email->from(email_bcc, $sendername);
            $this->email->to($order_details['order_data']->email);
            $this->email->bcc(email_bcc);

            $orderlog = array(
                'log_type' => 'Email',
                'log_datetime' => date('Y-m-d H:i:s'),
                'order_id' => $order_id,
            );
            $this->db->insert('user_order_log', $orderlog);

            $subject = "Order Confirmation - Your Order with Rahman Fashions [" . $order_no . "] has been successfully placed!";
            $this->email->subject($subject);

            if ($checkcode) {
                $this->email->message($this->load->view('Email/order_mail', $order_details, true));
                $this->email->print_debugger();
                $send = $this->email->send();
                if ($send) {
                    echo json_encode("send");
                } else {
                    $error = $this->email->print_debugger(array('headers'));
                    echo json_encode($error);
                }
            } else {
                echo $this->load->view('Email/order_mail', $order_details, true);
            }
        }
    }

    function order_to_vendor($order_id) {
        $order_details = $this->getOrderDetails($order_id, 0);
        $cartdata = $order_details['cart_data'];
        $venderarray = array();
        foreach ($cartdata as $key => $value) {
            $query = "select au.id, au.email, au.first_name, au.last_name from products as c
                      left join admin_users as au on au.id = c.user_id
                      where c.id = '" . $value->product_id . "'";
            $query = $this->db->query($query);
            $vendor_details = $query->row();

            $vender_id = $vendor_details->id;
            if (isset($venderarray[$vender_id])) {
                $venderarray[$vender_id]['quantity'] += $value->quantity;
                $venderarray[$vender_id]['total_price'] += $value->total_price;
                array_push($venderarray[$vender_id]['cart_data'], $value);
            } else {
                $venderarray[$vender_id] = array(
                    'vendor' => $vendor_details,
                    'order_data' => $order_details['order_data'],
                    'cart_data' => array($value),
                    'total_price' => $value->total_price,
                    'quantity' => $value->quantity,
                );
            }
        }



        foreach ($venderarray as $key => $value) {
            if ($value) {
                $vendor_order = $value['order_data']->order_no . "/" . $value['vendor']->id;
                $vendor_order_dict = array(
                    'c_date' => date('Y-m-d'),
                    'c_time' => date('H:i:s'),
                    'order_id' => $value['order_data']->id,
                    'total_price' => $value['total_price'],
                    'total_quantity' => $value['quantity'],
                    'vendor_order_no' => $vendor_order,
                    'vendor_id' => $value['vendor']->id,
                    'vendor_email' => $value['vendor']->email,
                    'vendor_name' => $value['vendor']->first_name . " " . $value['vendor']->last_name,
                    'status' => "Order Generated",
                    'remark' => "Vendor Order Generated",
                );
                $value['vorder_no'] = $vendor_order;
                $this->db->insert('vendor_order', $vendor_order_dict);
                $last_id = $this->db->insert_id();

                //add vendor status
                $vendor_order_status_data = array(
                    'c_date' => date('Y-m-d'),
                    'c_time' => date('H:i:s'),
                    'vendor_order_id' => $last_id,
                    'order_id' => $value['order_data']->id,
                    'status' => "Payment Pending",
                    'vendor_id' => $value['vendor']->id,
                    'remark' => "Order Confirmed, Now Payment Pending From Client Side.",
                );
                $this->db->insert('vendor_order_status', $vendor_order_status_data);
            }
        }
    }

    //custom product model
    //cart operation session 
    public function cartOperationCustom($product_id, $quantity, $custom_id, $customekey, $customevalue, $extra_cost = 0, $user_id = 0, $setSession = 0) {

        $this->db->where('id', $custom_id);
        $query = $this->db->get('custome_items');
        $customeitem = $query->row();

        $custom_dict = array();
        foreach ($customekey as $key => $value) {
            $kkey = $customekey[$key];
            $vvalue = $customevalue[$key];
            $custom_dict[$kkey] = $vvalue;
        }

        $item_name = $customeitem->item_name;
        $item_id = $customeitem->id;

        if ($user_id != 0) {
            $cartdata = $this->cartData($user_id);
            $product_details = $this->productDetails($product_id, $item_id);
            $product_dict = array(
                'title' => $product_details['title'],
                'price' => $product_details['price'] + $extra_cost,
                'extra_price' => $extra_cost,
                'sku' => $product_details['sku'], 'folder' => $product_details['folder'],
                'attrs' => "",
                'vendor_id' => $product_details['user_id'],
                'total_price' => $product_details['price'] + $extra_cost,
                'file_name' => custome_image_server . PRODUCT_PATH_PRE . $product_details['folder'] . PRODUCT_PATH_POST,
                'quantity' => $quantity,
                'user_id' => $user_id,
                'item_id' => $item_id,
                'item_name' => $item_name,
                'credit_limit' => $product_details['credit_limit'] ? $product_details['credit_limit'] : 0,
                'product_id' => $product_id,
                'op_date_time' => date('Y-m-d H:i:s'),
            );
            if (isset($cartdata['products'][$product_id])) {

                if ($setSession) {
                    $total_price = ($product_details['price'] + $extra_cost) * $quantity;
                    $total_quantity = $quantity;
                } else {
                    $total_price = $cartdata['products'][$product_id]['total_price'] + ($product_details['price'] + $extra_cost);
                    $total_quantity = $cartdata['products'][$product_id]['quantity'] + $quantity;
                }
                $cid = $cartdata['products'][$product_id]['id'];
                $this->db->set('quantity', $total_quantity);
                $this->db->set('total_price', $total_price);
                $this->db->where('id', $cid); //set column_name and value in which row need to update
                $this->db->update('cart'); //
            } else {

//                $custom_dict

                $this->db->insert('cart', $product_dict);
                $last_id = $this->db->insert_id();
                $display_index = 1;
                foreach ($custom_dict as $key => $value) {
                    $custom_array = array(
                        'style_key' => $key,
                        'style_value' => $value,
                        'display_index' => $display_index,
                        'cart_id' => $last_id,
                    );
                    $this->db->insert('cart_customization', $custom_array);
                    $display_index++;
                }
            }
        } else {
            $session_cart = $this->session->userdata('session_cart');
            if ($session_cart) {
                
            } else {
                $cartdata = array('products' => array(), 'total_quantity' => 0, 'custome_items' => [],
                    'custome_items_name' => [], 'total_price' => 0);
                $this->session->set_userdata('session_cart', $cartdata);
                $session_cart = $this->session->userdata('session_cart');
            }

            if (isset($session_cart['products'][$product_id])) {
                $product_dict = $session_cart['products'][$product_id];
                $qauntity = ($product_dict['quantity']) + $quantity;
                $price = ($product_dict['price'] + $extra_cost) * $qauntity;
                $session_cart['products'][$product_id]['quantity'] = $qauntity;
                $session_cart['products'][$product_id]['total_price'] = $price;
                $this->session->set_userdata('session_cart', $session_cart);
            } else {
                $product_details = $this->productDetails($product_id, $item_id);

                $product_dict = array(
                    'title' => $product_details['title'],
                    'price' => ($product_details['price'] + ($extra_cost)),
                    'sku' => $product_details['sku'], 'folder' => $product_details['folder'],
                    'attrs' => "",
                    'extra_price' => $extra_cost,
                    'vendor_id' => $product_details['user_id'],
                    'total_price' => ($product_details['price'] + ($extra_cost)),
                    'file_name' => custome_image_server . PRODUCT_PATH_PRE . $product_details['folder'] . PRODUCT_PATH_POST,
                    'quantity' => 1,
                    'item_id' => $item_id,
                    'item_name' => $item_name,
                    'product_id' => $product_id,
                    'date' => date('Y-m-d'),
                    'time' => date('H:i:s'),
                    'custom_dict' => $custom_dict
                );
                $session_cart['products'][$product_id] = $product_dict;
                $this->session->set_userdata('session_cart', $session_cart);
            }
            $session_cart = $this->session->userdata('session_cart');
        }
    }

    public function cartOperationCustomMulti($product_id, $quantity, $custom_id, $customekey, $customevalue, $extra_cost = 0, $user_id = 0, $setSession = 0) {

        $this->db->where('id', $custom_id);
        $query = $this->db->get('custome_items');
        $customeitem = $query->row();

        $custom_dict = array();
        foreach ($customekey as $key => $value) {
            $kkey = $customekey[$key];
            $vvalue = $customevalue[$key];
            $custom_dict[$kkey] = $vvalue;
        }

        $item_name = $customeitem->item_name;
        $item_id = $customeitem->id;

        if ($user_id != 0) {
            $cartdata = $this->cartDataNoCustome($user_id);
            $product_details = $cartdata['products'][$product_id];

            if (isset($cartdata['products'][$product_id])) {

                if ($setSession) {
                    $total_price = ($product_details['price'] + $extra_cost) * $quantity;
                    $total_quantity = $quantity;
                } else {
                    $total_price = ($product_details['price'] + $extra_cost) * $quantity;
                }
                $mprice = $product_details['price'] + $extra_cost;
                $cid = $cartdata['products'][$product_id]['id'];
                $this->db->set('total_price', $total_price);
                $this->db->set('price', $mprice);
                $this->db->set('extra_price', $extra_cost);
                $this->db->where('id', $cid); //set column_name and value in which row need to update
                $this->db->update('cart'); //
                $display_index = 1;
                foreach ($custom_dict as $key => $value) {
                    $custom_array = array(
                        'style_key' => $key,
                        'style_value' => $value,
                        'display_index' => $display_index,
                        'cart_id' => $cid,
                    );
                    $this->db->insert('cart_customization', $custom_array);
                    $display_index++;
                }
            }
        } else {
            $session_cart = $this->session->userdata('session_cart');
            if ($session_cart) {
                $extprice = $session_cart['products'][$product_id]['price'] + $extra_cost;
                $quantity = $session_cart['products'][$product_id]['quantity'];
                $session_cart['products'][$product_id]['price'] = $extprice;
                $session_cart['products'][$product_id]['extra_price'] = $extra_cost;
                $session_cart['products'][$product_id]['total_price'] = $extprice * $quantity;
                $session_cart['products'][$product_id]['custom_dict'] = $custom_dict;
                $this->session->set_userdata('session_cart', $session_cart);
            } else {
                $cartdata = array('products' => array(), 'total_quantity' => 0, 'custome_items' => [],
                    'custome_items_name' => [], 'total_price' => 0);
                $this->session->set_userdata('session_cart', $cartdata);
                $session_cart = $this->session->userdata('session_cart');
            }
        }
    }

    public function cartOperationCustomCopy($user_id = "guest") {

        $session_cart = $this->session->userdata('session_cart');
        $productlist = $session_cart['products'];

        foreach ($productlist as $key => $value) {
            $quantity = $value['quantity'];
            $product_id = $value['product_id'];
            $item_id = $value['item_id'];
            $item_name = $value['item_name'];
            $product_details = $this->productDetails($product_id, $item_id);
            $product_dict = array(
                'title' => $product_details['title'],
                'price' => $value['price'],
                'extra_price' => isset($value['extra_price']) ? $value['extra_price'] : 0,
                'sku' => $product_details['sku'], 'folder' => $product_details['folder'],
                'attrs' => "",
                'vendor_id' => $product_details['user_id'],
                'total_price' => $value['total_price'],
                'file_name' => custome_image_server . PRODUCT_PATH_PRE . $product_details['folder'] . PRODUCT_PATH_POST,
                'quantity' => $quantity,
                'user_id' => $user_id,
                'item_id' => $item_id,
                'item_name' => $item_name,
                'credit_limit' => $product_details['credit_limit'] ? $product_details['credit_limit'] : 0,
                'product_id' => $product_id,
                'op_date_time' => date('Y-m-d H:i:s'),
            );
            if (isset($value['custom_dict'])) {
                $custom_dict = $value['custom_dict'];
                $this->db->insert('cart', $product_dict);
                $last_id = $this->db->insert_id();
                $display_index = 1;
                foreach ($custom_dict as $key => $value) {
                    $custom_array = array(
                        'style_key' => $key,
                        'style_value' => $value,
                        'display_index' => $display_index,
                        'cart_id' => $last_id,
                    );
                    $this->db->insert('cart_customization', $custom_array);
                    $display_index++;
                }
            }
        }
    }

    public function cartOperationCustomCopyOrder($order_id) {

        $session_cart = $this->session->userdata('session_cart');
        $productlist = $session_cart['products'];

        foreach ($productlist as $key => $value) {
            $quantity = $value['quantity'];
            $product_id = $value['product_id'];
            $item_id = $value['item_id'];
            $item_name = $value['item_name'];
            $product_details = $this->productDetails($product_id, $item_id);
            $product_dict = array(
                'title' => $product_details['title'],
                'price' => $value['price'],
                'extra_price' => isset($value['extra_price']) ? $value['extra_price'] : 0,
                'sku' => $product_details['sku'], 'folder' => $product_details['folder'],
                'attrs' => "",
                'vendor_id' => $product_details['user_id'],
                'total_price' => $value['total_price'],
                'file_name' => custome_image_server . PRODUCT_PATH_PRE . $product_details['folder'] . PRODUCT_PATH_POST,
                'quantity' => $quantity,
                'user_id' => 'guest',
                'item_id' => $item_id,
                'item_name' => $item_name,
                'credit_limit' => $product_details['credit_limit'] ? $product_details['credit_limit'] : 0,
                'product_id' => $product_id,
                'order_id' => $order_id,
                'op_date_time' => date('Y-m-d H:i:s'),
            );
            $custom_dict = $value['custom_dict'];
            $this->db->insert('cart', $product_dict);
            $last_id = $this->db->insert_id();
            $display_index = 1;
            foreach ($custom_dict as $key => $value) {
                $custom_array = array(
                    'style_key' => $key,
                    'style_value' => $value,
                    'display_index' => $display_index,
                    'cart_id' => $last_id,
                );
                $this->db->insert('cart_customization', $custom_array);
                $display_index++;
            }
        }
    }

    public function AppointmentDataByCountry($country) {
        $this->db->where('country', $country);
        $this->db->group_by('aid');
        $this->db->order_by('id');
        $query = $this->db->get('appointment_entry');
        $countryAppointment = $query->result_array();

        $appointmentData = array();

        foreach ($countryAppointment as $akey => $avalue) {
            $aid = $avalue['aid'];
            $this->db->where('aid', $aid);
            
            $query = $this->db->get('appointment_entry');
            $timeData = $query->result_array();
            $avalue['dates'] = array();
            foreach ($timeData as $tkey => $tvalue) { 
                $temparray = array();
                $temparray['date'] = $tvalue['date'];
                $temparray['timing1'] = $tvalue['from_time'];
                $temparray['timing2'] = $tvalue['to_time'];
                array_push($avalue['dates'], $temparray);
            }
            array_push($appointmentData, $avalue);
        }
        
        return $appointmentData;
    }
    
    public function AppointmentDataAll() {
        $date=date("Y-m-d");
        $this->db->where('date>=', $date);
        $this->db->group_by('aid');
        $this->db->order_by('id');
        $query = $this->db->get('appointment_entry');
        $countryAppointment = $query->result_array();

        $appointmentData = array();

        foreach ($countryAppointment as $akey => $avalue) {
            $aid = $avalue['aid'];
            $this->db->where('aid', $aid);
            
            $query = $this->db->get('appointment_entry');
            $timeData = $query->result_array();
            $avalue['dates'] = array();
            foreach ($timeData as $tkey => $tvalue) { 
                $temparray = array();
                $temparray['date'] = $tvalue['date'];
                $temparray['timing1'] = $tvalue['from_time'];
                $temparray['timing2'] = $tvalue['to_time'];
                array_push($avalue['dates'], $temparray);
            }
            array_push($appointmentData, $avalue);
        }
        
        return $appointmentData;
    }
    
    

}

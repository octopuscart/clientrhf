<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH . 'libraries/REST_Controller.php');

class Api extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->library('session');
        $this->checklogin = $this->session->userdata('logged_in');
        $this->user_id = $this->session->userdata('logged_in')['login_id'];
    }

    public function index() {
        $this->load->view('welcome_message');
    }

    //function for product list
    function cartOperation_post() {
        $product_id = $this->post('product_id');
        $quantity = $this->post('quantity');
        $item_id = $this->post('custome_id');

        if ($this->checklogin) {
            $session_cart = $this->Product_model->cartOperation($product_id, $quantity, $item_id, $this->user_id);
            $session_cart = $this->Product_model->cartDataCustome($this->user_id);
        } else {
            $session_cart = $this->Product_model->cartOperation($product_id, $quantity, $item_id);
            $session_cart = $this->Product_model->cartDataCustome();
        }

        $this->response($session_cart['products'][$product_id]);
    }

    //multiple customization cart
    function cartOperationMultiple_get() {
        if ($this->checklogin) {
            $session_cart = $this->Product_model->cartData($this->user_id);
        } else {
            $session_cart = $this->Product_model->cartData();
        }

        $tempss = array();
        foreach ($session_cart['products'] as $key => $value) {

            $tempss[$key] = $value;
            print_r($value);
        }
        $session_cart['products'] = $tempss;
        $this->response($session_cart);
    }

    function cartOperationMultiple_post() {
        $product_id = $this->post('product_id');
        $quantity = $this->post('quantity');
        $item_id = $this->post('item_id');
        if ($this->checklogin) {
            $session_cart = $this->Product_model->cartOperation($product_id, $quantity, $item_id, $this->user_id);
            $session_cart = $this->Product_model->cartData($this->user_id);
        } else {
            $session_cart = $this->Product_model->cartOperation($product_id, $quantity, $item_id);
            $session_cart = $this->Product_model->cartData();
        }
        $this->response($session_cart['products'][$product_id]);
    }

    //end of multiple customization



    function cartOperationNoCustom_get() {
        if ($this->checklogin) {
            $session_cart = $this->Product_model->cartDataNoCustome($this->user_id);
        } else {
            $session_cart = $this->Product_model->cartDataNoCustome();
        }
        $this->response($session_cart);
    }

    function cartOperationCustom_get() {
        if ($this->checklogin) {
            $session_cart = $this->Product_model->cartDataCustome($this->user_id);
        } else {
            $session_cart = $this->Product_model->cartDataCustome();
        }
        $this->response($session_cart);
    }

    function cartOperation_get() {
        if ($this->checklogin) {
            $session_cart = $this->Product_model->cartData($this->user_id);
        } else {
            $session_cart = $this->Product_model->cartData();
        }
        $this->response($session_cart);
    }

    function cartOperationDelete_get($product_id) {
        if ($this->checklogin) {
            $cartdata = $this->Product_model->cartData($this->user_id);
            $cid = $cartdata['products'][$product_id]['id'];
            $this->db->where('id', $cid); //set column_name and value in which row need to update
            $this->db->delete('cart'); //
        } else {
            $session_cart = $this->session->userdata('session_cart');
            unset($session_cart['products'][$product_id]);
            $this->session->set_userdata('session_cart', $session_cart);
        }
    }

    function cartOperationPut_get($product_id, $quantity) {
        if ($this->checklogin) {
            $cartdata = $this->Product_model->cartData($this->user_id);
            $total_price = $cartdata['products'][$product_id]['price'] * $quantity;
            $total_quantity = $quantity;
            $cid = $cartdata['products'][$product_id]['id'];
            $this->db->set('quantity', $total_quantity);
            $this->db->set('total_price', $total_price);
            $this->db->where('id', $cid); //set column_name and value in which row need to update
            $this->db->update('cart'); //
        } else {
            $session_cart = $this->session->userdata('session_cart');
            $session_cart['products'][$product_id]['quantity'] = $quantity;
            $price = $session_cart['products'][$product_id]['price'];
            $session_cart['products'][$product_id]['total_price'] = $quantity * $price;
            $this->session->set_userdata('session_cart', $session_cart);
        }
    }

    //Product 
    public function SearchSuggestApi_get($keyword) {
        $query = $this->db->select('title, id, file_name')->from('products')->where("keywords LIKE '%$keyword%' or title LIKE '%$keyword%' ")->get();
        $searchobj = $query->result_array();

        $pquery = "select title, file_name, id from (
                    (SELECT title, file_name, id from products where keywords like '%$keyword%' )
                   union 
                   (SELECT title, file_name, id from products where title like '%$keyword%')
                    ) as search group by id   
                  ";
        $attr_products = $this->Product_model->query_exe($pquery);


        $this->response($searchobj);
    }

    public function SearchSuggestApiJUI_get() {
        $getdata = $this->get();
        $keyword = $getdata['term'];
        $query = $this->db->select('title, id')->from('products')->where("keywords LIKE '%$keyword%'")->get();
        $searchobj = $query->result_array();
        $this->response($searchobj);
    }

    //ProductList APi
    public function productListApi_get($category_id) {
        $attrdatak = $this->get();
        $products = [];
        $countpr = 0;
        $pricequery = "";

        $startpage = $attrdatak["start"] - 1;
        $endpage = $attrdatak["end"];
        unset($attrdatak["start"]);
        unset($attrdatak["end"]);
        
         $psearch = "";
        if (isset($attrdatak["search"])) {
            $searchdata = $attrdatak["search"];
            unset($attrdatak["search"]);
            if($searchdata){
            $psearch = " and title like '%$searchdata%' ";
            }
        }

        if (isset($attrdatak["minprice"])) {
            $mnpricr = $attrdatak["minprice"] - 1;
            $mxpricr = $attrdatak["maxprice"] + 1;
            unset($attrdatak["minprice"]);
            unset($attrdatak["maxprice"]);
            $pricequery = " and (price between '$mnpricr' and '$mxpricr') ";
        }

        foreach ($attrdatak as $key => $atv) {
            if ($atv) {
                $countpr += 1;
                $key = str_replace("a", "", $key);
                $val = str_replace("-", ", ", $atv);
                $query_attr = "SELECT product_id FROM product_attribute
                           where  attribute_id in ($key) and attribute_value_id in ($val)
                           group by product_id";
                $queryat = $this->db->query($query_attr);
                $productslist = $queryat->result();
                foreach ($productslist as $key => $value) {
                    array_push($products, $value->product_id);
                }
            }
        }
        //print_r($products);

        $productdict = [];

        $productcheck = array_count_values($products);


        //print_r($productcheck);

        foreach ($productcheck as $key => $value) {
            if ($value == $countpr) {
                array_push($productdict, $key);
            }
        }

        $proquery = "";
        if (count($productdict)) {
            $proquerylist = implode(",", $productdict);
            $proquery = " and pt.id in ($proquerylist) ";
        }

        $categoriesString = $this->Product_model->stringCategories($category_id) . ", " . $category_id;
        $categoriesString = ltrim($categoriesString, ", ");

        $product_query = "select pt.id as product_id, pt.*
            from products as pt where pt.category_id in ($categoriesString) $psearch $pricequery $proquery and status = 1 order by display_index desc";
        $product_result = $this->Product_model->query_exe($product_query);

        $productListSt = [];

        $productListFinal = [];

        $pricecount = [];

        foreach ($product_result as $key => $value) {
            $value['attr'] = $this->Product_model->singleProductAttrs($value['product_id']);
            array_push($productListSt, $value['product_id']);
            array_push($pricecount, $value['price']);
            array_push($productListFinal, $value);
        }

        $attr_filter = array();
        $pricelist = array();
        if (count($productListSt)) {
            $pricelist = array('maxprice' => max($pricecount), 'minprice' => min($pricecount));


            $productString = implode(",", $productListSt);


            $attr_query = "select count(cav.id) product_count, '' as checked, cav.attribute_value, cav.id, pa.attribute, pa.attribute_id from product_attribute as pa
        join category_attribute_value as cav on cav.id = pa.attribute_value_id
        where pa.product_id in ($productString)
        group by cav.id";
            $attr_result = $this->Product_model->query_exe($attr_query);


            foreach ($attr_result as $key => $value) {
                $filter = $value['attribute'];
                if (isset($attr_filter[$filter])) {
                    array_push($attr_filter[$filter], $value);
                } else {
                    $attr_filter[$filter] = [];
                    array_push($attr_filter[$filter], $value);
                }
            }
        }

        $this->output->set_header('Content-type: application/json');
        $productListFinal = array_slice($productListFinal, $startpage, 12);
        $productArray = array('attributes' => $attr_filter,
            'products' => $productListFinal,
            'product_count' => count($product_result),
            'price' => $pricelist);
        $this->response($productArray);
    }

    //ProductList APi
    public function productListSearchApi_get($searchkey) {
        $attrdatak = $this->get();
        $products = [];
        $countpr = 0;
        $searchtext = $searchkey;

        if (isset($attrdatak["minprice"])) {
            $mnpricr = $attrdatak["minprice"] - 1;
            $mxpricr = $attrdatak["maxprice"] + 1;
            unset($attrdatak["minprice"]);
            unset($attrdatak["maxprice"]);
            $pricequery = " and (price between '$mnpricr' and '$mxpricr') ";
        }

        foreach ($attrdatak as $key => $atv) {
            if ($atv) {
                $countpr += 1;
                $key = str_replace("a", "", $key);
                $val = str_replace("-", ", ", $atv);
                $query_attr = "SELECT product_id FROM product_attribute
                           where  attribute_id in ($key) and attribute_value_id in ($val)
                           group by product_id";
                $queryat = $this->db->query($query_attr);
                $productslist = $queryat->result();
                foreach ($productslist as $key => $value) {
                    array_push($products, $value->product_id);
                }
            }
        }
        //print_r($products);

        $productdict = [];

        $productcheck = array_count_values($products);


        //print_r($productcheck);

        foreach ($productcheck as $key => $value) {
            if ($value == $countpr) {
                array_push($productdict, $key);
            }
        }

        $proquery = "";
        if (count($productdict)) {
            $proquerylist = implode(",", $productdict);
            $proquery = " and pt.id in ($proquerylist) ";
        }

        $categoriesString = $this->Product_model->stringCategories($category_id) . ", " . $category_id;
        $categoriesString = ltrim($categoriesString, ", ");

        $product_query = "
                       
    select * from(
    (select pt.id as product_id, pt.* from products as pt where keywords like '%$searchtext%') 
    union
    (select pt.id as product_id, pt.* from products as pt where title like '%$searchtext%' )
        ) as pt where pt.id > 0 

                "
                . " $pricequery $proquery";
        $product_result = $this->Product_model->query_exe($product_query);

        $productListSt = [];

        $productListFinal = [];

        $pricecount = [];

        foreach ($product_result as $key => $value) {
            $value['attr'] = $this->Product_model->singleProductAttrs($value['product_id']);
            array_push($productListSt, $value['product_id']);
            array_push($pricecount, $value['price']);
            array_push($productListFinal, $value);
        }

        $attr_filter = array();
        $pricelist = array();
        if (count($productListSt)) {
            $pricelist = array('maxprice' => max($pricecount), 'minprice' => min($pricecount));


            $productString = implode(",", $productListSt);


            $attr_query = "select count(cav.id) product_count, '' as checked, cav.attribute_value, cav.id, pa.attribute, pa.attribute_id from product_attribute as pa
        join category_attribute_value as cav on cav.id = pa.attribute_value_id
        where pa.product_id in ($productString)
        group by cav.id";
            $attr_result = $this->Product_model->query_exe($attr_query);


            foreach ($attr_result as $key => $value) {
                $filter = $value['attribute'];
                if (isset($attr_filter[$filter])) {
                    array_push($attr_filter[$filter], $value);
                } else {
                    $attr_filter[$filter] = [];
                    array_push($attr_filter[$filter], $value);
                }
            }
        }
        ob_clean();
        $this->output->set_header('Content-type: application/json');
        $productArray = array('attributes' => $attr_filter,
            'products' => $productListFinal,
            'product_count' => count($product_result),
            'price' => $pricelist);
        $this->response($productArray);
    }

    //category list api
    function categoryMenu_get() {
        $categories = $this->Product_model->productListCategories(0);
        $this->response($categories);
    }

    //order detail get
    function orderDetails_get($order_id) {
        $order_details = $this->Product_model->getOrderDetails($order_id);
        $this->response($order_details);
    }

    function order_mail_get($order_id, $order_no) {
        $subject = "Order Confirmation - Your Order with www.bespoketailorshk.com [$order_no] has been successfully placed!";
        $this->Product_model->order_mail($order_id, $subject);
    }

    function order_mailcheck_get($order_id, $order_no) {
        $this->db->where('order_id', $order_id);
        $query = $this->db->get('user_order_log');
        $orderlog = $query->result_array();
        if (count($orderlog)) {
            $this->response(array('checkpre' => '1'));
        } else {
            $this->response(array('checkpre' => '0'));
        }
    }

    function order_mailchecksend_get($order_id, $order_no) {
        $subject = "Order Confirmation - Your Order with www.bespoketailorshk.com [$order_no] has been successfully placed!";
        $this->Product_model->order_mail($order_id, $subject);
    }

    function orderMailVender_get($order_id) {
        $this->Product_model->order_mail_to_vendor($order_id);
        $this->response("hell");
    }

    function cartOperationShirt_get() {
        if ($this->checklogin) {
            $session_cart = $this->Product_model->cartData($this->user_id);
        } else {
            $session_cart = $this->Product_model->cartData();
        }

        $tempss = array();
        foreach ($session_cart['products'] as $key => $value) {

            $tempss[$key] = $value;
            $tempss[$key]['folder'] = $value['folder'];


            $prodct_details = $this->Product_model->productDetails($value['product_id']);
            $tempss[$key]['file_name2'] = $prodct_details['file_name2'];
        }
        $session_cart['products'] = $tempss;
        $this->response($session_cart);
    }

    function cartOperationShirtSingle_get($product_id) {
        $prodct_details = $this->Product_model->productDetails($product_id);
//        $prodct_details['folder'] = $prodct_details['title'];
        $this->response($prodct_details);
    }

    //function for product list
    function cartOperationCustom_post() {
        $product_id = $this->post('product_id');
        $quantity = $this->post('quantity');
        $custome_id = $this->post('custome_id');
        $customekey = $this->post('customekey');
        $customevalue = $this->post('customevalue');
        $extra_cost = $this->post('extra_price');

        if ($this->checklogin) {
            $session_cart = $this->Product_model->cartOperationCustom($product_id, $quantity, $custome_id, $customekey, $customevalue, $extra_cost, $this->user_id);
            $session_cart = $this->Product_model->cartDataCustome($this->user_id);
        } else {
            $session_cart = $this->Product_model->cartOperationCustom($product_id, $quantity, $custome_id, $customekey, $customevalue, $extra_cost);
            $session_cart = $this->Product_model->cartDataCustome();
        }

        $this->response($session_cart['products'][$product_id]);
    }

    //cartOperationCustomMulti
    function cartOperationCustomMulti_post() {
        $product_id = $this->post('product_id');
        $quantity = $this->post('quantity');
        $custome_id = $this->post('custome_id');
        $customekey = $this->post('customekey');
        $customevalue = $this->post('customevalue');
        $extra_cost = $this->post('extra_price');

        if ($this->checklogin) {
            $session_cart = $this->Product_model->cartOperationCustomMulti($product_id, $quantity, $custome_id, $customekey, $customevalue, $extra_cost, $this->user_id);
            $session_cart = $this->Product_model->cartDataCustome($this->user_id);
        } else {
            $session_cart = $this->Product_model->cartOperationCustomMulti($product_id, $quantity, $custome_id, $customekey, $customevalue, $extra_cost);
            $session_cart = $this->Product_model->cartDataCustome();
        }

        $this->response($session_cart['products'][$product_id]);
    }

    function customeElements_get() {
        $customeele = array(
            "keys" => [
                array(
                    "title" => "Collar",
                    "viewtype" => "front",
                    "type" => "main",
                ),
                array(
                    "title" => "Collar Insert",
                    "viewtype" => "front",
                    "type" => "submain",
                ),
                array(
                    "title" => "Cuff & Sleeve",
                    "viewtype" => "front",
                    "type" => "main",
                ),
                array(
                    "title" => "Cuff Insert",
                    "viewtype" => "front",
                    "type" => "submain",
                ),
                array(
                    "title" => "Front",
                    "viewtype" => "front",
                    "type" => "main",
                ),
                array(
                    "title" => "Back",
                    "viewtype" => "back",
                    "type" => "main",
                ),
                array(
                    "title" => "Pocket",
                    "viewtype" => "front",
                    "type" => "main",
                ),
                array(
                    "title" => "Bottom",
                    "viewtype" => "front",
                    "type" => "main",
                ),
//                array(
//                    "title" => "Buttons",
//                    "viewtype" => "front",
//                    "type" => "main",
//                ),
                array(
                    "title" => "Monogram",
                    "viewtype" => "front",
                    "type" => "main",
                ),
            ],
            "collar_cuff_insert" => array(),
            "data" => array(
                "Monogram" => [
                    array(
                        "status" => "1",
                        "title" => "No",
                        "css_class" => "monogramtext_posistion_none",
                        "not_show_when" => [],
                        "checkwith" => "",
                        "image" => "no_monogram.jpg"
                    ),
                    array(
                        "status" => "0",
                        "title" => "Collar",
                        "css_class" => "monogramtext_posistion_collar",
                        "not_show_when" => [],
                        "image" => "monogram_inside_coller_band.jpg"
                    ),
                    array(
                        "status" => "0",
                        "title" => "Cuff",
                        "css_class" => "monogramtext_posistion_cuff_left",
                        "not_show_when" => ["Short Sleeve Without Cuff", "Short Sleeve With Cuff"],
                        "checkwith" => "Cuff & Sleeve",
                        "image" => "monogram_left_cuff.jpg"
                    ),
                    array(
                        "status" => "0",
                        "title" => "Pocket",
                        "css_class" => "monogramtext_posistion_left_pocket",
                        "not_show_when" => ["No Pocket"],
                        "checkwith" => "Pocket",
                        "image" => "monogram_left_chest_pocket.jpg"
                    )],
                "Buttons" => [
                    array(
                        "status" => "1",
                        "title" => "Standard",
                        "customization_category_id" => "8",
                    ), array(
                        "status" => "0",
                        "title" => "Matching",
                        "customization_category_id" => "8",
                    )],
                "Bottom" => [
                    array(
                        "status" => "1",
                        "title" => "Rounded",
                        "elements" => ["shirtbody_round0001.png"],
                        "customization_category_id" => "6",
                        "image" => "bottom_rounded.jpeg"
                    ), array(
                        "status" => "0",
                        "title" => "Squared",
                        "elements" => ["shirtbody_squre0001.png"],
                        "customization_category_id" => "6",
                        "image" => "bottom_squred.jpeg"
                    )],
                "Cuff & Sleeve" => [
                    array(
                        "status" => "0",
                        "title" => "Short Sleeve Without Cuff",
                        "elements" => [],
                        "customization_category_id" => "3",
                        "image" => "withoutcuff_sort.jpg",
                        "sleeve1" => ["shirtbody_half_sleeve0001.png",],
                        "sleeve" => ["b_shirtbody_half0001.png", "back_half_sleeve0001.png",],
                        "monogram_change_css" => "monogramtext_posistion_collar",
                        "monogram_position" => array(
                            "status" => "0",
                            "title" => "Collar",
                            "css_class" => "monogramtext_posistion_collar",
                        ),
                    ), array(
                        "status" => "1",
                        "title" => "Single Cuff Rounded",
                        "elements" => [ "cuff_m_rounded20001.png"],
                        "insertele" => [ "cuff_m_rounded30001.png"],
                        "inserteleo" => [ "cuff_m_rounded30001.png"],
                        "customization_category_id" => "3",
                        "image" => "cuff_single_rounded.jpg",
                        "sleeve1" => ["shirt_sleeve0001.png"],
                        "insert_style_css" => "",
                        "insert_style" => "cuff_m_rounded20001.png",
                        "insert_overlay" => "cuff_single_insert_overlay.png",
                        "insert_overlay_css" => "",
                        "insert_full" => ["cuff_single_rounded0001.png"],
                        "sleeve" => ["b_full_shirt_sleeve0001.png",],
                        "buttons" => "cuff_s_button10001.png",
                    ), array(
                        "status" => "0",
                        "title" => "Single Cuff Cutaway",
                        "elements" => [ "cuff_m_cutaway20001.png"],
                        "insertele" => [ "cuff_m_cutaway30001.png"],
                        "inserteleo" => [ "cuff_m_cutaway30001.png"],
                        "customization_category_id" => "3",
                        "image" => "single_cuff_cutaway.jpg",
                        "insert_style_css" => "",
                        "sleeve1" => ["shirt_sleeve0001.png"],
                        "insert_style" => "cuff_m_cutaway20001.png",
                        "insert_overlay" => "cuff_single_insert_overlay.png",
                        "insert_overlay_css" => "",
                        "insert_full" => ["cuff_single_cutaway0001.png"],
                        "sleeve" => ["b_full_shirt_sleeve0001.png",],
                        "buttons" => "cuff_s_button10001.png",
                    ), array(
                        "status" => "0",
                        "title" => "Single Cuff Squred",
                        "elements" => [ "cuff_m_squre20001.png"],
                        "insertele" => [ "cuff_m_cutaway30001.png"],
                        "inserteleo" => [ "cuff_m_cutaway30001.png"],
                        "customization_category_id" => "3",
                        "image" => "cuff_single_squred.jpg",
                        "insert_style_css" => "",
                        "sleeve1" => ["shirt_sleeve0001.png"],
                        "insert_style" => "cuff_m_cutaway20001.png",
                        "insert_overlay" => "cuff_single_insert_overlay.png",
                        "insert_overlay_css" => "",
                        "insert_full" => ["cuff_single_cutaway0001.png"],
                        "sleeve" => ["b_full_shirt_sleeve0001.png",],
                        "buttons" => "cuff_s_button10001.png",
                    ), array(
                        "status" => "0",
                        "title" => "2 Buttons Cutaway",
                        "customization_category_id" => "3",
                        "sleeve1" => ["shirt_sleeve0001.png"],
                        "elements" => [ "cuff_m_cutaway20001.png"],
                        "insertele" => [ "cuff_m_cutaway30001.png"],
                        "inserteleo" => [ "cuff_m_cutaway30001.png"],
                        "image" => "2_buttons_cutaway.jpg",
                        "insert_style_css" => "",
                        "insert_style" => "cuff_m_cutaway20001.png",
                        "insert_overlay" => "cuff_single_insert_overlay.png",
                        "insert_overlay_css" => "",
                        "insert_full" => ["cuff_single_cutaway0001.png"],
                        "sleeve" => ["b_full_shirt_sleeve0001.png",],
                        "buttons" => "cuff_s_button20001.png",
                    ), array(
                        "status" => "0",
                        "title" => "2 Buttons Rounded",
                        "sleeve1" => ["shirt_sleeve0001.png"],
                        "elements" => [ "cuff_m_rounded20001.png"],
                        "insertele" => [ "cuff_m_rounded30001.png"],
                        "inserteleo" => [ "cuff_m_rounded30001.png"],
                        "customization_category_id" => "3",
                        "image" => "2_buttons_rounded.jpg",
                        "insert_style_css" => "",
                        "insert_style" => "cuff_m_rounded20001.png",
                        "insert_overlay" => "cuff_single_insert_overlay.png",
                        "insert_overlay_css" => "",
                        "insert_full" => ["cuff_single_rounded0001.png"],
                        "sleeve" => ["b_full_shirt_sleeve0001.png",],
                        "buttons" => "cuff_s_button20001.png",
                    ), array(
                        "status" => "0",
                        "title" => "French Cuff Squred",
                        "sleeve1" => ["shirt_sleeve0001.png"],
                        "customization_category_id" => "3",
                        "elements" => [ "cuff_m_franch_squre_insert0001.png", "cuff_m_franch_squre0001.png"],
                        "insertele" => [ "cuff_m_franch_squre0001.png"],
                        "inserteleo" => [ "cuff_m_franch_squre0001.png"],
                        "image" => "cuff_franch_rounded.jpg",
                        "insert_style_css" => "",
                        "insert_style" => "cuff_m_franch_squre_insert0001.png",
                        "insert_overlay" => "cuff_franch_insert_overlay.png",
                        "insert_overlay_css" => "",
                        "insert_full" => ["cuff_franch_rounded0001.png"],
                        "buttons" => "cuff_m_franch_squre_button0001.png",
                        "sleeve" => ["b_full_shirt_sleeve0001.png"],
                    )
                    , array(
                        "status" => "0",
                        "title" => "French Cuff Cutaway",
                        "sleeve1" => ["shirt_sleeve0001.png"],
                        "customization_category_id" => "3",
                        "elements" => [ "cuff_m_franch_cutaway20001.png"],
                        "insertele" => [],
                        "inserteleo" => [ "cuff_m_franch_squre0001.png"],
                        "image" => "cufffranchcuffcutaway.jpeg",
                        "insert_style_css" => "",
                        "insert_style" => "",
                        "insert_overlay" => "cuff_franch_insert_overlay.png",
                        "insert_overlay_css" => "",
                        "insert_full" => ["cuff_franch_rounded0001.png"],
                        "buttons" => "cuff_m_franch_squre_button0001.png",
                        "sleeve" => ["b_full_shirt_sleeve0001.png"],
                    ),
                    array(
                        "status" => "0",
                        "title" => "Convertible Cuff Cutaway",
                        "elements" => [ "cuff_m_cutaway20001.png"],
                        "insertele" => [ "cuff_m_cutaway30001.png"],
                        "inserteleo" => [ "cuff_m_cutaway30001.png"],
                        "customization_category_id" => "3",
                        "image" => "convertiblecutaway.jpeg",
                        "insert_style_css" => "",
                        "sleeve1" => ["shirt_sleeve0001.png"],
                        "insert_style" => "cuff_m_cutaway20001.png",
                        "insert_overlay" => "cuff_single_insert_overlay.png",
                        "insert_overlay_css" => "",
                        "insert_full" => ["cuff_single_cutaway0001.png"],
                        "sleeve" => ["b_full_shirt_sleeve0001.png",],
                        "buttons" => "cuff_s_button10001.png",
                    )
                ],
                "Back" => [
                    array(
                        "status" => "1",
                        "title" => "Plain",
                        "customization_category_id" => "5",
                        "halfsleeve" => ["back_half_sleeve0001.png", "back_half_sleeve_cuff0001.png"],
                        "fullsleeve" => ["b_full_shirt_sleeve0001.png",],
                        "elements" => [ "b_shirtbody_round0001.png", "b_shirtbody_squre0001.png", "yoke0001.png"],
                        "overlay" => "",
                        "image" => "back_plain.jpeg"
                    ), array(
                        "status" => "0",
                        "title" => "Two Side",
                        "customization_category_id" => "5",
                        "halfsleeve" => ["back_half_sleeve0001.png", "back_half_sleeve_cuff0001.png"],
                        "fullsleeve" => ["b_full_shirt_sleeve0001.png", "b_full_shirt_sleeve0001.png",],
                        "overlay" => "back_two_side_plea_over_lay.png",
                        "elements" => ["b_shirtbody_round0001.png", "b_shirtbody_squre0001.png", "shirtbody_pleat_side0001.png", "yoke0001.png"],
                        "image" => "back_two_side.jpeg"
                    ), array(
                        "status" => "0",
                        "title" => "Boxpleat",
                        "customization_category_id" => "5",
                        "halfsleeve" => ["back_half_sleeve0001.png", "back_half_sleeve_cuff0001.png"],
                        "fullsleeve" => ["b_full_shirt_sleeve0001.png", "back_full_sleeve_cuff0001.png"],
                        "overlay" => "box_pleat_overlay1.png",
                        "elements" => [ "b_shirtbody_round0001.png", "b_shirtbody_squre0001.png", "shirtbody_pleat_box0001.png", "yoke0001.png"],
                        "image" => "back_box_pleat.jpeg"
                    ), array(
                        "status" => "0",
                        "title" => "Dart",
                        "customization_category_id" => "5",
                        "halfsleeve" => ["back_half_sleeve0001.png", "back_half_sleeve_cuff0001.png"],
                        "fullsleeve" => ["b_full_shirt_sleeve0001.png", "back_full_sleeve_cuff0001.png"],
                        "overlay" => "dart_overlay1.png",
                        "elements" => ["b_shirtbody_round0001.png", "b_shirtbody_squre0001.png", "dart20001.png", "yoke0001.png"],
                        "image" => "dart.jpeg"
                    )],
                "Pocket" => [
                    array(
                        "status" => "0",
                        "title" => "No Pocket",
                        "customization_category_id" => "7",
                        "elements" => [],
                        "image" => "pocket_no.jpeg",
                        "monogram_change_css" => "monogramtext_posistion_collar",
                        "monogram_position" => array(
                            "status" => "0",
                            "title" => "Collar",
                            "css_class" => "monogramtext_posistion_collar",
                        ),
                    ), array(
                        "status" => "1",
                        "title" => "1 Pocket",
                        "customization_category_id" => "7",
                        "elements" => ["shirtbody_pocket_right20001.png",],
                        "image" => "pocket_one.jpeg"
                    ), array(
                        "status" => "0",
                        "title" => "2 Pocket",
                        "customization_category_id" => "7",
                        "elements" => ["shirtbody_pocket_right20001.png", "shirtbody_pocket_left20001.png"],
                        "image" => "pocket_two.jpeg"
                    )],
                "Front" => [
                    array(
                        "status" => "0",
                        "title" => "Plain Front",
                        "customization_category_id" => "4",
                        "elements" => [],
                        "image" => "front_plain.jpeg",
                        "show_buttons" => "true",
                    ), array(
                        "status" => "0",
                        "title" => "Fly Front",
                        "elements" => [ "flyfront0001.png"],
                        "customization_category_id" => "4",
                        "image" => "front_fly.jpeg",
                        "show_buttons" => "false",
                    )
                    , array(
                        "status" => "1",
                        "title" => "Pleated",
                        "elements" => [ "flyfront0001.png"],
                        "customization_category_id" => "4",
                        "image" => "front_ivy.jpeg",
                        "show_buttons" => "true",
                    )
                ],
                "Collar" => [
                    array(
                        "status" => "1",
                        "title" => "Regular",
                        "elements" => [ "collar_ragular_5w0001.png"],
                        "customization_category_id" => "2",
                        "insert_style" => "collar_m_comman_insert20001.png",
                        "insert_overlay" => "collar_simple_insert_overlay.png",
                        "insert_full" => ["collar_m_regular20001.png"],
                        "image" => "collar_regular.jpeg",
                        "buttons" => "buttonsh1.png",
                    ), array(
                        "status" => "0",
                        "title" => "Medium Spread",
                        "customization_category_id" => "2",
                        "insert_style" => "collar_m_comman_insert20001.png",
                        "insert_overlay" => "collar_simple_insert_overlay.png",
                        "elements" => [ "collar_medium_spread_5w0001.png"],
                        "insert_full" => ["collar_m_medium_spread20001.png"],
                        "image" => "collar_medium_spread.jpeg",
                        "buttons" => "buttonsh1.png",
                    ), array(
                        "status" => "0",
                        "title" => "Full Cutaway",
                        "customization_category_id" => "2",
                        "insert_style" => "collar_m_comman_insert20001.png",
                        "insert_overlay" => "collar_simple_insert_overlay.png",
                        "insert_full" => ["collar_m_full_cutaway20001.png"],
                        "elements" => [ "collar_fullcutaway_5w0001.png"],
                        "image" => "collar_full_cutaway.jpeg",
                        "buttons" => "buttonsh1.png",
                    ), array(
                        "status" => "0",
                        "title" => "Wide Spread",
                        "customization_category_id" => "2",
                        "elements" => [ "collar_wide_spread_5w0001.png"],
                        "image" => "collar_wide_spread.jpeg",
                        "insert_style" => "collar_m_comman_insert0001.png",
                        "insert_overlay" => "collar_simple_insert_overlay.png",
                        "insert_full" => ["collar_wide_spread20001.png"],
                        "buttons" => "buttonsh1.png",
                    )
                    , array(
                        "status" => "0",
                        "title" => "Button Down",
                        "customization_category_id" => "2",
                        "elements" => [ "collar_button_down_5w0001.png"],
                        "image" => "collar_regular_button_down.jpeg",
                        "overlay" => [ "button_down_overlay.png"],
                        "insert_style" => "collar_m_comman_insert0001.png",
                        "insert_overlay" => "collar_simple_insert_overlay.png",
                        "insert_full" => ["collar_wide_spread20001.png"],
                        "buttons" => "collar_regular_button_down.jpeg",
                    )
                    , array(
                        "status" => "0",
                        "title" => "Hidden Button Down",
                        "customization_category_id" => "2",
                        "elements" => [ "collar_hidden_button_down_5w0001.png"],
                        "overlay" => [ "hidden_button_down_overlay.png"],
                        "image" => "hidden_button_down.jpeg",
                        "insert_style" => "collar_m_comman_insert0001.png",
                        "insert_overlay" => "collar_simple_insert_overlay.png",
                        "insert_full" => ["collar_wide_spread20001.png"],
                        "buttons" => "hidden_button_down.jpeg",
                    ),
                    array(
                        "status" => "0",
                        "title" => "Round Point",
                        "customization_category_id" => "2",
                        "elements" => [ "collar_round_point_5w0001.png"],
                        "image" => "collar_round_point.jpeg",
                        "insert_style" => "collar_m_comman_insert0001.png",
                        "insert_overlay" => "collar_simple_insert_overlay.png",
                        "insert_full" => ["collar_wide_spread20001.png"],
                        "buttons" => "hidden_button_down.jpeg",
                    ),
                    array(
                        "status" => "0",
                        "title" => "Wing Tip",
                        "customization_category_id" => "2",
                        "elements" => [ "collar_wingtip_5w0001.png"],
                        "image" => "collar_wingtip.jpeg",
                        "insert_style" => "collar_m_comman_insert0001.png",
                        "insert_overlay" => "collar_simple_insert_overlay.png",
                        "insert_full" => ["collar_wide_spread20001.png"],
                        "buttons" => "hidden_button_down.jpeg",
                    ),
                    array(
                        "status" => "0",
                        "title" => "Mandarian",
                        "customization_category_id" => "2",
                        "elements" => [ "collar_mandarian_5w0001.png"],
                        "image" => "collar_mandarin.jpeg",
                        "insert_style" => "collar_m_comman_insert0001.png",
                        "insert_overlay" => "collar_simple_insert_overlay.png",
                        "insert_full" => ["collar_wide_spread20001.png"],
                        "buttons" => "hidden_button_down.jpeg",
                    ),
                ]
            ),
            "cuff_collar_insert" => ["p10", "p11", "p2", "p18"],
            "monogram_colors" => [
                array(
                    "color" => "#fff",
                    "backcolor" => "#000080",
                    "title" => "Navy Blue"
                ),
                array(
                    "color" => "white",
                    "backcolor" => "#000",
                    "title" => "Black"
                ),
                array(
                    "color" => "#000",
                    "backcolor" => "#c0c0c0",
                    "title" => "Silver"
                ),
                array(
                    "color" => "red",
                    "backcolor" => "white",
                    "title" => "Red-White"
                ),
                array(
                    "color" => "white",
                    "backcolor" => "red",
                    "title" => "White-Red"
                ),
            ],
            "monogram_style" => [
                array(
                    "font_style" => "font-family: 'Orbitron';",
                    "title" => "8",
                    "image" => "8.jpg",
                ),
                array(
                    "font_style" => "font-family: 'Orbitron';",
                    "title" => "10",
                    "image" => "10.jpg",
                ),
                array(
                    "font_style" => "font-family: 'Black Ops One';",
                    "title" => "13",
                    "image" => "13.jpg",
                ),
                array(
                    "font_style" => "font-family: 'Bungee';",
                    "title" => "16",
                    "image" => "16.jpg",
                ),
                array(
                    "font_style" => "font-family: 'Bungee';",
                    "title" => "17",
                    "image" => "17.jpg",
                ),
                array(
                    "font_style" => "font-family: 'Bungee';",
                    "title" => "19",
                    "image" => "19.jpg",
                ),
                array(
                    "font_style" => "font-family: 'Wallpoet';",
                    "title" => "21",
                    "image" => "21.jpg",
                ),
            ],
        );
        foreach ($customeele as $key => $value) {
            
        }
        $this->response($customeele);
    }

    //function for product list
    function priceAsk_post() {
        $product_id = $this->post('product_id');
        $item_id = $this->post('item_id');
        $product_details = $this->Product_model->productDetails($product_id, $item_id);
        $session_enquiry_price = $this->session->userdata('session_enquiry_price');
        if ($session_enquiry_price) {
            if (isset($session_enquiry_price[$item_id])) {
                $session_enquiry_price[$item_id][$product_id] = $product_details;
            } else {
                $session_enquiry_price[$item_id] = array($product_id => $product_details);
            }
        } else {
            $session_enquiry_price = array($item_id => array($product_id => $product_details));
        }
        $this->session->set_userdata('session_enquiry_price', $session_enquiry_price);
    }

    function priceAsk_get($item_id) {
        $session_enquiry_price = $this->session->userdata('session_enquiry_price');
        if ($session_enquiry_price) {
            if (isset($session_enquiry_price[$item_id])) {
                $rdata = $session_enquiry_price[$item_id];
            }
            else{
                $rdata = array();
            }
        } else {
            $session_enquiry_price = array($item_id => array());
            $rdata = $session_enquiry_price[$item_id];
            $this->session->set_userdata('session_enquiry_price', $session_enquiry_price);
        }
        $this->response($rdata);
    }

    function priceAskDelete_get($item_id, $product_id) {
        $session_enquiry_price = $this->session->userdata('session_enquiry_price');

        unset($session_enquiry_price[$item_id][$product_id]);

        $this->session->set_userdata('session_enquiry_price', $session_enquiry_price);
    }

}

?>
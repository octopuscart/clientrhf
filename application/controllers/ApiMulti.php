<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH . 'libraries/REST_Controller.php');

class ApiMulti extends REST_Controller {

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

        if ($this->checklogin) {
            $session_cart = $this->Product_model->cartOperation($product_id, $quantity, $this->user_id);
            $session_cart = $this->Product_model->cartData($this->user_id);
        } else {
            $session_cart = $this->Product_model->cartOperation($product_id, $quantity);
            $session_cart = $this->Product_model->cartData();
        }

        $this->response($session_cart['products'][$product_id]);
    }

    function cartOperation_get() {
        if ($this->checklogin) {
            $session_cart = $this->Product_model->cartData($this->user_id);
        } else {
            $session_cart = $this->Product_model->cartData();
        }

        $this->response($session_cart);
    }

    function cartOperationShirt_get() {
        if ($this->checklogin) {
            $session_cart = $this->Product_model->cartDataNoCustome($this->user_id);
        } else {
            $session_cart = $this->Product_model->cartDataNoCustome();
        }

        $tempss = array();
        foreach ($session_cart['products'] as $key => $value) {
            if ($value['item_id'] == '1') {
                
                $tempss[$key] = $value;
            };
        }
        $session_cart['products'] = $tempss;
        $this->response($session_cart);
    }

    function cartOperationSuit_get($item_id) {
        if ($this->checklogin) {
            $session_cart = $this->Product_model->cartDataNoCustome($this->user_id);
        } else {
            $session_cart = $this->Product_model->cartDataNoCustome();
        }
        foreach ($session_cart['products'] as $key => $value) {
            if ($value['item_id'] == $item_id) {
                
                $tempss[$key] = $value;
            };
        }
        $session_cart['products'] = $tempss;
        $this->response($session_cart);
    }

    function cartOperation_delete($product_id) {
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

    function cartOperation_put($product_id, $quantity) {
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
//ProductList APi
    public function productListApi_get($category_id) {
        $attrdatak = $this->get();
        $products = [];
        $countpr = 0;


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
                           where attribute_id in ($key) and attribute_value_id in ($val)
                           group by product_id ";
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
        $pricequery = "";
        if (count($productdict)) {
            $proquerylist = implode(",", $productdict);
            $proquery = " and pt.id in ($proquerylist) ";
        }

        $categoriesString = $this->Product_model->stringCategories($category_id) . ", " . $category_id;
        $categoriesString = ltrim($categoriesString, ", ");

        $product_query = "select pt.id as product_id, pt.folder, pt.item_type, pt.sku, pt.title, pt.sale_price, pt.regular_price, pt.price, pt.file_name, pt.file_name1 
            from products as pt where pt.category_id in ($categoriesString) $pricequery $proquery 
                order by pt.id desc";
        try {
            $product_result = $this->Product_model->query_exe($product_query);
        } catch (Exception $e) {
            $product_result = [];
        }
        $product_list_st = [];

        $pricecount = [];

        foreach ($product_result as $key => $value) {
            array_push($product_list_st, $value['product_id']);
            array_push($pricecount, $value['price']);
        }

        $attr_filter = array();
        $pricelist = array();

        ob_clean();
        $productArray = array('attributes' => $attr_filter,
            'products' => $product_result,
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
        $subject = "Class Apart Store Order No. #" . $order_no . " Copy";
        $this->Product_model->order_mail($order_id, $subject);
    }

    function orderMailVender_get($order_id) {
        $this->Product_model->order_mail_to_vendor($order_id);
        $this->response("hell");
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
                        "elements" => ["body_round0001.png"],
                        "customization_category_id" => "6",
                        "image" => "bottom_rounded.jpeg"
                    ), array(
                        "status" => "0",
                        "title" => "Squared",
                        "elements" => ["body_squre0001.png"],
                        "customization_category_id" => "6",
                        "image" => "bottom_squred.jpeg"
                    )],
                "Cuff & Sleeve" => [
                    array(
                        "status" => "0",
                        "title" => "Short Sleeve Without Cuff",
                        "elements" => ["sleev_half0001.png",],
                        "customization_category_id" => "3",
                        "image" => "withoutcuff_sort.jpg",
                        "sleeve" => ["back_half_sleeve_cuff0001.png", "back_half_sleeve0001.png",],
                        "monogram_change_css" => "monogramtext_posistion_collar",
                        "monogram_position" => array(
                            "status" => "0",
                            "title" => "Collar",
                            "css_class" => "monogramtext_posistion_collar",
                        ),
                    ), array(
                        "status" => "0",
                        "title" => "Short Sleeve With Cuff",
                        "elements" => ["short_sleeve_cuff_10001.png", "sleev_half0001.png"],
                        "customization_category_id" => "3",
                        "image" => "withcuff_sort.jpg",
                        "sleeve" => ["back_half_sleeve_cuff0001.png", "back_half_sleeve0001.png"],
                        "monogram_change_css" => "monogramtext_posistion_collar",
                        "monogram_position" => array(
                            "status" => "0",
                            "title" => "Collar",
                            "css_class" => "monogramtext_posistion_collar",
                        ),
                    ), array(
                        "status" => "1",
                        "title" => "Single Cuff Rounded",
                        "elements" => ["sleev_full0001.png", "cuff_single_rounded0001.png"],
                        "customization_category_id" => "3",
                        "image" => "cuff_single_rounded.jpg",
                        "insert_style_css" => "",
                        "insert_style" => "cuff_single_insert10001.png",
                        "insert_overlay" => "cuff_single_insert_overlay.png",
                        "insert_overlay_css" => "",
                        "insert_full" => ["cuff_single_rounded0001.png"],
                        "sleeve" => ["back_full_sleeve_cuff0001.png", "back_full_sleeve0001.png",],
                        "sleeveoverlay" => ["sleev_full_overlay.png",],
                        "buttons" => "buttons_1_round.png",
                    ), array(
                        "status" => "0",
                        "title" => "Single Cuff Cutaway",
                        "elements" => ["sleev_full0001.png", "cuff_single_cutaway0001.png"],
                        "customization_category_id" => "3",
                        "image" => "single_cuff_cutaway.jpg",
                        "insert_style_css" => "",
                        "insert_style" => "cuff_single_insert10001.png",
                        "insert_overlay" => "cuff_single_insert_overlay.png",
                        "insert_overlay_css" => "",
                        "insert_full" => ["cuff_single_cutaway0001.png"],
                        "sleeve" => ["back_full_sleeve_cuff0001.png", "back_full_sleeve0001.png",],
                        "sleeveoverlay" => ["sleev_full_overlay.png",],
                        "buttons" => "buttons_1_round.png",
                    ), array(
                        "status" => "0",
                        "title" => "2 Buttons Cutaway",
                        "customization_category_id" => "3",
                        "elements" => ["sleev_full0001.png", "cuff_single_cutaway0001.png"],
                        "image" => "2_buttons_cutaway.jpg",
                        "insert_style_css" => "",
                        "insert_style" => "cuff_single_insert10001.png",
                        "insert_overlay" => "cuff_single_insert_overlay.png",
                        "insert_overlay_css" => "",
                        "insert_full" => ["cuff_single_cutaway0001.png"],
                        "sleeve" => ["back_full_sleeve_cuff0001.png", "back_full_sleeve0001.png",],
                        "sleeveoverlay" => ["sleev_full_overlay.png",],
                        "buttons" => "buttons_2_round.png",
                    ), array(
                        "status" => "0",
                        "title" => "2 Buttons Rounded",
                        "elements" => ["sleev_full0001.png", "cuff_single_rounded0001.png"],
                        "customization_category_id" => "3",
                        "image" => "2_buttons_rounded.jpg",
                        "insert_style_css" => "",
                        "insert_style" => "cuff_single_insert10001.png",
                        "insert_overlay" => "cuff_single_insert_overlay.png",
                        "insert_overlay_css" => "",
                        "insert_full" => ["cuff_single_rounded0001.png"],
                        "sleeve" => ["back_full_sleeve_cuff0001.png", "back_full_sleeve0001.png",],
                        "sleeveoverlay" => ["sleev_full_overlay.png",],
                        "buttons" => "buttons_2_round.png",
                    ), array(
                        "status" => "0",
                        "title" => "Convertible Cuff Rounded",
                        "elements" => ["sleev_full0001.png", "cuff_single_rounded0001.png"],
                        "customization_category_id" => "3",
                        "image" => "single_cuff_convertible.jpg",
                        "insert_style_css" => "",
                        "insert_style" => "cuff_single_insert10001.png",
                        "insert_overlay" => "cuff_single_insert_overlay.png",
                        "insert_overlay_css" => "",
                        "insert_full" => ["cuff_single_rounded0001.png"],
                        "sleeve" => ["back_full_sleeve_cuff0001.png", "back_full_sleeve0001.png",],
                        "sleeveoverlay" => ["sleev_full_overlay.png",],
                        "buttons" => "buttons_1_convertible_round.png",
                    ), array(
                        "status" => "0",
                        "title" => "French Cuff Rounded",
                        "customization_category_id" => "3",
                        "elements" => ["sleev_full0001.png", "cuff_franch_rounded20001.png"],
                        "image" => "cuff_franch_rounded.jpg",
                        "insert_style_css" => "",
                        "insert_style" => "cuff_franch_insert0001.png",
                        "insert_overlay" => "cuff_franch_insert_overlay.png",
                        "insert_overlay_css" => "",
                        "insert_full" => ["cuff_franch_rounded0001.png"],
                        "sleeve" => ["back_full_sleeve_cuff0001.png", "back_full_sleeve0001.png",],
                        "sleeveoverlay" => ["sleev_full_overlay.png",],
                    )],
                "Back" => [
                    array(
                        "status" => "1",
                        "title" => "Plain",
                        "customization_category_id" => "5",
                        "halfsleeve" => ["back_half_sleeve0001.png", "back_half_sleeve_cuff0001.png"],
                        "fullsleeve" => ["back_full_sleeve0001.png", "back_full_sleeve_cuff0001.png"],
                        "elements" => [ "back_body_round0001.png", "yoke0001.png"],
                        "overlay" => "",
                        "image" => "back_plain.jpeg"
                    ), array(
                        "status" => "0",
                        "title" => "Two Side",
                        "customization_category_id" => "5",
                        "halfsleeve" => ["back_half_sleeve0001.png", "back_half_sleeve_cuff0001.png"],
                        "fullsleeve" => ["back_full_sleeve_cuff0001.png", "back_full_sleeve0001.png",],
                        "overlay" => "back_two_side_plea_over_lay.png",
                        "elements" => [ "back_body_round0001.png", "back_two_side_pleat0001.png", "yoke0001.png"],
                        "image" => "back_two_side.jpeg"
                    ), array(
                        "status" => "0",
                        "title" => "Boxpleat",
                        "customization_category_id" => "5",
                        "halfsleeve" => ["back_half_sleeve0001.png", "back_half_sleeve_cuff0001.png"],
                        "fullsleeve" => ["back_full_sleeve0001.png", "back_full_sleeve_cuff0001.png"],
                        "overlay" => "box_pleat_overlay1.png",
                        "elements" => [ "back_body_round0001.png", "back_box_pleat20001.png", "yoke0001.png"],
                        "image" => "back_box_pleat.jpeg"
                    ), array(
                        "status" => "0",
                        "title" => "Dart",
                        "customization_category_id" => "5",
                        "halfsleeve" => ["back_half_sleeve0001.png", "back_half_sleeve_cuff0001.png"],
                        "fullsleeve" => ["back_full_sleeve0001.png", "back_full_sleeve_cuff0001.png"],
                        "overlay" => "dart_overlay1.png",
                        "elements" => ["back_body_round0001.png", "dart0001.png", "yoke0001.png"],
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
                        "elements" => ["pocket_leftv10001.png",],
                        "image" => "pocket_one.jpeg",
                        "overlay" => ["leftpocket.png"],
                    ), array(
                        "status" => "0",
                        "title" => "2 Pocket",
                        "customization_category_id" => "7",
                        "elements" => ["pocket_leftv10001.png", "pocket_rightv10001.png"],
                        "image" => "pocket_two.jpeg",
                        "overlay" => ["rightpocket.png", "leftpocket.png"],
                    )],
                "Front" => [
                    array(
                        "status" => "1",
                        "title" => "Plain Front",
                        "customization_category_id" => "4",
                        "elements" => [],
                        "image" => "front_plain.jpeg",
                        "show_buttons" => "true",
                    ), array(
                        "status" => "0",
                        "title" => "Front Fly",
                        "elements" => ["ivy0001.png"],
                        "customization_category_id" => "4",
                        "image" => "front_fly.jpeg",
                        "show_buttons" => "false",
                    ), array(
                        "status" => "0",
                        "title" => "IVY Pleat",
                        "elements" => ["ivy0001.png"],
                        "customization_category_id" => "4",
                        "image" => "front_ivy.jpeg",
                        "show_buttons" => "true",
                    )],
                "Collar" => [
                    array(
                        "status" => "1",
                        "title" => "Regular",
                        "elements" => ["collar_regular0001.png"],
                        "customization_category_id" => "2",
                        "style" => "margin-left: -3px;",
                        "insert_style_css" => "margin-top: 1px;margin-left: -4px;",
                        "insert_style" => "collar_regular_insert0001.png",
                        "insert_overlay" => "collar_simple_insert_overlay.png",
                        "insert_overlay_css" => "margin-top: -4px;margin-left: -1px;",
                        "insert_full" => ["collar_regular0001.png"],
                        "image" => "collar_regular.jpeg",
                        "buttons" => "buttonsh12.png",
                    ), array(
                        "status" => "0",
                        "title" => "Medium Spread",
                        "customization_category_id" => "2",
                        "style" => "margin-top:-2px;margin-left: -2px;",
                        "insert_style_css" => "margin-top: 1px;margin-left: -4px;",
                        "insert_style" => "collar_regular_insert0001.png",
                        "insert_overlay" => "collar_simple_insert_overlay.png",
                        "insert_overlay_css" => "margin-top: -4px;margin-left: -2px;",
                        "elements" => ["collar_spread_medium0001.png"],
                        "insert_full" => ["collar_spread_medium0001.png"],
                        "image" => "collar_medium_spread.jpeg",
                        "buttons" => "buttonsh12.png",
                    ), array(
                        "status" => "0",
                        "title" => "Wide Spread",
                        "customization_category_id" => "2",
                        "elements" => ["collar_spread_wide0001.png"],
                        "image" => "collar_wide_spread.jpeg",
                        "insert_style_css" => "margin-top: 1px;margin-left: -4px;",
                        "insert_style" => "collar_regular_insert0001.png",
                        "insert_overlay" => "collar_simple_insert_overlay.png",
                        "insert_overlay_css" => "margin-top: -4px;margin-left: -1px;",
                        "insert_full" => ["collar_spread_wide0001.png"],
                        "buttons" => "buttonsh12.png",
                    ), array(
                        "status" => "0",
                        "title" => "Short Point",
                        "elements" => ["collar_short_point0001.png"],
                        "customization_category_id" => "2",
                        "style" => "    margin-top: -4px;margin-left: -2px;",
                        "insert_style_css" => "margin-top: 1px;margin-left: -4px;",
                        "insert_style" => "collar_regular_insert0001.png",
                        "insert_overlay" => "collar_simple_insert_overlay.png",
                        "insert_overlay_css" => "margin-top: -4px;margin-left: -2px;",
                        "insert_full" => ["collar_short_point0001.png"],
                        "image" => "collar_shirt_point.jpeg",
                        "buttons" => "buttonsh12.png",
                    ), array(
                        "status" => "0",
                        "title" => "Regular Button Down",
                        "customization_category_id" => "2",
                        "elements" => ["collar_regular0001.png"],
                        "style" => "margin-left: -3px;",
                        "insert_style_css" => "margin-top: 1px;margin-left: -4px;",
                        "insert_style" => "collar_regular_insert0001.png",
                        "insert_overlay" => "collar_simple_insert_overlay.png",
                        "insert_overlay_css" => "margin-top: -4px;margin-left: -1px;",
                        "insert_full" => ["collar_regular0001.png"],
                        "image" => "collar_regular_button_down.jpeg",
                        "button_down" => "buttons_collar_down.png",
                        "buttons" => "buttonsh12.png",
                    ), array(
                        "status" => "0",
                        "title" => "Full Cutaway",
                        "customization_category_id" => "2",
                        "style" => "margin-top:-6px;margin-left:-3px",
                        "insert_style_css" => "margin-top: 1px;margin-left: -2px;",
                        "insert_style" => "collar_regular_insert0001.png",
                        "insert_overlay" => "collar_simple_insert_overlay.png",
                        "insert_overlay_css" => "margin-top: -4px;margin-left: -0px;",
                        "insert_full" => ["collar_full_cutaway0001.png"],
                        "elements" => ["collar_full_cutaway0001.png"],
                        "image" => "collar_full_cutaway.jpeg",
                        "buttons" => "buttonsh12.png",
                    ),
                    array(
                        "status" => "0",
                        "title" => "Wing Tip",
                        "customization_category_id" => "2",
                        "insert_style_css" => "margin-top: -3px;",
                        "insert_style" => "collar_wintip_insert0001.png",
                        "insert_overlay" => "collar_wintip_insert_overlay.png",
                        "insert_overlay_css" => "opacity:1;",
                        "elements" => ["collar_wintip0001.png"],
                        "insert_full" => ["collar_wintip0001.png"],
                        "image" => "collar_wingtip.jpeg",
                        "buttons" => "buttonsh12md.png",
                        "monogram_style" => "top:11px;height: 8px;",
                    ),
                    array(
                        "status" => "0",
                        "title" => "Mandarin",
                        "elements" => ["collar_manderian0001.png"],
                        "customization_category_id" => "2",
                        "insert_style_css" => "margin-top: 0px;",
                        "insert_style" => "collar_manderian_insert0001.png",
                        "insert_overlay" => "collar_manderian_insert_overlay.png",
                        "insert_overlay_css" => "",
                        "insert_full" => ["collar_manderian0001.png"],
                        "image" => "collar_mandarin.jpeg",
                        "monogram_style" => "top:11px;height: 8px;",
                        "buttons" => "buttonsh12md.png",
                    )]
            ),
            "cuff_collar_insert" => ["p10", "p11", "p12", "p13", "p14", "p15", "p16", "p18", "p2",
                "p23", "p28", "p33", "s1", "s10", "s11", "s12", "s13", "s17",
                "s2", "s3", "s4", "s5", "s6", "s8"],
            "monogram_colors" => [
                array(
                    "color" => "white",
                    "backcolor" => "black",
                    "title" => "White-Black"
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
                array(
                    "color" => "#7d0a24",
                    "backcolor" => "#ff5600",
                    "title" => "Pink-Orange"
                ),
            ],
            "monogram_style" => [
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

    function customeElementsSuit_get() {
        $customeele = array(
            "keys" => [
                array(
                    "title" => "Jacket Style",
                    "viewtype" => "front",
                    "type" => "main",
                ),
                array(
                    "title" => "Lapel Style & Width",
                    "viewtype" => "front",
                    "type" => "main",
                ),
                array(
                    "title" => "Breast Pocket",
                    "viewtype" => "front",
                    "type" => "main",
                ),
                array(
                    "title" => "Lower Pocket",
                    "viewtype" => "front",
                    "type" => "main",
                ),
                array(
                    "title" => "Sleeve Buttons",
                    "viewtype" => "front",
                    "type" => "main",
                ),
                array(
                    "title" => "Back Vent",
                    "viewtype" => "back",
                    "type" => "main",
                ),
                array(
                    "title" => "Buttons",
                    "viewtype" => "front",
                    "type" => "main",
                ),
                array(
                    "title" => "Lining Style",
                    "viewtype" => "front",
                    "type" => "main",
                ),
                array(
                    "title" => "Button Thread",
                    "viewtype" => "front",
                    "type" => "main",
                ),
            ],
            "collar_cuff_insert" => array(),
            "data" => array(
                "Lining Style" => [
                    array(
                        "status" => "1",
                        "title" => "3276",
                        "image" => "lining/3276.jpg",
                        "folder" => "3276",
                    ),
                    array(
                        "status" => "1",
                        "title" => "K5",
                        "image" => "lining/K5.jpg",
                        "folder" => "K5",
                    ),
                    array(
                        "status" => "1",
                        "title" => "K1",
                        "image" => "lining/K1.jpg",
                        "folder" => "K1",
                    ),
                ],
                "Button Thread" => [
                    array(
                        "status" => "1",
                        "title" => "Matching",
                        "image" => "thread/Matching.jpg",
                        "folder" => "Matching",
                    ),
                    array(
                        "status" => "0",
                        "title" => "3223",
                        "image" => "thread/3223.jpg",
                        "folder" => "3223",
                    ),
                    array(
                        "status" => "0",
                        "title" => "3235",
                        "image" => "thread/3235.jpg",
                        "folder" => "3235",
                    ),
                    array(
                        "status" => "0",
                        "title" => "3235",
                        "image" => "thread/3235.jpg",
                        "folder" => "3235",
                    ),
                    array(
                        "status" => "0",
                        "title" => "3241",
                        "image" => "thread/3241.jpg",
                        "folder" => "3241",
                    ),
                    array(
                        "status" => "0",
                        "title" => "3242",
                        "image" => "thread/3242.jpg",
                        "folder" => "3242",
                    ),
                    array(
                        "status" => "0",
                        "title" => "3259",
                        "image" => "thread/3259.jpg",
                        "folder" => "3259",
                    ),
                    array(
                        "status" => "0",
                        "title" => "3276",
                        "image" => "thread/3276.jpg",
                        "folder" => "3276",
                    ),
                    array(
                        "status" => "0",
                        "title" => "3280",
                        "image" => "thread/3280.jpg",
                        "folder" => "3280",
                    ),
                    array(
                        "status" => "0",
                        "title" => "3297",
                        "image" => "thread/3297.jpg",
                        "folder" => "3297",
                    ),
                    array(
                        "status" => "0",
                        "title" => "3316",
                        "image" => "thread/3316.jpg",
                        "folder" => "3316",
                    ),
                ],
                "Buttons" => [
                    array(
                        "status" => "1",
                        "title" => "Brown Lipshell",
                        "customization_category_id" => "4",
                        "image" => "buttonlipsell.png",
                        "folder" => "buttonlipsell",
                        "show_buttons" => "true",
                    ), array(
                        "status" => "0",
                        "title" => "Emerald Lipshell",
                        "folder" => "buttonemrald",
                        "customization_category_id" => "4",
                        "image" => "buttonemrald.png",
                        "show_buttons" => "true",
                    ),
                    array(
                        "status" => "0",
                        "title" => "Horn",
                        "folder" => "buttonhorn",
                        "customization_category_id" => "4",
                        "image" => "buttonhorn.png",
                        "show_buttons" => "true",
                    ),
                    array(
                        "status" => "0",
                        "title" => "Gold",
                        "folder" => "buttongold",
                        "customization_category_id" => "4",
                        "image" => "buttongold.png",
                        "show_buttons" => "true",
                    ),
                    array(
                        "status" => "0",
                        "title" => "Silver",
                        "folder" => "buttonsilver",
                        "customization_category_id" => "4",
                        "image" => "buttonsilver.png",
                        "show_buttons" => "true",
                    ),
                    array(
                        "status" => "0",
                        "title" => "Leather",
                        "folder" => "buttonleather",
                        "customization_category_id" => "4",
                        "image" => "buttonleather.png",
                        "show_buttons" => "true",
                    ),
                ],
                "Breast Pocket" => [
                    array(
                        "status" => "1",
                        "title" => "Slanted Pocket",
                        "customization_category_id" => "4",
                        "elements" => ["breast_pocket0001.png"],
                        "image" => "slented_pocket.jpeg",
                        "show_buttons" => "true",
                    ), array(
                        "status" => "0",
                        "title" => "Patch Pocket",
                        "elements" => ["breast_patch_pocket0001.png",],
                        "customization_category_id" => "4",
                        "image" => "patch_pocket.jpeg",
                        "show_buttons" => "false",
                    ), array(
                        "status" => "0",
                        "title" => "No Pocket",
                        "elements" => [],
                        "customization_category_id" => "4",
                        "image" => "no_pocket.jpeg",
                        "show_buttons" => "true",
                    )],
                "Back Vent" => [
                    array(
                        "status" => "0",
                        "title" => "No Vent",
                        "customization_category_id" => "4",
                        "elements" => ["back_sleeve0001.png", "back_side__no_vent0001.png"],
                        "image" => "no_vent.jpeg",
                        "show_buttons" => "true",
                    ), array(
                        "status" => "0",
                        "title" => "Center Vent",
                        "elements" => ["back_sleeve0001.png", "back_side_center_vent0001.png"],
                        "customization_category_id" => "4",
                        "image" => "center_vent.jpeg",
                        "show_buttons" => "false",
                    ), array(
                        "status" => "1",
                        "title" => "Side Vent",
                        "elements" => ["back_sleeve0001.png", "back_side__side_vent0001.png"],
                        "customization_category_id" => "4",
                        "image" => "side_vent.jpeg",
                        "show_buttons" => "true",
                    )],
                "Sleeve Buttons" => [
                    array(
                        "status" => "1",
                        "title" => "4 Flat Buttons",
                        "customization_category_id" => "4",
                        "elements" => ["sleeve_buttons_flat_3_hole0001.png", "sleeve_buttons_flat_3_4_hole0001.png",],
                        "image" => "4fbuttons.jpeg",
                        "buttons" => ["sleeve_buttons_flat_30001", "sleeve_buttons_flat_3_40001"],
                        "show_buttons" => "true",
                    ), array(
                        "status" => "0",
                        "title" => "4 Kissing Buttons",
                        "elements" => ["sleeve_buttons_kissing_3_hole0001.png", "sleeve_buttons_kissing_4_hole0001.png",],
                        "customization_category_id" => "4",
                        "image" => "4kbuttons.jpeg",
                        "buttons" => ["sleeve_buttons_kissing_30001", "sleeve_buttons_kissing_40001"],
                        "show_buttons" => "false",
                    ), array(
                        "status" => "1",
                        "title" => "3 Flat Buttons",
                        "customization_category_id" => "4",
                        "elements" => ["sleeve_buttons_flat_3_hole0001.png",],
                        "image" => "4fbuttons.jpeg",
                        "buttons" => ["sleeve_buttons_flat_30001"],
                        "show_buttons" => "true",
                    ), array(
                        "status" => "0",
                        "title" => "3 Kissing Buttons",
                        "elements" => ["sleeve_buttons_kissing_3_hole0001.png",],
                        "customization_category_id" => "4",
                        "image" => "4kbuttons.jpeg",
                        "buttons" => ["sleeve_buttons_kissing_30001"],
                        "show_buttons" => "false",
                    ),
//                    array(
//                        "status" => "0",
//                        "title" => "4 Flat Buttons First Contrast",
//                        "customization_category_id" => "4",
//                        "elements" => ["sleeve_buttons_flat_3_hole0001.png", "sleeve_buttons_flat_3_4_hole0001.png",],
//                        "image" => "4fbuttons.jpeg",
//                        "buttons" => ["sleeve_buttons_flat_30001",],
//                        "show_buttons" => "true",
//                    ),
                ],
                "Lower Pocket" => [
                    array(
                        "status" => "1",
                        "title" => "Slanted Flap Pocket",
                        "customization_category_id" => "4",
                        "elements" => ["lower_pocket_slanting_flap0001.png"],
                        "image" => "lower_flap_pocket.jpeg",
                        "show_buttons" => "true",
                    )
                    , array(
                        "status" => "1",
                        "title" => "Straight Flap Pocket",
                        "customization_category_id" => "4",
                        "elements" => ["lower_pocket_flap0001.png",],
                        "image" => "lower_flap_pocket.jpeg",
                        "show_buttons" => "true",
                    )
                    , array(
                        "status" => "0",
                        "title" => "Patch Pocket",
                        "elements" => ["lower_pocket_patch0001.png",],
                        "customization_category_id" => "4",
                        "image" => "lower_patch_pocket.jpeg",
                        "show_buttons" => "false",
                    )
                    , array(
                        "status" => "0",
                        "title" => "Pipe Pocket",
                        "elements" => ["lower_pipe_pocket0001.png",],
                        "customization_category_id" => "4",
                        "image" => "lower_pipe_pocket.jpeg",
                        "show_buttons" => "false",
                    ), array(
                        "status" => "0",
                        "title" => "Slanting Pipe Pocket",
                        "elements" => ["lower_slanting_pocket0001.png"],
                        "customization_category_id" => "4",
                        "image" => "lower_slanting_pipe.jpeg",
                        "show_buttons" => "true",
                    )],
                "Jacket Style" => [
                    array(
                        "status" => "1",
                        "title" => "1 Button",
                        "customization_category_id" => "4",
                        "elements" => ['body_single_1_left0001.png', 'body_single_1_right0001.png',],
                        "image" => "1_button.jpg",
                        "buttons" => ["buttons_10001"],
                        "button_hole" => ["button_1_hole0001.png"],
                        "show_buttons" => "true",
                        "overlay" => ["body_single_1_left_overlay.png"],
                    ), array(
                        "status" => "0",
                        "title" => "2 Buttons",
                        "elements" => ['body_single_1_left0001.png', 'body_single_1_right0001.png', 'button_2_hole0001.png'],
                        "customization_category_id" => "4",
                        "image" => "2_buttons.jpg",
                        "buttons" => ["buttons_10001", "buttons_20001"],
                        "button_hole" => ["button_1_hole0001.png", "button_2_hole0001.png"],
                        "show_buttons" => "false",
                        "overlay" => ["body_single_1_left_overlay.png"],
                    ), array(
                        "status" => "0",
                        "title" => "3 Buttons",
                        "elements" => ["body_single_34_right0001.png", "body_single_34_left0001.png", "buttons_3_hole0001.png",],
                        "customization_category_id" => "4",
                        "image" => "3_buttons.jpg",
                        "buttons" => ["button_30001", "buttons_3_last0001"],
                        "button_hole" => ["buttons_3_hole0001.png"],
                        "show_buttons" => "true",
                        "overlay" => ["body_single_34_overlay.png"],
                    )
                    , array(
                        "status" => "0",
                        "title" => "4 Buttons",
                        "elements" => ["body_single_34_right0001.png", "body_single_34_left0001.png", "buttons_4_hole0001.png"],
                        "customization_category_id" => "4",
                        "image" => "4_buttons.jpg",
                        "buttons" => ["buttons_40001", "buttons_4_last0001"],
                        "button_hole" => ["buttons_4_hole0001.png"],
                        "show_buttons" => "true",
                        "overlay" => ["body_single_34_overlay.png"],
                    )
                    , array(
                        "status" => "0",
                        "title" => "4 Buttons 1 Button Fasten",
                        "elements" => ["body_double_left0001.png", "body_double_right_40001.png", "button_41_hole0001.png"],
                        "customization_category_id" => "4",
                        "image" => "41_button.jpg",
                        "button_hole" => ["button_41_hole0001.png"],
                        "buttons" => ["button_410001",],
                        "show_buttons" => "true",
                        "overlay" => ["body_double_right_42_overlay.png"],
                    )
                    , array(
                        "status" => "0",
                        "title" => "4 Buttons 2 Buttons Fasten",
                        "elements" => ["body_double_left0001.png", "body_double_right_40001.png", "button_41_hole0001.png"],
                        "customization_category_id" => "4",
                        "buttons" => ["button_410001", "button_420001"],
                        "button_hole" => ["button_41_hole0001.png"],
                        "image" => "42_button.jpg",
                        "show_buttons" => "true",
                        "overlay" => ["body_double_right_42_overlay.png"],
                    )
                    , array(
                        "status" => "0",
                        "title" => "6 Buttons 1 Button Fasten",
                        "elements" => ["body_double_left0001.png", "body_double_right_60001.png", "button_61_hole0001.png"],
                        "customization_category_id" => "4",
                        "image" => "61_button.jpg",
                        "buttons" => ["button_610001"],
                        "button_hole" => ["button_61_hole0001.png"],
                        "extra_button" => ["button_61_last0001"],
                        "show_buttons" => "true",
                        "overlay" => ["body_double_right_62_overlay.png"],
                    )
                    , array(
                        "status" => "0",
                        "title" => "6 Buttons 2 Buttons Fasten",
                        "elements" => ["body_double_left0001.png", "body_double_right_60001.png", "button_61_hole0001.png"],
                        "customization_category_id" => "4",
                        "image" => "62_button.jpg",
                        "buttons" => ["button_610001", "button_620001"],
                        "button_hole" => ["button_61_hole0001.png"],
                        "extra_button" => ["button_61_last0001"],
                        "show_buttons" => "true",
                        "overlay" => ["body_double_right_62_overlay.png"],
                    )
                ],
                "Lapel Style & Width" => [
                    array(
                        "status" => "1",
                        "title" => "Notch Lapel Morden",
                        "elements" => ["body_round0001.png"],
                        "laple_style" => array(
                            "1 Button" => array("elements" => [
                                    "laple_single_3_notch_peak_upper0001.png",
                                    "laple_single_notch_modern0001.png"
                                ], "overelay" => ["13notchpeaklapleoverlay.png", "laple_single_notch_modern_overlay.png"]),
                            "2 Buttons" => array("elements" => [
                                    "laple_single_3_notch_peak_upper0001.png",
                                    "laple_single_notch_modern0001.png"
                                ], "overelay" => ["13notchpeaklapleoverlay.png", "laple_single_notch_modern_overlay.png"]),
                            "3 Buttons" => array("elements" => [
                                    "laple_single_3_notch_peak_upper0001.png",
                                    "laple_single_3_notch_modern0001.png"
                                ], "overelay" => ["13notchpeaklapleoverlay.png"]),
                            "4 Buttons" => array("elements" => [
                                    "laple_single_3_notch_peak_upper0001.png",
                                    "laple_single_3_notch_modern0001.png"
                                ], "overelay" => ["13notchpeaklapleoverlay.png"]),
                            "4 Buttons 1 Button Fasten" => array("elements" => [
                                    "laple_notch_upper0001.png",
                                    "laple_4_notch_modern0001.png"
                                ], "overelay" => []),
                            "4 Buttons 2 Buttons Fasten" => array("elements" => [
                                    "laple_notch_upper0001.png",
                                    "laple_4_notch_modern0001.png"
                                ], "overelay" => []),
                            "6 Buttons 1 Button Fasten" => array("elements" => [
                                    "laple_notch_upper0001.png",
                                    "laple_6_notch_modrn0001.png"
                                ], "overelay" => []),
                            "6 Buttons 2 Buttons Fasten" => array("elements" => [
                                    "laple_notch_upper0001.png",
                                    "laple_6_notch_modrn0001.png"
                                ], "overelay" => []),
                        ),
                        "customization_category_id" => "6",
                        "image" => "notch_modern.jpeg"
                    ),
                    array(
                        "status" => "0",
                        "title" => "Notch Lapel Classic",
                        "elements" => ["body_round0001.png"],
                        "laple_style" => array(
                            "1 Button" => array("elements" => [
                                    "laple_single_3_notch_peak_upper0001.png",
                                    "laple_single_notch_classic0001.png"
                                ], "overelay" => ["13notchpeaklapleoverlay.png", "laple_single_notch_classic_overlay.png"]),
                            "2 Buttons" => array("elements" => [
                                    "laple_single_3_notch_peak_upper0001.png",
                                    "laple_single_notch_classic0001.png"
                                ], "overelay" => ["13notchpeaklapleoverlay.png", "laple_single_notch_classic_overlay.png"]),
                            "3 Buttons" => array("elements" => [
                                    "laple_single_3_notch_peak_upper0001.png",
                                    "laple_single_3_notch_classic0001.png"
                                ], "overelay" => ["13notchpeaklapleoverlay.png"]),
                            "4 Buttons" => array("elements" => [
                                    "laple_single_3_notch_peak_upper0001.png",
                                    "laple_single_3_notch_classic0001.png"
                                ], "overelay" => ["13notchpeaklapleoverlay.png"]),
                            "4 Buttons 1 Button Fasten" => array("elements" => [
                                    "laple_notch_upper0001.png",
                                    "laple_4_notch_classic0001.png"
                                ], "overelay" => []),
                            "4 Buttons 2 Buttons Fasten" => array("elements" => [
                                    "laple_notch_upper0001.png",
                                    "laple_4_notch_classic0001.png"
                                ], "overelay" => []),
                            "6 Buttons 1 Button Fasten" => array("elements" => [
                                    "laple_notch_upper0001.png",
                                    "laple_6_notch_classic0001.png"
                                ], "overelay" => []),
                            "6 Buttons 2 Buttons Fasten" => array("elements" => [
                                    "laple_notch_upper0001.png",
                                    "laple_6_notch_classic0001.png"
                                ], "overelay" => []),
                        ),
                        "customization_category_id" => "6",
                        "image" => "notch_classic.jpeg"
                    ),
                    array(
                        "status" => "0",
                        "title" => "Peak Lapel Morden",
                        "elements" => ["body_round0001.png"],
                        "laple_style" => array(
                            "1 Button" => array("elements" => [
                                    "laple_single_3_notch_peak_upper0001.png",
                                    "laple_single_peak_morden0001.png"
                                ], "overelay" => ["13notchpeaklapleoverlay.png", "laple_single_peak_overlay.png"]),
                            "2 Buttons" => array("elements" => [
                                    "laple_single_3_notch_peak_upper0001.png",
                                    "laple_single_peak_morden0001.png"
                                ], "overelay" => ["13notchpeaklapleoverlay.png", "laple_single_peak_overlay.png"]),
                            "3 Buttons" => array("elements" => [
                                    "laple_single_3_notch_peak_upper0001.png",
                                    "laple_single_3_peak_morden0001.png"
                                ], "overelay" => ["13notchpeaklapleoverlay.png"]),
                            "4 Buttons" => array("elements" => [
                                    "laple_single_3_notch_peak_upper0001.png",
                                    "laple_single_3_peak_morden0001.png"
                                ], "overelay" => ["13notchpeaklapleoverlay.png"]),
                            "4 Buttons 1 Button Fasten" => array("elements" => [
                                    "laple_peak_upper0001.png",
                                    "laple_4_peack_modern0001.png"
                                ], "overelay" => ["4_peak_m.png"]),
                            "4 Buttons 2 Buttons Fasten" => array("elements" => [
                                    "laple_peak_upper0001.png",
                                    "laple_4_peack_modern0001.png"
                                ], "overelay" => ["4_peak_m.png"]),
                            "6 Buttons 1 Button Fasten" => array("elements" => [
                                    "laple_peak_upper0001.png",
                                    "laple_6_peack_morden0001.png"
                                ], "overelay" => ["4_peak_m.png"]),
                            "6 Buttons 2 Buttons Fasten" => array("elements" => [
                                    "laple_peak_upper0001.png",
                                    "laple_6_peack_morden0001.png"
                                ], "overelay" => ["4_peak_m.png"]),
                        ),
                        "customization_category_id" => "6",
                        "image" => "peak_modern.jpeg"
                    ),
                    array(
                        "status" => "0",
                        "title" => "Peak Lapel Classic",
                        "elements" => ["body_round0001.png"],
                        "laple_style" => array(
                            "1 Button" => array("elements" => [
                                    "laple_single_3_notch_peak_upper0001.png",
                                    "laple_single_peak_classic0001.png"
                                ], "overelay" => ["13notchpeaklapleoverlay.png", "laple_single_peak_overlay_classic.png"]),
                            "2 Buttons" => array("elements" => [
                                    "laple_single_3_notch_peak_upper0001.png",
                                    "laple_single_peak_classic0001.png"
                                ], "overelay" => ["13notchpeaklapleoverlay.png", "laple_single_peak_overlay_classic.png"]),
                            "3 Buttons" => array("elements" => [
                                    "laple_single_3_notch_peak_upper0001.png",
                                    "laple_single_3_peak_classic0001.png"
                                ], "overelay" => ["13notchpeaklapleoverlay.png"]),
                            "4 Buttons" => array("elements" => [
                                    "laple_single_3_notch_peak_upper0001.png",
                                    "laple_single_3_peak_classic0001.png"
                                ], "overelay" => ["13notchpeaklapleoverlay.png",]),
                            "4 Buttons 1 Button Fasten" => array("elements" => [
                                    "laple_peak_upper0001.png",
                                    "laple_4_peack_classic0001.png"
                                ], "overelay" => ["4_peak_c.png"]),
                            "4 Buttons 2 Buttons Fasten" => array("elements" => [
                                    "laple_peak_upper0001.png",
                                    "laple_4_peack_classic0001.png"
                                ], "overelay" => ["4_peak_c.png"]),
                            "6 Buttons 1 Button Fasten" => array("elements" => [
                                    "laple_peak_upper0001.png",
                                    "laple_6_peack_classic0001.png"
                                ], "overelay" => ["4_peak_c.png"]),
                            "6 Buttons 2 Buttons Fasten" => array("elements" => [
                                    "laple_peak_upper0001.png",
                                    "laple_6_peack_classic0001.png"
                                ], "overelay" => ["4_peak_c.png"]),
                        ),
                        "customization_category_id" => "6",
                        "image" => "peak_classic.jpeg"
                    ),
                    array(
                        "status" => "0",
                        "title" => "Shawal Lapel Modern",
                        "elements" => ["body_round0001.png"],
                        "laple_style" => array(
                            "1 Button" => array("elements" => [
                                    "laple_single_shwal_mordern0001.png",
                                ], "overelay" => ["laple_single_shwal_modern_overlay.png"]),
                            "2 Buttons" => array("elements" => [
                                    "laple_single_shwal_mordern0001.png",
                                ], "overelay" => ["laple_single_shwal_modern_overlay.png"]),
                            "3 Buttons" => array("elements" => [
                                    "laple_single_3_shwal_modern0001.png",
                                ], "overelay" => []),
                            "4 Buttons" => array("elements" => [
                                    "laple_single_3_shwal_modern0001.png",
                                ], "overelay" => []),
                            "4 Buttons 1 Button Fasten" => array("elements" => [
                                    "laple_4_shwal_morden0001.png",
                                ], "overelay" => []),
                            "4 Buttons 2 Buttons Fasten" => array("elements" => [
                                    "laple_4_shwal_morden0001.png",
                                ], "overelay" => []),
                            "6 Buttons 1 Button Fasten" => array("elements" => [
                                    "laple_6_shwal_modern0001.png",
                                ], "overelay" => []),
                            "6 Buttons 2 Buttons Fasten" => array("elements" => [
                                    "laple_6_shwal_modern0001.png",
                                ], "overelay" => []),
                        ),
                        "customization_category_id" => "6",
                        "image" => "shawl_modern.jpeg"
                    ),
                    array(
                        "status" => "0",
                        "title" => "Shawal Lapel Classic",
                        "elements" => ["body_round0001.png"],
                        "laple_style" => array(
                            "1 Button" => array("elements" => [
                                    "laple_single_shwal_classic0001.png",
                                ], "overelay" => ["laple_single_shwal_modern_overlay.png"]),
                            "2 Buttons" => array("elements" => [
                                    "laple_single_shwal_classic0001.png",
                                ], "overelay" => ["laple_single_shwal_modern_overlay.png"]),
                            "3 Buttons" => array("elements" => [
                                    "laple_single_3_shwal_classic0001.png",
                                ], "overelay" => []),
                            "4 Buttons" => array("elements" => [
                                    "laple_single_3_shwal_classic0001.png",
                                ], "overelay" => []),
                            "4 Buttons 1 Button Fasten" => array("elements" => [
                                    "laple_4_shwal_classic0001.png",
                                ], "overelay" => []),
                            "4 Buttons 2 Buttons Fasten" => array("elements" => [
                                    "laple_4_shwal_classic0001.png",
                                ], "overelay" => []),
                            "6 Buttons 1 Button Fasten" => array("elements" => [
                                    "laple_6_shwal_classic0001.png",
                                ], "overelay" => []),
                            "6 Buttons 2 Buttons Fasten" => array("elements" => [
                                    "laple_6_shwal_classic0001.png",
                                ], "overelay" => []),
                        ),
                        "customization_category_id" => "6",
                        "image" => "shawl_classic.jpeg"
                    ),
                ],
                "Collar" => [
                    array(
                        "status" => "1",
                        "title" => "Regular",
                        "elements" => ["collar_regular0001.png"],
                        "customization_category_id" => "2",
                        "style" => "margin-left: -3px;",
                        "insert_style_css" => "margin-top: 1px;margin-left: -4px;",
                        "insert_style" => "collar_regular_insert0001.png",
                        "insert_overlay" => "collar_simple_insert_overlay.png",
                        "insert_overlay_css" => "margin-top: -4px;margin-left: -1px;",
                        "insert_full" => ["collar_regular0001.png"],
                        "image" => "collar_regular.jpeg",
                        "buttons" => "buttonsh12.png",
                    ), array(
                        "status" => "0",
                        "title" => "Medium Spread",
                        "customization_category_id" => "2",
                        "style" => "margin-top:-2px;margin-left: -2px;",
                        "insert_style_css" => "margin-top: 1px;margin-left: -4px;",
                        "insert_style" => "collar_regular_insert0001.png",
                        "insert_overlay" => "collar_simple_insert_overlay.png",
                        "insert_overlay_css" => "margin-top: -4px;margin-left: -2px;",
                        "elements" => ["collar_spread_medium0001.png"],
                        "insert_full" => ["collar_spread_medium0001.png"],
                        "image" => "collar_medium_spread.jpeg",
                        "buttons" => "buttonsh12.png",
                    ), array(
                        "status" => "0",
                        "title" => "Wide Spread",
                        "customization_category_id" => "2",
                        "elements" => ["collar_spread_wide0001.png"],
                        "image" => "collar_wide_spread.jpeg",
                        "insert_style_css" => "margin-top: 1px;margin-left: -4px;",
                        "insert_style" => "collar_regular_insert0001.png",
                        "insert_overlay" => "collar_simple_insert_overlay.png",
                        "insert_overlay_css" => "margin-top: -4px;margin-left: -1px;",
                        "insert_full" => ["collar_spread_wide0001.png"],
                        "buttons" => "buttonsh12.png",
                    ), array(
                        "status" => "0",
                        "title" => "Short Point",
                        "elements" => ["collar_short_point0001.png"],
                        "customization_category_id" => "2",
                        "style" => "    margin-top: -4px;margin-left: -2px;",
                        "insert_style_css" => "margin-top: 1px;margin-left: -4px;",
                        "insert_style" => "collar_regular_insert0001.png",
                        "insert_overlay" => "collar_simple_insert_overlay.png",
                        "insert_overlay_css" => "margin-top: -4px;margin-left: -2px;",
                        "insert_full" => ["collar_short_point0001.png"],
                        "image" => "collar_shirt_point.jpeg",
                        "buttons" => "buttonsh12.png",
                    ), array(
                        "status" => "0",
                        "title" => "Regular Button Down",
                        "customization_category_id" => "2",
                        "elements" => ["collar_regular0001.png"],
                        "style" => "margin-left: -3px;",
                        "insert_style_css" => "margin-top: 1px;margin-left: -4px;",
                        "insert_style" => "collar_regular_insert0001.png",
                        "insert_overlay" => "collar_simple_insert_overlay.png",
                        "insert_overlay_css" => "margin-top: -4px;margin-left: -1px;",
                        "insert_full" => ["collar_regular0001.png"],
                        "image" => "collar_regular_button_down.jpeg",
                        "button_down" => "buttons_collar_down.png",
                        "buttons" => "buttonsh12.png",
                    ), array(
                        "status" => "0",
                        "title" => "Full Cutaway",
                        "customization_category_id" => "2",
                        "style" => "margin-top:-6px;margin-left:-3px",
                        "insert_style_css" => "margin-top: 1px;margin-left: -2px;",
                        "insert_style" => "collar_regular_insert0001.png",
                        "insert_overlay" => "collar_simple_insert_overlay.png",
                        "insert_overlay_css" => "margin-top: -4px;margin-left: -0px;",
                        "insert_full" => ["collar_full_cutaway0001.png"],
                        "elements" => ["collar_full_cutaway0001.png"],
                        "image" => "collar_full_cutaway.jpeg",
                        "buttons" => "buttonsh12.png",
                    ), array(
                        "status" => "0",
                        "title" => "Wing Tip",
                        "customization_category_id" => "2",
                        "insert_style_css" => "margin-top: -3px;",
                        "insert_style" => "collar_wintip_insert0001.png",
                        "insert_overlay" => "collar_wintip_insert_overlay.png",
                        "insert_overlay_css" => "opacity:1;",
                        "elements" => ["collar_wintip0001.png"],
                        "insert_full" => ["collar_wintip0001.png"],
                        "image" => "collar_wingtip.jpeg",
                        "buttons" => "buttons_m_w_collar.png",
                        "monogram_style" => "top:11px;height: 8px;",
                    ), array(
                        "status" => "0",
                        "title" => "Mandarin",
                        "elements" => ["collar_manderian0001.png"],
                        "customization_category_id" => "2",
                        "insert_style_css" => "margin-top: 0px;",
                        "insert_style" => "collar_manderian_insert0001.png",
                        "insert_overlay" => "collar_manderian_insert_overlay.png",
                        "insert_overlay_css" => "",
                        "insert_full" => ["collar_manderian0001.png"],
                        "image" => "collar_mandarin.jpeg",
                        "monogram_style" => "top:11px;height: 8px;",
                        "buttons" => "buttons_m_w_collar.png",
                    )]
            ),
            "cuff_collar_insert" => ["p10", "p11", "p12", "p13", "p14", "p15", "p16", "p18", "p2",
                "p23", "p28", "p33", "s1", "s10", "s11", "s12", "s13", "s17",
                "s2", "s3", "s4", "s5", "s6", "s8"],
            "monogram_colors" => [
                array(
                    "color" => "white",
                    "backcolor" => "black",
                    "title" => "White-Black"
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
                array(
                    "color" => "#7d0a24",
                    "backcolor" => "#ff5600",
                    "title" => "Pink-Orange"
                ),
            ],
            "monogram_style" => [
                array(
                    "font_style" => "font-family: 'Orbitron';",
                    "title" => "Style 1"
                ),
                array(
                    "font_style" => "font-family: 'Black Ops One';",
                    "title" => "Style 2"
                ),
                array(
                    "font_style" => "font-family: 'Bungee';",
                    "title" => "Style 3"
                ),
                array(
                    "font_style" => "font-family: 'Wallpoet';",
                    "title" => "Style 4"
                ),
            ],
        );
        foreach ($customeele as $key => $value) {
            
        }
        $this->response($customeele);
    }

}

?>
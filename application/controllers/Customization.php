<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Customization extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->library('session');
        $this->user_id = $this->session->userdata('logged_in')['login_id'];
    }

    public function index() {
        redirect('/');
    }

    //function for product list
    function ProductList($cat_id) {
        $categories = $this->Product_model->productListCategories($cat_id);
        $data["categorie_parent"] = $this->Product_model->getparent($cat_id);
        $data["categories"] = $categories;
        $data["category"] = $cat_id;
        $this->load->view('Product/productList', $data);
    }

    //list of product api
    //ProductList APi
    public function productListApi($category_id) {
//        $attrdatak = $this->get();
        $attrdatak = $_GET;
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

        $product_query = "select pt.id as product_id, pt.folder, pt.title, pt.sale_price, pt.regular_price, pt.price, pt.file_name, pt.file_name1 
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


        $productArray = array('attributes' => $attr_filter,
            'products' => $product_result,
            'product_count' => count($product_result),
            'price' => $pricelist);
        print_r($productArray);

        // $this->response($productArray);
    }

    //api
    //function for details
    function ProductDetails($product_id) {
        $prodct_details = $this->Product_model->productDetails($product_id);
        if ($prodct_details) {
            $pquery = "SELECT pa.attribute, cav.attribute_value FROM product_attribute as pa
      join category_attribute_value as cav on cav.id = pa.attribute_value_id
      where pa.product_id = $product_id";
            $attr_products = $this->Product_model->query_exe($pquery);
            $data["product_attr"] = $attr_products;
            $categorie_parent = $this->Product_model->getparent($prodct_details['category_id']);
            $data["categorie_parent"] = $categorie_parent;
            $data["product_details"] = $prodct_details;



            $this->config->load('seo_config');
            $this->config->set_item('seo_title', $prodct_details['title']);
            $this->config->set_item('seo_desc', $prodct_details['short_description']);
            $this->config->set_item('seo_keywords', $prodct_details['keywords']);
            $this->config->set_item('seo_imgurl', imageserver . $prodct_details['file_name']);




            $this->load->view('Product/productDetails', $data);
        } else {
            $this->load->view('errors/html/error_404');
        }
    }

    //customization shirt


    function customizationShirt($product_id = 0) {
        $product = $this->Product_model->productDetails($product_id);
        $data['product'] = $product;
        $this->load->view('customization/customization_shirt', $data);
    }

    function customizationSuit() {
        $session_cart = $this->Product_model->cartData();
        $data = [];
        $this->load->view('Product/customization_suit', $data);
    }

    function customizationSuitV2($item_id) {
        $this->db->where('id', $item_id);
        $query = $this->db->get('custome_items');
        $customeitem = $query->row();
        $data = [];
        $data['tuxedotype'] = "0";

        $data['custom_id'] = $item_id;

        switch ($item_id) {
            case 2:
                $data["custom_item"] = "Suit";
                break;
            case 3:
                $data["custom_item"] = "Pant";
                break;
            case 4:
                $data["custom_item"] = "Jacket";
                break;
            case 5:
                $data["custom_item"] = "TuxedoSuit";
                $data['tuxedotype'] = "1";
                break;
            case 6:
                $data["custom_item"] = "TuxedoJacket";
                $data['tuxedotype'] = "1";
                break;
            case 7:
                $data["custom_item"] = "TuxedoPant";
                $data['tuxedotype'] = "1";
                break;
            default:
        }

        $this->load->view('customization/customization_suit_v2', $data);
    }

    //end of customization shrit





    function test() {
//        $this->session->unset_userdata('session_cart');
        //$session_cart = $this->Product_model->cartOperation(214, 1);
        $session_cart = $this->Product_model->cartData();
        echo "<pre>";
        print_r($session_cart);
    }

    function unsetData() {
        $this->session->unset_userdata('session_cart');
    }

    function testlist() {
        $listproduct = [
            'AM138',
            'AM122',
            'AM159',
            'AM247',
            'AM861',
            'AM864',
            'AM865',
            'AM868',
            'AM867',
            'AM866',
            'AM393',
            'AM397',
            'AM588',
            'AM590',
            'AM697',
            'AM613',
            'AM796',
            'AM409',
            'AM660',
            'AM661',
            'AM938',
            'AM143',
            'AM164',
            'AM162',
            'AM354',
            'AM902',
            'AM263',
            'AM262',
            'AM405',
            'AM403',
            'AM616',
            'AM661',
            'AM699',
            'AM664',
            'AM843',
            'AM906',
            'AM905',
            'AM912',
            'AM911',
            'AM910',
            'AM908',
            'AM845',
            'D2342',
            'D2351',
            'D1689',
            'D3107',
            'D3108',
            'D1137',
            'D2386',
            'D2390',
            'D1576',
            'D1549',
            'D3347',
            'D1371',
            'D2572',
            'D163',
            'D3364',
            'D148',
            'D889',
            'D123',
            'D2572',
            'D3341',
            'D3358',
            'D1224',
            'D3363',
            'D2278',
            'WF111',
            'WF105',
            'WF87',
            'WF89',
            'WF51',
            'WF149',
            'WF45',
            'WF103',
            'WF179',
            'WF174',
            'WF180',
            'L841',
            'L884',
            'L878',
            'L874',
            'L884',
            'L892',
        ];

        foreach ($listproduct as $key => $value) {
            $vl = $value;
            echo "<a style='width:100px;width:110px;float:left;border:1px solid red;padding:5px;margin:5px;' href='https://nitafashions.com/nfw/large/$vl.jpg' >"
            . "<img src='https://nitafashions.com/nfw/small/$vl.jpg' style='height:100px;'><br/><b>$vl<b>"
            . "</a>";
        }
    }

}

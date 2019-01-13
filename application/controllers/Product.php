<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

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
    function ProductList($custom_id, $cat_id) {


        $this->db->where('id', $custom_id);
        $query = $this->db->get('custome_items');
        $customeitem = $query->row();

        if ($cat_id == 0) {
            $cat_id = $customeitem->category_id;
        }

        $categories = $this->Product_model->productListCategories($cat_id, $custom_id);
        $data["categorie_parent"] = $this->Product_model->getparent($cat_id);
        $data["categories"] = $categories;
        $data["category"] = $cat_id;
        $data["custom_item"] = $customeitem->item_name;
        $data["custom_id"] = $custom_id;
        $data["item_price"] = $customeitem->price;

        $this->load->view('Product/productList', $data);
    }

    function ProductSearch() {
        $data['keyword'] = $_GET['keyword'];
        $this->load->view('Product/productSearch', $data);
    }

    //function for details
    function ProductDetails($product_id) {
        $prodct_details = $this->Product_model->productDetails($product_id);
        if ($prodct_details) {
            $prodct_details_attrs = $this->Product_model->productDetailsVariants($product_id);

            $data['product_attr_variant'] = $prodct_details_attrs;

            $pquery = "SELECT pa.attribute, cav.attribute_value FROM product_attribute as pa
      join category_attribute_value as cav on cav.id = pa.attribute_value_id
      where pa.product_id = $product_id";
            $attr_products = $this->Product_model->query_exe($pquery);
            $data["product_attr"] = $attr_products;
            $categorie_parent = $this->Product_model->getparent($prodct_details['category_id']);
            $data["categorie_parent"] = $categorie_parent;
            $data["product_details"] = $prodct_details;


            $pquery = "SELECT pa.* FROM product_related as pr 
      join products as pa on pa.id = pr.related_product_id
      where pr.product_id = $product_id";
            $product_related = $this->Product_model->query_exe($pquery);

            $data["product_related"] = $product_related;

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

    function customizationShirt1($productid) {
        $productdetails = $this->Product_model->productDetails($productid);

        $data['productdetails'] = $productdetails;
        $this->load->view('Product/customization_shirt', $data);
    }

    function customizationRedirect($custom_id, $product_id) {
        if ($custom_id == 1) {
            redirect('Product/customizationShirt/' . $product_id . "/" . $custom_id);
        }
        if ($custom_id == 2) {
            redirect('Product/customizationSuit/' . $product_id . "/" . $custom_id);
        }
        if ($custom_id == 4) {
            redirect('Product/customizationJacket/' . $product_id . "/" . $custom_id);
        }
        if ($custom_id == 3) {
            redirect('Product/customizationPant/' . $product_id . "/" . $custom_id);
        }
        
        if ($custom_id == 5) {
            redirect('Product/customizationTuxedoSuit/' . $product_id . "/" . $custom_id);
        }
        if ($custom_id == 6) {
            redirect('Product/customizationTuxedoJacket/' . $product_id . "/" . $custom_id);
        }
        if ($custom_id == 7) {
            redirect('Product/customizationTuxedoPant/' . $product_id . "/" . $custom_id);
        }
    }

    function customizationShirt($productid, $custom_id) {
        $productdetails = $this->Product_model->productDetails($productid , $custom_id);
        $data['productdetails'] = $productdetails;
        $data["custom_item"] = "Pant";
        $data['custom_id'] = $custom_id;
        $this->load->view('Product/customization_shirt', $data);
    }

    function customizationSuit($productid, $custom_id) {
        $productdetails = $this->Product_model->productDetails($productid, $custom_id);
        $data['productdetails'] = $productdetails;
        $data["custom_item"] = "Suit";
        $data['custom_id'] = $custom_id;
        $data['tuxedotype'] = "0";
        $this->load->view('Product/customization_suit_v2', $data);
    }
    
    function customizationTuxedoSuit($productid, $custom_id) {
        $productdetails = $this->Product_model->productDetails($productid, $custom_id);
        $data['productdetails'] = $productdetails;
        $data["custom_item"] = "TuxedoSuit";
        $data['custom_id'] = $custom_id;
        
        $data['tuxedotype'] = "1";
        
        $this->load->view('Product/customization_suit_v2', $data);
    }
    
    function customizationTuxedoJacket($productid, $custom_id) {
        $productdetails = $this->Product_model->productDetails($productid, $custom_id);
        $data['productdetails'] = $productdetails;
        $data["custom_item"] = "TuxedoJacket";
        $data['custom_id'] = $custom_id;
        $data['tuxedotype'] = "1";
        $this->load->view('Product/customization_suit_v2', $data);
    }
    
    function customizationTuxedoPant($productid, $custom_id) {
        $productdetails = $this->Product_model->productDetails($productid, $custom_id);
        $data['productdetails'] = $productdetails;
        $data["custom_item"] = "TuxedoPant";
        $data['custom_id'] = $custom_id;
        $data['tuxedotype'] = "1";
        $this->load->view('Product/customization_suit_v2', $data);
    }
    
    
    function customizationSuitV2($productid, $custom_id) {
        $productdetails = $this->Product_model->productDetails($productid, $custom_id);
        $data['productdetails'] = $productdetails;
        $data["custom_item"] = "Suit";
        $data['custom_id'] = $custom_id;
        $data['tuxedotype'] = "0";
        $this->load->view('Product/customization_suit_v3', $data);
    }

    function customizationPant($productid, $custom_id) {
        $productdetails = $this->Product_model->productDetails($productid, $custom_id);
        $data['productdetails'] = $productdetails;
        $data["custom_item"] = "Pant";
        $data['custom_id'] = $custom_id;
        $data['tuxedotype'] = "0";
        $this->load->view('Product/customization_suit_v2', $data);
    }
    
    
    function customizationPantV2($productid, $custom_id) {
        $productdetails = $this->Product_model->productDetails($productid, $custom_id);
        $data['productdetails'] = $productdetails;
        $data["custom_item"] = "Pant";
        $data['custom_id'] = $custom_id;
        $this->load->view('Product/customization_suit_v3', $data);
    }

    function customizationJacket($productid, $custom_id) {
        $productdetails = $this->Product_model->productDetails($productid, $custom_id);
        $data['productdetails'] = $productdetails;
        $data["custom_item"] = "Jacket";
        $data['custom_id'] = $custom_id;
        $data['tuxedotype'] = "0";
        $this->load->view('Product/customization_suit_v2', $data);
    }

}

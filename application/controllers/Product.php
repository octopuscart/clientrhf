<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->library('session');
        $this->user_obj = $this->session->userdata('logged_in');
        $this->user_id = $this->user_obj ? $this->user_obj['login_id'] : 0;
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
        $data["appliedFilter"] = isset($_GET["filter"]) ? $_GET["filter"] : "Related";

        $session_last_custom = $this->session->userdata('session_last_custom');

        $data["session_last_custom"] = $session_last_custom;

        if (isset($_POST['priceenquiry'])) {
            $price_enquiry = array(
                'last_name' => $this->input->post('last_name'),
                'first_name' => $this->input->post('first_name'),
                'email' => $this->input->post('email'),
                'contact' => $this->input->post('contact'),
            );
            $sendernameeq = $this->input->post('last_name') . " " . $this->input->post('first_name');
            if ($this->input->post('email')) {
                $emailsender = email_sender;
                $sendername = email_sender_name;
                $email_bcc = email_bcc;
                $this->email->set_newline("\r\n");
                $this->email->from(email_bcc, $sendername);
                $this->email->to($this->input->post('email'));
                $this->email->bcc(email_bcc);
                $item = $this->input->post('item');
                $item_id = $this->input->post('item_id');
                $products = $this->input->post('productid');
                $productarray = array();
                foreach ($products as $key => $value) {
                    $product_details = $this->Product_model->productDetails($value, $item_id);
                    array_push($productarray, $product_details);
                    $session_enquiry_price = $this->session->userdata('session_enquiry_price');
                    unset($session_enquiry_price[$item_id][$value]);
                    $this->session->set_userdata('session_enquiry_price', $session_enquiry_price);
                }


                $subject = "Price Enquiry for " . $item;
                $this->email->subject($subject);
                $price_enquiry['item'] = $item;
                $price_enquiry['name'] = $sendernameeq;
                $price_enquiry['products'] = $productarray;
                $price_enquiry['subject'] = $subject;

                $htmlsmessage = $this->load->view('Email/price_enquiry', $price_enquiry, true);
                $this->email->message($htmlsmessage);

                $this->email->print_debugger();
                $send = $this->email->send();
                if ($send) {
                    // echo json_encode("send");
                } else {
                    $error = $this->email->print_debugger(array('headers'));
                    //  echo json_encode($error);
                }
            }
        }

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

            $this->load->view('Product/productDetails_1', $data);
        } else {
//            $this->load->view('errors/html/error_404');
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
        if ($this->user_id) {
            $data['user_id'] = $this->user_id;
            $data["product_id"] = $product_id;
            $data["item_id"] = $custom_id;
            $this->load->view('Product/preCustomeCheck', $data);
        } else {
            redirect(site_url("Product/customizationRedirectV2/$custom_id/$product_id"));
        }
    }

    function customizationRedirectV2($custom_id, $product_id) {
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
        $productdetails = $this->Product_model->productDetails($productid, $custom_id);
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

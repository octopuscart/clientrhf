<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH . 'libraries/REST_Controller.php');

class CustomApi extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->library('session');
        $this->checklogin = $this->session->userdata('logged_in');
        $this->user_id = $this->session->userdata('logged_in')['login_id'];
    }

    //shirt Implemantation
    function cartOperationSingle_get($product_id, $custom_id) {
        $prodct_details = $this->Product_model->productDetails($product_id, $custom_id);
        $prodct_details['product_id'] = $prodct_details['id'];
        $this->response($prodct_details);
    }

    function customeElements_get() {
        $customeele = array(
            "keys" => [
                array(
                    "title" => "Collar",
                    "viewtype" => "front",
                    "type" => "main",
                     "colrow" => "4",
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
                     "colrow" => "4",
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
                     "colrow" => "4",
                ),
                array(
                    "title" => "Back",
                    "viewtype" => "back",
                    "type" => "main",
                     "colrow" => "4",
                ),
                array(
                    "title" => "Pocket",
                    "viewtype" => "front",
                    "type" => "main",
                     "colrow" => "4",
                ),
                array(
                    "title" => "Bottom",
                    "viewtype" => "front",
                    "type" => "main",
                     "colrow" => "4",
                ),
                
                array(
                    "title" => "Buttons",
                    "viewtype" => "front",
                   "type" => "submain",
                     "colrow" => "2",
                ),
               
                array(
                    "title" => "Monogram",
                    "viewtype" => "front",
                    "type" => "main",
                    "colrow" => "4",
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
                        "image" => "customization/monogram_left_cuff.jpg",
                        "view_type" => "front",
                    ),
                    array(
                        "status" => "0",
                        "title" => "Collar",
                        "css_class" => "monogramtext_posistion_collar",
                        "not_show_when" => [],
                        "view_type" => "front",
                        "image" => "customization/monogram_inside_coller_band.jpg"
                    ),
                    array(
                        "status" => "0",
                        "title" => "Cuff",
                        "css_class" => "monogramtext_posistion_cuff_left",
                        "not_show_when" => ["Short Sleeve Without Cuff", "Short Sleeve With Cuff"],
                        "checkwith" => "Cuff & Sleeve",
                        "view_type" => "front",
                        "image" => "customization/monogram_left_cuff.jpg"
                    ),
                    array(
                        "status" => "0",
                        "title" => "Pocket",
                        "css_class" => "monogramtext_posistion_left_pocket",
                        "not_show_when" => ["No Pocket"],
                        "checkwith" => "Pocket",
                        "view_type" => "front",
                        "image" => "customization/monogram_left_chest_pocket.jpg"
                    ),
                    array(
                        "status" => "0",
                        "title" => "Abdomen",
                        "css_class" => "monogramtext_posistion_abdomen",
                        "not_show_when" => [],
                        "checkwith" => "Cuff & Sleeve",
                        "view_type" => "front",
                        "image" => "customization/left_abdomen.png"
                    ),
                    array(
                        "status" => "0",
                        "title" => "Shirt Tail",
                        "css_class" => "monogramtext_posistion_shirt_tail",
                        "not_show_when" => [],
                        "checkwith" => "Cuff & Sleeve",
                        "view_type" => "front",
                        "image" => "customization/shirt_tail.png"
                    ),],
                "Buttons" => [
                    array(
                        "status" => "1",
                        "title" => "1",
                        "button" => "b10",
                        "image" => "customization/buttons/b10.png",
                        "customization_category_id" => "8",
                    ),
                    array(
                        "status" => "0",
                        "title" => "2",
                        "button" => "pbe",
                        "image" => "customization/buttons/pbe.png",
                        "customization_category_id" => "8",
                    ), array(
                        "status" => "0",
                        "title" => "3",
                        "button" => "dbe",
                        "image" => "customization/buttons/dbe.png",
                        "customization_category_id" => "8",
                    ), array(
                        "status" => "0",
                        "title" => "4",
                        "button" => "sdr",
                        "image" => "customization/buttons/sdr.png",
                        "customization_category_id" => "8",
                    ), 
                    array(
                        "status" => "0",
                        "title" => "5",
                        "button" => "lgn",
                        "image" => "customization/buttons/lgn.png",
                        "customization_category_id" => "8",
                    ), array(
                        "status" => "0",
                        "title" => "6",
                        "button" => "gn",
                        "image" => "customization/buttons/gn.png",
                        "customization_category_id" => "8",
                    )
                    , array(
                        "status" => "0",
                        "title" => "7",
                        "button" => "dbn",
                        "image" => "customization/buttons/dbn.png",
                        "customization_category_id" => "8",
                    )
                    , array(
                        "status" => "0",
                        "title" => "8",
                        "button" => "re",
                        "image" => "customization/buttons/re.png",
                        "customization_category_id" => "8",
                    ),
                    array(
                        "status" => "0",
                        "title" => "9",
                        "button" => "yw",
                        "image" => "customization/buttons/yw.png",
                        "customization_category_id" => "8",
                    )
                    ,
                    array(
                        "status" => "0",
                        "title" => "10",
                        "button" => "spk",
                        "image" => "customization/buttons/spk.png",
                        "customization_category_id" => "8",
                    ),
                   
                ],
                "Button Hole Color Position" => [
                    array(
                        "status" => "1",
                        "title" => "All Places",
                        "ptype" => "1",
                        "image" => "customization/hole_all_only.jpeg",
                    ),
                    array(
                        "status" => "0",
                        "title" => "On Cuff",
                        "ptype" => "2",
                        "image" => "customization/hole_cuff_only.jpeg",
                    ),
                    array(
                        "status" => "0",
                        "title" => "On Cuff And Collar",
                        "image" => "customization/hole_collar_cuff_only.jpeg",
                        "ptype" => "3",
                    ),
                    array(
                        "status" => "0",
                        "title" => "On Front",
                        "image" => "customization/hole_front_only.jpeg",
                        "ptype" => "4",
                    ),
                ],
                "Stitching" => [
                    array(
                        "status" => "0",
                        "title" => "Close To Size",
                        "ptype" => "0",
                        "image" => "customization/stitchclose.jpeg",
                    ),
                    array(
                        "status" => "1",
                        "title" => "Standard 1/4",
                        "ptype" => "1",
                        "image" => "customization/stitch14.jpeg",
                    ),
                    array(
                        "status" => "0",
                        "title" => "Bespoke 3/8",
                        "ptype" => "2",
                        "image" => "customization/stitch38.jpeg",
                    ),
                ],
                "Button Hole Color" => [
                    array(
                        "status" => "1",
                        "title" => "Matching",
                        "image" => "customization/hole_thread/matching.png",
                        "folder" => "Matching",
                    ),
                    array(
                        "status" => "0",
                        "title" => "4",
                        "color" => "4",
                        "image" => "customization/hole_thread/4.jpg",
                    ),
                    array(
                        "status" => "0",
                        "title" => "8",
                        "color" => "8",
                        "image" => "customization/hole_thread/8.jpg",
                    ),
                    array(
                        "status" => "0",
                        "title" => "10",
                        "color" => "10",
                        "image" => "customization/hole_thread/10.jpg",
                    ),
                    array(
                        "status" => "0",
                        "title" => "11",
                        "color" => "11",
                        "image" => "customization/hole_thread/11.jpg",
                    ),
                    array(
                        "status" => "0",
                        "title" => "12",
                        "color" => "12",
                        "image" => "customization/hole_thread/12.jpg",
                    ),
                    array(
                        "status" => "0",
                        "title" => "13",
                        "color" => "13",
                        "image" => "customization/hole_thread/13.jpg",
                    ),
                    array(
                        "status" => "0",
                        "title" => "14",
                        "color" => "14",
                        "image" => "customization/hole_thread/14.jpg",
                    ),
                    array(
                        "status" => "0",
                        "title" => "17",
                        "color" => "17",
                        "image" => "customization/hole_thread/17.jpg",
                    ),
                ],
                "Button Thread Color" => [
                    array(
                        "status" => "1",
                        "title" => "Matching",
                        "image" => "customization/hole_thread/matching.png",
                        "folder" => "Matching",
                    ),
                    array(
                        "status" => "0",
                        "title" => "4",
                        "color" => "4",
                        "image" => "customization/hole_thread/4.jpg",
                    ),
                    array(
                        "status" => "0",
                        "title" => "8",
                        "color" => "8",
                        "image" => "customization/hole_thread/8.jpg",
                    ),
                    array(
                        "status" => "0",
                        "title" => "10",
                        "color" => "10",
                        "image" => "customization/hole_thread/10.jpg",
                    ),
                    array(
                        "status" => "0",
                        "title" => "11",
                        "color" => "11",
                        "image" => "customization/hole_thread/11.jpg",
                    ),
                    array(
                        "status" => "0",
                        "title" => "12",
                        "color" => "12",
                        "image" => "customization/hole_thread/12.jpg",
                    ),
                    array(
                        "status" => "0",
                        "title" => "13",
                        "color" => "13",
                        "image" => "customization/hole_thread/13.jpg",
                    ),
                    array(
                        "status" => "0",
                        "title" => "14",
                        "color" => "14",
                        "image" => "customization/hole_thread/14.jpg",
                    ),
                    array(
                        "status" => "0",
                        "title" => "17",
                        "color" => "17",
                        "image" => "customization/hole_thread/17.jpg",
                    ),
                ],
                "Bottom" => [
                    array(
                        "status" => "1",
                        "title" => "Rounded",
                        "elements" => ["shirtbody_round0001.png", "body_front_left0001.png"],
                        "customization_category_id" => "6",
                        "image" => "customization/bottom_rounded.jpeg",
                        "overlay" => []
                    ),
                    array(
                        "status" => "0",
                        "title" => "Squared",
                        "elements" => ["shirtbody_round0001.png", "body_front_left0001.png"],
                        "customization_category_id" => "6",
                        "image" => "customization/bottom_squred.jpeg",
                        "overlay" => ["bottomsqr.png"]
                    )],
                "Cuff & Sleeve" => [
                    array(
                        "status" => "0",
                        "french" => "No",
                        "title" => "Short Sleeve Without Cuff",
                        "elements" => [],
                        "backoverlay"=>["halfoverlay.png"],
                        "customization_category_id" => "3",
                        "image" => "customization/withoutcuff_sort.jpg",
                        "sleeve1" => ["shirtbody_half_sleeve0001.png",],
                        "sleeve" => ["b_shirtbody_half0001.png", "back_half_sleeve0001.png",],
                        "monogram_change_css" => "monogramtext_posistion_collar",
                        "monogram_position" => array(
                            "status" => "0",
                            "title" => "Collar",
                            "css_class" => "monogramtext_posistion_collar",
                        ),
                    ),
                    
                    array(
                        "status" => "0",
                        "title" => "Single Cuff Rounded",
                        "elements" => [ "cuff_m_rounded20001.png"],
                        "insertele" => [ "cuff_m_rounded30001.png"],
                        "inserteleo" => [ "cuff_m_rounded30001.png"],
                        "stitching38" => [ "cuff_m_rounded20001st38.png"],
                        "stitching14" => [ "cuff_m_rounded20001st14.png"],
                        "customization_category_id" => "3",
                        "image" => "customization/cuff_single_rounded.jpg",
                        "sleeve1" => ["shirt_sleeve0001.png"],
                        "insert_style_css" => "",
                        "insert_style" => "cuff_m_rounded20001.png",
                        "insert_overlay" => "cuff_single_insert_overlay.png",
                        "insert_overlay_css" => "",
                        "insert_full" => ["cuff_single_rounded0001.png"],
                        "sleeve" => ["b_full_shirt_sleeve0001.png",],
                        "button_hole" => ["cuff_s_hole_10001.png"],
                        "button_thread" => ["cuff_s_button1_trd0001.png"],
                        "buttons" => "cuff_s_button10001.png",
                        "french" => "0",
                    ), array(
                        "status" => "1",
                        "title" => "Single Cuff Cutaway",
                        "elements" => [ "cuff_m_cutaway20001.png"],
                        "insertele" => [ "cuff_m_cutaway30001.png"],
                        "inserteleo" => [ "cuff_m_cutaway30001.png"],
                        "stitching38" => [ "cuff_m_cutaway20001st38.png"],
                        "stitching14" => [ "cuff_m_cutaway20001st14.png"],
                        "customization_category_id" => "3",
                        "image" => "customization/single_cuff_cutaway.jpg",
                        "insert_style_css" => "",
                        "sleeve1" => ["shirt_sleeve0001.png"],
                        "insert_style" => "cuff_m_cutaway20001.png",
                        "insert_overlay" => "cuff_single_insert_overlay.png",
                        "insert_overlay_css" => "",
                        "insert_full" => ["cuff_single_cutaway0001.png"],
                        "sleeve" => ["b_full_shirt_sleeve0001.png",],
                        "button_hole" => ["cuff_s_hole_10001.png"],
                        "button_thread" => ["cuff_s_button1_trd0001.png"],
                        "buttons" => "cuff_s_button10001.png",
                        "french" => "0",
                    ), array(
                        "status" => "0",
                        "title" => "Single Cuff Squared",
                        "elements" => [ "cuff_m_squre20001.png"],
                        "insertele" => [ "cuff_m_squre30001.png"],
                        "inserteleo" => [ "cuff_m_squre30001.png"],
                        "stitching38" => [ "cuff_m_squre20001st38.png"],
                        "stitching14" => [ "cuff_m_squre20001st14.png"],
                        "customization_category_id" => "3",
                        "image" => "customization/cuff_single_squred.jpg",
                        "insert_style_css" => "",
                        "sleeve1" => ["shirt_sleeve0001.png"],
                        "insert_style" => "cuff_m_cutaway20001.png",
                        "insert_overlay" => "cuff_single_insert_overlay.png",
                        "insert_overlay_css" => "",
                        "insert_full" => ["cuff_single_cutaway0001.png"],
                        "sleeve" => ["b_full_shirt_sleeve0001.png",],
                        "button_hole" => ["cuff_s_hole_10001.png"],
                        "button_thread" => ["cuff_s_button1_trd0001.png"],
                        "buttons" => "cuff_s_button10001.png",
                        "french" => "0",
                    ), array(
                        "status" => "0",
                        "title" => "2 Buttons Rounded",
                        "sleeve1" => ["shirt_sleeve0001.png"],
                        "elements" => [ "cuff_m_rounded20001.png"],
                        "insertele" => [ "cuff_m_rounded30001.png"],
                        "inserteleo" => [ "cuff_m_rounded30001.png"],
                        "stitching38" => [ "cuff_m_rounded20001st38.png"],
                        "stitching14" => [ "cuff_m_rounded20001st14.png"],
                        "customization_category_id" => "3",
                        "image" => "customization/2_buttons_rounded.jpg",
                        "insert_style_css" => "",
                        "insert_style" => "cuff_m_rounded20001.png",
                        "insert_overlay" => "cuff_single_insert_overlay.png",
                        "insert_overlay_css" => "",
                        "insert_full" => ["cuff_single_rounded0001.png"],
                        "sleeve" => ["b_full_shirt_sleeve0001.png",],
                        "button_hole" => ["cuff_s_hole_20001.png"],
                        "button_thread" => ["cuff_s_button1_trd0001.png", "cuff_s_button2_trd0001.png"],
                        "buttons" => "cuff_s_button20001.png",
                        "french" => "0",
                    ), array(
                        "status" => "0",
                        "title" => "2 Buttons Cutaway",
                        "customization_category_id" => "3",
                        "sleeve1" => ["shirt_sleeve0001.png"],
                        "elements" => [ "cuff_m_cutaway20001.png"],
                        "insertele" => [ "cuff_m_cutaway30001.png"],
                        "inserteleo" => [ "cuff_m_cutaway30001.png"],
                        "stitching38" => [ "cuff_m_cutaway20001st38.png"],
                        "stitching14" => [ "cuff_m_cutaway20001st14.png"],
                        "image" => "customization/2_buttons_cutaway.jpg",
                        "insert_style_css" => "",
                        "insert_style" => "cuff_m_cutaway20001.png",
                        "insert_overlay" => "cuff_single_insert_overlay.png",
                        "insert_overlay_css" => "",
                        "insert_full" => ["cuff_single_cutaway0001.png"],
                        "sleeve" => ["b_full_shirt_sleeve0001.png",],
                        "button_hole" => [ "cuff_s_hole_20001.png"],
                        "button_thread" => ["cuff_s_button1_trd0001.png", "cuff_s_button2_trd0001.png"],
                        "buttons" => "cuff_s_button20001.png",
                        "french" => "0",
                    ), array(
                        "status" => "0",
                        "title" => "2 Buttons Squared",
                        "elements" => [ "cuff_m_squre20001.png"],
                        "insertele" => [ "cuff_m_squre30001.png"],
                        "inserteleo" => [ "cuff_m_squre30001.png"],
                        "stitching38" => [ "cuff_m_squre20001st38.png"],
                        "stitching14" => [ "cuff_m_squre20001st14.png"],
                        "customization_category_id" => "3",
                        "image" => "customization/2_buttons_squre.jpg",
                        "insert_style_css" => "",
                        "sleeve1" => ["shirt_sleeve0001.png"],
                        "insert_style" => "cuff_m_cutaway20001.png",
                        "insert_overlay" => "cuff_single_insert_overlay.png",
                        "insert_overlay_css" => "",
                        "insert_full" => ["cuff_single_cutaway0001.png"],
                        "sleeve" => ["b_full_shirt_sleeve0001.png",],
                        "button_hole" => [ "cuff_s_hole_20001.png"],
                        "button_thread" => ["cuff_s_button1_trd0001.png", "cuff_s_button2_trd0001.png"],
                        "buttons" => "cuff_s_button20001.png",
                        "french" => "0",
                    ), 
                    array(
                        "status" => "0",
                        "title" => "French Cuff Squared",
                        "sleeve1" => ["shirt_sleeve0001.png"],
                        "customization_category_id" => "3",
                        "elements" => [ "cuff_m_franch_squre_20001.png"],
                        "insertele" => [ "cuff_m_franch_squre0001.png"],
                        "inserteleo" => [ "cuff_m_franch_squre0001.png"],
                        "stitching38" => [ "cuff_m_franch_squre0001st38.png"],
                        "stitching14" => [ "cuff_m_franch_squre0001st14.png"],
                        "image" => "customization/cuff_franch_squre.jpg",
                        "insert_style_css" => "",
                        "insert_style" => "cuff_m_franch_squre_insert0001.png",
                        "insert_overlay" => "cuff_franch_insert_overlay.png",
                        "insert_overlay_css" => "",
                        "insert_full" => ["cuff_franch_rounded0001.png"],
                        "buttons" => "cuff_m_franch_squre_button0001.png",
                        "sleeve" => ["b_full_shirt_sleeve0001.png"],
                        "french" => "1",
                    )
                    , 
                    array(
                        "status" => "0",
                        "title" => "Convertible Cuff Cutaway",
                        "elements" => [ "cuff_m_cutaway20001.png"],
                        "insertele" => [ "cuff_m_cutaway30001.png"],
                        "inserteleo" => [ "cuff_m_cutaway30001.png"],
                        "stitching38" => [ "cuff_m_cutaway20001st38.png"],
                        "stitching14" => [ "cuff_m_cutaway20001st14.png"],
                        "customization_category_id" => "3",
                        "image" => "customization/convertiblecutaway.jpeg",
                        "insert_style_css" => "",
                        "sleeve1" => ["shirt_sleeve0001.png"],
                        "insert_style" => "cuff_m_cutaway20001.png",
                        "insert_overlay" => "cuff_single_insert_overlay.png",
                        "insert_overlay_css" => "",
                        "insert_full" => ["cuff_single_cutaway0001.png"],
                        "sleeve" => ["b_full_shirt_sleeve0001.png",],
                        "button_hole" => ["cuff_s_hole_10001.png",],
                        "button_thread" => ["cuff_s_button1_trd0001.png"],
                        "buttons" => "cuff_s_button10001.png",
                        "french" => "0",
                    )
                ],
                "Back" => [
                    array(
                        "status" => "0",
                        "title" => "Plain",
                        "customization_category_id" => "5",
                        "halfsleeve" => ["back_half_sleeve0001.png", "back_half_sleeve_cuff0001.png"],
                        "fullsleeve" => ["b_full_shirt_sleeve0001.png",],
                        "elements" => [ "b_shirtbody_round0001.png",],
                        "overlay" => [],
                        "image" => "customization/back_plain.jpeg"
                    ), array(
                        "status" => "0",
                        "title" => "Side Pleated",
                        "customization_category_id" => "5",
                        "halfsleeve" => ["back_half_sleeve0001.png", "back_half_sleeve_cuff0001.png"],
                        "fullsleeve" => ["b_full_shirt_sleeve0001.png", "b_full_shirt_sleeve0001.png",],
                        "overlay" => ["towside.png"],
                        "elements" => ["b_shirtbody_round0001.png", ],
                        "image" => "customization/back_two_side.jpeg"
                    ), array(
                        "status" => "0",
                        "title" => "Boxpleat",
                        "customization_category_id" => "5",
                        "halfsleeve" => ["back_half_sleeve0001.png", "back_half_sleeve_cuff0001.png"],
                        "fullsleeve" => ["b_full_shirt_sleeve0001.png", "back_sleeve_cuff0001.png"],
                        "overlay" => ["boxpleat.png"],
                        "elements" => [ "b_shirtbody_round0001.png",   ],
                        "image" => "customization/back_box_pleat.jpeg"
                    ), array(
                        "status" => "1",
                        "title" => "Dart",
                        "customization_category_id" => "5",
                        "halfsleeve" => ["back_half_sleeve0001.png", "back_half_sleeve_cuff0001.png"],
                        "fullsleeve" => ["b_full_shirt_sleeve0001.png", "back_full_sleeve_cuff0001.png"],
                        "overlay" => ["dartov.png"],
                        "elements" => ["b_shirtbody_round0001.png",  ],
                        "image" => "customization/dart.jpeg"
                    )],
                "Pocket" => [
                    array(
                        "status" => "1",
                        "title" => "No Pocket",
                        "customization_category_id" => "7",
                        "elements" => [],
                        "image" => "customization/pocket_no.jpeg",
                        "monogram_change_css" => "monogramtext_posistion_collar",
                        "monogram_position" => array(
                            "status" => "0",
                            "title" => "Collar",
                            "css_class" => "monogramtext_posistion_collar",
                        ),
                    ), array(
                        "status" => "0",
                        "title" => "1 Regular Pocket",
                        "customization_category_id" => "7",
                        "elements" => ["shirtbody_pocket_right20001.png",],
                        "overlay"=>["right_pocketoverlay.png"],
                        "image" => "customization/pocket_one.jpeg"
                    ), array(
                        "status" => "0",
                        "title" => "2 Regular Pockets",
                        "customization_category_id" => "7",
                        "overlay"=>["left_pocketoverlay.png", "right_pocketoverlay.png"],
                        "elements" => ["shirtbody_pocket_right20001.png", "shirtbody_pocket_left20001.png"],
                        "image" => "customization/pocket_two.jpeg"
                    ),
                   
                ],
                "Front" => [
                    array(
                        "status" => "1",
                        "title" => "Plain Front",
                        "customization_category_id" => "4",
                        "elements" => [],
                        "image" => "customization/front_plain.jpeg",
                        "show_buttons" => "true",
                    ), array(
                        "status" => "0",
                        "title" => "Fly Front",
                        "elements" => [ "front_pleat0001.png"],
                        "stitching38" => [ "flyfront0001st38sd.png"],
                        "stitching14" => [ "flyfront0001st14sd.png"],
                        "customization_category_id" => "4",
                        "image" => "customization/front_fly.jpeg",
                        "show_buttons" => "false",
                    )
                    
                ],
                "Collar" => [
                    array(
                        "status" => "0",
                        "title" => "Regular",
                        "elements" => ["collar_m_comman_insert20001.png", "collar_insert0001.png", "collar_ragular_5w0001.png"],
                        "stitching38" => [ "collar_ragular_5w0001st38.png"],
                        "stitching14" => [ "collar_ragular_5w0001st14.png"],
                        "customization_category_id" => "2",
                        "insert_style" => "collar_m_comman_insert20001.png",
                        "insert_overlay" => "collar_simple_insert_overlay.png",
                        "insert_collar" => [ "collar_ragular_5w_ins0001.png"],
                        "insert_full" => ["collar_ragular_5w_insf0001.png"],
                        "image" => "customization/collar_regular.jpeg",
                       
                    ), array(
                        "status" => "1",
                        "title" => "Medium Spread",
                        "customization_category_id" => "2",
                        "insert_style" => "collar_m_comman_insert20001.png",
                        "insert_overlay" => "collar_simple_insert_overlay.png",
                        "elements" => ["collar_m_comman_insert20001.png","collar_insert0001.png", "collar_medium_spread_5w0001.png"],
                        "insert_collar" => [ "collar_medium_spread_5w_ins0001.png"],
                        "stitching38" => [ "collar_medium_spread_5w0001st38.png"],
                        "stitching14" => [ "collar_medium_spread_5w0001st14.png"],
                        "insert_full" => ["collar_medium_spread_5w_insf0001.png"],
                        "image" => "customization/collar_medium_spread.jpeg",
                       
                    ), array(
                        "status" => "0",
                        "title" => "Full Cutaway",
                        "customization_category_id" => "2",
                        "insert_style" => "collar_m_comman_insert20001.png",
                        "insert_overlay" => "collar_simple_insert_overlay.png",
                        "insert_full" => ["collar_fullcutaway_5w_insf0001.png"],
                        "elements" => ["collar_m_comman_insert20001.png","collar_insert0001.png", "collar_fullcutaway_5w0001.png"],
                        "insert_collar" => [ "collar_fullcutaway_5w_ins0001.png"],
                        "stitching38" => [ "collar_fullcutaway_5w0001st38.png"],
                        "stitching14" => [ "collar_fullcutaway_5w0001st14.png"],
                        "image" => "customization/collar_full_cutaway.jpeg",
                        
                    ), array(
                        "status" => "0",
                        "title" => "Wide Spread",
                        "customization_category_id" => "2",
                        "elements" => ["collar_m_comman_insert20001.png","collar_insert0001.png", "collar_wide_spread_5w0001.png"],
                        "insert_collar" => [ "collar_wide_spread_5w_ins0001.png"],
                        "stitching38" => [ "collar_wide_spread_5w0001st38.png"],
                        "stitching14" => [ "collar_wide_spread_5w0001st14.png"],
                        "image" => "customization/collar_wide_spread.jpeg",
                        "insert_style" => "collar_m_comman_insert20001.png",
                        "insert_overlay" => "collar_simple_insert_overlay.png",
                        "insert_full" => ["collar_wide_spread_5w_insf0001.png"],
                        
                    )
                    , array(
                        "status" => "0",
                        "title" => "Button Down",
                        "customization_category_id" => "2",
                        "elements" => ["collar_m_comman_insert20001.png", "collar_insert0001.png", "collar_ragular_5w0001.png"],
                        "insert_collar" => [ "collar_button_down_5w_ins0001.png"],
                        "stitching38" => [ "collar_button_down_5w0001st38.png"],
                        "stitching14" => [ "collar_button_down_5w0001st14.png"],
                        "image" => "customization/collar_regular_button_down.jpeg",
                        "overlay" => [ "button_down_overlay.png"],
                        "insert_style" => "collar_m_comman_insert20001.png",
                        "insert_overlay" => "collar_simple_insert_overlay.png",
                        "insert_full" => ["collar_button_down_5w_insf0001.png"],
                       
                        "buttons" => ["button_collar_button_down0001.png"],
                    )
                    , array(
                        "status" => "0",
                        "title" => "Hidden Button Down",
                        "customization_category_id" => "2",
                        "elements" => ["collar_m_comman_insert20001.png","collar_insert0001.png", "collar_hidden_button_down_5w0001.png"],
                        "insert_collar" => [ "collar_hidden_button_down_5w_ins0001.png"],
                        "stitching38" => [ "collar_hidden_button_down_5w0001st38.png"],
                        "stitching14" => [ "collar_hidden_button_down_5w0001st14.png"],
                        "overlay" => [ "hidden_button_down_overlay.png"],
                        "image" => "customization/hidden_button_down.jpeg",
                        "insert_style" => "collar_m_comman_insert20001.png",
                        "insert_overlay" => "collar_simple_insert_overlay.png",
                        "insert_full" => ["collar_hidden_button_down_5w_insf0001.png"],
                        "buttons" => ["button_collar_hidden_button_down0001.png"],
                    ),
                   
                ]
            ),
            "cuff_collar_insert" => ["p10", "p11", "p2", "p18"],
            "monogram_colors" => [

                array(
                    "color" => "#000",
                    "backcolor" => "#c0c0c0",
                    "title" => "Silver"
                ),
                array(
                    "color" => "white",
                    "backcolor" => "white",
                    "title" => "White"
                ),
                array(
                    "color" => "#f5f5dc",
                    "backcolor" => "#f5f5dc",
                    "title" => "Beige"
                ),
                array(
                    "color" => "#fffdd0",
                    "backcolor" => "#fffdd0",
                    "title" => "Cream"
                ),
                array(
                    "color" => "#add8e6",
                    "backcolor" => "#add8e6",
                    "title" => "Light Blue"
                ),
                array(
                    "color" => "#028482",
                    "backcolor" => "#028482",
                    "title" => "Aqua"
                ),
                array(
                    "color" => "#ffc0cb",
                    "backcolor" => "#ffc0cb",
                    "title" => "Pink"
                ),
                array(
                    "color" => "#60708e",
                    "backcolor" => "#60708e",
                    "title" => "Medium Blue"
                ),
                array(
                    "color" => "#d2b48c",
                    "backcolor" => "#d2b48c",
                    "title" => "Tan"
                ),
                array(
                    "color" => "#ffa500",
                    "backcolor" => "#ffa500",
                    "title" => "Orange"
                ),
                array(
                    "color" => "#808080",
                    "backcolor" => "#808080",
                    "title" => "Grey"
                ),
                array(
                    "color" => "#00ff00",
                    "backcolor" => "#00ff00",
                    "title" => "Green"
                ),
                array(
                    "color" => "#ffff00",
                    "backcolor" => "#ffff00",
                    "title" => "Yellow"
                ),
                array(
                    "color" => "#008080",
                    "backcolor" => "#008080",
                    "title" => "Teal"
                ),
                array(
                    "color" => "#b03060",
                    "backcolor" => "#b03060",
                    "title" => "Maroon"
                ),
                array(
                    "color" => "#ff0000",
                    "backcolor" => "#ff0000",
                    "title" => "Red"
                ),
                array(
                    "color" => "#8c001a",
                    "backcolor" => "#8c001a",
                    "title" => "Burgundy"
                ),
                array(
                    "color" => "#c04000",
                    "backcolor" => "#c04000",
                    "title" => "Mahogany"
                ),
                array(
                    "color" => "#b87333",
                    "backcolor" => "#b87333",
                    "title" => "Khaki / Copper"
                ),
                array(
                    "color" => "#663300",
                    "backcolor" => "#663300",
                    "title" => "Brown"
                ),
                array(
                    "color" => "#800080",
                    "backcolor" => "#800080",
                    "title" => "Purple"
                ),
                array(
                    "color" => "#0000ff",
                    "backcolor" => "#0000ff",
                    "title" => "Blue"
                ),
                array(
                    "color" => "#000080",
                    "backcolor" => "#000080",
                    "title" => "Dark Blue"
                ),
                array(
                    "color" => "#000080",
                    "backcolor" => "#000080",
                    "title" => "Navy Blue"
                ),
                array(
                    "color" => "white",
                    "backcolor" => "#000",
                    "title" => "Black"
                ),
            ],
            "monogram_style" => [
                array(
                    "title" => "1",
                    "image" => "1.png",
                ),
                array(
                    "title" => "2",
                    "image" => "2.png",
                ),
                array(
                    "title" => "3",
                    "image" => "3.png",
                ),
                array(
                    "title" => "4",
                    "image" => "4.png",
                ),
                array(
                    "title" => "5",
                    "image" => "5.png",
                ),
                array(
                    "title" => "6",
                    "image" => "6.png",
                ),
                array(
                    "title" => "7",
                    "image" => "7.png",
                ),
                array(
                    "title" => "9",
                    "image" => "9.png",
                ),
                array(
                    "title" => "10",
                    "image" => "10.png",
                ),
                array(
                    "title" => "11",
                    "image" => "11.png",
                ),
                array(
                    "title" => "14",
                    "image" => "14.png",
                ),
                array(
                    "title" => "15",
                    "image" => "15.png",
                ),
            ],
        );
        foreach ($customeele as $key => $value) {
            
        }
        $this->response($customeele);
    }

    //end of shirt


    function suitCustomeElements() {
        $data = array(
            "Hidden Pocket" => [
                array(
                    "status" => "1",
                    "title" => "No Pocket",
                    "customization_category_id" => "4",
                    "elements" => ["pant_pleat_no0001.png"],
                    "image" => "pant_elements/waistband/no_belt_loop.png",
                    "show_buttons" => "true",
                ),
                array(
                    "status" => "0",
                    "title" => "Inside Waistband",
                    "elements" => [],
                    "customization_category_id" => "4",
                    "image" => "pant_elements/waistband/hidden_pocket_iw.png",
                    "show_buttons" => "true",
                ),
                array(
                    "status" => "0",
                    "title" => "Outside Waistband",
                    "elements" => [],
                    "customization_category_id" => "4",
                    "image" => "pant_elements/waistband/hidden_pocket_ow.png",
                    "show_buttons" => "true",
                )
            ],
            "Number of Pleat" => [
                array(
                    "status" => "1",
                    "title" => "No Pleat",
                    "customization_category_id" => "4",
                    "elements" => ["pant_pleat_no0001.png"],
                    "image" => "pant_elements/pleat/no_pleat.png",
                    "show_buttons" => "true",
                ),
                array(
                    "status" => "0",
                    "title" => "1 Pleat Standard",
                    "elements" => ["pant_pleat_110001.png"],
                    "customization_category_id" => "4",
                    "image" => "pant_elements/pleat/pleat_s1.png",
                    "show_buttons" => "true",
                ),
                array(
                    "status" => "0",
                    "title" => "2 Pleats Standard",
                    "elements" => ["pant_pleat_220001.png"],
                    "customization_category_id" => "4",
                    "image" => "pant_elements/pleat/pleat_s2.png",
                    "show_buttons" => "true",
                )
            ],
            "Waistband Adjustment" => [
                array(
                    "status" => "0",
                    "title" => "No",
                    "customization_category_id" => "4",
                    "elements" => [],
                    "image" => "pant_elements/waistband/nobeltloop.png",
                    "show_buttons" => "true",
                    "wbtype" => "all",
                )
                , array(
                    "status" => "1",
                    "title" => "Belt Loop",
                    "elements" => ["pant_belt_loopwb0001.png",],
                    "overlay" => ["pant_belt_loopwboverlay.png"],
                    "customization_category_id" => "4",
                    "image" => "pant_elements/waistband/beltloop.png",
                    "backbeltloop" => "true",
                    "show_buttons" => "true",
                    "wbtype" => "all",
                )
                , array(
                    "status" => "0",
                    "title" => "Adjustment With Button",
                    "elements" => ["adjustable_buttons0001.png",],
                    "overlay" => ["adjustable_buttonsoverlay.png", "adjustable_button.png"],
                    "customization_category_id" => "4",
                    "image" => "pant_elements/waistband/fastenbutton.png",
                    "backbeltloop" => "true",
                    "show_buttons" => "true",
                    "wbtype" => "all",
                )
                , array(
                    "status" => "0",
                    "title" => "Adjustment With Buckle",
                    "elements" => [ "adjustable_buckle0001.png",],
                    "overlay" => ["adjustable_buckleoverlay.png"],
                    "customization_category_id" => "4",
                    "image" => "pant_elements/waistband/fastenbuckle.png",
                    "backbeltloop" => "true",
                    "show_buttons" => "true",
                    "wbtype" => "all",
                )
            ],
           "Waistband" => [
                    array(
                        "status" => "0",
                        "title" => "No Belt Loop",
                        "customization_category_id" => "4",
                        "elements" => ["pant_waistband0001.png"],
                        "image" => "pant_elements/waistband/no_belt_loop.png",
                        "show_buttons" => "true",
                    ), array(
                        "status" => "1",
                        "title" => "Belt Loop",
                        "elements" => ["pant_waistband0001.png", "pant_belt_loop0001.png",],
                        "customization_category_id" => "4",
                        "image" => "pant_elements/waistband/belt_loop.png",
                        "backbeltloop" => "true",
                        "show_buttons" => "true",
                    )
                ],
            "Front Pocket Style" => [
                array(
                    "status" => "1",
                    "title" => "Slanting Pocket",
                    "customization_category_id" => "4",
                    "elements" => ["pant_pocket_slanted.png"],
                    "image" => "pant_elements/pocket/pocket_slanted.png",
                    "show_buttons" => "true",
                ), array(
                    "status" => "0",
                    "title" => "Straight Pocket",
                    "elements" => ["pant_pocket_seam.png",],
                    "customization_category_id" => "4",
                    "image" => "pant_elements/pocket/pocket_seam.png",
                    "show_buttons" => "true",
                ),
            ],
            "Number of Back Pocket" => [
                array(
                    "status" => "0",
                    "title" => "Welt Pocket Right Side",
                    "customization_category_id" => "4",
                    "elements" => ["back_pocket_r0001.png", "back_pocket_l_button0001.png"],
                    "image" => "pant_elements/back_pocket/back_r_pocket.png",
                    "show_buttons" => "true",
                ), array(
                    "status" => "0",
                    "title" => "Welt Pocket Left Side",
                    "elements" => ["back_pocket_l0001.png", "back_pocket_r_button0001.png"],
                    "customization_category_id" => "4",
                    "image" => "pant_elements/back_pocket/back_l_pocket.png",
                    "show_buttons" => "true",
                ), array(
                    "status" => "1",
                    "title" => "2 Welt Pockets",
                    "elements" => ["back_pocket_r0001.png", "back_pocket_l_button0001.png", "back_pocket_l0001.png", "back_pocket_r_button0001.png"],
                    "customization_category_id" => "4",
                    "image" => "pant_elements/back_pocket/back_2_pocket.png",
                    "show_buttons" => "true",
                ),
                
            ],
            "Cuff" => [
                    array(
                        "status" => "1",
                        "title" => "No Cuff",
                        "customization_category_id" => "4",
                        "elements" => [],
                        "image" => "pant_elements/pant_cuff/pant_no_cuff.png",
                        "show_buttons" => "true",
                    ), array(
                        "status" => "0",
                        "title" => "Cuff 1 1/2",
                        "elements" => ["pant_cuff.png",],
                        "customization_category_id" => "4",
                        "image" => "pant_elements/pant_cuff/pant_cuff.png",
                        "show_buttons" => "true",
                    ),
                ],
            "Buttons" => [
                 array(
                        "status" => "1",
                        "title" => "buttonwood",
                        "customization_category_id" => "4",
                        "image" => "buttonlipsell.png",
                        "folder" => "buttonwood",
                        "show_buttons" => "true",
                    ),
               
            ],
            "Contrast First Button Hole" => [
                array(
                    "status" => "1",
                    "title" => "Matching",
                    "image" => "customization/hole_thread/matching.png",
                    "folder" => "Matching",
                ),
                array(
                    "status" => "0",
                    "title" => "4",
                    "color" => "4",
                    "image" => "customization/hole_thread/4.jpg",
                ),
                array(
                    "status" => "0",
                    "title" => "8",
                    "color" => "8",
                    "image" => "customization/hole_thread/8.jpg",
                ),
                array(
                    "status" => "0",
                    "title" => "10",
                    "color" => "10",
                    "image" => "customization/hole_thread/10.jpg",
                ),
                array(
                    "status" => "0",
                    "title" => "11",
                    "color" => "11",
                    "image" => "customization/hole_thread/11.jpg",
                ),
                array(
                    "status" => "0",
                    "title" => "12",
                    "color" => "12",
                    "image" => "customization/hole_thread/12.jpg",
                ),
                array(
                    "status" => "0",
                    "title" => "13",
                    "color" => "13",
                    "image" => "customization/hole_thread/13.jpg",
                ),
                array(
                    "status" => "0",
                    "title" => "14",
                    "color" => "14",
                    "image" => "customization/hole_thread/14.jpg",
                ),
                array(
                    "status" => "0",
                    "title" => "17",
                    "color" => "17",
                    "image" => "customization/hole_thread/17.jpg",
                ),
            ],
            "Breast Pocket" => [
                    array(
                        "status" => "1",
                        "title" => "Slanted Pocket",
                        "customization_category_id" => "4",
                        "elements" => ["breast_pocket0001.png"],
                        "image" => "suit_elements/breastpocket/breast_pocket_yes.png",
                        "show_buttons" => "true",
                    ), array(
                        "status" => "0",
                        "title" => "No Pocket",
                        "elements" => [],
                        "customization_category_id" => "4",
                        "image" => "suit_elements/breastpocket/breast_pocket_no.png",
                        "show_buttons" => "true",
                    )],
            "Ticket Pocket" => [
                array(
                    "status" => "1",
                    "title" => "No Pocket",
                    "customization_category_id" => "4",
                    "elements" => [],
                    "image" => "suit_elements/pocket/ticketpocket_n.png",
                    "show_buttons" => "true",
                ), array(
                    "status" => "0",
                    "title" => "Flap Pocket",
                    "elements" => ["ticket_pocket_f0001.png"],
                    "overlay" => ["ticketpocket_f_overlay.png"],
                    "customization_category_id" => "4",
                    "image" => "suit_elements/pocket/ticketpocket_f.png",
                    "show_buttons" => "true",
                ), array(
                    "status" => "0",
                    "title" => "Pipe Pocket",
                    "overlay" => ["ticket_pocket_w_overlay.png"],
                    "elements" => ["ticket_pocket_w0001.png"],
                    "customization_category_id" => "4",
                    "image" => "suit_elements/pocket/ticketpocket_w.png",
                    "show_buttons" => "true",
                )],
            "Back Vent" => [
                    array(
                        "status" => "0",
                        "title" => "No Vent",
                        "customization_category_id" => "4",
                        "elements" => ["back_sleeve0001.png", "back_upper0001.png", "back_body0001.png",],
                        "image" => "suit_elements/back/back_no_vent.png",
                        "show_buttons" => "true",
                    ), array(
                        "status" => "0",
                        "title" => "Center Vent",
                        "elements" => ["back_sleeve0001.png", "back_upper0001.png", "back_body0001.png",],
                        "customization_category_id" => "4",
                        "image" => "suit_elements/back/back_center_vent.png",
                        "show_buttons" => "false",
                        "overlay" => ["centervent.png"],
                    ), array(
                        "status" => "1",
                        "title" => "Side Vent",
                        "elements" => ["back_sleeve0001.png", "back_upper0001.png", "back_body0001.png",],
                        "customization_category_id" => "4",
                        "image" => "suit_elements/back/back_side_vent.png",
                        "show_buttons" => "true",
                        "overlay" => ["sidevent.png"],
                    )],
            "Lapel Button Hole Color" => [
                array(
                    "status" => "1",
                    "title" => "Matching",
                    "image" => "customization/hole_thread/matching.png",
                    "folder" => "Matching",
                ),
                array(
                    "status" => "0",
                    "title" => "4",
                    "color" => "4",
                    "image" => "customization/hole_thread/4.jpg",
                ),
                array(
                    "status" => "0",
                    "title" => "8",
                    "color" => "8",
                    "image" => "customization/hole_thread/8.jpg",
                ),
                array(
                    "status" => "0",
                    "title" => "10",
                    "color" => "10",
                    "image" => "customization/hole_thread/10.jpg",
                ),
                array(
                    "status" => "0",
                    "title" => "11",
                    "color" => "11",
                    "image" => "customization/hole_thread/11.jpg",
                ),
                array(
                    "status" => "0",
                    "title" => "12",
                    "color" => "12",
                    "image" => "customization/hole_thread/12.jpg",
                ),
                array(
                    "status" => "0",
                    "title" => "13",
                    "color" => "13",
                    "image" => "customization/hole_thread/13.jpg",
                ),
                array(
                    "status" => "0",
                    "title" => "14",
                    "color" => "14",
                    "image" => "customization/hole_thread/14.jpg",
                ),
                array(
                    "status" => "0",
                    "title" => "17",
                    "color" => "17",
                    "image" => "customization/hole_thread/17.jpg",
                ),
            ],
            "Lapel Button Hole" => [
                array(
                    "status" => "1",
                    "title" => "Yes",
                    "customization_category_id" => "4",
                    "elements" => ["back_sleeve0001.png", "back_side__no_vent0001.png"],
                    "image" => "suit_elements/laple_button_hole/button_hole_yes.png",
                    "show_buttons" => "true",
                    "insert" => "Matching",
                ), array(
                    "status" => "0",
                    "title" => "No",
                    "elements" => ["back_sleeve0001.png", "back_side_center_vent0001.png"],
                    "customization_category_id" => "4",
                    "image" => "suit_elements/laple_button_hole/button_hole_no.png",
                    "show_buttons" => "false",
                    "insert" => "Matching",
                )],
            "Handstitching" => [
                array(
                    "status" => "1",
                    "title" => "No",
                    "image" => "handstitchyes.jpeg",
                ), array(
                    "status" => "0",
                    "title" => "Yes",
                    "image" => "handstitchno.jpeg"
                )],
            "Sleeve Buttons" => [
                    array(
                        "status" => "1",
                        "title" => "4 Flat Buttons",
                        "customization_category_id" => "4",
                        "elements" => ["buttons_flat3_hole0001.png", "buttons_flat1_hole0001.png",],
                        "image" => "suit_elements/button/button_4_flat.png",
                        "buttons" => ["buttons_flat10001.png", "buttons_flat30001.png"],
                        "buttonhole" => ["sleeve_button_hole_40001.png", "sleeve_button_hole_comman0001.png", "sleeve_button_hole_10001.png"],
                        "show_buttons" => "true",
                    ),
                    array(
                        "status" => "0",
                        "title" => "4 Kissing Buttons",
                        "elements" => ["buttons_kissing1_hole0001.png", "buttons_kissing3_hole0001.png",],
                        "customization_category_id" => "4",
                        "image" => "suit_elements/button/button_4_kissing.png",
                        "buttons" => ["buttons_kissing10001.png", "buttons_kissing30001.png",],
                        "show_buttons" => "false",
                    ),
                    array(
                        "status" => "0",
                        "title" => "3 Flat Buttons",
                        "customization_category_id" => "4",
                        "elements" => ["buttons_flat3_hole0001.png"],
                        "image" => "suit_elements/button/button_3_kissing.png",
                        "buttons" => ["buttons_flat30001.png"],
                        "buttonhole" => ["sleeve_button_hole_40001.png", "sleeve_button_hole_comman0001.png",],
                        "show_buttons" => "true",
                    ),
                    array(
                        "status" => "0",
                        "title" => "3 Kissing Buttons",
                        "elements" => ["buttons_kissing3_hole0001.png"],
                        "customization_category_id" => "4",
                        "image" => "suit_elements/button/button_3_kissing.png",
                        "buttons" => ["buttons_kissing30001.png",],
                        "show_buttons" => "false",
                    ),
                ],
            "Lower Pocket" => [
//                    array(
//                        "status" => "1",
//                        "title" => "Slanted Flap Pocket",
//                        "customization_category_id" => "4",
//                        "elements" => ["lower_pocket_slanting_flap0001.png"],
//                        "image" => "lower_flap_pocket.jpeg",
//                        "show_buttons" => "true",
//                    ), 
                    array(
                        "status" => "1",
                        "title" => "Straight Flap Pocket",
                        "customization_category_id" => "4",
                        "elements" => ["pocket_flap0001.png",],
                        "image" => "suit_elements/pocket/pocket_flap.png",
                        "show_buttons" => "true",
                    )
                    , array(
                        "status" => "0",
                        "title" => "Pipe Pocket",
                        "elements" => ["pocket_pipe0001.png",],
                        "customization_category_id" => "4",
                        "image" => "suit_elements/pocket/pocket_pipe.png",
                        "show_buttons" => "false",
                    ),
//                    array(
//                        "status" => "0",
//                        "title" => "Slanting Pipe Pocket",
//                        "elements" => ["lower_slanting_pocket0001.png"],
//                        "customization_category_id" => "4",
//                        "image" => "lower_slanting_pipe.jpeg",
//                        "show_buttons" => "true",
//                    )
                ],
            "Lapel Facing" => [

                array(
                    "status" => "1",
                    "title" => "Satin",
                    "customization_category_id" => "4",
                    "folder" => "satin",
                    "image" => "suit_elements/tuxedo/satin.jpeg",
                ),
                array(
                    "status" => "0",
                    "title" => "Grosgrain",
                    "folder" => "grossgrain",
                    "image" => "suit_elements/tuxedo/grosgrain.jpeg",
                ),
            ],
            "Ribbon on Side Seam" => [
                array(
                    "status" => "1",
                    "title" => "Satin",
                    "customization_category_id" => "4",
                    "folder" => "satin",
                    "elements" => ['pant_side_seamst0001.png',],
                    "image" => "suit_elements/tuxedo/sidesatin.png",
                ),
                array(
                    "status" => "0",
                    "title" => "Grosgrain",
                    "elements" => ['pant_side_seam0001.png',],
                    "folder" => "grossgrain",
                    "image" => "suit_elements/tuxedo/sidegrosgrain.png",
                ),
            ],
             "Jacket Style" => [
                    array(
                        "status" => "1",
                        "title" => "1 Button",
                        "customization_category_id" => "4",
                        "elements" => ['body_single.png'],
                        "image" => "suit_elements/suittype/1_button.png",
                        "left" => "body_single_1_left10001.png",
                        "right" => "body_single_1_right0001.png",
                        "buttons" => ["buttons_110001.png"],
                        "button_hole" => ["button_hole_110001.png"],
                        "show_buttons" => "true",
                        "canvas_m"=>"jacketstyle",
                        "canvas_o"=>"jacketstyleoverlay",
                        "function"=>"setJacketBody",
                        "overlay" => ["bodysingleoverlay.png"],
                    ), array(
                        "status" => "0",
                        "title" => "2 Buttons",
                        "customization_category_id" => "4",
                        "elements" => ['body_single.png',],
                        "image" => "suit_elements/suittype/2_button.png",
                        "left" => "body_single_1_left10001.png",
                        "right" => "body_single_1_right0001.png",
                        "buttons" => ["buttons_110001.png"],
                        "buttons2" => ["buttons_120001.png"],
                        "button_hole" => ["button_hole_110001.png", "button_hole_120001.png"],
                        "show_buttons" => "false",
                        "canvas_m"=>"jacketstyle",
                        "canvas_o"=>"jacketstyleoverlay",
                        "overlay" => [ "bodysingleoverlay.png"],
                    )
                    , array(
                        "status" => "0",
                        "title" => "4 Buttons 1 Button Fasten",
                        "elements" => ["body_41.png",],
                        "customization_category_id" => "4",
                        "image" => "suit_elements/suittype/41_button.png",
                        "left" => "body_double_4_left0001.png",
                        "right" => "body_double_4_right0001.png",
                        "button_hole" => ["button_hole_41_10001.png", "button_4_hole_20001.png"],
                        "buttons" => ["buttons_42_120001.png", "buttons_42_340001.png",],
                        "buttons2" => [],
                        "show_buttons" => "true",
                        "canvas_m"=>"jacketstyle",
                        "function"=>"setJacketBody",
                        "canvas_o"=>"jacketstyleoverlay",
                        "overlay" => ["double_overlay.png"],
                    )
                    , array(
                        "status" => "0",
                        "title" => "6 Buttons 2 Buttons Fasten",
                        "elements" => ["body_42.png",],
                        "customization_category_id" => "4",
                        "left" => "body_double_4_left0001.png",
                        "right" => "body_double_4_right0001.png",
                        "button_hole" => ["button_hole_41_10001.png", "button_4_hole_20001.png"],
                        "buttons" => ["buttons_42_120001.png", "buttons_42_340001.png", "buttons_42_560001.png"],
                        "buttons2" => [],
                        "image" => "suit_elements/suittype/62_button.png",
                        "show_buttons" => "true",
                        "canvas_m"=>"jacketstyle",
                        "canvas_o"=>"jacketstyleoverlay",
                        "overlay" => ["double_overlay.png"],
                    )
                ],
            "Lapel Style" => [
                    array(
                        "status" => "1",
                        "title" => "Notch Lapel",
                        "elements" => ["body_round0001.png"],
                        "laple_style" => array(
                            "1 Button" => array("elements" => [

                                    "laple_single_notch0001.png", 
                                ],
                                "stitcing" => ['laple_notch_stitching.png'],
                                "hole" => ["button_hole_notch.png"],
                                "overelay" => ["single_laple_n1.png",]),
                            "2 Buttons" => array("elements" => [

                                    "laple_single_notch0001.png"
                                ],
                                "stitcing" => ['laple_notch_stitching.png'],
                                "hole" => ["button_hole_notch.png"],
                                "overelay" => ["single_laple_n1.png",]),
                            "3 Buttons" => array("elements" => [
                                    "laple_single_3_notch_peak_upper0001.png",
                                    "laple_single_3_notch_modern0001.png"
                                ], "overelay" => ["13notchpeaklapleoverlay.png"]),
                            "4 Buttons" => array("elements" => [
                                    "laple_single_3_notch_peak_upper0001.png",
                                    "laple_single_3_notch_modern0001.png"
                                ], "overelay" => ["13notchpeaklapleoverlay.png"]),
                            "4 Buttons 1 Button Fasten" => array("elements" => [

                                    "laple__double_notch0001.png"
                                ],
                                "stitcing" => ['button_hole_notch.png'],
                                "hole" => ["button_hole_notch.png"],
                                "overelay" => ["double_laple_overlay_n.png"]),
                            "4 Buttons 2 Buttons Fasten" => array("elements" => [

                                    "laple__double_notch0001.png"
                                ],
                                "stitcing" => ['laple_double_notch_stitch.png'],
                                "hole" => ["button_hole_notch.png"],
                                "overelay" => ["double_laple_overlay_n.png"]),
                            "6 Buttons 1 Button Fasten" => array("elements" => [

                                    "laple__double_notch0001.png",
                                   
                                ], "overelay" => ["double_laple_overlay_n.png"]),
                            "6 Buttons 2 Buttons Fasten" => array("elements" => [
                                    "laple__double_notch0001.png",
                                   
                                ],
                                "stitcing" => ['laple_double_notch_stitch.png'],
                                "hole" => ["button_hole_notch.png"],
                                "overelay" => ["double_laple_overlay_n.png"]),
                        ),
                        "customization_category_id" => "6",
                        "image" => "suit_elements/laple/notch.png"
                    ),
                    array(
                        "status" => "0",
                        "title" => "Peak Lapel",
                        "elements" => ["body_round0001.png"],
                        "laple_style" => array(
                            "1 Button" => array("elements" => [

                                    "laple_single_peak0001.png"
                                ],
                                "stitcing" => ['laple_peak_stitch.png'],
                                "hole" => ["button_hole_peak.png"],
                                "overelay" => ["single_laple_p.png"]),
                            "2 Buttons" => array("elements" => [

                                    "laple_single_peak0001.png"
                                ],
                                "stitcing" => ['laple_peak_stitch.png'],
                                "hole" => ["button_hole_peak.png"],
                                "overelay" => ["single_laple_p.png"]),
                            "3 Buttons" => array("elements" => [
                                    "laple_single_3_notch_peak_upper0001.png",
                                    "laple_single_3_peak_morden0001.png"
                                ], "overelay" => ["13notchpeaklapleoverlay.png"]),
                            "4 Buttons" => array("elements" => [
                                    "laple_single_3_notch_peak_upper0001.png",
                                    "laple_single_3_peak_morden0001.png"
                                ], "overelay" => ["13notchpeaklapleoverlay.png"]),
                            "4 Buttons 1 Button Fasten" => array("elements" => [

                                    "laple__double_peak0001.png"
                                ],
                                "stitcing" => ['laple_double_peak_stitch.png'],
                                "hole" => ["button_hole_peak.png"],
                                "overelay" => ["double_laple_overlay_p.png"]),
                            "4 Buttons 2 Buttons Fasten" => array("elements" => [

                                    "laple__double_peak0001.png",
                                    "laple_double_42.png"
                                ],
                                "stitcing" => ['laple_double_peak_stitch.png'],
                                "hole" => ["button_hole_peak.png"],
                                "overelay" => ["double_laple_overlay_p.png"]),
                            "6 Buttons 1 Button Fasten" => array("elements" => [
                                    "laple__double_peak0001.png",
                                    "laple_6_peack_morden0001.png"
                                ], "overelay" => ["double_laple_overlay_p.png"]),
                            "6 Buttons 2 Buttons Fasten" => array("elements" => [

                                    "laple__double_peak0001.png",
                                    "laple_double_42.png"
                                ],
                                "stitcing" => ['laple_double_peak_stitch.png'],
                                "hole" => ["button_hole_peak.png"],
                                "overelay" => ["double_laple_overlay_p.png"]),
                        ),
                        "customization_category_id" => "6",
                        "image" => "suit_elements/laple/peak.png"
                    ),
                    array(
                        "status" => "0",
                        "title" => "Shwal Lapel",
                        "elements" => ["body_round0001.png"],
                        "laple_style" => array(
                            "1 Button" => array("elements" => [

                                    "laple_single_shwal0001.png"
                                ],
                                "stitcing" => ['laple_peak_stitch.png'],
                                "hole" => ["button_hole_peak.png"],
                                "overelay" => ["single_laple_s.png"]),
                            "2 Buttons" => array("elements" => [

                                    "laple_single_shwal0001.png"
                                ],
                                "stitcing" => ['laple_peak_stitch.png'],
                                "hole" => ["button_hole_peak.png"],
                                "overelay" => ["single_laple_s.png"]),
                            "3 Buttons" => array("elements" => [
                                    "laple_single_3_notch_peak_upper0001.png",
                                    "laple_single_3_peak_morden0001.png"
                                ], "overelay" => ["13notchpeaklapleoverlay.png"]),
                            "4 Buttons" => array("elements" => [
                                    "laple_single_3_notch_peak_upper0001.png",
                                    "laple_single_3_peak_morden0001.png"
                                ], "overelay" => ["13notchpeaklapleoverlay.png"]),
                            "4 Buttons 1 Button Fasten" => array("elements" => [

                                    "laple_double_swal0001.png"
                                ],
                                "stitcing" => ['laple_double_peak_stitch.png'],
                                "hole" => ["button_hole_peak.png"],
                                "overelay" => ["double_laple_overlay_s.png"]),
                            "4 Buttons 2 Buttons Fasten" => array("elements" => [

                                    "laple_double_swal0001.png",
                                    "laple_double_42.png"
                                ],
                                "stitcing" => ['laple_double_peak_stitch.png'],
                                "hole" => ["button_hole_peak.png"],
                                "overelay" => ["double_laple_overlay_s.png"]),
                            "6 Buttons 1 Button Fasten" => array("elements" => [
                                    "laple_double_swal0001.png",
                                    "laple_6_peack_morden0001.png"
                                ], "overelay" => ["double_laple_overlay_s.png"]),
                            "6 Buttons 2 Buttons Fasten" => array("elements" => [

                                    "laple_double_swal0001.png",
                                    "laple_double_42.png"
                                ],
                                "stitcing" => ['laple_double_peak_stitch.png'],
                                "hole" => ["button_hole_peak.png"],
                                "overelay" => ["double_laple_overlay_s.png"]),
                        ),
                        "customization_category_id" => "6",
                        "image" => "suit_elements/laple/shwal.png"
                    ),
                ],
        );
        return $data;
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
                    "title" => "Lapel Style",
                    "viewtype" => "front",
                    "type" => "main",
                ),
                array(
                    "title" => "Lapel Button Hole",
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
                    "title" => "Back Vent",
                    "viewtype" => "back",
                    "type" => "main",
                ),
                array(
                    "title" => "Sleeve Buttons",
                    "viewtype" => "front",
                    "type" => "main",
                    "style_side" => "    background-size: 19%!important;",
                ),
                array(
                    "title" => "Number of Pleat",
                    "viewtype" => "pant",
                    "type" => "main",
                ),
                array(
                    "title" => "Front Pocket Style",
                    "viewtype" => "pant",
                    "type" => "main",
                ),
                array(
                    "title" => "Number of Back Pocket",
                    "viewtype" => "pantback",
                    "type" => "main",
                ),
                array(
                    "title" => "Waistband",
                    "viewtype" => "pant",
                    "type" => "main",
                ),
                array(
                    "title" => "Cuff",
                    "viewtype" => "pant",
                    "type" => "main",
                ),
                array(
                    "title" => "Buttons",
                    "viewtype" => "front",
                    "type" => "submain",
                ),
            ],
            "collar_cuff_insert" => array(),
            "data" => $this->suitCustomeElements()
        );
        foreach ($customeele as $key => $value) {
            
        }
        $this->response($customeele);
    }

    function customeElementsTuxedoSuit_get() {
        $customeele = array(
            "keys" => [
                array(
                    "title" => "Jacket Style",
                    "viewtype" => "front",
                    "type" => "main",
                    "colrow" => "4",
                ),
                array(
                    "title" => "Lapel Style",
                    "viewtype" => "front",
                    "type" => "main",
                    "colrow" => "4",
                ),
                array(
                    "title" => "Lapel Facing",
                    "viewtype" => "front",
                    "type" => "main",
                    "colrow" => "4",
                ),
                array(
                    "title" => "Lapel Button Hole",
                    "viewtype" => "front",
                    "type" => "main",
                    "colrow" => "4",
                ),
                
                array(
                    "title" => "Breast Pocket",
                    "viewtype" => "front",
                    "type" => "main",
                    "colrow" => "4",
                ),
                array(
                    "title" => "Lower Pocket",
                    "viewtype" => "front",
                    "type" => "main",
                    "colrow" => "4",
                ),
                
                array(
                    "title" => "Back Vent",
                    "viewtype" => "back",
                    "type" => "main",
                    "colrow" => "4",
                ),
                array(
                    "title" => "Buttons",
                    "viewtype" => "front",
                    "type" => "submain",
                     "colrow" => "1",
                ),
                array(
                    "title" => "Buttons",
                    "viewtype" => "front",
                    "type" => "main",
                    "colrow" => "4",
                    "style_side" => "    background-size:70%!important;",
                ),
                array(
                    "title" => "Sleeve Buttons",
                    "viewtype" => "front",
                    "type" => "main",
                    "colrow" => "4",
                    "style_side" => "    background-size: 100%!important;",
                ),
                
                array(
                    "title" => "Number of Pleat",
                    "viewtype" => "pant",
                    "type" => "main",
                    "colrow" => "4",
                ),
                array(
                    "title" => "Ribbon on Side Seam",
                    "viewtype" => "pant",
                    "type" => "main",
                    "colrow" => "4",
                ),
                array(
                    "title" => "Front Pocket Style",
                    "viewtype" => "pant",
                    "type" => "main",
                    "colrow" => "4",
                ),
                array(
                    "title" => "Number of Back Pocket",
                    "viewtype" => "pantback",
                    "type" => "main",
                    "colrow" => "4",
                ),
                
                array(
                    "title" => "Waistband",
                    "viewtype" => "pant",
                    "type" => "main",
                    "colrow" => "4",
                ),
                array(
                    "title" => "Waistband Adjustment",
                    "viewtype" => "pant",
                    "type" => "main",
                    "colrow" => "4",
                ),
                array(
                    "title" => "Cuff",
                    "viewtype" => "pant",
                    "type" => "main",
                    "colrow" => "4",
                ),
            ],
            "collar_cuff_insert" => array(),
            "data" => $this->suitCustomeElements()
        );


        $jacketstyle = array('1 Button' => '', '2 Buttons' => '');

        foreach ($customeele["data"]["Jacket Style"] as $key => $value) {
            if (isset($jacketstyle[$value["title"]])) {
                $jacketstyle[$value["title"]] = $value;
            }
        }

        $customeele["data"]["Buttons"] = [
            array(
                "status" => "1",
                "title" => "Satin Covered",
                "folder" => "satinbutton",
                "customization_category_id" => "4",
                "image" => "buttongold.png",
                "image" => "suit_elements/buttons/satinbutton.png",
                "show_buttons" => "true",
            ),
            array(
                "status" => "0",
                "title" => "Grosgrain Covered",
                "folder" => "grosgrainbutton",
                "customization_category_id" => "4",
                "image" => "buttongold.png",
                "image" => "suit_elements/buttons/grosgrainbutton.png",
                "show_buttons" => "true",
            ),
        ];
        $customeele["data"]["Jacket Style"] = $jacketstyle;
        $customeele["data"]["Lapel Style"][2]["status"] = 1;
        $this->response($customeele);
    }

    function customeElementsTuxedoJacket_get() {
        $customeele = array(
            "keys" => [
                array(
                    "title" => "Jacket Style",
                    "viewtype" => "front",
                    "type" => "main",
                    "colrow" => "4",
                ),
                array(
                    "title" => "Lapel Style",
                    "viewtype" => "front",
                    "type" => "main",
                    "colrow" => "4",
                ),
                array(
                    "title" => "Lapel Facing",
                    "viewtype" => "front",
                    "type" => "main",
                    "colrow" => "4",
                ),
                array(
                    "title" => "Lapel Button Hole",
                    "viewtype" => "front",
                    "type" => "main",
                    "colrow" => "4",
                ),
                
                array(
                    "title" => "Breast Pocket",
                    "viewtype" => "front",
                    "type" => "main",
                    "colrow" => "4",
                ),
                array(
                    "title" => "Lower Pocket",
                    "viewtype" => "front",
                    "type" => "main",
                    "colrow" => "4",
                ),
                
                array(
                    "title" => "Back Vent",
                    "viewtype" => "back",
                    "type" => "main",
                    "colrow" => "4",
                ),
                array(
                    "title" => "Buttons",
                    "viewtype" => "front",
                    "type" => "main",
                    "colrow" => "4",
                    "style_side" => "    background-size:70%!important;",
                ),
                array(
                    "title" => "Sleeve Buttons",
                    "viewtype" => "front",
                    "type" => "main",
                    "colrow" => "4",
                    "style_side" => "    background-size: 100%!important;",
                ),
                
            ],
            "collar_cuff_insert" => array(),
            "data" => $this->suitCustomeElements()
        );


        $jacketstyle = array('1 Button' => '', '2 Buttons' => '');

        foreach ($customeele["data"]["Jacket Style"] as $key => $value) {
            if (isset($jacketstyle[$value["title"]])) {
                $jacketstyle[$value["title"]] = $value;
            }
        }

        $customeele["data"]["Buttons"] = [
            array(
                "status" => "1",
                "title" => "Satin Covered",
                "folder" => "satinbutton",
                "customization_category_id" => "4",
                "image" => "buttongold.png",
                "image" => "suit_elements/buttons/satinbutton.png",
                "show_buttons" => "true",
            ),
            array(
                "status" => "0",
                "title" => "Grosgrain Covered",
                "folder" => "grosgrainbutton",
                "customization_category_id" => "4",
                "image" => "buttongold.png",
                "image" => "suit_elements/buttons/grosgrainbutton.png",
                "show_buttons" => "true",
            ),
        ];
        $customeele["data"]["Jacket Style"] = $jacketstyle;
        $customeele["data"]["Lapel Style"][2]["status"] = 1;
        $this->response($customeele);
    }

    function customeElementsTuxedoPant_get() {
        $customeele = array(
            "keys" => [

                array(
                    "title" => "Number of Pleat",
                    "viewtype" => "pant",
                    "type" => "main",
                    "colrow" => "4",
                ),
                array(
                    "title" => "Ribbon on Side Seam",
                    "viewtype" => "pant",
                    "type" => "main",
                    "colrow" => "4",
                ),
                array(
                    "title" => "Front Pocket Style",
                    "viewtype" => "pant",
                    "type" => "main",
                    "colrow" => "4",
                ),
                array(
                    "title" => "Number of Back Pocket",
                    "viewtype" => "pantback",
                    "type" => "main",
                    "colrow" => "4",
                ),
                
                array(
                    "title" => "Waistband",
                    "viewtype" => "pant",
                    "type" => "main",
                    "colrow" => "4",
                ),
                array(
                    "title" => "Waistband Adjustment",
                    "viewtype" => "pant",
                    "type" => "main",
                    "colrow" => "4",
                ),
                array(
                    "title" => "Cuff",
                    "viewtype" => "pant",
                    "type" => "main",
                    "colrow" => "4",
                ),
            ],
            "collar_cuff_insert" => array(),
            "data" => $this->suitCustomeElements()
        );






        $this->response($customeele);
    }

    function customeElementsJacket_get() {
        $customeele = array(
            "keys" => [
                array(
                    "title" => "Jacket Style",
                    "viewtype" => "front",
                    "type" => "main",
                    "colrow" => "4",
                ),
                array(
                    "title" => "Lapel Style",
                    "viewtype" => "front",
                    "type" => "main",
                    "colrow" => "4",
                ),
                array(
                    "title" => "Lapel Button Hole",
                    "viewtype" => "front",
                    "type" => "main",
                    "colrow" => "4",
                ),
                array(
                    "title" => "Lapel Button Hole Color",
                    "viewtype" => "front",
                    "type" => "main",
                    "style_side" => "    background-size: 100%!important;height:50px",
                    "colrow" => "4",
                ),
                array(
                    "title" => "Breast Pocket",
                    "viewtype" => "front",
                    "type" => "main",
                    "colrow" => "4",
                ),
                array(
                    "title" => "Lower Pocket",
                    "viewtype" => "front",
                    "type" => "main",
                    "colrow" => "4",
                ),
                
                array(
                    "title" => "Back Vent",
                    "viewtype" => "back",
                    "type" => "main",
                    "colrow" => "4",
                ),
                array(
                    "title" => "Buttons",
                    "viewtype" => "front",
                    "type" => "submain",
                     "colrow" => "1",
                ),
                array(
                    "title" => "Sleeve Buttons",
                    "viewtype" => "front",
                    "type" => "main",
                    "colrow" => "4",
                    "style_side" => "    background-size: 100%!important;",
                ),
                array(
                    "title" => "Contrast First Button Hole",
                    "viewtype" => "front",
                    "type" => "main",
                    "style_side" => "    background-size: 100%!important;height:50px",
                    "colrow" => "4",
                ),
            ],
            "collar_cuff_insert" => array(),
            "data" => $this->suitCustomeElements(),
        );

        $customeele["data"]["Back Vent"] = [
            array(
                "status" => "0",
                "title" => "No Vent",
                "customization_category_id" => "4",
                "elements" => ["back_sleeve10001.png", "back_upper0001.png", "back_body0001.png",],
                "image" => "suit_elements/back/back_no_vent.png",
                "show_buttons" => "true",
            ), array(
                "status" => "1",
                "title" => "Center Vent",
                "elements" => ["back_sleeve0001.png", "back_upper0001.png", "back_body0001.png",],
                "customization_category_id" => "4",
                "image" => "suit_elements/back/back_center_vent.png",
                "show_buttons" => "false",
                "overlay" => ["centervent.png"],
            ), array(
                "status" => "0",
                "title" => "Side Vent",
                "elements" => ["back_sleeve10001.png", "back_upper0001.png", "back_body0001.png",],
                "customization_category_id" => "4",
                "image" => "suit_elements/back/back_side_vent.png",
                "show_buttons" => "true",
                "overlay" => ["sidevent.png"],
        )];

        foreach ($customeele as $key => $value) {
            
        }
        $this->response($customeele);
    }

    function customeElementsPant_get() {
        $customeele = array(
            "keys" => [

                array(
                    "title" => "Number of Pleat",
                    "viewtype" => "pant",
                    "type" => "main",
                    "colrow" => "4",
                ),
                array(
                    "title" => "Front Pocket Style",
                    "viewtype" => "pant",
                    "type" => "main",
                    "colrow" => "4",
                ),
                array(
                    "title" => "Number of Back Pocket",
                    "viewtype" => "pantback",
                    "type" => "main",
                    "colrow" => "4",
                ),
                
                array(
                    "title" => "Waistband",
                    "viewtype" => "pant",
                    "type" => "main",
                    "colrow" => "4",
                ),
                array(
                    "title" => "Waistband Adjustment",
                    "viewtype" => "pant",
                    "type" => "main",
                    "colrow" => "4",
                ),
                array(
                    "title" => "Cuff",
                    "viewtype" => "pant",
                    "type" => "main",
                    "colrow" => "4",
                ),
            ],
            "collar_cuff_insert" => array(),
            "data" => $this->suitCustomeElements(),
        );
        foreach ($customeele as $key => $value) {
            
        }
        $this->response($customeele);
    }

}

?>
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
                array(
                    "title" => "Stitching",
                    "viewtype" => "front",
                    "type" => "main",
                ),
                array(
                    "title" => "Buttons",
                    "viewtype" => "front",
                    "type" => "main",
                ),
                array(
                    "title" => "Button Hole Color",
                    "viewtype" => "front",
                    "type" => "main",
                    "style_side" => "    background-size: 100%!important;height:50px",
                ),
                array(
                    "title" => "Button Hole Color Position",
                    "viewtype" => "front",
                    "type" => "main",
                ),
                array(
                    "title" => "Button Thread Color",
                    "viewtype" => "front",
                    "type" => "main",
                    "style_side" => "    background-size: 100%!important;height:50px",
                ),
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
                        "image" => "customization/no_monogram.jpg",
                        "view_type" => "front",
                    ),
                    array(
                        "status" => "0",
                        "title" => "Collar",
                        "css_class" => "monogramtext_posistion_collar",
                        "not_show_when" => [],
                        "view_type" => "back",
                        "image" => "customization/monogram_outside_coller_band.jpg"
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
                        "status" => "0",
                        "title" => "HBE",
                        "button" => "hbe",
                        "image" => "customization/buttons/hbe.png",
                        "customization_category_id" => "8",
                    ),
                    array(
                        "status" => "0",
                        "title" => "PBE",
                        "button" => "pbe",
                        "image" => "customization/buttons/pbe.png",
                        "customization_category_id" => "8",
                    ), array(
                        "status" => "0",
                        "title" => "DBE",
                        "button" => "dbe",
                        "image" => "customization/buttons/dbe.png",
                        "customization_category_id" => "8",
                    ), array(
                        "status" => "0",
                        "title" => "SDR",
                        "button" => "sdr",
                        "image" => "customization/buttons/sdr.png",
                        "customization_category_id" => "8",
                    ), array(
                        "status" => "0",
                        "title" => "HDR",
                        "button" => "hdr",
                        "image" => "customization/buttons/hdr.png",
                        "customization_category_id" => "8",
                    )
                    , array(
                        "status" => "0",
                        "title" => "LGN",
                        "button" => "lgn",
                        "image" => "customization/buttons/lgn.png",
                        "customization_category_id" => "8",
                    ), array(
                        "status" => "0",
                        "title" => "GN",
                        "button" => "gn",
                        "image" => "customization/buttons/gn.png",
                        "customization_category_id" => "8",
                    )
                    , array(
                        "status" => "0",
                        "title" => "DBN",
                        "button" => "dbn",
                        "image" => "customization/buttons/dbn.png",
                        "customization_category_id" => "8",
                    )
                    , array(
                        "status" => "0",
                        "title" => "RE",
                        "button" => "re",
                        "image" => "customization/buttons/re.png",
                        "customization_category_id" => "8",
                    ),
                    array(
                        "status" => "0",
                        "title" => "YW",
                        "button" => "yw",
                        "image" => "customization/buttons/yw.png",
                        "customization_category_id" => "8",
                    )
                    ,
                    array(
                        "status" => "0",
                        "title" => "SPK",
                        "button" => "spk",
                        "image" => "customization/buttons/spk.png",
                        "customization_category_id" => "8",
                    ),
                    array(
                        "status" => "0",
                        "title" => "1",
                        "button" => "b1",
                        "image" => "customization/buttons/b1.png",
                        "customization_category_id" => "8",
                    ), array(
                        "status" => "0",
                        "title" => "3",
                        "button" => "b3",
                        "image" => "customization/buttons/b3.png",
                        "customization_category_id" => "8",
                    ), array(
                        "status" => "0",
                        "title" => "4",
                        "button" => "b4",
                        "image" => "customization/buttons/b4.png",
                        "customization_category_id" => "8",
                    ), array(
                        "status" => "0",
                        "title" => "5",
                        "button" => "b5",
                        "image" => "customization/buttons/b5.png",
                        "customization_category_id" => "8",
                    ), array(
                        "status" => "0",
                        "title" => "6",
                        "button" => "b6",
                        "image" => "customization/buttons/b6.png",
                        "customization_category_id" => "8",
                    ), array(
                        "status" => "0",
                        "title" => "7",
                        "button" => "b7",
                        "image" => "customization/buttons/b7.png",
                        "customization_category_id" => "8",
                    ), array(
                        "status" => "0",
                        "title" => "8",
                        "button" => "b8",
                        "image" => "customization/buttons/b8.png",
                        "customization_category_id" => "8",
                    ), array(
                        "status" => "0",
                        "title" => "9",
                        "button" => "b9",
                        "image" => "customization/buttons/b9.png",
                        "customization_category_id" => "8",
                    ), array(
                        "status" => "1",
                        "title" => "10",
                        "button" => "b10",
                        "image" => "customization/buttons/b10.png",
                        "customization_category_id" => "8",
                    ), array(
                        "status" => "0",
                        "title" => "MOP Brown",
                        "button" => "mop_brown",
                        "image" => "customization/buttons/mop_brown.png",
                        "extracost" => "10",
                        "customization_category_id" => "8",
                    ), array(
                        "status" => "0",
                        "title" => "MOP White",
                        "button" => "mop_white",
                        "image" => "customization/buttons/mop_white.png",
                        "extracost" => "10",
                        "customization_category_id" => "8",
                    ), array(
                        "status" => "0",
                        "title" => "MOP Gray",
                        "button" => "mop_gray",
                        "image" => "customization/buttons/mop_gray.png",
                        "extracost" => "10",
                        "customization_category_id" => "8",
                    )
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
                        "elements" => ["shirtbody_round0001.png"],
                        "customization_category_id" => "6",
                        "image" => "customization/bottom_rounded.jpeg",
                        "overlay" => []
                    ),
                    array(
                        "status" => "0",
                        "title" => "Normal Rounded With Slits",
                        "elements" => ["shirtbody_round0001.png"],
                        "customization_category_id" => "6",
                        "image" => "customization/bottom_rounded_normal.jpeg",
                        "overlay" => ["notmalround_bottom.png"]
                    ),
                    array(
                        "status" => "0",
                        "title" => "Deep Rounded With Slits",
                        "elements" => ["shirtbody_round0001.png"],
                        "customization_category_id" => "6",
                        "image" => "customization/bottom_rounded_deep.jpeg",
                        "overlay" => ["deepround_bottom.png"]
                    ), array(
                        "status" => "0",
                        "title" => "Squared",
                        "elements" => ["shirtbody_squre0001.png"],
                        "customization_category_id" => "6",
                        "image" => "customization/bottom_squred.jpeg"
                    )],
                "Cuff & Sleeve" => [
                    array(
                        "status" => "0",
                        "french" => "No",
                        "title" => "Short Sleeve Without Cuff",
                        "elements" => [],
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
                        "title" => "Short Sleeve With Cuff",
                        "elements" => [],
                        "french" => "No",
                        "customization_category_id" => "3",
                        "image" => "customization/withcuff_sort.jpg",
                        "sleeve1" => ["shirtbody_half_sleeve0001.png",],
                        "overlay" => ["shirt_cuff_overlay.png"],
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
                    ), array(
                        "status" => "0",
                        "title" => "French Cuff Rounded",
                        "sleeve1" => ["shirt_sleeve0001.png"],
                        "customization_category_id" => "3",
//                        "elements" => [ "cuff_m_franch_rounded0001.png"],
                        "elements" => [ "cuff_m_franch_rounded_insert0001.png", "cuff_m_franch_rounded0001.png"],
                        "insertele" => [ "cuff_m_franch_rounded0001.png"],
                        "inserteleo" => [ "cuff_m_franch_rounded0001.png"],
                        "stitching38" => [ "cuff_m_franch_rounded0001st38.png"],
                        "stitching14" => [ "cuff_m_franch_rounded0001st14.png"],
                        "image" => "customization/cuff_franch_rounded.jpg",
                        "insert_style_css" => "",
                        "insert_style" => "cuff_m_franch_rounded_insert0001.png",
                        "insert_overlay" => "cuff_franch_insert_overlay.png",
                        "insert_overlay_css" => "",
                        "insert_full" => ["cuff_franch_rounded0001.png"],
                        "buttons" => "cuff_m_franch_squre_button0001.png",
                        "sleeve" => ["b_full_shirt_sleeve0001.png"],
                        "french" => "1",
                    ),
                    array(
                        "status" => "0",
                        "title" => "French Cuff Squared",
                        "sleeve1" => ["shirt_sleeve0001.png"],
                        "customization_category_id" => "3",
                        "elements" => [ "cuff_m_franch_squre_insert0001.png", "cuff_m_franch_squre0001.png"],
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
                    , array(
                        "status" => "0",
                        "title" => "French Cuff Cutaway",
                        "sleeve1" => ["shirt_sleeve0001.png"],
                        "customization_category_id" => "3",
                        "elements" => [ "cuff_m_franch_cutaway_insert0001.png", "cuff_m_franch_cutaway0001.png"],
                        "insertele" => ["cuff_m_franch_cutaway0001.png"],
                        "inserteleo" => [ "cuff_m_franch_cutaway0001.png"],
                        "stitching38" => [ "cuff_m_franch_cutaway20001st38.png"],
                        "stitching14" => [ "cuff_m_franch_cutaway20001st14.png"],
                        "image" => "customization/cufffranchcuffcutaway.jpeg",
                        "insert_style_css" => "",
                        "insert_style" => "cuff_m_franch_cutaway_insert0001.png",
                        "insert_overlay" => "cuff_franch_insert_overlay.png",
                        "insert_overlay_css" => "",
                        "insert_full" => ["cuff_m_franch_cutaway0001.png"],
                        "buttons" => "cuff_m_franch_squre_button0001.png",
                        "sleeve" => ["b_full_shirt_sleeve0001.png"],
                        "french" => "1",
                    ),
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
                        "elements" => [ "b_shirtbody_round0001.png", "b_shirtbody_squre0001.png", "yoke0001.png"],
                        "overlay" => "",
                        "image" => "customization/back_plain.jpeg"
                    ), array(
                        "status" => "0",
                        "title" => "Side Pleated",
                        "customization_category_id" => "5",
                        "halfsleeve" => ["back_half_sleeve0001.png", "back_half_sleeve_cuff0001.png"],
                        "fullsleeve" => ["b_full_shirt_sleeve0001.png", "b_full_shirt_sleeve0001.png",],
                        "overlay" => "back_two_side_plea_over_lay.png",
                        "elements" => ["b_shirtbody_round0001.png", "b_shirtbody_squre0001.png", "shirtbody_pleat_side0001.png", "yoke0001.png"],
                        "image" => "customization/back_two_side.jpeg"
                    ), array(
                        "status" => "0",
                        "title" => "Boxpleat",
                        "customization_category_id" => "5",
                        "halfsleeve" => ["back_half_sleeve0001.png", "back_half_sleeve_cuff0001.png"],
                        "fullsleeve" => ["b_full_shirt_sleeve0001.png", "back_sleeve_cuff0001.png"],
                        "overlay" => "box_pleat_overlay1.png",
                        "elements" => [ "b_shirtbody_round0001.png", "b_shirtbody_squre0001.png", "shirtbody_pleat_box0001.png", "yoke0001.png"],
                        "image" => "customization/back_box_pleat.jpeg"
                    ), array(
                        "status" => "1",
                        "title" => "Dart",
                        "customization_category_id" => "5",
                        "halfsleeve" => ["back_half_sleeve0001.png", "back_half_sleeve_cuff0001.png"],
                        "fullsleeve" => ["b_full_shirt_sleeve0001.png", "back_full_sleeve_cuff0001.png"],
                        "overlay" => "dart_overlay1.png",
                        "elements" => ["b_shirtbody_round0001.png", "b_shirtbody_squre0001.png", "dart20001.png", "yoke0001.png"],
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
                        "image" => "customization/pocket_one.jpeg"
                    ), array(
                        "status" => "0",
                        "title" => "2 Regular Pockets",
                        "customization_category_id" => "7",
                        "elements" => ["shirtbody_pocket_right20001.png", "shirtbody_pocket_left20001.png"],
                        "image" => "customization/pocket_two.jpeg"
                    ),
                    array(
                        "status" => "0",
                        "title" => "1 Rounded Pocket",
                        "customization_category_id" => "7",
                        "elements" => ["shirtbody_pocket_round_right0001.png",],
                        "image" => "customization/pocket_one_r.jpeg"
                    ), array(
                        "status" => "0",
                        "title" => "2 Rounded Pockets",
                        "customization_category_id" => "7",
                        "elements" => ["shirtbody_pocket_round_right0001.png", "shirtbody_pocket_round_left0001.png"],
                        "image" => "customization/pocket_two_r.png"
                    ),
                    array(
                        "status" => "0",
                        "title" => "1 Rounded Pocket With Pleat",
                        "customization_category_id" => "7",
                        "elements" => ["shirtbody_pocket_round_right0001.png",],
                        "image" => "customization/pocket_one_rf.jpeg",
                        "overlay" => ["shirtbody_pocket_round_flap_r.png"],
                    ), array(
                        "status" => "0",
                        "title" => "2 Rounded Pockets With Pleat",
                        "customization_category_id" => "7",
                        "elements" => ["shirtbody_pocket_round_right0001.png", "shirtbody_pocket_round_left0001.png"],
                        "image" => "customization/pocket_two_r.png",
                        "overlay" => ["shirtbody_pocket_round__flap_l.png", "shirtbody_pocket_round_flap_r.png"],
                    ),
                    array(
                        "status" => "0",
                        "title" => "1 Rounded Pocket With Button",
                        "customization_category_id" => "7",
                        "elements" => ["shirtbody_pocket_round_right0001.png",],
                        "image" => "customization/pocket_one_rb.jpeg",
                        "overlay" => [ "shirtbody_pocket_round_button_r.png"],
                    ), array(
                        "status" => "0",
                        "title" => "2 Rounded Pockets With Button",
                        "customization_category_id" => "7",
                        "elements" => ["shirtbody_pocket_round_right0001.png", "shirtbody_pocket_round_left0001.png"],
                        "image" => "customization/pocket_two_rb.png",
                        "overlay" => ["shirtbody_pocket_round_button_l.png", "shirtbody_pocket_round_button_r.png"],
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
                        "elements" => [ "flyfront0001.png"],
                        "stitching38" => [ "flyfront0001st38sd.png"],
                        "stitching14" => [ "flyfront0001st14sd.png"],
                        "customization_category_id" => "4",
                        "image" => "customization/front_fly.jpeg",
                        "show_buttons" => "false",
                    )
                    , array(
                        "status" => "0",
                        "title" => "Pleated",
                        "elements" => [ "flyfront0001.png"],
                        "stitching38" => [ "flyfront0001st38.png"],
                        "stitching14" => [ "flyfront0001st14.png"],
                        "customization_category_id" => "4",
                        "image" => "customization/front_ivy.jpeg",
                        "show_buttons" => "true",
                    )
                    , array(
                        "status" => "0",
                        "title" => "Pleated With Hidden Button",
                        "elements" => [ "flyfront0001.png"],
                        "customization_category_id" => "4",
                        "image" => "customization/front_pleated.png",
                        "stitching38" => [ "flyfront0001st38.png"],
                        "stitching14" => [ "flyfront0001st14.png"],
                        "show_buttons" => "false",
                    )
                ],
                "Collar" => [
                    array(
                        "status" => "0",
                        "title" => "Regular",
                        "elements" => [ "collar_ragular_5w0001.png"],
                        "stitching38" => [ "collar_ragular_5w0001st38.png"],
                        "stitching14" => [ "collar_ragular_5w0001st14.png"],
                        "customization_category_id" => "2",
                        "insert_style" => "collar_m_comman_insert20001.png",
                        "insert_overlay" => "collar_simple_insert_overlay.png",
                        "insert_collar" => [ "collar_ragular_5w_ins0001.png"],
                        "insert_full" => ["collar_ragular_5w_insf0001.png"],
                        "image" => "customization/collar_regular.jpeg",
                        "buttons" => "buttonsh1.png",
                    ), array(
                        "status" => "1",
                        "title" => "Medium Spread",
                        "customization_category_id" => "2",
                        "insert_style" => "collar_m_comman_insert20001.png",
                        "insert_overlay" => "collar_simple_insert_overlay.png",
                        "elements" => [ "collar_medium_spread_5w0001.png"],
                        "insert_collar" => [ "collar_medium_spread_5w_ins0001.png"],
                        "stitching38" => [ "collar_medium_spread_5w0001st38.png"],
                        "stitching14" => [ "collar_medium_spread_5w0001st14.png"],
                        "insert_full" => ["collar_medium_spread_5w_insf0001.png"],
                        "image" => "customization/collar_medium_spread.jpeg",
                        "buttons" => "buttonsh1.png",
                    ), array(
                        "status" => "0",
                        "title" => "Full Cutaway",
                        "customization_category_id" => "2",
                        "insert_style" => "collar_m_comman_insert20001.png",
                        "insert_overlay" => "collar_simple_insert_overlay.png",
                        "insert_full" => ["collar_fullcutaway_5w_insf0001.png"],
                        "elements" => [ "collar_fullcutaway_5w0001.png"],
                        "insert_collar" => [ "collar_fullcutaway_5w_ins0001.png"],
                        "stitching38" => [ "collar_fullcutaway_5w0001st38.png"],
                        "stitching14" => [ "collar_fullcutaway_5w0001st14.png"],
                        "image" => "customization/collar_full_cutaway.jpeg",
                        "buttons" => "buttonsh1.png",
                    ), array(
                        "status" => "0",
                        "title" => "Wide Spread",
                        "customization_category_id" => "2",
                        "elements" => [ "collar_wide_spread_5w0001.png"],
                        "insert_collar" => [ "collar_wide_spread_5w_ins0001.png"],
                        "stitching38" => [ "collar_wide_spread_5w0001st38.png"],
                        "stitching14" => [ "collar_wide_spread_5w0001st14.png"],
                        "image" => "customization/collar_wide_spread.jpeg",
                        "insert_style" => "collar_m_comman_insert20001.png",
                        "insert_overlay" => "collar_simple_insert_overlay.png",
                        "insert_full" => ["collar_wide_spread_5w_insf0001.png"],
                        "buttons" => "buttonsh1.png",
                    )
                    , array(
                        "status" => "0",
                        "title" => "Button Down",
                        "customization_category_id" => "2",
                        "elements" => [ "collar_button_down_5w0001.png"],
                        "insert_collar" => [ "collar_button_down_5w_ins0001.png"],
                        "stitching38" => [ "collar_button_down_5w0001st38.png"],
                        "stitching14" => [ "collar_button_down_5w0001st14.png"],
                        "image" => "customization/collar_regular_button_down.jpeg",
                        "overlay" => [ "button_down_overlay.png"],
                        "insert_style" => "collar_m_comman_insert20001.png",
                        "insert_overlay" => "collar_simple_insert_overlay.png",
                        "insert_full" => ["collar_button_down_5w_insf0001.png"],
                        "buttons" => "collar_regular_button_down.jpeg",
                    )
                    , array(
                        "status" => "0",
                        "title" => "Hidden Button Down",
                        "customization_category_id" => "2",
                        "elements" => [ "collar_hidden_button_down_5w0001.png"],
                        "insert_collar" => [ "collar_hidden_button_down_5w_ins0001.png"],
                        "stitching38" => [ "collar_hidden_button_down_5w0001st38.png"],
                        "stitching14" => [ "collar_hidden_button_down_5w0001st14.png"],
                        "overlay" => [ "hidden_button_down_overlay.png"],
                        "image" => "customization/hidden_button_down.jpeg",
                        "insert_style" => "collar_m_comman_insert20001.png",
                        "insert_overlay" => "collar_simple_insert_overlay.png",
                        "insert_full" => ["collar_hidden_button_down_5w_insf0001.png"],
                        "buttons" => "hidden_button_down.jpeg",
                    ),
                    array(
                        "status" => "0",
                        "title" => "Round Point",
                        "customization_category_id" => "2",
                        "elements" => [ "collar_ragular_round_point0001.png"],
                        "insert_collar" => [ "collar_ragular_round_point_ins0001.png"],
                        "stitching38" => [ "collar_ragular_round_point0001st38.png"],
                        "stitching14" => [ "collar_ragular_round_point0001st14.png"],
                        "image" => "customization/collar_round_point.jpeg",
                        "insert_style" => "collar_m_comman_insert20001.png",
                        "insert_overlay" => "collar_simple_insert_overlay.png",
                        "insert_full" => ["collar_ragular_round_point_insf0001.png"],
                        "buttons" => "hidden_button_down.jpeg",
                    ),
                    array(
                        "status" => "0",
                        "title" => "Wing Tip",
                        "customization_category_id" => "2",
                        "elements" => [ "collar_wingtip_5w0001.png"],
                        "insert_collar" => [ "collar_wingtip_5w_ins0001.png"],
                        "stitching38" => [ "collar_wingtip_5w0001st38.png"],
                        "stitching14" => [ "collar_wingtip_5w0001st14.png"],
                        "image" => "customization/collar_wingtip.jpeg",
                        "insert_style" => "collar_m_comman_insert20001.png",
                        "insert_overlay" => "collar_simple_insert_overlay.png",
                        "insert_full" => ["collar_wingtip_5w_insf0001.png"],
                        "buttons" => "hidden_button_down.jpeg",
                    ),
                    array(
                        "status" => "0",
                        "title" => "Mandarian",
                        "customization_category_id" => "2",
                        "elements" => [ "collar_mandarian_5w0001.png"],
                        "insert_collar" => [ "collar_mandarian_5w_ins0001.png"],
                        "stitching38" => [ "collar_mandarian_5w0001st38.png"],
                        "stitching14" => [ "collar_mandarian_5w0001st14.png"],
                        "image" => "customization/collar_mandarin.jpeg",
                        "insert_style" => "collar_m_comman_insert20001.png",
                        "insert_overlay" => "collar_simple_insert_overlay.png",
                        "insert_full" => ["collar_mandarian_5w_insf0001.png"],
                        "buttons" => "hidden_button_down.jpeg",
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
                ), array(
                    "status" => "0",
                    "title" => "1 Right Belt Loop With Buckle",
                    "elements" => [ "adjustable_buckle0001.png", "pant_belt_loopwbr0001.png"],
                    "overlay" => ["adjustable_buckleoverlay.png"],
                    "customization_category_id" => "4",
                    "image" => "pant_elements/waistband/fastenbuckleloop.png",
                    "backbeltloop" => "true",
                    "show_buttons" => "true",
                    "wbtype" => "long",
                )
            ],
            "Waistband" => [
                array(
                    "status" => "1",
                    "title" => "Standard 1 Button",
                    "customization_category_id" => "4",
                    "elements" => ["pant_waistband0001.png"],
                    "image" => "pant_elements/waistband/waistband1b.png",
                    "show_buttons" => "true",
                    "wbtype" => "all",
                    "longele" => array(
                        "status" => "1",
                        "title" => "Belt Loop",
                        "elements" => ["pant_belt_loopwb0001.png",],
                        "overlay" => ["pant_belt_loopwboverlay.png"],
                        "customization_category_id" => "4",
                        "image" => "pant_elements/waistband/beltloop.png",
                        "backbeltloop" => "true",
                        "show_buttons" => "true",
                        "wbtype" => "all",
                    ),
                    "overlay" => ["pant_waistbandoverlay.png", "pant_waistband1_button.png", "pant_waistband0001_overlay.png"]
                ), array(
                    "status" => "0",
                    "title" => "Standard 2 Buttons",
                    "elements" => ["pant_waistbandb0001.png",],
                    "customization_category_id" => "4",
                    "image" => "pant_elements/waistband/waistband2b.png",
                    "backbeltloop" => "true",
                    "show_buttons" => "true",
                    "wbtype" => "all",
                    "longele" => array(
                        "status" => "1",
                        "title" => "Belt Loop",
                        "elements" => ["pant_belt_loopwb0001.png",],
                        "overlay" => ["pant_belt_loopwboverlay.png"],
                        "customization_category_id" => "4",
                        "image" => "pant_elements/waistband/beltloop.png",
                        "backbeltloop" => "true",
                        "show_buttons" => "true",
                        "wbtype" => "all",
                    ),
                    "adjustmentposition" => "    margin-top: -3px;",
                    "overlay" => ["pant_waistbandboverlay.png", "pant_waistbandb2_buttons.png", "pant_waistbandb0001_overlay.png"]
                )
                , array(
                    "status" => "0",
                    "title" => "Standard 1 Hook",
                    "elements" => ["pant_waistband0001.png",],
                    "customization_category_id" => "4",
                    "image" => "pant_elements/waistband/waistband1h.png",
                    "backbeltloop" => "true",
                    "show_buttons" => "true",
                    "wbtype" => "all",
                    "longele" => array(
                        "status" => "1",
                        "title" => "Belt Loop",
                        "elements" => ["pant_belt_loopwb0001.png",],
                        "overlay" => ["pant_belt_loopwboverlay.png"],
                        "customization_category_id" => "4",
                        "image" => "pant_elements/waistband/beltloop.png",
                        "backbeltloop" => "true",
                        "show_buttons" => "true",
                        "wbtype" => "all",
                    ),
                    "overlay" => ["pant_waistbandoverlay.png", "pant_waistband0001_overlay.png"]
                ),
                array(
                    "status" => "0",
                    "title" => "Center 1 Button",
                    "customization_category_id" => "4",
                    "elements" => ["pant_waistband_m0001.png"],
                    "image" => "pant_elements/waistband/waistbandc1b.png",
                    "show_buttons" => "true",
                    "wbtype" => "all",
                    "longele" => array(
                        "status" => "1",
                        "title" => "Belt Loop",
                        "elements" => ["pant_belt_loopwb0001.png",],
                        "overlay" => ["pant_belt_loopwboverlay.png"],
                        "customization_category_id" => "4",
                        "image" => "pant_elements/waistband/beltloop.png",
                        "backbeltloop" => "true",
                        "show_buttons" => "true",
                        "wbtype" => "all",
                    ),
                    "overlay" => ["pant_waistband_moverlay.png", "pant_waistband_m1_button.png", "pant_waistband_m0001overlay.png"]
                )
                , array(
                    "status" => "0",
                    "title" => "Center 1 Hook",
                    "elements" => ["pant_waistband_m0001.png",],
                    "customization_category_id" => "4",
                    "image" => "pant_elements/waistband/waistbandc1h.png",
                    "backbeltloop" => "true",
                    "show_buttons" => "true",
                    "wbtype" => "all",
                    "longele" => array(
                        "status" => "1",
                        "title" => "Belt Loop",
                        "elements" => ["pant_belt_loopwb0001.png",],
                        "overlay" => ["pant_belt_loopwboverlay.png"],
                        "customization_category_id" => "4",
                        "image" => "pant_elements/waistband/beltloop.png",
                        "backbeltloop" => "true",
                        "show_buttons" => "true",
                        "wbtype" => "all",
                    ),
                    "overlay" => ["pant_waistband_moverlay.png", "pant_waistband_m0001overlay.png"]
                )
                ,
                array(
                    "status" => "0",
                    "title" => "Long 1 Button",
                    "customization_category_id" => "4",
                    "elements" => ["pant_waistband_l0001.png"],
                    "image" => "pant_elements/waistband/waistbandl1b.png",
                    "show_buttons" => "true",
                    "wbtype" => "long",
                    "overlay" => ["pant_waistband_loverlay.png", "pant_waistband_lsboverlay.png", "pant_waistband_l1_button.png"],
                    "longele" => array(
                        "status" => "0",
                        "title" => "1 Right Belt Loop With Buckle",
                        "elements" => [ "adjustable_buckle0001.png", "pant_belt_loopwbr0001.png"],
                        "overlay" => ["adjustable_buckleoverlay.png"],
                        "customization_category_id" => "4",
                        "image" => "pant_elements/waistband/fastenbuckleloop.png",
                        "backbeltloop" => "true",
                        "show_buttons" => "true",
                        "wbtype" => "long",
                    ),
                ), array(
                    "status" => "0",
                    "title" => "Long 2 Buttons",
                    "elements" => ["pant_waistband_lb0001.png",],
                    "customization_category_id" => "4",
                    "image" => "pant_elements/waistband/waistbandl2b.png",
                    "backbeltloop" => "true",
                    "show_buttons" => "true",
                    "wbtype" => "long",
                    "adjustmentposition" => "    margin-top: 0px;",
                    "longele" => array(
                        "status" => "0",
                        "title" => "1 Right Belt Loop With Buckle",
                        "elements" => [ "adjustable_buckle0001.png", "pant_belt_loopwbr0001.png"],
                        "overlay" => ["adjustable_buckleoverlay.png"],
                        "customization_category_id" => "4",
                        "image" => "pant_elements/waistband/fastenbuckleloop.png",
                        "backbeltloop" => "true",
                        "show_buttons" => "true",
                        "wbtype" => "long",
                    ),
                    "overlay" => ["pant_waistband_lboverlay.png", "pant_waistband_lbsboverlay.png", "pant_waistband_lb2_buttons.png"]
                )
                , array(
                    "status" => "0",
                    "title" => "Long 1 Hook",
                    "elements" => ["pant_waistband_l0001.png",],
                    "customization_category_id" => "4",
                    "image" => "pant_elements/waistband/waistbandl1h.png",
                    "backbeltloop" => "true",
                    "show_buttons" => "true",
                    "wbtype" => "long",
                    "longele" => array(
                        "status" => "0",
                        "title" => "1 Right Belt Loop With Buckle",
                        "elements" => [ "adjustable_buckle0001.png", "pant_belt_loopwbr0001.png"],
                        "overlay" => ["adjustable_buckleoverlay.png"],
                        "customization_category_id" => "4",
                        "image" => "pant_elements/waistband/fastenbuckleloop.png",
                        "backbeltloop" => "true",
                        "show_buttons" => "true",
                        "wbtype" => "long",
                    ),
                    "overlay" => ["pant_waistband_loverlay.png", "pant_waistband_lsboverlay.png",]
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
                array(
                    "status" => "0",
                    "title" => "Flap Pocket Right Side",
                    "customization_category_id" => "4",
                    "elements" => ["back_pocket_r_flap0001.png"],
                    "image" => "pant_elements/back_pocket/back_r_pocket_flap.png",
                    "show_buttons" => "true",
                ), array(
                    "status" => "0",
                    "title" => "Flap Pocket Left Side",
                    "elements" => ["back_pocket_l_flap0001.png",],
                    "customization_category_id" => "4",
                    "image" => "pant_elements/back_pocket/back_l_pocket_flap.png",
                    "show_buttons" => "true",
                ), array(
                    "status" => "0",
                    "title" => "2 Flap Pockets",
                    "elements" => ["back_pocket_r_flap0001.png", "back_pocket_l_flap0001.png"],
                    "customization_category_id" => "4",
                    "image" => "pant_elements/back_pocket/back_2_pocket_flap.png",
                    "show_buttons" => "true",
                ),
                array(
                    "status" => "0",
                    "title" => "One Welt Pocket Right Side Without Button",
                    "customization_category_id" => "4",
                    "elements" => ["back_pocket_r0001.png",],
                    "image" => "pant_elements/back_pocket/back_r_pocketwb.png",
                    "show_buttons" => "true",
                ), array(
                    "status" => "0",
                    "title" => "One Welt Pocket Left Side Without Button",
                    "elements" => ["back_pocket_l0001.png",],
                    "customization_category_id" => "4",
                    "image" => "pant_elements/back_pocket/back_l_pocketwb.png",
                    "show_buttons" => "true",
                ), array(
                    "status" => "0",
                    "title" => "2 Welt Pockets Without Buttons",
                    "elements" => ["back_pocket_r0001.png", "back_pocket_l0001.png",],
                    "customization_category_id" => "4",
                    "image" => "pant_elements/back_pocket/back_2_pocketwb.png",
                    "show_buttons" => "true",
                ),
            ],
            "Cuff" => [
                array(
                    "status" => "1",
                    "title" => "No Cuff",
                    "customization_category_id" => "4",
                    "elements" => [],
                    "image" => "pant_elements/pant_cuff/pant_cuffnt.png",
                    "show_buttons" => "true",
                ), array(
                    "status" => "0",
                    "title" => "Cuff 1 1/4",
                    "elements" => ["pant_cuff14.png",],
                    "customization_category_id" => "4",
                    "image" => "pant_elements/pant_cuff/pant_cuff14t.png",
                    "show_buttons" => "true",
                ), array(
                    "status" => "0",
                    "title" => "Cuff 1 3/8",
                    "elements" => ["pant_cuff13.png",],
                    "customization_category_id" => "4",
                    "image" => "pant_elements/pant_cuff/pant_cuff13t.png",
                    "show_buttons" => "true",
                ),
                array(
                    "status" => "0",
                    "title" => "Cuff 1 1/2",
                    "elements" => ["pant_cuff12.png",],
                    "customization_category_id" => "4",
                    "image" => "pant_elements/pant_cuff/pant_cuff12t.png",
                    "show_buttons" => "true",
                ),
                array(
                    "status" => "0",
                    "title" => "Cuff 2",
                    "elements" => ["pant_cuff2.png",],
                    "customization_category_id" => "4",
                    "image" => "pant_elements/pant_cuff/pant_cuff2t.png",
                    "show_buttons" => "true",
                ),
            ],
            "Buttons" => [
                array(
                    "status" => "1",
                    "title" => "Standard",
                    "folder" => "rs",
                    "customization_category_id" => "4",
                    "image" => "buttongold.png",
                    "image" => "suit_elements/buttons/rs.jpg",
                    "show_buttons" => "true",
                ),
                array(
                    "status" => "0",
                    "title" => "Black Horn",
                    "customization_category_id" => "4",
                    "image" => "suit_elements/buttons/bhb.jpg",
                    "folder" => "bhb",
                    "show_buttons" => "true",
                    "extracost" => "30",
                ),
                array(
                    "status" => "0",
                    "title" => "Brown Horn",
                    "customization_category_id" => "4",
                    "image" => "suit_elements/buttons/bhbr.jpg",
                    "folder" => "bhbr",
                    "show_buttons" => "true",
                    "extracost" => "30",
                ),
                array(
                    "status" => "0",
                    "title" => "Brown Lipshell",
                    "customization_category_id" => "4",
                    "image" => "suit_elements/buttons/bwl.jpg",
                    "folder" => "bwl",
                    "show_buttons" => "true",
                    "extracost" => "30",
                ), array(
                    "status" => "0",
                    "title" => "Black Lipshell",
                    "folder" => "bll",
                    "customization_category_id" => "4",
                    "image" => "suit_elements/buttons/bll.jpg",
                    "show_buttons" => "true",
                    "extracost" => "30",
                ),
                array(
                    "status" => "0",
                    "title" => "MOP",
                    "folder" => "mop",
                    "customization_category_id" => "4",
                    "image" => "suit_elements/buttons/mop.jpg",
                    "show_buttons" => "true",
                    "extracost" => "30",
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
                    "elements" => ["breast_pocket_v30001.png"],
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
                    "elements" => ["back_sleeve10001.png", "back_upper0001.png", "back_body0001.png",],
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
                    "elements" => ["back_sleeve10001.png", "back_upper0001.png", "back_body0001.png",],
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
                    "elements" => ["sleeve_buttons_10001.png", "sleeve_buttons_comman0001.png", "sleeve_buttons_40001.png",],
                    "image" => "suit_elements/button/button_4_flat.png",
                    "buttons" => ["sleeve_buttons_flat_30001", "sleeve_buttons_flat_3_40001"],
                    "buttonhole" => ["sleeve_button_hole_40001.png", "sleeve_button_hole_comman0001.png", "sleeve_button_hole_10001.png"],
                    "show_buttons" => "true",
                    "first_button" => ["sleeve_button_hole_40001.png"]
                ),
                array(
                    "status" => "1",
                    "title" => "3 Flat Buttons",
                    "customization_category_id" => "4",
                    "elements" => ["sleeve_buttons_comman0001.png", "sleeve_buttons_40001.png"],
                    "image" => "suit_elements/button/button_3_flat.png",
                    "buttons" => ["sleeve_buttons_flat_30001"],
                    "buttonhole" => ["sleeve_button_hole_40001.png", "sleeve_button_hole_comman0001.png",],
                    "show_buttons" => "true",
                    "first_button" => ["sleeve_button_hole_40001.png"]
                ),
                array(
                    "status" => "0",
                    "title" => "4 Kissing Buttons",
                    "customization_category_id" => "4",
                    "elements" => ["sleeve_buttons_4_k0001.png", "sleeve_buttons_comman_k0001.png", "sleeve_buttons_1_k0001.png",],
                    "image" => "suit_elements/button/button_4_kissing.png",
                    "buttons" => ["sleeve_buttons_flat_30001", "sleeve_buttons_flat_3_40001"],
                    "buttonhole" => ["sleeve_button_hole_4_k0001.png", "sleeve_button_hole_comman_k0001.png", "sleeve_button_hole_1_k0001.png"],
                    "show_buttons" => "true",
                    "first_button" => ["sleeve_button_hole_4_k0001.png"]
                ),
                array(
                    "status" => "1",
                    "title" => "3 Kissing Buttons",
                    "customization_category_id" => "4",
                    "elements" => ["sleeve_buttons_4_k0001.png", "sleeve_buttons_comman_k0001.png",],
                    "image" => "suit_elements/button/button_3_kissing.png",
                    "buttons" => ["sleeve_buttons_flat_30001"],
                    "buttonhole" => ["sleeve_button_hole_4_k0001.png", "sleeve_button_hole_comman_k0001.png",],
                    "show_buttons" => "true",
                    "first_button" => ["sleeve_button_hole_4_k0001.png"]
                ),
            ],
            "Lower Pocket" => [

                array(
                    "status" => "1",
                    "title" => "Straight Flap Pocket",
                    "customization_category_id" => "4",
                    "overlay" => ["lower_flap_pocket_overlay.png"],
                    "elements" => ["lower_flap_pocket0001.png",],
                    "image" => "suit_elements/pocket/pocket_flap.png",
                    "show_buttons" => "true",
                    "style_l" => "   ",
                    "style_r" => "    ",
                ),
                array(
                    "status" => "0",
                    "title" => "Straight Pipe Pocket",
                    "elements" => ["pocket_lower_pipe_left0001.png", "pocket_lower_pipe_right0001.png"],
                    "customization_category_id" => "4",
                    "image" => "suit_elements/pocket/pocket_pipe.png",
                    "show_buttons" => "true",
                ),
                array(
                    "status" => "0",
                    "title" => "Slanting Flap Pocket",
                    "customization_category_id" => "4",
                    "overlay" => [],
                    "elements" => ["pocket_lower_flap_left_slanting0001.png", "pocket_lower_flap_right_slanting0001.png"],
                    "image" => "suit_elements/pocket/pocket_flap_slanting.png",
                    "show_buttons" => "true",
                    "style_l" => "   ",
                    "style_r" => "    ",
                ),
                array(
                    "status" => "0",
                    "title" => "Slanting Pipe Pocket",
                    "elements" => ["pocket_lower_pipe_left_slanting0001.png", "pocket_lower_pipe_right_slanting0001.png"],
                    "customization_category_id" => "4",
                    "image" => "suit_elements/pocket/pocket_pipe_slanting.png",
                    "show_buttons" => "true",
                ),
                array(
                    "status" => "0",
                    "title" => "Patch Pocket",
                    "elements" => ["pocket_lower_patch_left10001.png", "pocket_lower_patch_right10001.png"],
                    "customization_category_id" => "4",
                    "image" => "suit_elements/pocket/pocket_patch.png",
                    "show_buttons" => "true",
                )
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
                    "folder" => "satin",
                    "image" => "suit_elements/tuxedo/sidegrosgrain.png",
                ),
            ],
            "Jacket Style" => [
                array(
                    "status" => "0",
                    "title" => "1 Button",
                    "customization_category_id" => "4",
                    "elements" => ['body_single_410001.png',],
                    "image" => "suit_elements/suittype/1_button.png",
                    "left" => "body_single_41_l0001.png",
                    "right" => "body_single_41_r0001.png",
                    "buttons" => ["buttons_10001"],
                    "button_hole" => ["button_1_hole10001.png"],
                    "show_buttons" => "true",
                    "overlay" => ["single_overlay2.png", "single_overlay.png"],
                ), array(
                    "status" => "1",
                    "title" => "2 Buttons",
                    "customization_category_id" => "4",
                    "elements" => ['body_single_410001.png',],
                    "image" => "suit_elements/suittype/2_button.png",
                    "left" => "body_single_41_r0001.png",
                    "right" => "body_single_41_l0001.png",
                    "buttons" => ["buttons_10001"],
                    "buttons2" => ["buttons_20001"],
                    "button_hole" => ["button_1_hole10001.png", "button_1_hole20001.png"],
                    "show_buttons" => "false",
                    "overlay" => ["single_overlay2.png", "single_overlay.png"],
                ), array(
                    "status" => "0",
                    "title" => "3 Row 2 Buttons",
                    "customization_category_id" => "4",
                    "elements" => ['body_single_410001.png',],
                    "image" => "suit_elements/suittype/2_button.png",
                    "left" => "body_single_41_r0001.png",
                    "right" => "body_single_41_l0001.png",
                    "buttons" => ["buttons_10001"],
                    "buttons2" => ["buttons_20001"],
                    "button_hole" => ["button_1_hole10001.png", "button_1_hole20001.png"],
                    "show_buttons" => "false",
                    "overlay" => ["single_overlay2.png", "single_overlay.png",],
                )
                , array(
                    "status" => "0",
                    "title" => "4 Buttons 1 Button Fasten",
                    "elements" => ["body_double_left_v40001.png", "body_double_right_v40001.png",],
                    "customization_category_id" => "4",
                    "image" => "suit_elements/suittype/41_button.png",
                    "left" => "body_double_41v2_l0001.png",
                    "right" => "body_double_41v2_r0001.png",
                    "button_hole" => ["button_4_hole_10001.png", "button_4_hole_20001.png"],
                    "buttons" => ["button_4_10001", "button_4_30001", "button_4_40001"],
                    "buttons2" => ["button_4_20001"],
                    "show_buttons" => "true",
                    "overlay" => ["body_double_overlay2.png", "body_double_overlay.png"],
                )
                , array(
                    "status" => "0",
                    "title" => "6 Buttons 2 Buttons Fasten",
                    "elements" => ["body_double_left_v40001.png", "body_double_right_v40001.png",],
                    "customization_category_id" => "4",
                    "left" => "body_double_41v2_l0001.png",
                    "right" => "body_double_41v2_r0001.png",
                    "button_hole" => ["button_4_hole_10001.png", "button_4_hole_20001.png"],
                    "buttons" => ["button_4_10001", "button_4_30001", "button_4_40001", "button_6_10001", "button_6_20001"],
                    "buttons2" => ["button_4_20001"],
                    "image" => "suit_elements/suittype/62_button.png",
                    "show_buttons" => "true",
                    "overlay" => ["body_double_overlay2.png", "body_double_overlay.png"],
                )
            ],
            "Lapel Style" => [
                array(
                    "status" => "1",
                    "title" => "Notch Lapel",
                    "elements" => ["body_round0001.png"],
                    "laple_style" => array(
                        "1 Button" => array(
                            "elements" => [
                                "laple_notch_peak_upper_v40001.png",
                                "laple_notch_v20001.png"
                            ],
                            "elementst" => [
                                "laple_notch_peak_upper_v4_t0001.png",
                                "laple_notch_v2_t0001.png"
                            ],
                            "stitcing" => ['laple_notch_stitching1.png'],
                            "hole" => ["laple_double_notch_button_hole0001.png"],
                            "overelay" => []),
                        "2 Buttons" => array("elements" => [
                                "laple_notch_peak_upper_v40001.png",
                                "laple_notch_v20001.png"
                            ],
                            "elementst" => [
                                "laple_notch_peak_upper_v4_t0001.png",
                                "laple_notch_v2_t0001.png"
                            ],
                            
                            "stitcing" => ['laple_notch_stitching1.png'],
                            "hole" => ["laple_double_notch_button_hole0001.png"],
                            "overelay" => []),
                        "3 Row 2 Buttons" => array("elements" => [
                                "laple_notch_peak_upper_v40001.png",
                                "laple_notch_v20001.png"
                            ],
                            "stitcing" => ['laple_notch_stitching1.png'],
                            "hole" => ["laple_double_notch_button_hole0001.png"],
                            "overelay" => ["3row2_overlay.png"]),
                        "3 Buttons" => array("elements" => [
                                "laple_single_3_notch_peak_upper0001.png",
                                "laple_single_3_notch_modern0001.png"
                            ], "overelay" => []),
                        "4 Buttons" => array("elements" => [
                                "laple_single_3_notch_peak_upper0001.png",
                                "laple_single_3_notch_modern0001.png"
                            ], "overelay" => []),
                        "4 Buttons 1 Button Fasten" => array("elements" => [
                                "laple_notch_peak_upper_v40001.png",
                                "laple_double_notch_v20001.png"
                            ],
                            "stitcing" => ['laple_double_notch_stitch.png'],
                            "hole" => ["laple_double_notch_button_hole0001.png"],
                            "overelay" => []),
                        "4 Buttons 2 Buttons Fasten" => array("elements" => [
                                "laple_notch_peak_upper_v40001.png",
                                "laple_double_notch_v20001.png"
                            ],
                            "stitcing" => ['laple_double_notch_stitch.png'],
                            "hole" => ["laple_double_notch_button_hole0001.png"],
                            "overelay" => []),
                        "6 Buttons 1 Button Fasten" => array("elements" => [
                                "laple_notch_upper0001.png",
                                "laple_6_notch_modrn0001.png"
                            ], "overelay" => []),
                        "6 Buttons 2 Buttons Fasten" => array("elements" => [
                                "laple_notch_peak_upper_v40001.png",
                                "laple_double_notch_v20001.png"
                            ],
                            "stitcing" => ['laple_double_notch_stitch.png'],
                            "hole" => ["laple_double_notch_button_hole0001.png"],
                            "overelay" => []),
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
                                "laple_notch_peak_upper_v40001.png",
                                "laple_peak_v20001.png"
                            ],
                            "elementst" => [
                                "laple_notch_peak_upper_v4_t0001.png",
                                "laple_peak_v2_t0001.png"
                            ],
                            "stitcing" => ['laple_peak_stitch.png'],
                            "hole" => ["laple_double_peak_button_hole0001.png"],
                            "overelay" => ["laple_peak_overlay.png"]),
                        "2 Buttons" => array("elements" => [
                                "laple_notch_peak_upper_v40001.png",
                                "laple_peak_v20001.png"
                            ],
                            "elementst" => [
                                "laple_notch_peak_upper_v4_t0001.png",
                                "laple_peak_v2_t0001.png"
                            ],
                            "stitcing" => ['laple_peak_stitch.png'],
                            "hole" => ["laple_double_peak_button_hole0001.png"],
                            "overelay" => ["laple_peak_overlay.png"]),
                        "3 Row 2 Buttons" => array("elements" => [
                                "laple_notch_peak_upper_v40001.png",
                                "laple_peak_v20001.png"
                            ],
                            "stitcing" => ['laple_peak_stitch.png'],
                            "hole" => ["laple_double_peak_button_hole0001.png"],
                            "overelay" => ["laple_peak_overlay.png", "3row2_overlay.png"]),
                        "3 Buttons" => array("elements" => [
                                "laple_single_3_notch_peak_upper0001.png",
                                "laple_single_3_peak_morden0001.png"
                            ], "overelay" => []),
                        "4 Buttons" => array("elements" => [
                                "laple_single_3_notch_peak_upper0001.png",
                                "laple_single_3_peak_morden0001.png"
                            ], "overelay" => []),
                        "4 Buttons 1 Button Fasten" => array("elements" => [
                                "laple_notch_peak_upper_v40001.png",
                                "laple_double_peak_v20001.png"
                            ],
                            "stitcing" => ['laple_double_peak_stitch.png'],
                            "hole" => ["laple_double_peak_button_hole0001.png"],
                            "overelay" => []),
                        "4 Buttons 2 Buttons Fasten" => array("elements" => [
                                "laple_notch_peak_upper_v40001.png",
                                "laple_double_peak_v20001.png"
                            ],
                            "stitcing" => ['laple_double_peak_stitch.png'],
                            "hole" => ["laple_double_peak_button_hole0001.png"],
                            "overelay" => []),
                        "6 Buttons 1 Button Fasten" => array("elements" => [
                                "laple_peak_upper0001.png",
                                "laple_6_peack_morden0001.png"
                            ], "overelay" => ["4_peak_m.png"]),
                        "6 Buttons 2 Buttons Fasten" => array("elements" => [
                                "laple_notch_peak_upper_v40001.png",
                                "laple_double_peak_v20001.png"
                            ],
                            "stitcing" => ['laple_double_peak_stitch.png'],
                            "hole" => ["laple_double_peak_button_hole0001.png"],
                            "overelay" => []),
                    ),
                    "customization_category_id" => "6",
                    "image" => "suit_elements/laple/peak.png"
                ),
                array(
                    "status" => "0",
                    "title" => "Shawl Lapel",
                    "elements" => ["body_round0001.png"],
                    "laple_style" => array(
                        "1 Button" => array("elements" => [

                                "laple_shwal_v20001.png"
                            ],
                            "elementst" => [

                                "laple_shwal_v2_t0001.png"
                            ],
                            "stitcing" => ['laple_notch_stitching1.png'],
                            "hole" => ["laple_double_shawl_button_hole0001.png"],
                            "backoverelay" => ["laple_shwal_v20001_overlay.png"],
                            "overelay" => []),
                        "2 Buttons" => array("elements" => [
                                "laple_shwal_v20001.png"
                            ],
                            "elementst" => [

                                "laple_shwal_v2_t0001.png"
                            ],
                            "stitcing" => ['laple_notch_stitching1.png'],
                            "hole" => ["laple_double_shawl_button_hole0001.png"],
                            "backoverelay" => ["laple_shwal_v20001_overlay.png"],
                            "overelay" => []),
                        "3 Row 2 Buttons" => array("elements" => [
                                "laple_shwal_v20001.png"
                            ],
                            "stitcing" => ['laple_notch_stitching1.png'],
                            "hole" => ["laple_double_shawl_button_hole0001.png"],
                            "backoverelay" => ["laple_shwal_v20001_overlay.png"],
                            "overelay" => ["3row2_overlay.png"]),
                        "3 Buttons" => array("elements" => [
                                "laple_single_3_notch_peak_upper0001.png",
                                "laple_single_3_notch_modern0001.png"
                            ], "overelay" => []),
                        "4 Buttons" => array("elements" => [
                                "laple_single_3_notch_peak_upper0001.png",
                                "laple_single_3_notch_modern0001.png"
                            ], "overelay" => []),
                        "4 Buttons 1 Button Fasten" => array("elements" => [
                                "laple_double_shwal_v20001.png"
                            ],
                            "stitcing" => ['laple_double_notch_stitch.png'],
                            "hole" => ["laple_double_shawl_button_hole0001.png"],
                            "overelay" => []),
                        "4 Buttons 2 Buttons Fasten" => array("elements" => [
                                "laple_double_shwal_v20001.png"
                            ],
                            "stitcing" => ['laple_double_notch_stitch.png'],
                            "hole" => ["laple_double_shawl_button_hole0001.png"],
                            "overelay" => []),
                        "6 Buttons 1 Button Fasten" => array("elements" => [
                                "laple_double_shwal_v20001.png"
                            ], "overelay" => []),
                        "6 Buttons 2 Buttons Fasten" => array("elements" => [
                                "laple_double_shwal_v20001.png"
                            ],
                            "stitcing" => ['laple_double_notch_stitch.png'],
                            "hole" => ["laple_double_shawl_button_hole0001.png"],
                            "overelay" => []),
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
                    "title" => "Ticket Pocket",
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
                array(
                    "title" => "Contrast First Button Hole",
                    "viewtype" => "front",
                    "type" => "main",
                    "style_side" => "    background-size: 100%!important;height:50px",
                    "colrow" => "4",
                ),
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
                    "title" => "Hidden Pocket",
                    "viewtype" => "pant",
                    "type" => "main",
                    "colrow" => "4",
                ),
                array(
                    "title" => "Waistband",
                    "viewtype" => "pant",
                    "type" => "main",
                    "colrow" => "3",
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
                    "title" => "Ticket Pocket",
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
                array(
                    "title" => "Contrast First Button Hole",
                    "viewtype" => "front",
                    "type" => "main",
                    "style_side" => "    background-size: 100%!important;height:50px",
                    "colrow" => "4",
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
                    "title" => "Hidden Pocket",
                    "viewtype" => "pant",
                    "type" => "main",
                    "colrow" => "4",
                ),
                array(
                    "title" => "Waistband",
                    "viewtype" => "pant",
                    "type" => "main",
                    "colrow" => "3",
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
                    "title" => "Ticket Pocket",
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
                array(
                    "title" => "Contrast First Button Hole",
                    "viewtype" => "front",
                    "type" => "main",
                    "style_side" => "    background-size: 100%!important;height:50px",
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
                    "title" => "Hidden Pocket",
                    "viewtype" => "pant",
                    "type" => "main",
                    "colrow" => "4",
                ),
                array(
                    "title" => "Waistband",
                    "viewtype" => "pant",
                    "type" => "main",
                    "colrow" => "3",
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
                    "title" => "Ticket Pocket",
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
                    "title" => "Hidden Pocket",
                    "viewtype" => "pant",
                    "type" => "main",
                    "colrow" => "4",
                ),
                array(
                    "title" => "Waistband",
                    "viewtype" => "pant",
                    "type" => "main",
                    "colrow" => "3",
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
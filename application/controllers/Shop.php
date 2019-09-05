<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->library('session');
        $this->user_id = $this->session->userdata('logged_in')['login_id'];
    }

    public function index() {
        $product_home_slider_bottom = $this->Product_model->product_home_slider_bottom();
        $categories = $this->Product_model->productListCategories(0);
        $data["categories"] = $categories;
        $data["product_home_slider_bottom"] = $product_home_slider_bottom;
        $customarray = [1, 2];
        $this->db->where_in('id', $customarray);
        $query = $this->db->get('custome_items');
        $customeitem = $query->result();

        $data['shirtcustome'] = $customeitem[0];
        $data['suitcustome'] = $customeitem[1];

        $query = $this->db->get('sliders');
        $data['sliders'] = $query->result();

        $this->load->view('home', $data);
    }

    public function contactus() {
        if (isset($_POST['sendmessage'])) {
            $web_enquiry = array(
                'last_name' => $this->input->post('last_name'),
                'first_name' => $this->input->post('first_name'),
                'email' => $this->input->post('email'),
                'contact' => $this->input->post('contact'),
                'subject' => $this->input->post('subject'),
                'message' => $this->input->post('message'),
                'datetime' => date("Y-m-d H:i:s a"),
            );

            $this->db->insert('web_enquiry', $web_enquiry);

            $emailsender = email_sender;
            $sendername = email_sender_name;
            $email_bcc = email_bcc;
            $sendernameeq = $this->input->post('last_name') . " " . $this->input->post('first_name');
            if ($this->input->post('email')) {
                $this->email->set_newline("\r\n");
                $this->email->from($this->input->post('email'), $sendername);
                $this->email->to(email_bcc);
//                $this->email->bcc(email_bcc);
                $subjectt = $this->input->post('subject');
                $orderlog = array(
                    'log_type' => 'Enquiry',
                    'log_datetime' => date('Y-m-d H:i:s'),
                    'user_id' => 'ENQ',
                    'log_detail' => "Enquiry from website - " . $this->input->post('subject')
                );
                $this->db->insert('system_log', $orderlog);

                $subject = "Enquiry from website - " . $this->input->post('subject');
                $this->email->subject($subject);

                $web_enquiry['web_enquiry'] = $web_enquiry;

                $htmlsmessage = $this->load->view('Email/web_enquiry', $web_enquiry, true);
                $this->email->message($htmlsmessage);

                $this->email->print_debugger();
                $send = $this->email->send();
                if ($send) {
                    echo json_encode("send");
                } else {
                    $error = $this->email->print_debugger(array('headers'));
                    echo json_encode($error);
                }
            }

            redirect('Shop/contactus');
        }
        $this->load->view('pages/contactus');
    }

    public function aboutus() {
        $this->load->view('pages/aboutus');
    }

    public function faq() {
        $this->load->view('pages/faq');
    }

    public function catalogue() {
        $this->load->view('pages/catalogue');
    }

    public function lookbook() {
        $query = $this->db->get('look_books');
        $data['lookbook'] = $query->result_array();
        $this->load->view('pages/look_book', $data);
    }

    public function measurements_guide() {
        $mesurementdata = array(
            array(
                "id" => "mes1",
                "title" => "Neck",
                "description" => "Place measuring tape around base of neck with one finger space.",
                "standard_value" => "15",
                "min_value" => "12",
                "max_value" => "20",
                "image" => "measurment_01.png"),
            array(
                "id" => "mes2",
                "title" => "Chest",
                "standard_value" => "35",
                "min_value" => "25",
                "max_value" => "76",
                "description" => "Place measuring tape around the fullest part of the chest, high up under the arms with two fingers space. Tape should be at level and not so tight.",
                "image" => "measurment_02.png"),
            array(
                "id" => "mes3",
                "title" => "Stomach",
                "standard_value" => "38",
                "min_value" => "25",
                "max_value" => "76",
                "description" => "Place measuring tape around the stomach with two fingers space and at level over the fullest part of the stomach. Make sure the tape is not so tight.",
                "image" => "measurment_03.png"),
            array(
                "id" => "mes4",
                "title" => "Full Sleeve",
                "standard_value" => "24",
                "min_value" => "13",
                "max_value" => "36",
                "description" => "Place measuring Tape from the point where the shoulder seam joins the sleeve, down along the arm to the point below the wrist, and please note add extra 1.5 CM",
                "image" => "measurment_04.png"),
            array(
                "id" => "mes5",
                "title" => "Shoulder",
                "standard_value" => "17",
                "min_value" => "10",
                "max_value" => "31",
                "description" => "Place measuring tape from the point where the shoulder seam joins the sleeve of one hand to shoulder seam joining the sleeve of the other hand, and then add allowance according to the body shape .(generally 2-4 CM)",
                "image" => "measurment_05.png"),
            array(
                "id" => "mes6",
                "title" => "Front Length",
                "standard_value" => "24",
                "min_value" => "20",
                "max_value" => "42",
                "description" => "Place measuring tape from the point where the shoulder seam joins the collar vertically to the point of length you require.",
                "image" => "measurment_06.png"),
            array(
                "id" => "mes7",
                "title" => "Biceps",
                "standard_value" => "15",
                "min_value" => "8",
                "max_value" => "30",
                "description" => "Place measuring tape around the fullest part of the upper bicep with two fingers space and parallel to the level.",
                "image" => "measurment_07.png"),
            array(
                "id" => "mes8",
                "title" => "Out & Inseam",
                "standard_value" => "35",
                "min_value" => "20",
                "max_value" => "55",
                "description" => "Place measuring tape from the top of the right waistband to the floor, less 1-1.5 CM.",
                "image" => "measurment_08.png"),
            array(
                "id" => "mes9",
                "title" => "Waist",
                "standard_value" => "35",
                "min_value" => "20",
                "max_value" => "55",
                "description" => "Place measuring tape around the waistband with two fingers space and make the tape snug or tight according to the body shape.",
                "image" => "measurment_09.png"),
            array(
                "id" => "mes10",
                "title" => "Hips",
                "standard_value" => "35",
                "min_value" => "20",
                "max_value" => "85",
                "description" => "Place measuring tape around hips at the hip bone area (fullest part) with two fingers space. Tape should be snug and at level.",
                "image" => "measurment_10.png"),
            array(
                "id" => "mes11",
                "title" => "Thigh",
                "standard_value" => "25",
                "min_value" => "15",
                "max_value" => "40",
                "description" => "Place measuring tape around the thigh near the lowest point of the crotch with two fingers space. Tape should be snug and at level.",
                "image" => "measurment_11.png"),
            array(
                "id" => "mes12",
                "title" => "U-rise",
                "standard_value" => "30",
                "min_value" => "15",
                "max_value" => "40",
                "description" => "Place the measuring tape from the center of front rise, across the crotch and then up to the center of the back waistband. Make sure to fit well and usually the measurement can be 1 CM large.",
                "image" => "measurment_12.png"),
        );

        $data["measurements"] = $mesurementdata;

        if (isset($_POST['priceenquiry'])) {
            $price_enquiry = array(
                'last_name' => $this->input->post('last_name'),
                'first_name' => $this->input->post('first_name'),
                'email' => $this->input->post('email'),
                'contact' => $this->input->post('contact'),
                'remark' => $this->input->post('remark'),
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

                $measurement_key = $this->input->post('measurement_key');
                $measurement_value = $this->input->post('measurement_value');




                $subject = "Measurement From Customer";
                $this->email->subject($subject);

                $price_enquiry['name'] = $sendernameeq;
                $price_enquiry['measurement_key'] = $measurement_key;
                $price_enquiry['measurement_value'] = $measurement_value;
                $price_enquiry['subject'] = $subject;



                $htmlsmessage = $this->load->view('Email/measurements_enquiry', $price_enquiry, true);
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


        $this->load->view('pages/how_to_measurements', $data);
    }

    public function appointment() {
        $timeslot = [
            "07:00 AM", "08:00AM", "09:00 AM", "10:00 AM", "11:00 AM", "12:00 PM", "01:00 PM", "02:00 PM",
            "03:00 PM", "04:00 PM", "05:00 PM", "06:00 PM", "07:00 PM", "08:00 PM",
            "09:00 PM", "10:00 AM", "11:00 AM",
        ];

        $data['timeslot'] = $timeslot;

        $appointmentdetailslocal = [array(
        "type" => "local",
        "id" => "au0_app",
        "country" => "Hong Kong",
        "city_state" => "Kowloon,  T. S. T.",
        "hotel" => "SHOWROOM",
        "address" => "Shop No. 30, G/F, <br/>Mirador Mansion, 1-J Mody Road, <br/> 54-64 Nathan Road, Tsim Sha Tsui,<br/> Kowloon, Hong Kong",
        "days" => "",
        "start_date" => "",
        "end_date" => "",
        "contact_no" => " +(852) 2369 1196",
        "dates" => [
            array("date" => date("Y-m-d"), "timing1" => "09:00 AM", "timing2" => "09:00 PM"),
            array("date" => "Sun", "timing1" => "09:00 AM", "timing2" => "07:00 PM"),
        ]
            ),];

        $data['appointmentdetailslocal'] = $appointmentdetailslocal;





        $allappointment = $this->Product_model->AppointmentDataAll();
        $data['appointmentdatausa'] = $allappointment;

        if (isset($_POST['submit'])) {
            $appointment = array(
                "country" => $this->input->post('country'),
                "city_state" => $this->input->post('city_state'),
                "hotel" => $this->input->post('hotel'),
                "address" => $this->input->post('address'),
                'last_name' => $this->input->post('last_name'),
                'first_name' => $this->input->post('first_name'),
                'email' => $this->input->post('email'),
                'contact_no' => $this->input->post('contact_no'),
                'select_time' => $this->input->post('select_time'),
                'select_date' => $this->input->post('select_date'),
                'no_of_person' => $this->input->post('no_of_person'),
                'referral' => $this->input->post('referral'),
                'datetime' => date("Y-m-d H:i:s a"),
                'appointment_type' => "Local",
            );

            $this->db->insert('appointment_list', $appointment);
            $appointment['contact_no2'] = $this->input->post('contact_no2');


            $emailsender = email_sender;
            $sendername = email_sender_name;
            $email_bcc = email_bcc;
            $sendernameeq = $this->input->post('last_name') . " " . $this->input->post('first_name');
            if ($this->input->post('email')) {
                $this->email->set_newline("\r\n");
                $this->email->from(email_sender, $sendername);
                $this->email->reply_to(email_bcc, $sendername);
                $this->email->to($this->input->post('email'));
                $this->email->bcc(email_bcc);
                $subjectt = email_sender_name . " Appointment : " . $appointment['select_date'] . " (" . $appointment['select_time'] . ")";
                $orderlog = array(
                    'log_type' => 'Appointment',
                    'log_datetime' => date('Y-m-d H:i:s'),
                    'user_id' => 'Appointment User',
                    'log_detail' => $sendernameeq . "  " . $subjectt
                );
                $this->db->insert('system_log', $orderlog);

                $subject = $subjectt;
                $this->email->subject($subject);

                $appointment['appointment'] = $appointment;


                $htmlsmessage = $this->load->view('Email/appointment', $appointment, true);
                if (REPORT_MODE == 1) {
                    $this->email->message($htmlsmessage);
                    $this->email->print_debugger();
                    $send = $this->email->send();
                    if ($send) {
                        echo json_encode("send");
                    } else {
                        $error = $this->email->print_debugger(array('headers'));
                        echo json_encode($error);
                    }
                } else {
                    echo $htmlsmessage;
                }
            }

            redirect('Shop/appointment');
        }

        $this->load->view('pages/appointment', $data);
    }

    public function appointment2() {
        $timeslot = [
            "07:00 AM", "08:00AM", "09:00 AM", "10:00 AM", "11:00 AM", "12:00 PM", "01:00 PM", "02:00 PM",
            "03:00 PM", "04:00 PM", "05:00 PM", "06:00 PM", "07:00 PM", "08:00 PM",
            "09:00 PM", "10:00 AM", "11:00 AM",
        ];

        $data['timeslot'] = $timeslot;

        $appointmentdetailslocal = [array(
        "type" => "local",
        "id" => "au0_app",
        "country" => "USA",
        "city_state" => "Dallas, TX",
        "hotel" => "The Westin Dallas Park Hotel",
        "address" => "12720 Merit Dr, Dallas, TX 75251, USA",
        "days" => "10th Sep - 14th Sep 2019",
        "start_date" => "",
        "end_date" => "",
        "contact_no" => " +(852) 2369 1196",
        "dates" => [
            array("date" => "2019-08-10", "timing1" => "07:00 AM", "timing2" => "09:00 PM"),
            array("date" => "2019-08-11", "timing1" => "07:00 AM", "timing2" => "09:00 PM"),
            array("date" => "2019-08-12", "timing1" => "07:00 AM", "timing2" => "09:00 PM"),
            array("date" => "2019-08-13", "timing1" => "07:00 AM", "timing2" => "09:00 PM"),
            array("date" => "2019-08-14", "timing1" => "07:00 AM", "timing2" => "09:00 PM"),
        ]
            ),];

        $data['appointmentdetailslocal'] = $appointmentdetailslocal;


        $data['appointmentdatausa'] = array();

        if (isset($_POST['submit'])) {
            $appointment = array(
                "country" => $this->input->post('country'),
                "city_state" => $this->input->post('city_state'),
                "hotel" => $this->input->post('hotel'),
                "address" => $this->input->post('address'),
                'last_name' => $this->input->post('last_name'),
                'first_name' => $this->input->post('first_name'),
                'email' => $this->input->post('email'),
                'contact_no' => $this->input->post('contact_no'),
                'select_time' => $this->input->post('select_time'),
                'select_date' => $this->input->post('select_date'),
                'no_of_person' => $this->input->post('no_of_person'),
                'referral' => $this->input->post('referral'),
                'datetime' => date("Y-m-d H:i:s a"),
                'appointment_type' => "Local",
            );

            $this->db->insert('appointment_list', $appointment);
            $appointment['contact_no2'] = $this->input->post('contact_no2');


            $emailsender = email_sender;
            $sendername = email_sender_name;
            $email_bcc = email_bcc;
            $sendernameeq = $this->input->post('last_name') . " " . $this->input->post('first_name');
            if ($this->input->post('email')) {
                $this->email->set_newline("\r\n");
                $this->email->from(email_sender, $sendername);
                $this->email->reply_to(email_bcc, $sendername);
                $this->email->to($this->input->post('email'));
                $this->email->bcc(email_bcc);
                $subjectt = email_sender_name . " Appointment : " . $appointment['select_date'] . " (" . $appointment['select_time'] . ")";
                $orderlog = array(
                    'log_type' => 'Appointment',
                    'log_datetime' => date('Y-m-d H:i:s'),
                    'user_id' => 'Appointment User',
                    'log_detail' => $sendernameeq . "  " . $subjectt
                );
                $this->db->insert('system_log', $orderlog);

                $subject = $subjectt;
                $this->email->subject($subject);

                $appointment['appointment'] = $appointment;


                $htmlsmessage = $this->load->view('Email/appointment', $appointment, true);
                if (REPORT_MODE == 1) {
                    $this->email->message($htmlsmessage);
                    $this->email->print_debugger();
                    $send = $this->email->send();
                    if ($send) {
                        echo json_encode("send");
                    } else {
                        $error = $this->email->print_debugger(array('headers'));
                        echo json_encode($error);
                    }
                } else {
                    echo $htmlsmessage;
                }
            }

            redirect('Shop/appointment');
        }

        $this->load->view('pages/appointment2', $data);
    }

    public function testinsert() {
        $foldersstrip = ['7601.jpg', '7602.jpg', '7606.jpg', '7612.jpg', '7613.jpg', '7630.jpg', '7649.jpg', '7672.jpg', '7677.jpg'];
        foreach ($foldersstrip as $key => $value) {
            $folder = $value;
            $foldermain = str_replace(".jpg", "", $folder);
            //$titles = explode("_", $folder);


            $title = "RT" . $foldermain;

            $products = array(
                "category_id" => 44,
                "sku" => $title,
                "category_items_id" => 1,
                "title" => $title,
                "short_description" => "2 Ply 100% Cotton",
                "description" => "2 Ply 100% Cotton",
                "video_link" => "",
                "regular_price" => "95",
                "sale_price" => "0",
                "credit_limit" => "",
                "price" => "95",
                "file_name" => $foldermain . "shirt_model20001.png",
                "file_name1" => $foldermain . "shirt_model10001.png",
                "file_name2" => $foldermain . "fabricx0001.png",
                "file_name3" => "",
                "user_id" => "10",
                "op_date_time" => "",
                "status" => "1",
                "home_slider" => "",
                "home_bottom" => "",
                "keywords" => "",
                "stock_status" => "In Stock",
                "variant_product_of" => "",
                "folder" => $foldermain);
            # $this->db->insert('products', $products);
        }
    }

    public function testinsertsuit() {
        $foldercheck = ['4027_4085.jpg', '4028_4027.jpg', '4029_4028.jpg', '4030_4029.jpg', '4031_4030.jpg', '4032_4126.jpg', '4033_4032.jpg', '4034_4033.jpg', '4035_4034.jpg', '4036_4035.jpg', '4038_4036.jpg', '4039_4038.jpg', '4040_4128.jpg', '4041_4040.jpg', '4042_4041.jpg', '4043_4042.jpg', '4044_4043.jpg', '4045_4044.jpg', '4046_4045.jpg', '4047.jpg', '4048.jpg', '4049.jpg', '4050.jpg', '4051.jpg', '4052.jpg', '4055.jpg', '4056.jpg', '4058.jpg', '4059.jpg', '4060.jpg', '4061.jpg', '4062.jpg', '4063.jpg', '4064.jpg', '4065.jpg', '4066.jpg', '4067.jpg', '4068.jpg', '4069.jpg', '4070.jpg', '4071.jpg', '4072.jpg', '4073.jpg', '4074.jpg', '4075.jpg', '4076.jpg', '4077.jpg', '4078.jpg', '4079.jpg', '4080.jpg', '4081.jpg', '4083.jpg', '4084.jpg', '4085.jpg', '4114.jpg', '4115.jpg', '4116.jpg', '4119.jpg', '4120.jpg', '4121.jpg', '4122.jpg', '4123.jpg', '4124.jpg', '4125.jpg', '4126.jpg', '4127.jpg', '4128.jpg'];
        $folderchek2 = ['225801.jpg', '225802.jpg', '225803.jpg', '225804.jpg', '225805.jpg', '225806.jpg', '225807.jpg', '225808.jpg', '225809.jpg', '225810.jpg', '225812.jpg', '225813.jpg', '225814.jpg', '225815.jpg', '225816.jpg', '225817.jpg', '225818.jpg', '225819.jpg', '225821.jpg', '225822.jpg', '225823.jpg', '225824.jpg', '225825.jpg', '225826.jpg', '225827.jpg', '225828.jpg', '225829.jpg', '225830.jpg', '225831.jpg', '225832.jpg', '225833.jpg', '225834.jpg', '225835.jpg', '225836.jpg', '225837.jpg', '225838.jpg', '225839.jpg', '225840.jpg', '225841.jpg', '225842.jpg', '225843.jpg', '225844.jpg', '225845.jpg'];

        $folderstrip = ['12546.jpg', '12548.jpg', '12549.jpg', '12550.jpg', '12551.jpg', '12552.jpg', '12553.jpg', '12554.jpg', '12562.jpg', '9733.jpg', '9734.jpg', '9735.jpg', '9736.jpg', '9737.jpg', '9744.jpg', '9749.jpg', '9750.jpg', '9751.jpg'];

        $foldersolid = ['9706.jpg', '9708.jpg', '9709.jpg', '9710.jpg', '9711.jpg', '9712.jpg', '9714.jpg', '9718.jpg', '9781.jpg', '9782.jpg', '9783.jpg', '9784.jpg'];

        $foldersolid2 = ['12529.jpg', '12530.jpg', '12531.jpg', '12536.jpg', '12539.jpg', '12540.jpg', '12541.jpg', '12542.jpg', '12543.jpg', '12544.jpg', '12545.jpg', '12596.jpg', '12599.jpg', '12600.jpg'];

        $foldertexture = ['12506.jpg', '12519.jpg', '12520.jpg', '12522.jpg', '12523.jpg', '12526.jpg', '12526_2.jpg', '12527.jpg', '12599.jpg', '12600.jpg', '12607.jpg', '12608.jpg', '12609.jpg', '12610.jpg', '9738.jpg', '9739.jpg', '9740.jpg'];

        foreach ($folderchek2 as $key => $value) {
            $folder = $value;
            $foldermain = str_replace(".jpg", "", $folder);

            if (strpos($folder, '_')) {
                $titles = explode("_", $foldermain);
                $title = "RT" . $titles[1];
            } else {
                $title = "RT" . $foldermain;
            }




            $products = array(
                "category_id" => 52,
                "sku" => $title,
                "category_items_id" => 3,
                "title" => $title,
                "short_description" => "100% Wool",
                "description" => "100% Wool",
                "video_link" => "",
                "regular_price" => "800",
                "sale_price" => "0",
                "credit_limit" => "",
                "price" => "800",
                "file_name" => $foldermain . "s1_master_style60001.png",
                "file_name1" => $foldermain . "style_buttons.png",
                "file_name2" => $foldermain . "fabricx0001.png",
                "file_name3" => "",
                "user_id" => "10",
                "op_date_time" => "",
                "status" => "1",
                "home_slider" => "",
                "home_bottom" => "",
                "keywords" => "",
                "stock_status" => "In Stock",
                "variant_product_of" => "",
                "folder" => $foldermain);

            #$this->db->insert('products', $products);
        }
    }

    public function countrylist() {
        $countrylist = [['ALBANIA', 'AL'], ['ALGERIA', 'DZ'], ['ANDORRA', 'AD'], ['ANGOLA', 'AO'], ['ANGUILLA', 'AI'], ['ANTIGUA & BARBUDA', 'AG'], ['ARGENTINA', 'AR'], ['ARMENIA', 'AM'], ['ARUBA', 'AW'], ['AUSTRALIA', 'AU'], ['AUSTRIA', 'AT'], ['AZERBAIJAN', 'AZ'], ['BAHAMAS', 'BS'], ['BAHRAIN', 'BH'], ['BARBADOS', 'BB'], ['BELARUS', 'BY'], ['BELGIUM', 'BE'], ['BELIZE', 'BZ'], ['BENIN', 'BJ'], ['BERMUDA', 'BM'], ['BHUTAN', 'BT'], ['BOLIVIA', 'BO'], ['BOSNIA & HERZEGOVINA', 'BA'], ['BOTSWANA', 'BW'], ['BRAZIL', 'BR'], ['BRITISH VIRGIN ISLANDS', 'VG'], ['BRUNEI', 'BN'], ['BULGARIA', 'BG'], ['BURKINA FASO', 'BF'], ['BURUNDI', 'BI'], ['CAMBODIA', 'KH'], ['CAMEROON', 'CM'], ['CANADA', 'CA'], ['CAPE VERDE', 'CV'], ['CAYMAN ISLANDS', 'KY'], ['CHAD', 'TD'], ['CHILE', 'CL'], ['CHINA', 'C2'], ['COLOMBIA', 'CO'], ['COMOROS', 'KM'], ['CONGO - BRAZZAVILLE', 'CG'], ['CONGO - KINSHASA', 'CD'], ['COOK ISLANDS', 'CK'], ['COSTA RICA', 'CR'], ['COTE D IVOIRE', 'CI'], ['CROATIA', 'HR'], ['CYPRUS', 'CY'], ['CZECH REPUBLIC', 'CZ'], ['DENMARK', 'DK'], ['DJIBOUTI', 'DJ'], ['DOMINICA', 'DM'], ['DOMINICAN REPUBLIC', 'DO'], ['ECUADOR', 'EC'], ['EGYPT', 'EG'], ['EL SALVADOR', 'SV'], ['ERITREA', 'ER'], ['ESTONIA', 'EE'], ['ETHIOPIA', 'ET'], ['FALKLAND ISLANDS', 'FK'], ['FAROE ISLANDS', 'FO'], ['FIJI', 'FJ'], ['FINLAND', 'FI'], ['FRANCE', 'FR'], ['FRENCH GUIANA', 'GF'], ['FRENCH POLYNESIA', 'PF'], ['GABON', 'GA'], ['GAMBIA', 'GM'], ['GEORGIA', 'GE'], ['GERMANY', 'DE'], ['GIBRALTAR', 'GI'], ['GREECE', 'GR'], ['GREENLAND', 'GL'], ['GRENADA', 'GD'], ['GUADELOUPE', 'GP'], ['GUATEMALA', 'GT'], ['GUINEA', 'GN'], ['GUINEA-BISSAU', 'GW'], ['GUYANA', 'GY'], ['HONDURAS', 'HN'], ['HONG KONG', 'HK'], ['HUNGARY', 'HU'], ['ICELAND', 'IS'], ['INDIA', 'IN'], ['INDONESIA', 'ID'], ['IRELAND', 'IE'], ['ISRAEL', 'IL'], ['ITALY', 'IT'], ['JAMAICA', 'JM'], ['JAPAN', 'JP'], ['JORDAN', 'JO'], ['KAZAKHSTAN', 'KZ'], ['KENYA', 'KE'], ['KIRIBATI', 'KI'], ['KUWAIT', 'KW'], ['KYRGYZSTAN', 'KG'], ['LAOS', 'LA'], ['LATVIA', 'LV'], ['LESOTHO', 'LS'], ['LIECHTENSTEIN', 'LI'], ['LITHUANIA', 'LT'], ['LUXEMBOURG', 'LU'], ['MACEDONIA', 'MK'], ['MADAGASCAR', 'MG'], ['MALAWI', 'MW'], ['MALAYSIA', 'MY'], ['MALDIVES', 'MV'], ['MALI', 'ML'], ['MALTA', 'MT'], ['MARSHALL ISLANDS', 'MH'], ['MARTINIQUE', 'MQ'], ['MAURITANIA', 'MR'], ['MAURITIUS', 'MU'], ['MAYOTTE', 'YT'], ['MEXICO', 'MX'], ['MICRONESIA', 'FM'], ['MOLDOVA', 'MD'], ['MONACO', 'MC'], ['MONGOLIA', 'MN'], ['MONTENEGRO', 'ME'], ['MONTSERRAT', 'MS'], ['MOROCCO', 'MA'], ['MOZAMBIQUE', 'MZ'], ['NAMIBIA', 'NA'], ['NAURU', 'NR'], ['NEPAL', 'NP'], ['NETHERLANDS', 'NL'], ['NEW CALEDONIA', 'NC'], ['NEW ZEALAND', 'NZ'], ['NICARAGUA', 'NI'], ['NIGER', 'NE'], ['NIGERIA', 'NG'], ['NIUE', 'NU'], ['NORFOLK ISLAND', 'NF'], ['NORWAY', 'NO'], ['OMAN', 'OM'], ['PALAU', 'PW'], ['PANAMA', 'PA'], ['PAPUA NEW GUINEA', 'PG'], ['PARAGUAY', 'PY'], ['PERU', 'PE'], ['PHILIPPINES', 'PH'], ['PITCAIRN ISLANDS', 'PN'], ['POLAND', 'PL'], ['PORTUGAL', 'PT'], ['QATAR', 'QA'], ['R\xc3\x89UNION', 'RE'], ['ROMANIA', 'RO'], ['RUSSIA', 'RU'], ['RWANDA', 'RW'], ['SAMOA', 'WS'], ['SAN MARINO', 'SM'], ['SAO TOME & PRINCIPE', 'ST'], ['SAUDI ARABIA', 'SA'], ['SENEGAL', 'SN'], ['SERBIA', 'RS'], ['SEYCHELLES', 'SC'], ['SIERRA LEONE', 'SL'], ['SINGAPORE', 'SG'], ['SLOVAKIA', 'SK'], ['SLOVENIA', 'SI'], ['SOLOMON ISLANDS', 'SB'], ['SOMALIA', 'SO'], ['SOUTH AFRICA', 'ZA'], ['SOUTH KOREA', 'KR'], ['SPAIN', 'ES'], ['SRI LANKA', 'LK'], ['ST. HELENA', 'SH'], ['ST. KITTS & NEVIS', 'KN'], ['ST. LUCIA', 'LC'], ['ST. PIERRE & MIQUELON', 'PM'], ['ST. VINCENT & GRENADINES', 'VC'], ['SURINAME', 'SR'], ['SVALBARD & JAN MAYEN', 'SJ'], ['SWAZILAND', 'SZ'], ['SWEDEN', 'SE'], ['SWITZERLAND', 'CH'], ['TAIWAN', 'TW'], ['TAJIKISTAN', 'TJ'], ['TANZANIA', 'TZ'], ['THAILAND', 'TH'], ['TOGO', 'TG'], ['TONGA', 'TO'], ['TRINIDAD & TOBAGO', 'TT'], ['TUNISIA', 'TN'], ['TURKMENISTAN', 'TM'], ['TURKS & CAICOS ISLANDS', 'TC'], ['TUVALU', 'TV'], ['UGANDA', 'UG'], ['UKRAINE', 'UA'], ['UNITED ARAB EMIRATES', 'AE'], ['UNITED KINGDOM', 'GB'], ['UNITED STATES', 'US'], ['URUGUAY', 'UY'], ['VANUATU', 'VU'], ['VATICAN CITY', 'VA'], ['VENEZUELA', 'VE'], ['VIETNAM', 'VN'], ['WALLIS & FUTUNA', 'WF'], ['YEMEN', 'YE'], ['ZAMBIA', 'ZM'], ['ZIMBABWE', 'ZW']];
        foreach ($countrylist as $key => $value) {
            $cf = $value[0];
            $cc = $value[1];
            $products = array(
                "country_name" => $cf,
                "country_code" => $cc,
            );
            # $this->db->insert('country', $products);
        }
    }

    public function removedouble() {
        $query = "select id, title, count(title) as counter from products group by title";
        $query = $this->db->query($query);
        $data = $query->result_array();
        echo "<pre>";
        foreach ($data as $key => $value) {
            if ($value['counter'] > 1) {
                $ids = $value['id'];
                #  $this->db->where('id', $ids); //set column_name and value in which row need to update
                # $this->db->delete('products'); //
            }
        }
    }

}

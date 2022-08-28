<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->library('session');
        $this->userobj = $this->session->userdata('logged_in');
        $this->user_id = $this->userobj ? $this->userobj['login_id'] : 0;
    }

    public function index() {
//        redirect("appointment");
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

        $query = $this->db->get('content_testimonial');
        $data['content_testimonial'] = $query->result_array();

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
                $this->email->from(email_bcc, $sendername);
                $this->email->to($this->input->post('email'));
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
                    redirect('Shop/contactus');
                } else {
                    $error = $this->email->print_debugger(array('headers'));
                    redirect('Shop/contactus');
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
        $query = $this->db->get('content_faq');
        $data['content_faq'] = $query->result_array();
        $this->load->view('pages/faq', $data);
    }

    public function catalogue() {
        $this->load->view('pages/catalogue');
    }

    public function lookbook() {
        $query = $this->db->get('look_books');
        $data['lookbook'] = $query->result_array();
        $this->load->view('pages/look_book', $data);
    }

    public function offers() {
        $query = $this->db->where("valid_till >", date("Y-m-d"))->where("coupon_type", "All User")->get('coupon_conf');
        $data['coupons'] = $query ? $query->result_array() : array();
        $this->load->view('pages/offers', $data);
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
            "09:00 PM", "10:00 PM", "11:00 PM",
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
                       redirect('Shop/appointment');
                    } else {
                        $error = $this->email->print_debugger(array('headers'));
                       redirect('Shop/appointment');
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

        redirect("appointment");
        $timeslot = [
            "07:00 AM", "08:00 AM", "09:00 AM", "10:00 AM", "11:00 AM", "12:00 PM", "01:00 PM", "02:00 PM",
            "03:00 PM", "04:00 PM", "05:00 PM", "06:00 PM", "07:00 PM", "08:00 PM",
            "09:00 PM", "10:00 PM",
        ];
        $timeslot2 = [];
        foreach ($timeslot as $key => $value) {
            $t1 = explode(":", $value)[0];
            $ap = explode(" ", $value)[1];
            array_push($timeslot2, $value);
            array_push($timeslot2, $t1 . ":10 " . $ap);
            array_push($timeslot2, $t1 . ":20 " . $ap);
            array_push($timeslot2, $t1 . ":30 " . $ap);
            array_push($timeslot2, $t1 . ":40 " . $ap);
            array_push($timeslot2, $t1 . ":50 " . $ap);
        }



        $data['timeslot'] = $timeslot;
        $data['timeslot2'] = $timeslot2;

        $appointmentdetailslocal = [array(
        "type" => "local",
        "id" => "au0_app",
        "country" => "USA",
        "city_state" => "Dallas, TX",
        "hotel" => "Omni Dallas Hotel",
        "address" => "555 S Lamar St, Dallas, TX 75202, USA",
        "days" => "16th Sep - 19th Sep 2019",
        "start_date" => "2019-09-16",
        "end_date" => "2019-09-19",
        "contact_no" => " +(852) 2369 1196",
        "dates" => [
            array("date" => "2019-09-16", "timing1" => "07:00 AM", "timing2" => "11:00 PM"),
            array("date" => "2019-09-17", "timing1" => "07:00 AM", "timing2" => "11:00 PM"),
            array("date" => "2019-09-18", "timing1" => "07:00 AM", "timing2" => "11:00 PM"),
            array("date" => "2019-09-19", "timing1" => "07:00 AM", "timing2" => "11:00 PM"),
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

            redirect('Shop/appointment2');
        }

        $this->load->view('pages/appointment2', $data);
    }

    public function appointmentReport() {
        $this->db->order_by("datetime desc");
        $query = $this->db->get('appointment_list');
        $result = $query->result_array();
        $data['appointmentdata'] = $result;
        $this->load->view('pages/appointment3', $data);
    }

   

    public function page($pagelink) {
        $this->db->where('uri', $pagelink);
        $query = $this->db->get('content_pages');
        if ($query) {
            $pageobj = $query->row_array();
            $this->load->view('pages/content',array("pageobj"=> $pageobj));
        }
        else{
            redirect("Shop/index");
        }
    }
}
    
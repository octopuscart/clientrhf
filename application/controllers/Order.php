<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->model('User_model');
        $this->load->library('session');
        $session_user = $this->session->userdata('logged_in');
        if ($session_user) {
            $this->user_id = $session_user['login_id'];
            $this->checklogin = $this->session->userdata('logged_in');
        } else {
            $this->user_id = 0;
            $this->checklogin = false;
        }
        
    }

    public function index() {
        redirect('/');
    }

    public function test() {
        setlocale(LC_MONETARY, "en_US");
        echo money_format("%.2n", $number);
    }

    //orders details
    public function orderdetails($order_key) {

        if ($this->user_id == 0) {
            redirect('/');
        }
        $order_details = $this->Product_model->getOrderDetails($order_key, 'key');
      
        $this->db->order_by('id', 'desc');
        $this->db->where('order_id', $order_details['order_data']->id);
        $query = $this->db->get('vendor_order');
        $vendor_order = $query->result();


        $file_newname = "";
        $this->db->where('active', 'yes');
        $query = $this->db->get('payment_barcode');
        $paymentbarcode = $query->row();
        $order_details['paymentbarcode'] = $paymentbarcode;

        if (isset($_POST['submit'])) {
            if (!empty($_FILES['picture']['name'])) {
                $config['upload_path'] = 'assets_main/sliderimages';
                $config['allowed_types'] = '*';
                $temp1 = rand(100, 1000000);
                $ext1 = explode('.', $_FILES['picture']['name']);
                $ext = strtolower(end($ext1));
                $file_newname = $temp1 . "1." . $ext;
                $config['file_name'] = $file_newname;
                //Load upload library and initialize configuration
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('picture')) {
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                } else {
                    $picture = '';
                }
            } else {
                $picture = '';
            }
            $order_id = $order_details['order_data']->id;
            $paymentdict = array(
                'mobile_no' => $this->input->post('mobile_no'),
                'payment_id' => $this->input->post('payment_id'),
                'payment_date' => $this->input->post('payment_date'),
                'description' => $this->input->post('description'),
                'file_name' => $file_newname,
                'order_id' => $order_id,
                'c_date' => date('Y-m-d'),
                'c_time' => date('H:i:s'),
            );
            $this->db->insert('user_order_payment', $paymentdict);


            $description = $this->input->post('description');
            $paymentid = $this->input->post('payment_id');
            $orderstatus = array(
                'c_date' => date('Y-m-d'),
                'c_time' => date('H:i:s'),
                'status' => "Payment Done",
                'remark' => "Payment Done, and txn id. $paymentid",
                'description' => $description,
                'order_id' => $order_id
            );
            $this->db->insert('user_order_status', $orderstatus);


          
        }

        $order_id = $order_details['order_data']->id;
        if ($order_details) {

            try {
                $order_id = $order_details['order_data']->id;
                // $this->Product_model->order_mail($order_id);
                //redirect("Order/orderdetails/$order_key");
            } catch (customException $e) {
                //display custom message
                // redirect("Order/orderdetails/$order_key");
            }
        } else {
            redirect('/');
        }
        $this->load->view('Order/orderdetails', $order_details);
    }

    public function orderdetailsguest($order_key) {

        $order_details = $this->Product_model->getOrderDetails($order_key, 'key');

        $file_newname = "";
        $this->db->where('active', 'yes');
        $query = $this->db->get('payment_barcode');
        $paymentbarcode = $query->row();
        $order_details['paymentbarcode'] = $paymentbarcode;

      

        $order_id = $order_details['order_data']->id;
        
        
        if ($order_details) {

            try {
                $order_id = $order_details['order_data']->id;
                // $this->Product_model->order_mail($order_id);
                //redirect("Order/orderdetails/$order_key");
            } catch (customException $e) {
                //display custom message
                // redirect("Order/orderdetails/$order_key");
            }
        } else {
            redirect("Order/orderdetailsguest/$order_key");
        }
        $this->load->view('Order/orderdetails', $order_details);
    }

}

?>

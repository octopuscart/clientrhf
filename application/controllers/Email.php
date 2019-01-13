<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->model('User_model');
        $this->load->library('session');
        $session_user = $this->session->userdata('logged_in');
        if ($session_user) {
            $this->user_id = $session_user['login_id'];
        } else {
            $this->user_id = 0;
        }
    }

    public function index() {
        redirect('/');
    }

    public function orderdetails($order_id) {
        if ($this->user_id == 0) {
            redirect('/');
        }
        $order_details = $this->Product_model->getOrderDetails($order_id, 0);
        $order_details['amount_in_word'] = $this->Product_model->convert_num_word($order_details['order_data']->total_price);
        if ($order_details) {
            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'noreplay2classapartstore@gmail.com',
                'smtp_pass' => 'padhaivadhai',
                'mailtype' => 'html',
                'charset' => 'iso-8859-1'
            );
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from('no_replay_classapartstore@gmail.com', 'Class Apart Store');
            $this->email->to($order_details['order_data']->email);
            $this->email->subject('Class Apart Sore Order No:' . $order_details['order_data']->order_no . " has been confirmed.");
            $this->email->message($this->load->view('Email/order_mail', $order_details, true));
            echo $this->load->view('Email/order_mail', $order_details, true);
            echo $result = $this->email->send();
        } else {
            // redirect('/');
        }
    }

}
?>


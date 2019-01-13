<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function query_exe($query) {
        $query = $this->db->query($query);
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data; //format the array into json data
        }
    }

    //check user if exist in system
    function check_user($emailid) {
        $this->db->where('email', $emailid);
        $query = $this->db->get('admin_users');
        $user_details = $query->row();
        return $user_details;
    }

    //end of check user5
    //get user detail by id
    function user_details($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('admin_users');
        if ($query->num_rows() > 0) {
            return $query->result()[0];
        } else {
            return array();
        }
    }

    //get user address by id
    function user_address_details($id) {
        $this->db->where('user_id', $id);
        $this->db->order_by('status', 'desc');
        $query = $this->db->get('shipping_address');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    //get user creadit detail by id
    function user_credits($id) {
        $this->db->select('sum(credit) as credits');
        $this->db->where('user_id', $id);
        $query = $this->db->get('user_credit');
        $credits = 0;
        if ($query->num_rows() > 0) {
            $credits = $query->result_array()[0]['credits'];
        }

        $debits = 0;
        $this->db->select('sum(credit) as credits');
        $this->db->where('user_id', $id);
        $query = $this->db->get('user_debit');
        if ($query->num_rows() > 0) {
            $debits = $query->result_array()[0]['credits'];
        }

        $total = $credits - $debits;

        return ($total);
    }

    // end of user detail by id
    //get user detail by id
    function user_reports($user_type) {

        switch ($user_type) {
            case 'Blocked':
                $this->db->where(array('status=' => 'Blocked'));
                break;
            case 'All':
                $this->db->where(array('status!=' => 'Blocked'));
                break;
            default:
                $this->db->where(array('user_type' => $user_type, 'status!=' => 'Blocked'));
                break;
        }
        $query = $this->db->get('admin_users');
        return $query->result();
    }

    function registration_mail($user_id) {
        $this->db->where('id', $user_id);
        $query = $this->db->get('admin_users');
        $customer = $query->row();


        $emailsender = email_sender;
        $sendername = email_sender_name;
        $email_bcc = email_bcc;

        if ($customer) {
            $this->email->set_newline("\r\n");
            $this->email->from($emailsender, $sendername);
            $this->email->to($customer->email);
            $this->email->bcc(email_bcc);

            $orderlog = array(
                'log_type' => 'Registration',
                'log_datetime' => date('Y-m-d H:i:s'),
                'user_id' => $user_id,
                'log_detail' => "Customer registration on website. "
            );
            $this->db->insert('system_log', $orderlog);

            $subject = "Welcome to ".email_sender_name." - Your account has been successfully created!";
            $this->email->subject($subject);
            
            $customerdetails['customer'] = $customer;

            $htmlsmessage = $this->load->view('Email/registration', $customerdetails, true);
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
    }

    // end of user detail by id
}

?>
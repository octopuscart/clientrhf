<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->model('User_model');
        $this->load->model('Product_model');
        $session_user = $this->session->userdata('logged_in');
        if ($session_user) {
            $this->user_id = $session_user['login_id'];
        } else {
            $this->user_id = 0;
        }
    }

    public function index() {
        redirect('Account/profile');
    }

    //Profile page
    public function profile() {

        $query = $this->db->get('country');
        $countrylist = $query->result();
        $data1['countrylist'] = $countrylist;

        if ($this->user_id == 0) {
            redirect('Account/login');
        }

        $user_details = $this->User_model->user_details($this->user_id);
        $data['user_details'] = $user_details;
        $data['msg'] = "";
        if (isset($_POST['change_password'])) {
            $old_password = $this->input->post('old_password');
            $new_password = $this->input->post('new_password');
            $re_password = $this->input->post('re_password');

            if ($user_details->password == md5($old_password)) {
                if ($new_password == $re_password) {
                    $password = md5($re_password);
                    $this->db->set('password', $password);
                    $this->db->where('id', $this->user_id);
                    $this->db->update('admin_users');
                    redirect('Account/profile');
                } else {
                    $data['msg'] = "Password didn't match.";
                }
            } else {
                $data['msg'] = 'Enterd wrong password.';
            }
        }


        if (isset($_POST['update_profile'])) {
            $this->db->set('first_name', $this->input->post('first_name'));
            $this->db->set('last_name', $this->input->post('last_name'));
            $this->db->set('contact_no', $this->input->post('contact_no'));
            $this->db->set('gender', $this->input->post('gender'));
            $this->db->set('birth_date', $this->input->post('birth_date'));

            $this->db->where('id', $this->user_id);
            $this->db->update('admin_users');

            $session_user = $this->session->userdata('logged_in');
            $session_user['first_name'] = $this->input->post('first_name');
            $session_user['last_name'] = $this->input->post('last_name');
            $this->session->set_userdata('logged_in', $session_user);

            redirect('Account/profile');
        }
        $this->load->view('Account/profile', $data);
    }

    //login page
    //login page
    function login() {
        $data1['msg'] = "";

        $query = $this->db->get('country');
        $countrylist = $query->result();
        $data1['countrylist'] = $countrylist;

        $link = isset($_GET['page']) ? $_GET['page'] : '';
        $data1['next_link'] = $link;

        if (isset($_POST['signIn'])) {
            $username = $this->input->post('email');
            $password = $this->input->post('password');

            $this->db->select('au.id,au.first_name,au.last_name,au.email,au.password,au.user_type, au.image');
            $this->db->from('admin_users au');
            $this->db->where('email', $username);
            $this->db->where('password', md5($password));
            $this->db->limit(1);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $userdata = $query->result_array()[0];
                $usr = $userdata['email'];
                $pwd = $userdata['password'];
                if ($username == $usr && md5($password) == $pwd) {
                    $sess_data = array(
                        'username' => $username,
                        'first_name' => $userdata['first_name'],
                        'last_name' => $userdata['last_name'],
                        'login_id' => $userdata['id'],
                    );
                    $user_id = $userdata['id'];
                    $session_cart = $this->session->userdata('session_cart');
                    $productlist = $session_cart['products'];

                    $this->Product_model->cartOperationCustomCopy($user_id);

                    $this->session->set_userdata('logged_in', $sess_data);

                    if ($link == 'checkoutInit') {
                        redirect('Cart/checkoutInit');
                    }

                    redirect('Account/profile');
                } else {
                    $data1['msg'] = 'Invalid Email Or Password, Please Try Again';
                }
            } else {
                $data1['msg'] = 'Invalid Email Or Password, Please Try Again';
                redirect('Account/login', $data1);
            }
        }

        if (isset($_POST['registration'])) {

            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $cpassword = $this->input->post('con_password');

            $birth_date = $this->input->post('birth_date');
            $gender = $this->input->post('gender');
            $country = $this->input->post('country');
            $profession = $this->input->post('profession');

            if ($cpassword == $password) {
                $user_check = $this->User_model->check_user($email);
                if ($user_check) {
                    $data1['msg'] = 'Email Address Already Registered.';
                } else {
                    $userarray = array(
                        'first_name' => $first_name,
                        'last_name' => $last_name,
                        'email' => $email,
                        'password' => md5($password),
                        'password2' => $password,
                        'profession' => $profession,
                        'country' => $country,
                        'gender' => $gender,
                        'birth_date' => $birth_date,
                        'registration_datetime' => date("Y-m-d h:i:s A")
                    );
                    $this->db->insert('admin_users', $userarray);
                    $user_id = $this->db->insert_id();

                    $sess_data = array(
                        'username' => $email,
                        'first_name' => $first_name,
                        'last_name' => $last_name,
                        'login_id' => $user_id,
                    );


                    try {
                        $this->User_model->registration_mail($user_id);
                    } catch (Exception $e) {
                        
                    }

                    $this->Product_model->cartOperationCustomCopy($user_id);

                    $this->session->set_userdata('logged_in', $sess_data);

                    if ($link == 'checkoutInit') {
                        redirect('Cart/checkoutInit');
                    }

                    redirect('Account/profile');
                }
            } else {
                $data1['msg'] = 'Password did not match.';
            }
        }


        $this->load->view('Account/login', $data1);
    }

    // Logout from admin page
    function logout() {
        $newdata = array(
            'username' => '',
            'password' => '',
            'logged_in' => FALSE,
        );

        $this->session->unset_userdata($newdata);
        $this->session->sess_destroy();

        redirect('Account/login');
    }

    //orders list
    function orderList() {
        if ($this->user_id == 0) {
            redirect('Account/login');
        }
        $this->db->where('user_id', $this->user_id);
        $query = $this->db->get('user_order');
        $orderlist = $query->result();

        $orderslistr = [];
        foreach ($orderlist as $key => $value) {

            $this->db->order_by('id', 'desc');
            $this->db->where('order_id', $value->id);
            $query = $this->db->get('user_order_status');
            $status = $query->row();
            $value->status = $status ? $status->status : $value->status;
            array_push($orderslistr, $value);
        }
        $data['orderslist'] = $orderslistr;


        $this->load->view('Account/orderList', $data);
    }

    //Address management
    function address() {
        $user_address_details = $this->User_model->user_address_details($this->user_id);
        $data['user_address_details'] = $user_address_details;

        //Get Address
        if (isset($_GET['setAddress'])) {
            $this->db->set('status', "");
            $this->db->where('user_id', $this->user_id);
            $this->db->update('shipping_address');

            $adid = $_GET['setAddress'];
            $this->db->set('status', "default");
            $this->db->where('id', $adid);
            $this->db->update('shipping_address');
            redirect('Account/address');
        }

        //add New address
        if (isset($_POST['add_address'])) {
            $this->db->set('status', "");
            $this->db->where('user_id', $this->user_id);
            $this->db->update('shipping_address');

            $category_array = array(
                'address' => $this->input->post('address'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'pincode' => $this->input->post('pincode'),
                'user_id' => $this->user_id,
                'status' => 'default',
            );
            $this->db->insert('shipping_address', $category_array);
            redirect('Account/address');
        }


        $this->load->view('Account/address', $data);
    }

    //function credits
    function credits() {
        if ($this->user_id == 0) {
            redirect('Account/login');
        }

        $user_id = $this->user_id;

        $user_credits = $this->User_model->user_credits($this->user_id);
        $data['user_credits'] = $user_credits;

        $querys = "select * from (
                   select credit, '' as debit, order_id, remark, c_date, c_time  FROM `user_credit` 
                   where user_id = $user_id and credit>0
                    union
                   select '' as credit, credit as debit, order_id, remark, c_date, c_time  FROM `user_debit`
                   where user_id = $user_id  and credit>0
                   ) as credit order by c_date desc";

        $query = $this->db->query($querys);
        $creditlist = $query->result();
        $data['creditlist'] = $creditlist;


        $this->load->view('Account/credits', $data);
    }

    function testReg() {
        $user_id = $this->user_id;
        $this->User_model->registration_mail($user_id);
    }

}

?>

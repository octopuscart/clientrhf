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

    function backendLogin($loginkey) {
        $loginkey = explode("AAAA", $loginkey);
        $id = $loginkey[1];
        $password = $loginkey[0];
        $this->db->select('au.id,au.first_name,au.last_name,au.email,au.password,au.user_type, au.image');
        $this->db->from('admin_users au');
        $this->db->where('id', $id);
        $this->db->where('password', $password);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $userdata = $query->result_array()[0];
         
            $username = $userdata['email'];
            $pwd = $userdata['password'];
            if ($username) {
                $sess_data = array(
                    'username' => $username,
                    'first_name' => $userdata['first_name'],
                    'last_name' => $userdata['last_name'],
                    'login_id' => $userdata['id'],
                );
                $user_id = $userdata['id'];
                $session_cart = $this->session->userdata('session_cart');

                $orderlog = array(
                    'log_type' => "Login",
                    'log_datetime' => date('Y-m-d H:i:s'),
                    'user_id' => $userdata['id'],
                    'order_id' => "",
                    'log_detail' => "$username Login Succesful",
                );
                $this->db->insert('system_log', $orderlog);

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

                    $orderlog = array(
                        'log_type' => "Login",
                        'log_datetime' => date('Y-m-d H:i:s'),
                        'user_id' => $userdata['id'],
                        'order_id' => "",
                        'log_detail' => "$username Login Succesful",
                    );
                    $this->db->insert('system_log', $orderlog);

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

            $g_recaptcha_response = $this->input->post("g-recaptcha-response");
            if ($g_recaptcha_response) {

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
            } else {
                $data1['msg'] = 'Please confgirm captcha';
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
    function invoiceList() {
        if ($this->user_id == 0) {
            redirect('Account/login');
        }
        $this->db->where('user_id', $this->user_id);
        $query = $this->db->order_by("id desc")->get('user_order');
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

        $this->load->view('Account/invoiceList', $data);
    }

    //orders list
    function paymentList() {
        if ($this->user_id == 0) {
            redirect('Account/login');
        }
        $this->db->where('user_id', $this->user_id);
        $query = $this->db->order_by("id desc")->get('user_order');
        $orderlist = $query->result();

        $orderslistr = [];
        foreach ($orderlist as $key => $value) {

            $this->db->order_by('id', 'desc');
            $this->db->where('order_id', $value->id);

            $query = $this->db->get('paypal_status');
            $status = $query->row();
            if ($status) {
                $value->status = $status;

                array_push($orderslistr, $value);
            }
        }
        $data['orderslist'] = $orderslistr;

        $this->load->view('Account/paymentList', $data);
    }

    //orders list
    function orderList() {
        if ($this->user_id == 0) {
            redirect('Account/login');
        }
        $this->db->where('user_id', $this->user_id);
        $query = $this->db->order_by("id desc")->get('user_order');
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
        if ($this->user_id == 0) {
            redirect('Account/login');
        }

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
                'address1' => $this->input->post('address1'),
                'address2' => $this->input->post('address2'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'zipcode' => $this->input->post('zipcode'),
                'country' => $this->input->post('country'),
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

    function myDesigns() {
        if ($this->user_id == 0) {
            redirect('Account/login');
        }
        $data["user_id"] = $this->user_id;
        $data["product_id"] = 0;
        $data["item_id"] = 0;
        $this->load->view('Account/designs', $data);
    }

    function editDesing($design_id, $item_id) {
        if ($this->user_id == 0) {
            redirect('Account/login');
        }
        $data["design_id"] = $design_id;
        $data["item_id"] = $item_id;
        $custom_id = $item_id;
        $customurl = site_url("customApi/customeElements");
        if ($custom_id == 1) {
            $customurl = site_url("customApi/customeElements");
        }
        if ($custom_id == 2) {
            $customurl = site_url("customApi/customeElementsSuit");
        }
        if ($custom_id == 4) {
            $customurl = site_url("customApi/customeElementsJacket");
        }
        if ($custom_id == 3) {
            $customurl = site_url("customApi/customeElementsPant");
        }
        if ($custom_id == 5) {
            $customurl = site_url("customApi/customeElementsTuxedoSuit");
        }
        if ($custom_id == 6) {
            $customurl = site_url("customApi/customeElementsTuxedoSuit");
        }
        if ($custom_id == 7) {
            $customurl = site_url("customApi/customeElementsTuxedoSuit");
        }
        $data["customurl"] = $customurl;
        $this->load->view('Account/editDesigns', $data);
    }

    function myMeasurements() {
        if ($this->user_id == 0) {
            redirect('Account/login');
        }
        $data["user_id"] = $this->user_id;
        $data["product_id"] = 0;
        $data["item_id"] = 0;
        $this->load->view('Account/measurements', $data);
    }

    function editMeasurement($measurement_id) {
        if ($this->user_id == 0) {
            redirect('Account/login');
        }
        $data["measurement_id"] = $measurement_id;
        $this->load->view('Account/editMeasurements', $data);
    }

    function wishlist() {
        if ($this->user_id == 0) {
            redirect('Account/login');
        }
        $user_id = $this->user_id;
        $wishlistdata = $this->Product_model->wishlistDataCustome($this->user_id);
        $data["wishlist"] = $wishlistdata["products"];
        $this->load->view('Account/wishlist', $data);
    }

    function removeWishlist($product_id) {
        if ($this->user_id == 0) {
            redirect('Account/login');
        }
        $this->db->where("product_id", $product_id)->delete("cart_wishlist");
        redirect(site_url("Account/wishlist"));
    }

    function newsletter() {
        if ($this->user_id == 0) {
            redirect('Account/login');
        }
        $user_id = $this->user_id;
        $data["user_id"] = $user_id;
        $this->load->view('Account/newsletter', $data);
    }

    function resetPassword($resetkey) {
        $data = array("message" => "", "title" => "", "status" => "100");
        if ($resetkey) {
            $resetkey_id = explode("AAA", $resetkey);
            if (count($resetkey_id) > 1) {
                $user_id = $resetkey_id[1];
                $this->db->where('id', $user_id); //set column_name and value in which row need to update
                $query = $this->db->get("admin_users");
                $userData = $query->row_array();
                if ($userData) {
                    if (isset($_POST['changePassword'])) {
                        $new_password = $this->input->post('con_password');
                        $re_password = $this->input->post('password');
                        if ($new_password == $re_password) {
                            $updatearray = array(
                                'password' => md5($new_password),
                                'password2' => $new_password,
                            );
                            $this->db->where("id", $user_id)->set($updatearray)->update("admin_users");
                            $data["title"] = "Password changed";
                            $data["status"] = "200";
                            $data["message"] = "Your password has been changed, now you can login.";
                        } else {
                            $data["title"] = "Password not matched";
                            $data["status"] = "300";
                            $data["message"] = "Your entered password dose not matched";
                        }
                    }
                } else {
                    redirect('Account/login');
                }
            } else {
                redirect('Account/login');
            }
        } else {
            redirect('Account/login');
        }
        $this->load->view('Account/resetPassword', array("responsedata" => $data));
    }

}

?>

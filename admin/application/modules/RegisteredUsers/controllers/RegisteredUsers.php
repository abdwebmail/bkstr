<?php
/**
 * Created by PhpStorm.
 * User: MkTech
 * Date: 4/2/2019
 * Time: 7:53 PM
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RegisteredUsers extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Karachi");
    }

    public function index()
    {
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $user_info = $this->requesttoserver->getDataCurl('all_registered_users');
            $user_info = json_decode($user_info);
            if (isset($user_info->status) == 'FALSE') {
                $data['user_info'] = array();
            } else {
                $data['user_info'] = $user_info;
            }

            $subscribers = $this->requesttoserver->getDataCurl('subscribers_list');
            $subscribers = json_decode($subscribers);
            if (isset($subscribers->status) == 'FALSE') {
                $data['subscribers'] = array();
            } else {
                $data['subscribers'] = $subscribers;
            }
            
            $data['title'] = 'PBD - Admin | Registered Users';
            $this->load->view('index', $data);
        }
        else{
            redirect('signin');
        }
    }

    /*******************************************
    Signin View
    ********************************************/
    public function login(){
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            header('Location: '.base_url());
        }
        else {
            $data['title'] = "Admin-PBD | Signin";
            $this->load->view('signin', $data);
        }
    }

    /**********************************************
     * Admin SignIn
     **********************************************/
    public function admin_login(){
        $data_send      = $this->security->xss_clean($_POST);
        unset($data_send['login-modal']);
        $result         = $this->requesttoserver->sendDataCurl($data_send, 'admin_signin');
        $login_res      = json_decode($result);
        if(isset($login_res->status) == 'FALSE'){
            echo json_encode(array('status'=>'FALSE', 'message'=>$login_res->message));
        }
        else{
            $login_res = $login_res['0'];
            $session_data = array(
                "admin_id"      => $login_res->id,
                "admin_name"    => $login_res->admin_name,
                "email"         => $login_res->email,
                "contact"       => $login_res->contact,
                "admin_loggedIn"=> $login_res->admin_privileges,
                "created_on"    => $login_res->created_on,
            );
            $this->session->set_userdata($session_data);
            echo json_encode(array('status'=>'TRUE', 'message'=>'successfully login'));
        }
    }

    /**********************************************
     * Admin Logout
     **********************************************/
    public function admin_logout(){
        $this->session->sess_destroy();
        header('Location: '.base_url());
    }

    /**********************************************
     * Number of Register Users
     **********************************************/
    public function num_of_users(){
        echo json_decode($this->requesttoserver->getDataCurl('num_of_users'));
    }
    
    /**********************************************
     * Number of active users
     **********************************************/
    public function active_users(){
        echo json_decode($this->requesttoserver->getDataCurl('active_users'));
    }
}
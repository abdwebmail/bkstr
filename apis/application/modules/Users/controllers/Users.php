<?php
/**
 * Created by PhpStorm.
 * User: MkTech
 * Date: 3/15/2019
 * Time: 9:37 PM
 */
use Restserver\Libraries\REST_Controller;
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class Users extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("Users_model");
    }

    public function all_registered_users_get(){
        $data   = $this->Users_model->all_users_get();
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }
    /**********************************************
     * Register User
     **********************************************/
    public function registration_post(){
        $data   = $this->security->xss_clean($_POST);
        $data   = $this->Users_model->register_user($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * Number of users
     **********************************************/
    public function num_of_users_get(){
        $data   = $this->Users_model->get_num_of_users();
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }
    
    /**********************************************
     * Number of Active users
     **********************************************/
    public function active_users_get(){
        $data   = $this->Users_model->active_users();
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }
    
    /**********************************************
     * Client Signin
     **********************************************/
    public function client_signin_post(){
        $data   = $this->security->xss_clean($_POST);
        $data   = $this->Users_model->client_signin($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * Admin Signin
     **********************************************/
    public function admin_signin_post(){
        $data   = $this->security->xss_clean($_POST);
        $data   = $this->Users_model->admin_signin($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * Subscribers
     **********************************************/
    public function subscribers_get(){
        $data   = $this->Users_model->subscribers_list();
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }
}
?>
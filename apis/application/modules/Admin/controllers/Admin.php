<?php
use Restserver\Libraries\REST_Controller;
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class Admin extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Karachi");
        $this->load->model("Admin_model");
    }

    /**********************************************
     * Insert New Admin Category
     **********************************************/
    public function add_new_admin_post(){
        $data   = $this->security->xss_clean($_POST);
        $data   = $this->Admin_model->add_new_admin($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * Update Admin
     **********************************************/
    public function update_admin_post(){
        $data   = $this->security->xss_clean($_POST);
        $data   = $this->Admin_model->update_admin($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * All Categories
     **********************************************/
    public function all_admins_get(){
        $data   = $this->Admin_model->all_admins();
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * Specific Admin Detail
     **********************************************/
    public function admin_details_get(){
        $data   = $this->get();
        $data   = $this->Admin_model->admin_details($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * Delete Admin
     **********************************************/
    public function del_admin_get(){
        $data   = $this->get();
        $data   = $this->Admin_model->del_admin($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

}
?>
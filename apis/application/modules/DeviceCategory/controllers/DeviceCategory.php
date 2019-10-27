<?php
use Restserver\Libraries\REST_Controller;
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class DeviceCategory extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Karachi");
        $this->load->model("DeviceCategory_model");
    }

    /**********************************************
     * Insert New Device Category
     **********************************************/
    public function add_new_category_post(){
        $data   = $this->security->xss_clean($_POST);
        $data   = $this->DeviceCategory_model->add_new_category($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * Update Device Category
     **********************************************/
    public function update_category_post(){
        $data   = $this->security->xss_clean($_POST);
        $data   = $this->DeviceCategory_model->update_category($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * All Categories
     **********************************************/
    public function all_categories_get(){
        $data   = $this->DeviceCategory_model->all_categories();
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * Specific Categories
     **********************************************/
    public function category_details_get(){
        $data   = $this->get();
        $data   = $this->DeviceCategory_model->category_details($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * Delete Category
     **********************************************/
    public function del_category_get(){
        $data   = $this->get();
        $data   = $this->DeviceCategory_model->del_category($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

}
?>
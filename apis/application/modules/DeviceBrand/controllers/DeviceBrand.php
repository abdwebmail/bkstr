<?php
use Restserver\Libraries\REST_Controller;
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class DeviceBrand extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Karachi");
        $this->load->model("DeviceBrand_model");
    }

    /**********************************************
     * Insert New Device Brand
     **********************************************/
    public function add_new_brand_post(){
        $data   = $this->security->xss_clean($_POST);
        $data   = $this->DeviceBrand_model->add_new_brand($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * Update Device Brand
     **********************************************/
    public function update_brand_post(){
        $data   = $this->security->xss_clean($_POST);
        $data   = $this->DeviceBrand_model->update_brand($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * All Brands
     **********************************************/
    public function all_brands_get(){
        $data   = $this->DeviceBrand_model->all_brands();
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * Specific Categories
     **********************************************/
    public function brand_details_get(){
        $data   = $this->get();
        $data   = $this->DeviceBrand_model->brand_details($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * Delete Brand
     **********************************************/
    public function del_brand_get(){
        $data   = $this->get();
        $data   = $this->DeviceBrand_model->del_brand($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * Related Brands
     **********************************************/
    public function related_brands_get(){
        $data   = $this->get();
        $data   = $this->DeviceBrand_model->related_brands($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

}
?>
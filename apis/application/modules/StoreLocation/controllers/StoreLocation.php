<?php
use Restserver\Libraries\REST_Controller;
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class StoreLocation extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Karachi");
        $this->load->model("StoreLocation_model");
    }

    /**********************************************
     * Insert New Store Location
     **********************************************/
    public function add_new_storeLocation_post(){
        $data   = $this->security->xss_clean($_POST);
        $data   = $this->StoreLocation_model->add_new_storeLocation($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * Update Store Location
     **********************************************/
    public function update_location_post(){
        $data   = $this->security->xss_clean($_POST);
        $data   = $this->StoreLocation_model->update_location($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * All Store Locations
     **********************************************/
    public function all_storeLocations_get(){
        $data   = $this->StoreLocation_model->all_storeLocations();
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * Specific Admin Detail
     **********************************************/
    public function location_details_get(){
        $data   = $this->get();
        $data   = $this->StoreLocation_model->location_details($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * Delete Admin
     **********************************************/
    public function del_location_get(){
        $data   = $this->get();
        $data   = $this->StoreLocation_model->del_location($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

}
?>
<?php
/**
 * Created by PhpStorm.
 * User: MkTech
 * Date: 3/14/2019
 * Time: 12:39 AM
 */
use Restserver\Libraries\REST_Controller;
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class Store extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("Store_model");
    }

    /**********************************************
     * Get All Store Location
     **********************************************/
    public function store_location_get(){
        $location_id = ($this->get('location_id'));
        if(!isset($location_id) && empty($location_id)) {
            $location_id = '';
        }

        $data   = $this->Store_model->store_location($location_id);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * Get Web Content
     **********************************************/
    public function web_content_get(){
        $data   = $this->Store_model->web_content();
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * Get Device Incashed
     **********************************************/
    public function devices_incashed_get(){
        $data   = $this->Store_model->devices_incashed();
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }
}
?>

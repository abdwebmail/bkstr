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
class DeviceBuyReq extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("DeviceBuyReq_model");
    }

    /**********************************************
     * Submit Buy Device Req
     **********************************************/
    public function add_buy_device_req_post(){
        $data   = $this->security->xss_clean($_POST);
        $data   = $this->DeviceBuyReq_model->add_buy_device_req($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * Selling Device Requests list
     **********************************************/
    public function buying_reqs_get(){
        $data   = $this->DeviceBuyReq_model->buying_reqs();
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * Buying Device Status Requests list
     **********************************************/
    public function buying_status_requests_get(){
        $data   = $this->DeviceBuyReq_model->buying_status_requests();
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * Del Buying Request
     **********************************************/
    public function trash_buyingingReq_get(){
        $data   = $this->get();
        $data   = $this->DeviceBuyReq_model->trash_buyingingReq($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * Selling Device detail of specific ID
     **********************************************/
    public function req_detail_get(){
        $data   = $this->get();
        $data   = $this->DeviceBuyReq_model->req_detail($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * Client Device Requests
     **********************************************/
    public function client_device_requests_post(){
        $data   = $this->security->xss_clean($_POST);
        $data   = $this->DeviceBuyReq_model->client_device_requests($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * Buying Device Status detail of specific ID
     **********************************************/
    public function status_req_detail_get(){
        $data   = $this->get();
        $data   = $this->DeviceBuyReq_model->status_req_detail($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }
    
    /**********************************************
     * Evaluation Comment Client Device Requests => Buying Request
     **********************************************/
    public function comment_on_buyingReq_post(){
        $data   = $this->security->xss_clean($_POST);
        $data   = $this->DeviceBuyReq_model->comment_on_buyingReq($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }
    
    /**********************************************
     * Buying Comment Client Device Buy Requests
     **********************************************/
    public function buyingComment_on_buyingReq_post(){
        $data   = $this->security->xss_clean($_POST);
        $data   = $this->DeviceBuyReq_model->buyingComment_on_buyingReq($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }
    
    /**********************************************
     * Update Status and Evaluation Price Of Device Requests
     **********************************************/
    public function update_buying_status_post(){
        $data   = $this->security->xss_clean($_POST);
        $data   = $this->DeviceBuyReq_model->update_buying_status($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * Update Status and Evaluation Price Of Device Requests
     **********************************************/
    public function update_buy_status_post(){
        $data   = $this->security->xss_clean($_POST);
        $data   = $this->DeviceBuyReq_model->update_buy_status($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * Number of Device Buying Req
     **********************************************/
    public function num_of_buying_req_get(){
        $data   = $this->DeviceBuyReq_model->num_of_buying_req();
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * Number of Unread Device Buying Req
     **********************************************/
    public function num_of_unread_buying_req_get(){
        $data   = $this->DeviceBuyReq_model->num_of_unread_buying_req();
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

}
?>
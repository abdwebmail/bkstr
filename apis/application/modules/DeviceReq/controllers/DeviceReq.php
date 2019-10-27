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
class DeviceReq extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("DeviceReq_model");
    }

    /**********************************************
     * Submit Device Req
     **********************************************/
    public function add_device_req_post(){
        $data   = $this->security->xss_clean($_POST);
        $data   = $this->DeviceReq_model->add_device_req($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * Selling Device Requests list
     **********************************************/
    public function selling_reqs_get(){
        $data   = $this->DeviceReq_model->selling_reqs();
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * Evaluated Selling Device Requests list
     **********************************************/
    public function eval_selling_reqs_get(){
        $data   = $this->DeviceReq_model->eval_selling_reqs();
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
        $data   = $this->DeviceReq_model->client_device_requests($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * Number of Device Selling Req
     **********************************************/
    public function num_of_selling_req_get(){
        $data   = $this->DeviceReq_model->num_of_selling_req();
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * Number of Unread Device Selling Req
     **********************************************/
    public function num_of_unread_selling_req_get(){
        $data   = $this->DeviceReq_model->num_of_unread_selling_req();
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * Del Selling Request
     **********************************************/
    public function trash_sellingReq_get(){
        $data   = $this->get();
        $data   = $this->DeviceReq_model->trash_sellingReq($data);
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
        $data   = $this->DeviceReq_model->req_detail($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * Selling Device detail of specific ID
     **********************************************/
    public function selling_req_detail_get(){
        $data   = $this->get();
        $data   = $this->DeviceReq_model->selling_req_detail($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }
    
    /**********************************************
     * Evaluation Comment Client Device Requests
     **********************************************/
    public function comment_on_sellingReq_post(){
        $data   = $this->security->xss_clean($_POST);
        $data   = $this->DeviceReq_model->comment_on_sellingReq($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }
    
    /**********************************************
     * Selling Comment Client Device Requests
     **********************************************/
    public function sellingComment_on_sellingReq_post(){
        $data   = $this->security->xss_clean($_POST);
        $data   = $this->DeviceReq_model->sellingComment_on_sellingReq($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }
    
    /**********************************************
     * Update Status and Evaluation Price Of Device Requests
     **********************************************/
    public function update_evaluation_status_post(){
        $data   = $this->security->xss_clean($_POST);
        $data   = $this->DeviceReq_model->update_evaluation_status($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * Update Status and Evaluation Price Of Device Requests
     **********************************************/
    public function update_sale_status_post(){
        $data   = $this->security->xss_clean($_POST);
        $data   = $this->DeviceReq_model->update_sale_status($data);
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
        $data   = $this->DeviceReq_model->num_of_buying_req();
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
        $data   = $this->DeviceReq_model->num_of_unread_buying_req();
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * Number of Unread Device Buying Req
     **********************************************/

}
?>
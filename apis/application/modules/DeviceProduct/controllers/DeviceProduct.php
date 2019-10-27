<?php
use Restserver\Libraries\REST_Controller;
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class DeviceProduct extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Karachi");
        $this->load->model("DeviceProduct_model");
    }

    /**********************************************
     * Insert New Device Brand
     **********************************************/
    public function add_new_product_post(){
        $data   = $this->security->xss_clean($_POST);
        $data   = $this->DeviceProduct_model->add_new_product($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * Update Device Product
     **********************************************/
    public function update_product_post(){
        $data   = $this->security->xss_clean($_POST);
        $data   = $this->DeviceProduct_model->update_product($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }
    
    public function all_products_new(){
        
        print_r('vicky sheikh all products new');
        exit();
        
        $data   = $this->DeviceProduct_model->get_all_products();
        
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    
        
    }

    /**********************************************
     * All Products
     **********************************************/
    public function all_products(){
        
        
        
        $data   = $this->DeviceProduct_model->get_all_products();
        
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * Specific Product Detail
     **********************************************/
    public function product_details_get(){
        $data   = $this->get();
        $data   = $this->DeviceProduct_model->product_details($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * Related Products
     **********************************************/
    public function related_products_get(){
        $data   = $this->get();
        $data   = $this->DeviceProduct_model->related_products($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * Delete Product
     **********************************************/
    public function del_product_get(){
        $data   = $this->get();
        $data   = $this->DeviceProduct_model->del_product($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }
    
    public function search_products_get($keyword){
        // print_r($keyword);exit;
        $data   = $this->DeviceProduct_model->search_product($keyword);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

}
?>
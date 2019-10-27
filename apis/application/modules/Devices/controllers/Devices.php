<?php
use Restserver\Libraries\REST_Controller;
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class Devices extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("Devices_model");
    }

    /**********************************************
     * Get All Category Brand
     **********************************************/
    public function category_brands_post()
    {
        $data   = $this->security->xss_clean($_POST);
        $data   = $this->Devices_model->category_brands($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
        
    }

    /**********************************************
     * Get All Brands
     **********************************************/
    public function all_brands_get()
    {
        $data   = $this->security->xss_clean($_POST);
        $data   = $this->Devices_model->all_brands();
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);

    }

    /**********************************************
     * Get All Brand's Products
     **********************************************/
    public function brand_products_post()
    {
        $data   = $this->security->xss_clean($_POST);
        $data   = $this->Devices_model->brand_product($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);

    }

    /**********************************************
     * Get All Products & Search Products
     **********************************************/
    public function all_products_get()
    {
        $search_keyword = ($this->get('search'));
        if(isset($search_keyword) && !empty($search_keyword)) {
            $data = $this->Devices_model->get_search_products($search_keyword);
            if (isset($data['status']) == 'FALSE') {
                $this->response($data, REST_Controller::HTTP_SEE_OTHER);
            }
            $this->set_response($data, REST_Controller::HTTP_CREATED);
        }
        else{
            $data = $this->Devices_model->get_all_products();
            if (isset($data['status']) == 'FALSE') {
                $this->response($data, REST_Controller::HTTP_SEE_OTHER);
            }
            $this->set_response($data, REST_Controller::HTTP_CREATED);
        }
    }
    
    /**********************************************
     * Get All Products 
     **********************************************/
    public function all_products()
    {
        
        $data   = $this->Devices_model->get_all_products();
        
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);

    }


    /**********************************************
     * Get All Products Against Category ID
     **********************************************/
    public function categoryID_products_post()
    {
        $data   = $this->security->xss_clean($_POST);
        $data   = $this->Devices_model->categoryID_products($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);

    }

    /**********************************************
     * Get All Top Products
     **********************************************/
    public function top_products_get()
    {
        $data   = $this->Devices_model->top_products();
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);

    }

    /**********************************************
     * Get Product Detail
     **********************************************/
    public function product_detail_post()
    {
        $data   = $this->security->xss_clean($_POST);
        $product_id = $data['product_id'];
        
        $data = $this->Devices_model->product_detail($product_id);
        if (isset($data['status']) == 'FALSE') {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);

    }
}
?>
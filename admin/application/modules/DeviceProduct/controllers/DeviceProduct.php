<?php
/**
 * Created by PhpStorm.
 * User: MkTech
 * Date: 4/26/2019
 * Time: 11:40 PM
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DeviceProduct extends MX_Controller
{
    private $allowedExtensions = array('jpg', 'gif', 'jpeg', 'png', 'bmp', 'wbmp', 'mp4', 'wmv');
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Karachi");
    }

    /**********************************************
     * Add New Device Product View
     **********************************************/
    public function add_new_product(){
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $categories = $this->requesttoserver->getDataCurl('all_devCategories');
            $categories = json_decode($categories);
            if (isset($categories->status) == 'FALSE') {
                $data['categories'] = array();
            } else {
                $data['categories'] = $categories;
            }
            $data['title'] = 'PBD - Admin | Add Product';
            $this->load->view('add-new', $data);
        }
        else{
            redirect('signin');
        }
    }

    /**********************************************
     * Edit Device Product View
     **********************************************/
    public function edit_deviceProduct($id){
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            if(isset($id) && !empty($id)) {
                // All categories
                $categories = $this->requesttoserver->getDataCurl('all_devCategories');
                $categories = json_decode($categories);
                if (isset($categories->status) == 'FALSE') {
                    $data['categories'] = array();
                } else {
                    $data['categories'] = $categories;
                }
                // Product detail
                $product_detail = $this->requesttoserver->getDataCurl('devProduct_details/id/' . $id);
                $product_detail = json_decode($product_detail);
                if (isset($product_detail->status) == 'FALSE') {
                    echo "<h2 style='text-align: center;'>INVALID Device Product ID</h2>";
                    die;
                }
                else {
                    $data['product_detail'] = $product_detail[0];
                }
                // Related brands
                $rel_brands = $this->requesttoserver->getDataCurl('rel_devBrands/category_id/'.$data['product_detail']->category_id);
                $rel_brands = json_decode($rel_brands);
                if (isset($rel_brands->status) == 'FALSE') {
                    $data['rel_brands'] = array();
                } 
                else {
                    $data['rel_brands'] = $rel_brands;
                }
                
                $data['title'] = 'PBD - Admin | Edit product ';
                $this->load->view('edit-device-product', $data);
            }
            else{
                echo "<h2 style='text-align: center;'>Device Product ID not provided</h2>";
                die;
            }
        }
        else{
            redirect('signin');
        }
    }

    /**********************************************
     * Submit New Device Product
     **********************************************/
    public function submit_deviceProduct(){
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $data_send  = $this->security->xss_clean($_POST);
            $data_image = $this->security->xss_clean($_FILES);
            if($data_image['product_image']['error'] == '0') {
                $filename = $data_image['product_image']['name'];
                $file_tmp = $data_image['product_image']['tmp_name'];
                $extension = pathinfo($filename, PATHINFO_EXTENSION);

                if (in_array($extension, $this->allowedExtensions)) {
                    $base64 = base64_encode(file_get_contents($file_tmp));
                    $data_send['image_name']        = $filename;
                    $data_send['product_image']    = $base64;
                } 
                else {
                    $result = array('status' => 'error', 'message' => 'Please Choose Appropirate Image.');
                    echo json_encode($result);
                    exit;
                }
            }
            else{
                $result = array('status' => 'error', 'message' => 'Please Choose Image.');
                echo json_encode($result);
                exit;
            }

            $product_add_result = $this->requesttoserver->sendDataCurl($data_send, 'add_new_devProduct');
            $product_add_result = json_decode($product_add_result);
            if ($product_add_result->status == 'FALSE') {
                echo json_encode(array('status' => 'FALSE', 'message' =>$product_add_result->message));
            } else {
                echo json_encode(array('status' => 'TRUE', 'message' =>'Product successfully added.'));
            }
        }
        else{
            echo json_encode(array('status'=>'FALSE','message'=> 'Session expired, please try again after Login'));
        }
    }

    /**********************************************
     * Update Device Product
     **********************************************/
    public function update_deviceProduct(){
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $data_send  = $this->security->xss_clean($_POST);

            $data_image = $this->security->xss_clean($_FILES);
            if($data_image['product_image']['error'] == '0') {
                $filename = $data_image['product_image']['name'];
                $file_tmp = $data_image['product_image']['tmp_name'];
                $extension = pathinfo($filename, PATHINFO_EXTENSION);

                if (in_array($extension, $this->allowedExtensions)) {
                    $base64 = base64_encode(file_get_contents($file_tmp));
                    $data_send['image_name']        = $filename;
                    $data_send['product_image']    = $base64;
                } 
                else {
                    $result = array('status' => 'error', 'message' => 'Please Choose Appropirate Image.');
                    echo json_encode($result);
                    exit;
                }
            }
            $product_update_result = $this->requesttoserver->sendDataCurl($data_send, 'update_devProduct');
            $product_update_result = json_decode($product_update_result);
            if (isset($product_update_result->status) === 'FALSE') {
                echo json_encode(array('status' => 'FALSE', 'message' =>$product_update_result->message));
            }
            else {
                echo json_encode(array('status' => 'TRUE', 'message' =>'Product successfully updated.'));
            }
        }
        else{
            echo json_encode(array('status'=>'FALSE','message'=> 'Session expired, please try again after Login'));
        }
    }

    /**********************************************
     * Device Product List
     **********************************************/
    public function product_list($product_name = ''){
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            if(empty($product_name)) {
                
                
                
                
                $all_products = $this->requesttoserver->getDataCurl('all_devProducts');
                
                $all_products = json_decode($all_products);
                
                
                
                
                if (isset($all_products->status) == 'FALSE') {
                    $data['all_products'] = array();
                } else {
                    $data['all_products'] = $all_products;
                }
                $data['title'] = 'PBD - Admin | All products';

            }
            else{
                // split to get brand ID
                $brand_id = explode('-', $product_name);
                $brand_name =  $brand_id[0];
                $brand_id =  end($brand_id);

                $rel_products = $this->requesttoserver->getDataCurl('rel_devProducts/brand_id/'.$brand_id);
                $rel_products = json_decode($rel_products);
                if (isset($rel_products->status) == 'FALSE') {
                    $data['all_products'] = array();
                } else {
                    $data['all_products'] = $rel_products;
                }
                $data['title'] = 'PBD - Admin | '. $brand_name .' products';
            }
            $this->load->view('product-list', $data);
        }
        else{
            redirect('signin');
        }
    }

    /**********************************************
     * Del Device Product View
     **********************************************/
    public function del_deviceProduct($id){
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            if(isset($id) && !empty($id)) {
                $del_deviceProduct = $this->requesttoserver->getDataCurl('del_deviceProduct/product_id/' . $id);
                $del_deviceProduct = json_decode($del_deviceProduct);
                if (isset($del_deviceProduct->status) == 'TRUE') {
                    echo json_encode(array('status'=>'TRUE', 'message' => "Product successfully deleted"));
                } 
                else {
                    echo json_encode(array('status'=> 'FALSE', 'message' => $del_deviceProduct->message));
                }
            }
            else{
                echo json_encode(array('status'=>'FALSE', 'message' => 'INVALID Device Product ID'));
            }
        }
        else{
            echo json_encode(array('status'=>'FALSE', 'message' => 'Session expire, please try again after Login. Thank You!!!'));
        }
    }

}
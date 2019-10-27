<?php
/**
 * Created by PhpStorm.
 * User: MkTech
 * Date: 4/26/2019
 * Time: 11:40 PM
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DeviceBrand extends MX_Controller
{
    private $allowedExtensions = array('jpg', 'gif', 'jpeg', 'png', 'bmp', 'wbmp', 'mp4', 'wmv');
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Karachi");
    }

    /**********************************************
     * Add New Device Brand View
     **********************************************/
    public function add_new_brand(){
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $categories = $this->requesttoserver->getDataCurl('all_devCategories');
            $categories = json_decode($categories);
            if (isset($categories->status) == 'FALSE') {
                $data['categories'] = array();
            } else {
                $data['categories'] = $categories;
            }
            $data['title'] = 'PBD - Admin | Add brand';
            $this->load->view('add-new', $data);
        }
        else{
            redirect('signin');
        }
    }

    /**********************************************
     * Edit Device Brand View
     **********************************************/
    public function edit_deviceBrand($id){
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            if(isset($id) && !empty($id)) {
                $categories = $this->requesttoserver->getDataCurl('all_devCategories');
                $categories = json_decode($categories);
                if (isset($categories->status) == 'FALSE') {
                    $data['categories'] = array();
                } else {
                    $data['categories'] = $categories;
                }
                $brand_detail = $this->requesttoserver->getDataCurl('devBrand_details/id/' . $id);
                $brand_detail = json_decode($brand_detail);
                if (isset($brand_detail->status) == 'FALSE') {
                    echo "<h2 style='text-align: center;'>INVALID Device BRAND ID</h2>";
                    die;
                }
                else {
                    $data['brand_detail'] = $brand_detail[0];
                }
                $data['title'] = 'PBD - Admin | Edit brand ';
                $this->load->view('edit-device-brand', $data);
            }
            else{
                echo "<h2 style='text-align: center;'>Device BRAND ID not provided</h2>";
                die;
            }
        }
        else{
            redirect('signin');
        }
    }

    /**********************************************
     * Submit New Device Brand
     **********************************************/
    public function submit_deviceBrand(){
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $data_send  = $this->security->xss_clean($_POST);
            $data_image = $this->security->xss_clean($_FILES);
            if($data_image['brand_image']['error'] == '0') {
                $filename = $data_image['brand_image']['name'];
                $file_tmp = $data_image['brand_image']['tmp_name'];
                $extension = pathinfo($filename, PATHINFO_EXTENSION);

                if (in_array($extension, $this->allowedExtensions)) {
                    $base64 = base64_encode(file_get_contents($file_tmp));
                    $data_send['image_name']        = $filename;
                    $data_send['brand_image']    = $base64;
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


            $brand_add_result = $this->requesttoserver->sendDataCurl($data_send, 'add_new_devBrand');
            $brand_add_result = json_decode($brand_add_result);
            if (isset($brand_add_result->status) === 'FALSE') {
                echo json_encode(array('status' => 'FALSE', 'message' =>$brand_add_result->message));
            } else {
                echo json_encode(array('status' => 'TRUE', 'message' =>'Brand successfully added.'));
            }
        }
        else{
            echo json_encode(array('status'=>'FALSE','message'=> 'Session expired, please try again after Login'));
        }
    }

    /**********************************************
     * Update Device Brand
     **********************************************/
    public function update_deviceBrand(){
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $data_send  = $this->security->xss_clean($_POST);

            $data_image = $this->security->xss_clean($_FILES);
            if($data_image['brand_image']['error'] == '0') {
                $filename = $data_image['brand_image']['name'];
                $file_tmp = $data_image['brand_image']['tmp_name'];
                $extension = pathinfo($filename, PATHINFO_EXTENSION);

                if (in_array($extension, $this->allowedExtensions)) {
                    $base64 = base64_encode(file_get_contents($file_tmp));
                    $data_send['image_name']        = $filename;
                    $data_send['brand_image']    = $base64;
                } 
                else {
                    $result = array('status' => 'error', 'message' => 'Please Choose Appropirate Image.');
                    echo json_encode($result);
                    exit;
                }
            }

            $brand_update_result = $this->requesttoserver->sendDataCurl($data_send, 'update_devBrand');
            $brand_update_result = json_decode($brand_update_result);
            if (isset($brand_update_result->status) === 'FALSE') {
                echo json_encode(array('status' => 'FALSE', 'message' =>$brand_update_result->message));
            }
            else {
                echo json_encode(array('status' => 'TRUE', 'message' =>'Brand successfully updated.'));
            }
        }
        else{
            echo json_encode(array('status'=>'FALSE','message'=> 'Session expired, please try again after Login'));
        }
    }

    /**********************************************
     * Device Brand List
     **********************************************/
    public function brand_list($brand_name=''){
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            if(empty($brand_name)) {
                $all_brands = $this->requesttoserver->getDataCurl('all_devBrands');
                $all_brands = json_decode($all_brands);
                if (isset($all_brands->status) == 'FALSE') {
                    $data['all_brands'] = array();
                } else {
                    $data['all_brands'] = $all_brands;
                }
                $data['title'] = 'PBD - Admin | All Bands';
            }
            else{
                // split to get brand ID
                $category_id = explode('-', $brand_name);
                $brand_name =  $category_id[0];
                $category_id =  end($category_id);

                $rel_brands = $this->requesttoserver->getDataCurl('rel_devBrands/category_id/'.$category_id);
                $rel_brands = json_decode($rel_brands);
                if (isset($rel_brands->status) == 'FALSE') {
                    $data['all_brands'] = array();
                } else {
                    $data['all_brands'] = $rel_brands;
                }
                $data['title'] = 'PBD - Admin | '. $brand_name .' brands';
            }
            $this->load->view('brand-list', $data);
        }
        else{
            redirect('signin');
        }
    }

    /**********************************************
     * Related Brands
     **********************************************/
    public function related_brands($category_id){
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $rel_brands = $this->requesttoserver->getDataCurl('rel_devBrands/category_id/'.$category_id);
            $rel_brands = json_decode($rel_brands);
            $brands_list = '';
            if (isset($rel_brands->status) == 'FALSE') {
                $brands_list .= "<option value='0'>No Result found</option>";
            } else {
                foreach ($rel_brands as $rel_brand) {
                    $brands_list .= "<option value='$rel_brand->id'>$rel_brand->brand_name</option>";
                }
            }
            echo json_encode(array('status'=>'TRUE','message'=>$brands_list));
        }
        else{
            echo json_encode(array('status'=>'FALSE','message'=>'Login session expire, Please try again after login'));
        }
    }

    /**********************************************
     * Del Device Brand View
     **********************************************/
    public function del_deviceBrand($id){
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            if(isset($id) && !empty($id)) {
                $del_deviceBrand = $this->requesttoserver->getDataCurl('del_deviceBrand/brand_id/' . $id);
                $del_deviceBrand = json_decode($del_deviceBrand);
                if (isset($del_deviceBrand->status) == 'TRUE') {
                    echo json_encode(array('status'=>'TRUE', 'message' => "Brand successfully deleted"));
                } 
                else {
                    echo json_encode(array('status'=> 'FALSE', 'message' => $del_deviceBrand->message));
                }
            }
            else{
                echo json_encode(array('status'=>'FALSE', 'message' => 'INVALID Device Brand ID'));
            }
        }
        else{
            echo json_encode(array('status'=>'FALSE', 'message' => 'Session expire, please try again after Login. Thank You!!!'));
        }
    }

}
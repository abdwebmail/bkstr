<?php
/**
 * Created by PhpStorm.
 * User: MkTech
 * Date: 4/26/2019
 * Time: 11:40 PM
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DeviceCategory extends MX_Controller
{
    private $allowedExtensions = array('jpg', 'gif', 'jpeg', 'png', 'bmp', 'wbmp', 'mp4', 'wmv');
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Karachi");
    }

    /**********************************************
     * Add New Device Category View
     **********************************************/
    public function add_new_category(){
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $data['title'] = 'PBD - Admin | Add category';
            $this->load->view('add-new', $data);
        }
        else{
            redirect('signin');
        }
    }

    /**********************************************
     * Edit Device Category View
     **********************************************/
    public function edit_deviceCategory($id){
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            if(isset($id) && !empty($id)) {
                $category_detail = $this->requesttoserver->getDataCurl('devCategory_details/id/' . $id);
                $category_detail = json_decode($category_detail);
                if (isset($category_detail->status) == 'FALSE') {
                    echo "<h2 style='text-align: center;'>INVALID Device Category ID</h2>";
                    die;
                }
                else {
                    $data['category_detail'] = $category_detail[0];
                }
                $data['title'] = 'PBD - Admin | Edit category ';
                $this->load->view('edit-device-category', $data);
            }
            else{
                echo "<h2 style='text-align: center;'>Device Category ID not provided</h2>";
                die;
            }
        }
        else{
            redirect('signin');
        }
    }

    /**********************************************
     * Submit New Device Category
     **********************************************/
    public function submit_deviceCategory(){
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $data_send  = $this->security->xss_clean($_POST);

            $data_image = $this->security->xss_clean($_FILES);
            if($data_image['category_image']['error'] == '0') {
                $filename = $data_image['category_image']['name'];
                $file_tmp = $data_image['category_image']['tmp_name'];
                $extension = pathinfo($filename, PATHINFO_EXTENSION);

                if (in_array($extension, $this->allowedExtensions)) {
                    $base64 = base64_encode(file_get_contents($file_tmp));
                    $data_send['image_name']        = $filename;
                    $data_send['category_image']    = $base64;
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


            $category_add_result = $this->requesttoserver->sendDataCurl($data_send, 'add_new_devCategory');
            $category_add_result = json_decode($category_add_result);
            if (isset($category_add_result->status) === 'FALSE') {
                echo json_encode(array('status' => 'FALSE', 'message' =>$category_add_result->message));
            } else {
                echo json_encode(array('status' => 'TRUE', 'message' =>'Category successfully added.'));
            }
        }
        else{
            echo json_encode(array('status'=>'FALSE','message'=> 'Session expired, please try again after Login'));
        }
    }

    /**********************************************
     * Update Device Category
     **********************************************/
    public function update_deviceCategory(){
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $data_send  = $this->security->xss_clean($_POST);

            $data_image = $this->security->xss_clean($_FILES);
            if($data_image['category_image']['error'] == '0') {
                $filename = $data_image['category_image']['name'];
                $file_tmp = $data_image['category_image']['tmp_name'];
                $extension = pathinfo($filename, PATHINFO_EXTENSION);

                if (in_array($extension, $this->allowedExtensions)) {
                    $base64 = base64_encode(file_get_contents($file_tmp));
                    $data_send['image_name']        = $filename;
                    $data_send['category_image']    = $base64;
                } 
                else {
                    $result = array('status' => 'error', 'message' => 'Please Choose Appropirate Image.');
                    echo json_encode($result);
                    exit;
                }
            }

            $category_update_result = $this->requesttoserver->sendDataCurl($data_send, 'update_devCategory');
            $category_update_result = json_decode($category_update_result);
            if (isset($category_update_result->status) === 'FALSE') {
                echo json_encode(array('status' => 'FALSE', 'message' =>$category_update_result->message));
            } else {
                echo json_encode(array('status' => 'TRUE', 'message' =>'Category successfully updated.'));
            }
        }
        else{
            echo json_encode(array('status'=>'FALSE','message'=> 'Session expired, please try again after Login'));
        }
    }

    /**********************************************
     * Device Categories List
     **********************************************/
    public function categories_list(){
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $all_categories = $this->requesttoserver->getDataCurl('all_devCategories');
            $all_categories = json_decode($all_categories);
            if (isset($all_categories->status) == 'FALSE') {
                $data['all_categories'] = array();
            } else {
                $data['all_categories'] = $all_categories;
            }
            $data['title'] = 'PBD - Admin | categories';
            $this->load->view('categories-list', $data);
        }
        else{
            redirect('signin');
        }
    }

    /**********************************************
     * Del Device Category View
     **********************************************/
    public function del_deviceCategory($id){
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            if(isset($id) && !empty($id)) {
                $del_deviceCat = $this->requesttoserver->getDataCurl('del_deviceCat/category_id/' . $id);
                $del_deviceCat = json_decode($del_deviceCat);
                if (isset($del_deviceCat->status) == 'TRUE') {
                    echo json_encode(array('status'=>'TRUE', 'message' => "Category successfully deleted"));
                } 
                else {
                    echo json_encode(array('status'=> 'FALSE', 'message' => $del_deviceCat->message));
                }
            }
            else{
                echo json_encode(array('status'=>'FALSE', 'message' => 'INVALID Device Category ID'));
            }
        }
        else{
            echo json_encode(array('status'=>'FALSE', 'message' => 'Session expire, please try again after Login. Thank You!!!'));
        }
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: MkTech
 * Date: 4/26/2019
 * Time: 11:40 PM
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MX_Controller
{
    private $allowedExtensions = array('jpg', 'gif', 'jpeg', 'png', 'bmp', 'wbmp', 'mp4', 'wmv');
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Karachi");
    }

    /**********************************************
     * Add New Admin View
     **********************************************/
    public function add_new_admin(){
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $data['title'] = 'PBD - Admin | Add admin';
            $this->load->view('add-new', $data);
        }
        else{
            redirect('signin');
        }
    }

    /**********************************************
     * Edit Admin View
     **********************************************/
    public function edit_admin_view(){
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $data = $this->security->xss_clean($_POST);
            $admin_id = $data['admin_id'];
            if(isset($admin_id) && !empty($admin_id)) {
                $admin_detail = $this->requesttoserver->getDataCurl('admin_details/admin_id/' . $admin_id);
                $admin_detail = json_decode($admin_detail);
                if (isset($admin_detail->status) == 'FALSE') {
                    echo json_encode(array('status'=>'FALSE', 'message' => 'INVALID ADMIN ID'));
                }
                else {
                    $data['admin_detail'] = $admin_detail[0];
                    echo json_encode(array(
                        'status' => 'TRUE',
                        'message' => $this->load->view('edit-admin', $data, true)
                    ));
                }
            }
            else{
                echo "<h2 style='text-align: center;'>Admin ID not provided</h2>";
                die;
            }
        }
        else{
            redirect('signin');
        }
    }

    /**********************************************
     * Submit New Admin
     **********************************************/
    public function submit_newAdmin(){
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $data_send  = $this->security->xss_clean($_POST);
            $admin_add_result = $this->requesttoserver->sendDataCurl($data_send, 'add_new_admin');
            $admin_add_result = json_decode($admin_add_result);
            if ($admin_add_result->status == 'FALSE') {
                echo json_encode(array('status' => 'FALSE', 'message' => $admin_add_result->message));
            }
            else {
                echo json_encode(array('status' => 'TRUE', 'message' => $admin_add_result->message));
            }
        }
        else{
            echo json_encode(array('status'=>'FALSE','message'=> 'Session expired, please try again after Login'));
        }
    }

    /**********************************************
     * Update Admin
     **********************************************/
    public function update_admin(){
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $data  = $this->security->xss_clean($_POST);
            $admin_update_result = $this->requesttoserver->sendDataCurl($data, 'update_admin');
            $admin_update_result = json_decode($admin_update_result);
            if (isset($admin_update_result->status) === 'FALSE') {
                echo json_encode(array('status' => 'FALSE', 'message' => $admin_update_result->message));
            }
            else {
                echo json_encode(array('status' => 'TRUE', 'message' => 'Admin successfully updated.'));
            }
        }
        else{
            echo json_encode(array('status'=>'FALSE','message'=> 'Session expired, please try again after Login'));
        }
    }

    /**********************************************
     * Admin List
     **********************************************/
    public function admin_list(){
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $all_admins = $this->requesttoserver->getDataCurl('all_admins');
            $all_admins = json_decode($all_admins);
            if (isset($all_admins->status) == 'FALSE') {
                $data['all_admins'] = array();
            } else {
                $data['all_admins'] = $all_admins;
            }
            $data['title'] = 'PBD - Admin | Admins List';
            $this->load->view('admin-list', $data);
        }
        else{
            redirect('signin');
        }
    }

    /**********************************************
     * Del Admin
     **********************************************/
    public function del_admin($id){
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            if(isset($id) && !empty($id)) {
                $del_admin = $this->requesttoserver->getDataCurl('del_admin/admin_id/' . $id);
                $del_admin = json_decode($del_admin);
                if (isset($del_admin->status) == 'TRUE') {
                    echo json_encode(array('status'=>'TRUE', 'message' => "Admin successfully deleted"));
                } 
                else {
                    echo json_encode(array('status'=> 'FALSE', 'message' => $del_admin->message));
                }
            }
            else{
                echo json_encode(array('status'=>'FALSE', 'message' => 'INVALID ADMIN ID'));
            }
        }
        else{
            echo json_encode(array('status'=>'FALSE', 'message' => 'Session expire, please try again after Login. Thank You!!!'));
        }
    }

}
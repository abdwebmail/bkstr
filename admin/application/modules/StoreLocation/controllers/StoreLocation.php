<?php
/**
 * Created by PhpStorm.
 * User: MkTech
 * Date: 4/26/2019
 * Time: 11:40 PM
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class StoreLocation extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Karachi");
    }

    /**********************************************
     * Add New Store Location View
     **********************************************/
    public function add_new_store(){
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $data['title'] = 'PBD - Admin | Add Store Location';
            $this->load->view('add-new', $data);
        }
        else{
            redirect('signin');
        }
    }

    /**********************************************
     * Edit Store Location View
     **********************************************/
    public function edit_store_location($id){
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            if(isset($id) && !empty($id)) {
                $location_detail = $this->requesttoserver->getDataCurl('storeLocation_details/location_id/' . $id);
                $location_detail = json_decode($location_detail);
                if (isset($location_detail->status) == 'FALSE') {
                    echo "<h2 style='text-align: center;'>INVALID LOCATION ID</h2>";
                    die;
                }
                else {
                    $data['location_detail'] = $location_detail[0];
                }
                $data['title'] = 'PBD - Admin | Edit Location ';
                $this->load->view('edit-store_location', $data);
            }
            else{
                echo "<h2 style='text-align: center;'>Store Location ID not provided</h2>";
                die;
            }
        }
        else{
            redirect('signin');
        }
    }

    /**********************************************
     * Submit New Store Location
     **********************************************/
    public function submit_storeLocation(){
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $data_send  = $this->security->xss_clean($_POST);

            $location_add_result = $this->requesttoserver->sendDataCurl($data_send, 'add_new_storeLocation');
            $location_add_result = json_decode($location_add_result);
            if (isset($location_add_result->status) === 'FALSE') {
                echo json_encode(array('status' => 'FALSE', 'message' =>$location_add_result->message));
            } else {
                echo json_encode(array('status' => 'TRUE', 'message' =>'Location successfully added.'));
            }
        }
        else{
            echo json_encode(array('status'=>'FALSE','message'=> 'Session expired, please try again after Login'));
        }
    }

    /**********************************************
     * Update Store Location
     **********************************************/
    public function update_storeLocation(){
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $data_send  = $this->security->xss_clean($_POST);
            $location_update_result = $this->requesttoserver->sendDataCurl($data_send, 'update_storeLocation');
            $location_update_result = json_decode($location_update_result);
            if (isset($location_update_result->status) === 'FALSE') {
                echo json_encode(array('status' => 'FALSE', 'message' =>$location_update_result->message));
            }
            else {
                echo json_encode(array('status' => 'TRUE', 'message' =>'Store Location successfully updated.'));
            }
        }
        else{
            echo json_encode(array('status'=>'FALSE','message'=> 'Session expired, please try again after Login'));
        }
    }

    /**********************************************
     * Store Location List
     **********************************************/
    public function location_list(){
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $all_locations = $this->requesttoserver->getDataCurl('all_storeLocations');
            $all_locations = json_decode($all_locations);
            if (isset($all_locations->status) == 'FALSE') {
                $data['all_locations'] = array();
            } else {
                $data['all_locations'] = $all_locations;
            }
            $data['title'] = 'PBD - Admin | All Locations';
            
            $this->load->view('location-list', $data);
        }
        else{
            redirect('signin');
        }
    }
    
    /**********************************************
     * Del Device Brand View
     **********************************************/
    public function del_storeLocation($id){
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            if(isset($id) && !empty($id)) {
                $del_storeLocation = $this->requesttoserver->getDataCurl('del_storeLocation/location_id/' . $id);
                $del_storeLocation = json_decode($del_storeLocation);
                if (isset($del_storeLocation->status) == 'TRUE') {
                    echo json_encode(array('status'=>'TRUE', 'message' => "Location successfully deleted"));
                } 
                else {
                    echo json_encode(array('status'=> 'FALSE', 'message' => $del_storeLocation->message));
                }
            }
            else{
                echo json_encode(array('status'=>'FALSE', 'message' => 'INVALID Store Location ID'));
            }
        }
        else{
            echo json_encode(array('status'=>'FALSE', 'message' => 'Session expire, please try again after Login. Thank You!!!'));
        }
    }

}
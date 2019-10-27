<?php
/**
 * Created by PhpStorm.
 * User: MkTech
 * Date: 4/17/2019
 * Time: 12:34 AM
 */
include_once APPPATH.'config/project_constants.php';
class StoreLocation_model extends CI_Model
{
    /**********************************************
     * Add new Store Location
     **********************************************/
    public function add_new_storeLocation($data){
    
        //validation Fields
        if (validate_data($data, 'add_location') !== TRUE) {
            return array('status' => 'FALSE', 'message' => validate_data($data, 'add_location'));
        }
        
        //Query
        $insert_location = $this->db->insert('location',$data);
        if($insert_location) {
            return array('status' => 'TRUE', 'message' => 'Store Location successfully added.');
        }
        else{
            return array('status' => 'FALSE', 'message' => 'Something Went Wrong.');
        }
    }

    /**********************************************
     * Update Store Location
     **********************************************/
    public function update_location($data){
        //validation Fields
        if (validate_data($data, 'update_location') !== TRUE) {
            return array('status' => 'FALSE', 'message' => validate_data($data, 'update_location'));
        }
        $location_id = array('id'=>$data['location_id']);
        unset($data['location_id']);
        if(empty($data['google_iframe'])){
            unset($data['google_iframe']);
        }
        $update_location = $this->db->set($data)->where($location_id)->update('location');

        if($update_location){
            return array('status' => 'TRUE', 'message' => 'Store Location updated');
        }
        else{
            return array('status' => 'FALSE', 'message' => 'Something Went Wrong while updating location.');
        }
    }

    /**********************************************
     * All Store Location
     **********************************************/
    public function all_storeLocations(){
        $condition = array('is_deleted'=>"0");
        $all_locations = $this->db->select('*')->where($condition)->get('location')->result_array();
        if ($all_locations) {
            return $all_locations;
        }
        else {
            return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
        }
    }

    /**********************************************
     * Location Detail against specific id
     **********************************************/
    public function location_details($data){
        $condition = array('id'=>$data['location_id']);
        $detail = $this->db->select('*')->where($condition)->get('location')->result_array();
        if ($detail) { return $detail; }
        else {
            return array('status' => 'FALSE' , 'message' => 'No Result found against this Store Location ID');
        }
    }

    /**********************************************
     * Delete Store Location
     **********************************************/
    public function del_location($data){
        if(isset($data['location_id'])&& !empty($data['location_id'])) {
            $condition = array('id' => $data['location_id']);
            $deleted_location = $this->db->set(array('is_deleted'=>1))->where($condition)->update('location');

            if ($deleted_location) {
                return array('status' => 'TRUE', 'message' => 'Store Location deleted');
            } else {
                return array('status' => 'FALSE', 'message' => 'Something Went Wrong while deleting location.');
            }
        }
    }
}

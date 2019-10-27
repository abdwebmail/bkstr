<?php
/**
 * Created by PhpStorm.
 * User: MkTech
 * Date: 3/14/2019
 * Time: 12:41 AM
 */
include_once APPPATH.'config/project_constants.php';
class Store_model extends CI_Model
{
    /**********************************************
     * Get All Store Location
     **********************************************/
    public function store_location($location_id){
        if($location_id==''){
            $condition = array('is_deleted'=>0);
        }
        else{
            $condition = array('is_deleted'=>0, 'id'=>$location_id);
        }

        $store_locations = $this->db->select('*')->where($condition)->get('location')->result_array();
        if ($store_locations) { return $store_locations; }
        else {
            return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
        }
    }

    /**********************************************
     * Get Web Content
     **********************************************/
    public function web_content(){
        $condition      = array('id'=>1);
        $categories     = $this->db->select('*')->where($condition)->get('webcontents')->result_array();
        if ($categories) { return $categories; }
        else {
            return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
        }
    }

    /**********************************************
     * Get Devices Incashed
     **********************************************/
    public function devices_incashed(){
        $condition      = array('is_deleted'=>0,'status'=>3,'status_sale'=>3);
        $devices_incashed     = $this->db->select('SUM(sale_price) AS cashGiven , COUNT(id) as devices')->where($condition)->get('device_sell_requests')->result_array();
        if ($devices_incashed) { return $devices_incashed; }
        else {
            return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
        }
    }
}

?>
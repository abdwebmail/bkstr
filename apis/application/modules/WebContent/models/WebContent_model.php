<?php
/**
 * Created by PhpStorm.
 * User: MkTech
 * Date: 4/17/2019
 * Time: 12:34 AM
 */
include_once APPPATH.'config/project_constants.php';
class WebContent_model extends CI_Model
{
    /**********************************************
     * All Web Content Detail
     **********************************************/
    public function web_content_detail(){
        $content_detail = $this->db->select('*')->get('webcontents')->result_array();
        if ($content_detail) {
            return $content_detail;
        }
        else {
            return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
        }
    }

    /**********************************************
     * Update Web Content Detail
     **********************************************/
    public function web_content_update($data){
        //validation Fields
        if (validate_data($data, 'web_content') !== TRUE) {
            return array('status' => 'FALSE', 'message' => validate_data($data, 'web_content'));
        }
        $content_id = array("id"=>"1");
        $update_on = date('Y-m-d H:i:s');
        $data['updated_on'] = $update_on;
        $update_webContentDetails = $this->db->set($data)->where($content_id)->update('webcontents');

        if($update_webContentDetails){
            return array('status' => 'TRUE', 'message' => 'Web Content Details updated');
        }
        else{
            return array('status' => 'FALSE', 'message' => 'Something Went Wrong while updating web content.');
        }
    }
}

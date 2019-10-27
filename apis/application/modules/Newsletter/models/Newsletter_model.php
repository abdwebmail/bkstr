<?php
/**
 * Created by PhpStorm.
 * User: MkTech
 * Date: 3/15/2019
 * Time: 9:38 PM
 */
include_once APPPATH.'config/project_constants.php';
class Newsletter_model extends CI_Model
{
    public function submit_newsletter($data){
        $condition       = array('email'=>$data['email']);
        $email_check    = $this->db->select('*')->where($condition)->get('tbl_subscribers')->result_array();
        if ($email_check) {
            return array('status' => 'TRUE' , 'message' => 'Thank you, You have already subscribed.');
        }
        else {
            $insert_newsletter = $this->db->insert('tbl_subscribers',$data);
            if($insert_newsletter){
                return array('status' => 'TRUE' , 'message' => 'Thank you, You are successfully subscribed.');
            }
            else{
                return array('status' => 'FALSE' , 'message' => 'Something went wrong');
            }
        }
    }
}
?>
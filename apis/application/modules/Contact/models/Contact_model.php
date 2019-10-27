<?php
/**
 * Created by PhpStorm.
 * User: MkTech
 * Date: 3/15/2019
 * Time: 9:38 PM
 */
include_once APPPATH.'config/project_constants.php';
class Contact_model extends CI_Model
{
    /**********************************************
     * Add contact us mail
     **********************************************/
    public function add_contactus($data){
        //validation Fields
        if (validate_data($data,'add_contactus') !== TRUE){
            return array('status'=> 'FALSE','message'=>validate_data($data,'add_contactus'));
        }
        $secret_key 	= "6LcJWYgUAAAAAF4UQeqJ_8D3frxd0Aj694rudTUK";
        $captcha 		=  $data['g-recaptcha-response'];
        $url 			= "https://www.google.com/recaptcha/api/siteverify?secret=".$secret_key."&response=".$captcha;
        $response_verify = file_get_contents($url);
        $result = json_decode($response_verify, TRUE);
        if($result['success']) {
            unset($data['g-recaptcha-response']);
            $insert_contact_form = $this->db->insert('tbl_mails', $data);
            if ($insert_contact_form) {
                return array('status' => 'TRUE', 'message' => 'Contact submitted.');
            } else {
                return array('status' => 'FALSE', 'message' => 'Something went wrong');
            }
        }else{
            return array('status' => 'FALSE', 'message' => 'Fill Your Re-Captcha.');
        }
    }

    /**********************************************
     * All contact us mails
     **********************************************/
    public function all_mails($data){
        $condition = array('is_deleted'=>0);
        $users = $this->db->select('*')->where($condition)->order_by('submission_date','DESC')
                    ->limit('10',$data['from'])->get('tbl_mails')->result_array();
        if ($users) { return $users; }
        else {
            return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
        }
    }

    /**********************************************
     * Sent mails
     **********************************************/
    public function sent_mails($data){
        $condition = array('is_deleted'=>0);
        $users = $this->db->select('*')->where($condition)->order_by('created_on','DESC')
                    ->limit('10',$data['from'])->get('tbl_mails_sent')->result_array();
        if ($users) { return $users; }
        else {
            return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
        }
    }

    /**********************************************
     * Unread mails
     **********************************************/
    public function unread_mails($data){
        $condition = array('is_deleted'=>0, '_read'=>0);
        $users = $this->db->select('*')->where($condition)->limit('5',$data['from'])->order_by('submission_date','DESC')->get('tbl_mails')->result_array();
        if ($users) { return $users; }
        else {
            return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
        }
    }

    /**********************************************
     * Mail Detail of specific id
     **********************************************/
    public function mail_detail($data){
        //Query
        $current_time =time();
        $current_time = date("Y-m-d H:i:s",$current_time);
        $this->db->set(array('_read'=>'1', 'read_time'=>$current_time))->where(array('id'=>$data['mail_id']))->update('tbl_mails');
        $condition = array('is_deleted'=>0, 'id'=>$data['mail_id']);
        $detail = $this->db->select('*')->where($condition)->get('tbl_mails')->result_array();
        if ($detail) { return $detail; }
        else {
            return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
        }
    }

    /**********************************************
     * Get Number of Total Contact us mails
     **********************************************/
    public function num_of_mails()
    {
        $condition = array('is_deleted'=>0);
        $num_mails = $this->db->where($condition)->count_all_results("tbl_mails");
        if ($num_mails) { return $num_mails; }
        else {
            return 0;
        }
    }
    
    /**********************************************
     * Get Number of sent mails
     **********************************************/
    public function num_of_sent_mails()
    {
        $condition = array('is_deleted'=>0);
        $num_sent_mails = $this->db->where($condition)->count_all_results("tbl_mails_sent");
        if ($num_sent_mails) { return $num_sent_mails; }
        else {
            return 0;
        }
    }

    /**********************************************
     * Get Number of Total Contact us mails
     **********************************************/
    public function num_of_unread_mails()
    {
        $condition = array('is_deleted'=>0, '_read'=>0);
        $num_mails = $this->db->where($condition)->count_all_results("tbl_mails");
        if ($num_mails) { return $num_mails; }
        else {
            return 0;
        }
    }
}
?>
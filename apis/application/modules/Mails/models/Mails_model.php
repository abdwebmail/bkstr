<?php
/**
 * Created by PhpStorm.
 * User: MkTech
 * Date: 4/17/2019
 * Time: 12:34 AM
 */
include_once APPPATH.'config/project_constants.php';
class Mails_model extends CI_Model
{
    /**********************************************
     * Insert mails on queue
     **********************************************/
    public function insert_mails_on_queue($data){
        if(isset($data['individual'])) {
            if (isset($data['individual']) && $data['individual'] == 'yes') {
                //validation Fields
                if (validate_data($data, 'email_to_individual') !== TRUE) {
                    return array('status' => 'FALSE', 'message' => validate_data($data, 'email_to_individual'));
                }
                unset($data['individual']);
                if (filter_var($data['individual_email'], FILTER_VALIDATE_EMAIL)){
                    $data_array = array('email'=>$data['individual_email'] , 'subject'=> $data['subject'], 'message'=>$data['message']);
                    $insert_contact_form = $this->db->insert('tbl_mails_sent', $data_array);

                    if ($insert_contact_form) {
                        return array('status' => 'TRUE', 'message' => 'Mail is in Queue, will send to User soon.');
                    }
                    else {
                        return array('status' => 'FALSE', 'message' => 'Something went wrong');
                    }
                }
                else{
                    return array('status' => 'FALSE', 'message' => 'Incorrect email.');
                }
            }
            else {
                //validation Fields
                if (validate_data($data, 'email_to_module') !== TRUE) {
                    return array('status' => 'FALSE', 'message' => validate_data($data, 'email_to_module'));
                }
                unset($data['individual']);

                $data_array = array('subject'=> $data['subject'], 'message'=>$data['message']);
                $query = ''; $incorrect_emails = array(); $find_com = '.com';

                $email_ids = json_decode($data['email_ids']);
                foreach($email_ids as $table_name){
                    $query .= "SELECT email FROM " . $table_name . " UNION " ;
                }
                $query= preg_replace('/\W\w+\s*(\W*)$/', '$1', $query);

                $query = $this->db->query($query);
                $result_email = $query->result_array();
                if($result_email) {
                    foreach ($result_email as $email) {
                        $email = $email['email'];

                        $pos = strpos($email, $find_com);
                        if ($pos === false) {
                            $incorrect_emails[] = $email;
                        }
                        else {
                            $email = str_replace(' ', '', $email);
                            $email = preg_replace('/\s+/', '', $email);
                            $last_char = substr($email, -1); // returns last character
                            if($last_char == '.'){
                                $email = substr_replace($email ,"",-1);
                            }
                            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                $data_array['email'] = $email;
                                $insert_contact_form = $this->db->insert('tbl_mails_sent', $data_array);
                                if (!$insert_contact_form) {
                                    $incorrect_emails[] = $email;
                                }
                            }
                            else{
                                $incorrect_emails[] = $email;
                            }
                        }
                    }

                    if(!empty($incorrect_emails)){
                        return array('status'=>'TRUE', 'message'=>'Total Emails :  ' . count($result_email) . ", Incorrect : " . count($incorrect_emails) . ". Mail are in Queue, will send to Users soon..");
                    }
                    else
                    {
                        return array('status'=>'TRUE', 'message'=>'All emails are correct. Process is in Queue.');
                    }
                }
                else{
                    return array('status'=>'FALSE', 'message'=>'Something went wrong on email fetching....');
                }
            }
        }
        else{
            return array('status'=>'FALSE', 'message'=>'individual missing');
        }
    }

    /**********************************************
     * Insert mail in QUEUE
     **********************************************/
    public function send_mail(){
        $condition = array('status'=>0,'is_deleted'=>0);
        $sent_emails = $this->db->select('*')->where($condition)->limit('5')->get('tbl_mails_sent')->result_array();
        if ($sent_emails) {
            if(!empty($sent_emails)){
                foreach ($sent_emails as $sent_email){
                    $id         = $sent_email['id'];
                    $email      = $sent_email['email'];
                    $subject    = $sent_email['subject'];
                    $message    = $sent_email['message'];
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $email_status = $this->sendemails->sendEmail($email, $subject, $message);
                        if ($email_status !== TRUE)
                        {
                            echo json_encode(array('status' => 'FALSE' , 'message' => $email));
                        }
                        else{
                            $current_time =time();
                            $current_time = date("Y-m-d H:i:s",$current_time);
                            $update_data_array = array('status'=>1, 'status_time'=>$current_time);
                            $condition_update_status = array('id'=>$id);
                            $update_res = $this->db->set($update_data_array)->where($condition_update_status)->update('tbl_mails_sent');
                            if ($update_res) {
                                echo json_encode(array('status' => 'TRUE' , 'message' => 'Email sent to ' . $email));
                            }
                            else {
                                echo json_encode(array('status' => 'FALSE' , 'message' => 'Email not sent to ' . $email));
                            }
                        }
                    }
                    else{
                        echo json_encode(array('status' => 'FALSE' , 'message' => 'Invalid email...'));
                    }
                }
            }
            else{
                return array('status' => 'FALSE' , 'message' => 'No record find on which email has to be send');
            }
        }
        else {
            return array('status' => 'FALSE' , 'message' => 'No record find on which email has to be send');
        }
    }

    /**********************************************
     * Mail Detail of specific id
     **********************************************/
    public function mail_detail($data){
        $condition = array('is_deleted'=>0, 'id'=>$data['mail_id']);
        $detail = $this->db->select('*')->where($condition)->get('tbl_mails_sent')->result_array();
        if ($detail) { return $detail; }
        else {
            return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
        }
    }
}
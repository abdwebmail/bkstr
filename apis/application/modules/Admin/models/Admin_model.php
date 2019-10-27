<?php
/**
 * Created by PhpStorm.
 * User: MkTech
 * Date: 4/17/2019
 * Time: 12:34 AM
 */
include_once APPPATH.'config/project_constants.php';
class Admin_model extends CI_Model
{
    /**********************************************
     * Add new Admin
     **********************************************/
    public function add_new_admin($data){
    
        //validation Fields
        if (validate_data($data, 'add_admin') !== TRUE) {
            return array('status' => 'FALSE', 'message' => validate_data($data, 'add_admin'));
        }
        //check all possible checks
        $check = email_check($data['email'],'admin');
        if(isset($check['status']) && $check['status'] === 'FALSE') { return $check; }

        // Checking Password
        if($data['password'] != $data['confirm_password']){
            return array('status'=> 'FALSE','message'=>'Password not matched.');
        }
        unset($data['confirm_password']);

        //Converting password
        $data['password'] = md5($data['password']);

        /*send email
        //$email = $this->sendEmail($data);
        if ($email !== TRUE)
        {
            return array('status' => 'FALSE' , 'message' => $email);
        }
        else{*/
            //Query
            $insert_admin = $this->db->insert('admin',$data);
            if($insert_admin) {
                return array('status' => 'TRUE', 'message' => 'Admin successfully registered.');
            }
            else{
                return array('status' => 'FALSE', 'message' => 'Something Went Wrong.');
            }
        //}
    }

    /**********************************************
     * Send Email
     **********************************************/
    public function sendEmail($data)
    {
        $body = '';
        $result = $this->sendemails->sendverificationLink($data['email'],$body);
        return $result;
    }

    /**********************************************
     * Update Admin
     **********************************************/
    public function update_admin($data){
//        return $data;die;
        //validation Fields
        if (validate_data($data, 'update_admin') !== TRUE) {
            return array('status' => 'FALSE', 'message' => validate_data($data, 'update_admin'));
        }
        if(isset($data['password']) && !empty($data['password'])){
            if($data['password'] != $data['confirm_password']){
                return array('status'=>'FALSE','message'=>'password not matched');
            }
            $data['password'] = md5($data['password']);
            unset($data['confirm_password']);
        }
        else{
            unset($data['password']);
            unset($data['confirm_password']);
        }
        $admin_id = array('id'=>$data['admin_id']);
        unset($data['admin_id']);
        $update_admin = $this->db->set($data)->where($admin_id)->update('admin');

        if($update_admin){
            return array('status' => 'TRUE', 'message' => 'Admin updated');
        }
        else{
            return array('status' => 'FALSE', 'message' => 'Something Went Wrong while updating admin.');
        }
    }

    /**********************************************
     * All Admins
     **********************************************/
    public function all_admins(){
        $all_admins = $this->db->select('*')->get('admin')->result_array();
        if ($all_admins) {
            return $all_admins;
        }
        else {
            return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
        }
    }

    /**********************************************
     * Admin Detail against specific id
     **********************************************/
    public function admin_details($data){
        $condition = array('id'=>$data['admin_id']);
        $detail = $this->db->select('*')->where($condition)->get('admin')->result_array();
        if ($detail) { return $detail; }
        else {
            return array('status' => 'FALSE' , 'message' => 'No Result found against this Admin ID');
        }
    }

    /**********************************************
     * Delete Admin
     **********************************************/
    public function del_admin($data){
        if(isset($data['admin_id'])&& !empty($data['admin_id'])) {
            $condition = array('id' => $data['admin_id']);
            $deleted_admin = $this->db->set(array('is_deleted'=>1))->where($condition)->update('admin');

            if ($deleted_admin) {
                return array('status' => 'TRUE', 'message' => 'Admin deleted');
            } else {
                return array('status' => 'FALSE', 'message' => 'Something Went Wrong while deleting admin.');
            }
        }
    }
}

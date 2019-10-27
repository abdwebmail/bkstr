<?php
include_once APPPATH.'config/project_constants.php';

class Users_model extends CI_Model
   {
	/**********************************************
	* Register User
	**********************************************/
	public function register_user($data)
	{
		//validation Fields
		if (validate_data($data,'register_user') !== TRUE){
			return array('status'=> 'FALSE','message'=>validate_data($data,'register_user'));
		}

		//check all possible checks
		$check = $this->simpleValidation($data);
		if(isset($check['status']) && $check['status'] === 'FALSE') { return $check; }

		if($data['password'] != $data['con_password']){
			return array('status'=> 'FALSE','message'=>'Password not matched.');
		}
		unset($data['con_password']);
		//Other Settings
		$data['password'] = md5($data['password']);
		$data['verification_code'] = $this->randomfunctions->generateRandomString(100);

		//send email
		$email = $this->sendEmail($data);
		if ($email !== TRUE)
		{
			return array('status' => 'FALSE' , 'message' => $email);
		}
		else{
			//Query
			$insert_user = $this->db->insert('users',$data);
			if($insert_user) {
				return array('status' => 'TRUE', 'message' => 'User successfully registered.');
			}
			else{
				return array('status' => 'FALSE', 'message' => 'Something Went Wrong.');
			}
		}
	}

	/**********************************************
	 * Get All Registered Users
	 **********************************************/
	public function all_users_get()
	{
		$condition = array('is_deleted'=>0);
		$users = $this->db->select('*')->where($condition)->get('users')->result_array();
		if ($users) { return $users; }
		else {
			return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
		}
	}

	/**********************************************
	 * Get All Subscribers
	 **********************************************/
	public function subscribers_list()
	{
		$subscribers = $this->db->select('*')->get('tbl_subscribers')->result_array();
		if ($subscribers) { return $subscribers; }
		else {
			return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
		}
	}

	/**********************************************
	 * Get Number of Registered Users
	 **********************************************/
	public function get_num_of_users()
	{
		$condition = array('is_deleted'=>0);
		$num_users = $this->db->where($condition)->count_all_results("users");
		if ($num_users) { return $num_users; }
		else {
			return 0;
		}
	}

	/**********************************************
	 * Get Number of Active Users
	 **********************************************/
	public function active_users()
	{
		$condition = array('is_deleted'=>0, 'is_verified'=>1);
		$num_active_users = $this->db->where($condition)->count_all_results("users");
		if ($num_active_users) { return $num_active_users; }
		else {
			return 0;
		}
	}

    /**********************************************
     * Client SignIn
     **********************************************/
    public function client_signin($data){
        unset($data['login-modal']);
        //validation Fields
        if (validate_data($data,'client_signin') !== TRUE){
            return array('status'=> 'FALSE','message'=>validate_data($data,'client_signin'));
        }
        //check email valid or not
        $check = validate_email($data['email']);
        if(isset($check['status']) && $check['status'] === 'FALSE') { return $check; }

        $check_email_exist = $this->db->select('email')->where(array('email'=>$data['email']))->get('users')->result();
        if ($check_email_exist) {
            $data['password'] = md5($data['password']);

            $login_users = $this->db->select('*')->where($data)->get('users')->result_array();

            if ($login_users) {
                return $login_users;
            }
            else {
                return array('status' => 'FALSE', 'message' => 'Invalid Credentials');
            }
        }
        else{
            return array('status' => 'FALSE', 'message' => 'Email not exist.');
        }
    }
    
	/**********************************************
	 * Admin Signin
	 **********************************************/
	public function admin_signin($data){
		//validation Fields
		if (validate_data($data,'client_signin') !== TRUE){
			return array('status'=> 'FALSE','message'=>validate_data($data,'client_signin'));
		}
		//check email valid or not
		$check = validate_email($data['email']);
		if(isset($check['status']) && $check['status'] === 'FALSE') { return $check; }

		$check_email_exist = $this->db->select('email')->where(array('email'=>$data['email']))->get('admin')->result();
		if ($check_email_exist) {
			$data['password'] = md5($data['password']);

			$login_users = $this->db->select('*')->where($data)->get('admin')->result_array();

			if ($login_users) {
				if($login_users[0]['is_deleted'] == '1'){
					return array('status'=>'FALSE','message'=>'Your account has been deleted');
				}
				if($login_users[0]['is_active'] == '0'){
					return array('status'=>'FALSE','message'=>'Your account is not active, Please contact to management.');
				}
				return $login_users;
			}
			else {
				return array('status' => 'FALSE', 'message' => 'Invalid Credentials');
			}
		}
		else{
			return array('status' => 'FALSE', 'message' => 'Email not exist.');
		}
	}
	
	/**********************************************
	 * check all possible checks
	 **********************************************/
	private function simpleValidation($data)
	{
		// Check Space in User Name
		if ( preg_match('/\s/',trim($data['email'])) ){
			return array('status'=> 'FALSE','message'=>'User Email is invalid.Please Enter Email with proper format.');
		}

		// Check Email exists or not
		$condition = array('email' => trim($data['email']));
		$result = $this->db->select('email')->where($condition)->get('users')->result();
		if ($result) {
			return array('status'=> 'FALSE','message'=>'Email is already used. Please try different one.');
		}
		return true;
	}

	/**********************************************
	 * Verify EMail
	 **********************************************/
	public function verify_email($data)
	{
		$set = array('is_verified_email'=>1);
		$q = $this->db->set($set)->where($data)->update('users');
		if ($q) { return array('status' => 'TRUE' , 'message' => 'User Verified Successfully.'); }
		else {
			return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
		}
	}

	/**********************************************
	* Send Email
	**********************************************/
	public function sendEmail($data)
	{
		$link = EMAIL_SERVER.'verify_email?first_name='.$data['first_name'].'&verification_code='.$data['verification_code'];
		$body = '<a href="'.$link.'">'. $link .'</a>';
		$result = $this->sendemails->sendverificationLink($data['email'],$body);
		return $result;
	}

	/**********************************************
	* Update User
	**********************************************/
	public function update_user($data)
	{
		//validation Fields
		if (validate_data($data,'update_user') !== TRUE)
		{
			return array('status'=> 'FALSE','message'=>validate_data($data,'update_user'));
		}
		if (check_user_if_exist($data['user_id']) !== TRUE)
		{
			return array('status'=> 'FALSE','message'=>check_user_if_exist($data));
		}

		//check all possible checks
		$check = $this->simpleValidation($data);
		if(isset($check['status']) && $check['status'] === 'FALSE'){ return $check; }

		//Other Settings
		if(!$this->isChangePassword($data))
		{
			$data['user_password'] = md5($data['user_password']);
		}
		$id = $data['user_id']; unset($data['user_id']);
		$condition = array('user_id =' => $id);
		//Query
		$this->db->set($data)->where($condition)->update('tbl_user_info');

		// Get Inserted data
		$q = $this->db->get_where('tbl_user_info', array('user_id' => $id));
		if ($q) { return array($q->row()); }
		else {
			return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
		}
	}

	/**********************************************
	 * Is Password Changed
	 **********************************************/
	private function isChangePassword($data)
	{
		$condition = array('user_password' => trim($data['user_password']),'user_id' => $data['user_id']);
		$result = $this->db->select('user_password')->where($condition)->get('tbl_user_info')->result();
		if ($result) { return TRUE;  }
		else { return FALSE; }
	}
	
	/**********************************************
	* Get All Users
	**********************************************/
	public function all_users_info_get()
	{
		$condition = array('is_delete'=>0,'is_active'=>1);
		$users = $this->db->select('tbl_user_info.user_id,tbl_user_info.first_name,tbl_user_info.last_name,tbl_user_info.user_email,tbl_user_images.profile_image')
			->join('tbl_user_images','tbl_user_images.user_id=tbl_user_info.user_id','left')
			->where($condition)->get('tbl_user_info')->result_array();
		if ($users) { return $users; }
		else {
			return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
		}
	}

	/**********************************************
	* Delete User
	**********************************************/
	public function del_users($id)
	{
		$set = array('is_delete'=>1); $condition = array('user_id'=> $id);
		$this->db->set($set)->where($condition)->update('tbl_user_info');
		return TRUE;
	}

	/**********************************************
	* Update User
	**********************************************/
	public function status($data)
	{
		//validation Fields
		if (validate_data($data,'status_user') !== TRUE)
		{
			return array('status'=> 'FALSE','message'=>validate_data($data,'status_user'));
		}

		$id = $data['user_id']; unset($data['user_id']);
		$condition = array('user_id =' => $id);
		//Query
		$this->db->set($data)->where($condition)->update('tbl_user_info');

		// Get Inserted data
		$q = $this->db->get_where('tbl_user_info', array('user_id' => $id));
		if ($q) { return array($q->row()); }
		else {
			return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
		}
	}

	/**********************************************
	* Update Badge
	**********************************************/
	public function update_user_badge($data)
	{
		//validation Fields
		if (validate_data($data,'update_user_badge') !== TRUE)
		{
			return array('status'=> 'FALSE','message'=>validate_data($data,'update_user_badge'));
		}
		if (check_user_if_exist($data['user_id']) !== TRUE)
		{
			return array('status'=> 'FALSE','message'=>check_user_if_exist($data));
		}
		$id = $data['user_id']; unset($data['user_id']);
		$condition = array('user_id =' => $id);
		//Query
		$q = $this->db->set($data)->where($condition)->update('tbl_user_info');

		if ($q) {
			return array('status' => 'TRUE' , 'message' => 'Badge updated successfully.');
		}
		else {
			return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
		}
	}

}
 ?>

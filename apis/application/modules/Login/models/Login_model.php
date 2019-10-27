<?php
include_once APPPATH.'config/project_constants.php';
class Login_model extends CI_Model
   {
 /**********************************************
 * authenticate User
 **********************************************/
   public function authenticate_user($data)
   {
      //validation Fields
      if (validate_data($data,'authenticate_user') !== TRUE)
      {
         return array('status'=> 'FALSE','message'=>validate_data($data,'authenticate_user'));
      }
      $data['user_password'] = md5($data['user_password']);
      $row = $this ->db -> select('*')-> where($data)-> get('tbl_user_info')-> num_rows();
      if ($row > 0) {
         $query = $this->db->set('last_login',date('Y-m-d H:i:s'))
                          -> where($data)
                          -> update('tbl_user_info');
         if ($query)
         {
            $query = $this ->db -> select('*') -> where('is_verified',1)
                             -> where($data) -> get ('tbl_user_info')
                             -> result();
            if ($query)
            {
               $query = $this->db -> select('*') -> where('is_verified_email',1)
                               -> where($data) -> get ('tbl_user_info') -> result();
               if ($query)
               {
                  $block = $this ->db -> select('*')-> where('is_active',1)
                                 -> where($data)-> get ('tbl_user_info') -> num_rows();
                  if ($block > 0)
                  {
                     $block = $this ->db -> select('tbl_user_info.user_id,tbl_user_info.first_name,tbl_user_info.last_name,tbl_user_info.user_email,tbl_user_info.badge_id,tbl_user_images.profile_image')
                        ->join('tbl_user_images','tbl_user_images.user_id=tbl_user_info.user_id','left')
                        -> where($data)
                        -> get('tbl_user_info');
                     return array($block->row());
                  }
                  else { return array('status' => 'FALSE' , 'message' => 'User is Blocked'); }
               }
               else { return array('status' => 'FALSE' , 'message' => 'User Email is not verified'); }
            }
            else { return array('status' => 'FALSE' , 'message' => 'User is not verified'); }
         }
         else { return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.'); }
      }
      else { return array('status' => 'FALSE' , 'message' => 'Invalid Credentials.'); }
   }
   /**********************************************
    * Recover User Password
    **********************************************/
   public function recover_password($data)
      {
         //validation Fields
         if (validate_data($data,'recover_password') !== TRUE)
            {
               return array('status'=> 'FALSE','message'=>validate_data($data,'recover_password'));
            }
         $row = $this ->db -> select('*') -> where($data) -> get('tbl_user_info') -> num_rows();
         if ($row > 0)
            {
               $row = $this ->db -> select('*') -> where($data) -> get('tbl_user_info');
               $data = $row->row();
               //send email
               $email = $this->sendEmail($data);
               if ($email != TRUE) {
                  return array('status' => 'FALSE', 'message' => $email);
               }
               return array('status' => 'TRUE', 'message' => 'Email sent. Please check your Email.');
            }
         else { return array('status' => 'FALSE' , 'message' => 'Email invalid.'); }
      }
   /**********************************************
    * Send Email
    **********************************************/
   public function sendEmail($data)
      {
         $link = EMAIL_SERVER.'change_user_password?user_name='.$data->user_name.'&email_verify_code='.$data->user_password;
         $result = $this->sendemails->sendverificationLink($data->user_email,$link);
         return $result;
      }
/**********************************************
 * Change User Password
 **********************************************/
   public function change_user_password($data)
      {
         //validation Fields
         if (validate_data($data,'change_user_password') !== TRUE)
            {
               return array('status'=> 'FALSE','message'=>validate_data($data,'change_user_password'));
            }
         if (check_user_name_if_exist($data['user_name']) !== TRUE)
         {
            return array('status'=> 'FALSE','message'=>check_user_name_if_exist($data['user_name']));
         }
         $condition = array('user_name'=>$data['user_name'],'user_password'=>$data['old_user_password']);
         $row = $this ->db -> select('*') -> where($condition) -> get('tbl_user_info') -> num_rows();
         if ($row > 0)
            {
               $row = $this ->db -> set('user_password',md5($data['new_user_password'])) -> where($condition) -> update('tbl_user_info');
               if ($row) { return array('status' => 'FALSE', 'message' => 'Password reset Successfully');}

               else { return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.'); }
            }
         else { return array('status' => 'FALSE' , 'message' => 'Invalid Credentials.'); }
      }
	}
 ?>

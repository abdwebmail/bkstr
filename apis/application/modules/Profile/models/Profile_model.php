<?php
class Profile_model extends CI_Model
{
	/**********************************************
	 * RUpload Profile Image
	 **********************************************/
	public function profile_image($data)
	{
		//validation Fields
		if (validate_data($data, 'profile_image') !== TRUE) {
			return array('status' => 'FALSE', 'message' => validate_data($data, 'profile_image'));
		}
		$user_id = $data['user_id']; $img = $data['profile_image']; unset($data['profile_image']);
		$img = base64_decode($img);
		$image_name = uniqid() . '.webp';
		$img_path = directory_name('UPLOAD_PROFILE_DIR') . $image_name;
		$move = file_put_contents($img_path, $img);
		if ($move) {
			$data = array('user_id'=>$user_id, 'profile_image'=> $image_name);
			$q = $this->db->get_where('tbl_user_images',array('user_id'=>$user_id));
			if ($q = $q->row())
			{
				unlink(directory_name('UPLOAD_PROFILE_DIR').trim($q->profile_image));
				$qu = $this->db->set('profile_image',$data['profile_image'])->where(array('user_id'=>$user_id))->update('tbl_user_images');
				if ($qu) {
					return array('status' => 'TRUE', 'message' => 'Profile Image Update Successfully.');
				} else {
					return array('status' => 'FALSE', 'message' => 'Something Went Wrong while adding Profile Image.');
				}
			}
			else
			{
				$qu = $this->db->insert('tbl_user_images', $data);
				if ($qu) {
					return array('status' => 'TRUE', 'message' => 'Profile Image Added Successfully.');
				} else {
					return array('status' => 'FALSE', 'message' => 'Something Went Wrong while updating Profile Image.');
				}
			}
		}
	}
   	/**********************************************
    * RUpload Cover Image
    **********************************************/
   	public function cover_image($data)
   {
      //validation Fields
      if (validate_data($data, 'cover_image') !== TRUE) {
         return array('status' => 'FALSE', 'message' => validate_data($data, 'profile_image'));
      }
      $user_id = $data['user_id']; $img = $data['cover_image']; unset($data['cover_image']);
      $img = base64_decode($img);
      $image_name = uniqid() . '.webp';
      $img_path = directory_name('UPLOAD_COVER_DIR') . $image_name;
      $move = file_put_contents($img_path, $img);
      if ($move) {
         $data = array('user_id'=>$user_id, 'cover_image'=> $image_name);
         $q = $this->db->get_where('tbl_user_images',array('user_id'=>$user_id));
         if ($q = $q->row())
         {
            unlink(directory_name('UPLOAD_COVER_DIR').trim($q->cover_image));
            $qu = $this->db->set('cover_image',$data['cover_image'])->where(array('user_id'=>$user_id))->update('tbl_user_images');
            if ($qu) {
               return array('status' => 'TRUE', 'message' => 'Cover Image Update Successfully.');
            } else {
               return array('status' => 'FALSE', 'message' => 'Something Went Wrong while adding Cover Image.');
            }
         }
         else
         {
            $qu = $this->db->insert('tbl_user_images', $data);
            if ($qu) {
               return array('status' => 'TRUE', 'message' => 'Cover Image Added Successfully.');
            } else {
               return array('status' => 'FALSE', 'message' => 'Something Went Wrong while updating Cover Image.');
            }
         }
      }
   }
	/**********************************************
	 * Submit User Bio
	 **********************************************/
	public function userBio($data)
	{
		$user_id 	= $data['user_id'];
		$user_bio 	= $data['text_userBio'];
		$data = array('user_id'=>$user_id, 'user_bio'=> $user_bio);

		$q = $this->db->get_where('tbl_user_info',array('user_id'=>$user_id));
		if ($q = $q->row())
		{
			$qu = $this->db->set('user_bio',$data['user_bio'])->where(array('user_id'=>$user_id))->update('tbl_user_info');
			if ($qu) {
				return array('status' => 'TRUE', 'message' => 'User Bio Update Successfully.');
			} else {
				return array('status' => 'FALSE', 'message' => 'Something Went Wrong.');
			}
		}
		else
		{
			return array('status' => 'FALSE', 'message' => 'User Bio can not add, User not exist.');
		}
	}
	/**********************************************
	 * User Bio GET
	 **********************************************/
	public function users_bio_get(){
		$condition = array('is_delete'=>0,'is_active'=>1);
		$users = $this->db->select('*')->where($condition)->get('tbl_user_info')->result_array();
		if ($users) { return $users; }
		else {
			return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
		}
	}
	/**********************************************
	 * User Complete Bio GET
	 **********************************************/
	public function get_user_complete_bio(){
		$condition = array('tbl_user_info.is_delete'=>0,'tbl_user_info.is_active'=>1);

		$users = $this->db->select('tbl_user_info.user_id as user_id, tbl_user_info.first_name as first_name, tbl_user_info.last_name as last_name, tbl_user_info.user_bio as user_bio, tbl_user_info.user_email as user_email, tbl_user_info.last_login as last_login, tbl_user_info.created_by as created_by, tbl_user_info.created_on as created_on, tbl_badges.badge_name as badge_name, tbl_user_images.cover_image as cover_image, tbl_user_images.profile_image as profile_image, tbl_bank_info.bank_account_id as bank_account_id, tbl_bank_info.bank_name as bank_name, tbl_bank_info.bank_info as bank_info, tbl_bank_info.phone_number as phone_number, tbl_bank_info.postal_address as postal_address, tbl_bank_info.address as address')->from('tbl_user_info')
			->join('tbl_badges', 'tbl_user_info.badge_id = tbl_badges.badge_id','left')
			->join('tbl_bank_info', 'tbl_user_info.user_id = tbl_bank_info.user_id','left')
			->join('tbl_user_images', 'tbl_user_images.user_id = tbl_user_info.user_id','left')->where($condition)->get()->result_array();

		if ($users) { return $users; }
		else {
			return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
		}
	}
	/**********************************************
	 * User Bank Info
	 **********************************************/
	public function get_user_bank_info_by_id($data){
		$condition = array('is_deleted'=>0,'is_active'=>1);
		$result = $this->db->select('*')->where($condition)->where_in('user_id',$data['user_id'])->get('tbl_bank_info')->result_array();
		if ($result) { return $result; }
		else {
			return array('status' => 'FALSE' , 'message' => 'No Record Found.');
		}
	}
	/**********************************************
	 * User Category
	 **********************************************/
    public function category_management($data)
      {
         //validation Fields
         if (validate_data($data, 'category_management') !== TRUE) {
            return array('status' => 'FALSE', 'message' => validate_data($data, 'category_management'));
         }
         if (check_user_if_exist($data['user_id']) !== TRUE)
         {
            return array('status'=> 'FALSE','message'=>check_user_if_exist($data['user_id']));
         }
         if (check_user_if_block($data['user_id']) !== TRUE)
         {
            return array('status'=> 'FALSE','message'=>check_user_if_block($data['user_id']));
         }
         $user_id = $data['user_id'];
         $categories = explode(',',$data['category_id']);
         $sub_categories = explode(',',$data['sub_category_id']);
         $skills = explode(',',$data['skill_id']);

         $this->db->trans_start();

         //categories
         $this->db->where('user_id',$user_id)->delete('tbl_user_in_category');
         for ($i = 0; $i < count($categories); $i++)
         {
            $array_c = array('category_id'=>$categories[$i],'user_id'=>$user_id);
            $this->db->set($array_c);
            $this->db->insert('tbl_user_in_category');
         }

         //sub categories
         $this->db->where('user_id',$user_id)->delete('tbl_user_in_sub_category');
         for ($j = 0; $j < count($sub_categories); $j++)
         {
            $array_s_c = array('sub_category_id'=>$sub_categories[$j],'user_id'=>$user_id);
            $this->db->set($array_s_c);
            $this->db->insert('tbl_user_in_sub_category');
         }

         //Skills
         $this->db->where('user_id',$user_id)->delete('tbl_user_in_skills');
         for ($k = 0; $k < count($skills); $k++)
         {
            $array_s = array('skill_id'=>$skills[$k],'user_id'=>$user_id);
            $this->db->set($array_s);
            $this->db->insert('tbl_user_in_skills');
         }

         $this->db->trans_complete();

         if ($this->db->trans_status() === true) { return array('status' => 'TRUE' , 'message' => 'Value Saved Successfully'); }
         else { return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.'); }

      }

	/**********************************************
	 * Countries
	 **********************************************/
	public function countries_get(){
		$condition = array('is_delete'=>0,'is_active'=>1);
		$result = $this->db->select('*')->where($condition)->get('tbl_countries')->result_array();
		if ($result) { return $result; }
		else {
			return array('status' => 'FALSE' , 'message' => 'No Record Found.');
		}
	}

	/**********************************************
	 * States
	 **********************************************/
	public function get_states_by_country_id($data){
		$condition = array('tbl_states.is_delete'=>0,'tbl_states.is_active'=>1);
		$result = $this->db->select('*')->where($condition)->where_in('country_id',$data['country_id'])->get('tbl_states')->result_array();
		if ($result) { return $result; }
		else {
			return array('status' => 'FALSE' , 'message' => 'No Record Found.');
		}
	}

	/**********************************************
	 * Cities
	 **********************************************/
	public function get_cities_by_state_id($data){
		$condition = array('tbl_cities.is_delete'=>0,'tbl_cities.is_active'=>1);
		$result = $this->db->select('*')->where($condition)->where_in('state_id',$data['state_id'])->get('tbl_cities')->result_array();
		if ($result) { return $result; }
		else {
			return array('status' => 'FALSE' , 'message' => 'No Record Found.');
		}
	}

	/**********************************************
	 * Add User Bank Info
	 **********************************************/
	public function add_user_bank_info($data)
	{
		//validation Fields
		if (validate_data($data, 'bank_info') !== TRUE) {
			return array('status' => 'FALSE', 'message' => validate_data($data, 'bank_info'));
		}
		if (check_user_if_exist($data['user_id']) !== TRUE)
		{
			return array('status'=> 'FALSE','message'=>check_user_if_exist($data['user_id']));
		}
		if (check_user_if_block($data['user_id']) !== TRUE)
		{
			return array('status'=> 'FALSE','message'=>check_user_if_block($data['user_id']));
		}

		//Query
		$this->db->insert('tbl_bank_info',$data);

		// Get Inserted data
		$id = $this->db->insert_id();
		$q = $this->db->get_where('tbl_bank_info', array('bank_account_id' => $id));
		if ($q) { return array($q->row()); }
		else {
			return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
		}
	}

	/**********************************************
	 * Update User Bank Info
	 **********************************************/
	public function update_user_bank_info($data)
	{
		//validation Fields
		if (validate_data($data, 'bank_info') !== TRUE) {
			return array('status' => 'FALSE', 'message' => validate_data($data, 'bank_info'));
		}
		if (check_user_if_exist($data['user_id']) !== TRUE)
		{
			return array('status'=> 'FALSE','message'=>check_user_if_exist($data['user_id']));
		}
		if (check_user_if_block($data['user_id']) !== TRUE)
		{
			return array('status'=> 'FALSE','message'=>check_user_if_block($data['user_id']));
		}

		$bank_account_id = $data['bank_account_id']; unset($data['bank_account_id']);
		$condition = array('bank_account_id =' => $bank_account_id);

		$this->db->set($data)->where($condition)->update('tbl_bank_info');

		// Get Inserted data
		$q = $this->db->get_where('tbl_bank_info', array('bank_account_id' => $bank_account_id));
		if ($q) { return array($q->row()); }
		else {
			return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
		}

	}

	/**********************************************
	 * User Skills
	 **********************************************/
	public function user_skills($data){
		$condition = array('tbl_user_in_skills.is_active'=>1,'tbl_skills.is_active'=>1,'tbl_skills.is_delete'=>0,'tbl_user_in_skills.user_id'=>$data['user_id']);
		$result = $this->db->select('tbl_user_in_skills.skill_id, tbl_skills.skill_name')->from('tbl_skills')
			->join('tbl_user_in_skills','tbl_user_in_skills.skill_id=tbl_skills.skill_id')
			->where($condition)->get()->result_array();
		if ($result) { return $result; }
		else {
			return array('status' => 'FALSE' , 'message' => 'No Record Found.');
		}
	}
}
?>

<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 1/7/2019
 * Time: 9:45 AM
 */
	function return_default_array_values($array_name)
	{
		$data_array = array(
			'client_signin' => array('email','password',),
			'register_user' => array('first_name','last_name','email','contact','password','con_password','country','city','address',),
			'add_device_req' => array('first_name','email','contact','device_type','device_company','device_model','space','device_condition','available_time','selling_type',),
			'add_contactus' => array('user_name','email','selling_type','contact','message',),
			'email_to_individual' => array('individual','individual_email','subject','message',),
			'email_to_module' => array('individual','email_ids','subject','message',),
			'comment_sellingReq' => array('req_id','comment',),
			'update_evaluation_status' => array('req_id','evaluated_price','evaluation_status',),
			'update_sale_status' => array('req_id','sale_price','status_sale',),

			'add_device_buy_req' => array('device_id','client_name','client_email','client_contact','received_through',),
			'comment_buyingReq' => array('req_id','comment',),
			'update_buying_status' => array('req_id','buying_price','evaluation_status',),
			'comment_buyingReq' => array('req_id','buying_comment',),
			'update_buy_status' => array('req_id','buy_price','status_buy','device_id',),

			'add_deviceCategory' => array('category_name','category_detail','image_name','category_image',),
			'update_deviceCategory' => array('category_id','category_name','category_detail',),
			'update_deviceCategory_img' => array('category_id','category_name','category_detail','image_name','category_image',),
			
			'add_deviceBrand' => array('brand_name','brand_detail','image_name','brand_image',),
			'update_deviceBrand' => array('brand_id','category_id','brand_name','brand_detail',),
			'update_deviceBrand_img' => array('brand_id','category_id','brand_name','brand_detail','image_name','brand_image',),

			'add_deviceProduct' => array('category_id','brand_id','top_product','product_model','stock','new_price','product_detail','image_name','product_image',),
			'update_deviceProduct' => array('product_id','category_id','brand_id','top_product','stock','product_model','new_price','product_detail',),
			'update_deviceProduct_img' => array('product_id','category_id','brand_id','top_product','stock','product_model','new_price','product_detail','image_name','product_image',),

			'add_admin' => array('admin_name','email','password','confirm_password','contact','admin_privileges',),
			'update_admin' => array('admin_id','admin_name','email','contact','admin_privileges'),

			'add_location' => array('place_heading','place_detail','country','state','city','address','contact','google_iframe',),
			'update_location' => array('location_id','place_heading','place_detail','country','state','city','address','contact',),

			'web_content' => array('contact_num','address','office_time',),
		);
	   if(isset($data_array[$array_name]))
		  {
			 return $data_array[$array_name];
		  }
	   return array();

	}


	/**********************************************
	* Check Validation Function
	**********************************************/
	function validate_data($data,$array_name)
   {
      $array = return_default_array_values($array_name);
      for ($i = 0; $i < count($array); $i++)
      {
         if (!isset($data[$array[$i]]))
         {
            $result = 'Post data ('.$array[$i]. ') is missing.';
            return $result;
         }
         else if (empty($data[$array[$i]]))
         {
            $result = 'Post data ('.$array[$i]. ') is empty.';
            return $result;
         }
      }
      return TRUE;
   }

   /**********************************************
	* check user if exist
	**********************************************/
	function check_user_if_exist($user_id)
	{
		$CI =& get_instance();
		$q = $CI->db->get_where('tbl_user_info', array('user_id' => $user_id,'is_delete'=>0))->result();
		if ($q) { return TRUE; } else { return 'User not Found'; }
		return TRUE;
	}
	
	/**********************************************
	 * check all possible checks for email
	 **********************************************/
	function email_check($email,$table){
		// Check Space in User Name
		if ( preg_match('/\s/',trim($email)) ){
			return array('status'=> 'FALSE','message'=>'User Email is invalid.Please Enter Email with proper format.');
		}

		$CI =& get_instance();
		// Check Email exists or not
		$condition = array('email' => trim($email));
		$result = $CI->db->select('email')->where($condition)->get($table)->result();
		if ($result) {
			return array('status'=> 'FALSE','message'=>'Email is already used. Please try different one.');
		}
		return true;
	}

	/**********************************************
	* check user if block
	**********************************************/
	function check_user_if_block($user_id)
	{
		$CI =& get_instance();
		$q = $CI->db->get_where('tbl_user_info', array('user_id' => $user_id,'is_verified'=>1))->result();
		if ($q) { return TRUE; } else { return 'User is blocked'; }
		return TRUE;
	}

	function validate_email($user_email){
		// Check Space in User Name
		if ( preg_match('/\s/',trim($user_email)) ){
			return array('status'=> 'FALSE','message'=>'User Email is invalid.Please Enter Email with proper format.');
		}
	}
	

?>

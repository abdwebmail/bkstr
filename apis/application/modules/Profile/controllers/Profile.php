<?php
use Restserver\Libraries\REST_Controller;
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class Profile extends REST_Controller  {
	function __construct()
	{
		parent::__construct();
		$this->load->model("profile_model");
	}

	/**********************************************
	* Upload Profile Image
	**********************************************/
	public function profile_image_post()
	{
		$data = $this->security->xss_clean($_POST);
		$data = $this->profile_model->profile_image($data);

		if (isset($data['status']) == 'FALSE')
		{
			$this->response($data, REST_Controller::HTTP_SEE_OTHER);
		}
		$this->set_response($data, REST_Controller::HTTP_CREATED);
	}
   	/**********************************************
    * Upload Cover Image
    **********************************************/
   	public function cover_image_post()
   {
      $data = $this->security->xss_clean($_POST);
      $data = $this->profile_model->cover_image($data);

      if (isset($data['status']) == 'FALSE')
      {
         $this->response($data, REST_Controller::HTTP_SEE_OTHER);
      }
      $this->set_response($data, REST_Controller::HTTP_CREATED);
   }
   /**********************************************
    * User Category
    **********************************************/
   public function category_management_post()
   {
      $data = $this->security->xss_clean($_POST);
      $data = $this->profile_model->category_management($data);

      if (isset($data['status']) == 'FALSE')
      {
         $this->response($data, REST_Controller::HTTP_SEE_OTHER);
      }
      $this->set_response($data, REST_Controller::HTTP_CREATED);
   }
	/**********************************************
	 * Upload User Bio
	**********************************************/
	public function userBio_post(){
//		$data = $this->security->xss_clean($_POST);
		$data = $_POST;
		$data = $this->profile_model->userBio($data);
		if (isset($data['status']) == 'FALSE')
		{
			$this->response($data, REST_Controller::HTTP_SEE_OTHER);
		}
		$this->set_response($data, REST_Controller::HTTP_CREATED);
	}
	/**********************************************
	* Getting User Bio By ID
	**********************************************/
	public function get_user_bio_get(){
		$users = $this->profile_model->users_bio_get();
		$id = $this->get('user_id');
		if ($id === NULL)
		{
			if ($users)
			{
				$this->response($users, REST_Controller::HTTP_OK);
			}
			else
			{
				$this->response([
					'status' => FALSE,
					'message' => 'No users were found'
				], REST_Controller::HTTP_NOT_FOUND);
			}
		}
		$id = (int) $id;
		if ($id <= 0)
		{
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
		}
		$user = NULL;
		if (!empty($users))
		{
			foreach ($users as $key => $value)
			{
				if (isset($value['user_id']) && (int) $value['user_id'] === $id)
				{
					$user = $value;
				}
			}
		}
		if (!empty($user))
		{
			$this->set_response($user, REST_Controller::HTTP_OK);
		}
		else
		{
			$this->set_response([
				'status' => FALSE,
				'message' => 'User could not be found'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}
	/**********************************************
	 * Getting Complete Bio By ID
	 **********************************************/
	public function get_complete_bio_get(){
		$users = $this->profile_model->get_user_complete_bio();
		$id = $this->get('user_id');
		if ($id === NULL)
		{
			if ($users)
			{
				$this->response($users, REST_Controller::HTTP_OK);
			}
			else
			{
				$this->response([
					'status' => FALSE,
					'message' => 'No users were found'
				], REST_Controller::HTTP_NOT_FOUND);
			}
		}
		$id = (int) $id;
		if ($id <= 0)
		{
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
		}
		$user = NULL;
		if (!empty($users))
		{
			foreach ($users as $key => $value)
			{
				if (isset($value['user_id']) && (int) $value['user_id'] === $id)
				{
					$user = $value;
				}
			}
		}
		if (!empty($user))
		{
			$this->set_response($user, REST_Controller::HTTP_OK);
		}
		else
		{
			$this->set_response([
				'status' => FALSE,
				'message' => 'User could not be found'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}
	/**********************************************
	 * Getting User Bank Detail By ID
	 **********************************************/
	public function get_user_bank_info_post(){

		$data = $this->security->xss_clean($_POST);
		$data = $this->profile_model->get_user_bank_info_by_id($data);
		if (isset($data['status']) == 'FALSE')
		{
			$this->response($data, REST_Controller::HTTP_SEE_OTHER);
		}
		$this->set_response($data, REST_Controller::HTTP_CREATED);
	}
	/**********************************************
	 * Countries
	 **********************************************/
	public function countries_get(){
		$users = $this->profile_model->countries_get();
		$id = $this->get('id');
		if ($id === NULL)
		{
			if ($users)
			{
				$this->response($users, REST_Controller::HTTP_OK);
			}
			else
			{
				$this->response([
					'status' => FALSE,
					'message' => 'No Country were found'
				], REST_Controller::HTTP_NOT_FOUND);
			}
		}
		$id = (int) $id;
		if ($id <= 0)
		{
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
		}
		$user = NULL;
		if (!empty($users))
		{
			foreach ($users as $key => $value)
			{
				if (isset($value['country_id']) && (int) $value['country_id'] === $id)
				{
					$user = $value;
				}
			}
		}
		if (!empty($user))
		{
			$this->set_response($user, REST_Controller::HTTP_OK);
		}
		else
		{
			$this->set_response([
				'status' => FALSE,
				'message' => 'Country could not be found'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}
	/**********************************************
	 * States
	 **********************************************/
	public function states_post(){
		$data = $this->security->xss_clean($_POST);
		$data = $this->profile_model->get_states_by_country_id($data);
		if (isset($data['status']) == 'FALSE')
		{
			$this->response($data, REST_Controller::HTTP_SEE_OTHER);
		}
		$this->set_response($data, REST_Controller::HTTP_CREATED);
	}
	/**********************************************
	 * Cities
	 **********************************************/
	public function cities_post(){
		$data = $this->security->xss_clean($_POST);
		$data = $this->profile_model->get_cities_by_state_id($data);
		if (isset($data['status']) == 'FALSE')
		{
			$this->response($data, REST_Controller::HTTP_SEE_OTHER);
		}
		$this->set_response($data, REST_Controller::HTTP_CREATED);
	}
	/**********************************************
	 * Add User Bank Info
	 **********************************************/
	public function add_user_bank_info_post()
	{
		$data = $this->security->xss_clean($_POST);
		$data = $this->profile_model->add_user_bank_info($data);

		if (isset($data['status']) == 'FALSE')
		{
			$this->response($data, REST_Controller::HTTP_SEE_OTHER);
		}
		$this->set_response($data, REST_Controller::HTTP_CREATED);
	}
	/**********************************************
	* Update User Bank Info
	**********************************************/
	public function update_user_bank_info_post()
	{
		$data = $this->security->xss_clean($_POST);
		$data = $this->profile_model->update_user_bank_info($data);

		if (isset($data['status']) == 'FALSE')
		{
			$this->response($data, REST_Controller::HTTP_SEE_OTHER);
		}
		$this->set_response($data, REST_Controller::HTTP_CREATED);
	}
	/**********************************************
	* User Skills
	**********************************************/
	public function user_skills_post(){
		$data = $this->security->xss_clean($_POST);
		$data = $this->profile_model->user_skills($data);
		if (isset($data['status']) == 'FALSE')
		{
			$this->response($data, REST_Controller::HTTP_SEE_OTHER);
		}
		$this->set_response($data, REST_Controller::HTTP_CREATED);
	}
}
?>

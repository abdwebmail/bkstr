<?php
use Restserver\Libraries\REST_Controller;
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class Login extends REST_Controller  {
	function __construct()
   {
      parent::__construct();
      $this->load->model("login_model");
   }

	/**********************************************
	* Authenticate User
	**********************************************/
	public function authenticate_user_post()
	{
	  $data = $this->security->xss_clean($_POST);
	  $data = $this->login_model->authenticate_user($data);
	  if (isset($data['status']) == 'FALSE')
	  {
		 $this->response($data, REST_Controller::HTTP_SEE_OTHER);
	  }
	  $this->set_response($data, REST_Controller::HTTP_CREATED);
	}
	/**********************************************
	* Recover User Password
	**********************************************/
	public function recover_password_post()
	{

	  $data = $this->security->xss_clean($_POST);
	  $data = $this->login_model->recover_password($data);
	  if (isset($data['status']) == 'FALSE')
	  {
		 $this->response($data, REST_Controller::HTTP_SEE_OTHER);
	  }
	  $this->set_response($data, REST_Controller::HTTP_CREATED);
	}
	/**********************************************
    * Change User Password
    **********************************************/
	public function change_user_password_post()
         {

            $data = $this->security->xss_clean($_POST);
            $data = $this->login_model->change_user_password($data);
            if (isset($data['status']) == 'FALSE')
               {
                  $this->response($data, REST_Controller::HTTP_SEE_OTHER);
               }
               $this->set_response($data, REST_Controller::HTTP_CREATED);
         }
}

<?php
/**
 * Created by PhpStorm.
 * User: MkTech
 * Date: 3/15/2019
 * Time: 9:37 PM
 */
use Restserver\Libraries\REST_Controller;
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class Newsletter extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("Newsletter_model");
    }

    /**********************************************
     * Get All Device Categories
     **********************************************/
    public function submit_newsletter_post(){
        $data   = $this->security->xss_clean($_POST);
        $data   = $this->Newsletter_model->submit_newsletter($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }
}
?>
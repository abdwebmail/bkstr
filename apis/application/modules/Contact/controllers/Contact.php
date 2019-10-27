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
class Contact extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Karachi");
        $this->load->model("Contact_model");
    }

    /**********************************************
     * Submit Contact Us Form
     **********************************************/
    public function add_contactus_post(){
        $data   = $this->security->xss_clean($_POST);
        $data   = $this->Contact_model->add_contactus($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * All Contact us mails
     **********************************************/
    public function all_mails_post(){
        $data   = $this->security->xss_clean($_POST);
        $data   = $this->Contact_model->all_mails($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * Sent mails
     **********************************************/
    public function sent_mails_post(){
        $data   = $this->security->xss_clean($_POST);
        $data   = $this->Contact_model->sent_mails($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * All Contact us mails
     **********************************************/
    public function mail_detail_get(){
        $data   = $this->get();
        $data   = $this->Contact_model->mail_detail($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * Number of Mails
     **********************************************/
    public function num_of_mails_get(){
        $data   = $this->Contact_model->num_of_mails();
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }
    
    /**********************************************
     * Number of Sent Mails
     **********************************************/
    public function num_of_sent_mails_get(){
        $data   = $this->Contact_model->num_of_sent_mails();
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * Number of Mails
     **********************************************/
    public function num_of_unread_mails_get(){
        $data   = $this->Contact_model->num_of_unread_mails();
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * Notification Unread Mails
     **********************************************/
    public function unread_mails_post(){
        $data   = $this->security->xss_clean($_POST);
        $data   = $this->Contact_model->unread_mails($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }
}
?>
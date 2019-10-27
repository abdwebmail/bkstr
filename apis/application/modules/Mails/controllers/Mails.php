<?php
/**
 * Created by PhpStorm.
 * User: MkTech
 * Date: 4/17/2019
 * Time: 12:34 AM
 */
use Restserver\Libraries\REST_Controller;
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class Mails extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Karachi");
        $this->load->model("Mails_model");
    }

    /**********************************************
     * Insert mail in QUEUE
     **********************************************/
    public function insert_mails_on_queue_post(){
        $data   = $this->security->xss_clean($_POST);
        $data   = $this->Mails_model->insert_mails_on_queue($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * Send mail
     **********************************************/
    public function send_mail_get(){
        $data   = $this->Mails_model->send_mail();
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    /**********************************************
     * Sent mail detail
     **********************************************/
    public function mail_detail_get(){
        $data   = $this->get();
        $data   = $this->Mails_model->mail_detail($data);
        if (isset($data['status']) == 'FALSE')
        {
            $this->response($data, REST_Controller::HTTP_SEE_OTHER);
        }
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

}
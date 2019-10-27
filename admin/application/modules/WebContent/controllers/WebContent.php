<?php
/**
 * Created by PhpStorm.
 * User: MkTech
 * Date: 4/26/2019
 * Time: 11:40 PM
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class WebContent extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Karachi");
    }

    /**********************************************
     * Edit Web Content View
     **********************************************/
    public function web_content(){
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $content_detail = $this->requesttoserver->getDataCurl('web_content_detail');
            $content_detail = json_decode($content_detail);
            if (isset($content_detail->status) == 'FALSE') {
                echo "<h2 style='text-align: center;'>WEB CONTENT DETAILS NOT FOUND</h2>";
                die;
            }
            else {
                $data['content_detail'] = $content_detail[0];
            }
            $data['title'] = 'PBD - Admin | Edit WebContent ';
            $this->load->view('edit-web_content', $data);
        }
        else{
            redirect('signin');
        }
    }


    /**********************************************
     * Update Web Content Details
     **********************************************/
    public function update_webContent(){
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $data_send  = $this->security->xss_clean($_POST);
            $update_result = $this->requesttoserver->sendDataCurl($data_send, 'update_web_content');
            $update_result = json_decode($update_result);
            if (isset($update_result->status) === 'FALSE') {
                echo json_encode(array('status' => 'FALSE', 'message' =>$update_result->message));
            }
            else {
                echo json_encode(array('status' => 'TRUE', 'message' =>'Web Content successfully updated.'));
            }
        }
        else{
            echo json_encode(array('status'=>'FALSE','message'=> 'Session expired, please try again after Login'));
        }
    }

}
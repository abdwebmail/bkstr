<?php
/**
 * Created by PhpStorm.
 * User: MkTech
 * Date: 4/2/2019
 * Time: 9:51 PM
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mails extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Karachi");
    }

    /**********************************************
     * inbox mails
     **********************************************/
    public function inbox()
    {
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $data['title'] = 'PBD - Admin | Inbox';
            $this->load->view('inbox', $data);
        }
        else{
            redirect('signin');
        }
    }

    /**********************************************
     * Load inbox mails
     **********************************************/
    public function inbox_load()
    {
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $data_send  = $this->security->xss_clean($_POST);
            $all_mails  = $this->requesttoserver->sendDataCurl($data_send, 'all_mails');
            $all_mails = json_decode($all_mails);
            if (isset($all_mails->status) == 'FALSE') {
                $data['all_mails'] = array();
            } else {
                $data['all_mails'] = $all_mails;
            }
            echo json_encode( array(
                'status' => 'TRUE',
                'message' => $this->load->view('load_inbox_mails', $data, true)
            ));
        }
        else{
            redirect('signin');
        }
    }

    /**********************************************
     * sent mails
     **********************************************/
    public function sent_mails()
    {
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $data['title'] = 'PBD - Admin | Sent Mails';
            $this->load->view('sent_mails', $data);
        }
        else{
            redirect('signin');
        }
    }
    /**********************************************
     *
     * Load inbox mails
     **********************************************/
    public function sent_mails_load()
    {
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $data_send  = $this->security->xss_clean($_POST);
            $sent_mails  = $this->requesttoserver->sendDataCurl($data_send, 'sent_mails');
            $sent_mails = json_decode($sent_mails);
            if (isset($sent_mails->status) == 'FALSE') {
                $data['sent_mails'] = array();
            } else {
                $data['sent_mails'] = $sent_mails;
            }
            echo json_encode( array(
                'status' => 'TRUE',
                'message' => $this->load->view('load_sent_mails', $data, true)
            ));
        }
        else{
            redirect('signin');
        }
    }

    /**********************************************
     * Unread mails
     **********************************************/
    public function unread_mails()
    {
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $data   = $this->security->xss_clean($_POST);
            $unread_mails = $this->requesttoserver->sendDataCurl($data, 'unread_mails');
            $unread_mails = json_decode($unread_mails );
            if (isset($unread_mails->status) == 'FALSE') {
                $data['unread_mails'] = array();
            } else {
                $data['unread_mails'] = $unread_mails;
            }
            echo json_encode( array(
                'status' => 'TRUE',
                'message' => $this->load->view('unread_notification_mails', $data, true)
            ));
        }
        else{
            echo json_encode(array('status'=>'FALSE', 'message'=>'Session expired, please login again'));
        }
    }

    /**********************************************
     * mail detail
     **********************************************/
    public function mail_detail($id)
    {
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $data['title'] = 'PBD - Admin | Mail detail';
            if (isset($id) && !empty($id)) {
                $mail_detail = $this->requesttoserver->getDataCurl('mail_detail/mail_id/' . $id);
                $mail_detail = json_decode($mail_detail);
                if (isset($mail_detail->status) == 'FALSE') {
                    echo "<h2 style='text-align: center;'>INVALID MAIL ID</h2>";
                    die;
                } else {
                    $data['mail_detail'] = $mail_detail[0];
                }
            }
            $this->load->view('detail-mail', $data);
        }
        else{
            redirect('signin');
        }
    }

    /**********************************************
     * compose mail
     **********************************************/
    public function compose()
    {
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $data['title'] = 'PBD - Admin | Compose mail';
            $this->load->view('compose-mail',$data);
        }
        else{
            redirect('signin');
        }
    }

    /**********************************************
     * Number of mails
     **********************************************/
    public function num_of_mails(){
        echo json_decode($this->requesttoserver->getDataCurl('num_of_mails'));
    }

    /**********************************************
     * Number of sent mails
     **********************************************/
    public function num_of_sent_mails(){
        echo json_decode($this->requesttoserver->getDataCurl('num_of_sent_mails'));
    }

    /**********************************************
     * Number of unread mails
     **********************************************/
    public function num_of_unread_mails(){
        echo json_decode($this->requesttoserver->getDataCurl('num_of_unread_mails'));
    }

    /**********************************************
     * Send Email To Users
     **********************************************/
    public function send_mail_to_users(){
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $data_send  = $this->security->xss_clean($_POST);
            unset($data_send['individual_check']);

            // Check email send to individual user or To group
            if(isset($data_send['individual_email']) && !empty($data_send['individual_email'])){
                $data_send['individual'] = 'yes';
            }
            else{
                $data_send['individual'] = 'no';
                unset($data_send['individual_email']);
                $data_send['email_ids'] = json_encode($data_send['email_ids']);
            }
            $send_mail_res  = $this->requesttoserver->sendDataCurl($data_send, 'insert_mails_on_queue');
            $send_mail_res = json_decode($send_mail_res);
//            print_r($send_mail_res);die;
            if (isset($send_mail_res->status) === 'FALSE') {
                echo json_encode(array('status' => 'FALSE', 'message' =>$send_mail_res->message));
            } else {
                echo json_encode(array('status' => 'TRUE', 'message' =>$send_mail_res->message));
            }
        }
        else{
            echo json_encode(array('status'=>'FALSE','message'=> 'Session expired, please try again after Login'));
        }
    }

    /**********************************************
     * Send Email To Users
     **********************************************/
    public function sent_mailDetail($mail_id){
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $data['title'] = 'PBD - Admin | Sent Mail detail';
            if (isset($mail_id) && !empty($mail_id)) {
                $mail_detail = $this->requesttoserver->getDataCurl('sent_mail_detail/mail_id/' . $mail_id);
                $mail_detail = json_decode($mail_detail);
                if (isset($mail_detail->status) == 'FALSE') {
                    echo "<h2 style='text-align: center;'>INVALID MAIL ID</h2>";
                    die;
                } else {
                    $data['mail_detail'] = $mail_detail[0];
                }
            }
            $this->load->view('sent-mailDetail', $data);
        }
        else{
            redirect('signin');
        }
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: MkTech
 * Date: 4/9/2019
 * Time: 12:26 AM
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BuyingDeviceReq extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    /*******************************************
    Device Buying Requests
     ********************************************/
    public function buying_requests()
    {
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $all_buying_req = $this->requesttoserver->getDataCurl('buying_requests');
            $all_buying_req = json_decode($all_buying_req);
            if (isset($all_buying_req->status) == 'FALSE') {
                $data['buying_requests'] = array();
            } else {
                $data['buying_requests'] = $all_buying_req;
            }
            $data['title'] = 'PBD - Admin | Buying Requests';
            $this->load->view('buying-reqs', $data);
        }
        else{
            redirect('signin');
        }
    }

    /*******************************************
    Device Buying Requests Status
     ********************************************/
    public function buying_requests_status()
    {
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $buying_status_req = $this->requesttoserver->getDataCurl('buying_status_requests');
            $buying_status_req = json_decode($buying_status_req);
            if (isset($buying_status_req->status) == 'FALSE') {
                $data['buying_status_req'] = array();
            } else {
                $data['buying_status_req'] = $buying_status_req;
            }
            $data['title'] = 'PBD - Admin | Buying Status Requests';
            $this->load->view('buying-status-req', $data);
        }
        else{
            redirect('signin');
        }
    }

    /*******************************************
    Del Buying Req
     ********************************************/
    public function trash_buyingReq()
    {
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $data_send  = $this->security->xss_clean($_POST);
            $del_buying_req = $this->requesttoserver->getDataCurl('trash_buyingingReq/id/'.$data_send['id']);
            $del_buying_req = json_decode($del_buying_req);
            if (isset($del_buying_req->status) == 'FALSE') {
                echo json_encode(array('status'=>'FALSE','message'=>$del_buying_req->message));
            }
            else {
                echo json_encode(array('status'=>'TRUE','message'=>'Successfully deleted'));
            }
        }
        else{
            echo json_encode(array('status'=>'FALSE','message'=>'Session expired, Try again after login'));
        }
    }

    /*******************************************
    Request Detail
     ********************************************/
    public function req_detail($id)
    {
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $data['title'] = 'PBD - Admin | Buy Request Detail';
            if (isset($id) && !empty($id)) {
                $req_detail = $this->requesttoserver->getDataCurl('buy_req_detail/req_id/' . $id);
                $req_detail = json_decode($req_detail);
                if (isset($req_detail->status) == 'FALSE') {
                    echo "<h2 style='text-align: center;'>INVALID REQUEST ID</h2>";
                    die;
                } else {
                    $data['req_detail'] = $req_detail[0];
                }
            }
            $this->load->view('buy-req-detail', $data);
        }
        else{
            redirect('signin');
        }
    }

    /*******************************************
    Comment on Buying Req
     ********************************************/
    public function save_comment()
    {
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $data_send  = $this->security->xss_clean($_POST);
            $save_comment_res  = $this->requesttoserver->sendDataCurl($data_send, 'comment_on_buyingReq');
            $save_comment_res = json_decode($save_comment_res);
            if (isset($save_comment_res->status) == 'FALSE') {
                echo json_encode(array('status'=>'FALSE','message'=>$save_comment_res->message));
            }
            else {
                echo json_encode(array('status'=>'TRUE','message'=>'Successfully commented'));
            }
        }
        else{
            echo json_encode(array('status'=>'FALSE','message'=>'Session expired, Try again after login'));
        }
    }

    /*******************************************
    Evaluation Status of Buying Req
     ********************************************/
    public function update_buying_status()
    {
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $data_send  = $this->security->xss_clean($_POST);
            $update_buying_status = $this->requesttoserver->sendDataCurl($data_send, 'update_buying_status');
            $update_buying_status = json_decode($update_buying_status);
            if ($update_buying_status->status == 'FALSE') {
                echo json_encode(array('status'=>'FALSE','message'=>$update_buying_status->message));
            }
            else {
                echo json_encode(array('status'=>'TRUE','message'=>$update_buying_status->message));
            }
        }
        else{
            echo json_encode(array('status'=>'FALSE','message'=>'Session expired, Try again after login'));
        }
    }

    /*******************************************
    Buying Request status Detail
     ********************************************/
    public function status_req_detail($id)
    {
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $data['title'] = 'PBD - Admin | Buying Request Status Detail';
            if (isset($id) && !empty($id)) {
                $detail = $this->requesttoserver->getDataCurl('status_req_detail/req_id/' . $id);
                $detail = json_decode($detail);
                if (isset($detail->status) == 'FALSE') {
                    echo "<h2 style='text-align: center;'>INVALID REQUEST ID</h2>";
                    die;
                } else {
                    $data['req_detail'] = $detail[0];
                }
            }
            $this->load->view('buy-req-status-detail', $data);
        }
        else{
            redirect('signin');
        }
    }

    /*******************************************
    Buy Status of Buying Req
     ********************************************/
    public function update_buy_status()
    {
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $data_send  = $this->security->xss_clean($_POST);
            $update_buy_status = $this->requesttoserver->sendDataCurl($data_send, 'update_buy_status');
            $update_buy_status = json_decode($update_buy_status);
            if ($update_buy_status->status == 'FALSE') {
                echo json_encode(array('status'=>'FALSE','message'=>$update_buy_status->message));
            }
            else {
                echo json_encode(array('status'=>'TRUE','message'=>$update_buy_status->message));
            }
        }
        else{
            echo json_encode(array('status'=>'FALSE','message'=>'Session expired, Try again after login'));
        }
    }

    /*******************************************
    Buying Comment on Buying Req
     ********************************************/
    public function save_buyingComment()
    {
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $data_send  = $this->security->xss_clean($_POST);
            $save_comment_res  = $this->requesttoserver->sendDataCurl($data_send, 'buyingComment_on_buyingReq');
            $save_comment_res = json_decode($save_comment_res);
            if (isset($save_comment_res->status) == 'FALSE') {
                echo json_encode(array('status'=>'FALSE','message'=>$save_comment_res->message));
            }
            else {
                echo json_encode(array('status'=>'TRUE','message'=>'Buying comment save Successfully '));
            }
        }
        else{
            echo json_encode(array('status'=>'FALSE','message'=>'Session expired, Try again after login'));
        }
    }

    /*******************************************
    Number of Buying Requests
     ********************************************/
    public function num_of_buying_req(){
        echo json_decode($this->requesttoserver->getDataCurl('num_of_buying_req'));
    }

    /*******************************************
    Number of Unread Buying Requests
     ********************************************/
    public function num_of_unread_buying_req(){
        echo json_decode($this->requesttoserver->getDataCurl('num_of_unread_buying_req'));
    }
}

?>

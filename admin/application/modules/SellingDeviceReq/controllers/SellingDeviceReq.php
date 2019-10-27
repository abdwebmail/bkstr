<?php
/**
 * Created by PhpStorm.
 * User: MkTech
 * Date: 4/9/2019
 * Time: 12:26 AM
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SellingDeviceReq extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Karachi");
    }

    /*******************************************
    Evaluation Requests
     ********************************************/
    public function evaluation_reqs()
    {
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $all_selling_req = $this->requesttoserver->getDataCurl('selling_requests');
            $all_selling_req = json_decode($all_selling_req);
            if (isset($all_mails->status) == 'FALSE') {
                $data['selling_requests'] = array();
            } else {
                $data['selling_requests'] = $all_selling_req;
            }
            $data['title'] = 'PBD - Admin | Evaluation Requests';
            $this->load->view('evaluation-reqs', $data);
        }
        else{
            redirect('signin');
        }
    }

    /*******************************************
    Evaluation Selling Requests
     ********************************************/
    public function evaluation_selling_req()
    {
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $eval_selling_req = $this->requesttoserver->getDataCurl('eval_selling_requests');
            $eval_selling_req = json_decode($eval_selling_req);
            if (isset($all_mails->status) == 'FALSE') {
                $data['eval_selling_requests'] = array();
            } else {
                $data['eval_selling_requests'] = $eval_selling_req;
            }
            $data['title'] = 'PBD - Admin | Evaluation Selling Status';
            $this->load->view('evaluation-selling-req', $data);
        }
        else{
            redirect('signin');
        }
    }

    /*******************************************
    Total Number of selling request
     ********************************************/
    public function num_of_selling_req(){
        echo json_decode($this->requesttoserver->getDataCurl('num_of_selling_req'));
    }

    /*******************************************
    Total  Number of unread selling request
     ********************************************/
    public function num_of_unread_selling_req(){
        echo json_decode($this->requesttoserver->getDataCurl('num_of_unread_selling_req'));
    }

    /*******************************************
    Del Selling Req
     ********************************************/
    public function trash_sellingReq()
    {
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $data_send  = $this->security->xss_clean($_POST);
            $del_selling_req = $this->requesttoserver->getDataCurl('trash_sellingReq/id/'.$data_send['id']);
            $del_selling_req = json_decode($del_selling_req);
            if (isset($del_selling_req->status) == 'FALSE') {
                echo json_encode(array('status'=>'FALSE','message'=>$del_selling_req->message));
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
            $data['title'] = 'PBD - Admin | Request Detail';
            if (isset($id) && !empty($id)) {
                $req_detail = $this->requesttoserver->getDataCurl('req_detail/req_id/' . $id);
                $req_detail = json_decode($req_detail);
                if (isset($req_detail->status) == 'FALSE') {
                    echo "<h2 style='text-align: center;'>INVALID REQUEST ID</h2>";
                    die;
                } else {
                    $data['req_detail'] = $req_detail[0];
                }
            }
            $this->load->view('req-detail', $data);
        }
        else{
            redirect('signin');
        }
    }

    /*******************************************
    Selling Request Detail
     ********************************************/
    public function sell_req_detail($id)
    {
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $data['title'] = 'PBD - Admin | Selling Request Detail';
            if (isset($id) && !empty($id)) {
                $detail = $this->requesttoserver->getDataCurl('selling_req_detail/req_id/' . $id);
                $detail = json_decode($detail);
                if (isset($detail->status) == 'FALSE') {
                    echo "<h2 style='text-align: center;'>INVALID REQUEST ID</h2>";
                    die;
                } else {
                    $data['req_detail'] = $detail[0];
                }
            }
            $this->load->view('selling-req-detail', $data);
        }
        else{
            redirect('signin');
        }
    }

    /*******************************************
    Comment on Selling Req
     ********************************************/
    public function save_comment()
    {
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $data_send  = $this->security->xss_clean($_POST);
            $save_comment_res  = $this->requesttoserver->sendDataCurl($data_send, 'comment_on_sellingReq');
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
    Selling Comment on Selling Req
     ********************************************/
    public function save_sellingComment()
    {
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $data_send  = $this->security->xss_clean($_POST);
            $save_comment_res  = $this->requesttoserver->sendDataCurl($data_send, 'sellingComment_on_sellingReq');
            $save_comment_res = json_decode($save_comment_res);
            if (isset($save_comment_res->status) == 'FALSE') {
                echo json_encode(array('status'=>'FALSE','message'=>$save_comment_res->message));
            }
            else {
                echo json_encode(array('status'=>'TRUE','message'=>'Selling comment save Successfully '));
            }
        }
        else{
            echo json_encode(array('status'=>'FALSE','message'=>'Session expired, Try again after login'));
        }
    }

    /*******************************************
    Evaluation Status of Selling Req
     ********************************************/
    public function update_evaluation_status()
    {
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $data_send  = $this->security->xss_clean($_POST);
            $update_evaluation_status = $this->requesttoserver->sendDataCurl($data_send, 'update_evaluation_status');
            $update_evaluation_status = json_decode($update_evaluation_status);
            if ($update_evaluation_status->status == 'FALSE') {
                echo json_encode(array('status'=>'FALSE','message'=>$update_evaluation_status->message));
            }
            else {
                echo json_encode(array('status'=>'TRUE','message'=>$update_evaluation_status->message));
            }
        }
        else{
            echo json_encode(array('status'=>'FALSE','message'=>'Session expired, Try again after login'));
        }
    }

    /*******************************************
    Sale Status of Selling Req
     ********************************************/
    public function update_sale_status()
    {
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $data_send  = $this->security->xss_clean($_POST);
            $update_sale_status = $this->requesttoserver->sendDataCurl($data_send, 'update_sale_status');
            $update_sale_status = json_decode($update_sale_status);
            if ($update_sale_status->status == 'FALSE') {
                echo json_encode(array('status'=>'FALSE','message'=>$update_sale_status->message));
            }
            else {
                echo json_encode(array('status'=>'TRUE','message'=>$update_sale_status->message));
            }
        }
        else{
            echo json_encode(array('status'=>'FALSE','message'=>'Session expired, Try again after login'));
        }
    }

}

?>

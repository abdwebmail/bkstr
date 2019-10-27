<?php
/**
 * Created by PhpStorm.
 * User: MkTech
 * Date: 3/15/2019
 * Time: 9:38 PM
 */
include_once APPPATH.'config/project_constants.php';
class DeviceReq_model extends CI_Model
{
    /**********************************************
     * Submit Device Req
     **********************************************/
    public function add_device_req($data){
        //validation Fields
        if (validate_data($data,'add_device_req') !== TRUE)
        {
            return array('status'=> 'FALSE','message'=>validate_data($data,'add_device_req'));
        }
        $insert_device_req = $this->db->insert('device_sell_requests',$data);
        if($insert_device_req){
            return array('status' => 'TRUE' , 'message' => 'Your Request has been submitted. We will contact you soon. Thank You!');
        }
        else{
            return array('status' => 'FALSE' , 'message' => 'Something went wrong');
        }
    }

    /**********************************************
     * Submit Buy Device Req
     **********************************************/
    public function buy_device_req($data){
        //validation Fields
        if (validate_data($data,'buy_device_req') !== TRUE)
        {
            return array('status'=> 'FALSE','message'=>validate_data($data,'buy_device_req'));
        }

        $insert_buy_device_req = $this->db->insert('device_buy_requests',$data);
        if($insert_buy_device_req){
            return array('status' => 'TRUE' , 'message' => 'We received your request, We will contact you soon. Thank you!!!');
        }
        else{
            return array('status' => 'FALSE' , 'message' => 'Something went wrong');
        }
    }

    /**********************************************
     * Client Device Requests
     **********************************************/
    public function client_device_requests($data){
        $users_device_req = $this->db->select('*')->from('device_sell_requests')->where($data)->order_by('reqTime','DESC')->get()->result_array();
        if ($users_device_req) { return $users_device_req; }
        else {
            return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
        }
    }

    /**********************************************
     * All Device Selling Requests
     **********************************************/
    public function selling_reqs(){
        $condition = array('device_sell_requests.is_deleted'=>'0');
        $all_device_req = $this->db->select('device_sell_requests.id, device_sell_requests.first_name, devices_category.category_name as device_type,
                                            device_sell_requests.device_company, device_sell_requests.device_model, device_sell_requests.received_through, 
                                            device_sell_requests.status,device_sell_requests.readBy, device_sell_requests.reqTime,')
                                ->join('devices_category','devices_category.id = device_sell_requests.device_type','left')->from('device_sell_requests')
                                ->where($condition)->order_by('device_sell_requests.id','DESC')->get()->result_array();
        if ($all_device_req) { return $all_device_req; }
        else {
            return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
        }
    }

    /**********************************************
     * All Evaluated Device Selling Requests
     **********************************************/
    public function eval_selling_reqs(){
        $condition = array('device_sell_requests.is_deleted'=>'0','device_sell_requests.status'=>'3');
        $all_device_req = $this->db->select('device_sell_requests.id, device_sell_requests.first_name, devices_category.category_name as device_type,device_sell_requests.device_company, device_sell_requests.device_model,device_sell_requests.contact,                                         device_sell_requests.status_sale,device_sell_requests.sale_price,device_sell_requests.evaluated_price, device_sell_requests.reqTime,')
                                ->join('devices_category','devices_category.id = device_sell_requests.device_type','left')->from('device_sell_requests')
                                ->where($condition)->order_by('device_sell_requests.id','DESC')->get()->result_array();
        if ($all_device_req) { return $all_device_req; }
        else {
            return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
        }
    }

    /**********************************************
     * Get Number of Device Selling Requests
     **********************************************/
    public function num_of_selling_req()
    {
        $condition = array('is_deleted'=>0);
        $num_selling_req = $this->db->where($condition)->count_all_results("device_sell_requests");
        if ($num_selling_req) { return $num_selling_req; }
        else {
            return 0;
        }
    }

    /**********************************************
     * Get Number of Unread Device Selling Requests
     **********************************************/
    public function num_of_unread_selling_req()
    {
        $condition = array('is_deleted'=>0, 'status'=>'0');
        $num_unread_selling_req = $this->db->where($condition)->count_all_results("device_sell_requests");
        if ($num_unread_selling_req) { return $num_unread_selling_req; }
        else {
            return 0;
        }
    }

    /**********************************************
     * Client Device Requests
     **********************************************/
    public function trash_sellingReq($data){
        $trash = $this->db->set(array('is_deleted'=>1))->where($data)->update('device_sell_requests');
        if ($trash) {
            return array('status' => 'TRUE' , 'message' => 'Successfully move to trash.');
        }
        else {
            return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
        }
    }

    /**********************************************
     * Selling Device detail of specific ID
     **********************************************/
    public function req_detail($data){
        $condition  = array('device_sell_requests.is_deleted'=>0, 'device_sell_requests.id'=>$data['req_id']);
        $status     = $this->db->select('device_sell_requests.status')->from('device_sell_requests')
                    ->where($condition)->get()->row();
        if(!$status){
            return array('status' => 'FALSE', 'message' => 'INVALID request ID.');
        }
        if($status->status == 0) {
            $this->db->set(array('status' => 1))->where(array('id' => $data['req_id']))->update('device_sell_requests');
        }
        $req_detail = $this->db->select('
                    device_sell_requests.id, device_sell_requests.first_name,device_sell_requests.email,device_sell_requests.contact,
                    device_sell_requests.received_through,device_sell_requests.available_time,devices_category.category_name as device_type,
                    device_sell_requests.device_company,device_sell_requests.device_model,device_sell_requests.space,
                    device_sell_requests.device_condition,device_sell_requests.selling_type,device_sell_requests.comment,
                    device_sell_requests.status,device_sell_requests.evaluated_price,device_sell_requests.readBy,
                    device_sell_requests.reqTime,')
                ->join('devices_category', 'devices_category.id = device_sell_requests.device_type', 'left')->from('device_sell_requests')
                ->where($condition)->order_by('device_sell_requests.id', 'DESC')->get()->result_array();
        if ($req_detail) {
            return $req_detail;
        } else {
            return array('status' => 'FALSE', 'message' => 'Something Went Wrong OR INVALID request ID.');
        }
    }

    /**********************************************
     * Selling Device detail of specific ID [After Evaluation Completed]
     **********************************************/
    public function selling_req_detail($data){
        $condition  = array('device_sell_requests.is_deleted'=>0, 'device_sell_requests.id'=>$data['req_id']);
        $status     = $this->db->select('device_sell_requests.status_sale')->from('device_sell_requests')
                    ->where($condition)->get()->row();
        if($status->status_sale == 0) {
            $this->db->set(array('status_sale' => 1))->where(array('id' => $data['req_id']))->update('device_sell_requests');
        }
        $req_detail = $this->db->select('
                    device_sell_requests.id, device_sell_requests.first_name,device_sell_requests.email,device_sell_requests.contact,
                    device_sell_requests.received_through,device_sell_requests.available_time,devices_category.category_name as device_type,
                    device_sell_requests.device_company,device_sell_requests.device_model,device_sell_requests.space,
                    device_sell_requests.device_condition,device_sell_requests.selling_type,device_sell_requests.comment,
                    device_sell_requests.selling_comment,device_sell_requests.status,device_sell_requests.status_sale,
                    device_sell_requests.sale_price,device_sell_requests.evaluated_price,device_sell_requests.readBy,
                    device_sell_requests.reqTime,')
                ->join('devices_category', 'devices_category.id = device_sell_requests.device_type', 'left')->from('device_sell_requests')
                ->where($condition)->order_by('device_sell_requests.id', 'DESC')->get()->result_array();
            if ($req_detail) {
                return $req_detail;
            } else {
                return array('status' => 'FALSE', 'message' => 'Something Went Wrong OR INVALID request ID.');
            }
    }

    /**********************************************
     * Comment On Device Requests
     **********************************************/
    public function comment_on_sellingReq($data){
        //validation Fields
        if (validate_data($data,'comment_sellingReq') !== TRUE)
        {
            return array('status'=> 'FALSE','message'=>validate_data($data,'comment_sellingReq'));
        }
        $comment = $this->db->set(array('comment'=>$data['comment']))->where(array('id'=>$data['req_id']))->update('device_sell_requests');
        if ($comment) {
            return array('status' => 'TRUE' , 'message' => 'Successfully comment on this Request.');
        }
        else {
            return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
        }
    }

    /**********************************************
     * Selling Comment On Device Requests
     **********************************************/
    public function sellingComment_on_sellingReq($data){
        //validation Fields
        if (validate_data($data,'comment_sellingReq') !== TRUE)
        {
            return array('status'=> 'FALSE','message'=>validate_data($data,'comment_sellingReq'));
        }
        $comment = $this->db->set(array('selling_comment'=>$data['comment']))->where(array('id'=>$data['req_id']))->update('device_sell_requests');
        if ($comment) {
            return array('status' => 'TRUE' , 'message' => 'Successfully comment on this Request.');
        }
        else {
            return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
        }
    }

    /**********************************************
     * Update Status and Evaluation Price Device Requests
     **********************************************/
    public function update_evaluation_status($data){
        //validation Fields
        if (validate_data($data,'update_evaluation_status') !== TRUE)
        {
            return array('status'=> 'FALSE','message'=>validate_data($data,'update_evaluation_status'));
        }
        $evaluation_status = $this->db->set(array('evaluated_price'=>$data['evaluated_price'], 'status'=>$data['evaluation_status']))
                        ->where(array('id'=>$data['req_id']))->update('device_sell_requests');
        if ($evaluation_status) {
            return array('status' => 'TRUE' , 'message' => 'Successfully update status and Evaluation price of this Request.');
        }
        else {
            return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
        }
    }

    /**********************************************
     * Update Sale Status and Price Device Requests
     **********************************************/
    public function update_sale_status($data){
        //validation Fields
        if (validate_data($data,'update_sale_status') !== TRUE)
        {
            return array('status'=> 'FALSE','message'=>validate_data($data,'update_sale_status'));
        }
        $evaluation_status = $this->db->set(array('sale_price'=>$data['sale_price'], 'status_sale'=>$data['status_sale']))
                        ->where(array('id'=>$data['req_id']))->update('device_sell_requests');
        if ($evaluation_status) {
            return array('status' => 'TRUE' , 'message' => 'Successfully update Sale status and price of this Request.');
        }
        else {
            return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
        }
    }


    /**********************************************
     * Get Number of Device Buying Requests
     **********************************************/
    public function num_of_buying_req()
    {
        $condition = array('is_deleted'=>0);
        $num_buying_req = $this->db->where($condition)->count_all_results("device_buy_requests");
        if ($num_buying_req) { return $num_buying_req; }
        else {
            return 0;
        }
    }

    /**********************************************
     * Get Number of Device Buying Requests
     **********************************************/
    public function num_of_unread_buying_req()
    {
        $condition = array('is_deleted'=>0,'readBy'=>'');
        $num_buying_req = $this->db->where($condition)->count_all_results("device_buy_requests");
        if ($num_buying_req) { return $num_buying_req; }
        else {
            return 0;
        }
    }

}
?>
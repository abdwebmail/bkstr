<?php
/**
 * Created by PhpStorm.
 * User: MkTech
 * Date: 3/15/2019
 * Time: 9:38 PM
 */
include_once APPPATH.'config/project_constants.php';
class DeviceBuyReq_model extends CI_Model
{
    /**********************************************
     * Submit Device Buy Req
     **********************************************/
    public function add_buy_device_req($data){
        //validation Fields
        if (validate_data($data,'add_device_buy_req') !== TRUE)
        {
            return array('status'=> 'FALSE','message'=>validate_data($data,'add_device_buy_req'));
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
     * All Device Buying Requests
     **********************************************/
    public function buying_reqs(){
        $condition = array('device_buy_requests.is_deleted'=>'0');
        $all_buying_req = $this->db->select('device_buy_requests.id,device_buy_requests.client_name,device_buy_requests.client_email,
                                            device_buy_requests.device_id,device_buy_requests.device_condition,device_buy_requests.received_through,
                                            device_buy_requests.status,device_buy_requests.reqTime,devices_products.product_model,
                                            device_buy_requests.status_buy,devices_category.category_name,')
            ->join('devices_products','devices_products.id=device_buy_requests.device_id','left')
            ->join('devices_category','devices_category.id=devices_products.category_id','left')->from('device_buy_requests')
            ->where($condition)->order_by('device_buy_requests.id','DESC')->get()->result_array();
        if ($all_buying_req) { return $all_buying_req; }
        else {
            return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
        }
    }

    /**********************************************
     * All Buying Device Status Requests
     **********************************************/
    public function buying_status_requests(){
        $condition = array('device_buy_requests.is_deleted'=>'0','device_buy_requests.status'=>'3');
        $all_buying_status_req = $this->db->select('device_buy_requests.id,device_buy_requests.client_name,device_buy_requests.client_email,
                                            device_buy_requests.device_id,device_buy_requests.status_buy,device_buy_requests.client_contact,
                                            device_buy_requests.buying_price,device_buy_requests.status,devices_products.product_model,devices_category.category_name,')
            ->join('devices_products','devices_products.id=device_buy_requests.device_id','left')
            ->join('devices_category','devices_category.id=devices_products.category_id','left')->from('device_buy_requests')
            ->where($condition)->order_by('device_buy_requests.id','DESC')->get()->result_array();
        if ($all_buying_status_req) { return $all_buying_status_req; }
        else {
            return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
        }
    }

    /**********************************************
     * Trash Device Buying Requests
     **********************************************/
    public function trash_buyingingReq($data){
        $trash = $this->db->set(array('is_deleted'=>1))->where($data)->update('device_buy_requests');
        if ($trash) {
            return array('status' => 'TRUE' , 'message' => 'Successfully move to trash.');
        }
        else {
            return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
        }
    }

    /**********************************************
     * Buy Request detail of specific ID
     **********************************************/
    public function req_detail($data){
        $condition  = array('device_buy_requests.is_deleted'=>0, 'device_buy_requests.id'=>$data['req_id']);
        $status     = $this->db->select('device_buy_requests.status')->from('device_buy_requests')
                            ->where($condition)->get()->row();
        if(!$status){
            return array('status' => 'FALSE', 'message' => 'INVALID request ID.');
        }
        if($status->status == 0) {
            $this->db->set(array('status' => 1))->where(array('id' => $data['req_id']))->update('device_buy_requests');
        }
        $req_detail = $this->db->select('
                    device_buy_requests.id, device_buy_requests.client_name,device_buy_requests.client_email,device_buy_requests.client_contact,
                    device_buy_requests.device_condition,device_buy_requests.received_through,device_buy_requests.device_condition,
                    device_buy_requests.comment,device_buy_requests.buying_comment,device_buy_requests.status,
                    device_buy_requests.buying_price,device_buy_requests.readBy,device_buy_requests.reqTime,
                    devices_products.product_model,devices_products.id as product_id,devices_category.category_name,devices_brands.brand_name,')
            ->join('devices_products','devices_products.id=device_buy_requests.device_id','left')
            ->join('devices_brands','devices_brands.id=devices_products.brand_id','left')
            ->join('devices_category','devices_category.id=devices_products.category_id','left')->from('device_buy_requests')
            ->where($condition)->get()->result_array();
        if ($req_detail) {
            return $req_detail;
        } else {
            return array('status' => 'FALSE', 'message' => 'Something Went Wrong OR INVALID request ID.');
        }
    }

    /**********************************************
     * Comment On Device Buying Requests
     **********************************************/
    public function comment_on_buyingReq($data){
        //validation Fields
        if (validate_data($data,'comment_buyingReq') !== TRUE)
        {
            return array('status'=> 'FALSE','message'=>validate_data($data,'comment_buyingReq'));
        }
        $comment = $this->db->set(array('comment'=>$data['comment']))->where(array('id'=>$data['req_id']))->update('device_buy_requests');
        if ($comment) {
            return array('status' => 'TRUE' , 'message' => 'Successfully comment on this Request.');
        }
        else {
            return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
        }
    }

    /**********************************************
     * Update Status and Evaluation Price Device Buying Requests
     **********************************************/
    public function update_buying_status($data){
        //validation Fields
        if (validate_data($data,'update_buying_status') !== TRUE)
        {
            return array('status'=> 'FALSE','message'=>validate_data($data,'update_buying_status'));
        }
        $buying_status = $this->db->set(array('buying_price'=>$data['buying_price'], 'status'=>$data['evaluation_status']))
            ->where(array('id'=>$data['req_id']))->update('device_buy_requests');
        if ($buying_status) {
            return array('status' => 'TRUE' , 'message' => 'Successfully update status and Buying price of this Request.');
        }
        else {
            return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
        }
    }

    /**********************************************
     * Client Buy Device Requests
     **********************************************/
    public function client_buy_device_requests($data){
        $users_device_req = $this->db->select('*')->from('devices_products')->where($data)->order_by('reqTime','DESC')->get()->result_array();
        if ($users_device_req) { return $users_device_req; }
        else {
            return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
        }
    }

    /**********************************************
     * Buying Device detail of specific ID [After Evaluation Completed]
     **********************************************/
    public function status_req_detail($data){
        $condition  = array('device_buy_requests.is_deleted'=>0, 'device_buy_requests.id'=>$data['req_id']);
        $status     = $this->db->select('device_buy_requests.status_buy')->from('device_buy_requests')
            ->where($condition)->get()->row();
        if($status->status_buy == 0) {
            $this->db->set(array('status_buy' => 1))->where(array('id' => $data['req_id']))->update('device_buy_requests');
        }
        $req_detail = $this->db->select('
                    device_buy_requests.id, device_buy_requests.client_name,device_buy_requests.client_email,device_buy_requests.client_contact,
                    device_buy_requests.device_condition,device_buy_requests.received_through,device_buy_requests.device_condition,
                    device_buy_requests.comment,device_buy_requests.buying_comment,device_buy_requests.status,device_buy_requests.buying_price,
                    device_buy_requests.status_buy,device_buy_requests.readBy,device_buy_requests.reqTime,
                    devices_products.product_model,devices_products.id as product_id,devices_category.category_name,
                    devices_brands.brand_name,')
            ->join('devices_products','devices_products.id=device_buy_requests.device_id','left')
            ->join('devices_brands','devices_brands.id=devices_products.brand_id','left')
            ->join('devices_category','devices_category.id=devices_products.category_id','left')->from('device_buy_requests')
            ->where($condition)->get()->result_array();
        if ($req_detail) {
            return $req_detail;
        } else {
            return array('status' => 'FALSE', 'message' => 'Something Went Wrong OR INVALID request ID.');
        }
    }

    /**********************************************
     * Buying Comment On Device Requests
     **********************************************/
    public function buyingComment_on_buyingReq($data){
        //validation Fields
        if (validate_data($data,'comment_buyingReq') !== TRUE)
        {
            return array('status'=> 'FALSE','message'=>validate_data($data,'comment_buyingReq'));
        }
        $comment = $this->db->set(array('buying_comment'=>$data['buying_comment']))->where(array('id'=>$data['req_id']))->update('device_buy_requests');
        if ($comment) {
            return array('status' => 'TRUE' , 'message' => 'Successfully comment on this Request.');
        }
        else {
            return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
        }
    }

    /**********************************************
     * Update Sale Status and Price Device Requests
     **********************************************/
    public function update_buy_status($data){
        //validation Fields
        if (validate_data($data,'update_buy_status') !== TRUE)
        {
            return array('status'=> 'FALSE','message'=>validate_data($data,'update_buy_status'));
        }
        $check_product_availability = $this->db->select('stock')->from('devices_products')
                                        ->where(array('id'=>$data['device_id']))->get()->result_array();
        $stock = $check_product_availability[0]['stock'];
        if($stock == "0"){
            return array('status'=>'FALSE','message'=>'No device exists in Stock, Please check Stock');
        }
        else{
            $bought_status = $this->db->set(array('bought_price'=>$data['buy_price'], 'status_buy'=>$data['status_buy']))
                ->where(array('id'=>$data['req_id']))->update('device_buy_requests');
            if ($bought_status) {
                $stock = $stock - 1;
                $this->db->set(array('stock'=>$stock))->where(array('id'=>$data['device_id']))->update('devices_products');
                return array('status' => 'TRUE' , 'message' => 'Successfully update Buy status and price of this Request.');
            }
            else {
                return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
            }
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
        $condition = array('is_deleted'=>0,'status'=>'0');
        $num_buying_req = $this->db->where($condition)->count_all_results("device_buy_requests");
        if ($num_buying_req) { return $num_buying_req; }
        else {
            return 0;
        }
    }

}
?>
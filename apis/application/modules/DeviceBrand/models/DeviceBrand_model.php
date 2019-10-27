<?php
/**
 * Created by PhpStorm.
 * User: MkTech
 * Date: 4/17/2019
 * Time: 12:34 AM
 */
include_once APPPATH.'config/project_constants.php';
class DeviceBrand_model extends CI_Model
{
    /**********************************************
     * Add new Device Brand
     **********************************************/
    public function add_new_brand($data){
    
        //validation Fields
        if (validate_data($data, 'add_deviceBrand') !== TRUE) {
            return array('status' => 'FALSE', 'message' => validate_data($data, 'add_deviceBrand'));
        }
        if(isset($data['brand_image']) && !empty($data['brand_image'])) {
            $brand_image        = $data['brand_image'];
            $image_name         = $data['image_name'];
            unset($data['brand_image']); unset($data['image_name']);

            $img        = base64_decode($brand_image);
            $img_path   = directory_name('CATEGORY_BRAND_DIR') . $image_name;
            $move       = file_put_contents($img_path, $img);
            if (!$move) {
                return array('status' => 'FALSE', 'message' => 'Something Went Wrong while uploading device brand image.');
            }
            else{
                $data['image'] = $image_name;
                $insert_brand = $this->db->insert('devices_brands',$data);
                if($insert_brand){
                    return array('status' => 'TRUE', 'message' => $insert_brand);
                }
                else{
                    return array('status' => 'FALSE', 'message' => 'Something Went Wrong while adding new brand.');
                }
            }
        }
    }

    /**********************************************
     * Update Device Brand
     **********************************************/
    public function update_brand($data){
        if(isset($data['brand_image']) && !empty($data['brand_image'])){
            //validation Fields
            if (validate_data($data, 'update_deviceBrand_img') !== TRUE) {
                return array('status' => 'FALSE', 'message' => validate_data($data, 'update_deviceBrand_img'));
            }
        }
        else {
            //validation Fields
            if (validate_data($data, 'update_deviceBrand') !== TRUE) {
                return array('status' => 'FALSE', 'message' => validate_data($data, 'update_deviceBrand'));
            }
        }
        
        if(isset($data['brand_image']) && !empty($data['brand_image'])) {
            $brand_image        = $data['brand_image'];
            $image_name         = $data['image_name'];
            unset($data['brand_image']); unset($data['image_name']);

            $img        = base64_decode($brand_image);
            $img_path   = directory_name('CATEGORY_BRAND_DIR') . $image_name;
            $move       = file_put_contents($img_path, $img);
            if (!$move) {
                return array('status' => 'FALSE', 'message' => 'Something Went Wrong while uploading device brand image.');
            }
            else {
                $data['image'] = $image_name;
            }
        }

        $brand_id = array('id'=>$data['brand_id']);
        unset($data['brand_id']);
        $update_brand = $this->db->set($data)->where($brand_id)->update('devices_brands');

        if($update_brand){
            return array('status' => 'TRUE', 'message' => 'Device brand updated');
        }
        else{
            return array('status' => 'FALSE', 'message' => 'Something Went Wrong while updating brand.');
        }
    }

    /**********************************************
     * All Device Brands
     **********************************************/
    public function all_brands(){
        $condition = array('devices_brands.is_active'=>1,'devices_brands.is_deleted'=>0);
        $all_brands = $this->db->select('devices_brands.id,devices_brands.category_id,devices_brands.brand_name,devices_brands.image,
                                            devices_brands.brand_detail,devices_category.category_name,')
            ->from('devices_brands')
            ->join('devices_category','devices_brands.category_id=devices_category.id','left')
            ->where($condition)->get()->result_array();
        if ($all_brands) {
            return $all_brands;
        }
        else {
            return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
        }
    }

    /**********************************************
     * Device Brand Detail of specific id
     **********************************************/
    public function brand_details($data){
        $condition = array('is_deleted'=>0, 'id'=>$data['id']);
        $detail = $this->db->select('*')->where($condition)->get('devices_brands')->result_array();
        if ($detail) { return $detail; }
        else {
            return array('status' => 'FALSE' , 'message' => 'No Result found against this Brand ID');
        }
    }

    /**********************************************
     * Related Device Brand
     **********************************************/
    public function related_brands($data){
        if(isset($data['category_id']) && !empty($data['category_id'])) {
            $condition = array('devices_brands.category_id'=>$data['category_id'], 'devices_brands.is_active'=>1,'devices_brands.is_deleted'=>0);
            $rel_brands = $this->db->select('devices_brands.id,devices_brands.category_id,devices_brands.brand_name,devices_brands.image,
                                            devices_brands.brand_detail,devices_category.category_name,')
                ->from('devices_brands')
                ->join('devices_category','devices_brands.category_id=devices_category.id','left')
                ->where($condition)->get()->result_array();
            if ($rel_brands) {
                return $rel_brands;
            }
            else {
                return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
            }
        }
        else{
            return array('status'=>'FALSE','message'=>'Category ID can not be Null or Empty');
        }
    }

    /**********************************************
     * Delete Device Brand
     **********************************************/
    public function del_brand($data){
        if(isset($data['brand_id'])&& !empty($data['brand_id'])) {
            $condition = array('id' => $data['brand_id']);
            $deleted_brand = $this->db->set(array('is_deleted'=>1))->where($condition)->update('devices_brands');
            $deleted_product = $this->db->set(array('is_deleted'=>1))->where(array('brand_id'=>$data['brand_id']))->update('devices_products');


            if ($deleted_brand) {
                return array('status' => 'TRUE', 'message' => 'Device brand deleted');
            } else {
                return array('status' => 'FALSE', 'message' => 'Something Went Wrong while deleting brand.');
            }
        }
    }

}
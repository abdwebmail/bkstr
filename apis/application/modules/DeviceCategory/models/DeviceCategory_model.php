<?php
/**
 * Created by PhpStorm.
 * User: MkTech
 * Date: 4/17/2019
 * Time: 12:34 AM
 */
include_once APPPATH.'config/project_constants.php';
class DeviceCategory_model extends CI_Model
{
    /**********************************************
     * Add new Device Category
     **********************************************/
    public function add_new_category($data){
    
        //validation Fields
        if (validate_data($data, 'add_deviceCategory') !== TRUE) {
            return array('status' => 'FALSE', 'message' => validate_data($data, 'add_deviceCategory'));
        }
        
        if(isset($data['category_image']) && !empty($data['category_image'])) {
            $category_image     = $data['category_image'];
            $image_name         = $data['image_name'];
            unset($data['category_image']); unset($data['image_name']);

            $img        = base64_decode($category_image);
            $img_path   = directory_name('DEVICE_CATEGORY_DIR') . $image_name;
            $move       = file_put_contents($img_path, $img);
            if (!$move) {
                return array('status' => 'FALSE', 'message' => 'Something Went Wrong while uploading device category image.');
            }
            else{
                $data['image'] = $image_name;
                $insert_category = $this->db->insert('devices_category',$data);
                if($insert_category){
                    return array('status' => 'TRUE', 'message' => $insert_category);
                }
                else{
                    return array('status' => 'FALSE', 'message' => 'Something Went Wrong while adding new category.');
                }
            }
        }
    }

    /**********************************************
     * Update Device Category
     **********************************************/
    public function update_category($data){
        if(isset($data['category_image']) && !empty($data['category_image'])){
            //validation Fields
            if (validate_data($data, 'update_deviceCategory_img') !== TRUE) {
                return array('status' => 'FALSE', 'message' => validate_data($data, 'update_deviceCategory_img'));
            }
        }
        else {
            //validation Fields
            if (validate_data($data, 'update_deviceCategory') !== TRUE) {
                return array('status' => 'FALSE', 'message' => validate_data($data, 'update_deviceCategory'));
            }
        }
        
        if(isset($data['category_image']) && !empty($data['category_image'])) {
            $category_image     = $data['category_image'];
            $image_name         = $data['image_name'];
            unset($data['category_image']); unset($data['image_name']);

            $img        = base64_decode($category_image);
            $img_path   = directory_name('DEVICE_CATEGORY_DIR') . $image_name;
            $move       = file_put_contents($img_path, $img);
            if (!$move) {
                return array('status' => 'FALSE', 'message' => 'Something Went Wrong while uploading device category image.');
            }
            else {
                $data['image'] = $image_name;
            }
        }

        $category_id = array('id'=>$data['category_id']);
        unset($data['category_id']);
        $update_category = $this->db->set($data)->where($category_id)->update('devices_category');

        if($update_category){
            return array('status' => 'TRUE', 'message' => 'Device category updated');
        }
        else{
            return array('status' => 'FALSE', 'message' => 'Something Went Wrong while updating category.');
        }
    }

    /**********************************************
     * Delete Device Category
     **********************************************/
    public function del_category($data){
        if(isset($data['category_id'])&& !empty($data['category_id'])) {
            $condition = array('id' => $data['category_id']);
            $deleted_category = $this->db->set(array('is_deleted'=>1))->where($condition)->update('devices_category');
            $deleted_brand = $this->db->set(array('is_deleted'=>1))->where(array('category_id'=>$data['category_id']))->update('devices_brands');
            $deleted_product = $this->db->set(array('is_deleted'=>1))->where(array('category_id'=>$data['category_id']))->update('devices_products');

            if ($deleted_category) {
                return array('status' => 'TRUE', 'message' => 'Device category deleted');
            } else {
                return array('status' => 'FALSE', 'message' => 'Something Went Wrong while deleting category.');
            }
        }
    }

    /**********************************************
     * All Device Categories
     **********************************************/
    public function all_categories(){
        $condition = array('is_active'=>1,'is_deleted'=>0);
        $all_categories = $this->db->select('*')->where($condition)->get('devices_category')->result_array();
        if ($all_categories) {
            return $all_categories;
        }
        else {
            return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
        }
    }

    /**********************************************
     * Device Category Detail of specific id
     **********************************************/
    public function category_details($data){
        $condition = array('is_deleted'=>0, 'id'=>$data['id']);
        $detail = $this->db->select('*')->where($condition)->get('devices_category')->result_array();
        if ($detail) { return $detail; }
        else {
            return array('status' => 'FALSE' , 'message' => 'No Result found against this Category ID');
        }
    }
}
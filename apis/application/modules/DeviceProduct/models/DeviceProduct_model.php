<?php
/**
 * Created by PhpStorm.
 * User: MkTech
 * Date: 4/17/2019
 * Time: 12:34 AM
 */
include_once APPPATH.'config/project_constants.php';
class DeviceProduct_model extends CI_Model
{
    /**********************************************
     * Add new Device Product
     **********************************************/
    public function add_new_product($data){
        //validation Fields
        if (validate_data($data, 'add_deviceProduct') !== TRUE) {
            return array('status' => 'FALSE', 'message' => validate_data($data, 'add_deviceProduct'));
        }
        if(isset($data['product_image']) && !empty($data['product_image'])) {
            $brand_image        = $data['product_image'];
            $image_name         = $data['image_name'];
            unset($data['product_image']); unset($data['image_name']);

            $img        = base64_decode($brand_image);
            $img_path   = directory_name('BRAND_PRODUCT_DIR') . $image_name;
            $move       = file_put_contents($img_path, $img);
            if (!$move) {
                return array('status' => 'FALSE', 'message' => 'Something Went Wrong while uploading device product image.');
            }
            else{
                $data['image'] = $image_name;
                $insert_product = $this->db->insert('devices_products',$data);
                if($insert_product){
                    return array('status' => 'TRUE', 'message' => $insert_product);
                }
                else{
                    return array('status' => 'FALSE', 'message' => 'Something Went Wrong while adding new product.');
                }
            }
        }
    }

    /**********************************************
     * Update Device Product
     **********************************************/
    public function update_product($data){
        if(isset($data['product_image']) && !empty($data['product_image'])){
            //validation Fields
            if (validate_data($data, 'update_deviceProduct_img') !== TRUE) {
                return array('status' => 'FALSE', 'message' => validate_data($data, 'update_deviceProduct_img'));
            }
        }
        else {
            //validation Fields
            if (validate_data($data, 'update_deviceProduct') !== TRUE) {
                return array('status' => 'FALSE', 'message' => validate_data($data, 'update_deviceProduct'));
            }
        }
        
        if(isset($data['product_image']) && !empty($data['product_image'])) {
            $product_image        = $data['product_image'];
            $image_name         = $data['image_name'];
            unset($data['product_image']); unset($data['image_name']);

            $img        = base64_decode($product_image);
            $img_path   = directory_name('BRAND_PRODUCT_DIR') . $image_name;
            $move       = file_put_contents($img_path, $img);
            if (!$move) {
                return array('status' => 'FALSE', 'message' => 'Something Went Wrong while uploading device product image.');
            }
            else {
                $data['image'] = $image_name;
            }
        }

        $product_id = array('id'=>$data['product_id']);
        unset($data['product_id']);
        $update_product = $this->db->set($data)->where($product_id)->update('devices_products');

        if($update_product){
            return array('status' => 'TRUE', 'message' => 'Device product updated');
        }
        else{
            return array('status' => 'FALSE', 'message' => 'Something Went Wrong while updating product.');
        }
    }

    /**********************************************
     * All Device Products
     **********************************************/
    public function all_products($keyword){
        $condition = array('devices_products.is_active'=>1,'devices_products.is_deleted'=>0);
        $all_products = $this->db->select('devices_products.id,devices_products.product_model,devices_products.top_product,
                                            devices_products.image,devices_products.product_detail,devices_brands.brand_name,
                                            devices_category.category_name,devices_products.stock,')->from('devices_products')
                                    ->join('devices_brands','devices_products.brand_id=devices_brands.id','left')
                                    ->join('devices_category','devices_products.category_id=devices_category.id','left')
                                    ->where($condition)->get()->result_array();
                                    
                                    
        if ($all_products) {
            return $all_products;
        }
        else {
            return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
        }
    }
    
    
    
      /**********************************************
     * All Device Products
     **********************************************/
    public function get_all_products(){
        print_r('vicky');
        exit();
        $condition = array('devices_products.is_active'=>1,'devices_products.is_deleted'=>0);
        $all_products = $this->db->select('devices_products.id,devices_products.product_model,devices_products.top_product,
                                            devices_products.image,devices_products.product_detail,devices_brands.brand_name,
                                            devices_category.category_name,devices_products.stock,')->from('devices_products')
                                    ->join('devices_brands','devices_products.brand_id=devices_brands.id','left')
                                    ->join('devices_category','devices_products.category_id=devices_category.id','left')
                                    ->where($condition)->get()->result_array();
                                    
                                    print_r($all_products);
                                    exit();
        if ($all_products) {
            return $all_products;
        }
        else {
            return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
        }
    }
    
    public function search_product($keyword){
        $condition = array('is_active'=>1,'is_deleted'=>0);
        $searched_products = $this->db->select('*')->from('devices_products')
            ->like('product_model', $keyword)
            ->where($condition)->get()->result_array();
        if ($searched_products) {
            return $searched_products;
        }
        else {
            return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
        }
    }

    /**********************************************
     * All Related Products
     **********************************************/
    public function related_products($data){
        if(isset($data['brand_id']) && !empty($data['brand_id'])) {
            $condition = array('devices_products.brand_id' => $data['brand_id'], 'devices_products.is_active' => 1, 'devices_products.is_deleted' => 0);
            $rel_products = $this->db->select('devices_products.id,devices_products.product_model,devices_products.top_product,
                                                devices_products.image,devices_products.product_detail,devices_brands.brand_name,
                                                devices_category.category_name,devices_products.stock,')->from('devices_products')
                ->join('devices_brands', 'devices_products.brand_id=devices_brands.id', 'left')
                ->join('devices_category', 'devices_products.category_id=devices_category.id', 'left')
                ->where($condition)->get()->result_array();
            if ($rel_products) {
                return $rel_products;
            }
            else {
                return array('status' => 'FALSE', 'message' => 'No product find against this brand.');
            }
        }
        else{
            return array('status'=>'FALSE','message'=>'Brand ID can not be Null or Empty');
        }
    }

    /**********************************************
     * Device Product Detail of specific id
     **********************************************/
    public function product_details($data){
        $condition = array('is_deleted'=>0, 'id'=>$data['id']);
        $detail = $this->db->select('*')->where($condition)->get('devices_products')->result_array();
        if ($detail) { return $detail; }
        else {
            return array('status' => 'FALSE' , 'message' => 'No Result found against this Product ID');
        }
    }

    /**********************************************
     * Delete Device Product
     **********************************************/
    public function del_product($data){
        if(isset($data['product_id'])&& !empty($data['product_id'])) {
            $condition = array('id' => $data['product_id']);
            $deleted_product = $this->db->set(array('is_deleted'=>1))->where($condition)->update('devices_products');

            if ($deleted_product) {
                return array('status' => 'TRUE', 'message' => 'Device product deleted');
            } else {
                return array('status' => 'FALSE', 'message' => 'Something Went Wrong while deleting product.');
            }
        }
    }

}
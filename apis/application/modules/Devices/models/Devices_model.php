<?php
include_once APPPATH.'config/project_constants.php';
class Devices_model extends CI_Model
{

    /**********************************************
     * Get Related Brands
     **********************************************/
    public function category_brands($data)
    {
        if(!isset($data['device_category_id']) || empty($data['device_category_id'])){
            return array('status'=>'FALSE', 'message'=>'device_category_id missing');
        }

        $condition = array('is_deleted'=>0,'is_active'=>1, 'category_id'=>$data['device_category_id']);
        $category_brands = $this->db->select('id,category_id,brand_name,image')->where($condition)->get('devices_brands')->result_array();
        if ($category_brands) {
            return $category_brands;
        }
        else {
            return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
        }
    }

    /**********************************************
     * Get All Brands
     **********************************************/
    public function all_brands()
    {
        $condition          = array('is_deleted'=>0,'is_active'=>1);
        $all_brands    = $this->db->select('id,category_id,brand_name,image')->where($condition)->get('devices_brands')->result_array();
        if ($all_brands) {
            return $all_brands;
        }
        else {
            return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
        }
    }

    /**********************************************
     * Get All products
     **********************************************/
    public function get_all_products()
    {
        print_r('vicky');
        exit();
        $condition      = array('devices_products.is_deleted'=>0,'devices_products.is_active'=>1);
        $products       = $this->db->select('devices_products.*')
                            ->from('devices_products')
                            ->join('devices_brands','devices_products.brand_id=devices_brands.id','left')
                            ->where($condition)->get()->result_array();
       
       
//        $products       =     $this->db->select('*')->where($condition)->get('devices_products')->result_array();
        if ($products) { return $products; }
        else {
            return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
        }
    }

    /**********************************************
     * Get Search products
     **********************************************/
    public function get_search_products($search_keyword)
    {
        $search_keyword = str_replace("%20" , " ", $search_keyword);
        $condition      = array('devices_products.is_deleted'=>0,'devices_products.is_active'=>1);
        $products       = $this->db->select('devices_products.id,devices_products.category_id,devices_products.brand_id,
                                              devices_brands.brand_name,devices_products.product_model,devices_products.product_model,
                                              devices_products.top_product,devices_products.stock,devices_products.normal_price,devices_products.faulty_price,
                                              devices_products.new_price,devices_products.perfect_price,devices_products.good_price,
                                              devices_products.product_detail,devices_products.image')->from('devices_products')
                            ->join('devices_brands','devices_products.brand_id=devices_brands.id','left')
                            ->where($condition)->like('devices_products.product_model',$search_keyword)->get()->result_array();


        if ($products) { return $products; }
        else {
            return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
        }
    }

    /**********************************************
     * Get All Product Against Brand
     **********************************************/
    public function brand_product($data)
    {
        if(!isset($data['brand_name']) || empty($data['brand_name'])){
            return array('status'=>'FALSE', 'message'=>'brand_name missing');
        }

        $condition          = array('devices_products.is_deleted'=>0,'devices_products.is_active'=>1,'devices_brands.brand_name'=>$data['brand_name']);

        $brand_products       = $this->db->select('devices_products.id,devices_products.product_model,devices_products.image,
                                                devices_products.product_detail,devices_brands.brand_name,devices_products.new_price,
                                                devices_products.perfect_price,devices_products.good_price,')->from('devices_brands')
                                ->join('devices_products', 'devices_products.brand_id=devices_brands.id', 'left')
                                ->where($condition)->get()->result_array();

        if ($brand_products) {
            return $brand_products;
        }
        else {
            return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
        }
    }

    /**********************************************
     * Get All Products Against Category ID
     **********************************************/
    public function categoryID_products($data)
    {
        if(!isset($data['deviceType_category_id']) || empty($data['deviceType_category_id'])){
            return array('status'=>'FALSE', 'message'=>'deviceType_category_id missing');
        }
        $condition          = array('devices_products.is_deleted'=>0,'devices_products.is_active'=>1,'devices_products.category_id'=>$data['deviceType_category_id']);
        $brand_products     = $this->db->select('devices_products.id,devices_products.product_model,devices_products.image,
                                                devices_products.product_detail,devices_brands.brand_name,devices_products.new_price,
                                                devices_products.perfect_price,devices_products.good_price,')->from('devices_brands')
            ->join('devices_products', 'devices_products.brand_id=devices_brands.id', 'left')
            ->where($condition)->get()->result_array();


        if ($brand_products) {
            return $brand_products;
        }
        else {
            return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
        }
    }

    /**********************************************
     * Get All Top Products
     **********************************************/
    public function top_products()
    {
        $condition       = array('devices_products.is_deleted'=>0,'devices_products.is_active'=>1,'devices_products.top_product'=>1);
        $top_products    = $this->db->select('devices_products.id,devices_brands.brand_name,devices_products.product_model,
                                              devices_products.new_price,devices_products.product_detail,devices_products.image,devices_products.critical_precision_by')
                                              ->from('devices_products')
                                ->join('devices_brands','devices_products.brand_id=devices_brands.id','left')
                                ->where($condition)->get()->result_array();
        if ($top_products) {
            return $top_products;
        }
        else {
            return array('status' => 'FALSE' , 'message' => 'Something Went Wrong.');
        }
    }

    /**********************************************
     * Get Product Detail
     *  devices_products.normal_price,
        devices_products.faulty_price,
        devices_products.perfect_price,
        devices_products.good_price,
     **********************************************/
    public function product_detail($product_id)
    {
        $condition       = array('devices_products.is_deleted'=>0,'devices_products.is_active'=>1,'devices_products.id'=>$product_id);
        $product_detail  = $this->db->select('devices_products.id,devices_products.category_id,devices_products.brand_id,
                                              devices_brands.brand_name,devices_products.product_model,devices_products.product_model,
                                              devices_products.top_product,devices_products.stock,
                                              devices_products.new_price,
                                              devices_products.normal_price,
                                              devices_products.faulty_price,
                                              devices_products.perfect_price,
                                              devices_products.good_price,
                                              devices_products.critical_precision_by,
                                              devices_products.product_detail,devices_products.image')->from('devices_products')
                            ->join('devices_brands','devices_products.brand_id=devices_brands.id','left')
                            ->where($condition)->get()->result_array();




//        $product_detail  =    $this->db->select('*')->where($condition)->get('devices_products')->result_array();
        if ($product_detail) {
            return $product_detail;
        }
        else {
            return array('status' => 'FALSE' , 'message' => 'Product Detail not found, Something Went Wrong');
        }
    }
}
?>
<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 1/9/2019
 * Time: 4:01 PM
 */
function directory_name($name)
{
   // if directory is not exist then create
   if(!file_exists(directory_array($name)))
   { mkdir(directory_array($name), 0777, true);}

   // Return Directory
   return directory_array($name);
}
function directory_array($name)
{

   // Define Constatnt of directory
   $array = array(  'DEVICE_CATEGORY_DIR' => '../assets/images/device_categories/',
                    'CATEGORY_BRAND_DIR' => '../assets/images/category_brands/',
                    'BRAND_PRODUCT_DIR' => '../assets/images/brand_products/',
            );
   return $array[$name];
}

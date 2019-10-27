<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
| example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
| https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
| $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
| $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
| $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples: my-controller/index -> my_controller/index
|   my-controller/my-method -> my_controller/my_method
*/
$route['default_controller'] 				= '';
$route['404_override'] 						= '';
$route['translate_uri_dashes'] 				= TRUE;

// Device | Brands | Product REST API Routes
$route['category_brands'] 					= 'Devices/category_brands';
$route['all_brands'] 					    = 'Devices/all_brands';
$route['brand_products'] 					= 'Devices/brand_products';
$route['all_products'] 					    = 'Devices/all_products';
$route['all_products/(:any)/(:any)'] 		= 'Devices/all_products/$1/$2';
$route['categoryID_products'] 				= 'Devices/categoryID_products';
$route['top_products'] 					    = 'Devices/top_products';
$route['product_detail'] 			        = 'Devices/product_detail';

// Stores
$route['store_location'] 					= 'Store/store_location';
$route['store_location/(:any)/(:any)'] 		= 'Store/store_location/$1/$2';
$route['web_content'] 					    = 'Store/web_content';
$route['devices_incashed']                  = 'Store/devices_incashed';

// Newsletter
$route['newsletter_submit']                 = 'Newsletter/submit_newsletter';

// Device Request
$route['add_contactus']                     = 'Contact/add_contactus';
$route['user_device_reqs']                  = 'DeviceReq/client_device_requests';

// Registeration
$route['signup']                            = 'Users/registration';
$route['client_signin']                     = 'Users/client_signin';


/*******************  ADMIN PHONEBECHDOU ROUTES ************************/
$route['admin_signin']                     = 'Users/admin_signin';
$route['all_registered_users']             = 'Users/all_registered_users';
$route['num_of_users']                     = 'Users/num_of_users';
$route['active_users']                     = 'Users/active_users';

$route['all_mails']                        = 'Contact/all_mails';
$route['unread_mails']                     = 'Contact/unread_mails';
$route['mail_detail/(:any)/(:any)']        = 'Contact/mail_detail/$1/$2';
$route['num_of_mails']                     = 'Contact/num_of_mails';
$route['num_of_sent_mails']                = 'Contact/num_of_sent_mails';
$route['num_of_unread_mails']              = 'Contact/num_of_unread_mails';
$route['sent_mails']                       = 'Contact/sent_mails';

$route['insert_mails_on_queue']            = 'Mails/insert_mails_on_queue';
$route['send_mail']                        = 'Mails/send_mail';
$route['sent_mail_detail/(:any)/(:any)']   = 'Mails/mail_detail/$1/$2';

/************************ Device Selling Request *****************************/
$route['add_device_req']                    = 'DeviceReq/add_device_req';
$route['selling_requests']                  = 'DeviceReq/selling_reqs';
$route['eval_selling_requests']             = 'DeviceReq/eval_selling_reqs';
$route['num_of_selling_req']                = 'DeviceReq/num_of_selling_req';
$route['num_of_unread_selling_req']         = 'DeviceReq/num_of_unread_selling_req';
$route['trash_sellingReq/(:any)/(:any)']    = 'DeviceReq/trash_sellingReq/$1/$2';
$route['req_detail/(:any)/(:any)']          = 'DeviceReq/req_detail/$1/$2';
$route['selling_req_detail/(:any)/(:any)']  = 'DeviceReq/selling_req_detail/$1/$2';
$route['comment_on_sellingReq']             = 'DeviceReq/comment_on_sellingReq';
$route['sellingComment_on_sellingReq']      = 'DeviceReq/sellingComment_on_sellingReq';
$route['update_evaluation_status']          = 'DeviceReq/update_evaluation_status';
$route['update_sale_status']                = 'DeviceReq/update_sale_status';

/************************ Device Buying Request *****************************/
$route['add_buy_device_req']                = 'DeviceBuyReq/add_buy_device_req';
$route['buying_requests']                   = 'DeviceBuyReq/buying_reqs';
$route['buying_status_requests']            = 'DeviceBuyReq/buying_status_requests';
$route['num_of_buying_req']                 = 'DeviceBuyReq/num_of_buying_req';
$route['num_of_unread_buying_req']          = 'DeviceBuyReq/num_of_unread_buying_req';
$route['trash_buyingingReq/(:any)/(:any)']  = 'DeviceBuyReq/trash_buyingingReq/$1/$2';
$route['buy_req_detail/(:any)/(:any)']      = 'DeviceBuyReq/req_detail/$1/$2';
$route['comment_on_buyingReq']              = 'DeviceBuyReq/comment_on_buyingReq';
$route['update_buying_status']              = 'DeviceBuyReq/update_buying_status';
$route['status_req_detail/(:any)/(:any)']   = 'DeviceBuyReq/status_req_detail/$1/$2';
$route['buyingComment_on_buyingReq']        = 'DeviceBuyReq/buyingComment_on_buyingReq';
$route['update_buy_status']                 = 'DeviceBuyReq/update_buy_status';

$route['subscribers_list']                  = 'Users/subscribers';

/************************ Device Category *****************************/
$route['add_new_devCategory']                   = 'DeviceCategory/add_new_category';
$route['all_devCategories'] 					= 'DeviceCategory/all_categories';
$route['devCategory_details/(:any)/(:any)'] 	= 'DeviceCategory/category_details/$1/$2';
$route['update_devCategory'] 					= 'DeviceCategory/update_category';
$route['del_deviceCat/(:any)/(:any)'] 	        = 'DeviceCategory/del_category/$1/$2';

/************************ Device Brands *****************************/
$route['add_new_devBrand']                      = 'DeviceBrand/add_new_brand';
$route['all_devBrands'] 					    = 'DeviceBrand/all_brands';
$route['devBrand_details/(:any)/(:any)'] 	    = 'DeviceBrand/brand_details/$1/$2';
$route['update_devBrand'] 					    = 'DeviceBrand/update_brand';
$route['rel_devBrands/(:any)/(:any)'] 	        = 'DeviceBrand/related_brands/$1/$2';
$route['del_deviceBrand/(:any)/(:any)'] 	    = 'DeviceBrand/del_brand/$1/$2';

/************************ Device Products *****************************/
$route['add_new_devProduct']                    = 'DeviceProduct/add_new_product';
$route['all_devProducts'] 					    = 'DeviceProduct/all_products_new';
$route['devProduct_details/(:any)/(:any)'] 	    = 'DeviceProduct/product_details/$1/$2';
$route['update_devProduct'] 					= 'DeviceProduct/update_product';
$route['rel_devProducts/(:any)/(:any)'] 	    = 'DeviceProduct/related_products/$1/$2';
$route['del_deviceProduct/(:any)/(:any)'] 	    = 'DeviceProduct/del_product/$1/$2';
$route['search_product/(:any)']                        = 'DeviceProduct/search_products/$1';

/************************ Admin *****************************/
$route['add_new_admin']                         = 'Admin/add_new_admin';
$route['all_admins'] 					        = 'Admin/all_admins';
$route['admin_details/(:any)/(:any)'] 	        = 'Admin/admin_details/$1/$2';
$route['update_admin'] 					        = 'Admin/update_admin';
$route['del_admin/(:any)/(:any)'] 	            = 'Admin/del_admin/$1/$2';

/************************ Store Location *****************************/
$route['add_new_storeLocation']                 = 'StoreLocation/add_new_storeLocation';
$route['all_storeLocations'] 					= 'StoreLocation/all_storeLocations';
$route['storeLocation_details/(:any)/(:any)'] 	= 'StoreLocation/location_details/$1/$2';
$route['update_storeLocation'] 					= 'StoreLocation/update_location';
$route['del_storeLocation/(:any)/(:any)'] 	    = 'StoreLocation/del_location/$1/$2';

/************************ Store Location *****************************/
$route['web_content_detail'] 					= 'WebContent/web_content_detail';
$route['update_web_content'] 					= 'WebContent/update_web_content';


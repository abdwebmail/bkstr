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
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Dashboard/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['signin']        = 'RegisteredUsers/login';
$route['admin_login']   = 'RegisteredUsers/admin_login';
$route['logout']        = 'RegisteredUsers/admin_logout';

$route['Dashboard']     = 'Dashboard/index';
$route['dashboard2']    = 'Dashboard/dashboard2';

$route['users']                 = 'RegisteredUsers/index';
$route['num_of_users']          = 'RegisteredUsers/num_of_users';
$route['active_users']          = 'RegisteredUsers/active_users';

$route['compose-mail']          = 'Mails/compose';
$route['inbox']                 = 'Mails/inbox';
$route['inbox_load']            = 'Mails/inbox_load';
$route['sent-mails']            = 'Mails/sent_mails';
$route['sent-mailDetail/(:any)']= 'Mails/sent_mailDetail/$1';
$route['send_mail_to_users']    = 'Mails/send_mail_to_users';
$route['sent_mails_load']       = 'Mails/sent_mails_load';
$route['mail-detail/(:any)']    = 'Mails/mail_detail/$1';
$route['unread_mails']          = 'Mails/unread_mails';
$route['num_of_mails']          = 'Mails/num_of_mails';
$route['num_of_sent_mails']     = 'Mails/num_of_sent_mails';
$route['num_of_unread_mails']   = 'Mails/num_of_unread_mails';

/************************ Device Selling Requests *****************************/
$route['selling-reqs']                  = 'SellingDeviceReq/evaluation_reqs';
$route['selling-req-status']            = 'SellingDeviceReq/evaluation_selling_req';
$route['num_of_selling_req']            = 'SellingDeviceReq/num_of_selling_req';
$route['num_of_unread_selling_req']     = 'SellingDeviceReq/num_of_unread_selling_req';
$route['trash_sellingReq']              = 'SellingDeviceReq/trash_sellingReq';
$route['req-detail/(:any)']             = 'SellingDeviceReq/req_detail/$1';
$route['selling-req-detail/(:any)']     = 'SellingDeviceReq/sell_req_detail/$1';
$route['save_comment']                  = 'SellingDeviceReq/save_comment';
$route['save_sellingComment']           = 'SellingDeviceReq/save_sellingComment';
$route['update_evaluation_status']      = 'SellingDeviceReq/update_evaluation_status';
$route['update_sale_status']            = 'SellingDeviceReq/update_sale_status';

/************************ Device Buying Requests *****************************/
$route['buy-req']                       = 'BuyingDeviceReq/buying_requests';
$route['buy-req-detail/(:any)']         = 'BuyingDeviceReq/req_detail/$1';
$route['buy-req-status']                = 'BuyingDeviceReq/buying_requests_status';
$route['trash_buyingingReq']            = 'BuyingDeviceReq/trash_buyingReq';
$route['buy_save_comment']              = 'BuyingDeviceReq/save_comment';
$route['update_buying_status']          = 'BuyingDeviceReq/update_buying_status';
$route['buying-status-detail/(:any)']   = 'BuyingDeviceReq/status_req_detail/$1';
$route['save_buyingComment']            = 'BuyingDeviceReq/save_buyingComment';
$route['update_buy_status']             = 'BuyingDeviceReq/update_buy_status';
$route['num_of_buying_req']             = 'BuyingDeviceReq/num_of_buying_req';
$route['num_of_unread_buying_req']      = 'BuyingDeviceReq/num_of_unread_buying_req';

/************************ Device Category *****************************/
$route['add-newCategory']               = 'DeviceCategory/add_new_category';
$route['submit_deviceCategory']         = 'DeviceCategory/submit_deviceCategory';
$route['edit-device-category/(:any)']   = 'DeviceCategory/edit_deviceCategory/$1';
$route['update_deviceCategory']         = 'DeviceCategory/update_deviceCategory';
$route['categories-list']               = 'DeviceCategory/categories_list';
$route['del-device-category/(:any)']    = 'DeviceCategory/del_deviceCategory/$1';

/************************ Device Brands *****************************/
$route['add-newBrand']                  = 'DeviceBrand/add_new_brand';
$route['submit_deviceBrand']            = 'DeviceBrand/submit_deviceBrand';
$route['edit-device-brand/(:any)']      = 'DeviceBrand/edit_deviceBrand/$1';
$route['update_deviceBrand']            = 'DeviceBrand/update_deviceBrand';
$route['brands-list']                   = 'DeviceBrand/brand_list';
$route['brands-list/(:any)']            = 'DeviceBrand/brand_list/$1';
$route['related-brands/(:any)']         = 'DeviceBrand/related_brands/$1';
$route['del-device-brand/(:any)']       = 'DeviceBrand/del_deviceBrand/$1';

/************************ Device Products *****************************/
$route['add-newProduct']                  = 'DeviceProduct/add_new_product';
$route['submit_deviceProduct']            = 'DeviceProduct/submit_deviceProduct';
$route['edit-device-product/(:any)']      = 'DeviceProduct/edit_deviceProduct/$1';
$route['update_deviceProduct']            = 'DeviceProduct/update_deviceProduct';
$route['products-list']                   = 'DeviceProduct/product_list';
$route['products-list/(:any)']            = 'DeviceProduct/product_list/$1';
$route['del-device-product/(:any)']       = 'DeviceProduct/del_deviceProduct/$1';

/************************ Admin *****************************/
$route['add-newAdmin']                  = 'Admin/add_new_admin';
$route['submit_newAdmin']               = 'Admin/submit_newAdmin';
$route['edit-admin_view']               = 'Admin/edit_admin_view';
$route['update_admin']                  = 'Admin/update_admin';
$route['admin-list']                    = 'Admin/admin_list';
$route['del-admin/(:any)']              = 'Admin/del_admin/$1';

/************************ Store Location *****************************/
$route['add-storeLocation']             = 'StoreLocation/add_new_store';
$route['location-list']                 = 'StoreLocation/location_list';
$route['submit_newStore']               = 'StoreLocation/submit_storeLocation';
$route['edit-location/(:any)']          = 'StoreLocation/edit_store_location/$1';
$route['update_location']               = 'StoreLocation/update_storeLocation';
$route['del-location/(:any)']           = 'StoreLocation/del_storeLocation/$1';

/************************ WebContent *****************************/
$route['web-content']                   = 'WebContent/web_content';
$route['update_webContent']             = 'WebContent/update_webContent';

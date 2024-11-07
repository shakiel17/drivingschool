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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['print_invoice_summary/(:any)'] = 'pages/print_invoice_summary/$1';
$route['print_invoice/(:any)'] = 'pages/print_invoice/$1';
$route['update_payment_status/(:any)/(:any)'] = 'pages/update_payment_status/$1/$2';
$route['view_proof_payment/(:any)'] = 'pages/view_proof_payment/$1';
$route['manage_user_payment/(:any)'] = 'pages/manage_user_payment/$1';
$route['update_session_status/(:any)/(:any)/(:any)'] = 'pages/update_session_status/$1/$2/$3';
$route['remove_session_admin/(:any)/(:any)'] = 'pages/remove_session_admin/$1/$2';
$route['update_session'] = 'pages/update_session';
$route['edit_session/(:any)/(:any)'] = 'pages/edit_session/$1/$2';
$route['manage_user_session/(:any)'] = 'pages/manage_user_session/$1';
$route['manage_enrollee'] = 'pages/manage_enrollee';
$route['remove_payment/(:any)/(:any)'] = 'pages/remove_payment/$1/$2';
$route['user_payment_save'] = 'pages/user_payment_save';
$route['user_payment/(:any)'] = 'pages/user_payment/$1';
$route['remove_session/(:any)/(:any)'] = 'pages/remove_session/$1/$2';
$route['select_session_datetime'] = 'pages/select_session_datetime';
$route['select_car_session'] = 'pages/select_car_session';
$route['new_session'] = 'pages/new_session';
$route['user_session/(:any)'] = 'pages/user_session/$1';
$route['save_enrollment'] = 'pages/save_enrollment';
$route['user_enrollment'] = 'pages/user_enrollment';
$route['delete_car/(:any)'] = 'pages/delete_car/$1';
$route['save_car_image'] = 'pages/save_car_image';
$route['save_car'] = 'pages/save_car';
$route['manage_cars'] = 'pages/manage_cars';
$route['delete_instructor/(:any)'] = 'pages/delete_instructor/$1';
$route['save_instructor_image'] = 'pages/save_instructor_image';
$route['save_instructor'] = 'pages/save_instructor';
$route['manage_instructor'] = 'pages/manage_instructor';
$route['admin_logout'] = 'pages/admin_logout';
$route['admin_main'] = 'pages/admin_main';
$route['admin_authentication'] = 'pages/admin_authentication';
$route['admin'] = 'pages/admin';
$route['user_logout'] = 'pages/user_logout';
$route['user_main'] = 'pages/user_main';
$route['save_registration'] = 'pages/save_registration';
$route['register'] = 'pages/register';
$route['user_authentication'] = 'pages/user_authentication';
$route['default_controller'] = 'pages/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

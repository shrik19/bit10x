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
$route['default_controller'] 				= 'user/site';
$route['404_override'] 						= '';
$route['translate_uri_dashes'] 				= FALSE;
// $route['^(\w{2})/(.*)$'] 					= '$2';
// $route['^(\w{2})$'] 						= $route['default_controller'];

$route['signals'] 							= 'user/signals';
$route['training'] 							= 'user/training';

$route['user/'] 							= 'user/index';
$route['user/login'] 						= 'user/login';
$route['user/dashboard'] 					= 'user/index';
$route['user/forgot'] 						= 'user/forgot';
$route['user/logout'] 						= 'user/logout';
$route['user/register'] 					= 'user/register';

$route['user/verification/(:any)']          = "user/verification/$1";
$route['user/resetpassword/(:any)']         = "user/resetpassword/$1";
$route['user/resetpasswordadmin/(:any)']    = "user/resetpasswordadmin/$1";

$route['user/settings'] 					= 'user/settings';

$route['admin/login'] 						= 'admin/login';
$route['admin/dashboard'] 					= 'admin/index';
$route['admin/'] 							= 'admin/index';

$route['admin/contentpage'] 				        = 'contentpage/index';
$route['admin/contentpageadd']                     = "contentpage/add";
$route['admin/contentpagedit/(:any)']             = "contentpage/edit/$1";
$route['admin/contentpagedelete/(:any)']             = "contentpage/delete/$1";
$route['admin/contentpagesave']['post']           = "contentpage/save";

$route['admin/coins'] 				        = 'coin/index';
$route['admin/coinadd']                     = "coin/add";
$route['admin/coindit/(:any)']             = "coin/edit/$1";
$route['admin/coindelete/(:any)']             = "coin/delete/$1";
$route['admin/coinsave']['post']           = "coin/save";

$route['admin/users'] 				        = 'user/userlising';
$route['admin/usersbyaffiliatecode/(:any)']             = "user/usersbyaffiliatecode/$1";
$route['admin/getallpackagedetailsbyuser']             = "user/getallpackagedetailsbyuser";
$route['admin/useredit/(:any)']             = "user/useredit/$1";
$route['admin/userdelete/(:any)']             = "user/userdelete/$1";
$route['admin/usersave']['post']            = "user/usersave";


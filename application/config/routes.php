<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "chomecontroller";
$route['search'] = "csearchtrainercontroller";
$route['search/(.*)'] = "csearchtrainercontroller/$1";
$route['admin'] = "admin/cadminauthenticationcontroller";
$route['admin/(.*)'] = "admin/cadminauthenticationcontroller/$1";
$route['admin_dashboard'] = "admin/cadmindashboardcontroller";
$route['admin_dashboard/(.*)'] = "admin/cadmindashboardcontroller/$1";
$route['admin_trainers'] = "admin/cadmintrainerscontroller";
$route['admin_trainers/(.*)'] = "admin/cadmintrainerscontroller/$1";
$route['admin_users'] = "admin/cadminuserscontroller";
$route['admin_users/(.*)'] = "admin/cadminuserscontroller/$1";
$route['category_subjects'] = "admin/cadmincategorysubjectscontroller";
$route['category_subjects/(.*)'] = "admin/cadmincategorysubjectscontroller/$1";
$route['sms_templates'] = "admin/cadminsmstemplatescontroller";
$route['sms_templates/(.*)'] = "admin/cadminsmstemplatescontroller/$1";
$route['register'] = "cregistercontroller";
$route['register/(.*)'] = "admin/cregistercontroller/$1";
$route['admin_states'] = "admin/cadminstatescontroller";
$route['admin_states/(.*)'] = "admin/cadminstatescontroller/$1";
$route['admin_cities'] = "admin/cadmincitiescontroller";
$route['admin_cities/(.*)'] = "admin/cadmincitiescontroller/$1";
$route['admin_reviews'] = "admin/cadminreviewscontroller";
$route['admin_reviews/(.*)'] = "admin/cadminreviewscontroller/$1";
$route['admin_coin_transactions'] = "admin/cadmincointransactionscontroller";
$route['admin_coin_transactions/(.*)'] = "admin/cadmincointransactionscontroller/$1";
$route['admin_advertisers'] = "admin/cadminadvertiserscontroller";
$route['admin_advertisers/(.*)'] = "admin/cadminadvertiserscontroller/$1";
$route['admin_advertisements'] = "admin/cadminadvertisementscontroller";
$route['admin_advertisements/(.*)'] = "admin/cadminadvertisementscontroller/$1";
$route['404_override'] = '';

/*$arrControllerMapping = array( 'search' => 'CSearchTrainerController' );
$strController = getController( $arrControllerMapping, $_REQUEST['module'] );
echo APPPATH;
echo $strController;die;*/

/* End of file routes.php */
/* Location: ./application/config/routes.php */
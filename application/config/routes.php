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
$home    = md5('home');
$paslon  = md5('paslon');
$rel 	 = md5('relawan');
$tps 	 = md5('tps');
$lap 	 = md5('laporan');
$profile = md5('profile');

//login
$route['default_controller']  = 'welcome';
$route['user-login']		  = 'welcome/user';
$route['auth-login']		  = 'welcome/login_admin';
$route['auth-user']			  = 'welcome/login_user';

//backend
$route['simpan-calon/(:any)']		  = 'calon/create/$1';

//menu
$route['dashboard/'.$home.'_(:any)']   = 'menu/home/$1';
$route['paslon/'.$paslon.'_(:any)']    = 'menu/calon/$1';
$route['relawan/'.$rel.'_(:any)']	   = 'menu/user/$1';
$route['laporan-tps/'.$tps.'_(:any)']  = 'menu/tps/$1';
$route['laporan-real/'.$lap.'_(:any)'] = 'menu/laporan/$1';
$route['profile/'.$profile.'_(:any)']  = 'menu/profile/$1';

$route['404_override'] = 'menu/notfound';
$route['translate_uri_dashes'] = FALSE;

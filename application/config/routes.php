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

$route['default_controller'] = "start";
$route['404_override'] = '';







/*
To load sub-direcotries names defined in config
*/
$office= $this->config->item('office_base_url');
$nearby= $this->config->item('nearby_base_url');
$contact= $this->config->item('contact_base_url');
$print= $this->config->item('print');

//handle old url dir format
$office1 =urlencode('مكتب-بريد');
$nearby1 =urlencode('مكاتب-البريد-بالقرب-من');




$route['(\w{2})/'.$office.'/(:any)']  = "main/index/$2";
$route[$office.'/(:any)']  = "main/index/$2";

$route['(\w{2})/'.$office1.'/(:any)'] = "main/index/$2";
$route[$office1.'/(:any)'] = "main/index/$2";

$route['(\w{2})/'.$nearby.'/(:any)'] = "related/index/$2";
$route[$nearby.'/(:any)'] = "related/index/$2";

$route['(\w{2})/'.$nearby1.'/(:any)'] = "related/index/$2";
$route[$nearby1.'/(:any)'] = "related/index/$2";

$route['(\w{2})/'.$print.'/(:any)']    ="main/printOffice/$2";
$route[$print.'/(:any)']    ="main/printOffice/$2";

$route['(\w{2})/'.$contact] = "contactus";
$route[$contact] = "contactus";

$route['(\w{2})/'.'sitemap.xml'] ="seo/sitemap";
$route['sitemap.xml'] ="seo/sitemap";

$route['(\w{2})/'.'sitemap'] ="seo/googlesitemap";
$route['sitemap'] ="seo/googlesitemap";

//temp
//route example: http://domain.tld/en/controller => http://domain.tld/controller
$route['(\w{2})/(.*)'] = '$2';
$route['(\w{2})'] = $route['default_controller'];



/* End of file routes.php */
/* Location: ./application/config/routes.php */
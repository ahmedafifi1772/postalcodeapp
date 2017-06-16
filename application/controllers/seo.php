<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SEO extends CI_Controller {

function __construct(){
	parent::__construct();

	$this->load->helper('language');
	$this->lang->load('home_page', $this->config->item('language'));
}


function sitemap(){

$this->load->model('Office');
$this->load->model('Places');

$qoffices="SELECT route FROM main ORDER BY visits DESC";
$qplaces="SELECT route, `date` FROM places";

$offices = $this->db->query($qoffices);
$places = $this->db->query($qplaces);

$data['urls']=array();

$this->load->helper('url');

//main url
$url =array();
$url['route'] = base_url();
$url['date']  = date('Y-m-d @ H:i') ;
$url['priority'] = 1;
$url['changefreq'] ='daily';
	array_push($data['urls'], $url);

//offices
foreach ($offices->result() as $office) {
	$url =array();
	 $url['route'] =  urldecode(office_base_url() .'/'. $office->route );
	 $url['date']  =  date('Y-m-d @ H:i') ;
	 $url['priority']=0.8; 
	 $url['changefreq'] ='daily';
	array_push($data['urls'], $url);

}

//places
foreach ($places->result() as $place) {
	$url = array();
	$url['route'] = urldecode(nearby_base_url() . $place->route);
	$url['date']  = $place->date;
	$url['priority']=0.6; 
	$url['changefreq'] ='daily';
	array_push($data['urls'], $url);
}




$this->load->view('sitemap', $data);

}

function googlesitemap(){

$this->load->model('Office');
$this->load->model('Places');

$qoffices="SELECT route FROM main ORDER BY visits DESC";
$qplaces="SELECT route, `date` FROM places";

$offices = $this->db->query($qoffices);
$places = $this->db->query($qplaces);

$data['urls']=array();

$this->load->helper('url');

//main url
$url =array();
$url['route'] = base_url();
$url['date']  = date('Y-m-d') ;
$url['priority'] = 1;
$url['changefreq'] ='daily';
	array_push($data['urls'], $url);

//offices
foreach ($offices->result() as $office) {
	$url =array();
	 $url['route'] =  urldecode(office_base_url() .'/'. $office->route );
	 $url['date']  =  date('Y-m-d') ;
	 $url['priority']=0.8; 
	 $url['changefreq'] ='daily';
	array_push($data['urls'], $url);

}

//places
foreach ($places->result() as $place) {
	$url = array(); 
	$url['route'] = urldecode(nearby_base_url() . $place->route);
	$url['date']  = date('Y-m-d', strtotime($place->date) );
	$url['priority']=0.6; 
	$url['changefreq'] ='daily';
	array_push($data['urls'], $url);
}



header("Content-Type: text/xml;charset=utf-8");
$this->load->view('gsitemap', $data);

}


//Edit
function Edit(){
	$this->load->model('Office');
	$sql = "SELECT * FROM main WHERE night LIKE '' OR fast LIKE '' OR wss LIKE '' OR ws LIKE '' OR fory LIKE '' OR 
	        ifs LIKE '' OR pos LIKE '' OR atm LIKE ''";
	
	$q= $this->Office->db->query($sql);
	$res=$q->result();
	echo count($res)."<br>";
header("Content-Type: text/html;charset=utf-8");	
	foreach($res as $office){
		$ob = new Office();
		echo $office->night ."-". $office->fast."-". $office->wss . "-". $office->fory ."-". $office->ifs ."-". $office->pos."-".$office->atm."<br>";

	}
	
	

	
}


}

?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header('Content-Type: text/html; charset=utf-8');

class Related extends CI_Controller {

function index($route=NULL){
	$route =urldecode($route);

if(isset($route)){
	$this->load->model('Places');
	$this->Places->getByRoute($route);

	$data =array();
	$data['place'] = $this->Places;

	$data['offices']= array();

	 $this->load->model('Nearby');
	//get offices by geonames
	 $offices = $this->Nearby->get_by_geoname($this->Places->geonameid);




	 $this->load->helper('url');
	 	$this->load->model('Office');

	 foreach ($offices as $office) {
	 	$temp = new Office();
	 	$temp->load($office->office_id);
	 	$temp->route = office_base_url() . '/' .$temp->route;
	array_push($data['offices'], $temp);

	 }

	 $this->load->view('place', $data);
$footer['mostvisited']=$this->Office->footerMV();
$this->load->view('footer', $footer);

}

}

}

?>
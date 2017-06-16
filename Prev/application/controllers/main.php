<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header('Content-Type: text/html; charset=utf-8');

class Main extends CI_Controller {



function index($name=NULL){
if( isset($name) ){
		$url=urldecode($name);
	// echo $url."<br>";
$this->load->helper('url');
$this->load->library('table');
$this->load->model('Office');
	
if($this->Office->get_url($url)){
	$office = array();
	$office['info'] = $this->Office;

//visit++

	$this->Office->visitIncrement( $this->Office->id );

$this->load->model('Nearby');
$this->load->model('Geoname');
$this->load->model('Places');
$nearbyLocations = $this->Nearby->get_by_office($this->Office->id);
$locations =array();
foreach ($nearbyLocations as $row) {
$this->Places->getGeoname($row->geoname_id);

	 $url = nearby_base_url().$this->Places->route;
	$locations[] = array("<a href='{$url}'>".$this->Places->address."</a>") ;
}
// $data = array('office' => $this->Office , 
// 	           'locations'=>$locations);
// $this->load->view('rate',   $data );

// $office['places']= array();
$office['places']=$locations;
	$this->load->view('office', $office);

$footer['mostvisited'] = $this->Office->footerMV();	
	$this->load->view('footer', $footer);


}//no result found
else{
	show_404();
}

}//no paramter-url set
	else{
	show_404();
}



}


//Print  take office id
function printOffice($id=NULL){
	if(isset($id)){

		$this->load->model('Office');
		$this->Office->load($id);
		$this->Office->addPostOfficePrefix();
		$this->Office->checkService();

		$this->load->view('print', $this->Office);


	}else{
		show_404();
	}

}





}

?>
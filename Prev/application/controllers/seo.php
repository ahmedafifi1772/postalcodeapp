<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SEO extends CI_Controller {

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



function Edit(){
	$this->load->model('Places');
	$this->load->model('Nearby');
	
	$q = $this->Places->db->get_where('places', array('address'=>','));
	$result = $q->result();
	echo count($result) ."<br>";
	foreach($result as $place){
		$n = new Nearby();
		$p = new Places();

		$ns = $n->get_by_geoname( $place->geonameid);
		foreach ($ns as $key) {
			$n->load($key->id);
			$n->delete();
		}

		

		$p->load($place->id);
		$p->delete();

	} 
	echo "<br>hi<br>";
	
}

}

?>
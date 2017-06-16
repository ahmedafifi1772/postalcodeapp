<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header('Content-Type: text/html; charset=utf-8');

class Places extends MY_Model{
	const DB_TABLE='places';
	const DB_TABLE_PK='id';

/*
* route = address decoded
*/
public $id, $geonameid, $route, $address, $date;

/*
* check if place exist reurn true
*/
function checkPlace($geoId){
	$query=$this->db->get_where($this::DB_TABLE, array('geonameid' => $geoId));

	if($query->num_rows() > 0){
		return true;
	}else{
		return false;
	}
}

function getGeoname($geoId){
	$query=$this->db->get_where($this::DB_TABLE, array('geonameid' => $geoId));
$this->populate($query->row() );

}

function getByRoute($r){
	$query=$this->db->get_where($this::DB_TABLE, array('route' => $r));
$this->populate($query->row() );	
}





function search($query){
$sql = "SELECT `route`,`address` FROM `places` WHERE `address` LIKE '%{$query}%' LIMIT 15";

  $response['results'] = array();
  $response['type'] = 1;

  $places = $this->db->query( $sql);
  if(count( $places->result()) >0){
  	$this->load->helper('url');
  	$this->load->model('Office');
foreach ($places->result() as $place) {
		 $url = nearby_base_url().$place->route;
		 $place->route  =$url;
		 $place->address = $this->Office->queryHighlight( $place->address, $query);
  array_push($response['results'], $place);
}
return $response;
}else{
return false;
}

}

}
?>
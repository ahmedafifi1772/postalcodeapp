<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header('Content-Type: text/html; charset=utf-8');

class Nearby extends MY_Model{
	const DB_TABLE='nearby';
	const DB_TABLE_PK='id';


	public $id, $office_id, $geoname_id, $date;
/*
* Check if nearby place exist return true
* of not return false
*/

function checkNearby($office, $geoname){
	$query=$this->db->query("SELECT * FROM nearby WHERE 
		office_id= {$office} AND geoname_id={$geoname}");
	
	if($query->num_rows() >0){
		return true;
	}else{
		return false;
	}
}

//get geonames related to office
function get_by_office($office){
	$query= $this->db->get_where($this::DB_TABLE, array(
		'office_id'=> $office,
		));
	return $query->result();

}

//Get offices related to geoname
function get_by_geoname($geoname){
	$query= $this->db->get_where($this::DB_TABLE, array(
		'geoname_id'=> $geoname,
		));
	return $query->result();

}

}

?>
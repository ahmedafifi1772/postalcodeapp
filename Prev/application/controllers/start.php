<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Start extends CI_Controller {

function index(){
	// $this->load->view('check');
	$this->load->model('Office');
$data['mostvisited']=array();
	$data['mostvisited'] = $this->Office->getMostVisited( );
	$footer['mostvisited']= $this->Office->footerMV();


	$this->load->helper('url');
	$this->load->view('home', $data);
	$this->load->view('footer', $footer);
}

}
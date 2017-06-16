<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header('Content-Type: text/html; charset=utf-8');

class Contactus extends CI_Controller {



function index(){
	$this->load->model('Office');
	$this->load->helper('url');
	$this->load->view('contactform');

	$data['mostvisited'] = $this->Office->footerMV();
	$this->load->view('footer', $data);
}

};
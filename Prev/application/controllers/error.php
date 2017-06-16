<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header('Content-Type: text/html; charset=utf-8');

class Error extends CI_Controller {



function index(){
	$this->load->helper('url');

	$this->load->view('mainview');

	 	//  echo $heading ; 

		 // echo $message; 

	$this->load->view('footer');
}







}
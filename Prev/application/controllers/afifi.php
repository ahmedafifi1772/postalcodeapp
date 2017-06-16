<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Afifi extends CI_Controller {

function index(){
	echo "ff";
	$this->load->helper('url');
		$this->load->view('checkmap');
}

function checkmap(){
  
  $this->load->model('Office');

	if( isset($_GET['request']) ){ 
		
		$request = $_GET['request'];

		if($request=='get_unknown'){
				$id= isset($_GET['id'])? $_GET['id'] : NULL;

					$code = $this->Office->get_next($id);

				$response['address'] = $code->address;
				$response['office'] = $code->office;
				$response['id'] = $code->id;
				$response['city'] = $code->city;
				$response['code'] = $code->postal_code;

				//echo $code->address;
				echo json_encode($response);

		}



		else if($request == 'save'){
		if(isset($_GET['lat']) && isset($_GET['lng']) && isset($_GET['id'])){
		$response['state']=0;

			$lat = $_GET['lat'];
			$lng = $_GET['lng'];
			$id = $_GET['id'];

	    $current=new Office();
	    $current->load($id);

		$response['state']=0;

		$current->lat= $lat;
		$current->lng= $lng;
		$current->save();

		
		$response['state']=1;
		$code = $this->Office->get_next($id);
		$response['address'] = $code->address;
		$response['office'] = $code->office;
		$response['city'] = $code->city;
		$response['code'] = $code->postal_code;

		$response['id'] = $code->id;

		


		echo json_encode($response);

	    }

		}//End of save


	}//request set

}


}


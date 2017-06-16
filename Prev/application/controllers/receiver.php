<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Receiver extends CI_Controller {

function index(){
	// echo "Index";
}

function geocode(){	
if(
	isset($_POST['lat']) &&
	isset($_POST['lng']) 
	){

$lat=$_POST['lat'];
$lng=$_POST['lng'];

$this->load->model('Office');
$this->Office->geocode($lat, $lng);
}

}


function rate(){	
if(
	isset($_POST['lat']) &&
	isset($_POST['lng']) &&
	isset($_POST['id'])
	){

$lat=$_POST['lat'];
$lng=$_POST['lng'];
$id=$_POST['id'];

$this->load->model('Geoname');
$this->Geoname->geocode($lat, $lng, $id);
}

}

function search(){
	if(isset($_POST['query']) ){
    $query=$this->input->post('query');

	$this->load->model('Office');
	$response=$this->Office->search(trim($query));
	if($response){
		echo json_encode($response);
	}else{
	
	$this->load->model('Places');
	$response = $this->Places->search(trim($query));
	
	  if($response){
		echo json_encode($response) ;		
	  }	

	}
  
  }


}


function report(){

$this->load->model('report');

$Report = new Report();

$Report->office_id =  $this->input->post('office_id');
$Report->lat       = $this->input->post('lat');
$Report->lng       = $this->input->post('lng');
$Report->type      = $this->input->post('type');
$Report->problem   = $this->input->post('problem');

$Report->save() ;


}



function contact(){
	if( isset($_POST['name']) && isset($_POST['phone']) &&
	    isset($_POST['email']) && isset($_POST['msg'])
        ){
$name  =$this->input->post('name');
$phone =$this->input->post('phone');
$email =$this->input->post('email');
$msg   =$this->input->post('msg');

$date= date("Y-m-d");

$mail_bdy = "<strong>From</strong>: " . $name ."<br>";

$mail_bdy .="<strong>E-mail</strong>: " .$email."<br>";

$mail_bdy .="<strong>Phone</strong>: " .$phone."<br>";

$mail_bdy .="<strong>Message</strong>: ". $msg ."<br>";



$mail_bdy .= "<strong>sent at</strong>: ".$date;


$to ='ahmedafifi1772@gmail.com';	
$sub ='Contact -Postal';
	
		$this->load->model('Mymail');
		if($this->Mymail->mailhandler( $to, $sub, $mail_bdy )){
				echo "تم ارسال الرسالة بنجاح , شكراً";		
		}else{
			echo "حدث خطأ فى الارسال رجاء المحاولة مرة اخرى فيما بعد, او ارسال رسالتلك على ايميل <br>
			      ". $to;
		}
		
}
else{
echo "برجاء التاكد من ادخال كل البيانات";
}
}



function sendPage(){
	if( isset($_POST['from']) && isset($_POST['to']) ){
		$from = $this->input->post('from');
		$to   = $this->input->post('to');
		
		$msg="";
		if(isset($_POST['msg']))
			$msg = $this->input->post('msg');
			
		$date= date("Y-m-d");

		$site ="www.yourpostcode.com";
		$sub = $this->input->post('title');
		$link = $this->input->post('link');

		$mail_bdy  ="<div style='direction:rtl;'>";
		$mail_bdy .= $msg ."<br>";
		$mail_bdy .= "<a target='_blank' href='". $link ."'>". $link. "</a> ";
		$mail_bdy .= "<br><br>" ;
		$mail_bdy .=" -- تم ارسال هذة الرسالة بواسطة <br>";
		$mail_bdy .= $from."<br>";
		$mail_bdy .="من خلال <br>";
		$mail_bdy .="<a target='_blank' href='".$site. "'> ". $site. "</a>";
		$mail_bdy .="</div>";
		
		$this->load->model('Mymail');
		if($this->Mymail->mailhandler( $to, $sub, $mail_bdy ,$from )){
				echo "تم ارسال الرسالة بنجاح , شكراً";		
		}else{
			echo "حدث خطاء برجاء المحاولة مرة اخرى فى وقت لاحق";
			      
		}

	}
	else{
	echo "برجاء التاكد من ادخال كل البيانات";
	}
}	






}
?>

<?php

class Office extends MY_Model{
	const DB_TABLE='main';
	const DB_TABLE_PK='id';

public $id, $ws, $ifs, $pos, $atm, $telephone, $postal_code, $financial_code, $address,
       $office, $section, $lat, $lng, $city,
       $night, $fast, $wss, $fory,
       $flag, $route;
/*
One int value for work hours office related 
1 - Default : Sun-Thurs 3:8
2 -         : Sat- Wed  3:8
3 -         : Sat- Thurs  3:8
*/
public $work_hours;

// search and auto detetions NO.
public $visits;	

function geocode($lat, $lng){
                 


// return 0;
// require_once('code.php');
$sql="
CREATE PROCEDURE  geodist (IN dist int, IN mylon double, IN mylat double, IN limit_no int)
BEGIN

declare lon1 float; declare lon2 float;
declare lat1 float; declare lat2 float;

-- get the original lon and lat for the userid

-- select longitude, latitude into mylon, mylat from users5
-- where id=userid limit 1;



-- calculate lon and lat for the rectangle:
set lon1 = mylon-dist/abs(cos(radians(mylat))*69);
set lon2 = mylon+dist/abs(cos(radians(mylat))*69);
set lat1 = mylat-(dist/69);
 set lat2 = mylat+(dist/69);

-- run the query:
SELECT destination.id ,destination.route ,destination.office ,destination.postal_code,
3956 * 2 * ASIN(SQRT( POWER(SIN((mylat -
destination.lat) * pi()/180 / 2), 2) +
COS(mylat * pi()/180) * COS(destination.lat * pi()/180) *
POWER(SIN((mylon -destination.lng) * pi()/180 / 2), 2) )) as
distance FROM main destination
WHERE 
    destination.lng between lon1 and lon2
and destination.lat between lat1 and lat2
having distance < dist ORDER BY Distance limit limit_no ;
END 


";  

$drop ="DROP PROCEDURE IF EXISTS geodist";

$KM =10;
$sql2="CALL geodist({$KM} , {$lng},{$lat}, 1);";

  //@Code::find_by_sql( $drop );
  //@Code::find_by_sql( $sql );
// @$this->db->query( $drop );
// @$this->db->query( $sql );

// while (!$codes) {
// 	$KM++;
// $codes  = $this->db->query( $sql2 );
// }



$this->load->helper('url');
$response['results'] = array();	
 $this->db->query( $drop );
 $this->db->query( $sql );
$codes  = $this->db->query( $sql2 );

// $result=$codes->result();

foreach ($codes->result() as $row) {

   
          $temp = new Office();   
   
          $temp->populate( $row );
          // $temp->lat=-1;
          // $temp->lng=-1;
          
          $temp->AddPostOfficePrefix();  
          $temp->AddBaseOfficeURL();
	     array_push($response['results'] , $temp);
}



// if($codes){
// 	$response['status']=0;
// 	foreach ($codes as $code) {
// 	$response['status']=1;
//      array_push($response['results'], $code);		
//     }
// }

echo json_encode($response);


}//geocode



function search($query){
  $sql = "SELECT `office`, `address`, `route` FROM `main` 
           WHERE `office` LIKE '%{$query}%'
           OR `address` LIKE '%{$query}%'
           LIMIT 5 ";
  $response['results'] = array();
    $response['type'] = 0;

  $offices = $this->db->query( $sql);
  if(count( $offices->result()) >0){
      $this->load->helper('url');
          foreach ($offices->result() as $office) {
            $temp = new Office();
            $temp->populate( $office );
            $temp->AddBaseOfficeURL();
            //highlight query of result
           $temp->office = self::queryHighlight( $temp->office , $query);
           $temp->address= self::queryHighlight( $temp->address , $query);
            array_push($response['results'], $temp);
            // unset( $this->id);
            }
      return $response;
  }else{
    return false;
  }


}


function AddPostOfficePrefix(){
  $this->office = ' مكتب بريد ' . $this->office ;
}

function queryHighlight($result , $query){
  if( strpos($result, $query) !== false){
    $qHighlight = '<query>' . $query .'</query>';
    $new = str_replace( $query, $qHighlight, $result);
    return $new;
  }else{
    return $result;
  }
}

function AddBaseOfficeURL(){
  $this->load->helper('url');
    $this->route = office_base_url().'/'.$this->route;
}

function isServiceAvailable($t_f){
  if($t_f == 't'){
    return 'متاح';
  }else if($t_f == 'f'){
    return "غير متاح";
  }
}

function checkService(){
  $this->atm = $this->isServiceAvailable( $this->atm );
  $this->ifs = $this->isServiceAvailable( $this->ifs );
  $this->fory = $this->isServiceAvailable( $this->fory );
  $this->ws = $this->isServiceAvailable( $this->ws );
  $this->fast = $this->isServiceAvailable( $this->fast );
  $this->pos = $this->isServiceAvailable( $this->pos );

}

function visitIncrement($id){
  $temp = new Office();
  $temp->load($id);
  $temp->visits = $temp->visits +1;
    $temp->save();

}



function footerMV(){
$result['footer']=array();
$footer=array();
$sql = "SELECT office , route, postal_code FROM " . $this::DB_TABLE .  "  ORDER BY visits DESC  LIMIT 10";


$cairos = $this->db->query($sql);
foreach ($cairos->result() as $cairo) {
  $temp = new Office();
  $temp->populate($cairo);
  $temp->AddBaseOfficeURL();
  $temp->AddPostOfficePrefix();
  array_push($footer , $temp);
}
  $result['footer'] = $footer;

  return $result;

}

function getMostVisited(){

$sections = array('القاهرة الكبرى', 'شـمــال الدلتـــا' , 'شــرق الـدلـتــــا' , 'غـرب الـدلـتــــا');

 $result = array();

$result['sections']=array();

$result['title']=array();
$result['title']=$sections;


$index=0;
foreach ($sections as $section) {  

$secArrays = array();


$sql = "SELECT office , route FROM " . $this::DB_TABLE .  " WHERE section LIKE '".$section."' ORDER BY visits DESC  LIMIT 10";


$cairos = $this->db->query($sql);
foreach ($cairos->result() as $cairo) {
  $temp = new Office();
  $temp->populate($cairo);
  $temp->AddBaseOfficeURL();
  $temp->AddPostOfficePrefix();
  array_push($secArrays , $temp);
}


  array_push($result['sections'] , $secArrays);


$index++;
}//sections foreach

 return $result;

}

/*
*check for unset location offices
*/
 function get_next($id=NULL){
  if(!empty($id))
$result_array = $this->db->query("SELECT * FROM ". self::DB_TABLE .
                                 " WHERE `lat`<0 AND `lng`<0 AND id > {$id} LIMIT 1");
else
$result_array = $this->db->query("SELECT * FROM ". self::DB_TABLE .
                                 " WHERE `lat`<0 AND `lng`<0 AND id  LIMIT 1");


return ( !empty($result_array)) ? $result_array->row() : false ;  
}

};


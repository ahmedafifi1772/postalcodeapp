<?php

class Geoname extends MY_Model{
	const DB_TABLE='geoname';
	const DB_TABLE_PK='geonameid';

	public $geonameid, $name, $asciiname, $alternatenames, 
$latitude, $longitude, $fclass, $fcode, $country, $cc2, $admin1,
$admin2, $admin3, $admin4, $population, $elevation, $gtopo30, 
$timezone, $moddate;

function geocode($lat, $lng, $id){
$dist=2;
$lon1=$lng-$dist/abs(cos(deg2rad($lat))*69);
$lon2=$lng+$dist/abs(cos(deg2rad($lat))*69);
$lat1=$lat-($dist/69);
$lat2=$lat+($dist/69);
$sql_="SELECT destination.*,
		3956 * 2 * ASIN(SQRT( POWER(SIN(({$lat} -
		destination.latitude) * pi()/180 / 2), 2) +
		COS({$lat} * pi()/180) * COS(destination.latitude * pi()/180) *
		POWER(SIN(({$lng} -destination.longitude) * pi()/180 / 2), 2) )) as
		distance FROM geoname destination
		WHERE 
		    destination.longitude between {$lon1} and {$lon2}
		and destination.latitude between {$lat1} and {$lat2}
		having distance < {$dist} ORDER BY Distance limit 5 ;";


$sql="

CREATE PROCEDURE  geodist_2 (IN dist int, IN mylon double, IN mylat double, IN limit_no int)
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
SELECT destination.*,
3956 * 2 * ASIN(SQRT( POWER(SIN((mylat -
destination.latitude) * pi()/180 / 2), 2) +
COS(mylat * pi()/180) * COS(destination.latitude * pi()/180) *
POWER(SIN((mylon -destination.longitude) * pi()/180 / 2), 2) )) as
distance FROM geoname destination
WHERE 
    destination.longitude between lon1 and lon2
and destination.latitude between lat1 and lat2
having distance < dist ORDER BY Distance limit limit_no ;
END 


"; 

$drop ="DROP PROCEDURE IF EXISTS geodist_2";

$KM =1;
$sql2="CALL geodist_2({$KM} , {$lng},{$lat}, 10);";

  //@Code::find_by_sql( $drop );
  //@Code::find_by_sql( $sql );
// @$this->db->query( $drop );
// @$this->db->query( $sql );

// while (!$codes) {
// 	$KM++;
// $codes  = $this->db->query( $sql2 );
// }

$response['results'] = array();	
$codes  = $this->db->query( $sql_ );
$this->load->model('Nearby');
$this->load->model('Places');
foreach ($codes->result() as $row) {


/*
*check if not exist in near by => add to nearby and places
*/
if( !$this->Nearby->checkNearby($id, $row->geonameid) ){
	//add to nearby places
	$near = new Nearby();
	$near->office_id = $id;
	$near->geoname_id = $row->geonameid;
	$near->save();
	
	//move from geoname to places
	if(!$this->Places->checkPlace($row->geonameid)){
		//echo 'ee<br>';
	if(count($row->alternatenames) >0 ){
			$alts = explode(',', $row->alternatenames);
			$add= $alts[count($alts)-1] .",".$alts[count($alts)-2];
			$r= $alts[count($alts)-1] ."-".$alts[count($alts)-2];
			$r = str_replace(' ', '-', $r);
    }else{
    	$r= str_replace('','-',$row->name);
    	$add = $row->name;
    }

	$place = new Places();
	$place->geonameid = $row->geonameid;
	$place->address = $add;
	$place->route = $r;
	$place->save();

    }


}
	
	array_push($response['results'] , $row);
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


/**
*reurn formated address
*/
function getFormat($alt_name=''){


	if(count($alt_name) >0)
		$alts = explode(',', $alt_name);
	else if(count($this->alternatenames) > 0 )
		$alts = explode(',', $this->alternatenames);
	else 
		return $this->name;
$index= 1;
while( empty( $alts[ count($alts) - $index ] ) )
$index++;

	$r= $alts[count($alts)- $index ] ." - ".$alts[count($alts)- $index + 1];
	return $r;
}




function edit(){
	echo "Hi";
}

}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" >
	<title></title>
	<script type="text/javascript" src="<?php echo base_url(); ?>jquery-1.8.3.min.js"></script>
<script type="text/javascript">

	$(document).ready(function(){
			 // alert();

		$('#check_location').click(function(){
			$id = $(this).attr('app_id');
			if(navigator.geolocation){
				navigator.geolocation.getCurrentPosition(function(e){
				
					var lat = e.coords.latitude;
					var lng = e.coords.longitude;

					$url=window.location.origin +'/EgyPost/receiver/rate/';
					
					$.ajax({url: $url, type:"POST",
						data:{
							'lat': lat,
							'lng': lng,
							'id': $id
						},
						success:function(e){
							// $('.monitor').html(e);
					
							$re = JSON.parse(e);
							$results = $re.results;
							$count= $results.length;
							$table ="<table>";
							for($i=0; $i< $count ; $i++){
								$table +="<tr><td>"+
								 $results[$i].geonameid+" , "+
								 $results[$i].alternatenames+" , "
								+ $results[$i].asciiname + "</td></tr>";

							}
							$table +="</table>";
							$('#result').html($table);
						},beforeSend:function(){
							$('#result').html('loading');
						}
					 });
					// $('#result').html(msg);
				});
			}else{
				$('#result').html("Please Accept browser permission to know your current location");
			}
		});
	});
</script>
</head>

<body>


<button id='check_location' 
app_id='<?php echo $office->id; ?>'
>Check</button>
<p class="monitor"></p>
<div id='result'></div>


<?php
$this->table->set_heading('ID', 'Alternatenames');
if(Count($locations) >0)
echo $this->table->generate($locations);
?>


</body>
</html>
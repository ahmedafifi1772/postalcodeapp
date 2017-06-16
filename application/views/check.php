<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" >
	<title></title>
	<script type="text/javascript" src="jquery-1.8.3.min.js"></script>
<script type="text/javascript">

	$(document).ready(function(){
			 // alert();

		$('#check_location').click(function(){
			if(navigator.geolocation){
				navigator.geolocation.getCurrentPosition(function(e){
				
					var lat = e.coords.latitude;
					var lng = e.coords.longitude;
					$url=window.location +'receiver/geocode/';
					
					$.ajax({url: $url, type:"POST",
						data:{
							'lat': lat,
							'lng': lng
						},
						success:function(e){
					
							$re = JSON.parse(e);
							$results = $re.results;
							$count= $results.length;
							$table ="<table>";
							for($i=0; $i< $count ; $i++){
								$table += "<tr><td><a target='_blank' href='"+window.location+"Egypt/"
								       +$results[$i].route+"'>"+ $results[$i].address + "</td></tr>";

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


<button id='check_location'>Check</button>
<p class="monitor"></p>
<div id='result'></div>
</body>
</html>
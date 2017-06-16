<html>
	<head>
		<script type="text/javascript" src="jquery-1.8.3.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#search').keyup(function(){
			$query = $(this).val();
			$count =$query.length;

$('#search_result').text($count);
if($count >= 5){
	$url = window.location + "receiver/search/";
			 $.ajax({url:$url,  type:"POST",
			 	data:{
			 		'query': $query
			 	},

			 	success:function(e){
			 						$('#search_result').html(e);
				$response = JSON.parse(e);
				$results= $response.results;
				$type= $response.type;
				$count = $results.length;
				$content="<ul>";

			if($type ==0){
				for($i=0; $i < $count; $i++){
					$content += "<a target='_blank' href='"+window.location+"Egypt/"
								+$results[$i].route+"'><li> "+ $results[$i].office +" / "+ $results[$i].address +" </li></a>";
				}
			}else{
				for($i=0; $i < $count; $i++){
					$content += "<a href='"+$results[$i].route+"'> <li> "+ $results[$i].address  +" </li></a>";
				}
			}

				$content +="</ul>";
				$('#search_result').html($content);
			 	},

				beforeSend:function(){
				$('#search_result').text('loading.. ');
	
				}

			});
}
		});
	});
</script>	
<style type="text/css">
	*{margin:0; padding:0;}
	.center_h{margin: 0 auto; position: relative;}
	.search_box{
		width:800px;  text-align: right; direction: rtl;
		 
	}
	#search{ width:100%; height:40px; line-height: 40px;}
	#search_result{width: 100%;  display:; min-height: ; box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.4)}
	#search_result ul {list-style: none;}

</style>	
	</head>


<body>
<br>
<br>
<br>
<div class="search_box center_h">
<input id='search' type="text" placeholder="أدخل اسم منطقتك .. " /> 
<div id='search_result'></div>
</div>

</body>



</html>
	$(document).ready(function(){
		$('#search_box').keyup(function(){
			$query = $(this).val();
			$count =$query.length;

// $('#search_result').text($count);
if($count >= 5){
	$url = window.location + "receiver/search/";
			 $.ajax({url:$url,  type:"POST",
			 	data:{
			 		'query': $query
			 	},

			 	success:function(e){
			 	 $('#search_result').text('لا توجد نتائج');
				$response = JSON.parse(e);
				$results= $response.results;
				$type= $response.type;
				$count = $results.length;
				$content="<ul>";

				if( $count<1)
					$content +="<li>  </li>";

			if($type ==0){
				for($i=0; $i < $count; $i++){
					$content += "<a target='_blank' href='"+$results[$i].route+"'><li class='office-flag'> "+ $results[$i].office +" <span> "+
								 $results[$i].address +" </span></li></a>";
				}
			}else{
				for($i=0; $i < $count; $i++){
					$content += "<a href='"+$results[$i].route+"' > <li class='place-flag'> "+
					 $results[$i].address  +" </li></a>";
				}
			}

				$content +="</ul>";
				$('#search_result').html($content);
				getFocus( $('#search_box') );
			 	},

				beforeSend:function(){
				$('#search_result').text('بحث.. ');
	
				}

			});
}
		});
	});

$(document).ready(function(){$("#search_box").keyup(function(){$query=$(this).val(),$count=$query.length,$count>=5&&($url=window.location+"receiver/search/",$.ajax({url:$url,type:"POST",data:{query:$query},success:function(e){if($("#search_result").text("لا توجد نتائج"),$response=JSON.parse(e),$results=$response.results,$type=$response.type,$count=$results.length,$content="<ul>",$count<1&&($content+="<li>  </li>"),0==$type)for($i=0;$i<$count;$i++)$content+="<a target='_blank' href='"+$results[$i].route+"'><li class='office-flag'> "+$results[$i].office+" <span> "+$results[$i].address+" </span></li></a>";else for($i=0;$i<$count;$i++)$content+="<a href='"+$results[$i].route+"' > <li class='place-flag'> "+$results[$i].address+" </li></a>";$content+="</ul>",$("#search_result").html($content),getFocus($("#search_box"))},beforeSend:function(){$("#search_result").text("بحث.. ")}}))})});
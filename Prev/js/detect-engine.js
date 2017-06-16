// Global varibales
var trigger;
var lat,lng;
var office_id;

var notFound = 'عذراً لم نستطيع تحديد رقمك البريدى';
var reportThankMsg =' شكراً لمساعدتك <br> سنعمل على حل هذة المشكلة';
$(document).ready(function(){



// $u = "http://www.egyptcodebase.com/ar/my-postal-code/geocode/";
// $u = "http://yourpostalcode.com/receiver/geoccode/";
// $.ajax({url:$u,type:"POST",
// 	data:{lat:lat,lng:lng},success:function(a){
// 		$("body").html(a);
// 		// var o=$("#office_lat").val(),
// 		// i=$("#office_lng").val(),
// 		// t=$("#office_name").val();
// 		// void 0!=o&&(putMarker(o,i,t,imgOffice),map.zoomToLongLat(22,i,o)),$("#loading").removeClass("loading")
// 	}
// 	});

		$c1 = $('.c1'); //outside
		$c2 = $('.c2');
		$c3 = $('.c3'); //inside



		$('#start-detect').click(function(){
			loading(); //start loading 

			if(navigator.geolocation){
				navigator.geolocation.getCurrentPosition(function(e){
				
					 lat = e.coords.latitude;
					 lng = e.coords.longitude;
					 
            //out of range
			 if(lat<22 || lat>32 || lng < 25 || lng > 35){
			 	$('.resultcode').text( notFound );
			 	clearLoading();
			 	return 0;
			 }

					$url=window.location +'receiver/geocode/';
					$.ajax({url: $url, type:"POST",
						data:{
							'lat': lat,
							'lng': lng
						},
						success:function(e){
							  // $('body').html(e);
							$re = JSON.parse(e);
							$results = $re.results;
							$count= $results.length;

							if ($count >0) {
							office_id = $results[0].id; 

							$hint =	"<div class='hint'> رقمك البريدى</div>";
							$spanedCode =$hint + spanCode($results[0].postal_code);
							// alert($spanedCode)
							$('#result-code').html( $spanedCode );
							$target=$results[0].route;

							 $('#result-office').html("<a href='"+$target+"'> "+$results[0].office+" </a>");
							$('#result-more').html("<a href='"+$target+"'> لمعرفة المزيد   </a>");
							setTimeout(function () {
							$('#result-code .hint').slideDown();
							$('#result-office').slideDown();
							$('#result-more').slideDown();
							$('.report-auto').slideDown();
							},1000);
						}else{
							$('#result-code').text( notFound );
						}

						clearLoading();

						},beforeSend:function(){
							$('#result').html('loading');
						}
					 });

					// $('#result').html(msg);
				},function(error){
					if(error.code == error.PERMISSION_DENIED){
						displayAlert(' لا تستطيع استخدام هذة الخدمة بدون السماح لنا بتحديد موقعك  ');
					}else{
						displayAlert(' عذراً لم نستطيع تحديد موقعك   ');						
					}
				});
			}else{
				$('#result').html("Please Accept browser permission to know your current location");
			}
		return false;
		});





});

function spanCode(code){
	$scode = code.toString();
	$nos = $scode.split("");
	$spaned="";
	for($n=0; $n < $nos.length; $n++){
		$s = "<span>" + $nos[$n] + "</span>";
		$spaned += $s;
	}
	// $spaned +="</div>";
return $spaned;
}


function loading(){
		trigger=setInterval(function(){
		$('.cls-1').each(function(){
		$(this).slideUp();
		});
		setTimeout(function(){
				setTimeout(function(){
				   $c3.slideToggle();	
			    },300 );
				setTimeout(function(){
				   $c2.slideToggle();
			    },600 );
				
				setTimeout(function(){
				   $c1.slideToggle();
			    },900 );
		},500 );

		},2000);	
}

function clearLoading(){
	clearInterval(trigger);
	 success();
}

function success(){
	$('.cls-1').each(function(){
	$(this).css({'stroke':'#3498db'});
    });
$('#detect-pin').attr('src','img/icons/pin-on.png');

}


// /Report Auto/
$(document).ready(function(){
$('.report-auto').hover(function(){
		$('.report-auto span').fadeIn();
	}).mouseleave(function(){
		$('.report-auto span').hide(1);
});

$("[id='report-answer']").click(function(){
	$('.report-box .submit').prop('disabled', false);
});	
	
});

function reportAuto(){
	// var selected = $("input[type='radio'][name='s_2_1_6_0']:checked");
	$type = $("input[type='radio'][name='auto-report']:checked").val();
	$problem =$('#problem_desc').val(); 
	
	$url=window.location +'receiver/report/';

	$.ajax({url: $url, 
	        type :"POST",
	        data:{
	        	'office_id': office_id,
	        	'lat'      : lat,
	        	'lng'      : lng,
	        	'type'     : $type,
	        	'problem'  : $problem
	        },
	        
	        success:function(e){
	        	$close = $('<div />').append( $('.buttonwhite.close').clone() ).html() ;
	        	$msg =  "<p class='3'>"+reportThankMsg +'</p>' + $close ;

	        	$('.report-box').html( $msg  );

	        },
	        beforeSend:function(){
	           $('.report-box .submit').prop('disabled', true);	        	
	        }



	    });


}
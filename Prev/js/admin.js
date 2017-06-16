$(document).ready(function(){


$('#next').click(function(){
 $id= $('#id').text();


	 $targetUrl=window.location.pathname+"/checkmap?request=get_unknown&id="+$id;


             $.ajax({url: $targetUrl, 
                     success:function(e){
// $('body').html(e);
                     	$response = $.parseJSON(e);
                               $('#addressBox').html($response.address);
                               $('#address').val($response.address + " , " + $response.city);
                               $('#office').html($response.office);
                                                              $('#section').html($response.city);
                                                              $('#code').html($response.code);
                               $('#id').html($response.id);
                              codeAddress();
                     	$('#demo').html('Done!');

                                  },
                     beforeSend:function(){
                              $('#demo').html('<i>loading..</i>');
                                  }
             }); // end ajax
		
});


$('#save').click(function(){
	 $lt = $('#latbox').text();
	 $lg = $('#lngbox').text();
	 $id= $('#id').text();

	if( confirm("are you sure to save this coords for current address")){
	 $targetUrl=  window.location.host+"/EgyPost/afifi/checkmap?request=save&id="+$id+"&lat="+$lt+"&lng="+$lg;

             $.ajax({url: $targetUrl, 
                     success:function(e){

                     	$response = $.parseJSON(e);
                     	// alert($id);
                     	if($response.state ==1){
                     	    	$('#demo').html('Sved');
                               $('#addressBox').html($response.address);
                               $('#address').val($response.address + " , " + $response.city );
                               $('#office').html($response.office);
                               $('#section').html($response.city);
                               $('#code').html($response.code);
                               $('#id').html($response.id);
                              codeAddress();
                            $('#demo').html('');
                        }else{
                         	$('#demo').html('Error Try later');
                        }

                                  },
                     beforeSend:function(){
                              $('#demo').html('<i>loading..</i>');
                                  }
             }); // end ajax		
	
	}
});




});
var Message="", name="", msg="", phone="", email="";


var n=" الأسم " ,
    m=" الرسالة التفصيلية ",
    p=" رقم التليفون ",
    e=" الايميل ",
    check =" برجاء التاكد من ";

//name validation
function name_valid() {

   var x=document.getElementById('fname').value;
		
 if (x==null || x=="")
   {
    if(Message == ""){Message = n} 
	else { Message +="," +" "+ n; }
	document.getElementById('fname').style.border='1px solid #e85656';
   }
 else if(x.match(/[\<\>!@?#\$%^&\*,]+/i)) {
    if(Message == ""){Message = n} 
	else { Message +="," +" "+ n; }
	document.getElementById('fname').style.border='1px solid #e85656';
   }
   else{
   name=x;
   document.getElementById('fname').style.border='';
   }

 }

//email valid
  function email_valid() {
     var x=document.getElementById('email').value;
     var atpos=x.lastIndexOf("@");
     var dotpos=x.lastIndexOf(".");
   
      if (x==null || x=="")
      {
	      if(Message == ""){Message = e} 
	     else { Message += "," +" "+ e; }
	     document.getElementById('email').style.border='1px solid #e85656';	
     }
	 else if(atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
	      if(Message == ""){Message = e} 
	      else { Message +="," +" "+ e; }
	     document.getElementById('email').style.border='1px solid #e85656';	
   }
   else{
   email=x;
   	document.getElementById('email').style.border='';
   }
   return false;
 } 

  //check Messgae
 function message_valid() {

   var x=document.getElementById('message').value;
		
 if (x==null || x=="")
   {
    if(Message == ""){Message = m} 
	else { Message +="," +" "+ m; }
	document.getElementById('message').style.border='1px solid #e85656';
   }
   else{
   msg=x;
   document.getElementById('message').style.border='';
   }

 }

 
//phone valid 
 function phone_valid(){
	x=document.getElementById("phone").value;
	// var space=[ ]; x.match(space) ||
	if(x== null || x==""){
    if(Message == ""){Message = p} 
	else { Message +="," +" "+ p; }
	document.getElementById('phone').style.border='1px solid #e85656';	
	}
	else if(  x.length < 11 || isNaN(x)  ) //||  || isNaN(x) || x[0] != "0" || x[1] != "1" )
	{
    if(Message == ""){Message = p} 
	else { Message +="," +" "+ p; }
	document.getElementById('phone').style.border='1px solid #e85656';
   }
	else{
		phone = x;
	document.getElementById('phone').style.border='';
	}
}

// $url=window.location.host+'/EgyPost/receiver/contact/';
// alert($url);


$(document).ready(function(){


$('#submit').click(function(){
  
  Message="";
	
  name_valid();
	email_valid();
	phone_valid();
	message_valid();

	if(Message==""){

		

  //document.getElementById('result').innerHTML="Sent successfully thank you<span> "+ name+ "</span>"; 

$url='http://'+window.location.host+'/EgyPost/receiver/contact/';

 // var targetUrl="mailform.php?name="+name+"&phone="+phone+"&msg="+msg+"&email="+email;
  $.ajax({url: $url ,
            type:"POST",
            data:{
              'name':name,
              'phone': phone,
              'msg': msg,
              'email': email
            },

            success:function(e){
         $('#result').removeClass().addClass('success').html(e); },
         beforeSend:function(){
         $('#result').text("loading");
         }
 });


  }else
  {
    $('#result').removeClass().addClass('error').text(check +Message);
  }

});

});

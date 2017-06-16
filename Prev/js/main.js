/*
 | Alert customization
*/
function displayAlert(msg){
var div ="<div class='alert shaded'><p>"+ msg + " </p>";
    div +="<button onclick='return dismissAlert(this)''> تمام </button></div>";
$('body').prepend(div);
$('.alert').slideDown();
}

function dismissAlert(element){
$('.alert').slideUp();
}

function openWrapper(){
	$('.wrapper').css({'visibility': 'visible'});
}

function closeWrapper(){
	$('.wrapper').css({'visibility': 'hidden'});
}

function getFocus(selector){
			$('html, body').animate({'scrollTop': selector.offset().top });
			return false;
}


$('.wrapper .close').trigger('click');

   $('.wrapper .close').live('click' ,
    	function(){
   	                 closeWrapper();
   });

 $('.link.top').click(function(){
 	// getFocus( $('body') );
 	return false;
 });  
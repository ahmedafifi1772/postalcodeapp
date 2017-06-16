$(document).ready(function(){


//load the fram and the print page has its own print window
$('.print').click( function(){
    $url= $(this).attr('data-print');
    $("<iframe>")
    .hide()
    .attr('src', $url)
    .appendTo('body');

});	



$('.send').click( function(){
openWrapper();
});	


$('.vote.right').click(function(){
    $id=$(this).attr('data-app');

     recordNearby($id);
});

$('.vote.wrong').click(function(){
     $notes=  $('.vote-box .notes');
    $buttons = $('.vote-box .block');
    $div  ="<p class='p3 center_h'>";
    $div += "يمكنك معرفة اقرب مكتب بريد لموقعك الحالى يمكنك استخدام خدمة";
    $div +="</p>";
    $div +="<a href='../' > رقمى أية ؟</a>";

    $buttons.hide();
    $notes.html( $div );
       
});




});





/*
* Copyright 2010 by GlamThumbs Team.
*
* How To Use The Script:
* add to your page this code between inside head tags
* <script type="text/javascript" src="ATBookmarkApp.js"></script> 
* add anchor with void href like this: 
* <a href="javascript:void(0)" onClick="return BookmarkApp.addBookmark(this)">bookmark us</a> 
* 
*/
BookmarkApp = function () {
    var isIEmac = false; /*@cc_on @if(@_jscript&&!(@_win32||@_win16)&& 
(@_jscript_version<5.5)) isIEmac=true; @end @*/
    var isMSIE = (-[1,]) ? false : true;
    var cjTitle = document.title;
    var cjHref = location.href;

    function hotKeys() {
        var ua = navigator.userAgent.toLowerCase();
        var str = '';
        var isWebkit = (ua.indexOf('webkit') != - 1);
        var isMac = (ua.indexOf('mac') != - 1);

        if (ua.indexOf('konqueror') != - 1) {
            str = 'CTRL + B'; // Konqueror
        } else if (window.home || isWebkit || isIEmac || isMac) {
            str = (isMac ? 'Command/Cmd' : 'CTRL') + ' + D'; // Netscape, Safari, iCab, IE5/Mac
        }
        var finalCahr='';
        finalCahr = (str) ? str : (isMac ? 'Command/Cmd' : 'CTRL' + '+ D');

        return 'من فضلك , اضغظ <b>(' + finalCahr + ')</b> لحفظ الصفحة' ;
    }

    function isIE8() {
        var rv = -1;
        if (navigator.appName == 'Microsoft Internet Explorer') {
            var ua = navigator.userAgent;
            var re = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
            if (re.exec(ua) != null) {
                rv = parseFloat(RegExp.$1);
            }
        }
        if (rv > - 1) {
            if (rv >= 8.0) {
                return true;
            }
        }
        return false;
    }

    function addBookmark(a) {
        try {
            if (typeof a == "object" && a.tagName.toLowerCase() == "a") {
                a.style.cursor = 'pointer';
                if ((typeof window.sidebar == "object") && (typeof window.sidebar.addPanel == "function")) {
                    window.sidebar.addPanel(cjTitle, cjHref, ""); // Gecko
                    return false;   
                } else if (isMSIE && typeof window.external == "object") {
                    if (isIE8()) {
                        window.external.AddToFavoritesBar(cjHref, cjTitle); // IE 8                    
                    } else {
                        window.external.AddFavorite(cjHref, cjTitle); // IE <=7
                    }
                    return false;
                } else if (window.opera) {
                    a.href = cjHref;
                    a.title = cjTitle;
                    a.rel = 'sidebar'; // Opera 7+
                    return true;
                } else {
                    displayAlert(hotKeys());
                }
            } else {
                throw "Error occured.\r\nNote, only A tagname is allowed!";
            }
        } catch (err) {
            alert(err);
        }

    }

    return {
        addBookmark : addBookmark
    }
}();



// From validation for send
//
//
Message="";
//email valid
  function email_valid(id) {
     var x=document.getElementById(id).value;
     var atpos=x.lastIndexOf("@");
     var dotpos=x.lastIndexOf(".");
     var data = $('#'+id).attr('data');
   
      if (x==null || x=="")
      {
	      if(Message == ""){Message = data } 
	     else { Message += "," +" "+ data; }
	     document.getElementById(id).style.border='3px solid #e85656';	
     }
	 else if(atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
	      if(Message == ""){Message = data} 
	      else { Message +="," +" "+ data; }
	     document.getElementById(id).style.border='3px solid #e85656';	
   }
   else{
   	document.getElementById(id).style.border='1px solid #dddddd';
   }

      	// return x;

 } 


function mailBox(){
    Message=""
 var from = email_valid('sendfrom');
 var to= email_valid('sendto');

 if(Message==""){
    $msg =$('.formcontrol.sendbody').val();
        // $('.wrapper').slideUp();
        $url=window.location.origin +'/post/receiver/sendPage/';

        $.ajax({url: $url, 
            type:"POST",
            data:{
                'from'  : from,
                'to'    : to,
                'msg'   : $msg,
                'link'  : window.location.href,
                'title' : document.title
            },
            success:function(e){
                $('.wrapper #sendresult').text(e);
            },
            beforeSend:function(){
                 $('.wrapper #sendresult').text('ارسال ...');
            }

        });

 }else{
            $('#sendresult').removeClass().addClass('error').text("رجاء التاكد من  : (" +Message+') ايميل');
 }
}





/*
| record enarby places in case positive review
*/

function recordNearby($id){
    $notes=  $('.vote-box .notes');
    $buttons = $('.vote-box .block');
    $loading = $('.vote-box .notes img')
// hide buttons and show loading ..                                
                $buttons.hide();
               $notes.html("<img src='../img/loading.gif'>");

            if(navigator.geolocation){
                navigator.geolocation.getCurrentPosition(function(e){
                
                    var lat = e.coords.latitude;
                    var lng = e.coords.longitude;

                    $url=window.location.origin +'/receiver/rate/';
                    
                    $.ajax({url: $url, type:"POST",
                        data:{
                            'lat': lat,
                            'lng': lng,
                            'id': $id
                        },
                        success:function(e){
                            // hide right & wrong arrows
                                  $loading.hide();
                            // type thanks
                                  $notes.text("شكراً ..");
                        },beforeSend:function(){
                                $buttons.hide();
                                $notes.html("<img src='../img/loading.GIF'>");
                        }
                     });
                },function(error){
                    if(error.code == error.PERMISSION_DENIED ){
                        $notes.text("لا نستطيع تحديد موقعك الحالى برجاء السماح لموقعنا بتحديد موقعك");
                        $loading.hide();
                         $buttons.show();

                    }else{
                        $notes.text("لا نستطيع تحديد موقعك الحالى ");
                        $loading.hide();
                         // $buttons.show();

                    }
                });
            }else{
                        $notes.text("حاول مرة اخرى");
                        $loading.hide();
                         $buttons.show();
            }
}
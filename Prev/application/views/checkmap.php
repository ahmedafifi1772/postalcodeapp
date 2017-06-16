<!DOCTYPE html>
<html direction='rtl'>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Check Map</title>
    <style>
      html, body, #map-canvas {
        direction: rtl;
        height: 100%;
        margin: 0;
        padding: 0;
      }

      #panel {
        position: absolute;
        top: 5px;
        left: 50%;
        margin-left: -180px;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
      }

      /*
      Provide the following styles for both ID and class,
      where ID represents an actual existing "panel" with
      JS bound to its name, and the class is just non-map
      content that may already have a different ID with
      JS bound to its name.
      */

      #panel, .panel {
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }

      #panel select, #panel input, .panel select, .panel input {
        font-size: 15px;
      }

      #panel select, .panel select {
        width: 100%;
      }

      #panel i, .panel i {
        font-size: 12px;
      }
      #databox{width: 95%; border: 1px solid #000; padding: 3px 0px; overflow: hidden; float: right; text-align: right;}
      #databox span:nth-child(1){float:right; font-weight: bold; border-left: 1px solid #000; width: 50px; }
      #databox span:nth-child(2){ float: left;}
#save{float: left;} #next{float: right;}
#info, #latbox, #lngbox, #demo{text-align: left; direction:ltr;  display: block;}

    </style>
   

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<?= "<script type='text/javascript' src='". base_url(). "js/admin.js'></script>" ?>;

   <script src="https://maps.googleapis.com/maps/api/js?&language=arb"></script>

<script type="text/javascript">



  var map;
  var geocoder;
  var marker ;

  var lt, lg;



  function initialize() {
var myLatlng ;


if( navigator.geolocation ){
  navigator.geolocation.getCurrentPosition(function(e){ 

  lt =e.coords.latitude;
  lg =e.coords.longitude;
    // myLatlng = new google.maps.LatLng( 30.138069 , 31.307290799999997 );
       myLatlng = new google.maps.LatLng(lt , lg);
      // document.getElementById('info').innerHTML +=" support geolocation ! <br>";

  });
 }else{
   myLatlng = new google.maps.LatLng(40.713956,-74.006653);
}

setTimeout(function(){

      document.getElementById('latbox').innerHTML += lt ;
      document.getElementById('lngbox').innerHTML += lg ;




  var myOptions = {
     zoom: 15,
     center: myLatlng,
     mapTypeId: google.maps.MapTypeId.ROADMAP
     }
  map = new google.maps.Map(document.getElementById("map-canvas"), myOptions); 
      geocoder = new google.maps.Geocoder();

  marker = new google.maps.Marker({
  draggable: true,
  position: myLatlng, 
  map: map,
  title: "Your location"
  });



//Click MAp Listener 
google.maps.event.addListener(map, 'click',function(e){
marker.setPosition( e.latLng );
     document.getElementById("latbox").innerHTML = e.latLng.lat();
     document.getElementById("lngbox").innerHTML = e.latLng.lng();
});
//Drag Listener 
  google.maps.event.addListener(marker,'dragend',function(point){
    lt=point.latLng.lat();
    lg=point.latLng.lng();
     document.getElementById("latbox").innerHTML = lt;
     document.getElementById("lngbox").innerHTML = lg;
     });

}, 2000);

}

function codeAddress() {
  var address = document.getElementById('address').value;
  geocoder.geocode( { 'address': address}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      map.setCenter(results[0].geometry.location);
      marker.setPosition( results[0].geometry.location );
    document.getElementById("latbox").innerHTML = results[0].geometry.location.lat();
     document.getElementById("lngbox").innerHTML = results[0].geometry.location.lng(); 
     document.getElementById("formatted").innerHTML = results[0].formatted_address; 
     document.getElementById("count_result").innerHTML = results.length; 
     var i, more="";
     document.getElementById("more").innerHTML ="";
     for(i=1; i<results.length; i++){  //getLocation("+ results[i] +")'
      more ="<button onclick='javascript: getLocation("+ results[i].geometry.location +","+results[i].geometry.location.lat()+","+results[i].geometry.location.lng()+",\""+results[i].formatted_address  +"\" )'>";
      more += results[i].formatted_address+"</button>"; 
     document.getElementById("more").innerHTML += more +"<br>";
     }
     
    
    } else {
      alert("جوجل لم يستطع تحديد العنوان , رجاء اعادة كتابة العنوان بشكل اكثر دقة");
    }
  });
}

function getLocation(loc, lat, lng,add){
         var latlng = new google.maps.LatLng(lat, lng);
      map.setCenter(latlng);
      marker.setPosition( latlng );
    document.getElementById("latbox").innerHTML = lat;
     document.getElementById("lngbox").innerHTML = lng; 
     document.getElementById("formatted").innerHTML = add; 
}

function getCurrent(){
  if(navigator.geolocation){
    navigator.geolocation.getCurrentPosition(function(e){
    document.getElementById('info').innerHTML=" support geolocation ! <br>";
    document.getElementById('info').innerHTML += e.coords.latitude + "<br>";
    document.getElementById('info').innerHTML +=  e.coords.longitude +"<br>";
return e.coords;
    });
  
  }else{
    document.getElementById('info').innerHTML="Your Browser Dosn't support geolocation !";
    return false;
  }
}


google.maps.event.addDomListener(window, 'load', initialize);



</script> 


  </head>
  <body>
    <div id="map-canvas" style="float:left;width:70%; height:100%"></div>
    <div id="directionsPanel" class="panel" style="float:right;width:27%;height 100%; color:#000;">
  <div> 
  <h3 style="text-align:left;">Current Coords</h3> 
     <span id="latbox"></span>
     <span id="lngbox"></span>
     <span id="formatted"></span>
     <span id="info"></span>
</div>
<h3 id="count_result"></h3>
<div id='more'></div>
<div id='databox'> <span> عنوان </span> <span id='addressBox'></span> </div>
<div id='databox'> <span> مكتب </span> <span id='office'></span> </div>
<div id='databox'> <span> قطاع </span> <span id='section'></span> </div>
<div id='databox'> <span> code </span> <span id='code'></span> </div>
<div id='databox'> <span> id </span> <span id='id'></span> </div>
<div id='databox'> <button id='save'>SAVE</button>  <button id='next'>NEXT</button> </div> 

<div id='demo'></div>


    <div id="panel">
      <input id="address" type="textbox"   onSubmit="codeAddress()" value="Your Location">
      <input type="button" value="Geocode" onclick="codeAddress()">
    </div>



    </div>
  </body>
</html>
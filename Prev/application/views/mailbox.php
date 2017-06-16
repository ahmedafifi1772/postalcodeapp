<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=187269834940208";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>



<div class="wrapper cover table">
	<div class="center_v center_h shadedout mailbox">
	<h2>ارسال</h2>
	<input type="text" class="formcontrol sendfrom" data='من' id='sendfrom' placeholder='من : قم بادخال ايميلك'>
	<input type="text" class="formcontrol sendto"   data='الى' id='sendto' placeholder='الى : قم بادخال ايميل المرسل الية'>

	<textarea placeholder='سنقوم بارسال رابط الصفحة الى الايميل المرفق , اذا كنت تريد ان ترفق رسالة مع الرابط قم بادخالها'
	class="formcontrol sendbody" ></textarea>
	<input type="submit" class="buttonwhite shadedout" onclick='javascript:return mailBox()' value="أرسال" />
		<input type="submit"value='إغلاق ' class="buttonwhite close" /> 
	
	<div id="sendresult"></div>

<ul id="chat">
<li>يمكنك استخدام </li>
<li> 
 <div class="fb-send" style="visibility:inhert;" data-href="https://developers.facebook.com/docs/plugins/"></div>
</li>
<li> 
<a href="whatsapp://send" data-text="Take a look at this awesome website:" data-href="" class="wa_btn wa_btn_s" style="display:none">Share</a></li>
<li>

</li>

</ul>	

</div>

</div>


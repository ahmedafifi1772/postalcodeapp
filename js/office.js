function email_valid(e){var t=document.getElementById(e).value,n=t.lastIndexOf("@"),o=t.lastIndexOf("."),r=$("#"+e).attr("data");return null==t||""==t?(""==Message?Message=r:Message+=", "+r,document.getElementById(e).style.border="3px solid #e85656"):1>n||n+2>o||o+2>=t.length?(""==Message?Message=r:Message+=", "+r,document.getElementById(e).style.border="3px solid #e85656"):document.getElementById(e).style.border="1px solid #dddddd",t}function mailBox(){Message="";var e=email_valid("sendfrom"),t=email_valid("sendto"),n="/"+$("html").attr("lang");""==Message?($msg=$(".formcontrol.sendbody").val(),$url=window.location.origin+n+"/receiver/sendPage/",$.ajax({url:$url,type:"POST",data:{from:e,to:t,msg:$msg,link:window.location.href,title:document.title},success:function(e){$(".wrapper #sendresult").text(e)},beforeSend:function(){$(".wrapper #sendresult").text(lang.sending)}})):$("#sendresult").removeClass().addClass("error").text(lang.send_m1+Message+lang.send_m2)}function recordNearby(e){$notes=$(".vote-box .notes"),$buttons=$(".vote-box .block"),$loading=$(".vote-box .notes img"),$buttons.hide(),navigator.geolocation?navigator.geolocation.getCurrentPosition(function(t){var n=t.coords.latitude,o=t.coords.longitude;$url=window.location.origin+"/receiver/rate/",$.ajax({url:$url,type:"POST",data:{lat:n,lng:o,id:e},success:function(){$loading.hide(),$notes.text(lang.thanks)},beforeSend:function(){$buttons.hide(),$notes.html("<img src='../../img/loading.GIF'>")}})},function(e){e.code==e.PERMISSION_DENIED?($notes.text(lang.premission_prb),$loading.hide(),$buttons.show()):($notes.text(lang.premission_prb),$loading.hide())}):($notes.text(lang.try_later),$loading.hide(),$buttons.show())}$(document).ready(function(){$(".print").click(function(){$url=$(this).attr("data-print"),$("<iframe>").hide().attr("src",$url).appendTo("body")}),$(".send").click(function(){openWrapper()}),$(".vote.right").click(function(){$id=$(this).attr("data-app"),recordNearby($id)}),$(".vote.wrong").click(function(){$notes=$(".vote-box .notes"),$buttons=$(".vote-box .block"),$div="<p class='p3 center_h'>",$div+=lang.voteWrong,$div+="</p>",$div+="<a href='../' >"+lang.title+"</a>",$buttons.hide(),$notes.html($div)})}),BookmarkApp=function(){function e(){var e=navigator.userAgent.toLowerCase(),t="",n=-1!=e.indexOf("webkit"),r=-1!=e.indexOf("mac");-1!=e.indexOf("konqueror")?t="CTRL + B":(window.home||n||o||r)&&(t=(r?"Command/Cmd":"CTRL")+" + D");var a="";return a=t?t:r?"Command/Cmd":"CTRL+ D",lang.print1+a+lang.print2}function t(){var e=-1;if("Microsoft Internet Explorer"==navigator.appName){var t=navigator.userAgent,n=new RegExp("MSIE ([0-9]{1,}[.0-9]{0,})");null!=n.exec(t)&&(e=parseFloat(RegExp.$1))}return e>-1&&e>=8?!0:!1}function n(n){try{if("object"!=typeof n||"a"!=n.tagName.toLowerCase())throw"Error occured.\r\nNote, only A tagname is allowed!";if(n.style.cursor="pointer","object"==typeof window.sidebar&&"function"==typeof window.sidebar.addPanel)return window.sidebar.addPanel(a,i,""),!1;if(r&&"object"==typeof window.external)return t()?window.external.AddToFavoritesBar(i,a):window.external.AddFavorite(i,a),!1;if(window.opera)return n.href=i,n.title=a,n.rel="sidebar",!0;displayAlert(e())}catch(o){alert(o)}}var o=!1,r=-[1]?!1:!0,a=document.title,i=location.href;return{addBookmark:n}}(),Message="";
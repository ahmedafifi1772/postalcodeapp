<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-63331192-4', 'auto');
  ga('send', 'pageview');

</script>

<div class="wrapper cover table">
	<div class="center_v center_h shadedout mailbox">
	<h2><?=t('send')?></h2>
	<input type="text" class="formcontrol sendfrom" data="<?=t('from')?>" id='sendfrom' placeholder="<?=t('fromHolder')?>">
	<input type="text" class="formcontrol sendto"   data="<?=t('to')?>" id='sendto' placeholder="<?=t('toHolder')?>">

	<textarea placeholder="<?=t('sendBody')?>"
	class="formcontrol sendbody" ></textarea>
	<input type="submit" class="buttonwhite shadedout" onclick='javascript:return mailBox()' value="<?=t('sendButton')?>" />
		<input type="submit" value="<?=t('closeButton')?>" class="buttonwhite close" /> 
	
	<div id="sendresult"></div>
	</div>

</div>
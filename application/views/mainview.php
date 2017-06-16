
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','http://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-63331192-4', 'auto');
  ga('send', 'pageview');

</script>

<div class='header  table gradBG'>

<?php $this->load->view('menu'); ?>

	<div class="hbody">
		<h1> <?= t('title'); ?> </h1>
		<p class="p1">
					<?= t('description'); ?>		
		</p>
		<a href="<?php echo base_url(); ?>" class="link box-solid" id='rakmy'> <?= t('buttonTitle'); ?></a>

	</div>

</div>

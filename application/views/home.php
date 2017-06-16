<!DOCTYPE html>

<html lang="<?= $this->config->item('language_abbr')?>">

<head>

	<title><?= t('title') .'|'. t('sub-title') ?></title>
    <?php $this->load->view('meta'); ?>	

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/styles.css">

	<?php echo "<script type='text/javascript' src='https://code.jquery.com/jquery-1.8.3.min.js'></script>"; ?>

<script type="text/javascript">

$(document).ready(function(){



	$('#rakmy').click(function(){

		getFocus($('.auto'));

		return false;

	});

   $('.gosearch').click(function(){

   	getFocus( $('.adv-search') );

		return false;

	});


});

</script>

<?php
$lang= $this->config->item('language_abbr');
  echo "<link rel='stylesheet' 
     href='".base_url()."css/".$lang.".css' />
       <script type='text/javascript' 
     src='".base_url()."js/".$lang.".js' ></script>
"; ?>

</head>

<body>


<?php $this->load->view('mainview'); ?>


<!--Rakmy eh -->

<div class="auto cover" >

			<h1> <span class='head-pin'></span> <?= t('title') ?> </h1>

<!-- Report button -->

<div class="report-auto" onclick="return openWrapper()">

	<div><span> <?= t('report-hover'); ?></span></div>

</div>			


<!-- Report -->

<div class="wrapper cover table">

	<div class="center_v center_h shadedout">


<div class="report-box shadedout">

	<b> <?= t('report-title'); ?> </b>

	<div> <input type="radio" class='report-answer'  name='auto-report' value="wrongPosition"><span class='radio'></span> <?= t('report-1'); ?></div>

	<div> <input type="radio" class='report-answer'  name='auto-report' value="wrongData"> <span class='radio'></span><?= t('report-2'); ?> </div>

	<div> <input type="radio" class='report-answer'  name='auto-report' value="another"> <span class='radio'></span><?= t('report-3'); ?> </div>

	<div> <textarea id='problem_desc' placeholder='<?= t('report-4'); ?>' class=""></textarea></div>

	<div> <input type="submit" value='<?= t('sendButton'); ?>' class="submit buttonblue" disabled='disabled' onclick="return reportAuto()" /> 

	<input type="submit" value='<?= t('closeButton'); ?> ' class="buttonwhite close" /> </div>

</div>

</div>

</div>

<!-- End Report -->

<p class="p1">

<?= t('detect-sub'); ?>

</p>

<p class="limit_w p3">

<b><?= t('note'); ?></b>

				<br>

<?= t('d1'); ?>
 <br>
<?= t('d2'); ?>

<br>

<?= t('d3'); ?>

  <a href="" class='gosearch'> <?= t('adv-search'); ?> </a> .

</p>

			<a href="" id='start-detect' class="link box-border"> <?= t('startButton'); ?></a>

<div class="resultcode center_h">

				<div id='result-code' class="fade-text center_h">

				</div>

				<div id='result-office'>

				</div>

				<div id="result-more">				

				</div>

</div>


			<div id="map" >
				<div  id='pin-box' >
				

					<img id='detect-pin' src="<?php echo base_url(); ?>img/icons/pin-off.png" alt="<?= t('title'); ?>">

   <!-- Cycles SVG -->

   <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="100%" height="72.07" viewBox="0 0 201.72 72.07">  

  <g>

    <path d="M100.121,1.508 C154.014,1.508 198.801,16.540 200.182,35.416 C201.590,54.672 157.463,70.568 101.594,70.568 C45.726,70.568 0.920,54.672 1.507,35.416 C2.082,16.540 46.229,1.508 100.121,1.508 Z" class="cls-1 c1"/>

    <path d="M100.235,6.849 C145.638,6.849 183.266,19.533 184.296,35.416 C185.344,51.566 148.270,64.860 101.472,64.860 C54.675,64.860 17.034,51.566 17.392,35.416 C17.745,19.533 54.832,6.849 100.235,6.849 Z" class="cls-1 c2"/>

    <path d="M99.958,11.802 C137.277,11.802 168.124,22.243 168.864,35.281 C169.615,48.500 139.219,59.350 100.962,59.350 C62.705,59.350 31.850,48.500 32.043,35.281 C32.232,22.243 62.638,11.802 99.958,11.802 Z" class="cls-1 c3"/>

  </g>

</svg>

		 </div>



	</div>

</div>

<!-- Search  -->
<div class="adv-search cover shaded">

	<h2> <span class='head-search'></span> <?= t('adv-search')?> </h2>

<p class="p2 center_h">
<?= t('search-sub'); ?>
</p>

<div class='mid-box center_h'>

	<input type='text' id='search_box' class="center_h" 
	  placeholder="<?= t('search-placeholder') ?>" />

	<div id='search_result'></div>

</div>



<ul class="list-4">


<?php

$titles = $mostvisited['title'];

$index=0;

 foreach ($mostvisited['sections'] as $section): ?>



	<li>

		<h3>  <?php echo $titles[$index]; ?></h3>

		<ul class="list-normal">

				<?php foreach ($section as $visit) {

					echo "<li><a class='link' href='".$visit->route."'>" . $visit->office . "</a></li>";

				} ?>



		</ul>

	</li>



<?php

$index++;

 endforeach; ?>



</ul>



</div>





<!-- About -->

<div class="about cover">

	<h1> <?= t('egy_postal')?> </h1>

	<p class="p3 center_h">

 <?= t('egy_postal_desc')?>
	</p>

<ul class="list-3">

	<li>

		<img src="<?php echo base_url(); ?>img/icons/services.png" alt="رقمى البريدى اية">

		<h3><?= t('egy_postal_service_h')?></h3>

		<p class="p3 center_h">	<?= t('egy_postal_service')?>	</p>

	</li>

	

	<li>

		<img src="<?php echo base_url(); ?>img/icons/Time.png" alt="رقمى البريدى اية">

				<h3> <?= t('egy_postal_whours_h')?></h3>

		<p class="p3 center_h">	<?= t('egy_postal_whours')?>	</p>

	</li>



	<li>

		<img src="<?php echo base_url(); ?>img/icons/web-services.png" alt="رقمى البريدى اية">

				<h3><?= t('egy_postal_ws_h')?> </h3>

		<p class="p3 center_h">	<?= t('egy_postal_ws')?>	</p>

	</li>

</ul>

</div>


	<?php echo"<script type='text/javascript' src='".base_url()."js/main.js'></script>"; ?>



	<?php echo"<script type='text/javascript' src='".base_url()."js/detect-engine.js'></script>"; ?>

	<?php echo"<script type='text/javascript' src='".base_url()."js/get-engine.js'></script>"; ?>


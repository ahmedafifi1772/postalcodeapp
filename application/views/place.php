<!DOCTYPE html>
<html lang="<?= $this->config->item('language_abbr')?>">
<head>
	<title>
	  <?=t('officesNearBy')?>
	  <?= $place->address; ?>	
	| <?=t('title')?>
	
	</title>

	<?php $data = array(); $data['title'] =t('placeDesc').$place->address; ?>

    <?php $this->load->view('meta', $data); ?>	
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/styles.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/place.css">

	<?php echo"<script type='text/javascript' src='".base_url()."js/jquery-1.8.3.min.js'></script>"; ?>
	<?php echo"<script type='text/javascript' src='".base_url()."js/detect-engine.js'></script>"; ?>
	<?php echo"<script type='text/javascript' src='".base_url()."js/get-engine.js'></script>"; ?>
<?php
$lang= $this->config->item('language_abbr');
  echo "<link rel='stylesheet' 
     href='".base_url()."css/".$lang.".css' />
       <script type='text/javascript' 
     src='".base_url()."js/".$lang.".js' ></script>
"; ?>
<script type="text/javascript">
$(document).ready(function(){

	$('#rakmy').click(function(){
		$('html, body').animate({'scrollTop': $('.auto').offset().top });
		return false;
	});

   $('.gosearch').click(function(){
		$('html, body').animate({'scrollTop': $('.adv-search').offset().top });
		return false;
	});

});
</script>
<style type="text/css">

</style>

</head>
<body>





<?php $this->load->view('mainview'); ?>

	

<div class="places">
	<h1> 
	<?=t('officesNearBy')?>
	<b>
		<?php echo $place->address; ?>
	</b>
	</h1>

<table>
	<?php foreach ($offices as $Office) { ?>
	<tr> 
		 	<td class='office-flag'>
			  <a class='link' style="width:100%;" href="<?php echo $Office->route; ?>" >
		 		 <?= t('post-office'). $Office->office; ?> 

					<div>
						<span style='width:50%;'><?= $Office->address?></span><br>
						<span style='width:50%;'><?= t('postalCode').'<b> '. $Office->postal_code.'</b>'?></span>			
					</div>
			  </a>
			</td>
	</tr>

	<?php }?>
</table>
</div>


</body>
</html>
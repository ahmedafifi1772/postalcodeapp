<!DOCTYPE html>
<html>
<head>
	<title>

	<?php $data = array(); $data['title'] ="مكاتب البريد بالقرب من ".$place->address; ?>
			مكاتب البريد بالقرب من
	
		<?php echo $data['title']; ?>

	
	</title>

    <?php $this->load->view('meta', $data); ?>	
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/styles.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/place.css">

	<?php echo"<script type='text/javascript' src='".base_url()."js/jquery-1.8.3.min.js'></script>"; ?>
	<?php echo"<script type='text/javascript' src='".base_url()."js/detect-engine.js'></script>"; ?>
	<?php echo"<script type='text/javascript' src='".base_url()."js/get-engine.js'></script>"; ?>

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
	<p> 
	مكاتب البريد بالقرب من
	<b>
		<?php echo $place->address; ?>
	</b>
	</p>

<table>
	<?php foreach ($offices as $Office) { ?>
		<tr> <td class='office-flag'> <a class='link' href="<?php echo $Office->route; ?>" > مكتب بريد <?php echo $Office->office; ?> </a>  </td></tr>
	<?php }?>
</table>
</div>


</body>
</html>
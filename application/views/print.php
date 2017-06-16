<!DOCTYPE html>
<html>
<head>
	<title> <?php echo $office ?> </title>
<style type="text/css">

	*{text-align: center; direction: <?= t('direction')  ?>; font-size: 30px;}
	table{border:1px solid #000; position: relative;margin: 0 auto; max-width: 800px;}
	table tr td{border: 1px solid #000; padding: 5px 10px;}
	    @page 
    {
        size: auto;   /* auto is the initial value */
        /*margin: 0mm; */
         /* this affects the margin in the printer settings */
    }
</style>

</head>
<body onload="javascript: window.print()">

<h1> <?php echo $office ?>  </h1>

<table>
	<tr> 
	<td><?=t('address')?> </td>
	<td> <?php echo $address ?> </td>
	</tr>
	<tr> 
	<td><?=t('section')?> </td>
	<td> <?php echo $section ?> </td>
	</tr>
	<tr> 
	<td><?=t('telephone')?></td>
	<td> <?php echo $telephone ?> </td>
	</tr>
	<tr> 
	<td><?=t('postalCode')?></td>
	<td> <?php echo $postal_code ?> </td>
	</tr>
	<tr> 
	<td><?=t('financialCode')?></td>
	<td> <?php echo $financial_code ?> </td>
	</tr>
</table>


<h1> <?=t('egy_postal_service_h')?> <?php echo $office ?> </h1>

<table>
	<tr>
		<td><?t('atm')?> (ATM)</td>
		<td><?php echo $atm ?></td>
	</tr>
	<tr>
		<td><?t('ifs')?> (IFS)</td>
		<td><?php echo $ifs ?></td>
	</tr>
	<tr>
		<td> <?=t('fawry')?></td>
		<td><?php echo $fory ?></td>
	</tr>

	<tr>
		<td><?=t('wws')?></td>
		<td><?php echo $ws ?></td>
	</tr>
	<tr>
		<td><?=t('fast')?> EMS</td>
		<td><?php echo $fast ?></td>
	</tr>
	<tr>
		<td><?=t('pos')?> (POS)</td>
		<td><?php echo $pos ?></td>
	</tr>
</table>


	<h1 >  <?= t('egy_postal_whours_h'). $office ;?></h1>

<table>
	<tr>
		<td>
		<?php
		if( $work_hours==1){ ?>
		    <?= t('days1') ?>
		<?php }else if ( $work_hours == 2) { ?>
		    <?= t('days2') ?>
		<?php }else{ ?>
		    <?= t('days3') ?>
		<?php }?>

		</td>

		<td>
		<?php
		if( $work_hours==3){ ?>
		<?= t('hours1')?>
		<?php }else{?>
		<?= t('hours2')?>
		<?php } ?>
		</td>
	</tr>

	<tr>
		<td><?=t('nightShift')?></td>
		<td>
		<?php
		/* F-T */
		if( $night=='t'){ ?>
		<?= t('nightShift1')?>
		<?php }else{ ?>
		<?= t('nightShift2')?>		
		<?php } ?>
		</td>
	</tr>
</table>



</div>
</body>
</html>

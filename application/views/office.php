<!DOCTYPE html>
<html lang="<?= $this->config->item('language_abbr')?>">
<head>
	<title> <?= t('post-office'). " ".$info->office ." | " .t('title');?> </title>

	<?php $data=array(); $data['title'] = t('metaTitle') . $info->office . " ," . $info->address; ?>
    <?php $this->load->view('meta', $data); ?>	

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/styles.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/office.css">
	<?php
echo "<script type='text/javascript' src='https://code.jquery.com/jquery-1.8.3.min.js'></script>";
echo "<script type='text/javascript' src='". base_url() .  "js/main.js '></script>";

?>

<?php
$lang= $this->config->item('language_abbr');
  echo "<link rel='stylesheet' 
     href='".base_url()."css/".$lang.".css' />
       <script type='text/javascript' 
     src='".base_url()."js/".$lang.".js' ></script>
"; ?>
</head>

<body>

<?php $this->load->view('mailbox'); ?>


<div class="office  header gradBG">

<?php $this->load->view('menu'); ?>

<div class="hbody">	
<a href="" class="link"><h1>  <?= t('post-office'). " ". $info->office ;?> </h1></a>
<p class="p1"> <?php echo $info->address ;?></p>
<p class="p1"> <?php echo $info->section ;?> </p>
</div>

<div class="info">
<ul class="list-3">

<li>	
	<div class='financial code'>
		<span>
			<?php echo $info->financial_code ;?>
		</span>
		<span><?= t('financialCode')?></span>
	</div>
</li>

<li>
	<h1 class='postal code'>
		<span>
			<?php echo $info->postal_code ;?>
		</span>
		<span><?= t('postalCode')?></span>
	</h1>
</li>

<li>	
	<div class='telephone code'>
		<span>
			<?php echo $info->telephone ;?>
		</span>
		<span><?= t('telephone')?></span>
	</div>
</li>
</ul>
</div>

</div>


<div class="services cover">
	<h2 > <?= t('postServices')?> <?php echo $info->office ;?> </h2>

	<div class="sbody center_h">

		<div class="item <?php echo (empty($info->atm))? 'f': $info->atm ;?>" > <?=t('atm')?> (ATM)</div>
		<div class="item <?php echo (empty($info->ifs))? 'f': $info->ifs ;?>" > <?=t('ifs')?>(IFS) </div>
		<div class="item <?php echo (empty($info->fory))? 'f': $info->fory;?>" ><?=t('fawry')?> </div>
		<div class="item <?php echo (empty($info->ws))? 'f': $info->ws ;?>" > <?=t('wws')?></div>
		<div class="item <?php echo (empty($info->fast))? 'f': $info->fast ;?>" > <?= t('fast')?> (EMS) </div>
		<div class="item <?php echo (empty($info->pos))? 'f': $info->pos ;?>"> <?=t('pos')?> (POS) </div>


	</div>

	<div class="note">
		<span class='f'> <?=t('notAvailable')?> </span>
		<span class='t'> <?=t('available')?></span>
	</div>

</div>


<div class='shaded center_h' style=' padding:20px 0px; font-size:0.9em; '>
<h2>  <?= t('zipCode'). '( '. $info->office .' )' .t('is').   $info->postal_code ?> </h2>
</div>

<!-- Work hours -->
<div class="whours">
	<h2 > <?= t('whours_h'). ' ( '. $info->office.' )' ;?></h2>

<table>
	<tr>
		<td>
		<?php
		if( $info->work_hours==1){ ?>
		    <?= t('days1') ?>
		<?php }else if ( $info->work_hours == 2) { ?>
		    <?= t('days2') ?>
		<?php }else{ ?>
		    <?= t('days3') ?>
		<?php }?>

		</td>

		<td>
		<?php
		if( $info->work_hours==3){ ?>
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
		if( $info->night=='t'){ ?>
		<?= t('nightShift1')?>
		<?php }else{ ?>
		<?= t('nightShift2')?>		
		<?php } ?>
		</td>
	</tr>
</table>
	
</div>


<!-- Options -->
<div class="options header gradBG">
	<ul class="list-3">
		<li>
			<div class="print" data-print='<?php echo print_base_url().$info->id ?>'>
				<img src='<?php echo base_url(); ?>img/icons/print.png'>
				<h3> <?=t('print')?> </h3>
			</div>
		</li>

		<li>
			<div class="save">
			<a href="javascript:void(0)" class='link' onclick="return BookmarkApp.addBookmark(this)">
				<img src='<?php echo base_url(); ?>img/icons/bookmark.png'>
				<h3 > <?=t('save')?> </h3>
				</a>
			</div>
		</li>

		<li>
			<div class="send">
				<img src='<?php echo base_url(); ?>img/icons/send.png'>
				<h3> <?=t('send')?> </h3>
			</div>
		</li>

	</ul>
</div>

<!-- Preview -->
<div class="preview">
	<h3> <?=t('helpH')?> </h3>
	<p class="p1 center_h"><?=t('helpDesc')?>    </p>

<div style='width:100%; text-align:center;' class="q1">
<b>
<?=t('helpQ1')?><i>
<?php echo $info->office; ?> </i>
<?=t('helpQ2')?>
</b>


<div class="vote-box center_h">
	<div class="block">
	<div class='vote right' data-app='<?php echo $info->id ?>'></div>
	<div class='vote wrong'></div>
	</div>
	<div class="notes"></div>
</div>

</div>
</div>


<!-- More -->
<div class="more">
	<h1>
			<?=t('moreH')?>
	</h1>

	<p class="p1 center_h">
			<?=t('moreDesc')?>
	</p>

	<a href="<?= lang_base_url() ?>" class="link"> <?= t('buttonTitle') ?> </a>


</div>


<!-- Places -->
<div class="places" id='place-sec'>
	<?php
      if(Count($places) >0){
      ?>

	<p> <?=t('placeNear')?>
	<b> <?=t('post-office')?>
      <?php echo '( '. $info->office .' )';  ?>
	</b>
	</p>
<?php
      	$this->table->set_heading('');
       echo $this->table->generate($places);
   }
?>

    
</div>
<?php
echo "<script type='text/javascript' src='". base_url() .  "js/office.js '></script>";
?>


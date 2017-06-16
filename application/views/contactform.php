
<!DOCTYPE html>
<html lang="<?= $this->config->item('language_abbr')?>">

<head>
<meta charset="utf-8">
	<title> <?= t('contactus')?> | <?= t('title')?> </title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/styles.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/contact.css">
    <?php $this->load->view('meta'); ?>	

	<?php echo"<script type='text/javascript' src='".base_url()."js/jquery-1.8.3.min.js'></script>"; ?>
	<?php echo"<script type='text/javascript' src='".base_url()."js/main.js'></script>"; ?>

<?php
$lang= $this->config->item('language_abbr');
  echo "<link rel='stylesheet' 
     href='".base_url()."css/".$lang.".css' />
            <script type='text/javascript' 
     src='".base_url()."js/".$lang.".js' ></script>
       ";
       ?>
</head>

<body>

<?php $this->load->view('mainview'); ?>


<div class="contact">
<div class='middle'>
<div class="cbody">
	<h1> <?=t('contactus')?></h1>
<input type="text" id='fname' placeholder="<?=t('fullname')?>" />
<input type="text" id='email' placeholder="<?=t('emailAddress')?>" />
<input type="text" id='phone' placeholder="<?=t('mobile')?>" />

<textarea id='message' placeholder="<?=t('detailedMsg')?>" ></textarea>

<input type="submit" id='submit' value="<?=t('send')?>">
<div id='result'></div>
</div>

</div>
</div>

	<?php echo"<script type='text/javascript' src='".base_url()."js/contact.js'></script>"; ?>

</body>
</html>
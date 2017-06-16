
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
	<title> اتصل بنا | رقمى البريدى أية ؟ </title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/styles.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/contact.css">

	<?php echo"<script type='text/javascript' src='".base_url()."js/jquery-1.8.3.min.js'></script>"; ?>
	<?php echo"<script type='text/javascript' src='".base_url()."js/main.js'></script>"; ?>
	<?php echo"<script type='text/javascript' src='".base_url()."js/contact.js'></script>"; ?>

</head>

<body>

<?php $this->load->view('mainview'); ?>


<div class="contact">
<div class='middle'>
<div class="cbody">
	<h1> إتصل بنا</h1>
<input type="text" id='fname' placeholder='الاسم كاملاً' />
<input type="text" id='email' placeholder='البريد الاكترونى' />
<input type="text" id='phone' placeholder='رقم التليفون' />

<textarea id='message' placeholder=' الرسالة التفصيلية '></textarea>

<input type="submit" id='submit' value="إرسال">
<div id='result'></div>
</div>

</div>
</div>


</body>
</html>
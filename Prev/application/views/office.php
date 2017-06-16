<!DOCTYPE html>
<html>
<head>
	<title> مكتب بريد <?php echo $info->office ;?> | رقمى البريدى أية ؟</title>

	<?php $data=array(); $data['title'] = "الرقم البريدى ل" . $info->office . " ," . $info->address; ?>
    <?php $this->load->view('meta', $data); ?>	

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/styles.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/office.css">
	<?php
echo "<script type='text/javascript' src='". base_url() .  "js/jquery-1.8.3.min.js '></script>";
echo "<script type='text/javascript' src='". base_url() .  "js/main.js '></script>";

?>

</head>

<body>

<?php $this->load->view('mailbox'); ?>


<div class="office  header">

<?php $this->load->view('menu'); ?>

<div class="hbody">	
<h1> مكتب بريد <?php echo $info->office ;?> </h1>
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
		<span>الرقم المالى</span>
	</div>
</li>

<li>
	<div class='postal code'>
		<span>
			<?php echo $info->postal_code ;?>
		</span>
		<span>الرقم البريدى</span>
	</div>
</li>

<li>	
	<div class='telephone code'>
		<span>
			<?php echo $info->telephone ;?>
		</span>
		<span>تليفون</span>
	</div>
</li>
</ul>
</div>

</div>


<div class="services cover">
	<h1 > خدمات مكتب بريد <?php echo $info->office ;?> </h1>

	<div class="sbody center_h">
		<div class="item <?php echo (empty($info->atm))? 'f': $info->atm ;?>" > خدمات الصرف الألى (ATM)</div>
		<div class="item <?php echo (empty($info->ifs))? 'f': $info->ifs ;?>" > حوالات خارجية واردة (IFS) </div>
		<div class="item <?php echo (empty($info->fory))? 'f': $info->fory;?>" > حوالات داخلية فورية</div>
		<div class="item <?php echo (empty($info->ws))? 'f': $info->ws ;?>" > خدمات الشباك الموحد</div>
		<div class="item <?php echo (empty($info->fast))? 'f': $info->fast ;?>" > خدمات البريد السريع (EMS) </div>
		<div class="item <?php echo (empty($info->pos))? 'f': $info->pos ;?>"> خدمة نقاط البيع (POS) </div>

	</div>

	<div class="note">
		<span class='f'> غير متاح</span>
		<span class='t'> متاح</span>
	</div>

</div>

<!-- Work hours -->
<div class="whours">
	<h1 > مواعيد العمل بمكتب بريد <?php echo $info->office ;?></h1>

<table>
	<tr>
		<td>
		<?php
		if( $info->work_hours==1){ ?>
		     من الاحد الى الخميس
		<?php }else if ( $info->work_hours == 2) { ?>
			من السبت الى الاربعاء 
		<?php }else{ ?>
		من السبت الى الخميس
		<?php }?>

		</td>

		<td>
		<?php
		if( $info->work_hours==3){ ?>
		من 8 صباحاً الى 2 مساءً
		<?php }else{?>
		من 8 صباحاً الى 3 مساءً
		<?php } ?>
		</td>
	</tr>

	<tr>
		<td>فترة مسائية</td>
		<td>
		<?php
		/* F-T */
		if( $info->night=='t'){ ?>
		من 6 الى 8 مساءً
		<?php }else{ ?>
		لا يوجد
		<?php } ?>
		</td>
	</tr>
</table>
	
</div>


<!-- Options -->
<div class="options header">
	<ul class="list-3">
		<li>
			<div class="print" data-print='<?php echo print_base_url().$info->id ?>'>
				<img src='<?php echo base_url(); ?>img/icons/print.png'>
				<h3> آطبع </h3>
			</div>
		</li>

		<li>
			<div class="save">
			<a href="javascript:void(0)" class='link' onclick="return BookmarkApp.addBookmark(this)">
				<img src='<?php echo base_url(); ?>img/icons/bookmark.png'>
				<h3 > حفظ </h3>
				</a>
			</div>
		</li>

		<li>
			<div class="send">
				<img src='<?php echo base_url(); ?>img/icons/send.png'>
				<h3> أرسال </h3>
			</div>
		</li>

	</ul>
</div>

<!-- Preview -->
<div class="preview">
	<h1> ساعــدنا </h1>
	<p class="p1 center_h">
		ساعدنا فى تقديم خدمة الرقم البريدى بشكل افضل  من خلال تحديد 
    </p>

<div style='width:100%; text-align:center;' class="q1">
<b>
هل مكتب بريد <i>
<?php echo $info->office; ?> </i>
 هو الاقرب الى موقعك الحالى ؟
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
	لمعرفة الرقم البريدى
	</h1>

	<p class="p1 center_h">
لمعرفة الرقم البريدى واقرب مكتب بريد لموقعك الحالى يمكنك استخدام خدمة
	</p>

	<a href="../" class="link"> رقمى أية ؟</a>

<!-- 	<p class="p1 center_h">
كما يمكنك معرفة الرقم البريدى لاى مكان فى مصر باستخدام		
	</p>
	<a href="" class="link"> بحث متقدم</a> -->

</div>


<!-- Places -->
<div class="places">
	<?php
      if(Count($places) >0){
      ?>

	<p> أماكن بالقرب من 
	<b> مكتب بريد  
      <?php echo $info->office; ?>
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

</body>
</html>
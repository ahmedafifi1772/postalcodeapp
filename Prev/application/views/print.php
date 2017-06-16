<!DOCTYPE html>
<html>
<head>
	<title> <?php echo $office ?> </title>
<style type="text/css">
	*{text-align: center; direction: rtl; font-size: 30px;}
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
	<td>عنوان</td>
	<td> <?php echo $address ?> </td>
	</tr>
	<tr> 
	<td>قطاع</td>
	<td> <?php echo $section ?> </td>
	</tr>
	<tr> 
	<td>تليفون</td>
	<td> <?php echo $telephone ?> </td>
	</tr>
	<tr> 
	<td>رقم بريدى</td>
	<td> <?php echo $postal_code ?> </td>
	</tr>
	<tr> 
	<td>رقم مالى</td>
	<td> <?php echo $financial_code ?> </td>
	</tr>
</table>


<h1> خدمات <?php echo $office ?> </h1>

<table>
	<tr>
		<td>خدمات الصرف الألى (ATM)</td>
		<td><?php echo $atm ?></td>
	</tr>
	<tr>
		<td>حوالات خارجية واردة (IFS)</td>
		<td><?php echo $ifs ?></td>
	</tr>
	<tr>
		<td>   حوالات داخلية فورية </td>
		<td><?php echo $fory ?></td>
	</tr>

	<tr>
		<td>خدمات الشباك الموحد</td>
		<td><?php echo $ws ?></td>
	</tr>
	<tr>
		<td>خدمات البريد السريع EMS</td>
		<td><?php echo $fast ?></td>
	</tr>
	<tr>
		<td>خدمة نقاط البيع (POS)</td>
		<td><?php echo $pos ?></td>
	</tr>
</table>


	<h1 > مواعيد العمل بمكتب بريد <?php echo $office ;?></h1>

<table>
	<tr>
		<td>
		<?php
		if( $work_hours==1){ ?>
		     من الاحد الى الخميس
		<?php }else if ( $work_hours == 2) { ?>
			من السبت الى الاربعاء 
		<?php }else{ ?>
		من السبت الى الخميس
		<?php }?>

		</td>

		<td>
		<?php
		if( $work_hours==3){ ?>
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
		if( $night=='t'){ ?>
		من 6 الى 8 مساءً
		<?php }else{ ?>
		لا يوجد
		<?php } ?>
		</td>
	</tr>
</table>



<div style="font-size:10px; margin:10px auto;">  تم الطبع من خلال  <a href="<?php echo 'http://'. $_SERVER['HTTP_HOST'] ?>"><?php echo $_SERVER['HTTP_HOST'] ?></a> 

</div>
</body>
</html>

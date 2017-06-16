<!DOCTYPE html>
<html>
<head>
	<title>رقمى البريدى أية ؟ | أعرف رقمك بدون بحث</title>
    
    <?php $this->load->view('meta'); ?>	

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/styles.css">

	<?php echo"<script type='text/javascript' src='".base_url()."js/jquery-1.8.3.min.js'></script>"; ?>
	<?php echo"<script type='text/javascript' src='".base_url()."js/main.js'></script>"; ?>

	<?php echo"<script type='text/javascript' src='".base_url()."js/detect-engine.js'></script>"; ?>
	<?php echo"<script type='text/javascript' src='".base_url()."js/get-engine.js'></script>"; ?>

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
</head>
<body>



<?php $this->load->view('mainview'); ?>



<!--Rakmy eh -->
<div class="auto cover" name='rakmyeh'>

			<h1> <span class='head-pin'></span> رقمى البريدى أية ؟  </h1>
<!-- Report button -->
<div class="report-auto" onclick="return openWrapper()">
	<div><span> ابلاغ عن خطأ </span></div>
</div>			


<!-- Report -->
<div class="wrapper cover table">
	<div class="center_v center_h shadedout">

<div class="report-box shadedout">
	<h2> برجاء تحديد المشكلة </h2>
	<div> <input type="radio" id='report-answer'  name='auto-report' value="wrongPosition"><span class='radio'></span> مكتب البريد ليس الاقرب لموقعى الحالى </div>
	<div> <input type="radio" id='report-answer'  name='auto-report' value="wrongData"> <span class='radio'></span>خطاء فى بيانات الرقم البريدى </div>
	<div> <input type="radio" id='report-answer'  name='auto-report' value="another"> <span class='radio'></span>أخرى </div>
	<div> <textarea id='problem_desc' placeholder='شرح مختصر للمشكلة إن امكن' class=""></textarea></div>
	<div> <input type="submit" value='تمام' class="submit buttonblue" disabled='true' onclick="return reportAuto()" /> 
	<input type="submit"value='إغلاق ' class="buttonwhite close" /> </div>
</div>

</div>
</div>
<!-- End Report -->

<p class="p1">
فقط  اضغط على زر أبدأ وسيب الباقى علينا
</p>

<p class="limit_w p3">
<b>ملاحظة :</b>
				<br>
 * عند استخدام نظام التحديد الاألى سيتطلب المتصفح السماح لموقعنا بتحديد موقعك الحالى ,<br> برجاء السماح  للمتصفح بذلك حتى تتمكن من معرفة اقرب مكت بريد لك.
<br>
  * لن تتمكن من استخدام هذة الخاصية ان كت خارج حدود مصر, يمكنك استخدام 
  <a href="" class='gosearch'> البحث </a> .
</p>

			<a href="" id='start-detect' class="link box-border"> إبــــــدا</a>


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

				
					<img id='detect-pin' src="<?php echo base_url(); ?>img/icons/pin-off.png"; >
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
	<h1> <span class='head-search'></span> بحث متقدم </h1>
<p class="p2 center_h">
	يمكنك معرفة رقمك البريدى واقرب مكتب بريد اليك من خلال البحث باسم منطقتك
</p>


<div class='mid-box center_h'>
<input type='text' id='search_box' class="center_h" placeholder='اكتب اسم اقرب منطقة اليك' />
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
					echo "<a class='link' href='".$visit->route."'><li>" . $visit->office . "</li></a>";
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
	<h1> الرقم البريدى المصرى </h1>

	<p class="p3 center_h">
		الرقم البريدى هو رقم يدل على اقرب مكتب بريد اليك حيث يوجد رقم بريد مميز لكل مكتب بريد من المكاتب المختلفة
		 المنتشرة فى جميع انحاء مصر, يستخدم الرقم البريدى فى المرسالات البريدية لتحديد اقرب مكتب مكتب يمكن الارسالة الية ,
		  كما يستخدم فى تحديد العناوين فى المراسلات الدولية وخاصة المتعلقة بتحويل الاموال..
		  نقوم بتوفير الرقم البريدى لمكتب البريد الاقرب اليك بالاضافة الى كل المعلومات عن مكتب البريد  وهى 
	</p>

<ul class="list-3">
	<li>
		<img src="<?php echo base_url(); ?>img/icons/services.png">
		<h3> الخدمات المقدمة </h3>
		<p class="p3 center_h">
			وهى الخدمات المتاحة بمكتب البرد مثل الحوالات الداخلية  والخارجية وخدمات الشباك الواحد
		</p>
	</li>
	
	<li>
		<img src="<?php echo base_url(); ?>img/icons/Time.png">
				<h3> مواعيد العمل </h3>
		<p class="p3 center_h">
			مواعيد بدء العمل بمكتب البردي وفترات العمل بمكاتب البريد الصباحية والمسائية
		</p>
	</li>

	<li>
		<img src="<?php echo base_url(); ?>img/icons/web-services.png">
				<h3> Web Services </h3>
		<p class="p3 center_h">
			خدماتننا ستكون متاحة للمطورين للاستخدام فى التطبيقات المعتمدة على الرقم البريدى على الانترنت .. قريباً
		</p>
	</li>
</ul>

</div>






</body>
</html>
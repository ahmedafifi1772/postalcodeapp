<div class="footer cover">
	<ul class="list-3">
		<li>
			<h3 class='footer-flag'>رقمى البريدى أية ؟</h2>
			<ul class="list-normal">
			<li> <a class="link top" href="" onclick="javascript: getFocus( $('body') ); return false; "> اعلى الصفحة </a></li>
			<li> <a class="link" href="<?php echo base_url(); ?>"> الرئيسية </a></li>

			<li> <a class="link" href="<?php echo contact_base_url(); ?>"> اتصل بنا </a></li>
			<li> <a class="link" href="<?= base_url().'sitemap.xml' ?>"> خريطة الموقع </a></li>
			</ul>
			<div id='social-box'>
			<b>تا بعونا </b>
				<table>
					<tr>
						<td><a href="#"> <div class="social facebook"></div>  </a> </td>
						<td><a href="#"> <div class="social twitter"></div>   </a> </td>
						<td><a href="#"> <div class="social gplus"></div>     </a> </td>
					</tr>
				</table>
			</div>
		</li>
		<li>
			<h3 class='footer-search'>الأكثر بحثاً</h2>
			<ul class="list-normal">

			<li>

			<?php

			 foreach ($mostvisited['footer'] as $footer): ?>
				<li> <a class='link' href="<?= $footer->route ?>"> <?php echo $footer->office; ?> </a>
				<span> <?php echo $footer->postal_code; ?> </span>
			 </li>
			<?php endforeach; ?>
			</ul>
		</li>

		<li>
			<img id="egymap" src="<?= base_url(); ?>img/egyptmap.png" >
			
		</li>
	</ul>
<div id='cpy'>All rights reserved &copy; <a hre='<?=base_url();?>'>YourPostalCode.com</a></div>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5627e9da5815ab1b" async="async"></script>


</div>



<script type="text/javascript">if(typeof wabtn4fg==="undefined"){wabtn4fg=1;h=document.head||document.getElementsByTagName("head")[0],s=document.createElement("script");s.type="text/javascript";s.src="<?= base_url();?>js/whatsapp-button.js";h.appendChild(s);}</script>
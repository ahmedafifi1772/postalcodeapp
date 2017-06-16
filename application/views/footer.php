<div class="footer cover">
	<ul class="list-2">
		<li>
			<h3 class='footer-flag'><?= t('buttonTitle')?></h3>
			<ul class="list-normal">
			<li> <a class="link top" href="" onclick="javascript: getFocus( $('body') ); return false; "> <?= t('pageUp') ?></a></li>
			<li> <a class="link" href="<?php echo lang_base_url(); ?>"> <?= t('home') ?> </a></li>

			<li> <a class="link" href="<?php echo contact_base_url(); ?>"><?= t('contactus') ?> </a></li>
			<li>
				<a class='link underline'  
				href='<?= switch_url(); ?>' >
				 <?=t('switchLanguage');?> 
				 </a>
			</li>
			<li> <a class="link" href="<?= lang_base_url().'sitemap.xml' ?>"> <?= t('siteMap')?></a></li>
			</ul>
			<div id='social-box'>
			<b><?= t('followus') ?> </b>
				<table>
					<tr>
						<td><a target="_blank" href="https://plus.google.com/+Yourpostalcode"> <div class="social gplus"></div>     </a> </td>

						<td><a target="_blank" href="https://twitter.com/yourpostalcode"> <div class="social twitter"></div>   </a> </td>
						<td><a target="_blank" href="https://www.facebook.com/yourpostalcode"> <div class="social facebook"></div>  </a> </td>

						</tr>
				</table>
			</div>
		</li>
		<li>
			<h3 class='footer-search'><?= t('mostSearched')?></h3>
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


	</ul>

<div id='cpy'> <?= t('copyRight') ?> &copy; <a href='<?=base_url();?>' class='link'>YOURPOSTALCODE.COM</a></div>	

 <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5627e9da5815ab1b" async="async"></script> 


</div>
</body></html>


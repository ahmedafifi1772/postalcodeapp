	

	<div id='menu'>
		<ul>
			<li> <a class="link" href="<?php echo lang_base_url(); ?>"> <?= t('home'); ?> </a></li>

			<li> <a class="link" href="<?php echo contact_base_url(); ?>"> <?= t('contactus'); ?></a></li>
		</ul>

		<a class='link underline' style='padding-right:30px; float:right; line-height:2em;' 
		href='<?= switch_url(); ?>' >
		 <?=t('switchLang');?> 
		 </a>
	</div>



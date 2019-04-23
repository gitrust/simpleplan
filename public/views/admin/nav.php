<div class="row">
	<div class="twelve columns">
		<div class="subnav">
			<a href="<?= DIR ?>admin/events/"><?= I18n::tr('link.schedules'); ?></a> |
			<a href="<?= DIR ?>activities"><?= I18n::tr('link.activities'); ?></a> | 
			<a href="<?= DIR ?>resources/"><?= I18n::tr('link.resources'); ?></a>
<?php 
if ($data["isadmin"]){
			echo '| <a href="' . DIR . 'users/">' . I18n::tr('link.users') . '</a>';
		}
?>			
		</div>
	</div>
</div>
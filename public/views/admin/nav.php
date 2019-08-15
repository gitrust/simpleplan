<div class="row">
	<div class="twelve columns">
		<div class="subnav">
			<a href="<?= DIR ?>resources/"><?= I18n::tr('link.resources'); ?></a> |
			<a href="<?= DIR ?>admin/events/"><?= I18n::tr('link.schedules'); ?></a>
			
<?php 
if ($data["isadmin"]){
	echo ' | <a href="' . DIR . 'activities">' . I18n::tr('link.activities') . '</a>';
	echo ' | <a href="' . DIR . 'users/">' . I18n::tr('link.users') . '</a>';
	echo ' | <a href="' . DIR . 'statistics/">' . I18n::tr('link.statistics') . '</a>';
}
?>			
		</div>
	</div>
</div>
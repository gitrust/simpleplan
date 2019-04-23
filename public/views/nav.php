<div class="row">

	<div class="eight columns">
		<div class="nav">
		<a href="<?= DIR ?>schedules"><?= I18n::tr('link.entries'); ?></a> |
<?php 
		if ($data["isadmin"]){
			echo '<a href="' . DIR . 'admin/events">' . I18n::tr('link.administration') . '</a> |';
		}
?>
		<a href="<?= DIR ?>login/logout/"><?= I18n::tr('link.logout'); ?></a>
		
		</div>
	</div>

	<div class="four columns">
	<?php 
	  if (Session::get("userid")) { 
	    echo '<p class="pull-right loginname"><i class="far fa-user fa-2x"></i>  ' . Session::get('username') . '</p>';
	  }  
	?>
	</div>
</div>
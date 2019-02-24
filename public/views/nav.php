<div class="row">

	<div class="eight columns">
		<div class="nav">
		<a href="<?= DIR ?>events/mylist/"><?= I18n::tr('link.entries'); ?></a> |
<?php 
		if ($data["isadmin"]){
			$link = I18n::tr('link.administration');
			echo '<a href="' . DIR . 'admin/events/">' . $link . '</a> |';
		}
?>
		<a href="<?= DIR ?>login/logout/"><?= I18n::tr('link.logout'); ?></a>
		
		</div>
	</div>

	<div class="four columns">
	<?php 
	  if (Session::get("userid")) { 
	    echo '<p class="pull-right loginname">Angemeldet als ' . Session::get('username') . '</p>';
	  }  
	?>
	</div>
</div>
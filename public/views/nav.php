<div class="row">

	<div class="eight columns">
		<div class="nav">
		<a href="<?= DIR ?>login/logout">Logout</a> | 
		<a href="<?= DIR ?>admin/roles">Administration</a>
		</div>
	</div>

	<div class="four columns">
	<?php 
	  if (Session::get("userid")) { 
	    echo '<span class="loginname">Angemeldet als ' . Session::get('username') . '</span>';
	  }  
	?>
	</div>
</div>
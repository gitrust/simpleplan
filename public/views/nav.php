<div class="nav">

<a href="<?= DIR ?>login/logout">Logout</a> | 
<a href="<?= DIR ?>login/logout">Administration</a>


<span>
<?php 
  if (Session::get("userid")) { 
    echo 'Angemeldet als ' . Session::get('username');
  }  
?>
</span>
</div>
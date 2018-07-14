
<h1><?= $data['form_header'] ?></h1>

<?php echo Message::show(); ?>

<?php
 $logindata = $data['login'];

?>
	  
<!-- The above form looks like this -->
<form method="POST" action="<?= DIR ?>/termin/list/">
  <div class="row">
    <div class="six columns">
      <label for="loginInput">Your login</label>
      <input class="u-full-width" placeholder="test@mailbox.com" id="loginInput" type="email">
    </div>
  </div>
  
  <div class="row">
    <div class="six columns">
      <label for="pswInput">Your password</label>
      <input class="u-full-width" placeholder="*****" id="pswInput" type="password">
    </div>
  </div>
  

  <input class="button-primary" value="Login" type="submit">
</form>

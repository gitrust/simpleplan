
<h1><?= $data['form_header'] ?></h1>

<?php echo Message::show(); ?>

<?php
 $logindata = $data['login'];

?>
  
<!-- The above form looks like this -->
<form method="POST" action="<?= DIR ?>login/login/">
  <div class="row">
    <div class="six columns">
      <label for="loginInput">Your login</label>
      <input class="u-full-width" placeholder="test@mailbox.com" name="login" id="loginInput" type="email">
    </div>
  </div>
  
  <div class="row">
    <div class="six columns">
      <label for="pswInput">Your password</label>
      <input class="u-full-width" placeholder="*****" id="pswInput" type="password" name="pass">
    </div>
  </div>
  

  <input class="button-primary" value="Login" type="submit">
</form>

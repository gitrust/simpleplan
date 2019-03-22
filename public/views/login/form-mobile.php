
<h1><?= I18n::tr('title.site');  ?></h1>

<?php echo Message::show() ; ?>

<?php
 $logindata = $data['login'];
?>
  
<!-- The above form looks like this -->
<form method="POST" action="<?= DIR ?>login/login">
  <input type="hidden" name="mobile" value="1">
  <div class="row">
    <div class="four columns">&nbsp;
    </div>
    <div class="four columns">
      <label for="loginInput"><?= I18n::tr('form.login'); ?></label>
      <input class="u-full-width" placeholder="login" name="login" id="loginInput" type="text">
    </div>
    <div class="four columns">&nbsp;
    </div>    
  </div>
  
  <div class="row">
    <div class="four columns">&nbsp;
    </div>
    <div class="four columns">
      <label for="pswInput"><?= I18n::tr('form.password'); ?></label>
      <input class="u-full-width" placeholder="*****" id="pswInput" type="password" name="pass">
    </div>
    <div class="four columns">&nbsp;
    </div>
  </div>
  
  <div class="row">
    <div class="four columns">&nbsp;
    </div>
    <div class="two columns">
      <input class="button-primary" value="<?= I18n::tr('button.login'); ?>" type="submit">
      
    </div>
    <div class="two columns"><a href="/login">Desktop Version</a>
    </div>
    <div class="four columns">&nbsp;
    </div>
  </div>
</form>

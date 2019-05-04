<div class="loginmain">

<?php echo Message::show() ; ?>

<?php
 $logindata = $data['login'];
?>
  
<!-- The above form looks like this -->
<div class="login-box">

    <img src="/static/img/avatar.png" title="avatar" class="avatar">
        <h1><?= I18n::tr('title.site'); ?></h1>
        <form method="POST" action="<?= DIR ?>login/login">
            <input type="hidden" name="mobile" value="1">
            <p><?= I18n::tr('form.login'); ?></p>
            <input type="text" name="login" class="logininput" placeholder="Enter Username" required>
            <p><?= I18n::tr('form.password'); ?></p>
            <input type="password" name="pass" class="logininput" placeholder="Enter Password" required>
            <input type="submit" name="submit" class="button-primary"  value="<?= I18n::tr('button.login'); ?>">
            <a href="/login">Desktop Version</a> 
        </form>
</div>

</div>
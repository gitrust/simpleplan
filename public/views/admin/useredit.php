
<div class="row">
<div class="twelve columns">
	<form action="<?= DIR ?>admin/useradd/" method="POST">

	<div class="row">
		<div class="four columns">
			<label for="login"> <?= I18n::tr('label.newuser'); ?></label>
			<div data-tip="Wird fuer die Anmeldung verwendet">
				<input type="text" placeholder="<?= I18n::tr('label.userlogin'); ?>" name="login" value="">
			</div>
		</div>
		<div class="four columns">
			<label for="pass"> &nbsp;</label>
			<div data-tip="Verwende Buchstaben, Zahlen, Sonderzeichen">
			<input type="password" placeholder="<?= I18n::tr('label.userpass'); ?>" name="pass" value="">
			</div>
		</div>		
		<div class="four columns">
			<label for="pass"> &nbsp;</label>
			<input type="text" name="firstname" placeholder="<?= I18n::tr('label.userfirstname'); ?>" value="">
		</div>
	</div>

	<div class="row">
		<div class="twelve columns">
			<input class="button-primary" value="<?= I18n::tr('button.add'); ?>" type="submit">
		</div>
	</div>
	</form>
</div>
</div>
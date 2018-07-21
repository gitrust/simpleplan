
<form action="<?= DIR ?>admin/roleadd/" method="POST">

<div class="row">
	<div class="four columns">
		<label for="role"><?= I18n::tr('label.newrole'); ?></label>
		<input type="text" name="role" value=""> 
	</div>
	<div class="eight columns">
		<label for="desc"><?= I18n::tr('label.roledescription'); ?></label>
		<input type="text" name="desc" value="">
		<input class="button-primary" value="<?= I18n::tr('button.add'); ?>" type="submit">
	</div>
</div>
</form>

<form action="<?= DIR ?>admin/schedadd/" method="POST">

<div class="row">
	<div class="four columns">
		<label for="role"><?= I18n::tr('label.newschedule'); ?></label>
		<input type="text" name="targetDate" value=""> 
	</div>
	<div class="eight columns">
		<label for="desc"><?= I18n::tr('label.scheduledescription'); ?></label>
		<input type="text" name="desc" value="">
		<input class="button-primary" value="<?= I18n::tr('button.add'); ?>" type="submit">
	</div>
</div>
</form>
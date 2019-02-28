<div class="row">
<div class="twelve columns">
	<form action="<?= DIR ?>activities/add" method="POST">

	<div class="row">
		<div class="four columns">
			<label for="name"><?= I18n::tr('label.newactivity'); ?> (*)</label>
			<input type="text" name="name" value="">
		</div>
		<div class="eight columns">
			<label for="desc"><?= I18n::tr('label.activitydescription'); ?></label>
			<input type="text" name="desc" value="">
			<input class="button-primary" value="<?= I18n::tr('button.add'); ?>" type="submit">
		</div>
	</div>
	</form>
</div>
</div>
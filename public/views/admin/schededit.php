<div class="row">
<div class="twelve columns">

	<form action="<?= DIR ?>admin/schedadd/" method="POST">

	<div class="row">
		<div class="four columns">
			<label for="role"><?= I18n::tr('label.newschedule'); ?> (*)</label>
			<input id="mydate" type="text" name="targetDate" value=""> 
		</div>
		<div class="eight columns">
			<label for="desc"><?= I18n::tr('label.scheduledescription'); ?></label>
			<input type="text" name="desc" value="">
			<input class="button-primary" value="<?= I18n::tr('button.add'); ?>" type="submit">
		</div>
	</div>
	</form>

	<!-- https://github.com/bevacqua/rome -->
	<SCRIPT LANGUAGE="JavaScript" ID="js1">
		rome(mydate, { "time": false, "autoClose": true,"strictParse": false,"inputFormat": "DD.MM.YYYY","weekStart" : "1" });
	</SCRIPT>

</div>
</div>
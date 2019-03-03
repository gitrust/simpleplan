<div class="row">
<div class="twelve columns">
	<form action="<?= DIR ?>activities/add" method="POST">

	<div class="row">
		<div class="three columns">
			<label for="name"><?= I18n::tr('label.newactivity'); ?> (*)</label>
			<input type="text" name="name" value="">
		</div>
		<div class="three columns">
			<label for="category"><?= I18n::tr('label.category'); ?> (*)</label>
			<select id="select-category" autofocus name="category" required>
<?php
			foreach ($data['categories'] as $item) {
				echo '<option value="' . htmlspecialchars($item['id']) . '">' . htmlspecialchars($item["name"]) . '</option>';
			}
?>
			</select>
		</div>
		<div class="six columns">
			<label for="desc"><?= I18n::tr('label.description'); ?></label>
			<input type="text" name="desc" value="">
			<input class="button-primary" value="<?= I18n::tr('button.add'); ?>" type="submit">
		</div>
	</div>
	</form>
</div>
</div>

<script>
$('#select-category').selectize();
</script>
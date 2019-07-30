
<!-- modal div to choose a resource -->
<!-- see scripts.php -->
<div id="moddiv" class="modal">
<form id="scheduleform" method="POST" action="<?= DIR ?>activityresources/add/<?= $data['activityId'] ?>">
<h3><?= I18n::tr('title.chooseresource'); ?></h3>
<input type="hidden" id="event" name="event" value="">
<select id="select-resource" autofocus name="resource" required>
echo '<option value=""><?= I18n::tr('option.chooseresource'); ?></option>';
<?php
foreach ($data['resources'] as $item) {
	echo '<option value="' . htmlspecialchars($item['id']) . '">' . htmlspecialchars($item["name"]) . '</option>';
}
?>
</select>

<input class="button-primary" type="submit" value="<?= I18n::tr('button.add'); ?>">
</form>
</div>

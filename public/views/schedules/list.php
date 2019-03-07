<div class="row">
<div class="twelve columns">

	<h1><?= $data['title'] ?></h1>
	
	<!-- menu -->
	<!--div class="subnav">
		<a href="<?= DIR ?>schedules/view/"><?= I18n::tr('link.schedules.readonly'); ?></a>
		| <a href="<?= DIR ?>schedules/print/"><?= I18n::tr('link.schedules.print'); ?></a>
	</div-->

	<?php echo Message::show(); ?>
	
	<!-- Paginator -->
	<?php
	echo 
		'<div class="paging"><a href="/schedules/?page=' . $data["pager.prev"] . '"> 
			&lt; </a>  &nbsp; Page [' . $data["pager.page"] . '] &nbsp;
			<a href="/schedules?page=' . $data["pager.next"] . '"> &gt; </a>
		</div>';
	?>

	<!-- Schedules table -->
	<table id="schedules" class="stripe">
	<?php
	  if (!sizeof($data['events'])) {
		 echo '<div class="alert alert-info">' . I18n::tr('table.noentries') . '</div>';
	  }
	  else {
		echo '<thead><tr><th>&nbsp;</th>';
		foreach ($data['events'] as $item) { 
			echo '<th>';
			echo '' . htmlspecialchars($item['targetDate']) . '';
			echo '<br><div class="caption-small">' . htmlspecialchars($item['description']) . '</div>';
			echo '</th>';
		}

		echo '</tr></thead>';
		echo '<tbody>';
		
		$table = $data['tabledata'];
		for ($i = 0; $i < count($table); $i++) {
				$row = $table[$i];

				echo '<tr>';

				// first column is name of activity
				echo '<td>';
				echo htmlspecialchars($row[0]["activityname"]);
				echo '</td>';

				for ($j = 0; $j < count($row); $j++) {
					$col = $row[$j];
					echo '<td class="schedule">';

					// popup link
					$addlink = '<a ';
					$addlink .= 'id="reslink" ';
					$addlink .= 'href="#" ';
					$addlink .= 'data-ref="' . htmlspecialchars($col["eventid"]) . ',' . htmlspecialchars($col["activityid"]) . '" ' ;
					$addlink .= 'title="Add Resource" ';
					$addlink .= '>';
					$addlink .= UiHelper::plusIcon();
					$addlink .= '</a>';

					// delete link
					if ($col["resourceexists"]) {
						echo htmlspecialchars($col["resourcename"]) . '&nbsp;';
						if (!$data["readonly"]) {						
							echo '<a href="' . DIR . '/schedules/del/' . htmlspecialchars($col["assignmentid"]) . '">' . UiHelper::deleteIcon() . '</a>';
						}
					} else {
						if (!$data["readonly"]) {
							echo $addlink;
						}
					}

					echo '</td>';
				}
				echo '</tr>';
		}
		echo '</tbody>';
	  }
	?>
	</table>
</div>
</div> <!-- / .row -->

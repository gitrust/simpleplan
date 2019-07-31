<div class="row">
<div class="twelve columns">

	<h2><?= $data['title'] ?></h2>
	
	<!-- menu -->
	<div class="subnav">
	<a href="<?= DIR ?>schedules/pdf/"><?= I18n::tr("link.downloadreport"); ?></a>
	</div>

	<?php echo Message::show(); ?>
	
	<!-- Paginator -->
	<?php
	if ($data['pager.show']) {
	echo 
		'<div class="paging"><a href="/schedules/?page=' . $data["pager.prev"] . '"> 
			' . UiHelper::leftIcon() . '</a>  &nbsp; ' . I18n::tr('pager.page') . ' ' . $data["pager.page"] . ' &nbsp;
			<a href="/schedules?page=' . $data["pager.next"] . '">' . UiHelper::rightIcon() . '</a>
		</div>';
	}
	?>

	<!-- Schedules table -->
	<table id="schedules" class="stripe">
	<?php
	  if (!sizeof($data['events'])) {
		 echo '<div class="alert alert-info">' . I18n::tr('table.noentries') . '</div>';
	  }
	  else {
		echo '<thead><tr><th>&nbsp;</th><th>&nbsp;</th>';
		foreach ($data['events'] as $item) { 
			echo '<th>';
			echo '' . htmlspecialchars(UiHelper::formatDate($item['targetDate'])) . '';
			echo '<br><div class="caption-small">' . htmlspecialchars($item['description']) . '&nbsp;</div>';
			echo '</th>';
		}

		echo '</tr></thead>';
		echo '<tbody>';
		
		$table = $data['tabledata'];
		for ($i = 0; $i < count($table); $i++) {
				$row = $table[$i];

				// activity resources link
				$actlink = '<a ';
				$actlink .= 'id="actlink" ';
				$actlink .= 'class="actlink" ';
				$actlink .= 'href="/activityresources/' . htmlspecialchars($row[0]["activityid"]) . '/" ';
				$actlink .= '>';
				$actlink .= UiHelper::externalLinkIcon();
				$actlink .= '</a>&nbsp;';

				echo '<tr>';

				// first col, counter
				echo '<td class="counter">';
				echo $i + 1;
				echo '</td>';
				// second column is name of activity
				echo '<td class="caption"><span>';
				echo $actlink;
				//echo htmlspecialchars($row[0]["categoryname"]);
				//echo ' / ';
				echo htmlspecialchars($row[0]["activityname"]);
				echo '</span></td>';

				for ($j = 0; $j < count($row); $j++) {
					$col = $row[$j];
					echo '<td class="schedule">';

					// popup link
					$addlink = '<a ';
					$addlink .= 'id="reslink" ';
					$addlink .= 'class="addlink" ';
					$addlink .= 'href="#" ';
					$addlink .= 'data-ref="' . htmlspecialchars($col["eventid"]) . ',' . htmlspecialchars($col["activityid"]) . '" ' ;
					$addlink .= 'title="' . I18n::tr('title.addresource') . '" ';
					$addlink .= '>';
					$addlink .= UiHelper::plusIcon();
					$addlink .= '</a>&nbsp;';

					// delete link
					if ($col["resourceexists"]) {
						echo '<span>' . htmlspecialchars($col["resourcename"]) . '&nbsp;</span>';
						if (!$data["readonly"]) {						
							echo '<span class="floatright"><a class="dellink" href="' . DIR . 'schedules/del/' . htmlspecialchars($col["assignmentid"]) . '">' . UiHelper::deleteIcon() . '</a></span>';
						}
					} else if (!$data["readonly"]){
						echo $addlink;						
					} else {
						echo '&nbsp;';
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

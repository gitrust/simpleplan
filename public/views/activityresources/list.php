<div class="row">
<div class="twelve columns">

	<h2><?= $data['title'] . ' - ' . htmlspecialchars($data['activityname']) ?></h2>

	<?php echo Message::show(); ?>


	<!-- Table -->
	<table id="activityresources" class="stripe">
	<?php
	  if (!sizeof($data['events'])) {
		 echo '<div class="alert alert-info">' . I18n::tr('table.noentries') . '</div>';
	  }
	  else {
		
		// popup link
		$addlink = '<a ';
		$addlink .= 'id="reslink" ';
		$addlink .= 'class="addlink" ';
		$addlink .= 'href="#" ';
		$addlink .= '>';
		$addlink .= UiHelper::plusIcon();
		$addlink .= '</a>&nbsp;';

		echo '<thead><tr>';
		echo '<th>' . I18n::tr('table.header.date') . '</th>';
		echo '<th>' . I18n::tr('table.header.description') . '</th>';
		echo '<th>' . I18n::tr('table.header.resources') . '</th>';
		echo '</tr></thead>';
		echo '<tbody>';
		
		foreach ($data['table'] as $row) {

			
			// popup link
			$addlink = '<a ';
			$addlink .= 'id="reslink" ';
			$addlink .= 'class="addlink" ';
			$addlink .= 'href="#" ';
			$addlink .= 'data-ref="' . htmlspecialchars($row["eventId"]) . '" ' ;
			$addlink .= 'title="' . I18n::tr('title.addresource') . '" ';
			$addlink .= '>';
			$addlink .= UiHelper::plusIcon();
			$addlink .= '</a>&nbsp;';

			$deleteLink = '';
			if (!$data["readonly"]) {
				// 1. parameter = activityId
				// 2. parameter = assignmentId					
				$deleteLink = '<span class="floatright"><a class="dellink" href="' ;
				$deleteLink .=  DIR ;
				$deleteLink .= 'activityresources/del/' . htmlspecialchars($row["activityId"]); 
				$deleteLink .= '/' . htmlspecialchars($row["assignmentId"]);
				$deleteLink .= '">' . UiHelper::deleteIcon() . '</a></span>';
			}
			
			// col1
			echo '<tr><td>';
			echo  htmlspecialchars($row['targetDate']) ;
			echo '</td>';

			// col2
			echo '<td>';
			echo '<br><div class="caption-small">' . htmlspecialchars($row['description']) . '</div>';
			echo '</td>';

			// col3
			echo '<td class="schedule">';
			if ($row['entryExists']) {
				echo '<span>' . htmlspecialchars($row["resourcename"]) . '&nbsp;</span>';						
				echo $deleteLink ;				
			} else {
				echo $addlink;
			}
			echo '</td>';
			echo '</tr>';
		}		
		echo '</tbody>';
	  }
	?>
	</table>
</div>
</div> <!-- / .row -->

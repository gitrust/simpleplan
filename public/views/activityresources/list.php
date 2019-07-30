<div class="row">
<div class="twelve columns">

	<h2><?= $data['title'] ?></h2>

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
		echo '<th>Ressource</th>';
		echo '</tr></thead>';
		echo '<tbody>';
		
		foreach ($data['events'] as $item) {

			
			// popup link
			$addlink = '<a ';
			$addlink .= 'id="reslink" ';
			$addlink .= 'class="addlink" ';
			$addlink .= 'href="#" ';
			$addlink .= 'data-ref="' . htmlspecialchars($item["id"]) . '" ' ;
			$addlink .= 'title="' . I18n::tr('title.addresource') . '" ';
			$addlink .= '>';
			$addlink .= UiHelper::plusIcon();
			$addlink .= '</a>&nbsp;';
			
			echo '<tr><td>';
			echo  htmlspecialchars(UiHelper::formatDate($item['targetDate'])) ;
			echo '</td>';
			echo '<td>';
			echo '<br><div class="caption-small">' . htmlspecialchars($item['description']) . '</div>';
			echo '</td>';
			echo '<td>' . $addlink .  '</td>';
			echo '</tr>';
		}		
		echo '</tbody>';
	  }
	?>
	</table>
</div>
</div> <!-- / .row -->

<?php

$build = node_view($node);
$dbody = drupal_render($build['body']);
if (strpos($dbody,'[tab ') !== false) { // there are tabs
	drupal_add_library('system', 'ui.tabs');

	$tabs = explode('[tab ', $dbody);
	
	foreach($tabs as $key => $val) {
		if (strlen(strip_tags($val)) != 0) {
			if (strpos($val,']') !== false) { // tab defined
				$tab_parts = explode("]", $val);
			    $tab_name[] = trim($tab_parts[0]);
			    $tab_content[] = ltrim($tab_parts[1]);
			} else {
				$tab_name[] = 'Overview';
				$tab_content[] = ltrim($val);
			}
		}
	}

	echo '<div id="tabs"><ul>';
	foreach($tab_name as $key => $val) echo "<li><a href='#tabs-$key'>$val</a></li>";
	echo '</ul>';
	
	foreach($tab_content as $key => $val) echo "<div id='tabs-$key'>$val</div>";
	echo '</div>'; //tabs
}  else print $dbody;
?>

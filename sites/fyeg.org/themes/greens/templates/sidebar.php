<div class="row-fluid">	
	<?php require_once DRUPAL_ROOT.base_path().path_to_theme().'/templates/box_green_the_world.php';?>

	<?php require_once DRUPAL_ROOT.base_path().path_to_theme().'/templates/box_join_newsletter.php';?>
</div>

<div class="row-fluid">	

	<?php if (drupal_get_path_alias() != 'what-we-stand-for') require_once DRUPAL_ROOT.base_path().path_to_theme().'/templates/sidebar_news_political.tpl.php';?>

	<div class="clearfix visible-desktop hidden-phone hidden-tablet"></div>

	<?php if (drupal_get_path_alias() != 'what-we-do') require_once DRUPAL_ROOT.base_path().path_to_theme().'/templates/sidebar_news_activity.tpl.php';?>

</div>

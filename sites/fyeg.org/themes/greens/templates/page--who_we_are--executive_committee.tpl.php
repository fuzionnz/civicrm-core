<?php require_once DRUPAL_ROOT.base_path().path_to_theme().'/templates/header.php';?>
<?php drupal_add_css(drupal_get_path('theme', 'greens') . "/css/internal.css"); ?>
<div class="internal who-we-are subpage">
	<div class="row-fluid">
		<div id="article-column" class="span8">
			<div class="box">
				<div class="content">
					<div class="row-fluid article">
						<div class="span12">
							<h1 class="article-title"><?php echo check_plain($node->title);?></h1>
							<?php require_once DRUPAL_ROOT.base_path().path_to_theme().'/templates/tool_edit_page.php';?>
							<?php require_once DRUPAL_ROOT.base_path().path_to_theme().'/templates/box_content.php';?>
						</div>
					</div>
				</div>
			</div>

			<div class="row-fluid">

<?php 
	$content_type='executive_committee';
	
	$query = new EntityFieldQuery();
	$entities = $query->entityCondition('entity_type', 'node')
	  ->entityCondition('bundle', $content_type)
	  ->propertyCondition('status', 1) // Published
	  ->execute();
	
	$nodes = entity_load('node', array_keys($entities['node']));
	$total_results = count($nodes);
	?>
	
	<div class="row-fluid">
	<?php
	foreach ($nodes as $node) { 
			$node_num++;
			$image_url = check_url($node->field_photo['und']['0']['uri']);
			$photo_thumbnail_url = image_style_url('people_image_circle', $image_url);
	?>
				<div class="span6">
					<div class="box members-box executive">
						<div class="content">
							<div class="header row-fluid">
								<div class="span12">
									<div class="members-thumbnail">
										<img height="100" width="100" src="<?php echo $photo_thumbnail_url?>">
										<div class="executive-name"><?php echo check_plain($node->title); ?></div>
										<div class="executive-description"><?php echo check_plain($node->field_role['und']['0']['value'])?><br><?php echo check_plain($node->field_country['und']['0']['value'])?></div>
									</div>
									<p><?php echo check_markup($node->body['und']['0']['value'],full_html)?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php if (($node_num % 2) == 0) {?>
				</div><div class="row-fluid">
				<?php } ?>
	<?php } ?></div>


			</div>
		</div>

		<div id="sidebar" class="span4">
			<div class="row-fluid">
				<?php require_once DRUPAL_ROOT.base_path().path_to_theme().'/templates/box_who_we_are.php';?>
				<?php require_once DRUPAL_ROOT.base_path().path_to_theme().'/templates/sidebar.php';?>
			</div>
		</div>

	</div>
</div>

<?php require_once DRUPAL_ROOT.base_path().path_to_theme().'/templates/footer.php';?>
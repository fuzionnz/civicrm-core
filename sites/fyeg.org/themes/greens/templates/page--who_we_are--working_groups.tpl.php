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

<?php 
	$content_type='working_groups';
	
	$query = new EntityFieldQuery();
	$entities = $query->entityCondition('entity_type', 'node')
	  ->entityCondition('bundle', $content_type)
	  ->propertyCondition('status', 1) // Published
	  ->execute();
	
	$nodes = entity_load('node', array_keys($entities['node']));
	$total_results = count($nodes);
	?>
	
	<?php
	foreach ($nodes as $node) {
	?>


			<div class="row-fluid">
				<div class="span12">
					<div class="box launch-box big">
						<div class="content">
							<div class="header row-fluid">
								<div class="span12">
									<a href="<?php echo check_url($base_path.drupal_lookup_path('alias',"node/".$node->nid))?>">
										<div class="title"><?php echo check_plain($node->title);?></div>
									</a>
									<div class="clearfix"></div>
									<p><?php echo check_plain($node->field_short_description['und']['0']['value'])?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

	<?php } ?>
			
			
			
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
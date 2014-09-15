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
				$content_type='general_assemblies';
				
				$query = new EntityFieldQuery();
				

				 	$entities = $query->entityCondition('entity_type', 'node')
				 	->entityCondition('bundle', $content_type)
				 	->propertyCondition('status', 1) // Published
				 	->propertyOrderBy('created', 'DESC')
				 	->execute();
				
				$nodes = entity_load('node', array_keys($entities['node']));
				$total_results = count($nodes);
				
				$node_num=0;
				$total_results = count($nodes);
				
				?>
				
				<?php
				foreach ($nodes as $node) {
					$node_num++;
					
				?>



				<div class="span6">
					<div class="box launch-box">
					<a href="<?php echo check_url($base_path.drupal_lookup_path('alias',"node/".$node->nid))?>">
					
						<div class="content">
							<div class="header row-fluid">
								<div class="span12">
									<div class="title"><?php echo check_plain($node->field_year['und']['0']['value'])?></div>
									<p><strong><?php echo check_plain($node->title);?></strong></p>
									<p><?php echo check_plain($node->field_short_description['und']['0']['value'])?></p>
								</div>
							</div>
						</div>
					</a>
					</div>
					
				</div>

				<?php if (($node_num % 2) == 0) {?>
				</div><div class="row-fluid">
				<?php } ?>



			<?php } ?>
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
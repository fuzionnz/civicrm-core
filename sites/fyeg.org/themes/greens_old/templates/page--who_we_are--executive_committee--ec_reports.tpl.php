<?php require_once DRUPAL_ROOT.base_path().path_to_theme().'/templates/header.php';?>
<?php drupal_add_css(drupal_get_path('theme', 'greens') . "/css/internal.css"); ?>
<div class="internal">
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

			<div class="sorting-bar">
				<ul>
					<li id="sort-title">SORT BY:</li>
					<li>
					<?php if (isset($_GET['date'])) { ?>
						<a href="?dateasc" class="active">Date (oldest to newest)</a>
					<?php } else if (isset($_GET['dateasc'])) { ?>
						<a href="?date" class="active">Date</a>
					<?php } else { ?>
						<a href="?date">Date</a>
					<?php }?>


					</li>
				</ul>
			</div>


			<?php 
				$content_type='ec_reports';
				
				$query = new EntityFieldQuery();
				
				if (isset($_GET['name'])) {
					$entities = $query->entityCondition('entity_type', 'node')
					->entityCondition('bundle', $content_type)
					->propertyCondition('status', 1) // Published
					->propertyOrderBy('title', 'ASC')
					->execute();
				} else if (isset($_GET['category'])) {
					$entities = $query->entityCondition('entity_type', 'node')
					->entityCondition('bundle', $content_type)
					->propertyCondition('status', 1) // Published
					->fieldCondition('field_category', 'tid', $_GET['category'])
					->execute();
				} else if (isset($_GET['dateasc'])) {
				 	$entities = $query->entityCondition('entity_type', 'node')
				 	->entityCondition('bundle', $content_type)
				 	->propertyCondition('status', 1) // Published
				 	->propertyOrderBy('created', 'ASC')
				 	->execute();
				} else {	
					$entities = $query->entityCondition('entity_type', 'node')
					->entityCondition('bundle', $content_type)
					->propertyCondition('status', 1) // Published
					->propertyOrderBy('created', 'DESC')
					->execute();
				}	
				
				 
				 				
				
				$entities = $query->entityCondition('entity_type', 'node')
				  ->entityCondition('bundle', $content_type)
				  ->propertyCondition('status', 1) // Published
				  ->execute();
				
				$nodes = entity_load('node', array_keys($entities['node']));
				$total_results = count($nodes);
				?>
				
				<?php
				foreach ($nodes as $node) {
					$pdf_url = check_url($node->field_pdf['und']['0']['uri']);
					$category_node = taxonomy_term_load($node->field_category['und']['0']['tid']);
					$category_name = check_plain($category_node->name);
					$category_tid = $category_node->tid;
				?>

			<div class="box report">
				<div class="content">
					<div class="row-fluid article">
						<div class="span12">
							<a href="<?php echo $base_path.drupal_lookup_path('alias',"node/".$node->nid)?>"><h1 class="article-title"><?php echo check_plain($node->title);?></h1></a>
							<p><?php echo check_plain($node->field_short_description['und']['0']['value'])?></p>
							<p><a href="?category=<?php echo check_plain($category_tid)?>"><strong><?php echo $category_name?></strong></a><br><strong><?php echo  check_plain(date('M j, Y', $node->created)); ?></strong></p>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>

		<div id="sidebar" class="span4">
			<div class="row-fluid">
				<?php require_once DRUPAL_ROOT.base_path().path_to_theme().'/templates/sidebar.php';?>
			</div>
		</div>

	</div>
</div>

<?php require_once DRUPAL_ROOT.base_path().path_to_theme().'/templates/footer.php';?>
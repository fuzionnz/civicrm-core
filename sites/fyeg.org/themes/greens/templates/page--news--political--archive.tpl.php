<?php require_once DRUPAL_ROOT.base_path().path_to_theme().'/templates/header.php';?>
<?php drupal_add_css(drupal_get_path('theme', 'greens') . "/css/internal.css"); ?>
<div class="internal">
	<div class="row-fluid">
		<div id="article-column" class="span8">

<?php 
$content_type='news';
$taxonomy = reset(taxonomy_get_term_by_name('Political', 'news_type'));
$taxonomy_id = $taxonomy->tid;


$per_page = 20;

if (isset($_GET['tag'])) {
	
	$tag = reset(taxonomy_get_term_by_name($_GET['tag'], 'news_tag'));
	$tag_id = $tag->tid;
	
	$query = new EntityFieldQuery();
	$tot_entities = $query->entityCondition('entity_type', 'node')
	  ->entityCondition('bundle', $content_type)
	  ->propertyCondition('status', 1) // Published
	  ->fieldCondition('field_news_type', 'tid', $taxonomy_id)
	  ->fieldCondition('field_news_tag', 'tid', $tag_id)
	  
	  ->count()
	  ->execute();
 } else {
 	$query = new EntityFieldQuery();
 	$tot_entities = $query->entityCondition('entity_type', 'node')
 	  ->entityCondition('bundle', $content_type)
 	  ->propertyCondition('status', 1) // Published
 	  ->fieldCondition('field_news_type', 'tid', $taxonomy_id)
 	  ->count()
 	  ->execute();
 }	




$total_pages  = intval($tot_entities/$per_page);
if (($tot_entities % $per_page) != 0) $total_pages++;

$page=$_GET['page'];

if (!is_numeric($page) OR ($page > $total_pages) OR ($page < 1)) {
	$page = 1;
	$from = 0;
} else {
	$from = ($page-1) * $per_page;
}



if (isset($_GET['tag'])) {
	
	$tag = reset(taxonomy_get_term_by_name($_GET['tag'], 'news_tag'));
	$tag_id = $tag->tid;
	
	$query = new EntityFieldQuery();
	$entities = $query->entityCondition('entity_type', 'node')
	  ->entityCondition('bundle', $content_type)
	  ->propertyCondition('status', 1) // Published
	  ->propertyOrderBy('created', 'DESC')
	  ->fieldCondition('field_news_type', 'tid', $taxonomy_id)
	  ->fieldCondition('field_news_tag', 'tid', $tag_id)
	  ->range($from, $per_page)
	  ->execute();
 } else {
 	$query = new EntityFieldQuery();
 	$entities = $query->entityCondition('entity_type', 'node')
 	  ->entityCondition('bundle', $content_type)
 	  ->propertyCondition('status', 1) // Published
 	  ->propertyOrderBy('created', 'DESC')
 	  ->fieldCondition('field_news_type', 'tid', $taxonomy_id)
 	  ->range($from, $per_page)
 	  ->execute();
 }	




$nodes = entity_load('node', array_keys($entities['node']));
$node_num=0;
//$total_results = count($nodes);



?>

<div id="political-news" class="box">
	<div class="header row-fluid">
		<div class="span12">
			<a href="/news/political/archive">			
				<div class="icon"><img width="80" height="80" src="<?php echo check_url("$base_path$directory/images/")?>icon-news-retina.png"></div>
				<div class="title">POLITICAL NEWS</div>
			</a>
			<div class="tools">
				<div class="position">
					<span class="counter"><?php echo check_plain($page)?></span> of <?php echo check_plain($total_pages)?>
				</div>
				<?php if ($page < $total_pages) { ?>
					<div class="icon">
						<a href="?page=<?php echo $page+1?><?php if (isset($_GET['tag'])) echo "&tag=" .check_plain($_GET['tag']);?>">
							<img class="next" width="40" height="40" src="<?php echo "$base_path$directory/images/"?>icon-arrow-R-retina.png">
						</a>
					</div>
				<?php } ?>
				
				<?php if ($page > 1) { ?>
					<div class="icon">
						<a href="?page=<?php echo $page-1?><?php if (isset($_GET['tag'])) echo "&tag=" .check_plain($_GET['tag']);?>">
							<img class="prev" width="40" height="40" src="<?php echo "$base_path$directory/images/"?>icon-arrow-L-retina.png">
						</a>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="content">
				<?php
				foreach ($nodes as $node) { 
						$news_url = check_url($base_path.drupal_lookup_path('alias',"node/".$node->nid));
						$news_author_id = user_load($node->uid);
						$news_author = check_plain(trim($news_author_id->name));
						if ($news_author != '') $news_author = $news_author . ' | ';
						$image_url = check_url($node->field_featured_image['und']['0']['uri']);
										if (trim($image_url) != '')
											$news_thumbnail_url = check_url(image_style_url('news_featured_thumbnail', $image_url));
										else 
											$news_thumbnail_url = check_url("$base_path$directory/images/news_placeholder.png");


						
						
						$news_date = check_plain(date('M j, Y', $node->created));
						$news_excerpt = greens_excerpt($node->body['und']['0']['value'], 200);
												
						$node_num++;
				?>
					<div class="row-fluid">
						<div class="span12">
							<div class="photo">
								<a href="<?php echo $news_url?>"><img width="150" height="100" src="<?php echo  $news_thumbnail_url ?>"></a>
							</div>
							<div class="text">
								<h4><a href="<?php echo $news_url?>"><?php print $node->title;?></a></h4>
								<span>
									<?php echo $news_author?>
									<?php echo $news_date?> 
									<?php
									foreach($node->field_news_tag['und'] as $tag) {
										$tag_full = taxonomy_term_load($tag['tid']);
										echo "<a href='/news/political/archive/?tag=" . check_plain($tag_full->name) . "'>" . strtoupper($tag_full->name) . "</a> ";
									}
									?>
								</span>
								
								<p><?php echo $news_excerpt?></p>
							</div>
						</div>
					</div>
				<?php } ?>
	</div>

	<div class="footer row-fluid">
		<div class="span12">
		
		
		<div class="tools">
			<div class="position">
				<span class="counter"><?php echo $page?></span> of <?php echo $total_pages?>
			</div>
			<?php if ($page < $total_pages) { ?>
				<div class="icon">
					<a href="?page=<?php echo $page+1?><?php if (isset($_GET['tag'])) echo "&tag=" .check_plain($_GET['tag']);?>">
						<img class="next" width="40" height="40" src="<?php echo "$base_path$directory/images/"?>icon-arrow-R-retina.png">
					</a>
				</div>
			<?php } ?>
			
			<?php if ($page > 1) { ?>
				<div class="icon">
					<a href="?page=<?php echo $page-1?><?php if (isset($_GET['tag'])) echo "&tag=" .check_plain($_GET['tag']);?>">
						<img class="prev" width="40" height="40" src="<?php echo "$base_path$directory/images/"?>icon-arrow-L-retina.png">
					</a>
				</div>
			<?php } ?>
		</div>
		
		
		</div>
	</div>
</div>


		</div>

		<div id="sidebar" class="span4">
			<div class="row-fluid">
				<?php require_once DRUPAL_ROOT.base_path().path_to_theme().'/templates/sidebar.php';?>
			</div>
		</div>

	</div>
</div>

<?php require_once DRUPAL_ROOT.base_path().path_to_theme().'/templates/footer.php';?>
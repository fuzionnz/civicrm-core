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
							<?php if (trim($image_url) != '') {?>
								<div class="featured-image">
									<img src="<?php print check_url(image_style_url('news_featured_page', $node->field_featured_image['und']['0']['uri']));?>">
								</div>
							<?php } ?>
							<?php print check_markup($node->body['und']['0']['value'],filtered_html);?>
						</div>
					</div>
				</div>
			</div>
				<div class="content">
					<div class="row-fluid">
						<div class="span12">

												<?php 
													$content_type='events';
													$query = new EntityFieldQuery();
													$entities = $query->entityCondition('entity_type', 'node')
													  ->entityCondition('bundle', $content_type)
													  ->propertyCondition('status', 1) // Published
													  ->fieldOrderBy("field_date_range", 'value', 'ASC')
													  ->pager()
													  ->execute();
													
													$nodes = entity_load('node', array_keys($entities['node']));
													$total_results = count($nodes);
													
													$month_num = 24;
													
													$month =array();
													
													foreach ($nodes as $node) { 
												
														$event_url = check_url($base_path.drupal_lookup_path('alias',"node/".$node->nid));
														$date_start = check_plain(strtotime($node->field_date_range['und']['0']['value']));
														$date_end = check_plain(strtotime($node->field_date_range['und']['0']['value2']));
														$event_excerpt = greens_excerpt($node->body['und']['0']['value'], 200);
														$category_node = taxonomy_term_load($node->field_event_category['und']['0']['tid']);
														$category_name = check_plain($category_node->name);
														
														if (date('Y-m-d', $date_start) != date('Y-m-d', $date_end)) $date_box = date('j', $date_start) . ' - ' . date('j', $date_end); else $date_box = date('j', $date_start);
																	
														$month[date('Y', $date_start)][date('n', $date_start)] .= <<<EOP
														<div class="event span12">
															<div class="date">$date_box</div>
															<div class="text">
																<h4><a href="$event_url">$node->title</a></h4>
																<div class="category">$category_name</div>
																<p>$event_excerpt</p>
															</div>
														</div>
EOP;
														
							
													 } ?>
													
												<div id="calendar" class="box events">
													<div class="header row-fluid">
														<div class="span12">
															<div class="icon"><img width="80" height="80" src="<?php echo "$base_path$directory/images/"?>icon-calendar-retina.png"></div>
															<div class="title">EVENT OVERVIEW</div>
															<div class="tools"></div>
														</div>
													</div>
													<div class="content">
													
													<div class="events_area">
															<?php
															for ($i = 0; $i <= $month_num-1; $i++) {
															    $date_calc = strtotime("+$i month", time());
															    $month_content = trim($month[date('Y', $date_calc)][date('n', $date_calc)]);
															   	if ($month_content != '') echo '<div class="row-fluid"><div class="month_name">' . date('F', $date_calc) . ' ' . date('Y', $date_calc) .'</div></div><div id="' . date('FY', $date_calc) . '"class="month-area"><div class="row-fluid">'.$month_content . '</div></div>';
															}?>
													</div>
														
							
													
													
													</div>
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
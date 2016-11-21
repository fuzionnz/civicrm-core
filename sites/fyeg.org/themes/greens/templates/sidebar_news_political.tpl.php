				<?php 
				$content_type='news';
				$taxonomy = reset(taxonomy_get_term_by_name('Political', 'news_type'));
				$taxonomy_id = $taxonomy->tid;
				
				$query = new EntityFieldQuery();
				$entities = $query->entityCondition('entity_type', 'node')
				  ->entityCondition('bundle', $content_type)
				  ->propertyCondition('status', 1) // Published
				  ->propertyOrderBy('created', 'DESC')
				  ->fieldCondition('field_news_type', 'tid', $taxonomy_id)
					->range(0, 15)
				  ->execute();
				
				$nodes = entity_load('node', array_keys($entities['node']));
				$node_num=0;
				$total_results = count($nodes);
				
				$total_pages  = intval($total_results/3);
				if (($total_results % 3) != 0) $total_pages++;
				
				?>
				
				<div id="political-news" class="box">
					<div class="header row-fluid">
						<div class="span12">
							<div class="icon"><img width="80" height="80" src="<?php echo check_url("$base_path$directory/images/")?>icon-news-retina.png"></div>
							<div class="title">POLITICAL NEWS</div>
						</div>
					</div>
					<div class="content">
						<div class="swiper-container">
							<div class="swiper-wrapper">
								<div class="swiper-slide">
								<?php
								foreach ($nodes as $node) { 
										$news_url = check_url($base_path.drupal_lookup_path('alias',"node/".$node->nid));
										$news_author_id = user_load($node->uid);
										$news_author = check_plain(trim($news_author_id->name));
										if ($news_author != '') $news_author = $news_author . ' | ';
										$news_date = check_plain(date('M j, Y', $node->created));
										$news_excerpt = greens_excerpt($node->body['und']['0']['value'], 200);
										$node_num++;
								?>
									<div class="row-fluid">
										<div class="span12">
											<div class="text">
												<h4><a href="<?php echo $news_url?>"><?php print check_plain($node->title);?></a></h4>
												<span><?php /*echo $news_author */?><?php echo $news_date?>
												</span>
												<p><?php echo $news_excerpt?></p>
											</div>
										</div>
									</div>
									<?php if (($node_num % 3 == 0) AND ($node_num != $total_results)) { ?></div><div class="swiper-slide"><?php } ?>
								<?php } ?>
								</div>
							</div>
						</div>
					</div>

					<div class="footer row-fluid">
					</div>
					<div class="tools">
						<div class="position">
							<span class="counter">1</span> of <?php echo $total_pages?>
						</div>
						<div class="icon">
							<img class="next" width="40" height="40" src="<?php echo "$base_path$directory/images/"?>icon-arrow-R-retina.png">
						</div>
						<div class="icon">
							<img class="prev" width="40" height="40" src="<?php echo "$base_path$directory/images/"?>icon-arrow-L-retina.png">
						</div>
					</div>
					
					
					
				</div>

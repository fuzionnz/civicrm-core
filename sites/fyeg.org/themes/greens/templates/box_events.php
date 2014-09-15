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
						
						<div class="row-fluid">
							<div class="span12">
								<div class="tools">
									<div class="arrows">
										<div class="icon">
											<img class="next" width="40" height="40" src="<?php echo "$base_path$directory/images/"?>icon-arrow-R-retina.png">
										</div>
										<div class="icon">
											<img class="prev" width="40" height="40" src="<?php echo "$base_path$directory/images/"?>icon-arrow-L-retina.png">
										</div>
									</div>
									<div class="months">
										<div class="swiper-wrapper"> 
										<?php
										for ($i = 0; $i <= $month_num-1; $i++) {
										    $date_calc = strtotime("+$i month", time());
											echo "<div class='month swiper-no-swiping'>" . date('F', $date_calc) . "</div>";
										}?>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="events-container">
							<div class="swiper-wrapper">
								<?php
								for ($i = 0; $i <= $month_num-1; $i++) {
								    $date_calc = strtotime("+$i month", time());
								    $month_content = trim($month[date('Y', $date_calc)][date('n', $date_calc)]);
								   	echo '<div id="' . date('FY', $date_calc) . '"class="month-content swiper-no-swiping"><div class="row-fluid">';
									    if ($month_content == '') echo "
									    	<div class='event span12'>
									    		<div class='date'></div>
									    		<div class='text'>
									    			<h4></h4>
									    			<div class='category'></div>
									    			<p>No events for this month</p>
									    		</div>
									    	</div>"; else echo $month_content;
								    echo '</div></div>';
								}?>
							</div>
						</div>
							

						
						
						</div>
						<div class="footer row-fluid">
							<div class="span12">
								<a href="/calendar"><div class="button">Check out our <strong>Calendar!</strong></div></a>
							</div>
						</div>	
					</div>
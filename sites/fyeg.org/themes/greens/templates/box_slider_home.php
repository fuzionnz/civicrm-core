			<?php 
			$content_type=array('news','slides');
			$query = new EntityFieldQuery();
			$entities = $query->entityCondition('entity_type', 'node')
			  ->entityCondition('bundle', $content_type)
			  ->propertyCondition('status', 1) // Published
			  ->propertyOrderBy('created', 'DESC')
			  ->propertyCondition('promote', 1) // Promoted to front page
			  ->fieldCondition('field_featured_image', 'fid', 'NULL', '!=')
			  ->execute();
			$nodes = entity_load('node', array_keys($entities['node']));
			$total_results = count($nodes);
			?>
			<div id="span-slider" class="span8">
				<div id="slider-main" class="row-fluid">

					<div class="swiper-container">
						<div class="swiper-wrapper">
							<?php foreach ($nodes as $node) {
								$field_url = trim($node->field_url['und']['0']['value']);
								if ($field_url != '')			
									$slide_url = check_url($field_url);
								else
									$slide_url = check_url($base_path.drupal_lookup_path('alias',"node/".$node->nid));
							?>
							<div class="swiper-slide">
								<div class="span12">
									<div class="slide">
									<a href="<?php echo $slide_url?>"><img class="thumb-image" src="<?php echo check_plain(image_style_url('slider_main', $node->field_featured_image['und']['0']['uri']))?>"></a>
									</div>
								</div>
								<div class="info row-fluid">
									<div class="span12">
										<div class="text">
											<h4><a href="<?php echo $slide_url?>"><?php print $node->title;?></a></h4>
											<?php if (user_access("administer nodes")) { echo '<div class="admin_tools"><a href="#overlay=node/' . $node->nid .'/edit">Edit</a></div>';}?>
											<p><?php echo greens_excerpt($node->body['und']['0']['value'], 200);?></p>
										</div>
									</div>	
								</div>					
							</div>
							<?php } ?>
						</div>
					</div>
					<div class="controls">
						<a href="#" class="icon prev">
							<img width="40" height="40" src="<?php echo "$base_path$directory/images/"?>icon-arrow-L-retina.png">
						</a>
						<a href="#" class="icon next">
							<img width="40" height="40" src="<?php echo "$base_path$directory/images/"?>icon-arrow-R-retina.png">
						</a>
						<div class="position">
							<span class="counter">1</span> of <?php echo $total_results?>
						</div>
					</div>
				</div>
			</div>
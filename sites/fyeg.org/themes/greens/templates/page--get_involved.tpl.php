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
							<?php require_once DRUPAL_ROOT.base_path().path_to_theme().'/templates/box_content.php';?>
						</div>
					</div>
				</div>
			</div>


			<div class="row-fluid">
				<div class="span6">
					<div class="box launch-box">
					<a href="/who-we-are/member-organizations">
						<div class="content">
						<?php $block_id=11;$block = _block_render_blocks(array(block_load("block", $block_id)));?>
							<div class="header row-fluid">
								<div class="span12">
									<div class="title"><?php echo check_plain($block['block_'.$block_id]->title); ?></div>
									<?php echo check_markup(check_markup($block['block_'.$block_id]->content['#markup'],filtered_html),filtered_html);?>
								</div>
								<?php require DRUPAL_ROOT.base_path().path_to_theme().'/templates/tool_edit_box.php';?>
							</div>
						</div>
					</a>
					</div>
				</div>
				<div class="span6">
					<div class="box launch-box">
					<a href="/get-involved/mailing-lists">
					<div class="content">
						<?php $block_id=12;$block = _block_render_blocks(array(block_load("block", $block_id)));?>
							<div class="header row-fluid">
								<div class="span12">
									<div class="title"><?php echo check_plain($block['block_'.$block_id]->title); ?></div>
									<?php echo check_markup(check_markup($block['block_'.$block_id]->content['#markup'],filtered_html),filtered_html);?>
								</div>
								<?php require DRUPAL_ROOT.base_path().path_to_theme().'/templates/tool_edit_box.php';?>
							</div>
						</div>
					</div>
					</a>
				</div>
			</div>

			<div class="row-fluid">
				<div class="span6">
					<div class="box launch-box">
					<a href="/who-we-are/working-groups">
					<div class="content">
						<?php $block_id=13;$block = _block_render_blocks(array(block_load("block", $block_id)));?>
							<div class="header row-fluid">
								<div class="span12">
									<div class="title"><?php echo check_plain($block['block_'.$block_id]->title); ?></div>
									<?php echo check_markup(check_markup($block['block_'.$block_id]->content['#markup'],filtered_html),filtered_html);?>
								</div>
								<?php require DRUPAL_ROOT.base_path().path_to_theme().'/templates/tool_edit_box.php';?>
							</div>
						</div>
					</div>
					</a>
				</div>
				<div class="span6">
					<div class="box launch-box">
					<a href="http://www.ecosprinter.eu">
					<div class="content">
						<?php $block_id=14;$block = _block_render_blocks(array(block_load("block", $block_id)));?>
							<div class="header row-fluid">
								<div class="span12">
									<div class="title"><?php echo check_plain($block['block_'.$block_id]->title); ?></div>
									<?php echo check_markup(check_markup($block['block_'.$block_id]->content['#markup'],filtered_html),filtered_html);?>
								</div>
								<?php require DRUPAL_ROOT.base_path().path_to_theme().'/templates/tool_edit_box.php';?>
							</div>
						</div>
					</div>
					</a>
				</div>
			</div>
						
			
			<div class="row-fluid">
				<?php require_once DRUPAL_ROOT.base_path().path_to_theme().'/templates/box_events.php';?>
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
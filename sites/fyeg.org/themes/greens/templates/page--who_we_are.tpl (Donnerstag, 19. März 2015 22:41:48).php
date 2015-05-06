<?php require_once DRUPAL_ROOT.base_path().path_to_theme().'/templates/header.php';?>
<?php drupal_add_css(drupal_get_path('theme', 'greens') . "/css/internal.css"); ?>
<div class="internal who-we-are">
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
				<div class="span6">
					<div class="box launch-box">
						<a href="/who-we-are/member-organizations">
							<div class="content">
								<div class="header row-fluid">
									<div class="span12">
									<?php $block_id=4;$block = _block_render_blocks(array(block_load("block", $block_id)));?>
										<div class="title"><?php echo check_plain($block['block_'.$block_id]->title); ?></div>
										<p><?php echo check_markup($block['block_'.$block_id]->content['#markup'],filtered_html);?></p>
										
									</div>
									<?php require DRUPAL_ROOT.base_path().path_to_theme().'/templates/tool_edit_box.php';?>
								</div>
							</div>
						</a>
					</div>
				</div>
				<div class="span6">
					<div class="box launch-box">
						<a href="/who-we-are/general-assemblies">
							<div class="content">
								<div class="header row-fluid">
									<div class="span12">
									<?php $block_id=5;$block = _block_render_blocks(array(block_load("block", $block_id)));?>
										<div class="title"><?php echo check_plain($block['block_'.$block_id]->title); ?></div>
										<p><?php echo check_markup($block['block_'.$block_id]->content['#markup'],filtered_html);?></p>
										
									</div>
									<?php require DRUPAL_ROOT.base_path().path_to_theme().'/templates/tool_edit_box.php';?>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>


			<div class="row-fluid">
				<div class="span6">
					<div class="box launch-box">
						<a href="/who-we-are/executive-committee">
								<div class="content">
								<div class="header row-fluid">
									<div class="span12">
									<?php $block_id=6;$block = _block_render_blocks(array(block_load("block", $block_id)));?>
										<div class="title"><?php echo check_plain($block['block_'.$block_id]->title); ?></div>
										<p><?php echo check_markup($block['block_'.$block_id]->content['#markup'],filtered_html);?></p>
										
									</div>
									<?php require DRUPAL_ROOT.base_path().path_to_theme().'/templates/tool_edit_box.php';?>
								</div>
							</div>
						</a>
					</div>
				</div>
				<div class="span6">
					<div class="box launch-box">
						<a href="/who-we-are/working-groups">
							<div class="content">
								<div class="header row-fluid">
									<div class="span12">
									<?php $block_id=7;$block = _block_render_blocks(array(block_load("block", $block_id)));?>
										<div class="title"><?php echo check_plain($block['block_'.$block_id]->title); ?></div>
										<p><?php echo check_markup($block['block_'.$block_id]->content['#markup'],filtered_html);?></p>
										
									</div>
									<?php require DRUPAL_ROOT.base_path().path_to_theme().'/templates/tool_edit_box.php';?>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
			
			
			<div class="row-fluid">
				<div class="span6">
					<div class="box launch-box">
						<a href="/who-we-are/office">
							<div class="content">
								<div class="header row-fluid">
									<div class="span12">
									<?php $block_id=8;$block = _block_render_blocks(array(block_load("block", $block_id)));?>
										<div class="title"><?php echo check_plain($block['block_'.$block_id]->title); ?></div>
										<p><?php echo check_markup($block['block_'.$block_id]->content['#markup'],filtered_html);?></p>
										
									</div>
									<?php require DRUPAL_ROOT.base_path().path_to_theme().'/templates/tool_edit_box.php';?>
								</div>
							</div>
						</a>
					</div>
				</div>
				<div class="span6">
					<div class="box launch-box">
						<a href="/who-we-are/structures">
							<div class="content">
								<div class="header row-fluid">
									<div class="span12">
									<?php $block_id=9;$block = _block_render_blocks(array(block_load("block", $block_id)));?>
										<div class="title"><?php echo check_plain($block['block_'.$block_id]->title); ?></div>
										<p><?php echo check_markup($block['block_'.$block_id]->content['#markup'],filtered_html);?></p>
										
									</div>
									<?php require DRUPAL_ROOT.base_path().path_to_theme().'/templates/tool_edit_box.php';?>
								</div>
							</div>
						</a>
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
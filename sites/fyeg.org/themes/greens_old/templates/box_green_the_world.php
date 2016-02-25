						<div id="green-box">
							<div class="header row-fluid">
								<img width="80" height="80" src="<?php echo "$base_path$directory/images/"?>icon-getinvolved-retina.png">
							</div>
							<div class="content row-fluid">
							<?php $block_id=1;$block = _block_render_blocks(array(block_load("block", $block_id)));?>
								<h3><?php echo $block['block_'.$block_id]->title; ?></h3>
								<?php echo $block['block_'.$block_id]->content['#markup'];?>
							</div>
							<center><?php require DRUPAL_ROOT.base_path().path_to_theme().'/templates/tool_edit_box.php';?></center>
							<div class="footer row-fluid">
								<a href="/get-involved"><div id="button">GET INVOLVED!</div></a>
							</div>
						</div>
						
<div id="push"></div>

</div> <!--content-->

</div> <!--wrap-->

<div id="footer">
	<div id="footer" class="container">
		<div class="row-fluid">	
			
				<div id="partners" class="box">
					<div class="header row-fluid">
						<div class="span12">
							<div class="icon"><img width="80" height="80" src="<?php echo "$base_path$directory/images/"?>icon-partners-retina.png"></div>
							<div class="title">PARTNERS</div>
							<div class="tools"></div>
						</div>
					</div>
					<div class="content row-fluid">
						<div class="span12">

							<?php 
							$content_type='partner_logos';
							$query = new EntityFieldQuery();
							$entities = $query->entityCondition('entity_type', 'node')
							  ->entityCondition('bundle', $content_type)
							  ->propertyCondition('status', 1) // Published
							  ->propertyCondition('promote', 1) // Promoted to front page
							  ->execute();
							$nodes = entity_load('node', array_keys($entities['node']));
							$total_results = count($nodes);
							?>
							
							<?php foreach ($nodes as $node) {
								$partner_url = check_url($node->field_partner_url['und']['0']['value']); ?>
								
								<a target_"blank" title="<?php print check_plain($node->title);?>" href="<?php echo $partner_url?>"><img src="<?php echo check_url(image_style_url('partner_logo', $node->field_partner_logo_image['und']['0']['uri'])) ?>"></a>
								
							<?php } ?>

						</div>
					</div>
					<div class="footer row-fluid">
						<div class="span12">
						</div>
					</div>
				</div>
		</div>
	
		<div class="row-fluid">	
			<div class="span6">
				<div class="box">
					<div class="header row-fluid">
						<div class="span12">
							<div class="icon"><img width="80" height="80" src="<?php echo "$base_path$directory/images/"?>icon-ecosprinter-retina.png"></div>
							<div class="title">ECOSPRINTER</div>
						</div>
					</div>
					<div class="content row-fluid">
					<?php $block_id=2;$block = _block_render_blocks(array(block_load("block", $block_id)));?>
						<div class="span12">
							<h4><?php echo check_plain($block['block_'.$block_id]->title); ?></h4>
							<?php require DRUPAL_ROOT.base_path().path_to_theme().'/templates/tool_edit_box.php';?>
							<?php echo check_markup($block['block_'.$block_id]->content['#markup'],filtered_html);?>
						</div>
					</div>
					<div class="footer row-fluid">
						<div class="span12">
							<div target="_blank" class="button"><a title="Ecosprinter" href="http://www.ecosprinter.eu">READ!</a></div>
						</div>
						
					</div>					
				</div>
			</div>
			<div class="span6">
				<div class="box">
					<div class="header row-fluid">
						<div class="span12">
							<div class="icon"><img width="80" height="80" src="<?php echo "$base_path$directory/images/"?>icon-donation-retina.png"></div>
							<div class="title">DONATION</div>
						</div>
					</div>
					<div class="content row-fluid">
					<?php $block_id=3;$block = _block_render_blocks(array(block_load("block", $block_id)));?>
						<div class="span12">
							<h4><?php echo check_plain($block['block_'.$block_id]->title); ?></h4>
							<?php require DRUPAL_ROOT.base_path().path_to_theme().'/templates/tool_edit_box.php';?>
							<?php echo check_markup($block['block_'.$block_id]->content['#markup'],filtered_html);?>
							<a href="/donation-policy">Donation Policy</a>
						</div>
						
					</div>
					<div class="footer row-fluid">
						<div class="span12">
							<div class="button"><a href="/donation">SUPPORT US</a></div>
							<div class="icon"><img src="<?php echo "$base_path$directory/images/"?>icon-paypal-retina.png"></div>							
						</div>
					</div>	
				</div>
			</div>
		</div>

		<div id ="credits" class="row-fluid">	
			<div id="copyright" class="span7">
				<div class="dark" >Copyright &copy; 2013 FYEG - Federation of Young European Greens. All rights reserved.</div>
			</div>			
			
			<div class="span5">
				<div id="latte" class="span4">
					<a href="http://www.lattecreative.com/"><div class="dark"><img src="<?php echo "$base_path$directory/images/"?>lattecreative_white.png"></div></a>
				</div>
					
				<div id="sitemap" class="span4">
					<a href="/sitemap"><div class="dark">SITE MAP</div></a>
				</div>
				<div id="privacy" class="span4">
					<a href="/privacy"><div class="dark">PRIVACY</div></a>
				</div>
			</div>

		
		</div>

		
		
	</div>




<!-- social -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/it_IT/all.js#xfbml=1&appId=605533082800442";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
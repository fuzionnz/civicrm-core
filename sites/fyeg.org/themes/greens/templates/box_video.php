<?php
$channel_name   =   'FYEG';
$count          =   12;
$first = true;
$api_v2 = "http://gdata.youtube.com/feeds/api/users/$channel_name/uploads?max-results=$count&v=2";
$thumbs='';
foreach (json_decode(file_get_contents("$api_v2&alt=json"))->feed->entry as $entry) {
	$video_id = $entry->{'media$group'}->{'yt$videoid'}->{'$t'};
	if ($first == true) {$first_video = "http://www.youtube.com/embed/$video_id";$first = false;}
	  $title = $entry->title->{'$t'};
	  $description = $entry->{'media$group'}->{'media$description'}->{'$t'};
	  $thumbnails = $entry->{'media$group'}->{'media$thumbnail'};
	  $thumb_img = $thumbnails[1];

	$thumbs.="<a class='thumb swiper-no-swiping' href='#' onClick=\"document.getElementById('ivideo').src = '" . "http://www.youtube.com/embed/$video_id" . "'; return false;\"><img src='$thumb_img->url'></a>";
}?>


				<div class="box video">
					<div class="header row-fluid">
						<div class="span12">
							<div class="icon"><img width="80" height="80" src="<?php echo "$base_path$directory/images/"?>icon-video-retina.png"></div>
							<div class="title">LATEST VIDEO</div>
							<div class="tools"></div>
						</div>
					</div>
					<div class="content">


						<div class="row-fluid">
							<iframe id="ivideo" src="<?php echo $first_video?>" frameborder="0" allowfullscreen></iframe>
							
						</div>

						<div class="row-fluid">
							<div class="scroller span12">
								<div class="arrow">
									<img class="prev" width="40" height="40" src="<?php echo "$base_path$directory/images/"?>icon-arrow-L-retina.png">
								</div>
								<div class="thumb-container">
									<div class="swiper-wrapper">
										
										<?php echo $thumbs?>
										
									</div>
								</div>
								<div class="arrow">
									<img class="next" width="40" height="40" src="<?php echo "$base_path$directory/images/"?>icon-arrow-R-retina.png">
								</div>
							</div>
						</div>

					</div>
					<div class="footer row-fluid">
						<div class="span12">
						</div>
					</div>
				</div>
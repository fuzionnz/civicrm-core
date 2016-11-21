<?php require_once DRUPAL_ROOT.base_path().path_to_theme().'/templates/header.php';?>
<?php drupal_add_css(drupal_get_path('theme', 'greens') . "/css/internal.css"); ?>


<script language="javascript" src="<?php echo "$base_path$directory/js/"?>jquery.rwdImageMaps.min.js"></script>
<script language="javascript" src="<?php echo "$base_path$directory/js/"?>jquery.qtip.js"></script>
<script language="javascript" src="<?php echo "$base_path$directory/js/"?>map.js"></script>


<div class="internal who-we-are subpage">
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
			
			
			<map name="map_data">
			
				<area shape="poly" coords="521,625,535,635,525,654,509,646,512,631," href="#" alt="GAJ" />
				<area shape="poly" coords="358,539,371,553,367,567,350,568,345,553," href="#" alt="Flemish" />
				<area shape="poly" coords="627,821,640,829,635,844,618,844,617,832," href="#" alt="Iliosporoi" />
				<area shape="poly" coords="238,731,253,740,252,758,234,760,227,744," href="#" alt="Catalonia" />
				<area shape="poly" coords="453,663,464,671,466,687,458,695,443,695,437,682,443,668," href="#" alt="South-Tyrol" />
			
			
				<area shape="poly" coords="437,769,392,791,374,795,372,809,376,815,371,834,385,837,394,835,399,810,400,799,444,776,494,816,509,830,517,855,503,867,465,870,451,867,446,875,471,890,486,906,501,898,503,879,515,875,528,865,538,855,538,840,531,838,538,818,559,833,567,822,556,812,520,793,525,785,502,782,485,760,482,744,473,735,464,730,462,711,463,696,485,692,487,677,472,670,458,659,437,660,409,670,399,671,392,663,370,671,367,691,363,711,377,724,393,715,414,718,426,755," href="#" alt="Italy" />	
				
				<area shape="poly" coords="588,803,588,822,601,836,620,812,607,792,609,777,596,770,590,773,590,792," href="#" />
				
				<area shape="poly" coords="262,730,274,736,271,743,261,749,257,745,256,737,258,732" href="#" alt="Andorra" />
				
				<area shape="poly" coords="478,630,515,617,546,628,545,649,530,674,513,675,501,681,470,674,456,662,436,661,418,649,425,644,435,647,442,642,450,648,468,647,480,648," href="#" alt="Austria" />
				
				<area shape="poly" coords="1120,695,1138,711,1153,713,1144,723,1146,769,1126,768,1120,746,1100,769,1074,754,1065,737,1056,723,1081,721,1071,707,1095,711,1110,694," href="#" alt="Azerbaijan" />
				
				<area shape="poly" coords="709,439,750,442,761,471,794,490,777,503,772,505,783,531,767,529,760,538,763,553,752,549,685,542,670,544,659,551,651,547,650,535,659,530,658,517,651,496,676,487,679,474,699,461,690,461,695,453,703,454," href="#" alt="Belarus" />
				
				<area shape="poly" coords="326,541,333,536,349,542,366,539,377,550,376,564,367,578,369,587,351,572,342,572,346,561,334,555," href="#" alt="Belgium"/>
				
				<area shape="poly" coords="515,706,571,713,583,715,578,726,587,738,580,738,587,747,569,764,571,775,537,749,521,724," href="#" alt="Bosnia" />
				
				<area shape="poly" coords="641,728,648,736,691,742,711,726,748,732,749,738,740,739,736,764,746,774,741,778,725,777,713,787,711,792,677,793,667,798,651,795,648,784,638,774,646,751,636,736," href="#" alt="Bulgaria" />
				
				<area shape="poly" coords="509,696,533,670,541,674,543,681,558,694,568,695,576,709,571,716,554,709,519,704,535,746,513,734,513,727,506,725,509,712,498,702,492,714,486,701,497,693," href="#" alt="Croatia"  />
				
				<area shape="poly" coords="843,921,853,912,857,906,870,904,885,896,879,906,865,925,855,924," href="#" alt="Cyprus" title="Cyprus"   />
				
				<area shape="poly" coords="471,580,481,582,510,566,519,567,539,582,546,590,553,587,574,601,560,611,546,618,541,628,520,620,508,625,483,610,476,596," href="#" alt="Czech-Republic" />
				
				<area shape="poly" coords="648,241,623,162,601,141,609,136,630,151,646,146,650,123,660,116,676,128,671,150,686,169,694,199,712,255,705,256,733,276,695,338,675,341,636,357,631,343,611,339,613,308,609,289,635,262," href="#" alt="Finland" />
				
				<area shape="poly" coords="317,538,399,606,384,643,359,662,369,658,370,687,359,693,372,724,342,739,312,719,291,727,287,742,270,742,272,733,204,699,231,653,233,633,223,617,231,607,194,578,202,566,251,577,251,556,290,571,308,555,309,541," href="#" alt="France" />
				
				<area shape="poly" coords="963,693,1006,698,1024,705,1052,698,1084,720,1059,722,1023,742,1010,738,990,741,993,732,978,711,950,703," href="#" alt="Georgia" />
				
				<area shape="poly" coords="404,532,405,496,422,495,426,504,438,489,432,481,438,469,450,475,452,481,469,487,468,495,494,488,511,510,513,571,472,580,496,624,481,634,481,654,469,647,429,648,405,640,387,639,396,606,378,594,373,562,387,535," href="#" alt="Germany"  />
				
				<area shape="poly" coords="618,806,717,781,712,806,672,807,682,823,662,828,651,814,661,844,686,870,659,891,664,909,629,906,623,887,620,874,653,871,614,863,612,855,600,841,602,829,612,825," href="#" alt="Greece"  />
				
				<area shape="poly" coords="547,642,573,647,604,628,643,636,630,651,623,669,606,688,570,697,559,695,537,677,533,668,542,648," href="#" alt="Hungary"  />
				
				<area shape="poly" coords="164,429,173,411,188,418,197,412,193,409,221,401,211,420,223,433,205,475,160,474,143,464,143,454,165,444,175,438," href="#" alt="Ireland" />
				
			
				
				<area shape="poly" coords="367,573,376,571,381,584,374,591,365,583," href="#" alt="Luxembourg" />
				
				<area shape="poly" coords="487,906,529,955,492,978,454,959,452,914," href="#" alt="Malta" />
				
				<area shape="poly" coords="358,525,372,504,404,493,408,510,406,538,383,538,378,551,365,544,348,539,349,531," href="#" alt="Netherlands" />
				
				<area shape="poly" coords="418,292,507,242,558,166,641,89,689,98,689,127,675,146,648,125,640,156,602,148,564,191,533,263,513,286,511,350,478,383,435,395,413,377,408,335," href="#" alt="Norway" />
				
				<area shape="poly" coords="515,500,634,468,661,523,664,576,640,616,579,606,518,569,510,512," href="#" alt="Poland" />
				
				<area shape="poly" coords="23,793,37,743,75,686,119,707,81,771,58,808," href="#" alt="Portugal" />
				
				<area shape="poly" coords="638,630,706,621,741,659,741,687,767,696,749,733,711,733,689,744,642,738,604,687," href="#" alt="Romania" />
				
				<area shape="poly" coords="694,118,822,144,818,122,853,86,909,81,961,19,1017,54,1008,134,1085,268,1093,326,1117,320,1172,389,1209,396,1212,406,1137,456,1062,467,1036,534,1042,558,1080,587,1059,647,1111,701,1102,716,1048,700,960,698,890,678,894,619,918,560,847,559,808,524,776,525,768,508,786,494,747,450,712,439,703,358,716,347,697,334,724,277,702,256,679,170,667,153,679,126," href="#" alt="Russia" />
				
				<area shape="poly" coords="570,688,607,680,623,714,643,714,643,778,618,780,610,758,601,767,579,753,573,717,568,697," href="#" alt="Serbia" />
				
				<area shape="poly" coords="540,621,573,596,624,602,644,615,633,633,604,629,573,650,545,641," href="#" alt="Slovakia" />
				
				<area shape="poly" coords="484,683,485,674,533,671,513,699,487,696," href="#" alt="Slovenia" />
				
				<area shape="poly" coords="109,706,71,688,75,654,112,657,256,725,260,742,288,739,286,754,242,765,210,791,211,813,185,837,166,839,155,846,107,840,81,842,73,833,73,812,59,802,62,790,68,781,90,743," href="#" alt="Spain" />
				
				<area shape="poly" coords="505,288,504,268,530,259,526,245,560,176,599,147,626,162,642,222,623,221,609,258,589,286,566,299,565,336,586,363,574,381,557,395,546,450,523,448,516,466,497,463,486,398,486,369,504,347,507,316," href="#" alt="Sweden" />
				
				<area shape="poly" coords="353,657,374,636,416,636,423,649,436,659,420,673,401,680,393,673,372,676,360,667," href="#" alt="Switzerland" />
				
				<area shape="poly" coords="722,774,776,788,837,754,872,748,928,761,984,738,1016,731,1036,754,1050,759,1047,780,1066,827,1059,833,1044,830,985,853,924,869,915,888,900,876,888,872,855,898,817,885,815,903,782,903,743,876,728,858,717,826,718,795," href="#" alt="Turkey" />
				
				<area shape="poly" coords="756,544,763,530,812,517,824,534,864,551,925,559,917,579,926,598,852,660,887,674,835,709,805,672,785,662,776,671,741,631,723,625,654,640,625,625,639,589,655,574,649,552,672,537,718,543," href="#" alt="Ukraine" />
				
				<area shape="poly" coords="232,445,195,419,215,403,240,419,266,427,299,408,308,441,313,486,328,496,311,523,311,537,284,540,233,532,195,529,225,507,214,488,237,466," href="#" alt="UK-England-Wales" />
				
				<area shape="poly" coords="250,392,247,337,297,337,342,305,350,314,285,364,317,371,294,403,298,422,277,435,241,430,250,410,259,403," href="#" alt="UK-Scotland" />
				
				
				
				
			</map>
				<div class="box">
					<div id="map">
							<img id="all" width="1240" height="990" usemap="#map_data" src="<?php echo "$base_path$directory/images/"?>map/_map.png"/>
					</div>
				</div>
			
			
			
		<div class="row-fluid">
				
			<div class="row-fluid">	
			<?php 
				$content_type='member_organizations';
				
				$query = new EntityFieldQuery();
				
				if (isset($_GET['country'])) {
					
					$taxonomy = reset(taxonomy_get_term_by_name($_GET['country'], 'member_country'));
					$taxonomy_id = $taxonomy->tid;
					
					$entities = $query->entityCondition('entity_type', 'node')
					->entityCondition('bundle', $content_type)
					->propertyCondition('status', 1) // Published
					->propertyOrderBy('title', 'ASC')
					->fieldCondition('field_member_country', 'tid', $taxonomy_id)
					->execute();
				 } else {
				 	$entities = $query->entityCondition('entity_type', 'node')
				 	->entityCondition('bundle', $content_type)
				 	->propertyCondition('status', 1) // Published
				 	->propertyOrderBy('title', 'ASC')
				 	->execute();
				 }	
				
				$nodes = entity_load('node', array_keys($entities['node']));
				$total_results = count($nodes);
				
				$node_num=0;
				$total_results = count($nodes);
				
				?>
				
				<?php
				foreach ($nodes as $node) {
					$country_node = taxonomy_term_load($node->field_member_country['und']['0']['tid']);
					$country_name = check_plain($country_node->name);
					$country_tid = $country_node->tid;
					
					$membership_node = taxonomy_term_load($node->field_member_type['und']['0']['tid']);
					$membership_name = check_plain($membership_node->name);
					
					$image_url = check_url($node->field_member_logo['und']['0']['uri']);
					$image = image_style_url('member_logo', $image_url);
					$node_num++;
					
				?>

			
				<div class="span6">
					<div class="box members-box">
						<div class="content">
							<div class="header row-fluid">
								<div class="span12">
									<div class="member-thumbnail">
										<img src="<?php echo $image?>">
									</div>
									<div class="title"><?php echo $node->title;?></div>
									<p><?php echo $country_name?> - <?php echo $membership_name;?></p>
									<p><?php echo check_markup($node->body['und']['0']['value'],filtered_html)?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			
			
				<?php if (($node_num % 2) == 0) {?>
				</div><div class="row-fluid">
				<?php } ?>
			
			<?php } ?>
			</div>
			</div>
			
		</div>

		<div id="sidebar" class="span4">
			<div class="row-fluid">
				<?php require_once DRUPAL_ROOT.base_path().path_to_theme().'/templates/box_who_we_are.php';?>
				<?php require_once DRUPAL_ROOT.base_path().path_to_theme().'/templates/sidebar.php';?>
			</div>
		</div>

	</div>
</div>

<?php require_once DRUPAL_ROOT.base_path().path_to_theme().'/templates/footer.php';?>

<div id="top">
	<div class="container">
		<div class="row-fluid">

			  <div class="span4">			  
				  <div id="social" class="visible-phone visible-tablet">
				  	  <ul>
				  	  	<li><a href="#"><img src="<?php echo "$base_path$directory/images/"?>icon-social-fb.png"></a></li>
				  	  	<li><a href="#"><img src="<?php echo "$base_path$directory/images/"?>icon-social-twitter.png"></a></li>
				  	  	<li><a href="#"><img src="<?php echo "$base_path$directory/images/"?>icon-social-youtube.png"></a></li>
				  	  </ul>
				  </div>
				</div>
				<div class="span8">
				  <div id="buttons">
					  <ul>
					  	<li id="contact">Quick Contact</li>
					  	<li id="search">
					  		<img class="off" src="<?php echo "$base_path$directory/images/"?>icon-search-retina.png">
					  		<img class="on" src="<?php echo "$base_path$directory/images/"?>icon-search-hover-retina.png">
					  	</li>
					  </ul>
				  </div>

			  </div>
		  </div>
		

	</div>

		<div id="tools">
			<div class="container">
		
				<div id="forum" class="row-fluid">
					<div class="span12">
						<form action="">
							<div class="tool-item">
								<input type="text" placeholder="username" />
								<input type="password" placeholder="password" />
							</div>
							<div class="tool-item">
								<input type="submit" value="LOG IN" />
								<div class="signup"><a href="#">SIGN UP!</a></div>
							</div>
						</form>
					</div>
				</div>	
				<div id="contact" class="row-fluid">
					<div class="span12">
						<div class="tool-item">
							<div class="green-btn ico"><img src="<?php echo "$base_path$directory/images/"?>icon-contact-phone-retina.png" width="45" height="35"></div>
							<div class="green-btn">+32 (0) 2 62 60 72 7</div>
						</div>
					  	<div class="tool-item">
						  	<div class="green-btn ico"><img src="<?php echo "$base_path$directory/images/"?>icon-contact-mobile-retina.png" width="45" height="35"></div>
						  	<div class="green-btn">+32 (0) 4 95 12 96 01</div>
						</div>
						<div class="tool-item">
						  	<div class="green-btn ico"><img src="<?php echo "$base_path$directory/images/"?>icon-contact-mail-retina.png" width="45" height="35"></div>
						  	<div class="green-btn"><a href="mailto:office@fyeg.org">office@fyeg.org</a></div>
						</div>
						<div class="tool-item">
						  	<div class="green-btn ico"><img src="<?php echo "$base_path$directory/images/"?>icon-contact-location-retina.png" width="45" height="35"></div>
						  	<div class="green-btn address"><span>31 Rue Wiertz <br> B-1050 Brusselles Belgium</span></div>
						</div>
					</div>
				</div>	
				<div id="search" class="row-fluid">
					<div class="span12">
					<?php
						$block = module_invoke('search', 'block_view', 'search');
						print render($block);
					?>
					</div>
				</div>
			</div>
		</div>


</div>

<div id="branding">
	<div class="container">
		<div class="row-fluid">
			<div class="span12">
				<div id="logo">
					<a title="Home" href="/"><img src="<?php echo "$base_path$directory/images/"?>logo-retina.png" width="290" height="280"></a>
				</div>	 
				 <div id="tagline">
				 	<a title="Home" href="/">FEDERATION OF<br>
				 	<strong>YOUNG EUROPEAN GREENS</strong></a>
				 </div>
				 <div id="social" class="hidden-phone hidden-tablet">
					  <ul>
					  	<li><a title="Facebook" href="http://www.facebook.com/federationofyoungeuropeangreens"><img src="<?php echo "$base_path$directory/images/"?>icon-social-fb.png"></a></li>
					  	<li><a title="Twitter" href="http://www.twitter.com/FYEG"><img src="<?php echo "$base_path$directory/images/"?>icon-social-twitter.png"></a></li>
					  	<li><a title="YouTube" href="http://www.youtube.com/user/FYEG"><img src="<?php echo "$base_path$directory/images/"?>icon-social-youtube.png"></a></li>
					  </ul>
  				 </div>
				  
			</div>
		</div>
	</div>
</div>


			  
<div class="menu container">
	<div class="row-fluid">		  
		<div class="navbar">
			<div class="navbar-inner">

				<div class="span12">
					
				        <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
				        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				          <span class="icon-bar"></span>
				          <span class="icon-bar"></span>
				          <span class="icon-bar"></span>
				        </a>
				   

				        <!-- Everything you want hidden at 940px or less, place within here -->
				        <div class="nav-collapse collapse">
<?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('id' => 'main-menu', 'class' => array('nav', 'links')))); ?>
				        </div>
				        
				</div>
			</div>
		</div>
	</div>
</div>

<div id="content" class="container">

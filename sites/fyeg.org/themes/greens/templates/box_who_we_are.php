<div class="row-fluid">
	<div id="whoweare" class="box">
		<div class="content">
			<h4 class="title">WHO WE ARE</h4>
			<?php
				$menusidebar = menu_navigation_links('menu-sidebar');
				print theme('links__menu-sidebar', array('links' => $menusidebar, 'attributes' => array('id' => 'menu-sidebar', 'class' => array('nav', 'links'))));
			?>
		</div>
	</div>
</div>
jQuery( window ).resize(function() {
	jQuery('#map').height(jQuery('#map img#all').height());
});

jQuery(document).ready(function() {
	
	jQuery('#map').height(jQuery('600px'));
	
	jQuery('img[usemap]').rwdImageMaps();
	
	jQuery('area').on('click', function(event) {
		event.preventDefault();
		window.location = '?country=' + jQuery(this).attr('alt');
		
		
	});
	
	
	jQuery('area').mouseover(function() {
		jQuery('#' + jQuery(this).attr('alt')).show();
	  }).mouseout(function() {
		jQuery('#' + jQuery(this).attr('alt')).hide();
	  });
	  
	  
	 countries = new Array(
	 "Albania",
	 "Andorra",
	 "Austria",
	 "GAJ",
	 "Azerbaijan",
	 "Belarus",
	 "Belgium",
	 "Flemish",
	 "Bosnia",
	 "Bulgaria",
	 "Croatia",
	 "Cyprus",
	 "Czech-Republic",
	 "Finland",
	 "France",
	 "Georgia",
	 "Germany",
	 "Greece",
	 "Iliosporoi",
	 "Hungary",
	 "Ireland",
	 "Italy",
	 "South-Tyrol",
	 "Luxembourg",
	 "Malta",
	 "Netherlands",
	 "Norway",
	 "Poland",
	 "Portugal",
	 "Romania",
	 "Russia",
	 "Serbia",
	 "Slovakia",
	 "Slovenia",
	 "Spain",
	 "Catalonia",
	 "Sweden",
	 "Switzerland",
	 "Turkey",
	 "Ukraine",
	 "UK-England-Wales",
	 "UK-Scotland",
	 "South-Tyrol",
	 "GAJ",
	 "Flemish",
	 "Iliosporoi",
	 "Catalonia");
	 
	 jQuery.each(countries, function() {
	 		  jQuery("#map").append("<img id='" + this + "' width='1240' height='990' usemap='#map_data' src='/sites/all/themes/greens/images/map/" + this + ".png'/>");
	 	
	 });
	 
	 
	 
	 
	jQuery('area').each(function()
	{
	   jQuery(this).qtip(
	   {
	      content: jQuery(this).attr('alt'),
			position: {
			   target: 'mouse',
			   tooltip: 'bottomMiddle',
			   adjust: {
			      mouse: true
			   },
			   corner: {
			      target: 'topMiddle',
			      tooltip: 'bottomMiddle'
			   }
			},
			style: {
			textAlign: 'center',
			color: '#4BB648',
	 		tip: true,
	 		name: 'light',      
	 		border: {
	            width: 1, 
	            radius: 4,
	            color: 'gray'
	         }, 
	         tip: true
	      }
	   });
	});
	  

});
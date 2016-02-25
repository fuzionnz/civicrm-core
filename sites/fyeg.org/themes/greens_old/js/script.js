jQuery(document).ready(function() {

	//jQuery('.active').parents('.menuparent').children('a').addClass('active');
	
	var currentURL = document.location.pathname;
	var activeTopLevelPageArray = currentURL.split('/');
	var activeTopLevelPage = activeTopLevelPageArray[1];
	if (activeTopLevelPage.length != 0) jQuery(".navbar ul li a[href^='/"+activeTopLevelPage+"']").addClass('active');	
	

	if (jQuery('#tabs').length) jQuery( "#tabs" ).tabs();
	
	jQuery("#buttons li#forum").click(function() {
		jQuery("#top #buttons li#search img.on").hide();
		jQuery("#top #buttons li#search img.off").show();
		if (jQuery(this).hasClass("activebutton")) {
			jQuery("#buttons li").removeClass("activebutton");
			jQuery("#tools #forum").hide();
		} else {
			jQuery("#buttons li").removeClass("activebutton");
			jQuery("#tools .row-fluid").hide();
			jQuery(this).addClass("activebutton");
			jQuery("#tools #forum").show();
		}
	});
	
	
	jQuery("#buttons li#contact").click(function() {
		jQuery("#top #buttons li#search img.on").hide();
		jQuery("#top #buttons li#search img.off").show();
		if (jQuery(this).hasClass("activebutton")) {
			jQuery("#buttons li").removeClass("activebutton");
			jQuery("#tools #contact").hide();
		} else {
			jQuery("#buttons li").removeClass("activebutton");
			jQuery("#tools .row-fluid").hide();
			jQuery(this).addClass("activebutton");
			jQuery("#tools #contact").show();
		}
	});

	jQuery("#buttons li#search").click(function() {
		if (jQuery(this).hasClass("activebutton")) {
			jQuery("#buttons li").removeClass("activebutton");
			jQuery("#top #buttons li#search img.on").hide();
			jQuery("#top #buttons li#search img.off").show();			
			jQuery("#tools #search").hide();
		} else {
			jQuery("#buttons li").removeClass("activebutton");
			jQuery("#top #buttons li#search img.on").show();
			jQuery("#top #buttons li#search img.off").hide();
			jQuery("#tools .row-fluid").hide();
			jQuery(this).addClass("activebutton");
			jQuery("#tools #search").show();
		}
	});	
	
	/*sliders*/
	var homeSlider = new Swiper('#span-slider .swiper-container', {
		calculateHeight: true,
		onSlideChangeEnd: function(e) {
			updatePaginationCounter(jQuery(e.container), homeSlider.activeIndex);
		}
	}); 
	jQuery('#span-slider .controls .prev').click(function(e) {
		homeSlider.swipePrev();
		e.preventDefault();
	});
	jQuery('#span-slider .controls .next').click(function(e) {
		homeSlider.swipeNext();
		e.preventDefault();
	});

	var homePoliticalNews = new Swiper('#political-news .swiper-container', {
		calculateHeight: true,
		onSlideChangeEnd: function(e) {
			updatePaginationCounter(jQuery(e.container), homePoliticalNews.activeIndex);
		}
	}); 
	jQuery('#political-news .tools .prev').click(function() {
		homePoliticalNews.swipePrev();
	});
	jQuery('#political-news .tools .next').click(function() {
		homePoliticalNews.swipeNext();
	});

	var homeActivity = new Swiper('#activity-news .swiper-container', {
		calculateHeight: true,
		onSlideChangeEnd: function(e) {
			updatePaginationCounter(jQuery(e.container), homeActivity.activeIndex);
		}
	}); 
	jQuery('#activity-news .tools .prev').click(function() {
		homeActivity.swipePrev();
	});
	jQuery('#activity-news .tools .next').click(function() {
		homeActivity.swipeNext();
	});

	/*caledar init*/
	fixCalendarHeight(0);

	/*bulid calendar*/
	var calMonths = new Swiper('#calendar .months', {
		slideClass: 'month',
		slidesPerView: 'auto',
		noSwiping: true,
		onSlideChangeEnd: function(e) {
			updatePaginationCounter(jQuery(e.container), calMonths.activeIndex);
		}
	});
	var calEvents = new Swiper('#calendar .events-container', {
		slideClass: 'month-content',
		noSwiping: true,
		onSlideChangeEnd: function(e) {
			updatePaginationCounter(jQuery(e.container), calEvents.activeIndex);
		}
	});

	jQuery('#calendar .tools .next').click(function() {
		calMonths.swipeNext();
		calEvents.swipeNext();
		fixCalendarHeight(calEvents.activeIndex);
	});
	jQuery('#calendar .tools .prev').click(function() {
		calMonths.swipePrev();
		calEvents.swipePrev();
		fixCalendarHeight(calEvents.activeIndex);
	});

	/*video slider*/
	var homeVideoThumb = new Swiper('.box.video .thumb-container', {
		calculateHeight: true,
		slideClass: 'thumb',
		slidesPerView: 'auto',
		noSwiping: true,
		onSlideChangeEnd: function(e) {
			updatePaginationCounter(jQuery(e.container), homeVideoThumb.activeIndex);
		}
	});
	var homeVideoPreview = new Swiper('.box.video .swiper-container', {
		calculateHeight: true,
		noSwiping: true,
		onSlideChangeEnd: function(e) {
			updatePaginationCounter(jQuery(e.container), homeVideoPreview.activeIndex);
		}
	});
	jQuery('.box.video .arrow .next').click(function() {
		homeVideoThumb.swipeNext();
		homeVideoPreview.swipeNext();
	});
	jQuery('.box.video .arrow .prev').click(function() {
		homeVideoThumb.swipePrev();
		homeVideoPreview.swipePrev();
	});
	jQuery('.box.video .thumb-container .thumb').click(function(e) {
		homeVideoPreview.swipeTo(jQuery(this).index());
		e.preventDefault();
	});
	
});

function updatePaginationCounter(elem, slide) {
	elem.parent().parent().find('.position .counter').text(slide+1);
}

/*calendar*/

function fixCalendarHeight(index) {
	jQuery('.box.events .events-container, .box.events .month-content').animate({
		height: jQuery('#calendar .month-content .row-fluid').eq(index).height() 
	}, 500);

	if (typeof calMonths != 'undefined' && typeof calEvents != 'undefined') {
		calEvents.resizeFix();
	}
}
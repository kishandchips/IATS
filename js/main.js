(function($){

var main = {

	vars : {},
	w: $(window),

	init: function(){
		this.header.init();
		this.home.init();
		this.gallery.init();
		this.sidebar.init();
		this.slider.init();
		this.isotope.init();
	},

	header: {
		element: $('#header'),

		init: function(){
			var element = main.header.element;
			if(!element.length){return;}

			var	search 			= $('#search-input'),
				menu 			= $('#menu-toggle'),
				sticky 			= $('.sticky-header'),
				nav				= $('#main-nav'),
				searchbutton 	= $('#searchsubmit'),
				catToggle 		= $('.cat-toggle'),
				offset 			= $('#navigation').offset();

			menu.on('click', function(){
				sticky.toggleClass('overflow');		
				nav.toggleClass('visible');		
			});		

			searchbutton.on('click', function(e){				
				if(!element.hasClass('search-open') && !search.val()){
					e.preventDefault();
					element.toggleClass('search-open');
					search.focus();
				} else if(search.val()) {
					return true;
				} else{
					e.preventDefault();
					element.toggleClass('search-open');
				}
			});

			catToggle.on('hover', function(e){
				e.preventDefault();
				$(this).siblings().removeClass('visible').end().addClass('visible');
			});

			// STICKY HEADER
			main.w.scroll(function() {
				if ($(this).scrollTop() > offset.top){  
				    element.addClass("sticky");
				} else {
				    element.removeClass("sticky");
				}
			});

		}// init
	},// main.header

	home: {
		element: $('#home'),

		init: function(){
			var element = main.home.element;
			if(!element.length){return;}

			var button 	= $('#filter-list .cat-filter'),
				select	= $('#filter-select');

			// button filters
			button.on('click', function(e){
				e.preventDefault();

				var slider = $(this).data('category');
				var currentSlider = $('#home .latest').find('.slider.'+ slider);

				//buttons
				button.removeClass('active');
				$(this).addClass('active');

				//sliders
				currentSlider.addClass('active').show();
				$('#home .latest .slider').not('.' + slider).removeClass('active');
				main.w.trigger('resize');
				
			});

			//select filters
			select.on('change', function(){
				var category = $(this).val();
				$(this).parent().removeClass("schools uni rep sevens around");
				$(this).parent().addClass(category);

				var slider = category;
				var currentSlider = $('#home .latest').find('.slider.'+ slider);

				//sliders
				currentSlider.addClass('active').show();
				$('#home .latest .slider').not('.' + slider).removeClass('active');
			});

			//slider
			$('.slider.latest-cat-articles').flexslider({
				animation: "slide",
				animationLoop: false,
				slideshow: false,
				before: function(){
					// $('.slider.latest-cat-articles').resize();
				},
				after: function(){
					// $(window).trigger('resize');
				}
			});

		}// init
	},// main.home

	gallery: {
		element: $('.single-format-gallery'),

		init: function(){
			var element = main.gallery.element;
			if(!element.length){return;}

			$('.slider.carousel').flexslider({
				animation: "slide",
		    	controlNav: false,
		    	animationLoop: false,
		    	slideshow: false,
		    	itemWidth: 150,
		    	itemMargin: 4,
				minItems: 4,
				maxItems: 12,
		    	asNavFor: '.slider.gallery'
			});

			$('.slider.gallery').flexslider({
				animation: "slide",
				directionNav: true,
			    controlNav: false,
			    animationLoop: false,
			    slideshow: false,
				sync: ".slider.carousel"
			});

		}// init
	},// main.gallery

	sidebar: {
		vars:{},
		element: $('#sidebar'),

		init: function(){
			var element = main.sidebar.element;
			if(!element.length){return;}

			var	body							= $('body'),
				toggle 							= $('#js-sidebar');
				main.sidebar.vars.widgets 		= $('.sidebar-widget');
				main.sidebar.vars.container 	= $('#sidebar').parent('.inner-container');

			// toggle sidebar
			toggle.on('click',function(e){
				e.preventDefault();
				body.toggleClass('sidebar-visible');
			});
			
			//sticky sidebar
			if(body.hasClass('single')){
				main.vars.widgets.stickyfloat();
				main.vars.widgets.stickyfloat('update',{ duration:0 });
			}

			this.social();

			main.w.resize(function(){
				main.sidebar.resize();
			});
		},

		social: function(){
			var twitterCount = $('#twitter-count').html();

			$('.twitter .count').html(twitterCount);

			$.ajax({
				url: "https://graph.facebook.com/inattheside?fields=likes",
			})
			.done(function(data){
				var facebookCount = data.likes;
				$('.facebook .count').html(facebookCount);
			});
		},

		resize: function(){
			var sidebarHeight = main.sidebar.vars.widgets.height(),
				container = main.sidebar.vars.container.height();
			
			if(sidebarHeight === container){return;}

			if(container < sidebarHeight){
				main.sidebar.vars.container.css('height', sidebarHeight);
			} else {
				main.sidebar.vars.container.css('height', 'auto');
			}
		}

	},// main.sidebar

	slider: {
		element: $('.slider'),

		init: function(){
			var element = main.slider.element;
			if(!element.length){return;}

			// SLIDERS
			$('.slider').flexslider({
				slideshow: false,
				animation: "slide",
				startAt: 1,
				after: function(){
					bLazy.revalidate();
				}
			});
		}// init
	},// main.slider

	//trigger on resize + load
	isotope: {
		element: $('#isotope'),

		init: function(){
			var element = main.isotope.element;
			if(!element.length){return;}

			var $container = element.imagesLoaded( function() {
				$container.isotope({
					itemSelector: 'article',
				});
			});

			$('#filters').on( 'click', 'button', function() {
				$(this).addClass('active').siblings().removeClass('active');
	  			var filterValue = $(this).attr('data-filter');
	  			$container.isotope({ filter: filterValue });
			});

		}
	}// isotope
};//main

main.w.on('load', function(){
	main.w.trigger('resize');
	main.isotope.init();
});

var bLazy = new Blazy({
	selector: '.lazy'
});

main.init();

$('.match-height').matchHeight(true);

})(jQuery);
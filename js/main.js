(function($){

var main = {

	vars : {},

	init: function(){
		this.listeners();
		this.components.init();
		this.flexsliderSwitch();
		this.live();

		offset = $('#header').offset();

		$(window).scroll(function() {
			if ($(this).scrollTop() > offset.top){  
			    $('.sticky-header').addClass("sticky");
			}
			else{
			    $('.sticky-header').removeClass("sticky");
			}
		});

		$(window).resize(function(){
			main.sticky();
			main.components.sidebar.resize();
			main.isotope();
		});
	},

	listeners: function(){

		var menu = $('#menu-toggle'),
			nav	= $('#main-nav'),
			search = $('#search-toggle'),
			searchBar = $('.search-bar'),
			catToggle = $('.cat-toggle');

		search.on('click', function(){
			searchBar.toggleClass('visible');
		});

		menu.on('click', function(){
			nav.toggleClass('visible');
		});

		catToggle.on('hover', function(e){
			e.preventDefault();
			$(this).siblings().removeClass('visible').end().addClass('visible');
		});
	},

	sticky: function(){
		var footer = $('#footer').outerHeight(),
			push = $('.push'),
			main = $('#joebudden');

			push.css('height', footer);
			main.css('margin-bottom', -footer);
	},

	isotope:function(){
		var element = $('#isotope');
		if(!element.length){return false;}

		var $container = $('#isotope').imagesLoaded( function() {
			$container.isotope({
				itemSelector: 'article',
			});
		});

		$('#filters').on( 'click', 'button', function() {

			$(this).addClass('active').siblings().removeClass('active');
  			var filterValue = $(this).attr('data-filter');
  			$container.isotope({ filter: filterValue });
		});
	},

	flexsliderSwitch: function(){
		var element = $('#home');
		if(!element.length){return false;}

		$('#filter .cat-filter').on('click', function(e){
			e.preventDefault();

			var slider = $(this).data('category');
			var currentSlider = $('#home .latest').find('.slider.'+ slider);

			//buttons
			$('#filter .cat-filter').removeClass('active')
			$(this).addClass('active');

			//sliders
			currentSlider.addClass('active').show();
			$('#home .latest .slider').not('.' + slider).removeClass('active');
			$(window).trigger('resize');
			
		});
	},

	components: {
		vars : {},

		init: function(){

			this.vars.body = $('body');
			this.vars.sidebarButton = $('#js-sidebar');
			this.vars.sidebar = $('#sidebar');
			this.vars.content = $('#sidebar').parent('.inner-container');
			this.vars.filter = $('#filter-select');
			
			this.sidebar.trigger();
			this.catFilter();
		},

		sidebar: {
			trigger: function(){
				main.components.vars.sidebarButton.on('click',function(e){
					e.preventDefault();
					main.components.vars.body.toggleClass('sidebar-visible');
				});
			},

			resize: function(){
				var sidebarHeight = main.components.vars.sidebar.height();
				var containerHeight = main.components.vars.content.outerHeight();

				if(containerHeight < sidebarHeight){
					main.components.vars.content.css('height', sidebarHeight);
				}else{
					main.components.vars.content.css('height', 'auto');
				}
			},
		},

		catFilter: function(){
			this.vars.filter.on('change', function(){
				var category = $(this).val();
				$(this).parent().removeClass("schools uni rep sevens around");
				$(this).parent().addClass(category);

				var slider = category;
				var currentSlider = $('#home .latest').find('.slider.'+ slider);

				//sliders
				currentSlider.addClass('active').show();
				$('#home .latest .slider').not('.' + slider).removeClass('active');
			});
		}
	},

	live: function(){
		var element = $('#live');
		if(!element.length){return false;}

	    setInterval(function() { // Do this
            location.reload();
      	}, 30000); // Every one second
	}
};//main

	$(window).load(function(){
		main.sticky();
		  
		$('.slider.hero').flexslider({
			slideshow: false,
			animation: "slide",
			startAt: 1,
			before: function(slider){
				$('.slider.hero').resize();
			}
		});

		$('.slider.three').flexslider({
			animation: "slide",
			animationLoop: false,
			slideshow: false,
			before: function(slider){
				$('.slider.three').resize();
			},
			after: function(){
				$(window).trigger('resize');
			}
		});

		$('.slider.four').flexslider({
			animation: "slide",
			animationLoop: false,
			slideshow: false,
			before: function(slider){
				$('.slider.four').resize();
			},
			after: function(){
				$(window).trigger('resize');
			}
		});

		//Only on home
		if($('body').hasClass('home')){

			$('.slider.latest-cat-articles').flexslider({
				animation: "slide",
				animationLoop: false,
				slideshow: false,
				before: function(slider){
					$('.slider.latest-cat-articles').resize();
				},
				after: function(){
					$(window).trigger('resize');
				}
			});			
		}

		//Only on gallery pages
		if($('body').hasClass('single-format-gallery')){
			//GALLERY SLIDER
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
				directionNav: false,
			    controlNav: false,
			    animationLoop: false,
			    slideshow: false,
				sync: ".slider.carousel"
			});
		}
	   
		$('.match-height').matchHeight();
		$(window).trigger('resize');
		
		main.isotope();

	});

	main.init();

})(jQuery);
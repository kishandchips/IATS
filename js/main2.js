(function($){

var main = {

	vars : {},

	init: function(){
		this.listeners();
		this.components.init();
		this.flexsliderSwitch();
		this.socialAjax();

		if($('body').hasClass('single')){
			$('.sidebar-widget').stickyfloat();
			$('.sidebar-widget').stickyfloat('update',{ duration:0 });
		}

		// STICKY HEADER
		var offset = $('#navigation').offset(),
			header = $('#header');

		$(window).scroll(function() {
			if ($(this).scrollTop() > offset.top){  
			    header.addClass("sticky");
			} else {
			    header.removeClass("sticky");
			}
		});

		// WINDOW RESIZE
		$(window).resize(function(){
			main.sticky();
			main.components.sidebar.resize();
			main.isotope();
		});

	   	var bLazy = new Blazy({
	   		selector: '.lazy'
	   	});

		//FLEXSLIDERS
		$('.slider.hero').flexslider({
			slideshow: false,
			animation: "slide",
			startAt: 1,
			before: function(){
				$('.slider.hero').resize();
			},
			after: function(){
				bLazy.revalidate();
			}
		});

		$('.slider.three').flexslider({
			animation: "slide",
			animationLoop: false,
			slideshow: false,
			before: function(){
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
			before: function(){
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
				before: function(){
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
				directionNav: true,
			    controlNav: false,
			    animationLoop: false,
			    slideshow: false,
				sync: ".slider.carousel"
			});
		}
	},

	socialAjax: function(){
		var element = $('#sidebar');
		if(!element.length){return false;}

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

	listeners: function(){

		var header = $('#header'),
			search = $('#search-input'),
			menu = $('#menu-toggle'),
			sticky = $('.sticky-header'),
			nav	= $('#main-nav'),
			button = $('#searchsubmit'),
			catToggle = $('.cat-toggle');

		menu.on('click', function(){
			sticky.toggleClass('overflow');
			nav.toggleClass('visible');
		});

		button.on('click', function(e){				
			if(!header.hasClass('search-open') && !search.val()){
				e.preventDefault();
				header.toggleClass('search-open');
				search.focus();
			} else if(search.val()) {
				return true;
			} else{
				e.preventDefault();
				header.toggleClass('search-open');
			}
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
			$('#filter .cat-filter').removeClass('active');
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
			this.vars.sidebar = $('.sidebar-widget');
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
				var container = main.components.vars.content.height();
				
				if(sidebarHeight === container){return;}

				if(container < sidebarHeight){
					main.components.vars.content.css('height', sidebarHeight);
				} else {
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
};//main

	$(window).load(function(){
		main.sticky();
	   	main.isotope();

	   	$('.match-height').matchHeight(true);

		$(window).trigger('resize');
	});

	main.init();

})(jQuery);
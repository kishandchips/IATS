!function($){var e={vars:{},init:function(){this.listeners(),this.components.init(),this.flexsliderSwitch(),this.live(),$(window).resize(function(){e.sticky(),e.components.sidebar.resize(),e.isotope()})},listeners:function(){var e=$("#menu-toggle"),i=$("#main-nav"),t=$("#search-toggle"),s=$(".search-bar"),o=$(".cat-toggle");t.on("click",function(){console.log("clicked"),s.toggleClass("visible")}),e.on("click",function(){i.toggleClass("visible")}),o.on("hover",function(e){e.preventDefault(),$(this).siblings().removeClass("visible").end().addClass("visible")})},sticky:function(){var e=$("#footer").outerHeight(),i=$(".push"),t=$("#joebudden");i.css("height",e),t.css("margin-bottom",-e)},isotope:function(){var e=$("#isotope");if(!e.length)return!1;var i=$("#isotope").imagesLoaded(function(){i.isotope({itemSelector:"article"})});$("#filters").on("click","button",function(){$(this).addClass("active").siblings().removeClass("active");var e=$(this).attr("data-filter");i.isotope({filter:e})})},flexsliderSwitch:function(){var e=$("#home");return e.length?void $("#filter .cat-filter").on("click",function(e){e.preventDefault();var i=$(this).data("category"),t=$("#home .latest").find(".slider."+i);$("#filter .cat-filter").removeClass("active"),$(this).addClass("active"),t.addClass("active").show(),$("#home .latest .slider").not("."+i).removeClass("active"),$(window).trigger("resize")}):!1},components:{vars:{},init:function(){this.vars.body=$("body"),this.vars.sidebarButton=$("#js-sidebar"),this.vars.sidebar=$("#sidebar"),this.vars.content=$("#sidebar").siblings(".section-content"),this.vars.filter=$("#filter-select"),this.sidebar.trigger(),this.catFilter()},sidebar:{trigger:function(){e.components.vars.sidebarButton.on("click",function(i){i.preventDefault(),e.components.vars.body.toggleClass("sidebar-visible")})},resize:function(){var i=e.components.vars.sidebar.height(),t=e.components.vars.content.outerHeight();i>t?e.components.vars.content.css("height",i):e.components.vars.content.css("height","auto")}},catFilter:function(){this.vars.filter.on("change",function(){var e=$(this).val();$(this).parent().removeClass("schools uni rep sevens around"),$(this).parent().addClass(e);var i=e,t=$("#home .latest").find(".slider."+i);t.addClass("active").show(),$("#home .latest .slider").not("."+i).removeClass("active")})}},live:function(){var e=$("#live");return e.length?void setInterval(function(){location.reload()},3e5):!1}};$(window).load(function(){e.sticky(),$(".slider.hero").flexslider({slideshow:!1,animation:"slide",startAt:1,before:function(e){$(".slider.hero").resize()}}),$(".slider.latest-cat-articles").flexslider({animation:"slide",animationLoop:!1,slideshow:!1,before:function(e){$(".slider.latest-cat-articles").resize()}}),$(".slider.three").flexslider({animation:"slide",animationLoop:!1,slideshow:!1,before:function(e){$(".slider.three").resize()}}),$(".slider.four").flexslider({animation:"slide",animationLoop:!1,slideshow:!1,before:function(e){$(".slider.four").resize()}}),$(".slider.carousel").flexslider({animation:"slide",controlNav:!1,animationLoop:!1,slideshow:!1,itemWidth:150,itemMargin:4,minItems:4,maxItems:12,asNavFor:".slider.gallery"}),$(".slider.gallery").flexslider({animation:"slide",directionNav:!1,controlNav:!1,animationLoop:!1,slideshow:!1,sync:".slider.carousel"}),$(".match-height").matchHeight(),e.isotope()}),e.init()}(jQuery);
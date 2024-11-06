$(document).ready(function(){
    "use strict";

  /*
  ==============================================================
    COUNTDOWN  Script Start
  ==============================================================
  */
    if($('.countdown').length){
      $('.countdown').downCount({ date: '8/12/2018 12:00:00', offset: +1 });
    }
  /*
  ==============================================================
     Main Banner SLIDER SCRIPT
  ==============================================================
  */
    if($('.mg_slider1').length){
      $('.mg_slider1').slick({
          fade:true,
          autoplay: true,
          autoplaySpeed: 1200,
      });
    }
  /*
  ==============================================================
     Main Banner SLIDER SCRIPT
  ==============================================================
  */
    if($('.mg_blog_full-slider').length){
      $('.mg_blog_full-slider').slick({
          dots:true,
          arrows:false
      });
    }
  /*
  ==============================================================
     SLICK SLIDER MULTIPUL SCRIPT
  ==============================================================
  */
    if($('.chooseus_slider').length){
      $('.chooseus_slider').slick({
        centerMode: true,
        centerPadding: '0px',
        slidesToShow: 5,
        responsive: [
        {
            breakpoint: 1367,
            settings: {
              arrows: false,
              centerMode: true,
              centerPadding: '0px',
              slidesToShow: 4
            }
          },
          {
            breakpoint: 992,
            settings: {
              arrows: false,
              centerMode: true,
              centerPadding: '0px',
              slidesToShow: 3
            }
          },
          {
            breakpoint: 768,
            settings: {
              arrows: false,
              centerMode: true,
              centerPadding: '0px',
              slidesToShow: 2
            }
          },
          {
            breakpoint: 481,
            settings: {
              arrows: false,
              centerMode: false,
              centerPadding: '0px',
              slidesToShow: 1
            }
          }
        ]
      });
    }
  /*
  ==============================================================
      Main Banner SLIDER Script Start
  ==============================================================
  */
    if($('.room-slider').length){
      $('.room-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        dots: false,
        asNavFor: '.room-slider-nav'
      });
    }
    if($('.room-slider-nav').length){
      $('.room-slider-nav').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        asNavFor: '.room-slider',
        dots: false,
        vertical: false,
        centerMode: true,
        focusOnSelect: true,
        arrows: false,
        autoplay: false
      });
    }

  /*
  =======================================================================
      Map Script
  =======================================================================
  */
    if($('#map-canvas').length){
      google.maps.event.addDomListener(window, 'load', initialize);
    }
  /*
    =======================================================================
         Map Custom Style Script Script
    =======================================================================
  */
    function initialize() {
          
      "use strict";
      
      var MY_MAPTYPE_ID = 'custom_style';
      var map;
      var brooklyn = new google.maps.LatLng(40.6743890, -73.9455);
      var featureOpts = [
        {"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"color":"#f7f1df"}]},{"featureType":"landscape.natural","elementType":"geometry","stylers":[{"color":"#d0e3b4"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.medical","elementType":"geometry","stylers":[{"color":"#fbd3da"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#bde6ab"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffe15f"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#efd151"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"color":"black"}]},{"featureType":"transit.station.airport","elementType":"geometry.fill","stylers":[{"color":"#cfb2db"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#a2daf2"}]}

      ];
      var mapOptions = {
        zoom: 12,
        center: brooklyn,
        mapTypeControlOptions: {
          mapTypeIds: [google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID]
        },
        zoomControl: false,
        scaleControl: false,
        scrollwheel: false,
        disableDoubleClickZoom: true,
        mapTypeId: MY_MAPTYPE_ID
      };

      map = new google.maps.Map(
        document.getElementById('map-canvas'),
        mapOptions
      );

      var styledMapOptions = {
        name: 'Custom Style'
      };

      var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);

      map.mapTypes.set(MY_MAPTYPE_ID, customMapType);
    }
  /*
  ============================================================== 
    Accordian Menu
  ============================================================== 
  */
    if($('.accordion').length){
      //custom animation for open/close
      $.fn.slideFadeToggle = function(speed, easing, callback) {
        return this.animate({opacity: 'toggle', height: 'toggle'}, speed, easing, callback);
      };

      $('.accordion').accordion({
        defaultOpen: 'section1',
        cookieName: 'nav',
        speed: 'slow',
        animateOpen: function (elem, opts) { //replace the standard slideUp with custom function
          elem.next().stop(true, true).slideFadeToggle(opts.speed);
        },
        animateClose: function (elem, opts) { //replace the standard slideDown with custom function
          elem.next().stop(true, true).slideFadeToggle(opts.speed);
        }
      });
    }
  /*
  ============================================================== 
    DL Responsive Menu
  ============================================================== 
  */
    if(typeof($.fn.dlmenu) == 'function'){
      $('#mg-responsive-navigation').each(function(){
        $(this).find('.dl-submenu').each(function(){
        if( $(this).siblings('a').attr('href') && $(this).siblings('a').attr('href') != '#' ){
          var parent_nav = $('<li class="menu-item mg-parent-menu"></li>');
          parent_nav.append($(this).siblings('a').clone());
          
          $(this).prepend(parent_nav);
        }
        });
        $(this).dlmenu();
      });
    }
    /*
    ==============================================================
      Masonry  Script Start
    ==============================================================
  */
  // Initialize Masonry
    if ($('.masonry').length) {
        var container = document.querySelector('.masonry');
        var msnry = new Masonry(container, {
            itemSelector: '.masonry-item'
        });

        msnry.on('layoutComplete', function() {
            // Fix floating project filters to bottom of projects container

            if ($('.filters.floating').length) {
                setupFloatingProjectFilters();
                updateFloatingFilters();
                window.addEventListener("scroll", updateFloatingFilters, false);
            }

            $('.masonry').addClass('fadeIn');
            $('.masonry-loader').addClass('fadeOut');
            
        });

        msnry.layout();
    }
});

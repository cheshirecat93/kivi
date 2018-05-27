$(document).ready(function(){

  $('.front-slider').slick({

  });

  $.fn.raty.defaults.path = '../lib/raty/images';
  $('.raty').raty({
  	readOnly: true,
  	hints : ['', '', '', '', ''],
  });

  $('a.cboxElement').colorbox({rel:'gal',maxWidth:'95%', maxHeight:'95%', title:function(){
    return $(this).attr('alt');
  } });

   function initializeMap() {
    if( $('#map-canvas-contacts').length > 0 ){
      var mapCanvas = document.getElementById('map-canvas-contacts');
      var gLat = $('#map-canvas-contacts').data('lat');
      var gLng = $('#map-canvas-contacts').data('lon');
      var mapOptions = {
        center: new google.maps.LatLng(gLat, gLng),
        zoom: 14,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      }
      var map = new google.maps.Map(mapCanvas, mapOptions);
      var marker = new google.maps.Marker({
        position: map.center,
        map: map,
        icon: '/files/design/map-marker2.png'
      });
    }
  }

  //google.maps.event.addDomListener(window, 'load', initializeMap);

  initializeMap();

  $('.right-login-logout').on('mouseenter',function(){
    $(this).addClass('hovered');
  });
  $('.right-login-logout').on('mouseleave',function(){
    if(!$('.right-login-logout input').is(':focus')) {
        $('.right-login-logout').removeClass('hovered');
    }

  });

  $('.center-menu>ul>li.has-childs').on('mouseenter',function(){
    $(this).addClass('hovered');
  });
  $('.center-menu>ul>li.has-childs').on('mouseleave',function(){
    $(this).removeClass('hovered');
  });


  function stickyFooter(){
    var containerH = $('.main-container').height();
    var windowH = $(window).height();
    if(containerH < windowH){
      var newH = windowH - 75 - 53 -60 -2;
      $('.main-container .clr').height(newH);
    }

  }

  stickyFooter();
  $(window).on('resize', function(){
    stickyFooter();
  });

});

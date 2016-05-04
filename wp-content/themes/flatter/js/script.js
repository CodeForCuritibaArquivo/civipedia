jQuery(function($) { // DOM is now read and ready to be manipulated

  $('.woocommerce-pagination').addClass('pagination');
  $('.pagination').removeClass('woocommerce-pagination');

  $('table').addClass('table');

  $('.logo-menu .navbar-nav li a i').parent('a').addClass('has-icon');


  $('.main-menu .menu-item i').each(function(){
    $(this).after('<br>');
  });

  $('.sidebar .single #recentcomments').removeAttr('id');


  $('.main-menu .menu-item a').each(function(){
    var $fontAwesome = $(this).prepend();
    $(this).after($fontAwesome);
  });

  $('header .item:first-child').addClass('active');


  $('.single-page .social-media li a i').each(function(){
    var $icon = $(this).clone();
    $(this).after($icon);
  });

  $('.carousel').carousel({
    interval: 3000 //changes the speed
  })

// Remove Placeholder
  $('input,textarea').focus(function(){
    $(this).data('placeholder',$(this).attr('placeholder'))
    $(this).attr('placeholder','');
  });

  $('input,textarea').blur(function(){
    $(this).attr('placeholder',$(this).data('placeholder'));
  });


//Tab to top

  $(window).scroll(function() {
    if ($(this).scrollTop() > 1){
      $('.scroll-top-wrapper').addClass("show");
    }
    else{
      $('.scroll-top-wrapper').removeClass("show");
    }
  });

  $(".scroll-top-wrapper").on("click", function() {
    $("html, body").animate({ scrollTop: 0 }, 600);
    return false;
  });


//Sticky Header
  $(window).scroll(function() {
    if ($(this).scrollTop() > 1){
      $('.logo-menu').addClass("sticky-menu");
    }
    else{
      $('.logo-menu').removeClass("sticky-menu");
    }
  });

// Fixing Container Width
  var mq = window.matchMedia( "(min-width: 1367px)" );
  if (mq.matches) {
    $('.container').css({'width':'1366px'});
  }
  else {
    $('.container').css({'width':'100%'});
  }


// Animations
  new WOW().init();
  // $(".single, .single-post, .animate, .section-title").addClass('wow fadeInUp');

// Testimonials
  $(document).ready(function() {
    $("#owl-demo").owlCarousel({

      navigation : false, // Show next and prev buttons
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem:true

      // "singleItem:true" is a shortcut for:
      // items : 1,
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false

    });

  });



});


// Smart Menu
(function($) {

  // init ondomready
  $(function() {

    // init all navbars that don't have the "data-sm-skip" attribute set
    var $navbars = $('ul.navbar-nav:not([data-sm-skip])');
    $navbars.each(function() {
      var $this = $(this);
      $this.addClass('sm').smartmenus({

          // these are some good default options that should work for all
          // you can, of course, tweak these as you like
          subMenusSubOffsetX: 2,
          subMenusSubOffsetY: -6,
          subIndicators: false,
          collapsibleShowFunction: null,
          collapsibleHideFunction: null,
          rightToLeftSubMenus: $this.hasClass('navbar-right'),
          bottomToTopSubMenus: $this.closest('.navbar').hasClass('navbar-fixed-bottom')
        })
        .bind({
          // set/unset proper Bootstrap classes for some menu elements
          'show.smapi': function(e, menu) {
            var $menu = $(menu),
              $scrollArrows = $menu.dataSM('scroll-arrows');
            if ($scrollArrows) {
              // they inherit border-color from body, so we can use its background-color too
              $scrollArrows.css('background-color', $(document.body).css('background-color'));
            }
            $menu.parent().addClass('open');
          },
          'hide.smapi': function(e, menu) {
            $(menu).parent().removeClass('open');
          }
        })
        // set Bootstrap's "active" class to SmartMenus "current" items (should someone decide to enable markCurrentItem: true)
        .find('a.current').parent().addClass('active');

      // keep Bootstrap's default behavior for parent items when the "data-sm-skip-collapsible-behavior" attribute is set to the ul.navbar-nav
      // i.e. use the whole item area just as a sub menu toggle and don't customize the carets
      var obj = $this.data('smartmenus');
      if ($this.is('[data-sm-skip-collapsible-behavior]')) {
        $this.bind({
          // click the parent item to toggle the sub menus (and reset deeper levels and other branches on click)
          'click.smapi': function(e, item) {
            if (obj.isCollapsible()) {
              var $item = $(item),
                $sub = $item.parent().dataSM('sub');
              if ($sub && $sub.dataSM('shown-before') && $sub.is(':visible')) {
                obj.itemActivate($item);
                obj.menuHide($sub);
                return false;
              }
            }
          }
        });
      }

      var $carets = $this.find('.caret');

      // onresize detect when the navbar becomes collapsible and add it the "sm-collapsible" class
      var winW;
      function winResize() {
        var newW = obj.getViewportWidth();
        if (newW != winW) {
          if (obj.isCollapsible()) {
            $this.addClass('sm-collapsible');
            // set "navbar-toggle" class to carets (so they look like a button) if the "data-sm-skip-collapsible-behavior" attribute is not set to the ul.navbar-nav
            if (!$this.is('[data-sm-skip-collapsible-behavior]')) {
              $carets.addClass('navbar-toggle sub-arrow');
            }
          } else {
            $this.removeClass('sm-collapsible');
            if (!$this.is('[data-sm-skip-collapsible-behavior]')) {
              $carets.removeClass('navbar-toggle sub-arrow');
            }
          }
          winW = newW;
        }
      };
      winResize();
      $(window).bind('resize.smartmenus' + obj.rootId, winResize);
    });

  });

  // fix collapsible menu detection for Bootstrap 3
  $.SmartMenus.prototype.isCollapsible = function() {
    return this.$firstLink.parent().css('float') != 'left';
  };

})(jQuery);


/* Full Spoon Bootstrap Theme
 * Author - Petia Koleva @ http://designify.me */


// Loader
//*******************
// Wait for window load
$(window).load(function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");;
    });
    
    // jQuery for page scrolling feature - requires jQuery Easing plugin
    //*******************
    $(function() {
        $('a.page-scroll').bind('click', function(event) {
            var $anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top
            }, 1500, 'easeInOutExpo');
            event.preventDefault();
        });
    });
    
    // Highlight the top nav as scrolling occurs
    //*******************
    $('body').scrollspy({
        target: '.navbar-fixed-top'
    })
    
    // Closes the Responsive Menu on Menu Item Click
    //*******************
    $('.navbar-collapse ul li a').click(function() {
        $('.navbar-toggle:visible').click();
    });
    
    
    // Required code to run WOW.js
    //*******************
    var wow = new WOW(
      {
        boxClass:     'wow',      // animated element css class (default is wow)
        animateClass: 'animated', // animation css class (default is animated)
        offset:       200,          // distance to the element when triggering the animation (default is 0)
        mobile:       false,       // trigger animations on mobile devices (default is true)
        live:         true,       // act on asynchronously loaded content (default is true)
        callback:     function(box) {
          // the callback is fired every time an animation is started
          // the argument that is passed in is the DOM node being animated
        }
      }
    );
    wow.init();
    
    // Required code to run the OWL CAROUSEL (TESTIMONALS) Section 
    //*******************
    $(document).ready(function() {
          $("#owl-testimonials").owlCarousel({
          navigation : true,
          slideSpeed : 300,
          pagination: false,
          singleItem : true,
          autoPlay: true,
          stopOnHover:true,
          autoHeight: true,
            navigationText: [
                "<i class='fa fa-angle-left'></i>",
                "<i class='fa fa-angle-right'></i>"
            ],
          });
        });
        
        
    // Gallery and Gallery Filter Styles 
    //*******************
    $(window).load(function(){
    if ( $('#gallery-masonry').length > 0 ) {
            // Call to Masonry plugin
            var gallerymasonry = $('#gallery-masonry').isotope({
                itemSelector: '.single-item',
                layoutMode: 'fitRows',
                transitionDuration: '.6s',
                hiddenStyle: {
                    opacity: 0,
                    transform: "scale(.85)"
                },
                visibleStyle: {
                    opacity: 1,
                    transform: "scale(1)"
                }
            });
    
    // Filtering the gallery items
    //*******************
    $('#gallery-masonry-sort a').on( 'click', function(e) {
                e.preventDefault();
                var $this = $(this);
                if ( $this.parent('li').hasClass('active') ) {
                    return false;
                } else {
                    $this.parent('li').addClass('active').siblings('li').removeClass('active');
                }
                var filterValue = $this.data('target');
                gallerymasonry.isotope({ filter: filterValue });
                return $this;
            });
    
        }
        
          });
    
    // Adjustment for the Map embed (diabling pointer events when scrolling)
    //*******************
    
    $(document).ready(function() {
        $('#iframe').click(function () {
            $('section#iframe iframe').css("pointer-events", "auto");
        });
        
        $( "#iframe" ).mouseleave(function() {
          $('section#iframe iframe').css("pointer-events", "none"); 
        });
         });   		
         
         
    // Magnific Popup Gallery
    //*******************
    $('.gallery-item').magnificPopup({
      type: 'image',
      gallery:{
        enabled:true
      }
    });
    
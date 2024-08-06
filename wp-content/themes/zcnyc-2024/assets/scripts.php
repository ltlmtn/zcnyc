<script>

	jQuery( '.menu-toggle' ).on( 'click', function() {
			var element = document.getElementById("body");
			element.classList.toggle("menu-active");
      element.classList.remove("search-active");
	});

  jQuery( '.search-toggle' ).on( 'click', function() {
      var element = document.getElementById("body");
      element.classList.toggle("search-active");
      element.classList.remove("menu-active");
  });

  jQuery( '.newsletter-signup-toggle' ).on( 'click', function() {
      var element = document.getElementById("body");
      element.classList.toggle("newsletter-signup-active");
      jQuery('html, body').animate({
        scrollTop: jQuery(window).scrollTop() + 300
      }, 500);
  });

	// Child Menus Toggle
	jQuery( '.menu-item-has-children' ).on( 'click', function() {
			jQuery( this ).toggleClass( 'active' );
	});


  jQuery(document).ready(function() {
    jQuery(window).scroll(function() {
      // Get the current scroll position
      var scrollPosition = jQuery(window).scrollTop();

      // Check if the user has scrolled 400px past the top
      if (scrollPosition >= 400) {
        // Add the "scrolled" class to the #body element
        jQuery('#body').addClass('scrolled');
      } else {
        // Remove the "scrolled" class if not scrolled 400px past the top
        jQuery('#body').removeClass('scrolled');
      }
    });
  });


  // Accordion CTA Animation
  var accordions = document.querySelectorAll('.accordion-cta');
  accordions.forEach(function(accordion) {
    window.addEventListener('scroll', function() {
      var windowHeight = window.innerHeight;
      var accordionPosition = accordion.getBoundingClientRect().top;

      if (accordionPosition < windowHeight / 2 && accordionPosition > -accordion.offsetHeight / 2) {
        accordion.classList.add('visible');
      } else {
        accordion.classList.remove('visible');
      }
    });
  });

  // Homepage Punchline Animation
  var punchline = document.querySelectorAll('.homepage-punchline');
  punchline.forEach(function(punchline) {
    window.addEventListener('scroll', function() {
      var windowHeight = window.innerHeight;
      var punchlinePosition = punchline.getBoundingClientRect().top;

      if (punchlinePosition < windowHeight / 2 && punchlinePosition > -punchline.offsetHeight / 2) {
        punchline.classList.add('visible');
      } else {
        punchline.classList.remove('visible');
      }
    });
  });

</script>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
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


</script>

<?php if( is_page('programs')) : ?>

  <script>
    jQuery('.rs-program-location:contains("Zen Center of New York City")').text('ZCNYC');
  </script>

<?php endif; ?>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
jQuery(document).ready(function($) {
    // Function to convert WordPress galleries to Featherlight
    function convertToFeatherlight() {
        // Select all WordPress galleries
        $('.wp-block-gallery').each(function() {
            // Add Featherlight gallery attributes to the container
            $(this).attr({
                'data-featherlight-gallery': '',
                'data-featherlight-filter': 'a'
            });
            // For each gallery item
            $(this).find('.wp-block-image').each(function() {
                var $link = $(this).find('a');
                var $img = $link.find('img');
                
                // Set up Featherlight
                $link.attr('data-featherlight', $link.attr('href'));
                
                // Remove any existing click events
                $link.off('click');
            });
        });
        
        // Initialize Featherlight
        $('a[data-featherlight]').featherlightGallery({
            targetAttr: 'href'
        });
    }

    // Run the conversion function when the page loads
    convertToFeatherlight();
    
    // If you're using AJAX to load content, you might want to run this function again after AJAX completes
    $(document).ajaxComplete(function() {
        convertToFeatherlight();
    });
});
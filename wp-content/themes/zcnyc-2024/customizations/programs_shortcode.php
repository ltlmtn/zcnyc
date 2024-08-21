<?php
// set up the shortcode hook
add_shortcode( 'rg_programs', 'my_custom_program_shortcode_handler' );

function my_custom_program_shortcode_handler($atts, $content = null) {
    $output = '';
    // make sure calling the api doesn't cause a fatal error if the RS_Connect_Api class is not found
    $rs_connect_api = class_exists('RS_Connect_Api') ? new RS_Connect_Api() : null;
    if (! empty($rs_connect_api)) {
        global $RS_Connect;
        global $shortcode_atts;
        global $rs_the_programs;

        
        foreach($rs_the_programs as $program) {
            echo $program->title;
        }
        
        // get the output buffering as a variable
        $output = ob_get_clean();
    }

    // return the output as the content for the shortcode
    return $output;
}
?>
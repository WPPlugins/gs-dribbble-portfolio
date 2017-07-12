<?php
/*
 * GS Dribbble Portfolio - Theme One
 * @author Golam Samdani <samdani1997@gmail.com>
 * 
 */

$output .= '<div class="container">';
	$output .= '<div class="row">';

	foreach( $gs_dribbble_shots as $gs_dribbble_shot ) {

        $output .= '<div class="col-md-'.$atts['column'].' drib-shots">';
            $output .= '<a href="' . $gs_dribbble_shot[ 'html_url' ]. '" target="'. $gs_drib_link_tar .'">';
            	$output .= '<img src="'.$gs_dribbble_shot['images']['hidpi'].'"/>';
            $output .= '</a>';
        $output .= '</div>'; // end col
    }
    
    $output .= '</div>'; // end row
    do_action('gs_dribbble_custom_css');
$output .= '</div>'; // end container

return $output;
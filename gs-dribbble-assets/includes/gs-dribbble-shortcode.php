<?php

// -- Getting values from setting panel

function gs_dribbble_getoption( $option, $section, $default = '' ) {
    $options = get_option( $section );
    if ( isset( $options[$option] ) ) {
        return $options[$option];
    }
    return $default;
}

// -- Shortcode [gs_dribbble]

add_shortcode('gs_dribbble','gs_dribbble_shortcode');

function gs_dribbble_shortcode( $atts ) {

	$gs_drib_user = gs_dribbble_getoption('gs_drib_user', 'gs_dribbble_settings', 'lazutina');
	$gs_drib_acc_token = gs_dribbble_getoption('gs_drib_acc_token', 'gs_dribbble_settings', '');
	$gs_drib_tot_shots = gs_dribbble_getoption('gs_drib_tot_shots', 'gs_dribbble_settings', '');
	$gs_drib_cols = gs_dribbble_getoption('gs_drib_cols', 'gs_dribbble_settings', 3);
	$gs_drib_theme = gs_dribbble_getoption('gs_drib_theme', 'gs_dribbble_settings', 'gs_drib_theme1');
	$gs_drib_link_tar = gs_dribbble_getoption('gs_drib_link_tar', 'gs_dribbble_settings', '_blank');

// var_dump($gs_drib_acc_token);
	$atts = shortcode_atts(
		array(
			'userid'	=> $gs_drib_user,
			'count' 	=> $gs_drib_tot_shots,
			'column'	=> $gs_drib_cols,
			'theme'		=> $gs_drib_theme
    ), $atts );


	$gsd_url = "https://api.dribbble.com/v1/users/".$atts['userid']."/shots?access_token=".$gs_drib_acc_token."&per_page=".$atts['count']."";
    $gsd_response  = wp_remote_get( $gsd_url, array( 'sslverify' => false ) );
    $gsd_xml = wp_remote_retrieve_body( $gsd_response );
    $gsd_json = json_decode( $gsd_xml ,true);
	$gs_dribbble_shots = $gsd_json;
 
	$output = '';
	$output .= '<div class="gs_drib_area '.$atts['theme'].'">';

		if ( $atts['theme'] == 'gs_drib_theme1' ) {
			include GSD_FILES_DIR . '/includes/templates/gs_drib_structure_one.php';
		} 

	$output .= '</div>'; // end gs_drib_area
	return $output;
} // end function
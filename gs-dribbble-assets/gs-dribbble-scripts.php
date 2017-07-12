<?php

// -- Include css files
if ( ! function_exists('gs_enqueue_dribbble_styles') ) {
	function gs_enqueue_dribbble_styles() {
		if (!is_admin()) {
			$media = 'all';

			if(!wp_style_is('gsdrib-fa-icons','registered')){
				wp_register_style('gsdrib-fa-icons', GSD_FILES_URI . '/assets/fa-icons/css/font-awesome.min.css','', GSD_VERSION, $media);
			}
			if(!wp_style_is('gsdrib-fa-icons','enqueued')){
				wp_enqueue_style('gsdrib-fa-icons');
			}

			wp_register_style('gs-dribb-custom-bootstrap', GSD_FILES_URI . '/assets/css/gs-dibb-custom-bootstrap.css','', GSD_VERSION, $media);
			wp_enqueue_style('gs-dribb-custom-bootstrap');

			// Plugin main stylesheet
			wp_register_style('gs_drib_csutom_css', GSD_FILES_URI . '/assets/css/gs-drib-custom.css','', GSD_VERSION, $media);
			wp_enqueue_style('gs_drib_csutom_css');			
		}
	}
	add_action( 'init', 'gs_enqueue_dribbble_styles' );
}

// -- Dribbble Custom CSS
if ( !function_exists('gs_dribbble_custom_style')) {
	function gs_dribbble_custom_style() {

		$gs_drib_custom_css = gs_dribbble_getoption('gs_drib_custom_css', 'gs_dribbble_settings', '');

		if( isset($gs_drib_custom_css) && !empty($gs_drib_custom_css) ){
			?>
				<style type="text/css">
					<?php echo $gs_drib_custom_css;?>
				</style>
			<?php
		}
	}
	add_action( 'gs_dribbble_custom_css','gs_dribbble_custom_style' );
}

// -- Admin css
function gsdrib_enque_admin_style() {
    $media = 'all';

    wp_register_script( 'gsdrib-admin-js', GSD_FILES_URI . '/admin/js/gsd_admin_script.js', array( 'jquery' ),GSD_VERSION, true );
    wp_enqueue_script('gsdrib-admin-js');

    wp_register_style( 'gsdrib-admin-style', GSD_FILES_URI . '/admin/css/gsd_admin_style.css', '', GSD_VERSION, $media );
    wp_enqueue_style( 'gsdrib-admin-style' );
}
add_action( 'admin_enqueue_scripts', 'gsdrib_enque_admin_style' );
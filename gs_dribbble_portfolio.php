<?php 
/**
 *
 * @package   GS_Dribbble_Portfolio
 * @author    Golam Samdani <samdani1997@gmail.com>
 * @license   GPL-2.0+
 * @link      http://www.gsamdani.com
 * @copyright 2016 Golam Samdani
 *
 * @wordpress-plugin
 * Plugin Name:			GS Dribbble Portfolio Lite
 * Plugin URI:			http://www.gsamdani.com/wordpress-plugins
 * Description:       	Best Responsive Dribbble plugin for Wordpress to showcase Dribbble shots. Display anywhere at your site using shortcode like [gs_dribbble] & widgets. Check more shortcode examples and documentation at <a href="http://www.dribbble.gsamdani.com">GS Dribble Porfolio PRO Demos & Docs</a>
 * Version:           	1.0.0
 * Author:       		Golam Samdani
 * Author URI:       	http://www.gsamdani.com
 * Text Domain:       	gs-dribbble
 * License:           	GPL-2.0+
 * License URI:       	http://www.gnu.org/licenses/gpl-2.0.txt
*/

if( ! defined( 'GSD_HACK_MSG' ) ) define( 'GSD_HACK_MSG', __( 'Sorry cowboy! This is not your place', 'gs-dribbble' ) );

/**
 * Protect direct access
 */
if ( ! defined( 'ABSPATH' ) ) die( GSD_HACK_MSG );

/**
 * Defining constants
 */
if( ! defined( 'GSD_VERSION' ) ) define( 'GSD_VERSION', '1.0.0' );
if( ! defined( 'GSD_MENU_POSITION' ) ) define( 'GSD_MENU_POSITION', 31 );
if( ! defined( 'GSD_PLUGIN_DIR' ) ) define( 'GSD_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
if( ! defined( 'GSD_FILES_DIR' ) ) define( 'GSD_FILES_DIR', GSD_PLUGIN_DIR . 'gs-dribbble-assets' );
if( ! defined( 'GSD_PLUGIN_URI' ) ) define( 'GSD_PLUGIN_URI', plugins_url( '', __FILE__ ) );
if( ! defined( 'GSD_FILES_URI' ) ) define( 'GSD_FILES_URI', GSD_PLUGIN_URI . '/gs-dribbble-assets' );

require_once GSD_FILES_DIR . '/gs-plugins/gs-plugins.php';
require_once GSD_FILES_DIR . '/includes/gs-dribbble-shortcode.php';
require_once GSD_FILES_DIR . '/admin/class.settings-api.php';
require_once GSD_FILES_DIR . '/admin/gs_dribbble_options_config.php';
require_once GSD_FILES_DIR . '/gs-dribbble-scripts.php';

if ( ! function_exists('gs_dribb_pro_link') ) {
	function gs_dribb_pro_link( $gsDribb_links ) {
		$gsDribb_links[] = '<a class="gs-pro-link" href="https://www.gsamdani.com/product/gs-dribbble-portfolio" target="_blank">Go Pro!</a>';
		$gsDribb_links[] = '<a href="https://www.gsamdani.com/wordpress-plugins" target="_blank">GS Plugins</a>';
		return $gsDribb_links;
	}
	add_filter( 'plugin_action_links_' .plugin_basename(__FILE__), 'gs_dribb_pro_link' );
}
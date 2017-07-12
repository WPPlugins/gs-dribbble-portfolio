<?php
/**
 * This page shows the procedural or functional example
 * OOP way example is given on the main plugin file.
 * @author Tareq Hasan <tareq@weDevs.com>
 */
 
/**
 * WordPress settings API demo class
 * @author Tareq Hasan
 */

 
if ( !class_exists('GS_dribbble_Settings_Config' ) ):
class GS_dribbble_Settings_Config {

    private $settings_api;

    function __construct() {
        $this->settings_api = new GS_Dribbble_WeDevs_Settings_API;

        add_action( 'admin_init', array($this, 'admin_init') );
        add_action( 'admin_menu', array($this, 'admin_menu') );
    }

    function admin_init() {

        //set the settings
        $this->settings_api->set_sections( $this->get_settings_sections() );
        $this->settings_api->set_fields( $this->get_settings_fields() );

        //initialize settings
        $this->settings_api->admin_init();
    }

    function admin_menu() {
	
		add_submenu_page( 'gsp-main', 'Dribbble Settings', 'Dribbble Settings', 'delete_posts', 'dribbble-settings', array($this, 'plugin_page')); 
    }

    function get_settings_sections() {
        $sections = array(
            array(
                'id' 	=> 'gs_dribbble_settings',
                'title' => __( 'GS Dribbble Settings', 'gs-dribbble' )
            )
        );
        return $sections;
    }

    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    function get_settings_fields() {
        $settings_fields = array(
            'gs_dribbble_settings' => array(
                // User
                array(
                    'name'      => 'gs_drib_user',
                    'label'     => __( 'User', 'gs-dribbble' ),
                    'desc'      => __( 'Enter Dribbble user name', 'gs-dribbble' ),
                    'type'      => 'text',
                    'default'   => ''
                ),
                // Access Token
                array(
                    'name'      => 'gs_drib_acc_token',
                    'label'     => __( 'Dribbble Access Token', 'gs-dribbble' ),
                    'desc'      => __( 'Enter Dribbble Access Token<br>Check <a href="https://www.youtube.com/watch?v=Lx3zv1XjjfA" target="_blank">this</a> video how to get your own Dribbble access token', 'gs-dribbble' ),
                    'type'      => 'text',
                    'default'   => ''
                ),
                // Number of shots to display
                array(
                    'name'  => 'gs_drib_tot_shots',
                    'label' => __( 'Number of shots to display', 'gs-dribbble' ),
                    'desc'  => __( 'Set number of shots to display. Default 6', 'gs-dribbble' ),
                    'type'  => 'number',
                    'min'   => 1,
                    'max'   => 20,
                    'default' => 6
                ),
                // Columns
                array(
                    'name'      => 'gs_drib_cols',
                    'label'     => __( 'Columns', 'gs-dribbble' ),
                    'desc'      => __( 'Select number of shots column', 'gs-dribbble' ),
                    'type'      => 'select',
                    'default'   => '3',
                    'options'   => array(
                        '6'      => '2 Columns',
                        '4'      => '3 Columns',
                        '3'      => '4 Columns'
                    )
                ),
                // theme
                array(
                    'name'  => 'gs_drib_theme',
                    'label' => __( 'Style & Theming', 'gs-dribbble' ),
                    'desc'  => __( 'Select preffered Style & Theme', 'gs-dribbble' ),
                    'type'  => 'select',
                    'default'   => 'gs_drib_theme1',
                    'options'   => array(
                        'gs_drib_theme1'   => 'Theme 1 (Shots)',
                        'gs_drib_theme2'   => 'Theme 2 (Shot Views - PRO)',
                        'gs_drib_theme3'   => 'Theme 3 (Hover - PRO)',
                        'gs_drib_theme4'   => 'Theme 4 (Popup - PRO)',
                        'gs_drib_theme5'   => 'Theme 5 (Slider - PRO)'
                    )
                ),
                // Shots Link Target
                array(
                    'name'      => 'gs_drib_link_tar',
                    'label'     => __( 'Shots Link Target', 'gs-dribbble' ),
                    'desc'      => __( 'Specify target to load the Links, Default New Tab ', 'gs-dribbble' ),
                    'type'      => 'select',
                    'default'   => '_blank',
                    'options'   => array(
                        '_blank'    => 'New Tab',
                        '_self'     => 'Same Window'
                    )
                ),

                // Dribbble Custom CSS
                array(
                    'name'    => 'gs_drib_custom_css',
                    'label'   => __( 'Dribbble Custom CSS', 'gs-dribbble' ),
                    'desc'    => __( 'You can write your own custom css', 'gs-dribbble' ),
                    'type'    => 'textarea'
                )    
            )
        );

        return $settings_fields;
    }

    function plugin_page() {
        settings_errors();
        echo '<div class="wrap gs_drib_wrap" style="width: 845px; float: left;">';
        // echo '<div id="post-body-content">';

        $this->settings_api->show_navigation();
        $this->settings_api->show_forms();

        echo '</div>';

        ?> 
            <div class="gswps-admin-sidebar" style="width: 277px; float: left; margin-top: 62px;">
                <div class="postbox">
                    <h3 class="hndle"><span><?php _e( 'Support / Report a bug' ) ?></span></h3>
                    <div class="inside centered">
                        <p>Please feel free to let me know if you got any bug to report. Your report / suggestion can make the plugin awesome!</p>
                        <p style="margin-bottom: 1px! important;"><a href="https://www.gsamdani.com/support" target="_blank" class="button button-primary">Get Support</a></p>
                    </div>
                </div>
                <div class="postbox">
                    <h3 class="hndle"><span><?php _e( 'Buy me a coffee' ) ?></span></h3>
                    <div class="inside centered">
                        <p>If you like the plugin, please buy me a coffee to inspire me to develop further.</p>
                        <p style="margin-bottom: 1px! important;"><a href='https://www.2checkout.com/checkout/purchase?sid=202460873&quantity=1&product_id=8' class="button button-primary" target="_blank">Donate</a></p>
                    </div>
                </div>

                <div class="postbox">
                    <h3 class="hndle"><span><?php _e( 'Join GS Plugins on facebook' ) ?></span></h3>
                    <div class="inside centered">
                        <iframe src="//www.facebook.com/plugins/likebox.php?href=https://www.facebook.com/gsplugins&amp;width&amp;height=258&amp;colorscheme=dark&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false&amp;appId=723137171103956" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:250px; height:220px;" allowTransparency="true"></iframe>
                    </div>
                </div>

                <div class="postbox">
                    <h3 class="hndle"><span><?php _e( 'Follow GS Plugins on twitter' ) ?></span></h3>
                    <div class="inside centered">
                        <a href="https://twitter.com/gsplugins" target="_blank" class="button button-secondary">Follow @gsplugins<span class="dashicons dashicons-twitter" style="position: relative; top: 3px; margin-left: 3px; color: #0fb9da;"></span></a>
                    </div>
                </div>
            </div>
        <?php
    }


    /**
     * Get all the pages
     *
     * @return array page names with key value pairs
     */
    function get_pages() {
        $pages = get_pages();
        $pages_options = array();
        if ( $pages ) {
            foreach ($pages as $page) {
                $pages_options[$page->ID] = $page->post_title;
            }
        }

        return $pages_options;
    }

}
endif;

$settings = new GS_dribbble_Settings_Config();
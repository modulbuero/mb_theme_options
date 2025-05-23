<?php
/**
 * le functions.php
 */


/** **************************************** *
 * enqueue styles and scripts for backend
 */ 
function mbt_enqueue_theme_options() {
	$jsPath		= get_stylesheet_directory_uri(). '/assets/js/';
	$assetPath 	= get_stylesheet_directory_uri(). '/assets/css/';
    $pagesWithImageUploads = [
        'theme-options',
        'theme-options-ci',
    ];
    if (isset( $_GET['page']) && in_array($_GET['page'], $pagesWithImageUploads) ) {
        //imape upload
        wp_enqueue_media();
	}	
        //color picker
        #wp_enqueue_style( 'wp-color-picker' );

        //all in one js
        wp_register_script(
            'theme_options', 
            $jsPath.'themeOptions.js', 
            array('jquery'), 
            '1.0'
        );
		wp_enqueue_script('theme_options');

        //BackenCSS
        wp_enqueue_style( 'themeOptions', $assetPath. 'admin_themeOptions.css' , array(), '1.0' );
        wp_enqueue_style( 'themeOptions-cabin', $assetPath. 'fontface-cabin.css' , array(), '1.0' );
        wp_enqueue_style( 'themeOptions-montserrat', $assetPath. 'fontface-montserrat.css' , array(), '1.0' );
        wp_enqueue_style( 'themeOptions-raleway', $assetPath. 'fontface-raleway.css' , array(), '1.0' );
        wp_enqueue_style( 'themeOptions-roboto', $assetPath. 'fontface-roboto.css' , array(), '1.0' );
        wp_enqueue_style( 'themeOptions-ptsans', $assetPath. 'fontface-ptsans.css' , array(), '1.0' );
        wp_enqueue_style( 'themeOptions-quicksand', $assetPath. 'fontface-quicksand.css' , array(), '1.0' );
        wp_enqueue_style( 'themeOptions-notosans', $assetPath. 'fontface-notosans.css' , array(), '1.0' );
		wp_enqueue_style( 'themeOptions-garamond', $assetPath. 'fontface-garamond.css' , array(), '1.0' );
        wp_enqueue_style( 'themeOptions-karantina', $assetPath. 'fontface-karantina.css' , array(), '1.0' );
		wp_enqueue_style( 'themeOptions-merriweather', $assetPath. 'fontface-merriweather.css' , array(), '1.0' );
		wp_enqueue_style( 'themeOptions-dancingscript', $assetPath. 'fontface-dancingscript.css' , array(), '1.0' );
		wp_enqueue_style( 'themeOptions-qwitchergrypen', $assetPath. 'fontface-qwitchergrypen.css' , array(), '1.0' );
}
add_action('admin_enqueue_scripts', 'mbt_enqueue_theme_options');
add_action('login_enqueue_scripts', 'mbt_enqueue_theme_options');


/** **************************************** *
 * enqueue CSS for Font
 */ 
function themeFont(){
    $fontUberschrift = get_option('mb_theme_ci_fonts_ueberschrift');
    $fontStandard    = get_option('mb_theme_ci_fonts_standardtext');
    $fontMenu        = get_option('mb_theme_ci_fonts_menuefont');
    $assetPath 		 = get_stylesheet_directory_uri(). '/assets/css/';
    
    //Get Cabin Font
    if($fontUberschrift == 'Cabin' || $fontStandard == 'Cabin' || $fontMenu == 'Cabin'){
        wp_enqueue_style( 'themeOptions-cabin', $assetPath . 'fontface-cabin.css', array(), '1.0' );
    }
    //Get Montserrat Font
    if($fontUberschrift == 'Montserrat' || $fontStandard == 'Montserrat' || $fontMenu == 'Montserrat'){
        wp_enqueue_style( 'themeOptions-montserrat', $assetPath . 'fontface-montserrat.css', array(), '1.0' );
    }
    //Get Roboto Font
    if($fontUberschrift == 'Roboto' || $fontStandard == 'Roboto' || $fontMenu == 'Roboto'){
        wp_enqueue_style( 'themeOptions-roboto', $assetPath . 'fontface-roboto.css', array(), '1.0' );
    }
    //Get Raleway Font
    if($fontUberschrift == 'Raleway' || $fontStandard == 'Raleway' || $fontMenu == 'Raleway'){
        wp_enqueue_style( 'themeOptions-raleway', $assetPath . 'fontface-raleway.css', array(), '1.0' );
    }
    //Get PTSans Font
    if($fontUberschrift == 'PTSans' || $fontStandard == 'PTSans' || $fontMenu == 'PTSans'){
        wp_enqueue_style( 'themeOptions-ptsans', $assetPath . 'fontface-ptsans.css', array(), '1.0' );
    }
    //Get Quicksand Font
    if($fontUberschrift == 'Quicksand' || $fontStandard == 'Quicksand' || $fontMenu == 'Quicksand'){
        wp_enqueue_style( 'themeOptions-quicksand', $assetPath . 'fontface-quicksand.css', array(), '1.0' );
    }
    //Get NotoSans Font
    if($fontUberschrift == 'NotoSans' || $fontStandard == 'NotoSans' || $fontMenu == 'NotoSans'){
        wp_enqueue_style( 'themeOptions-notosans', $assetPath . 'fontface-notosans.css', array(), '1.0' );
    }
    //Get Garamond Font
    if($fontUberschrift == 'Garamond' || $fontStandard == 'Garamond' || $fontMenu == 'Garamond'){
        wp_enqueue_style( 'themeOptions-garamond', $assetPath . 'fontface-garamond.css', array(), '1.0' );
    }
    //Get Garamond Font
    if($fontUberschrift == 'Karantina' || $fontStandard == 'Karantina' || $fontMenu == 'Karantina'){
        wp_enqueue_style( 'themeOptions-karantina', $assetPath . 'fontface-karantina.css', array(), '1.0' );
    }
	//Get Merriweather Font
    if($fontUberschrift == 'Merriweather' || $fontStandard == 'Merriweather' || $fontMenu == 'Merriweather'){
        wp_enqueue_style( 'themeOptions-merriweather', $assetPath . 'fontface-merriweather.css', array(), '1.0' );
    }
    //Get DancingScript Font
    if($fontUberschrift == 'DancingScript' || $fontStandard == 'DancingScript' || $fontMenu == 'DancingScript'){
        wp_enqueue_style( 'themeOptions-dancingscript', $assetPath . 'fontface-dancingscript.css', array(), '1.0' );
    }
    //Get DancingScript Font
    if($fontUberschrift == 'QwitcherGrypen' || $fontStandard == 'QwitcherGrypen' || $fontMenu == 'QwitcherGrypen'){
        wp_enqueue_style( 'themeOptions-qwitchergrypen', $assetPath . 'fontface-qwitchergrypen.css', array(), '1.0' );
    }
}
add_action('wp_enqueue_scripts', 'themeFont');

if(get_option('mb_theme_ci_fonts_ueberschrift-align') == "on" ){
	function alignHeadline(){
		echo "<style id='mb-alignHeadline'>h1,h2, h3{text-align:center}</style>";
	}
	add_action('wp_head', 'alignHeadline');
}

/** **************************************** *
 * enqueue CSS/JS for Frontend Footer
 */ 
function themeCSS(){
	$jsPath		= get_stylesheet_directory_uri(). '/assets/js/';
	$assetPath 	= get_stylesheet_directory_uri(). '/assets/css/';
    wp_enqueue_style( 'themeOptions', $assetPath . 'frontend_themeOptions.css', array(), '1.0' );
    wp_enqueue_script('themeOptions', $jsPath . 'themeOptions_frontend.js',array('jquery'), '1.0');
}
add_action('get_footer', 'themeCSS', 1000);


/** **************************************** *
* 	Theme Support, Nav-Location; deregister Sidebar
*/
function themeOptions_theme_support(){
    add_theme_support( 'menus' );
    register_nav_menus(
        array(
            'footer-2'  => 'Footermenü Spalte 2',
            'footer-3'  => 'Footermenü Spalte 3',
            'footer-4'  => 'Footermenü Spalte 4',
        )
    );
    
    add_theme_support('custom-spacing');
    add_theme_support( 'appearance-tools' );
    #add_theme_support('wp-block-styles');
    
    if(is_registered_sidebar('mb-header-sidebar')){
		unregister_sidebar( 'mb-header-sidebar' );
	}
}
add_action( 'admin_init', 'themeOptions_theme_support',0 );
#remove_action( 'widgets_init', 'mb_setup_sidebar' );

/** **************************************** *
* 	aktivate Swiper, Bootstrap, Lightbox, Extend Blocks
*/
function activateMBTheme_Lib(){

    if(get_option('mb_libraries_swiper') == false)
        update_option( 'mb_libraries_swiper', 'on', '', 'yes' );

    if(get_option('mb_libraries_bootstrap') == false)
        update_option( 'mb_libraries_bootstrap', 'on', '', 'yes' );
        
    if(get_option('mbgi_unlock_blocks_option_modulbuero/extendborder') == false)
        update_option( 'mbgi_unlock_blocks_option_modulbuero/extendborder', 'on', '', 'yes' );

    if(get_option('mbgi_unlock_blocks_option_modulbuero/extendgroup') == false)
        update_option( 'mbgi_unlock_blocks_option_modulbuero/extendgroup', 'on', '', 'yes' );  
        
    if(get_option("mb_lightbox_active")== false)
        update_option( 'mb_lightbox_active', 'on', '', 'yes' ); 
        
    if(get_option("mb_libraries_gsap") == false)
        update_option( 'mb_libraries_gsap', 'on', '', 'yes' );
        
	if(get_option('mb_libraries_leaflet') == false)
		update_option( 'mb_libraries_leaflet', 'on', '', 'yes' );
		
    if(get_option('mbgi_unlock_blocks_option_modulbuero/post-loop') == false){
		update_option( 'mbgi_unlock_blocks_option_modulbuero/post-loop', 'on', '', 'yes' );  
    }
/*	Sollte bei der Installationsroutine eingeschaltet werden 
	if(get_option("mb_kommentare_aus") == false){
		update_option( 'mb_kommentare_aus', 'on', '', 'yes' );
	}
*/

}
add_action("admin_init","activateMBTheme_Lib");

/** **************************************** *
* 	MB Blöcke aktivieren
*/
add_action("admin_init","activateMBTheme_Blocks");
function activateMBTheme_Blocks(){

	if(get_option('mbgi_unlock_blocks_option_modulbuero/mb_user_options_socialmedia') == false)
        update_option( 'mbgi_unlock_blocks_option_modulbuero/mb_user_options_socialmedia', 'on', '', 'yes' );

	if(get_option('mbgi_unlock_blocks_option_modulbuero/akkordeon') == false)
        update_option( 'mbgi_unlock_blocks_option_modulbuero/akkordeon', 'on', '', 'yes' );

	if(get_option('mbgi_unlock_blocks_option_modulbuero/ansprechpartner') == false)
        update_option( 'mbgi_unlock_blocks_option_modulbuero/ansprechpartner', 'on', '', 'yes' );
        
    if(get_option('mbgi_unlock_blocks_option_modulbuero/stoerer') == false)
        update_option( 'mbgi_unlock_blocks_option_modulbuero/stoerer', 'on', '', 'yes' );

    if(get_option('mbgi_unlock_blocks_option_modulbuero/bild-lupe') == false)
        update_option( 'mbgi_unlock_blocks_option_modulbuero/bild-lupe', 'on', '', 'yes' );
        
    if(get_option('mbgi_unlock_blocks_option_modulbuero/openstreetmap') == false)
        update_option( 'mbgi_unlock_blocks_option_modulbuero/openstreetmap', 'on', '', 'yes' );
        
    if(get_option('mbgi_unlock_blocks_option_modulbuero/karussell') == false)
        update_option( 'mbgi_unlock_blocks_option_modulbuero/karussell', 'on', '', 'yes' );
        
    if(get_option('mbgi_unlock_blocks_option_modulbuero/teaserbox') == false)
        update_option( 'mbgi_unlock_blocks_option_modulbuero/teaserbox', 'on', '', 'yes' );
        
    if(get_option('mbgi_unlock_blocks_option_modulbuero/bootstrap-icons') == false)
        update_option( 'mbgi_unlock_blocks_option_modulbuero/bootstrap-icons', 'on', '', 'yes' );
        
    if(get_option('mbgi_unlock_blocks_option_modulbuero/countdown') == false)
        update_option( 'mbgi_unlock_blocks_option_modulbuero/countdown', 'on', '', 'yes' );

    if(get_option('mbgi_unlock_blocks_option_modulbuero/tabs') == false)
        update_option( 'mbgi_unlock_blocks_option_modulbuero/tabs', 'on', '', 'yes' );
                
    if(get_option('mbgi_unlock_blocks_option_modulbuero/socialmedia') == false)
        update_option( 'mbgi_unlock_blocks_option_modulbuero/socialmedia', 'on', '', 'yes' );
        
    if(get_option('mbgi_unlock_blocks_option_modulbuero/number-count') == false)
        update_option( 'mbgi_unlock_blocks_option_modulbuero/number-count', 'on', '', 'yes' );
    
    if(get_option('mbgi_unlock_blocks_option_modulbuero/ytubepopup') == false)
        update_option( 'mbgi_unlock_blocks_option_modulbuero/ytubepopup', 'on', '', 'yes' );
	
	//Extends
	if(get_option('mbgi_unlock_blocks_option_modulbuero/modulbuero/extendborder') == false)
        update_option( 'mbgi_unlock_blocks_option_modulbuero/extendborder', 'on', '', 'yes' );
	if(get_option('mbgi_unlock_blocks_option_modulbuero/extendCoverParallax') == false)
        update_option( 'mbgi_unlock_blocks_option_modulbuero/extendCoverParallax', 'on', '', 'yes' );
	if(get_option('mbgi_unlock_blocks_option_modulbuero/modulbuero/extendblur') == false)
        update_option( 'mbgi_unlock_blocks_option_modulbuero/extendblur', 'on', '', 'yes' );
	if(get_option('mbgi_unlock_blocks_option_modulbuero/extendshadow') == false)
        update_option( 'mbgi_unlock_blocks_option_modulbuero/extendshadow', 'on', '', 'yes' );
	if(get_option('mbgi_unlock_blocks_option_modulbuero/extendImageLoader') == false)
        update_option( 'mbgi_unlock_blocks_option_modulbuero/extendImageLoader', 'on', '', 'yes' );
	if(get_option('mbgi_unlock_blocks_option_modulbuero/extendgroup') == false)
        update_option( 'mbgi_unlock_blocks_option_modulbuero/extendgroup', 'on', '', 'yes' );

}


/** **************************************** *
*	Menüpunkte und Tools Sperren
*/
//is_Superadminuser
if( !function_exists('is_antwortzeit_admin_user') ){ function is_antwortzeit_admin_user() {
	if ( is_user_logged_in() ){
		global $current_user;
		wp_get_current_user();
		if( in_array( $current_user->user_email, antwortzeit_admin_emails() ) ){
			return true;
		}
	}
	return false;
} }
if( !function_exists( 'antwortzeit_if_check' ) ) {
	function antwortzeit_if_check( $variable = false ) {
		if( isset($variable) && !empty($variable) && $variable && !is_wp_error($variable) ){
			return true;
		}else{
			return false;
		}
	}
}
function antwortzeit_rewrite_flush() {
	flush_rewrite_rules( false );
}

if( !function_exists('antwortzeit_admin_emails')) { function antwortzeit_admin_emails( $format = 'array' ) {
	$admin_emails = array(
		'webmaster@modulbuero.com',
		'webseiten@modulbuero.com'
	);
	if( $format == 'array' ){
		return $admin_emails;
	}
	return false;
} }

//Abgesperrte URLs
function mbgi_backend_absperren( $current_screen ) {
	$absperren = array(
		'theme-editor',
		'update-core',
		'themes',
		'tools',
		#'options-general',
		'options-writing',
		#'options-reading',
		'options-media',
		'options-permalink',
		'customize'
	);
	
	if( !is_antwortzeit_admin_user() && in_array( $current_screen->id, $absperren ) ) {
		wp_redirect( add_query_arg( array( 'abgesperrt' => $current_screen->id ), get_admin_url() ) );
   		exit();
	}
}
add_action( 'current_screen', 'mbgi_backend_absperren' );

//RemoveMenu
function antwortzeit_clean_up_backend() {
	remove_meta_box( 'dashboard_primary', 'dashboard', 'core' );
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'core' );
	if( !is_antwortzeit_admin_user() ) {
		remove_meta_box( 'dashboard_plugins', 'dashboard', 'core' );
		remove_menu_page( 'tools.php' );	
		remove_submenu_page( 'index.php', 'update-core.php' );
		remove_submenu_page( 'themes.php', 'theme-editor.php' );
		remove_submenu_page( 'themes.php', 'themes.php' );
		remove_submenu_page( 'themes.php', 'customizer' ); 
        remove_submenu_page( 'themes.php', 'site-editor.php?path=/patterns' ); 
		#remove_submenu_page( 'options-general.php', 'options-general.php' );
		remove_submenu_page( 'options-general.php', 'options-writing.php' );
		#remove_submenu_page( 'options-general.php', 'options-reading.php' );
		remove_submenu_page( 'options-general.php', 'options-media.php' );
		remove_submenu_page( 'options-general.php', 'options-permalink.php' );
		remove_submenu_page( 'options-general.php', 'duplicatepost' );
		remove_menu_page( 'admin-einrichtung' );
        remove_submenu_page( 'theme-options', 'theme-options-exportimport' );
	}
}
add_action( 'admin_menu', 'antwortzeit_clean_up_backend', 99 );
remove_action('welcome_panel', 'wp_welcome_panel');

/** 
 *	remove link to Design (themes.php) and Customizer (customize.php) if user is not SuperAdministrator
 *	https://stackoverflow.com/questions/25788511/remove-submenu-page-customize-php-in-wordpress-4-0
 */
function theme_options_remove_admin_menu_links(){
	
    if( !is_super_admin() ) {    	
		global $submenu;
			//Unterpunkt Design
		if ( isset( $submenu[ 'themes.php' ] ) ) { 
			//jeder Menüpunkt ist ein Array (das erste Array is der Link hinter Design)
	        foreach ( $submenu[ 'themes.php' ] as $index => $menu_item ) { 
		        //sucht Customizer und Themes
	            if ( in_array( 'Customizer', $menu_item ) || in_array( 'Themes', $menu_item ) || in_array( 'Patterns', $menu_item )) { 
					//entfernt den Customizer und die Themes
	                unset( $submenu[ 'themes.php' ][ $index ] ); 
	            }
	        }
			//erstes Element im Array wird auch zum Link hinter dem Obermenü Design
	    	#array_unshift($submenu[ 'themes.php' ], $submenu[ 'themes.php' ][array_key_first($submenu[ 'themes.php' ])]); 
		}	 
	}
}	
add_action('admin_menu', 'theme_options_remove_admin_menu_links', 99);

add_action( 'wp_before_admin_bar_render', 'mbgi_before_admin_bar_render' ); 
function mbgi_before_admin_bar_render(){
    global $wp_admin_bar;

    $wp_admin_bar->remove_menu('customize');
    if( !is_antwortzeit_admin_user() ) {
		$wp_admin_bar->remove_menu('my-sites');
	}
}

function theme_options_help_tab_entfernen() {
    $screen = get_current_screen();
	if( method_exists( $screen, 'remove_help_tabs') ) {
	    $screen->remove_help_tabs();
	}
}
add_action('admin_head', 'theme_options_help_tab_entfernen');

if( !is_antwortzeit_admin_user() ) {
	remove_action( 'load-update-core.php', 'wp_update_themes' );
	add_filter( 'pre_site_transient_update_themes', '__return_null' );
	wp_clear_scheduled_hook( 'wp_update_themes' );
	remove_action( 'load-update-core.php', 'wp_update_plugins' );
	add_filter( 'pre_site_transient_update_plugins', '__return_null' );
	wp_clear_scheduled_hook( 'wp_update_plugins' );
	add_filter( 'pre_site_transient_update_core', '__return_null' );
	wp_clear_scheduled_hook( 'wp_version_check' );
}

remove_action( 'welcome_panel', 'wp_welcome_panel' );

/*
 *	Nachricht für abgesperrten Bereich
*/
function mbgi_backend_notices() {
	global $current_screen;
	if( $current_screen->id == 'dashboard' && isset( $_GET['abgesperrt'] ) && !empty( $_GET['abgesperrt'] ) ) {
    ?>
	    <div class="error">
	        <p><?php _e( 'Dieser Bereich ist nicht zugänglich.', 'gruene.antwortzeit' ); ?></p>
	    </div>
    <?php
    }
}
add_action( 'admin_notices', 'mbgi_backend_notices' );


//Favicon
add_action('wp_head', 'dei_favicon');
function dei_favicon(){
	$iconpath = get_option('mb_theme_ci_favicon32');
	if(!empty($iconpath)){
		echo '<link rel="icon" id="easyfav" href="'.$iconpath.'">';
	}
}


//Has Transparent header
add_filter( 'body_class','mb_theme_body_classes' );
function mb_theme_body_classes( $classes ) {
	if(get_option('mb_theme_layout_header_transparenz') == 'on'){
		$classes[] = 'mb-transp-header';
	}

    return $classes;    
}

//Verhindern das der Seuperuser auf Unterseiten entfernt wird.
add_action('init', function() {
    global $current_site, $super_admins;

    $super_admins = get_super_admins();
    foreach ($super_admins as $super_admin) {
        if (!is_super_admin($super_admin)) {
            grant_super_admin($super_admin);
        }
    }

    if (!is_user_member_of_blog($super_admin, get_current_blog_id())) {
        add_user_to_blog(get_current_blog_id(), $super_admin, 'administrator');
    }
});

/*Menuname Ninja Forms in Formulare*/
function mb_rename_ninja_forms_menu() {
    global $menu;
    foreach ($menu as $key => $item) {
        if ($item[0] == 'Ninja Forms') {
            $menu[$key][0] = 'Formulare';
        }
    }
}
add_action('admin_menu', 'mb_rename_ninja_forms_menu', 999);

/*Redirection und Wartungsmodus nach Einstellungen verschieben*/
function customize_admin_menu() {
	if(is_plugin_active('redirection/redirection.php')){	
	    $menu_slug = 'redirection.php'; // Der originale Menü-Slug
	    $menu_title = 'Weiterleitungen'; 
	    $capability = 'manage_options';
	
	    add_submenu_page(
	        'options-general.php', // Zielmenü (Einstellungen)
	        $menu_title, 
	        $menu_title, 
	        $capability, 
	        'redirect-to-redirection', // Neuer Slug für das Menü
			'redirect_to_redirection_page'
	    );
    }
    
    	
    $menu_slug_w = 'mb_wartungsmodus_options'; // Der originale Menü-Slug
    $menu_title_w = 'Wartungsmodus'; 
    $capability_w = 'manage_options';

    add_submenu_page(
        'options-general.php', // Zielmenü (Einstellungen)
        $menu_slug_w, 
        $menu_title_w, 
        $capability_w, 
        'redirect-to-wartungsmodus', // Neuer Slug für das Menü
		'redirect_to_wartungsmodus_page'
    );

}
function redirect_to_redirection_page() {
	echo "<h2>Weiterleitung</h2>";
    echo '<meta http-equiv="refresh" content="0;url='.admin_url('tools.php?page=redirection.php').'">';
    exit;
}

function redirect_to_wartungsmodus_page() {
	echo "<h2>Wartungsmodus</h2>";
    echo '<meta http-equiv="refresh" content="0;url='.admin_url('tools.php?page=mb_wartungsmodus_options').'">';
}
add_action('admin_menu', 'customize_admin_menu', 999);

function custom_gutenberg_color_palette() {
    add_theme_support('editor-color-palette', [
        ['name' => 'Hauptfarbe', 'slug' => 'primary', 'color' => get_option('mb_theme_ci_farbe_hauptfarbe')],
        ['name' => 'Sekundärfarbe', 'slug' => 'secondary', 'color' => get_option('mb_theme_ci_farbe_sekundaerfarbe')],
        ['name' => 'Verlinkung', 'slug' => 'tertiary', 'color' => get_option('mb_theme_ci_farbe_linkfarbe')],
    ]);
}
add_action('after_setup_theme', 'custom_gutenberg_color_palette');

/**
 * Widget Siedebar Post Header
 */
function mbto_setup_sidebar() {
	
    register_sidebar( array(
		'name'          => 'After Header',
		'id'            => 'mbto-post-header',
		'description'   => 'Hier können Sie dem Header (Menüzeile) weitere Inhalte hinzufügen.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
	) );
}
add_action( 'widgets_init', 'mbto_setup_sidebar', 99);

function debug_all_sidebars() {
    global $wp_registered_sidebars;
    echo '<pre id="loremledih">';
    print_r(array_keys($wp_registered_sidebars));
    echo '</pre>';
}
//add_action('wp_footer', 'debug_all_sidebars');
<?php
/** 
 * Corporate Kacheln
 */

function layoutLoopTile_info () {
    echo wpautop( "Beispieltext für den Reiter Typografie." );
}

// Optionsfelder definieren
function themeOptions_layout_looptile() {
	// Variable
	$settingName= 'mb_theme_layout_looptile_'; 		// Eintrag der OptionsID
	$sectionID 	= $settingName.'section_id';
	$fieldName 	= $sectionID;
	$sanitize 	= 'sanitize_text_field';
	$slug		= 'theme_options_layout_looptile';
	
	// Regestrierung der MainSection
	add_settings_section(
		$sectionID, 	// section ID
		'', 			// Titel (optional)
		'', 			// callback function (optional)
		$slug			// page-slug
	);


	//Datum ausblenden
	register_setting(
		$fieldName,
		$settingName.'hidedate',
		$sanitize
	);
	add_settings_field(
		$settingName.'hidedate',
		'Datum ausblenden',						
		$settingName.'hidedate', // callback für den inhalt des feldes
		$slug, 		
		$sectionID,
		array(
			'label_for' => $settingName.'hidedate',
			'class' 	=> $settingName
		)
	);

	//Beitragstyp anzeigen
	register_setting(
		$fieldName,
		$settingName.'showposttype',
		$sanitize
	);
	add_settings_field(
		$settingName.'showposttype',
		'Beitragstyp anzeigen<br><span>Nützlich bei mehreren Inhaltstypen</span>',
		$settingName.'showposttype', // callback für den inhalt des feldes
		$slug, 		
		$sectionID,
		array(
			'label_for' => $settingName.'showposttype',
			'class' 	=> $settingName
		)
	);

	//Beitragstyp anzeigen
	register_setting(
		$fieldName,
		$settingName.'show_category',
		$sanitize
	);
	add_settings_field(
		$settingName.'show_category',
		'Kategorie ausblenden',						
		$settingName.'show_category', // callback für den inhalt des feldes
		$slug, 		
		$sectionID,
		array(
			'label_for' => $settingName.'show_category',
			'class' 	=> $settingName
		)
	);
};

/* ********************************
	Optionsfelder
*/
function mb_theme_layout_looptile_hidedate(){
	$getOption = get_option('mb_theme_layout_looptile_hidedate');
    echo '<input type="checkbox" name="mb_theme_layout_looptile_hidedate" value="hide-date" '.($getOption=="hide-date" ? "checked": "").' />';	
}

function mb_theme_layout_looptile_show_category(){
	$getOption = get_option('mb_theme_layout_looptile_show_category');
    echo '<input type="checkbox" name="mb_theme_layout_looptile_show_category" value="show_category" '.($getOption=="show_category" ? "checked": "").' />';	
}

function mb_theme_layout_looptile_showposttype(){
	$getOption = get_option('mb_theme_layout_looptile_showposttype');
    echo '<input type="checkbox" name="mb_theme_layout_looptile_showposttype" value="show-posttype" '.($getOption=="show-posttype" ? "checked": "").' />';	
}
/* ********************************
    Add/Remove Classnames
*/
if(get_option('mb_theme_layout_looptile_hidedate') == "hide-date"){
    function add_loopdate_class( $classes ) {
        $classes[] = 'mb-hide-lopp-date';
        return $classes;
    }
    add_filter('post_class','add_loopdate_class');

	function add_loopdate_class_single( $classes ) {
		if ( is_single() ) {
			$classes[] = 'mb-hide-lopp-date';
		}
		return $classes;
	}
	add_filter( 'body_class', 'add_loopdate_class_single');
}

if(get_option('mb_theme_layout_looptile_show_category') == "show_category"){

	function add_show_category_class_single( $classes ) {
		if ( is_single() ) {
			$classes[] = 'mb-hide-category';
		}
		return $classes;
	}
	add_filter( 'body_class', 'add_show_category_class_single');
}

if(get_option('mb_theme_layout_looptile_showposttype') == "show-posttype"){
    function add_show_posttype_class( $classes ) {
        $classes[] = 'mb-show-posttype';
        return $classes;
    }
    add_filter('post_class','add_show_posttype_class');
}

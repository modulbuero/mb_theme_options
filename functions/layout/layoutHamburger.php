<?php
/** 
 * Corporate Hamburger
 */

function layoutHamburger_info () {
    echo wpautop( "Direkt das Hamburgermenü sichtbar machen." );
}

// Optionsfelder definieren
function themeOptions_layout_hamburger_an() {
	// Variable
	$settingName= 'mb_hamburger_an'; 		// Eintrag der OptionsID
	$sectionID 	= $settingName.'_section_id';
	$fieldName 	= $sectionID;
	$sanitize 	= 'sanitize_text_field';
	$slug		= 'theme_options_layout_hamburger_an';
	
	// Regestrierung der MainSection
	add_settings_section(
		$sectionID, 	// section ID
		'', 			// Titel (optional)
		'', 			// callback function (optional)
		$slug			// page-slug
	);


	//hamburger Ecken
	register_setting(
		$fieldName,
		$settingName,
		$sanitize
	);
	add_settings_field(
		$settingName,
		'Hamburgermenü aktivieren',						
		$settingName.'_html_theme_option', // callback für den inhalt des feldes
		$slug, 		
		$sectionID,
		array(
			'label_for' => $settingName,
			'class' 	=> $settingName
		)
	);
};

/* ********************************
	Optionsfelder
*/
function mb_hamburger_an_html_theme_option(){
	$inhalt = get_option('mb_hamburger_an');
	$checked = (!empty($inhalt))?"checked":"";
	printf('<input type="checkbox" id="mb_hamburger_an" name="mb_hamburger_an" '.$checked.'/>', esc_attr($inhalt));
}

/* ********************************
    Add/Remove Classnames
*/
if(get_option('mb_theme_layout_hamburger_hamburgercorner') == "mb-nobtncorner"){
    function removeRoundhamburger(){
		//echo "<style id='mb-nobtncorner'>.loop + .pagination-wrap .more .more-link, #submit, .wp-block-hamburger__link{border-radius:0}</style>";
	}
	add_action('wp_footer', 'removeRoundhamburger', 999);
}
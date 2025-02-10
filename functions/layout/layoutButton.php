<?php
/** 
 * Corporate Button
 */

function layoutButton_info () {
    echo wpautop( "Beispieltext für den Reiter Button." );
}

// Optionsfelder definieren
function themeOptions_layout_button() {
	// Variable
	$settingName= 'mb_theme_layout_button_'; 		// Eintrag der OptionsID
	$sectionID 	= $settingName.'section_id';
	$fieldName 	= $sectionID;
	$sanitize 	= 'sanitize_text_field';
	$slug		= 'theme_options_layout_button';
	
	// Regestrierung der MainSection
	add_settings_section(
		$sectionID, 	// section ID
		'', 			// Titel (optional)
		'', 			// callback function (optional)
		$slug			// page-slug
	);


	//Button Ecken
	register_setting(
		$fieldName,
		$settingName.'buttoncorner',
		$sanitize
	);
	add_settings_field(
		$settingName.'buttoncorner',
		'keine Rundung',						
		$settingName.'buttoncorner', // callback für den inhalt des feldes
		$slug, 		
		$sectionID,
		array(
			'label_for' => $settingName.'buttoncorner',
			'class' 	=> $settingName
		)
	);
};

/* ********************************
	Optionsfelder
*/
function mb_theme_layout_button_buttoncorner(){
	$getOption = get_option('mb_theme_layout_button_buttoncorner');
    echo '<input type="checkbox" name="mb_theme_layout_button_buttoncorner" value="mb-nobtncorner" '.($getOption=="mb-nobtncorner" ? "checked": "").' />';	
}

/* ********************************
    Add/Remove Classnames
*/
if(get_option('mb_theme_layout_button_buttoncorner') == "mb-nobtncorner"){
    function removeRoundButton(){
		echo "<style id='mb-nobtncorner'>.loop + .pagination-wrap .more .more-link, #submit, .wp-block-button__link,.nf-form-content input[type=submit]{border-radius:0}</style>";
	}
	add_action('wp_footer', 'removeRoundButton', 999);
}
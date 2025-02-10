<?php
/** 
 * Corporate Typografie
 */

function layoutHeader_info () {
    echo wpautop( "Beispieltext für den Reiter Typografie." );
}

// Optionsfelder definieren
function themeOptions_layout_header() {
	// Variable
	$settingName= 'mb_theme_layout_header_'; 		// Eintrag der OptionsID
	$sectionID 	= $settingName.'section_id';
	$fieldName 	= $sectionID;
	$sanitize 	= 'sanitize_text_field';
	$slug		= 'theme_options_layout_header';
	
	// Regestrierung der MainSection
	add_settings_section(
		$sectionID, 	// section ID
		'', 			// Titel (optional)
		'', 			// callback function (optional)
		$slug			// page-slug
	);


	//Headeranordnung
	register_setting(
		$fieldName,
		$settingName.'anordnung',
		$sanitize
	);
	add_settings_field(
		$settingName.'anordnung',
		'Anordnung',						
		$settingName.'anordnung', // callback für den inhalt des feldes
		$slug, 		
		$sectionID,
		array(
			'label_for' => $settingName.'anordnung',
			'class' 	=> $settingName
		)
	);

	//Transparenz
	register_setting(
		$fieldName,
		$settingName.'transparenz',
		$sanitize
	);
	add_settings_field(
		$settingName.'transparenz',
		'Transparente Headerzeile',						
		$settingName.'transparenz', // callback für den inhalt des feldes
		$slug, 		
		$sectionID,
		array(
			'label_for' => $settingName.'transparenz',
			'class' 	=> $settingName
		)
	);

	//Titel
	register_setting(
		$fieldName,
		$settingName.'title',
		$sanitize
	);
	add_settings_field(
		$settingName.'title',
		'Titel anzeigen',						
		$settingName.'title', // callback für den inhalt des feldes
		$slug, 		
		$sectionID,
		array(
			'label_for' => $settingName.'title',
			'class' 	=> $settingName
		)
	);
	
};

/* ********************************
	Optionsfelder
*/
function mb_theme_layout_header_anordnung(){
	$getOption = get_option('mb_theme_layout_header_anordnung');
	#$inhalt = ($getOption === false || $getOption == "")?"lmf":$getOption;
	
	echo "<div style='margin-bottom: 10px;'>";
		echo '<input type="radio" id="mb_theme_layout_header_anordnung-1" name="mb_theme_layout_header_anordnung" value="lmf" '.($getOption=="lmf" ? "checked": "").' />';
		echo '<label for="mb_theme_layout_header_anordnung-1">
			Logo - Menü - Freiraum
		</label>';
	echo "</div>";

	echo "<div style='margin-bottom: 10px;'>";
		echo '<input type="radio" id="mb_theme_layout_header_anordnung-2"  name="mb_theme_layout_header_anordnung" value="lfm" '.($getOption=="lfm" ? "checked": "").' />';
		echo '<label for="mb_theme_layout_header_anordnung-2">
			Logo - Freiraum - Menü
		</label>';
	echo "</div>";
	
	echo "<div style='margin-bottom: 10px;'>";
		echo '<input type="radio" id="mb_theme_layout_header_anordnung-3"  name="mb_theme_layout_header_anordnung" value="fml"' .($getOption=="fml" ? "checked": "").' />';
		echo '<label for="mb_theme_layout_header_anordnung-3">
			Freiraum - Menü - Logo
		</label>';
	echo "</div>";

	echo "<div style='margin-bottom: 10px;'>";
		echo '<input type="radio" id="mb_theme_layout_header_anordnung-4"  name="mb_theme_layout_header_anordnung" value="flm" '.($getOption=="flm" ? "checked": "").' />';
		echo '<label for="mb_theme_layout_header_anordnung-4">
			Freiraum - Logo - Menü
		</label>';
	echo "</div>";
}

function mb_theme_layout_header_transparenz(){
	$inhalt = get_option('mb_theme_layout_header_transparenz');
	$checked = (!empty($inhalt))?"checked":"";
	printf('<input type="checkbox" id="mb_theme_layout_header_transparenz" name="mb_theme_layout_header_transparenz" '.$checked.'/>', esc_attr($inhalt));
}

function mb_theme_layout_header_title(){
	$inhalt = get_option('mb_theme_layout_header_title');
	$checked = (!empty($inhalt))?"checked":"";
	printf('<input type="checkbox" id="mb_theme_layout_header_title" name="mb_theme_layout_header_title" '.$checked.'/>', esc_attr($inhalt));
}
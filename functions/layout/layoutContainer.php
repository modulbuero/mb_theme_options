<?php 

// Optionsfelder definieren
function themeOptions_layout_container () {
	// Variable
	$settingName= 'mb_theme_layout_container_'; 		// Eintrag der OptionsID
	$sectionID 	= $settingName.'section_id';
	$fieldName 	= $sectionID;
	$sanitize 	= 'sanitize_text_field';
	$slug		= 'theme-options_layout-container';
	
	// Regestrierung der MainSection
	add_settings_section(
		$sectionID, 	// section ID
		'', 			// Titel (optional)
		'', 			// callback function (optional)
		$slug			// page-slug
	);

    //Container Breite
	register_setting(
		$fieldName,
		$settingName.'containerbreite',   	  // option name
		$sanitize
	);
	add_settings_field(
		$settingName.'containerbreite',  	  //option name
		'Container Breite',						
		$settingName.'containerbreite', // callback für den inhalt des feldes
		$slug, 		
		$sectionID,
		array(
			'label_for' => $settingName.'containerbreite',
			'class' 	=> $settingName
		)
	);

	//Text Breite
	register_setting(
		$fieldName,
		$settingName.'textbreite',
		$sanitize
	);
	add_settings_field(
		$settingName.'textbreite',
		'Text Breite',						
		$settingName.'textbreite',
		$slug, 		
		$sectionID,
		array(
			'label_for' => $settingName.'textbreite',
			'class' 	=> $settingName
		)
	);

	//Container Abstand
	register_setting(
		$fieldName,
		$settingName.'containerabstand',
		$sanitize
	);
	add_settings_field(
		$settingName.'containerabstand',
		'Container-Abstand',						
		$settingName.'containerabstand',
		$slug, 		
		$sectionID,
		array(
			'label_for' => $settingName.'containerabstand',
			'class' 	=> $settingName
		)
	);

	//Text Abstand
	register_setting(
		$fieldName,
		$settingName.'textabstand',
		$sanitize
	);
	add_settings_field(
		$settingName.'textabstand',
		'Text Abstand',
		$settingName.'textabstand',
		$slug, 		
		$sectionID,
		array(
			'label_for' => $settingName.'textabstand',
			'class' 	=> $settingName
		)
	);
}

/**
 * Optionsfelder
 */
function mb_theme_layout_container_containerbreite () {
	?>
    	<input type='text' placeholder="1200" name='mb_theme_layout_container_containerbreite' id='mb_theme_layout_container_containerbreite' value='<?php echo get_option('mb_theme_layout_container_containerbreite'); ?>' /> px
        <br><br>
        <div><em>Die Contaionerbreite liegt idR zwischen 1000 und 1400 px.</em></div>
        <div><em>Der Standardwert ist mit 1200px vermerkt.</em></div>
    <?php
}

function mb_theme_layout_container_textbreite () {
	?>
    	<input type='text' placeholder="950" name='mb_theme_layout_container_textbreite' id='mb_theme_layout_container_textbreite' value='<?php echo get_option('mb_theme_layout_container_textbreite'); ?>' /> px
        <br><br>
        <div><em>Die Textbreite liegt idR zwischen 850 und 1200 px.</em></div>
        <div><em>Der Standardwert ist mit 950px vermerkt.</em></div>
		<div><em>Die Breite kann auch gleich der Containerbreite sein.</em></div>
		<div><em>Gruppen oder Spalten, die wiederrum in einer Gruppe liegen, erhalten ebenso die Textbreite.</em></div>
    <?php
}

function mb_theme_layout_container_containerabstand () {
	?>
    	<input type='text' placeholder="80" name='mb_theme_layout_container_containerabstand' id='mb_theme_layout_container_containerabstand' value='<?php echo get_option('mb_theme_layout_container_containerabstand'); ?>' /> px
        <br><br>
        <div><em>Der Abstand beträgt im Standard 80px</em></div>
        <div><em>Container sind Gruppen, Spalten, Cover.</em></div>
		<div><em>Aber auch der letzte Paragraph vor einem Container.</em></div>
    <?php
}

function mb_theme_layout_container_textabstand () {
	?>
    	<input type='text' placeholder="16" name='mb_theme_layout_container_textabstand' id='mb_theme_layout_container_textabstand' value='<?php echo get_option('mb_theme_layout_container_textabstand'); ?>' /> px
        <br><br>
        <div><em>Der Abstand beträgt im Standard 16px</em></div>
        <div><em>Texte sind Paragraphen, Listen.</em></div>
    <?php
}
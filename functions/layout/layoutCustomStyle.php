<?php
/** 
 * Corporate Kacheln
 */

function layoutCustomStyle_info () {
    echo wpautop( "Beispieltext für den Reiter Typografie." );
}

// Optionsfelder definieren
function themeOptions_layout_customstyle() {
	// Variable
	$settingName= 'mb_theme_layout_customstyle_'; 		// Eintrag der OptionsID
	$sectionID 	= $settingName.'section_id';
	$fieldName 	= $sectionID;
	$sanitize 	= 'sanitize_text_field';
	$slug		= 'theme_options_layout_customstyle';
	
	// Regestrierung der MainSection
	add_settings_section(
		$sectionID, 	// section ID
		'', 			// Titel (optional)
		'', 			// callback function (optional)
		$slug			// page-slug
	);


	//Custom CSS Block
	//no sanitize because of textarea
	register_setting(
		$fieldName,
		$settingName.'customcss',
		//$sanitize
	);
	add_settings_field(
		$settingName.'customcss',
		'Benutzerdefiniertes CSS',						
		$settingName.'customcss', // callback für den inhalt des feldes
		$slug, 		
		$sectionID,
		array(
			'label_for' => $settingName.'customcss',
			'class' 	=> $settingName
		)
	);

	//Custom JS Block
	//no sanitize because of textarea
	register_setting(
		$fieldName,
		$settingName.'customjs',
		//$sanitize
	);
	add_settings_field(
		$settingName.'customjs',
		'Benutzerdefiniertes JavaScript',						
		$settingName.'customjs', // callback für den inhalt des feldes
		$slug, 		
		$sectionID,
		array(
			'label_for' => $settingName.'customjs',
			'class' 	=> $settingName
		)
	);
};

/** 
 *	Textfeld CSS
 */
function mb_theme_layout_customstyle_customcss(){
    ?>
	<textarea 
		type="textarea" 
		id="mb_theme_layout_customstyle_customcss_id"
		name="mb_theme_layout_customstyle_customcss"
		cols="80" 
		rows="15"
	><?php echo esc_textarea( get_option('mb_theme_layout_customstyle_customcss') ) ?>
	</textarea>
	<div>Die "&lt;style&gt;&lt;/style&gt;-Tags" werden nicht benötigt. Bitte das reine CSS eintragen.<br>
	Das CSS wird im <head> ausgegeben.<br>
	<b>ACHTUNG:</b> Eine fehlerhafte Syntax kann diverse Fehler im Frontend verursachen.</div>
	<?php
	/**
	 * script to allow tabs in textarea
	 */
	?>
	<script>
	function enableTab(id) {
		var el = document.getElementById(id);
		el.onkeydown = function(e) {
			if (e.keyCode === 9) { // tab was pressed
				// get caret position/selection
				var val = this.value,
					start = this.selectionStart,
					end = this.selectionEnd;
				// set textarea value to: text before caret + tab + text after caret
				this.value = val.substring(0, start) + '\t' + val.substring(end);
				// put caret at right position again
				this.selectionStart = this.selectionEnd = start + 1;
				// prevent the focus lose
				return false;
			}
		};
	}
	enableTab('mb_theme_layout_customstyle_customcss_id');
	</script>
	<?php

}

/** 
 *	Textfeld CSS
 */
function mb_theme_layout_customstyle_customjs(){
    ?>
	<textarea 
		type="textarea" 
		id="mb_theme_layout_customstyle_customjs_id"
		name="mb_theme_layout_customstyle_customjs"
		cols="80" 
		rows="15"
	><?php echo esc_textarea( get_option('mb_theme_layout_customstyle_customjs') ) ?>
	</textarea>
	<div>Die "&lt;script&gt;&lt;/script&gt;-Tags" werden nicht benötigt. Bitte das reine JS eintragen.<br>
	Der Code wird unter dem <footer> eingebunden und nach dem "load-Event" ausgeführt / $ = jQuery ist definiert<br>
	<b>ACHTUNG:</b> Eine fehlerhafte Syntax kann diverse Fehler im Frontend verursachen.</div>
	<?php
	/**
	 * script to allow tabs in textarea
	 */
	?>
	<script>
	//enableTab function see mb_theme_layout_customstyle_customcss()
	enableTab('mb_theme_layout_customstyle_customjs_id');
	</script>
	<?php

}

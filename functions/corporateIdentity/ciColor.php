<?php
/** 
 * Corporate Colors
 */

function ciColor_info () {
    echo wpautop( "Beispieltext für den Reiter Farben." );
}

// Optionsfelder definieren
function themeOptions_ci_colors () {
	// Variable
	$settingName= 'mb_theme_ci_farbe_'; 		// Eintrag der OptionsID
	$sectionID 	= $settingName.'section_id';
	$fieldName 	= $sectionID;
	$sanitize 	= 'sanitize_text_field';
	$slug		= 'theme-options_ci-colors';
	
	// Regestrierung der MainSection
	add_settings_section(
		$sectionID, 	// section ID
		'', 			// Titel (optional)
		'', 			// callback function (optional)
		$slug			// page-slug
	);


	//Hauptfarbe
	register_setting(
		$fieldName,
		$settingName.'hauptfarbe',   	  // option name
		$sanitize
	);
	add_settings_field(
		$settingName.'hauptfarbe',  	  //option name
		'Hauptfarbe<span>Header,Footer,Button,Beitragskachel</span>',						
		$settingName.'hauptfarbe', // callback für den inhalt des feldes
		$slug, 		
		$sectionID,
		array(
			'label_for' => $settingName.'hauptfarbe',
			'class' 	=> $settingName
		)
	);

	//Sekunderfarbe
	register_setting(
		$fieldName,
		$settingName.'sekundaerfarbe',   	  // option name
		$sanitize
	);
	add_settings_field(
		$settingName.'sekundaerfarbe',  	  //option name
		'Sekundärfarbe<span>Hoverfarbe für Menupunkte & Button</span>',						
		$settingName.'sekundaerfarbe', // callback für den inhalt des feldes
		$slug, 		
		$sectionID,
		array(
			'label_for' => $settingName.'sekundaerfarbe',
			'class' 	=> $settingName
		)
	);
	
	//Tertiär
	register_setting(
		$fieldName,
		$settingName.'tertiaerfarbe',   	  // option name
		$sanitize
	);
	add_settings_field(
		$settingName.'tertiaerfarbe',  	  //option name
		'Tertiärfarbe<span>Body-Hintergrund</span>',						
		$settingName.'tertiaerfarbe', // callback für den inhalt des feldes
		$slug, 		
		$sectionID,
		array(
			'label_for' => $settingName.'tertiaerfarbe',
			'class' 	=> $settingName
		)
	);

	
	//Textfarbe
	register_setting(
		$fieldName,
		$settingName.'standardtext',   	  // option name
		$sanitize
	);
	add_settings_field(
		$settingName.'standardtext',  	  //option name
		'Standardtext',						
		$settingName.'standardtext', // callback für den inhalt des feldes
		$slug, 		
		$sectionID,
		array(
			'label_for' => $settingName.'standardtext',
			'class' 	=> $settingName
		)
	);
	
    //Textfarbe
	register_setting(
		$fieldName,
		$settingName.'menucolor',   	  // option name
		$sanitize
	);
	add_settings_field(
		$settingName.'menucolor',  	  //option name
		'Menü-Textfarbe',						
		$settingName.'menucolor', // callback für den inhalt des feldes
		$slug, 		
		$sectionID,
		array(
			'label_for' => $settingName.'menucolor',
			'class' 	=> $settingName
		)
	);

    //Linkfarbe
	register_setting(
		$fieldName,
		$settingName.'linkfarbe',   	  // option name
		$sanitize
	);
	add_settings_field(
		$settingName.'linkfarbe',  	  //option name
		'Verlinkungen',						
		$settingName.'linkfarbe', // callback für den inhalt des feldes
		$slug, 		
		$sectionID,
		array(
			'label_for' => $settingName.'linkfarbe',
			'class' 	=> $settingName
		)
	);
	
	//Kacheln
	register_setting(
		$fieldName,
		$settingName.'beitragskachel',   	  // option name
		$sanitize
	);
	add_settings_field(
		$settingName.'beitragskachel',  	  //option name
		'Beitragskachel-Text',						
		$settingName.'beitragskachel', // callback für den inhalt des feldes
		$slug, 		
		$sectionID,
		array(
			'label_for' => $settingName.'beitragskachel',
			'class' 	=> $settingName
		)
	);

};

/* ********************************
	Optionsfelder
*/
function mb_theme_ci_farbe_hauptfarbe(){
	$inhalt = get_option('mb_theme_ci_farbe_hauptfarbe');
	echo "<div id='auto-color-wrap'>";
		echo "<input type='color' id='mb_theme_ci_farbe_hauptfarbe' name='mb_theme_ci_farbe_hauptfarbe' class='' value='$inhalt'/>";
		echo "<div>";
	    	echo "<span id='autocolorgenerator' class='dashicons-before dashicons-admin-appearance'>Komplementär-Farben</span>";
			echo "<span id='similarcolorgenerator' class='dashicons-before dashicons-admin-appearance'>Ähnliche Farben</span>";
		echo "</div>";
	echo "</div>";
}

function mb_theme_ci_farbe_sekundaerfarbe(){
	$inhalt = get_option('mb_theme_ci_farbe_sekundaerfarbe');
	echo "<input type='color' id='mb_theme_ci_farbe_sekundaerfarbe' name='mb_theme_ci_farbe_sekundaerfarbe' value='$inhalt'/>";
}

function mb_theme_ci_farbe_tertiaerfarbe(){
	$getOption = get_option('mb_theme_ci_farbe_tertiaerfarbe');
	$inhalt = ($getOption === false)?"#ffffff":$getOption;
	echo "<input type='color' id='mb_theme_ci_farbe_tertiaerfarbe' name='mb_theme_ci_farbe_tertiaerfarbe' value='$inhalt'/>";
}

function mb_theme_ci_farbe_linkfarbe(){
	$inhalt = get_option('mb_theme_ci_farbe_linkfarbe');
	echo "<input type='color' id='mb_theme_ci_farbe_linkfarbe' name='mb_theme_ci_farbe_linkfarbe' value='$inhalt'/>";
}

function mb_theme_ci_farbe_standardtext(){
	$getOption = get_option('mb_theme_ci_farbe_standardtext');
	$inhalt = ($getOption === false)?"#000000":$getOption;
	echo "<input type='color' id='mb_theme_ci_farbe_standardtext' name='mb_theme_ci_farbe_standardtext' value='$inhalt'/>";
}

function mb_theme_ci_farbe_menucolor(){
    $getOption = get_option('mb_theme_ci_farbe_menucolor');
	$inhalt = ($getOption === false)?"#ffffff":$getOption;
    echo "<input type='color' id='mb_theme_ci_farbe_menucolor' name='mb_theme_ci_farbe_menucolor' value='$inhalt'/>";
}

function mb_theme_ci_farbe_beitragskachel(){
    $getOption = get_option('mb_theme_ci_farbe_beitragskachel');
	$inhalt = ($getOption === false)?"#ffffff":$getOption;
    echo "<input type='color' id='mb_theme_ci_farbe_beitragskachel' name='mb_theme_ci_farbe_beitragskachel' value='$inhalt'/>";
}

if(!empty(get_option('mb_theme_ci_farbe_hauptfarbe'))){

	add_action('wp_footer', 'mb_plugin_theme_color');
	add_action('admin_footer', 'mb_plugin_theme_color');
	function mb_plugin_theme_color(){
		$hauptfarbe 	= get_option('mb_theme_ci_farbe_hauptfarbe');
		$sekundaerfarbe = get_option('mb_theme_ci_farbe_sekundaerfarbe');
		$tertiaerfarbe 	= get_option('mb_theme_ci_farbe_tertiaerfarbe');
		$inkfarbe 		= get_option('mb_theme_ci_farbe_linkfarbe');
		$standardtext 	= get_option('mb_theme_ci_farbe_standardtext');
		$menufarbe 		= get_option('mb_theme_ci_farbe_menucolor');
		$beitragskachel = get_option('mb_theme_ci_farbe_beitragskachel');
		?>

		<style type="text/css" id="mb-theme-ci-color">
		:root{
			--hauptfarbe: <?php echo $hauptfarbe ?>;
			--sekundaerfarbe: <?php echo $sekundaerfarbe ?>;
			--tertiaerfarbe: <?php echo $tertiaerfarbe ?>;
			--linkfarbe: <?php echo $inkfarbe ?>;
			--standardtextfarbe: <?php echo $standardtext ?>;
			--menufarbe: <?php echo $menufarbe ?>;
			--loopcolor: <?php echo $beitragskachel ?>;

			--colorFont:var(--standardtextfarbe);
			--colorLink:var(--linkfarbe);
			--colorLinkHover:var(--hauptfarbe);
			--colorButton:var(--hauptfarbe);
			--colorButtonHover:var(--sekundaerfarbe);
			--colorMenuItem:var(--menufarbe);
			--colorMenuItemHover:var(--menufarbe);
			--colorSubMenuItemHover:var(--menufarbe);
			--colorLoopTitle:var(--loopcolor);
	
			--backgroundMenuItemHover:var(--sekundaerfarbe);
			--backgroundSubMenuItemHover:var(--sekundaerfarbe);
			--backgroundSubmenu:var(--sekundaerfarbe);
			--backgroundHeader:var(--hauptfarbe);
			--backgroundFooter:var(--hauptfarbe);
			--backgroundBody:var(--tertiaerfarbe);
		}
		</style>
		<?php
	}
}
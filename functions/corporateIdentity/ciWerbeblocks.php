<?php
/** 
 * Corporate Colors
 */

function ciWerbeblock_info () {
    echo wpautop( "Werbenanner." );
}

// Optionsfelder definieren
function themeOptions_ci_werbeblock () {
	// Variable
	$settingName= 'mb_theme_ci_werbeblock_'; 		// Eintrag der OptionsID
	$sectionID 	= $settingName.'section_id';
	$fieldName 	= $sectionID;
	$sanitize 	= 'sanitize_text_field';
	$slug		= 'theme-options_ci-werbeblock';
	
	// Regestrierung der MainSection
	add_settings_section(
		$sectionID, 	// section ID
		'', 			// Titel (optional)
		'', 			// callback function (optional)
		$slug			// page-slug
	);


	//Header_Logo
	register_setting(
		$fieldName,
		$settingName.'headerlogo',
		$sanitize
	);
	add_settings_field(
		$settingName.'headerlogo',
		'Header Werbebild<span>neben dem Webseite-Logo</span>',						
		$settingName.'headerlogo',
		$slug,
		$sectionID,
		array(
			'label_for' => $settingName.'headerlogo',
			'class' 	=> $settingName
		)
	);

	
};

/* ********************************
	Optionsfelder
*/
function mb_theme_ci_werbeblock_headerlogo(){
	if ( !empty( get_option( 'mb_theme_ci_werbeblock_headerlogo' ) ) ) {
        echo '<img src="'. get_option("mb_theme_ci_werbeblock_headerlogo") .'" width="150" height="auto" style="float: left; padding: 0 10px 10px 0;"/>';
    }
	?>
	<label for="upload_image">
        <input id="mb_theme_ci_werbeblock_headerlogo" type="text" size="36" name="mb_theme_ci_werbeblock_headerlogo" value="<?php echo get_option('mb_theme_ci_werbeblock_headerlogo'); ?>" /> 
        <input id="upload_image_button" class="button upload_image_button" type="button" value="Change/Upload Image" />
    </label>
    <p>Wählen Sie über den Button das entsprechende Bild oder laden Sie mit dem Button ein Bild hoch.</p>
	<?php
}


/** ********************************
 * CSS
*/
if(!empty(get_option('mb_theme_ci_werbeblock_headerlogo'))){

	add_action('wp_footer', 'mb_plugin_theme_color');
	add_action('admin_footer', 'mb_plugin_theme_color');
	function mb_plugin_theme_color(){
		$hauptfarbe 	= get_option('mb_theme_ci_werbeblock_hauptfarbe');
		$sekundaerfarbe = get_option('mb_theme_ci_werbeblock_sekundaerfarbe');
		$tertiaerfarbe 	= get_option('mb_theme_ci_werbeblock_tertiaerfarbe');
		$inkfarbe 		= get_option('mb_theme_ci_werbeblock_linkfarbe');
		$standardtext 	= get_option('mb_theme_ci_werbeblock_standardtext');
		$menufarbe 		= get_option('mb_theme_ci_werbeblock_menucolor');
		$beitragskachel = get_option('mb_theme_ci_werbeblock_beitragskachel');
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
<?php
/** 
 * Corporate Typografie
 */

function ciFont_info () {
    echo wpautop( "Beispieltext für den Reiter Typografie." );
}

// Optionsfelder definieren
function themeOptions_ci_fonts () {
	// Variable
	$settingName= 'mb_theme_ci_fonts_'; 		// Eintrag der OptionsID
	$sectionID 	= $settingName.'section_id';
	$fieldName 	= $sectionID;
	$sanitize 	= 'sanitize_text_field';
	$slug		= 'theme-options_ci-fonts';
	
	// Regestrierung der MainSection
	add_settings_section(
		$sectionID, 	// section ID
		'', 			// Titel (optional)
		'', 			// callback function (optional)
		$slug			// page-slug
	);


	//Überschrift
	register_setting(
		$fieldName,
		$settingName.'ueberschrift',   	  // option name
		$sanitize
	);
	add_settings_field(
		$settingName.'ueberschrift',  	  //option name
		'Überschriften',						
		$settingName.'ueberschrift', // callback für den inhalt des feldes
		$slug, 		
		$sectionID,
		array(
			'label_for' => $settingName.'ueberschrift',
			'class' 	=> $settingName
		)
	);
	
	//Überschrift ausrichtung
	register_setting(
		$fieldName,
		$settingName.'ueberschrift-align',   	  // option name
		$sanitize
	);
	add_settings_field(
		$settingName.'ueberschrift-align',  	  //option name
		'Überschriften Mittig',
		$settingName.'ueberschrift_align', // callback für den inhalt des feldes
		$slug, 		
		$sectionID,
		array(
			'label_for' => $settingName.'ueberschrift-align',
			'class' 	=> $settingName
		)
	);
	
	//Überschrift ausrichtung
	register_setting(
		$fieldName,
		$settingName.'ueberschrift-bigger',   	  // option name
		$sanitize
	);
	add_settings_field(
		$settingName.'ueberschrift-bigger',  	  //option name
		'Überschriften vergrößern',
		$settingName.'ueberschrift_bigger', // callback für den inhalt des feldes
		$slug, 		
		$sectionID,
		array(
			'label_for' => $settingName.'ueberschrift-bigger',
			'class' 	=> $settingName
		)
	);
	

	//Texttype
	register_setting(
		$fieldName,
		$settingName.'standardtext',   	  // option name
		$sanitize
	);
	add_settings_field(
		$settingName.'standardtext',  	  //option name
		'Standard-Schriftart',						
		$settingName.'standardtext', // callback für den inhalt des feldes
		$slug, 		
		$sectionID,
		array(
			'label_for' => $settingName.'standardtext',
			'class' 	=> $settingName
		)
	);

	//Font-Size
	register_setting(
		$fieldName,
		$settingName.'fontsize',   	  // option name
		$sanitize
	);
	add_settings_field(
		$settingName.'fontsize',  	  //option name
		'Schriftgröße',						
		$settingName.'fontsize', // callback für den inhalt des feldes
		$slug, 		
		$sectionID,
		array(
			'label_for' => $settingName.'fontsize',
			'class' 	=> $settingName
		)
	);

	//Line-Height
	register_setting(
		$fieldName,
		$settingName.'lineheight',   	  // option name
		$sanitize
	);
	add_settings_field(
		$settingName.'lineheight',  	  //option name
		'Linienhöhe',						
		$settingName.'lineheight', // callback für den inhalt des feldes
		$slug, 		
		$sectionID,
		array(
			'label_for' => $settingName.'lineheight',
			'class' 	=> $settingName
		)
	);

	
	//Menütypo
	register_setting(
		$fieldName,
		$settingName.'menuefont',   	  // option name
		$sanitize
	);
	add_settings_field(
		$settingName.'menuefont',  	  //option name
		'Menü',						
		$settingName.'menuefont', // callback für den inhalt des feldes
		$slug, 		
		$sectionID,
		array(
			'label_for' => $settingName.'menuefont',
			'class' 	=> $settingName
		)
	);
};

/* ********************************
	Optionsfelder
*/
function get_ci_fonts($fontname, $typ='ueberschrift'){
	$select = '<div class="ci-fonts-selector-wrap">';
	$select .= '<input readonly id="mb_theme_ci_fonts_'.$typ.'" name="mb_theme_ci_fonts_'.$typ.'" type="text" value="'.$fontname.'">';
	$select .= '<div class="ci-fonts-selects">';
	$select .= '<p class="Inter">Inter</p>';
	$select .= '<p class="Montserrat">Montserrat</p>';
	$select .= '<p class="Cabin">Cabin</p>';
	$select .= '<p class="Roboto">Roboto</p>';
	$select .= '<p class="Raleway">Raleway</p>';
	$select .= '<p class="PTSans">PTSans</p>';
	$select .= '<p class="Quicksand">Quicksand</p>';
	$select .= '<p class="NotoSans">NotoSans</p>';
	$select .= '<p class="Garamond">Garamond</p>';
	$select .= '<p class="Karantina">Karantina</p>';
	$select .= '<p class="Quicksand">Quicksand</p>';
	$select .= '<p class="Merriweather">Merriweather</p>';
	$select .= '<p class="DancingScript">DancingScript</p><em>(Handwrite)</em>';
	$select .= '<p class="QwitcherGrypen">QwitcherGrypen</p><em>(Handwrite)</em>';
	$select .='</div></div>';

	return $select;
}
function mb_theme_ci_fonts_ueberschrift(){
	$inhalt = get_option('mb_theme_ci_fonts_ueberschrift');
	echo get_ci_fonts( $inhalt);
}

function mb_theme_ci_fonts_ueberschrift_align(){
	$inhalt = get_option('mb_theme_ci_fonts_ueberschrift-align');
	$checked = (!empty($inhalt))?"checked":"";
    echo '<input type="checkbox" id="mb_theme_ci_fonts_ueberschrift-align" name="mb_theme_ci_fonts_ueberschrift-align" '.$checked.'/>';
}

function mb_theme_ci_fonts_ueberschrift_bigger(){
	$inhalt = get_option('mb_theme_ci_fonts_ueberschrift-bigger');
	$checked = (!empty($inhalt))?"checked":"";
    echo '<input type="checkbox" id="mb_theme_ci_fonts_ueberschrift-bigger" name="mb_theme_ci_fonts_ueberschrift-bigger" '.$checked.'/>';
}

function mb_theme_ci_fonts_standardtext(){
	$inhalt = get_option('mb_theme_ci_fonts_standardtext');
	echo get_ci_fonts( $inhalt, "standardtext");
}

function mb_theme_ci_fonts_fontsize(){
	$inhalt = get_option('mb_theme_ci_fonts_fontsize');
	$normal =  ($inhalt==false || $inhalt=='normal') ? 'selected': '';
	$high 	=  ($inhalt=='high') ? 'selected': '';
	$ultra 	=  ($inhalt=='ultra') ? 'selected': '';

	echo "<select id='mb_theme_ci_fonts_fontsize' name='mb_theme_ci_fonts_fontsize'>";
		echo "<option value='normal' ". $normal ." >Normal</option>";
		echo "<option value='high'  ". $high.">Groß</option>";
		echo "<option value='ultra' ". $ultra.">Sehr Groß</option>";
	echo "</select>";
}

function mb_theme_ci_fonts_lineheight(){
	$inhalt = get_option('mb_theme_ci_fonts_lineheight');
	$normal =  ($inhalt==false || $inhalt=='normal') ? 'selected': '';
	$high 	=  ($inhalt=='high') ? 'selected': '';
	$ultra 	=  ($inhalt=='ultra') ? 'selected': '';
	$masive =  ($inhalt=='masive') ? 'selected': '';

	echo "<select id='mb_theme_ci_fonts_lineheight' name='mb_theme_ci_fonts_lineheight'>";
		echo "<option value='normal' ". $normal ." >Normal</option>";
		echo "<option value='high'  ". $high.">Hoch</option>";
		echo "<option value='ultra' ". $ultra.">Sehr Hoch</option>";
		echo "<option value='masive' ". $masive.">Noch Höher</option>";
	echo "</select>";
}

function mb_theme_ci_fonts_menuefont(){
	$inhalt = get_option('mb_theme_ci_fonts_menuefont');
	echo get_ci_fonts( $inhalt, "menuefont");
}

/* ********************************
	<Styles>
*/
add_action('wp_footer', 'mb_theme_fonts');
add_action('admin_footer', 'mb_theme_fonts');
function mb_theme_fonts(){
	$ueberschrift 	= (!empty(get_option('mb_theme_ci_fonts_ueberschrift')))?"'".get_option('mb_theme_ci_fonts_ueberschrift')."'":"'Arial'";
	$standardtext 	= (!empty(get_option('mb_theme_ci_fonts_standardtext')))?"'".get_option('mb_theme_ci_fonts_standardtext')."'":"'Arial'";
	$menuefont 		= (!empty(get_option('mb_theme_ci_fonts_menuefont')))?"'".get_option('mb_theme_ci_fonts_menuefont')."'":"'Arial'";
	$txtLineHeight 	= get_option('mb_theme_ci_fonts_lineheight');
	$txtFontSize 	= get_option('mb_theme_ci_fonts_fontsize');
	$hFontBigger 	= get_option('mb_theme_ci_fonts_ueberschrift-bigger');

	switch($txtFontSize) {
		case 'high':
			$fSize = "20px";
			break;
		case 'ultra':
			$fSize = "24px";
			break;
		default:
			$fSize = "18px";
			break;
	}

	switch($txtLineHeight) {
		case 'high':
			$lHeight = "150%";
			break;
		case 'ultra':
			$lHeight = "200%";
			break;
		case 'masive':
			$lHeight = "300%";
			break;	
		default:
			$lHeight = "125%";
			break;
	}

	?>

	<style type="text/css" id="mb-theme-ci-font">
	body{
		--ueberschrift:<?php echo $ueberschrift ?>;
		--menuefont: <?php echo $menuefont ?>;
		--standardtext:<?php echo $standardtext ?>;

		--fontFamily:var(--standardtext);
		--fontFamilyHeader:var(--ueberschrift);
		--fontFamilyMenu:var(--menuefont);
		--lineHeightParagraph:<?php echo $lHeight ?>;
		--lineHeightHeadline:<?php echo $lHeight ?>;
		--lineHeightHeadline-1:<?php echo $lHeight ?>;
		--lineHeightHeadline-2:<?php echo $lHeight ?>;
		--lineHeightHeadline-3:<?php echo $lHeight ?>;
		--lineHeightHeadline-4:<?php echo $lHeight ?>;
		--paragraph:<?php echo $fSize ?>;		
	}
	<?php if($hFontBigger == 'on'): ?>
	h1{
		--headline-1: var(--wp--preset--font-size--xx-large);
	}
	h2{
		--headline-2: var(--wp--preset--font-size--x-large);
	}
	h3{
		--headline-3: var(--wp--preset--font-size--large);		
	}
	<?php endif; ?>

	</style>
	<?php
}

add_action('admin_footer', 'dei_backendText');
function dei_backendText(){
	if(get_option('mb_theme_ci_fonts_ueberschrift-align') == "on"):
	?>
	<style>
		.edit-post-visual-editor h1,
		.edit-post-visual-editor h2,
		.edit-post-visual-editor h3{
			text-align:center
		}
	</style>
	<?php
	endif;
}
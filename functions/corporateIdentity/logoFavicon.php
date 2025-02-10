<?php
/** 
 * Logo & Favicon
 */


/** 
 * Logo
 */
function logoFavicon_info () {
    echo wpautop( "Beispieltext für den Reiter Logo und FavIcon." );
}

function themeOptions_ci_logo () {
    add_settings_field('mb_theme_ci_mainLogo', 'Logo', 'display_logo', 'theme-options_ci-logoFavicon', 'ci-logoFavicon');  
    register_setting('ci-logoFavicon', 'mb_theme_ci_mainLogo');
    
    add_settings_field('mb_theme_ci_logo_max_height', 'Menü-Logo Höhe', 'logo_max_height', 'theme-options_ci-logoFavicon', 'ci-logoFavicon');  
    register_setting('ci-logoFavicon', 'mb_theme_ci_logo_max_height');
}

function display_logo() {
	?>
    <?php
    if ( !empty( get_option( 'mb_theme_ci_mainLogo' ) ) ) {
        echo '<img src="'. get_option("mb_theme_ci_mainLogo") .'" width="150" height="auto" style="float: left; padding: 0 10px 10px 0;"/>';
    }
    ?>
    <label for="upload_image">
        <input id="mb_theme_ci_mainLogo" type="text" size="36" name="mb_theme_ci_mainLogo" value="<?php echo get_option('mb_theme_ci_mainLogo'); ?>" /> 
        <input id="upload_image_button" class="button upload_image_button" type="button" value="Change/Upload Image" />
    </label>
    <p>Wählen Sie über den Button das entsprechende Bild oder laden Sie mit dem Button ein Bild hoch.</p>
<?php
}

/*Logo Höhe*/
function logo_max_height() {
?>
   <input id="mb_theme_ci_logo_max_height" type="number" size="36" name="mb_theme_ci_logo_max_height" 
   value="<?php echo get_option('mb_theme_ci_logo_max_height'); ?>" placeholder="60" /> <span>Pixel</span>
   <p>Das Logo bekommt eine Max-Höhe von 60 Pixel. Gerne kann dies auch größer sein.</p>
<?php
}


/**
 * favicon
 */
function themeOptions_ci_favicon () {
    add_settings_field('mb_theme_ci_favicon32', 'Favicon 32x32px', 'display_favicon32', 'theme-options_ci-logoFavicon', 'ci-logoFavicon');  
    register_setting('ci-logoFavicon', 'mb_theme_ci_favicon32');
    add_settings_field('mb_theme_ci_favicon128', 'Favicon 128x128px', 'display_favicon128', 'theme-options_ci-logoFavicon', 'ci-logoFavicon');  
    register_setting('ci-logoFavicon', 'mb_theme_ci_favicon128');   
    add_settings_field('mb_theme_ci_favicon180', 'Favicon 180x180px', 'display_favicon180', 'theme-options_ci-logoFavicon', 'ci-logoFavicon');  
    register_setting('ci-logoFavicon', 'mb_theme_ci_favicon180');
    add_settings_field('mb_theme_ci_favicon192', 'Favicon 192x192px', 'display_favicon192', 'theme-options_ci-logoFavicon', 'ci-logoFavicon');  
    register_setting('ci-logoFavicon', 'mb_theme_ci_favicon192');
}
function display_favicon32 () {
	?>
    <?php
    if ( !empty( get_option( 'mb_theme_ci_favicon32' ) ) ) {
        echo '<img src="'. get_option("mb_theme_ci_favicon32") .'" width="32" height="auto" style="float: left; padding: 0 10px 10px 0;"/>';
    }
    ?>
    <label for="upload_favicon32">
        <input id="upload_favicon32" type="text" size="36" name="mb_theme_ci_favicon32" value="<?php echo get_option('mb_theme_ci_favicon32'); ?>"  /> 
        <input id="upload_favicon_button32" class="button upload_image_button" type="button" value="Change/Upload Favicon" />
    </label>
    <p>Wählen Sie über den Button das entsprechende Bild oder laden Sie mit dem Button ein Bild hoch.<br />
    Die Datei sollte im Format "png" vorliegen, die Maße 32px x 32px und im Optimalfall den Namen "favicon.png" tragen</p>
<?php
}
function display_favicon128 () {
    ?>
    <?php
    if ( !empty( get_option( 'mb_theme_ci_favicon128' ) ) ) {
        echo '<img src="'. get_option("mb_theme_ci_favicon128") .'" width="128" height="auto" style="float: left; padding: 0 10px 10px 0;"/>';
    }
    ?>
    <label for="upload_favicon128">
        <input id="upload_favicon128" type="text" size="36" name="mb_theme_ci_favicon128" value="<?php echo get_option('mb_theme_ci_favicon128'); ?>"  /> 
        <input id="upload_favicon_button128" class="button upload_image_button" type="button" value="Change/Upload Favicon" />
    </label>
    <p>Wählen Sie über den Button das entsprechende Bild oder laden Sie mit dem Button ein Bild hoch.<br />
    Die Datei sollte im Format "png" vorliegen, die Maße 128px x 128px und im Optimalfall den Namen "favicon128.png" tragen</p>
<?php
}
function display_favicon180 () {
    ?>
    <?php
    if ( !empty( get_option( 'mb_theme_ci_favicon180' ) ) ) {
        echo '<img src="'. get_option("mb_theme_ci_favicon180") .'" width="180" height="auto" style="float: left; padding: 0 10px 10px 0;"/>';
    }
    ?>
    <label for="upload_favicon180">
        <input id="upload_favicon180" type="text" size="36" name="mb_theme_ci_favicon180" value="<?php echo get_option('mb_theme_ci_favicon180'); ?>"  /> 
        <input id="upload_favicon_button180" class="button upload_image_button" type="button" value="Change/Upload Favicon" />
    </label>
    <p>Wählen Sie über den Button das entsprechende Bild oder laden Sie mit dem Button ein Bild hoch.<br />
    Die Datei sollte im Format "png" vorliegen, die Maße 180px x 180px und im Optimalfall den Namen "favicon180.png" tragen</p>
<?php
}
function display_favicon192 () {
    if ( !empty( get_option( 'mb_theme_ci_favicon192' ) ) ) {
        echo '<img src="'. get_option("mb_theme_ci_favicon192") .'" width="192" height="auto" style="float: left; padding: 0 10px 10px 0;"/>';
    }
    ?>
    <label for="upload_favicon192">
        <input id="upload_favicon192" type="text" size="36" name="mb_theme_ci_favicon192" value="<?php echo get_option('mb_theme_ci_favicon192'); ?>"  /> 
        <input id="upload_favicon_button192" class="button upload_image_button" type="button" value="Change/Upload Favicon" />
    </label>
    <p>Wählen Sie über den Button das entsprechende Bild oder laden Sie mit dem Button ein Bild hoch.<br />
    Die Datei sollte im Format "png" vorliegen, die Maße 192px x 192px und im Optimalfall den Namen "favicon192.png" tragen</p>
<?php
}

if(!empty(get_option('mb_theme_ci_favicon192'))){

	add_action('wp_footer', 'mb_plugin_theme_favicon', 99999);
	add_action('admin_footer', 'mb_plugin_theme_favicon', 99999);
	function mb_plugin_theme_favicon(){
		$favicon 	= get_option('mb_theme_ci_favicon192');
		?>

		<style type="text/css" id="mb-theme-ci-favicon">
		.mbgi-block-teaserbox .teaserbox-text:before{
            background-image:url('<?php echo $favicon ?>');
        }
		</style>
		<?php
	}
}

if(!empty(get_option('mb_theme_ci_logo_max_height'))){

	add_action('wp_footer', 'mb_plugin_theme_logoheight', 99999);
	function mb_plugin_theme_logoheight(){
		$logoHeight 	= get_option('mb_theme_ci_logo_max_height');
		?>

		<style type="text/css" id="mb-theme-ci-logoheight">
		header #header-logo,
		header #header-logo img{
            max-height:<?php echo $logoHeight ?>px;
        }
		</style>
		<?php
	}
}
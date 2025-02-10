<?php
/**
 * themeOptions.php 
 * add Theme Options to Backend
 */


function add_theme_menu_item() {
    add_menu_page('Theme Options', 'Einrichtung', 'manage_options', 'theme-options', 'theme_options_callback', 'dashicons-admin-generic', 99);
}
add_action('admin_menu', 'add_theme_menu_item');


function theme_options_callback() {
    ?>
    <div class='wrap'>
        <h1>Herzlich Willkommen zu den gestalterischen Einstellungen deiner Webseite</h1>
        <p>Dies ist die Hauptseite mit wichtigen Informationen und Links zu den Unterseiten.</p>
        <p>Wähle den Bereich aus, den du bearbeiten willst:</p>
        <ul class="main-page-list">
            <li>
                <a href="?page=theme-options-ci" class="">Corporate Identity</a>
                <ul>
		            <li><a href="?page=theme-options-ci&tab=logofavicon">Logo</a></li>
		            <li><a href="?page=theme-options-ci&tab=colors">Farben</a></li>
		            <li><a href="?page=theme-options-ci&tab=fonts">Typografie</a></li>
		        </ul>
            </li>
            <li>
                <a href="?page=theme-options-layout" class="">Layout</a>
                <ul>
		            <li><a href="?page=theme-options-layout">Container</a></li>
		            <li><a href="?page=theme-options-layout&tab=header">Header</a></li>
		            <li><a href="?page=theme-options-layout&tab=tile">Beitragskacheln</a></li>
		            <li><a href="?page=theme-options-layout&tab=button">Button</a></li>
		            <li><a href="?page=theme-options-layout&tab=hamburger">Hamburger</a></li>
		            <li><a href="?page=theme-options-layout&tab=customstyle">Benutzerdefinierte Styles</a></li>
		        </ul>
            </li>
            <?php if (is_antwortzeit_admin_user ()): ?>
                <li>
                    <a href="?page=theme-options-exportimport" class="">Import / Export</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
    <?php
}

//add global functions and helpers
$path = get_stylesheet_directory().'/functions/';

require_once ( $path . 'basicFunctions.php');
//add styles in <head> and Scripts under <footer>
require_once ( $path . 'addCssJsToPage.php');


/**
 * add setting pages
 */
//CI
require_once ( $path . 'themeOptions_corporateIdentity.php');

require_once ( $path . 'corporateIdentity/logoFavicon.php');
require_once ( $path . 'corporateIdentity/ciColor.php');
require_once ( $path . 'corporateIdentity/ciFonts.php');

//Layout
require_once ( $path . 'themeOptions_layout.php');
//further files for tabs defined in themeOptions_layout.php

//Export Import
if ( is_antwortzeit_admin_user () ) {
    require_once ( $path . 'themeOptions_exportimport.php');
}

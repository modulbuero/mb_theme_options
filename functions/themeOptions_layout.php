<?php
/**
 * themeOptions_layout.php 
 * add Theme Options Layout with several tabs
 */
$optionPath = get_stylesheet_directory().'/functions/layout/';
 require_once ( $optionPath . 'layoutContainer.php');
 require_once ( $optionPath . 'layoutHeader.php');
 require_once ( $optionPath . 'layoutLoopTile.php');
 require_once ( $optionPath . 'layoutHamburger.php');
 require_once ( $optionPath . 'layoutCustomStyle.php');
 require_once ( $optionPath . 'layoutButton.php');

function add_theme_submenu_layout () {
    add_submenu_page('theme-options', 'ThemeOptions - Layout', 'Layout', 'manage_options', 'theme-options-layout', 'themeOptions_layout_callback', 30);
}
add_action('admin_menu', 'add_theme_submenu_layout');

function themeOptions_layout_callback () {
    ?>
    <div class='wrap'>
        <h1>Theme Options - Layout</h1>
        <p>Anpassungen im Layout.</p>
        <?php settings_errors(); ?>

        <?php
        $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'container';
        ?>

        <h2 class="nav-tab-wrapper">
            <a href="?page=theme-options-layout&tab=container" 
            class="nav-tab <?php echo $active_tab == 'container' ? 'nav-tab-active' : ''; ?>">Container</a>
            <a href="?page=theme-options-layout&tab=header" 
            class="nav-tab <?php echo $active_tab == 'header' ? 'nav-tab-active' : ''; ?>">Header</a>
            <a href="?page=theme-options-layout&tab=tile" 
            class="nav-tab <?php echo $active_tab == 'tile' ? 'nav-tab-active' : ''; ?>">Beiträge</a>
            <a href="?page=theme-options-layout&tab=button" 
            class="nav-tab <?php echo $active_tab == 'button' ? 'nav-tab-active' : ''; ?>">Button</a>
            <a href="?page=theme-options-layout&tab=hamburger" 
            class="nav-tab <?php echo $active_tab == 'hamburger' ? 'nav-tab-active' : ''; ?>">Hamburger</a>
            <a href="?page=theme-options-layout&tab=customstyle"
            class="nav-tab <?php echo $active_tab == 'customstyle' ? 'nav-tab-active' : ''; ?>">Benutzerdefinierte Styles</a>
        </h2>

        <form method='post' action='options.php'>
            <?php
            if ( $active_tab == 'container' ) { 
                settings_fields('mb_theme_layout_container_section_id');
                do_settings_sections('theme-options_layout-container');    
            } else if ( $active_tab == 'header' ) { 
                settings_fields('mb_theme_layout_header_section_id');
                do_settings_sections('theme_options_layout_header');      
            } else if ( $active_tab == 'tile' ) { 
                settings_fields('mb_theme_layout_looptile_section_id');
                do_settings_sections('theme_options_layout_looptile');      
            }else if ( $active_tab == 'button' ) { 
                settings_fields('mb_theme_layout_button_section_id');
                do_settings_sections('theme_options_layout_button');
            }else if ( $active_tab == 'hamburger' ) { 
                settings_fields('mb_hamburger_an_section_id');
                do_settings_sections('theme_options_layout_hamburger_an');      
            } else if ( $active_tab == 'customstyle' ) { 
                settings_fields('mb_theme_layout_customstyle_section_id');
                do_settings_sections('theme_options_layout_customstyle');      
            }
            submit_button(); 
            ?>          
        </form>
    </div>
    <?php 
}

function display_theme_options_layout_fields() {
    //container
    themeOptions_layout_container ();
    themeOptions_layout_header();
    themeOptions_layout_looptile();
    themeOptions_layout_button();
    themeOptions_layout_hamburger_an();
    themeOptions_layout_customstyle();
}
add_action('admin_init', 'display_theme_options_layout_fields');

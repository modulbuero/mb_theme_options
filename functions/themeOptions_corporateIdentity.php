<?php
/**
 * themeOptions_ci.php 
 * add Theme Options Corporate Identity with several tabs
 */

function add_theme_submenu_ci () {
    add_submenu_page('theme-options', 'ThemeOptions - Corporate Identity', 'Corporate Identity', 'manage_options', 'theme-options-ci', 'themeOptions_ci_callback', 30);
}
add_action('admin_menu', 'add_theme_submenu_ci');

function themeOptions_ci_callback () {
    ?>
    <div class='wrap'>
        <h1>Einrichtung - Corporate Identitiy</h1>
        <p>Hier stellt ihr eure Farben, Schriftarten und Logos ein.</p>
        <?php settings_errors(); ?>

        <?php
        $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'logofavicon';
        ?>

        <h2 class="nav-tab-wrapper">
            <a href="?page=theme-options-ci&tab=logofavicon" 
            class="nav-tab <?php echo $active_tab == 'logofavicon' ? 'nav-tab-active' : ''; ?>">Logo & Favicon</a>
            <a href="?page=theme-options-ci&tab=colors" 
            class="nav-tab <?php echo $active_tab == 'colors' ? 'nav-tab-active' : ''; ?>">Farben</a>
            <a href="?page=theme-options-ci&tab=fonts" 
            class="nav-tab <?php echo $active_tab == 'fonts' ? 'nav-tab-active' : ''; ?>">Typografie</a>
        </h2>

        <form method='post' action='options.php'>
            <?php
            if ( $active_tab == 'logofavicon' ) { 
                iconEinleitung();
                settings_fields('ci-logoFavicon');
                do_settings_sections('theme-options_ci-logoFavicon');    
            } else if ( $active_tab == 'colors' ) { 
                settings_fields('mb_theme_ci_farbe_section_id'); 
                do_settings_sections('theme-options_ci-colors');  
            } else if ( $active_tab == 'fonts' ) { 
                settings_fields('mb_theme_ci_fonts_section_id');
                do_settings_sections('theme-options_ci-fonts');      
            } 
            echo '<div id="zusatzanzeige"></div>';
            submit_button(); 
            ?>          
        </form>
    </div>
    <?php 
}

function display_theme_options_ci_fields() {
    //logo & favicon
    add_settings_section('ci-logoFavicon', 'Logo & Favicon', 'logoFavicon_info', 'theme-options_ci-logoFavicon');
    themeOptions_ci_logo ();
    themeOptions_ci_favicon ();
    themeOptions_ci_colors();
    themeOptions_ci_fonts();
}
add_action('admin_init', 'display_theme_options_ci_fields');

function iconEinleitung(){
    #echo "<p>lorem</p>";
} 
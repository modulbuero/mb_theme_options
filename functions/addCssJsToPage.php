<?php 
/**
 * Styles und Scripts in <head> and under <footer>
 */

/**
 * add relevant CSS to <head> - espacially CSS vars
 */
function addCssToHead () {
    //ThemeOptions -> Layout -> Textbreite 
    $textBreite = get_option('mb_theme_layout_container_textbreite');
    //ThemeOptions -> Layout -> Containerbreite 
    $containerBreite = get_option('mb_theme_layout_container_containerbreite');
    //ThemeOptions -> Layout -> Custom CSS 
    $customCss = get_option('mb_theme_layout_customstyle_customcss');

    $containerAbstand = get_option('mb_theme_layout_container_containerabstand');
    $textAbstand      = get_option('mb_theme_layout_container_textabstand');

    $s = '';
    if ( $containerBreite || $customCss || $textBreite) {
        $s .=    '<style>';

        if ( $containerBreite || $textBreite || $containerAbstand || $textAbstand) {
            $s .=   ':root {';
            if ( $textBreite ) {         
                $s .= '--textMaxWidth: '.$textBreite.'px;';
            }
            if ( $containerBreite ) {         
                $s .= '--containerMaxWidth: '.$containerBreite.'px;';
            }
            if ( $containerAbstand ) {         
                $s .= '--abstandUntenContainer: '.$containerAbstand.'px;';
            }
            if ( $textAbstand ) {         
                $s .= '--abstandUntenParagraph: '.$textAbstand.'px;';
            }
            $s .=   '}';  
        }
        
        if ( $customCss ) {
            $s .=   $customCss;
        }
    
        $s .= '</style>';
    }
    
    echo $s;

};
add_action('wp_footer', 'addCssToHead', 999);
add_action('admin_footer', 'addCssToHead');

/**
 * add JS under <footer>
 * ThemeOptions -> Layout -> Custom CSS 
 */
function addJsToFooter () {
    //ThemeOptions -> Layout -> Custom CSS 
    $customJs = get_option('mb_theme_layout_customstyle_customjs');
    $s = '';
    if ( $customJs ) { //may there will be no other use for script than $customJs
        //jQuery is not ready yet
        $s .=    '<script>
                    window.addEventListener("load", function(event) {
                    $ = jQuery;
                    ';
        if ( $customJs ) {
            $s .=   $customJs;
        }
        $s .= '     });
                </script>';
    }

    echo $s;
}
add_action('wp_footer', 'addJsToFooter', 9999);
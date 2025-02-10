<?php 
/**
 * themeOptions_exportimport.php 
 * add Theme Options Export Import Functions
 */

function add_theme_submenu_export () {
    add_submenu_page('theme-options', 'ThemeOptions - Export/Import', 'Export/Import', 'manage_options', 'theme-options-exportimport', 'themeOptions_export_callback', 30);
}
add_action('admin_menu', 'add_theme_submenu_export');

function themeOptions_export_callback () {
    ?>
    <div class='wrap'>
        <h1>Theme Options - Export / Import</h1>
        <p><b>Nur für Super Admins verfügbar!</b></p> 
        <p>Hier könnt Ihr eure Einstellungen speichern und/oder wiederherstellen.</p>
        <p><b>Achtung: Export/Import muss ggf. noch erweitert werden, weil die Theme Options stetig erweitert werden. Aktuell werden folgende Optionen berücksichtigt: "mb_theme_ci_%", "mb_theme_layout_%". Siehe "$wpdb->get_results" in mb-theme-options/themeOptions/themeOptions_exportimport.php</b></p>
        <?php settings_errors(); ?>

        <?php
        $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'mainoptions';
        ?>

        <h2 class="nav-tab-wrapper">
            <a href="?page=theme-options-exportimport&tab=mainoptions" 
            class="nav-tab <?php echo $active_tab == 'mainoptions' ? 'nav-tab-active' : ''; ?>">Einstellungen</a>
        </h2>

        <form method='post' action='options.php'>
            <?php
            if ( $active_tab == 'mainoptions' ) { 
                settings_fields('cpt-mainOptions');
                do_settings_sections('theme-options_export-main');    
            } 
            //submit_button(); 
            ?>          
        </form>
    </div>
<?php 
}


function display_theme_options_export_fields() {
    //Haupteinstellungen
    add_settings_section('export-mainOptions', 'Haupteinstellungen', 'export_mainInfo', 'theme-options_export-main');
    //themeOptions_cpt_mainOptions ();
}
add_action('admin_init', 'display_theme_options_export_fields');


/**
 * Haupteinstellungen - add CPT to page
 */
function export_mainInfo () {
    echo wpautop( '<h3>Import/Export Funktion</h3><br>
        In der Textarea unter <b>Export</b> liegt ein JSON vor mit allen Einstellungen aus den Theme Options. Diese kannst du dir in ein Textdokument abspeichern.<br>
        In der Textarea unter <b>Import</b> kannst du ein bestehendes Export JSON, zum Beispiel von einer anderen Seite, einfügen und dann mit einem Klick auf den <b>Save Button</b> importieren.<br>
        <br>
        <strong>Achtung: Alle Einstellungen werden unwiderruflich überschrieben! Speichere immer das Export Textfeld vorher in einer Textdatei ab!</strong><br>
        <br>
        <strong>Achtung: Alle verlinkten Bilder müssen sich in der Mediathek oder dem angegebenen Pfad vorhanden sein!</strong><br>
        <!--<h3>Import/Export Farbschema</h3><br>
        Das Farbschema kann auch einzeln importiert bzw. exportiert werden. Siehe für das JSON bitte unter <a href="?page=theme-options-ci&tab=colors">Corporate Identity -> Farben</a>.-->' );

    //get global variable $wpdb
    global $wpdb;

    //prepare the output and SQL command
    $output = "";
    $output = $wpdb->get_results( 
        "SELECT option_name,option_value 
        FROM {$wpdb->prefix}options 
        WHERE option_name LIKE 'mb_theme_ci_%'
        OR option_name LIKE 'mb_theme_layout_%'"
        , OBJECT);

    $finalOutput = json_encode($output);

    echo '<h3>Export</h3>';
    echo '<textarea id="exportJSON" name="exportJSON" rows="10" cols="50">';
    echo $finalOutput;
    echo '</textarea>';
    echo '<br><br>';


    echo '<h3>Import</h3>';
    echo '<textarea id="importJSON" name="importJSON" rows="10" cols="50" placeholder="Füge dein Export JSON hier ein">';
    echo '</textarea>';
    echo '<br><br>';


    echo '<button id="saveTodDatabase">Daten Importieren</button>';
    echo '<div id="output" style="background:lightgreen; min-height: 0px;"></div>';
    echo '<div id="output2" style="background:red; min-height: 0px;"></div>';

    $ajaxURL = plugins_url('exportimport/exportimport_functions.php', __FILE__ );
    /*
    //Keine Verwendung - unsichere Verbindung auf Testserver spielt keine Rolle
    $protocol = '';
    if (isset($_SERVER['HTTPS']) &&
        ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
        isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
        $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
            $protocol = 'https://';
            // $ajaxURL bleibt gleich
    } else {
        $protocol = 'http://';
        str_replace('https://', 'http://', $ajaxURL);
    }
    */
    ?>
    <script type="text/javascript">
        $ = jQuery;
        $(document).ready(function () {
            $('textarea#exportJSON a, textarea#importJSON a').click(function () {
                event.preventDefault();
            })
            $("#saveTodDatabase").click(function () {
                event.preventDefault();

                var importText = '{"saveToDatabase":' + $('textarea#importJSON').val() +'}';
                console.log(importText);

                if(isJsonString(importText)){
                    console.log('"importText" ist ein gültiger JSON String!');
                    $.ajax({
                    type: "POST",
                    url: "<?php echo $ajaxURL ?>",
                    //url: "http://compension.das-gewerbliche-internet.de.178-20-102-49.modulbuero.kundencloudserver.de/wp-content/plugins/mb_themeOptions/themeOptions/exportimport/exportimport_functions.php",
                    contentType: "application/json; charset=utf-8",
                    data: importText,
                    beforeSend: function(xhr){xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")},
                    success: function(data) {              
                        $('#output2').html(data);
                        //alert('Data: '+data);
                    },
                    error: function(request,error) {
                        alert("Request: "+JSON.stringify(request));
                    }
                })
                } else {
                    console.log('"importText" ist KEIN gültiger JSON String!');
                    $('#output2').html('"importText" ist KEIN gültiger JSON String!');
                }


            });


            function isJsonString(str) {
                try {
                    JSON.parse(str);
                } catch (e) {
                    return false;
                }
                return true;
            }
        });
    </script>
    <?php
}
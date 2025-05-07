<?php 
/**
 * Plugin Name: Search Menu Option
 * Description: Fügt eine Option unter Werkzeuge hinzu, um einen Suchmenüpunkt zum Hauptmenü hinzuzufügen
 * Version: 1.0
 * Author: WordPress Developer
 */

// Sicherheitscheck
if (!defined('ABSPATH')) {
    exit;
}

class SearchMenuOption {
    
    private $option_name = 'search_menu_active';
    
    public function __construct() {
        // Admin-Menü hinzufügen
        add_action('admin_menu', array($this, 'add_tools_page'));
        
        // Hook für die Hauptmenü-Manipulation
        add_filter('wp_nav_menu_items', array($this, 'add_search_to_menu'), 10, 2);
        
        // Admin-Initialisierung für die Registrierung von Einstellungen
        add_action('admin_init', array($this, 'register_settings'));
    }
    
    /**
     * Registriert die Einstellungen für das Plugin
     */
    public function register_settings() {
        register_setting('search_menu_options', $this->option_name);
    }
    
    /**
     * Fügt eine neue Seite im Werkzeuge-Menü hinzu
     */
    public function add_tools_page() {
        add_management_page(
            'Such-Menüpunkt',         // Seitentitel
            'Such-Menüpunkt',         // Menütitel
            'manage_options',         // Erforderliche Berechtigung
            'search-menu-option',     // Menü-Slug
            array($this, 'render_tools_page') // Callback-Funktion
        );
    }
    
    /**
     * Rendert die Seite unter Werkzeuge
     */
    public function render_tools_page() {
        // Überprüfe, ob der Benutzer die notwendigen Rechte hat
        if (!current_user_can('manage_options')) {
            return;
        }
        
        // Verarbeite Formular-Submission
        if (isset($_POST['search_menu_submit'])) {
            $active = isset($_POST['search_menu_active']) ? '1' : '0';
            update_option($this->option_name, $active);
            
            echo '<div class="notice notice-success is-dismissible"><p>';
            if ($active === '1') {
                echo 'Such-Menüpunkt wurde aktiviert.';
            } else {
                echo 'Such-Menüpunkt wurde deaktiviert.';
            }
            echo '</p></div>';
        }
        
        // Hole den aktuellen Wert der Option
        $active = get_option($this->option_name, '0');
        
        // Ausgabe der Formular-Seite
        ?>
        <div class="wrap">
            <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
            <form method="post" action="">
                <?php settings_fields('search_menu_options'); ?>
                <table class="form-table">
                    <tr>
                        <th scope="row">Status</th>
                        <td>
                            <label for="search_menu_active">
                                <input type="checkbox" id="search_menu_active" name="search_menu_active" value="1" <?php checked('1', $active); ?>>
                                Such-Menüpunkt zum Hauptmenü hinzufügen
                            </label>
                            <p class="description">Wenn aktiviert, wird ein Such-Menüpunkt mit "?s=" Parameter zum Hauptmenü hinzugefügt.</p>
                        </td>
                    </tr>
                </table>
                <?php submit_button('Speichern', 'primary', 'search_menu_submit'); ?>
            </form>
        </div>
        <?php
    }
    
    /**
     * Fügt den Such-Menüpunkt zum Hauptmenü hinzu, wenn aktiviert
     * 
     * @param string $items Die Menüpunkte
     * @param object $args Die Menü-Argumente
     * @return string Die geänderten Menüpunkte
     */
    public function add_search_to_menu($items, $args) {
        // Überprüfe, ob die Option aktiviert ist und ob es sich um das Hauptmenü handelt
        if (get_option($this->option_name) === '1' && $args->theme_location === 'primary') {
            $search_item = '<li class="menu-item menu-item-search"><a href="' . esc_url(home_url('/?s=')) . '"><i class="bi bi-search"></i></a></li>';
            $items .= $search_item;
        }
        return $items;
    }
}

// Plugin initialisieren
$search_menu_option = new SearchMenuOption();
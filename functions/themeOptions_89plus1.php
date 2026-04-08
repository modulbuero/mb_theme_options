<?php
if (is_plugin_active( 'woocommerce/woocommerce.php' )) {
	
// 1. Minuten als Buttons auf Produktseite anzeigen
add_action('woocommerce_before_add_to_cart_button', function() {
    global $product;

    // ID des speziellen Produkts anpassen
    if ($product->get_name() !== '89plus1') return;

    // Alle Minuten definieren
    $minutes = range(1, 90);

    // Bereits verkaufte Minuten sammeln
    $sold_minutes = [];
    $orders = wc_get_orders([
        'limit' => -1,
        'status' => 'completed',
    ]);
    foreach ($orders as $order) {
        foreach ($order->get_items() as $item) {
            if ($item->get_product_id() == $product->get_id()) {
                $meta = $item->get_meta('_selected_minute');
                if ($meta) $sold_minutes[] = $meta;
            }
        }
    }

    echo '<p>Spielminute</p>';
    echo '<div class="minute-grid">';
    foreach ($minutes as $minute) {
        $disabled = in_array($minute, $sold_minutes) ? 'disabled' : '';
        echo '<button type="button" class="minute-button" data-minute="'.$minute.'" '.$disabled.'>'.$minute.'</button> ';
    }
    echo '<input type="hidden" name="selected_minute" id="selected_minute">';
    echo '</div>';

    // JS für Auswahl
    ?>
    <script>
    const buttons = document.querySelectorAll('.minute-button');
    const input = document.getElementById('selected_minute');
    buttons.forEach(btn => {
        btn.addEventListener('click', function() {
            if(this.disabled) return;
            buttons.forEach(b => b.classList.remove('selected'));
            this.classList.add('selected');
            input.value = this.dataset.minute;
        });
    });
    </script>
    <?php
});

// 2. Minute prüfen beim Warenkorb hinzufügen
add_filter('woocommerce_add_to_cart_validation', function($passed, $product_id, $quantity) {
    $product = wc_get_product($product_id);
    if ($product->get_name() !== '89plus1') return $passed;

    if (empty($_POST['selected_minute'])) {
        wc_add_notice('Bitte wähle eine Minute aus.', 'error');
        return false;
    }

    // Prüfen, ob Minute schon verkauft
    $minute = sanitize_text_field($_POST['selected_minute']);
    $orders = wc_get_orders(['limit' => -1, 'status' => 'completed']);
    foreach ($orders as $order) {
        foreach ($order->get_items() as $item) {
            if ($item->get_product_id() == $product_id && $item->get_meta('_selected_minute') == $minute) {
                wc_add_notice('Diese Minute wurde bereits gewählt.', 'error');
                return false;
            }
        }
    }

    return $passed;
}, 10, 3);

// 3. Minute in Warenkorb speichern
add_filter('woocommerce_add_cart_item_data', function($cart_item_data, $product_id, $variation_id) {
    $id = $variation_id ? $variation_id : $product_id;
    $product = wc_get_product($id);
    if ($product->get_name() !== '89plus1') return $cart_item_data;

    if (!empty($_POST['selected_minute'])) {
        $cart_item_data['_selected_minute'] = sanitize_text_field($_POST['selected_minute']);
    }

    return $cart_item_data;
}, 10, 3);

// 4. Minute in Bestellposition speichern
add_action('woocommerce_checkout_create_order_line_item', function($item, $cart_item_key, $values, $order) {
    if (!empty($values['_selected_minute'])) {
        $item->add_meta_data('_selected_minute', $values['_selected_minute'], true);
    }
}, 10, 4);

// 5. Minute im Warenkorb & Checkout anzeigen
add_filter('woocommerce_get_item_data', function($item_data, $cart_item) {
    if (!empty($cart_item['_selected_minute'])) {
        $item_data[] = [
            'name'  => 'Minute',
            'value' => esc_html($cart_item['_selected_minute']),
        ];
    }
    return $item_data;
}, 10, 2);

// 6. Schöner Anzeigename im Admin
add_action('woocommerce_checkout_create_order_line_item', function($item, $cart_item_key, $values, $order) {
    if (!empty($values['_selected_minute'])) {
        $item->add_meta_data('Minute', $values['_selected_minute'] . ' min', true);
    }
}, 10, 4);

// 7. Prüfen ob Minute bereits im Warenkorb ist -> macht Nummer 8
    // add_filter('woocommerce_add_to_cart_validation', function($passed, $product_id, $quantity) {

    //     if (empty($_POST['selected_minute'])) return $passed;
    //     $minute = sanitize_text_field($_POST['selected_minute']);

    //     foreach (WC()->cart->get_cart() as $cart_item) {
    //         if (!empty($cart_item['_selected_minute']) && $cart_item['_selected_minute'] == $minute) {
    //             wc_add_notice('Diese Minute liegt bereits im Warenkorb.', 'error');
    //             return false;
    //         }
    //     }

    //     return $passed;
    // }, 20, 3);

// 8. AJAX: belegte Minuten abrufen
add_action('wp_ajax_get_taken_minutes', 'get_taken_minutes');
add_action('wp_ajax_nopriv_get_taken_minutes', 'get_taken_minutes');

function get_taken_minutes() {
    if (empty($_POST['product_id'])) {
        wp_send_json_error();
    }

    $product_id = intval($_POST['product_id']);
    $taken = [];

    // 1. Minuten aus abgeschlossenen Bestellungen
    $orders = wc_get_orders([
        'limit' => -1,
        'status' => ['processing', 'completed'], // optional erweitert
    ]);

    foreach ($orders as $order) {
        foreach ($order->get_items() as $item) {
            if ($item->get_product_id() == $product_id) {
                $m = $item->get_meta('_selected_minute');
                if ($m) $taken[] = (int)$m;
            }
        }
    }

    // 2. Minuten aus aktuellen Warenkörben (Session-basiert)
    foreach (WC()->cart->get_cart() as $cart_item) {
        if (
            $cart_item['product_id'] == $product_id &&
            !empty($cart_item['_selected_minute'])
        ) {
            $taken[] = (int)$cart_item['_selected_minute'];
        }
    }

    wp_send_json_success(array_unique($taken));
}

add_action('wp_enqueue_scripts', function() {

    if (!is_product()) return;

    global $product;
    if (!$product || $product->get_name() !== '89plus1') return;

    wp_enqueue_script(
        'minute-picker',
        get_stylesheet_directory_uri() . '/assets/js/themeOptionsWoo.js',
        [],
        '1.0',
        true
    );

    wp_localize_script('minute-picker', 'minute_ajax', [
        'ajax_url' => admin_url('admin-ajax.php'),
        'product_id' => $product->get_id()
    ]);
});

// 9. Custom CSS für Produktseite
add_action('wp_enqueue_scripts', 'load_custom_css_for_specific_product');
function load_custom_css_for_specific_product() {
    if (is_product()) {
        global $post;

        // Produktname prüfen
        if (get_the_title($post->ID) === '89plus1') {
            wp_enqueue_style(
                'custom-product-css',
                get_stylesheet_directory_uri() . '/assets/css/89plus1.css',
                array(),
                '1.0'
            );
        }
    }

    wp_enqueue_style(
        'mb-woo-css',
        get_stylesheet_directory_uri() . '/assets/css/wooshop.css',
        array(),
        '1.0'
    );
}

// 10. Menge auf 1 begrenzen
add_filter('woocommerce_is_sold_individually', 'disable_quantity_for_specific_product', 10, 2);
function disable_quantity_for_specific_product($return, $product) {
    if ($product && $product->get_name() === '89plus1') {
        return true; // Nur 1 Stück erlaubt → kein Quantity-Feld
    }

    return $return;
}

//Entwicklung: Warenkorb
add_action('woocommerce_single_product_summary', 'custom_add_to_cart_button_bottom', 35);

function custom_add_to_cart_button_bottom() {
    global $product;

    if ($product->get_name() !== '89plus1') return;

    echo '<a href="' . wc_get_cart_url() . '" class="wp-element-button wc-forward" style="margin-top:20px; display:inline-block;">Zum Warenkorb</a>';

}

}
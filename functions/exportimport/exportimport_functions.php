<?php

// use this flag to load only wordpress core
//define( 'SHORTINIT', true );
// find the wp-load.php file and require it
$path = preg_replace( '/wp-content(?!.*wp-content).*/', '', __DIR__ );
require_once( $path . 'wp-load.php' );

// Get Content from Post
$json = file_get_contents('php://input');
// Converts it into a PHP array
$jsondata = json_decode($json, true);
if (isset( $jsondata['saveToDatabase'])) {
    $importArr = $jsondata['saveToDatabase'];
    foreach ($importArr as $singleDbEntry) {
        
        var_dump($singleDbEntry);
        echo $singleDbEntry['option_name'] . '<br>';
        echo $singleDbEntry['option_value'] . '<br>';
        echo '<br>'; 
        
        $result = $wpdb->update(
            $wpdb->prefix .'options',
            array( 
                'option_value' => $singleDbEntry['option_value']
            ),
            array(
                'option_name' => $singleDbEntry['option_name']
            ),
            array(
                '%s' //string
            ),
            array(
                '%s' //string
            )
        );
        if ($result === FALSE || $result < 1) {
            $wpdb->insert(
                $wpdb->prefix .'options',
                array( 
                    'option_value' => $singleDbEntry['option_value'],
                    'option_name' => $singleDbEntry['option_name']
                ),
                array(
                    '%s', //string
                    '%s' //string
                )
            );
        }    
    }    
    echo 'SUCCESS';
} else {
    echo 'ERROR';
}  
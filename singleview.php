<?php
    //include 'index.php';
    
    require __DIR__ . '/vendor/autoload.php';

    use Automattic\WooCommerce\Client;
    use Automattic\WooCommerce\HttpClient\HttpClientException;
    $woocommerce = new Client(
    'https://70f5f7897a.nxcli.io', // Your store URL
    'ck_c38e44917a8a4be6ae423623655879d1a3ccafbf', // Your consumer key
    'cs_31d43cda312ea0f137338b5699e12cd8f849fdda', // Your consumer secret
    [
        'wp_api' => true, // Enable the WP REST API integration
        'version' => 'wc/v2' // WooCommerce WP REST API version
        
    ]
    );

//$products = $woocommerce->get('products');
    $coming_id = htmlspecialchars($_GET["idd"]);
    echo htmlspecialchars($_GET["idd"]);
    //echo $GLOBALS['$woocommerce'];
    $ord = $woocommerce->get('orders');
    print_r($ord);
?>

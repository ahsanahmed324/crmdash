<?php
    include 'index.php';

    echo htmlspecialchars($_GET["idd"]);
    //echo $GLOBALS['$woocommerce'];
    $products = $woocommerce->get('products');
    print_r($products);
?>

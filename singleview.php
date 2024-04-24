<?php
    include index.php;

    echo htmlspecialchars($_GET["idd"]);
    //echo $GLOBALS['$woocommerce'];
    $products = $xx->get('products');
    print_r($products);
?>

<?php
    echo htmlspecialchars($_GET["idd"]);
    $products = $woocommerce->get('products');
    print_r($products);
?>

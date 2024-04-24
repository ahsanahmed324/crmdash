<?php
    echo htmlspecialchars($_GET["idd"]);
    $xx =$GLOBALS['$woocommerce'];
    $productss = $xx->get('products');
    print_r($productss);
?>

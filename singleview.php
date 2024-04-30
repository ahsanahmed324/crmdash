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
    $ord = $woocommerce->get('orders/221955');
    $product_items = array_shift($ord['line_items']);
    //$test_items = ($ord['line_items']);
    print "<pre>ppp";
    print_r($ord);
    print " test items";
    print_r($product_items);
    print "</pre>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <title>Dashboard Template for Bootstrap</title>

</head>
 <body>
	        <?php
        
            
            echo"<div class='container'>
			    <div class='row' style='border: 1px solid #d1cdcd; border-radius: 12px; padding: 15px; margin-bottom:30px; box-shadow:0px 0px 20px 0px #888888;'>
  			        <div class='col-sm-9'><h2><strong>Order #".$ord['id']."</strong></h2></br>".$ord['id']."  ".$ord["status"]."</br>
			            <p>". $ord["date_created"] ."</p></br>
			            <p style='text-decoration: underline; font-size: 16px;'><strong>Address: </strong></p></br><p>".$ord["shipping"]["address_1"]." &nbsp;".$ord["shipping"]["address_2"]."</br>". $ord["shipping"]["city"].",".$ord["shipping"]["state"].",".$ord["shipping"]["country"]."</p>
                        </br><p style='text-decoration: underline; font-size: 16px;'><strong>Items: </strong></p>";
			?>
                        <table id='myTable' class='table table-striped table-bordered'>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
            <?php
                            //echo"<p>". $product_items["name"]."<span> x ".$product_items["quantity"]." </span><span> ".$product_items["subtotal"]."</span>";
                            echo   "<tr><td>".$product_items["name"]."</td>
                            <td>".$product_items["quantity"]."</td>
                            <td>".$product_items["subtotal"];
            ?>
                            </tbody>
                        </table>
                        <p><strong>Upsells/Bumps: </strong></p>
                        <table id='myTable' class='table table-striped table-bordered'>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
            <?php                       
                            foreach ($ord['line_items'] as $key => $value) {
                            //echo "</br> "."<span style='font-weight:bold;'> upsell purchase: </span>". $value["name"]." x ".$value["quantity"]." <strong>".$value["price"]."</strong>";
                            echo "<tr><td>" .$value["name"]."</td>
                            <td>" . $value["quantity"]."</td>
                            <td>" . $value["total"]."</td></tr>";
                            }
             ?>
                            </tbody>
                        </table>
            <?php    
            echo"
                    </div>
 			            <div class='col-sm-3'><h4 style='font-size: 16px;'><strong>Customer detail</strong></h4></br>". $ord["billing"]["first_name"].$ord["billing"]["last_name"]."
			            <p>". $ord["billing"]["email"]."</p>
			            </br>
			    </div>
		    </div>";
            ?>
    </body>
</html>

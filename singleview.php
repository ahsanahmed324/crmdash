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
    $ord = $woocommerce->get('orders/222024');
    $product_items = array_shift($ord['line_items']);
    print "<pre>";
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
            <div class="container">
                              <h2 class="sub-header">Orders List</h2>
                                <div class='table-responsive'>
                                    <table id='myTable' class='table table-striped table-bordered'>
                                        <thead>
                                            <tr>
                                                <th>Order #</th>
                                                <th>Order Date</th>
                                                <th>Customer</th>
                                                <th>Address</th>
                                                <th>Contact</th>
                                                <th>Items</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
		$nextpage = "singleview.php";
                //foreach($results as $details){
		
                echo "<tr><td>" .$ord['id']."</td>
                          <td>" . $ord["date_created"]."</td>  
                          <td>" . $ord["billing"]["first_name"].$ord["billing"]["last_name"]."</td>
                          <td>" . $ord["shipping"]["address_1"]."</td>
                          <td>" . $ord["billing"]["phone"]."</td>
                          <td>" . 'itemsss'."</td>
			  <td>" . $ord["status"]."</td>
                          <td><a class='open-AddBookDialog btn btn-primary' data-target='#myModal' data-id=".$ord['id']." data-toggle='modal'>Update</a>
                          <a class='open-deleteDialog btn btn-danger' data-target='#myModal1' data-id=".$ord['id']." data-toggle='modal'>Delete</a></td></tr>";
                ?>
                                        </tbody>
                                    </table>
                                </div>
               </div>
	       <?php

            
               echo"<div class='container'>
			 <div class='row'>
  			 <div class='col-sm-9'><h4>Order detail</h4></br>".$ord['id']."  ".$ord["status"]."</br>
			 <p>". $ord["date_created"] ."</p></br>
			 <p>". $ord["shipping"]["address_1"]." &nbsp;".$ord["shipping"]["address_2"]."</br>". $ord["shipping"]["city"].",".$ord["shipping"]["state"].",".$ord["shipping"]["country"]."</p>
			 <p>". $product_items."
             </div>
 			 <div class='col-sm-3'><h4>Customer detail</h4></br>". $ord["billing"]["first_name"].$ord["billing"]["last_name"]."
			 <p>". $ord["shipping"]["address_1"]."</p>
			 </br>
			 </div>
			 </div>	
		</div>";
               ?>
</html>

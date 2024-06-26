
<?php
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

//function myMessage($results) {
    //$woocommerce = new Client(
      //  'https://70f5f7897a.nxcli.io', // Your store URL
        //'ck_c38e44917a8a4be6ae423623655879d1a3ccafbf', // Your consumer key
        //'cs_31d43cda312ea0f137338b5699e12cd8f849fdda', // Your consumer secret
       // [
        //    'wp_api' => true, // Enable the WP REST API integration
        //    'version' => 'wc/v2' // WooCommerce WP REST API version
            
        //]
    //);
    //$results = $woocommerce->get('orders?page=2>; rel="next"');
    //echo "function runs";
    //return $results;
  //}
//$products = $woocommerce->get('products');

//$paramz = "orders";
//$thepage = 1;

if (isset($_GET['page_no'])){    
    $offset = $_GET['page_no'];
    $querry = "orders?offset=".$offset;

    try {
        echo "page onee";
        $results = $woocommerce->get($querry);
        echo "page two";
        //$results = $woocommerce->get('orders');
        $products = $woocommerce->get('products');
        $customers = $woocommerce->get('customers');
        $result = count($results);
        $customer = count($customers);
        $product = count($products);
        $query = ['date_min' => '2017-10-01', 'date_max' => '2017-10-30'];
        $sales = $woocommerce->get('reports/sales', $query);
        $sale = $sales[0]["total_sales"];
    
        // Last request data.
    
        $lastRequest = $woocommerce->http->getRequest();
        $lastRequest->getUrl(); // Requested URL (string).
        $lastRequest->getMethod(); // Request method (string).
        $lastRequest->getParameters(); // Request parameters (array).
        $lastRequest->getHeaders(); // Request headers (array).
        $lastRequest->getBody(); // Request body (JSON).
    
        // Last response data.
    
        $lastResponse = $woocommerce->http->getResponse();
        $lastResponse->getCode(); // Response code (int).
        $lastResponse->getHeaders(); // Response headers (array).
        $lastResponse->getBody(); // Response body (JSON).
    }
    
    catch(HttpClientException $e) {
        $e->getMessage(); // Error message.
        $e->getRequest(); // Last request data.
        $e->getResponse(); // Last response data.
    }
}
else{

    try {

        $results = $woocommerce->get('orders');
        //$results = $woocommerce->get('orders');
        $products = $woocommerce->get('products');
        $customers = $woocommerce->get('customers');
        $result = count($results);
        $customer = count($customers);
        $product = count($products);
        $query = ['date_min' => '2017-10-01', 'date_max' => '2017-10-30'];
        $sales = $woocommerce->get('reports/sales', $query);
        $sale = $sales[0]["total_sales"];
    
        // Last request data.
    
        $lastRequest = $woocommerce->http->getRequest();
        $lastRequest->getUrl(); // Requested URL (string).
        $lastRequest->getMethod(); // Request method (string).
        $lastRequest->getParameters(); // Request parameters (array).
        $lastRequest->getHeaders(); // Request headers (array).
        $lastRequest->getBody(); // Request body (JSON).
    
        // Last response data.
    
        $lastResponse = $woocommerce->http->getResponse();
        $lastResponse->getCode(); // Response code (int).
        $lastResponse->getHeaders(); // Response headers (array).
        $lastResponse->getBody(); // Response body (JSON).
    }
    
    catch(HttpClientException $e) {
        $e->getMessage(); // Error message.
        $e->getRequest(); // Last request data.
        $e->getResponse(); // Last response data.
    }
    
}

if (isset($_POST['btn-update'])) {
	$status = $_POST['bookId'];
	$st = $_POST['ostatus'];

	$woocommerce->put('orders/' . $status, array(
		'status' => $st
	));
	header('Location: https://shahroznawaz.com/woo');
}


if (isset($_POST['btn-delete'])) {
	$oid = $_POST['cId'];

	$woocommerce->delete('orders/' . $oid, ['force' => true]);
	header('Location: https://shahroznawaz.com/woo');
}

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
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-1">
                     <h1 class="page-header">Dashboard</h1>

                     <div class="row placeholders">
                                <div class="col-xs-6 col-sm-3 placeholder">
                                    <p id="large">
                                        <?php echo $result?>
                                    </p>
                                    <hr>
                                    <span class="text-muted">New Orders</span>
                                </div>
                                <div class="col-xs-6 col-sm-3 placeholder">
                                    <p id="large">
                                        <?php echo $customer?>
                                    </p>
                                    <hr>

                                    <span class="text-muted">Customers</span>
                                </div>
                                <div class="col-xs-6 col-sm-3 placeholder">
                                    <p id="large">
                                        <?php echo $product?>
                                    </p>
                                    <hr>
                                    <span class="text-muted">All Products</span>
                                </div>
                                <div class="col-xs-6 col-sm-3 placeholder">
                                    <p id="large">
                                        <?php echo $sale?>
                                    </p>
                                    <hr>
                                    <span class="text-muted">Total Sales</span>
                                </div>
                      </div>
              </div>
      </div>
             <div class="container">
                              <h2 class="sub-header">Orders List</h2>
                                <div class='table-responsive'>
                                    <table id='myTable' class='table table-striped table-bordered'>
                                        <thead>
                                            <tr>
                                                <th>Order #</th>
                                                <th>Customer</th>
                                                <th>Address</th>
                                                <th>Contact</th>
                                                <th>Order Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
		$nextpage = "singleview.php";
                foreach($results as $details){

                echo "<tr><td>".'<a href="'.$nextpage.'/?idd='.$details['id'].'">'.$details['id']."</a></td>
                          <td>" . $details["billing"]["first_name"].$details["billing"]["last_name"]."</td>
                          <td>" . $details["shipping"]["address_1"]."</td>
                          <td>" . $details["billing"]["email"]."</td>
                          <td>" . $details["date_created"]."</td>
			  <td>" . $details["status"]."</td>
                          <td></td></tr>";
                }
                ?>
                                        </tbody>
                                    </table>
                                    <?php 
                                       $pge_no= htmlspecialchars($_GET['page_no']);
                                       $pge_no = (int)$pge_no;
                                       $pge_no = $pge_no + 10; 
                                       echo '<a class="btn btn-outline-dark" style="float:right;" href="https://mycrm-e4afdad64f54.herokuapp.com/?page_no='.$pge_no.'">
                                        Next Page
                                    </a>';
                                    ?>
                                </div>
               </div>

               

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update Order Status</h4>
            </div>
            <div class="modal-body">
                <p>Order ID:</p>
                <form action="" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="bookId" id="bookId" value="">
                        <p for="sel1">Select list (select one):</p>
                        <select class="form-control" id="status" name="ostatus">
                            <option>Pending Payment</option>
                            <option>processing</option>
                            <option>On Hold</option>
                            <option>completed</option>
                            <option>Cancelled</option>
                            <option>Refunded</option>
                            <option>Failed</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-block" name="btn-update">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Confirm Order Deletion</h4>
            </div>
            <div class="modal-body">
                <p>Really you want to delete order?</p>
                <form action="" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="cId" id="cId" value="">
                    </div>

                    <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger" name="btn-delete">Delete</button>
                   </div>
                </form>
            </div>
        </div>
    </div>
</div>



        <script>
            $(document).on("click", ".open-AddBookDialog", function() {
                var myBookId = $(this).data('id');
                $(".modal-body #bookId").val(myBookId);
            });
        </script>

        
        <script>
            $(document).on("click", ".open-deleteDialog", function() {
                var myBook = $(this).data('id');
                $(".modal-body #cId").val(myBook);
            });
        </script>


</body>

</html>




































 <!--<div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Analytics</a></li>
            <li><a href="#">Export</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
            <li><a href="">More navigation</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
          </ul>
        </div>-->

        <!--<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>-->

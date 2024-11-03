<!doctype html>
<html>
    <head> 
        <meta charset="utf-8">

        <title>No Cheese For The Wicked</title>
        <link rel="stylesheet" href="../CSS/stylesheet.css">
    </head>
 
    <body>
    <header id="customer_header">
            <nav id="customer_nav">
            <h1 id = "page-Title">No Cheese For The Wicked</h3>
            <ul id="customer_info">
                <a href="../Controller/products_controller.php"> <li>Home</li></a>
                <a href="../Controller/basketController.php" id="basket_link"> <li>Basket [<?=$basketCount?>]</li></a>
                <a href="../Controller/login_control.php"><input type="submit" id="log_out" value="Log In"></a>
            </ul>
            </nav>
        </header>
        <div class="orderCenter">
            <h2>Order Confirmed! Thank You For Your Order, <?=$order->givenName." ".$order->familyName?></h2>
            <h3>Your order number is #<?=$userOrderNo?></h3>
        </div>
    </body>
</html>
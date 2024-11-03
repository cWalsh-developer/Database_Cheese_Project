<!doctype html>
<html>
    <head> 
        <meta charset="utf-8">

        <title>No Cheese For The Wicked</title>
        <link rel="stylesheet" href="../CSS/stylesheet.css">
    </head>
 
    <body>
        <div class="orderCenter">
            <h2>Order Confirmed! Thank You For Your Order, <?=$_SESSION["userDetails"][0]->givenName." ".$_SESSION["userDetails"][0]->familyName?></h2>
            <h3>Your order number is #<?=$userOrderNo?></h3>
        </div>
    </body>
</html>
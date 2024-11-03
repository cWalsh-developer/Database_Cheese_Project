<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Checkout</title>
        <link rel="stylesheet" href="../CSS/stylesheet.css">
        <script type = "text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script type = "text/javascript" src="../JavaScript/orderJSCode.js"></script>
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
    </body>
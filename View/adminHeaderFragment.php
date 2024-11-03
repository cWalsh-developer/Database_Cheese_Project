<!doctype html>
<html>
    <head> 

        <meta charset="utf-8">
        <link rel="stylesheet" href="../CSS/stylesheet.css">
    </head>
 <body>
        <header id="admin_header">
            <nav id="admin_nav">
                <div class="headings">
                    <h1 id = "admin_page-Title">No Cheese For The Wicked</h1>
                    <h2 id = "admin_page-subTitle">Admin</h2>
                    <ul id="customer_info">
                        <a href="../Controller/admin_controller.php"> <li id="dashboard">Dashboard</li></a>
                        <a href="#" id="account_link"> <li>Account</li></a>
                        <a href="../Controller/products_controller.php"> <li>Shop</li></a>
                        <a href="../Controller/basketController.php" id="basket_link"> <li>Basket [<?=$basketCount?>]</li></a>
                        <a href = "../Controller/log_out_controller.php"><input type="submit" id="log_out" value="Log Out"></a>
                    </ul>
                </div>
            </nav>
        </header>
</body>
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
        <form method ="post" action="../Controller/products_controller.php" id="searchTable">
            <div class="background-div">
                <input name = "search" placeholder ="Search by Brand, Weight, Cost Strength or Country of Origin" id="search"/>
                <input type = "submit" value ="Search" id="searchSubmit"/>
                <br>
            </div>
            </form>
                <br>
                <div class="center">
                <div class="tableOverflow">
                <table>
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Cheese Name</th>
                            <th>Brand Name</th>
                            <th>Cost</th>
                            <th>Quantity</th>
                            <th>Strength</th>
                            <th>Country Of Origin</th>
                            <th>Weight</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION ["results"] as $products): ?>
                        <tr>
                            <td><?= $products->cheeseID ?></td>
                            <td><?= $products->productType ?></td>
                            <td><?= $products->brand?></td>
                            <td><?= "£".$products->cost?></td>
                            <td id="quantity"><?= $products->quantity?></td>
                            <td><?= $products->strength?></td>
                            <td><?= $products->countryOfOrigin?></td>
                            <td><?= $products->weight."g"?></td>
                            <td> <a href="../Controller/products_controller.php?products=<?=$products->cheeseID?>"><input type ="submit" id="guestBasketBtn" value ="Add to Basket"/></a></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                </div>
                </div>
        <p id="recentlyViewedHeading">Recently Searched Products:</p>
        <div class="centerRecentlyViewed">
            <ol id="recentlyViewdItems">
                <?php foreach ($_SESSION["previousSearch"] as $search): ?>
                <li><?=$search?></li>
                <?php endforeach ?>
            </ol>
        </div>
        <script>
            if("<?=$quantityStatus?>" == "You cannot add more than the available quantity!")
            {
                alert("<?=$quantityStatus?>");
            }
        </script>
    </body>
</html>
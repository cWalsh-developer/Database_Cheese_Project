<!doctype html>
<html>
    <head> 
        <meta charset="utf-8">
        <title>No Cheese For The Wicked</title>
        <link rel="stylesheet" href="../CSS/stylesheet.css">
    </head>
 
    <body>
        <form method ="post" action="../Controller/products_controller.php" id="searchTable">
            <div class="background-div">
                <input name = "search" placeholder ="Search by Brand, Weight, Cost Strength or Country of Origin" id="search"/>
                <input type = "submit" value ="Search" id="searchSubmit"/>
                <br>
            </div>
            </form>
        <div class="cheese-table">
                <br>
                <div class="table_customer_design_div">
                    <table>
                        <thead>
                            <tr>
                                <th id="productID">Product ID</th>
                                <th id="productTpe">Cheese Name</th>
                                <th id = "productBrand">Brand Name</th>
                                <th id="productCost">Cost</th>
                                <th id="productQuantity">Quantity</th>
                                <th id=productStrength>Strength</th>
                                <th id="productCountry">Country Of Origin</th>
                                <th id="productWeight">Weight</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($_SESSION ["results"] as $products): ?>
                            <tr>
                                <td><?= $products->cheeseID ?></td>
                                <td><?= $products->productType ?></td>
                                <td><?= $products->brand?></td>
                                <td><?= "£".$products->cost?></td>
                                <td id="quantity"><?=$products->quantity?></td>
                                <td><?= $products->strength?></td>
                                <td><?= $products->countryOfOrigin?></td>
                                <td><?= $products->weight."g"?></td>
                                <td> <a href="../Controller/products_controller.php?customerProducts=<?=$products->cheeseID?>"><input type ="submit" id="basketBtn" value ="Add to Basket"/></a></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
        </div>

        <p id="recentlyViewedHeading">Recently Searched Products:</p>
        <div class="centerRecentlyViewed">
            <ol id="recentlyViewdItems">
                <?php foreach ($_SESSION["customerPreviousSearch"] as $search): ?>
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
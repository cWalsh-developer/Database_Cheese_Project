<!doctype html>
<html>
    <head> 

        <meta charset="utf-8">
        <title>No Cheese For The Wicked</title>
        <link rel="stylesheet" href="../CSS/stylesheet.css">
    </head>
 
    <body>
        <div class="cheese-table">
        <form method ="post" action="admin_controller.php">
                    <input name = "search" placeholder ="Search by Brand, Weight, Cost Strength or Country of Origin" id="search"/>
                    <input type = "submit" value ="Search" id="searchSubmit"/>
                </form>
                <br>
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
                        <?php foreach ($_SESSION["results"] as $products): ?>
                        <tr>
                            <td><?= $products->cheeseID ?></td>
                            <td><?= $products->productType ?></td>
                            <td><?= $products->brand?></td>
                            <td><?= "£".$products->cost?></td>
                            <td><?= $products->quantity?></td>
                            <td><?= $products->strength?></td>
                            <td><?= $products->countryOfOrigin?></td>
                            <td><?= $products->weight."g"?></td>
                            <td><a href="../Controller/deleteProducts_controller.php?products=<?=$products->cheeseID?>"><input type ="submit" id="DeleteBtn" value ="Delete"/></a></td>
                            <td><a href="../Controller/updateProducts_controller.php?productUpdate=<?=$products->cheeseID?>"><input type ="submit" id="EditBtn" value ="Edit"/></a></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <br>
                <a href="addProducts_controller.php"><input type ="submit" id="addProductBtn" value ="Add Product"/></a>
        </div>
    </body>
</html>
<!doctype html>
<html>
    <head> 
        <meta charset="utf-8">
        <title>No Cheese For The Wicked</title>
        <style>
            <?php include "stylesheet.css"?>
        </style>
    </head>
 
    <body>
    <form method ="post" action="products_controller.php">
            <input name = "search" value ="Search by brand or name:"/>
            <input type = "submit" value ="search"/>
    </form>
        <table>
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Cheese Name</th>
                    <th>Brand Name</th>
                    <th>Cost</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $products): ?>
                <tr>
                    <td><?= $products->cheeseID ?></td>
                    <td><?= $products->productType ?></td>
                    <td><?= $products->brand?></td>
                    <td><?= $products->cost?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <p>Recently Viewed Items:</p>
        <ul>
            <?php foreach ($_SESSION["previousSearch"] as $search): ?>
                <li><?=$search?></li>
                <?php endforeach ?>
        </ul>
    </body>
</html>
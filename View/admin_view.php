<!doctype html>
<html>
    <head> 
        <meta charset="utf-8">
        <title>No Cheese For The Wicked</title>
        <link rel="stylesheet" href="../CSS/stylesheet.css">
    </head>
 
    <body>
        <header>
            <nav>
            <h1 id = "page-Title">No Cheese For The Wicked</h3>
            </nav>
        </header>
        <div class="cheese-table">
                <table>
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Cheese Name</th>
                            <th>Brand Name</th>
                            <th>Cost</th>
                            <th>Quantity</th>
                            <th>Strength</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($results as $products): ?>
                        <tr>
                            <td><?= $products->cheeseID ?></td>
                            <td><?= $products->productType ?></td>
                            <td><?= $products->brand?></td>
                            <td><?= $products->cost?></td>
                            <td><?= $products->quantity?></td>
                            <td><?= $products->strength?></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
        </div>
    </body>
</html>
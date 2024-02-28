<!doctype html>
<html>
    <head> 
        <meta charset="utf-8">
        <title>No Cheese For The Wicked</title>
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
    </head>
    <body>
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
                    <td><?= $products->id ?></td>
                    <td><?= $products->givenName ?></td>
                    <td><?= $products->familyName ?></td>
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
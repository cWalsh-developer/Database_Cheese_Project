<!doctype html>
<html>
    <head>
        <title>No Cheese For The Wicked</title>
    </head>
    <body>
        <form method ="post" action="studentlist.php">
            Search for surname:
                <input name = "search"/>
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
                    <td><?= $products->id ?></td>
                    <td><?= $products->givenName ?></td>
                    <td><?= $products->familyName ?></td>
                    <td><?= $products->cost?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <ul>
            <?php foreach ($_SESSION["previousSearch"] as $search): ?>
                <li><?=$search?></li>
                <?php endforeach ?>
            </ul>
    </body>
</html>          
<!doctype html>
<html>
    <head> 
        <meta charset="utf-8">

        <title>No Cheese For The Wicked</title>
        <link rel="stylesheet" href="../CSS/stylesheet.css">
    </head>
 
    <body>
        <div class="basketCenter">
            <h2>Guest Basket</h2>
            <?php if($status): ?>
                <p style="color: red;"><?=$status?></p>
            <?php endif ?>
            <ol>
                <?php foreach($_SESSION["basket"] as $basketItems): ?>
                    <li><?= "Type:  ".$basketItems->productType?><br>
                    <?=" Brand:  ".$basketItems->brand?><br>
                    <?=" Unit Cost:  £".$basketItems->cost?><br>
                    <?=" Strength:  ".$basketItems->strength?><br>
                    <?=" CountryOfOrigin:  ".$basketItems->countryOfOrigin?><br>
                    <?=" Weight:  ".$basketItems->weight."g"?><br>
                    <?=" Quantity:  ".$basketItems->quantity?></li><br>
                <?php endforeach?>    
            </ol>
            <h2>Total Cost = £<?=number_format($totalCost, 2)?></h2>
            <a href="../Controller/checkoutController.php"><input type = submit id="checkoutBtn" value="Checkout"></a>
        </div>
    </body>
</html>
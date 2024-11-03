<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Delete Product</title>
        <link rel="stylesheet" href="../CSS/stylesheet.css">
    </head>
    <body>
        <header>
            <nav>
            <h1 id = "login_page-Title">No Cheese For The Wicked</h3>
            </nav>
        </header>
        <div class="regContainerMain">
            <div class="regContainerTitle">
                <h3 id = "Title">Delete Products</h3>
            </div>
            <div class="registrationForm">
                <form action="../Controller/deleteProducts_controller.php" id = "registerForm" method ="post">
                    <label for="productType">Cheese Type:</label><br>
                    <input type="text" id="productType" name="productType" placeholder="Enter a type of cheese:"><br>
                    <br>
                    <label for="brand">Brand:</label><br>
                    <input type="text" id="brand" name="brand" placeholder="Enter a cheese brand:"><br><br>
                    <label for="email">Cost:</label><br>
                    <input type="text" id="cost" name="cost" placeholder="Enter a cost in decimal eg: 4.56:"><br>
                    <br>
                    <label for="quantity">Quantity:</label><br>
                    <input type="text" id="quantity" name="quantity" placeholder="Enter a quantity amount:"><br><br>
                    <label for="strength">Stength:</label><br>
                    <input type="text" id="strength" name="strength" placeholder="Enter a strength, e.g: 'Mild'"><br>
                    <br>
                    <div class="login-center">
                            <input type="submit" id="submit" value="Update Product">
                    </div>
                    <?php if($status): ?>
                        <p style="color: green"><?=$status?></p>
                    <?php endif?>
                </form> 
            </div>
        </div>
        <br>
        <div class="dashboard">
            <form action="../Controller/admin_controller.php" method="post">
                <input type="submit" id="submit" value="Back to Dashboard">
            </form>
        </div>
        <script src="../JavaScript/Cheese.js"></script>
    </body>
</html>          
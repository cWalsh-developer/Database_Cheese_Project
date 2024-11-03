<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Checkout</title>
        <link rel="stylesheet" href="../CSS/stylesheet.css">
        <script type = "text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script type = "text/javascript" src="../JavaScript/orderJSCode.js"></script>
    </head>
    <body>
        <div class="regContainerMain">
            <div class="regContainerTitle">
                <h3 id = "Title">Checkout</h3>
            </div>
            <div class="checkoutForm">
                <form id = "registerForm" method ="post" action="./confirmationController.php">
                    <label for="firstName">First Name:</label><br>
                    <input type="text" id="firstName" name="firstName" placeholder="Enter your first name"><br>
                    <br>
                    <label for="lastName">Last Name:</label><br>
                    <input type="text" id="lastName" name="lastName" placeholder="Enter your last name"><br><br>
                    <label for="checkoutEmail">Email:</label><br>
                    <input type="text" id="checkoutEmail" name="checkoutEmail" placeholder="Enter your email"><br>
                    <br>
                    <label for="addressLineOne">Address Line One:</label><br>
                    <input type="text" id="addressLineOne" name="addressLineOne" placeholder="Please enter your address line one"><br><br>
                    <label for="addressLineTwo">Address Line Two:</label><br>
                    <input type="text" id="addressLineTwo" name="addressLineTwo" placeholder="Enter your address line two"><br>
                    <br>
                    <label for="townAndCity">Town/City:</label><br>
                    <input type="text" id="townAndCity" name="townAndCity" placeholder="Enter your town/city"><br>
                    <br>
                    <label for="checkoutPostcode">Postcode:</label><br>
                    <input type="text" id="checkoutPostcode" name="checkoutPostcode" placeholder="Enter your postcode"><br>
                    <br>
                    <form id = "cardDetailsForm" method ="post">
                        <label for="cardName">Card Holder Name:</label><br>
                        <input type="text" id="cardName" name="cardName" placeholder="Enter the name on your credit/debit card"><br>
                        <br>
                        <label for="cardNumber">Card Number:</label><br>
                        <input type="text" id="cardNumber" name="cardNumber" placeholder="Enter your card number"><br><br>
                        <label for="expiryDate">Expiry Date:</label><br>
                        <input type="text" id="expiryDate" name="expiryDate" placeholder="YYYY-MM-DD"><br>
                        <br>
                        <label for="securityCode">Security Code:</label><br>
                        <input type="text" id="securityCode" name="securityCode" placeholder="Please enter 3 digit security code"><br><br>
                        <div class="login-center">
                            <input type="submit" id="submit" value="Checkout">
                        </div>
                    </form> 
                </div>
        </div>
    </body>
</html>          
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Register</title>
        <link rel="stylesheet" href="../CSS/stylesheet.css">
    </head>
    <body>
        <header>
            <nav>
            <h1 id = "login_page-Title">No Cheese For The Wicked</h3>
            </nav>
        </header>
        <div class="regContainerMain_register_view">
            <div class="regContainerTitle">
                <h3 id = "Title">Welcome</h3>
            </div>
            <div class="registrationForm">
                <form action="../Controller/register_controller.php" id = "registerForm" method ="post">
                    <label for="givenName">First Name:</label><br>
                    <input type="text" id="givenName" name="givenName" placeholder="Enter your first name:"><br>
                    <br>
                    <label for="surname">Last Name:</label><br>
                    <input type="text" id="surname" name="surname" placeholder="Enter your last name:"><br><br>
                    <label for="email">Email:</label><br>
                    <input type="text" id="regEmail" name="email" placeholder="Enter your email"><br>
                    <br>
                    <label for="addressOne">Address Line 1:</label><br>
                    <input type="text" id="addressOne" name="addressOne" placeholder="Enter Address Line 1"><br><br>
                    <label for="addressTwo">Address Line 2:</label><br>
                    <input type="text" id="addressTwo" name="addressTwo" placeholder="Enter Address Line 2"><br>
                    <br>
                    <label for="town/city">Town/City:</label><br>
                    <input type="text" id="town-city" name="town/city" placeholder="Enter your Town or City"><br><br>
                    <label for="postcode">Postcode:</label><br>
                    <input type="text" id="postcode" name="postcode" placeholder="Enter your postcode/zip code"><br><br>
                    <label for="password">New Password:</label><br>
                    <input type="password" id="newPassword" name="password" placeholder="Enter your new password"><br>
                    <br>
                    <label for="confirmPassword">Confirm New Password:</label><br>
                    <input type="password" id="confirmPassword" name="confirmPassword"><br><br>
                    <div class="login-center">
                            <input type="submit" id="submit" value="Register">
                    </div>
                </form> 
            </div>
        </div>
        <br>
        <div class="back_to_login_container">
            <a href="../Controller/login_control.php"><input type="submit" id="submitToLogin" value="Log in"></a>
        </div>
        <script src="../JavaScript/Cheese.js"></script>
    </body>
</html>          
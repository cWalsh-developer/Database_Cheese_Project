<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" href="../CSS/stylesheet.css">
    </head>
    <body>
        <header>
            <nav id="login_nav">
            <a href="../Controller/products_controller.php"><h1 id = "login_page-Title">No Cheese For The Wicked</h3></a>
            </nav>
        </header>
        <div class="regContainerMain">
            <div class="regContainerTitle">
                <h3 id = "Title">Login</h3>
            </div>
            <div class="registrationForm">
                <form action="../Controller/login_control.php" id = "loginForm" method ="post">
                    <label for="email" id="emailLabel">Email:</label><br>
                    <input type="text" id="email" name="email" placeholder ="Enter your email"><br>
                    <?php if($status):?>
                        <p style = "color: red"><?=$status?></p>
                    <?php endif?>
                    <br>
                    <label for="password" id="passwordLabel">Password:</label><br>
                    <input type="password" id="password" name="password"><br><br>
                    <?php if($passwordStatus):?>
                        <p style = "color: red"><?=$passwordStatus?></p>
                    <?php endif?>
                    <div class="login-center">
                        <input type="submit" id="submit" value="Login">
                    </div>
                </form> 
                <br>
                <form action="../Controller/register_controller.php" method="post" id="registerFormBtn">
                    <input type="submit" id="regSubmit" value="Register">
                </form>
            </div>
        </div>
        <script>
            document.getElementById("email").value = "<?= $search ?>";
            document.getElementById("password").value = "<?= $passwordSearch ?>";
        </script>
    </body>
</html>          
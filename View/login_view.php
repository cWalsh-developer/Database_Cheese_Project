<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" href="../View/stylesheet.css">
    </head>
    <body>
        <div class="regContainerMain">
            <div class="regContainerTitle">
                <h3 class="Title">Welcome</h3>
            </div>
            <form id = radioForm>
                <p> Which User Are you?</p>
                <div class="radioForm-content">
                    <div class="radioFrom-customer">
                        <input type = "radio" id = "customer" name = "radioForm" value = "Customer" >
                        <label for = "customer"> Customer</label>
                    </div>
                    <div class="radioFrom-admin">
                        <input type = "radio" id = "admin" name = "radioForm" value = "Admin"  >
                        <label for = "admin"> Admin</label>
                    </div>                
                </div>
            </form>
            <div class="registrationForm">
                <form action="../Controller/login_control.php" id = "loginForm" method ="post">
                    <label for="email">Email:</label><br>
                    <input type="text" id="email" name="email" value="Enter your email" onclick = "emailFieldClick()"><br>
                    <?php if($status):?>
                        <p style = "color: red"><?=$statusmessage?></p>
                    <?php endif?>
                    <br>
                    <label for="password">Password:</label><br>
                    <input type="password" id="password" name="password"><br><br>
                    <div class="login-center">
                        <input type="submit" id="submit" value="Login">
                    </div>
                </form> 
            </div>
            <div class="start-center">
                <input type="submit" id="Start" value="Start Shopping" onclick = "buttonClick()">
            </div>
        </div>
        <script src="../View/PE2_Calc_JavaScript.js"></script>
        <script>
            if (<?= $admin ?> == 3) {
                adminRadioChecked();
            }
            document.getElementById("email").value = "<?= $search ?>"; 
        </script>
    </body>
</html>          
<html>
    <head>
        <title>Reg Form</title>
        <script src="https://www.google.com/recaptcha/api.js?render=6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css.css">
    </head>
    <script>
            function check() {
                if(grecaptcha.getResponse().length !== 0){ 
                    $('#check').prop("disabled", false);
                }
            } 
    </script>
    <body>
    <?php include("nav.php");?>
    <div id="reg-form">
        <h1>Registration</h1>
        <form method="POST" action="createAccount.php" name="RegForm">
            User ID:
            <br>
            <input type="text" name="sid" required>
            <br>
            Password:
            <br>
            <input type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least eight letter in total including one uppercase and one lowercase letter and at least one number" placeholder="D21$al21" required>
            <br>
            Cofirmed Password:
            <br>
            <input type="password" name="confirm_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter" placeholder="D21$al21" required>
            <br>
            Name:
            <br>
            <input type="text" name="name" placeholder="Chan MAN" required>
            <br>
            Email:
            <br>
            <input type="email" name="email" placeholder="ChanMAN@gmail.com" required>
            <br>
            Birthday:
            <br>
            <input type="date" name="birthday" required>
            <br>
            <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI" data-callback="check"></div>
            <br>
            <input type="submit" name="submit" class="btn btn-primary" id="check" disabled="disabled" ><input type="reset" name="reset" class="btn btn-primary">
        </form>
            <a href="index.php">Back to Login Page</a>
        </div>
    </body>
 

</html>


<?php
    include("config.php");
?>


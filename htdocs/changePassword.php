<?php
    include("config.php");
?>
<html>
    <head>
        <title>Change Password</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://www.google.com/recaptcha/api.js?render=6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></script>
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
        <div id="changePassword-form">
        <h1>Change Password</h1>
        <form method="POST" action="changePasswordDone.php" name="RegForm">
            Student ID:
            <br>
            <input type="text" name="sid" pattern="[0-9]{8}[A-Z]{1}" title="Must contain nine number and one letter" required>
            <br>
            Password:
            <br>
            <input type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter" required>
            <br>
            Cofirmed Password:
            <br>
            <input type="password" name="confirm_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter" required>
            <br>
            <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI" data-callback="check" ></div>
            <br>
            <input type="submit" name="submit" id="check" disabled="disabled" class="btn btn-primary"><input type="reset" name="reset" class="btn btn-primary">
        </form>
            <a href="index.php" title="Back to Index">Click here to go back to the login page</a>
        </div>
    </body>
 

</html>
<?php
    $_SESSION['code'] =  $_GET['code'];

    include("footer.php");
   
?>
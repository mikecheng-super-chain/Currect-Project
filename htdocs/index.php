<?php
   include("config.php");
?>

<html>
    <head>
        <title>Login</title>
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
            function showPassword() {
                var x = document.getElementById("myInput");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
    </script>
   <body>
   <?php session_destroy();?>
   <?php include("nav.php");?>
    <div id="index-form" class="bg-white">
        <h1>Login</h1>
        <form method="post" action="checkInfo.php">
            User ID:
            <br>
            <input type="text" name="sid" required>
            <br>
            Password:
            <br>
            <input type="password" name="password" id="myInput" required>
            <br>
            <input type="checkbox" onclick="showPassword()">Show Password
            <br>
            <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI" data-callback="check" ></div>
            <br>
            <input type="submit" class="btn btn-primary" name="submit" id="check" disabled="disabled" ><input type="reset" name="reset" class="btn btn-primary">
        </form>
        <a href="forgetPassword.php" title="Click here for resetting the password">Lost your password?</a>
        </div>
    </body>

    
</html>


<?php
       include("footer.php");

?>
<?php
    include("config.php");
?>
<html>
    <head>
        <title>Forget Password</title>
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
    <div id="forgetPassword-form">
        <h1>Forget Password</h1>
        <form method="POST" action="forgetPasswordDone.php" name="RegForm">
            
            User ID:
            <input type="text" name="sid" required>
            <br>
            Email:
            <input type="email" name="email" required>
            <br>
            <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI" data-callback="check" ></div>
            <br>
            <input type="submit" name="submit" class="btn btn-primary" id="check" disabled="disabled" ><input type="reset" name="reset" class="btn btn-primary">
        </form>
            <a href="index.php">Back to Login Page</a>
    </div>
    </body>
 

</html>


<?php
    include("footer.php");
?>


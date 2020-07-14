<html>
<head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="css.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://www.google.com/recaptcha/api.js?render=6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
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
   <body class="bg-info">
   <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-8">
                    <div id="login-box" class="col-md-12  bg-dark">
                        <form method="POST" class="form " action="checkAdmin.php">
                        <h3 class="text-center text-secondary">Admin Login</h3>
                        <div class="form-group">
                        <label class="text-secondary">Private Key:</label>
                        <input type="text" name="private_key" class="form-control" required>
                        </div><div class="form-group">
                        <label class="text-secondary">Password:</label>
                        <input type="password" name="password" class="form-control" required>
                        </div><div class="form-group">
                        <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI" data-callback="check" ></div>
                        <br>
                        <div class="form-group">
                        <input type="submit" class="btn btn-primary btn float-right" name="submit" id="check" disabled="disabled" >
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>


<?php
   include("config.php");
?>

<html>
    <head>
        <title>Email Verificaion</title>
        <link rel="stylesheet" href="style.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css.css">
    </head>
    <body>
        <div id="createAccount-form">
        <h1>Congratulations</h1>
            Your account email has been registered successfully verified, you are now able to login to our system with your sid and password.<br><br>
            <a href="index.php" title="Back to Index">Click here to go back to the login page</a>
        </div>
    </body>
</html>
<?php
    include("config.php");
    $code = $_GET['code'];
    $sql = "SELECT * FROM info WHERE code = '$code'";
    $result = $conn->query($sql);
    

    if ($result->num_rows > 0) {
        if (isset($_GET['code'])) {
            $changeCode = md5(rand());
            $sql = "UPDATE info SET status ='verified' , code ='$changeCode' WHERE code = '$code'";
            $result = $conn->query($sql);
        }
        
    }
    $conn->close();
?>
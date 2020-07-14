<html>
    <head>
        <title>Change Password </title>
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
        <h1>Change Password</h1>
            Your account password has been changed successfully!<br><br>
            <a href="index.php" title="Back to Index">Click here to go back to the login page</a>
        </div>
    </body>
</html>
<?php
    include("config.php");

    if(isset($_POST['sid'])){

        $sid = $_POST['sid'];
        $password= base64_encode($_POST["password"]);
        $confirm_password = base64_encode($_POST["confirm_password"]);

        $code =  $_SESSION['code'];

        $sql = "SELECT * FROM info WHERE code = '$code'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            if($row = $result->fetch_assoc()) {
                if($sid = $row['sid'] && $password == $confirm_password){
                    $changeCode = md5(rand());
                    $sql = "UPDATE info SET status ='verified' ,code = '$changeCode', password = '$password' WHERE code = '$code'";
                    $result = $conn->query($sql);
                }else{
                     echo "<br>Please check your information!";
                }
            }
        $conn->close();
    }
}
?>
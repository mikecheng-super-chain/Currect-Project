<html>
    <head>
        <title>Update</title>
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
        
    </body>
</html>
<?php 
include('config.php');


$sid = $_SESSION['sid'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = base64_encode($_POST['password']);
$status = $_POST['status'];
$birthday = $_POST['birthday'];

$sql = "UPDATE info SET name = '$name' , email = '$email',password = '$password',status = '$status',birthday = '$birthday'  WHERE sid = '$sid'";
$result = $conn->query($sql);  


echo "<div id=\"createAccount-form\"><h1>Update</h1>
    Updated Sucessful!<br><br><a href=\"UserList.php\" title=\"Back to User List\">Click here to go back to the User List</a></div>";
?>
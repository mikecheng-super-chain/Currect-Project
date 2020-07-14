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
        
<?php 
include('config.php');

$sid = $_SESSION['sid'];
$name = $_POST['name'];
$birthday = $_POST['birthday'];



$sql = "UPDATE info SET name = '$name' , birthday = '$birthday' WHERE sid = '$sid'";
$result = $conn->query($sql);  
?>

<div id="createAccount-form">
    <h1>Update</h1>Updated Sucessful!<br><br>
    <a href="index.php" title="Back to Index">Click here to go back to the login page</a>
</div>

</body>
</html>
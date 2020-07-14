<?php
    include("config.php");
    include("nav.php");
?>
<html>
    <head>
    </head>
    <body>
        
    </body>
</html>
<?php 


$productName = $_SESSION['productName'];

$sql = "DELETE FROM cart WHERE productName ='$productName'";
$result = $conn->query($sql);  


echo "<div id=\"createAccount-form\"><h1>Delete</h1>
Deleted Sucessful!<br><br><a href=\"checkInfo.php\" title=\"Back to User List\">Click here to go back to the Home Page</a></div>";

include("footer.php");
?>
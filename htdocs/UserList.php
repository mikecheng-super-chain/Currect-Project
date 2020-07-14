<html>
    <head>
        <title>Admin Page</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
    <div class="container-fluid d-flex justify-content-center bg-dark">
    <button onclick="window.location.href='createNewProduct.php'" class="m-3 btn btn-secondary" >Create New Product</button>
    <button onclick="window.location.href='reg.php'" class="m-3 btn btn-secondary" >Create New User</button>
        <form action="searchUser.php" class="mt-3" method="POST">
        <input id="sid" name="sid" type="text" placeholder="Search User ID">
        <input id="submit" type="submit" value="Search" class="btn btn-secondary">
        </form>
        <button onclick="window.location.href='adminLogin.php'" class="m-3 btn btn-secondary" >Logout</button>
    </div>
    <br>
    </body>
</html>

<?php
include_once("config.php");



$sql = "SELECT * FROM info";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<div class=\"container\">";
    echo "<table class=\"table table-striped table-dark\"><thead class=\"thead-dark\"><tr>";
    echo "<th scope=\"col\">User ID</th>";
    echo "<th scope=\"col\">Name</th>";
    echo "<th scope=\"col\">Password</th>";
    echo "<th scope=\"col\">Email</th>";
    echo "<th scope=\"col\">Status</th>";
    echo "<th scope=\"col\">Birthday</th>";
    echo "</tr></thead>";

    while($row = $result->fetch_assoc()) {
        echo "<tbody><tr>";
        echo "<th scope=\"row\">".$row['sid']."</th>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".base64_decode($row['password'])."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['status']."</td>";
        echo "<td>".$row['birthday']."</td>";
        $_SESSION['sid'] = $row['sid'];
        echo "<td><button onclick=\"window.location.href='delete.php'\" class=\"btn btn-secondary\" >Delete</button></td>";
        }
        echo "</tbody></table>";
    }

    $sql = "SELECT * FROM shop";
    $result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class=\"table table-striped table-dark\"><thead class=\"thead-dark\"><tr>";
    echo "<th scope=\"col\">Product Name</th>";
    echo "<th scope=\"col\">Type</th>";
    echo "<th scope=\"col\">Price</th>";
    echo "<th scope=\"col\">Photo</th>";
    echo "</tr></thead></div>";



    while($row = $result->fetch_assoc()) {

        
        $image = imagecreatefromstring($row['photo']); 

        ob_start(); 
        imagejpeg($image, null, 80);
        $data = ob_get_contents();
        ob_end_clean();

        echo "<tbody><tr>";
        echo "<td><a href=\"productInfo.php?name=".$row['name']."\">".$row['name']."</a></td>";
        echo "<td>".$row['type']."</td>";
        echo "<td>$".$row['price']."</td>";
        echo '<td><img src="data:image/jpg;base64, ' .  base64_encode($data)  . '" height="42" width="42" /></td>';
        }
        echo "</tbody></table></div>";
    }


   
    $sql = "SELECT * FROM brands";
    
    $result = $conn->query($sql);


    echo "<div class=\"container\">";
    echo "<table class=\"table table-striped table-dark\"><thead class=\"thead-dark\"><tr>";
    echo "<th scope=\"col\">Product Name</th>";
    echo "<th scope=\"col\">Price</th>";
    echo "<th scope=\"col\">Product Photo</th>";
    echo "<th scope=\"col\">Brands</th>";
    echo "</tr></thead>";

    while($row = $result->fetch_assoc()) {
        $logo = imagecreatefromstring($row['logo']); 
        $productPhoto = imagecreatefromstring($row['productPhoto']); 
        
        ob_start(); 
        imagejpeg($productPhoto, null, 80);
        $data = ob_get_contents();
        ob_end_clean();

     

        echo "<tbody><tr>";
        echo "<td><a href=\"productInfo.php?name=".$row['name']."\">".$row['name']."</a></td>";
        echo "<td>$".$row['price']."</td>";
        echo '<td><img src="data:productPhoto/jpg;base64, ' .  base64_encode($data)  . '" height="42" width="42" /></td>';

        ob_start(); 
        imagejpeg($logo, null, 80);
        $data = ob_get_contents();
        ob_end_clean();

        echo '<td><img src="data:logo/jpg;base64, ' .  base64_encode($data)  . '" height="42" width="42" /></td>';
        }
        echo "</tbody></table></div>";

?>



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
    include("config.php");

        $name = $_POST['name'];
        $type = $_POST['type'];
        $price = $_POST['price'];

        $file = addslashes(file_get_contents($_FILES["photo"]["tmp_name"]));
        $sql = "INSERT INTO shop (name, type, price , photo) VALUES ('$name', '$type', '$price','$file')";
        $result = $conn->query($sql);

        echo "<h1>Admin Login</h1>Create New Product Suessfully!<br><a href=\"UserList.php\" title=\"Back to Index\">Click here to go back to the List page</a>";


?>

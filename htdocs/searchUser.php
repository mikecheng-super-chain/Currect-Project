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

$sid = $_POST['sid'];

$sql = "SELECT * FROM info WHERE sid = '$sid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<div class=\"container\">";
    echo "<table class=\"table table-striped table-dark\"><thead class=\"thead-dark\"><tr>";
    echo "<th scope=\"col\">SID</th>";
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
        echo "</tbody></table></div>";

        $_SESSION['sid']=$row['sid'];


?>
<html>
    <head>
        <title>Admin Page</title>
        <link rel="stylesheet" href="style.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
    <div class="container d-flex justify-content-center ">
            <form method="POST" class="bg-dark w-auto p-3 " action="edit.php">
                <p class="text-secondary">Student ID:</p>
                <input type="text" name="sid" value="<?php echo $row['sid']?>" required disabled/>
                <p class=" text-secondary">Password:</p>
                <input type="text" name="password" value="<?php echo base64_decode($row['password'])?>" required/>
                <p class=" text-secondary">Name:</p>
                <input type="text" name="name" value="<?php echo $row['name']?>" required/>
                <p class=" text-secondary">Email:</p>
                <input type="email" name="email" value="<?php echo $row['email']?>" required/>
                <p class=" text-secondary">Status:</p>
                <select name="status" class="justify-content-center">
                    <option value="<?php echo $row['status'];?>"><?php echo $row['status'];?></option>
                    <option value="not verified">Not verified</option>
                    <option value="verified">Verified</option>
                 </select>
                 <br>
                <p class=" text-secondary">Birthday:</p>
                <input type="date" name="birthday" value="<?php echo $row['birthday'];}}?>" required/>
                <br>
                <input type="submit" name="submit" id="update" value = "Edit" class="btn btn-secondary" >
                <br>
                <a href="UserList.php" title="Back to User List\">Back to User List</a>
            </form>
            
                
        </div>
        <script>
    </body>
</html>


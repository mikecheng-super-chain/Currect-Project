
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
    <div class="container d-flex justify-content-center ">
            <form method="POST" action="createNewProductDone.php" class="bg-dark w-auto p-3" enctype="multipart/form-data">
                <p class="text-secondary">Product Name:</p>
                <input type="text" name="name" id="name">
                <br>
                <p class="text-secondary">Type:</p>
                <select id="type" name="type">
                    <option value="catFood">Cat Food</option>
                    <option value="dogFood">Dog Food</option>
                    <option value="treat">Treat</option>
                    <option value="toy">Toy</option>
                </select>
                <br>
                <p class="text-secondary">Price:</p>
                <input type="number" name="price">
                <br>
                <p class="text-secondary">Photo:</p>
                <input type="file" name="photo">
                <br>
                <br>
                <input type="submit" name="submit" id="insert" id="insert" value = "insert" class="btn btn-secondary" >
                <br>
                <a href="UserList.php" title="Back to User List\">Back to List</a>
            </form>  
        </div>
    </body>
</html>




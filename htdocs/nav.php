<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  
    <a class="navbar-brand" href="">Pet Shop</a>

    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="checkInfo.php">Home</a>
      </li>


      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="shop.php" id="navbardrop" data-toggle="dropdown">
          Shop
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="catFood.php">Cat Food</a>
          <a class="dropdown-item" href="dogFood.php">Dog Food</a>
          <a class="dropdown-item" href="petToy.php">Pet Toy</a>
          <a class="dropdown-item" href="petTreat.php">Pet Treat</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="brands.php" id="navbardrop" data-toggle="dropdown">
        Brands
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="absorbPlus.php"><img alt="absorbPlus" src="brands/absorb_plus/logo.jpg" width="100" height="100"></a>
          <a class="dropdown-item" href="andis.php"><img alt="andis" src="brands/andis/logo.jpg" width="100" height="100"></a>
          <a class="dropdown-item" href="angelsEyes.php"><img alt="angelsEyes" src="brands/angels_eyes/logo.jpg" width="100" height="100"></a>
        </div>
      </li>
</ul>


        <form method="POST" class="form-inline navbar-left" action="searchProduct.php">
      <div class="form-group">
        <input type="text" name="name" id="name" class="form-control mr-sm-2" placeholder=" Name or Type">   
        <input type="submit" value="Search" class="btn btn-primary">
      </div>  
    </form>

    <ul class="navbar-nav ml-auto">
         
    <li class="nav-item ">
          <a href="cart.php" id="cart" >
            <svg class="bi bi-cart" width="2em" height="3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
          </svg>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="reg.php" id="signUp">
            <svg class="bi bi-person-lines-fill" width="1em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7 1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm2 9a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
            </svg>
            Sign Up
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="" id="personal">
          <p class="nav-link" id='navName' class="text-secondary navbar-brand">User Name</p>
        </a>
        </li>


        <li class="nav-item">
          <a class="nav-link" href="index.php" id="login" >
          Login</a>
        </li>
      </ul>
</nav>
<br>

</body>
</html>






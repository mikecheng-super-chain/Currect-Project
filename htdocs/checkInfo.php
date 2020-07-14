<?php  include("config.php"); ?>
<html>
<head>
  <title>Shop</title>
  <link rel="stylesheet" type="text/css" href="css.css">
  
</head>

    <body ng-controller="MainCtrl">
    <?php include("nav.php");?>

    <div class="container">
    <div class="row">

<?php
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sid = $_POST["sid"]; 
        $password= base64_encode($_POST["password"]);

        echo "<header class=\"\" id=\"header\"><h2 class=\"glow\">~ Welcome to M & M ~</h2><h4></h4><h3>~~~ Product ~~~</h3></header>";

        $sql = "SELECT * FROM info WHERE sid = '$sid' AND password = '$password'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $checkPassword = base64_decode($row['password']);

                if(isset($row['sid'], $row['password'])){    
                    $_SESSION['name']= $row['name'];
                    $_SESSION['sid']= $row['sid'];
                    $_SESSION['password']= $row['password'];

                    if ($row['sid'] = $sid && $checkPassword = $password && $row['status'] == 'verified') {

                        $sql = "SELECT * FROM shop";
                        $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        echo "<div class=\"container\">";
                        echo "<div class=\"card-deck\">";
                        $x=0;
                    
                        while($row = $result->fetch_assoc()) {
                            $image = imagecreatefromstring($row['photo']); 
                    
                            ob_start(); 
                            imagejpeg($image, null, 80);
                            $data = ob_get_contents();
                            ob_end_clean();

                            echo "<div class=\"card\" style=\"width:400px\">";
                            echo "<a href=\"productInfo.php?name=".$row['name']."\">";
                            echo '<img class="card-img-top" alt="Card image" style="width:100%" src="data:productPhoto/jpg;base64, ' .  base64_encode($data)  . '"  /></a>';
                            echo '<div class="card-body text-center">';
                            echo "<a href=\"productInfo.php?name=".$row['name']."\">".$row['name']."</a>";
                            echo "<br>Type: ".$row['type']."";
                            echo "<br>$".$row['price']."<br><br>";
                            echo "<a href=\"productInfo.php?name=".$row['name']."\" class=\"btn btn-primary\">Add to Cart</a>";
                            echo "</div></div>";

                            $x++;
                            if($x % 4 == 0){
                                echo "</div></div>";
                                echo '<br/>.';
                                echo "<div class=\"container\">";
                                echo "<div class=\"card-deck\">";
                            }
                
                            }
                            echo "</div></div>";
                        }
                         
                       
                        $sql = "SELECT * FROM brands";
                        
                        $result = $conn->query($sql);
                    
                        echo "<header class=\"\" id=\"header\"><h3>~~~ Popular Brands! ~~~</h3></header>";

                        echo "<div class=\"container\">";
                        echo "<div class=\"card-deck\">";
                        $x=0;
                        
                        while($row = $result->fetch_assoc()) {

                            $logo = imagecreatefromstring($row['logo']); 
                            $productPhoto = imagecreatefromstring($row['productPhoto']); 
                            ob_start(); 
                            imagejpeg($productPhoto, null, 80);
                            $data = ob_get_contents();
                            ob_end_clean();
                    
                            echo "<div class=\"card\" style=\"width:400px\">";
                            echo "<a href=\"productInfo.php?name=".$row['name']."\">";
                            echo '<img class="card-img-top" alt="Card image" style="width:100%" src="data:productPhoto/jpg;base64, ' .  base64_encode($data)  . '"  /></a>';
                            echo '<div class="card-body text-center">';
                            echo "<a href=\"productInfo.php?name=".$row['name']."\">".$row['name']."</a>";
                            echo "<br>$".$row['price']."<br><br>";
                            echo "<a href=\"productInfo.php?name=".$row['name']."\" class=\"btn btn-primary\">Add to Cart</a>";
                            echo "</div></div>";

                            $x++;
                            if($x % 3 == 0){
                                echo "</div></div>";
                                echo '<br/>.';
                                echo "<div class=\"container\">";
                                echo "<div class=\"card-deck\">";
                            }

                            }
                            echo "</div></div>";


                    }else if($row['sid'] = $sid && $checkPassword = $password && $row['status'] == 'not verified'){
                        echo "<div id=\"createAccount-form\"><h1>Login</h1>
                        Please check your email to verifiy the account.<br><br><a href=\"index.php\" title=\"Back to Index\">Click here to go back to the login page</a></div>";

                    }else{
                        echo "<a href=\"personalInfo.php\" title=\"Click here to view and edit personal Info\">Click here to view and edit personal Info</a>";
                        echo '';
                    }
                }
            }
        }
       
    }else{

        $sql = "SELECT * FROM shop";
        $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo "<header class=\"\" id=\"header\"><h2 class=\"glow\">~ Welcome to M & M ~</h2><h4></h4><h3>~~~ Product ~~~</h3></header>";
        echo "<div class=\"container\">";
        echo "<div class=\"card-deck\">";
        $x=0;
    
        while($row = $result->fetch_assoc()) {
            $image = imagecreatefromstring($row['photo']); 
    
            ob_start(); 
            imagejpeg($image, null, 80);
            $data = ob_get_contents();
            ob_end_clean();

            echo "<div class=\"card\" style=\"width:400px\">";
            echo "<a href=\"productInfo.php?name=".$row['name']."\">";
            echo '<img class="card-img-top" alt="Card image" style="width:100%" src="data:productPhoto/jpg;base64, ' .  base64_encode($data)  . '"  /></a>';
            echo '<div class="card-body text-center">';
            echo "<a href=\"productInfo.php?name=".$row['name']."\">".$row['name']."</a>";
            echo "<br>Type: ".$row['type']."";
            echo "<br>$".$row['price']."<br><br>";
            echo "<a href=\"productInfo.php?name=".$row['name']."\" class=\"btn btn-primary\">Add to Cart</a>";
            echo "</div></div>";

            $x++;
            if($x % 4 == 0){
                echo "</div></div>";
                echo '<br/>.';
                echo "<div class=\"container\">";
                echo "<div class=\"card-deck\">";
            }

            }
            echo "</div></div>";
        }
         
       
        $sql = "SELECT * FROM brands";
        
        $result = $conn->query($sql);
    
        echo "<header class=\"\" id=\"header\"><h3>~~~ Popular Brands! ~~~</h3></header>";
        echo "<div class=\"container\">";
        echo "<div class=\"card-deck\">";
        $x=0;
    
        while($row = $result->fetch_assoc()) {

            $logo = imagecreatefromstring($row['logo']); 
            $productPhoto = imagecreatefromstring($row['productPhoto']); 
            ob_start(); 
            imagejpeg($productPhoto, null, 80);
            $data = ob_get_contents();
            ob_end_clean();

            echo "<div class=\"card\" style=\"width:400px\">";
            echo "<a href=\"productInfo.php?name=".$row['name']."\">";
            echo '<img class="card-img-top" alt="Card image" style="width:100%" src="data:productPhoto/jpg;base64, ' .  base64_encode($data)  . '"  /></a>';
            echo '<div class="card-body text-center">';
            echo "<a href=\"productInfo.php?name=".$row['name']."\">".$row['name']."</a>";
            echo "<br>$".$row['price']."<br><br>";
            echo "<a href=\"productInfo.php?name=".$row['name']."\" class=\"btn btn-primary\">Add to Cart</a>";
            echo "</div></div>";

            $x++;
            if($x % 3 == 0){
                echo "</div></div>";
                echo '<br/>.';
                echo "<div class=\"container\">";
                echo "<div class=\"card-deck\">";
            }

            }
            echo "</div></div>";
    }
        
    if(isset($_SESSION['name'])){
                        
        echo "<script>
        document.getElementById('signUp').innerHTML= '';
        document.getElementById('personal').setAttribute('href', \"personalInfo.php\");
        document.getElementById('login').innerHTML = 'Logout';
        document.getElementById('navName').innerHTML = '".$_SESSION['name']."'; 
        </script> ";
    }

    include("footer.php");
    
?>


    </body>
</html>

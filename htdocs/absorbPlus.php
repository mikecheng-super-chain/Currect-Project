<html>
<head>
  <title>AbsorbPlus</title>
  <link rel="stylesheet" type="text/css" href="css.css">
  
</head>
<body ng-controller="MainCtrl">

<?php
include("config.php");
include("nav.php");
                    
if(isset($_SESSION['name'])){
                        
    echo "<script>
    document.getElementById('signUp').innerHTML= '';
    document.getElementById('personal').setAttribute('href', \"personalInfo.php\");
    document.getElementById('login').innerHTML = 'Logout';
    document.getElementById('navName').innerHTML = '".$_SESSION['name']."'; 
    </script> ";
}

echo "<div class=\"bg-image\"></div>";
echo "<header class=\"\" id=\"header\"><h2>~~~ Brand: Absorb Plus ~~~</h2></header>";

$sql = "SELECT * FROM brands WHERE name LIKE '%Absorb%';";
    
$result = $conn->query($sql);
    
if ($result->num_rows > 0) {
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
    include("footer.php");
?>

</body>
</html>
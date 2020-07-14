<html>
<head>
  <title>PetToy</title>
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
echo "<header class=\"\" id=\"header\"><h2>~~~  Pet Toys  ~~~</h2></header>";

$sql = "SELECT * FROM shop WHERE type = 'toy';";

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
    include("footer.php");
?>

</body>
</html>

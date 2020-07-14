<?php
include("config.php");
include("nav.php");
                    
if(isset($_SESSION['name'])){
                        
    echo "<script>document.getElementById('signUp').setAttribute('href', \"personalInfo.php\");
    document.getElementById('signUp').innerHTML = '<span class=\"glyphicon glyphicon-user\"></span>';
    document.getElementById('login').innerHTML = 'Logout';
    document.getElementById('name').innerHTML = '".$_SESSION['name']."'; 
    </script> ";
}

$name = $_GET['name'];
$sql = "SELECT * FROM shop WHERE name = '$name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<hr><div class=\"container\"><div class=\"row\">";
    while($row = $result->fetch_assoc()) {
        $image = imagecreatefromstring($row['photo']); 
 
        ob_start(); 
        imagejpeg($image, null, 80);
        $data = ob_get_contents();
        ob_end_clean();

        echo "<div class=\"col-sm-5\">";
        echo '<img src="data:image/jpg;base64, ' .  base64_encode($data)  . '" height="350" width="350" /></div>';
        echo "<div class=\"col-sm-5\">";
        echo "<h3><b>".$row['name']."</b></h3>";
        echo "<h4>This is a food for cat~<h4><br><hr>";
        echo "<h4>Type: ".$row['type']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbspPrice: $".$row['price']."<h4><br>";

        echo "<form method=\"post\" action=\"addCart.php?name=". $row['name'] ."&price=" .$row['price']. "\">
        Qty: <input type=\"number\" id=\"qty\" name=\"qty\" min=\"1\" max=\"100\"> &nbsp&nbsp&nbsp&nbsp&nbsp
        <input type=\"submit\" class=\"btn btn-primary\" name=\"submit\" id=\"check\" >
        
        </form></div></div>";

        }

    }else{
    
        $sql = "SELECT * FROM brands WHERE name = '$name';";
    
        $result = $conn->query($sql);
    
    
        if ($result->num_rows > 0) {
            echo "<hr><div class=\"container\"><div class=\"row\">";
            while($row = $result->fetch_assoc()) {
                $logo = imagecreatefromstring($row['logo']); 
                $image = imagecreatefromstring($row['productPhoto']); 
         
                ob_start(); 
                imagejpeg($image, null, 80);
                $data = ob_get_contents();
                ob_end_clean();
        
                echo "<div class=\"col-sm-5\">";
                echo '<img src="data:image/jpg;base64, ' .  base64_encode($data)  . '" height="300" width="300" /></div>';

                echo "<div class=\"col-sm-5\">";
                echo "<h3><b>".$row['name']."</b></h3>";
                echo "<h4>This is a food for cat~<h4><br><hr>";

                ob_start(); 
                imagejpeg($logo, null, 80);
                $data = ob_get_contents();
                ob_end_clean();

                echo "<div class=\"col-sm-5\">";
                echo '<img src="data:image/jpg;base64, ' .  base64_encode($data)  . '" height="150" width="150" /></div>';
                
                echo "<h4>Price: $".$row['price']."<h4><br>";
        
                echo "<form method=\"post\" action=\"addCart.php?name=". $row['name'] ."&price=" .$row['price']. "\">
                Qty: <input type=\"number\" id=\"qty\" name=\"qty\" min=\"1\" max=\"100\"> &nbsp&nbsp&nbsp&nbsp&nbsp
                <input type=\"submit\" class=\"btn btn-primary\" name=\"submit\" id=\"check\" >
                
                </form></div></div>";
        
                }
            }
    }
    include("footer.php");
?>


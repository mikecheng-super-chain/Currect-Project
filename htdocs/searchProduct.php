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

if(isset($_POST['name'])){

    $name = $_POST['name'];

    $sql = "SELECT * FROM shop WHERE name LIKE '%$name%' OR type LIKE '%$name%';";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<div class=\"container\">";
        echo "<table class=\" table table-striped table-dark\"><thead class=\"thead-dark\"><tr>";
        echo "<th scope=\"col\">Name</th>";
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

        }else{

            $name = $_POST['name'];
        
            $sql = "SELECT * FROM brands WHERE name LIKE '%$name%';";
        
            $result = $conn->query($sql);
        
        
            echo "<div class=\"container\">";
            echo "<table class=\"table table-striped table-dark\"><thead class=\"thead-dark\"><tr>";
            echo "<th scope=\"col\">Name</th>";
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
        
        }
}
        include("footer.php");

?>


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



if(isset($_SESSION['sid'])){
    $userId = $_SESSION['sid'];
    $sql = "SELECT * FROM cart WHERE sid = '$userId';";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        echo "<div class=\"container\">";
        echo "<table class=\" table table-striped table-dark\"><thead class=\"thead-dark\"><tr>";
        echo "<th scope=\"col\">Product Name</th>";
        echo "<th scope=\"col\">Qty</th>";
        echo "<th scope=\"col\">Price</th>";
        echo "</tr></thead></div>";

        $total = 0;
        while($row = $result->fetch_assoc()) {
            echo "<tbody><tr>";
            echo "<td><a href=\"productInfo.php?name=".$row['productName']."\">".$row['productName']."</a></td>";
            echo "<td>".$row['qty']."</td>";
            echo "<td>".$row['price']."</td>";
            $_SESSION['productName'] = $row['productName'];
            echo "<td><button onclick=\"window.location.href='deleteCart.php'\" class=\"btn btn-secondary\" >Delete</button></td>";
            if(isset($_SESSION['productName'])){
            
                $total = $total + $row['price'];
            }
        } 
    }
            echo "</tbody></table>";
           
            if(isset($total)){
                echo "<hr><p class=\"text-right\"><b>Total Price: ". 
                $total ."</p><b></div>";
            }
    }else{
        echo "Please Login~";
    }
    include("footer.php");
?>


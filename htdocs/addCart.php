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

    if(isset($_SESSION['sid'],$_SESSION['name'] )){
        $productName = $_GET['name'];
        $qty = $_POST['qty'];
        $userId = $_SESSION['sid'];
        $name = $_SESSION['name'];

   
        $sql = "SELECT * FROM cart WHERE sid = '$userId' AND productName = '$productName'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            if($row = $result->fetch_assoc()) {
                $qty = $qty + $row['qty'];
                $price = $qty * $_GET['price'];

                $sql = "UPDATE cart SET qty ='$qty' ,price = '$price' WHERE sid = '$userId' AND productName = '$productName'";

                $result = $conn->query($sql);

                echo "<h1>Cart Car</h1>This product was updated into cart car~<br><br><a href=\"checkInfo.php\" title=\"Back to Index\">Click here to go back to the home page</a></div>";
            }
        }else{


        $price = $qty * $_GET['price'];


        $sql = "INSERT INTO cart (sid, name, productName, qty, price) VALUES ('$userId', '$name', '$productName','$qty', '$price')";

        $result = $conn->query($sql);

        echo "<h1>Cart Car</h1>This product was added into cart car~<br><br><a href=\"checkInfo.php\" title=\"Back to Index\">Click here to go back to the home page</a></div>";
       
    }
    }else{

        echo "Please Login~";
    }

?>



<?php  include("footer.php");?>
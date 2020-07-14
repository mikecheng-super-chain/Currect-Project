<?php
include_once("config.php");

$name = $_SESSION['name'];
$sid = $_SESSION['sid'];
$password = $_SESSION['password'];  

$sql = "SELECT * FROM info WHERE sid = '$sid' AND password = '$password' AND name = '$name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
?>
<html>
    <head>
        <title>Personal Information</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://www.google.com/recaptcha/api.js?render=6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></script>
        <link rel="stylesheet" type="text/css" href="css.css">
    </head>
    <body>
    <?php include("nav.php");
  
  if(isset($_SESSION['name'])){
                        
    echo "<script>
    document.getElementById('signUp').innerHTML= '';
    document.getElementById('personal').setAttribute('href', \"personalInfo.php\");
    document.getElementById('login').innerHTML = 'Logout';
    document.getElementById('navName').innerHTML = '".$_SESSION['name']."'; 
    </script> ";
}

?>
    
        <div id="personalInfo-form">
            <h1>Personal Information</h1>
            <form method="POST" action="update.php" name="UpdateForm">
                User ID:
                <br>
                <?php echo $row['sid']; $_SESSION['sid'] = $row['sid']; ?>
                <br>
                Email:
                <br>
                <?php echo $row['email'];?>
                <br>
                Name:
                <br>
                <input type="text" name="name" value="<?php echo $row['name']?>" required/>
                <br>
                Birthday:
                <br>
                <input type="date" name="birthday" value="<?php echo $row['birthday'];}}?>" required/> 
                <br>
                <br>
                <input type="submit" name="submit" id="update" value = "Update" class="btn btn-primary">
            </form>         
        </div>
    </body>
    <?php include("footer.php");?>
</html>




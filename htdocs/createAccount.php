<html>
    <head>
        <title>Reg Add</title>
        <link rel="stylesheet" href="style.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css.css">
    </head>
    <body>
        
    </body>
</html>
<?php
    include("config.php");
   
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sid = $_POST["sid"]; 
    $password = base64_encode($_POST["password"]);
    $confirm_password = base64_encode($_POST["confirm_password"]);
    $name = $_POST["name"]; 
    $email = $_POST["email"];
    $birthday = $_POST['birthday'];
    $sql = "SELECT * FROM info WHERE sid = '$sid'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<div id=\"createAccount-form\"><h1>Registration</h1>
        This account was registered. please open the link to verify your email address.<br><br><a href=\"index.php\" title=\"Back to Index\">Click here to go back to the login page</a></div>";
    
    }elseif($password != $confirm_password){
        echo "<div id=\"createAccount-form\"><h1>Registration</h1>
        Your password is not same!<br><br><a href=\"index.php\" title=\"Back to Index\">Click here to go back to the login page</a></div>";
    }else{  

        $code = md5(rand());
        $status = 'not verified';

        $sql = "INSERT INTO info (sid, name, password, email, code, status, birthday) VALUES ('$sid', '$name', '$password', '$email', '$code', '$status','$birthday')";

        if ($conn->query($sql) === TRUE) {
            set_time_limit(120);

            require_once('./PHPMailer-5.2.9/PHPMailerAutoload.php');
            $mail = new PHPMailer;

            $base_url = "http://localhost/";
            $mail_body = "<p>HI, ".$_POST['name'].",</p>
                          <p>Thanks for Registration. Your Student ID is ". $_POST['sid'].",
                          This account will work only after your email verification. </p>
                          <p>Please open the link to verified your email address - ".$base_url."email_verificaiton.php?code=" . $code."
                          <p>Best Regards,<br/>Admin</p>";

            $mail->IsSMTP();
            $mail->HOST = 'smtp.gmail.com';
            $mail->SMTPSecure = 'ssl';;
            $mail->Host = "ssl://smtp.gmail.com"; 
            $mail->Port = 465;
            $mail->SMTPAuth = true;
            $mail->Username = "envirgdvja@gmail.com";
            $mail->Password = "comp3334test";
            $mail->addReplyTo('envirgdvja@gmail.com', 'Admin');
            $mail->AddAddress($_POST['email'], $_POST['name']);
            $mail->IsHTML(true);
            $mail->Subject = 'Email Verification';
            $mail->Body = $mail_body;

            echo "<div id=\"createAccount-form\"><h1>Registration</h1>
            Your account has been registered successfully. We have sent an email to you for email verification, please open the link to verify your email address.<br><br><a href=\"index.php\" title=\"Back to Index\">Click here to go back to the login page</a></div>";
            
                if($mail->Send()){
                    $message = '<label class="text-success">Register Done, PLease check your email.</label>';
                }

            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } 
        $conn->close();
    }
 
?>


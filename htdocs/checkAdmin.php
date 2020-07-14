<html>
    <head>
        <title>Check Admin Information</title>
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

        $private_key = $_POST['private_key'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM admin WHERE private_key = '$private_key' AND password = '$password'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            if($row = $result->fetch_assoc()) {

                echo "<div id=\"createAccount-form\"><h1>Login Sucessful! </h1><a href=\"UserList.php\" title=\"Click here to view and edit user Info\">Click here to view and edit user Info</a>";

                    set_time_limit(120);
                    require_once('./PHPMailer-5.2.9/PHPMailerAutoload.php');
                    $mail = new PHPMailer;
                                        
                    $private_key = md5(rand());
                    $sql = "UPDATE admin SET private_key ='$private_key' WHERE password = '$password'";
                    $result = $conn->query($sql);

                    $mail_body = "<p>Next Private Key : ".$private_key."</p><br><p>Best Regards,<br/>Admin</p>";
        
                    $mail->IsSMTP();
                    $mail->HOST = 'smtp.gmail.com';
                    $mail->SMTPSecure = 'ssl';;
                    $mail->Host = "ssl://smtp.gmail.com"; 
                    $mail->Port = 465;
                    $mail->SMTPAuth = true;
                    $mail->Username = "envirgdvja@gmail.com";
                    $mail->Password = "comp3334test";
                    $mail->addReplyTo('envirgdvja@gmail.com', 'Admin');
                    $mail->AddAddress($row['email'], 'Admin');
                    $mail->IsHTML(true);
                    $mail->Subject = 'Email Verification';
                    $mail->Body = $mail_body;


                    
                    if($mail->Send()){
                        $message = '<label class="text-success">PLease check your email.</label>';
                    }

    }

    } else{
        echo "<div id=\"createAccount-form\"><h1>Admin Login</h1>
        Invalid Private Key or Password.<br><a href=\"adminLogin.php\" title=\"Back to Index\">Click here to go back to the login page</a></div>";
        $conn->close();
    }

  
    
?>
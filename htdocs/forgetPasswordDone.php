<html>
    <head>
        <title>Change Password </title>
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
        <div id="createAccount-form">
        <h1>Change Password</h1>
            The email verification has sent to your email, please open the link to set a new password for your account.<br><br>
            <a href="index.php" title="Back to Index">Click here to go back to the login page</a>
        </div>
    </body>
</html>
<?php
        include("config.php");
                $sid = $_POST['sid'];
                $email = $_POST['email'];
                $code = md5(rand());


                $sql = "UPDATE info SET status ='not verified' , code = '$code' WHERE sid = '$sid'";
                $result = $conn->query($sql);
                $_SESSION['countLogin'] = 0;

                $sql = "SELECT * FROM info WHERE sid = '$sid'";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    if($sid = $row['sid'] && $email == $row['email']){
                    set_time_limit(120);
                    require_once('./PHPMailer-5.2.9/PHPMailerAutoload.php');
                    $mail = new PHPMailer;
                    $base_url = "http://localhost/";
                    $mail_body = "<p>HI, ".$row['name'].",</p>
                                <p>Your Student ID is ". $row['sid'].",
                                Your account has been locked! </p>
                                <p>Please open the link to change your password - ".$base_url."changePassword.php?code=" . $code."
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
                    $mail->AddAddress($row['email'], $row['name']);
                    $mail->IsHTML(true);
                    $mail->Subject = 'Email Verification';
                    $mail->Body = $mail_body;
        
                    if($mail->Send()){
                        $message = '<label class="text-success">Register Done, PLease check your email.</label>';

                    }
                }
            }
        $conn->close();

?>
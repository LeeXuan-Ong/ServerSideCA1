<?php

require_once 'database.php';

$message = "";

$errors = '';
if(count($_POST)>0) {
//        $conn = mysqli('127.0.0.1:3306','root','','instrument_data') ;

    $query = "INSERT INTO users(email,password,role,phone,address,age,dob,gender) values(?,?,?,?,?,?,?,?) ";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(1, $_POST['email']);
    $stmt->bindParam(2, $_POST['password']);
    $param = 'CUSTOMER';
    $stmt->bindParam(3, $param);
    $stmt->bindParam(4, $_POST['phone']);
    $stmt->bindParam(5, $_POST['address']);
    $stmt->bindParam(6, $_POST['age']);
    $stmt->bindParam(7, $_POST['dob']);
    $stmt->bindParam(8, $_POST['gender']);
    $result = $stmt->execute();
    if ($result) {
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(1, $_POST['email']);
        $stmt->execute();
        $result = $stmt->fetch();
        $_SESSION["id"] = $result["id"];
        $_SESSION["email"] = $result["email"];
        $_SESSION["role"] = $result["role"];
        $_SESSION["conn"] = $conn;
        if(!in_array($_SERVER['REMOTE_ADDR'],['127.0.0.1','::1','127.0.0.1:3306'])){

            $myemail = 'D00253282@student.dkit.ie';// <-----Put your DkIT email address here.
            if (empty($_POST['name']) ||
                empty($_POST['email']) ||
                empty($_POST['password'])) {
                $errors .= "\n Error: all fields are required";
            }


            // Important: Create email headers to avoid spam folder
            $headers .= 'From: ' . $myemail . "\r\n" .
                'Reply-To: ' . $myemail . "\r\n" .
                'X-Mailer: PHP/' . phpversion();


            $name = $_POST['name'];
            $email_address = $_POST['email'];
            $message = $_POST['description'];

            if (!preg_match(
                "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
                $email_address)) {
                $errors .= "\n Error: Invalid email address";
            }

            if (empty($errors)) {
                $to = $myemail;
                $email_subject = "Contact form submission: $name";
                $email_body = "You have received a new message. " .
                    " Here are the details:\n Name: $name \n Email: $email_address \n Message \n $message";

                mail($to, $email_subject, $email_body, $headers);
                //redirect to the 'thank you' page
            }
        }
        header('Location: login.php');
    }

}
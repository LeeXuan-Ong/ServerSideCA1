<?php
require_once 'database.php';

$message = "";

$errors = '';
if (count($_POST) > 0) {
    $email = $_POST['email'] ?? '';
    if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
        $errors .= "Invalid email address";
    }
    $phone = $_POST['phone'] ?? '';
    if(!preg_match("/^(\d{3}[- .]?){2}\d{4}$/", $phone)) {
        $errors .= "Invalid phone number";
    }
    $address = $_POST['address'] ?? '';
    $firstName = $_POST['firstName'] ?? '';
    $lastName = $_POST['lastName'] ?? '';
    $quantity = $_POST['quantity'] ?? '';
    if(!preg_match("/^[0-9]*$/", $quantity)) {
        $errors .= "Invalid quantity";
    }
    $message = $_POST['message'] ?? '';
    $insName = $_POST['insName'] ?? '';
    $insDesc = $_POST['insDesc'] ?? '';
    $insPrice = $_POST['insPrice'] ?? '';
    if(!preg_match("/^[0-9]*$/", $insPrice)) {
        $errors .= "Invalid price";
    }
    $insCategory = $_POST['insCategory'] ?? '';
    $total = $insPrice * $quantity;
    $query = "INSERT INTO forms(email,phone,address,firstName,lastName,quantity,message) values(?,?,?,?,?,?,?) ";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(1, $email);
    $stmt->bindParam(2, $phone);
    $stmt->bindParam(3, $address);
    $stmt->bindParam(4, $firstName);
    $stmt->bindParam(5, $lastName);
    $stmt->bindParam(6, $quantity);
    $stmt->bindParam(7, $message);
    $result = $stmt->execute();
    if ($result) {
        if (!in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1', '127.0.0.1:3306'])) {
            $email = $_SESSION['email'];
            $query = "SELECT * FROM users WHERE email = ?";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1, $email);
            $stmt->execute();
            $result = $stmt->fetch();
            $myemail = 'D00253282@student.dkit.ie';// <-----Put your DkIT email address here.
            if (empty($result)) {
                $errors .= "\n Error: no records found of the email";
            }

            // Important: Create email headers to avoid spam folder
            $headers .= 'From: ' . $myemail . "\r\n" .
                'Reply-To: ' . $myemail . "\r\n" .
                'X-Mailer: PHP/' . phpversion();



            if (!preg_match(
                "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
                $email)) {
                $errors .= "\n Error: Invalid email address";
            }

            if (empty($errors)) {
                $to = $myemail;
                $name = $result['name'];
                $email_subject = "Contact form submission:";
                $email_body = "You have received a new message. " .
                    "Here are the user submitted form.\n";
                $email_body .= "From:\n";
                $email_body .= $name != '' ? "Name: $name\n" : '';
                $email_body .= "Email: $email\n";
                $email_body .= "Address: $address\n";
                $email_body .= "Phone: $phone\n";
                $email_body .= "First Name: $firstName\n";
                $email_body .= "Last Name: $lastName\n";
                $email_body .= "Message: $message\n\n\n";
                $email_body .= "Order Product:\n";
                $email_body .= "Instrument Form\n";
                $email_body .= "Instrument Name: $insName\n";
                $email_body .= "Instrument Description: $insDesc\n";
                $email_body .= "Instrument Price: $insPrice\n";
                $email_body .= "Instrument Category: $insCategory\n";
                $email_body .= "Quantity: $quantity\n";
                $email_body .= "Total: $total\n";

                $email_body.= "using Account: ".$result['email']."\n";

                mail($to, $email_subject, $email_body, $headers);
            } else {

                $to = $myemail;
                $email_subject = "Contact form submission:";
                $email_body = "You have received a new message. " .
                    "Here are the user submitted form.\n";
                $email_body .= $errors;
                mail($to, $email_subject, $email_body, $headers);
                echo '<script>alert(' . $errors . ')</script>';
            }
        }
        header('Location: login.php');
    } else {
        $message = "Failed to insert data information!";
        echo '<script>alert(' . $message . ')</script>';
        header('Location: index.php');

    }

}
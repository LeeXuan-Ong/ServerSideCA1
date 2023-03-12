<?php
require_once ('database.php');

    $message = "";
    if(count($_POST)>0){
//        $conn = mysqli('127.0.0.1:3306','root','','instrument_data') ;

        $query = "INSERT INTO users(email,password,role) values(?,?,?) ";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(1,$_POST['email']);
        $stmt->bindParam(2,$_POST['password']);
        $param = 'ADMIN';
        $stmt->bindParam(3, $param);
        $stmt->execute();
        $result = $stmt->fetch();


        if( is_array($result)){
            $_SESSION["id"] = $result["id"];
            $_SESSION["role"] = $result["role"];
            $_SESSION["conn"] = $conn;
        }

    }

    if(isset($_SESSION['id'])) {
        header("Location: Login.php");
    }
    ?>

<html>
<head>
    <title>User Login</title>
</head>
<body>
<form name="frmUser" method="post" action="" align="center">
    <div class="message"><?php if($message!="") { echo $message; } ?></div>
    <h3 align="center">Enter Register Details</h3>
    Email:<br>
    <input type="text" name="email">
    <br>
    Password:<br>
    <input type="password" name="password">
    <br><br>
    <input type="submit" name="submit" value="Submit">
    <input type="reset">
</form>

<a href="register.php">register</a>
</body>
</html>
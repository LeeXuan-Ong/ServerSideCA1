<?php
include 'database.php';
    session_start();
    $message = "";
    if(count($_POST)>0){
        $query =  "SELECT * FROM users WHERE email=? and password =?";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(1, $_POST['email']);
        $stmt->bindParam(2, $_POST['password']);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count > 0){
            $result = $stmt->fetch();
            $_SESSION["id"] = $result["userId"];
            $_SESSION["email"] = $result["email"];
            $_SESSION["userType"] = $result["role"];
        } else {
            $message = "INVALID EMAIL AND PASSWORD";
        }

    }

    if(isset($_SESSION["id"])) {
        header("Location: index.php");
    }

    $title = "Login";
    ?>

<html>
<?php include_once ('header.php');?>
<body>
<?php include 'navigationBar.php';?>
<main class="container">
<form name="frmUser" method="post" action="" align="center">
    <div class="message"><?php if($message!="") { echo $message; } ?></div>
    <div class="form-control">
        <h3 class="mt-3 display-1">Login</h3>
        <div class="input-group mt-5 mb-5">
        <div class="input-group-prepend">
            <span class="input-group-text">Email: </span>
        </div>
        <input class="form-control" type="text" name="email">
        </div>
    <div class="input-group mt-5 mb-5">
        <div class="input-group-prepend">
            <span class="input-group-text">Password: </span>
        </div>
        <input class="form-control" type="password" name="password">
    </div>
    <input class="btn btn-primary" type="submit" name="submit" value="Submit">
    <input class="btn btn-secondary" type="reset">
</form>

<a class="btn btn-success" href="register.php">register</a>
</main>
</body>
</html>
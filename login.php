<?php
include 'database.php';
    session_start();
    $message = "";
    if(count($_POST)>0){
//        $query = "SELECT * FROM users WHERE user_email=".'"'. $_POST['email'] . '"'." and password = ".'"' . $_POST["password"].'"';
        $result = mysqli_query($conn, "SELECT * FROM users WHERE email='" . $_POST["email"] . "' and password = '". $_POST["password"]."'");
        if(!$result){
            mysqli_error($conn);
        }
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);

            if( is_array($row)){
                $_SESSION["id"] = $row["id"];
                $_SESSION["name"] = $row["name"];
                $_SESSION["role"] = $row["role"];
                $_SESSION["conn"] = $conn;
            }

        } else {
            $message = "INVALID EMAIL AND PASSWORD";
        }

    }

    if(isset($_SESSION['id'])) {
        header("Location: index.php");
    }
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
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
<?php include_once ('header.php');
include 'navigationBar.php';?>
<body>
<form name="frmUser" method="post" action="" align="center">
    <div class="message"><?php if($message!="") { echo $message; } ?></div>
    <h3 align="center">Enter Login Details</h3>
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
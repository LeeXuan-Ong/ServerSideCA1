<?php
include 'database.php';
session_start();
if(!isset($_SESSION["id"])){
    header("Location:login.php");
}else {
    $id = $_SESSION["id"];
}
?>


<!DOCTYPE html>
<html>
<?php include_once ('header.php');
$sql="SELECT * FROM forms WHERE userId = ?";
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $id);
$stmt->execute();
$forms = $stmt->fetchAll();
$stmt->closeCursor();
?>
<body>
<?php include 'navigationBar.php';?>
<main class="container">
    <h1>Form Records</h1>
    <hr>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Name</th>
            <th scope="col">Message</th>
            <th scope="col">Date</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Quantity</th>
            <th scope="col">Instrument</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach($forms as $form){
            echo '<tr>';
            echo '<th scope="row">'.$form['formId'].'</th>';
            echo '<td>' . ($form['formFirstName'].' '.$form['formLastName']) .'</td>';
            echo '<td>'.$form['formMessage'].'</td>';
            echo '<td>'.$form['created_at'].'</td>';
            echo '<td>'.$form['formEmail'].'</td>';
            echo '<td>'.$form['formPhone'].'</td>';
            echo '<td>'.$form['formAddress'].'</td>';
            echo '<td>'.$form['formQuantity'].'</td>';
            echo '<td><a class="btn btn-primary" href="instrument.php?id='.$form['insId'].'">Instrument</a></td>';
            echo '</tr>';
        }?>
        </tbody>
    </table>
</main>
<?php include 'footer.php';?>
</body>
</html>
<?php
include 'database.php';
session_start();
//if(!isset($_SESSION['id'])){
//    header("Location:login.php");
//    $id = $_SESSION['id'];
//}
?>


<!DOCTYPE html>
<html>
<?php include_once ('header.php');

$id = 1;
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
            <th scope="col">Type</th>
            <th scope="col">Date</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach($forms as $form){
            echo '<tr>';
            echo '<th scope="row">'.$form['formId'].'</th>';
            echo '<td>' . ($form['formFirstName'].' '.$form['formLastName']) .'</td>';
            echo '<td>'.$form['formMessage'].'</td>';
            echo '<td>'.$form['formType'].'</td>';
            echo '<td>'.$form['formDate'].'</td>';
            echo '</tr>';
        }?>
        </tbody>
    </table>
</main>
</body>
</html>
<?php
session_start();
if(!isset($_SESSION['userType'])){
    $_SESSION['userType'] = 'guest';
}
require_once('database.php');

// Get products
if(isset($_GET['q'])){
    $searchInput = $_GET['q'];

}else{
    $searchInput='';
}

$sql = "SELECT * FROM INSTRUMENTS i  LEFT OUTER JOIN images im ON i.imageId = im.imgId WHERE i.insName LIKE ? OR i.insDesc LIKE ? OR i.insCategory LIKE ?;";
$stmt = $conn->prepare($sql);
$str = '%' . $searchInput . '%';
$stmt->bindParam(1, $str);
$stmt->bindParam(2,$str);
$stmt->bindParam(3,$str);
$stmt->execute();
$products = $stmt->fetchAll();
$stmt->closeCursor();

$queryProducts = 'SELECT * FROM images WHERE imgId = 1;';
$statement = $conn->prepare($queryProducts);
$statement->execute();
$defaultImage = $statement->fetch();
$statement->closeCursor();
?>

<!doctype html>
<html lang="en">

<?php
$title = 'Home';
    include 'header.php' ;
    include 'navigationBar.php';

?>
<body>
<main class="container">
<!-- <?php //include './table.php';?> -->
    <div>
        <form method="get" action="index.php">
            <label for="q" >Search: </label>
            <input type="text" name="q" value="<?php echo $searchInput?>"/>
            <input type="submit" value="search"/>
        </form>
    </div>
<div class="row">
<?php
if($_SESSION['userType'] == 'admin'){
    echo '<a href="addInstrumentForm.php" class="btn btn-primary">Add New Instrument</a>';
}
if ($products){
    include 'cards.php';
} else {
    echo '<div> There is nothing in the database.</div>';
}?>
</div>
</main><!-- /.container -->
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>

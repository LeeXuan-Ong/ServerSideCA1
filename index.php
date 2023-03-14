<?php
session_start();
if(!isset($_SESSION['userType'])){
    $_SESSION['userType'] = 'guest';
}
require_once('database.php');
$sql="SELECT * FROM INSTRUMENTS i  LEFT OUTER JOIN images im ON i.imageId = im.imgId ";
// Get products
$searchInput = $_GET['q'] ?? '';
$sql.= "WHERE i.insName LIKE ? OR i.insDesc LIKE ? OR i.insCategory LIKE ? ";
$stmt = $conn->prepare($sql);
$str = '%' . $searchInput . '%';
$stmt->bindParam(1, $str);
$stmt->bindParam(2,$str);
$stmt->bindParam(3,$str);
$stmt->execute();
$products = $stmt->fetchAll();
$stmt->closeCursor();

$queryProducts = 'SELECT * FROM images WHERE imgId = 1;';
$stmt2 =$conn->query($queryProducts);
$defaultImage = $stmt2->fetch();
$stmt2->closeCursor();
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
    <div class="input-group mt-2 mb-2">
        <form method="get" action="index.php" >
            <div class="form-control">
                <div class="input-group">
                <div class="input-group-prepend">
                    <label for="q" class="input-group-text" >Search: </label>
                </div>
            <input type="text" name="q" value="<?php echo $searchInput?>" class="form-control"/>

            <select class="form-select" id="filter" name="f">
                <option value="" selected>Category</option>
<?php
$array =[];
foreach($products as $product){
    if(!in_array($product["insCategory"],$array )) {
        array_push($array, $product["insCategory"]);
        echo'<option value="'.$product["insCategory"].'">'.$product["insCategory"].'</option>';
    }
                }?>
            </select>
            <input class="btn btn-primary" type="submit" value="search"/>
                </div>
            </div>
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

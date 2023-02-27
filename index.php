<?php
require_once('database.php');

// Get products
$queryProducts = 'SELECT * FROM instruments';
$statement = $conn->prepare($queryProducts);
$statement->execute();
$products = $statement->fetchAll();
$statement->closeCursor();
?>

<!doctype html>
<html lang="en">

<?php
    include 'header.php' ;
    include 'navigationBar.php';

?>
<body>
<main class="container">
    <a href="addForm.php" class="btn btn-primary">Add Product</a>
<!-- <?php //include './table.php';?> -->

<?php if ($products){
    include 'cards.php';
} else {
    echo '<div> There is nothing in the database.</div>';
}?>

</main><!-- /.container -->
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>

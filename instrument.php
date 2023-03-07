
<!doctype html>
<html lang="en">


<?php
include 'database.php';
session_start();

$id = $_GET['id'];
$queryProducts = 'SELECT * FROM instruments where insId = '.$id.';';
$statement = $conn->prepare($queryProducts);
$statement->execute();
$product = $statement->fetch();
$statement->closeCursor();
if($product['imageId']!= null){
    $tempId = $product['imageId'];
} else {
    $tempId = 1;
}
$queryProducts = 'SELECT * FROM images WHERE imgId = '.$tempId.';';
$statement = $conn->prepare($queryProducts);
$statement->execute();
$image = $statement->fetch();
$statement->closeCursor();

include 'header.php';
include 'navigationBar.php';
?>

<body>
<main class="container">
    <div>
        <?php echo '<img class ="card-img-top" src="data:'.$image['imgType'].';base64,'.base64_encode($image['imgContent']).'" alt="'.$product['insName'].'" >';?>
        <div>
            <h1><?php echo $product['insName'];?></h1>
            <p><?php echo $product['insDesc'];?></p>
            <p><?php echo $product['insPrice'];?></p>
            <p><?php echo $product['insStocks'];?></p>
            <p><?php echo $product['insCategory'];?></p>

        </div>
    </div>
</main>
</body>
</html>

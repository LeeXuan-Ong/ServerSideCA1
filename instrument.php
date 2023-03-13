
<!doctype html>
<html lang="en">


<?php
include 'database.php';
session_start();

$id = $_GET['id'];
$queryProducts = "SELECT * FROM instruments where insId = ?;";
$statement = $conn->prepare($queryProducts);
$statement->bindParam(1,$id);
$statement->execute();
$product = $statement->fetch();
$statement->closeCursor();
if($product['imageId']!= null){
    $tempId = $product['imageId'];
} else {
    $tempId = 1;
}
$queryProducts = "SELECT * FROM images WHERE imgId = ?;";
$statement = $conn->prepare($queryProducts);
$statement->bindParam(1,$tempId);
$statement->execute();
$image = $statement->fetch();
$statement->closeCursor();

include 'header.php';
include 'navigationBar.php';
?>

<body>
<main class="container">
    <h1><?php echo $product['insName'];?></h1>
    <div>
        <?php echo '<img class="image-style" id="image-style"src="data:'.$image['imgType'].';base64,'.base64_encode($image['imgContent']).'" alt="'.$product['insName'].'" >';?>
        <div >
            <h1><?php echo $product['insName'];?></h1>
            <p><?php echo $product['insDesc'];?></p>
            <p><?php echo $product['insPrice'];?></p>
            <p><?php echo $product['insStocks'];?></p>
            <p><?php echo $product['insCategory'];?></p>

        </div>
    </div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Contact Seller to Buy
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="contact-form">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form for buying <?php echo $product['insName'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" name="register" onsubmit="return validation" action="">
                        <div class="form-control">
                            <h5>
                                Form:
                            </h5>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="formFname">First Name</span>
                                </div>
                                <input type="text" name="firstName" placeholder="First Name" class="form-control" required>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="formLname">Last Name</span>
                                </div>
                                <input type="text" name="lastName" placeholder="Last Name" class="form-control" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="formQuantity">Quantity</span>
                                </div>
                                <input type="number" name="quantity" placeholder="0" class="form-control" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="formEmail">Email</span>
                                </div>
                                <input type="text" name="email" placeholder="test@gmail.com" class="form-control" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="formPhone">Phone Number</span>
                                </div>
                                <input type="text" name="phone" placeholder="087 000 0000" class="form-control" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="formAddress">Address</span>
                                </div>
                                <input type="text" name="address" placeholder="Eircode will do..." class="form-control" required>
                            </div>

                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text " id="formMessage">Message</span>
                                </div>
                                <textarea class="form-control" aria-label="With textarea"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Submit Form</button>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

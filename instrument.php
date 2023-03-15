
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
?>

<body>
<?php include 'navigationBar.php';?>
<main role="main" class="container">
    <h1 class="mt-2"><?php echo $product['insName'];?></h1>
    <hr>
    <div>
        <div class="d-flex justify-content-center border border-dark">
            <?php echo '<img class="image-style" id="image-style"src="data:'.$image['imgType'].';base64,'.base64_encode($image['imgContent']).'" alt="'.$product['insName'].'" >';?>
        </div>

        <div>
            <div class="mt-3">
                <h2>Product Description</h2>
            </div>
            <p ><?php echo $product['insDesc'];?></p>
                <hr>
            <h3>Product Details</h3>
            <div>
                <h4>Price: </h4>
                <p><?php echo $product['insPrice'];?></p>
            </div>
            <div>
                <h4>Stocks: </h4>
                <p><?php echo $product['insStocks'];?></p>
            </div>
            <div>
                <h4>Category: </h4>
                <p><?php echo $product['insCategory'];?></p>
            </div>

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
                    <div id="input_err"></div>
                    <form method="POST" name="register" onsubmit="return orderValidation()" action="addForm.php">
                        <div class="form-control">
                            <h5>
                                Form:
                            </h5>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="formFname">First Name</span>
                                </div>
                                <input type="text" name="firstName" id="firstName" onchange="validateFirstName()" placeholder="First Name" class="form-control" required>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="formLname">Last Name</span>
                                </div>
                                <input type="text" name="lastName" id="lastName" placeholder="Last Name" onchange="validateLastName()" class="form-control" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="formQuantity">Quantity</span>
                                </div>
                                <input  id="quantity" onchange="validateQuantity()" type="number" name="quantity" placeholder="0" class="form-control" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="formEmail">Email</span>
                                </div>
                                <input type="text" name="email" id="email" onchange="validateEmail()" placeholder="test@gmail.com" class="form-control" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="formPhone">Phone Number</span>
                                </div>
                                <input type="text" name="phone" id="phone" placeholder="087 000 0000"  onchange="validatePhone()"  class="form-control" required>
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
                                <textarea name="message" class="form-control" aria-label="With textarea"></textarea>
                            </div>
                            <input type="text" name="insId" value="<?php echo $product['insId']?>" class="d-none">
                            <input type="text" name="insName" value="<?php echo $product['insName']?>" class="d-none">
                            <input type="text" name="insDesc" value="<?php echo $product['insDesc']?>" class="d-none">
                            <input type="text" name="insPrice" value="<?php echo $product['insPrice']?>" class="d-none">
                            <input type="text" name="insCategory" value="<?php echo $product['insCategory']?>" class="d-none">

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
</main>
<script src="js/validation.js"></script>
<?php include 'footer.php';?>
</body>
</html>

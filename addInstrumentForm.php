<!DOCTYPE HTML>
<html>
    <?php $title = "Register";
    include 'header.php';
    include 'navigationBar.php';
    error_reporting(E_ALL);
ini_set('display_errors', '1');
?>

<!-- define some style elements-->

<body>
<main class="container">
<h1>Register</h1>
    <hr>
<form method="POST" name="register" action="addInstrument.php" enctype="multipart/form-data">
    <p>
        <label for='insName'>Instrument Name:</label> <br>
        <input type="text" name="insName">
    </p>

    <p>
        <label for='insDesc'>Instrumental Description:</label> <br>
        <textarea name="insDesc"></textarea>
    </p>

    <p>
        <label for='insStocks'>Stock Available:</label><br>
        <input name="insStocks"><br>
    </p>

    <p>
        <label for='insPrice'>Price:</label><br>
        <input name="insPrice"><br>
    </p>

    <p>
        <label for='insCat'>Category:</label><br>
        <input type="radio" name="insCategory" value="String">
        <label for="String">String</label><br>

        <input type="radio" name="insCategory" value="Percussion">
        <label for="Percussion">Percussion</label><br>

        <input type="radio" name="insCategory" value="Woodwind">
        <label for="Woodwind">Woodwind</label><br>

        <input type="radio" name="insCategory" value="Brass">
        <label for="Brass">Brass</label><br>

        <input type="radio" name="insCategory" value="Other">
        <label for="Other">Other</label><br>
    </p>

    <div>
        <input type="file" class="btn btn-outline-dark" name="image" accept="image/png, image/gif, image/jpeg">
    </div>

<input class="btn btn-primary mt-3" type="submit" value="Submit"><br>
</form>
</main>
<?php include 'footer.php'?>
</body>
</html>
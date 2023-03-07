<!DOCTYPE HTML>
<html>
    <?php $title = "Register";
    include 'header.php';
    include 'navigationBar.php'?>

<!-- define some style elements-->

<body>
<div class="container">
<h1>Register</h1>
<form method="POST" name="register" action="addAccount.php">
<p>
<label for='name'>Your Name:</label> <br>
<input type="text" name="name">
</p>
<p>
<label for='email'>Email Address:</label> <br>
<input type="text" name="email"> <br>
</p>
<p>
<label for='description'>Description:</label> <br>
<textarea name="description"></textarea>
</p>

<p>
<label for='phone'>Phone:</label> <br>
<input name="phone"> <br>
</p>

<p>
<label for='address'>Address:</label> <br>
<textarea name="address"></textarea>
</p>

<p>
<label for='age'>Age:</label> <br>
<input name="age"><br>
</p>

<p>
<label for='dob'>DOB:</label> <br>
<input type="date" name="dob">
</p>
    <p>
        <label for='gender'>Gender:</label><br>
        <input type="radio" id="male" name="gender" value="male">
        <label for="male">Male</label><br>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label><br>
        <input type="radio" id="null" name="gender" value="null">
        <label for="null">Rather not say</label><br>
    </p>

    <p>
        <label for='password'>Password:</label> <br>
        <input type="password" name="password"> <br>
    </p>
    <p>
        <label for='confirmPassword'>Confirm Password:</label> <br>
        <input type="password" name="confirmPassword"> <br>
    </p>


<input type="submit" value="Submit"><br>
</form>
</div>

<script language="JavaScript">
var frmvalidator  = new Validator("register");
frmvalidator.addValidation("name","req","Please provide your name");
frmvalidator.addValidation("email","req","Please provide your email");
frmvalidator.addValidation("email","email","Please enter a valid email address");
</script>

</body>
</html>
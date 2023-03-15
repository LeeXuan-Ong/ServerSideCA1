<!DOCTYPE HTML>
<html>
    <?php $title = "Register";
    include 'header.php';
    include 'navigationBar.php'?>

<!-- define some style elements-->

<body>
<main class="container">

<h1>Register</h1>
    <div class="w-50">
<form method="POST" name="register" onsubmit="return registerValidation()" action="addAccount.php" >
    <div class="form-group">
<p>
<label for='name'>Your Name:</label> <br>
<input  id="name" type="text" name="name" placeholder="Name...">
</p>
<p>
<label for='email'>Email Address:</label> <br>
<input id="email" onchange="validateEmail()" type="text" name="email"  placeholder="Email..." required> <br>
</p>
<p>
<label for='description'>Description:</label> <br>
<textarea id="description" name="description" placeholder="Text..."></textarea>
</p>

<p>
<label for='phone'>Phone:</label> <br>
<input id="phone" type="text" onchange="validatePhone()" name="phone" placeholder="082 000 0000" required> <br>
</p>

<p>
<label for='address'>Address:</label> <br>
<textarea id="address" name="address" placeholder="Address..."></textarea>
</p>
        <div>
            <label for='dob'>Date of Birth:</label> <br>
            <input type="date" id="dob" name="dob" onchange="autoFillAge()" max="2010-12-31"> <br>
        </div>
<p>
<label for='age'>Age:</label> <br>
<input id="age" name="age" onchange="validateAge()" placeholder="Age..."><br>
</p>

        <label for='gender'>Gender:</label><br>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" id="male" name="gender" value="male"> Male
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" id="female" name="gender" value="female"> Female
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" id="null" name="gender" value="null" checked="checked"> Rather not say
            </label>
        </div>

    <p>
        <label for='password'>Password:</label> <br>
        <input id="password" type="password" name="password" required> <br>
    </p>
    <p>
        <label for='confirmPassword'>Confirm Password:</label> <br>
        <input id="confirmpassword" onchange="validatePassword()" type="password" name="confirmPassword" required> <br>
    </p>


<input type="submit" value="Submit"><br>
    </div>
</form>
    </div>

    <button onclick="logvali()" class="btn btn-primary"> log</button>

</main>
    <?php include 'footer.php'?>
<script src="js/validation.js"></script>
</body>
</html>
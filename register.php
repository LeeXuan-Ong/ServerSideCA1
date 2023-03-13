<!DOCTYPE HTML>
<html>
    <?php $title = "Register";
    include 'header.php';
    include 'navigationBar.php'?>

<!-- define some style elements-->

<body>
<div class="container">
<h1>Register</h1>
<form method="POST" name="register" onsubmit="return validation" action="addAccount.php" >
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
<input id="phone" type="number" onchange="validatePhone()" name="phone" placeholder="082 000 0000" required> <br>
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

    <button onclick="logvali()" class="btn btn-primary"> log</button>
</div>
<script>
    let emailValidation = false;
    let phoneValidation = false;
    let ageValidation = false;
    let passwordValidation = false;

    //preset date input

    function autoFillAge(){
        var dob = document.forms["register"]["dob"].value;
        var today = new Date();
        var birthDate = new Date(dob);
        document.getElementById("age").value = today.getFullYear() - birthDate.getFullYear();
    }

    function autoFillDOB(){
        var age = document.forms["register"]["age"].value;
        var today = new Date();
        var birthDate = new Date();
        birthDate.setFullYear(today.getFullYear() - age);
        document.getElementById("dob").value = birthDate.toISOString().split('T')[0];
    }

    //function for validation
    function validateEmail(){
        var email = document.forms["register"]["email"].value;
        if (!email.match(/[^\s@]+@[^\s@]+\.[^\s@]+/gi)) {
            document.getElementById("email").style.borderColor = "red";
            emailValidation = false;
        } else{
            document.getElementById("email").style.borderColor = "black";
            emailValidation = true;
        }
    }

    function validatePhone(){
        var phone = document.forms["register"]["phone"].value;
        if(!phone.match(/^[0-9]{3} [0-9]{3} [0-9]{4}$/)) {
            document.getElementById("phone").style.borderColor = "red";
            phoneValidation = false ;
        } else{
            document.getElementById("phone").style.borderColor = "black";
            phoneValidation = true;
        }
    }

    function validateAge(){
        var age = document.forms["register"]["age"].value;
        if(!age.match(/^[0-9]{2}$/)) {
            document.getElementById("age").style.borderColor = "red";
            ageValidation = false;
        } else{
            document.getElementById("age").style.borderColor = "black";
            autoFillDOB();
            ageValidation = true;
        }
    }

    function validatePassword(){
        var x = document.forms["register"]["password"].value;
        var y = document.forms["register"]["confirmPassword"].value;
        if (x !== y) {
            document.getElementById("confirmpassword").style.borderColor = "red";
            passwordValidation = false;
        } else {
            document.getElementById("confirmpassword").style.borderColor = "black";
            passwordValidation = true;
        }
    }

    function fullValidation(){
        if(emailValidation && phoneValidation && ageValidation && passwordValidation){
            return true;
        } else{
            return false;
        }
    }


</script>


</body>
</html>
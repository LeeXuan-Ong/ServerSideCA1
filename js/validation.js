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

function registerValidation(){
    if(emailValidation && phoneValidation && ageValidation && passwordValidation){
        return true;
    } else{
        return false;
    }
}
//function starting for instrument submit form

let quantityValidation = false;
let firstNameValidation = false;
let lastNameValidation = false;
function validateQuantity(){
    var quantity = document.forms["order"]["quantity"].value;
    if(!quantity.match(/^[0-9]{1,3}$/)) {
        document.getElementById("quantity").style.borderColor = "red";
        quantityValidation = false;
    } else{
        document.getElementById("formQuantity").style.borderColor = "black";
        quantityValidation = true;
    }
}

function validateFirstName(){
    var firstName = document.forms["order"]["firstName"].value;
    if(!firstName.match(/^[a-zA-Z]+$/)) {
        document.getElementById("fname").style.borderColor = "red";
        firstNameValidation = false;
    } else{
        document.getElementById("fname").style.borderColor = "black";
        firstNameValidation = true;
    }
}

function validateLastName(){
    var lastName = document.forms["order"]["lastName"].value;
    if(!lastName.match(/^[a-zA-Z]+$/)) {
        document.getElementById("lname").style.borderColor = "red";
        lastNameValidation = false;
    } else{
        document.getElementById("lname").style.borderColor = "black";
        lastNameValidation = true;
    }
}

function orderValidation(){
    if(quantityValidation && firstNameValidation && lastNameValidation && emailValidation && phoneValidation){
        return true;
    } else{
        return false;
    }
}
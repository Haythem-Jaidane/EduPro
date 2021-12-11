function verif() {
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

var Uname = document.forms["signupform"]["uname"].value;
var Umail = document.forms["signupform"]["email"].value;
var Upassword = document.forms["signupform"]["password"].value;

var errorN = document.getElementById('errorN');
var errorE = document.getElementById('errorE');
var errorP = document.getElementById('errorP');

var letters = /^[A-Za-z]+$/;
var dateNow = new Date();

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if (Uname == "") {
    errorN.innerHTML = "Enter a name please";
    return false;
}
else if (!(Uname.match(letters) && Uname.charAt(0).match(/^[A-Z]+$/))) {
    errorN.innerHTML = "Name must start with capital";
    return false;

} else {
    errorN.innerHTML = "";
}

if (Upassword == "") {
    errorP.innerHTML = "Enter password";
    return false;

}
else if (!(Upassword.match(/[0-9]/g) &&
    Upassword.match(/[A-Z]/g) &&
    Upassword.match(/[a-z]/g) &&
    Upassword.length >= 8)) {
    errorP.innerHTML = "password must be at least 8 caracteres,where at least :1 capital,1 minuscule and 1 number.";
    return false;

}
else {
    errorP.innerHTML = "";

}
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

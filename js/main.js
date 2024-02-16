// Password Matching

function matchPassword() {
    var pass1 = document.getElementById("pass1").value;
    var pass2 = document.getElementById("pass2").value;

    

   if (pass1 !== pass2) {
        alert("Don't match the password");
        return false;
    } else if (pass1 < 5 && pass2 < 5) {
        alert("Password Must be greater than 5 letters");
        return false;
    } else {
        return true;
    }

}

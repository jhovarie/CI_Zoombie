var passwordconfirmmatch = false;
var isvalidemail = false;
var completenameallow = false;

function checkAllowCreateAccount() {
    var addbr = false;
    var msg = "";
    var email = $('#email').val();
    if (isEmail(email)) {
        //msg += "Email Valid";
        isvalidemail = true;
    } else {
        msg += "<br>Invalid Valid";
        isvalidemail = false;
        addbr = true;
    }
    var password = $('#password').val();
    var confirm_password = $('#confirm_password').val();
    if (password.length >= 8) {
        if (password !== confirm_password) {
            passwordconfirmmatch = false;
            if(addbr === true){
                msg+="<br>";
            }
            msg += "<br/>Password Not Match";
            addbr = true;
        } else {
           // msg+= "Password Match";
            passwordconfirmmatch = true;
        }
    } else {
        msg+="<br/>Password minimum is 8 character.";
        addbr = true;
    }
    var completename = $('#complete_name').val();
    if(completename.length >= 2){
        completenameallow = true;
    } else {
        completenameallow = false;
        if(addbr === true){
            msg+="<br/>";
        }
        addbr = true;
        msg+="<br/>Complete name is very short";
    }

    if (passwordconfirmmatch === true && isvalidemail === true && completenameallow === true) {
        $('#btncreatenow').prop('disabled', false);
    } else {
        $('#btncreatenow').prop('disabled', true);
    }
    $('#msg').html(msg);
}
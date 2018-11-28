function _(id) {
    return document.getElementById(id);
}

function __(name) {
    return document.getElementsByName(name)[0];
}

function enable(name) {
    $(name).prop("disabled", false);
}
function disable(name) {
    $(name).prop("disabled", true);
}

function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}

function isNumber(evt) {
    /*
     Usage 
     <input type="text" onkeypress="return isNumber(event)" /> 
     */
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if ((charCode > 31 && charCode < 48) || charCode > 57) {
        return false;
    }
    return true;
}

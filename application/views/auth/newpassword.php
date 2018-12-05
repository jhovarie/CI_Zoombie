<?php $this->load->view('inc/header'); ?>
<h3>New Password</h3>
<a href="<?=base_url()?>auth">Login</a>
<br/><br/>

<script>
function checkPassword() {
    var password = $('#password').val();
    var confirm_password = $('#confirm_password').val();
    if (password.length >= 8) {
        if (password !== confirm_password) {
            msg = "<br/>Password Not Match";
            disable('#savenewpasswordbtn');
        } else {
            msg= "<br/>Password Match";
            enable('#savenewpasswordbtn');
        }
    } else {
        msg ="<br/>Password minimum is 8 character.";
        disable('#savenewpasswordbtn');
    }
    $('#msg').html(msg);
}
</script>

<form action="<?=base_url()?>auth/do_newpassword" method="post">
    Email = <input type="text" required disabled value="<?=$emailval?>"/><br/>
    <input type="hidden" name="email" value="<?=$emailval?>"/>
    <input type="hidden" name="codes" value="<?=$codesval?>"/>
    Password <input type="password" id="password" name="password" required onkeyup="checkPassword()"/><br/>
    Confirm_Password <input type="password" id="confirm_password" name="confirm_password" required onkeyup="checkPassword()"/><br/>
    <input id="savenewpasswordbtn" type="submit" value="Save" disabled><br>
    <span id="msg"></span>
</form>
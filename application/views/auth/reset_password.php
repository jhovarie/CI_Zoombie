<?php $this->load->view('inc/header'); ?>

<script>
    function checkEmailIfValid() {
        var email = $('#email').val();
        if(isEmail(email)){
            enable('#btnresetnow');
            $('#msg').html("Valid");
        } else {
            disable('#btnresetnow');
            $('#msg').html("InValid Email ");
        }
    }
</script>

<form id="myform" action="<?= base_url() . 'auth/send_reset_password_link' ?>" method="post">
    Email = <input type="text" id="email" name="email" required onkeyup="checkEmailIfValid()"/><br/>
    <input id="btnresetnow" type="submit" value="Submit" disabled>
    <br>
    <span id="msg"></span>
</form>
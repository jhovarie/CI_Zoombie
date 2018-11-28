<?php
$this->load->view('inc/header');
?>
<script type="text/javascript" src="<?=base_url()?>public/js/createaccount.js"></script>

<form id="myform" action="<?=base_url().'setup/createadmin_store'?>" method="post">
    Email = <input type="text" id="email" name="email" required onkeyup="checkAllowCreateAccount()"/><br/>
    password = <input type="password" id="password" name="password" required onkeyup="checkAllowCreateAccount()"/><br/>
    Confirm = <input type="password" id="confirm_password" name="confirm_password" required onkeyup="checkAllowCreateAccount()"/><br/><br/>
    <!-- Username = <input type="text" name="username" required/><br/> -->
    Complete Name = <input type="text" id="complete_name" name="complete_name" required onkeyup="checkAllowCreateAccount()"/><br/>
    
    <input id="btncreatenow" type="submit" value="Submit">
    <br>
    <span id="msg"></span>
</form>
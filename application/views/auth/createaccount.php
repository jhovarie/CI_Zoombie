<?php $this->load->view('inc/header'); ?>

<h3>Create Account</h3>
<a href="<?=base_url()?>auth">Login</a>
<br/><br/>
<script type="text/javascript" src="<?=base_url()?>public/js/createaccount.js"></script>

<form id="myform" action="<?=base_url().'auth/do_create_account'?>" method="post">
    Email = <input type="text" id="email" name="email" required onkeyup="checkAllowCreateAccount()"/><br/>
    password = <input type="password" id="password" name="password" required onkeyup="checkAllowCreateAccount()"/><br/>
    Confirm = <input type="password" id="confirm_password" name="confirm_password" required onkeyup="checkAllowCreateAccount()"/><br/><br/>
    <!-- Username = <input type="text" name="username" required/><br/> -->
    Complete Name = <input type="text" id="complete_name" name="complete_name" required onkeyup="checkAllowCreateAccount()"/><br/>
    
    <input id="btncreatenow" type="submit" value="Submit">
    <br>
    <span id="msg"></span>
</form>
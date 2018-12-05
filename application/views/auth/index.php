<?php $this->load->view('inc/header'); ?>
<h3>LOGIN</h3>
<a href="<?=base_url()?>auth/create_account">Create Account</a>
<a href="<?=base_url()?>auth/reset_password">Forgot Password</a>
<br/><br/>
<form action="<?=base_url()?>auth/dologin" method="post">
    Email = <input type="text" name="email" required/><br/>
    Password <input type="password" name="password" required/><br/>
    <input type="submit">
</form>
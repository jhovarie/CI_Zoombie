<?php
$this->load->view('inc/scripts');
?>

<?php
echo "<h1>this is Header</h1>";
if(isLogg()) {
    echo "<br>Log as = ".getEmail()." ";
    echo "<a href='".base_url()."index.php/auth/logout'>Logout</a>";
} 
echo "<hr>";
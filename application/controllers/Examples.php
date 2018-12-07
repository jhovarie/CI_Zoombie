<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Examples extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        require_login('examples'); 
    }
    
    function index(){
       $this->load->view('examples/index');
    }
    
    function sendmail(){
        echo "Send Mails<br/>";
        echo "<a href='".base_url()."index.php/examples/sendmailnow'>Send Mail Now</a>";
        
    }
    function sendmailnow(){
        include 'public/examples/sendmail.php';
    }
    
    
    function bootstrap3(){
        echo "<h1>bootstrap 3</h1>";
    }
   
}
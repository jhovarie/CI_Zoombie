<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Examples extends CI_Controller {
    function index(){
       echo "This is examples ";
       echo "<br><a href='".base_url()."index.php/DBController'>Mysql CRUD</a>";
       echo "<br><a href='".base_url()."examples/sendmail'>SendMails</a>";
    }
    
    function sendmail(){
        echo "Send Mails<br/>";
        include 'public/examples/sendmail.php';
    }
   
}
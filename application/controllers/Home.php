<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    function __construct() {
        parent::__construct();
        include_passkey();
    }
    function index() {
       $this->load->view('home/index');
    }
    function tokencheck() {
        checkToken();
        echo "<br/>Astig naman...";
    }
    
}

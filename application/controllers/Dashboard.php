<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
    
    function index(){
        if(!isLogg()) {
            redirect(base_url().'index.php/auth');
        }
        $this->load->view('dashboard/index');
    }
}

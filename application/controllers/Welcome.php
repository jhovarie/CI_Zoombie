<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        echo "This is index";
        //$this->load->library('barik');
        //$this->barik->test();
        /*

         */
        //echo $this->barik->randomNumber(10);
        //echo "<br>".$this->barik->randomAlphaNumeric(10);
        //$this->load->library("test_lib");
        //$str = $this->test_lib->test_1();
        //echo $str;

        /*
          $setupfile = 'public/setup/setup.php';
          if(file_exists($setupfile)) {
          include $setupfile;
          //rename('setup.php','setup_done.php');
          } else {
          echo "Not Exists setup.php";
          }
          $this->load->view('welcome_message');
         */
    }

}

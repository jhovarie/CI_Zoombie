<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    function index() {
        //$this->load->model('model_users');
        /*
          $email = "jhovarie@3dme.info";
          if($this->model_users->isemail_exists($email)) {
          echo "E";
          } else {
          echo "N";
          }
          echo "<br>";

          $password = 'jhovarie';
          if($this->model_users->login_users($email,$password)){
          echo 'allow';
          } else {
          echo 'NO allow';
          }
         */

        $this->load->view('auth/index');
    }

    function create_account() {
        $this->load->view('auth/createaccount');
    }

    function do_create_account() {
        $this->load->library('barikcrypt');
        
        if ($this->barik->getPreviousURL() == base_url() . "auth/create_account/" ||
                $this->barik->getPreviousURL() == base_url() . "auth/create_account") {
            //$this->load->model('model_users');
            if ($this->model_users->is_email_exists($this->input->post('email'))) {
                echo "Email aready Registered";
            } else {
                $userfolder = $this->barik->randomAlphaNumeric(30);
                $usersarray = array(
                    'id' => NULL,
                    'email' => $this->input->post('email'),
                    'password' => $this->input->post('password'),
                    // 'username' => $this->input->post('username'),
                    'complete_name' => $this->input->post('complete_name'),
                    'folder' => $userfolder,
                    'isactive' => 1
                );
                $this->model_users->insert_users($usersarray);
                $this->barik->createUserFoder('public/uploads/' . $userfolder);
            }
        }
    }

    function dologin() {
        $this->load->library('barikcrypt');
        $this->load->model('model_users');
        /* $usersarray = array(
          'email' => $this->input->post('email'),
          'password' => md5($this->input->post('password'))
          );
         */
        $email = $this->input->post('email');
        $password = $this->barikcrypt->encrypt($this->input->post('password'));
        // if ($this->model_users->login_users($usersarray) > 0) {

        echo $this->model_users->login_users($email, $password);
        /*
          if ($this->model_users->login_users($email,$password) ) {
          $newdata = array(
          'email' => $this->input->post('email'),
          'logged_in' => TRUE);
          $this->session->set_userdata($newdata);
          //log_array($newdata);
          //redirect('AuthController/dashboard');
          //redirect('dashboard');
          echo "Go to Dashboard";
          } else {
          $newdata = array(
          'email' => '',
          'logged_in' => FALSE
          );
          $this->session->set_userdata($newdata);
          $data['message'] = "Invalid Email or Password.";
          //echo "Go to Login Again";
          //$this->load->view('auth/index', $data);
          redirect(base_url().'auth/index');
          }
         */
    }

}

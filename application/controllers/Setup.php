<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Setup extends CI_Controller {

    function index() {
        $setupfile = 'public/setup/setup.php';
        if (file_exists($setupfile)) {
            include $setupfile;
            rename($setupfile, 'public/setup/setupdone.php');
        }
        // echo "<a href='".base_url() . "setup/create_account"."'>Create Account </a>";
        // redirect(base_url() . "setup/createadmin");
        // header("location:" . base_url() . "setup/create_account");
        $this->load->view('admin/createadmin');
    }

    function createadmin_store() {
        if ($this->barik->getPreviousURL() == base_url() . "setup/" ||
             $this->barik->getPreviousURL() == base_url() . "setup") {
             $this->load->library('barikcrypt');

            echo $this->input->post('email');
            //echo $this->input->post('username');
            echo $this->input->post('password');
            echo $this->input->post('confirm_password');
            echo $this->input->post('complete_name');

            $this->load->model('model_users');

            if ($this->model_users->is_email_exists($this->input->post('email'))) {
                echo "Email aready Registered";
            } else {
                $userfolder = $this->barik->randomAlphaNumeric(30);
                $usersarray = array(
                    'id' => NULL,
                    'email' => $this->input->post('email'),
                    'password' => $this->barikcrypt->encrypt($this->input->post('password')),
                    // 'username' => $this->input->post('username'),
                    'complete_name' => $this->input->post('complete_name'),
                    'rule' => 'admin1',
                    'folder' => $userfolder,
                    'isactive' => 1
                );
                $this->model_users->insert_users($usersarray);
                $this->barik->createUserFoder('public/uploads/' . $userfolder);
            }
        }
    }

}

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    function __construct() {
        parent::__construct();
        include_passkey();
    }

    function index() {
        require_login('dashboard');
        if ($this->barik->getPreviousURL() == 0 && !isLogg()) {
            redirect('auth/login');
        } else if (isLogg()) {
            redirect('dashboard');
        }
    }

    function login() {
        $this->load->view('auth/index');
    }

    function create_account() {
        $this->load->view('auth/createaccount');
    }

    function do_create_account() {
        checkToken();
        $this->load->library('barikcrypt');
        if (strtolower($this->barik->getPreviousURL()) == strtolower(base_url()) . "index.php/auth/create_account" ||
                $this->barik->getPreviousURL() == base_url() . "auth/create_account") {
            //$this->load->model('model_users');
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
                    'folder' => $userfolder,
                    'isactive' => 1
                );
                $this->model_users->insert_users($usersarray);
                $this->barik->createUserFoder('public/uploads/' . $userfolder);
                setLogg(true, $this->input->post('email'));
                setID($this->model_users->get_userid($this->input->post("email")));
                redirect(base_url() . 'dashboard');
            }
        }
    }

    function dologin() {
        checkToken();
        if (strtolower($this->barik->getPreviousURL()) == strtolower(base_url()) . "index.php/auth/login" ||
                $this->barik->getPreviousURL() == base_url() . "auth/login") {
            $this->load->library('barikcrypt');
            $this->load->model('model_users');
            $email = $this->input->post('email');
            $password = $this->barikcrypt->encrypt($this->input->post('password'));
            if ($this->model_users->login_users($email, $password)) {
                setLogg(true, $this->input->post('email'));
                setID($this->model_users->get_userid($this->input->post("email")));
                redirect(base_url() . getSESSION('tologin'));
            } else {
                setLogg(false, '');
                echo "invalid username or password";
            }
        }
    }

    function reset_password() {
        $this->load->view('auth/reset_password');
    }

    function send_reset_password_link() {
        //auth/reset_password
        checkToken();
        if (strtolower($this->barik->getPreviousURL()) == strtolower(base_url()) . "index.php/auth/reset_password" ||
                $this->barik->getPreviousURL() == base_url() . "auth/reset_password") {
            if ($this->model_users->is_email_exists($this->input->post("email"))) {
                // echo "<br>Email is ".$this->input->post("email");
                //echo "<br>".$this->barik->randomNumber(6);
                $randomcode = $this->barik->randomNumber(6);
                $userid = $this->model_users->get_userid($this->input->post("email"));
                $link = base_url() . "index.php/auth/newpassword/{$userid}/{$randomcode}";

                $subject = "Reset Password Link";
                $emailbody = "here is your reset password link {$link}";

                if ($this->barik->sendMail($this->input->post("email"), $subject, $emailbody)) {
                    $data = array(
                        'user_id' => $this->model_users->get_userid($this->input->post("email")), //convert email to user_id
                        'codes' => $randomcode,
                        'forwhat' => 'resetpassword'
                    );
                    $this->model_util->insert_record('confirmcodes', $data);
                    echo "<br>We send activation link to your email..";
                } else {
                    echo "Failed To Send Mail";
                }
            } else {
                echo "Email Not Exists";
            }
        }
    }

    function newpassword($userid, $codes) {
        if ($this->model_util->is_exists_record('confirmcodes', 'user_id', $userid, 'codes', $codes)) {
            $data['emailval'] = $this->model_users->get_useremail($userid); //'jhovarie@3dme.info';
            $data['codesval'] = $codes;
            $this->load->view('auth/newpassword', $data);
        } else {
            echo "<br/>Code Not valid";
            echo 'userid = ' . $userid;
            echo '<br/>codes = ' . $codes;
            echo "<br/>Code is Valid";
        }
    }

    function do_newpassword() {
        //$this->model_users->changepassword('jhovarie@3dme.info','kamote');
        $this->load->library('barikcrypt');
        $newpass = $this->barikcrypt->encrypt($this->input->post('password'));
        if ($this->model_users->changepassword($this->input->post('email'), $newpass)) {
            echo "Password is Successfuly Change";
            $this->model_util->delete_table_row('confirmcodes', 'codes', $this->input->post('codes'));
        } else {
            echo "Password Not Change";
        }
    }

    function logout() {
        setLogg(false, '');
        redirect(base_url() . 'index.php/auth');
    }

}

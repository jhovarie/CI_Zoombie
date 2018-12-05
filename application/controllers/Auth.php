<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    function __construct() {
        parent::__construct();
        include_passkey();
    }
    
    function index() {
        if (isLogg()) {
            redirect(base_url() . 'dashboard');
        }
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
        $this->load->library('barikcrypt');
        $this->load->model('model_users');
        $email = $this->input->post('email');
        $password = $this->barikcrypt->encrypt($this->input->post('password'));
        if ($this->model_users->login_users($email, $password)) {
            setLogg(true, $this->input->post('email'));
            setID($this->model_users->get_userid($this->input->post("email")));
            redirect(base_url() . 'dashboard');
        } else {
            setLogg(false, '');
            echo "invalid username or password";
        }
    }

    function reset_password() {
        $this->load->view('auth/reset_password');
    }

    function send_reset_password_link() {
        if ($this->model_users->is_email_exists($this->input->post("email"))) {
            // echo "<br>Email is ".$this->input->post("email");
            //echo "<br>".$this->barik->randomNumber(6);
            $randomcode = $this->barik->randomNumber(6);
            $userid = $this->model_users->get_userid($this->input->post("email"));
            $link = base_url() . "index.php/auth/newpassword/{$userid}/{$randomcode}";

            $subject = "Reset Password Link";
            $emailbody = "here is your reset password link {$link}";

            if ($this->sendmail($this->input->post("email"), $subject, $emailbody)) {
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

    function sendmail($mailto, $subject, $body) {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => get_gmail_email(),
            'smtp_pass' => get_gmail_pass(),
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        //Set to, from, message, etc.
        $this->email->from(get_gmail_email(), get_gmail_displayname());
        $this->email->to($mailto);

        $this->email->subject($subject);
        $this->email->message($body);
        // echo $this->email->print_debugger();
        return $this->email->send();
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
            $this->model_util->delete_table_row('confirmcodes','codes',$this->input->post('codes'));
        } else {
            echo "Password Not Change";
        }
    }

    function logout() {
        setLogg(false, '');
        redirect(base_url() . 'index.php/auth');
    }

}

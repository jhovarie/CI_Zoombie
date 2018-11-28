<?php

class Model_users extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function insert_users($data) {//the products array gets
        $sql = $this->db->insert_string('users', $data);
        $query = $this->db->query($sql);
        if ($query === TRUE) {
            return TRUE;
        } else {
            $last_query = $this->db->last_query();
            return $last_query;
        }
    }

    function login_users($email, $password) {
        $data = array(
            'email' => $email,
            'password' => $password
        );
        $this->db->where('email', $data['email']);
        $this->db->where('password', $data['password']);
        return $this->db->count_all_results('users') > 0 ? 1 : 0;
    }

    function is_email_exists($email) {
        $data = array(
            'email' => $email
        );
        $this->db->where('email', $data['email']);
        return $this->db->count_all_results('users') > 0 ? 1 : 0;
    }

    function changepassword($email = NULL, $password = NULL) {
        $data = array(
            'email' => $email,
            'password' => $password
        );
        $this->db->where('email', $data['email']);
        $query = $this->db->update('users', $data);
        if ($query === TRUE) {
            return TRUE;
        } else {
            $last_query = $this->db->last_query();
            return $last_query;
        }
    }

}

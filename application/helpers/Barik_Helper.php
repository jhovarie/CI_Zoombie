<?php

/*
  function getEmail(); //return tring
  function getID(); //return string //return user id
  function isLogg(); //return boolean check if loggin or not
  function setID($id); // void
  function setLogg($b,$email); { //set 1 if loggin or 0 if loggout
 */

//------------------------------------------------------------------------------------

function getEmail() {
    return userdata('email');
}

function getID() {
    return userdata('user_id');
}

function isLogg() {
    return userdata('logged_in');
}

function setID($id) {
    $newdata = array(
        'user_id' => $id,
    );
    set_userdata($newdata);
}

function setLogg($b, $email) {
    if ($b == 1 || $b == true) {
        $newdata = array(
            'email' => $email,
            'logged_in' => TRUE
        );
        set_userdata($newdata);
    } else {
        $newdata = array(
            'email' => '',
            'logged_in' => FALSE
        );
        set_userdata($newdata);
    }
}

//--------------
function set_userdata($data, $value = NULL) {
    if (is_array($data)) {
        foreach ($data as $key => &$value) {
            $_SESSION[$key] = $value;
        }
        return;
    }
    $_SESSION[$data] = $value;
}

function userdata($key = NULL) {
    if (isset($key)) {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : NULL;
    } elseif (empty($_SESSION)) {
        return array();
    }
    $userdata = array();
    $_exclude = array_merge(
            array('__ci_vars'), $this->get_flash_keys(), $this->get_temp_keys()
    );
    foreach (array_keys($_SESSION) as $key) {
        if (!in_array($key, $_exclude, TRUE)) {
            $userdata[$key] = $_SESSION[$key];
        }
    }
    return $userdata;
}
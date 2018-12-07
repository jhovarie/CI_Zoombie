<?php

include 'public/php/mod_ci_lib.php';

function setToken() {
    $barik = new Barik();
    $token = $barik->randomAlphaNumeric(10);
    $data = array(
        'ci_zoombie_token' => $token
    );
    set_userdata($data);
    return "<input type='hidden' id='ci_zoombie_token' name='ci_zoombie_token' value='{$token}'/> ";
}

function checkToken($msg = "token mismatch") {
    if (@$_POST['ci_zoombie_token'] != userdata('ci_zoombie_token')) {
        echo $msg;
        return;
    }
}

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
    $newdata = array('user_id' => $id);
    set_userdata($newdata);
}

function setLogg($b, $email) {
    if ($b == 1 || $b == true) {
        $newdata = array('email' => $email, 'logged_in' => TRUE);
        set_userdata($newdata);
    } else {
        $newdata = array('email' => '', 'logged_in' => FALSE);
        set_userdata($newdata);
    }
}

function setSESSION($key, $val) {
    $newdata = array($key => $val);
    set_userdata($newdata);
}

function getSESSION($key) {
    return userdata($key);
}

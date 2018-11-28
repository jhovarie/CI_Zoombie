<?php

/*
  $this->barik->getCurrentURL(); //return string
  $this->barik->getExtension($file); //return string
  $this->barik->getEmail(); //return tring
  $this->barik->getID(); //return string //return user id 
  $this->barik->getPreviousURL(); //return string
  $this->barik->getUserIP(); //return string
  $this->barik->isContains($source_str, $findwhat); //return boolean
  $this->barik->isImage($file); //return boolean
  $this->barik->isLogg(); //return boolean check if loggin or not
  $this->barik->isVideo($file); //return boolean
  $this->barik->randomAlphaNumeric($random_string_length); //return string
  $this->barik->randomNumber($length); //return string
  $this->barik->setID($id); // void
  $this->barik->setLogg($b,$email); { //set 1 if loggin or 0 if loggout
  $this->barik->stringAlphaNumericOnly($name); //return string
  $this->barik->stringMakeItShorter($str, $limit); //return string
 */

class Barik {

    function __construct() {
  
    }
    
    function getCurrentURL() {
        //$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        return "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    }
    
    function getExtension($file) {
        $pos = strpos($file, ".");
        return substr($file, $pos, strlen($file));
    }

    function getPreviousURL() {
        return $_SERVER['HTTP_REFERER'];
    }

    function getUserIP() {
        $client = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote = $_SERVER['REMOTE_ADDR'];

        if (filter_var($client, FILTER_VALIDATE_IP)) {
            $ip = $client;
        } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
            $ip = $forward;
        } else {
            $ip = $remote;
        }
        return $ip;
    }

    function isContains($source_str, $findwhat) {
        if (strpos($source_str, $findwhat) !== false) {
            return true;
        }
        return false;
    }

    function isImage($file) {
        if ($this->getExtension(strtolower($file)) == ".jpg") {
            return true;
        }
        if ($this->getExtension(strtolower($file)) == ".jpeg") {
            return true;
        }
        if ($this->getExtension(strtolower($file)) == ".png") {
            return true;
        }
        if ($this->getExtension(strtolower($file)) == ".bmp") {
            return true;
        }
        if ($this->getExtension(strtolower($file)) == ".webp") {
            return true;
        }
        if ($this->getExtension(strtolower($file)) == ".gif") {
            return true;
        }
        return false;
    }

    function isVideo($file) {
        if ($this->getExtension(strtolower($file)) == ".mp4") {
            return true;
        }
        if ($this->getExtension(strtolower($file)) == ".mov") {
            return true;
        }
        if ($this->getExtension(strtolower($file)) == ".avi") {
            return true;
        }
        if ($this->getExtension(strtolower($file)) == ".3gp") {
            return true;
        }
        return false;
    }

    function randomAlphaNumeric($random_string_length) {
        $uppercaseletter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $lowercaseletter = 'abcdefghijklmnopqrstuvwxyz';
        $numbers = '0123456789';
        $characters = $uppercaseletter . $lowercaseletter . $numbers;
        $string = '';
        $max = strlen($characters) - 1;
        for ($i = 0; $i < $random_string_length; $i++) {
            $string .= $characters[mt_rand(0, $max)];
        }
        return $string;
    }

    function randomNumber($length) {
        $result = '';
        for ($i = 0; $i < $length; $i++) {
            $result .= mt_rand(0, 9);
        }
        return $result;
    }
    
    function stringAlphaNumericOnly($name) {
        $name2 = preg_replace("/[^A-Za-z0-9 ]/", '', $name);
        $name3 = str_replace(" ", "", $name2);
        return $name3;
    }

    function stringMakeItShorter($str, $limit) {
        if (strlen($str) > $limit) {
            return substr($str, 0, $limit) . "...";
        }
        return $str;
    }

    function createUserFoder($userdir) {
        //$userdir = 'public/uploads/' . $this->barik->randomAlphaNumeric(30);
        $trycount = 0;
        for ($i = 0; $i < 50; $i++) {
            if (file_exists($userdir)) {
                $trycount++;
            } else {
                $old = umask(0);
                if (mkdir($userdir, 0777)) {} else {}
                umask($old);
                $myfile = fopen($userdir . "/index.php", "w") or die("Unable to open file!");
                $txt = "<?php\n  header('location:" . base_url() . "'); \n?>";
                fwrite($myfile, $txt);
                fclose($myfile);
                break;
            }
        }
    }

}

?>

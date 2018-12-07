<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barik {
    function __construct() {}
    
    function getCurrentURL() { return "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; }
    function getExtension($file) { return substr($file, strpos($file, "."), strlen($file)); }
    function getPreviousURL() { return isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 0; }
    function getUserIP() { $client = @$_SERVER['HTTP_CLIENT_IP']; $forward = @$_SERVER['HTTP_X_FORWARDED_FOR']; $remote = $_SERVER['REMOTE_ADDR']; if (filter_var($client, FILTER_VALIDATE_IP)) { $ip = $client; } elseif (filter_var($forward, FILTER_VALIDATE_IP)) { $ip = $forward; } else { $ip = $remote; } return $ip; }
    function isContains($source_str, $findwhat) { if (strpos($source_str, $findwhat) !== false) { return true;} return false;}
    function isImage($file) { if ($this->getExtension(strtolower($file)) == ".jpg") { return true; } if ($this->getExtension(strtolower($file)) == ".jpeg") {return true; }if ($this->getExtension(strtolower($file)) == ".png") { return true; } if ($this->getExtension(strtolower($file)) == ".bmp") { return true; } if ($this->getExtension(strtolower($file)) == ".webp") { return true; } if ($this->getExtension(strtolower($file)) == ".gif") { return true; }return false;}
    function isVideo($file) { if ($this->getExtension(strtolower($file)) == ".mp4") { return true; } if ($this->getExtension(strtolower($file)) == ".mov") { return true; } if ($this->getExtension(strtolower($file)) == ".avi") { return true; } if ($this->getExtension(strtolower($file)) == ".3gp") { return true; } return false; }
    function randomAlphaNumeric($length) {$uppercaseletter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; $lowercaseletter = 'abcdefghijklmnopqrstuvwxyz'; $numbers = '0123456789'; $characters = $uppercaseletter . $lowercaseletter . $numbers; $string = ''; $max = strlen($characters) - 1; for ($i = 0; $i < $length; $i++) { $string .= $characters[mt_rand(0, $max)]; } return $string; }
    function randomNumber($length) { $result = ''; for ($i = 0; $i < $length; $i++) { $result .= mt_rand(0, 9); } return $result; }
    //function shufflearray($array){ return shuffle($array); }
    function stringAlphaNumericOnly($name) { return str_replace(" ", "", preg_replace("/[^A-Za-z0-9 ]/", '', $name)); }
    function stringMakeItShorter($str, $limit) { if (strlen($str) > $limit) { return substr($str, 0, $limit) . "..."; } return $str; }

    function sendMail($mailto,$subject,$body) {
       $CI =& get_instance(); 
           $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => get_gmail_email(),
            'smtp_pass' => get_gmail_pass(),
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );
        $CI->load->library('email', $config);
        $CI->email->set_newline("\r\n");
        //Set to, from, message, etc.
        $CI->email->from(get_gmail_email(), get_gmail_displayname());
        $CI->email->to($mailto);

        $CI->email->subject($subject);
        $CI->email->message($body);
        // echo $CI->email->print_debugger();
        return $CI->email->send();
    }
    
    function createUserFoder($userdir) { $trycount = 0; for ($i = 0; $i < 50; $i++) { if (file_exists($userdir)) { $trycount++; } else { $old = umask(0);
                if (mkdir($userdir, 0777)) {} else {} umask($old); $myfile = fopen($userdir . "/index.php", "w") or die("Unable to open file!");
                $txt = "<?php\n  header('location:" . base_url() . "'); \n?>";
                fwrite($myfile, $txt); fclose($myfile); break; } }
    }
}

?>

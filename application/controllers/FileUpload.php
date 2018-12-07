<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FileUpload extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function uploadcsv() {
        $this->load->view('fileupload/uploadcsv');
    }

    function uploadcsv_store() {
        checkToken();
        if (@$_POST["Upload"] == "Upload File") {
            $file = 'public/uploads/' . @$_FILES["file"]["name"];
            if (copy($_FILES["file"]["tmp_name"], $file)) {
                $row = 1;
                if (($handle = fopen($file, "r")) !== FALSE) {
                    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                        $num = count($data);
                        echo "<p> $num fields in line $row: <br /></p>\n";
                        $row++;
                        for ($c = 0; $c < $num; $c++) {
                            echo $data[$c] . "<br />\n";
                        }
                    }
                    fclose($handle);
                }//end if (($handle = fopen(
            } //end  if (copy($_FILES["file"]["tmp_name"
        }
    }

}

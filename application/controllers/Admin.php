<?php
class Admin extends CI_Controller {
    function themes() {
        $this->load->helper('directory');
        $maps = directory_map('public/themes', 1);
       // $themes['themes'] = $maps;
        //print_r($map);
        /*
        foreach ($maps as $map) {
            $screenshot = "public\\themes\\" . $map . "screenshot.jpg";
            if ($map != "index.php") {
                if (file_exists($screenshot)) {
                    echo "Title {$map}<br>";
                    echo "<img src='".base_url()."{$screenshot}' width='100' height='100'/>";
                } 
                echo "<br/>";
            }
        }
        */
        $list = array();
        foreach ($maps as $map) {
            $screenshot = "public\\themes\\" . $map . "screenshot.jpg";
             if ($map != "index.php") {
                $list[] = array('themes'=>$map,'screenshot'=>base_url().$screenshot);
             }
        }
        $themes['themes'] = $list;
        $this->load->view('admin/themes',$themes); 
    }
}

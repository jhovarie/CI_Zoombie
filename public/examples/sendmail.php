<?php
         $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'barikdeveloper@gmail.com',
            'smtp_pass' => 'yourgmailpass',
            'mailtype'  => 'html', 
            'charset'   => 'iso-8859-1'
            );
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            //Set to, from, message, etc.
            $this->email->from('barikdeveloper@gmail.com', 'yourbusnessname');
            $this->email->to('barik7890@yahoo.com'); 

            $this->email->subject('CI Email Test');
            $this->email->message('Testing the email class.');  

            //$this->email->send();
            echo $this->email->print_debugger();
            $result = $this->email->send();
            if($result) {
                echo "Success to Send Mail";
            } else {
                echo "Failed to send Mail";
            }
?>            
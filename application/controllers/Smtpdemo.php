<?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Smtpdemo extends CI_Controller
    {
        public function index()
        {
           /* $this->load->library('email'); // load email library
            $this->email->from('rezapahlevi056@gmail.com', 'Reza Pahlevi Bahruddin');
            $this->email->to('sribulanmegawati@gmail.com');
            // $this->email->cc('rezaphalevi27@gmail.com'); 
            $this->email->subject('Test 1');
            $this->email->message('It\'s a message');
            // $this->email->attach('/path/to/file1.png'); // attach file
            // $this->email->attach('/path/to/file2.pdf');
            // echo $this->email->print_debugger();
            if ($this->email->send())
                echo "Mail Sent!";
            else
                echo "There is error in sending mail!";
*/        
            $this->load->library('email');

            $this->email->initialize(array(
                'protocol' => 'smtp',
                'smtp_host' => 'smtp.live.com',
                'smtp_port' => 465,
                'smtp_user' => 'chester_phalevi@windowslive.com',
                'smtp_pass' => '@linkin_park',
                'mailtype'  => 'html',
                'charset'   => 'iso-8859-1'
            )
            );
             
            $this->email->set_newline("\r\n");
             
            $mail = $this->email;
             
            $mail->from('rezapahlevi056@gmail.com', 'Reza Pahlevi');
            $mail->to('sribulanmegawati@gmail.com'); 
            // $mail->cc('another@another-example.com'); 
            // $mail->bcc('them@their-example.com'); 
             
            $mail->subject('Mail Test');
            $mail->message('Testing the mail class.');  
             
            $mail->send();
             
            echo $mail->print_debugger();
        }
    }
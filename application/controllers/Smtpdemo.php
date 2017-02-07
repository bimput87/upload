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
            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.gmail.com',
                'smtp_port' => 465,
                'smtp_user' => 'Reza',
                'smtp_pass' => '@reza27#',
                'mailtype'  => 'html',
                'charset'   => 'iso-8859-1'
            );
             
            $this->load->library('email', $config);
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
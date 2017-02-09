<?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Smtpdemo extends CI_Controller
    {
        public function index()
        {
           $this->load->library('email');
           $config['protocol']    = 'smtp';
           $config['smtp_host']    = 'smtp.gmail.com';
           $config['smtp_port']    = '465';
           $config['smtp_timeout'] = '7';
           $config['smtp_user']    = 'rezapahlevi056@gmail.com';
           $config['smtp_pass']    = '@reza2707#';
           $config['charset']    = 'utf-8';
           $config['smtp_crypto']    = 'ssl';
           $config['newline']    = "\r\n";
           $config['mailtype'] = 'html'; // or html
           $config['validation'] = TRUE; // bool whether to validate email or not      
           $this->email->initialize($config);
           $this->email->from('rezapahlevi056@gmail.com', 'Reza Pahlevi');
           $this->email->to('rezaphalevi27@gmail.com'); 
           $this->email->subject('Test Email');
           $this->email->message('Bulan cintaku');
           $this->email->print_debugger();
            if ($this->email->send())
                echo "Mail Sent!";
            else
                echo "There is error in sending mail!";   
           //$this->email->cc('anot
        }
    }
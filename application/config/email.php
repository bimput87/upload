<?php
	defined('BASEPATH') or exit('No direct script access allowed');
    $config['protocol'] = 'smtp';
    $config['smtp_host'] = 'ssl://smtp.googlemail.com'; //change this
    $config['smtp_port'] = '465';
    $config['mailpath'] = '/usr/bin/sendmail';
    $config['smtp_user'] = 'Reza Pahlevi'; //change this
    $config['smtp_pass'] = '@reza27#'; //change this
    // $config['smtp_crypto'] = 'ssl';
    $config['mailtype'] = 'html';
    $config['charset'] = 'iso-8859-1';
    $config['wordwrap'] = TRUE;
    $config['newline'] = "\r\n"; //use double quotes to comply with RFC 822 standard
?>
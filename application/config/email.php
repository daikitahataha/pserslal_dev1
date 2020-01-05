<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// smtp settings
$config['protocol']     = 'smtp';
$config['smtp_host']    = 'smtp.googlemail.com';
//SMTP user
$config['smtp_user']    = 'otohiko0606@gmail.com';
//SMTP password
$config['smtp_pass']    = '783640da!';
//SMTP port
$config['smtp_port']    = '465';
//SMTP time limit
$config['smtp_timeout'] = '30';
$config['newline']      = "\r\n";
$config['crlf']         = "\r\n";
$config['mailtype']     = "html";
$config['charset']      = 'utf-8';
$config['smtp_crypto']  = 'ssl';

?>

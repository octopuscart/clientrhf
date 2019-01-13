<?php
 require("configdbconnect.php");
$configuration = $globleConnectDB;


$config['useragent'] = 'CodeIgniter';
$config['protocol'] = 'smtp';
//$config['mailpath'] = '/usr/sbin/sendmail';
$config['smtp_host'] =$configuration['email_host'];
$config['smtp_user'] = $configuration['email_sender'];
$config['smtp_pass'] = $configuration['email_password'];
$config['smtp_port'] = $configuration['email_port'];
$config['smtp_timeout'] = 5;
$config['wordwrap'] = TRUE;
$config['wrapchars'] = 76;
$config['mailtype'] = 'html';
$config['charset'] = 'iso-8859-1';
$config['validate'] = FALSE;
$config['priority'] = 3;
$config['crlf'] = "\r\n";
$config['newline'] = "\r\n";
$config['bcc_batch_mode'] = TRUE;
$config['bcc_batch_size'] = 200;

    
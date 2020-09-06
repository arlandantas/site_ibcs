<?php
$config['smtp_host'] = $_ENV['EMAIL_HOST'];
$config['smtp_user'] = $_ENV['EMAIL_USER'];
$config['smtp_password'] = $_ENV['EMAIL_PASSWORD'];
$config['smtp_crypto'] = $_ENV['EMAIL_CRYPTO'];
$config['smtp_port'] = $_ENV['EMAIL_PORT'];
$config['protocol'] = $_ENV['EMAIL_PROTOCOL'];
$config['newline'] = "\n";
$config['crlf'] = "\n";

// $config['mailtype'] = 'html';
// $config['charset'] = 'iso-8859-1';
// $config['wordwrap'] = 'TRUE';
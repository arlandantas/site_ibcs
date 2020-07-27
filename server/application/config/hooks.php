<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/
$hook['pre_system'] = function() {
  $handle = @fopen('./.env', "r");
  if ($handle) {
    while (($buffer = fgets($handle)) !== false) {
      $buffer = trim($buffer);
      if (substr($buffer, 0, 1) != '#' && $buffer != '') {
        $parts = array_map(function ($e) { return trim($e); }, explode("=", $buffer));
        if (!isset($env[mb_strtolower($parts[0])])) {
          // $env[mb_strtolower($parts[0])] = $parts[1];
          $_ENV[$parts[0]] = isset($parts[1]) ? $parts[1] : TRUE;
          $_SERVER[$parts[0]] = isset($parts[1]) ? $parts[1] : TRUE;
        }
      }
    }
    if (!feof($handle)) {
      echo "Erro: falha inexperada de fgets()\n";
    }
  } else {
    throw new Exception(".env file not found! Crie um arquivo .env em /server/ do projeto se baseando em /server/.env.example!", 1);
  }
};
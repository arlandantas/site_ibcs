<?php

$handle = @fopen('./.env', "r");
if ($handle) {
  while (($buffer = fgets($handle)) !== false) {
    $buffer = trim($buffer);
    if (substr($buffer, 0, 1) != '#' && $buffer != '') {
      $parts = array_map(function ($e) { return trim($e); }, explode("=", $buffer));
      
      $_ENV[mb_strtoupper($parts[0])] = isset($parts[1]) ? $parts[1] : TRUE;
      $_SERVER[mb_strtoupper($parts[0])] = isset($parts[1]) ? $parts[1] : TRUE;
    }
  }
  if (!feof($handle)) {
    echo "Erro: falha inexperada de fgets()\n";
  }
} else {
  throw new Exception("Arquivo .env não encontrado! Crie um arquivo .env em /server/ do projeto se baseando em /server/.env.example!", 1);
}
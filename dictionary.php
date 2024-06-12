<?php
header('Content-Type: text/javascript');
header("Cache-Control: max-age=3600");
header('Use-As-Dictionary: match="compressed.php"');
if (isset($_SERVER['HTTP_ACCEPT_ENCODING']) &&
    strpos($_SERVER['HTTP_ACCEPT_ENCODING'], 'br') !== false) {
  header('Content-Encoding: br');
  readfile(__DIR__ . '/dictionary.js.br');
} else {
  readfile(__DIR__ . '/dictionary.js');
}

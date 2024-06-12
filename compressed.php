<?php
header("Cache-Control: no-store, no-cache, must-revalidate");
header('Content-Type: text/javascript');
if (isset($_SERVER['HTTP_AVAILABLE_DICTIONARY']) &&
    isset($_SERVER['HTTP_ACCEPT_ENCODING']) &&
    strpos($_SERVER['HTTP_ACCEPT_ENCODING'], 'dcb') !== false) {
  header('Content-Encoding: dcb');
  readfile(__DIR__ . '/compressed.dcb');
} else if (isset($_SERVER['HTTP_AVAILABLE_DICTIONARY']) &&
           isset($_SERVER['HTTP_ACCEPT_ENCODING']) &&
           strpos($_SERVER['HTTP_ACCEPT_ENCODING'], 'br-d') !== false) {
  header('Content-Encoding: br-d');
  header("Content-Dictionary: " . $_SERVER['HTTP_AVAILABLE_DICTIONARY']);
  readfile(__DIR__ . '/compressed.br-d');
} else {
  if (!isset($_SERVER['HTTP_AVAILABLE_DICTIONARY'])) {
    $error = "Dictionary support not available (missing Available-Dictionary request header).";
  } else {
    $error = "'Dictionary' encoding not available (missing 'dcb' from Accept-Encoding).";
  }
  echo "document.getElementById('result').innerText = 'ERROR: $error';";
}
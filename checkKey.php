<?php
$key = strtolower($_GET['key']);
if (exec('cat keys.prk | grep -w '.escapeshellarg($key))) {
     echo 'valid';
} else {
  echo "invalid";
}
?>

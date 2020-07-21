<?php
session_start();
if ($_GET['pass'] == "password"){
$_SESSION['log'] = true;
echo "valid";
} else {
  echo "invalid";
}
?>

<?php
session_start();
if ($_SESSION['log'] == true && $_GET['key'] != ""){
$key = $_GET['key'];
$key = strtolower($key);
if (preg_match('/\s/', $key)){
echo "code can not include spaces";
} else {
$file = fopen("../../keys.prk", "a");
fwrite($file, $key."\n");
fclose($file);
$info = file_get_contents("../../info.prk");
$info = explode(" ", $info);
$infofile = fopen("../../info.prk", "w");
$info[1] = $info[1] + 1;
fwrite($infofile, $info[0]." ".$info[1]."\n");
fclose($infofile);
echo "submited [".$key."]";
}
}
?>

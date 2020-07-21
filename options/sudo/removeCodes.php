<?php
session_start();
if ($_SESSION['log'] == true && $_GET['key'] != ""){
$removeKey = $_GET['key'];

//update info.prk
$info = file_get_contents("../../info.prk");
$info = explode(" ", $info);
$infofile = fopen("../../info.prk", "w");
$info[1] = $info[1] - 1;
fwrite($infofile, $info[0]." ".$info[1]."\n");
fclose($infofile);

//remove code from file
$keys = file_get_contents("../../keys.prk");
$keys = explode("\n", $keys);
$keyNum = count($keys) - 1;
$file = fopen("../../keys.prk", "w");
for ($q = 0; $q < $keyNum; $q++){
if ($keys[$q] != $removeKey){
fwrite($file, $keys[$q]."\n");
}
}
fclose($file);

//response
echo "removed [".$removeKey."]";
}
?>

<script>
alert(<?php echo $keyNum ?>);
</script>

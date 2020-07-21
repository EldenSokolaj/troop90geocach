<?php

function isActive($scout){
$users = file_get_contents("../../users.prk");
$users = explode(" ", $users);
$userNum = count($users) - 1;
for ($q = 0; $q < $userNum; $q = $q + 2){
  $realName = $users[$q]." ".$users[$q + 1];
  if ($realName == $scout){
    return true;
  }
}
return false;
}

?>
<html>
<style>
 body { background-image: url("../../background.jpg"); }
</style>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../button.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>T90 Geocaching | <?php echo $_GET['patrol']; ?></title>
</head>
<body text="white">
<center>
  <h3><?php echo $_GET['patrol']; ?> Patrol</h3>
</center>
<?php
$patrolFile = "../../patrols/".$_GET['patrol'].".prk";
$users = file_get_contents($patrolFile);
$users = explode("\n", $users);
$userNum = count($users) - 1;
for ($i = 0; $i < $userNum; $i = $i + 1){
  if (isActive($users[$i]) == true){
  echo "<div class=\"button_cont\" align=\"center\"><a class=\"type_b\" href=\"profile.php?scout=".$users[$i]."\" rel=\"nofollow noopener\">".$users[$i]."</a></div><br>";
  }
}
?>
</body>
</html>

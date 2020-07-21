<?php
session_start();
if ($_SESSION['log'] != true){
  echo "<script> location.assign('../admin.php'); </script>";
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
<title>T90 Geocaching | Participant List</title>
</head>
<body text="white">
<center>
  <h3>Participant List</h3>
</center>
<?php
$users = file_get_contents("../../users.prk");
$users = explode(" ", $users);
$userNum = count($users) - 1;
for ($i = 0; $i < $userNum; $i = $i + 2){
  echo "<div class=\"button_cont\" align=\"center\"><a class=\"type_b\" href=\"profile.php?scout=".$users[$i]."+".$users[$i + 1]."\" rel=\"nofollow noopener\">".$users[$i]." ".$users[$i + 1]."</a></div><br>";
}
?>
</body>
</html>

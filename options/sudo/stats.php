<?php
session_start();
if ($_SESSION['log'] == true){
  $linked = "patrol";
} else {
  $linked = "../scout/patrol";
}

function get_percentage($total, $number) {
  if ( $total > 0 ) {
   return round($number / ($total / 100),2);
  } else {
    return 0;
  }
}

function getStats($patrol){
$partipation = [];
$users = file_get_contents("../../users.prk");
$users = explode(" ", $users);
$userNum = count($users) -1;
$file = "../../patrols/".$patrol.".prk";
$members = file_get_contents($file);
$members = explode("\n", $members);
$memberNum = count($members) - 1;
for ($q = 0; $q < $userNum; $q = $q + 2){
$current = $users[$q]." ".$users[$q + 1];
for ($z = 0; $z < $memberNum; $z++){
  if ($current == $members[$z]){
      array_push($partipation, $current);
  }
}
}
$partipationNum = count($partipation);
$percent = get_percentage($memberNum, $partipationNum);
return $percent."%";
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
<title>T90 Geocaching | Stats</title>
</head>
<body text="white">
<center>
  <h3>Troop Status</h3>
</center>
<?php
$list = file_get_contents("../../patrols/list.prk");
$list = explode("\n", $list);
$listNum = count($list) - 1;
for ($i = 0; $i < $listNum; $i = $i + 1){
  echo "<div class=\"button_cont\" align=\"center\"><a class=\"type_b\" href=\"".$linked.".php?patrol=".$list[$i]."\" rel=\"nofollow noopener\">".$list[$i].": ".getStats($list[$i])."</a></div><br>";
}
?>
</body>
</html>

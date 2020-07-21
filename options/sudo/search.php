<?php
/*
1. finds single result and desplays profile.php
2. finds multible and displays list
3. finds none and displays error
*/
$pings = [];
$numPings = 0;
$even = true;
$scout = $_GET['scout'];
$users = file_get_contents("../../users.prk");
$users = explode(" ", $users);
$userNum = count($users) - 1;
for ($i = 0; $i < $userNum; $i++){
if ($users[$i] == $scout){
$numPings++;
if ($even){
array_push($pings, $users[$i]." ".$users[$i + 1]);
} else {
array_push($pings, $users[($i - 1)]." ".$users[$i]);
}
}
$even = !$even;
}
?>

<html>
<style>
<?php
if ($numPings != 1){
echo "body { background-image: url(\"../../background.jpg\"); }";
}
?>
</style>
<head>
<title>T90 Geocach | Search</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../button.css">
    <link rel="stylesheet" href="../../alert.css">
</head>
<body>
<?php
if ($numPings == 1){
  echo "<script> location.assign('profile.php?scout=".str_replace(" ", "+", $pings[0])."'); </script>";
}
?>
<?php
if ($numPings == 0){
echo "<div class=\"alert\">
  <span class=\"closebtn\" onclick=\"location.assign('adminHome.php');\">&times;</span>
  Sorry, could not find scout
</div>";
}
?>
<?php
for ($q = 0; $q < $numPings; $q++){
echo "<div class=\"button_cont\" align=\"center\"><a class=\"type_b\" href=\"profile.php?scout=".str_replace(" ", "+", $pings[$q])."\" rel=\"nofollow noopener\">".$pings[$q]."</a></div><br>";
}
?>
</body>
</html>

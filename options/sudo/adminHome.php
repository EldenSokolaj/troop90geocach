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
<link rel="stylesheet" href="../../button.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>T90 Geocaching | Admin Home</title>
</head>
<body text="white">
<center>
  <h3>Search for scout</h3>
<form action="./profile.php" method="get" id="search">
  <input type="text" id="scout" name="scout">
</form>
</center>
<div class="button_cont" align="center"><a class="type_a" href="userList.php" rel="nofollow noopener">Participant List</a></div>
<br>
<div class="button_cont" align="center"><a class="type_a" href="codes.php" rel="nofollow noopener">Edit geo codes</a></div>
<br>
<div class="button_cont" align="center"><a class="type_a" href="stats.php" rel="nofollow noopener">updated stats</a></div>
<br>
<div class="button_cont" align="center"><a class="type_a" href="removeScout.php" rel="nofollow noopener">remove scout</a></div>
<br>
<div class="button_cont" align="center"><a class="type_a" href="../../index.php" rel="nofollow noopener">exit admin page</a></div>
</body>
</html>

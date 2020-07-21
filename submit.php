<?php
$info = "<script> location.assign('index.php'); </script>";
$fullName = $_POST['firstName'].' '.$_POST['lastName'];
$name = str_replace(' ', '', $fullName);
$inputKey = strtolower($_POST["key"]);
$fileName = "./profiles/".$name.".prk";
$cmd = "cat ".$fileName." | grep -w ".$inputKey;
if (exec($cmd)){
$validKey = false;
} else {
$validKey = true;
}
if ($validKey){
$file = fopen($fileName, "a");
fwrite($file, $inputKey."\n");
fclose($file);
$name = explode(" ", $fullName);
$cmd = "cat users.prk | grep '".$fullName."'";
if (!exec($cmd)){
$userList = fopen("users.prk", "a");
fwrite($userList, $fullName." ");
fclose($userList);
}
} else {
$info = "<div class=\"alert\">
  <span class=\"closebtn\" onclick=\"location.assign('index.php');\">&times;</span>
  You have already used this code!
</div>";
}
?>

<html>
<style>
/* The alert message box */
.alert {
  padding: 20px;
  background-color: #f44336; /* Red */
  color: white;
  margin-bottom: 15px;
}

/* The close button */
.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

/* When moving the mouse over the close button */
.closebtn:hover {
  color: black;
}

 body { background-image: url("background.jpg");
</style>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<title>submiting...</title>
</head>
<body text="white">
<?php echo $info; ?>
</body>
</html>

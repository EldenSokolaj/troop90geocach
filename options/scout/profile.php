<?php
session_start();
$load = true;
$scout = $_GET['scout'];
$name = str_replace(' ', '', $_GET['scout']);
$file = "../../profiles/".$name.".prk";
$exists = file_exists($file);
if (!$exists) {
$search = "search.php?scout=".$scout;
echo "<script> location.assign('".$search."'); </script>";
}

$info = fopen("../../info.prk", "r");
fread($info, 8);
$totalamount = fread($info, 1);
fclose($info);

$amountfound = 0;
if ($exists){
$personalfile = fopen($file, "r");
while(!feof($personalfile)){
$buffer = fgets($personalfile);
$amountfound = $amountfound + 1;
}
fclose($personalfile);
$amountfound = $amountfound - 1;
}
function get_percentage($total, $number) {
  if ( $total > 0 ) {
   return round($number / ($total / 100),2);
  } else {
    return 0;
  }
}
?>

<html>
<style>
<?php
if ($load){
echo "body { background-image: url(\"../../background.jpg\"); }";
}
?>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #727575}
tr:nth-child(odd){background-color: #464747}

th {
  background-color: #108271;
  color: white;
}
</style>
<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<title>T90 Geocaching | <?php echo $scout; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body text="white">
<center><h3><?php echo $scout; ?></h3></center>
<div class="w3-light-grey">
  <div class="w3-container w3-green w3-center" 
  style=<?php echo "\"width:".get_percentage($totalamount, $amountfound)."%\""; ?>><?php echo get_percentage($totalamount, $amountfound)."%"; ?></div></div>
  <center>
  <br>
  </center>
</body>
</html>

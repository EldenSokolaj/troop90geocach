<html>
  <style>
  .button {
  background-color: #399eb8; /* Green */
  border: none;
  color: grey;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.submit {
  background-color: grey; 
  color: black; 
  border: 2px solid #399eb8;
}

.submit:hover {
  background-color: #399eb8;
  color: white;
}
body { background-image: url("../../background.jpg"); }
  </style>
<head>
<link rel="stylesheet" href="../../button.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>T90 Geo | Edit Codes</title>
</head>
<body text="white">
<br>
<center>
  <h3>Add New Code</h3>
  <input type="text" id="key" name="key">
 <input type="button" class="submit" value="submit" onclick="submitKey()">
<p id="reply"></p>
  <h3>Remove Code</h3>
<?php
$keys = file_get_contents("../../keys.prk");
$keys = explode("\n", $keys);
$keyNum = count($keys) - 1;
for ($q = 0; $q < $keyNum; $q++){
echo "<input type=\"button\" id=\"".$keys[$q]."\" onclick=\"removeKey('".$keys[$q]."')\" class=\"buttonB\" value=\"".$keys[$q]."\"/>
<br>";
}
?>
</center>
<script>
function submitKey(){
var inputVal = document.getElementById("key").value;
var url = "submitCodes.php?key=" + inputVal;
var objXMLHttpRequest = new XMLHttpRequest();
objXMLHttpRequest.onreadystatechange = function() {
if(objXMLHttpRequest.readyState === 4) {
if(objXMLHttpRequest.status === 200) {
document.getElementById("reply").innerHTML = objXMLHttpRequest.responseText;
document.getElementById("key").value = "";
  } else {
  alert('Error Code: ' +  objXMLHttpRequest.status);
  alert('Error Message: ' + objXMLHttpRequest.statusText);
    }
  }
}
objXMLHttpRequest.open('GET', url);
objXMLHttpRequest.send();
}

function removeKey(key){
var url = "removeCodes.php?key=" + key;
var objXMLHttpRequest = new XMLHttpRequest();
objXMLHttpRequest.onreadystatechange = function() {
if(objXMLHttpRequest.readyState === 4) {
if(objXMLHttpRequest.status === 200) {
document.getElementById(key).remove();
  } else {
  alert('Error Code: ' +  objXMLHttpRequest.status);
  alert('Error Message: ' + objXMLHttpRequest.statusText);
    }
  }
}
objXMLHttpRequest.open('GET', url);
objXMLHttpRequest.send();
}
</script>
</body>
</html>

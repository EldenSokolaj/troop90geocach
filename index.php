<html>
  <style>
 body { background-image: url("background.jpg"); }
  </style>
  <head>
    <link rel="stylesheet" href="sidebar.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Troop 90 | Geocach</title>
  </head>
  <body text="white">
  <div class="sidebar" id="Sidebar">
   <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
   <a href="./options/about.php">About</a>
  <a href="./options/admin.php">Admin</a>
  <a href="./options/sudo/stats.php">Account</a>
</div>
<div class="main">
  <button class="openbtn" onclick="openNav()" id="sideNav">☰ More Options</button>  
<br><br>
  <center>
<form action="submit.php" method="post">
  First Name<br>
  <input type="text" id="fullName" name="firstName" required><br><br>
   Last Name<br>
  <input type="text" id="lastName" name="lastName" required><br><br>
  Input code<br>
  <input type="text" id="key" name="key"><br><br>
  <input type="submit" value="Submit" disabled id="submit">
  <br><br><br><br>
  <h2><p>Troop 90 Geocaching event log</p></h2>
</form>  
</center>
<script>
var validName = true;
var validKey = false;
key.addEventListener('keyup', function (event) {
var inputVal = document.getElementById("key").value;
var url = "checkKey.php?key=" + inputVal;
var objXMLHttpRequest = new XMLHttpRequest();
objXMLHttpRequest.onreadystatechange = function() {
  if(objXMLHttpRequest.readyState === 4) {
    if(objXMLHttpRequest.status === 200) {
        // alert(objXMLHttpRequest.responseText + ":" + inputVal);
         if (objXMLHttpRequest.responseText == "valid"){
           validKey = true;
           if (validName == true){
           document.getElementById("submit").disabled = false;
           }
         } else {
           document.getElementById("submit").disabled = true;
           validKey = false;
           }
    } else {
          alert('Error Code: ' +  objXMLHttpRequest.status);
          alert('Error Message: ' + objXMLHttpRequest.statusText);
    }
  }
}
objXMLHttpRequest.open('GET', url);
objXMLHttpRequest.send();
});
/*
firstName.addEventListener('keyup', function (event) {
var testName = document.getElementById('fullName').value;
if(regName.test(testName)){
validName = true;
if (validKey == true){
document.getElementById("submit").disabled = false;
}
} else {
validName = false;
document.getElementById("submit").disabled = true;
}
});
*/
function openNav() {
  document.getElementById("Sidebar").style.width = "100%";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("Sidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}

function initNav(){
var x = screen.width;
if (x < 800){
document.getElementById("sideNav").innerHTML = "☰";
}
}

initNav();
</script>
</div>
</body>
</html>

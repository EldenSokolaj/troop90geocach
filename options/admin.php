<html>
<style>
 body { background-image: url("../background.jpg"); }
  </style>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Troop 90 | Geocach | Admin</title>
  </head>
  <body text="white">
<br><br>
  <center>
    <h2><p>Troop 90 Geocaching Event Admin Page</p></h2>
  <h3>Password</h3>
<form action="./sudo/adminLog.php" method="post" id="passwordForm">
  <input type="password" id="pass" name="pass" 
</form> <br><br><br><br>
</center>
<script>
pass.addEventListener('keyup', function (event) {
var attempt = document.getElementById("pass").value;;
var url = "./sudo/adminLog.php?pass=" + attempt;
var objXMLHttpRequest = new XMLHttpRequest();
objXMLHttpRequest.onreadystatechange = function() {
  if(objXMLHttpRequest.readyState === 4) {
    if(objXMLHttpRequest.status === 200) {
        if (objXMLHttpRequest.responseText == "valid"){
          location.assign("./sudo/adminHome.php");
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
</script>
</body>
</html>

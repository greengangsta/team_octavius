<html>
<head>
<h1 align="center"><i>Team Octavius</i></h1>
</head>
 <style>
body {
  //  background-color: LightSteelBlue;
  background-size: 100% ,100%;
    background-repeat: no-repeat;
    background-position: left top;
    background-attachment: fixed;
}

 </style>
 <body>
  <link rel="stylesheet" href="styles.css">
   <hr><br><br><br>
 <h3>Administrator Login :</h3>

 </body>

</html>
<?php
require 'connect.inc.php';
require 'core.php';

if(loggedin()){
  $firstname=getuserfield('firstname');
  $surname=getuserfield('surname');
  echo 'You are logged in,'.$firstname.' '.$surname. ' <a href=logout.php> Log out</a><br>';
  
  echo '<br>Add an ADMIN <a href="register.php">Register</a>';
}else {
     include 'loginform.php';

}

?>
<br>

<br><br><br><br><br><br><br><br><br><br><br>
 <h2><a href="contact.html">Contact</a></h2>
 <?php

$db=new mysqli('localhost','root','','app');


if($db->connect_errno) {
  echo $db->connect_error;
   die('Sorry, we are having some error');
}

?>
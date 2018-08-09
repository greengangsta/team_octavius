<?php
//require 'connect.inc.php';
session_start();
ob_start();

$current_file=$_SERVER['SCRIPT_NAME'];

if(isset($_SERVER['HTTP_REFERER'])&&!empty($_SERVER['HTTP_REFERER'])){
  $http_referer=$_SERVER['HTTP_REFERER'];
}
//echo $current_file;
function loggedin(){
   if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id'])){
      return true;
   }else{
   return false;
   }
}
function getuserfield($field){
  $db=new mysqli('localhost','root','','app');
 $query="SELECT `$field` FROM `users` WHERE `id`='".$_SESSION['user_id']."'";
  if($query_run=mysqli_query($db,$query)){
  if($query_result=$query_run->fetch_assoc()[$field]){
   return $query_result;
  }
  }
}
?>
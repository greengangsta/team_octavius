<?php
//require 'core.php';
if(isset($_POST['username'])&&isset($_POST['password'])){
 $username= $_POST['username'];
 $password= $_POST['password'];
 // echo 'check 1';
 if(!empty($username)&&!empty($password)){
  // echo 'check 2';
 $query="SELECT `id` FROM `users` WHERE `username`='$username' AND `password`='$password' ";
 $query_run=mysqli_query($db,$query);
 if($query_run){
   //echo 'check 3';
 $query_num_rows=mysqli_num_rows($query_run);
 if( $query_num_rows==0){
   echo 'Invalid username/password combination';
 }else if($query_num_rows==1){
  // echo 'check 4';
 $user_id=$query_run->fetch_assoc()['id'];
 //echo 'OK logged in successfully';
 $_SESSION['user_id']=$user_id;
 header('Location: login.php');
 }
 }
 }else {
 echo 'You must supply a username and password';
 }
}

?>

<form action="<?php echo $current_file; ?>" method="POST">
Username : <input type="text" name ="username"> <br><br>
Password : <input type="password" name="password"> <br><br>
<input type="submit" value="Log in">
</form>
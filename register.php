<?php
require 'core.php';
require 'connect.inc.php';

if(loggedin()){

  if( isset($_POST['username'])&&isset($_POST['password'])&& isset($_POST['password_again'])&&  isset($_POST['firstname'])&& isset($_POST['surname'])&&isset($_POST['email'])) {
   $username=$_POST['username'];
   $password=$_POST['password'];
   $password_again=$_POST['password_again'];
   $firstname=$_POST['firstname'];
   $surname=$_POST['surname'];
   $email=$_POST['email'];

   if(!empty($username)&&!empty($password)&&!empty($password_again)&&!empty($firstname)&&!empty($surname)&&!empty($email)){
     if($password!=$password_again){
      echo 'Passwords do not match.';
     }else{
         $msg='Congratulations, you have been successfully registered as an ADMIN on HMS with username='.$username.' and password='.$password.'.';
     wordwrap($msg,70);
     mail("$email","Registration Successful","$msg");
  //       mail("$mail","Registration Successful","Congratulations, you have been successfully registered as an ADMIN on HMS with username=$username and password=$password.");
     $query="SELECT `username` FROM `users` WHERE `username`='$username'";
      $query_run=mysqli_query($db,$query);
      if(mysqli_num_rows($query_run)==1){
        echo 'The username '.$username.' already exists.';
      }else{

       $query="INSERT INTO `users` VALUES('','$username','$password','$firstname','$surname')";
       if($query_run=mysqli_query($db,$query)){
         header('Location: register_success.php');
          echo '';
       }else {
        echo 'Sorry, we couldn\'t register you at this time. Try again later.';
       }
      }
     }
   }else{
    echo 'All fields are required.';
   }


  }

  ?>
  <h1><strong>Hospital Management System</strong></h1>
 <hr> <br><br>
  <h2>New User Registration</h2>
<form action="register.php" method="POST">
Username:<br><input type="text" name="username" maxlength="25" value="<?php if(isset($username)){echo $username;}?>"><br><br>
Password:<br><input type="password" name="password"><br><br>
Password Again:<br><input type="password" name="password_again"><br><br>
Firstname:<br><input type="text" name="firstname" maxlength="25" value="<?php if(isset($firstname)){echo $firstname;}?>"><br><br>
Surname:<br><input type="text" name="surname" maxlength="25" value="<?php if(isset($surname)){echo $surname;}?>"><br><br>
Email:<br> <input placeholder="example@mail.com" type="email" name="email" required/><br><br>
<input type="submit" value="Register">
</form>

 <?php
}else if (!loggedin()){
  echo 'You need to be logged in first.';

}

?>

<style>
    body{
     background-color: LightSteelBlue;
       background-image: url("tube.jpg");
  background-size: 100% ,100%;
    background-repeat: no-repeat;
    background-position: left top;
    background-attachment: fixed;
    }
</style>
<br><br><br><br><h2><a href=loginhm.php>HOME</a></h2>
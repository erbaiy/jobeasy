<?php
include('includes/connection.php');
$register=new Register();


if(isset($_POST['submit']))
{
 
  $password_hash=password_hash($_POST["password"],PASSWORD_DEFAULT);
$rs=$register->registration($_POST['username'],$_POST["email"],$password_hash);

print_r($rs);
 die();
  
}






 
?>


<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Registration or Sign Up form in HTML CSS | CodingLab </title>
  <link rel="stylesheet" href="styles/registerstyle.css">
</head>

<body>
  <div class="wrapper">
    <h2>Registration</h2>
    <form action="#" method='POST'>
      <div class="input-box">
        <input type="text" placeholder="Enter your name" name="username" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Enter your email" name='email' required>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Create password" name='password' required>
      </div>
      
      <div class="policy">
        <input type="checkbox">
        <h3>I accept all terms & condition</h3>
      </div>
      <div class="input-box button">
        <input type="Submit" name="submit" value="Register Now">
      </div>
      <div class="text">
        <h3>Already have an account? <a href="/login.php">Login now</a></h3>
      </div>
    </form>
  </div>
</body>

</html>
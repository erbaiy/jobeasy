<?php
include('includes/connection.php');
$resl=new Login();
if(isset($_POST["submit"]))
{
  
  $username = $_POST['username'];
    $password =$_POST['password'];
  $resl->login($username,$password);

}





//____________________________________________________
// if(isset($_POST['submit']))
// {

//   $username = mysqli_real_escape_string($conn, $_POST['username']);
//     $password = mysqli_real_escape_string($conn, $_POST['password']);

//   $query = "SELECT * FROM users WHERE username = '$username'";
//   $result = mysqli_query($conn, $query);
//   $row = mysqli_fetch_assoc($result);

//  if($username==$row['username'])
//  { 
//   if(password_verify($password, $row['password'])){
//     header('location:dashboard/offre.php');
//     exit(); 
//   }
// }else{
//   echo 
//   "<script>alert('ivalid! invalid username');</script>";
//   exit(); 
// }
// }

//____________________________________________________


?>
<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form | CodingLab</title>
  <link rel="stylesheet" href="styles/loginstyle.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body>
  <div class="container">
    <div class="wrapper">
      <div class="title"><span>Login Form</span></div>
      <h1></h1>
      <form action="" method="POST">
        <div class="row">
          <i class="fas fa-user"></i>
          <input type="text" name="username" placeholder="user name" required>
        </div>
        <div class="row">
          <i class="fas fa-lock"></i>
          <input type="password" name="password" placeholder="Password" required>
        </div>
        <div class="pass"><a href="#">Forgot password?</a></div>
        <div class="row button">
          <input type="submit" name="submit" value="Login">
        </div>
        <span style="color:red;"></span>
        <div class="signup-link">Not a member? <a href="register.php">Signup now</a></div>
      </form>
    </div>
  </div>

</body>

</html>
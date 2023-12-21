<?php 


namespace App\Controllers;

class Authentification
{
public function  login()
{
$resl=new Login();
if(isset($_POST["submit"]))
{
  
  $username = $_POST['username'];
    $password =$_POST['password'];
  $resl->login($username,$password);

}
}
}
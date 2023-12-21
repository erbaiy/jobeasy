<?php


namespace App\Controllers;

use App\Controllers;

class Authentification
{
  public function  login()
  {
    $resl = new UserModels();

    if (isset($_POST["submit"])) {

      $username = $_POST['username'];
      $password = $_POST['password'];
      $resl->login($username, $password);
    }
  }
}

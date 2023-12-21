<?php

namespace App\Models;

class UserModel
{
  public \mysqli $conn;

  public function __construct()
  {
    $db = new ModelConnection();
    $this->conn = $db->conn;
  }

  public function registration($username, $email, $password)
  {
    $query = "INSERT into `users`(username,email,password,role_name)values('$username','$email','$password','candidat')";
    $result = mysqli_query($this->conn, $query);
    return $result;
  }

  public function login($username, $password)
  {
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($this->conn, $query);
    return $result;
    //   $row = mysqli_fetch_assoc($result);

    //   if ($username == $row['username']) {
    //     $_SESSION['user_id'] = $row['id'];
    //     if (password_verify($password, $row['password']) && $row['role_name'] == 'admin') {
    //       header('location:dashboard/offre.php');
    //     } elseif (password_verify($password, $row['password']) && $row['role_name'] == 'candidat') {
    //       header('location: index.php');
    //     }
    //   } else {
    //     echo
    //     "<script>alert('ivalid! invalid username');</script>";

    //     // echo 'error';
    //     exit();
    //   }
    //   return $result;
    // }
  }
}

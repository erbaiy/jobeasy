<?php



// $dbName = "sprint3";
// $dbHost = "localhost";
// $dbUser = "root";
// $dbPass = "";
// $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
// if (!$conn) {
//     die("Something went wrong");

// }

namespace App\Models;



class ModelConnection
{

  public $conn;

  public function __construct()
  {
    $this->conn = mysqli_connect('localhost', 'root', '', 'sprint3');
    // return $this->conn;
  }
}

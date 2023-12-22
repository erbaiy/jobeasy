<?php
session_start();
// include('../includes/connection.php');
// $dbName = "sprint3";
// $dbHost = "localhost";
// $dbUser = "root";
// $dbPass = "";
// $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
// if (!$conn) {
//     die("Something went wrong");
// }

if (isset($_POST['submit'])) {
    $id = $_SESSION['user_id'];
    $job_id = $_POST['jobid'];
    if (!$id) {
        header('location:../login.php');
        exit();
    } else {
        $selct = "SELECT * from offre where user_id=$id and job_id=$job_id ";
        $res = mysqli_query($conn, $selct);
        if (mysqli_num_rows($res) > 0) {
            echo "<script>alert('You have already applied')</script>";
        } else {


            $query = "INSERT INTO offre VALUES(null, $job_id, $id, 'not approved')";
            mysqli_query($conn, $query);
            header("location:../index.php");
        }
    }
}

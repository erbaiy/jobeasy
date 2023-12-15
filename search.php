<?php
$dbName = "sprint3";
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
if (!$conn) {
    die("Something went wrong");
    
}
// Assuming you have a database connection already established

if(isset($_POST["search"]))
{
    $search = $_POST["keywords"];
    $sql = "SELECT * FROM jobs WHERE title  LIKE '%".$search."%'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))
        {
            echo "<p>".$row['title']."</p>";
        }
    }
    else
    {
        echo "No matching records found";
    }
}
?>
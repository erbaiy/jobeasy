<?php
require('../../includes/connection.php');
$job=new Jobs();
header('location:../jobs.php');

$job->delete($_GET['id']);  
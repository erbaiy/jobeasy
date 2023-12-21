<?php

namespace App\Controllers;

use App\Models\JobsModels;

class JobsControllers
{
    public function selectJobs()
    {
        $selct = new JobsModels();

        $result = $selct->selectJobs();



        require('../view/jobs.php');
    }
    public function AddJob()
    {
        $job = new JobsModels();


        if (isset($_POST['submit'])) {
            $image_name = $_FILES['jobImage']['name'];
            $image_temp = $_FILES['jobImage']['tmp_name'];
            $image_type = $_FILES['jobImage']['type'];
            $image_size = $_FILES['jobImage']['size'];
            $image_error = $_FILES['jobImage']['error'];
            $allowed = array('jpg', 'png', 'jif');
            $image = explode('.', $image_name);
            $image_ext = strtolower(end($image));

            if ($image_error == 4) {
                echo "file is not uploaded";
            } else if ($image_size) {
                if (in_array($image_ext, $allowed)) {
                    $jobImage = uniqid() . $image_name;
                    // echo $_SERVER['DOCUMENT_ROOT'] . '/assets/img' . $jobImage;
                    // die();
                    move_uploaded_file($image_temp, $_SERVER['DOCUMENT_ROOT'] . '/assets/img' . $jobImage);


                    $job->addJob($_POST['title'], $_POST['discription'], $_POST['company'], $_POST['location'], $_POST['status'], $jobImage);
                    if ($job) {
                        header('location:index.php?route=home');
                    }
                } else {
                    echo "file is not valid you need this extention ('jpg' , 'png' , 'jfif')";
                }
            } else {
                echo "size to file is so heigh";
            }
        }
        require('../view/crudjob/add.php');
    }
    public function DeleteJob()
    {
        $job = new JobsModels();
        $job->delete($_GET['id']);
        if ($job) {
            header('location:index.php?route=home');
        }
        require('../view/crudjob/delete.php');
    }
    public function SelcectData()
    {
        $job = new JobsModels();

        $result = $job->SelcectData();
        $fetch = mysqli_fetch_array($result);

        $title = $fetch['title'];
        $id = $fetch['job_id'];
        $dis = $fetch['description'];
        $company = $fetch['company'];
        $location = $fetch['location'];
        $status = $fetch['status'];

        require('../view/crudjob/update.php');
    }

    public function UpdateJob()
    {

        $job = new JobsModels();
        if (isset($_POST['submit'])) {

            $result = $job->update($_POST['title'], $_POST['discription'], $_POST['company'], $_POST['location'], $_POST['status'], $_POST['job_id']);


            if ($result) {
                header('location:index.php?route=home');
            } else {
                echo 'somme thing rong';
            }
        }
        require('../view/crudjob/update.php');
        // require('../view/jobs.php');
    }
}

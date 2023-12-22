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
                        header('location:index.php?route=selectJobs');
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
            header('location:index.php?route=selectJobs');
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
    public  function offre()
    {
        $offre = new JobsModels();
        $result = $offre->offre();
        // dump($result);

        require('../view/offre.php');
    }

    public function UpdateJob()
    {

        $job = new JobsModels();
        if (isset($_POST['submit'])) {

            $result = $job->update($_POST['title'], $_POST['discription'], $_POST['company'], $_POST['location'], $_POST['status'], $_POST['job_id']);


            if ($result) {
                header('location:index.php?route=selectJobs');
            } else {
                echo 'somme thing rong';
            }
        }
        require('../view/crudjob/update.php');
        // require('../view/jobs.php');
    }
    public function home()
    {
        require('../view/index.php');
    }
    public function search()
    {
        $rech = new JobsModels();

        if (isset($_GET["term"])) {
            $search = $_GET["term"];
            $result = $rech->search($search);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
?>
                    <article class="postcard light yellow">
                        <a class="postcard__img_link" href="#">
                            <img class="postcard__img" src="assets/img/<?php echo $row['image_path'] ?>" alt="Image Title" />
                        </a>
                        <div class="postcard__text t-dark">
                            <h3 class="postcard__title yellow"><a href="#"><?php echo $row['title'] ?></a></h3>
                            <div class="postcard__subtitle small">
                                <time datetime="2020-05-25 12:00:00">
                                    <i class="fas fa-calendar-alt mr-2"></i>Mon, May 25th 2023
                                </time>
                            </div>
                            <div class="postcard__bar"></div>
                            <div class="postcard__preview-txt"><?php echo $row['description'] ?></div>

                            <ul class="postcard__tagbox">
                                <li class="tag__item"><i class="fas fa-tag mr-2"></i>France</li>
                                <li class="tag__item"><i class="fas fa-clock mr-2"></i> 3 mins.</li>
                                <li class="tag__item play yellow">
                                    <form action="index.php?route=apply" method="POST">
                                        <input type="hidden" name="jobid" value="<?php echo $row['job_id'] ?>">
                                        <button type='submit' name="submit"><i class="fas fa-play mr-2"></i>APPLY NOW</button>
                                    </form>

                                </li>
                            </ul>

                        </div>
                    </article>
<?php
                }
            } else {
                echo "No matching records found";
            }
        }
    }
    public function apply()
    {


        if (isset($_POST['submit'])) {
            $userId = $_SESSION['user_id'];
            $jobId = $_POST['jobid'];

            if (!$userId) {
                header('location:index.php?route=login');
                exit();
            } else {
                $offreModel = new JobsModels();

                if ($offreModel->checkIfAlreadyApplied($userId, $jobId)) {
                    echo "<script>alert('You have already applied')</script>";
                } else {
                    $offreModel->applyForJob($jobId, $userId);
                    header("location:../index.php");
                }
            }
        }
        require('../view/crudjob/applay.php');
    }
}
